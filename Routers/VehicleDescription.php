<?php
require_once ('../Controllers/GuideAchatController.php');
require_once ('../Controllers/AcceuilController.php');
require_once ('../Controllers/MarquesController.php');
require_once ('../Controllers/userProfileController.php');
ob_start(); 
if(isset($_SESSION['user_name']) && isset($_SESSION['user_id']) ){//si l'utilisateur est authentifié
    $uname=$_SESSION['user_name'];
    $u_id=$_SESSION['user_id'];
    $u_photo=$_SESSION['photo'] ;
}



$usercontroller=new userProfileController();
$accueilController =new AccueilController();
$accueilController->afficherTemmplate('../Js/vehicleDesc.js');
   
    $GuideAchatController =new GuideAchatController();

    $id_vehicule = isset($_GET['id']) ? $_GET['id'] : null;

   
    $GuideAchatController->afficherVehicleDescription( $id_vehicule);
    

    if(isset($_SESSION['user_name']) && isset($_SESSION['user_id']) ){
    $GuideAchatController->afficherAjouterAvis($id_vehicule); 
    }

    $GuideAchatController->afficherComparaisonsDeVehicule($id_vehicule);

    $accueilController->afficherpieddepage();

    
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_avs_vcl'])) {
        $id_avs_vcl = !empty($_POST['id_avs_vcl']) ? $_POST['id_avs_vcl'] : '';
        
        $GuideAchatController->incrementerNoteAvis($id_avs_vcl);
        
        $html='success';
        echo $html;
           
    }else{
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_vcl']) && isset($_POST['avis'])&& isset($u_id)){
            $id_vcl = !empty($_POST['id_vcl']) ? $_POST['id_vcl'] : '';
            $avis = !empty($_POST['avis']) ? $_POST['avis'] : '';
             
            $GuideAchatController-> insererAvisVehicule($u_id, $id_vcl, $avis);
            $html='success';
            echo $html;
        }
        
    }//pour incrementer une note du vehucule 
    if (isset($_GET['id_incremnt'])){
        $id_vcl=$_GET['id_incremnt'];
        $usercontroller->incrementerNoteVehicule($id_vcl);
        header("Location: http://localhost/projet_web/Routers/VehicleDescription.php?id=$id_vcl");

    }

    ob_end_flush(); 