<?php


require_once ('../Controllers/AdminController.php');
session_start();
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
                    
                    // Ajoutez ici les éléments <li> pour le bas de la navigation
                    
                echo '</ul>
            </div>
        </div>';
    }
    
    
  
    
    public function afficherCartes() {
        echo '
       
            <div class="container">
                <div class="row">';
                    
                    // Première carte
                    echo '
                    <div class="col-lg-4 mb-4">
                        <div class="card border-primary">
                            <a href="http://localhost/projet_web/Routers/GNews.php"><img src="../Assets/admin/news.png" class="card-img-top" alt="Image 1"></a>
                            <div class="card-body">
                                <h5 class="card-title">Gestion des News</h5>
                            </div>
                        </div>
                    </div>';
                    
                    // Deuxième carte
                    echo '
                    <div class="col-lg-4 mb-4">
                        <div class="card border-primary">
                            <a href="http://localhost/projet_web/Routers/GAvis.php"><img src="../Assets/admin/comment.png" class="card-img-top" alt="Image 2"></a>
                            <div class="card-body">
                                <h5 class="card-title">Gestion des avis </h5>
                            </div>
                        </div>
                    </div>';
                    
                    // 3eme carte
                    echo '
                    <div class="col-lg-4 mb-4">
                        <div class="card border-primary">
                            <a href="http://localhost/projet_web/Routers/Gusers.php"><img src="../Assets/admin/comment.png" class="card-img-top" alt="Image 2"></a>
                            <div class="card-body">
                                <h5 class="card-title">Gestion des avis </h5>
                            </div>
                        </div>
                    </div>';

                    // 4eme carte
                    echo '
                    <div class="col-lg-4 mb-4">
                        <div class="card border-primary">
                            <a href="http://localhost/projet_web/Routers/GguideAchat.php"><img src="../Assets/admin/comment.png" class="card-img-top" alt="Image 2"></a>
                            <div class="card-body">
                                <h5 class="card-title">Parametres  </h5>
                            </div>
                        </div>
                    </div>';
                    
                echo '
                </div>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        ';
    }
    

    
    
    
    
    
    
    
   
    

    
    }

