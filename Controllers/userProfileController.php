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
    public function afficherUserInfo($id, $nom, $prenom, $email, $photo, $sexe){
        $vue=new  userProfileView();
        $vue->afficherUserInfo($id, $nom, $prenom, $email, $photo, $sexe);
    }
    public function afficheruserPage(){
        $vue=new  userProfileView();
        $vue->afficherProfilePage();
    }
    public function affichermesavis (){
        $vue=new  userProfileView();
        $vue->affichermesavis ();
    }
    public function affichereditmonavis ($idAvis){
        $vue=new  userProfileView();
        $avis=$this->recupererAvisParId($idAvis);
        $vue->affichereditmonavis ($avis);
    }

     
    public function getFavoriteV($idUser){
        
        $favorites=$this->user->getFavoriteV($idUser);
        return $favorites;
    }
    public function insererAvis($idUser, $idVehicule, $note, $contenu, $date){
        
        $result=$this->user->insererAvis($idUser, $idVehicule, $note, $contenu, $date);
        return $result;
    }

    public function affichereditprofile(){
        $vue=new  userProfileView();
        $vue->affichereditprofile();
    }

    public function   updateUserProfile($userId, $newName, $newFirstName, $newSexe, $newBirthDate)
    {
        
      $this->user->    updateUserProfile($userId, $newName, $newFirstName, $newSexe, $newBirthDate)
        ;
        
    }
    

    
    public function   incrementerNoteVehicule($idVehicule)
    {
        
      $this->user->    incrementerNoteVehicule($idVehicule)
        ;
        
    }
    public function   recupererAvisParUtilisateurEtVehicule($idUser)
    {
        
     $res= $this->user->   recupererAvisParUtilisateurEtVehicule($idUser)
        ;
        return $res;
    }
    
    public function    deleteAvis($id_vcl)
    {
        
      $this->user-> deleteAvis($id_vcl)
        ;
        
    }

   
    public function    recupererAvisParId($idAvis)
    {
        
     $res= $this->user->    recupererAvisParId($idAvis)
        ;
        return $res;
    }
   


    public function  mettreAjourCommentaire($id_avs_vcl, $nouveauCntxt)

    {
        
      $this->user->     mettreAjourCommentaire($id_avs_vcl, $nouveauCntxt)

        ;
       
    }
}