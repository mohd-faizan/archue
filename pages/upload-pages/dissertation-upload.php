<section class="section-padding" id="project-upload-sec-1" ng-controller="dessertationController">
	<div class="container">
		<div class="alert alert-info">
		  <strong>Note!</strong> You can Upload pdf/docx only
		</div>
		<div class="upload-frame">
			<div id="dissertation-form-div">
				<form  name="dessertationForm" ng-submit="submitDesertation($event.target)">
					<div class="container-fluid">
						<div class="label-div">
							<h3>Dissertation Upload <span class="fa fa-upload"></span></h3>
							<div class="label-arr-btn"></div>
						</div>
						<div class="space"></div>
						<div class="space"></div>
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="form-group">
									<input type="text" name="dissertation_name" id="dissertation_name_id" placeholder="Name...." class="form-control" required ng-model="dissertation_name">
									<small class="error" ng-show="dessertationForm.dissertation_name.$error.required&&dessertationForm.dissertation_name.$dirty">Required Fields *</small>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="form-group">
									<input type="text" name="dissertation_place" id="dissertation_place_id" placeholder="Place...." class="form-control" required ng-model="dissertation_place">
									<small class="error" ng-show="dessertationForm.dissertation_place.$error.required&&dessertationForm.dissertation_place.$dirty">Required Filed *</small>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="form-group">
									<input type="text" name="dissertation_college" id="dissertation_college_id" placeholder="College...." class="form-control" required ng-model="dissertation_college">
									<small class="error" ng-show="dessertationForm.dissertation_college.$error.required&&dessertationForm.dissertation_college.$dirty">Required Field</small>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="form-group">
									<input type="text" name="dissertation_year" id="dissertation_year_id" placeholder="Year...." class="form-control" required ng-model="dissertation_year">
									<small class="error" ng-show="dessertationForm.dissertation_year.$error.required&&dessertationForm.dissertation_year.$dirty">Required Field</small>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12">
								<div class="border border-danger p-2">
									<label for="dissertation_file_id">Choose File</label>
									<div class="form-group">
										<input type="file" hidden name="dissertation_file" id="dissertation_file_id" class="form-control" required ng-model="dissertation_file" valid-file portfolio-valid>
										<small class="error" ng-show="dessertationForm.dissertation_file.$invalid">Required Feild</small>
									</div>
								</div>
							</div>
						</div>
						<div class="space"></div>
						<div class="portfolio_upload_btn text-center">
							<button class="btn btn-lg btn-success" ng-disabled="!dessertationForm.$valid">Upload <span class="fa fa-upload"></span></button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>