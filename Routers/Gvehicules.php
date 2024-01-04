<?php
require_once ('../Controllers/AdminController.php');


//$newscontroller=new NewsController();
$controller =new AdminController();
$controller->afficherTemplate("../Js/gvehicules.js");

if (isset($_GET['idaddmrq'])) {
    
    //var_dump("id est ",$id);
    $controller->showBrandForm();


}
elseif (isset($_GET['id_mrq'])) {
    $id = $_GET['id_mrq'];
    //var_dump("id est ",$id);
    $controller->showEditMarque($id);


}elseif (isset($_GET['id_ins'])) {
    $id = $_GET['id_ins'];
    //var_dump("id est ",$id);
    $controller->insertVcl();


}




elseif  (isset($_GET['id_vcl'])) {
    $id = $_GET['id_vcl'];
    //var_dump("id est ",$id);
    $controller->showEditVcl($id);


}elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['pays'])) {
    
    $logo = $_POST['logo'];
    $nom = $_POST['nom'];
    $pays = $_POST['pays'];
    $siege_soc = $_POST['siege_soc'];
    $annee = $_POST['annee'];
    $web = $_POST['web'];
   

    $controller->   insererNouvelleMarque($logo, $nom, $pays, $siege_soc, $annee, $web)
        ;
    
    echo 'success';
}


elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_mrq'])) {
    // Récupération de l'ID de la marque envoyé depuis la requête AJAX
    $id_mrq = $_POST['id_mrq'];
    $logo = $_POST['logo'];
    $nom = $_POST['nom'];
    $pays = $_POST['pays'];
    $siege_soc = $_POST['siege_soc'];
    $annee = $_POST['annee'];
    $web = $_POST['web'];
   

    $controller->updateMarque($id_mrq, $logo, $nom, $pays, $siege_soc, $annee, $web);
    
    echo 'success';


}elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_vcl'])&&isset($_POST['newImageValue'])) {
    $newImageValue=$_POST['newImageValue'];
    var_dump($newImageValue);

    $id_vcl=$_POST['id_vcl'];
    $controller-> updateVehiculeDetailsById($id_vcl, $newImageValue);
    echo 'success';
}





else {
    $controller->afficherVehicules();
}




?>