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
$lang_file = '/php/lang-' . $_SESSION['lang'] . '.php';
if (file_exists($lang_file)) {
    include $lang_file;
}
// Connexion à la base de données (à adapter selon tes paramètres)
$connexion = new mysqli('localhost', 'root', 'root', 'Trav');
$villeDepart = isset($_GET['depart']) ? $_GET['depart'] : '';
$villeArrivee = isset($_GET['destination']) ? $_GET['destination'] : '';

// Vérifier la connexion
if ($connexion->connect_error) {
    die('Erreur de connexion à la base de données : ' . $connexion->connect_error);
}
if (isset($_GET['all']) && $_GET['all'] == 'true') {
    $requete = "SELECT * FROM vols";
}else{$requete = "SELECT * FROM Vols WHERE ville_depart = ? AND ville_arrivee = ?";

}

// Récupérer les filtres

// Utiliser une requête préparée pour éviter les problèmes de sécurité

$result = $connexion->prepare($requete);

if ($connexion->connect_error) {
    die('Erreur de connexion à la base de données : ' . $connexion->connect_error);
}

if (!$result) {
    die('Erreur dans la requête : ' . $connexion->error);
}

// Lier les paramètres à la requête
$result->bind_param("ss", $villeDepart, $villeArrivee);

// Exécuter la requête
$result->execute();

// Récupérer le résultat
$resultat = $result->get_result();


// Fermer la requête préparée
$result->close();

// ... le reste de votre code ...


$afficherTout = isset($_GET['all']) && $_GET['all'] == 'true';
$connexion->close();

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

<body >

    
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
                <a href="deconnexion.php"><button id="home"><?php echo $lang['logout']; ?></button></a>
                <?php else : ?>
                    <!-- Bouton de connexion -->
                    <a href="enregistre.php"><button id="home"><?php echo $lang['login']; ?></button></a>
                <?php endif; ?></a></li>
                <li><?php if ($_SESSION['lang'] == 'fr') : ?>
                    <a href="?lang=en"><img src="./image/en.jpeg" style="width: 30px;" alt="English"></a>
                <?php else : ?>
                    <a href="?lang=fr"><img src="./image/fr.jpeg" style="width: 30px;" alt="Français"></a>
                <?php endif; ?></li>
            </ul>

            
        </div>


<div id="carouselExample" class="carousel slide" data-ride="carousel" data-interval="false">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="./image/Voyage1.jpeg" class="d-block w-100 " style="width: 100%; height: 600px" alt="Diaporama 1">
                </div>
                <div class="carousel-item">
                    <img src="./image/Voyage2.jpeg" class="d-block w-100" style="width: 100%; height: 600px" alt="Diaporama 2">
                </div>
                <div class="carousel-item">
                    <img src="./image/Voyage3.jpeg" class="d-block w-100" style="width: 100%; height: 600px" alt="Diaporama 3">
                </div>
                <div class="carousel-item">
                    <img src="./image/Voyage4.jpeg" class="d-block w-100" style="width: 100%; height: 600px" alt="Diaporama 4">
                </div>
                <div class="carousel-item">
                    <img src="./image/Voyage5.jpeg" class="d-block w-100" style="width: 100%; height: 600px" alt="Diaporama 5">
                </div>
                <div class="carousel-item">
                    <img src="./image/Voyage6.jpeg" class="d-block w-100" style="width: 100%; height: 600px" alt="Diaporama 6">
                </div>
                <div class="carousel-item">
                    <img src="./image/Voyage7.jpeg" class="d-block w-100" style="width: 100%; height: 600px" alt="Diaporama 7">
                </div>
                <div class="carousel-item">
                    <img src="./image/Voyage8.jpeg" class="d-block w-100" style="width: 100%; height: 600px" alt="Diaporama 8">
                </div>
                <div class="carousel-item">
                    <img src="./image/Voyage9.jpeg" class="d-block w-100" style="width: 100%; height: 600px" alt="Diaporama 9">
                </div>
                <div class="carousel-item">
                    <img src="./image/Voyage10.jpeg" class="d-block w-100" style="width: 100%; height: 600px" alt="Diaporama10 ">
                </div>
                <div class="carousel-item">
                    <img src="./image/Voyage11.jpeg" class="d-block w-100" style="width: 100%; height: 600px" alt="Diaporama 11">
                </div>
                <div class="carousel-item">
                    <img src="./image/Voyage12.jpeg" class="d-block w-100" style="width: 100%; height: 600px" alt="Diaporama 12">
                </div>
                <div class="carousel-item">
                    <img src="./image/Voyage13.jpeg" class="d-block w-100" style="width: 100%; height: 600px" alt="Diaporama 13">
                </div>
                
            </div>
            <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExample" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </header>


    
    



   <form method="get" action="trav.php">
        <label for="depart">Ville de départ :</label>
    <select name="depart">
        <option value="Paris">Paris</option>
        <option value="Montpellier">Montpellier</option>
        <option value="Nimes">Nîmes</option>
        <option value="Marseille">Marseille</option>
        <option value="Toulouse">Toulouse</option>
        <option value="Bretagne">Bretagne</option>
        <!-- Ajoutez d'autres options pour les différentes villes -->
    </select>

    <label for="destination">Destination :</label>
    <select name="destination">
        <option value="Paris">Paris</option>
        <option value="Montpellier">Montpellier</option>
        <option value="Nimes">Nîmes</option>
        <option value="Marseille">Marseille</option>
        <option value="Toulouse">Toulouse</option>
        <option value="Bretagne">Bretagne</option>
        <!-- Ajoutez d'autres options pour les différentes villes -->
    </select>

        

        <button type="submit">Rechercher</button>
    </form>
