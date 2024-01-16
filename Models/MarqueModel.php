<?php  
require_once('../Models/DbModel.php');

class Marque {
    private $dbModel;

    public function __construct() {
        $this->dbModel = new DbModel();
    }

    public function getMarques() {
        $pdo = $this->dbModel->connect();
        $stm = $pdo->query("SELECT * FROM marque");
        $results = $stm->fetchAll(PDO::FETCH_NUM);
        $this->dbModel->disconnect($pdo);
        return $results;
    }


    
    public function getMarqueByType($idtype) {
        
        $pdo = $this->dbModel->connect();
        $stm =  $pdo->prepare("SELECT * FROM marque JOIN (SELECT id_mrq FROM marque_type WHERE id_type_v = ?) AS m ON m.id_mrq = marque.id_mrq");
        $stm->execute(array($idtype));
        $marques = $stm->fetchAll(\PDO::FETCH_ASSOC);
        $this->dbModel->disconnect($pdo);
        return $marques;
    }


    public function getMarqueById($id) {
        
        $pdo = $this->dbModel->connect();
        $stm =  $pdo->prepare("SELECT * FROM marque  WHERE id_mrq = ?");
        $stm->execute(array($id));
        $marque = $stm->fetchAll(\PDO::FETCH_ASSOC);
        $this->dbModel->disconnect($pdo);
        return $marque;
    }

    public function DeleteMarque($id) {
        $pdo = $this->dbModel->connect();
        $stm = $pdo->prepare("DELETE FROM marque WHERE id_mrq = ?");
        $stm->execute(array($id));
        $this->dbModel->disconnect($pdo);
    }

    public function DeleteVehicule($id) {
        $pdo = $this->dbModel->connect();
        $stm = $pdo->prepare("DELETE FROM vehicule WHERE id_vcl = ?");
        $stm->execute(array($id));
        $this->dbModel->disconnect($pdo);
    }
    

   

    public function getVehiclesOfMarque($marque_id) {
        $pdo = $this->dbModel->connect();
        $stm =  $pdo->prepare("SELECT m.id_mrq, v.image, v.annee AS aneev, v.id_vcl AS vehicule_id, 
                            mo.id_mdl AS modele_id, mo.nom AS nom_modele, 
                            ve.id_version AS version_id, ve.nom AS nom_version 
                            FROM marque m 
                            LEFT JOIN modele mo ON m.id_mrq = mo.id_mrq 
                            JOIN vehicule v ON mo.id_mdl = v.id_mdl 
                            LEFT JOIN version ve ON v.id_vcl = ve.id_vcl 
                            WHERE m.id_mrq = ?");
        $stm->execute([$marque_id]);
        $marque = $stm->fetchAll(\PDO::FETCH_ASSOC);
        $this->dbModel->disconnect($pdo);
        return $marque;
    }
    

    public function updateMarque($id, $logo, $nom, $pays, $siege_soc, $annee, $web) {
       
            $pdo = $this->dbModel->connect();
            
            $query = "UPDATE marque 
                      SET logo = :logo, nom = :nom, pays = :pays, siege_soc = :siege_soc, annee = :annee, web = :web 
                      WHERE id_mrq = :id";
            
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
            $stmt->bindParam(':logo', $logo, \PDO::PARAM_STR);
            $stmt->bindParam(':nom', $nom, \PDO::PARAM_STR);
            $stmt->bindParam(':pays', $pays, \PDO::PARAM_STR);
            $stmt->bindParam(':siege_soc', $siege_soc, \PDO::PARAM_STR);
            $stmt->bindParam(':annee', $annee, \PDO::PARAM_STR);
            $stmt->bindParam(':web', $web, \PDO::PARAM_STR);

            
            $stmt->execute();
            
            $this->dbModel->disconnect($pdo);
            
            
    }
    
    public function getVehiculeDetailsById($id_vcl) {
        $pdo = $this->dbModel->connect();
    
        $query = "SELECT t.id_type_v as id_type, t.nom as nom_type, v.id_vcl, v.image, v.note, v.annee, 
                  m.nom AS marque, m.id_mrq as id_marque, mdl.id_mdl as id_modele, mdl.nom AS modele, 
                  vr.nom AS version, vr.id_version as id_version 
                  FROM vehicule v 
                  INNER JOIN modele mdl ON v.id_mdl = mdl.id_mdl 
                  INNER JOIN marque m ON mdl.id_mrq = m.id_mrq 
                  JOIN marque_type mt ON mt.id_mrq = m.id_mrq 
                  JOIN type_vehicule t ON t.id_type_v = mt.id_type_v 
                  LEFT JOIN version vr ON v.id_vcl = vr.id_vcl 
                  WHERE v.id_vcl = :id_vcl";
    
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':id_vcl', $id_vcl, \PDO::PARAM_INT);
        $stmt->execute();
    
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
    
        $this->dbModel->disconnect($pdo);
    
        return $result;
    }

