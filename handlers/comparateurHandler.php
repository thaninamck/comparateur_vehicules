<?php
require_once ('../Controllers/ComparateurController.php');


$controller=new ComparateurController();
    
    

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['vehicles'])) {
        $vehiclesData = $_POST['vehicles'];
        var_dump($vehiclesData);
        
        $results = $controller->compareVehicles($vehiclesData);
        if(isset($_POST['vehicles'])){
            
            $controller->setComparateurData($results);
            echo $controller;

        }else{
            echo'izan';
        }
        
        
        
        
        exit; 
    }else{
        //$controller->afficherizan();
    }

?>