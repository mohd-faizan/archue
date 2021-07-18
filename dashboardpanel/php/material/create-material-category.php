<?php
    require_once("material.php");
    $material = new Material;
    echo $material->createMaterialCategory($_POST);
?>