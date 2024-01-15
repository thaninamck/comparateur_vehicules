<?php

require_once ('../Controllers/GuideAchatController.php');

require_once ('../Controllers/ComparateurController.php');

class VehicleDescriptionView {

    

    function afficherVehicleDescription($results) {
        //var_dump("le resultat de var_dump est :", $results);
        
        if (isset($results)) {
          
            echo '<table class="styled-table">';
            echo '<thead>';
            echo '<tr>';
            echo '<th> ';
            
             echo'</th>';
    
            
            foreach ($results as $vehicleId => $vehicleData) {
                
                
                
                
                echo '</div>';
                echo '<th>';
                echo '<a href="http://localhost/projet_web/Routers/VehicleDescription.php?id=' . $vehicleData['id_vcl'] . '">';
                echo '<img id="' . $vehicleData['id_vcl'] . '" src="' . $vehicleData['image'] . '" alt="Image du véhicule" style="max-width: 400px; max-height: 450px;">';
                echo '</a>';
                echo '</th>';
            }
    
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
    
            // Détails du véhicule (Marque, Modèle, Année, Version)
            $details = [
                ['Marque', 'marque'],
                ['Modèle', 'modele'],
                ['Année', 'annee'],
                ['Version', 'version'],
                ['Note', 'note']
            ];
    
            foreach ($details as $detail) {
                echo '<tr>';
                echo '<th>' . $detail[0] . ' : </th>';
                foreach ($results as $vehicleId => $vehicleData) {
                    echo '<td>';
                    echo $vehicleData[$detail[1]];
                    echo '</td>';
                }
                echo '</tr>';
            }
    
            // En-têtes pour chaque caractéristique
            $caracteristiquesNoms = [];
            foreach ($results as $vehicleId => $vehicleData) {
                foreach ($vehicleData['caracteristiques'] as $caracteristique) {
                    $caracteristiquesNoms[$caracteristique['caracteristique']] = true;
                }
            }
    
            foreach ($caracteristiquesNoms as $nom => $value) {
                echo '<tr>';
                echo '<td>' . $nom . '</td>';
    
                foreach ($results as $vehicleId => $vehicleData) {
                    $trouve = false;
                    foreach ($vehicleData['caracteristiques'] as $caracteristique) {
                        if ($caracteristique['caracteristique'] === $nom) {
                            echo '<td>' . $caracteristique['valeur'] . '</td>';
                            $trouve = true;
                            break;
                        }
                    }
                    if (!$trouve) {
                        echo '<td></td>';
                    }
                }
    
                echo '</tr>';
            }
    
            echo '</tbody>';
            echo '</table>';
            
        } else {
            if ($results == null) {
                echo '  ';
            }
        }


        echo '
  <div class="comparateur-container" style="margin-top: 70px; margin-bottom: 80px;">
      <h1 >Comparer ce véhicule !</h1>
      
      
      <label for="vehicleType">Choisissez le type de véhicule :</label>
      <select id="vehicleType" name="vehicleType">';
          
            echo'
            <option value="">selectionner le type</option>
            <option value="' . $vehicleData['id_type'] . '" >' . $vehicleData['nom_type'] . '</option>
            ';
          
          
      echo '</select>
          
      
      <div class="form-comparateur-container">
          


          <div class="form-box">
              <h2>Véhicule 1</h2>
              <form  method="post" class="comparison-form">
              
      
              <label for="marque">Marque :</label>
              <select id="marque1" name="marque" >
                  
                  <option value="' . $vehicleData['id_marque']. '">' . $vehicleData['marque'] . '</option>
                  
              </select>
      
              <label for="model1">Modèle :</label>
              <select id="model1" name="model1">
                  
                  <option value="' . $vehicleData['id_modele']. '">' . $vehicleData['modele'] . '</option>
              </select>

              <label for="year1">Année :</label>
              <select id="year1" name="year1">
                  
                  <option value="' . $vehicleData['id_vcl']. '">' . $vehicleData['annee'] . '</option>
                  
              </select>
      
              <label for="version1">Version :</label>
              <select id="version1" name="version1">
                  
                  <option value="' . $vehicleData['id_version']. '">' . $vehicleData['version'] . '</option>
              </select>

              
              
              </form>
          </div>
          
          

          <div class="form-box">
              <h2>Véhicule 1</h2>
              <form  method="post" class="comparison-form">
              
      
              <label for="marque">Marque :</label>
              <select id="marque2" name="marque" class="marque">
                  <option value="">selectionner la marque</option>
                  
              </select>
      
              <label for="model2">Modèle :</label>
              <select id="model2" name="model2">
                  <option value="">selectionner le modele</option>
                  
              </select>

              <label for="year2">Année :</label>
              <select id="year2" name="year2">
                  <option value="">selectionner lannee</option>
                  
                  
              </select>
      
              <label for="version2">Version :</label>
              <select id="version2" name="version1">
                  <option value="">selectionner la version</option>
                  
              </select>

              
              
              </form>
          </div>
          


          

          <div id="form3" class="form-box" >
              <h2>Véhicule 1</h2>
              <form  method="post" class="comparison-form">
              
      
              <label for="marque">Marque :</label>
              <select id="marque3" name="marque" class="marque">
                  <option value="">selectionner la marque</option>
                  
              </select>
      
              <label for="model3">Modèle :</label>
              <select id="model3" name="model2">
                  <option value="">selectionner le modele</option>
                  
              </select>

              <label for="year3">Année :</label>
              <select id="year3" name="year3">
                  <option value="">selectionner lannee</option>
                  
                  
              </select>
      
              <label for="version3">Version :</label>
              <select id="version3" name="version1">
                  <option value="">selectionner la version</option>
                  
              </select>

              
              
              </form>
          </div>
          



          <div id="form4" class="form-box"  >
              <h2>Véhicule 1</h2>
              <form  method="post" class="comparison-form">
              
      
              <label for="marque">Marque :</label>
              <select id="marque4" name="marque" class="marque">
                  <option value="">selectionner la marque</option>
                  
              </select>
      
              <label for="model4">Modèle :</label>
              <select id="model4" name="model2">
                  <option value="">selectionner le modele</option>
                  
              </select>

              <label for="year4">Année :</label>
              <select id="year4" name="year4">
                  <option value="">selectionner lannee</option>
                  
                  
              </select>
      
              <label for="version4">Version :</label>
              <select id="version4" name="version1">
                  <option value="">selectionner la version</option>
                  
              </select>

              
              
              </form>
          </div>
          



         
      </div>
          
    
      <input type="submit" value="Comparer" id="compareButton" class="compare-button">


  </div>
  ';
        
    }
    
    
    public function afficherAvis($results){
        $html=' <h2 style="margin-top: 70px; margin-bottom: 70px;text-align: center;">Meilleurs Commentaires </h2>';
        if ($results) {
            # code...
        
        $html .= '<div class="avis-container">';
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
            $html .= '<input type="hidden" name="id_vcl" value="' . $avis['id_vcl'] . '">';
            if(isset($_SESSION['user_name']) && isset($_SESSION['user_id'])&&isset($_SESSION['user_status'])&&$_SESSION['user_status']!='bloque'&&$_SESSION['user_status']!='en attente') {
                $html .= '<button class="add-star" data-id="' . $avis['id_avs_vcl'] . '">Ajouter une étoile</button>';
                
            }
          
            $html .= '</div>';
            $html .= '</div>';
        }
    }else {
        $html .= '<p>Aucun commentaire pour l\'instant </p>';
    }
        $html .= '</div>';
        
