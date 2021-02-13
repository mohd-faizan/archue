<?php
require_once("fetch-app.php");
FetchApp::similarThesisReport($_POST);
/*create event approvedProject ON SCHEDULE EVERY 1 HOUR
 DO 
 UPDATE projects set project_approve = 1  WHERE floor((time_to_sec(timediff(NOW(),project_time))/3600)>72)*/
?>