<div class="space"></div>
<section id="full-thesis-report-sec-1" ng-controller="fullThesisReportCtrl">
	<div class="container">
		<div class="mb-4">
			<button class="btn btn-danger" ng-click="del(thesis_report.thesis_report_id)">DELETE THIS THESIS REPORT</button>
		</div>
		<div class="row">
			<div class="col-lg-3 col-md-3 col-sm-12">
				<div class="file-details">
					<div class="content-data">
						<h5>{{thesis_report.thesis_report_name}}</h5>
						<p class="p-text">{{thesis_report.thesis_report_place}}</p>
					</div>
				</div>
				
			</div>
			<div class="col-lg-9 col-md-9 col-sm-12">
				<iframe ng-src="{{url}}" width="100%" height="800px"></iframe>
			</div>
		</div>
	</div>
</section>