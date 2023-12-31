<?php

require_once ('../Views/AcceuilView.php');
require_once ('../Views/ComparateurView.php');
require_once ('../Models/Comparateurmodel.php');






class ComparateurController
{
    
    private $comparateurData;

    public function setComparateurData($data) {
        $this->comparateurData = $data;
    }
    
    public function __construct()
    {
        $this->comparateurModel = new Comparateurmodel();
        
    }

    

    public function afficherComparateurPage($results) {
        $comparateurView = new ComparateurView();
        
        $comparateurView->afficherResultatsComparateur($results);
    }
 
    public function afficherizan() {
        $comparateurView = new ComparateurView();
        $comparateurView->afficherPiedDePage();
    } 

    public function compareSingleVehicle($marque, $model, $year, $version) {
        
            $result = $this->comparateurModel->compareSingleVehicle($marque, $model, $year, $version);
            return $result;
       
    }
    
    public function insertComparaison($id1 , $id2) {
        
        $result = $this->comparateurModel->insertComparaison($id1 , $id2);
        
   
    }

    public function getPopularComparaisons() {
        
        $result = $this->comparateurModel->getPopularComparaisons();
        return $result;
   
    }






}


?>