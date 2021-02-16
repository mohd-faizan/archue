
<?php
 require_once("app.php");
$username = $_GET['username'];
 App::validateUsername($username)
?>