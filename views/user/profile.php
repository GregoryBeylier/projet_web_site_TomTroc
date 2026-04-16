<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Profil - TomTroc</title>
    <link rel="stylesheet" href="css/style.css" />
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
    <script src="js/script.js"></script>
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
                <img class="profile_picture " src="<?php echo htmlspecialchars($photo); ?>" alt="Photo de profil" />

                <form action="index.php?controller=user&action=updateProfilePhoto" method="post" enctype="multipart/form-data">

                    <input type="file" id="picture" name="picture">

                    <?php if (isset($error['image'])) : ?>
                        <span style="color: red; display: block;"><?php echo $error['image']; ?></span>
                    <?php endif; ?>

                    <a href="#" id="modifier">modifier</a>

                </form>

                <hr />

                <div class="pseudo">
                    <p><?php echo htmlspecialchars($user->getPseudo()); ?></p>
                </div>


                <p class="membre">Membre depuis
                    <?php
                    $created = new DateTime($user->getCreatedAt());
                    $now = new DateTime();
                    $diff = $created->diff($now);
                    if ($diff->y > 0) {
                        echo $diff->y . ' an' . ($diff->y > 1 ? 's' : '');
                    } elseif ($diff->m > 0) {
                        echo $diff->m . ' mois';
                    } else {
                        echo 'moins d\'un mois';
                    }
                    ?>
                </p>

                <div class="library_group">
                    <p class="library">BIBLIOTHÈQUE</p>
                    <div class="library_section">
                        <img class="library_icon" src="picture/book-icon.png" alt="bibliothèque">
                        <p class="library_count"><?php echo count($books); ?> livres</p>
                    </div>
                </div>
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

        <div class="personal_library">
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
                </thead>
                <br><br>
                <tbody>
                    <?php foreach ($books as $book): ?>
                        <tr>
                            <td><img src="<?php echo $book->getPicture(); ?>" alt="Couverture du livre" width="100" /></td>
                            <td><?php echo $book->getTitle(); ?></td>
                            <td><?php echo $book->getAuthor(); ?></td>
                            <td class="td_description"><?php echo $book->getDescription(); ?></td>
                            <td><?php echo $book->getStatus() == 1 ? '<span class="badge_disponible">disponible</span>' : '<span class="badge_indisponible">non dispo</span>'; ?></td>
                            <td>
                                <a class="btn_edit" href="index.php?controller=book&action=edit&id=<?php echo $book->getId(); ?>">Éditer</a>
                                <a class="btn_delete" href="index.php?controller=book&action=delete&id=<?php echo $book->getId(); ?>" onclick="return confirm('Êtes-vous sûr ?');">Supprimer</a>
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