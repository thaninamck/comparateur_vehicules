<?php
require_once ('../Models/Menumodel.php');
require_once ('../Models/SMmodel.php');
require_once ('../Views/AcceuilView.php');
require_once ('../Models/NewsModel.php');
require_once ('../Models/MarqueModel.php');
require_once ('../Models/Comparateurmodel.php');
require_once ('../Models/modeleVehicule.php');





class AccueilController
{
    private $socialmedia;
    private $menuitems;
    private $marques;
    private $modeles;
    
    public function __construct()
    {
        $this->news = new News();
        $this->menuitems = new Menu();
        $this->socialmedia = new SM();
        $this->marques = new Marque();
        $this->types = new Comparateurmodel();
        $this->modeles = new Modele();
    }

     
    public function afficherAccueilPage($uname,$u_id,$u_photo) {
        $accueilVue = new AcceuilView();
        $path='../Js/acceuil.js' ;
        $accueilVue->afficherEntete($path);
        $accueilVue->afficherNavbar($uname,$u_id,$u_photo);
        $accueilVue->afficherDiapo();
        $accueilVue->afficherMarques();
        $accueilVue->afficherComparateur();
        $accueilVue->afficherComparaisons();
        $accueilVue->afficherPiedDePage();
    }

    public function afficherTemmplate($path) {
        $accueilVue = new AcceuilView();
        $accueilVue->afficherEntete($path);
        $accueilVue->afficherNavbar();
        
        
    }

    public function afficherMarques() {
        $accueilVue = new AcceuilView();
        $accueilVue->afficherMarques();
        
        
    }

    public function afficherComparateur() {
        $accueilVue = new AcceuilView();
        $accueilVue->afficherComparateur();
        
    }

    public function afficherpieddepage() {
        $accueilVue = new AcceuilView();
        $accueilVue->afficherPiedDePage();
        
    }
    
    public function getSocialMedia(){ //recuperer les reseau sociaux de la bdd
        $result = $this->socialmedia->getSocialMedia();
        return $result;
    }

    public function getMenuItems(){ //recuperer les reseau sociaux de la bdd
        $result = $this->menuitems->getMenuItems();
        return $result;
    }
    public function getNews(){ //recuperer les reseau sociaux de la bdd
        $result = $this->news->getNews();
        return $result;
    }
    public function getMarques(){ //recuperer les reseau sociaux de la bdd
        $result = $this->marques->getMarques();
        return $result;
    }

    public function getTypesVehicules(){ //recuperer les types de vehicules 
        $result = $this->types->getTypesVehicules();
        return $result;
    }

    
    public function getMarqueByType($idtype) {
        $marques = $this->marques->getMarqueByType($idtype);
        return $marques;
        
    }
    
    public function getModeleByMarque($idmrq) {
        $modeles = $this->types->getModeleByMarque($idmrq);
        return $modeles;
        
    }

    public function getYearByModele($idmdl) {
        $years = $this->types->getYearByModele($idmdl);
        return $years;
        
    }

    public function getVersionByYear($year, $idmdl) {
        $versions = $this->types->getVersionByYear($year , $idmdl);
        return $versions;
        
    }
    
    public function compareVehicles($vehiclesData) {
        $results = $this->types->compareVehicles($vehiclesData);
        return $results;
    }

}


?>