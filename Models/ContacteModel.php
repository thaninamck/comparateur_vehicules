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



    public function updateContact($id, $nom, $email, $message) {
        $pdo = $this->dbModel->connect();
       
            $sql = "UPDATE contact SET nom = :nom, email = :email, message = :message WHERE id_contact = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':message', $message);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $this->dbModel->disconnect($pdo);
            return true; 
        
    }
    
    public function getContactById($id) {
        $pdo = $this->dbModel->connect();
        
            $sql = "SELECT * FROM contact WHERE id_contact = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
    
            $contact = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            $this->dbModel->disconnect($pdo);
            return $contact;
        
    }
    
    


}