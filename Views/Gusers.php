<?php


require_once ('../Controllers/AdminController.php');

class GusersView {

    public function afficherUsers($donneesUtilisateurs) {
        echo '

       
        <div class="col-md-4">

        <input type="text" id="searchInput" class="form-control mt-3" placeholder="Rechercher...">

            <select id="statusFilter" class="form-select">
                <option value="all">Tous les statuts</option>
                <option value="status-bloque">bloque</option>
                <option value="status-attente">en attente</option>
                <option value="status-valide">valide</option>
            </select>
        </div>
    
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
            .status-bloque { color: red; }
            .status-attente { color: orange; }
            .status-valide { color: green; }
        </style>
        <div class="container">
            <h2>Liste des Utilisateurs</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Sexe</th>
                        <th>Statut</th>
                        <th>Photo</th>
                        <th>Email</th>
                        <th>Date de naissance</th>
                        <th>Profil</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>';
    
        foreach ($donneesUtilisateurs as $utilisateur) {
            $statusClass = '';
            switch ($utilisateur['status']) {
                case 'bloque':
                    $statusClass = 'status-bloque';
                    break;
                case 'en attente':
                    $statusClass = 'status-attente';
                    break;
                case 'valide':
                    $statusClass = 'status-valide';
                    break;
                default:
                    break;
            }
           
    
            echo '
            <tr class="user-row ' . $statusClass .'">
                <td>' . $utilisateur['nom'] . '</td>
                <td>' . $utilisateur['prenom'] . '</td>
                <td>' . $utilisateur['sexe'] . '</td>
                <td><span class="' . $statusClass . '">' . $utilisateur['status'] . '</span></td>
                <td>' . $utilisateur['photo'] . '</td>
                <td>' . $utilisateur['email'] . '</td>
                <td>' . $utilisateur['birth_date'] . '</td>
                <td><a href="http://localhost/projet_web/Routers/UserProfile.php?id=' . $utilisateur['id_user'] . '&nom=' . $utilisateur['nom'] . '&photo=' . $utilisateur['photo'] . '&email=' . $utilisateur['email'] . '&prenom=' . $utilisateur['prenom'] . '&sexe=' . $utilisateur['sexe'] . '">lien vers le profil</a></td>
                <td>';
    
            switch ($utilisateur['status']) {
                case 'bloque':
                    echo '<a href="http://localhost/projet_web/Routers/Gusers.php?id_v=' . $utilisateur['id_user'] . '" class="btn btn-danger validate-comment">Valider</a>';
                    break;
                case 'en attente':
                    echo '<a href="http://localhost/projet_web/Routers/Gusers.php?id_v=' . $utilisateur['id_user'] . '" class="btn btn-danger invalidate-comment">Valider</a>';
                    break;
                case 'valide':
                    echo '<a href="http://localhost/projet_web/Routers/Gusers.php?id_b=' . $utilisateur['id_user'] . '" class="btn btn-danger block-user">Bloquer</a>';

                    echo '<a href="http://localhost/projet_web/Routers/Gusers.php?id_i=' . $utilisateur['id_user'] . '" class="btn btn-danger block-user">Invalider</a>';
                    break;
                default:
                    break;
            }
    
            echo '
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

