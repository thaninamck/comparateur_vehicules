<?php


require_once ('../Controllers/AdminController.php');

class GAvisView {

    public function afficherAvis($donneesAvis) {
        echo '
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <div class="container">
            <div class="d-flex justify-content-between mb-3">
                <h2>Tableau des Avis</h2>
                <div class="col-md-4">
                    <input type="text" id="searchInput" class="form-control" placeholder="Rechercher...">
                    <select id="selectFilter" class="form-select">
                        <option value="all">Tous</option>
                        <option value="1">Approuvés</option>
                        <option value="0">Non approuvés</option>
                    </select>
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>Commentaire</th>
                        <th>Statut</th>
                        <th>Date</th>
                        <th>Note</th>
                        <th>Utilisateur</th>
                        <th>Informations Véhicule</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>';
    
        foreach ($donneesAvis as $avis) {
            echo '
            <tr class="avis-row" data-approuv="' . $avis['approuv'] . '">
                <td>' . $avis['cntxt'] . '</td>
                <td class="' . ($avis['approuv'] == 1 ? 'text-success' : ($avis['approuv'] == 3 ? 'text-danger' : 'text-warning')) . '">' . 
                ($avis['approuv'] == 1 ? 'Validé' : ($avis['approuv'] == 3 ? 'Refusé' : 'Non validé')) . '</td>
                <td>' . $avis['date'] . '</td>
                <td>' . $avis['note'] . '</td>
                <td>' . $avis['nom_utilisateur'] . '</td>
                <td>' . $avis['infos_vehicule'] . '</td>
                <td>';
                
            if ($avis['approuv'] == 0 || $avis['approuv'] == 3) {
                echo '<a href="http://localhost/projet_web/Routers/GAvis.php?id_avs=' . $avis['id_avs_vcl'] . '" class="btn btn-danger validate-comment">Valider</a>';
            } else if ($avis['approuv'] == 1) {
                echo '<a href="http://localhost/projet_web/Routers/GAvis.php?id_avs=' . $avis['id_avs_vcl'] . '" class="btn btn-danger invalidate-comment">Invalider</a>';
            }
    
            echo '
                    <a href="http://localhost/projet_web/Routers/GAvis.php?id_avs=' . $avis['id_avs_vcl'] . '" class="btn btn-danger delete-comment">Supprimer</a>
                    <!-- Bouton Supprimer -->
                    <a href="http://localhost/projet_web/Routers/GAvis.php?id_avs=' . $avis['id_avs_vcl'] . '" class="btn btn-danger ban-comment">Refuser</a>
                    <a href="http://localhost/projet_web/Routers/GAvis.php?id_user=' . $avis['id_user'] . '" class="btn btn-danger ban-user">Bloquer lutilisateur</a>
                </td>
            </tr>';
        }
    
        echo '
                </tbody>
            </table>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>';
    }
    
    
    
    
    
    
    
    
    
   
    

    
    }

