$(document).ready(function() {
    $('.update').on('click', function(e) {
        e.preventDefault(); 

        var titre = $(this).closest('form').find('.form-control#titre').val();
        console.log("le titre ", titre);
        var contenu = $(this).closest('form').find('.form-control#contenu').val();
        
        var img = $(this).closest('form').find('.form-control#img').val();
        console.log("limg est  ", img);
        var idGuide = $(this).data('guide-id'); 
        console.log("le id est ", idGuide);
       
        

        
        $.ajax({
            type: 'POST',
            url: '../Routers/GguideAchat.php', 
            data: {
                titre: titre,
                contenu: contenu,
                img: img,
                idGuide: idGuide 
            },
            success: function(response) {
                console.log('Mise à jour réussie pour le guide avec l\'ID : ' + idGuide);
                window.location.href = "http://localhost/projet_web/Routers/GguideAchat.php"

            },
            error: function(error) {
                console.error('Erreur lors de la mise à jour pour le guide avec l\'ID ' + idGuide + ' :', error);
            }
        });
    });






    $('.update_cnt').on('click', function(e) {
        e.preventDefault(); 

        var nom = $(this).closest('form').find('.form-control#nom').val();
        console.log("le titre ", nom);
        var email = $(this).closest('form').find('.form-control#email').val();
        
        var message = $(this).closest('form').find('.form-control#message').val();
        console.log("limg est  ", message);
        var id = $(this).data('guide-id'); 
        console.log("le id est ", id);
       
        

        
        $.ajax({
            type: 'POST',
            url: '../Routers/GguideAchat.php', 
            data: {
                nom: nom,
                email: email,
                message: message,
                id: id
            },
            success: function(response) {
                console.log('Mise à jour réussie pour le guide avec l\'ID : ' + id);
                window.location.href = "http://localhost/projet_web/Routers/GguideAchat.php"

            },
            error: function(error) {
                console.error('Erreur lors de la mise à jour pour le guide avec l\'ID ' + idGuide + ' :', error);
            }
        });
    });
















});
