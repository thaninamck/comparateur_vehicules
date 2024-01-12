
<?php
require_once ('../Controllers/NewsController.php');
require_once ('../Controllers/AdminController.php');
if(isset($_SESSION['id_admin'])  ){//si l'utilisateur est authentifié
    $controller = new AdminController();
$controller->afficherTemplate("../Js/gdAch.js");
}else{
    header("Location: http://localhost/projet_web/Routers/Admin.php");
}



if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $controller->afficherFormulaireGuideAchat($id);

}elseif  (isset($_GET['idc'])) {
    $id = $_GET['idc'];
    $controller->affichermodifiercontacte($id);

}
elseif ($_SERVER["REQUEST_METHOD"] == "POST"&&isset($_POST['email']) ) {
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $id = $_POST['id'];
    $controller->updateContact($id, $nom, $email, $message);
    
    echo'success';
}


elseif ($_SERVER["REQUEST_METHOD"] == "POST"&&isset($_POST['img']) ) {
    $titre = $_POST['titre'];
    //var_dump("je suis das hhhh");
    $contenu = $_POST['contenu'];
    $img = $_POST['img'];
    $idGuide = $_POST['idGuide'];
    $controller->updateGuideAchat($idGuide, $titre, $contenu, $img);
    
    echo'success';
}else {
    $controller->afficherguide();
    $controller->affichercontacte();
    $controller->afficherNews();
}
?>
