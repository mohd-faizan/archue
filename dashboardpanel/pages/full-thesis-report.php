<div my-nav></div>
<div class="space"></div>
<section id="full-thesis-report-sec-1" ng-controller="fullThesisReportCtrl">
	<div class="container">
		<div class="mb-4 mt-6">
			<button class="btn btn-danger" ng-click="del(thesis_report.thesis_report_id)">DELETE THIS THESIS REPORT</button>
			<button class="btn btn-primary" ng-click="approve(thesis_report.thesis_report_id)" ng-if="thesis_report.thesis_report_approve==0">APPROVE THIS THESIS REPORT</button>
		</div>
		<div class="row">
			<div class="col-lg-3 col-md-3 col-sm-12">
				<div class="file-details">
					<div class="content-data">
						
						<h5>{{thesis_report.thesis_report_name }}</h5>
						<!-- <p class="p-text">{{thesis_report.thesis_report_place}}</p> -->
						<p><b>Name</b>&nbsp;&nbsp;{{thesis_report.name}}</p>
						<p><b>College</b>&nbsp;&nbsp;{{thesis_report.thesis_report_college}}</p>
						<p><b>Year</b>&nbsp;&nbsp;{{thesis_report.thesis_report_year}}</p>
					</div>
				</div>
				
			</div>
			<div class="col-lg-9 col-md-9 col-sm-12">
				<iframe ng-src="{{url}}" width="100%" height="800px"></iframe>
			</div>
		</div>
	</div>
</section>