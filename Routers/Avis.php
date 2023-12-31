<?php
require_once ('../Controllers/MarquesController.php');
require_once ('../Controllers/AcceuilController.php');
require_once ('../Controllers/AvisController.php');


if(isset($_SESSION['user_name']) && isset($_SESSION['user_id']) ){//si l'utilisateur est authentifié
    $uname=$_SESSION['user_name'];
    $u_id=$_SESSION['user_id'];
    $u_photo=$_SESSION['photo'] ;
}



$MarquesController =new MarquesController();
    $AvisController =new AvisController();
$accueilController =new AccueilController();
$accueilController->afficherTemmplate('../Js/avis.js');
   
 $MarquesController->afficherMarqueDescription();
       
        
 $accueilController->afficherpieddepage();

     
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_avs_mrq'])) {
        $id_avs_mrq = !empty($_POST['id_avs_mrq']) ? $_POST['id_avs_mrq'] : '';
        
        $MarquesController->incrementerNoteAvis($id_avs_mrq);
        
        $html='success';
        echo $html;
           
    }else{
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_mrq']) && isset($_POST['avis'])&& isset($u_id)){
            $id_mrq = !empty($_POST['id_mrq']) ? $_POST['id_mrq'] : '';
            $avis = !empty($_POST['avis']) ? $_POST['avis'] : '';
             var_dump("lavis est ",$avis);
            $MarquesController-> insererAvisMarque($u_id, $id_mrq, $avis);
            $html='success';
            echo $html;
        }else if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_mrqn'])) {
            $id_mrq = !empty($_POST['id_mrqn']) ? $_POST['id_mrqn'] : '';
            
            $MarquesController->incrementerNoteMarque($id_mrq);
            
            $html='success';
            echo $html;
               
        }
        
    }

   
    
    