<?php
	require_once("upload-app.php");
	uploadApp::uploadBLog($_FILES['blog_file'],$_POST);
?>