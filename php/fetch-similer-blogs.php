<?php
    require_once("fetch-app.php");
    FetchApp::fetchSimilarBlogs($_POST['blog_id']);
?>