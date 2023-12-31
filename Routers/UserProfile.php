<?php
require_once ('../Controllers/ComparateurController.php');
require_once ('../Controllers/userProfileController.php');
$uname="" ;
$u_id="";
$u_photo="";




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

    
    