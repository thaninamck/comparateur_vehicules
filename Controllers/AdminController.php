<?php
require_once ('../Models/adminModel.php');
require_once ('../Views/AdminMainView.php');
require_once ('../Models/AvisModel.php');
require_once ('../Views/GAvisView.php');






class AdminController
{
   
    private $admin;
    private $avis;
    
    public function __construct()
    {
        
        $this->avis = new Avis();
    }

     
    public function afficherMain($path) {
        $vue = new AdminMainView();
        $vue->afficherEntete($path);
        $vue->afficherNavbar();
        $vue->afficherCartes();
        
    }
    public function afficherTemplate($path) {
        $vue = new AdminMainView();
        $vue->afficherEntete($path);
        $vue->afficherNavbar();
        
        
    }

    public function afficherAvis() {
        $vue = new GAvisView();
        $avis=$this->getAllAvis();
        $vue->afficherAvis($avis);
        
        
    }
    
    public function getAllAvis(){

        $avis= $this->avis->getAllAvis();
         return  $avis;
     }
    
     
     public function bloquerUtilisateur($id_utilisateur){

        $avis= $this->avis->bloquerUtilisateur($id_utilisateur);
         
     }
     public function refuseAvis($id_vcl){

        $avis= $this->avis->refuseAvis($id_vcl);
         
     }
     

     public function deleteAvis($id_vcl){

        $avis= $this->avis->deleteAvis($id_vcl);
         
     }

     public function validerAvis($id_vcl){

        $avis= $this->avis->validerAvis($id_vcl);
         
     } 
     public function invaliderAvis($id_vcl){

        $avis= $this->avis->invaliderAvis($id_vcl);
         
     }
     
     
     




  

}


?>