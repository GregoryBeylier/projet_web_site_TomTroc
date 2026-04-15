<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Utilisateur</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
</head>

<body>
    <?php require __DIR__ . '/../templates/header.php'; ?>

    <div class="container_show_profile">
        <div class="show_profile_left">
            <?php $photo = !empty($user->getProfilePhoto()) ? $user->getProfilePhoto() : 'default_profile.png'; ?>
            <div class="show_profile_left_top">
                <img class="photo_profile" src="<?php echo htmlspecialchars($photo); ?>" alt="Photo de profil">
                
                <hr>
                <div class="pseudo">
                    <p><?php echo htmlspecialchars($user->getPseudo()); ?></p>
                </div>
                <p class="membre">Membre depuis
                    <?php
                    $created = new DateTime($user->getCreatedAt());
                    $now = new DateTime();
                    $diff = $created->diff($now);
                    if ($diff->y > 0) echo $diff->y . ' an' . ($diff->y > 1 ? 's' : '');
                    elseif ($diff->m > 0) echo $diff->m . ' mois';
                    else echo 'moins d\'un mois';
                    ?></p>
                <div class="library_group">
                    <p class="library">BIBLIOTHÈQUE</p>
                    <div class="library_section">
                        <img class="library_icon" src="picture/book-icon.png" alt="bibliothèque">
                        <p class="library_count"><?php echo count($books); ?> livres</p>
                    </div>
                </div>
            </div>
            
            <a href="index.php?controller=message&action=send&id=<?php echo $user->getId(); ?>" class="btn_message">Écrire un message</a>
        
        </div>
    
        <div class="show_profile_right">
            <table>
                <thead>
                    <tr>
                        <th class="th_photo">Photo</th>
                        <th>Titre</th>
                        <th>Auteur</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($books as $book): ?>
                        <tr>
                            <td><img src="<?php echo $book->getPicture(); ?>" alt="Couverture"></td>
                            <td><?php echo $book->getTitle(); ?></td>
                            <td><?php echo $book->getAuthor(); ?></td>
                            <td class="td_description"><?php echo $book->getDescription(); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php require __DIR__ . '/../templates/footer.php'; ?>
</body>

</html>