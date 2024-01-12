<?php
require_once ('../Controllers/AdminController.php');
require_once ('../Controllers/NewsController.php');
if(isset($_SESSION['id_admin'])  ){//si l'utilisateur est authentifié
    $newscontroller=new NewsController();
$controller =new AdminController();
$controller->afficherTemplate("../Js/news.js");
}else{
    header("Location: http://localhost/projet_web/Routers/Admin.php");
}



if (isset($_GET['id'])) {
    $id = $_GET['id'];
    //var_dump("id est ",$id);
    $newscontroller->showEditNew($id);


}elseif ($_SERVER['REQUEST_METHOD'] === 'POST'&& isset($_POST['idNews'])) {
     // Récupération des données envoyées via la requête Ajax
     $idNews = $_POST['idNews'];
     $imagePath = $_POST['imagePath'];
     $title = $_POST['title'];
     $description = $_POST['description'];
     $content = $_POST['content'];
     $date = $_POST['date'];
     var_dump("je suis dans post ");
 
     $newscontroller->updateNewsWithImage($idNews, $imagePath, $title, $description, $content, $date);
 
     echo 'success';
}elseif ($_SERVER['REQUEST_METHOD'] === 'POST'&& isset($_POST['id_new_asup'])) {
    $idNews = $_POST['id_new_asup'];
    $newscontroller->deleteNewsById($idNews);
    echo 'success';
}elseif (isset($_GET['idadd'])) {
    $newscontroller->InsererNew();
}elseif ($_SERVER["REQUEST_METHOD"] == "POST"&&isset($_POST['imagesrc'])) {
    var_dump("je suis dans linsertion");
    $imagePath = $_POST['imagesrc'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $content = $_POST['content'];
    $date = $_POST['date'];
    $newscontroller-> insertNewsWithImage($imagePath, $title, $description, $content, $date);
    echo 'success';
}




else {
    
    $newscontroller->afficherNews();
}



?>