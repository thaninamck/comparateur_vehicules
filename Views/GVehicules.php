<?php


require_once ('../Controllers/AdminController.php');
require_once ('../Controllers/AcceuilController.php');
class VehiculesView {

    
    
    
    
    public function afficherMarques($donneesMarques) {
        echo '
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
        <div class="container">
            <h2>Tableau des Marques </h2>
            <input type="text" id="searchInputmrq" class="form-control mb-3" placeholder="Rechercher un vehicule...">
            <a href="http://localhost/projet_web/Routers/Gvehicules.php?idaddmrq=1  class="btn btn-primary">Ajouter une marque</a>

            </div>
        </div>
            <table class="table" style="margin:40px">
                <thead>
                    <tr>
                        
                        <th>Logo Marque</th>
                        <th>Nom Marque</th>
                        <th>Pays</th>
                        <th>Siège Social</th>
                        <th>Année de creation </th>
                        <th>Site Web</th>
                        <th>Note</th>
                       
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>';
    
        foreach ($donneesMarques as $marque) {
            echo '
            <tr>
                
                <td>' . $marque['logo'] . '</td>
                <td>' . $marque['nom'] . '</td>
                <td>' . $marque['pays'] . '</td>
                <td>' . $marque['siege_soc'] . '</td>
                <td>' . $marque['annee'] . '</td>
                <td>' . $marque['web'] . '</td>
                <td>' . $marque['note'] . '</td>
               
                
               
                <td>
                   <a href="http://localhost/projet_web/Routers/Gvehicules.php?id_mrq=' . $marque['id_mrq'] . '">Modifier Marque</a>
                   
                   <a href="http://localhost/projet_web/Routers/Gvehicules.php?id_mrq_forvcl=' . $marque['id_mrq'] . '">Vehicules</a>

                   <a href="#" data-id="' . $marque['id_mrq'] . '" class="btn btn-danger delete-marque">Supprimer</a>

                </td>
            </tr>';
        }
    
        echo '
                </tbody>
            </table>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>';
        
    }
    





    public function afficherVehiculesMarques($donneesVehicules) {
        foreach ($donneesVehicules as $vehicule) {
            $idv=$vehicule['id_mrq'];
        }
        //var_dump($donneesVehicules);
        #searchInputveh
        echo '
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
        <div class="container" style="margin:40px;">
            <h2>Tableau des Véhicules</h2>
            <input type="text" id="searchInputveh" class="form-control mb-3" placeholder="Rechercher un vehicule...">
            <a href="http://localhost/projet_web/Routers/Gvehicules.php?idaddvehicule=' . $idv . '"  class="btn btn-primary">Ajouter un vehicule</a>

            </div>
        </div>
            <table class="table" style="margin:40px">
                <thead>
                    <tr>
                        
                        <th>Image de vehicule</th>
                        <th>Année</th>
                        <th>Modele</th>
                        <th>Version</th>
                        
                       
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>';
    
        foreach ($donneesVehicules as $vehicule) {
            echo '
            <tr>
                
                <td>' . $vehicule['image'] . '</td>
                <td>' . $vehicule['aneev'] . '</td>
                <td>' . $vehicule['nom_modele'] . '</td>
                <td>' . $vehicule['nom_version'] . '</td>
                
               
                
               
                <td>
                   <a href="http://localhost/projet_web/Routers/Gvehicules.php?id_modif_vcl=' . $vehicule['vehicule_id'] . '">Modifier vehicule</a>
                   
                   <a href="http://localhost/projet_web/Routers/Gvehicules.php?id_carct_vcl=' . $vehicule['vehicule_id'] . '" class="btn btn-primary">caracteristiques</a>

                   <a href="#" data-id="' . $vehicule['vehicule_id']  . '" class="btn btn-danger delete-vcl">Supprimer</a>

                </td>
            </tr>';
        }
    
        echo '
                </tbody>
            </table>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>';
        
    }





    


