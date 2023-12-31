<?php
require_once ('../Controllers/AcceuilController.php');
require_once ('../Controllers/SignUpController.php');
require_once ('../Controllers/ComparateurController.php');
session_start();
class AcceuilView

{

  

  
    public function afficherEntete($path) {
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

        
      $accueilControler = new AccueilController();
      $socialmedias = $accueilControler->getSocialMedia();
      $menuitems = $accueilControler->getMenuItems();
      
         echo'
        <div class="wrapper">
        <div class="multi_color_border"></div>
        <div class="top_nav">
        <div class="left">
          <div class="logo">
             <img src="../Assets/acceuil/logoNrml.png" alt="AutoPairia">
             </div>
             
          <div class="search_bar">
              <input type="text" placeholder="Search">
          </div>
      </div> 
      <div class="right">
        <ul>';
          foreach ($socialmedias as $sm) {
            
            echo'
            <li><a href="#"><img src="'.$sm[1].'" alt="Description 1"></a></li>
            ';



          }

          if(isset($_SESSION['user_id'])){
            echo'
            <li><a href="http://localhost/projet_web/Routers/UserProfile.php"><img src="'. $_SESSION['photo'] .'" alt="Profile Picture" class="img-profile"></a></li>

            <li><a href="http://localhost/projet_web/Routers/UserProfile.php" id="uname">'. $_SESSION['user_name'] .'</a></li>
         
            <li ><a href="http://localhost/projet_web/Controllers/LogoutController.php" id="logout" id="disconnect" >Se Deconnecter</a></li>

                      </ul>
                    </div>
                    </div>
                    <div class="bottom_nav">
                  <ul>';



          }else{

            echo'
         <li><a href="http://localhost/projet_web/Routers/Login.php" id="login">LogIn</a></li>
          <li><a href="http://localhost/projet_web/Routers/SignUp.php" id="inscrire">SignUp</a></li>
                  
                </ul>
              </div>
            </div>
            <div class="bottom_nav">
              <ul>';
          }
         
          
          
      foreach ($menuitems as $item) {
            
        echo'
        <li><a href='.$item[2].'> '.$item[1].'</a></li>
        ';



      }
      echo '
        
      </ul>
      </div>
  
      </div>
        
        ';
    }

   public function afficherDiapo(){
    $accueilControler = new AccueilController();
      $news = $accueilControler->getNews();
    echo '
    
    <div class="gradient_space">
    <div class="left_image">
    
        <div class="leftnews">';
            
        foreach ($news as $new) {
          echo '
          
              <img src="'.$new[1].'" alt="Image 1" class="vehicle-image">';
        };
            
           
           echo' 
        </div>
        <div class="rightnews">';
        foreach ($news as $new) {
          echo '
            <div class="desc">
            <a href="http://localhost/projet_web/Routers/News.php?id=' . $new[2]. '" >
                <h1 class="title">'.$new[3].'</h1>
          </a> 
           
            <p class="description"> '.$new[4].'
            </p>
            <a href="http://localhost/projet_web/Routers/News.php?id=' . $new[2]. '" class="read-more">Lire la suite <span>&rarr;</span></a>

            </div>';
        };
            
            
           

           
           echo' 
               
        </div>
      
            
       

            
        
    </div>
  
     
     
    <div class="right_image">
        
            <img src="../Assets/acceuil/mercedes.png" alt="Image gauche">
          
    </div>

      </div>
    ';
 
            
   }

  

