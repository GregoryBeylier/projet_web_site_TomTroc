<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détail du livre</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php require __DIR__ . '/../templates/header.php'; ?>
    <h1><?php echo $book->getTitle(); ?></h1>
    <p><strong>Auteur :</strong> <?php echo $book->getAuthor(); ?></p>
    <p><strong>Description :</strong> <?php echo $book->getDescription(); ?></p>
    <img src="<?php echo $book->getPicture(); ?>" alt="couverture">
    <p><a href="index.php?controller=user&action=showProfile&id=<?php echo $book->getUserId(); ?>">Propriétaire : <?php echo $user->getPseudo(); ?></a></p>
    <button><a href="index.php?controller=message&action=thread&id=<?php echo $book->getUserId(); ?>">Envoyer un message</a></button>
    <?php require __DIR__ . '/../templates/footer.php'; ?>
</body>

</html>