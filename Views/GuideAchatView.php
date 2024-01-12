<?php


require_once ('../Controllers/GuideAchatController.php');

class GuideAchatView {

    
    function afficherGuidePage() {
        $controller = new GuideAchatController();
        $result = $controller->getGuideAchat();
        $vehicules = $controller->getvehicles();

        echo '
        <body>
            <div class="header">
                <h1 style="margin-top: 70px; ">Guide d\'achat</h1>
                <img src="' . $result[0]['img'] . '" alt="Image de guide d\'achat">
            </div>

            <div class="main-content">
                <div class="articlev">
                    <h2>' . $result[0]['titre'] . '</h2>
                    <p>' . $result[0]['contenu'] . '</p>
                </div>
                <p>Date de publication : ' . $result[0]['date_pub'] . '</p>
                <h2 style="margin-top: 70px; margin-bottom: 70px;text-align: center;">Voir plus de véhicules !</h2>              
                  <div class="vehicle-cards">
        ';

        // Parcourir les véhicules pour les afficher
        foreach ($vehicules as $vehicule) {
            //var_dump("le user est  ", $_SESSION['user_id']);
            //var_dump("le vehicule est  ", $vehicule['id_vehicule']);
            if(isset($_SESSION['user_name']) && isset($_SESSION['user_id'])&&isset($_SESSION['user_status'])&&$_SESSION['user_status']!='bloque'&&$_SESSION['user_status']!='en attente') {

            $exists = $controller->checkIfFavoriteExists($_SESSION['user_id'], $vehicule['id_vehicule']);}
            //var_dump("le resultat de exists est ", $exists);
            echo '
            <div class="vehicle-card">

            <div class="favorite-icon">';
            if (isset($_SESSION['user_name']) && isset($_SESSION['user_id']) && isset($_SESSION['user_status']) && $_SESSION['user_status'] != 'bloque' && $_SESSION['user_status'] != 'en attente') {
                if ($exists == 1) {
                    echo '<img id="addedfav" src="../Assets/guide/addedfav.png" alt="Added to Favorites" style="width: 24px; height: 24px;" data-user-id="' . $_SESSION['user_id'] . '" data-vehicule-id="' . $vehicule['id_vehicule'] . '">';
                } else {
                    echo '<img id="addfav" src="../Assets/guide/addfav.png" alt="Add to Favorites" style="width: 24px; height: 24px;"   data-user-id="' . $_SESSION['user_id'] . '" data-vehicule-id="' . $vehicule['id_vehicule'] . '">';
                }
            }
       echo' </div>

       <a href="http://localhost/projet_web/Routers/VehicleDescription.php?id=' . $vehicule['id_vehicule'] . '" >

                <img class="imagev" id="im" src="' . $vehicule['image_vehicule'] . '" alt="Image du véhicule">
                <div class="vehicle-details">
                    <h3>' . $vehicule['nom_version'] . '</h3>
                    <p>' . $vehicule['nom_marque'] . ' - ' . $vehicule['nom_modele'] . '</p>
                </div>
            </div>
        </a>
            ';
        }

        echo '
                </div>

            </div>
        </body>
        ';
    }




}