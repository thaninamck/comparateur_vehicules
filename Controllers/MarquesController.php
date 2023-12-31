<?php

require_once ('../Models/MarqueModel.php');

require_once ('../Views/MarquesView.php');




class MarquesController
{
    
    private $marques;
    
    
    public function __construct()
    {
        
        $this->marques = new Marque();
        
    }

     
    public function afficherMarqueDescription() {
        $Vue = new MarquesView();
        
        $Vue->afficherMarqueDescription();
        
    }

    public function getMarqueById($id){

       $marque= $this->marques->getMarqueById($id);
        return $marque;
    }

    public function getMarqueById1($id){

        $marque= $this->marques->getMarqueById1($id);
         return $marque;
     }
    
    
    
    
    
     public function insererAvisMarque($id_user, $id_mrq, $avis_text) {
        $this->marques->insererAvisMarque($id_user, $id_mrq, $avis_text);
       
    }


   

    
    
    public function incrementerNoteAvis($id_avs_mrq) {
        $this->marques->incrementerNoteAvis($id_avs_mrq);
       
    }

    public function incrementerNoteMarque($id_mrq) {
        $this->marques->incrementerNoteMarque($id_mrq);
       
    }

    

    public function getHighRatedAv( $id_mrq) {
        $results=$this->marques->getHighRatedAv( $id_mrq);
        return $results;
    }

}


?>