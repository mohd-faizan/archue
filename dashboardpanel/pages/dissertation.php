<section class="section-padding" id="dissertation-sec-1"  ng-controller="fetchDessertController">
	<div class="home-margin">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-9 col-md-9 col-sm-12">
					<div class="student-main-div">
						<div class="cur-page-div">
							<a href="#">Archue</a>
							<span class="fa fa-angle-right"></span>
							<span>Dissertation</span>
						</div>
						<div class="yellow-line bg-color"></div>
						<!-- <div class="yellow-separator"></div> -->
						<div class="space"></div>
						<div class="conntent-div mb-4" ng-repeat="dessertation in dessertations">
							<div class="content-box" >
								<div class="content-img">
									<img src="../image/pdf-icon.png">
								</div>
								<div class="content-data">
									<h5>
										<a href="./full-dissertation/{{dessertation.url}}" ng-click="setDessertation(dessertation)" class="text-dark">{{dessertation.dessertation_name}}</a></h5>
									<p class="p-text">
										{{dessertation.dessertation_place}}
									</p>
									<div class="file-link pull-right">
										<a href="./full-dessertation/{{dessertation.url}}" ng-click="setDessertation(dessertation)">Show Dissertation <span class="fa fa-long-arrow-right"></span></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- <div class="col-lg-3 col-md-3 col-sm-12">
					<div class="advertisement-div">
						<div class="blog-header material-bg">
							<h3 class="home-page-heading">Materials</h2>
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
				</div> -->
			</div>
		</div>
	</div>
</section>
