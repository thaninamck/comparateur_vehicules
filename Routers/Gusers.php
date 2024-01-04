<?php
require_once ('../Controllers/NewsController.php');
require_once ('../Controllers/AdminController.php');

ob_start(); // Démarre la mise en mémoire tampon

$controller = new AdminController();
$controller->afficherTemplate("../Js/gusers.js");
$controller->afficherUsers();

if (isset($_GET['id_i'])) {
    $id = $_GET['id_i'];
    $controller->updateUserStatusToInvalid($id);
    header("Location: http://localhost/projet_web/Routers/Gusers.php");

} elseif (isset($_GET['id_v'])) {
    $id = $_GET['id_v'];
    $controller->updateUserStatusToValid($id);
    header("Location: http://localhost/projet_web/Routers/Gusers.php");

} elseif (isset($_GET['id_b'])) {
    $id = $_GET['id_b'];
    $controller->updateUserStatusToBloqued($id);
    header("Location: http://localhost/projet_web/Routers/Gusers.php");

}

ob_end_flush(); // Vide le tampon et envoie le contenu au navigateur
?>