    public function showEditMarque($marqueData) {
        echo '
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <form style="margin:80px;" id="marqueForm" class="mt-4 mb-4">';
        
        foreach ($marqueData as $data) {
            echo '
            <div class="mb-3">
                <label for="logo" class="form-label">Logo:</label>
                <input type="text" class="form-control" id="logo" name="logo" value="' . $data["logo"] . '">
            </div>
            
            <div class="mb-3">
                <label for="nom" class="form-label">Nom:</label>
                <input type="text" class="form-control" id="nom" name="nom" value="' . $data["nom"] . '">
            </div>
            
            <div class="mb-3">
                <label for="pays" class="form-label">Pays:</label>
                <input type="text" class="form-control" id="pays" name="pays" value="' . $data["pays"] . '">
            </div>
            
            <div class="mb-3">
                <label for="siege_soc" class="form-label">Siège Social:</label>
                <input type="text" class="form-control" id="siege_soc" name="siege_soc" value="' . $data["siege_soc"] . '">
            </div>
            
            <div class="mb-3">
                <label for="annee" class="form-label">Année:</label>
                <input type="text" class="form-control" id="annee" name="annee" value="' . $data["annee"] . '">
            </div>
            
            <div class="mb-3">
                <label for="web" class="form-label">Site Web:</label>
                <input type="text" class="form-control" id="web" name="web" value="' . $data["web"] . '">
            </div>
            
            ';
        
        
        echo '
            <div class="text-center">
            <button type="submit" data-mrqid="' . $data["id_mrq"] . '" class="btn btn-primary update-mrq">Modifier</button>
            </div>
        </form>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>';
    
        }}
    
   
        public function showEditVcl($vehiculeData, $marques, $versions, $modeles) {
            //$accueilControler = new AccueilController();
            //$types = $accueilControler->getTypesVehicules();
            foreach ($vehiculeData as $vehiculeData) {
                $id_type=$vehiculeData['id_type'];
                $id_vcl=$vehiculeData['id_vcl'];
                $image=$vehiculeData['image'];
                $nom_type=$vehiculeData['nom_type'];
                $marque=$vehiculeData['marque'];
                $id_marque=$vehiculeData['id_marque'];
                $modele=$vehiculeData['modele'];
                $id_modele=$vehiculeData['id_modele'];
                $id_version=$vehiculeData['id_version'];
                $version=$vehiculeData['version'];
                $annee=$vehiculeData['annee'];
            }
            //
             
            echo '
            
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
                <style>
                    .custom-form {
                        max-width: 1000px; /* Largeur maximale du formulaire */
                        margin: 0 auto; /* Centrer le formulaire */
                        padding: 30px; /* Espacement intérieur du formulaire */
                    }
                </style>
            
            <body>
                <div class="container mt-5">
                    <form method="post" class="update-form custom-form">';
                        
                        
        
            
            echo '</select>
                    <div class="mb-3">
                        <h2> modifier Véhicule </h2>
                       
                        
                        <label for="year1" class="form-label">Année :</label>
                        <input type="text" class="form-control mb-3" id="year" name="web" value="'.$annee.'">

                        
                        <label for="web" class="form-label">logo:</label>
                        <input type="text" class="form-control mb-3" id="logo" name="web" value="'.$image.'">
                    </div>
                    <div class="text-center">
                    <button type="submit" data-vclid="' . $id_vcl. '" data-versionid="' . $id_version. '" class="btn btn-primary update_vcl">Modifier</button>
                    </div>
                    </form>
                </div>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
            </body>
            </html>';
        }
        






