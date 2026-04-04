<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Mon compte - TomTroc</title>
</head>
<body>
    <h1>Mon compte</h1>

<table>
    
    <thead>
        <tr>
            
            <th>Photo</th>
           
            <th>Titre</th>
            
            <th>Auteur</th>
            
            <th>Description</th>

            <th>Disponibilité</th>

            <th>Actions</th>
        
        </tr>
    
    </thead>
        <tbody>
            <?php foreach ($books as $book): ?>
                <tr>
                    <td><img src="<?php echo $book['picture']; ?>" alt="Couverture du livre" width="100" /></td>
                    <td><?php echo $book['title']; ?></td>
                    <td><?php echo $book['author']; ?></td>
                    <td><?php echo $book['description']; ?></td>
                    <td><?php echo $book['status']; ?></td>
                    <td>
                        <a href="index.php?controller=book&action=edit&id=<?php echo $book['id']; ?>">Modifier</a>
                        <a href="index.php?controller=book&action=delete&id=<?php echo $book['id']; ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce livre ?');">Supprimer</a>
                    </td>

                </tr>
            <?php endforeach; ?>
        </tbody>
</table>

</body>
</html>