        echo $html;
    }

    
    public function afficherAjoutAvis($results){
        foreach ($results as $vehicleId => $vehicleData) {
        
        if(isset($_SESSION['user_name']) && isset($_SESSION['user_id'])&&isset($_SESSION['user_status'])&&$_SESSION['user_status']!='bloque'&&$_SESSION['user_status']!='en attente') {
            echo '
        <label for="avis" class="avis-label" style="margin-top: 20px; margin-bottom: 10px;">Ajouter un avis pour ce vehicule ! </label>
        <form id="form_avis" class="avis-form" style=" margin-bottom: 100px;">';
            echo '<input type="text" id="'. $vehicleData['id_vcl'].'" name="avis" class="avis-input" placeholder="Votre avis...">
            <input type="submit" value="Ajouter" class="avis-submit">';};
            if(isset($_SESSION['user_name']) && isset($_SESSION['user_id'])&&isset($_SESSION['user_status'])&&$_SESSION['user_status']!='bloque'&&$_SESSION['user_status']!='en attente') {
                echo' <a href="http://localhost/projet_web/Routers/VehicleDescription.php?id_incremnt=' . $vehicleData['id_vcl'] . '" class="btn btn-danger" style="margin:5px">Ajouter une etoile ★</a>
                ';
                
            }
       echo' </form>';
        }
    }
    
    
    
    public function afficherComparaisonsDeVehicule($comparaisons) {
        //var_dump("le resultat de var_dump est :", $comparaisons);
        echo '<div class="comparisons-section">
                <h2 style="margin-top: 30px; margin-bottom: 70px;text-align: center;">Comparaisons les plus effectuées pour ce vehicule </h2>
                <div class="comparisons-container">';
    
        if ($comparaisons && is_array($comparaisons)) {
            foreach ($comparaisons as $comparaison) {
                echo '<div class="comparison-box">
                        <div class="comparison-content">
                            <h3>' . $comparaison['marque_1'] . ' - ' . $comparaison['modele_1'] . '</h3>
                            <p>' . $comparaison['version_1'] . '</p>
                        </div>
                        <h2>vs</h2>
                        <div class="comparison-content">
                            <h3>' . $comparaison['marque_2'] . ' - ' . $comparaison['modele_2'] . '</h3>
                            <p>' . $comparaison['version_2'] . '</p>
                        </div>
                    </div>';
            }
        } else {
            echo '<p>Aucune comparaison trouvée pour ce véhicule.</p>';
        }
    
        echo '</div></div>';
    }
    
    
    
   
    

    


}
