<?php require __DIR__ . '/../templates/header.php'; ?>

<div class="container_auth">

    <div class="auth_form">
        <h1>Connexion</h1>

        <?php if (isset($error['general'])) : ?>
            <span class="warning"><?php echo $error['general']; ?></span><br>
        <?php endif; ?>

        <form action="index.php?controller=user&action=login" method="post">
            <label for="email">Adresse email :</label>
            <input type="email" id="email" name="email"><br>
            <?php if (isset($error['email'])) : ?>
                <span class="warning"><?php echo $error['email']; ?></span><br>
            <?php endif; ?>

            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password"><br>
            <?php if (isset($error['password'])) : ?>
                <span class="warning"><?php echo $error['password']; ?></span><br>
            <?php endif; ?>

            <button type="submit">Se connecter</button>
        </form>

        <p class="register">Pas de compte ?&nbsp;<a href="index.php?controller=user&action=register">Inscrivez-vous</a></p>

    </div>

    <div class="auth_form_image">
        <img src="picture/imageLogin.png" alt="imageLogin.png">
    </div>

</div>
<?php require __DIR__ . '/../templates/footer.php'; ?>