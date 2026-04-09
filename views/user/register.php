<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Inscription - TomTroc</title>
</head>

<body>
    <?php require __DIR__ . '/../templates/header.php'; ?>

    <h1>Inscription</h1>
    <form action="index.php?controller=user&action=register" method="post" enctype="multipart/form-data">
        <?php if (isset($error['general'])) : ?>
            <span style="color: red; display: block;"><?php echo $error['general']; ?></span><br>
        <?php endif; ?>

        <label for="name">Nom :</label>
        <input type="text" id="name" name="name"><br>
        <?php if (isset($error['name'])) : ?>
            <span style="color: red; display: block;"><?php echo $error['name']; ?></span>
        <?php endif; ?>

        <label for="image">fichier de l'image</label>
        <input type="file" id="image" name="image"><br>
        <?php if (isset($error['image'])) : ?>
            <span style="color: red; display: block;"><?php echo $error['image']; ?></span>
        <?php endif; ?>


        <label for="firstname">Prénom :</label>
        <input type="text" id="firstname" name="firstname"><br>
        <?php if (isset($error['firstname'])) : ?>
            <span style="color: red; display: block;"><?php echo $error['firstname']; ?></span>
        <?php endif; ?>

        <label for="email">Email :</label>
        <input type="email" id="email" name="email"><br>
        <?php if (isset($error['email'])) : ?>
            <span style="color: red; display: block;"><?php echo $error['email']; ?></span>
        <?php endif; ?>

        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password"><br>
        <?php if (isset($error['password'])) : ?>
            <span style="color: red; display: block;"><?php echo $error['password']; ?></span>
        <?php endif; ?>

        <label for="pseudo">Pseudo :</label>
        <input type="text" id="pseudo" name="pseudo"><br>
        <?php if (isset($error['pseudo'])) : ?>
            <span style="color: red; display: block;"><?php echo $error['pseudo']; ?></span>
        <?php endif; ?>

        <button type="submit">S'inscrire</button>
    </form>
    <?php require __DIR__ . '/../templates/footer.php'; ?>

</body>

</html>