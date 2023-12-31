<?php
// Dans Marques.php (extrait)
require_once('../Controllers/MarquesController.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['marque_id'])) {
        $id_mrq = $_POST['marque_id'];
        $MarquesController = new MarquesController();
        $marques = $MarquesController->getMarqueById1($id_mrq);
                if ($marques) {
                    
                    //var_dump($marques);
                    
                    $html = '<div id="marqv">';
                    
                    
                    
                    
                            $html .= '<div class="scrollable-container">';

                    foreach ($marques['vehicules'] as $vehicule) {
                        $modeles = $vehicule['modeles'];
                        foreach ($modeles as $modele) {
                            $versions = $modele['versions'];
                            foreach ($versions as $version) {
                                echo '<a href="http://localhost/projet_web/Routers/AvisV.php?id=' . $vehicule['id_vcl'] . '&modele=' . urlencode($modele['nom_modele']) . '&version=' . urlencode($version['nom_version']) . '&image=' . urlencode($vehicule['image']) . '">';
                                echo '<div class="card">';
                                echo '<h3>Modèle: ' . $modele['nom_modele'] . '</h3>';
                                echo '<p>Version: ' . $version['nom_version'] . '</p>';
                                echo'<img src="' . $vehicule['image'] . '" alt="Photo de profil">';

                                echo '<select class="caracteristiques-dropdown">';
                                foreach ($version['caracteristiques'] as $caracteristique) {
                                    echo '<option value="' . $caracteristique['id_caract'] . '">'
                                        . $caracteristique['nom_caracteristique'] . ': '
                                        . $caracteristique['valeur_caracteristique'] . '</option>';
                                }
                                echo '</select>';
                                echo '</div>';
                                echo '</a>';
                                
                            }
                        }
                    }


                    $marqueDetails = $marques['informations_marque'];
                    $html .= '<div class="brand-details" id="brandDetails">
                                <div class="brand-logo">
                                    <img src="' . $marqueDetails['logo'] . '" alt="Logo de la marque">
                                </div>
                                <div class="brand-info">
                                    <h2>' . $marqueDetails['nom'] . '</h2>
                                    <p>Pays: ' . $marqueDetails['pays'] . '</p>
                                    <p>Siège social: ' . $marqueDetails['siege_soc'] . '</p>
                                    <p>Année de création: ' . $marqueDetails['annee'] . '</p>
                                    <p>Note: ' . $marqueDetails['note'] . '★</p>
                                    <p>Site web: <a href="' . $marqueDetails['web'] . '">' . $marqueDetails['web'] . '</a></p>
                                </div>
                            </div>';

                    $html .= '</div>';
                    $results = $MarquesController->getHighRatedAv( $id_mrq);

                    $html = '<div class="avis-container">';
                    //var_dump("le resultat de var_dump est :", $results);
                    foreach($results as $avis) {
                        $html .= '<div class="avis-card">';
                        $html .= '<div class="user-info">';
                    
                        $html .= '<img src="' . $avis['photo_utilisateur'] . '" alt="Photo de profil">';
                        $html .= '<p>' . $avis['nom_utilisateur'] . '</p>';
                        $html .= '</div>';
                        $html .= '<p>' . $avis['cntxt'] . '</p>';
                        $html .= '<div class="avis-details">';
                        $html .= '<p>Note : ' . $avis['note'] . '★</p>';
                        // Ajout des éléments hiddens pour id_user et id_vcl
                        $html .= '<input type="hidden" name="id_user" value="' . $avis['id_user'] . '">';
                        $html .= '<input type="hidden" name="id_vcl" value="' . $avis['id_mrq'] . '">';
                        if(isset($_SESSION['user_name']) && isset($_SESSION['user_id'])) {
                            $html .= '<button class="add-star" data-id="' . $avis['id_avs_mrq'] . '">Ajouter une étoile</button>';
                        }
                    
                        $html .= '</div>';
                        $html .= '</div>';
                    }
                    
                    $html .= '</div>';
                    
                    if(isset($_SESSION['user_name']) && isset($_SESSION['user_id']) ){
                        
                        echo '
                                <label for="avis" class="avis-label">Ajouter un avis pour cette marque ! </label>
                                <form id="form_avis" class="avis-form">
                                    
                                    <input type="text" id="'. $id_mrq.'" name="avis" class="avis-input" placeholder="Votre avis...">
                                    <input type="submit" value="Ajouter" class="avis-submit">
                                    

                                    
                                </form>
                                <form id="form_etoile" class="etoile-form">
                                <input type="submit" id="'. $id_mrq.'" value="Ajouter une étoile ★" class="etoile-submit">
                            </form>
                                ';
                    }

                    












                echo '</div>';
    
                
                echo $html;
            }
         else {
            echo 'Aucun detail trouvé ';
        }
    } else {
        echo 'ID de la marque non défini dans la requête POST';
    }
} else {
    echo 'Requête non autorisée';
}

