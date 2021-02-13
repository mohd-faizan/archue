<?php
	require_once("app.php");
	App::uploadBLog($_FILES['blog_file'], $_POST);
?>