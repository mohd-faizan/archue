<?php
    $offset = $_GET['offset'];
    $limit = $_GET['limit'];
    require_once("lead.php");
    $lead = new Lead;
    echo $lead->getLeads($offset, $limit);
?>