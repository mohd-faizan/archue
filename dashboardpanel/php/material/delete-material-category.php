<?php
    require_once("material.php");
    $material = new Material;
    $id = $_GET['id'];
    echo $material->deleteMaterialCategory($id);
?>