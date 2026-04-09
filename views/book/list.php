<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nos livres à l'échange</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php require __DIR__ . '/../templates/header.php'; ?>


    <?php if (empty($books)) : ?>
        <p>Aucun livre trouvé.</p>
    <?php endif; ?>

    <form action="index.php" method="get">
        <input type="hidden" name="controller" value="book">
        <input type="hidden" name="action" value="availableBooks">
        <input type="search" name="search" placeholder="Rechercher un livre..." value="<?php echo htmlspecialchars($search ?? ''); ?>">
        <button type="submit">Rechercher</button>
    </form>
    <?php foreach ($books as $book) : ?>
        <p><?php echo $book['title']; ?></p>
        <p><?php echo $book['description']; ?></p>
        <p><?php echo $book['author']; ?></p>
        <img src="<?php echo $book['picture']; ?>" alt="couverture">
        <p><?php echo $book['status'] == 1 ? 'Disponible' : 'Non disponible'; ?></p>
        <a href="index.php?controller=book&action=detail&id=<?php echo $book['id']; ?>">Voir le details</a>
    <?php endforeach; ?>
    <?php require __DIR__ . '/../templates/footer.php'; ?>


</body>

</html>