        public function insertVcl($idmrq) {
            $accueilControler = new AccueilController();
            $modeles  = $accueilControler->getModeleByMarque($idmrq);
            echo '
            <!DOCTYPE html>
            <html lang="fr">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Formulaire dinsertion de véhicule</title>
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
                <style>
                .addvehicle-form {
                        max-width: 600px; /* Largeur maximale du formulaire */
                        margin: 0 auto; /* Centrer le formulaire */
                        padding: 30px; /* Espacement intérieur du formulaire */
                    }
                </style>
            </head>
            <body>
                <div class="container mt-5">
                    <form method="post" class="comparison-form addvehicle-form">
                        <h2>Véhicule</h2>
                        <div class="mb-3">
                            <label for="model1" class="form-label">Modèle :</label>
                            <select id="model1" name="model1" class="form-select">';
                                foreach ($modeles as $modele) {
                                    echo '
                                    <option value="' . $modele['id_mdl'] . '">' . $modele['nom'] . '</option>';
                                }
                            echo '</select>
                        </div>
                        <div class="mb-3">
                            <label for="year1" class="form-label">Année :</label>
                            <input type="text" class="form-control" id="year1" name="year1" placeholder="Entrez l\'année du véhicule">
                        </div>
                        <div class="mb-3">
                            <label for="logo" class="form-label">Logo du véhicule :</label>
                            <input type="text" class="form-control" id="logo" name="logo" placeholder="Entrez l\'URL du logo">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Insérer</button>
                        </div>
                    </form>
                </div>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
            </body>
            </html>';
        }
        
        
        

      
         


         public function showBrandForm() {
            echo '
            <!DOCTYPE html>
            <html lang="fr">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Ajouter une marque</title>
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
                <style>
                    .custom-form {
                        max-width: 600px; /* Largeur maximale du formulaire */
                        margin: 0 auto; /* Centrer le formulaire */
                        padding: 30px; /* Espacement intérieur du formulaire */
                    }
                </style>
            </head>
            <body>
                <div class="container mt-5">
                    <form  style="margin:80px" method="post" class="custom-form">
                        <div class="mb-3">
                            <label for="logo" class="form-label">Logo :</label>
                            <input type="text" class="form-control" id="logo" name="logo" placeholder="URL du logo">
                        </div>
                        <div class="mb-3">
                            <label for="nom" class="form-label">Nom :</label>
                            <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom de la marque">
                        </div>
                        <div class="mb-3">
                            <label for="pays" class="form-label">Pays :</label>
                            <input type="text" class="form-control" id="pays" name="pays" placeholder="Pays dorigine">
                        </div>
                        <div class="mb-3">
                            <label for="siege_soc" class="form-label">Siège social :</label>
                            <input type="text" class="form-control" id="siege_soc" name="siege_soc" placeholder="Siège social">
                        </div>
                        <div class="mb-3">
                            <label for="annee" class="form-label">Année de création :</label>
                            <input type="text" class="form-control" id="annee" name="annee" placeholder="Année de création">
                        </div>
                        <div class="mb-3">
                            <label for="web" class="form-label">Site Web :</label>
                            <input type="text" class="form-control" id="web" name="web" placeholder="URL du site Web">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary add-mrq">Ajouter la marque</button>
                        </div>
                    </form>
                </div>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
            </body>
            </html>';
        }
        
        
        
    

        public function afficherFeatures($donneesCaracteristiques) {
            echo '
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            max-width: 800px; /* Largeur maximale du conteneur */
            margin: 20px auto; /* Centrer horizontalement */
        }
        /* Style pour le tableau */
        .table {
            width: 100%;
            margin-bottom: 1rem;
            color: #212529;
            border-collapse: collapse;
        }
        .table th,
        .table td {
            padding: 0.75rem;
            vertical-align: top;
            border-top: 1px solid #dee2e6;
        }
        .table thead th {
            vertical-align: bottom;
            border-bottom: 2px solid #dee2e6;
        }
        /* Style pour les boutons */
        .btn {
            margin-right: 5px;
        }
    </style>
    <div class="container">
    <div class="text-center">';
    foreach ($donneesCaracteristiques as $caracteristique) {
        $id_vcl=$caracteristique['id_vcl'];
    };
    echo'<a href="http://localhost/projet_web/Routers/Gvehicules.php?id_vcl_ins=' . $id_vcl . '"  class="btn btn-primary">Ajouter une caract</a>
    </div>
        <h2>Tableau des Caractéristiques de Véhicule</h2>
        <input type="text" id="searchInputcar" class="form-control mb-3" placeholder="Rechercher une caractéristique...">

