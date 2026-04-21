<?php require __DIR__ . '/../templates/header.php'; ?>

<div class="container_edit_book">
    <a href="index.php?controller=book&action=detail&id=<?php echo $book->getId(); ?>" class="btn_back">← retour</a>
    <h1>Modifier les informations</h1>

    <div class="edit_book_layout">
        <div class="edit_book_left">
            <p class="edit_label">Photo</p>
            <img src="<?php echo htmlspecialchars($book->getPicture()); ?>" alt="couverture">
            <a href="#" id="modifier_photo">Modifier la photo</a>
        </div>

        <div class="edit_book_right">
            <form action="index.php?controller=book&action=edit&id=<?php echo $book->getId(); ?>" method="post" enctype="multipart/form-data">
                <label for="edit_picture" class="sr-only">Photo du livre</label>
                <input type="file" id="edit_picture" name="picture">

                <label for="title">Titre</label>
                <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($book->getTitle()); ?>" required>

                <label for="author">Auteur</label>
                <input type="text" id="author" name="author" value="<?php echo htmlspecialchars($book->getAuthor()); ?>" required>

                <label for="description">Commentaire</label>
                <textarea name="description" id="description" rows="8"><?php echo htmlspecialchars($book->getDescription()); ?></textarea>

                <label for="status">Disponibilité</label>
                <select id="status" name="status">
                    <option value="1" <?php if ($book->getStatus() == 1) echo 'selected'; ?>>disponible</option>
                    <option value="0" <?php if ($book->getStatus() == 0) echo 'selected'; ?>>indisponible</option>
                </select>

                <button type="submit" class="btn_valider">Valider</button>
            </form>
        </div>
    </div>
</div>

<?php require __DIR__ . '/../templates/footer.php'; ?>