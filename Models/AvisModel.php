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
                    WHERE av.id_vcl = :id_vcl AND approuv = 1";
        
        $stm = $pdo->prepare($query);
        
        $stm->bindParam(':id_vcl', $id_vcl, PDO::PARAM_INT);
        $stm->execute();
        
        $result = $stm->fetch(PDO::FETCH_ASSOC);
        
        $totalAvis = $result['totalAvis']; // Récupérer le nombre total d'avis
        
        $this->dbModel->disconnect($pdo);
        return $totalAvis;
    }
    
    




    
   
    
    




    
    
 
}




?>