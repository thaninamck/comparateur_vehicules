<?php


require_once ('../Controllers/ComparateurController.php');

class ComparateurView {

    

    function afficherResultatsComparateur($results) {
        if(isset($results)){
        // Récupération des noms des caractéristiques
        $caracteristiquesNoms = [];
        foreach ($results as $vehicleData) {
            foreach ($vehicleData as $vehicle) {
                foreach ($vehicle['caracteristiques'] as $caracteristique) {
                    $caracteristiquesNoms[$caracteristique['caracteristique']] = true;
                }
            }
        }
    
        echo '<table  class="styled-table">';
        echo '<thead>';
        echo '<tr>';
        echo '<th>   </th>';
        // En-têtes pour chaque véhicule (image)
        foreach ($results as $vehicleData) {
            foreach ($vehicleData as $vehicle) {
                echo '<th>';
                echo '<a href="chemin_vers_votre_page.php?id=' . $vehicle['id_vcl'] . '">';
                echo '<img id="'.$vehicle['id_vcl']  .'" src="' . $vehicle['image'] . '" alt="Image du véhicule" style="max-width: 100px; max-height: 100px;">';
                echo '</a>';
                ;
                echo '</th>';
            }
        }
        echo '</tr>';
       
        echo '<tr>';
    
        // En-têtes pour chaque détail du véhicule (ID, marque, modèle, année, version)
        
            
                

                echo '<tr><th>Marque : </th>'; 
                foreach ($results as $vehicleData) {
                    foreach ($vehicleData as $vehicle) {
                        echo '<td>';
                        echo   $vehicle['marque'] ;
                        echo '</td>';
                    }
                }'</tr>';


                echo '<tr><th>Modèle : </th>'; 
                foreach ($results as $vehicleData) {
                    foreach ($vehicleData as $vehicle) {
                        echo '<td>';
                        echo   $vehicle['modele'] ;
                        echo '</td>';
                    }
                }'</tr>';
                echo '<tr><th>Année : </th>'; 
                foreach ($results as $vehicleData) {
                    foreach ($vehicleData as $vehicle) {
                        echo '<td>';
                        echo   $vehicle['annee'] ;
                        echo '</td>';
                    }
                }'</tr>';
                echo '<tr><th>Version : </th>'; 
                foreach ($results as $vehicleData) {
                    foreach ($vehicleData as $vehicle) {
                        echo '<td>';
                        echo   $vehicle['version'] ;
                        echo '</td>';
                    }
                }'</tr>';
            
        
        //echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
    
        // En-têtes pour chaque caractéristique
        foreach ($caracteristiquesNoms as $nom => $value) {
            echo '<tr>';
            echo '<td>' . $nom . '</td>';
    
            foreach ($results as $vehicleData) {
                foreach ($vehicleData as $vehicle) {
                    $trouve = false;
                    foreach ($vehicle['caracteristiques'] as $caracteristique) {
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
            }
    
            echo '</tr>';
        }
    
        echo '</tbody>';
        echo '</table>';}
        else {
            if ($results==null) {
                echo '  ';
            }
        }
    }
    

    
    
    
    
    
    
    
   
    

    


}
