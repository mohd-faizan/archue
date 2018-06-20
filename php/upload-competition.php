<?php 
  require_once("upload-app.php");
  uploadApp::uploadCompetition($_POST,$_FILES['competitor_file'])
?>