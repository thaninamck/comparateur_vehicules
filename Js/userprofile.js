$(document).ready(function() {




//*******************************maj comentaire par utilisateur  */
$(document).on('click', '#editAvisFormBtn', function(e) {
    e.preventDefault();

    // Récupérer l'ID et le texte du formulaire
    var id_avs_vcl = $('#id_avs_vcl').val();
    console.log(id_avs_vcl);
    var cntxt = $('#cntxt').val();
    console.log(cntxt);

    // Envoyer les données via AJAX
    $.ajax({
        type: 'POST',
        url: 'http://localhost/projet_web/Routers/UserProfile.php',
        data: {
            id_avs_vcl: id_avs_vcl,
            cntxt: cntxt
        },
        success: function(response) {
            console.log(response);
            window.location.href = "http://localhost/projet_web/Routers/UserProfile.php"
        },
        error: function(error) {
            console.log(error);
        }
    });
});

//*******************************  */








    
/**                              pour maj du profil  */
$('#editFormuser').submit(function(event) {
    event.preventDefault(); // Empêche le comportement par défaut du formulaire (rechargement de la page)
    
    var newName = $('#editName').val();
    console.log(newName)
    var newFirstName = $('#editFirstName').val();
    console.log(newFirstName)
    var newSexe = $('#editSexe').val();
    console.log(newSexe)
    var newBirthDate = $('#editBirthDate').val();
    console.log(newBirthDate)

    $.ajax({
        type: 'POST',
        url: '../Routers/UserProfile.php', 
        data: {
            newName: newName,
            newFirstName: newFirstName,
            newSexe: newSexe,
            newBirthDate: newBirthDate
        },
        success: function(response) {
            console.log('Données mises à jour avec succès !');
            window.location.href = "http://localhost/projet_web/Routers/UserProfile.php"

            
        },
        error: function(error) {
            console.error('Erreur lors de la mise à jour des données : ', error);
            // Gérer l'erreur ici, si nécessaire
        }
    });
}); 

















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