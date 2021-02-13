<?php
  $ext = explode(".",$_FILES['upload']['name']);
  $filename = time().".".end($ext);
  if(move_uploaded_file($_FILES['upload']['tmp_name'],"images/".$filename)){
      echo json_encode(array("url"=>"https://archue.com/ckeditor/upload/images/".$filename));
  }
  else{
      echo json_encode(array("error"=>"not uploaded".$_FILES['upload']));
  }
?>