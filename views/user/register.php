<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Inscription - TomTroc</title>
    <link rel="stylesheet" href="css/style.css" />
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
</head>

<body>
    <?php require __DIR__ . '/../templates/header.php'; ?>

    <div class="container_auth">

        <div class="auth_form">
            <h3>Inscription</h3>
            <form action="index.php?controller=user&action=register" method="post" enctype="multipart/form-data">
                <?php if (isset($error['general'])) : ?>
                    <span style="color: red; display: block;"><?php echo $error['general']; ?></span><br>
                <?php endif; ?>

                  <label for="pseudo">Pseudo :</label>
                <input type="text" id="pseudo" name="pseudo"><br>
                <?php if (isset($error['pseudo'])) : ?>
                    <span style="color: red; display: block;"><?php echo $error['pseudo']; ?></span>
                <?php endif; ?>
        
                <label for="email">Adresse email :</label>
                <input type="email" id="email" name="email"><br>
                <?php if (isset($error['email'])) : ?>
                    <span style="color: red; display: block;"><?php echo $error['email']; ?></span>
                <?php endif; ?>

                <label for="password">Mot de passe :</label>
                <input type="password" id="password" name="password"><br>
                <?php if (isset($error['password'])) : ?>
                    <span style="color: red; display: block;"><?php echo $error['password']; ?></span>
                <?php endif; ?>


                <button type="submit">S'inscrire</button>
            </form>

            <p class="register">Déja inscrit ?&nbsp;<a href="index.php?controller=user&action=login">Connectez-vous</a></p>

        </div>

        <div class="auth_form_image">
            <img src="picture/imageLogin.png" alt="imageLogin.png">
        </div>



    </div>


    <?php require __DIR__ . '/../templates/footer.php'; ?>

</body>

</html>