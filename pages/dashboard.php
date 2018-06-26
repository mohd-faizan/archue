<div ng-controller="dashboardController">
	<div class="space"></div>
	<div class="space"></div>
	<div class="container">
		<div class="dashboard-top-container">
			<div class="user-image">
				<img ng-src="uploads/{{userData.profile}}" alt="user-image" class="img-fluid">
			</div>
			<div class="user-info">
				<h3>{{userData.username}}</h3>
				<p class="mb-0"><strong>{{userData.profession}}</strong></p>
				<p>{{userData.company_name}}</p>
				<a ng-href="./upload" class="btn btn-primary bg-color border-0"><span class="fa fa-file">&nbsp;&nbsp;</span>Upload</a>
				<a href="./edit-profile" class="btn btn-primary bg-color border-0"><span class="fa fa-pencil ">&nbsp;&nbsp;</span>Edit</a>
			</div>
		</div>
		<section  id="user-uploads">
			<div class="space"></div>
			<div class="space"></div>
			<h3>BLOG</h3>
			<div class="space"></div>
			<div class="user-upload-container">
				<div ng-if="blogs.length>0" ng-repeat="blog in blogs|limitTo:6" class="user-upload">
					<a href="#">
						<img ng-src="uploads/{{blog.blog_file}}" class="img-fluid">
					</a>
					<a href="#"><p class="mt-2">{{blog.heading}}</p></a>
				</div>
				<div class="alert alert-danger"  ng-if="blogs.length==0">
					No Blog
				</div>
			</div>
			<div class="space"></div>
			<div class="space"></div>
			<h3>PROJECTS</h3>
			<div class="space"></div>
			<div class="user-upload-container">
				<div ng-if="projects.length>0" ng-repeat="project in projects|limitTo:6" class="user-upload">
					<a href="#">
						<img ng-src="uploads/{{project.site_image|getSingleImage}}" class="img-fluid">
					</a>
					<a href="#"><p class="mt-2">{{project.project_name}}</p></a>
				</div>
				<div ng-if="projects.length==0" class="alert alert-danger">
					No projects
				</div>
			</div>
		</section>
	</div>
	<div class="space"></div>
	<div class="space"></div>
</div>