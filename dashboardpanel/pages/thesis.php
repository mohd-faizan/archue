<section class="section-padding" id="thesis-sec-1" ng-controller="fetchThesisController">
	<div class="home-margin">
		<div class="space"></div>
		<div class="container-fluid ">
			<div class="mb-4">
				<button class="btn btn-primary" ng-click="isShowsApprove()">SEE APPROVE</button>
				<button class="btn btn-primary" ng-click="isShowUnApprove()">SEE UNAPPROVE</button>
			</div>
			<div class="row">
				<div class="col-md-9">
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
								<div ng-if="singlepro.thesis.thesis_approve==1" ng-show="isShowApprove">
									<a href="./full-thesis/{{singlepro.singleThesis.file_name}}" class="text-dark" ng-click="setThesis(singlepro)">
									<img ng-src="../uploads/{{singlepro.singleThesis.file}}" width="100%" height="100%">
										
									</a>
									<a href="./full-thesis/{{singlepro.singleThesis.file_name}}" class="text-dark" ng-click="setThesis(singlepro)">
										<p>{{singlepro.singleThesis.file_name}}</p>
									</a>
								</div>
								<div ng-if="singlepro.thesis.thesis_approve==0" ng-show="!isShowApprove">
									<a href="./full-thesis/{{singlepro.singleThesis.file_name}}" class="text-dark" ng-click="setThesis(singlepro)">
									<img ng-src="../uploads/{{singlepro.singleThesis.file}}" width="100%" height="100%">
										
									</a>
									<a href="./full-thesis/{{singlepro.singleThesis.file_name}}" class="text-dark" ng-click="setThesis(singlepro)">
										<p>{{singlepro.singleThesis.file_name}}</p>
									</a>
								</div>

							</li>
						</ul>
						<div ng-if="res.length==0" class="alert alert-danger">
							No Thesis Found For Such Category
						</div>
					</div>	
				</div>
				
			</div>
			<div class="space"></div>
			<div class="space"></div>
		</div>
	</div>
</section>
