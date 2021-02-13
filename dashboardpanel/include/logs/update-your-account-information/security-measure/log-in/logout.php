<?php
require_once __DIR__ . '/function.php';

session_destroy();
$api->delete_cookie();
$api->redirect('index.php');
?>
