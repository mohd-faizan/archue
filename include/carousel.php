<section id="carousel"  my-carousel>
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-7 col-md-12 remove-col-space">
				<a href="#" class="main-image">
					<img ng-src="uploads/{{singleProjectImages[0].image}}" alt="project-1"  width="100%" height="100%">
					<div class="main-image-con-div">
						<p>{{singleProjectImages[0].projectname}}</p>
					</div>
				</a>
			</div>
			<div class="col-lg-2 col-md-12 myclass remove-col-space">
				<a href="#" class="image-container img-ref mb-2" ng-repeat="singlep in singleProjectImages|limitTo:3 track by $index">
					<img ng-src="uploads/{{singlep.image}}" alt="project-1" data-project="{{singlep.projectname}}"  width="100%" height="100%">
				</a>
			</div>
			<div class="col-lg-3 col-md-12">
				<a href="#" class="material-image-container mb-2">
					<img src="image/project-img-1.jpg" alt="project-1" width="100%" height="100%">
					<div class="carousel-material-cont-div">
						<p>lorem ipsum lorem ipsum lorem </p>
					</div>
				</a>
				<a href="#" class="material-image-container">
					<img src="image/project-img-1.jpg" alt="project-1" width="100%" height="100%">
					<div class="carousel-material-cont-div">
						<p>lorem ipsum lorem ipsum lorem </p>
					</div>
				</a>
			</div>
		</div>
	</div>
</section>