<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détail du livre</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container_book_detail">
        <div class="book_detail_left">
            <img src="<?php echo $book->getPicture(); ?>" alt="couverture">
        </div>

        <div class="book_detail_right">
            <h1><?php echo $book->getTitle(); ?></h1>
            <p class="book_author">par <?php echo $book->getAuthor(); ?></p>
            <hr>
            <p class="book_description_label">DESCRIPTION</p>
            <p class="book_description"><?php echo $book->getDescription(); ?></p>
            <p class="book_owner_label">PROPRIÉTAIRE</p>
            <div class="book_owner">
                <img src="<?php echo $user->getProfilePhoto() ?: 'picture/default_profile.png'; ?>" alt="photo">
                <a href="index.php?controller=user&action=showProfile&id=<?php echo $book->getUserId(); ?>">
                    <?php echo $user->getPseudo(); ?>
                </a>
            </div>

            <a href="index.php?controller=message&action=thread&id=<?php echo $book->getUserId(); ?>" class="btn_send_message">Envoyer un message</a>
        </div>
    </div>
</body>

</html>