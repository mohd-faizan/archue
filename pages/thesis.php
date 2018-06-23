<section class="section-padding" id="thesis-sec-1" ng-controller="fetchThesisController">
	<div class="home-margin">
		<div class="space"></div>
		<div class="container-fluid ">
			<div class="row">
				<div class="col-md-9">

					<div class="cur-page-div">
						<a href="./">Archue</a>
						<span class="fa fa-angle-right"></span>
						<span>Project</span>
					</div>
					<div class="space"></div>
					<div class="d-flex">
						<div class="project-top-header">
							<h5>Thesis Project</h5>
						</div>
						<div class="category">
							<div class="dropdown">
							  <button class="dropdown-toggle" type="button" data-toggle="dropdown">
							    CATEGORY+
							  </button>
							  <div class="dropdown-menu">
							    <a class="dropdown-item" href="#" ng-repeat="cat in categories|orderBy:cat track by $index" ng-click="setCategory(cat)">{{cat}}</a>
							  </div>
							</div>
							<!-- <select ng-model="category" class="project-select">
								<option>{{category}}</option>
								<option ng-repeat="cat in categories track by $index">{{cat}}</option>
								}
							</select> -->
						</div>
					</div>
					<div class="yellow-line bg-color"></div>
					<div class="project-container">
						<ul class="projects" >
							<li ng-if="res.length>0" ng-repeat="singlepro in res = (singleThesisArr|filter:category) track by $index">
								<a href="#" class="text-dark">
									<img ng-src="uploads/{{singlepro.file}}" width="100%" height="100%">
									<p>{{singlepro.file_name}}</p>
								</a>
							</li>
						</ul>
						<div ng-if="res.length==0" class="alert alert-danger">
							No Project Found For Such Category
						</div>
					</div>	
				</div>
				<div class="col-md-3 pr-0">
					<div class="blog-header material-bg mt-5">
						<h3 class="home-page-heading">Materials</h3>
					</div>
					<div class="sm-blog-container">
						<div class="image">
							<img src="image/project-img-1.jpg" alt="project-img-1" width="100%">
						</div>
						<div class="link">
							<a href="#">
							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
							</a>
						</div>
					</div>
					<div class="sm-blog-container">
						<div class="image">
							<img src="image/project-img-1.jpg" alt="project-img-1" width="100%">
						</div>
						<div class="link">
							<a href="#">
							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
							</a>
						</div>
					</div>
					<div class="sm-blog-container">
						<div class="image">
							<img src="image/project-img-1.jpg" alt="project-img-1" width="100%">
						</div>
						<div class="link">
							<a href="#">
							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
							</a>
						</div>
					</div>
				</div>
			</div>
			<div class="space"></div>
			<div class="space"></div>
		</div>
	</div>
</section>
