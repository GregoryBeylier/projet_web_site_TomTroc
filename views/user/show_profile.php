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
        $photo = !empty($user->getProfilePhoto()) ? $user->getProfilePhoto() : 'default_profile.png';
        ?>
        <img src="<?php echo htmlspecialchars($photo); ?>" alt="Photo de profil" />
        <p>Pseudonyme : <?php echo htmlspecialchars($user->getPseudo()); ?></p>
        <p>membre depuis le : <?php echo date('d/m/Y', strtotime($user->getCreatedAt())); ?></p>
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
                <?php if ($book->getStatus() == 1): ?>
                    <tr>
                        <td><img src="<?php echo $book->getPicture(); ?>" alt="Couverture du livre" width="100" /></td>
                        <td><?php echo $book->getTitle(); ?></td>
                        <td><?php echo $book->getAuthor(); ?></td>
                        <td><?php echo $book->getDescription(); ?></td>
                        <td><?php echo $book->getStatus() == 1 ? 'Disponible' : 'Non disponible'; ?></td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>

        </tbody>
    </table>
    <?php require __DIR__ . '/../templates/footer.php'; ?>

</body>

</html>