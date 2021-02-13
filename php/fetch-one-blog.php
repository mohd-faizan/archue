<?php
require_once("fetch-app.php");
$id = $_GET['blog_id'];
FetchApp::fetchOneBlog($id);
?>