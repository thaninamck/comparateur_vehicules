<?php
require_once ('../Controllers/AdminController.php');
require_once ('../Controllers/NewsController.php');

$newscontroller=new NewsController();
$controller =new AdminController();
$controller->afficherTemplate("../Js/gstAvis.js");




if ($_SERVER['REQUEST_METHOD'] === 'POST'&& isset($_POST['id_user'])) {
    $id_user = $_POST['id_user'];
    //var_dump($id_user);
    $controller->bloquerUtilisateur($id_user);
    echo 'success';
}elseif ($_SERVER['REQUEST_METHOD'] === 'POST'&& isset($_POST['id_avs'])) {
    $id_avs = $_POST['id_avs'];
    //var_dump($id_user);
    $controller->refuseAvis($id_avs);
    echo 'success';
}elseif ($_SERVER['REQUEST_METHOD'] === 'POST'&& isset($_POST['id_avs_d'])) {
    $id_avs = $_POST['id_avs_d'];
    //var_dump($id_user);
    $controller->deleteAvis($id_avs);
    echo 'success';
}elseif ($_SERVER['REQUEST_METHOD'] === 'POST'&& isset($_POST['id_avs_v'])) {
    $id_avs = $_POST['id_avs_v'];
    $controller-> validerAvis($id_avs);
}elseif ($_SERVER['REQUEST_METHOD'] === 'POST'&& isset($_POST['id_avs_i'])) {
    $id_avs = $_POST['id_avs_i'];
    $controller-> invaliderAvis($id_avs);
}





else {
    $controller->afficherAvis();
}




?>