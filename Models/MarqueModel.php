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
    
 
}




?>