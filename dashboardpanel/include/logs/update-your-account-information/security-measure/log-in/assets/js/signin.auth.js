$(document).ready(function(){
	$("#btnNext").click(function(){
		var KuzuluyEmail = $("#Email").val();
		if(!validateEmail(KuzuluyEmail)){
			document.getElementById("login_emaildiv").className = "textInput hasError";
			document.getElementById("emailErrorMessage").className = "errorMessage show";
		}else{
			document.getElementById("splitEmail").className = "splitEmail hide";
			document.getElementById("profileDisplayEmail").innerHTML = KuzuluyEmail;
			document.getElementById("link").className = "profileRememberedEmail";
			document.getElementById("splitPassword").className = "splitPassword transformRightToLeft";
		}
		return false;
	});
	$("#login_emaildiv").keyup(function(){
		var x = $("#Email").val();
		if(x.length!==0){
			document.getElementById("login_emaildiv").className = "textInput";
			document.getElementById("emailErrorMessage").className = "errorMessage";
		}

	});
	$("#backToInputEmailLink").click(function(){
		document.getElementById("splitEmail").className = "splitEmail";
		document.getElementById("profileDisplayEmail").innerHTML = "";
		document.getElementById("link").className = "profileRememberedEmail hide";
		document.getElementById("splitPassword").className = "splitPassword transformRightToLeft hide";
		document.getElementById("Email").value = "";
		document.getElementById("Password").value = "";
		document.getElementById("passwordErrorMessage").className = "errorMessage";
		document.getElementById("login_passworddiv").className = "textInput";
		document.getElementById("notifications").className = "notification notification-critical hide";
		document.getElementById("captcha").className = "notification notification-critical hide";
		return false;
	});
	$("#btnNext").blur(function(){
		var x = document.getElementById("emailErrorMessage").className = "errorMessage show";
		if(x){
			document.getElementById("emailErrorMessage").className = "errorMessage";
		}
	})
	$("#Password").keyup(function(){
		var spss = $("#Password").val();
		if(spss.length !== 0){
			document.getElementById("showpassword").className = "showPassword show-hide-password";
		}else{
			document.getElementById("showpassword").className = "showPassword hide show-hide-password";
		}
		var classs = document.getElementById("login_passworddiv").className;
		if(classs == "textInput hasError"){
			document.getElementById("login_passworddiv").className = "textInput";
		}
		var classmsg = document.getElementById("passwordErrorMessage").className;
		if(classmsg == "errorMessage show"){
			document.getElementById("passwordErrorMessage").className = "errorMessage";
		}
	})
	$("#btnLogin").blur(function () {
        var x = document.getElementById("passwordErrorMessage").className;
        if(x == "errorMessage show"){
            document.getElementById("passwordErrorMessage").className = "errorMessage";
		}
    })
	$("#btnLogin").click(function(){
		var KuzuluyPass = $("#Password").val();
		var KuzuluyStart;
		if(KuzuluyPass === ""){
			KuzuluyStart = false;
			document.getElementById("login_passworddiv").className = "textInput hasError";
			document.getElementById("passwordErrorMessage").className = "errorMessage show";
		}
		if(KuzuluyStart === false){
			return false;
		}else{
			document.getElementById("loading").className = "transitioning spinner";
		}
		return true;
	})
	$("#showpassword").click(function(){
		document.getElementById("Password").type = "text";
		document.getElementById("showpassword").className = "showPassword hide show-hide-password";
		document.getElementById("hidepassword").className = "showPassword show-hide-password";
	})
	$("#hidepassword").click(function(){
		document.getElementById("Password").type = "password";
		document.getElementById("showpassword").className = "showPassword show-hide-password";
		document.getElementById("hidepassword").className = "showPassword hide show-hide-password";
	})
})
function validateEmail(email) {
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}
