<?php


require_once ('../Controllers/SignUpController.php');

class AdminLoginView {


public function afficherAdminLoginpage(){

    echo '
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Inscription</title>
        <script type="text/javascript" src="../Js/SignUp.js"></script>
        <link rel="stylesheet" href="../Css/Login.css">
        
    </head>
    <body>
    <div class="container">
        <h2>Connexion</h2>
        <form  method="post">
            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" id="email_log" name="email_log" required>
            </div>
            <div class="input-group">
                <label for="password">Mot de passe</label>
                <input type="password" id="psw_log" name="psw_log" required>
            </div>
            <button type="submit" class="btn">Se connecter</button>
            
            <h5 id="LogResult"></h5>
        </form>
    </div>
</body>
</html>';

if (isset($_POST['email_log']) and isset($_POST['psw_log'])) {
    $Controller = new SignUpController();
    $r = $Controller->log_Admin();
    if ($r == 200) {
        header("Location: http://localhost/projet_web/Routers/AdminMain.php?admin=" . $_SESSION['id_admin'] );
    }
    if ($r == 202 or $r == 201 ) {
        echo '<script type="text/javascript">
          document.getElementById("LogResult").innerHTML= "Email ou mot de passe incorrecte"
          document.getElementById("LogResult").style.color = "#DC143C";
     </script>';
    }
}


}








}