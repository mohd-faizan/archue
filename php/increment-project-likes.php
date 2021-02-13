<?php
    require_once('project-app.php');
    $id = $_GET['id'];
    ProjectApp::incrementProjectLikes($id);
?>