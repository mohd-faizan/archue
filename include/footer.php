<footer id="footer" class="">
	<a class="comp-name bg-color" href="./"><img src="image/logo.png" width="80" height="50"></a>
	<div class="space"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-12 footer-about-padd">
				<h4 class="white-font">About Us</h4>
				<div class="about-us-text">
					<p class="p-text">
						We believe that knowledge should not be limited to certain boundaries. 
					</p>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-12">
				<div class="text-center">
					<h4 class="white-font">Reach Us</h4>
					<div class="social-icon-div">
						<a href="#" class="icon" id="fb-icon"><span class="fa fa-2x fa-facebook"></span></a>
						<a href="#" class="icon" id="twitter-icon"><span class="fa fa-2x fa-twitter"></span></a>
						<a href="#" class="icon" id="insta-icon"><span class="fa fa-2x fa-instagram"></span></a>
						<a href="#" class="icon" id="pint-icon"><span class="fa fa-2x fa-pinterest"></span></a>
						<a href="#" class="icon" id="pint-icon"><span class="fa fa-2x fa-google-plus"></span></a>
						<a href="#" class="icon" id="pint-icon"><span class="fa fa-2x fa-linkedin"></span></a>
						<a href="#" class="icon" id="pint-icon"><span class="fa fa-2x fa-tumblr"></span></a>
					</div>
				</div>
				<div class="space"></div>
				
			</div>
		</div>
		<div class="space"></div>
		<div class="footer-link pb-4">
			
			<div><a href="./contact" target="_self">Contact Us</a></div>
			<div><a href="#">Term &amp; Conditions</a></div>
		</div>
	</div>
	<section id="copy-right">
		<div class="copy-right-container">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<p class="text-white pt-3">&copy;2018 Archue allright reserved</p>
					</div>
					<div class="col-md-6">
						<p class="text-white pt-3">Designed &amp; Developed By <a href="https://www.wampinfotech.com" class="bg-font">wampinfotech.com</a></p>
					</div>
				</div>
			</div>
		</div>
	</section>
</footer>
<section id="image-viewer" ng-if="isShowViewImage">
	<div class="my-image-container" ng-controller="fetchImageController" image-viewer>
		<div class="images">
			<img ng-src="uploads/{{images[0]}}" class="img-fluid">
			<div class="small-images-view" >
				<img ng-src="uploads/{{image}}" class="img-fluid" ng-repeat="image in images track by $index">
			</div>
			<button ng-click="upSetImageView()" class="btn btn-danger">Close</button>
		</div>
	</div>
</section>

<script type="text/javascript" src="js/fetch-service.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
<script type="text/javascript" src="js/controller.js"></script>
<script type="text/javascript" src="js/service.js"></script>
<script type="text/javascript" src="js/directive.js"></script>
<script type="text/javascript" src="js/route.js"></script>
<script type="text/javascript" src="js/upload-controller.js"></script>
<script type="text/javascript" src="js/fetch-controller.js"></script>
<script type="text/javascript" src="js/upload-service.js"></script>
<script type="text/javascript" src="js/upload-directive.js"></script>
