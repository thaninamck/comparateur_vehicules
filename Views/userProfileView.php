<?php

require_once('../Controllers/userProfileController.php');
require_once ('../Controllers/GuideAchatController.php');


class userProfileView {

    function afficherProfilePage() {
        $controller = new userProfileController();
        $favorites = $controller->getFavoriteV($_SESSION['user_id']);
    
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
            $idUser = $_SESSION['user_id'];
            $idVehicule = $_POST['vehicle_id'];
            $note = 0; 
            $contenu = $_POST['review'];
            $date = date("Y-m-d");
    
            $insertionReussie = $controller->insererAvis($idUser, $idVehicule, $note, $contenu, $date);
    
            if ($insertionReussie) {
                echo "<p class=\"alert alert-success\">L'avis a été ajouté avec succès, votre commentaire sera en attente de validation par l'administrateur.</p>";
            } else {
                echo "<p class=\"alert alert-danger\">Une erreur s'est produite lors de l'ajout de l'avis.</p>";
            }
        }
        echo '
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>';
        echo "
        <div class=\"container\">
            <div class=\"row\">
                <div class=\"col-md-3\">
                    <div class=\"profile-info\">
                        <img src=\"{$_SESSION['photo']}\" class=\"img-fluid\" alt=\"Photo de profil\">
                    </div>
                </div>
                <div class=\"col-md-9\">
                    <div class=\"row\">
                        <div class=\"col-md-12\">
                            <h4>Nom: {$_SESSION['user_name']}</h4>
                            <h4>Prénom: {$_SESSION['prenom']}</h4>
                            <h4>Sexe: {$_SESSION['sexe']}</h4>
                            <h4>Date de naissance: {$_SESSION['birth_date']}</h4>";
                           echo ' <a href="http://localhost/projet_web/Routers/UserProfile.php?id_edit=1 "  class="btn btn-dark">Modifier</a>';
                      echo "  </div>
                    </div>
                </div>
            </div>
            <div class=\"row mt-4\">
                <div class=\"col-md-12\">
                    <h3 style=\"margin:10px\">★ Liste des véhicules favoris</h3>
                    <div class=\"row\" style=\"max-height: 400px; overflow-y: auto;\">";
    
                    $controller = new GuideAchatController();
    
                    foreach ($favorites as $favorite) {
                        $exists = 1;
    
                        if (
                            isset($_SESSION['user_name']) &&
                            isset($_SESSION['user_id']) &&
                            isset($_SESSION['user_status']) &&
                            $_SESSION['user_status'] !== 'bloque' &&
                            $_SESSION['user_status'] !== 'en attente'
                        ) {
                            $exists = $controller->checkIfFavoriteExists($_SESSION['user_id'], $favorite['id_vcl']);
                        }
    
                        echo '
                        <div class="col-md-3 mb-3">
                            <div class="card">
                                <div class="favorite-icon">';
                                
                        if (
                            isset($_SESSION['user_name']) &&
                            isset($_SESSION['user_id']) &&
                            isset($_SESSION['user_status']) &&
                            $_SESSION['user_status'] !== 'bloque' &&
                            $_SESSION['user_status'] !== 'en attente'
                        ) {
                            if ($exists == 1) {
                                echo '<img id="addedfav" src="../Assets/guide/addedfav.png" alt="Added to Favorites" style="width: 24px; height: 24px;" data-user-id="' . $_SESSION['user_id'] . '" data-vehicule-id="' . $favorite['id_vcl'] . '">';
                            } else {
                                echo '<img id="addfav" src="../Assets/guide/addfav.png" alt="Add to Favorites" style="width: 24px; height: 24px;" data-user-id="' . $_SESSION['user_id'] . '" data-vehicule-id="' . $favorite['id_vcl'] . '">';
                            }
                        }
    
                        echo '</div>
                                <img src="' . $favorite['image'] . '" class="card-img-top" alt="Image du véhicule">
                                <div class="card-body">
                                    <h5 class="card-title">' . $favorite['marque'] . ' - ' . $favorite['modele'] . ' - ' . $favorite['version'] . '</h5>
                                    <p class="card-text" style="font-size: small;">Note: ' . $favorite['note'] . '★</p>
                                    <form method="POST">
                                        <input type="text" name="review" class="form-control mb-2" placeholder="Ajouter un avis">
                                        <input type="hidden" name="vehicle_id" value="' . $favorite['id_vcl'] . '">
                                        <button type="submit" name="submit" class="btn btn-danger">Ajouter l\'avis</button>';
                                        if (
                                            isset($_SESSION['user_name']) &&
                                            isset($_SESSION['user_id']) &&
                                            isset($_SESSION['user_status']) &&
                                            $_SESSION['user_status'] !== 'bloque' &&
                                            $_SESSION['user_status'] !== 'en attente'
                                        ) {
                                            echo ' <a href="http://localhost/projet_web/Routers/UserProfile.php?id_incremnt=' . $favorite['id_vcl'] . '" class="btn btn-danger" style="margin:5px">Ajouter une étoile ★</a>';
                                        }
                                    echo '</form>
                                </div>
                            </div>
                        </div>';
                    }
    
