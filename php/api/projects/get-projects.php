<?php
    $offset = $_GET['offset'];
    $limit = $_GET['limit'];
    require_once("projects.php");
    $material = new Project;
    echo $material->getProjects($offset, $limit);
?>