<header class="header">
    <a class="logo" href="index.php">
        <img src="picture/logo.png" alt="Logo TomTroc">
    </a>
    <nav class="header_nav">
        <ul class='header_link header_link_left'>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="index.php?controller=book&action=availableBooks">Nos livres à l'échange</a></li>
        </ul>

        <ul class="header_link header_link_right">
            <li><a href="index.php?controller=message&action=conversations">Méssagerie</a></li>
            <li><a href="index.php?controller=user&action=profile">Mon compte</a></li>
            <?php if (isset($_SESSION['user_id'])): ?>

                <li><a href="index.php?controller=user&action=logout">Déconnexion</a></li>
            <?php else: ?>

                <li><a href="index.php?controller=user&action=login">Connexion</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>