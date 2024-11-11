<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Voir Pokémon</title>
    <link rel="stylesheet" href="assets/scss/pokemonStyles.css">
</head>
<body>
    <h1>Détails du Pokémon</h1>
    
    <?php if ($pokemon): ?>
        <table>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Type</th>
                <th>En savoir plus</th>
            </tr>
            <tr>
                <td><?= htmlspecialchars($pokemon['id'] ?? 'Non disponible'); ?></td>
                <td><?= htmlspecialchars($pokemon['name'] ?? 'Non disponible'); ?></td>
                <td><?= htmlspecialchars($pokemon['type'] ?? 'Non disponible'); ?></td>
                <td>
                    <?php if (!empty($pokemon['name'])): ?>
                        <a href="https://www.pokepedia.fr/<?= urlencode($pokemon['name']); ?>" target="_blank">
                            Voir sur Poképédia
                        </a>
                    <?php else: ?>
                        Non disponible
                    <?php endif; ?>
                </td>
            </tr>
        </table>
        <?php if (!empty($pokemon['image'])): ?>
            <div class="consulter-image">
                <img src="assets/images/<?= htmlspecialchars($pokemon['image']); ?>" alt="<?= htmlspecialchars($pokemon['name']); ?>" width="300">
            </div>
        <?php else: ?>
            <p class="sans-image"><strong>Image :</strong> Aucune image disponible.</p>
        <?php endif; ?>

        <div class="consulter-retour">
            <a href="index.php?action=listePokemons">Retour à la liste</a>
        </div>
    <?php else: ?>
        <p>Ce Pokémon est introuvable.</p>
    <?php endif; ?>
</body>
</html>
