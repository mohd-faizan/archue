<section id="upload-sec-1" class="section-padding white-font">
	<div class="container">
		<div class="project-head">
			<h1 class="yellow-font text-center">Upload Categories</h1>
		</div>
		<div class="button-group text-center">
			
			<a href="./project-upload" class="btn btn-large">Project  <span class="fa fa-upload"></span></a>

			<a href="./portfolio-upload" class="btn btn-large">Portfolio  <span class="fa fa-upload"></span></a>

			<a href="./thesis-upload" class="btn btn-large">Thesis  <span class="fa fa-upload"></span></a>

			<a href="./post-blog" class="btn btn-large">Post Blog <span class="fa fa-upload"></span></a>

			<a href="./dissertation-upload" class="btn btn-large">Dissertation  <span class="fa fa-upload"></span></a>

			<a href="./thesis-report-upload" class="btn btn-large">Thesis Report  <span class="fa fa-upload"></span></a>
		</div>
	</div>
	<!-- <div class="upload-nav-div" upload-dir>
		<div class="upload-nav-bar">
			<ul class="upload-nav-list">
				<li class="upload-nav-link upload-active-link" data-target="#project-form-div">Project</li>
				<li class="upload-nav-link" data-target="#portfolio-form-div">Portfolio</li>
				<li class="upload-nav-link" data-target="#thesis-form-div">Thesis</li>
				<li class="upload-nav-link" data-target="#blog-form-div">Blog</li>
				<li class="upload-nav-link" data-target="#dissertation-form-div">Dissertation</li>
				<li class="upload-nav-link" data-target="#thesis-report-form-div">Thesis Report</li>
			</ul>
		</div>
		<div class="upload-frame">
			<div id="project-form-div">
				<form id="project-form">
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
									<input type="text" name="proj_name" id="proj_name_id" placeholder="Project Name...." class="form-control">
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="form-group">
									<input type="text" name="location" id="location_id" placeholder="Location...." class="form-control">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="form-group">
									<input type="text" name="ins_name" id="ins_name_id" placeholder="Institute/Firm...." class="form-control">
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="form-group">
									<input type="text" name="area" id="area_id" placeholder="Area...." class="form-control">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="form-group">
									<input type="text" name="proj_year" id="proj_year_id" placeholder="Project Year...." class="form-control">
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-12">
								<select id="proj_type_id" class="form-control" name="proj_type">
									<option>Select Project Type</option>
									<option>Residential</option>
									<option>Commercial</option>
									<option>Urban</option>
								</select>
							</div>
						</div>
						<div class="space"></div>
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="border border-danger p-2">
									<label for="proj_site_imgs_id">Site PLan</label>
									<div class="form-group">
										<input type="file" name="proj_site_imgs" id="proj_site_imgs_id" class="form-control">
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-12">
								<textarea class="form-control" name="proj_site_img_desc" id="proj_site_img_desc_id" cols="20" rows="4" placeholder="Site Images Description.."></textarea>
							</div>
						</div>
						<div class="space"></div>
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="border border-primary p-2">
									<label for="proj_floor_imgs_id">Floor Plan</label>
									<div class="form-group">
										<input type="file" name="proj_floor_imgs" id="proj_floor_imgs_id" class="form-control">
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-12">
								<textarea class="form-control" name="proj_floor_img_desc" id="proj_floor_img_desc_id" cols="20" rows="4" placeholder="Floor Images Description.."></textarea>
							</div>
						</div>
						<div class="space"></div>
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="border border-danger p-2">
									<label for="proj_elev_imgs_id">Elevation Plan</label>
									<div class="form-group">
										<input type="file" name="proj_elev_imgs" id="proj_elev_imgs_id" class="form-control">
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-12">
								<textarea class="form-control" name="proj_elev_img_desc" id="proj_elev_img_desc_id" cols="20" rows="4" placeholder="Elevation Images Description.."></textarea>
							</div>
						</div>
						<div class="space"></div>
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="border border-primary p-2">
									<label for="proj_sec_imgs_id">Section Plan</label>
									<div class="form-group">
										<input type="file" name="proj_sec_imgs" id="proj_sec_imgs_id" class="form-control">
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-12">
								<textarea class="form-control" name="proj_sec_img_desc" id="proj_sec_img_desc_id" cols="20" rows="4" placeholder="Section Images Description.."></textarea>
							</div>
						</div>
						<div class="space"></div>
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12">
								<textarea class="form-control" cols="20" rows="5" id="proj_desc_id" name="proj_desc" placeholder="Project Description....."></textarea>
							</div>
						</div>
						<div class="space"></div>
						<div class="proj_upload_btn text-center">
							<button class="btn btn-lg btn-success">Upload <span class="fa fa-upload"></span></button>
						</div>
					</div>
				</form>
			</div>
			<div id="portfolio-form-div">
				<form id="portfolio-form">
					<div class="container-fluid">
						<div class="label-div">
							<h3>Portfolio Upload <span class="fa fa-upload"></span></h3>
							<div class="label-arr-btn"></div>
						</div>
						<div class="space"></div>
						<div class="space"></div>
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="form-group">
									<input type="text" name="portfolio_name" id="portfolio_name_id" placeholder="Portfolio Name...." class="form-control">
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="form-group">
									<input type="text" name="portfolio_place" id="portfolio_place_id" placeholder="Place...." class="form-control">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="form-group">
									<input type="text" name="portfolio_college" id="portfolio_college_id" placeholder="College...." class="form-control">
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="form-group">
									<input type="text" name="portfolio_year" id="portfolio_year_id" placeholder="Year...." class="form-control">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12">
								<div class="border border-danger p-2">
									<label for="portfolio_file_id">Choose File</label>
									<div class="form-group">
										<input type="file" name="portfolio_file" id="portfolio_file_id" class="form-control">
									</div>
								</div>
							</div>
						</div>
						<div class="space"></div>
						<div class="portfolio_upload_btn text-center">
							<button class="btn btn-lg btn-success">Upload <span class="fa fa-upload"></span></button>
						</div>
					</div>
				</form>
			</div>
			<div id="thesis-form-div">
				<form id="thesis-form">
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
									<input type="text" name="thesis_name" id="thesis_name_id" placeholder="Name...." class="form-control">
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="form-group">
									<input type="text" name="thesis_title" id="thesis_title_id" placeholder="Title...." class="form-control">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="form-group">
									<input type="text" name="thesis_location" id="thesis_location_id" placeholder="Location...." class="form-control">
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="form-group">
									<input type="text" name="thesis_area" id="thesis_area_id" placeholder="Area...." class="form-control">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="form-group">
									<input type="text" name="thesis_year" id="thesis_year_id" placeholder="Thesis Year...." class="form-control">
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="form-group">
									<input type="text" name="thesis_ins" id="thesis_ins_id" placeholder="Institute/Firm...." class="form-control">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="form-group">
									<input type="text" name="thesis_guide" id="thesis_guide_id" placeholder="Thesis Guide...." class="form-control">
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-12">
								<select id="thesis_proj_type_id" class="form-control" name="thesis_proj_type">
									<option>Select Project Type</option>
									<option>Residential</option>
									<option>Commercial</option>
									<option>Urban</option>
								</select>
							</div>
						</div>
						<div class="space"></div>
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12">
								<div class="border border-primary p-2">
									<label for="thesis_file_id">Choose File</label>
									<div class="form-group">
										<input type="file" name="thesis_file" id="thesis_file_id" class="form-control">
									</div>
								</div>
							</div>
						</div>
						<div class="space"></div>
						<div class="thesis_upload_btn text-center">
							<button class="btn btn-lg btn-success">Upload <span class="fa fa-upload"></span></button>
						</div>
					</div>
				</form>
			</div>
			<div id="blog-form-div">
				<form id="blog-form">
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
									<input type="text" name="blog_name" id="blog_name_id" placeholder="Name...." class="form-control">
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="form-group">
									<input type="text" name="blog_heading" id="blog_heading_id" placeholder="Heading...." class="form-control">
								</div>
							</div>
						</div>
						<div class="space"></div>
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12">
								<textarea cols="20" rows="5" name="blog_text" id="blog_text_id" class="form-control" placeholder="Your Blog...."></textarea>
							</div>
						</div>
						<div class="space"></div>
						<div class="portfolio_upload_btn text-center">
							<button class="btn btn-lg btn-success">Post <span class="fa fa-upload"></span></button>
						</div>
					</div>
				</form>
			</div>
			<div id="dissertation-form-div">
				<form id="dissertation-form">
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
									<input type="text" name="dissertation_name" id="dissertation_name_id" placeholder="Name...." class="form-control">
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="form-group">
									<input type="text" name="dissertation_place" id="dissertation_place_id" placeholder="Place...." class="form-control">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="form-group">
									<input type="text" name="dissertation_college" id="dissertation_college_id" placeholder="College...." class="form-control">
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="form-group">
									<input type="text" name="dissertation_year" id="dissertation_year_id" placeholder="Year...." class="form-control">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12">
								<div class="border border-danger p-2">
									<label for="dissertation_file_id">Choose File</label>
									<div class="form-group">
										<input type="file" name="dissertation_file" id="dissertation_file_id" class="form-control">
									</div>
								</div>
							</div>
						</div>
						<div class="space"></div>
						<div class="portfolio_upload_btn text-center">
							<button class="btn btn-lg btn-success">Upload <span class="fa fa-upload"></span></button>
						</div>
					</div>
				</form>
			</div>
			<div id="thesis-report-form-div">
				<form id="thesis-report-form">
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
									<input type="text" name="thesis_report_name" id="thesis_report_name_id" placeholder="Name...." class="form-control">
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="form-group">
									<input type="text" name="thesis_report_place" id="thesis_report_place_id" placeholder="Place...." class="form-control">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="form-group">
									<input type="text" name="thesis_report_college" id="thesis_report_college_id" placeholder="College...." class="form-control">
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="form-group">
									<input type="text" name="thesis_report_year" id="thesis_report_year_id" placeholder="Year...." class="form-control">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12">
								<div class="border border-danger p-2">
									<label for="portfolio_file_id">Choose File</label>
									<div class="form-group">
										<input type="file" name="thesis_report_file" id="thesis_report_file_id" class="form-control">
									</div>
								</div>
							</div>
						</div>
						<div class="space"></div>
						<div class="thesis_report_upload_btn text-center">
							<button class="btn btn-lg btn-success">Upload <span class="fa fa-upload"></span></button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div> -->
</section>