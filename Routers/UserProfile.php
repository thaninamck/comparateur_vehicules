<?php
require_once ('../Controllers/ComparateurController.php');
require_once ('../Controllers/userProfileController.php');
require_once ('../Controllers/AdminController.php');
ob_start(); 
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
$accueilController->afficherTemmplate('../Js/userprofile.js');
$userController =new userProfileController();

if (isset($_GET['id_edit'])){
    $userController->affichereditprofile();
    $accueilController->afficherpieddepage();
}elseif ($_SERVER["REQUEST_METHOD"] == "POST"&&isset($_POST['newBirthDate'])) {
    $newName = $_POST['newName'];
    $newFirstName = $_POST['newFirstName'];
    $newSexe = $_POST['newSexe'];
    $newBirthDate = $_POST['newBirthDate'];
    $userId = $_SESSION['user_id'];
    $userController->updateUserProfile($userId, $newName,   $newFirstName, $newSexe, $newBirthDate);
    echo'success';
}
elseif ($_SERVER["REQUEST_METHOD"] == "POST"&&isset($_POST['adduser_id']) ) {
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
    //pour incrementer une note du vehucule 
    elseif (isset($_GET['id_incremnt'])){
        $id_vcl=$_GET['id_incremnt'];
        $userController->incrementerNoteVehicule($id_vcl);
        header("Location: http://localhost/projet_web/Routers/UserProfile.php");
    }

    elseif (isset($_GET['id_delete'])){
        $idAvis=$_GET['id_delete'];
        $userController->deleteAvis($idAvis);
        header("Location: http://localhost/projet_web/Routers/UserProfile.php");
    }
    elseif (isset($_GET['id_editavis'])){
        $idAvis=$_GET['id_editavis'];
        $userController->afficheruserPage();
        $userController->affichereditmonavis ($idAvis);
       // header("Location: http://localhost/projet_web/Routers/UserProfile.php");
    }elseif ($_SERVER["REQUEST_METHOD"] == "POST"&&isset( $_POST['cntxt']) ) {
        $id_avs_vcl = $_POST['id_avs_vcl'];
    $cntxt = $_POST['cntxt'];
       
       
    $userController->mettreAjourCommentaire( $id_avs_vcl ,  $cntxt);
        
        echo'success';
    }
    
    
else{




$userController->afficheruserPage();
$userController->affichermesavis ();
   
    $accueilController->afficherpieddepage();
    
    
}  
}
ob_end_flush(); 