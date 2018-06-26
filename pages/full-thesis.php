<div class="space"></div>
<div class="space"></div>
<div class="home-margin" ng-controller="fullThesisController">
	<section id="home-sec-2">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-9">
						<div class="project-heading">
							<h2 class="home-page-heading">{{thesis.singleThesis.file_name}}</h2>
							<small>{{thesis.thesis.thesis_date|myTime}},{{thesis.thesis.thesis_date|date:"fullDate"}}</small>
						</div>
						<div class="full-project-image">
							<img ng-src="uploads/{{thesis.singleThesis.file}}" width="100%" ng-click="setImages(thesis.images)">
							<!-- <p class="mt-4">{{thesis.thesis.project_desc}}</p> -->
						</div>
					
						<div class="space"></div>
						<div class="space"></div>
                        <div class="table-data">
							<table width="100%">
								<tr>
									<th>Name</th>
									<td>: {{thesis.thesis.thesis_name}}</td>
								</tr>
								<tr>
									<th>Title</th>
									<td>: {{thesis.thesis.thesis_title}}</td>
								</tr>
								<tr>
									<th>Location</th>
									<td>: {{thesis.thesis.thesis_location}}</td>
								</tr>
								<tr>
									<th>Area</th>
									<td>: {{thesis.thesis.thesis_area}}</td>
								</tr>
								<tr>
									<th>Year</th>
									<td>: {{thesis.thesis.thesis_year}}</td>
								</tr>
								<tr>
									<th>Institute</th>
									<td>: {{thesis.thesis.thesis_ins}}</td>
								</tr>
								<tr>
									<th>Guide</th>
									<td>: {{thesis.thesis.thesis_guide}}</td>
								</tr>
								<tr>
									<th>Type</th>
									<td>: {{thesis.thesis.thesis_proj_type}}</td>
								</tr>
								
							</table>
						</div>
						<div class="project-images mt-4">
							<img ng-src="uploads/{{thesis.thesis.plan|getSingleImage}}" width="100%">
							<!-- <p class="mt-4">{{fullProject.mainData.site_image_desc}}</p> -->
						</div>
						<div class="space"></div>
						<div class="project-images mt-4">
							<img ng-src="uploads/{{thesis.thesis.elevation|getSingleImage}}" width="100%">
							<!-- <p class="mt-4">{{fullProject.mainData.elevation_image_desc}}</p> -->
						</div>
						<div class="space"></div>
						<div class="project-images mt-4">
							<img ng-src="uploads/{{thesis.thesis.conceptsheet|getSingleImage}}" width="100%">
							<!-- <p class="mt-4"> {{fullProject.mainData.section_image_desc}}</p> -->
						</div>
						<div class="space"></div>
						<div class="project-images mt-4">
							<img ng-src="uploads/{{thesis.thesis.casestudy|getSingleImage}}" width="100%">
							<!-- <p class="mt-4"> {{thesis.thesis.casestudy|getSingleImage}}</p> -->
						</div>
						<div class="space"></div>
						<div class="project-images mt-4">
							<img ng-src="uploads/{{thesis.thesis.siteplan|getSingleImage}}" width="100%">
						</div>
						<div class="mycontainer">
							<div class="samll-img" ng-repeat="myimage in thesis.images|limitTo:7 track by $index">
								<img src="uploads/{{myimage}}" width="100%" height="100%">
							</div>
							
							<div class="samll-img">
								<img src="image/project-img-1.jpg" width="100%" height="100%">
								<div class="img-no" ng-click="setImages(thesis.images)">+{{thesis.images.length}}</div>
							</div>
						</div>
			    </div>
				<div class="col-md-3">
					<div class="material-header material-bg">
						<h3 class="home-page-heading">Materials</h2>
					</div>
					<div class="side-material-container">
						<div class="material-image">
							<img src="image/project-img-1.jpg" alt="project-img-1" width="100%">
						</div>
						<div class="material-image mr-0">
							<img src="image/project-img-1.jpg" alt="project-img-1" width="100%">
						</div>
					</div>
					<div class="side-material-container">
						<div class="material-image">
							<img src="image/project-img-1.jpg" alt="project-img-1" width="100%">
						</div>
						<div class="material-image mr-0">
							<img src="image/project-img-1.jpg" alt="project-img-1" width="100%">
						</div>
					</div>
				</div>
			</div>
			<div class="space"></div>
			<div class="space"></div>
		</div>
	</section>
</div>