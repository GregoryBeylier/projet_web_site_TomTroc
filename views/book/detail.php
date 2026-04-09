<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détail du livre</title>
</head>

<body>
    <?php require __DIR__ . '/../templates/header.php'; ?>
    <h1><?php echo $book['title']; ?></h1>
    <p><strong>Auteur :</strong> <?php echo $book['author']; ?></p>
    <p><strong>Description :</strong> <?php echo $book['description']; ?></p>
    <img src="<?php echo $book['picture']; ?>" alt="couverture">
    <p><a href="index.php?controller=user&action=showProfile&id=<?php echo $book['user_id']; ?>">Propriétaire : <?php echo $user['pseudo']; ?></a></p>
    <button><a href="index.php?controller=message&action=thread&id=<?php echo $book['user_id']; ?>">Envoyer un message</a></button>
    <?php require __DIR__ . '/../templates/footer.php'; ?>
</body>

</html>