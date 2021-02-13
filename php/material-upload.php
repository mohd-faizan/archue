<?php
  require_once("upload-app.php");
  uploadApp::materialUpload($_POST,$_FILES);
  // echo json_encode($_FILES);
?>