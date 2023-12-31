<?php
require_once ('../Controllers/AcceuilController.php');

require_once('../Controllers/ComparateurController.php');
$uname="" ;
$u_id="";
$u_photo="";


if(isset($_SESSION['user_name']) && isset($_SESSION['user_id']) ){//si l'utilisateur est authentifié
    $uname=$_SESSION['user_name'];
    $u_id=$_SESSION['user_id'];
    $u_photo=$_SESSION['photo'] ;
}




$accueilController =new AccueilController();
$accueilController->afficherAccueilPage($uname,$u_id,$u_photo);





?>