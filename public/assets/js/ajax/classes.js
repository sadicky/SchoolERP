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
  
      $('.presence-checkbox').on('change', function () {
        const row = $(this).closest('tr');
        const justifyCheckbox = row.find('.justify-checkbox');

        if ($(this).is(':checked')) {
            justifyCheckbox.prop('disabled', true).prop('checked', false);
        } else {
            justifyCheckbox.prop('disabled', false);
        }
    });
  });