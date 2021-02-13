<?php
    $offset = $_GET['offset'];
    $limit = $_GET['limit'];
    require_once("material.php");
    $material = new Material;
    echo $material->getMaterial($offset, $limit);
?>