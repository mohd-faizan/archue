<?php
  extract($_GET);
  if($isFromMaterial=="true"){
      $subject = "Material Getquote";
  }
  else{
    $subject = "Architecture getQuote";
  }
  $message = "<html>
                  <body>
                      <img src='https://www.archue.com/image/get-quote.jpg' width='100%'/>
                  </body>
              </html>";
  $headers = "MIME-version:1.0".PHP_EOL;
  $headers .= "content-type:text/html;charset='UTF-8'".PHP_EOL;
  $headers .= "From:Archue <info@archue.com>";
  echo json_encode(mail($email,$subject,$message,$headers));
?>