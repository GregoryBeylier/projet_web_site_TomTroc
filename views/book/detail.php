<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détail du livre</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
</head>

<body>
    <?php require __DIR__ . '/../templates/header.php'; ?>
    <div class="breadcrumb">
        <a href="index.php?controller=book&action=availableBooks">Nos livres</a>
        <span> > </span>
        <span><?php echo htmlspecialchars($book->getTitle()); ?></span>
    </div>
    <div class="container_book_detail">
        <div class="book_detail_left">
            <img src="<?php echo $book->getPicture(); ?>" alt="couverture">
        </div>

        <div class="book_detail_right">
            <div class="book_detail_right_top">
                <h1><?php echo $book->getTitle(); ?></h1>
                <p class="book_author">par <?php echo $book->getAuthor(); ?></p>
                <hr>
                <p class="book_description_label">DESCRIPTION</p>
                <p class="book_description"><?php echo nl2br(htmlspecialchars_decode($book->getDescription())); ?></p>
                <p class="book_owner_label">PROPRIÉTAIRE</p>
                <div class="book_owner">
                    <img src="<?php echo $user->getProfilePhoto() ?: 'picture/default_profile.png'; ?>" alt="photo">
                    <a href="index.php?controller=user&action=showProfile&id=<?php echo $book->getUserId(); ?>">
                        <?php echo $user->getPseudo(); ?>
                    </a>
                </div>
            </div>

            <a href="index.php?controller=message&action=thread&id=<?php echo $book->getUserId(); ?>" class="btn_send_message">Envoyer un message</a>
        </div>
    </div>
    <?php require __DIR__ . '/../templates/footer.php'; ?>
</body>

</html>