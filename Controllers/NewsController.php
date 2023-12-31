<?php

require_once ('../Models/NewsModel.php');

require_once ('../Views/NewsView.php');

require_once ('../Views/NewsView.php');


class NewsController
{
    
    private $News;
    
    
    public function __construct()
    {
        
        $this->News = new News();
        
    }

    
   
   
   
   
   
   
    public function afficherNewsPage() {
        $Vue = new NewsView();
        $news=$this->getNews();
        $Vue->afficherNewsPage($news);
        
    }

    public function afficherNewsDetails($id) {
        $Vue = new NewsView();
        $news=$this->getNewsById($id);
        $Vue->afficherNewsDetail($news);
        
    }
   
   


    public function getNews(){

       $News= $this->News->getNews();
        return $News;
    }
    
    public function getNewsById($id){

        $News= $this->News->getNewsById($id);
         return $News;
     }


   
    
   

}


?>