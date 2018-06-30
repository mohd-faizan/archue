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
									<img src="image/pdf-icon.png">
								</div>
								<div class="content-data">
									<h5>
										<a href="./full-dissertation/{{dessertation.url}}" ng-click="setDessertation(dessertation)" class="text-dark">{{dessertation.dessertation_name}}</a></h5>
									<p class="p-text">
										{{dessertation.dessertation_place}}
									</p>
<!-- 									<div class="file-link pull-right">
										<a href="./full-dissertation/{{dessertation.url}}" ng-click="setDessertation(dessertation)">Show Dissertation <span class="fa fa-long-arrow-right"></span></a>
									</div> -->
								</div>
							</div>
							<div class="project-share-option">
								<div>
									<!-- <a href=""><span class="fa fa-heart-o"></span></a>
									<a href=""><span class="fa fa-comment"></span></a>
									<a href=""><span class="fa fa-eye"></span></a> -->
									<a href=""><span class="fa fa-facebook"
										socialshare
					                    socialshare-provider="facebook"
					                    socialshare-type="sharer"
					                    socialshare-via="167503137442216"
					                    socialshare-url="http://www.archue.com/full-project/{{myproject.mainData.project_id}}/{{myproject.url}}"
					                    socialshare-redirect-uri="http://google.com"
					                    socialshare-popup-height="300"
					                    socialshare-popup-width="400"
					                    socialshare-trigger="click"></span></a>
									<a href=""><span class="fa fa-twitter"
										socialshare
				                        socialshare-provider="twitter"
				                        socialshare-hashtags="Architect, development, internet"
				                        socialshare-via="twitter"
				                        socialshare-text=""
				                        socialshare-url="http://www.archue.com//full-project/{{myproject.mainData.project_id}}/{{myproject.url}}"
				                        socialshare-popup-height="300"
				                        socialshare-popup-width="400"
				                        socialshare-trigger="click"></span></a>
									<a href=""
									socialshare
			                        socialshare-provider="google"
			                        socialshare-url="http://www.archue.com//full-project/{{myproject.mainData.project_id}}/{{myproject.url}}"
			                        socialshare-popup-height="300"
			                        socialshare-popup-width="400"
			                        socialshare-trigger="click"><span class="fa fa-google-plus"></span></a>
									<a href=""
									 socialshare
			                        socialshare-media="https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcTWGNvatNjOUyli3tBacDdAHmienfptFVStj_olGCWmaUXoIGYI"
			                        socialshare-provider="pinterest"
			                        socialshare-text="Architect"
			                        socialshare-url="http://www.archue.com//full-project/{{myproject.mainData.project_id}}/{{myproject.url}}"
			                        socialshare-popup-height="300"
			                        socialshare-popup-width="400"
			                        socialshare-trigger="click"><span class="fa fa-pinterest"></span></a>
									
									<a href=""
									socialshare
			                        socialshare-provider="tumblr"
			                        socialshare-type="link"
			                        socialshare-text="Architect"
			                        socialshare-url="http://www.archue.com//full-project/{{myproject.mainData.project_id}}/{{myproject.url}}"
			                        socialshare-popup-height="300"
			                        socialshare-popup-width="540"
			                        socialshare-trigger="click"><span class="fa fa-tumblr"></span></a>
									<a href=""
									socialshare
			                        socialshare-provider="linkedin"
			                        socialshare-text="Architect"
			                        socialshare-url="http://www.archue.com//full-project/{{myproject.mainData.project_id}}/{{myproject.url}}"
			                        socialshare-description="Architect"
			                        socialshare-source="Archue"
			                        socialshare-popup-height="300"
			                        socialshare-popup-width="400"
			                        socialshare-trigger="click"><span class="fa fa-linkedin"></span></a>
									
								</div>
								<div class="ml-auto">
									<a href="./full-dissertation/{{dessertation.url}}" ng-click="setDessertation(dessertation)">Read More</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-12">
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
				</div>
			</div>
		</div>
	</div>
</section>
