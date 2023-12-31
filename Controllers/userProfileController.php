<?php
require_once ('../Models/UserModel.php');
require_once ('../Views/userProfileView.php');





class userProfileController
{
    private $user;
    
    
    public function __construct()
    {
        $this->user = new UserModel();
       
    }
   
    public function afficheruserPage(){
        $vue=new  userProfileView();
        $vue->afficherProfilePage();
    }
     
    public function getFavoriteV($idUser){
        
        $favorites=$this->user->getFavoriteV($idUser);
        return $favorites;
    }
    public function insererAvis($idUser, $idVehicule, $note, $contenu, $date){
        
        $result=$this->user->insererAvis($idUser, $idVehicule, $note, $contenu, $date);
        return $result;
    }
    


}