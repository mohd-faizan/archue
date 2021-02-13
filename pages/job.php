<section id="full-blog-sec" ng-controller="fullJobController">
	<div class="main-conatiner mt-4 mb-4">
		<div class="container">
			<div class="row" ng-if="job">
				<div class="col-md-9 col-sm-12">
					<div class="outer-border">
						<div class="blog-container">
							<p><a ng-href="./" class="bg-font">Home</a> > <a ng-href="/jobs" class="bg-font">jobs</a> > <a href="/job/{{job.job_id}}/{{job.job_heading}}" class="bg-font">{{job.job_heading | toUpperCaseFirst}}</a></p>
							<br>
							<div class="blog-image-abs">
								<h3>{{job.job_heading | toUpperCaseFirst}}</h3>
								<p><span class="fa fa-calendar"></span>&nbsp; {{job.job_date|myDate|date:"mediumDate"}} &nbsp;&nbsp;<span class="fa fa-clock-o"></span>&nbsp;&nbsp;{{job.job_date|myTime|date:"shortTime"}}</p>
							</div>
							<br>
							<div class="whats-app-btn">
								<a class="font-bold" socialshare socialshare-provider="whatsapp" socialshare-url="https://www.archue.com/job/{{job.job_id}}/{{job.job_heading}}">
									<i class="fa fa-whatsapp"></i> Share in Whatsapp
								</a>
							</div>
							<div class="blog-image-container">
								<a href="#"><img ng-src="upload-file/{{job.job_file}}" class="img-fluid"></a>
								<div class="project-share-option">
									<div>
									<a href="" class="fa {{job.like ? 'fa-heart text-danger' : 'fa-heart-o'}}" ng-click = "increaseLike()">&nbsp;{{job.likes}}</a>
									<a href=""><span class="fa fa-eye"></span>&nbsp;{{job.views}}</a>
										<a href=""><span class="fa fa-facebook" socialshare socialshare-provider="facebook" socialshare-type="sharer" socialshare-via="167503137442216" socialshare-url="https://www.archue.com/job/{{job.job_id}}/{{job.job_heading}}" socialshare-redirect-uri="https://archue.com" socialshare-popup-height="300" socialshare-popup-width="400" socialshare-trigger="click"></span></a>
										<a href=""><span class="fa fa-twitter" socialshare socialshare-provider="twitter" socialshare-hashtags="Architect, development, internet" socialshare-via="twitter" socialshare-text="" socialshare-url="https://www.archue.com/job/{{job.job_id}}/{{job.job_heading}}" socialshare-popup-height="300" socialshare-popup-width="400" socialshare-trigger="click"></span></a>
										<a href="" socialshare socialshare-provider="google" socialshare-url="https://www.archue.com/job/{{job.job_id}}/{{job.job_heading}}" socialshare-popup-height="300" socialshare-popup-width="400" socialshare-trigger="click"><span class="fa fa-google-plus"></span></a>
										<a href="" socialshare socialshare-media="https://www.archue.com/upload-file/{{job.job_file}}" socialshare-provider="pinterest" socialshare-text="{{job.job_heading}}" socialshare-url="https://www.archue.com/job/{{job.job_id}}/{{job.job_heading}}" socialshare-popup-height="300" socialshare-popup-width="400" socialshare-trigger="click"><span class="fa fa-pinterest"></span></a>

										<a href="" socialshare socialshare-provider="tumblr" socialshare-type="link" socialshare-text="{{job.job_heading}}" socialshare-url="https://www.archue.com/job/{{job.job_id}}/{{job.job_heading}}" socialshare-popup-height="300" socialshare-popup-width="540" socialshare-trigger="click"><span class="fa fa-tumblr"></span></a>
										<a href="" socialshare socialshare-provider="linkedin" socialshare-text="{{job.job_heading}}" socialshare-url="https://www.archue.com/job/{{job.job_id}}/{{job.job_heading}}" socialshare-description="Architect" socialshare-source="Archue" socialshare-popup-height="300" socialshare-popup-width="400" socialshare-trigger="click"><span class="fa fa-linkedin"></span></a>

									</div>
								</div>

							</div>

						</div>
						<div class="html-content" ng-bind-html="job.job_content"></div>
					</div>
					<div class="space"></div>
					<div class="next-prev-container">
						<div class="prev">
							<!-- <button ng-click="next(fullProject.mainData.project_id,false)"><<&nbsp;Prev</button> -->
							<a ng-href="./job/{{prev.job_id}}/{{prev.job_heading}}" ng-if="prev">
								<div class="mr-auto">
									<img ng-src="upload-file/{{prev.job_file}}" height="50" width="50">
								</div>
								<div>
									<span>{{prev.job_heading|uppercase}}</span>
									<span>PREVIOUS JOB</span>
								</div>
							</a>
						</div>
						<div class="next">
							<!-- <button ng-click="next(fullProject.mainData.project_id,true)">Next&nbsp;>></button> -->
							<a ng-href="./job/{{nxt.job_id}}/{{nxt.job_heading}}" ng-if="nxt">
								<div>
									<span>{{nxt.job_heading|uppercase}}</span>
									<span>NEXT JOB</span>
								</div>
								<div class="ml-auto">
									<img ng-src="upload-file/{{nxt.job_file}}" height="50" width="50">
								</div>
							</a>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-12">
					<br><br>
					<!-- E-Magazine -->
					<div class="card shadow">
						<div class="card-header blog-bg text-white font-weight-bold">Architecture E-Magazine</div>
						<div class="card-body">
							<!-- <h5 class="card-title">Card title</h5> -->
							<p class="card-text font-weight-bold">Subscribe to one of the best Architecture
								E-Magazine</p>
							<a href="./subscribe-e-magazine" class="btn btn-primary">Know more</a>
						</div>
						<div class="card-footer text-center link">
							<a href="#" class="d-inline-block mr-2"><span class="fa fa-2x fa-facebook-square"></span></a>
							<a href="#" class="d-inline-block mr-2"><span class="fa fa-2x fa-instagram"></span></a>
							<a href="#" class="d-inline-block mr-2"><span class="fa fa-2x fa-twitter-square"></span></a>
							<a href="#" class="d-inline-block"><span class="fa fa-2x fa-pinterest-square"></span></a>
						</div>
					</div>
					<!-- End of E-Magazine -->

					<br><br>

					<!-- Included Side Material -->
					<div ng-include="'include/sidematerial.php'"></div>
					<!-- End of Side Material -->

					<br><br>

					<!-- Side Blog -->
					<div class="card shadow">
						<div class="card-header blog-bg text-white font-weight-bold">Blog</div>
						<ul class="list-group list-group-flush">
							<li class="list-group-item p-0 mt-0 link" ng-repeat="blog in blogs|limitTo:3">
								<a href="./blogs/{{blog.blog_id}}/{{blog.url}}" ng-click="setBlog(blog)" class="sm-blog-container mt-0">
									<div class="image">
										<img ng-src="upload-file/{{blog.blog_file}}" alt="project-img-1" width="100%">
									</div>
									<div class="line-height p-3">
										{{blog.heading}}
									</div>
								</a>
							</li>
						</ul>
						<div class="alert alert-danger mb-0" ng-if="blogs.length==0">
							<p>No Blogs</p>
						</div>
					</div>
					<!-- End of Side Blog -->

					<br><br>

					<!-- Portfolio Sidebar -->
					<div class="card shadow">
						<div class="card-header blog-bg text-white font-weight-bold">Portfolio &amp; Case Study
						</div>
						<ul class="list-group list-group-flush" ng-controller="fetchPortfolioController">
							<li class="list-group-item p-0 mt-0 link" ng-repeat="portfolio in portfolios|limitTo:3">
								<a href="./full-portfolio/{{portfolio.portfolio_id}}/{{portfolio.portfolio_college}}/{{portfolio.portfolio_name}}" class="sm-blog-container mt-0" ng-click="setportfolio(portfolio)">
									<div class="image pb-3 pt-3">
										<img src="image/pdf-icon.png" class="pdf-icon">
									</div>
									<div class="line-height p-3">
										{{portfolio.portfolio_name}}
									</div>
								</a>
							</li>
						</ul>
						<div class="alert alert-danger mb-0" ng-if="portfolios.length==0">
							<p>No Portfolio</p>
						</div>
					</div>
					<!-- End of Portfolio Sidebar -->

					<br><br>

					<!-- Side Student Work -->
					<div class="card shadow">
						<div class="card-header blog-bg text-white font-weight-bold">Student Works</div>
						<ul class="list-group list-group-flush" ng-controller="studentWorkController">
							<li class="list-group-item p-0 mt-0 link" ng-controller="projectsController" ng-repeat="singlepro in myStudentProjectsArr|limitTo:3">
								<a href="./full-project/{{singlepro.mainData.project_id}}/{{singlepro.url}}" ng-click="setFullProject(singlepro)" class="sm-blog-container mt-0">
									<div class="image">
										<img ng-src="uploads/{{singlepro.mainImage}}" alt="project-img-1" width="100%">
									</div>
									<div class="line-height p-3">
										{{singlepro.mainData.project_name}}
									</div>
								</a>
							</li>
						</ul>
						<div class="alert alert-danger mb-0" ng-if="myStudentProjectsArr.length==0">
							<p>No Student Work Found!</p>
						</div>
					</div>
					<!-- End of Side Student Work -->

					<br><br>

					<!-- Side Dessertation -->
					<div class="card shadow">
						<div class="card-header blog-bg text-white font-weight-bold">Dessertation</div>
						<ul class="list-group list-group-flush" ng-controller="fetchDessertController">
							<li class="list-group-item p-0 mt-0 link" ng-repeat="dessertation in dessertations|limitTo:3">
								<a href="./full-dissertation/{{ dessertation.dessertation_id }}/{{dessertation.dessertation_college}}/{{dessertation.url}}" ng-click="setDessertation(dessertation)" class="sm-blog-container mt-0">
									<div class="image">
										<img src="image/pdf-icon.png" class="pdf-icon">
									</div>
									<div class="line-height p-3">
										{{dessertation.dessertation_name}}
									</div>
								</a>
							</li>
						</ul>
						<div class="alert alert-danger mb-0" ng-if="dessertations.length==0">
							<p>No Dessertation</p>
						</div>
					</div>
					<!-- End of Side Dessertation -->
				</div>
			</div>
			<div ng-if="!job" ng-include="'../include/loader.php'"></div>
		</div>
	</div>
</section>