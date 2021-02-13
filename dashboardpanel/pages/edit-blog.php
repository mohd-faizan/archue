<section class="section-padding" id="project-upload-sec-1" ng-controller="editBlogController">
	<div class="container">
		<div class="upload-frame">
			<div id="blog-form-div">
				<form id="blog-form" name="blogForm">
					<div class="container-fluid">
						<div class="label-div">
							<h3>Post Blog <span class="fa fa-upload"></span></h3>
							<div class="label-arr-btn"></div>
						</div>
						<div class="space"></div>
						<div class="space"></div>
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="form-group">
									<div class="form-group">
										<input type="text" name="blog_heading" id="blog_heading_id"
											placeholder="Title...." class="form-control" ng-model="blog.heading"
											required>
										<small class="error"
											ng-show="blogForm.blog_heading.$error.required&&blogForm.blog_heading.$dirty">Required
											Field</small>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-12">
								<select class="form-control" ng-model="blog.category" name="blog_category"
									select-validate>
									<option>{{blog.category}}</option>
									<option>Architecture</option>
									<option>Enviromental/Social/Cultural</option>
									<option>Others</option>
								</select>
								<small class="error" ng-show="blogForm.blog_category.$error.required">Required
									Field</small>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 col-lg-12">
								<div class="form-group">
									<input type="file" name="blog_file" class="form-control" ng-model="blog_file"
										valid-file portfolio-valid required>
									<p>{{blog_file|getName}}</p>
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
								</div>

							</div>
						</div>
						<div class="space"></div>
						<div class="portfolio_upload_btn text-center">
							<button class="btn btn-lg btn-success" ng-click="onBlogSubmit()"
								ng-disabled="!blogForm.$valid" ng-class="{'disable':!blogForm.$valid}">Post <span
									class="fa fa-upload"></span></button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	
</section>