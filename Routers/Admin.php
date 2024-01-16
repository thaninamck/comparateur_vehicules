<?php
require_once ('../Controllers/SignUpController.php');
$Controller = new SignUpController();
if(!isset($_SESSION['id_admin'])  ){//si l'utilisateur est authentifié
    $Controller->afficherAdminLoginPage();
}else {
    header("Location: http://localhost/projet_web/Routers/AdminMain.php");
}
