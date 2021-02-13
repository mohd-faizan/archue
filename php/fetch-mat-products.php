<?php
    require_once("fetch-app.php");
    // echo json_encode($_GET);
    $offset = $_GET['offset'];
    $limit = $_GET['limit'];
    FetchApp::getMatProducts($offset, $limit, $_GET['cat']);
?>