<?php
    require_once("login-signup.php");
    $loginSignup = new LoginSignup;
    echo $loginSignup->signUp($_POST);
?>