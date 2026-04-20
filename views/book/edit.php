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
                <input type="file" id="edit_picture" name="picture">
                <label>Titre</label>
                <input type="text" name="title" value="<?php echo htmlspecialchars_decode($book->getTitle()); ?>" required>

                <label>Auteur</label>
                <input type="text" name="author" value="<?php echo htmlspecialchars_decode($book->getAuthor()); ?>" required>

                <label>Commentaire</label>
                <textarea name="description" rows="8"><?php echo htmlspecialchars_decode($book->getDescription()); ?></textarea>

                <label>Disponibilité</label>
                <select name="status">
                    <option value="1" <?php if ($book->getStatus() == 1) echo 'selected'; ?>>disponible</option>
                    <option value="0" <?php if ($book->getStatus() == 0) echo 'selected'; ?>>indisponible</option>
                </select>

                <button type="submit" class="btn_valider">Valider</button>
            </form>
        </div>
    </div>
</div>

<?php require __DIR__ . '/../templates/footer.php'; ?>