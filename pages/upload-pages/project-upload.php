
<section class="section-padding" id="project-upload-sec-1" ng-controller="projectUploadController">
	<div class="container">
		<div class="alert alert-info">
		  <strong>Note!</strong> You can Upload images with jpeg,png,jpg extension
		</div>
		<div class="upload-frame">
			<div id="project-form-div">
				<form id="project-form" name="projectUploadForm" ng-submit="upload($event.target)">
					<div class="container-fluid">
						<div class="label-div">
							<h3>Project Upload <span class="fa fa-upload"></span></h3>
							<div class="label-arr-btn"></div>
						</div>
						<div class="space"></div>
						<div class="space"></div>
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="form-group">
									<input type="text" name="proj_name" id="proj_name_id" placeholder="Project Name...." class="form-control" ng-model="proj_name" required>
									<small class="error" ng-show="projectUploadForm.proj_name.$error.required&&projectUploadForm.proj_name.$dirty">Rquired Field</small>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="form-group">
									<input type="text" name="loc" id="location_id" placeholder="Location...." class="form-control" ng-model="loc" required>
									<small class="error" ng-show="projectUploadForm.loc.$error.required&&projectUploadForm.loc.$dirty">Rquired Field</small>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="form-group">
									<input type="text" name="ins_name" id="ins_name_id" placeholder="Institute/Firm...." class="form-control" ng-model="ins_name" required>
									<small class="error" ng-show="projectUploadForm.ins_name.$error.required&&projectUploadForm.ins_name.$dirty">Rquired Field</small>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="form-group">
									<input type="text" name="area" id="area_id" placeholder="Area...." class="form-control" ng-model="area" required>
									<small class="error" ng-show="projectUploadForm.area.$error.required&&projectUploadForm.area.$dirty">Rquired Field</small>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="form-group">
									<input type="number" name="proj_year" id="proj_year_id" placeholder="Project Year...." class="form-control" ng-model="proj_year" required>
									<small class="error" ng-show="projectUploadForm.proj_year.$error.required&&projectUploadForm.proj_year.$dirty">Rquired Field</small>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-12">
								<select id="proj_type_id" class="form-control" name="proj_type" ng-model="proj_type" required>
									<option>{{proj_type}}</option>
									<option ng-repeat=" project in projectType|orderBy:project track by $index	">{{project}}</option>
								</select>
								<small class="error" ng-show="projectUploadForm.proj_type.$error.required&&projectUploadForm.proj_type.$dirty">Rquired Field</small>
							</div>
						</div>
						<div class="space"></div>
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="border border-danger p-2">
									<div class="form-group mb-0">
										<label for="proj_site_imgs_id">Site PLan</label>
										<input type="file" name="proj_site_imgs" id="proj_site_imgs_id" class="form-control" ng-model="proj_site_imgs" required valid-file ng-file  hidden="hidden">
									</div>
									<img src="image/loader.gif" class="loader-hide">
									<span class="loader-hide"><b>Please wait...</b></span>
									<small class="error" ng-show="projectUploadForm.proj_site_imgs.$error.required&&projectUploadForm.proj_site_imgs.$touched">Rquired Field</small>
									<div class="up-images">
										<div class="images" ng-repeat="image in images1 track by $index">
											<img  ng-src="{{image}}" width="100%">
											<button ng-click="removeImage(images1,uploadfiles1,$index)">X</button>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-12">
								<textarea class="form-control" name="proj_site_img_desc" id="proj_site_img_desc_id" cols="20" rows="4" placeholder="Site Images Description.."  ng-model="proj_site_img_desc"></textarea>
								<small class="error" ng-show="projectUploadForm.proj_site_img_desc.$error.required&&projectUploadForm.proj_site_img_desc.$dirty">Rquired Field</small>
							</div>
						</div>
						<div class="space"></div>
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="border border-primary p-2">
									<div class="form-group mb-0">
										<label for="proj_floor_imgs_id">Floor Plan</label>
										<input type="file" name="proj_floor_imgs" id="proj_floor_imgs_id" class="form-control" ng-model="proj_floor_imgs" required valid-file ng-file2 hidden="hidden">
									</div>
									<img src="image/loader.gif" class="loader-hide">
									<span class="loader-hide"><b>Please wait...</b></span>
									<small class="error" ng-show="projectUploadForm.proj_floor_imgs.$error.required&&projectUploadForm.proj_floor_imgs.$touched">Rquired Field</small>
									<div class="up-images">
										<div class="images" ng-repeat="image in images2 track by $index">
											<img  ng-src="{{image}}" width="100%">
											<button ng-click="removeImage(images2,uploadfiles2,$index)">X</button>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-12">
								<textarea class="form-control" name="proj_floor_img_desc" id="proj_floor_img_desc_id" cols="20" rows="4" placeholder="Floor Images Description.." ng-model="proj_floor_img_desc" ></textarea>
								<small class="error" ng-show="projectUploadForm.proj_floor_img_desc.$error.required&&projectUploadForm.proj_floor_img_desc.$dirty">Rquired Field</small>
							</div>
						</div>
						<div class="space"></div>
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="border border-danger p-2">
									<div class="form-group mb-0">
										<label for="proj_elev_imgs_id">Elevation Plan</label>
										<input type="file" name="proj_elev_imgs" id="proj_elev_imgs_id" class="form-control" ng-model="proj_elev_imgs" required valid-file ng-file3 hidden="hidden">
									</div>
									<img src="image/loader.gif" class="loader-hide">
									<span class="loader-hide"><b>Please wait...</b></span>
									<small class="error" ng-show="projectUploadForm.proj_elev_imgs.$error.required&&projectUploadForm.proj_elev_imgs.$touched">Rquired Field</small>
									<div class="up-images">
										<div class="images" ng-repeat="image in images3 track by $index">
											<img  ng-src="{{image}}" width="100%">
											<button ng-click="removeImage(image3,uploadfiles3,$index)">X</button>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-12">
								<textarea class="form-control" name="proj_elev_img_desc" id="proj_elev_img_desc_id" cols="20" rows="4" placeholder="Elevation Images Description.." ng-model="proj_elev_img_desc" ></textarea>
								<small class="error" ng-show="projectUploadForm.proj_elev_img_desc.$error.required&&projectUploadForm.proj_elev_img_desc.$dirty">Rquired Field</small>
							</div>
						</div>
						<div class="space"></div>
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="border border-primary p-2">
									<div class="form-group mb-0">
										<label for="proj_sec_imgs_id">Section Plan</label>
										<input type="file" name="proj_sec_imgs" id="proj_sec_imgs_id" class="form-control" ng-model="proj_sec_imgs" required valid-file  ng-file4 hidden="hidden">
									</div>
									<img src="image/loader.gif" class="loader-hide">
									<span class="loader-hide"><b>Please wait...</b></span>
									<small class="error" ng-show="projectUploadForm.proj_sec_imgs.$error.required&&projectUploadForm.proj_sec_imgs.$touched">Rquired Field</small>
									<div class="up-images">
										<div class="images" ng-repeat="image in images4 track by $index">
											<img  ng-src="{{image}}" width="100%">
											<button ng-click="removeImage(images4,uploadfiles4,$index)">X</button>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-12">
								<textarea class="form-control" name="proj_sec_img_desc" id="proj_sec_img_desc_id" cols="20" rows="4" placeholder="Section Images Description.." ng-model="proj_sec_img_desc" ></textarea>
								<small class="error" ng-show="projectUploadForm.proj_sec_img_desc.$error.required&&projectUploadForm.proj_sec_img_desc.$touched">Rquired Field</small>
							</div>
						</div>
						<div class="space"></div>
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="border border-primary p-2">
									<div class="form-group mb-0">
										<label for="view_3d_imgs_id">View/3D Images</label>
										<input type="file" name="view_3d_imgs" id="view_3d_imgs_id" class="form-control" ng-model="view_3d_imgs" required valid-file  ng-file5 hidden="hidden">
									</div>
									<img src="image/loader.gif" class="loader-hide">
									<span class="loader-hide"><b>Please wait...</b></span>
									<small class="error" ng-show="projectUploadForm.view_3d_imgs.$error.required&&projectUploadForm.view_3d_imgs.$touched">Rquired Field</small>
									<div class="up-images">
										<div class="images" ng-repeat="image in images5 track by $index">
											<img  ng-src="{{image}}" width="100%">
											<button ng-click="removeImage(images5,uploadfiles5,$index)">X</button>
										</div>
									</div>
								</div>
							</div>
							<!-- <div class="col-lg-6 col-md-6 col-sm-12">
								<textarea class="form-control" name="proj_sec_img_desc" id="proj_sec_img_desc_id" cols="20" rows="4" placeholder="Section Images Description.." ng-model="proj_sec_img_desc" required valid-file></textarea>
								<small class="error" ng-show="projectUploadForm.proj_sec_img_desc.$error.required&&projectUploadForm.proj_sec_img_desc.$touched">Rquired Field</small>
							</div> -->
						</div>
						<div class="space"></div>
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12">
								<textarea class="form-control" cols="20" rows="5" id="proj_desc_id" name="proj_desc" placeholder="Project Description....." ng-model="proj_desc" required></textarea>
								<small class="error" ng-show="projectUploadForm.proj_desc.$error.required&&projectUploadForm.proj_desc.$dirty">Rquired Field</small>
							</div>
						</div>
						<div class="space"></div>
						<div class="proj_upload_btn text-center">
							<button class="btn btn-lg btn-success" ng-class="{'disable':!projectUploadForm.$valid}" ng-disabled="!projectUploadForm.$valid">Upload <span class="fa fa-upload" ></span></button>
						</div>
					</div>
				</form>
			</div>	
		</div>
	</div>
	<div class="loader" ng-if="isLoad">
		<div class="load-container">
			<p align="center"><b>Uploading..</b></p>
			<img src="image/loader.gif">
		</div>
	</div>
	<div class="feedback-message" ng-show="isShowFeedMessage">
		<h1 class="text-success">Thanks For giving your valuable feedback</h1>
	</div>
	<?php include("../../include/feedback.php") ?>
</section>
