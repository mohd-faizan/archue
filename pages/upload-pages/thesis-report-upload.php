<section class="section-padding" id="project-upload-sec-1" ng-controller="thesisReportController">
	<div class="container">
		<div class="alert alert-info">
		  <strong>Note!</strong> You can Upload pdf/docx file
		</div>
		<div class="upload-frame">
			<div id="thesis-report-form-div">
				<form id="thesis-report-form" name="thesisReportForm" ng-submit="submitThesisReport($event.target)">
					<div class="container-fluid">
						<div class="label-div">
							<h3>Thesis Report Upload <span class="fa fa-upload"></span></h3>
							<div class="label-arr-btn"></div>
						</div>
						<div class="space"></div>
						<div class="space"></div>
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="form-group">
									<input type="text" name="thesis_report_name" id="thesis_report_name_id" placeholder="Title...." class="form-control" ng-model="thesis_report_name" required>
									<small class="error" ng-show="thesisReportForm.thesis_report_name.$error.required&&thesisReportForm.thesis_report_name.$dirty">Required ield</small>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="form-group">
									<input type="text" name="thesis_report_place" id="thesis_report_place_id" placeholder="Place...." class="form-control" ng-model="thesis_report_place" required>
									<small class="error" ng-show="thesisReportForm.thesis_report_place.$error.required&&thesisReportForm.thesis_report_place.$dirty">Required Feild</small>
								</div> 
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="form-group">
									<input type="text" name="thesis_report_college" id="thesis_report_college_id" placeholder="College...." class="form-control" required ng-model="thesis_report_college">
									<small class="error" ng-show="thesisReportForm.thesis_report_college.$error.required&&thesisReportForm.thesis_report_college.$dirty">Required Field</small>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="form-group">
									<input type="number" name="thesis_report_year" id="thesis_report_year_id" placeholder="Year...." class="form-control" required ng-model="thesis_report_year">
									<small class="error" ng-show="thesisReportForm.thesis_report_year.$error.required&&thesisReportForm.thesis_report_year.$dirty">Required Field</small>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12">
								<div class="border border-danger p-2">
									<div class="form-group">
										<label for="thesis_report_file_id">Choose File</label>
										<input type="file" hidden name="thesis_report_file" id="thesis_report_file_id" class="form-control"  ng-model="thesis_report_file" required valid-file portfolio-valid accept=".pdf,.docx">
										<small class="error" ng-show="thesisReportForm.thesis_report_file.$invalid">Required File</small>
										<p>{{thesis_report_file|getName}}</p>
									</div>
								</div>
							</div>
						</div>
						<div class="space"></div>
						<div class="thesis_report_upload_btn text-center">
							<button class="btn btn-lg btn-success" ng-class="{'disable':!thesisReportForm.$valid}" ng-disabled="!thesisReportForm.$valid">Upload <span class="fa fa-upload" ></span></button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="loader" ng-if="isLoad">
		<div class="load-container">
			<p align="center"><b>Uploading..</b></p>
			<p align="center"><b>It may take some time</b></p>
			<img src="image/loader.gif">
		</div>
	</div>
	<?php include("../../include/thanksmodal.php") ?>
</section>