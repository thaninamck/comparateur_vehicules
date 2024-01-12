<?php  
require_once('../Models/DbModel.php');

class UserModel {
    private $dbModel;

    public function __construct() {
        $this->dbModel = new DbModel();
    }

    public function checkUser($email) {
        $pdo = $this->dbModel->connect();
        $stm = $pdo->prepare("SELECT * FROM user where email = ?");
        $stm->execute(array($email));
        $r =$stm->fetchAll(\PDO::FETCH_NUM);
        $this->dbModel->disconnect($pdo);
        return (count($r)>0);
    }

    public function getUserByEmail($email) {
        
        $pdo = $this->dbModel->connect();
        $stm = $pdo->prepare("SELECT * FROM user where email = ?");
        $stm->execute(array($email));
        $userData =$stm->fetchAll(\PDO::FETCH_NUM);
        
        return $userData;
    }

    public function insertUser($user_name, $user_email, $user_prenom, $birth_date, $sexe,  $password) {
        $pdo = $this->dbModel->connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $qry = "INSERT INTO `user` (`nom`, `prenom`, `sexe`, `md_passe`, `status`, `email`, `birth_date` , `photo`)
                VALUES (:user_name, :user_prenom, :sexe, :password, :user_status, :user_email, :birth_date , :photo)";
        
        // Hashage du mot de passe
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $stm = $pdo->prepare($qry);
        $stm->bindValue(':user_name', $user_name);
        $stm->bindValue(':user_prenom', $user_prenom);
        $stm->bindValue(':sexe', $sexe);
        $stm->bindValue(':password', $hashed_password);
        $stm->bindValue(':user_status', "en attente");
        $stm->bindValue(':user_email', $user_email);
        $stm->bindValue(':birth_date', $birth_date);
        $stm->bindValue(':photo', "../Assets/User/user.png");
        
        try {
            
            
            $x = $stm->execute();
            
           
                $userData = $this->getUserByEmail($user_email);
                var_dump($userData);
                
                
                session_start();
            
                if($userData){
                
                $_SESSION['user_id'] = $userData[0][0];
                $_SESSION['user_name'] = $userData[0][1]; 
               
                $_SESSION['photo'] = $userData[0][6]; 
                }
            
            return 200;
        } catch (PDOException $e) {
            return 201;
        }
        $this->dbModel->disconnect($pdo);
    }
    
    
    public function getUser($email,$password) {
        $pdo = $this->dbModel->connect();
        $stm = $pdo->prepare("SELECT * FROM user WHERE email = ?");
        $stm->execute(array($email));
        $user = $stm->fetch(\PDO::FETCH_ASSOC);

        // Vérifie si l'utilisateur existe et le mot de passe est correct
        if ($user && password_verify($password, $user['md_passe'])) {
            // Mot de passe correct, retourne les données de l'utilisateur
            return $user;
        }
    }


    public function login($email,$pass){
        
        $user = $this->getUser($email,$pass);
        echo'<script> console.log("avant if ")</script>';
        if(isset($user)) {
               echo'<script> console.log("apres if")</script>';
                session_start();
                $_SESSION['user_id'] = $user['id_user'];
                $_SESSION['user_name'] = $user['nom'];
                $_SESSION['user_status'] = $user['status'];
                $_SESSION['photo'] = $user['photo']; 
                $_SESSION['sexe'] = $user['sexe']; 
                $_SESSION['prenom'] = $user['prenom'];
                $_SESSION['birth_date'] = $user['birth_date'];

                }
            
                $this->dbModel->disconnect($pdo);

    }



