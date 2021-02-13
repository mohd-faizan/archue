<div my-nav></div>
<section class="section-padding" id="blog-sec-1" ng-controller="fetchJobController">
	<div class="home-margin">
		<button class="btn" ng-click="isShowUnApprove()" ng-class="{'btn-primary':!isShowApprove}">SEE APPROVE JOBS</button>
		<button class="btn" ng-click="isShowsApprove()" ng-class="{'btn-primary':isShowApprove}">SEE UNAPPROVE JOBS</button>
		
		<div class="space"></div>
		<div class="container-fluid">
			<div class="row">
				<div ng-if="job.is_approve==0" ng-show="isShowApprove" class="mb-5 col-md-4 border border-dark p-2" ng-repeat="job in jobs|limitTo:10 track by $index">
					<p><b>Uploaded By:</b>{{job.job_provider_name}}</p>
					<a ng-href="./job/{{job.job_id}}/{{job.job_heading}}" ng-click="setJob(job)" class="blog-img">
						<img ng-src="../upload-file/{{job.job_file}}" class="img-fluid">
					</a>
					<div class="blog-heading border-bottom border-info ">
						<div class="date-time">
							<span class="fa fa-calendar"></span>&nbsp;{{job.job_date}}
						</div>
					</div>
					<div class="blog-content">
						<div ng-bind-html="sanitize(job.job_content)"></div>
					</div>
					<div class="continue-btn pull-right">
						<a ng-href="./job/{{job.job_id}}/{{job.job_heading}}" ng-click="setJob(job)">Continue Reading <span class="fa fa-long-arrow-right"></span></a>
					</div>
				</div>
				<div ng-if="job.is_approve==1" ng-show="!isShowApprove" class="mb-5 col-md-4 border border-dark p-2" ng-repeat="job in jobs|limitTo:10 track by $index">
					<p><b>Uploaded By:</b>{{job.job_provider_name}}</p>
					<a ng-href="./job/{{job.job_id}}/{{job.job_heading}}" ng-click="setJob(job)" class="blog-img">
						<img ng-src="../upload-file/{{job.job_file}}" class="img-fluid">
					</a>
					<div class="blog-heading border-bottom border-info ">
						<div class="date-time">
							<span class="fa fa-calendar"></span>&nbsp;{{job.job_date}}
						</div>
					</div>
					<div class="blog-content">
						<div ng-bind-html="sanitize(job.job_content)"></div>
					</div>
					<div class="continue-btn pull-right">
						<a ng-href="./job/{{job.job_id}}/{{job.job_heading}}" ng-click="setJob(job)">Continue Reading <span class="fa fa-long-arrow-right"></span></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>