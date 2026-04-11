<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Profil - TomTroc</title>
    <link rel="stylesheet" href="css/style.css" />
</head>

<body>
    <?php require __DIR__ . '/../templates/header.php'; ?>

    <h1>Mon compte</h1>

    <div>
        <?php
        $photo = !empty($user->getProfilePhoto()) ? $user->getProfilePhoto() : 'default_profile.png';
        ?>
        <a href="index.php?controller=user&action=logout">Se déconnecter</a><br><br>
        <img src="<?php echo htmlspecialchars($photo); ?>" alt="Photo de profil" /><br>
        <label for="image">Mdifier</label>
        <input type="file" id="image" name="image"><br>

        <?php if (isset($error['image'])) : ?>
            <span style="color: red; display: block;"><?php echo $error['image']; ?></span>
        <?php endif; ?>

        <p>Pseudonyme : <?php echo htmlspecialchars($user->getPseudo()); ?></p>
        <p>membre depuis le : <?php echo date('d/m/Y', strtotime($user->getCreatedAt())); ?></p>
    </div>

    <form action="index.php?controller=user&action=updateProfile" method="post">

        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user->getEmail()); ?>">

        <input type="password" id="password" name="password" placeholder="Nouveau mot de passe">

        <input type="text" id="pseudo" name="pseudo" value="<?php echo htmlspecialchars($user->getPseudo()); ?>">

        <button type="submit">enrengistré</button>
    </form>

    <table>

        <thead>
            <tr>

                <th>Photo</th>

                <th>Titre</th>

                <th>Auteur</th>

                <th>Description</th>

                <th>Disponibilité</th>

                <th>Actions</th>

            </tr>

        </thead><br><br>
        <tbody>
            <?php foreach ($books as $book): ?>
                <tr>
                    <td><img src="<?php echo $book->getPicture(); ?>" alt="Couverture du livre" width="100" /></td>
                    <td><?php echo $book->getTitle(); ?></td>
                    <td><?php echo $book->getAuthor(); ?></td>
                    <td><?php echo $book->getDescription(); ?></td>
                    <td><?php echo $book->getStatus() == 1 ? 'Disponible' : 'Non disponible'; ?></td>
                    <td>
                        <a href="index.php?controller=book&action=edit&id=<?php echo $book->getId(); ?>">Modifier</a>
                        <a href="index.php?controller=book&action=delete&id=<?php echo $book->getId(); ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce livre ?');">Supprimer</a>
                    </td>

                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>



    <?php require __DIR__ . '/../templates/footer.php'; ?>

</body>

</html>