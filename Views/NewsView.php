<?php


require_once ('../Controllers/NewsController.php');

class NewsView {

    
    public function afficherNewsPage($news) {
        echo '<div class="news-container">';
        //var_dump($news);
        foreach ($news as $singleNews) {
            //var_dump($singleNews);
            $id=$singleNews[2];
            $titre = $singleNews[3]; 
            $image = $singleNews[1]; 
            $description = $singleNews[4]; 
           
            
            
            echo '<div id="'.$id.'" class="news-item">';
            echo '<h2>' . htmlentities($titre) . '</h2>';
            echo '<img src="' . htmlentities($image) . '" alt="Image de la News">';
            echo '<p>' . htmlentities($description) . '</p>';
            echo '<a href="http://localhost/projet_web/Routers/News.php?id=' . $id . '">Lire la suite</a>'            ;
        }

        echo '</div>';
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
    
    

    
    
    
    
    
    
    
   
    

    



