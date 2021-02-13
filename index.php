<!DOCTYPE html>
<html ng-app="myApp" lang="en">

<head>

	<!-- By New Routing ngMeta -->
	<title ng-bind="ngMeta.title"></title>
	<meta name="description" content="{{ngMeta.description}}" />
	<meta name="keywords" content="{{ngMeta.keywords}}" />

	<!-- Arbitrary tags for Social Sharing -->
	<meta property="og:title" content="{{ngMeta.title}}" />
	<meta property="og:image" content="{{ngMeta.image}}" />
	<meta property="og:description" content="{{ngMeta.description}}" />
	<meta property="og:url" conntent="{{ngMeta.url}}" />
	<meta property="og:type" content="webpage" />

	<!-- facebook meta tag for fbappid -->
	<meta property="fb:app_id" content="167503137442216" />
	<!-- Prerender IO -->
	<meta name="fragment" content="!">

	<base href="/">
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
	<link rel="icon" href="/favicon.ico" type="image/x-icon">
	<meta charset="utf-8">
		
	<?php include("include/cdn.php"); ?>


	<style>
		#newsletterModal .modal-body {
			background-image: url('./image/newsletter-bg.png');
			background-size: cover;
			background-repeat: no-repeat;
			background-blend-mode: overlay;
			background-color: rgba(0, 0, 0, 0.5);
			color: #ffffff;
		}
	</style>
</head>

<body ng-controller="rootController" ng-class="{'myover':isShowLoad}" ng-cloak>
	<div root-dir>
		<div my-nav>
			<?php require("include/nav.php"); ?>
		</div>
		<ng-view autoScroll="true"></ng-view>
		<?php include("include/footer.php"); ?>
	</div>
	<div class="loader" ng-if="isShowLoad">
		<div class="load-container">
			<img src="image/lOADER-ARCHUE.gif" height="100">
		</div>
	</div>

	<!-- Newsletter Modal -->
	<div class="modal" tabindex="-1" role="dialog" id="newsletterModal">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Newsletter</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body" ng-controller="newsletterController">
					<div class="alert alert-success" ng-if="showSuccess">{{message}}</div>
					<div class="alert alert-danger" ng-if="showError">{{message}}</div>
					<h5>Subscribe to get every updates from us.</h5>
					<form id="subscriberForm" ng-submit="subscribe()">
						<div class="form-group">
							<label for="name">Name:</label>
							<input type="text" class="form-control" id="name" ng-model="name" placeholder="Enter your name" required>
						</div>
						<div class="form-group">
							<label for="email">Email address</label>
							<input type="email" class="form-control" id="email" ng-model="email" placeholder="Enter your email" required>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-primary">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
<!-- ngMeta CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/ng-meta/1.0.3/ngMeta.min.js"></script>
	<!--Start of Tawk.to Script-->
	<script type="text/javascript">
		var Tawk_API = Tawk_API || {},
			Tawk_LoadStart = new Date();
		(function() {
			var s1 = document.createElement("script"),
				s0 = document.getElementsByTagName("script")[0];
			s1.async = true;
			s1.src = 'https://embed.tawk.to/5e342cfb298c395d1ce589dc/default';
			s1.charset = 'UTF-8';
			s1.setAttribute('crossorigin', '*');
			s0.parentNode.insertBefore(s1, s0);
		})();
	</script>
	<!--End of Tawk.to Script-->

</body>

</html>