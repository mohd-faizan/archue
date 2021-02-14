<?php
    require_once("app.php");
    $username = $_GET['username'];
    App::getUserprofile($username);
?>