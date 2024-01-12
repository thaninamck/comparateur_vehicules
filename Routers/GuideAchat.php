<?php
require_once ('../Controllers/GuideAchatController.php');
require_once ('../Controllers/AcceuilController.php');

$GuideAchatController =new GuideAchatController();

if(isset($_SESSION['user_name']) && isset($_SESSION['user_id']) ){
    $uname=$_SESSION['user_name'];
    $u_id=$_SESSION['user_id'];
    $u_photo=$_SESSION['photo'] ;
}


if ($_SERVER["REQUEST_METHOD"] == "POST"&&isset($_POST['adduser_id']) ) {
    $id_user = $_POST['adduser_id'];
    $id_vcl = $_POST['addvehicule_id'];
   
    $GuideAchatController->insererNouveauFavori($id_user, $id_vcl);
    
    echo'success';
}
elseif ($_SERVER["REQUEST_METHOD"] == "POST"&&isset($_POST['user_id']) ) {
    $id_user = $_POST['user_id'];
    $id_vcl = $_POST['vehicule_id'];
   
    $GuideAchatController->deleteFavorite($id_user, $id_vcl);
    
    echo'success';
}

$accueilController =new AccueilController();
$accueilController->afficherTemmplate('../Js/guideachat.js');
   
   
    $GuideAchatController->afficherGuidePage();
   
    $accueilController->afficherpieddepage();

    
    