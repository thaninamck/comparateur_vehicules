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
                <h1>Guide d\'achat</h1>
                <img src="' . $result[0]['img'] . '" alt="Image de guide d\'achat">
            </div>

            <div class="main-content">
                <div class="articlev">
                    <h2>' . $result[0]['titre'] . '</h2>
                    <p>' . $result[0]['contenu'] . '</p>
                </div>

                <div class="vehicle-cards">
        ';

        // Parcourir les véhicules pour les afficher
        foreach ($vehicules as $vehicule) {
            echo '
            <a href="http://localhost/projet_web/Routers/VehicleDescription.php?id=' . $vehicule['id_vehicule'] . '" >
            <div class="vehicle-card">
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

                <p>Date de publication : ' . $result[0]['date_pub'] . '</p>
            </div>
        </body>
        ';
    }




}