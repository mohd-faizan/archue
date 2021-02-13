<section class="section-padding" id="thesis-report-sec-1"  ng-controller="myThesisReportController">
	<div class="home-margin">
		<div class="container-fluid" ng-if="common_thesis_reports">
			<div class="row">
				<div class="col-lg-9 col-md-9 col-sm-12">
					<div class="student-main-div">
						<div class="cur-page-div">
							<a href="/">Archue</a>
							<span class="fa fa-angle-right"></span>
							<a href="/thesis-report">Thesis report</a>
						</div>
						<div class="yellow-line bg-color"></div>
						<div class="space"></div>
						<div class="conntent-div mb-4" ng-repeat="thesis_report in common_thesis_reports">
							<div class="content-box" >
								<div class="content-img">
									<a href="./full-thesis-report/{{thesis_report.thesis_report_id}}/{{thesis_report.thesis_report_college}}/{{thesis_report.url}}" ng-click="setThesisReport(thesis_report)"><img src="image/pdf-icon.png"></a>
								</div>
								<div class="content-data">
									<h5><a href="./full-thesis-report/{{thesis_report.thesis_report_id}}/{{thesis_report.thesis_report_college}}/{{thesis_report.url}}" ng-click="setThesisReport(thesis_report)" class="bg-font">{{thesis_report.thesis_report_name | toUpperCaseFirst}}</a></h5>
									<table>
										<tbody>
											<tr>
												<th>Name</th>
												<td>{{thesis_report.name}}</td>
											</tr>
											<tr>
												<th>College</th>
												<td>{{thesis_report.thesis_report_college}}</td>
											</tr>
											<tr>
												<th>Year</th>
												<td>{{thesis_report.thesis_report_year}}</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
							<div class="project-share-option">
								<div>
								<a href="" ng-click="increaseLike(thesis_report.thesis_report_id)"><span class="fa {{thesis_report.like ? 'fa-heart text-danger' : 'fa-heart-o'}}" ></span>&nbsp;{{thesis_report.likes}}</a>
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
								<div class="ml-auto">
									<a href="./full-thesis-report/{{thesis_report.thesis_report_id}}/{{thesis_report.thesis_report_college}}/{{thesis_report.url}}" ng-click="setThesisReport(thesis_report)">Read More</a>
								</div>
							</div>
						</div>
						<nav aria-label="pagination" ng-if="(common_thesis_reports).length > 0">
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
					</div>
				</div>
				<div class="col-md-3 pr-0">
					<div ng-include="'include/sidematerial.php'" style="margin-top:-3rem"></div>
				</div>
			</div>
		</div>
		<p ng-if="!common_thesis_reports">Loading...</p>
	</div>
</section>
