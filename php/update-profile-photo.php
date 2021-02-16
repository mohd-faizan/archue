<?php
  require_once("app.php");
  App::updateProfilePhoto($_FILES['photo'], $_POST['id']);
    // echo json_encode($_FILES).json_encode($_POST);
?>