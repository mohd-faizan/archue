<section  ng-controller="projectsController" id="project-sec">
	<div class="home-margin" ng-controller="studentWorkController">
		<div class="space"></div>
		<div class="container-fluid " ng-if="myStudentProjectsArr">
			<div class="row">
				<div class="col-md-9">
					<div class="cur-page-div">
						<a href="./">Archue</a>
						<span class="fa fa-angle-right"></span>
						<a href="studentwork">Student Work</a>
						<span class="fa fa-angle-right"></span>
						<span>
							<span ng-if="category">{{category}}</span>
							<span ng-if="category==undefined">All</span>
							<span ng-if="category==''">All</span>
						</span>
					</div>
					<div class="space"></div>
					<div class="d-flex">
						<div class="project-top-header">
							<h5>{{category}}</h5>
						</div>
						<div class="category">
							<div class="dropdown">
							<button class="dropdown-toggle bg-color" type="button" data-toggle="dropdown">
								CATEGORY+
							</button>
							<div class="dropdown-menu">
								<a href="#" class="dropdown-item"  ng-click="setCategory($)">All</a>
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
							<li ng-if="res.length>0" ng-repeat="singlepro in res = (myStudentProjectsArr|filter:category) track by $index">
								<a ng-href="./full-project/{{singlepro.mainData.project_id}}/{{singlepro.url}}" ng-click="setFullProject(singlepro)" class="text-dark">
									<img ng-src="uploads/{{singlepro.mainImage}}" width="100%" height="100%">
								</a>
								<a href="./full-project/{{singlepro.mainData.project_id}}/{{singlepro.url}}" ng-click="setFullProject(singlepro)" class="text-dark">
									<p>{{singlepro.mainData.project_name | toUpperCaseFirst}}</p>
								</a>
							</li>
						</ul>
						<nav aria-label="pagination" ng-if="(myStudentProjectsArr|filter:category).length > 0">
                        <ul class="pagination justify-content-center">
                            <li class="page-item" ng-class="{'disabled': active === 1}">
                                <a class="page-link" href="#" tabindex="-1" ng-click="prev()">Previous</a>
                            </li>
                            <li class="page-item" ng-class="{'active': active === ($index +1)}" ng-repeat="page in paginations track by $index"><a class="page-link" href="#" ng-click="toPage($index+1)">{{$index+1}}</a></li>

                            <li class="page-item" ng-class="{'disabled': active === paginations.length}">
                                <a class="page-link" href="#" ng-click="next()">Next</a>
                            </li>
                        </ul>
                    </nav>
						<div ng-if="res.length==0" class="alert alert-danger">
							No Projects 
						</div>
						
					</div>	
				</div>
				<div class="col-md-3 pr-0">
					<div ng-include="'include/sidematerial.php'" style="margin-top:3rem;"></div>
				</div>
			</div>
		</div>
		<div ng-if="!myStudentProjectsArr" ng-include="'../include/loader.php'"></div>
	</div>
</section>