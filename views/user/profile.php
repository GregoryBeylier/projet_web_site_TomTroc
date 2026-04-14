<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Profil - TomTroc</title>
    <link rel="stylesheet" href="css/style.css" />
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
</head>

<body>

    <?php require __DIR__ . '/../templates/header.php'; ?>

    <div class="container_profile">
        <h1>Mon compte</h1>

        <div class="profile_info">
            <div class="profile_top">

                <?php
                $photo = !empty($user->getProfilePhoto()) ? $user->getProfilePhoto() : 'default_profile.png';
                ?>
                <img src="<?php echo htmlspecialchars($photo); ?>" alt="Photo de profil" /><br>

                <form action="index.php?controller=user&action=updateProfilePhoto" method="post" enctype="multipart/form-data">

                    <input type="file" id="picture" name="picture"><br>

                    <?php if (isset($error['image'])) : ?>
                        <span style="color: red; display: block;"><?php echo $error['image']; ?></span>
                    <?php endif; ?>

                    <button type="submit">Modifier</button>
                </form>

                <p>Pseudonyme : <?php echo htmlspecialchars($user->getPseudo()); ?></p>
                <p>membre depuis le : <?php echo date('d/m/Y', strtotime($user->getCreatedAt())); ?></p>

            </div>

            <div class="profile_card">

                <p>Vos informations personnelles</p>

                <form action="index.php?controller=user&action=updateProfile" method="post">
                    <label>Adresse email</label>
                    <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user->getEmail()); ?>">

                    <label>Nouveau Mot de passe</label>
                    <input type="password" id="password" name="password" placeholder="Nouveau mot de passe">

                    <label>Pseudo</label>
                    <input type="text" id="pseudo" name="pseudo" value="<?php echo htmlspecialchars($user->getPseudo()); ?>"><br>

                    <button class="btn_profile_outline" type="submit">Enregister</button>
                </form>

            </div>

        </div>

        <div class="library">

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

        </div>
    </div>



    <?php require __DIR__ . '/../templates/footer.php'; ?>

</body>

</html>