<?php
    require_once('fetch-app.php');
    $id = $_GET['id'];
    FetchApp::increaselikesJob($id);
?>