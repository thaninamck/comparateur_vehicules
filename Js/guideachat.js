$(document).ready(function() {
    $(document).on('click', '#addedfav', function() {
        var userId = $(this).data('user-id');
        var vehiculeId = $(this).data('vehicule-id');
        console.log("delete favorite pressed ")

        $.ajax({
            type: 'POST',
            url: '../Routers/GuideAchat.php', 
            data: {
                user_id: userId,
                vehicule_id: vehiculeId,
            },
            success: function(response) {
                if (response === 'success') {
                        
                } else {
                    //alert("validé avec succes");
                    location.reload();
                }
            },
            error: function() {
                console.log('Erreur lors de la requête AJAX');
            }
        });
    });

    $(document).on('click', '#addfav', function() {
        var userId = $(this).data('user-id');
        var vehiculeId = $(this).data('vehicule-id');
        console.log("add favorite pressed  et le id vcl est :"+vehiculeId)
        $.ajax({
            type: 'POST',
            url: '../Routers/GuideAchat.php', 
            data: {
                adduser_id: userId,
                addvehicule_id: vehiculeId,
            },
            success: function(response) {
               
                
                if (response === 'success') {
                        
                } else {
                    //alert("validé avec succes");
                    location.reload();
                }
            },
            error: function() {
                
                console.log('Erreur lors de la requête AJAX');
            }
        });
    });
});
