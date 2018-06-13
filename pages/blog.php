<div class="space"></div>
<section class="section-padding" id="blog-sec-1" ng-controller="fetchBlogController">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-9 col-md-7 col-sm-12">
				<div class="blog-container border-bottom border-dark p-3">
					<div class="container-fluid">
						<div class="row" ng-repeat="blog in blogs|limitTo:10">
							<div class="col-md-12 col-lg-6 col-sm-12">
								<div class="blog-img">
									<img ng-src="upload-file/{{blog.blog_file}}" class="img-fluid">
								</div>
							</div>
							<div class="col-md-12 col-lg-6 col-sm-12 " >
								<div class="blog-heading border-bottom border-info ">
									<h3>{{blog.heading}}</h3>
									<div class="date-time">
										<span class="fa fa-calendar"></span>&nbsp;{{blog.blog_date}}
										<span class="fa fa-clock-o"></span>&nbsp;{{blog.blog_time}}
									</div>
								</div>
								<div class="blog-content">
									<div ng-bind-html="trust(blog.html_content)">
										
									</div>
								</div>
								<div class="continue-btn pull-right">
									<a ng-href="./blogs/{{blog.blog_id}}/{{blog.heading}}" ng-click="setBlog(blog)">Continue Reading <span class="fa fa-long-arrow-right"></span></a>
								</div>
							</div>
						</div>
					</div>	
				</div>
			</div>
			<div class="col-lg-3 col-md-5 col-sm-12">
				<!-- <div class="connect-us-container">
					<div class="head">
						<div class="head-text">
							<h4>Connect With Us</h4>
						</div>
						<div class="social-icon-div">
							<a href="#" class="icon" id="fb-icon"><span class="fa fa-facebook"></span></a>
							<a href="#" class="icon" id="twitter-icon"><span class="fa fa-twitter"></span></a>
							<a href="#" class="icon" id="insta-icon"><span class="fa fa-instagram"></span></a>
							<a href="#" class="icon" id="pint-icon"><span class="fa fa-pinterest"></span></a>
							<a href="#" class="icon" id="pint-icon"><span class="fa fa-google-plus"></span></a>
							<a href="#" class="icon" id="pint-icon"><span class="fa fa-linkedin"></span></a>
							<a href="#" class="icon" id="pint-icon"><span class="fa fa-tumblr"></span></a>
						</div>
					</div>
				</div> -->
				<div class="recent-post-container">
					<div class="head">
						<div class="head-text">
							<h4>Recent Post</h4>	
						</div>
						<div class="recent-post-content">
							<a href="#" ng-repeat="blog in blogs|limitTo:13:10  as filtered" ng-show="filtered.length!=0">{{blog.heading}}</a>
							<div ng-show="filtered.length==0">
								No recent post
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>