<?php  
require_once('../Models/DbModel.php');

class News {
    private $dbModel;

    public function __construct() {
        $this->dbModel = new DbModel();
    }

    public function getNews() {
        $pdo = $this->dbModel->connect();
        $stm = $pdo->query("SELECT * FROM images join news where images.id_img=news.id_img");
        $results = $stm->fetchAll(PDO::FETCH_NUM);
        $this->dbModel->disconnect($pdo);
        return $results;
    }


    public function getNewsById($id) {
        $pdo = $this->dbModel->connect();
        $query = "SELECT * FROM images 
                    JOIN news ON images.id_img = news.id_img 
                    WHERE news.id_news = :id";
    
        $stm = $pdo->prepare($query);
        $stm->bindParam(':id', $id, PDO::PARAM_INT);
        $stm->execute();
    
        $news = $stm->fetchAll(PDO::FETCH_ASSOC);
    
        $this->dbModel->disconnect($pdo);
        return $news;
    }
    
}




?>