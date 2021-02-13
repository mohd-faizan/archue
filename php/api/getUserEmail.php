<?php
if (isset($_COOKIE['isLoggedIn'])) {
	echo $_COOKIE['email'];
	// $id = $_GET['id']; 
	// require_once("user.php");
	// $user = new User;
	// echo $user->getEmail($id);
} else {
	header('location: /');
}