<?php

session_start();
// if (isset($_SESSION) and (!isset($_SESSION['visited']) or $_SESSION['visited'] != true)) {
//     require "php/db-connect.php";
//     $sql ="INSERT INTO visitors(`ip_addr`, `time`) VALUES ('$_SERVER[REMOTE_ADDR]', CONVERT_TZ(CURRENT_TIMESTAMP,'+00:00','+05:30'));";
//     class Visitor extends Conn
//     {
//         public static function getConnect()
//         {
//             return self::connect();
//         }
//     }
//     if (Visitor::getConnect()->query($sql)) {
//         $_SESSION['visited'] = true;
//     } else {

//     }
// }

?>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

<!-- angularjs -->
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
<script type="text/javascript"
	src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.0/angular-route.min.js"></script>
<script type="text/javascript" src="share/angular-socialshare.js"></script>

<!-- Font Awesome Font -->
<link rel="stylesheet" type="text/css"
	href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- Lightbox -->
<script src="js/lightbox.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/lightbox.min.css">

<!-- Webmaster Tool -->
<meta name="google-site-verification" content="dWCX710o0SD7WJcl2O0o9MxuhqkIAkC8Kx8HKDuZ7RA" />

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-126651665-1"></script>
<script>
	window.dataLayer = window.dataLayer || [];
	function gtag() { dataLayer.push(arguments); }
	gtag('js', new Date());

	gtag('config', 'UA-126651665-1');
</script>
<!--// Global site tag (gtag.js) - Google Analytics -->


<!-- angular app -->
<script type="text/javascript" src="js/app.js"></script>

<!-- custom css -->
<link rel="stylesheet" type="text/css" href="css/style.min.css">
<link rel="stylesheet" type="text/css" href="css/carousel.css">
<link rel="stylesheet" type="text/css" href="css/home.css">
<link rel="stylesheet" type="text/css" href="css/lead.css">
<link rel="stylesheet" type="text/css" href="css/media-query.css">

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- Editor cdn-->
<script src="localcdn/decoupled-document/ckeditor.js"></script>
<script type="text/javascript" src="js/custom-upload-adapter.js"></script>
<base target="_blank">