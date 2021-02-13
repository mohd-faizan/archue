<div my-nav></div>
<section class="section-padding" id="thesis-report-sec-1" ng-controller="fetchThesisReportController">
	<div class="home-margin">
		<button class="btn" ng-click="isShowUnApprove()" ng-class="{'btn-primary':!isShowApprove}">SEE APPROVE PORTFOLIO</button>
		<button class="btn" ng-click="isShowsApprove()" ng-class="{'btn-primary':isShowApprove}">SEE UNAPPROVE PORTFOLIO</button>

		<div class="space"></div>
		<div class="container-fluid">
			<div class="row">
				<div class="conntent-div mb-4 col-md-4 p-2" ng-if="thesis_report.thesis_report_approve==0" ng-show="isShowApprove" ng-repeat="thesis_report in common_thesis_reports">
					<p><b>Uploaded By:</b>{{thesis_report.name}}</p>
					<div class="content-box" >
						<div class="content-img">
							<a href="./full-thesis-report/{{thesis_report.thesis_report_name}}" ng-click="setThesisReport(thesis_report)"><img src="../image/pdf-icon.png"></a>
						</div>
						<div class="content-data">
							<h5><a href="./full-thesis-report/{{thesis_report.thesis_report_name}}" ng-click="setThesisReport(thesis_report)" class="text-dark">{{thesis_report.thesis_report_name}}</a></h5>
							<p class="p-text">{{thesis_report.thesis_report_place}}</p>
							<div class="file-link pull-right">
								<a href="./full-thesis-report/{{thesis_report.thesis_report_name}}" ng-click="setThesisReport(thesis_report)">Show thesis-report <span class="fa fa-long-arrow-right"></span></a>
							</div>
						</div>
					</div>
				</div>
				<div class="conntent-div mb-4 col-md-4 p-2" ng-if="thesis_report.thesis_report_approve==1" ng-show="!isShowApprove" ng-repeat="thesis_report in common_thesis_reports">
					<p><b>Uploaded By:</b>{{thesis_report.name}}</p>
					<div class="content-box" >
						<div class="content-img">
							<a href="./full-thesis-report/{{thesis_report.thesis_report_name}}" ng-click="setThesisReport(thesis_report)"><img src="../image/pdf-icon.png"></a>
						</div>
						<div class="content-data">
							<h5><a href="./full-thesis-report/{{thesis_report.thesis_report_name}}" ng-click="setThesisReport(thesis_report)" class="text-dark">{{thesis_report.thesis_report_name}}</a></h5>
							<p class="p-text">{{thesis_report.thesis_report_place}}</p>
							<div class="file-link pull-right">
								<a href="./full-thesis-report/{{thesis_report.thesis_report_name}}" ng-click="setThesisReport(thesis_report)">Show thesis-report <span class="fa fa-long-arrow-right"></span></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
