<?php
require_once ('../Controllers/AdminController.php');








if(isset($_SESSION['id_admin'])  ){//si l'utilisateur est authentifié
    $controller =new AdminController();
    $controller->afficherMain("../Js/marques.js");
}else {
    header("Location: http://localhost/projet_web/Routers/Admin.php");
}







?>