  $(document).ready(function () {
    $(".section").change(function(){	 
      var section = $(this).val();
       if(section){
           $.ajax({
               type:'GET',
               url:'/sections/get-inscription/'+ section,
               success:function(d){
                if(d.length > 0){
                  d.forEach(option=>{
                    const montant = new Intl.NumberFormat('fr-FR').format(option.montant);
                    $('#frais').val(montant + ' FC');
                    // console.log(option.montant);
                  });
              }
               },
               error: function(xhr){
                   if(xhr.status===404){
                    $('#frais').val("Non Dispo");
                   }
               }
  
           });
       }
   });
  });