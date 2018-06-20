<div class="space"></div>
<section class="section-padding" id="blog-sec-1" ng-controller="fetchJobController">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-9 col-md-7 col-sm-12">
				<div class="blog-container border-bottom border-dark p-3" ng-repeat="job in jobs|limitTo:10">
					<div class="container-fluid">
						<div class="row" >
							<div class="col-md-12 col-lg-6 col-sm-12">
								<div class="blog-img">
									<img ng-src="upload-file/{{job.job_file}}" class="img-fluid">
								</div>
							</div>
							<div class="col-md-12 col-lg-6 col-sm-12 " >
								<div class="blog-heading border-bottom border-info ">
									<h3>{{job.job_heading}}</h3>
									<div class="date-time-container">
										<div class="date-time">
											<span class="fa fa-calendar"></span>&nbsp;{{job.job_date|myDate|date:"mediumDate"}}
											<span class="fa fa-clock-o"></span>&nbsp;{{job.job_date|myTime|date:"mediumTime"}}
										</div>
										<div class="user">
											<p><span class="fa fa-user"></span> {{job.job_provider_name}}</p>
										</div>
									</div>
								</div>
								<div class="blog-content">
									<div data-ng-bind-html="sanitize(job.job_content)">
										
									</div>
								</div>
								<div class="continue-btn pull-right">
									<a ng-href="./job/{{job.job_heading}}" ng-click="setJob(job)">Continue Reading <span class="fa fa-long-arrow-right"></span></a>
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
					<a href="./add-jobs" class="btn btn-primary bg-color border-0">Add Jobs Here</a>
				</div>
			</div>
		</div>
	</div>
</section>