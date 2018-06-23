<div class="space"></div>
<div class="space"></div>
<div class="home-margin" ng-controller="fullProjectController">
	<section id="home-sec-2">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-9">
						<div class="project-heading">
							<h2 class="home-page-heading">{{fullProject.mainData.project_name}}</h2>
							<small>{{fullProject.mainData.project_time|myTime}},{{fullProject.mainData.project_date|date:"fullDate"}}</small>
						</div>
						<div class="full-project-image">
							<img ng-src="uploads/{{fullProject.mainImage}}" width="100%" ng-click="setImages(fullProject.images)">
							<p class="mt-4">{{fullProject.mainData.project_desc}}</p>
						</div>
					
						
                        <div class="table-data">
							<table width="100%">
								<tr>
									<th>Location</th>
									<td>: {{fullProject.mainData.location}}</td>
								</tr>
								<tr>
									<th>Institute</th>
									<td>: {{fullProject.mainData.institute}}</td>
								</tr>
								<tr>
									<th>Area</th>
									<td>: {{fullProject.mainData.area}}</td>
								</tr>
								<tr>
									<th>Project Type</th>
									<td>: {{fullProject.mainData.project_type}}</td>
								</tr>
								<tr>
									<th>Project Year</th>
									<td>: {{fullProject.mainData.project_year}}</td>
								</tr>
							</table>
						</div>
						<div class="project-images mt-4">
							<img ng-src="uploads/{{siteImages[0]}}" width="100%">
							<p class="mt-4">{{fullProject.mainData.site_image_desc}}</p>
						</div>
						<div class="space"></div>
						<div class="project-images mt-4">
							<img ng-src="uploads/{{elevationImages[0]}}" width="100%">
							<p class="mt-4">{{fullProject.mainData.elevation_image_desc}}</p>
						</div>
						<div class="space"></div>
						<div class="project-images mt-4">
							<img ng-src="uploads/{{sectionImages[0]}}" width="100%">
							<p class="mt-4"> {{fullProject.mainData.section_image_desc}}</p>
						</div>
						<div class="space"></div>
						<div class="project-images mt-4">
							<img ng-src="uploads/{{floorImages[0]}}" width="100%">
							<p class="mt-4"> {{fullProject.mainData.floor_image_desc}}</p>
						</div>
						<div class="space"></div>
						<div class="project-images mt-4">
							<img ng-src="uploads/{{view3dImages[0]}}" width="100%">
						</div>
						<div class="mycontainer">
							<div class="samll-img" ng-repeat="myimage in fullProject.images|limitTo:7 track by $index">
								<img src="uploads/{{myimage}}" width="100%" height="100%">
							</div>
							
							<div class="samll-img">
								<img src="image/project-img-1.jpg" width="100%" height="100%">
								<div class="img-no" ng-click="setImages(fullProject.images)">+{{fullProject.images.length}}</div>
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