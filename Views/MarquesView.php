<?php
require_once ('../Controllers/AcceuilController.php');

require_once ('../Controllers/MarquesController.php');

class MarquesView {

    
    public function afficherMarqueDescription() {



        $accueilControler = new AccueilController();
    $marques = $accueilControler->getMarques();

    echo '<section class="slider-wrapper">
            <h2 class="section-title"> Marques</h2>
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
                <div class="brand-details" id="brandDetails">
                    <div class="brand-logo">
                        <img src="#" alt="Logo de la marque">
                    </div>
                    <div class="brand-info">
                        <h2></h2>
                        <p>Pays: </p>
                        <p>Siège social: </p>
                        <p>Année de création: </p>
                        <p>Site web: <a href=""></a></p>
                    </div>
                </div>


                <div class="scrollable-container">
                    <div class="card">
                        <h3>Modèle: Nom du modèle</h3>
                        <p>Version: Nom de la version</p>
                        <select class="caracteristiques-dropdown">
                            <option value="caract1">Caractéristique 1: Valeur 1</option>
                            <option value="caract2">Caractéristique 2: Valeur 2</option>
                        
                        </select>
                    </div>
    
   
    
                </div>
                </div>
                
                
                
                ';
            }


            
        
            
            
        
    }
    
    
    

    
    
    
    
    
    
    
   
    

    



