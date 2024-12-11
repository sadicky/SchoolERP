  $(document).ready(function () {

    $("#tuteur_tel").on("keyup", function(){
        const tuteur_tel = $(this).val().trim();
        if (tuteur_tel.length >= 6){
            $.ajax({
                url:'/eleves/check-tutor/',
                method: 'GET',
                data:{tuteur_tel:tuteur_tel},
                success: function(response){
                    if (response.exists){
                        $("#tuteur_nom").val(response.data.nom).prop('disabled',true);
                        $("#tuteur_prenom").val(response.data.prenom).prop('disabled',true);
                        $("#tuteur_postnom").val(response.data.postnom).prop('disabled',true);
                        $("#tuteur_email").val(response.data.email).prop('disabled',true);
                        $("#tuteur_sexe").val(response.data.sexe).prop('disabled',true);
                        $("#tuteur_job").val(response.data.profession).prop('disabled',true);
                        $("#tuteur_relation").val(response.data.relation).prop('disabled',true);
                        $("#tuteur_nat").val(response.data.nationalite).prop('disabled',true);
                        $("#tuteur_adresse").val(response.data.adresse).prop('disabled',true);
                    }else{
                        $("#tuteur_nom", "#tuteur_prenom", "#tuteur_postnom", "#tuteur_email"
                            ,"#tuteur_sexe", "#tuteur_job", "#tuteur_nat", "#tuteur_adresse"
                        ).val('');
                    }
                }
            })
        }
        else{
            $("#tuteur_nom", "#tuteur_prenom", "#tuteur_postnom", "#tuteur_email"
                ,"#tuteur_sexe", "#tuteur_job", "#tuteur_nat", "#tuteur_adresse"
            ).val('');
    }
})

  });