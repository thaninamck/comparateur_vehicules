<?php

require_once ('../Models/NewsModel.php');

require_once ('../Views/NewsView.php');

require_once ('../Views/GestionNews.php');


class NewsController
{
    
    private $News;
    
    
    public function __construct()
    {
        
        $this->News = new News();
        
    }
   
    
    public function afficherNews() {
        $vue = new GNewsView ();
        $news=$this->getNews();
        $vue->afficherNews( $news);
        
        
    }

    public function  showEditNew($id) {
        $vue = new GNewsView ();
        $news=$this->getNewsById($id);
        $vue->showEditNew($news);
        
        
    }

    public function    InsererNew() {
        $vue = new GNewsView ();
        
        $vue-> InsererNew();
        
        
    }
   
   
   
    public function  updateNewsWithImage($id, $imagePath, $title, $description, $content, $date)
    {

       $this->News->  updateNewsWithImage($id, $imagePath, $title, $description, $content, $date)
        ;
        
     }

     public function   insertNewsWithImage($imagePath, $title, $description, $content, $date)
     {
 
        $this->News->   insertNewsWithImage($imagePath, $title, $description, $content, $date)
         ;
         
      }

    

     public function  deleteNewsById($id)
    {

       $this->News->  deleteNewsById($id)
        ;
        
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