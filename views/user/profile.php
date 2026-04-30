 <?php require __DIR__ . '/../templates/header.php'; ?>

 <div class="container_profile">
     <h1>Mon compte</h1>

     <div class="profile_info">
         <div class="profile_top">

             <?php
                $photo = !empty($user->getProfilePhoto()) ? $user->getProfilePhoto() : 'picture/users/default_profile.png';
                ?>
             <img class="photo_profile " src="<?php echo htmlspecialchars($photo); ?>" alt="Photo de profil">

             <form action="index.php?controller=user&action=updateProfilePhoto" method="post" enctype="multipart/form-data">

                 <label for="profile_picture" class="sr-only">Photo de profil</label>
                 <input type="file" id="profile_picture" name="picture" aria-label="Photo de profil">

                 <?php if (isset($error['image'])) : ?>
                     <span class="warning"><?php echo $error['image']; ?></span>
                 <?php endif; ?>

                 <a href="#" id="modifier">modifier</a>

             </form>

             <hr>

             <div class="pseudo">
                 <p><?php echo strip_tags(htmlspecialchars_decode($user->getPseudo())); ?></p>
             </div>


             <p class="membre">Membre depuis
                 <?php
                    $created = new DateTime($user->getCreatedAt());
                    $now = new DateTime();
                    $diff = $created->diff($now);
                    if ($diff->y > 0) {
                        echo $diff->y . ' an' . ($diff->y > 1 ? 's' : '');
                    } elseif ($diff->m > 0) {
                        echo $diff->m . ' mois';
                    } else {
                        echo 'moins d\'un mois';
                    }
                    ?>
             </p>

             <div class="library_group">
                 <p class="library">BIBLIOTHÈQUE</p>
                 <div class="library_section">
                     <img class="library_icon" src="picture/book-icon.png" alt="bibliothèque">
                     <p class="library_count"><?php echo count($books); ?> livres</p>
                 </div>
             </div>
         </div>

         <div class="profile_card">
             <p>Vos informations personnelles</p>
             <form action="index.php?controller=user&action=updateProfile" method="post">
                 <label for="email">Adresse email</label>
                 <input type="email" id="email" name="email" value="<?php echo strip_tags(htmlspecialchars_decode($user->getEmail())); ?>">

                 <label for="password">Nouveau Mot de passe</label>
                 <input type="password" id="password" name="password">

                 <label for="pseudo">Pseudo</label>
                 <input type="text" id="pseudo" name="pseudo" value="<?php echo strip_tags(htmlspecialchars_decode($user->getPseudo())); ?>"><br>

                 <button class="btn_profile_outline" type="submit">Enregister</button>
             </form>
         </div>
     </div>

     <div class="personal_library">
         <table>
             <thead>
                 <tr>
                     <th>Photo</th>
                     <th>Titre</th>
                     <th>Auteur</th>
                     <th>Description</th>
                     <th>Disponibilité</th>
                     <th>Actions <a class="btn_edit" href="index.php?controller=book&action=add">+</a></th>
                 </tr>
             </thead>

             <tbody>
                 <?php foreach ($books as $book): ?>
                     <tr>
                         <td><img src="<?php echo htmlspecialchars($book->getPicture()); ?>" alt="Couverture du livre" width="100"></td>
                         <td><?php echo strip_tags(htmlspecialchars_decode($book->getTitle())); ?></td>
                         <td><?php echo strip_tags(htmlspecialchars_decode($book->getAuthor())); ?></td>
                         <td class="td_description"><?php echo mb_strimwidth(strip_tags(htmlspecialchars_decode($book->getDescription())), 0, 100, '...'); ?></td>
                         <td><?php echo $book->getStatus() == 1 ? '<span class="badge_disponible">disponible</span>' : '<span class="badge_indisponible">non dispo</span>'; ?></td>
                         <td>
                             <a class="btn_edit" href="index.php?controller=book&action=edit&id=<?php echo $book->getId(); ?>">Éditer</a>
                             <a class="btn_delete" href="index.php?controller=book&action=delete&id=<?php echo $book->getId(); ?>" onclick="return confirm('Êtes-vous sûr ?');">Supprimer</a>
                         </td>
                     </tr>
                 <?php endforeach; ?>
             </tbody>
         </table>
     </div>
 </div>

 <?php require __DIR__ . '/../templates/footer.php'; ?>