<section class="room-list">
    <?php
            if (isset($_GET['all']) && $_GET['all'] == 'true') {
    while ($row = $resultat->fetch_assoc()) {
                echo '<article class="flight">';
                echo '<h2> Départ : ' . $row['ville_depart'] . '</h2>';
                echo '<p>Arrivé : ' . $row['ville_arrivee'] . '</p>';
                echo '<p>Le : ' . $row['date_depart'] . '</p>';
                echo '<p>Depart a : ' . $row['heure_depart'] . '</p>';
                echo '<p>arrivé a : ' . $row['heure_retour'] . '</p>';
                echo '<p>' . $row['prix_vol'] . '€</p>';
                echo '<p>Sieges disponible: ' . $row['places_disponibles'] . '</p>';
              echo '<a href="resh1.php?id_vol=' . urlencode($row['id_vol']) . '"><button>Réserver</button></a>';
                echo '</article>';

            }
             echo '</section>';
  }  
else {
        if (isset($_GET['depart']) || isset($_GET['destination']) || isset($_GET['all']) && $_GET['all'] == 'true') {
        if ($resultat->num_rows > 0) {
            echo '<section class="room-list">';
            while ($row = $resultat->fetch_assoc()) {
                echo '<article class="flight">';
                echo '<h2> Départ : ' . $row['ville_depart'] . '</h2>';
                echo '<p>Arrivé : ' . $row['ville_arrivee'] . '</p>';
                echo '<p>Le : ' . $row['date_depart'] . '</p>';
                echo '<p>Depart a : ' . $row['heure_depart'] . '</p>';
                echo '<p>arrivé a : ' . $row['heure_retour'] . '</p>';
                echo '<p>' . $row['prix_vol'] . '€</p>';
                echo '<p>Sieges disponible: ' . $row['places_disponibles'] . '</p>';
               echo '<a href="resh1.php?id_vol=' . urlencode($row['id_vol']) . '"><button>Réserver</button></a>';

                echo '</article>';

            }
             echo '</section>';
        } else {
            echo 'Aucun vole ne dessert ces deux villes.';
        }
     }
     else {
     if ($resultat->num_rows > 0) {
            echo '<section class="room-list">';
            while ($row = $resultat->fetch_assoc()) {
                echo '<article class="flight">';
                echo '<h2>' . $row['ville_depart'] . '</h2>';
                echo '<p>' . $row['ville_arrivee'] . '</p>';
                echo '<h2>' . $row['date_depart'] . '</h2>';
                echo '<p>' . $row['date_retour'] . '</p>';
                echo '<p>' . $row['prix_vol'] . '€</p>';
                echo '<p>Place disponible: ' . $row['places_disponibles'] . '</p>';
               echo '<a href="resh1.php?id_vol=' . urlencode($row['id_vol']) . '"><button>Réserver</button></a>';
                echo '</article>';

            }
             echo '</section>';
        }
}
   


}
        ?>
        
<?php
if ($afficherTout) {
    echo '<a href="?all=false" class="show-all-btn">Fermer</a>';
} else {
    echo '<a href="?all=true" class="show-all-btn">Proposer des vols </a>';
}
?>
</section>
    <footer>
    <p>&copy; 2023 Nom de l'Agence de Voyage. Tous droits réservés.</p>
</footer>


    

    </body>

</html>
