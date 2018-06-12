<section class="section-padding" id="portfolio-sec-1" ng-controller="fetchPortfolioController">
	<div class="home-margin">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-9 col-md-9 col-sm-12">
					<div class="student-main-div">
						<div class="cur-page-div">
							<a href="#">Archue</a>
							<span class="fa fa-angle-right"></span>
							<span>Portfolio</span>
						</div>
						<div class="yellow-line bg-color"></div>
						<!-- <div class="yellow-separator"></div> -->
						<div class="space"></div>
						<div class="conntent-div mb-4" ng-repeat="portfolio in portfolios">
							<div class="content-box">
								<div class="content-img">
									<img src="image/pdf-icon.png">
								</div>
								<div class="content-data">
									<h5><a href="./full-portfolio/{{portfolio.portfolio_name}}" ng-click="setportfolio(portfolio)" class="text-dark">{{portfolio.portfolio_name}}</a></h5>
									<p class="p-text">{{portfolio.portfolio_place}}</p>
									<div class="file-link pull-right">
										<a href="./full-portfolio/{{portfolio.portfolio_name}}" ng-click="setportfolio(portfolio)">Show Portfolio <span class="fa fa-long-arrow-right"></span></a>
									</div>
								</div>
							</div>
							<div class="project-share-option">
								<div>
									<a href=""><span class="fa fa-heart-o"></span></a>
									<a href=""><span class="fa fa-comment"></span></a>
									<a href=""><span class="fa fa-eye"></span></a>
									<a href=""><span class="fa fa-facebook"></span></a>
									<a href=""><span class="fa fa-twitter"></span></a>
									<a href=""><span class="fa fa-google-plus"></span></a>
									<a href=""><span class="fa fa-pinterest"></span></a>
									<a href=""><span class="fa fa-instagram"></span></a>
									<a href=""><span class="fa fa-tumblr"></span></a>
									<a href=""><span class="fa fa-linkedin"></span></a>
									<a href=""><span class="fa fa-rss"></span></a>
								</div>
								<div>
									<a href="./full-project/{{myproject.mainData.project_id}}/{{myproject.mainData.project_name}}" ng-click=setFullProject(myproject)>Read More</a>
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
