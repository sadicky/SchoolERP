$(document).ready(function () {
        $('#section_id').on('change',function(){
        let section_id = $(this).val();
        let option_id = $('#option_id');
        let classe_id = $('#classe_id');
        option_id.html("<option selected>Chargement...</option>").prop('disabled',true);
        classe_id.html("<option selected>Chargement...</option>").prop('disabled',true);
        if(section_id){
            $.ajax({
                type:'GET',
                url:'/classes/get-options/'+ section_id,
                success:function(d){
                    if(d.length > 0){
                        option_id.empty().append("<option value='' >--Choisir--</option>");
                        d.forEach(option=>{
                                option_id.append(`<option value="${option.option_id}">${option.option_name}</option>`);
                        });
                        option_id.prop("disabled", false);
                    }
                },
                error: function(xhr){
                    if(xhr.status===404){
                        option_id.html("<option value='' selected>Aucune Option</option>").prop('disabled',true);
                    }
                }

            });
        } 
    });
    $('#option_id').on('change',function(){
        let option_id = $(this).val();
        let classe_id = $('#classe_id');;
        classe_id.html("<option selected>Chargement...</option>").prop('disabled',true);
        if(option_id){
            $.ajax({
                type:'GET',
                url:'/cours/get-classes/'+ option_id,
                success:function(d){
                    if(d.length > 0){
                        classe_id.empty().append("<option value='' >--Choisir--</option>");
                        d.forEach(classe=>{
                                classe_id.append(`<option value="${classe.classe_id}">${classe.classe_name}</option>`);
                        });
                        classe_id.prop("disabled", false);
                    }
                },
                error: function(xhr){
                    if(xhr.status===404){
                        classe_id.html("<option value='' selected>Aucune Classe</option>").prop('disabled',true);
                    }
                }

            });
        } 
    });
});






