                echo "</div></div></div></div>";
    }
    

    public function affichermesavis() {
        $controller = new userProfileController();
        $avisUtilisateurVehicule = $controller->recupererAvisParUtilisateurEtVehicule($_SESSION['user_id']);
    
        echo '<h3 style="margin-left:100px;margin-bottom:40px">Mes avis</h3>';
        echo '<div class="container-fluid mt-3" style="margin:40px">'; // Ajout d'un conteneur
    
        echo '<div class="row overflow-auto" style="margin:20px;max-height: 400px;">'; // Ajout d'une classe overflow-auto et une hauteur maximale
    
        foreach ($avisUtilisateurVehicule as $index => $avis) {
            echo '
            <div id="commentaire_' . $index . '" class="col-4">
                <div class="card my-3">
                    <div class="card-body">
                        <h5 class="card-title">Note : ' . $avis['note'] . '</h5>
                        <p class="card-text">' . $avis['cntxt'] . '</p>
                        <p class="card-text"><small class="text-muted">Date : ' . $avis['date'] . '</small></p>
                        <div class="btn-group" role="group" aria-label="Actions">
                            <a  href="http://localhost/projet_web/Routers/UserProfile.php?id_editavis=' . $avis['id_avs_vcl'] . '" class="btn btn-warning" >Modifier</a>
                            <a href="http://localhost/projet_web/Routers/UserProfile.php?id_delete=' . $avis['id_avs_vcl'] . '" class="btn btn-danger" onclick="return confirm(\'Voulez-vous vraiment supprimer cet avis ?\')">Supprimer</a>
                        </div>
                    </div>
                </div>
            </div>';
        }
    
        echo '</div>'; // Fin du conteneur scrollable id_delete
    
        echo '</div>'; // Fin du conteneur principal
    }
    

    public function affichereditmonavis($avis) {
        echo '<h3 style="margin:40px">Modifier Mon Avis</h3>';
        echo '<div class="container-fluid mt-3" style="margin:40px">'; // Ajout d'un conteneur
    
        echo '<div class="row" style="margin:20px;">'; // Ajout d'une classe overflow-auto et une hauteur maximale
        echo '<div class="col-6">';
    
        // Afficher le formulaire de modification
        echo '<form  method="post">';
        echo '<input type="hidden" id="id_avs_vcl" name="id_avs_vcl" value="' . $avis['id_avs_vcl'] . '">'; // Champ caché pour l'identifiant de l'avis

        echo '<div class="form-group">';
        echo '<label for="cntxt">Commentaire :</label>';
        echo '<textarea  style="margin:40px" class="form-control" id="cntxt" name="cntxt">' . $avis['cntxt'] . '</textarea>';
        echo '</div>';
        echo '<button style="margin-left:40px" id="editAvisFormBtn" type="button" class="btn btn-danger">Enregistrer les modifications</button>';
        echo '</form>';
    
        echo '</div>';
        echo '</div>';
    
        echo '</div>'; // Fin du conteneur principal
    }
    
    


    public function affichereditprofile(){
        echo '
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>';
echo "
    
        
            
           
                <form id=\"editFormuser\">
                    <div class=\"mb-3\">
                        <label for=\"editName\" class=\"form-label\">Nom</label>
                        <input type=\"text\" class=\"form-control\" id=\"editName\" value=\"{$_SESSION['user_name']}\">
                    </div>
                    <div class=\"mb-3\">
                        <label for=\"editFirstName\" class=\"form-label\">Prénom</label>
                        <input type=\"text\" class=\"form-control\" id=\"editFirstName\" value=\"{$_SESSION['prenom']}\">
                    </div>
                    <div class=\"mb-3\">
                        <label for=\"editSexe\" class=\"form-label\">Sexe</label>
                        <input type=\"text\" class=\"form-control\" id=\"editSexe\" value=\"{$_SESSION['sexe']}\">
                    </div>
                    <div class=\"mb-3\">
                        <label for=\"editBirthDate\" class=\"form-label\">Date de naissance</label>
                        <input type=\"text\" class=\"form-control\" id=\"editBirthDate\" value=\"{$_SESSION['birth_date']}\">
                    </div>
                    <button type=\"submit\" class=\"btn btn-primary\">Enregistrer</button>
                </form>
            
        
    
";
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
