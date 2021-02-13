<div class="space"></div>
<section id="full-thesis-report-sec-1" ng-controller="fullThesisReportCtrl">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-3 col-sm-12">
				<div class="file-details">
					<div class="content-data">
						<h5>{{thesis_report.thesis_report_name | toUpperCaseFirst}}</h5>
						<!-- <p class="p-text">{{thesis_report.thesis_report_place}}</p> -->
						<p><b>Name</b>&nbsp;&nbsp;{{thesis_report.name}}</p>
						<p><b>College</b>&nbsp;&nbsp;{{thesis_report.thesis_report_college}}</p>
						<p><b>Year</b>&nbsp;&nbsp;{{thesis_report.thesis_report_year}}</p>
					</div>
				</div>
				<div class="advertisement-div">
					<div class="blog-header material-bg">
						<h3 class="home-page-heading">Similar Thesis Report</h2>
					</div>
					<div class="sm-blog-container" ng-repeat="similarThesis in similarThesises">
						<div class="link">
							<a href="./full-thesis-report/{{similarThesis.thesis_report_id}}/{{similarThesis.thesis_report_college}}/{{similarThesis.url}}" ng-click="setThesisReport(similarThesis)">
							{{similarThesis.thesis_report_file}}
							</a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-9 col-md-9 col-sm-12">
				<div class="project-share-option">
					<div>
					<a href="" ng-click="increaseLike()"><span class="fa {{thesis_report.like ? 'fa-heart text-danger' : 'fa-heart-o'}}" ></span>&nbsp;{{thesis_report.likes}}</a>
									<a href=""><span class="fa fa-eye"></span>&nbsp;{{thesis_report.views}}</a>

						<!-- ==================================== -->
						<a href=""><span class="fa fa-facebook"
							socialshare
							socialshare-provider="facebook"
							socialshare-type="sharer"
							socialshare-via="167503137442216"
							socialshare-url="https://www.archue.com/full-thesis-report/{{thesis_report.thesis_report_id}}/{{thesis_report.thesis_report_college}}/{{thesis_report.url}}"
							socialshare-redirect-uri=""
							socialshare-popup-height="450"
							socialshare-popup-width="350"
							socialshare-trigger="click"></span></a>
						
						<a href=""><span class="fa fa-twitter"
							socialshare
							socialshare-provider="twitter"
							socialshare-hashtags="Architect, Development, Thesis"
							socialshare-via="twitter"
							socialshare-text=""
							socialshare-url="https://www.archue.com/full-thesis-report/{{thesis_report.thesis_report_id}}/{{thesis_report.thesis_report_college}}/{{thesis_report.url}}"
							socialshare-popup-height="450"
							socialshare-popup-width="350"
							socialshare-trigger="click"></span></a>
						
						<a href=""
							socialshare
							socialshare-provider="google"
							socialshare-url="https://www.archue.com/full-thesis-report/{{thesis_report.thesis_report_id}}/{{thesis_report.thesis_report_college}}/{{thesis_report.url}}"
							socialshare-popup-height="450"
							socialshare-popup-width="350"
							socialshare-trigger="click"><span class="fa fa-google-plus"></span></a>
						
						<a href=""
							socialshare
							socialshare-media="https://www.archue.com/image/pdf-icon.png"
							socialshare-provider="pinterest"
							socialshare-text="{{thesis_report.thesis_report_name}}"
							socialshare-url="https://www.archue.com/full-thesis-report/{{thesis_report.thesis_report_id}}/{{thesis_report.thesis_report_college}}/{{thesis_report.url}}"
							socialshare-popup-height="450"
							socialshare-popup-width="350"
							socialshare-trigger="click"><span class="fa fa-pinterest"></span></a>

						<a href=""
							socialshare
							socialshare-provider="tumblr"
							socialshare-media="https://www.archue.com/image/pdf-icon.png"
							socialshare-text="{{thesis_report.thesis_report_name}}"
							socialshare-url="https://www.archue.com/full-thesis-report/{{thesis_report.thesis_report_id}}/{{thesis_report.thesis_report_college}}/{{thesis_report.url}}"
							socialshare-popup-height="450"
							socialshare-popup-width="350"
							socialshare-trigger="click"><span class="fa fa-tumblr"></span></a>
						
						<a href=""
							socialshare
							socialshare-provider="linkedin"
							socialshare-url="https://www.archue.com/full-thesis-report/{{thesis_report.thesis_report_id}}/{{thesis_report.thesis_report_college}}/{{thesis_report.url}}"
							socialshare-text="{{thesis_report.thesis_report_name}}"
							socialshare-description=""
							socialshare-source="https://www.archue.com/full-thesis-report/{{thesis_report.thesis_report_id}}/{{thesis_report.thesis_report_college}}/{{thesis_report.url}}"
							socialshare-popup-height="450"
							socialshare-popup-width="350"
							socialshare-trigger="click"><span class="fa fa-linkedin"></span></a>
					</div>
				</div>
				<br>
				<iframe class="iframe-loader" ng-src="{{url}}" width="100%" height="800px"></iframe>
			</div>
		</div>
	</div>
</section>


