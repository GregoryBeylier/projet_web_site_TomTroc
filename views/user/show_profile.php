<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Utilisateur</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php require __DIR__ . '/../templates/header.php'; ?>

    <div>
        <?php
        $photo = !empty($user['profile_photo']) ? $user['profile_photo'] : 'default_profile.png';
        ?>
        <img src="<?php echo htmlspecialchars($photo); ?>" alt="Photo de profil" />
        <p>Pseudonyme : <?php echo htmlspecialchars($user['pseudo']); ?></p>
        <p>membre depuis le : <?php echo date('d/m/Y', strtotime($user['created_at'])); ?></p>
    </div>

    <table>
        <thead>
            <tr>

                <th>Photo</th>

                <th>Titre</th>

                <th>Auteur</th>

                <th>Description</th>

                <th>Disponibilité</th>


            </tr>

        </thead><br><br>
        <tbody>
            <?php foreach ($books as $book): ?>
                <?php if ($book['status'] == 1): ?>
                    <tr>
                        <td><img src="<?php echo $book['picture']; ?>" alt="Couverture du livre" width="100" /></td>
                        <td><?php echo $book['title']; ?></td>
                        <td><?php echo $book['author']; ?></td>
                        <td><?php echo $book['description']; ?></td>
                        <td><?php echo $book['status'] == 1 ? 'Disponible' : 'Non disponible'; ?></td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>

        </tbody>
    </table>
    <?php require __DIR__ . '/../templates/footer.php'; ?>

</body>

</html>