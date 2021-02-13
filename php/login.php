<?php session_start();
require_once("app.php");
if(count($_POST) > 0){
	App::login($_POST);
}
else{
	// echo "Access Denied <a href='/'>Go Back To Home</a>";
}
?>