   public function afficherMarques() {
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
}




function afficherPiedDePage() {
  $accueilControler = new AccueilController();
  $menuItems = $accueilControler->getMenuItems(); // Récupération des éléments du menu
  $socialMedia = $accueilControler->getSocialMedia(); // Récupération des réseaux sociaux

  echo '<footer class="footer">
            <div class="footer_wrapper">
                <div class="footer-section autopairia-section">
                    <div class="autopairia">
                        <div class="half red">AutoPairia</div>
                        <div class="half white">Votre meilleur comparateur de véhicules</div>
                    </div>
                </div>
                <div class="footer-section menu-section">
                    <ul>';

  foreach ($menuItems as $item) {
      echo '<li><a href="#">' . $item[1] . '</a></li>';
  }

  echo '</ul>
                </div>
                <div class="footer-section social-media-section">
                    <ul class="social-media">';

  foreach ($socialMedia as $media) {
      echo '<li><a href="#"><img src="' . $media[1] . '" alt="' . $media[2] . '"></a></li>';
  }

  echo '</ul>
                </div>
            </div>
        </footer>';
}

function afficherComparateur(){
  $accueilControler = new AccueilController();
  $types = $accueilControler->getTypesVehicules();
  echo '
  <div class="container">
      <h1 id="izan">Comparateur de véhicules</h1>
      
      
      <label for="vehicleType">Choisissez le type de véhicule :</label>
      <select id="vehicleType" name="vehicleType">';
          foreach ($types as $type ) {
            echo'
            <option value="' . $type[0] . '" >' . $type[1] . '</option>
            ';
          }
          
      echo '</select>
          
      
      <div class="form-container">
          


          <div class="form-box">
              <h2>Véhicule 1</h2>
              <form  method="post" class="comparison-form">
              
      
              <label for="marque">Marque :</label>
              <select id="marque1" name="marque" class="marque">
                  <option value="">selectionner la marque</option>
                  
              </select>
      
              <label for="model1">Modèle :</label>
              <select id="model1" name="model1">
                  <option value="">selectionner le modele</option>
                  
              </select>

              <label for="year1">Année :</label>
              <select id="year1" name="year1">
                  <option value="">selectionner lannee</option>
                  
                  
              </select>
      
              <label for="version1">Version :</label>
              <select id="version1" name="version1">
                  <option value="">selectionner la version</option>
                  
              </select>

              
              
              </form>
          </div>
          
          

          <div class="form-box">
              <h2>Véhicule 1</h2>
              <form  method="post" class="comparison-form">
              
      
              <label for="marque">Marque :</label>
              <select id="marque2" name="marque" class="marque">
                  <option value="">selectionner la marque</option>
                  
              </select>
      
              <label for="model2">Modèle :</label>
              <select id="model2" name="model2">
                  <option value="">selectionner le modele</option>
                  
              </select>

              <label for="year2">Année :</label>
              <select id="year2" name="year2">
                  <option value="">selectionner lannee</option>
                  
                  
              </select>
      
              <label for="version2">Version :</label>
              <select id="version2" name="version1">
                  <option value="">selectionner la version</option>
                  
              </select>

              
              
              </form>
          </div>
          


          

          <div id="form3" class="form-box" >
              <h2>Véhicule 1</h2>
              <form  method="post" class="comparison-form">
              
      
              <label for="marque">Marque :</label>
              <select id="marque3" name="marque" class="marque">
                  <option value="">selectionner la marque</option>
                  
              </select>
      
              <label for="model3">Modèle :</label>
              <select id="model3" name="model2">
                  <option value="">selectionner le modele</option>
                  
              </select>

              <label for="year3">Année :</label>
              <select id="year3" name="year3">
                  <option value="">selectionner lannee</option>
                  
                  
              </select>
      
              <label for="version3">Version :</label>
              <select id="version3" name="version1">
                  <option value="">selectionner la version</option>
                  
              </select>

              
              
              </form>
          </div>
          



          <div id="form4" class="form-box"  >
              <h2>Véhicule 1</h2>
              <form  method="post" class="comparison-form">
              
      
              <label for="marque">Marque :</label>
              <select id="marque4" name="marque" class="marque">
                  <option value="">selectionner la marque</option>
                  
              </select>
      
              <label for="model4">Modèle :</label>
              <select id="model4" name="model2">
                  <option value="">selectionner le modele</option>
                  
              </select>

              <label for="year4">Année :</label>
              <select id="year4" name="year4">
                  <option value="">selectionner lannee</option>
                  
                  
              </select>
      
              <label for="version4">Version :</label>
              <select id="version4" name="version1">
                  <option value="">selectionner la version</option>
                  
              </select>

              
              
              </form>
          </div>
          



         
      </div>
          
      <!-- Bouton Comparer -->
      <input type="submit" value="Comparer" id="compareButton" class="compare-button">


  </div>
  ';
}


public function afficherComparaisons() {
    $controller = new ComparateurController();
    $comparaisons = $controller->getPopularComparaisons();

    echo '
    <div class="comparisons-section">
        <h2>Comparaisons les plus recherchées</h2>
        <div class="guide-button">
            <a href="http://localhost/projet_web/Routers/GuideAchat.php" class="guide-link">Guide d\'achat</a>
        </div>
        <div class="comparisons-container">';

    foreach ($comparaisons as $comparaison) {
        echo '
            <div class="comparison-box">
                <div class="comparison-content">
                    <h3>' . $comparaison['marque_1'] . ' - ' . $comparaison['modele_1'] . '</h3>
                    <p>' . $comparaison['version_1'] . '</p>
                </div>
                <div class="comparison-content">
                    <h3>' . $comparaison['marque_2'] . ' - ' . $comparaison['modele_2'] . '</h3>
                    <p>' . $comparaison['version_2'] . '</p>
                </div>
            </div>';
    }

    echo '
        </div>
    </div>';

   
}





}?>