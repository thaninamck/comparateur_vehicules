<?php  
require_once('../Models/DbModel.php');

class Avis {
    private $dbModel;

    public function __construct() {
        $this->dbModel = new DbModel();
    }

  

    
    


    public function getAvisByVehicule($id_vcl, $limit , $offset ) {
        $pdo = $this->dbModel->connect();
        
        $query = "SELECT av.*, u.nom AS nom_utilisateur, u.photo AS photo_utilisateur
        FROM avis_vehicule av
        INNER JOIN user u ON av.id_user = u.id_user
        WHERE av.id_vcl = :id_vcl AND approuv = 1 
        LIMIT :limit OFFSET :offset";

        $stm = $pdo->prepare($query);
        
        $stm->bindParam(':id_vcl', $id_vcl, PDO::PARAM_INT);
        $stm->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stm->bindParam(':offset', $offset, PDO::PARAM_INT);
        
        $stm->execute();
        
        $avis = $stm->fetchAll(PDO::FETCH_ASSOC);
        
        $this->dbModel->disconnect($pdo);
        return $avis;
    }
    

    public function getTotalAvisVehicule($id_vcl) {
        $pdo = $this->dbModel->connect();
        
        $query = "SELECT count(*) as totalAvis
                    FROM avis_vehicule av
                    INNER JOIN user u ON av.id_user = u.id_user
                    WHERE av.id_vcl = :id_vcl AND approuv = 1 ";
        
        $stm = $pdo->prepare($query);
        
        $stm->bindParam(':id_vcl', $id_vcl, PDO::PARAM_INT);
        $stm->execute();
        
        $result = $stm->fetch(PDO::FETCH_ASSOC);
        
        $totalAvis = $result['totalAvis']; // Récupérer le nombre total d'avis
        
        $this->dbModel->disconnect($pdo);
        return $totalAvis;
    }
    
    
    public function refuseAvis($id_vcl) {
        $pdo = $this->dbModel->connect();
    
        $query = "UPDATE avis_vehicule
                    SET approuv = 3
                    WHERE id_avs_vcl = :id_vcl ";
    
        $stm = $pdo->prepare($query);
    
        $stm->bindParam(':id_vcl', $id_vcl, PDO::PARAM_INT);
        $stm->execute();
    
        $this->dbModel->disconnect($pdo);
    }

    public function validerAvis($id_vcl) {
        $pdo = $this->dbModel->connect();
    
        $query = "UPDATE avis_vehicule
                    SET approuv = 1
                    WHERE id_avs_vcl = :id_vcl ";
    
        $stm = $pdo->prepare($query);
    
        $stm->bindParam(':id_vcl', $id_vcl, PDO::PARAM_INT);
        $stm->execute();
    
        $this->dbModel->disconnect($pdo);
    }

    public function invaliderAvis($id_vcl) {
        $pdo = $this->dbModel->connect();
    
        $query = "UPDATE avis_vehicule
                    SET approuv = 0
                    WHERE id_avs_vcl = :id_vcl ";
    
        $stm = $pdo->prepare($query);
    
        $stm->bindParam(':id_vcl', $id_vcl, PDO::PARAM_INT);
        $stm->execute();
    
        $this->dbModel->disconnect($pdo);
    }

    public function deleteAvis($id_vcl) {
        $pdo = $this->dbModel->connect();
    
        $query = "DELETE FROM avis_vehicule WHERE id_avs_vcl = :id_vcl";

        $stm = $pdo->prepare($query);
    
        $stm->bindParam(':id_vcl', $id_vcl, PDO::PARAM_INT);
        $stm->execute();
    
        $this->dbModel->disconnect($pdo);
    }
    



    
    public function getAllAvis() {
        $pdo = $this->dbModel->connect();
        $query = "
        SELECT av.id_avs_vcl, av.cntxt, av.approuv, av.date, av.note, u.nom 
        AS nom_utilisateur, 
        u.id_user AS id_user, CONCAT(m.nom, ' - ', mo.nom) AS infos_vehicule FROM avis_vehicule av 
        INNER JOIN user u ON av.id_user = u.id_user
         INNER JOIN vehicule v ON av.id_vcl = v.id_vcl 
         INNER JOIN modele mo ON v.id_mdl = mo.id_mdl 
         JOIN marque m ON mo.id_mrq = m.id_mrq where u.status!='bloque'  ";
    
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $this->dbModel->disconnect($pdo);
        return $result;
    }
    
    public function bloquerUtilisateur($id_utilisateur) {
        $pdo = $this->dbModel->connect();
    
        $query = "UPDATE user SET status = 'bloque' WHERE id_user = :id";
    
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':id', $id_utilisateur, PDO::PARAM_INT);
    
        
        $stmt->execute();
    
        $this->dbModel->disconnect($pdo);
    }
    
    
    




    
    
 
}




?>