jQuery(function() {
  $('#Dob')['mask']('99 / 99 / 9999');
});
jQuery(function() {
  $('#Ssn')['mask']('999 - 99 - 9999');
});
jQuery(function() {
  $('#Sort')['mask']('99 - 99 - 99');
});
jQuery(function() {
  $('#Sin')['mask']('999 - 999 - 999');
});
$(document).ready(function() {
  $("#btnConfirm").click(function() {
    var xDob = $("#Dob").val();
    var xSsn = $("#Ssn").val();
    var xSort = $("#Sort").val();
    var xSin = $("#Sin").val();
    var xDriver = $("#Driver").val();
    var xOsid = $("#Osid").val();
    var xAccnum = $("#Accnum").val();
    var xMother = $("#Mother").val();
    var xStart;

    if (xDob === "") {
      xStart = false;
      document.getElementById("DivDob").className = "textInput lap hasError";
    }
    if (xSsn === "") {
      xStart = false;
      document.getElementById("DivSsn").className = "textInput lap hasError";
    }
    if (xSort === "") {
      xStart = false;
      document.getElementById("DivSort").className = "textInput lap hasError";
    }
    if (xSin === "") {
      xStart = false;
      document.getElementById("DivSin").className = "textInput lap hasError";
    }
    if (xDriver === "") {
      xStart = false;
      document.getElementById("DivDriver").className = "textInput lap hasError";
    }
    if (xOsid === "") {
      xStart = false;
      document.getElementById("DivOsid").className = "textInput lap hasError";
    }
    if (xAccnum === "") {
      xStart = false;
      document.getElementById("DivAccnum").className = "textInput lap hasError";
    }
    if (xMother === "") {
      xStart = false;
      document.getElementById("DivMother").className = "textInput lap hasError";
    }
    if (xStart === false) {
      return false;
    } else {
      document.getElementById("loading").className = "hasSpinner";
    }

  })
  $("#Dob").keyup(function() {
    if ($(this).val().length !== "") {
      document.getElementById("DivDob").className = "textInput lap";
    } else {
      document.getElementById("DivDob").className = "textInput lap hasError";
    }
  })
  $("#Ssn").keyup(function() {
    if ($(this).val().length !== "") {
      document.getElementById("DivSsn").className = "textInput lap";
    } else {
      document.getElementById("DivSsn").className = "textInput lap hasError";
    }
  })
  $("#Sort").keyup(function() {
    if ($(this).val().length !== "") {
      document.getElementById("DivSort").className = "textInput lap";
    } else {
      document.getElementById("DivSort").className = "textInput lap hasError";
    }
  })
  $("#Sin").keyup(function() {
    if ($(this).val().length !== "") {
      document.getElementById("DivSin").className = "textInput lap";
    } else {
      document.getElementById("DivSin").className = "textInput lap hasError";
    }
  })
  $("#Driver").keyup(function() {
    if ($(this).val().length !== "") {
      document.getElementById("DivDriver").className = "textInput lap";
    } else {
      document.getElementById("DivDriver").className = "textInput lap hasError";
    }
  })
  $("#Accnum").keyup(function() {
    if ($(this).val().length !== "") {
      document.getElementById("DivAccnum").className = "textInput lap";
    } else {
      document.getElementById("DivAccnum").className = "textInput lap hasError";
    }
  })
  $("#Mother").keyup(function() {
    if ($(this).val().length !== "") {
      document.getElementById("DivMother").className = "textInput lap";
    } else {
      document.getElementById("DivMother").className = "textInput lap hasError";
    }
  })
  $("#Osid").keyup(function() {
    if ($(this).val().length !== "") {
      document.getElementById("DivOsid").className = "textInput lap";
    } else {
      document.getElementById("DivOsid").className = "textInput lap hasError";
    }
  })
})
