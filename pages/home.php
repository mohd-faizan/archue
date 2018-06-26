<div class="home-margin" ng-controller="myHomeController">
	<div class="space"></div>
	<div class="space"></div>
	<div ng-include="'include/carousel.php'"></div>
	<div class="space"></div>
	<div class="space"></div>
	<section id="home-sec-2">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-9">
						<div ng-if="myProjectsArr.length>0" ng-repeat="myproject in myProjectsArr|limitTo:10" class="mb-4">
							<div class="project-heading">
								<h2 class="project-heading"><a href="./full-project/{{myproject.mainData.project_id}}/{{myproject.url}}" ng-click=setFullProject(myproject) class="text-dark">{{myproject.mainData.project_name}}</a></h2>
								<small>{{myproject.mainData.project_time|myTime}},{{myproject.mainData.project_date|date:"fullDate"}}</small>
							</div>
							<div class="full-project-image">
								<a href="./full-project/{{myproject.mainData.project_id}}/{{myproject.url}}" ng-click=setFullProject(myproject)><img ng-src="uploads/{{myproject.mainImage}}" width="100%"></a>
							</div>
							<div class="mycontainer">
								<div class="samll-img" ng-repeat="myimage in myproject.images|limitTo:4 track by $index" >
									<img src="uploads/{{myimage}}" width="100%" height="100%">
								</div>
								
								<div class="samll-img">
									<img src="image/project-img-1.jpg" width="100%" height="100%">
									<div class="img-no" ng-click="setImages(myproject.images)">+{{myproject.images.length}}</div>
								</div>
							</div>
							<div class="table-data">
								<table width="100%">
									<tr>
										<th>Location</th>
										<td>: {{myproject.mainData.location}}</td>
									</tr>
									<tr>
										<th>Institute</th>
										<td>: {{myproject.mainData.institute}}</td>
									</tr>
									<tr>
										<th>Area</th>
										<td>: {{myproject.mainData.area}}</td>
									</tr>
									<tr>
										<th>Project Type</th>
										<td>: {{myproject.mainData.project_type}}</td>
									</tr>
									<tr>
										<th>Project Year</th>
										<td>: {{myproject.mainData.project_year}}</td>
									</tr>
								</table>
							</div>
							<div class="space"></div>
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
									<a href=""><span class="fa fa-instagram"></span></a>
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
									<a href=""><span class="fa fa-rss"></span></a>
								</div>
								<div class="ml-auto">
									<a href="./full-project/{{myproject.mainData.project_id}}/{{myproject.url}}" ng-click=setFullProject(myproject)>Read More</a>
								</div>
							</div>
							<!-- <div class="d-flex justify-content-end mt-2"><a href="./full-project/{{myproject.mainData.project_id}}/{{myproject.mainData.project_name}}" ng-click=setFullProject(myproject)>Read More&nbsp;<span class="fa fa-arrow-circle-o-right"></span></a></div> -->
						</div>
						<a href="#" class="btn btn-primary">Show More</a>
						<div class="space"></div>
						<div ng-if="myProjectsArr.length==0" class="alert alert-danger">
							<p>No Projects Right Now</p>
						</div>
			    </div>
				<div class="col-md-3 pr-0">
					<div class="material-header material-bg">
						<h3 class="home-page-heading">Materials</h2>
					</div>
					<div class="side-material-container">
						<a href="#" class="material-image">
							<img src="image/project-img-1.jpg" alt="project-img-1" width="100%">
							<div class="main-image-con-div">
								<p>akdakljfk</p>
							</div>
						</a>
						<a href="#" class="material-image mr-0">
							<img src="image/project-img-1.jpg" alt="project-img-1" width="100%">
							<div class="main-image-con-div">
								<p>akdakljfk</p>
							</div>
						</a>
					</div>
					<div class="side-material-container">
						<a href="#" class="material-image">
							<img src="image/project-img-1.jpg" alt="project-img-1" width="100%">
							<div class="main-image-con-div">
								<p>akdakljfk</p>
							</div>
						</a>
						<a href="#" class="material-image mr-0">
							<img src="image/project-img-1.jpg" alt="project-img-1" width="100%">
							<div class="main-image-con-div">
								<p>akdakljfk</p>
							</div>
						</a>
					</div>
					<div class="blog-header blog-bg">
						<h3 class="home-page-heading">Blog</h2>
					</div>
					<div class="sm-blog-container" ng-repeat="blog in blogs">
						<div class="image">
							<img ng-src="uploads/{{blog.blog_file}}" alt="project-img-1" width="100%">
						</div>
						<div class="link">
							<a href="./blogs/{{blog.blog_id}}/{{blog.heading}}" ng-click="setBlog(blog)">
								{{blog.heading}}
							</a>
						</div>
					</div>
					<div class="blog-header material-bg">
						<h3 class="home-page-heading">Thesis Report</h2>
					</div>
					<div class="sm-blog-container" ng-repeat="common_thesis_report in common_thesis_reports">
						<div class="link">
							<a href="./full-thesis-report/{{common_thesis_report.thesis_report_name}}" ng-click="setThesisReport(common_thesis_report)">
							{{common_thesis_report.thesis_report_name}}
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

