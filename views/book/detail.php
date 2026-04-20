<?php require __DIR__ . '/../templates/header.php'; ?>
<div class="breadcrumb">
    <a href="index.php?controller=book&action=availableBooks">Nos livres</a>
    <span> > </span>
    <span><?php echo strip_tags(htmlspecialchars_decode($book->getTitle())); ?></span>
</div>
<div class="container_book_detail">
    <div class="book_detail_left">
        <img src="<?php echo htmlspecialchars($book->getPicture()); ?>" alt="couverture">
    </div>
    <div class="book_detail_right">
        <div class="book_detail_right_top">
            <h1><?php echo strip_tags(htmlspecialchars_decode($book->getTitle())); ?></h1>
            <p class="book_author_detail">par <?php echo strip_tags(htmlspecialchars_decode($book->getAuthor())); ?></p>
            <hr>
            <p class="book_description_label">DESCRIPTION</p>
            <p class="book_description"><?php echo nl2br(strip_tags(htmlspecialchars_decode($book->getDescription()))); ?></p>
            <p class="book_owner_label">PROPRIÉTAIRE</p>
            <div class="book_owner">
                <?php $ownerPhoto = !empty($user->getProfilePhoto()) ? $user->getProfilePhoto() : 'picture/users/default_profile.png'; ?>
                <img src="<?php echo htmlspecialchars($ownerPhoto); ?>" alt="photo">
                <a href="index.php?controller=user&action=showProfile&id=<?php echo $book->getUserId(); ?>">
                    <?php echo strip_tags(htmlspecialchars_decode($user->getPseudo())); ?>
                </a>
            </div>
        </div>
        <a href="index.php?controller=message&action=conversations&id=<?php echo $book->getUserId(); ?>" class="btn_send_message">Envoyer un message</a>
    </div>
</div>
<?php require __DIR__ . '/../templates/footer.php'; ?>