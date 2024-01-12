<?php
require_once ('../Controllers/AcceuilController.php');

require_once ('../Controllers/MarquesController.php');

class MarquesView {

    
    public function afficherMarqueDescription() {



        $accueilControler = new AccueilController();
    $marques = $accueilControler->getMarques();

    echo '<section class="slider-wrapper">
            <h2 class="section-title"> Bienvenue  cliquez sur un logo pour voir plus</h2>
            <button class="slide-arrow" id="slide-arrow-prev">
              &#8249;
            </button>
            
            <ul class="slides-container" id="slides-container">';

    foreach ($marques as $marque) {
        echo '<li class="slide">
                <div class="marque-item">
                  <img class="marque-img" id="' . $marque[0] . '" src="' . $marque[1] . '" alt="' . $marque[2] . '">
                  <p class="marque-name">' . $marque[2] . '</p>
                </div>
              </li>';
    }

    echo '</ul>
    <button class="slide-arrow" id="slide-arrow-next">
              &#8250;
            </button>
          </section>';







       
            
              
          echo '
          <div  id="marqv">
           
          </div>';
          
            }


            
        
            
            
        
    }
    
    
    

    
    
    
    
    
    
    
   
    

    



