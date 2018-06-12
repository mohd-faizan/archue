<!DOCTYPE html>
<html ng-app="myApp">
<head>
	<title ng-bind="title"></title>
	<base href="/angularjs/archue/">
	<meta charset="utf-8">
	<meta name="description" content="{{description}}">
	<?php include("include/cdn.php");?>
</head>
<body  ng-controller="rootController">
 	<div root-dir>
 		<div my-nav></div>
		<ng-view autoScroll="true"></ng-view>
		<?php include("include/footer.php"); ?>
 	</div>
</body>
</html>
