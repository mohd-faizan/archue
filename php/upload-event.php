<?php
 require_once("upload-app.php");
 uploadApp::uploadEvents($_POST,$_FILES['event_file']);
?>