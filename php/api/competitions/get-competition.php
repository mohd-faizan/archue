<?php
    $offset = $_GET['offset'];
    $limit = $_GET['limit'];
    require_once("competition.php");
    $competition = new Competition;
    echo $competition->getCompetition($offset, $limit);
?>