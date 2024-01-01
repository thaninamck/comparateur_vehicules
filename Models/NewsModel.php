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
    


    public function updateNewsWithImage($id, $imagePath, $title, $description, $content, $date) {
        $pdo = $this->dbModel->connect();
        $query = "UPDATE news 
                    JOIN images ON images.id_img = news.id_img
                    SET images.path = :imagePath, 
                        news.titre = :title, 
                        news.description_crt = :description, 
                        news.contenu = :content, 
                        news.date = :date 
                    WHERE news.id_news = :id";
        
        $stm = $pdo->prepare($query);
        $stm->bindParam(':id', $id, PDO::PARAM_INT);
        $stm->bindParam(':imagePath', $imagePath, PDO::PARAM_STR);
        $stm->bindParam(':title', $title, PDO::PARAM_STR);
        $stm->bindParam(':description', $description, PDO::PARAM_STR);
        $stm->bindParam(':content', $content, PDO::PARAM_STR);
        $stm->bindParam(':date', $date, PDO::PARAM_STR);
        
        $result = $stm->execute();
        
        $this->dbModel->disconnect($pdo);
        return $result;
    }



    public function insertNewsWithImage($imagePath, $title, $description, $content, $date) {
        $pdo = $this->dbModel->connect();
        
        // Insérer d'abord l'image
        $insertImageQuery = "INSERT INTO images (path) VALUES (:imagePath)";
        $imageStatement = $pdo->prepare($insertImageQuery);
        $imageStatement->bindParam(':imagePath', $imagePath, PDO::PARAM_STR);
        $imageStatement->execute();
        
        // Récupérer l'ID de l'image nouvellement insérée
        $imageId = $pdo->lastInsertId();
        
        // Insérer les données de la news avec l'ID de l'image
        $insertNewsQuery = "INSERT INTO news (id_img, titre, description_crt, contenu, date) VALUES (:imageId, :title, :description, :content, :date)";
        $newsStatement = $pdo->prepare($insertNewsQuery);
        $newsStatement->bindParam(':imageId', $imageId, PDO::PARAM_INT);
        $newsStatement->bindParam(':title', $title, PDO::PARAM_STR);
        $newsStatement->bindParam(':description', $description, PDO::PARAM_STR);
        $newsStatement->bindParam(':content', $content, PDO::PARAM_STR);
        $newsStatement->bindParam(':date', $date, PDO::PARAM_STR);
        
        $result = $newsStatement->execute();
        
        $this->dbModel->disconnect($pdo);
        return $result;
    }
    
    

    public function deleteNewsById($id) {
        $pdo = $this->dbModel->connect();
        $query = "DELETE FROM news WHERE id_news = :id";
        
        $stm = $pdo->prepare($query);
        $stm->bindParam(':id', $id, PDO::PARAM_INT);
        $stm->execute();
    
        $this->dbModel->disconnect($pdo);
    }
    


 
}




?>