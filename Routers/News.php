<?php
require_once ('../Controllers/NewsController.php');
require_once ('../Controllers/AcceuilController.php');



if(isset($_SESSION['user_name']) && isset($_SESSION['user_id']) ){//si l'utilisateur est authentifié
    $uname=$_SESSION['user_name'];
    $u_id=$_SESSION['user_id'];
    $u_photo=$_SESSION['photo'] ;
}



$NewsController =new NewsController();
$accueilController =new AccueilController();
$accueilController->afficherTemmplate('../Js/news.js');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    
    
    $NewsController->afficherNewsDetails($id);
    $accueilController->afficherpieddepage();
}else{

    $NewsController->afficherNewsPage();
    //$accueilController->afficherpieddepage();
}
   
    
    //$accueilController->afficherpieddepage();
   
   
    

    
    