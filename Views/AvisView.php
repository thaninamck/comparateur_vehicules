<?php
require_once ('../Controllers/AcceuilController.php');

require_once ('../Controllers/AvisController.php');

class AvisView {

    public function afficherVehicule($modele, $version, $image) {
        echo '<div class="card">
                <img src="' . htmlentities($image) . '" alt="Image du véhicule">
                <h3>Modèle: ' . htmlentities($modele) . '</h3>
                <p>Version: ' . htmlentities($version) . '</p>
              </div>';
    }
    
    public function afficherAvisVehicules($id_vcl,$modele, $version, $image,$results, $totalAvis) {
        $html = '<div class="vehicle-veh-container">';
        
        // Affichage des avis
        foreach ($results as $avis) {
            $html .= '<div class="avis-veh-card">';
            $html .= '<div class="user-veh-info">';
            $html .= '<img src="' . $avis['photo_utilisateur'] . '" alt="Photo de profil">';
            $html .= '<p>' . $avis['nom_utilisateur'] . '</p>';
            $html .= '</div>';
            $html .= '<p>' . $avis['cntxt'] . '</p>';
            $html .= '<div class="avis-veh-details">';
            $html .= '<p>Note : ' . $avis['note'] . '★</p>';
            // Ajout des éléments hiddens pour id_user et id_vcl
            $html .= '<input type="hidden" name="id_user" value="' . $avis['id_user'] . '">';
            $html .= '<input type="hidden" name="id_vcl" value="' . $avis['id_vcl'] . '">';
            if (isset($_SESSION['user_name']) && isset($_SESSION['user_id'])&&isset($_SESSION['user_status'])&&$_SESSION['user_status']!='bloque'&&$_SESSION['user_status']!='en attente') {
                $html .= '<button class="add-star" data-id="' . $avis['id_avs_vcl'] . '">Ajouter une étoile</button>';
            }
            $html .= '</div>';
            $html .= '</div>';
        }
        
        $html .= '</div>'; // Fin de la section d'affichage des avis
        
        // Ajout de la pagination
        $perPage = 5; // Nombre d'avis par page
        $totalPages = ceil($totalAvis / $perPage); // Calcul du nombre total de pages
        $html .= '<div class="pagination">';
        for ($i = 1; $i <= $totalPages; $i++) {
            $html .= '<a href="?page=' . $i . '&id=' . $id_vcl . '&modele=' . urlencode($modele) . '&version=' . urlencode($version) . '&image=' . urlencode($image) . '">Page :' . $i . '</a>';
        }
        $html .= '</div>';
        
        echo $html; // Affichage de la structure HTML complète
    }
    


            
        
            
            
        
    }
    
    
    

    
    
    
    
    
    
    
   
    

    



