$(document).ready(function () {
        $('#section_id').on('change',function(){
        let section_id = $(this).val();
        let option_id = $('#option_id');
        option_id.html("<option selected>Chargement...</option>").prop('disabled',true);
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
        }else{
            option_id.html("<option>Selectionner une section d'abord</option>").prop("disabled", true);
        }
    });
});