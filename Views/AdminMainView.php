<?php


require_once ('../Controllers/AdminController.php');

class AdminMainView {

    public function afficherEntete($path){
        echo '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>AuroPairia</title>
            <link rel="stylesheet" href="../Css/Acceuil.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
            <script type="text/javascript" src="'.$path.'"></script>
        
        </head>
        <body>';
    }
     
    public function afficherNavbar() {
        echo '
        <div class="wrapper">
            <div class="multi_color_border"></div>
            <div class="top_nav">
                <div class="left">
                    <div class="logo">
                        <img src="../Assets/acceuil/logoNrml.png" alt="AutoPairia">
                    </div>
                </div> 
                <div class="right">
                    <ul>';
                    echo '<li>Bienvenue dans admin dashboard!</li>';
                    echo '<li ><a href="http://localhost/projet_web/Controllers/adminLogoutController.php" id="login">Deconnecter</a></li>';

                    
                    echo '</ul>
                </div>
            </div>
            <div class="bottom_nav">
                <ul>';
                    
                    
                echo '</ul>
            </div>
        </div>';
    }
    
    
  
    
    public function afficherCartes()
{
    echo '
    <div class="grid-container">
        <div class="grid-item">
            <div class="admincard border-primary">
                <a href="http://localhost/projet_web/Routers/GNews.php"><img src="../Assets/admin/news.png" class="card-img-top" alt="Image 1"></a>
                <div class="card-body">
                    <h5 class="card-title">Gestion des News et publicité </h5>
                </div>
            </div>
        </div>
        <div class="grid-item">
            <div class="admincard border-primary">
                <a href="http://localhost/projet_web/Routers/GAvis.php"><img src="../Assets/admin/comment.png" class="card-img-top" alt="Image 2"></a>
                <div class="card-body">
                    <h5 class="card-title">Gestion des avis</h5>
                </div>
            </div>
        </div>
        <div class="grid-item">
            <div class="admincard border-primary">
                <a href="http://localhost/projet_web/Routers/Gusers.php"><img src="../Assets/admin/group.png" class="card-img-top" alt="Image 3"></a>
                <div class="card-body">
                    <h5 class="card-title">Gestion des utilisateurs</h5>
                </div>
            </div>
        </div>
        <div class="grid-item">
            <div class="admincard border-primary">
                <a href="http://localhost/projet_web/Routers/GguideAchat.php"><img src="../Assets/admin/settings.png" class="card-img-top" alt="Image 4"></a>
                <div class="card-body">
                    <h5 class="card-title">Paramètres</h5>
                </div>
            </div>
        </div>

        <div class="grid-item">
        <div class="card border-primary">
            <a href="http://localhost/projet_web/Routers/Gvehicules.php"><img src="../Assets/admin/car.png" class="card-img-top" alt="Image 4"></a>
            <div class="card-body">
                <h5 class="card-title">Gestion des vehicules </h5>
            </div>
        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>';
}

    

    
    
    
    
    
    
    
   
    

    
    }

