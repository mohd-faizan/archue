<div class="home-margin" ng-controller="myHomeController">
	<section id="home-sec-2">
		<div class="container-fluid">
			<div class="mb-4">
				<button class="btn  btn-primary" ng-click="isShowUnApprove()">SEE UNAPPROVE PROJECTS</button>
				<button class="btn  btn-primary" ng-click="isShowsApprove()">SEE APPROVE PROJECTS</button>
			</div>
			<div ng-if="myProjectsArr.length>0" ng-repeat="myproject in myProjectsArr|limitTo:10" class="mb-4" >
				<div ng-if="myproject.mainData.project_approve==1" ng-show="isShowApprove">
					<div class="project-heading">
						<h2 class="project-heading"><a href="./full-project/{{myproject.mainData.project_id}}/{{myproject.url}}" ng-click="setFullProject(myproject)" class="text-dark">{{myproject.mainData.project_name}}</a></h2>
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
				</div>
				<div ng-if="myproject.mainData.project_approve==0" ng-show="!isShowApprove">
					<div class="project-heading">
						<h2 class="project-heading"><a href="./full-project/{{myproject.mainData.project_id}}/{{myproject.url}}" ng-click="setFullProject(myproject)" class="text-dark">{{myproject.mainData.project_name}}</a></h2>
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
				</div>
			</div>
		</div>
	</section>
</div>