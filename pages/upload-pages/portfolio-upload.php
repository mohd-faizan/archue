<section class="section-padding" id="portfolio-upload-sec-1" ng-controller="portfolioUploadController">
	<div class="container">
		<div class="alert alert-info">
		  <strong>Note!</strong> You can Upload file with docx,doc,pdf,ppt and pptx extension
		</div>
		<div class="upload-frame">
			<div id="portfolio-form-div">
				<form id="portfolio-form" name="portfolioForm" ng-submit="submitPortfolio($event.target)"> 
					<div class="container-fluid">
						<div class="label-div">
							<h3>Portfolio &amp; Posrtfolio Case Study Upload <span class="fa fa-upload"></span></h3>
							<div class="label-arr-btn"></div>
						</div>
						<div class="space"></div>
						<div class="space"></div>
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="form-group">
									<input type="text" name="portfolio_name" id="portfolio_name_id" placeholder="Portfolio Name...." class="form-control" ng-model="portfolio_name" required>
									<small class="error" ng-show="portfolioForm.portfolio_name.$error.required&&portfolioForm.portfolio_name.$dirty">Required Field *</small>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="form-group">
									<input type="text" name="portfolio_place" id="portfolio_place_id" placeholder="Place...." class="form-control" ng-model="portfolio_place" required>
									<small class="error" ng-show="portfolioForm.portfolio_place.$error.required&&portfolioForm.portfolio_place.$dirty">Required feild *</small>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="form-group">
									<input type="text" name="portfolio_college" id="portfolio_college_id" placeholder="College...." class="form-control" ng-model="portfolio_college" required>
									<small class="error" ng-show="portfolioForm.portfolio_college.$error.required&&portfolioForm.portfolio_college.$dirty">Required feild *</small>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="form-group">
									<input type="text" name="portfolio_year" id="portfolio_year_id" placeholder="Year...." class="form-control" ng-model="portfolio_year" required>
									<small class="error" ng-show="portfolioForm.portfolio_year.$error.required&&portfolioForm.portfolio_year.$dirty">Required feild *</small>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12">
								<div class="border border-danger p-2">
									<label for="portfolio_file_id">Choose File</label>
									<div class="form-group">
										<input type="file" hidden name="portfolio_file" id="portfolio_file_id" class="form-control"  required ng-model="portfolio_file" valid-file portfolio-valid>
										<small class="error" ng-show="portfolioForm.portfolio_file.$invalid"><span class="fa fa-star"></span>&nbsp;Please choose the valid file type specified in note</small>

									</div>
								</div>
							</div>
						</div>
						<div class="space"></div>
						<div class="portfolio_upload_btn text-center">
							<button class="btn btn-lg btn-success" ng-disabled="!portfolioForm.$valid">Upload <span class="fa fa-upload"></span ></button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>