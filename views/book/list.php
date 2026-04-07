<!DOCTYPE html>
<html>
<body>
    <h1>acceuille</h1>
    <?php foreach ($books as $book) : ?>
        <p><?php echo $book['title']; ?></p>
        <p><?php echo $book['description']; ?></p>
        <p><?php echo $book['author']; ?></p>
        <img src="<?php echo $book['picture']; ?>" alt="couverture">
        <p><?php echo $book['status']; ?></p>
        <a href="index.php?controller=book&action=detail&id=<?php echo $book['id']; ?>">Voir le details</a>
    <?php endforeach; ?>
</body>
</html>