<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php foreach ($messages as $message): ?>
    <div>
        <p><strong><?= htmlspecialchars($message['sender_id']) ?>:</strong> <?= htmlspecialchars($message['content']) ?></p>
        <p><small><?= htmlspecialchars($message['created_at']) ?></small></p>
    </div>
<?php endforeach; ?>

<form action="index.php?controller=message&action=send" method="post">
    <input type="hidden" name="receiver_id" value="<?= $otherId ?>">
    <textarea name="content" required></textarea>
    <button type="submit">Envoyer</button>
</form>

</body>
</html>