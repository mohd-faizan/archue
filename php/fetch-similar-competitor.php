<?php
    require_once("fetch-app.php");
    $category = $_GET['category'];
    $id = $_GET['id'];
    FetchApp::fetchSimilarCompetitions($category, $id);
?>