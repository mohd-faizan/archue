<?php
   function compress_image($source_url, $destination_url, $quality) {

         $info = getimagesize($source_url);

          if ($info['mime'] == 'image/jpeg')
          $image = imagecreatefromjpeg($source_url);

          elseif ($info['mime'] == 'image/gif')
          $image = imagecreatefromgif($source_url);

          elseif ($info['mime'] == 'image/png')
          $image = imagecreatefrompng($source_url);

          imagejpeg($image, $destination_url, $quality);
          return $destination_url;
   }

    if ($_FILES["file"]["error"] > 0) {
        $error = $_FILES["file"]["error"];
    }
    else if (($_FILES["file"]["type"] == "image/gif") ||
        ($_FILES["file"]["type"] == "image/jpeg") ||
        ($_FILES["file"]["type"] == "image/png") ||
        ($_FILES["file"]["type"] == "image/pjpeg") && $_FILES['file']['size'] < 10000000) {
        $url = '../uploads/';
        $min_rand=rand(0,1000);
        $max_rand=rand(100000000000,10000000000000000);
        $name_file=rand($min_rand,$max_rand);//this part is for creating random name for image

        $ext = strtolower(pathinfo($_FILES["file"]["name"],PATHINFO_EXTENSION));//gets extension
        #$file = str_replace(" ", "_", $url.$_FILES['file']['name']);
        $file = $url."".$name_file.".".$ext;
        $filename = compress_image($_FILES["file"]["tmp_name"],$file , 20);
        $arr = explode("/", $filename);
        echo json_encode(array_pop($arr));
    }else {
        $resp['err'] = "Uploaded image should be jpg or gif or png.";
        $resp['status'] = false;
        echo json_encode($err);
    }
?>