        <table class="table" style="margin:40px">
            <thead>
                <tr>
                    <th>Caractéristique</th>
                    <th>Valeur</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>';

foreach ($donneesCaracteristiques as $caracteristique) {
    echo '
        <tr>
            <td>' . $caracteristique['nom'] . '</td>
            <td>' . $caracteristique['valeur'] . '</td>
            <td>
                <a href="http://localhost/projet_web/Routers/Gvehicules.php?id_modif_feature=' . $caracteristique['id_caract'] . '"  class="btn btn-primary">Modifier caractéristique</a>
                <a href="#" data-idvcl="' . $caracteristique['id_vcl'] . '" data-id="' . $caracteristique['id_caract'] . '" class="btn btn-danger delete-feature">Supprimer</a>
            </td>
        </tr>';
}

echo '
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>';

        }
        


        public function showEditCaracteristique($caracteristiqueData) {
            echo '
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
            <style>
                #caracteristiqueForm {
                    max-width: 400px; /* Largeur maximale du formulaire */
                    margin: 0 auto; /* Centrer horizontalement */
                    padding: 20px; /* Espacement intérieur */
                    border: 1px solid #ccc; /* Bordure */
                    border-radius: 8px; /* Coins arrondis */
                }
                .mb-3 {
                    margin-bottom: 15px; /* Espacement entre les éléments */
                }
                /* Style spécifique pour le bouton */
                .update-caract {
                    width: 100%; /* Remplir la largeur du conteneur parent */
                }
            </style>
            <form id="caracteristiqueForm" class="mt-4 mb-4">
                <div class="mb-3">
                    <label for="nom" class="form-label">Nom:</label>
                    <input type="text" class="form-control" id="nom" name="nom" value="' . $caracteristiqueData["nom"] . '">
                </div>
        
                <div class="mb-3">
                    <label for="valeur" class="form-label">Valeur:</label>
                    <input type="text" class="form-control" id="valeur" name="valeur" value="' . $caracteristiqueData["valeur"] . '">
                </div>
        
                <div class="text-center">
                    <button type="submit" data-caractid="' . $caracteristiqueData["id_caract"] . '" class="btn btn-primary update-caract">Modifier</button>
                </div>
            </form>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>';
        
        }
        
        
        public function showInsertCaracteristiqueForm($id_vcl_car) {
            echo '
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
                <style>
                    .container {
                        max-width: 400px; /* Largeur maximale du formulaire */
                        margin: 20px auto; /* Centrer horizontalement */
                    }
                    .form-group {
                        margin-bottom: 1.5rem; /* Espacement entre les champs */
                    }
                    /* Style pour les boutons */
                    .btn {
                        margin-right: 5px;
                    }
                </style>
                <div class="container">
                    <h2>Formulaire d\'insertion de caractéristique</h2>
                    <form id="insertCaracteristiqueForm">
                        <div class="form-group">
                            <label for="nom">Nom de la caractéristique :</label>
                            <input type="text" class="form-control" id="nom" name="nom" required>
                        </div>
                        <div class="form-group">
                            <label for="valeur">Valeur de la caractéristique :</label>
                            <input type="text" class="form-control" id="valeur" name="valeur" required>
                        </div>
                        <div class="text-center">
                            <button type="submit" data-id="'.$id_vcl_car.'"class="btn btn-primary insert">Ajouter</button>
                        </div>
                    </form>
                </div>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>';
        }
        





    }
    
    

    
    
    
    
    
    
    
   
    

    



