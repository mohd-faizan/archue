<div my-nav></div>
<div class="space"></div>
<div class="space"></div><div class="space"></div>
<div class="space"></div>
<div class="home-margin" ng-controller="myHomeController">
	<section id="home-sec-2">
		<div class="container-fluid " >
			<div class="mb-4">
				<div class="tab-btn">
					<button class="btn" ng-class="{'btn-primary':!isShowApprove}" ng-click="isShowUnApprove()">SEE APPROVE PROJECTS</button>
					<button class="btn" ng-class="{'btn-primary':isShowApprove}" ng-click="isShowsApprove()">SEE UNAPPROVE PROJECTS</button>
				</div>
			</div>
			<div class="row" ng-if="myProjectsArr.length > 0">
				
				<!-- Approved -->
				<div class="border border-dark mb-4 col-md-4 p-2" ng-if="myproject.mainData.project_approve==0" ng-show="isShowApprove" ng-repeat="myproject in myProjectsArr">
					
					<!-- Uploader Details -->
					<span><b>Uploaded By:</b>{{myproject.mainData.name}}</span>
					<h2 class="project-heading"><a href="./project/{{myproject.mainData.project_id}}/{{myproject.url}}" ng-click="setFullProject(myproject)" class="text-dark">{{myproject.mainData.project_name}}</a></h2>
					<small>{{myproject.mainData.project_time|myTime}},{{myproject.mainData.project_date|date:"fullDate"}}</small>

					<!-- Project Img -->
					<div class="full-project-image">
						<a href="./project/{{myproject.mainData.project_id}}/{{myproject.url}}" ng-click=setFullProject(myproject)><img ng-src="../uploads/{{myproject.mainImage}}" width="100%"></a>
					</div>

					<!-- Feeback Button -->
					<div class="mt-2"><button class="btn btn-primary" ng-click="fetchFeedback(myproject.mainData.project_id)">See Upload Feedback</button></div>
				</div>

				<!-- UnApproved -->
				<div class="border border-dark mb-4 col-md-4 p-2" ng-if="myproject.mainData.project_approve==1" ng-show="!isShowApprove" ng-repeat="myproject in myProjectsArr">
					
					<!-- Uploader Details -->
					<span><b>Uploaded By:</b>{{myproject.mainData.name}}</span>
					<h2 class="project-heading"><a href="./project/{{myproject.mainData.project_id}}/{{myproject.url}}" ng-click="setFullProject(myproject)" class="text-dark">{{myproject.mainData.project_name}}</a></h2>
					<small>{{myproject.mainData.project_time|myTime}},{{myproject.mainData.project_date|date:"fullDate"}}</small>

					<!-- Project Img -->
					<div class="full-project-image">
						<a href="./project/{{myproject.mainData.project_id}}/{{myproject.url}}" ng-click=setFullProject(myproject)><img ng-src="../uploads/{{myproject.mainImage}}" width="100%"></a>
					</div>

					<!-- Feedback Button -->
					<div class="mt-2"><button class="btn btn-primary" ng-click="fetchFeedback(myproject.mainData.project_id)" fetch-modal>See Upload Feedback</button></div>
				</div>
			</div>
		</div>
	</section>
	<section id="image-viewer" ng-if="isShowFeed">
		<div class="my-image-container" ng-controller="projectFeedCtrl">
			<div class="images" style="align-items: stretch;min-height: 40%">
				<h1>Project Feddback</h1>
				<div ng-if="feedbacks.length>0"  style="flex-basis: 100%">
					<div><span class="badge badge-success p-2"> {{feedbacks[0].stars}}&nbsp;&nbsp;<span class="fa fa-star"></span></span></div>
					<p style="font-size: 1.5rem">{{feedbacks[0].feedback}}</p>
				</div>
				<div ng-if="feedbacks.length==0" style="flex-basis: 100%">
						There is no Feedback
				</div>
				<button ng-click="close()" class="btn btn-danger">Close</button>
			</div>
		</div>
	</section>
</div>

<!-- <div ng-if="myProjectsArr.length > 0" ng-repeat="myproject in myProjectsArr|limitTo:10" class="mb-4" >
	<div ng-if="myproject.mainData.project_approve==0" ng-show="isShowApprove">
		<div class="project-heading">
			<span><b>Uploaded By:</b>{{myproject.mainData.name}}</span>
			<h2 class="project-heading"><a href="./project/{{myproject.mainData.project_id}}/{{myproject.url}}" ng-click="setFullProject(myproject)" class="text-dark">{{myproject.mainData.project_name}}</a></h2>
			<small>{{myproject.mainData.project_time|myTime}},{{myproject.mainData.project_date|date:"fullDate"}}</small>
		</div>
		<div class="full-project-image">
			<a href="./project/{{myproject.mainData.project_id}}/{{myproject.url}}" ng-click=setFullProject(myproject)><img ng-src="../uploads/{{myproject.mainImage}}" width="100%"></a>
		</div>
		<div class="mycontainer">
			<div class="samll-img" ng-repeat="myimage in myproject.images|limitTo:4 track by $index" >
				<img src="../uploads/{{myimage}}" width="100%" height="100%">
			</div>
			
			<div class="samll-img">
				<img src="../image/project-img-1.jpg" width="100%" height="100%">
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
		<a href="./project/{{myproject.mainData.project_id}}/{{myproject.url}}" ng-click=setFullProject(myproject)>Read More</a>
		<div class="mt-2"><button class="btn btn-primary" ng-click="fetchFeedback(myproject.mainData.project_id)">See Upload Feedback</button></div>
	</div>

	<div ng-if="myproject.mainData.project_approve==1" ng-show="!isShowApprove">
		<div class="project-heading">
			<span><b>Uploaded By:</b>{{myproject.mainData.name}}</span>
			<h2 class="project-heading"><a href="./project/{{myproject.mainData.project_id}}/{{myproject.url}}" ng-click="setFullProject(myproject)" class="text-dark">{{myproject.mainData.project_name}}</a></h2>
			<small>{{myproject.mainData.project_time|myTime}},{{myproject.mainData.project_date|date:"fullDate"}}</small>
		</div>
		<div class="full-project-image">
			<a href="./project/{{myproject.mainData.project_id}}/{{myproject.url}}" ng-click=setFullProject(myproject)><img ng-src="../uploads/{{myproject.mainImage}}" width="100%"></a>
		</div>
		<div class="mycontainer">
			<div class="samll-img" ng-repeat="myimage in myproject.images|limitTo:4 track by $index" >
				<img src="../uploads/{{myimage}}" width="100%" height="100%">
			</div>
			
			<div class="samll-img">
				<img src="../image/project-img-1.jpg" width="100%" height="100%">
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
		<a href="./project/{{myproject.mainData.project_id}}/{{myproject.url}}" ng-click=setFullProject(myproject)>Read More</a>
		<div class="mt-2"><button class="btn btn-primary" ng-click="fetchFeedback(myproject.mainData.project_id)" fetch-modal>See Upload Feedback</button></div>
	</div>
</div> -->