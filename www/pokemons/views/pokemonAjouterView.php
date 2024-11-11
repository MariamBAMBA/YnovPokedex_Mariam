<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/scss/pokemonFormsStyles.css">
    <title>Ajouter un Pokémon</title>
</head>
<body>
    <div class="form-container">
        <h1>Ajouter un Pokémon</h1>
        <form method="post" action="index.php?action=ajouterPokemon" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Nom :</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="type">Type :</label>
                <input type="text" id="type" name="type" required>
            </div>
            <div class="form-group">
                <label for="image">Image :</label>
                <input type="file" id="image" name="image" required>
            </div>
            <div class="button-container">
                <button class="add" type="submit" class="btn-submit">Ajouter</button>
                <a href="index.php?action=listePokemons" class="btn-cancel">Annuler</a>
            </div>
        </form>
    </div>
</body>
</html>

