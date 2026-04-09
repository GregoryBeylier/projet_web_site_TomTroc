<header>
    <a href="index.php">
        <img src="picture/logo.png" alt="Logo TomTroc" class="logo">
    </a>
    <nav>
        <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="index.php?controller=book&action=availableBooks">Nos livres à l'échange</a></li>
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