<div class="space"></div>
<div class="space"></div>
<div class="home-margin" ng-controller="fullThesisController">
	<a href="./home">Archue</a>><a href="/thesis">Thesis></a><a href="#">{{thesis.thesis.thesis_proj_type}}></a><a href="full-thesis/{{thesis.thesis.thesis_id}}/{{thesis.thesis.url}}"><b>{{thesis.singleThesis.file_name | toUpperCaseFirst}}</b></a>
	<br />
	<br />
	<section id="home-sec-2" ng-if="thesis">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-9">
					<div class="project-heading">
						<h2 class="home-page-heading">{{thesis.singleThesis.file_name | toUpperCaseFirst}}</h2>
						<small>{{thesis.thesis.thesis_date|myDate|date:"mediumDate"}},{{thesis.thesis.thesis_date|myTime|date:"shortTime"}}</small>
					</div>
					<br>
					<div class="whats-app-btn">
						<a class="font-bold" socialshare socialshare-provider="whatsapp" socialshare-url="{{thesis.thesis.whatsapp}}">
							<i class="fa fa-whatsapp"></i> Share in Whatsapp
						</a>
					</div>
					<div class="full-project-image">
						<a href="uploads/{{thesis.singleThesis.file}}" data-lightbox="thesis_images">
							<img ng-src="uploads/{{thesis.singleThesis.file}}" width="100%" ng-click="setImages(thesis.images)">
						</a>
						<!-- <p class="mt-4">{{thesis.thesis.project_desc}}</p> -->
					</div>

					<div class="space"></div>
					<div class="space"></div>
					<div class="table-data">
						<table width="100%">
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
						<div class="project-share-option">
							<div>
								<a href="" class="fa {{thesis.thesis.like ? 'fa-heart text-danger' : 'fa-heart-o'}}" ng-click="increaseLike()">&nbsp;{{thesis.thesis.likes}}</a>
								<a href=""><span class="fa fa-eye"></span>&nbsp;{{thesis.thesis.views}}</a>

								<!-- ==================================== -->
								<a href=""><span class="fa fa-facebook" socialshare socialshare-provider="facebook" socialshare-type="sharer" socialshare-via="167503137442216" socialshare-url="https://www.archue.com/full-thesis/{{thesis.thesis.thesis_id}}/{{thesis.thesis.url}}" socialshare-redirect-uri="https://google.com" socialshare-popup-height="450" socialshare-popup-width="350" socialshare-trigger="click"></span></a>

								<a href=""><span class="fa fa-twitter" socialshare socialshare-provider="twitter" socialshare-hashtags="Architect, development, internet" socialshare-via="twitter" socialshare-text="" socialshare-url="https://www.archue.com/full-thesis/{{thesis.thesis.thesis_id}}/{{thesis.thesis.url}}" socialshare-popup-height="450" socialshare-popup-width="350" socialshare-trigger="click"></span></a>

								<a href="" socialshare socialshare-provider="google" socialshare-url="https://www.archue.com/full-thesis/{{thesis.thesis.thesis_id}}/{{thesis.thesis.url}}" socialshare-popup-height="450" socialshare-popup-width="350" socialshare-trigger="click"><span class="fa fa-google-plus"></span></a>

								<a href="" socialshare socialshare-provider="pinterest" socialshare-media="https://www.archue.com/uploads/{{thesis.singleThesis.file}}" socialshare-text="{{thesis.singleThesis.file_name}}" socialshare-url="https://www.archue.com/full-thesis/{{thesis.thesis.thesis_id}}/{{thesis.thesis.url}}" socialshare-popup-height="450" socialshare-popup-width="350" socialshare-trigger="click"><span class="fa fa-pinterest"></span></a>

								<a href="" socialshare socialshare-provider="tumblr" socialshare-media="https://www.archue.com/uploads/{{thesis.singleThesis.file}}" socialshare-text="{{thesis.singleThesis.file_name}}" socialshare-url="https://www.archue.com/full-thesis/{{thesis.thesis.thesis_id}}/{{thesis.thesis.url}}" socialshare-popup-height="450" socialshare-popup-width="350" socialshare-trigger="click"><span class="fa fa-tumblr"></span></a>

								<a href="" socialshare socialshare-provider="linkedin" socialshare-url="https://www.archue.com/full-thesis/{{thesis.thesis.thesis_id}}/{{thesis.thesis.url}}" socialshare-text="{{thesis.singleThesis.file_name}}" socialshare-description="{{thesis.thesis.thesis_guide}}" socialshare-source="https://www.archue.com/full-thesis/{{thesis.thesis.thesis_id}}/{{thesis.thesis.url}}" socialshare-popup-height="450" socialshare-popup-width="350" socialshare-trigger="click"><span class="fa fa-linkedin"></span></a>
							</div>
						</div>
					</div>
					<div class="project-images mt-4" ng-if="thesis.thesis.plan">
						<a href="uploads/{{thesis.thesis.plan|getSingleImage}}" data-lightbox="thesis_images">
							<img ng-src="uploads/{{thesis.thesis.plan|getSingleImage}}" width="100%">
						</a>
						<!-- <p class="mt-4">{{fullProject.mainData.site_image_desc}}</p> -->
					</div>
					<div class="space"></div>
					<div class="project-images mt-4" ng-if="thesis.thesis.elevation">
						<a href="uploads/{{thesis.thesis.elevation|getSingleImage}}" data-lightbox="thesis_images">
							<img ng-src="uploads/{{thesis.thesis.elevation|getSingleImage}}" width="100%">
						</a>
						<!-- <p class="mt-4">{{fullProject.mainData.elevation_image_desc}}</p> -->
					</div>
					<div class="space"></div>
					<div class="project-images mt-4" ng-if="thesis.thesis.conceptsheet">
						<a href="uploads/{{thesis.thesis.conceptsheet|getSingleImage}}">
							<img ng-src="uploads/{{thesis.thesis.conceptsheet|getSingleImage}}" width="100%">
						</a>
						<!-- <p class="mt-4"> {{fullProject.mainData.section_image_desc}}</p> -->
					</div>
					<div class="space"></div>
					<div class="project-images mt-4" ng-if="thesis.thesis.casestudy">
						<a href="uploads/{{thesis.thesis.casestudy|getSingleImage}}" data-lightbox="thesis_images">
							<img ng-src="uploads/{{thesis.thesis.casestudy|getSingleImage}}" width="100%">
						</a>
						<!-- <p class="mt-4"> {{thesis.thesis.casestudy|getSingleImage}}</p> -->
					</div>
					<div class="space"></div>
					<div class="project-images mt-4" ng-if="thesis.thesis.siteplan">
						<a href="uploads/{{thesis.thesis.siteplan|getSingleImage}}" data-lightbox="thesis_images">
							<img ng-src="uploads/{{thesis.thesis.siteplan|getSingleImage}}" width="100%">
						</a>
					</div>
					<p><b>View More Images Of The Thesis</b></p>
					<div class="mycontainer">
						<div class="samll-img" ng-repeat="myimage in thesis.thesis.images track by $index">
							<a href="uploads/{{myimage}}" data-lightbox="thesis_images">
								<img src="uploads/{{myimage}}" width="100%" height="100%">
							</a>
						</div>
						<div class="samll-img" style="opacity: 0">

						</div>
						<!-- <div class="samll-img">
							<img src="image/project-img-1.jpg" width="100%" height="100%">
							<div class="img-no" ng-click="setImages(thesis.images)">+{{thesis.images.length}}</div>
						</div> -->
					</div>
					<div class="space"></div>

					<div class="next-prev-container">
						<div class="prev">
							<!-- <button ng-click="next(fullProject.mainData.project_id,false)"><<&nbsp;Prev</button> -->
							<a ng-href="./full-thesis/{{prev.thesis_id}}/{{prev.url}}" ng-if="prev!=undefined">
								<div class="mr-auto">
									<img ng-src="uploads/{{prev.casestudy|getSingleImage}}" height="50" width="50">
								</div>
								<div>
									<span>{{prev.thesis_title|uppercase}}</span>
									<span>PREVIOUS THESIS</span>
								</div>
							</a>
						</div>
						<div class="next">
							<!-- <button ng-click="next(fullProject.mainData.project_id,true)">Next&nbsp;>></button> -->
							<a ng-href="./full-thesis/{{nxt.thesis_id}}/{{nxt.url}}" ng-if="nxt!=undefined">
								<div>
									<span>{{nxt.thesis_title|uppercase}}</span>
									<span>NEXT THESIS</span>
								</div>
								<div class="ml-auto">
									<img ng-src="uploads/{{nxt.casestudy|getSingleImage}}" height="50" width="50">
								</div>
							</a>
						</div>
					</div>
					<div class="space"></div>
				</div>
				<div class="col-md-3">
					<br>
					<!-- Similar Thesis -->
					<div class="card shadow">
						<div class="card-header blog-bg text-white font-weight-bold">Similar Thesis</div>
						<ul class="list-group list-group-flush">
							<li class="list-group-item p-0 mt-0 link" ng-repeat="thesis in similarThesises">
								<a href="./blogs/{{blog.blog_id}}/{{blog.url}}" ng-click="similar(thesis.thesis_id,thesis.thesis_title)" class="sm-blog-container mt-0">
									<div class="image">
										<img ng-src="uploads/{{thesis.casestudy|getSingleImage}}" alt="project-img-1" width="100%">
									</div>
									<div class="line-height p-3">
									{{thesis.thesis_title | toUpperCaseFirst}}
									</div>
								</a>
							</li>
						</ul>
						<div class="alert alert-danger mb-0" ng-if="similarThesises.length == 0">
							<p>No Similar Thesis Found! </p>
						</div>
					</div>
					<!-- End of Similar Thesis -->

					<br><br>

					<!-- Included Side Material -->
					<div ng-include="'include/sidematerial.php'"></div>
					<!-- End of Side Material -->

					<!-- <section class="hide-on-small-screeen">
						<div class="material-header material-bg ">
							<h3 class="home-page-heading">Similar Thesis</h2>
						</div>
						<div class="side-material-container link">
							<a ng-href="#" ng-click="similar(thesis.thesis_id,thesis.thesis_title)" class="material-image" ng-repeat="thesis in similarThesises">
								<img ng-src="uploads/{{thesis.casestudy|getSingleImage}}" alt="thesis-img-1" width="100%">
								<div class="main-image-con-div">
									<p>{{thesis.thesis_title | toUpperCaseFirst}}</p>
								</div>
							</a>
						</div>
						<div class="alert alert-danger" ng-if="similarThesises!='undefind'">
							<span>Not Found !</span>
						</div>
					</section>
					<br />
					<div ng-include="'include/sidematerial.php'" style="margin-top: -3.65rem"></div> -->
				</div>
			</div>
		</div>
	</section>
	<div ng-if="!thesis" ng-include="'../include/loader.php'"></div>
</div>