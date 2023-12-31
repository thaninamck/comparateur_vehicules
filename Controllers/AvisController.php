<?php

require_once ('../Models/AvisModel.php');

require_once ('../Views/avisView.php');

require_once ('../Views/AvisView.php');


class AvisController
{
    
    private $avis;
    
    
    public function __construct()
    {
        
        $this->avis = new Avis();
        
    }

    public function afficherAvisVehicules($modele, $version, $image,$id_vcl) {
        $page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;
        $perPage = 5; // Nombre d'avis par page
        
        // Récupérer les avis pour la page actuelle en utilisant la méthode du modèle
        $avis = $this->getAvisByVehicule($id_vcl, $perPage, ($page - 1) * $perPage);

        // Récupérer le nombre total d'avis pour le véhicule
        $totalAvis = $this->getTotalAvisVehicule($id_vcl);

        // Instancier la vue
        $Vue = new AvisView();

        // Afficher les résultats avec la vue en passant les données récupérées
        $Vue->afficherAvisVehicules($id_vcl,$modele, $version, $image,$avis, $totalAvis);
    }
   
   
   
   
   
   
    public function afficherVehicule($modele, $version, $image) {
        $Vue = new AvisView();
        
        $Vue->afficherVehicule($modele, $version, $image);
        
    }


   
   


    public function getAvisByVehicule($id_vcl, $limit , $offset ){

       $avis= $this->avis->getAvisByVehicule($id_vcl, $limit , $offset );
        return $avis;
    }



    public function getTotalAvisVehicule($id_vcl){

        $totalPages= $this->avis->getTotalAvisVehicule($id_vcl);
         return  $totalPages;
     }
    
   

}


?>