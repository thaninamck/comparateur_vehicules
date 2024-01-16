$(document).ready(function() {
    

   //pour la modification de la marque 
   $(document).on('click', '.update-mrq', function(e) {
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
            url: "../Routers/Gvehicules.php",
            data: {
                id_mrq1: id_mrq,
                logo: logo,
                nom: nom,
                pays: pays,
                siege_socc: siege_soc,
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


    /************************************************************************************ */
/***********************supprimer une Marque  */


    $('.delete-marque').on('click', function(e) {
        e.preventDefault(); // Empêcher le comportement par défaut du lien
    
        var idMarque = $(this).data('id'); 
        console.log("la id est "+idMarque)
        var confirmation = confirm("Êtes-vous sûr de vouloir supprimer cette marque ? Cela supprimera tous ses véhicules associés!");
    
        if (confirmation) {
            $.ajax({
                type: 'POST',
                url: '../Routers/Gvehicules.php', 
                data: { id_marque: idMarque }, 
                success: function(response) {
                    if (response === 'success') {
                            
                    } else {
                        alert("supprimée avec success");
                        location.reload();
                    } 
                },
                error: function(error) {
                    console.log(error); 
                }
            });
        } else {
            console.log('Suppression annulée');
        }
    });


    $('.delete-vcl').on('click', function(e) {
        e.preventDefault(); // Empêcher le comportement par défaut du lien
    
        var idvcl = $(this).data('id'); 
        console.log("la id est "+idvcl)
        var confirmation = confirm("Êtes-vous sûr de vouloir supprimer ce vehicule ?");
    
        if (confirmation) {
            $.ajax({
                type: 'POST',
                url: '../Routers/Gvehicules.php', 
                data: { id_vcl_sup: idvcl }, 
                success: function(response) {
                    if (response === 'success') {
                            
                    } else {
                        alert("supprimé avec success");
                        location.reload();
                    } 
                },
                error: function(error) {
                    console.log(error); 
                }
            });
        } else {
            console.log('Suppression annulée');
        }
    });





    /****************************************************************************************** */
    /******************************pour modofer une caratcteriqtuque  ***************************/
    $(document).on('submit', '#caracteristiqueForm', function(e) {
        e.preventDefault(); 
    
        var nom = $('#nom').val();
        var valeur = $('#valeur').val();
        var idCaracteristique = $(this).find('.update-caract').data('caractid');
    
        var dataToSend = {
            nom: nom,
            valeur: valeur,
            idCaracteristique: idCaracteristique
        };
    
        $.ajax({
            type: 'POST',
            url: '../Routers/Gvehicules.php', 
            data: dataToSend,
            success: function(response) {
                if (response === 'success') {
                            
                } else {
                    alert("mise a jour  avec success");
                    window.history.go(-1);
                } 
            },
            error: function(error) {
                console.log('Erreur lors de la mise à jour : ' + error);
            }
        });
    });


    //pour supprimer une caratceriqtue 
    $('.delete-feature').on('click', function(e) {
        e.preventDefault(); // Empêcher le comportement par défaut du lien
    
        var idfeature = $(this).data('id'); 
        var idvclsup = $(this).data('idvcl'); 
        console.log("la id est "+idfeature )
        var confirmation = confirm("Êtes-vous sûr de vouloir supprimer cette caracteriqtue");
    
        if (confirmation) {
            $.ajax({
                type: 'POST',
                url: '../Routers/Gvehicules.php', 
                data: { idfeature: idfeature,
                        idvclsup:idvclsup }, 
                success: function(response) {
                    if (response === 'success') {
                            
                    } else {
                        alert("supprimée avec success");
                        location.reload();
                    } 
                },
                error: function(error) {
                    console.log(error); 
                }
            });
        } else {
            console.log('Suppression annulée');
        }
    });

    //pour inserer une caratct
    $('#insertCaracteristiqueForm').submit(function(e) {
        e.preventDefault(); 

        // Récupérer les valeurs du formulaire
        var nom = $('#nom').val();
        console.log("le nom",nom)
        var valeur = $('#valeur').val();
        var idVclCar = $('.insert').data('id');
        console.log("le nom",idVclCar)
        // Données à envoyer via AJAX
        var formData = {
            nom: nom,
            valeurcar: valeur,
            id_vclcar:idVclCar
        };

        // Requête AJAX
        $.ajax({
            type: 'POST',
            url: '../Routers/Gvehicules.php', 
            data: formData,
            success: function(response) {
                if (response === 'success') {
                            
                } else {
                    window.history.go(-1);
                } 
            },
            error: function(error) {
                console.log('Erreur lors de l\'insertion : ', error);
            }
        });
    });

    $("#searchInputcar").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("table tbody tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });





    //pour modifer un vehicule 
    $(".update-form").on("submit", function(e) {
        e.preventDefault(); // Empêche l'action par défaut du formulaire

        // Récupérez les valeurs des champs du formulaire
        var year = $("#year").val();
        var logo = $("#logo").val();
        var vclId = $(this).find("button").data("vclid");

        console.log("Année :", year);
        console.log("Logo :", logo);
        console.log("ID du véhicule :", vclId);
        // Construisez l'objet de données à envoyer via Ajax
        var formData = {
            year: year,
            logo: logo,
            vclId: vclId,
        };

        $.ajax({
            type: "POST",
            url: '../Routers/Gvehicules.php', // L'URL de votre script PHP pour traiter les données
            data: formData,
            success: function(response) {
                if (response === 'success') {
                            
                } else {
                    window.history.go(-1);
                } 
            },
            error: function(error) {
                console.log(error);
                // Gérez les erreurs ici
            }
        });
    });



    $('.addvehicle-form').submit(function(e) {
        e.preventDefault(); // Empêche l'action par défaut du formulaire

        // Récupération des valeurs du formulaire
        var selectedModelId = $('#model1').val();
        var year = $('#year1').val();
        var logoUrl = $('#logo').val();
        console.log("le model est "+selectedModelId)
        // Préparation des données à envoyer
        var formData = {
            modelId: selectedModelId,
            year: year,
            logoUrl: logoUrl
        };

        // Envoi des données via AJAX
        $.ajax({
            type: 'POST',
            url: '../Routers/Gvehicules.php', 
            data: formData,
            success: function(response) {
                // Traitez la réponse de la requête si nécessaire
                console.log('Succès de la requête AJAX : ');
                window.history.go(-1);
            },
            error: function(xhr, status, error) {
                // Gérez les erreurs de la requête AJAX si nécessaire
                console.error('Erreur AJAX : ' + error);
            }
        });
    });




    $("#searchInputveh").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("table tbody tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });

    $("#searchInputmrq").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("table tbody tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
    




    
});