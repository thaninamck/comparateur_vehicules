document.addEventListener('DOMContentLoaded', function() {
    
    //pour lajout dune etoile 
    $('.add-star').click(function() {
        var id_avs_vcl = $(this).data('id');
        
        $.ajax({
            type: 'POST',
            url: '../Routers/VehicleDescription.php',
            data: { id_avs_vcl: id_avs_vcl },
            success: function(response) {
                if (response == 'success') {
                    //location.reload(); 
                    console.error('succes de lincrementation ' +response);
                } else {
                    console.error('Erreur lors de l\'incrémentation de la note izan' +response);
                    location.reload(); 
                }
            },
            error: function(xhr, status, error) {
                console.error('Erreur lors de l\'incrémentation de la note : ' + error);
            }
        });
    });
//  pour lajout dun avis 
$('.avis-submit').click(function(event) {
    event.preventDefault();

    var id_vcl = $(this).siblings('.avis-input').attr('id');
    var avis = $(this).siblings('.avis-input').val();

    $.ajax({
        type: 'POST',
        url: '../Routers/VehicleDescription.php',
        data: { id_vcl: id_vcl, avis: avis },
        success: function(response) {
            if (response == 'success') {
                console.log('Avis ajouté avec succès !');
               
            } else {
                console.error('Erreur lors de l\'ajout de l\'avis : ' );
                location.reload();
            }
        },
        error: function(xhr, status, error) {
            console.error('Erreur lors de l\'ajout de l\'avis : ' + error);
        }
    });
});


//*************************************************************************************************** */

    // ajax script for getting state data
    $(document).on('change', '#vehicleType', function(){
        var typeID = $(this).val();
       
        if(typeID){
            $.ajax({
                type: 'POST',
                url: '../handlers/marquehandler.php',
                data: { 'type_id': typeID },
                success: function(result){
                    $('.marque').not('#marque1').html(result);

                }
            }); 
        } else {
            $('.marque').not('#marque1').html('<option value="">selectionner la marque</option>');
        }
    });

    
    
    //*************************************************************************** *******************************************************/
   
    $(document).on('change', '#marque2', function(){
        var marqueID = $(this).val();
       
        if(marqueID){
            $.ajax({
                type: 'POST',
                url: '../handlers/modeleHandler.php',
                data: { 'marque_id': marqueID },
                success: function(result){
                    $('#model2').html(result);
                }
            }); 
        } else {
            $('#model2').html('<option value="">selectionner le modele</option>');
        }
    });


    
    // pour modele du formulaire 1
    $(document).on('change', '#model2', function(){
        var modeleID = $(this).val();
       
        if(modeleID){
            $.ajax({
                type: 'POST',
                url: '../handlers/yearHandler.php',
                data: { 'modele_id': modeleID },
                success: function(result){
                    $('#year2').html(result);
                }
            }); 
        } else {
            $('#year2').html('<option value="">selectionner lannee</option>');
        }
    });

    $(document).on('change', '#year2', function(){
        const modele = $('#model2'); // Utilisation de jQuery pour obtenir l'élément
        var modele_id = modele.val(); 
        //console.log("le modele_id est " + modele_id);
        var year = $('option:selected', this).text(); // Récupération de la valeur sélectionnée pour l'année
        
        if(year && modele_id){
            $.ajax({
                type: 'POST',
                url: '../handlers/versionHandler.php',
                data: { 
                    'year': year,
                    'modele_id': modele_id 
                },
                success: function(result){
                    $('#version2').html(result);
                }
            }); 
        } else {
            $('#version2').html('<option value="">Sélectionnez la version</option>');
        }
    });



    //*************************************************************************** *******************************************************/
   
    $(document).on('change', '#marque3', function(){
        var marqueID = $(this).val();
       
        if(marqueID){
            $.ajax({
                type: 'POST',
                url: '../handlers/modeleHandler.php',
                data: { 'marque_id': marqueID },
                success: function(result){
                    $('#model3').html(result);
                }
            }); 
        } else {
            $('#model3').html('<option value="">selectionner le modele</option>');
        }
    });


    
    // pour modele du formulaire 1
    $(document).on('change', '#model3', function(){
        var modeleID = $(this).val();
       
        if(modeleID){
            $.ajax({
                type: 'POST',
                url: '../handlers/yearHandler.php',
                data: { 'modele_id': modeleID },
                success: function(result){
                    $('#year3').html(result);
                }
            }); 
        } else {
            $('#year3').html('<option value="">selectionner lannee</option>');
        }
    });

    $(document).on('change', '#year3', function(){
        const modele = $('#model3'); // Utilisation de jQuery pour obtenir l'élément
        var modele_id = modele.val(); 
        console.log("le modele_id est " + modele_id);
        var year = $('option:selected', this).text(); // Récupération de la valeur sélectionnée pour l'année
        //console.log("la year est  " + year);
        if(year && modele_id){
            $.ajax({
                type: 'POST',
                url: '../handlers/versionHandler.php',
                data: { 
                    'year': year,
                    'modele_id': modele_id 
                },
                success: function(result){
                    $('#version3').html(result);
                }
            }); 
        } else {
            $('#version3').html('<option value="">Sélectionnez la version</option>');
        }
    });




    //*************************************************************************** *******************************************************/
   
    $(document).on('change', '#marque4', function(){
        var marqueID = $(this).val();
       
        if(marqueID){
            $.ajax({
                type: 'POST',
                url: '../handlers/modeleHandler.php',
                data: { 'marque_id': marqueID },
                success: function(result){
                    $('#model4').html(result);
                }
            }); 
        } else {
            $('#model4').html('<option value="">selectionner le modele</option>');
        }
    });


    
    // pour modele du formulaire 1
    $(document).on('change', '#model4', function(){
        var modeleID = $(this).val();
       
        if(modeleID){
            $.ajax({
                type: 'POST',
                url: '../handlers/yearHandler.php',
                data: { 'modele_id': modeleID },
                success: function(result){
                    $('#year4').html(result);
                }
            }); 
        } else {
            $('#year4').html('<option value="">selectionner lannee</option>');
        }
    });

    $(document).on('change', '#year4', function(){
        const modele = $('#model4'); // Utilisation de jQuery pour obtenir l'élément
        var modele_id = modele.val(); 
        //console.log("le modele_id est " + modele_id);
        var year = $('option:selected', this).text(); // Récupération de la valeur sélectionnée pour l'année
        
        if(year && modele_id){
            $.ajax({
                type: 'POST',
                url: '../handlers/versionHandler.php',
                data: { 
                    'year': year,
                    'modele_id': modele_id 
                },
                success: function(result){
                    $('#version4').html(result);
                }
            }); 
        } else {
            $('#version4').html('<option value="">Sélectionnez la version</option>');
        }
    });

    

    /**             pour gerer la comparaison                  */
            
        const compareButton = document.getElementById('compareButton');
        compareButton.addEventListener('click', () => {
            
            const vehiclesData = [];
            const forms = document.querySelectorAll('.comparison-form');
            const typeElement = document.getElementById('vehicleType');
        const type = typeElement.value;
            forms.forEach((form, index) => {
                // Récupération des champs du formulaire
                const marque = form.querySelector(`#marque${index + 1}`).value;
                const model = form.querySelector(`#model${index + 1}`).value;
                
                const year = $(`#year${index + 1} option:selected`).text();
                


                const version = form.querySelector(`#version${index + 1}`).value;
                
                if (marque && model && year && version) {
                    const vehicleData = {
                        marque,
                        model,
                        year,
                        version,
                        type
                    };
                    vehiclesData.push(vehicleData);
                }
            });

            //pour gerer les id *********************************
            const vehicleIDs = [];
            
            for (let i = 1; i <= 4; i += 2) {
                const yearSelect1 = document.getElementById(`year${i}`);
                const selectedOption1 = yearSelect1.options[yearSelect1.selectedIndex];
                const yearValue1 = selectedOption1.value;

                const yearSelect2 = document.getElementById(`year${i + 1}`);
                const selectedOption2 = yearSelect2.options[yearSelect2.selectedIndex];
                const yearValue2 = selectedOption2.value;

                if (yearValue1 && yearValue2) {
                    vehicleIDs.push({ id1: yearValue1, id2: yearValue2 });
                }
            }
            //****************************************** */
        
            if (vehiclesData.length >= 2 ) {
                sendFormDataToCookie(vehiclesData);
                sendIDsToCookie(vehicleIDs);
            } else {
                // Aucun formulaire rempli
                alert("Veuillez remplir au moins deux formulaires.");
            }
        });

        function sendFormDataToCookie(data) {
            document.cookie = `vehiclesData=${JSON.stringify(data)}; path=/`;
            console.log(JSON.stringify(data));
            window.location.href = '../Routers/Comparateur.php';
        }

        function sendIDsToCookie(data) {
            document.cookie = `vehiclesIDs=${JSON.stringify(data)}; path=/`;
            console.log(JSON.stringify(data));
            
        }
        
        
//**************************************************************************************************** */




        




});

























