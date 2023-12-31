<?php
require_once ('../Controllers/MarquesController.php');
require_once ('../Controllers/AcceuilController.php');
require_once ('../Controllers/AvisController.php');


if(isset($_SESSION['user_name']) && isset($_SESSION['user_id']) ){//si l'utilisateur est authentifié
    $uname=$_SESSION['user_name'];
    $u_id=$_SESSION['user_id'];
    $u_photo=$_SESSION['photo'] ;
}



$MarquesController =new MarquesController();
    $AvisController =new AvisController();
$accueilController =new AccueilController();
$accueilController->afficherTemmplate('../Js/avis.js');
   

       
        


     


if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['id']) && isset($_GET['modele']) && isset($_GET['version']) && isset($_GET['image'])) {
        // Récupération des valeurs
        $id_vcl = $_GET['id'];
        $modele = $_GET['modele'];
        $version = $_GET['version'];
        $image = $_GET['image'];

        $AvisController->afficherVehicule($id_vcl, $modele, $version, $image);
        $AvisController->afficherAvisVehicules($modele, $version, $image,$id_vcl);
    } else {
        // Gérer le cas où les paramètres ne sont pas tous présents
        echo "Certains paramètres sont manquants dans l'URL.";
    }
}

    //pour la pagination
//$page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;


//$num_results_on_page = 5;
//$calc_page = ($page - 1) * $num_results_on_page;
//$results=$AvisController-> getAvisByVehicule($id_vcl, $calc_page , $num_results_on_page);
    
    
    
    
    
    
    
    
    $accueilController->afficherpieddepage();