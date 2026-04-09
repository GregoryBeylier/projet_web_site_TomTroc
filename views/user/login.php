<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Connexion - TomTroc</title>
    <link rel="stylesheet" href="css/style.css" />
</head>

<body>
    <?php require __DIR__ . '/../templates/header.php'; ?>

    <h1>Connexion</h1>

    <?php if (isset($error['general'])) : ?>
        <span style="color: red; display: block;"><?php echo $error['general']; ?></span><br>
    <?php endif; ?>

    <form action="index.php?controller=user&action=login" method="post">
        <label for="email">Email :</label>
        <input type="email" id="email" name="email"><br>
        <?php if (isset($error['email'])) : ?>
            <span style="color: red; display: block;"><?php echo $error['email']; ?></span><br>
        <?php endif; ?>


        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password"><br>
        <?php if (isset($error['password'])) : ?>
            <span style="color: red; display: block;"><?php echo $error['password']; ?></span><br>
        <?php endif; ?>


        <button type="submit">Se connecter</button>
    </form>
    <?php require __DIR__ . '/../templates/footer.php'; ?>

</body>

</html>