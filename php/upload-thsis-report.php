<?php
require_once("upload-app.php");
if(uploadApp::upload_file($_FILES['thesis_report_file'])){
    uploadApp::uploadThesisReport($_FILES,$_POST);
}
else{
    echo json_encode(array("status"=>"no","message"=>"File size must be 5mb."));
}
?>