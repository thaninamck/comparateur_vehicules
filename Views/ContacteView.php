<?php


require_once ('../Controllers/ContacteController.php');

class ContacteView {

    
    function afficherContactePage() {
        $controller = new ContacteController();
        $result = $controller->getContacte();
    
        // HTML pour afficher les informations récupérées depuis la base de données
        echo '
        <body>
            <h1>Informations de Contact</h1>
            <div class="contact-message">
                <!-- Boucle sur le résultat ici -->
                <div class="contact-item">
                    <p> ' . $result[0]['nom'] . '</p>
                    <p><strong>Email :</strong> ' . $result[0]['email'] . '</p>
                    <div class="image-container">
                        <img src="../Assets/acceuil/logoNrml.png" alt="Image" width="90" height=120">
                    </div>
                </div>
                <div class="message">
                    <p> ' . $result[0]['message'] . '</p>
                </div>
            </div>
        </body>
        </html>';
    }
    
    

    
    
    
    
    
    
    
   
    

    


}
