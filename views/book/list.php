 <?php require __DIR__ . '/../templates/header.php'; ?>

 <div class="container_list">
     <div class="list_header">
         <h1>Nos livres à l'échange</h1>
         <form action="index.php" method="get">
             <input type="hidden" name="controller" value="book">
             <input type="hidden" name="action" value="availableBooks">
             <div class="search_wrapper">
                 <img src="picture/search-icon.png" alt="rechercher" class="search_icon">
                 <label for="search" class="sr-only">Rechercher un livre</label>
                 <input type="search" id="search" name="search" placeholder="Rechercher un livre" value="<?php echo htmlspecialchars($search ?? ''); ?>">
                 <button type="submit">Rechercher</button>
             </div>
         </form>
     </div>

     <?php if (empty($books)) : ?>
         <p>Aucun livre trouvé.</p>
     <?php endif; ?>

     <div class="books_grid">
         <?php foreach ($books as $book) : ?>
             <a class="book_card_list" href="index.php?controller=book&action=detail&id=<?php echo $book->getId(); ?>">
                 <img src="<?php echo htmlspecialchars($book->getPicture()); ?>" alt="couverture">
                 <div class="book_card_list_info">
                     <p class="book_title"><?php echo htmlspecialchars($book->getTitle(), ENT_NOQUOTES); ?></p>
                     <p class="book_author"><?php echo htmlspecialchars($book->getAuthor(), ENT_NOQUOTES); ?></p>
                     <p class="book_user">Vendu par <?php echo htmlspecialchars($book->getPseudo() ?? '', ENT_NOQUOTES); ?></p>
                 </div>
             </a>
         <?php endforeach; ?>
     </div>
 </div>

 <?php require __DIR__ . '/../templates/footer.php'; ?>