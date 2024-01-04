<?php

require_once('../Controllers/userProfileController.php');

class userProfileView {

    function afficherProfilePage() {
        $controller = new userProfileController();
        $favorites = $controller->getFavoriteV($_SESSION['user_id']);

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
            // Logique pour insérer l'avis
            $idUser = $_SESSION['user_id'];
            $idVehicule = $_POST['vehicle_id'];
            $note = 0; 
            $contenu = $_POST['review'];
            $date = date("Y-m-d");

            $insertionReussie = $controller->insererAvis($idUser, $idVehicule, $note, $contenu, $date);

            if ($insertionReussie) {
                echo "<p class=\"success-message\">L'avis a été ajouté avec succès.</p>";
            } else {
                echo "<p class=\"error-message\">Une erreur s'est produite lors de l'ajout de l'avis.</p>";
            }
        }

        echo "
        <div class=\"container\">
            <div class=\"profile-info\">
                <img src=\"{$_SESSION['photo']}\" alt=\"Photo de profil\">
                <h2>{$_SESSION['user_name']}</h2>
            </div>
        
            <h3>Liste des véhicules favoris</h3>
        
            <div class=\"favorites-container\">";
        
        foreach ($favorites as $favorite) {
            echo "
            <div class=\"vehicle-container\">
                <img src=\"{$favorite['image']}\" alt=\"Image du véhicule\">
                <p>{$favorite['marque']} - {$favorite['modele']} - {$favorite['version']}</p>
                <p>Note: {$favorite['note']}★</p>
                
                <form method=\"POST\">
                    <input type=\"text\" name=\"review\" placeholder=\"Ajouter un avis\">
                    <input type=\"hidden\" name=\"vehicle_id\" value=\"{$favorite['id_vcl']}\">
                    <button type=\"submit\" name=\"submit\">Ajouter l'avis</button>
                </form>
            </div>
            ";
        }
        
        echo "</div></div>";
    }


    public function afficherUserInfo($id, $nom, $prenom, $email, $photo, $sexe) {
        $controller = new userProfileController();
        $favorites = $controller->getFavoriteV($id);
        echo '
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="user-info text-center">
                        <img src="' . $photo . '" alt="Photo de profil" class="img-fluid rounded-circle mt-3" style="max-width: 200px;">
                        <h2 class="mt-3">' . $nom . ' ' . $prenom . '</h2>
                        
                    </div>
                    <p class="mb-2">Email: ' . $email . '</p>
                        <p class="mb-4">Sexe: ' . $sexe . '</p>
                    <h3 class="text-center mb-3">Liste des véhicules favoris</h3>
                    <div class="favorites-container">';
    
        foreach ($favorites as $favorite) {
            echo '
            <div class="vehicle-container mb-3">
                <img src="' . $favorite['image'] . '" alt="Image du véhicule" class="img-fluid">
                <p class="mb-1">' . $favorite['marque'] . ' - ' . $favorite['modele'] . ' - ' . $favorite['version'] . '</p>
                <p class="mb-0">Note: ' . $favorite['note'] . ' ★</p>
            </div>';
        }
    
        echo '</div>
                </div>
            </div>
        </div>';
    }
    
    
    
    
    
    
}
