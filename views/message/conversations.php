<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

<body>
    <?php require __DIR__ . '/../templates/header.php'; ?>

    <h1>Conversations</h1>

    <?php foreach ($conversations as $conversation): ?>
        <div>
            <h2><?= htmlspecialchars($conversation['pseudo']) ?></h2>
            <a href="index.php?controller=message&action=thread&id=<?= $conversation['id'] ?>">Voir la conversation</a>
            <img src="<?= $conversation['profile_photo'] ?? 'default_profile.png' ?>" alt="photo">
        </div>
    <?php endforeach; ?>
    <?php require __DIR__ . '/../templates/footer.php'; ?>

</body>

</html>