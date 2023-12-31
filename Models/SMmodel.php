<?php  
require_once('../Models/DbModel.php');

class SM {
    private $dbModel;

    public function __construct() {
        $this->dbModel = new DbModel();
    }

    public function getSocialMedia() {
        $pdo = $this->dbModel->connect();
        $stm = $pdo->query("SELECT * FROM social_media");
        $results = $stm->fetchAll(PDO::FETCH_NUM);
        $this->dbModel->disconnect($pdo);
        return $results;
    }
}




?>