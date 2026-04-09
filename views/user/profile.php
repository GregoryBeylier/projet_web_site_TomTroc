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
        $photo = !empty($user['profile_photo']) ? $user['profile_photo'] : 'default_profile.png';
        ?>
        <a href="index.php?controller=user&action=logout">Se déconnecter</a><br><br>
        <img src="<?php echo htmlspecialchars($photo); ?>" alt="Photo de profil" />
        <p>Pseudonyme : <?php echo htmlspecialchars($user['pseudo']); ?></p>
        <p>membre depuis le : <?php echo date('d/m/Y', strtotime($user['created_at'])); ?></p>
    </div>

    <form action="index.php?controller=user&action=updateProfile" method="post">

        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>">

        <input type="password" id="password" name="password" placeholder="Nouveau mot de passe">

        <input type="text" id="pseudo" name="pseudo" value="<?php echo htmlspecialchars($user['pseudo']); ?>">

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
                    <td><img src="<?php echo $book['picture']; ?>" alt="Couverture du livre" width="100" /></td>
                    <td><?php echo $book['title']; ?></td>
                    <td><?php echo $book['author']; ?></td>
                    <td><?php echo $book['description']; ?></td>
                    <td><?php echo $book['status'] == 1 ? 'Disponible' : 'Non disponible'; ?></td>
                    <td>
                        <a href="index.php?controller=book&action=edit&id=<?php echo $book['id']; ?>">Modifier</a>
                        <a href="index.php?controller=book&action=delete&id=<?php echo $book['id']; ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce livre ?');">Supprimer</a>
                    </td>

                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>



    <?php require __DIR__ . '/../templates/footer.php'; ?>

</body>

</html>