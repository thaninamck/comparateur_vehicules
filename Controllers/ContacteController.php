<?php
require_once ('../Models/ContacteModel.php');
require_once ('../Views/ContacteView.php');





class ContacteController
{
    private $contacte;
    
    
    public function __construct()
    {
        $this->contacte = new ContacteModel();
       
    }
   
    public function afficherContactePage(){
        $vue=new ContacteView();
        $vue->afficherContactePage();
    }
     
    public function getContacte() {
        $results=$this->contacte->getContacte();
        return $results;
    }


}