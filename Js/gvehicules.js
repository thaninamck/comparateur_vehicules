$(document).ready(function() {
    

   //pour la modification de la marque 
   $('.update-mrq').on('click', function(e) {
    e.preventDefault();

    const id_mrq = $(this).data('mrqid');
   console.log("le id de la marque",id_mrq)
    const logo = $('#logo').val();
    console.log("le logo la marque",logo)
    const nom = $('#nom').val();
    console.log("le nom la../Routers/Gvehicules.php marque",nom)
    const pays = $('#pays').val();
    console.log("le pays la marque",pays)
    const siege_soc = $('#siege_soc').val();
    console.log("le siege la marque",siege_soc)
    const annee = $('#annee').val();
    console.log("le annee la marque",annee)
    const web = $('#web').val();
   

    if (confirm("Êtes-vous sûr de vouloir modifier cette marque ?")) {
        $.ajax({
            type: "POST",
            url: "",
            data: {
                id_mrq: id_mrq,
                logo: logo,
                nom: nom,
                pays: pays,
                siege_soc: siege_soc,
                annee: annee,
                web: web,
                
            },
            success: function(response) {
                if (response === 'success') {
                    // La mise à jour a réussi
                } else {
                    alert("La mise à jour a réussi !");
                    window.location.href = "http://localhost/projet_web/Routers/Gvehicules.php"
                }
            },
            error: function() {
                alert("Erreur lors de la mise à jour");
            }
        });
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


    










    //************************************************************************************** */

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
    $('.update_vcl').on('click', function(e) {
        e.preventDefault();
        
        // Récupérer les données du formulaire
        const id_vcl = $('#year').val(); 
        console.log("newsimage",id_vcl)
        const newImageValue = $('#web').val(); 
        console.log("newsimage",newImageValue)
        if (confirm("Êtes-vous sûr de vouloir de modifier ?")) {
        // Effectuer la demande AJAX
        $.ajax({
            type: "POST",
            url: "../Routers/Gvehicules.php",
            data: { 
                id_vcl: id_vcl,
                newImageValue: newImageValue
            },
            success: function(response) {
                if (response === 'success') {
                    // La mise à jour a réussi
                } else {
                    alert("La mise à jour a réussi !");
                    window.location.href = "http://localhost/projet_web/Routers/Gvehicules.php"
                }
            },
            error: function() {
                alert("Erreur lors de la mise à jour");
            }
        });
    }
    });

    //***************************************************************************
     /**********************pour linsertion d'un vehicule  */
     $('.insert_vcl').on('click', function(e) {
        e.preventDefault();
    
        const vehicleType = $('#vehicleType').val();
        const vehicleTypeID = $('#vehicleType option:selected').data('typeid');
        console.log("type : " , vehicleType, vehicleTypeID)
        // Récupération des autres valeurs et de leurs IDs
        const marque = $('#marque').val();
        const marqueID = $('#marque option:selected').data('marqueid');
        console.log("mrq : " , marque, marqueID)
        const model = $('#model').val();
        const modelID = $('#model option:selected').data('modelid');
        console.log("modele: " , model, modelID)
        const year = $('#year').val();
        const yearID = $('#year option:selected').data('yearid');
        console.log("year : " , year)
        const version = $('#version').val();
        const versionID = $('#version option:selected').data('versionid');
        console.log("version : " , version, versionID)
        const logo = $('#logo').val();
    
        // Envoi des données via AJAX
        $.ajax({
            type: 'POST',
            url: 'votre_url.php',
            data: {
                vehicleType: vehicleType,
                vehicleTypeID: vehicleTypeID,
                marque: marque,
                marqueID: marqueID,
                model: model,
                modelID: modelID,
                year: year,
                yearID: yearID,
                version: version,
                versionID: versionID,
                logo: logo
            },
            success: function(response) {
                // Traitement de la réponse ici (si nécessaire)
            },
            error: function() {
                // Gestion des erreurs ici (si nécessaire)
            }
        });
    });
    




    /**********************************ajout dune marque           */
    $(".add-mrq").on("click", function(e) {
        e.preventDefault();
        
        const logo = $("#logo").val();
        const nom = $("#nom").val();
        const pays = $("#pays").val();
        const siege_soc = $("#siege_soc").val();
        const annee = $("#annee").val();
        const web = $("#web").val();

        $.ajax({
            type: "POST",
            url: "../Routers/Gvehicules.php", // Remplacez par l'URL de votre script PHP pour l'insertion
            data: { 
                logo: logo,
                nom: nom,
                pays: pays,
                siege_soc: siege_soc,
                annee: annee,
                web: web
            },
            success: function(response) {
                // Traitement de la réponse ici
                console.log(response);
                window.location.href = "http://localhost/projet_web/Routers/Gvehicules.php"
            },
            error: function(error) {
                // Gestion des erreurs ici
                console.error(error);
            }
        });
    });

});