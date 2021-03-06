<section class="section-padding" id="project-upload-sec-1" ng-controller="jobController">
	<div class="container">
		<div class="upload-frame">
			<div id="blog-form-div">
				<form id="blog-form" name="jobForm">
					<div class="container-fluid">
						<div class="label-div">
							<h3>Add Jobs <span class="fa fa-upload"></span></h3>
							<div class="label-arr-btn"></div>
						</div>
						<div class="space"></div>
						<div class="space"></div>
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="form-group">
									<div class="form-group">
									<input type="text" name="job_heading" id="job_heading_id" placeholder="Name...." class="form-control" ng-model="job_heading" required>
									<small class="error" ng-show="jobForm.job_heading.$error.required&&jobForm.job_heading.$dirty">Required Field</small>
								</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-12" >
								<select class="form-control" ng-model="job_category" name="job_category" select-validate>
									<option>{{job_category}}</option>
									<option>Catogory 1</option>
									<option>Catogory 2</option>
									<option>Catogory 3</option>
								</select>
								<small class="error" ng-show="jobForm.job_category.$error.required">Required Field</small>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 col-lg-6">
								<div class="form-group">
									<input type="file" name="job_file" class="form-control" ng-model="job_file" valid-file portfolio-valid required>
								</div>
							</div>
							<div class="col-md-6 col-lg-6">
								<div class="form-group">
									<input type="text" name="job_provider_name" class="form-control" ng-model="job_provider_name" placeholder="Your name " required>
								</div>
							</div>
						</div>
						<div class="space"></div>
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12" blog-dir>
								<div class="editor-btn-container">
									<button type="button" class="editor-btn" value="B" onclick="bold(this)">B</button>
									<button type="button" class="editor-btn" value="I" onclick="italic(this)" style="font-style: italic;">I</button>
									<button type="button" class="editor-btn" onclick="link(this)">link</button>
									<!-- <button type="button" class="editor-btn" onclick="heading(this)">Heading 1</button>
									<button type="button" class="editor-btn" onclick="heading2(this)">Heading 2</button> -->
									<select onchange="heading()" id="head">
										<option value="h1">Heading1</option> 
										<option value="h2">Heading2</option>
										<option value="h3">Heading3</option>
										<option value="h4">Heading4</option>
										<option value="h5">Heading5</option>
										<option value="h6">Heading6</option>
									</select>
									<button type="button" class="editor-btn" onclick="jleft(this)"><span class="fa fa-align-left"></span></button>
									<button type="button" class="editor-btn" onclick="jright(this)"><span class="fa fa-align-right"></span></button>
									<button type="button" class="editor-btn" onclick="justify(this)">
										<span class="fa fa-align-justify"></span>
									</button>
									<button type="button" class="editor-btn" onclick="orderlist(this)"><span class="fa fa-list-ol"></span></button>
									<button type="button" class="editor-btn" onclick="unorderlist(this)"><span class="fa fa-list"></span></button>
									<select onchange="fontsize(this)">
										<option ng-repeat="font in fontsize">{{font}}</option>
									</select>
								</div>
								<!-- <button type="button" class="editor-btn" onclick="insertimage()"><span class="fa fa-image"></span></button> -->
								<iframe name="editor" id="editor" width="100%" height="200" class="form-control"></iframe>
							</div>
						</div>
						<div class="space"></div>
						<div class="portfolio_upload_btn text-center">
							<button class="btn btn-lg btn-success" ng-click="onBlogSubmit()" ng-disabled="!jobForm.$valid">Post <span class="fa fa-upload"></span></button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>