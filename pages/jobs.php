<div class="space"></div>
<section class="section-padding" id="blog-sec-1" ng-controller="fetchJobController">
	<div class="container-fluid">
		<div class="row" ng-if="jobs">
			<div class="col-lg-9 col-md-7 col-sm-12 my-order">
				<p><a ng-href="./" class="bg-font">Home</a> > <a href="/jobs" class="bg-font">Jobs</a></p>
				<br>
				<div class="blog-container border-bottom mb-4" ng-repeat="job in jobs|limitTo:10">
					<div class="container-fluid">
						<div class="row mb-4 blogs" >
							<div class="col-md-12 col-lg-6 col-sm-12">
								<div class="blog-heading border-bottom border-info show-blog-heading">
									<h3><a ng-href="./job/{{job.job_id}}/{{job.job_heading}}" ng-click="setJob(job)">{{job.job_heading | toUpperCaseFirst}}</a></h3>
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
								<div class="blog-img">
									<a ng-href="./job/{{job.job_id}}/{{job.job_heading}}"><img ng-src="upload-file/{{job.job_file}}" class="img-fluid"></a>
								</div>
							</div>
							<div class="col-md-12 col-lg-6 col-sm-12 " >
								<div class="blog-heading border-bottom border-info hide-blog-heading">
									<h3><a ng-href="./job/{{job.job_id}}/{{job.job_heading}}" ng-click="setJob(job)">{{job.job_heading}}</a></h3>
									<div class="date-time-container">
										<div class="date-time">
											<span class="fa fa-calendar"></span>&nbsp;{{job.job_date|myDate|date:"mediumDate"}}
											<span class="fa fa-clock-o"></span>&nbsp;{{job.job_date|myTime|date:"shortTime"}}
										</div>
										<div class="user">
											<p><span class="fa fa-user"></span> {{job.job_provider_name}}</p>
										</div>
									</div>
								</div>
								<div class="blog-content">
									<div data-ng-bind-html="sanitize(job.job_content)"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="project-share-option">
						<div>
						<a href="" class="fa {{job.like ? 'fa-heart text-danger' : 'fa-heart-o'}}" ng-click = "increaseLike(job.job_id)">&nbsp;{{job.likes}}</a>
									<a href=""><span class="fa fa-eye"></span>&nbsp;{{job.views}}</a>
							<a href=""><span class="fa fa-facebook"
								socialshare
								socialshare-provider="facebook"
								socialshare-type="sharer"
								socialshare-via="167503137442216"
								socialshare-url="https://www.archue.com/job/{{job.job_id}}/{{job.job_heading}}"
								socialshare-redirect-uri="https://archue.com"
								socialshare-popup-height="300"
								socialshare-popup-width="400"
								socialshare-trigger="click"></span></a>
							<a href=""><span class="fa fa-twitter"
								socialshare
								socialshare-provider="twitter"
								socialshare-hashtags="Architect, development, internet"
								socialshare-via="twitter"
								socialshare-text=""
								socialshare-url="https://www.archue.com/job/{{job.job_id}}/{{job.job_heading}}"
								socialshare-popup-height="300"
								socialshare-popup-width="400"
								socialshare-trigger="click"></span></a>
							<a href=""
							socialshare
							socialshare-provider="google"
							socialshare-url="https://www.archue.com/job/{{job.job_id}}/{{job.job_heading}}"
							socialshare-popup-height="300"
							socialshare-popup-width="400"
							socialshare-trigger="click"><span class="fa fa-google-plus"></span></a>
							<a href=""
								socialshare
							socialshare-media="https://www.archue.com/upload-file/{{job.job_file}}"
							socialshare-provider="pinterest"
							socialshare-text="{{job.job_heading}}"
							socialshare-url="https://www.archue.com/job/{{job.job_id}}/{{job.job_heading}}"
							socialshare-popup-height="300"
							socialshare-popup-width="400"
							socialshare-trigger="click"><span class="fa fa-pinterest"></span></a>
							
							<a href=""
							socialshare
							socialshare-provider="tumblr"
							socialshare-type="link"
							socialshare-text="{{job.job_heading}}"
							socialshare-url="https://www.archue.com/job/{{job.job_id}}/{{job.job_heading}}"
							socialshare-popup-height="300"
							socialshare-popup-width="540"
							socialshare-trigger="click"><span class="fa fa-tumblr"></span></a>
							<a href=""
							socialshare
							socialshare-provider="linkedin"
							socialshare-text="{{job.job_heading}}"
							socialshare-url="https://www.archue.com/job/{{job.job_id}}/{{job.job_heading}}"
							socialshare-description="Architect"
							socialshare-source="Archue"
							socialshare-popup-height="300"
							socialshare-popup-width="400"
							socialshare-trigger="click"><span class="fa fa-linkedin"></span></a>
							
						</div>
						<div class="ml-auto">
							<a ng-href="./job/{{job.job_id}}/{{job.job_heading}}" ng-click="setJob(job)">Read More</a>
						</div>
					</div>
				</div>
				<nav aria-label="pagination" class="mt-2" ng-if="(jobs).length > 0">
                            <ul class="pagination justify-content-center">
                                <li class="page-item" ng-class="{'disabled': active === 1}">
                                    <a class="page-link" href="#" tabindex="-1" ng-click="prev()">Previous</a>
                                </li>
                                <li class="page-item" ng-class="{'active': active === ($index +1)}" ng-repeat="page in paginations track by $index"><a class="page-link" href="#" ng-click="toPage($index+1)">{{$index+1}}</a></li>

                                <li class="page-item" ng-class="{'disabled': active === paginations.length}">
                                    <a class="page-link" href="#" ng-click="next()">Next</a>
                                </li>
                            </ul>
                        </nav>
				<div class="alert alert-danger" ng-if="jobs.length == 0">
					No Jobs Found!!
				</div>
			</div>
			<div class="col-lg-3 col-md-5 col-sm-12">
				<div class="recent-post-container">
					<a href="./add-jobs" class="btn btn-primary bg-color border-0">Add Jobs Here</a>
				</div>
			</div>
		</div>
		<div ng-if="!jobs" ng-include="'../include/loader.php'"></div>

	</div>
</section>