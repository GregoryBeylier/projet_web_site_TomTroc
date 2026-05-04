<?php require __DIR__ . '/../templates/header.php'; ?>

<div class="container_show_profile">
    <div class="show_profile_left">
        <?php $photo = !empty($user->getProfilePhoto()) ? $user->getProfilePhoto() : 'picture/users/default_profile.png'; ?>
        <div class="show_profile_left_top">
            <img class="photo_profile" src="<?php echo htmlspecialchars($photo); ?>" alt="Photo de profil">

            <hr>
            <div class="pseudo">
                <p><?php echo htmlspecialchars($user->getPseudo(), ENT_NOQUOTES); ?></p>
            </div>
            <p class="membre">Membre depuis
                <?php
                $created = new DateTime($user->getCreatedAt());
                $now = new DateTime();
                $diff = $created->diff($now);
                if ($diff->y > 0) echo $diff->y . ' an' . ($diff->y > 1 ? 's' : '');
                elseif ($diff->m > 0) echo $diff->m . ' mois';
                else echo 'moins d\'un mois';
                ?></p>
            <div class="library_group">
                <p class="library">BIBLIOTHÈQUE</p>
                <div class="library_section">
                    <img class="library_icon" src="picture/book-icon.png" alt="bibliothèque">
                    <p class="library_count"><?php echo count($books); ?> livres</p>
                </div>
            </div>
        </div>

        <a href="index.php?controller=message&action=conversations&id=<?php echo $user->getId(); ?>" class="btn_message">Écrire un message</a>

    </div>

    <div class="show_profile_right">
        <table>
            <thead>
                <tr>
                    <th class="th_photo">Photo</th>
                    <th>Titre</th>
                    <th>Auteur</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($books as $book): ?>
                    <tr>
                        <td><img src="<?php echo htmlspecialchars($book->getPicture()); ?>" alt="Couverture"></td>
                        <td><?php echo htmlspecialchars($book->getTitle(), ENT_NOQUOTES); ?></td>
                        <td><?php echo htmlspecialchars($book->getAuthor(), ENT_NOQUOTES); ?></td>
                        <td class="td_description"><?php echo mb_strimwidth(htmlspecialchars($book->getDescription(), ENT_NOQUOTES), 0, 100, '...'); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php require __DIR__ . '/../templates/footer.php'; ?>