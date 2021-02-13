<section ng-controller="serachController">
	<div class="space"></div>
	<div class="space"></div>
	<section ng-if="isShowProjects">
		<div class="container">
			<div ng-if="myProjectsArr.length>0" ng-repeat="myproject in myProjectsArr|limitTo:myLimit" class="mb-4">
				<div class="project-heading">
					<h2 class="project-heading"><a href="./full-project/{{myproject.mainData.project_id}}/{{myproject.url}}" ng-click=setFullProject(myproject) class="text-dark">{{myproject.mainData.project_name | toUpperCaseFirst}}</a></h2>
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
	                        socialshare-url="http://www.archue.com/full-project/{{myproject.mainData.project_id}}/{{myproject.url}}"
	                        socialshare-popup-height="300"
	                        socialshare-popup-width="400"
	                        socialshare-trigger="click"></span></a>
						<a href=""
						socialshare
                        socialshare-provider="google"
                        socialshare-url="http://www.archue.com/full-project/{{myproject.mainData.project_id}}/{{myproject.url}}"
                        socialshare-popup-height="300"
                        socialshare-popup-width="400"
                        socialshare-trigger="click"><span class="fa fa-google-plus"></span></a>
						<a href=""
						 socialshare
                        socialshare-media="https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcTWGNvatNjOUyli3tBacDdAHmienfptFVStj_olGCWmaUXoIGYI"
                        socialshare-provider="pinterest"
                        socialshare-text="Architect"
                        socialshare-url="http://www.archue.com/full-project/{{myproject.mainData.project_id}}/{{myproject.url}}"
                        socialshare-popup-height="300"
                        socialshare-popup-width="400"
                        socialshare-trigger="click"><span class="fa fa-pinterest"></span></a>
						
						<a href=""
						socialshare
                        socialshare-provider="tumblr"
                        socialshare-type="link"
                        socialshare-text="Architect"
                        socialshare-url="http://www.archue.com/full-project/{{myproject.mainData.project_id}}/{{myproject.url}}"
                        socialshare-popup-height="300"
                        socialshare-popup-width="540"
                        socialshare-trigger="click"><span class="fa fa-tumblr"></span></a>
						<a href=""
						socialshare
                        socialshare-provider="linkedin"
                        socialshare-text="Architect"
                        socialshare-url="http://www.archue.com/full-project/{{myproject.mainData.project_id}}/{{myproject.url}}"
                        socialshare-description="Architect"
                        socialshare-source="Archue"
                        socialshare-popup-height="300"
                        socialshare-popup-width="400"
                        socialshare-trigger="click"><span class="fa fa-linkedin"></span></a>
						
					</div>
					<div class="ml-auto">
						<a href="./full-project/{{myproject.mainData.project_id}}/{{myproject.url}}" ng-click=setFullProject(myproject)>Read More</a>
					</div>
				</div>
				<!-- <div class="d-flex justify-content-end mt-2"><a href="./full-project/{{myproject.mainData.project_id}}/{{myproject.mainData.project_name}}" ng-click=setFullProject(myproject)>Read More&nbsp;<span class="fa fa-arrow-circle-o-right"></span></a></div> -->
			</div>
			<a href="#"   limit-dir></a>
			<div class="space"></div>
			<div ng-if="myProjectsArr.length==0" class="alert alert-danger">
				<p>Data Not Found </p>
			</div>
		</div>
	</section>
	<section ng-if="isShowThesis">
		<div class="container">

			<div class="cur-page-div">
				<a href="./">Archue</a>
				<span class="fa fa-angle-right"></span>
				<span>Project</span>
				<span class="fa fa-angle-right"></span>
				<span>{{category}}</span>
			</div>
			<div class="space"></div>
			<div class="d-flex">
				<div class="project-top-header">
					<h5>{{category}}</h5>
				</div>
				<div class="category">
					<div class="dropdown">
					  <button class="dropdown-toggle" type="button" data-toggle="dropdown">
					    CATEGORY+
					  </button>
					  <div class="dropdown-menu">
					  	<a href="#" class="dropdown-item" ng-click="setCategory($)">All</a>
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
					<li ng-if="res.length>0" ng-repeat="singlepro in res = (fullThesisArr|filter:category) track by $index">
						<a href="./full-thesis/{{singlepro.thesis.thesis_id}}/{{singlepro.singleThesis.file_name}}" class="text-dark" ng-click="setThesis(singlepro)">
							<img ng-src="uploads/{{singlepro.singleThesis.file}}" width="100%" height="100%">
							
						</a>
						<a href="./full-thesis/{{singlepro.thesis.thesis_id}}/{{singlepro.singleThesis.file_name}}" class="text-dark" ng-click="setThesis(singlepro)">
							<p>{{singlepro.thesis.thesis_title | toUpperCaseFirst}}</p>
						</a>
					</li>
				</ul>
				<div ng-if="res.length==0" class="alert alert-danger">
					Data Not Found
				</div>
			</div>	
		</div>
	</section>
	<section ng-if="isShowEvents">
		<div class="container">
			<div class="blog-container border-bottom border-dark p-3" ng-repeat="event in events|limitTo:10">
					<div class="container">
						<div class="row blogs">
							<div class="col-md-12 col-lg-6 col-sm-12">
								<div class="blog-img">
									<img ng-src="upload-file/{{event.event_file}}" class="img-fluid">
								</div>
							</div>
							<div class="col-md-12 col-lg-6 col-sm-12 " >
								<div class="blog-heading border-bottom border-info ">
									<h3>{{event.event_name | toUpperCaseFirst}}</h3>
									<div class="date-time-container">
										<div class="date-time">
											<span class="fa fa-calendar"></span>&nbsp;{{event.event_date|myDate|date:'mediumDate'}}
											<span class="fa fa-clock-o"></span>&nbsp;{{event.event_date|myTime|date:"mediumTime"}}
										</div>
										<div class="user">
											<p><span class="fa fa-user"></span> {{event.eventor_name}}</p>
										</div>
									</div>
									
								</div>
								<div class="blog-content">
									<div ng-bind-html="saintize(event.event_content)">
										
									</div>
								</div>
							</div>
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
				                    socialshare-url="http://www.archue.com/event/{{event.event.event_name}}"
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
			                        socialshare-url="http://www.archue.com/event/{{event.event.event_name}}"
			                        socialshare-popup-height="300"
			                        socialshare-popup-width="400"
			                        socialshare-trigger="click"></span></a>
								<a href=""
								socialshare
		                        socialshare-provider="google"
		                        socialshare-url="http://www.archue.com/event/{{event.event.event_name}}"
		                        socialshare-popup-height="300"
		                        socialshare-popup-width="400"
		                        socialshare-trigger="click"><span class="fa fa-google-plus"></span></a>
								<a href=""
								 socialshare
		                        socialshare-media="https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcTWGNvatNjOUyli3tBacDdAHmienfptFVStj_olGCWmaUXoIGYI"
		                        socialshare-provider="pinterest"
		                        socialshare-text="Architect"
		                        socialshare-url="http://www.archue.com/event/{{event.event.event_name}}"
		                        socialshare-popup-height="300"
		                        socialshare-popup-width="400"
		                        socialshare-trigger="click"><span class="fa fa-pinterest"></span></a>
								
								<a href=""
								socialshare
		                        socialshare-provider="tumblr"
		                        socialshare-type="link"
		                        socialshare-text="Architect"
		                        socialshare-url="http://www.archue.com/event/{{event.event.event_name}}"
		                        socialshare-popup-height="300"
		                        socialshare-popup-width="540"
		                        socialshare-trigger="click"><span class="fa fa-tumblr"></span></a>
								<a href=""
								socialshare
		                        socialshare-provider="linkedin"
		                        socialshare-text="Architect"
		                        socialshare-url="http://www.archue.com/event/{{event.event.event_name}}"
		                        socialshare-description="Architect"
		                        socialshare-source="Archue"
		                        socialshare-popup-height="300"
		                        socialshare-popup-width="400"
		                        socialshare-trigger="click"><span class="fa fa-linkedin"></span></a>
								
							</div>
							<div class="ml-auto">
								<a ng-href="./event/{{event.event_id}}" ng-click="setEvent(event)">Read More</a>
							</div>
					</div>
			</div>
			<div ng-if="events.length==0" class="alert alert-danger">
				Data not found
			</div>
		</div>
	</section>
	<section ng-if="isShowcompetitions">
		<div class="container">
			<div class="blog-container border-bottom border-dark p-3" ng-repeat="competition in competitions|limitTo:10">
				<div class="container-fluid">
					<div class="row blogs">
						<div class="col-md-12 col-lg-6 col-sm-12">
							<div class="blog-img">
								<img ng-src="upload-file/{{competition.competitor_file}}" class="img-fluid">
							</div>
						</div>
						<div class="col-md-12 col-lg-6 col-sm-12 " >
							<div class="blog-heading border-bottom border-info ">
								<h3>{{competition.competition_heading | toUpperCaseFirst}}</h3>
								<div class="date-time-container">
									<div class="date-time">
										<span class="fa fa-calendar"></span>&nbsp;{{competition.competitor_date|myDate|date:"mediumDate"}} 		
										<span class="fa fa-clock-o"></span>&nbsp;{{competition.competitor_date|myTime|date:"mediumTime"}} 	
									</div>
									<div class="user">
										<p><span class="fa fa-user"></span> {{competition.competitor_name}}</p>
									</div>
								</div>
							</div>
							<div class="blog-content">
								<div data-ng-bind-html="sanitize(competition.competitor_content)">
									
								</div>
							</div>
							<!-- <div class="continue-btn pull-right">
								<a ng-href="./competitions/{{competition.competition_heading}}" ng-click="setCompetition(competition)">Continue Reading <span class="fa fa-long-arrow-right"></span></a>
							</div> -->
						</div>
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
				                    socialshare-url="http://www.archue.com/competitions/{{competition.competition_heading}}"
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
			                        socialshare-url="http://www.archue.com/competitions/{{competition.competition_heading}}"
			                        socialshare-popup-height="300"
			                        socialshare-popup-width="400"
			                        socialshare-trigger="click"></span></a>
								<a href=""
								socialshare
		                        socialshare-provider="google"
		                        socialshare-url="http://www.archue.com/competitions/{{competition.competition_heading}}"
		                        socialshare-popup-height="300"
		                        socialshare-popup-width="400"
		                        socialshare-trigger="click"><span class="fa fa-google-plus"></span></a>
								<a href=""
								 socialshare
		                        socialshare-media="https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcTWGNvatNjOUyli3tBacDdAHmienfptFVStj_olGCWmaUXoIGYI"
		                        socialshare-provider="pinterest"
		                        socialshare-text="Architect"
		                        socialshare-url="http://www.archue.com/competitions/{{competition.competition_heading}}"
		                        socialshare-popup-height="300"
		                        socialshare-popup-width="400"
		                        socialshare-trigger="click"><span class="fa fa-pinterest"></span></a>
								
								<a href=""
								socialshare
		                        socialshare-provider="tumblr"
		                        socialshare-type="link"
		                        socialshare-text="Architect"
		                        socialshare-url="http://www.archue.com/competitions/{{competition.competition_heading}}"
		                        socialshare-popup-height="300"
		                        socialshare-popup-width="540"
		                        socialshare-trigger="click"><span class="fa fa-tumblr"></span></a>
								<a href=""
								socialshare
		                        socialshare-provider="linkedin"
		                        socialshare-text="Architect"
		                        socialshare-url="http://www.archue.com/competitions/{{competition.competition_heading}}"
		                        socialshare-description="Architect"
		                        socialshare-source="Archue"
		                        socialshare-popup-height="300"
		                        socialshare-popup-width="400"
		                        socialshare-trigger="click"><span class="fa fa-linkedin"></span></a>
								
							</div>
							<div class="ml-auto">
								<a ng-href="./competition/{{competition.competitor_id}}" ng-click="setCompetition(competition)">Read More</a>
							</div>
			     </div>
			</div>
			<div ng-if="competitions.length==0" class="alert alert-danger">
				Data Not Found
			</div>
		</div>
	</section>
	<section ng-if="isShowJobs">
		<div class="container">
			<div class="row">
				<div class="col-lg-9 col-md-7 col-sm-12">
					<div class="blog-container border-bottom border-dark p-3" ng-repeat="job in jobs|limitTo:10">
						<div class="container-fluid">
							<div class="row blogs" >
								<div class="col-md-12 col-lg-6 col-sm-12">
									<div class="blog-img">
										<img ng-src="upload-file/{{job.job_file}}" class="img-fluid">
									</div>
								</div>
								<div class="col-md-12 col-lg-6 col-sm-12 " >
									<div class="blog-heading border-bottom border-info ">
										<h3>{{job.job_heading | toUpperCaseFirst}}</h3>
										<div class="date-time-container">
											<div class="date-time">
												<span class="fa fa-calendar"></span>&nbsp;{{job.job_date|myDate|date:"mediumDate"}}
												<span class="fa fa-clock-o"></span>&nbsp;{{job.job_date|myTime|date:"mediumTime"}}
											</div>
											<div class="user">
												<p><span class="fa fa-user"></span> {{job.job_provider_name}}</p>
											</div>
										</div>
									</div>
									<div class="blog-content">
										<div data-ng-bind-html="sanitize(job.job_content)">
											
										</div>
									</div>
									<!-- <div class="continue-btn pull-right">
										<a ng-href="./job/{{job.job_heading}}" ng-click="setJob(job)">Continue Reading <span class="fa fa-long-arrow-right"></span></a>
									</div> -->
								</div>
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
						                    socialshare-url="http://www.archue.com/job/{{job.job_heading}}"
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
					                        socialshare-url="http://www.archue.com/job/{{job.job_heading}}"
					                        socialshare-popup-height="300"
					                        socialshare-popup-width="400"
					                        socialshare-trigger="click"></span></a>
										<a href=""
										socialshare
				                        socialshare-provider="google"
				                        socialshare-url="http://www.archue.com/job/{{job.job_heading}}"
				                        socialshare-popup-height="300"
				                        socialshare-popup-width="400"
				                        socialshare-trigger="click"><span class="fa fa-google-plus"></span></a>
										<a href=""
										 socialshare
				                        socialshare-media="https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcTWGNvatNjOUyli3tBacDdAHmienfptFVStj_olGCWmaUXoIGYI"
				                        socialshare-provider="pinterest"
				                        socialshare-text="Architect"
				                        socialshare-url="http://www.archue.com/job/{{job.job_heading}}"
				                        socialshare-popup-height="300"
				                        socialshare-popup-width="400"
				                        socialshare-trigger="click"><span class="fa fa-pinterest"></span></a>
										
										<a href=""
										socialshare
				                        socialshare-provider="tumblr"
				                        socialshare-type="link"
				                        socialshare-text="Architect"
				                        socialshare-url="http://www.archue.com/job/{{job.job_heading}}"
				                        socialshare-popup-height="300"
				                        socialshare-popup-width="540"
				                        socialshare-trigger="click"><span class="fa fa-tumblr"></span></a>
										<a href=""
										socialshare
				                        socialshare-provider="linkedin"
				                        socialshare-text="Architect"
				                        socialshare-url="http://www.archue.com/job/{{job.job_heading}}"
				                        socialshare-description="Architect"
				                        socialshare-source="Archue"
				                        socialshare-popup-height="300"
				                        socialshare-popup-width="400"
				                        socialshare-trigger="click"><span class="fa fa-linkedin"></span></a>
										
									</div>
									<div class="ml-auto">
										<a ng-href="./job/{{job.job_id}}" ng-click="setJob(job)">Read More</a>
									</div>
								</div>
					</div>
					<div ng-if="jobs.length==0" class="alert alert-danger">
						Data not found
					</div>
				</div>
			</div>
		</div>
	</section>
	<section ng-if="isShowMaterial">
			<div class="container">
				<div class="row">
					<div class="col-lg-9 col-md-7 col-sm-12">
						<ul class="projects" >
							<li ng-repeat="material in materials as res track by $index">
								<a href="./material/{{material.material_upload_id}}/{{material.product_name}}" ng-click="setMaterial(material)" class="text-dark">
									<img ng-src="upload-file/{{material.product_image|getSingleImage}}" width="100%" height="100%">
								</a>
								<a href="./material/{{material.material_upload_id}}/{{material.product_name}}" ng-click="setMaterial(material)" class="text-dark">
									<p>{{material.product_name | toUpperCaseFirst}}</p>
								</a>
							</li>
							<!-- <li class="alert alert-danger" ng-if="res.length==0" style="flex-basis:100%!important">
								<small>No Data Found</small>
							</li> -->
						</ul>
						<div ng-if="materials.length==0" class="alert alert-danger">
							Data not found
						</div>
					</div>
				</div>
			</div>
			
	</section>
	<div class="space"></div>
	<div class="space"></div>
</section>