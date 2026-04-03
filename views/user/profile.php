<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Profil - TomTroc</title>
</head>
<body>
    <h1>Mon compte</h1>

    <div> 
        <?php
        $photo = !empty($user['profile_photo']) ? $user['profile_photo'] : 'default_profile.png';
        ?>
        <img src="<?php echo htmlspecialchars($photo); ?>" alt="Photo de profil" />
        <p>Pseudonyme : <?php echo htmlspecialchars($user['pseudo']); ?></p>
        <p>membre depuis le : <?php echo date('d/m/Y', strtotime($user['created_at'])); ?></p>
    </div>

    <form action="index.php?controller=user&action=updateProfile" method="post">
        
        <input type = "email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>">

        <input type="password" id="password" name="password" placeholder="Nouveau mot de passe">
        
        <input type = "text" id="pseudo" name="pseudo" value="<?php echo htmlspecialchars($user['pseudo']); ?>">

        <button type="submit">enrengistré</button>
    </form>


 
</body>
</html>

