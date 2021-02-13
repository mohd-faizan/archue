<?php
	require_once("fetch-app.php");
	$id = $_GET['project_id'];
	FetchApp::fetchSingleProject($id);
?>