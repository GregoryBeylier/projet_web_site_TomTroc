<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Éditer un livre</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php require __DIR__ . '/../templates/header.php'; ?>
    <h1>Éditer un livre</h1>

    <form action="index.php?controller=book&action=edit&id=<?php echo $book->getId(); ?>" method="post" enctype="multipart/form-data">
        <label for="image">Image du livre :</label>
        <input type="file" id="image" name="picture"><br>

        <label for="title">Titre :</label>
        <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($book->getTitle()); ?>" required><br>

        <label for="author">Auteur :</label>
        <input type="text" id="author" name="author" value="<?php echo htmlspecialchars($book->getAuthor()); ?>" required><br>

        <label for="description">Description :</label><br>
        <textarea id="description" name="description" rows="4" cols="50"><?php echo htmlspecialchars($book->getDescription()); ?></textarea><br>

        <label for="available">disponibilité :</label>
        <select id="available" name="status">
            <option value="1" <?php if ($book->getStatus() == 1) echo 'selected'; ?>>disponible</option>
            <option value="0" <?php if ($book->getStatus() == 0) echo 'selected'; ?>>indisponible</option>
        </select><br>

        <button type="submit">Modifier le livre</button>
    </form>
    <?php require __DIR__ . '/../templates/footer.php'; ?>

</body>

</html>