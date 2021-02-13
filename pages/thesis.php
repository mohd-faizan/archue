<section class="section-padding" id="thesis-sec-1" ng-controller="fetchThesisController">
	<div class="home-margin" >
		<div class="space"></div>
		<div class="container-fluid " ng-if="fullThesisArr">
			<div class="row">
				<div class="col-md-9">
					<div class="cur-page-div">
						<a href="./">Archue</a>
						<span class="fa fa-angle-right"></span>
						<a href="/thesis">Thesis</a>
						<span class="fa fa-angle-right"></span>
						<a>{{category | toUpperCaseFirst}}</a>
						<span ng-if="category==undefined">All</span>
						<span ng-if="category==''">All</span>
					</div>
					<div class="space"></div>
					<div class="d-flex">
						<div class="project-top-header">
							<h5>{{category | toUpperCaseFirst}}</h5>
							<h5 ng-if="category==undefined">All</h5>
							<h5 ng-if="category==''">All</h5>
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
						</div>
					</div>

					<div class="yellow-line bg-color"></div>

					<div class="project-container">
						<ul class="projects" >
							<li ng-if="res.length>0" ng-repeat="singlepro in res = (fullThesisArr|filter:category) track by $index">
								<a href="./full-thesis/{{ singlepro.thesis.thesis_id }}/{{singlepro.singleThesis.url}}" class="text-dark" ng-click="setThesis(singlepro)">
									<img ng-src="uploads/{{singlepro.singleThesis.file}}" width="100%" height="100%">
									
								</a>
								<a href="./full-thesis/{{ singlepro.thesis.thesis_id }}/{{singlepro.singleThesis.url}}" class="text-dark" ng-click="setThesis(singlepro)">
									<p>{{singlepro.singleThesis.file_name | toUpperCaseFirst}}</p>
								</a>
							</li>
						</ul>
					<nav aria-label="pagination" ng-if="(fullThesisArr|filter:category).length > 0">
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
						<!-- <div>
							<a href="#" class="btn btn-primary" ng-click="increaseLimit()" ng-if="res.length>10">Load More</a>
						</div> -->
						<div ng-if="res.length==0" class="alert alert-danger">
							No Thesis Found For Such Category
						</div>
					</div>	
				</div>

				<div class="col-md-3 pr-0">
					<div ng-include="'include/sidematerial.php'" style="margin-top:3rem;"></div>
				</div>
			</div>
			<div class="space"></div>
			<div class="space"></div>
		</div>
		<div ng-if="!fullThesisArr" ng-include="'../include/loader.php'"></div>
	</div>
</section>
