<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
    <title>Accueil - TomTroc</title>
</head>

<body>
    <?php require __DIR__ . '/templates/header.php'; ?>

    <div class="container_home">
        <div class="hero_text">
            <h1>Rejoignez nos lecteurs passionnés</h1>
            <p>Donnez une nouvelle vie à vos livres en les échangeant avec d'autres amoureux de la lecture. Nous croyons en la magie du partage de connaissances et d'histoires à travers les livres.</p>
            <a href="index.php?controller=book&action=availableBooks" class="btn_decouvrir">Découvrir</a>
        </div>

        <div class="hero_image">
            <img src="picture/accueil.png" alt="accueil.png">
            <p class="hero_image_credit">Hamza</p>
        </div>
    </div>

    <div class="book_section">
        <h2>Les derniers livres ajoutés</h2>

        <div class="book_grid">
            <?php foreach ($lastBooks as $book) : ?>

                <a class="book_card" href="index.php?controller=book&action=detail&id=<?php echo $book->getId(); ?>">
                    <img src="<?php echo $book->getPicture(); ?>" alt="couverture">
                    <p class="book_title"><?php echo strip_tags(htmlspecialchars_decode($book->getTitle())); ?></p>
                    <p class="book_author"><?php echo strip_tags(htmlspecialchars_decode($book->getAuthor())); ?></p>
                    <p class="book_user">Vendu par <?php echo strip_tags(htmlspecialchars_decode($book->getPseudo())); ?></p>
                </a>
            <?php endforeach; ?>
        </div>

        <a href="index.php?controller=book&action=availableBooks" class="btn_decouvrir">Voir tous les livres</a>

    </div>

    <div class="how_section">
        <h2>Comment ça marche</h2>
        <h3>Échanger des livres avec TomTroc c’est simple et amusant ! Suivez ces étapes pour commencer :</h3>
        <div class="how_grid">
            <div class="how_card ">
                <p>Inscrivez-vous gratuitement sur notre plateforme.</p>
            </div>
            <div class="how_card ">
                <P>Ajoutez les livres que vous souhaitez échanger à votre profil.</P>
            </div>
            <div class="how_card ">
                <p>Parcourez les livres disponibles chez d'autres membres.</p>
            </div>
            <div class="how_card ">
                <p>Proposez un échange et discutez avec d'autres passionnés de lecture.</p>
            </div>
        </div>

        <a href="index.php?controller=book&action=availableBooks" class="btn_outline">Voir tous les livres</a>

    </div>

    <div class="banner_section">
        <img src="picture/maskgroup.png" alt="maskgroup.png">
    </div>

    <div class="values_section">


        <div class="values_text">
            <h2>Nos valeurs</h2>
            <p>Chez TomTroc, nous mettons l'accent sur le partage, la découverte et la communauté. Nos valeurs sont ancrées dans notre passion pour les livres et notre désir de créer des liens entre les lecteurs. Nous croyons en la puissance des histoires pour rassembler les gens et inspirer des conversations enrichissantes.</p>
            <p>Notre association a été fondée avec une conviction profonde : chaque livre mérite d'être lu et partagé.</p>
            <p>Nous somme passionnés par la création d'une plateforme conviviale qui permet aux lecteurs de se connecter, de partager leur découvertes littéraires et d'échanger des livres qui attendent patiemment sur les étagères.</p>
            <h3>L'équipe Tomtroc</h3>
        </div>

        <div class="values_image">
            <img src="picture/vector.png" alt="vector.png">

        </div>

    </div>














    <?php require __DIR__ . '/templates/footer.php'; ?>
</body>

</html>