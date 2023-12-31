<?php
require_once ('../Controllers/ComparateurController.php');
$uname="" ;
$u_id="";
$u_photo="";


if(isset($_COOKIE['vehiclesData'])) {
    $vehiclesData = json_decode($_COOKIE['vehiclesData'], true); // Récupère les données du cookie
    $vehiclesIDs = json_decode($_COOKIE['vehiclesIDs'], true);
    $controller = new ComparateurController();
    $results = []; // Tableau pour stocker les résultats

    foreach ($vehiclesData as $vehicle) {
        $marque = $vehicle['marque'];
        $model = $vehicle['model'];
        $year = $vehicle['year'];
        $version = $vehicle['version'];
        
        // Appel à la méthode pour comparer un seul véhicule
        $result = $controller->compareSingleVehicle($marque, $model, $year, $version);
        
        // Stockage du résultat dans le tableau
        $results[] = $result;
         
    }

    foreach ($vehiclesIDs as $vehicleID) {
        $id1 = $vehicleID['id1'];
        $id2 = $vehicleID['id2'];
        
       
        $controller->insertComparaison($id1 , $id2);
       
         
    }

    //var_dump("le resultat de var_dump est :",$results); 
}
setcookie('vehiclesData', '', time() - 3600, '/');
    setcookie('vehiclesIDs', '', time() - 3600, '/');

if(isset($_SESSION['user_name']) && isset($_SESSION['user_id']) ){//si l'utilisateur est authentifié
    $uname=$_SESSION['user_name'];
    $u_id=$_SESSION['user_id'];
    $u_photo=$_SESSION['photo'] ;
}




$accueilController =new AccueilController();
$accueilController->afficherTemmplate('../Js/comparateur.js');
$accueilController->afficherComparateur();

    if (isset($results)) {
        $controller->afficherComparateurPage($results);
    }
   
    $accueilController->afficherpieddepage();

    
    