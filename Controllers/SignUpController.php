<?php

require_once ('../Models/UserModel.php');
require_once ('../Views/LoginView.php');
require_once ('../Views/SignUpView.php');

class SignUpController {


    private $user;
    public function __construct()
    {
        $this->user = new UserModel();
    }

    public function afficherSignUpPage() {
        $signupVue = new SignUpView();
        $signupVue -> afficherFormulaireInscription();
        
    }

    public function checkUser($email) {
        return $this->user->checkUser($email);
    }

        // pour l'inscription de lutilisateur 
    public function register() {
        if(isset($_POST['nom']) and isset($_POST['email']) and  isset($_POST['mot_de_passe']) and isset($_POST['date_naissance']) and isset($_POST['confirmer_mot_de_passe']) and isset($_POST['prenom'])){
            if($this->user->checkUser($_POST['email'])) {
                return 203;//une ereeur de duplication de mail dans la bdd
            }
            else {
                    //inserer l'utilisateur dans la bdd 
                    return  $this->user->insertUser($_POST['nom'],$_POST['email'],$_POST['prenom'],$_POST['date_naissance'],$_POST['sexe'],$_POST['mot_de_passe']);
            }                   
        }
        return 203;
    }

    //pour la page d econnexion 
    public function afficherLoginPage() {
        $loginVue = new LoginView();
        $loginVue->afficherLoginpage();
    }




    public function log_user() {
        if(isset($_POST['email_log']) && isset($_POST['psw_log']) ){
            if($this->checkUser($_POST['email_log'])) {
                $user = $this->user->getUser($_POST['email_log'],$_POST['psw_log']);

                if($user){
                    $this->user->login($_POST['email_log'],$_POST['psw_log']);
                    
                    return 200;
                }
                else {
                      return 201;
                }
            }
            else {
                return 202;
            }
        }
        return 201;
    }





}?>

