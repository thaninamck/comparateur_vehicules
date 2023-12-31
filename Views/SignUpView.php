<?php


require_once ('../Controllers/SignUpController.php');

class SignUpView {

    public function afficherFormulaireInscription() {
        echo '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>Inscription</title>
            <script type="text/javascript" src="../Js/SignUp.js"></script>
            <link rel="stylesheet" href="../Css/SignUp.css">
            
        </head>
        <body>
            <div class="titre">
            <h2>Inscription</h2>
            </div>
            
            <form name="signin"  method="post" id="signinForm">
                <label for="nom">Nom:</label>
                <input type="text" id="nom" name="nom" required><br><br>
                
                <label for="prenom">Prénom:</label>
                <input type="text" id="prenom" name="prenom" required><br><br>
                
                <label for="email">Adresse e-mail:</label>
                <input type="email" id="email" name="email" required><br><br>
                <label for="sexe">Sexe:</label>
                <select id="sexe" name="sexe" required>
                    <option value="Femme">Femme</option>
                    <option value="Homme">Homme</option>
                </select><br><br>

                <label for="date_naissance">Date de naissance:</label>
                <input type="date" id="date_naissance" name="date_naissance" required><br><br>
                <label for="mot_de_passe">Mot de passe:</label>
                <input type="password" id="mot_de_passe" name="mot_de_passe" required><br><br>
                
                <label for="confirmer_mot_de_passe">Confirmer le mot de passe:</label>
                <input type="password" id="confirmer_mot_de_passe" name="confirmer_mot_de_passe" required><br><br>


                <input type="submit" value="S\'inscrire">
                <h5 id="SignInReslut"></h5>
            </form>
        </body>
        </html>
        ';


        if(isset($_POST['nom']) and isset($_POST['email']) and  isset($_POST['mot_de_passe']) and isset($_POST['date_naissance']) and isset($_POST['sexe']) and isset($_POST['confirmer_mot_de_passe']) and isset($_POST['prenom'])) {
            $controller = new SignUpController();

            if($_POST['confirmer_mot_de_passe']!=$_POST['mot_de_passe']) {
                echo 
                '<script type="text/javascript">
                  document.getElementById("SignInReslut").innerHTML= "Erreur dans la confirmation de mot de passe"
                  document.getElementById("SignInReslut").style.color = "#FF0000";
             </script>';
            }
            else {
                $result= $controller->register();
                
                if($result == 200) {
                    
                    header("Location: http://localhost/projet_web/Routers/Acceuil.php?uname=" . $_SESSION['user_name'] . "&user_id=" . $_SESSION['user_id']);
                }
                else {
                    if($result == 203) {
                        echo '<script type="text/javascript">
                  document.getElementById("SignInReslut").innerHTML= "Cet email est déja utilisé"
                  document.getElementById("SignInReslut").style.color = "#FF0000";
             </script>';
                    }
                    if($result==201) {
                        echo '<script type="text/javascript">
                  document.getElementById("SignInReslut").innerHTML= "Erreur dans la création du compte"
                  document.getElementById("SignInReslut").style.color = "#FF0000";
             </script>';
                    }
                }
            }

        }





    }

   

}
?>