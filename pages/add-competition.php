<section class="section-padding" id="project-upload-sec-1" ng-controller="competitionController">
	<div class="container">
		<div class="competition-frame">
			<div id="blog-form-div">
				<form id="blog-form" name="competitionForm">
					<div class="container-fluid">
						<div class="label-div">
							<h3>Add Competition <span class="fa fa-upload"></span></h3>
							<div class="label-arr-btn"></div>
						</div>
						<div class="space"></div>
						<div class="space"></div>
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="form-group text-left">
									<div class="form-group">
									<input type="text" name="competition_heading" id="competition_heading_id" placeholder="Competition title" class="form-control" ng-model="competitorData.competition_heading" required>
									<small class="error" ng-show="competitionForm.competition_heading.$error.required&&competitionForm.competition_heading.$dirty">Required Field</small>
								</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-12" >
								<select class="form-control" ng-model="competitorData.competition_category" name="competition_category" select-validate>
									<option value="" disabled>Select Category</option>
									<option ng-repeat="category in categories">{{ category }}</option>
								</select>
								<small class="error" ng-show="competitionForm.competition_category.$error.required">Required Field</small>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 col-lg-6">
								<div class="form-group text-left">
									<input type="file" name="competition_file" class="form-control" ng-model="competitorData.competition_file" valid-file portfolio-valid required>
								</div>
							</div>
							<div class="col-md-6 col-lg-6">
								<div class="form-group text-left">
									<input type="email" name="competitor_name" class="form-control" ng-model="competitorData.competitor_name"  required email placeholder="Email*">
									<small class="error" ng-show="competitionForm.competitor_name.$error.required && competitionForm.competitor_name.$dirty">Required Field</small>
									<small class="error" ng-show="competitionForm.competitor_name.$error.email && competitionForm.competitor_name.$dirty">Enter Valid email</small>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 col-lg-6">
								<div class="form-group text-left">
									<input min="{{ minDate }}" type="text" onfocusout="(this.type='text')" onfocusin="(this.type='date')" id="competitor_reg_deadline_id" name="competitor_reg_deadline" class="form-control" ng-model="competitorData.competitor_reg_deadline" placeholder="Registration deadline" required>
									<small class="error" ng-show="competitionForm.competitor_reg_deadline.$error.required&&competitionForm.competitor_reg_deadline.$dirty">Required Field</small>
								</div>
							</div>
							<div class="col-md-6 col-lg-6">
								<div class="form-group text-left">
									<input min="{{ minDate }}" type="text" onfocusout="(this.type='text')" onfocusin="(this.type='date')" id="competitor_sub_deadline_id" name="competitor_sub_deadline" class="form-control" ng-model="competitorData.competitor_sub_deadline"  required placeholder="Submission deadline">
									<small class="error" ng-show="competitionForm.competitor_sub_deadline.$error.required&&competitionForm.competitor_sub_deadline.$dirty">Required Field</small>
								</div>
							</div>
						</div>
						<div class="space"></div>
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 text-left" blog-dir>

								<!-- The toolbar will be rendered in this container. -->
							    <div id="toolbar-container"></div>

							    <!-- This container will become the editable. -->
							    <div id="editor">
							        <p>Write Your Competition here.</p>
							    </div>
							</div>
						</div>
						<div class="space"></div>
						<div class="space"></div>
						<div class="row">
							<div class="col-md-12 col-sm-12">
								<div class="form-check text-left">
									<label class="form-check-label">
									<input type="checkbox" class="form-check-input" name="remember"  ng-model="competitorData.advertise">
									Advertiseme your competition for one month with a flat fee of $150 for one month 
									</label>
								</div>
								<div class="form-check text-left">
									<label class="form-check-label">
									<input type="checkbox" class="form-check-input" name="agree" checked>
									I am agree with <a href="terms-and-conditions" class="bg-font">terms and conditions</a>
									</label>
								</div>
							</div>
						</div>
						<div class="space"></div>
						<div class="portfolio_upload_btn text-center">
							<button class="btn btn-lg btn-success" ng-click="onBlogSubmit()" ng-disabled="!competitionForm.$valid">Post <span class="fa fa-upload"></span></button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="loader" ng-if="isShowLoad">
		<div class="load-container">
			<p align="center"><b>Uploading..</b></p>
			<img src="image/loader.gif">
		</div>
	</div>
</section>
