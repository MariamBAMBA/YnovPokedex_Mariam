<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/scss/pokemonStyles.css">
    <title>Liste des Pokémons</title>
</head>
<body>
    <h1>Liste des Pokémons</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Type</th>
            <th>Image</th> 
            <th>Actions</th>
        </tr>
        <?php foreach ($pokemons as $pokemon): ?>
        <tr>
            <td><?php echo htmlspecialchars($pokemon['id']); ?></td>
            <td><?php echo htmlspecialchars($pokemon['name']); ?></td>
            <td><?php echo htmlspecialchars($pokemon['type']); ?></td>
            <td>
                <!-- Ajouter l'image du Pokémon -->
                <img src="assets/images/<?php echo strtolower($pokemon['name']); ?>.png" alt="<?php echo htmlspecialchars($pokemon['name']); ?>" class="pokemon-image">
            </td>
            <td>
                <a class="btn-view" href="index.php?action=voirPokemon&id=<?php echo $pokemon['id']; ?>">Consulter</a>
                <a class="btn-edit" href="index.php?action=modifierPokemon&id=<?php echo htmlspecialchars($pokemon['id']); ?>">Modifier</a>
                <a class="btn-delete" href="index.php?action=supprimerPokemon&id=<?php echo $pokemon['id']; ?>">Supprimer</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <div class="add-btn-container">
        <a class="btn-add" href="index.php?action=ajouterPokemon">Ajouter un Pokémon</a>
    </div>
</body>
</html>
