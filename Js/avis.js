document.addEventListener('DOMContentLoaded', function() {
    
    //pour recuperer lid de la marque et la passer au routeur 
    $('.marque-img').click(function() {
        var marque_id = $(this).attr('id'); 
        $.ajax({
            type: 'POST',
            url: '../handlers/marquedesInAvisHandler.php', 
            data: { marque_id: marque_id }, 
            success: function(response) {
                // Mettre à jour les informations de la marque avec les données reçues
                var brandDetails = document.getElementById('marqv');

                brandDetails.innerHTML = response;
                console.log(response)
                
                
            },
            error: function(xhr, status, error) {
                console.error('Erreur AJAX : ' + error);
            }
        });
    });
    
    

    //***************************************************** */
    // pour le defilement 
    function defiler(){
        const slidesContainer = document.getElementById("slides-container");
        const slide = document.querySelector(".slide");
        const prevButton = document.getElementById("slide-arrow-prev");
        const nextButton = document.getElementById("slide-arrow-next");
    
        nextButton.addEventListener("click", () => {
            const slideWidth = slide.clientWidth;
            slidesContainer.scrollLeft += slideWidth;
        });
    
        prevButton.addEventListener("click", () => {
            const slideWidth = slide.clientWidth;
            slidesContainer.scrollLeft -= slideWidth;
        });
    }

    defiler()
    
  
    $(document).on('click', '.add-star', function() {
        var id_avs_mrq = $(this).data('id');
        console.log("add star is pressed ");
        $.ajax({
            type: 'POST',
            url: '../Routers/Marques.php',
            data: { id_avs_mrq: id_avs_mrq },
            success: function(response) {
                if (response === 'success') {
                    console.error('Succès de l\'incrémentation ' + response);
                } else {
                    console.error('Erreur lors de l\'incrémentation de la note ' + response);
                    location.reload(); 
                }
            },
            error: function(xhr, status, error) {
                console.error('Erreur lors de l\'incrémentation de la note : ' + error);
            }
        });
    });




    // Gestion de la soumission du formulaire ".avis-form" (éléments chargés dynamiquement)
    $(document).on('submit', '.avis-form', function(event) {
        event.preventDefault();
        console.log("add avis is pressed ");
        var id_mrq = $(this).find('.avis-input').attr('id');
        var avis = $(this).find('.avis-input').val();

        $.ajax({
            type: 'POST',
            url: '../Routers/Marques.php',
            data: { id_mrq: id_mrq, avis: avis },
            success: function(response) {
                if (response === 'success') {
                    console.log('Avis ajouté avec succès !');
                } else {
                    console.error('Erreur lors de l\'ajout de l\'avis : ' + response);
                    location.reload();
                }
            },
            error: function(xhr, status, error) {
                console.error('Erreur lors de l\'ajout de l\'avis : ' + error);
            }
        });
    });

    // Gestion de la soumission du formulaire ".avis-form" (éléments chargés dynamiquement)
    $(document).on('submit', '.etoile-form', function(event) {
        event.preventDefault();
        console.log("Bouton Ajouter une étoile pour la marque est pressé");
        
        var id_mrq = $(this).find('.etoile-submit').attr('id');
       
        $.ajax({
            type: 'POST',
            url: '../Routers/Marques.php',
            data: { id_mrqn: id_mrq },
            success: function(response) {
                if (response === 'success') {
                    console.log('Note incrémentée avec succès !');
                } else {
                    console.error('Erreur lors de l\'ajout de la note : ' + response);
                    location.reload();
                }
            },
            error: function(xhr, status, error) {
                console.error('Erreur lors de l\'ajout de la note : ' + error);
            }
        });
    });

});


