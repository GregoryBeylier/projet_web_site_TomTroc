<?php require __DIR__ . '/../templates/header.php'; ?>

<main>
    <div class="container_edit_book">
        <a href="index.php?controller=book&action=availableBooks" class="btn_back">← retour</a>
        <h1>Ajouter un livre</h1>

        <div class="edit_book_layout">
           
            <div class="edit_book_left">
                <p class="edit_label">Photo</p>
                <img id="preview_picture" src="https://placehold.co/488x488?text=Ajouter+une+photo" alt="Aperçu du livre">
                <input type="file" id="picture" name="picture" required>
                <label for="picture" id="modifier_photo">Choisir une photo</label>
            </div>

            <div class="edit_book_right">
                <form action="index.php?controller=book&action=add" method="post" enctype="multipart/form-data">
                    <label for="title">Titre</label>
                    <input type="text" id="title" name="title" required>

                    <label for="author">Auteur</label>
                    <input type="text" id="author" name="author" required>

                    <label for="description">Commentaire</label>
                    <textarea id="description" name="description"></textarea>

                    <label for="available">Disponibilité</label>
                    <select id="available" name="status">
                        <option value="1">disponible</option>
                        <option value="0">indisponible</option>
                    </select>

                    <button type="submit" class="btn_valider">Ajouter le livre</button>
                </form>
            </div>
        </div>
    </div>
</main>

<?php require __DIR__ . '/../templates/footer.php'; ?>