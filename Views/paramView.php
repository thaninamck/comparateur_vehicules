<?php


require_once ('../Controllers/AdminController.php');

class paramView {

    
    public function afficherNewsPage($gds) {
        echo '
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <div class="container">
            <div class="d-flex justify-content-between mb-3">
                <h2>Guide Achat :</h2>
                
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>titre</th>
                        <th>contenu</th>
                        <th>image</th>
                        <th>Actions</th>
                       
                    </tr>
                </thead>
                <tbody>';
    
        foreach ($gds as $gd) {
            echo '
            <tr >
                <td>' . $gd['titre'] . '</td>
                
                <td>' . $gd['contenu'] . '</td>
                <td>' . $gd['img'] . '</td>
                <td>                    <a href="http://localhost/projet_web/Routers/GguideAchat.php?id='.$gd['id_gd_ach'].'" class="btn btn-danger delete-comment">Modifier</a>
                </td>
                
                </tr > ';
        }
    
        echo '</table>';
    
    


        
    
    }


    public function affichercontacte($gds) {
        echo '
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <div class="container">
            <div class="d-flex justify-content-between mb-3">
                <h2>Contacte :</h2>
                
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>nom</th>
                        <th>email</th>
                        <th>message</th>
                        <th>Actions</th>
                       
                    </tr>
                </thead>
                <tbody>';
    
        foreach ($gds as $gd) {
            echo '
            <tr >
                <td>' . $gd['nom'] . '</td>
                
                <td>' . $gd['email'] . '</td>
                <td>' . $gd['message'] . '</td>
                <td>                    <a href="http://localhost/projet_web/Routers/GguideAchat.php?idc='.$gd['id_contact'].'" class="btn btn-danger delete-comment">Modifier</a>
                </td>
                
                </tr > ';
        }
    
        echo '</table>';
    
    


        
    
    }



    public function afficherFormulaireGuideAchat($gd) {
        echo '
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <div class="container">
            <h2>Modifier le Guide d\'Achat :</h2>
            <form  method="POST">';
            foreach ($gd as $guide) {
                echo '
                <div class="mb-3">
                    <label for="titre" class="form-label">Titre :</label>
                    <input type="text" class="form-control" id="titre" name="titre" value="' . $guide['titre'] . '">
                </div>
                <div class="mb-3">
                    <label for="contenu" class="form-label">Contenu :</label>
                    <textarea class="form-control" id="contenu" name="contenu">' . $guide['contenu'] . '</textarea>
                </div>
                <div class="mb-3">
                    <label for="img" class="form-label">Image :</label>
                    <input type="text" class="form-control" id="img" name="img" value="' . $guide['img'] . '">
                </div>';
            }
            echo '
            <button type="submit" data-guide-id="' . $guide['id_gd_ach'] . '" class="btn btn-primary update">Mettre à Jour</button>
            </form>
        </div>';
    }
    
    
   
    
    public function affichermodifiercontacte($gd) {
        //var_dump($gd);
        echo '
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <div class="container">
            <h2>Modifier le Guide d\'Achat :</h2>
            <form  method="POST">';
            foreach ($gd as $guide) {
                echo '
                <div class="mb-3">
                    <label for="titre" class="form-label">nom :</label>
                    <input type="text" class="form-control" id="nom" name="titre" value="' . $guide['nom'] . '">
                </div>
                <div class="mb-3">
                    <label for="contenu" class="form-label">email :</label>
                    <textarea class="form-control" id="email" name="contenu">' . $guide['email'] . '</textarea>
                </div>
                <div class="mb-3">
                    <label for="img" class="form-label">Message:</label>
                    <input type="text" class="form-control" id="message" name="img" value="' . $guide['message'] . '">
                </div>';
            }
            echo '
            <button type="submit" data-guide-id="' . $guide['id_contact'] . '" class="btn btn-primary update_cnt">Mettre à Jour</button>
            </form>
        </div>';
    }
















}
    
    

    
    
    
    
    
    
    
   
    

    



