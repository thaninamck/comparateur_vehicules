$(document).ready(function() {
    

   
    // pour le bloquage dun user 
    $('.ban-user').on('click', function(e) {
        e.preventDefault();
        const userLink = $(this).attr('href');
    
    // Extraire l'ID de l'utilisateur de l'URL
    const userId = userLink.split('id_user=')[1];
        console.log("le iduser est :"+userId)
        
        if (confirm("Êtes-vous sûr de vouloir de bloquer cet utilisateur  ?")) {
            
            $.ajax({
                type: "POST",
                url: "../Routers/GAvis.php",
                data: { id_user: userId },
                success: function(response) {
                   
                    if (response === 'success') {
                        
                    } else {
                        alert("bloqué avec succes");
                        location.reload();
                    }
                },
                error: function() {
                    alert("Erreur lors de la suppression");
                }
            });
        }
    });

    //pour le filtre 
    $('#selectFilter').on('change', function() {
        const selectedStatus = $(this).val();
        $('.avis-row').hide(); // Masquer toutes les lignes d'avis

        if (selectedStatus === 'all') {
            $('.avis-row').show(); // Afficher toutes les lignes si "Tous" est sélectionné
        } else {
            $(`.avis-row[data-approuv="${selectedStatus}"]`).show(); // Afficher les lignes correspondant au statut sélectionné
        }
    });

   
   



    //pour la recherche 

    $('#searchInput').on('keyup', function() {
        console.log("je suis dans la recherche ")
        const value = $(this).val().toLowerCase();
        $('table tbody tr').filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });


     // pour le bloquage dun commentaire
     $('.ban-comment').on('click', function(e) {
        e.preventDefault();
        const userLink = $(this).attr('href');
    
    // Extraire l'ID de l'utilisateur de l'URL
    const avsId = userLink.split('id_avs=')[1];
        console.log("le iduser est :"+avsId )
        
        if (confirm("Êtes-vous sûr de vouloir de refuser cet avis  ?")) {
            
            $.ajax({
                type: "POST",
                url: "../Routers/GAvis.php",
                data: { id_avs: avsId  },
                success: function(response) {
                   
                    if (response === 'success') {
                        
                    } else {
                        alert("bloqué avec succes");
                        location.reload();
                    }
                },
                error: function() {
                    alert("Erreur lors de la suppression");
                }
            });
        }
    });


    // pour la suppression dun commentaire
     $('.delete-comment').on('click', function(e) {
        e.preventDefault();
        const userLink = $(this).attr('href');
    
    // Extraire l'ID de l'utilisateur de l'URL
    const avsId = userLink.split('id_avs=')[1];
        console.log("le iduser est :"+avsId )
        
        if (confirm("Êtes-vous sûr de vouloir de supprimer cet avis  ?")) {
            
            $.ajax({
                type: "POST",
                url: "../Routers/GAvis.php",
                data: { id_avs_d: avsId  },
                success: function(response) {
                   
                    if (response === 'success') {
                        
                    } else {
                        alert("bloqué avec succes");
                        location.reload();
                    }
                },
                error: function() {
                    alert("Erreur lors de la suppression");
                }
            });
        }
    });



    // pour la validation dun commentaire
    $('.validate-comment').on('click', function(e) {
        e.preventDefault();
        const userLink = $(this).attr('href');
    
    // Extraire l'ID de l'utilisateur de l'URL
    const avsId = userLink.split('id_avs=')[1];
        console.log("le iduser est :"+avsId )
        
        if (confirm("Êtes-vous sûr de vouloir de valider cet avis  ?")) {
            
            $.ajax({
                type: "POST",
                url: "../Routers/GAvis.php",
                data: { id_avs_v: avsId  },
                success: function(response) {
                   
                    if (response === 'success') {
                        
                    } else {
                        alert("validé avec succes");
                        location.reload();
                    }
                },
                error: function() {
                    alert("Erreur lors de la suppression");
                }
            });
        }
    });



    // pour la invalidation dun commentaire
    $('.invalidate-comment').on('click', function(e) {
        e.preventDefault();
        const userLink = $(this).attr('href');
    
    // Extraire l'ID de l'utilisateur de l'URL
    const avsId = userLink.split('id_avs=')[1];
        console.log("le iduser est :"+avsId )
        
        if (confirm("Êtes-vous sûr de vouloir de valider cet avis  ?")) {
            
            $.ajax({
                type: "POST",
                url: "../Routers/GAvis.php",
                data: { id_avs_i: avsId  },
                success: function(response) {
                   
                    if (response === 'success') {
                        
                    } else {
                        alert("validé avec succes");
                        location.reload();
                    }
                },
                error: function() {
                    alert("Erreur lors de la suppression");
                }
            });
        }
    });














});