<?php


require_once ('../Controllers/AdminController.php');
require_once ('../Controllers/AcceuilController.php');
class VehiculesView {

    
    
    
    
    public function afficherVehicules($donneesVehicules) {
        echo '
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
        <div class="container">
            <h2>Tableau des Véhicules</h2>
            </div>
            <a href="http://localhost/projet_web/Routers/Gvehicules.php?idaddmrq=1  class="btn btn-primary">Ajouter une marque</a>
        </div>
            <table class="table">
                <thead>
                    <tr>
                        
                        <th>Logo Marque</th>
                        <th>Nom Marque</th>
                        <th>Pays</th>
                        <th>Siège Social</th>
                        <th>Année de creation </th>
                        <th>Site Web</th>
                        <th>Note</th>
                        <th>Image Véhicule</th>
                        
                        <th>Nom Modèle</th>
                        <th>Annee du vehicule</th>
                        
                        <th>Lien vers page de description</th>
                        <th>Nom Version</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>';
    
        foreach ($donneesVehicules as $vehicule) {
            echo '
            <tr>
                
                <td>' . $vehicule['logo'] . '</td>
                <td>' . $vehicule['nom'] . '</td>
                <td>' . $vehicule['pays'] . '</td>
                <td>' . $vehicule['siege_soc'] . '</td>
                <td>' . $vehicule['annee'] . '</td>
                <td>' . $vehicule['web'] . '</td>
                <td>' . $vehicule['note'] . '</td>
                <td>' . $vehicule['image'] . '</td>
                
                <td>' . $vehicule['nom_modele'] . '</td>
                <td>' . $vehicule['aneev'] . '</td>
                <td><a href="http://localhost/projet_web/Routers/VehicleDescription.php?id=' . $vehicule['vehicule_id'] . '">
                http://localhost/projet_web/Routers/VehicleDescription.php?id=' . $vehicule['vehicule_id'] . '</a>
                </td>
                <td>' . $vehicule['nom_version'] . '</td>
                <td>
                   <a href="http://localhost/projet_web/Routers/Gvehicules.php?id_vcl=' . $vehicule['vehicule_id'] . '">Modifier vehicule</a>
                   <a href="http://localhost/projet_web/Routers/Gvehicules.php?id_mrq=' . $vehicule['id_mrq'] . '">Modifier Marque</a>
                   <a href="http://localhost/projet_web/Routers/Gvehicules.php?id_ins=1">inserer un vehicule</a>

                    <a href="http://localhost/projet_web/Routers/Gvehicule.php?id=' . $vehicule['vehicule_id'] . '">Supprimer vehicule</a>
                    <a href="http://localhost/projet_web/Routers/Gvehicule.php?id=' . $vehicule['vehicule_id'] . '" class="btn btn-danger delete-vehicule">Supprimer</a>
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
        <form id="marqueForm" class="mt-4 mb-4">';
        
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
                    <form method="post" class="comparison-form custom-form">
                        <label for="vehicleType" class="form-label">Choisissez le type de véhicule :</label>
                        <select id="vehicleType" name="vehicleType" class="form-select mb-3">';
                        
                      echo'  <option value="' . $id_type . '">' . $nom_type . '</option> ';
                        
        
            
            echo '</select>
                    <div class="mb-3">
                        <h2>Véhicule </h2>
                        <label for="marque" class="form-label">Marque :</label>
                        <select id="marque" name="marque" class="form-select mb-3">
                            <option value="'.$id_marque.'">'.$marque.'</option>
                        </select>
                        <label for="model1" class="form-label">Modèle :</label>
                        <select id="model" name="model1" class="form-select mb-3">
                            <option value="'.$id_modele.'">'.$modele.'</option>
                        </select>
                        <label for="year1" class="form-label">Année :</label>
                        <select id="year" name="year1" class="form-select mb-3">
                            <option value="'.$id_vcl.'">'.$annee.'</option>
                        </select>
                        <label for="version1" class="form-label">Version :</label>
                        <select id="version" name="version1" class="form-select mb-3">
                            <option value="'.$id_version.'">'.$version.'</option>
                        </select>
                        <label for="web" class="form-label">logo:</label>
                        <input type="text" class="form-control mb-3" id="web" name="web" value="'.$image.'">
                    </div>
                    <div class="text-center">
                    <button type="submit" data-vclid="' . $id_vcl. '" class="btn btn-primary update_vcl">Modifier</button>
                    </div>
                    </form>
                </div>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
            </body>
            </html>';
        }
        






        public function insertVcl() {
            $accueilControler = new AccueilController();
            $types = $accueilControler->getTypesVehicules();
        echo'
        
        <!DOCTYPE html>
        <html lang="fr">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Édition du Véhicule</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
            <style>
                .custom-form {
                    max-width: 1000px; /* Largeur maximale du formulaire */
                    margin: 0 auto; /* Centrer le formulaire */
                    padding: 30px; /* Espacement intérieur du formulaire */
                }
            </style>
        </head>
        <body>
            <div class="container mt-5">
                <form method="post" class="comparison-form custom-form">
                <label for="vehicleType">Choisissez le type de véhicule :</label>
                <select id="vehicleType" name="vehicleType">';
                    foreach ($types as $type ) {
                      echo'
                      <option value="' . $type[0] . '" >' . $type[1] . '</option>
                      ';
                    }
                    
                echo '</select>
        
                    <div class="form-box">
                        <h2>Véhicule 1</h2>
                        <form method="post" class="comparison-form">
                            <label for="marque">Marque :</label>
                            <select id="marque1" name="marque" class="marque">
                                <option value="">sélectionner la marque</option>
                            </select>
        
                            <label for="model1">Modèle :</label>
                            <select id="model1" name="model1">
                                <option value="">sélectionner le modèle</option>
                            </select>
        
                            <label for="year1">Année :</label>
                            <select id="year1" name="year1">
                                <option value="">sélectionner lannée</option>
                            </select>
        
                            <label for="version1">Version :</label>
                            <select id="version1" name="version1">
                                <option value="">sélectionner la version</option>
                            </select>
        
                            <label for="logo">Logo du véhicule :</label>
                            <input type="text" class="form-control" id="logo" name="logo" placeholder="Entrez lURL du logo">
                            <div class="text-center">
            <button type="submit"  class="btn btn-primary insert_vcl">Modifier</button>
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
                    <form method="post" class="custom-form">
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
        
        
        
    
}
    
    

    
    
    
    
    
    
    
   
    

    



