<?php
require_once __DIR__. '/../models/PokemonModel.php';  // __DIR__ = chemin absolu vers le fichier et evite des erreurs

class PokemonController {
    private $model;

    public function __construct($db) {
        $this->model = new PokemonModel($db);
    }

    //afficher la liste des pokemons
    public function listePokemons() {
        $pokemons = $this->model->getAllPokemons();
        include __DIR__.'/../views/pokemonListeView.php';
    }

    //creer un pokemon
    public function ajouterPokemon() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $type = $_POST['type'];
            $image = $_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'], "assets/images/" . $image);
            $this->model->addPokemon($name, $type, $image);
            header('Location: index.php?action=listePokemons');
        } else {
            include __DIR__ .'/../views/pokemonAjouterView.php';
        }
    }

    //consulter un pokemon par id
    public function voirPokemon($id) {
        $pokemon = $this->model->getPokemonById($id);
        include __DIR__ .'/../views/pokemonConsulterView.php';
    }

    //modidier un pokemon par id
    public function modifierPokemon($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $type = $_POST['type'];
            $image = $_FILES['image']['name'];
            if ($image) {
                move_uploaded_file($_FILES['image']['tmp_name'], "assets/images/" . $image);
            } else {
                $pokemon = $this->model->getPokemonById($id);
                $image = $pokemon['image'];
            }
            $this->model->updatePokemon($id, $name, $type, $image);
            header('Location: index.php?action=listePokemons');
        } else {
            $pokemon = $this->model->getPokemonById($id);
            include __DIR__ .'/../views/pokemonModifierView.php';
        } 
    }
    
    //supprimer un pokemon par id
    public function supprimerPokemon($id) {
        $this->model->deletePokemon($id);
        header('Location: index.php?action=listePokemons');
    }
}
?>