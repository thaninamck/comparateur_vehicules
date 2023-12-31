<?php  
require_once('../Models/DbModel.php');

class Menu {
    private $dbModel;

    public function __construct() {
        $this->dbModel = new DbModel();
    }

    public function getMenuItems() {
        $pdo = $this->dbModel->connect();
        $stm = $pdo->query("SELECT * FROM menu_items");
        $results = $stm->fetchAll(PDO::FETCH_NUM);
        $this->dbModel->disconnect($pdo);
        return $results;
    }
}




?>