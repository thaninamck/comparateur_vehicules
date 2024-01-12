document.addEventListener('DOMContentLoaded', function() {
    const images = document.querySelectorAll('.left_image .leftnews > *');
   
    const titles = document.querySelectorAll('.left_image .rightnews > *');
    const totalImages = images.length;

    let currentIndex = 0;

    function animateContent() {
        images.forEach((el) => {
            el.style.opacity = '0';
            el.style.transition = 'opacity 1s ease-in-out';
        });

        titles.forEach((el) => {
            el.style.opacity = '0';
            el.style.transition = 'opacity 1s ease-in-out';
        });

        images[currentIndex].style.opacity = '1';
        titles[currentIndex].style.opacity = '1';

        currentIndex = (currentIndex + 1) % totalImages;

        setTimeout(animateContent, 5000); // Changer les contenus toutes les 5 secondes
    }

    animateContent();


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
    





    // ajax script for getting state data
    $(document).on('change', '#vehicleType', function(){
        var typeID = $(this).val();
       
        if(typeID){
            $.ajax({
                type: 'POST',
                url: '../handlers/marquehandler.php',
                data: { 'type_id': typeID },
                success: function(result){
                    $('.marque').html(result);
                }
            }); 
        } else {
            $('.marque').html('<option value="">selectionner la marque</option>');
        }
    });

    // pour modele du formulaire 1 ************************************************************************************
    $(document).on('change', '#marque1', function(){
        var marqueID = $(this).val();
       
        if(marqueID){
            $.ajax({
                type: 'POST',
                url: '../handlers/modeleHandler.php',
                data: { 'marque_id': marqueID },
                success: function(result){
                    $('#model1').html(result);
                }
            }); 
        } else {
            $('#model1').html('<option value="">selectionner le modele</option>');
        }
    });


    
    // pour modele du formulaire 1
    $(document).on('change', '#model1', function(){
        var modeleID = $(this).val();
       
        if(modeleID){
            $.ajax({
                type: 'POST',
                url: '../handlers/yearHandler.php',
                data: { 'modele_id': modeleID },
                success: function(result){
                    $('#year1').html(result);
                }
            }); 
        } else {
            $('#year1').html('<option value="">selectionner lannee</option>');
        }
    });

    $(document).on('change', '#year1', function(){
        const modele = $('#model1'); // Utilisation de jQuery pour obtenir l'élément
        var modele_id = modele.val(); 
        console.log("le modele_id est " + modele_id);
        var year = $('option:selected', this).text(); // Récupération de la valeur sélectionnée pour l'année
        console.log("la year est  " + year);
        if(year && modele_id){
            $.ajax({
                type: 'POST',
                url: '../handlers/versionHandler.php',
                data: { 
                    'year': year,
                    'modele_id': modele_id 
                },
                success: function(result){
                    $('#version1').html(result);
                }
            }); 
        } else {
            $('#version1').html('<option value="">Sélectionnez la version</option>');
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
        
        




          
        




});

























