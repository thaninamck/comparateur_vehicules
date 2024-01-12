$(document).ready(function() {
    

    $('.btn-primary').on('click', function(event) {
        event.preventDefault();
        
        var idNews = $(this).attr('id');
        var imagePath = $('#imagePath').val();
        var title = $('#title').val();
        var description = $('#description').val();
        var content = $('#content').val();
        var date = $('#date').val();
        
        // Création de l'objet contenant les données à envoyer
        var dataToSend = {
            idNews: idNews,
            imagePath: imagePath,
            title: title,
            description: description,
            content: content,
            date: date
        };
        
        
        $.ajax({
            type: 'POST',
            url: '../Routers/GNews.php', 
            data: dataToSend,
            success: function(response) {
                // Rediriger vers une autre page
             // console.log(response);
              window.location.href = "http://localhost/projet_web/Routers/GNews.php";
            },
            error: function(error) {
                //window.location.href = "http://localhost/projet_web/Routers/GNews.php";
            }
        });
    });
    // pour la suppression
    $('.delete-news').on('click', function(e) {
        e.preventDefault();
        const newsId = $(this).data('news-id');
        console.log("le id est :"+newsId)
        
        if (confirm("Êtes-vous sûr de vouloir supprimer cette news ?")) {
            
            $.ajax({
                type: "POST",
                url: "../Routers/GNews.php",
                data: { id_new_asup: newsId },
                success: function(response) {
                    // Rechargement de la page après suppression réussie
                    if (response === 'success') {
                        
                    } else {
                        alert("La suppression avec succes");
                        location.reload();
                    }
                },
                error: function() {
                    alert("Erreur lors de la suppression");
                }
            });
        }
    });



    //pour lajout 
    $('#addnewsForm').submit(function(event) {
        event.preventDefault(); // Empêche la soumission du formulaire par défaut
        
        
        const imagePath = $('#imagePath').val();
        const title = $('#title').val();
        const description = $('#description').val();
        const content = $('#content').val();
        const date = $('#date').val();
        
     
        const dataToSend = {
            imagesrc: imagePath,
            title: title,
            description: description,
            content: content,
            date: date
        };
        
      
        $.ajax({
            type: 'POST', 
            url: '../Routers/GNews.php', 
            data: dataToSend, 
            success: function(response) {
                
                console.log(response); 
                window.location.href = "http://localhost/projet_web/Routers/GNews.php";
            },
            error: function(xhr, status, error) {
                
                console.error(error); 
                alert('Erreur lors de l\'enregistrement de la nouvelle news.');
            }
        });
    });



    //pour la recherche 

    $('#searchInput').on('keyup', function() {
        console.log("je suis dans la recherche ")
        const value = $(this).val().toLowerCase();
        $('table tbody tr').filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });










});

