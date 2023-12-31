<?php
  session_start();
    session_unset(); // Détruire les variables de session
    if(session_destroy()){ // Détruire la session
    header("Location: http://localhost/projet_web/Routers/Acceuil.php");
    }