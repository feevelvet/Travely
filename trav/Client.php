<?php
session_start();

// Par défaut, si la langue n'est pas définie dans la session, on utilise le français
if (!isset($_SESSION['lang'])) {
    $_SESSION['lang'] = 'fr';
}

// Vérifier si la langue est changée
if (isset($_GET['lang'])) {
    $_SESSION['lang'] = $_GET['lang'];
}

// Inclure le fichier de langue approprié
$lang_file = 'lang-' . $_SESSION['lang'] . '.php';
if (file_exists($lang_file)) {
    include $lang_file;
}

// ... (votre connexion à la base de données et autres configurations)

// Le reste de votre code reste inchangé jusqu'à la fin de la section HEAD.

?>

<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/sty.css">
    <title>Travelly - Réservation de Vols</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>

<body>
    <header>
       <div class="nav">
            
            <ul>
                <li><a href="http://127.0.0.1:5501/html_sn1_tp1_jeremy_malin%20.html"><img src="./image/trav.jpg" alt="Logo de l'agence de voyage" class="logo"></a></li>
                <li><a href="trav.php">Acceuil</a></li>
                <li><a href="partenaire.php">Nos partenaires</a></li>
                <li><a href="https://www.instagram.com/ecoletravelling?utm_source=ig_web_button_share_sheet&igsh=OGQ5ZDc2ODk2ZA==" target="_blank">instagram</a></li>
                <li><a href="particulier.php" >Particulier</a></li>
                <li><a href="Contact.php">Nous Contacter</a></li>
                <li><?php if (isset($_SESSION['user_id'])) : ?>
                <a href="deconnexion.php"><button id="home-button"><?php echo $lang['logout']; ?></button></a>
                <?php else : ?>
                    <!-- Bouton de connexion -->
                    <a href="enregistre.php"><button id="home-button"><?php echo $lang['login']; ?></button></a>
                <?php endif; ?></a></li>
                <li><?php if ($_SESSION['lang'] == 'fr') : ?>
                    <a href="?lang=en"><img src="./image/en.jpeg" style="width: 30px;" alt="English"></a>
                <?php else : ?>
                    <a href="?lang=fr"><img src="./image/fr.jpeg" style="width: 30px;" alt="Français"></a>
                <?php endif; ?></li>
            </ul>

            
        </div>
    </header>

    <section id="about-particuliers" class="about-section">
        <div class="container">
            <div class="feature">
            <h2><?php echo $lang['about_particuliers_title']; ?></h2>
            <p><?php echo $lang['about_particuliers_description']; ?></p>
        </div>
        
            <div class="feature">
            <h2><?php echo $lang['why_choose_us_title']; ?></h2>
            </div>
            <div class="feature">
                <h3><?php echo $lang['feature1_title']; ?></h3>
                <p><?php echo $lang['feature1_description']; ?></p>
            </div>
            <div class="feature">
                <h3><?php echo $lang['feature2_title']; ?></h3>
                <p><?php echo $lang['feature2_description']; ?></p>
            </div>
            <div class="feature">
                <h3><?php echo $lang['feature3_title']; ?></h3>
                <p><?php echo $lang['feature3_description']; ?></p>
            </div>
        </div>
    </section>



    <!-- ... (autres sections que vous souhaitez ajouter) ... -->

    <footer>
        <p>&copy; 2023 Nom de l'Agence de Voyage. Tous droits réservés.</p>
    </footer>

    <!-- ... (votre formulaire de connexion/inscription reste inchangé) ... -->

</body>

</html>
