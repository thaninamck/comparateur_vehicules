<?php  
require_once('../Models/DbModel.php');

class Modele {
    private $dbModel;

    public function __construct() {
        $this->dbModel = new DbModel();
    }

    


    public function getModeleByMarque($idmrq) {
        
        $pdo = $this->dbModel->connect();
        $stm =  $pdo->prepare("SELECT * FROM modele  WHERE id_mrq = ?");
        $stm->execute(array($idmrq));
        $modeles = $stm->fetchAll(\PDO::FETCH_ASSOC);
        $this->dbModel->disconnect($pdo);
        return $modeles;
    }

}




?>