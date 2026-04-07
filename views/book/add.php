<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un livre</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <main>
        <h1>Ajouter un livre</h1>

        <form action="index.php?controller=book&action=add" method ="post" enctype="multipart/form-data">
           <label for="image">Image du livre :</label>
            <input type="file" id="image" name="picture" required><br>
        
            <label for="title">Titre :</label>
            <input type="text" id="title" name="title" required><br>

            <label for="author">Auteur :</label>
            <input type="text" id="author" name="author" required><br>

            <label for="description">Description :</label><br>
            <textarea id="description" name="description" rows="4" cols="50"></textarea><br>

            <label for="available">disponibilité :</label>
            <select id="available" name="status">
                <option value="1">disponible</option>
                <option value="0">indisponible</option>
            </select><br>

            <button type="submit">Ajouter le livre</button>
        </form>

    </main>
</body>
</html>