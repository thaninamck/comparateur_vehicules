<?php
require_once ('../Models/adminModel.php');
require_once ('../Views/AdminMainView.php');
require_once ('../Models/AvisModel.php');
require_once ('../Views/GAvisView.php');
require_once ('../Views/GVehicules.php');
require_once ('../Models/MarqueModel.php');
require_once ('../Models/UserModel.php');
require_once ('../Views/Gusers.php');
require_once ('../Models/GuideAchatModel.php');
require_once ('../Views/paramView.php');
require_once ('../Models/ContacteModel.php');
require_once ('../Models/NewsModel.php');





   
    
   

class AdminController
{
    private $News;
    private $admin;
    private $avis;
    private $marques;
    private $users;
    private $gdachat;
    private $cntct;
    public function __construct()
    {
        $this->marques= new Marque();
        $this->avis = new Avis();
        $this->users = new UserModel();
        $this->cntct = new ContacteModel();
        $this->gdachat = new GuideAchatModel();
        $this->News = new News();
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
     //pour la gestion des vehicules 
     public function getVehiclesForedit(){

        $avis= $this->marques->getVehiclesForedit();
         return $avis;
     }
     

     public function afficherVehicules(){
        $vue=new VehiculesView();
        $donneesVehicules= $this->getVehiclesForedit();
        $vue->afficherVehicules($donneesVehicules);
       
         
     }

     public function showEditMarque($id_mrq){
        $vue=new VehiculesView();
        $donneesMarque= $this->getMarqueById($id_mrq);
        $vue->showEditMarque($donneesMarque);
       
         
     }
     public function showEditVcl($id_vcl){
        $vue=new VehiculesView();
        $marques=$this->getMarques();
        $modeles=$this->getModele();
        $versions=$this->getversion();
        $donneesMarque= $this->getVehiculeDetailsById($id_vcl);
        $vue->showEditVcl($donneesMarque, $marques, $modeles,  $versions);
       
         
     }

     public function getMarqueById($id){

        $avis= $this->marques->getMarqueById($id);
         return $avis;
     }
     
     public function updateMarque($id, $logo, $nom, $pays, $siege_soc, $annee, $web)
     {

         $this->marques->updateMarque($id, $logo, $nom, $pays, $siege_soc, $annee, $web)
        ;
         
     }

     public function   getVehiculeDetailsById($id_vcl)
     {

         $vehic=$this->marques->  getVehiculeDetailsById($id_vcl)
        ;
         return $vehic;
     }
   
     public function  getMarques(){

        $avis= $this->marques-> getMarques();
         return $avis;
     }
     public function  getModele(){

        $avis= $this->marques-> getModele();
         return $avis;
     }
     public function  getversion(){

        $avis= $this->marques-> getversion();
         return $avis;
     }

     public function  updateVehiculeDetailsById($id_vcl, $newImageValue){

         $this->marques-> updateVehiculeDetailsById($id_vcl, $newImageValue);
         
     }

     public function insertVcl(){

        $vue=new VehiculesView();
       
        $vue->insertVcl();
     }
     public function  showBrandForm(){

        $vue=new VehiculesView();
       
        $vue-> showBrandForm();
     }
     
    
     public function  insererNouvelleMarque($logo, $nom, $pays, $siege_social, $annee, $web){

        $this->marques->insererNouvelleMarque($logo, $nom, $pays, $siege_social, $annee, $web);
        
    }
     

    /**************************pour la gestion des utilisateurs  *********************/
    
    public function  afficherUsers(){

        $vue=new GusersView();
       $users=$this->getUsers();
        $vue-> afficherUsers($users);
     }
    
    
    
    public function  getUsers(){

       $users= $this->users->getUsers();
        return $users;
    }

    public function  updateUserStatusToValid($userId){

        $users= $this->users->updateUserStatusToValid($userId);
         
     }

     public function  updateUserStatusToInvalid($userId){

        $users= $this->users->updateUserStatusToInvalid($userId);
         
     }
     public function  updateUserStatusToBloqued($userId){

        $users= $this->users->updateUserStatusToBloqued($userId);
         
     }

     
/****************************   gestion de guide achat     ********************************* */


  public function getGuideAchat(){

    $guide_achat= $this->gdachat->getGuideAchat();
     return $guide_achat;
 }

 public function  afficherguide(){

    $vue=new paramView();
    $gd=$this->getGuideAchat();
    $vue-> afficherNewsPage($gd);

 }

 
 public function  afficherFormulaireGuideAchat($id){

    $vue=new paramView();
    $gd=$this->getGuideAchatById($id);
    $vue-> afficherFormulaireGuideAchat($gd);

 }
 
 public function getGuideAchatById($id){

    $guide_achat= $this->gdachat->getGuideAchatById($id);
     return $guide_achat;
 }



 public function  updateGuideAchat($id, $titre, $contenu, $img){

    $this->gdachat->updateGuideAchat($id, $titre, $contenu, $img);
     
 }

/**                 pour les contacte  */

public function  affichercontacte(){

    $vue=new paramView();
    $gd=$this->getContacte();
    $vue-> affichercontacte($gd);

 }

 public function  affichermodifiercontacte($id){

    $vue=new paramView();
    $gd=$this->getContactById($id);
    $vue-> affichermodifiercontacte($gd);

 }
public function  getContacte(){

    $contact=$this->cntct->getContacte();
    return  $contact ;
     
 }

 public function  updateContact($id, $nom, $email, $message){

    $contact=$this->cntct->updateContact($id, $nom, $email, $message);
    
     
 }


 public function  getContactById($id){

    $contact=$this->cntct->getContactById($id);
    return  $contact ;
     
 }
 






}


?>