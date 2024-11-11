<?php
require_once 'controllers/PokemonController.php';
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pokemon_db";


// Pour se connecter à la bdd
try {
    $db = new PDO('mysql:host=localhost;dbname=pokemon_db', 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}

// Initialise le contrôleur
$controller = new PokemonController($db);

// Détermine l'action demandée via l'URL (liste, ajouter ou spprimer)
$action = $_GET['action'] ?? 'listePokemons'; 

// Exécute les actions
switch ($action) {
    case 'listePokemons':
        $controller->listePokemons();
        break;
    case 'ajouterPokemon':
        $controller->ajouterPokemon();
        break;
    case 'voirPokemon':
        $id = $_GET['id'] ?? null;
        if ($id) {
            $controller->voirPokemon($id);
        } else {
            echo "ID manquant pour consulter un Pokémon";
        }
        break;
    case 'modifierPokemon':
        $id = $_GET['id'] ?? null;
        if ($id) {
            $controller->modifierPokemon($id);
        } else {
            echo "Défaut d'ID pour la modification";
        }
        break;
    case 'supprimerPokemon':
        $id = $_GET['id'] ?? null;
        if ($id) {
            $controller->supprimerPokemon($id);
        } else {
            echo "Défaut d'ID pour la suppression";
        }
        break;
    default:
        echo "Action non reconnue.";
        break;
}
?>