    public function updateVehiculeDetailsById($id_vcl, $newImageValue) {
        $pdo = $this->dbModel->connect();
    
        $query = "UPDATE vehicule v
                  INNER JOIN modele mdl ON v.id_mdl = mdl.id_mdl
                  INNER JOIN marque m ON mdl.id_mrq = m.id_mrq
                  JOIN marque_type mt ON mt.id_mrq = m.id_mrq
                  JOIN type_vehicule t ON t.id_type_v = mt.id_type_v
                  LEFT JOIN version vr ON v.id_vcl = vr.id_vcl
                  SET v.image = :new_image_value
                  WHERE v.id_vcl = :id_vcl";
    
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':new_image_value', $newImageValue, \PDO::PARAM_STR);
        $stmt->bindParam(':id_vcl', $id_vcl, \PDO::PARAM_INT);
        $stmt->execute();
    
        $this->dbModel->disconnect($pdo);
    }
    
    
    



    public function getModele() {
        $pdo = $this->dbModel->connect();
        $stm = $pdo->query("SELECT * FROM modele");
        $results = $stm->fetchAll(\PDO::FETCH_ASSOC);
        $this->dbModel->disconnect($pdo);
        return $results;
    }
   
    public function getversion() {
        $pdo = $this->dbModel->connect();
        $stm = $pdo->query("SELECT * FROM version");
        $results = $stm->fetchAll(\PDO::FETCH_ASSOC);
        $this->dbModel->disconnect($pdo);
        return $results;
    }


    public function getMarqueById1($id) {
        $pdo = $this->dbModel->connect();
        $stm =  $pdo->prepare("SELECT m.*, v.image,v.id_vcl AS vehicule_id, mo.id_mdl AS modele_id, mo.nom AS nom_modele, ve.id_version AS version_id, ve.nom AS nom_version, c.id_caract AS caracteristique_id, c.nom AS nom_caracteristique, c.valeur AS valeur_caracteristique FROM marque m 
        LEFT JOIN modele mo ON m.id_mrq = mo.id_mrq JOIN vehicule v 
        ON mo.id_mdl = v.id_mdl JOIN vehicule_caracteristiques vc ON vc.id_vcl=v.id_vcl 
        LEFT JOIN caracteristiques c ON vc.id_caract = c.id_caract LEFT JOIN version ve 
        ON v.id_vcl = ve.id_vcl WHERE m.id_mrq = ?");
        $stm->execute(array($id));
        $marqueData = $stm->fetchAll(\PDO::FETCH_ASSOC);
        $this->dbModel->disconnect($pdo);
    
        // Structure de données pour organiser les résultats
        $marque = array();
        foreach ($marqueData as $row) {
            $marque['informations_marque'] = array(
                'id_mrq' => $row['id_mrq'],
                'nom' => $row['nom'],
                'logo' => $row['logo'],
                'siege_soc' => $row['siege_soc'],
                'web' => $row['web'],
                'pays' => $row['pays'],
                'annee' => $row['annee'],
                'note' => $row['note'],
                // Autres informations spécifiques à la marque...
            );
    
            $vehiculeId = $row['vehicule_id'];
            if (!isset($marque['vehicules'][$vehiculeId])) {
                $marque['vehicules'][$vehiculeId] = array(
                    'id_vcl' => $row['vehicule_id'],
                    'image'=>$row['image'],
                    // Autres informations spécifiques au véhicule...
                    'modeles' => array(),
                );
            }
    
            $modeleId = $row['modele_id'];
            if (!isset($marque['vehicules'][$vehiculeId]['modeles'][$modeleId])) {
                $marque['vehicules'][$vehiculeId]['modeles'][$modeleId] = array(
                    'id_mdl' => $row['modele_id'],
                    'nom_modele' => $row['nom_modele'],
                    // Autres informations spécifiques au modèle...
                    'versions' => array(),
                );
            }
    
            $versionId = $row['version_id'];
            if (!isset($marque['vehicules'][$vehiculeId]['modeles'][$modeleId]['versions'][$versionId])) {
                $marque['vehicules'][$vehiculeId]['modeles'][$modeleId]['versions'][$versionId] = array(
                    'id_version' => $row['version_id'],
                    'nom_version' => $row['nom_version'],
                    // Autres informations spécifiques à la version...
                    'caracteristiques' => array(),
                );
            }
    
            $caractId = $row['caracteristique_id'];
            $marque['vehicules'][$vehiculeId]['modeles'][$modeleId]['versions'][$versionId]['caracteristiques'][$caractId] = array(
                'id_caract' => $row['caracteristique_id'],
                'nom_caracteristique' => $row['nom_caracteristique'],
                'valeur_caracteristique' => $row['valeur_caracteristique'],
                
            );
        }
    
        return $marque;
    }
    


    public function getHighRatedAv( $id_mrq) {
        $pdo = $this->dbModel->connect();
        
        $query = "SELECT av.*, u.nom AS nom_utilisateur, u.photo AS photo_utilisateur
                  FROM avis_marque av
                  INNER JOIN user u ON av.id_user = u.id_user
                  WHERE av.id_mrq = :id_mrq AND av.note >= 70 AND approuv=1
                  LIMIT 3";
        
        $stm = $pdo->prepare($query);
        
        $stm->bindParam(':id_mrq', $id_mrq, PDO::PARAM_INT);
        $stm->execute();
        
        $avis = $stm->fetchAll(PDO::FETCH_ASSOC);
        
        $this->dbModel->disconnect($pdo);
        return $avis;
    }
    




    public function incrementerNoteAvis($id_avs_mrq){
        $pdo = $this->dbModel->connect();
        
        $query = "UPDATE avis_marque SET note = note + 1 WHERE id_avs_mrq = :id_avs_mrq";
        $stm = $pdo->prepare($query);
        $stm->bindParam(':id_avs_mrq', $id_avs_mrq, PDO::PARAM_INT);
        $stm->execute();
        
        $this->dbModel->disconnect($pdo);
    }

    public function incrementerNoteMarque($id_mrq){
        $pdo = $this->dbModel->connect();
        
        $query = "UPDATE marque SET note = note + 1 WHERE id_mrq = :id_mrq";
        $stm = $pdo->prepare($query);
        $stm->bindParam(':id_mrq', $id_mrq, PDO::PARAM_INT);
        $stm->execute();
        
        $this->dbModel->disconnect($pdo);
    }
    
    




    public function insererAvisMarque($id_user, $id_mrq, $avis_text) {
        $pdo = $this->dbModel->connect();
        
        $query = "INSERT INTO avis_marque (id_user, id_mrq, cntxt, approuv, date, note) VALUES (:id_user, :id_mrq, :cntxt, 0, NOW(), 0)";
        
        $stm = $pdo->prepare($query);
        
        $stm->bindParam(':id_user', $id_user, PDO::PARAM_INT);
        $stm->bindParam(':id_mrq', $id_mrq, PDO::PARAM_INT);
        $stm->bindParam(':cntxt', $avis_text, PDO::PARAM_STR);
        
        // Exécutez la requête d'insertion
        $success = $stm->execute();
        
        $this->dbModel->disconnect($pdo);
        
        return $success; // Renvoie true si l'insertion a réussi, sinon false
    }
    
 
    public function insererNouvelleMarque($logo, $nom, $pays, $siege_social, $annee, $web) {
        $pdo = $this->dbModel->connect();
        
        $query = "INSERT INTO marque (logo, nom, pays, siege_soc, annee, web, note) VALUES (:logo, :nom, :pays, :siege_soc, :annee, :web, 0)";
        
        $stm = $pdo->prepare($query);
        
        $stm->bindParam(':logo', $logo, PDO::PARAM_STR);
        $stm->bindParam(':nom', $nom, PDO::PARAM_STR);
        $stm->bindParam(':pays', $pays, PDO::PARAM_STR);
        $stm->bindParam(':siege_soc', $siege_social, PDO::PARAM_STR);
        $stm->bindParam(':annee', $annee, PDO::PARAM_STR);
        $stm->bindParam(':web', $web, PDO::PARAM_STR);
        
        $success = $stm->execute();
        
        $this->dbModel->disconnect($pdo);
        
        return $success;
    }
    

    public function getMarquesAdmin() {
        $pdo = $this->dbModel->connect();
        $stm = $pdo->query("SELECT * FROM marque");
        $results = $stm->fetchAll(\PDO::FETCH_ASSOC);
        $this->dbModel->disconnect($pdo);
        return $results;
    }



    public function getCaracteristiquesVehicule($idVehicule) {
        $pdo = $this->dbModel->connect();
    
        $stm = $pdo->prepare("SELECT c.*, v.id_vcl 
                              FROM vehicule v 
                              JOIN vehicule_caracteristiques vc ON v.id_vcl = vc.id_vcl 
                              LEFT JOIN caracteristiques c ON vc.id_caract = c.id_caract 
                              WHERE v.id_vcl = :id");
    
        $stm->bindParam(':id', $idVehicule, \PDO::PARAM_INT);
        $stm->execute();
    
        $caracteristiques = $stm->fetchAll(\PDO::FETCH_ASSOC);
    
        $this->dbModel->disconnect($pdo);
    
        return $caracteristiques;
    }

    

    public function updateCaracteristique($idCaracteristique, $nouveauNom, $nouvelleValeur) {
       
            $pdo = $this->dbModel->connect();

            $query = "UPDATE caracteristiques SET nom = :nouveauNom, valeur = :nouvelleValeur WHERE id_caract = :id";

            $stm = $pdo->prepare($query);

            $stm->bindParam(':id', $idCaracteristique, \PDO::PARAM_INT);
            $stm->bindParam(':nouveauNom', $nouveauNom, \PDO::PARAM_STR);
            $stm->bindParam(':nouvelleValeur', $nouvelleValeur, \PDO::PARAM_STR);

           
            $stm->execute();

            $this->dbModel->disconnect($pdo);

           
        }




        public function insererCaracteristique($nom, $valeur, $idVehicule) {
      
            $pdo = $this->dbModel->connect();
  
            $query = "INSERT INTO caracteristiques (nom, valeur) VALUES (:nom, :valeur)";
            $stm = $pdo->prepare($query);
  
            $stm->bindParam(':nom', $nom, \PDO::PARAM_STR);
            $stm->bindParam(':valeur', $valeur, \PDO::PARAM_STR);
  
            $stm->execute();
  
            $idNouvelleCaracteristique = $pdo->lastInsertId();
  
            $queryRelation = "INSERT INTO vehicule_caracteristiques (id_caract, id_vcl) VALUES (:idCaracteristique, :idVehicule)";
            $stmRelation = $pdo->prepare($queryRelation);
  
            $stmRelation->bindParam(':idCaracteristique', $idNouvelleCaracteristique, \PDO::PARAM_INT);
            $stmRelation->bindParam(':idVehicule', $idVehicule, \PDO::PARAM_INT);
  
            $stmRelation->execute();
  
            $this->dbModel->disconnect($pdo);
  
            
        }



        
        public function supprimerCaracteristique($idVehicule, $idCaracteristique) {
         
                $pdo = $this->dbModel->connect();
    
                // Supprimer l'association dans la table de liaison (vehicule_caracteristiques)
                $query = "DELETE FROM vehicule_caracteristiques WHERE id_vcl = :idVcl AND id_caract = :idCaract";
                $stm = $pdo->prepare($query);
                $stm->bindParam(':idVcl', $idVehicule, \PDO::PARAM_INT);
                $stm->bindParam(':idCaract', $idCaracteristique, \PDO::PARAM_INT);
                $stm->execute();
    
                // Fermeture de la connexion
                $this->dbModel->disconnect($pdo);}

            public function getfeatureById($idCaracteristique) {
              
                    $pdo = $this->dbModel->connect();
        
                    $query = "SELECT * FROM caracteristiques WHERE id_caract = :id";
                    $stm = $pdo->prepare($query);
        
                    $stm->bindParam(':id', $idCaracteristique, \PDO::PARAM_INT);
        
                    $stm->execute();
        
                    $caracteristique = $stm->fetch(\PDO::FETCH_ASSOC);
        
                    $this->dbModel->disconnect($pdo);
                     return $caracteristique;
                }
        



                public function updateVehiculeAndVersion($idVehicule, $image,   $annee) {
                    $pdo = $this->dbModel->connect();
                
                    // Mise à jour du véhicule
                    $vehiculeQuery = "UPDATE vehicule SET image = :image,   annee = :annee WHERE id_vcl = :idVehicule ";
                    $vehiculeStmt = $pdo->prepare($vehiculeQuery);
                    $vehiculeStmt->bindParam(':idVehicule', $idVehicule, \PDO::PARAM_INT);
                    $vehiculeStmt->bindParam(':image', $image, \PDO::PARAM_STR);
                    $vehiculeStmt->bindParam(':annee', $annee, \PDO::PARAM_STR);
                    $vehiculeStmt->execute();
                
                    
                
                    $this->dbModel->disconnect($pdo);
                }
                
               public function insertNewVehicule($image, $annee, $id_mdl) {
                    $pdo = $this->dbModel->connect();
                
                    // Insertion d'un nouveau véhicule
                    $vehiculeQuery = "INSERT INTO vehicule (image, note,annee, id_mdl) VALUES (:image, 0,:annee, :id_mdl)";
                    $vehiculeStmt = $pdo->prepare($vehiculeQuery);
                    $vehiculeStmt->bindParam(':image', $image, \PDO::PARAM_STR);
                    $vehiculeStmt->bindParam(':annee', $annee, \PDO::PARAM_STR);
                    $vehiculeStmt->bindParam(':id_mdl', $id_mdl, \PDO::PARAM_INT);
                    $vehiculeStmt->execute();
                
                    // Récupération de l'ID du nouveau véhicule inséré
                    $newVehiculeId = $pdo->lastInsertId();
                
                    $this->dbModel->disconnect($pdo);
                
                    return $newVehiculeId;
                }
                
                








}




?>