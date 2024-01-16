<?php
require_once ('../Controllers/AdminController.php');
$controller =new AdminController();
if(isset($_SESSION['id_admin'])  ){//si l'utilisateur est authentifié
    $controller =new AdminController();
    $controller->afficherTemplate("../Js/gvehicules.js");
}else{
    header("Location: http://localhost/projet_web/Routers/Admin.php");
}
//$newscontroller=new NewsController();





if (isset($_GET['idaddvehicule'])) {
    $id=$_GET['idaddvehicule'];
    //var_dump("id est ",$id);
    $controller->insertVcl($id);


}
elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_mrq1'])) {
    // Récupération de l'ID de la marque envoyé depuis la requête AJAX
    $id_mrq = $_POST['id_mrq1'];
    $logo = $_POST['logo'];
    $nom = $_POST['nom'];
    $pays = $_POST['pays'];
    $siege_soc = $_POST['siege_socc'];
    $annee = $_POST['annee'];
    $web = $_POST['web'];
   
    $controller->updateMarque($id_mrq, $logo, $nom, $pays, $siege_soc, $annee, $web);
    
    echo 'success';


}
elseif (isset($_GET['idaddmrq'])) {
    
    //var_dump("id est ",$id);
    $controller->showBrandForm();


}
elseif (isset($_GET['id_carct_vcl'])) {
    $id=$_GET['id_carct_vcl'];
    //var_dump("id est ",$id);
    $controller->afficherFeatures($id);


}
elseif (isset($_GET['id_modif_feature'])) {
    
    //var_dump("id est ",$id);
    $controller->showEditCaracteristique($_GET['id_modif_feature']);


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
elseif (isset($_GET['id_mrq_forvcl'])) {
    $id = $_GET['id_mrq_forvcl'];
    //var_dump("id est ",$id);
    $controller->afficherVehiculesMarques($id);


}
elseif (isset($_GET['id_vcl_ins'])) {
    $id_vcl_car=$_GET['id_vcl_ins'];
    $controller->showinserercaract($id_vcl_car);


}


elseif (isset($_GET['id_modif_vcl'])) {
    $id_vcl=$_GET['id_modif_vcl'];
    $controller->showEditVcl($id_vcl);


}


elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['logoUrl'])) {
    
    $modelId = $_POST['modelId'];
$year = $_POST['year'];
$logoUrl = $_POST['logoUrl'];
        
   

    $controller->insertNewVehicule($logoUrl, $annee,$modelId)
        ;
    
    echo 'success';
}
elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['idfeature'])) {
    
    $idfeature = $_POST['idfeature'];
    $idvcl = $_POST['idvclsup'];
        
   

    $controller->supprimerCaracteristique( $idvcl ,  $idfeature)
        ;
    
    echo 'success';
}elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['vclId'])) {
    
        $year = $_POST['year'];
        $logo = $_POST['logo'];
        $vclId = $_POST['vclId'];
        // Mettez à jour le véhicule et la version en utilisant votre méthode updateVehiculeAndVersion
        $controller->updateVehiculeAndVersion($vclId, $logo,  $year);
    echo 'success';
}

elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['valeurcar'])) {
    
    $nom = $_POST['nom'];
    $valeur = $_POST['valeurcar'];
    $vcl = $_POST['id_vclcar'];
    
    //var_dump($id_vcl_car);
   

    $controller->insererCaracteristique($nom, $valeur, $vcl) ;
    
    echo 'success';

}

elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['idCaracteristique'])) {
    
    $nom = $_POST['nom'];
        $valeur = $_POST['valeur'];
        $idCaracteristique = $_POST['idCaracteristique'];
   

    $controller-> updateCaracteristique($idCaracteristique,  $nom, $valeur)
        ;
    
    echo 'success';
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
   

    $controller->  insererNouvelleMarque($logo, $nom, $pays, $siege_soc, $annee, $web)
        ;
    
    echo 'success';
}


elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_vcl'])&&isset($_POST['newImageValue'])) {
    $newImageValue=$_POST['newImageValue'];
    //var_dump($newImageValue);

    $id_vcl=$_POST['id_vcl'];
    $controller-> updateVehiculeDetailsById($id_vcl, $newImageValue);
    echo 'success';
}





/**     pour supprimer une marque  */
elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_marque'])) {
    $newImageValue=$_POST['id_marque'];
    //var_dump($newImageValue);

    $id_marque=$_POST['id_marque'];
    $controller-> DeleteMarque($id_marque);
    echo 'success';
}
// pour supprimer le vehicule 
elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_vcl_sup'])) {
    $id=$_POST['id_vcl_sup'];
    //var_dump($newImageValue);

   
    $controller-> DeleteVehicule($id);
    echo 'success';
}



else {
    if(isset($_SESSION['id_admin'])  ){//si l'utilisateur est authentifié
        $controller->afficherMarques();
    }
    
}




?>