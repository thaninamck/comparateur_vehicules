<?php
require_once ('../Controllers/ComparateurController.php');
require_once ('../Controllers/userProfileController.php');
require_once ('../Controllers/AdminController.php');

$uname="" ;
$u_id="";
$u_photo="";

if (isset($_GET['id']) && isset($_GET['nom']) && isset($_GET['photo']) && isset($_GET['email'])) {
    
    $id = $_GET['id']; 
    $nom = $_GET['nom']; 
    $photo = $_GET['photo']; 
    $email = $_GET['email']; 
    $prenom = $_GET['prenom'];
    $sexe = $_GET['sexe'];
    $accueilController =new AccueilController();

    $controller = new AdminController();
$controller->afficherTemplate("../Js/gusers.js");





    $userController =new userProfileController();
    $userController->afficherUserInfo($id, $nom, $prenom, $email, $photo, $sexe);
       
        $accueilController->afficherpieddepage();
    
}else{


if(isset($_SESSION['user_name']) && isset($_SESSION['user_id']) ){//si l'utilisateur est authentifié
    $uname=$_SESSION['user_name'];
    $u_id=$_SESSION['user_id'];
    $u_photo=$_SESSION['photo'] ;
}




$accueilController =new AccueilController();
$accueilController->afficherTemmplate('../Js/comparateur.js');
$userController =new userProfileController();
$userController->afficheruserPage();
   
    $accueilController->afficherpieddepage();

    
}  