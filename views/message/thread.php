 <?php require __DIR__ . '/../templates/header.php'; ?>
 <p><?= htmlspecialchars($otherUser->getPseudo()) ?></p>
 <?php foreach ($messages as $message): ?>
     <div>
         <p><strong><?= htmlspecialchars($message->getContent()) ?></strong></p>

         <p><small><?= htmlspecialchars($message->getCreatedAt()) ?></small></p>
     </div>
 <?php endforeach; ?>

 <form action="index.php?controller=message&action=send" method="post">
     <input type="hidden" name="receiver_id" value="<?= $otherId ?>">
     <textarea name="content" required></textarea>
     <button type="submit">Envoyer</button>
 </form>

 <?php require __DIR__ . '/../templates/footer.php'; ?>