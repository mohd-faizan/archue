<?php
	require_once 'fetch-app.php';
	FetchApp::fetchCommentsOfBlog($_POST['blog_id']);
?>