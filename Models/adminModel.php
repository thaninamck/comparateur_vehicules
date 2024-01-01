<?php  
require_once('../Models/DbModel.php');

class AdminModel {
    private $dbModel;

    public function __construct() {
        $this->dbModel = new DbModel();
    }

    public function checkAdmin($email) {
        $pdo = $this->dbModel->connect();
        $stm = $pdo->prepare("SELECT * FROM admin where mail = ?");
        $stm->execute(array($email));
        $r =$stm->fetchAll(\PDO::FETCH_NUM);
        $this->dbModel->disconnect($pdo);
        return (count($r)>0);
    }

    public function getAdminByEmail($email) {
        
        $pdo = $this->dbModel->connect();
        $stm = $pdo->prepare("SELECT * FROM admin where mail = ?");
        $stm->execute(array($email));
        $userData =$stm->fetchAll(\PDO::FETCH_NUM);
        
        return $userData;
    }

    
    
    
    public function getAdmin($email,$password) {
        $pdo = $this->dbModel->connect();
        $stm = $pdo->prepare("SELECT * FROM admin WHERE mail = ?");
        $stm->execute(array($email));
        $user = $stm->fetch(\PDO::FETCH_ASSOC);

        // Vérifie si l'utilisateur existe et le mot de passe est correct
        if ($user && ($password==$user['passwd'])) {
            // Mot de passe correct, retourne les données de l'utilisateur
            return $user;
        }
    }


    public function login($email,$pass){
        
        $user = $this->getAdmin($email,$pass);
        
        if(isset($user)) {
               echo'<script> console.log("apres if")</script>';
                session_start();
                $_SESSION['id_admin'] = $user['id_admin'];
                
               
                
                }
            
                $this->dbModel->disconnect($pdo);

    }



   
    

  


}?>