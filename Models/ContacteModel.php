<?php  
require_once('../Models/DbModel.php');

class ContacteModel {
    private $dbModel;

    public function __construct() {
        $this->dbModel = new DbModel();
    }

    public function getContacte() {
        $pdo = $this->dbModel->connect();
        $stm = $pdo->query("SELECT * FROM contact");
        $results = $stm->fetchAll(\PDO::FETCH_ASSOC);
        $this->dbModel->disconnect($pdo);
        return $results;
    }




}