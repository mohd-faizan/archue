<section class="section-padding" id="project-upload-sec-1" ng-controller="thesisUploadController">
	<div class="container">
		<div class="alert alert-info">
		  <strong>Note!</strong> You can Upload images( jpeg,png,jpg) 
		</div>
		<div class="upload-frame">
			<div id="thesis-form-div">
				<form id="thesis-form" name="thesisForm" ng-submit="uploadThesis($event.target)">
					<div class="container-fluid">
						<div class="label-div">
							<h3>Thesis Upload <span class="fa fa-upload"></span></h3>
							<div class="label-arr-btn"></div>
						</div>
						<div class="space"></div>
						<div class="space"></div>
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="form-group">
									<input type="text" name="thesis_name" id="thesis_name_id" placeholder="Name...." class="form-control" ng-model="thesis_name" required>
									<small class="error"  ng-show="thesisForm.thesis_name.$error.required&&thesisForm.thesis_name.$dirty">Required Fields</small>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="form-group">
									<input type="text" name="thesis_title" id="thesis_title_id" placeholder="Title...." class="form-control" ng-model="thesis_title" required>
									<small class="error" ng-show="thesisForm.thesis_title.$error.required&&thesisForm.thesis_title.$dirty">Required Field</small>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="form-group">
									<input type="text" name="thesis_location" id="thesis_location_id" placeholder="Location...." class="form-control" ng-model="thesis_location" required>
									<small class="error" ng-show="thesisForm.thesis_location.$error.required&&thesisForm.thesis_location.$dirty">Required field</small>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="form-group">
									<input type="text" name="thesis_area" id="thesis_area_id" placeholder="Area...." class="form-control" ng-model="thesis_area" required>
									<small class="error" ng-show="thesisForm.thesis_area.$error.required&&thesisForm.thesis_area.$dirty">Required Filed</small>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="form-group">
									<input type="text" name="thesis_year" id="thesis_year_id" placeholder="Thesis Year...." class="form-control" ng-model="thesis_year" required>
									<small class="error" ng-show="thesisForm.thesis_year.$error.required&&thesisForm.thesis_year.$dirty"></small>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="form-group">
									<input type="text" name="thesis_ins" id="thesis_ins_id" placeholder="Institute/Firm...." class="form-control" ng-model="thesis_ins" required>
									<small class="error" ng-show="thesisForm.thesis_ins.$error.required&&thesisForm.thesis_ins.$dirty">Required field</small>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="form-group">
									<input type="text" name="thesis_guide" id="thesis_guide_id" placeholder="Thesis Guide...." class="form-control" ng-model="thesis_guide" required>
									<small class="error" ng-show="thesisForm.thesis_guide.$error.required&&thesisForm.thesis_guide.$dirty">Required Field</small>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-12">
								<select id="thesis_proj_type_id" class="form-control" name="thesis_proj_type" ng-model="thesis_proj_type" required>
									<option>{{thesis_proj_type}}</option>
									<option ng-repeat="project in projects|orderBy:project track by $index">{{project}}</option>
									
								</select>
							</div>
						</div>
						<div class="space"></div>
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12">
								<div class="border border-primary p-2">
									<label for="case_study_id">Case study sheet</label>
									<div class="form-group">
										<input type="file" hidden name="case_study" id="case_study_id" class="form-control" ng-model="case_study" required valid-file ng-file>
									</div>
									<div class="up-images">
										<div class="images" ng-repeat="image in images1 track by $index">
											<img  ng-src="{{image}}" width="100%">
											<button type="button" ng-click="removeImage(images1,uploadfiles1,$index)">X</button>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="space"></div>
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12">
								<div class="border border-primary p-2">
									<label for="concept_sheet_id">Concept sheet</label>
									<div class="form-group">
										<input type="file" hidden name="concept_sheet" id="concept_sheet_id" class="form-control" ng-model="concept_sheet" valid-file ng-file2 required>
									</div>
									<div class="up-images">
										<div class="images" ng-repeat="image in images2 track by $index">
											<img  ng-src="{{image}}" width="100%">
											<button type="button" ng-click="removeImage(images2,uploadfiles2,$index)">X</button>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="space"></div>
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12">
								<div class="border border-primary p-2">
									<label for="site_plan_id">Site plan</label>
									<div class="form-group">
										<input type="file" hidden name="site_plan" id="site_plan_id" class="form-control" ng-model="site_plan" valid-file ng-file3 required>
									</div>
									<div class="up-images">
										<div class="images" ng-repeat="image in images3 track by $index">
											<img  ng-src="{{image}}" width="100%">
											<button type="button" ng-click="removeImage(images3,uploadfiles3,$index)">X</button>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="space"></div>
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12">
								<div class="border border-primary p-2">
									<label for="plan_id">Plan</label>
									<div class="form-group">
										<input type="file" hidden name="plan" id="plan_id" class="form-control" ng-model="plan" valid-file ng-file4 required>
									</div>
									<div class="up-images">
										<div class="images" ng-repeat="image in images4 track by $index">
											<img  ng-src="{{image}}" width="100%">
											<button type="button" ng-click="removeImage(images4,uploadfiles4,$index)">X</button>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12">
								<div class="border border-primary p-2">
									<label for="elevation_id">Elevation/Section</label>
									<div class="form-group">
										<input type="file" hidden name="elevation" id="elevation_id" class="form-control" ng-model="elevation" valid-file ng-file5  required>
									</div>
									<div class="up-images">
										<div class="images" ng-repeat="image in images5 track by $index">
											<img  ng-src="{{image}}" width="100%">
											<button type="button" ng-click="removeImage(images5,uploadfiles5,$index)">X</button>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="space"></div>
						<div class="thesis_upload_btn text-center">
							<button class="btn btn-lg btn-success" ng-disabled="!thesisForm.$valid">Upload <span class="fa fa-upload"></span></button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>