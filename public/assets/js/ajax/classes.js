  $(document).ready(function () {
      // getclientegories();
      $("#formulaire_classe").submit(function (event) {
          event.preventDefault();
          $.ajax({
              url: "{{route('classes.store')}}",
              type:"POST",
              method:"POST",
              data:$("#formulaire_classe").serialize(),
              success: function (data) {
                if(data.success){
                    alert(data.message);
                    location.reload();
                }                  
              }
          });
      });
  

  });