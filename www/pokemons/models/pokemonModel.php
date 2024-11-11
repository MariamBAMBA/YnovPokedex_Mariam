<?php
class PokemonModel {
    private $db;
    
    public function __construct(PDO $db) {
        $this->db = $db;
    }

    // récuperer tous les pokemons
    public function getAllPokemons() {
        $sql = "SELECT id, name, type FROM pokemons";
        $result = $this->db->query($sql);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    // ajouter un pokemon
    public function addPokemon($name, $type, $image) {
        $stmt = $this->db->prepare("INSERT INTO pokemons (name, type, image) VALUES (?, ?, ?)");
        return $stmt->execute([$name, $type, $image]);
    }

    // récuperer un pokemon par id
    public function getPokemonById($id) {
        $stmt = $this->db->prepare("SELECT * FROM pokemons WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // modifier un pokemon
    public function updatePokemon($id, $name, $type, $image) {
        $stmt = $this->db->prepare("UPDATE pokemons SET name = ?, type = ?, image = ? WHERE id = ?");
        return $stmt->execute([$name, $type, $image, $id]);
    }

    //supprimer un pokemon
    public function deletePokemon($id) {
        $stmt = $this->db->prepare("DELETE FROM pokemons WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
?>