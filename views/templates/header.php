<?php
require_once __DIR__ . '/../../models/MessageManager.php';
require_once __DIR__ . '/../../config/DBConnect.php';

$currentController = $_GET['controller'] ?? 'home';
$currentAction = $_GET['action'] ?? 'index';

if (isset($_SESSION['user_id'])) {
    $messageManager = new MessageManager();
    $unreadCount = $messageManager->countUnreadMessages($_SESSION['user_id']);
} else {
    $unreadCount = 0;
}
?>
<header class="header">

    <head>
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
    </head>
    <a class="logo" href="index.php">
        <img src="picture/logo.png" alt="Logo TomTroc">
    </a>
    <nav class="header_nav">
        <ul class='header_link header_link_left'>
            <li><a href="index.php" class="<?= ($currentController === 'home' || !isset($_GET['controller'])) ? 'nav_active' : '' ?>">Accueil</a></li>
            <li><a href="index.php?controller=book&action=availableBooks" class="<?= ($currentController === 'book') ? 'nav_active' : '' ?>">Nos livres à l'échange</a></li>
        </ul>

        <ul class="header_link header_link_right">
            <li><a href="index.php?controller=message&action=conversations" class="<?= ($currentController === 'message') ? 'nav_active' : '' ?>">
                    <img src="/picture/message-icon.png" alt="messagerie" class="nav_icon">Messagerie <span class="nav_badge"><?= $unreadCount ?></span>
                </a>
            </li>
            <li><a href="index.php?controller=user&action=profile" class="<?= ($currentController === 'user') ? 'nav_active' : '' ?>">Mon compte</a></li>
            <?php if (isset($_SESSION['user_id'])): ?>

                <li><a href="index.php?controller=user&action=logout">Déconnexion</a></li>
            <?php else: ?>

                <li><a href="index.php?controller=user&action=login">Connexion</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>