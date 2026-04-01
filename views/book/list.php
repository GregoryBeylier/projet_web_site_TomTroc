<!DOCTYPE html>
<html>
<body>
    <h1>Book List</h1>
    <?php foreach ($books as $book) : ?>
        <p><?php echo $book['title']; ?></p>
        <p><?php echo $book['description']; ?></p>
        <p><?php echo $book['author']; ?></p>
    <?php endforeach; ?>
</body>
</html>