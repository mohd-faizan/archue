<?php
require_once("fetch-app.php");
$limit = $_GET['limit'];
$offset = $_GET['offset'];
FetchApp::fetchBlog($offset, $limit);
?>