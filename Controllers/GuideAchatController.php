<?php
require_once ('../Models/GuideAchatModel.php');
require_once ('../Views/GuideAchatView.php');
require_once ('../Views/VehiculeDescriptionView.php');




class GuideAchatController
{
    private $guide;
    
    
    public function __construct()
    {
        $this->guide = new GuideAchatModel();
       
    }
   
    public function afficherGuidePage(){
        $vue=new GuideAchatView();
        $vue->afficherGuidePage();
    }


    public function afficherVehicleDescription($id){
        $results=$this->getvehicleById($id);
        $vue=new VehicleDescriptionView();
        $vue->afficherVehicleDescription($results);
        $avis=$this->getHighRatedAv($id);
        $vue->afficherAvis($avis);
        
       
    }

    public function afficherComparaisonsDeVehicule($id){
        $comparaisons=$this->getPopularComparaisonsOfVehicle($id);
        //var_dump("le resultat de var_dump est :", $comparaisons);
        $vue=new VehicleDescriptionView();
        $vue->afficherComparaisonsDeVehicule($comparaisons);
       
        
       
    }
    
    
    
    public function insererAvisVehicule($id_user, $id_vcl, $avis_text) {
        $this->guide->insererAvisVehicule($id_user, $id_vcl, $avis_text);
       
    }


    public function afficherAjouterAvis($id) {
        $results=$this->getvehicleById($id);
        $vue=new VehicleDescriptionView();
        $vue->afficherAjoutAvis($results);
       
    }

    public function getPopularComparaisonsOfVehicle($id) {
        $results= $this->guide->getPopularComparaisonsOfVehicle($id) ;
       return $results;
    }
    
    public function incrementerNoteAvis($id_avs_vcl) {
        $this->guide->incrementerNoteAvis($id_avs_vcl);
       
    }
     
    public function getGuideAchat() {
        $results=$this->guide->getGuideAchat();
        return $results;
    }

    public function getvehicles() {
        $results=$this->guide->getvehicles();
        return $results;
    }
    
    public function getvehicleById($id) {
        $results=$this->guide->getvehicleById($id);
        return $results;
    }

    public function getHighRatedAv( $id_vcl) {
        $results=$this->guide->getHighRatedAv( $id_vcl);
        return $results;
    }

   
    public function insererNouveauFavori($id_user, $id_vcl) {
        $this->guide->insererNouveauFavori($id_user, $id_vcl);
       
    }
    

    public function checkIfFavoriteExists($id_user, $id_vcl) {
        $resultat=$this->guide->checkIfFavoriteExists($id_user, $id_vcl);
       return $resultat;
    }
    
    


    public function   deleteFavorite($id_user, $id_vcl)
    {
        $this->guide->    deleteFavorite($id_user, $id_vcl)
        ;
       
    }
    
}