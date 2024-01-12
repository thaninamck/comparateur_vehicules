<?php


require_once ('../Controllers/NewsController.php');

class NewsView {

    
    public function afficherNewsPage($news) {
        echo '<html>';
        echo '<head>';
        echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">';
        echo '</head>';
        echo '<body>';
        echo '<div class="container mt-4">';
    
        // Titre "Actualités" avec image à droite
        echo '<div class="row mb-2 align-items-center custom-title-row">';
        echo '<div class="col-md-5">';
        echo '<img src="../Assets/news/news.png" alt="Image d\'en-tête" class="img-fluid">';
        echo '</div>';
        echo '<div class="col-md-4">';
        echo '<h2 class="display-5">Actualités</h2>';
        echo '</div>';
        
        echo '</div>';
    
        // Afficher les cartes des actualités
        echo '<div class="row" style"margin:40px;">';
    
        foreach ($news as $singleNews) {
            $id = $singleNews[2];
            $titre = $singleNews[3];
            $image = $singleNews[1];
            $description = $singleNews[4];
    
            echo '<div class="col-md-4 mb-4">';
            echo '<div class="card news-card" style="height: 100%;">';
            echo '<img src="' . htmlentities($image) . '" class="card-img-top" alt="Image de la News">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">' . htmlentities($titre) . '</h5>';
            echo '<p class="card-text">' . htmlentities($description) . '</p>';
            echo '<a href="http://localhost/projet_web/Routers/News.php?id=' . $id . '" class="btn btn-danger">Lire la suite</a>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
    
        echo '</div>';
    
        echo '</div>';
        echo '<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>';
        echo '</body>';
        echo '</html>';
    }
    
    
    
    
    
    

    public function afficherNewsDetail($news) {
        // Vérification si la news est disponible
        if ($news) {
            $titre = $news[0]['titre'];
            $image = $news[0]['path'];
            $date = $news[0]['date'];
            $description = $news[0]['description_crt'];
            $contenu = $news[0]['contenu'];
            
    
            echo '<div class="news-detail">';
            echo '<h2>' . $titre . '</h2>';
            echo '<img src="' . $image . '" alt="Image de la News">';
            
            echo '<p class="news-description">' . $description . '</p>';
            echo '<p class="news-content">' . $contenu . '</p>';
            echo '<p class="news-date">Date: ' . $date . '</p>';
            
            
           
            echo '</div>';
        } else {
            echo '<p>La news demandée n\'existe pas.</p>';
        }
    }
    
}
    
    

    
    
    
    
    
    
    
   
    

    