    public function getFavoriteV($idUser) {
        $pdo = $this->dbModel->connect();
        $stm = $pdo->prepare("SELECT v.id_vcl,v.note ,v.image, m.nom AS marque, mo.nom AS modele, ve.nom AS version 
                                FROM favoris f 
                                INNER JOIN vehicule v ON f.id_vcl = v.id_vcl 
                                INNER JOIN modele mo ON v.id_mdl = mo.id_mdl INNER 
                                JOIN marque m ON mo.id_mrq = m.id_mrq 
                                LEFT JOIN version ve 
                                ON v.id_vcl = ve.id_vcl 
                                WHERE  f.id_user = ?");
        $stm->execute(array($idUser));
        $favorites = $stm->fetchAll(\PDO::FETCH_ASSOC);
        $this->dbModel->disconnect($pdo);
        return $favorites;
    }
    

    public function insererAvis($idUser, $idVehicule, $note, $contenu, $date) {
        $pdo = $this->dbModel->connect();
        $stm = $pdo->prepare("INSERT INTO avis_vehicule (id_user, id_vcl, note, cntxt, date, approuv) VALUES (?, ?, ?, ?, ?, 0)");
        $stm->execute(array($idUser, $idVehicule, $note, $contenu, $date));
        $this->dbModel->disconnect($pdo);
        return $stm->rowCount() > 0;
    }
    



    public function getUsers() {
        $pdo = $this->dbModel->connect();
        $stm = $pdo->prepare("SELECT * FROM user");
        $stm->execute();
        $users = $stm->fetchAll(\PDO::FETCH_ASSOC);
        $this->dbModel->disconnect($pdo);
        return $users;
    }
    

    public function updateUserStatusToValid($userId) {
        
            $pdo = $this->dbModel->connect();
            
            
            $stmt = $pdo->prepare("UPDATE user SET status = 'valide' WHERE id_user = :userId");
            $stmt->bindParam(':userId', $userId);
            
           
            $stmt->execute();

            
            $this->dbModel->disconnect($pdo);}

            
            public function updateUserStatusToInvalid($userId) {
        
                $pdo = $this->dbModel->connect();
                
                
                $stmt = $pdo->prepare("UPDATE user SET status = 'en attente' WHERE id_user = :userId");
                $stmt->bindParam(':userId', $userId);
                
               
                $stmt->execute();
    
                
                $this->dbModel->disconnect($pdo);}

                public function updateUserStatusToBloqued($userId) {
        
                    $pdo = $this->dbModel->connect();
                    
                    
                    $stmt = $pdo->prepare("UPDATE user SET status = 'bloque' WHERE id_user = :userId");
                    $stmt->bindParam(':userId', $userId);
                    
                   
                    $stmt->execute();
        
                    
                    $this->dbModel->disconnect($pdo);}



                    public function updateUserProfile($userId, $newName, $newFirstName, $newSexe, $newBirthDate) {
                        // Connexion à la base de données
                        $pdo = $this->dbModel->connect();
                        
                        // Préparation de la requête SQL pour mettre à jour les informations de l'utilisateur
                        $stmt = $pdo->prepare("UPDATE user SET nom = :newName, prenom = :newFirstName, sexe = :newSexe, birth_date = :newBirthDate WHERE id_user = :userId");
                        $stmt->bindParam(':newName', $newName);
                        $stmt->bindParam(':newFirstName', $newFirstName);
                        $stmt->bindParam(':newSexe', $newSexe);
                        $stmt->bindParam(':newBirthDate', $newBirthDate);
                        $stmt->bindParam(':userId', $userId);
                        $_SESSION['user_name'] = $newName;
                $_SESSION['user_status'] = $user['status'];
                
                $_SESSION['sexe'] = $newSexe; 
                $_SESSION['prenom'] = $newFirstName;
                $_SESSION['birth_date'] = $newBirthDate;
                        // Exécution de la requête
                        $stmt->execute();
                        
                        // Déconnexion de la base de données
                        $this->dbModel->disconnect($pdo);
                    }
                    



                    public function incrementerNoteVehicule($idVehicule) {
                        $pdo = $this->dbModel->connect();
                    
                        // Incrémente la note du véhicule de 1
                        $updateStmt = $pdo->prepare("UPDATE vehicule SET note = note + 1 WHERE id_vcl = ?");
                        $updateStmt->execute([$idVehicule]);
                    
                        $this->dbModel->disconnect($pdo);
                        return $updateStmt->rowCount() > 0;
                    }
                    

                    public function recupererAvisParUtilisateurEtVehicule($idUser) {
                        $pdo = $this->dbModel->connect();
                    
                        // Récupère les avis de la table avis_vehicule pour un utilisateur et un véhicule donnés
                        $selectStmt = $pdo->prepare("SELECT * FROM avis_vehicule WHERE id_user = ?  ");
                        $selectStmt->execute([$idUser]);
                        $avis = $selectStmt->fetchAll(PDO::FETCH_ASSOC);
                    
                        $this->dbModel->disconnect($pdo);
                        return $avis;
                    }
                    

                    public function deleteAvis($id_vcl) {
                        $pdo = $this->dbModel->connect();
                                
                                    $query = "DELETE FROM avis_vehicule WHERE id_avs_vcl = :id_vcl";

                                    $stm = $pdo->prepare($query);
                                
                                    $stm->bindParam(':id_vcl', $id_vcl, PDO::PARAM_INT);
                                    $stm->execute();
                                
                                    $this->dbModel->disconnect($pdo);
                    }
                    
                    public function recupererAvisParId($idAvis) {
                        $pdo = $this->dbModel->connect();
                    
                        $selectStmt = $pdo->prepare("SELECT * FROM avis_vehicule WHERE id_avs_vcl = ?");
                        $selectStmt->execute([$idAvis]);
                        $avis = $selectStmt->fetch(PDO::FETCH_ASSOC);
                    
                        $this->dbModel->disconnect($pdo);
                        return $avis;
                    }

                    public function mettreAjourCommentaire($id_avs_vcl, $nouveauCntxt) {
                        $pdo = $this->dbModel->connect();
                    
                       
                            $stmt = $pdo->prepare("UPDATE avis_vehicule SET cntxt = :nouveauCntxt WHERE id_avs_vcl = :id_avs_vcl");
                            $stmt->bindParam(':nouveauCntxt', $nouveauCntxt, PDO::PARAM_STR);
                            $stmt->bindParam(':id_avs_vcl', $id_avs_vcl, PDO::PARAM_INT);
                            $stmt->execute();
                    
                            
                            $this->dbModel->disconnect($pdo);
                        
                    }
                    
                    
};
?>