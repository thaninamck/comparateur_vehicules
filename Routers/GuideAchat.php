<?php
require_once ('../Controllers/GuideAchatController.php');
require_once ('../Controllers/AcceuilController.php');

$GuideAchatController =new GuideAchatController();

if(isset($_SESSION['user_name']) && isset($_SESSION['user_id']) ){//si l'utilisateur est authentifié
    $uname=$_SESSION['user_name'];
    $u_id=$_SESSION['user_id'];
    $u_photo=$_SESSION['photo'] ;
}




$accueilController =new AccueilController();
$accueilController->afficherTemmplate('../Js/acceuil.js');
   
   
    $GuideAchatController->afficherGuidePage();
   
    $accueilController->afficherpieddepage();

    
    