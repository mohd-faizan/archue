<?php
require_once("app.php");
if(count($_POST)>0){
	App::signUp($_POST);
}
else{
	echo "access denied<a href='/'>Go Back To Home</a>";
}
?>