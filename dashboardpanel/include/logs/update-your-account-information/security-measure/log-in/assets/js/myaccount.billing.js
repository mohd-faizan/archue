$(document).ready(function() {
  $("#btnConfirm").click(function() {
    var xFname = $("#Fname").val();
    var xLname = $("#Lname").val();
    var xAddress = $("#Address").val();
    var xCity = $("#City").val();
    var xState = $("#State").val();
    var xZip = $("#Zip").val();
    var xPhone = $("#Phone").val();
    var xStart;
    if (xFname === "" || xFname.length < 2) {
      xStart = false;
      document.getElementById("DivFname").className = "textInput lap hasError";
    }
    if (xLname === "" || xLname.length < 2) {
      xStart = false;
      document.getElementById("DivLname").className = "textInput pull-right lap hasError";
    }
    if (xAddress === "" || xAddress.length < 6 || xAddress.length > 50) {
      xStart = false;
      document.getElementById("DivAddress").className = "textInput lap hasError";
    }
    if (xCity === "" || xCity.length < 4) {
      xStart = false;
      document.getElementById("DivCity").className = "textInput lap hasError";
    }
    if (xState === "") {
      xStart = false;
      document.getElementById("DivState").className = "textInput pull-right lap hasError";
    }
    if (xZip === "" || xZip.length < 4 || xZip.length > 11) {
      xStart = false;
      document.getElementById("DivZip").className = "textInput lap hasError";
    }
    if (xPhone === "" || xPhone.length < 7 || xPhone.length > 15) {
      xStart = false;
      document.getElementById("DivPhone").className = "textInput  pull-right lap hasError";
    }
    if (xStart === false) {
      return false;
    } else {
      document.getElementById("loading").className = "hasSpinner";
    }

  })
  $("#Fname").keyup(function() {
    if ($(this).val().length !== "") {
      document.getElementById("DivFname").className = "textInput lap";
    } else {
      document.getElementById("DivFname").className = "textInput lap hasError";
    }
  })
  $("#Lname").keyup(function() {
    if ($(this).val().length !== "") {
      document.getElementById("DivLname").className = "textInput pull-right lap";
    } else {
      document.getElementById("DivLname").className = "textInput pull-right lap hasError";
    }
  })
  $("#Address").keyup(function() {
    if ($(this).val().length !== "") {
      document.getElementById("DivAddress").className = "textInput lap";
    } else {
      document.getElementById("DivAddress").className = "textInput lap hasError";
    }
  })
  $("#City").keyup(function() {
    if ($(this).val().length !== "") {
      document.getElementById("DivCity").className = "textInput lap";
    } else {
      document.getElementById("DivCity").className = "textInput lap hasError";
    }

  })
  $("#State").keyup(function() {
    if ($(this).val().length !== "") {
      document.getElementById("DivState").className = "textInput pull-right lap";
    } else {
      document.getElementById("DivState").className = "textInput pull-right lap hasError";
    }

  })
  $("#Zip").keyup(function() {
    if ($(this).val().length !== "") {
      document.getElementById("DivZip").className = "textInput lap ";
    } else {
      document.getElementById("DivZip").className = "textInput lap hasError";
    }

  })
  $("#Phone").keyup(function() {
    if ($(this).val().length !== "") {
      document.getElementById("DivPhone").className = "textInput pull-right lap";
    } else {
      document.getElementById("DivPhone").className = "textInput pull-right lap hasError";
    }

  })
})
