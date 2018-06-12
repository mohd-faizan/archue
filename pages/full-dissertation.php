<div class="space"></div>
<section id="full-dissertation-sec-1" ng-controller="fetchFullDessert">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-3 col-sm-12">
				<div class="file-details">
					<div class="content-data">
						<h5>{{dessertation.dessertation_name}}</h5>
						<p class="p-text">{{dessertation.dessertation_place}}</p>
					</div>
				</div>
				<div class="advertisement-div">
					<div class="blog-header material-bg">
						<h3 class="home-page-heading">Similar Document</h2>
					</div>
					<div class="sm-blog-container" ng-if="similarDessertations.length>0" ng-repeat="similarDessertation in similarDessertations">
						<div class="link">
							<a href="./full-dissertation/{{similarDessertation.dessertation_name}}" ng-click="setDessertation(similarDessertation)">
							{{similarDessertation.dessertation_name}}
							</a>
						</div>
					</div>
					<div ng-if="similarDessertations.length==0" class="alert alert-danger">
						No Similar Projects
					</div>
				</div>
			</div>
			<div class="col-lg-9 col-md-9 col-sm-12">
				<iframe ng-src="{{url}}" width="100%" height="800px"></iframe>
			</div>
		</div>
	</div>
</section>