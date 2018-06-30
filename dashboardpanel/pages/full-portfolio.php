<div class="space"></div>
<section id="full-portfolio-sec-1" ng-controller="fullPortfolioController">
	<div class="container">
		<div class="mb-4">
			<button class="btn btn-danger" ng-click="del(portfolio.portfolio_id)">DELETE THIS PORTFOLIO</button>
		</div>
		<div class="row">
			<div class="col-lg-3 col-md-3 col-sm-12">
				<div class="file-details">
					<div class="content-data">
						<h5>{{portfolio.portfolio_name}}</h5>
						<p class="p-text">{{portfolio.portfolio_place}}</p>
					</div>
				</div>
				<!-- <div class="advertisement-div">
					<div class="blog-header material-bg">
						<h3 class="home-page-heading">Similar Document</h2>
					</div>
					<div class="sm-blog-container" ng-repeat="similarPort in similarPorts">
						<div class="link">
							<a href="./full-portfolio/{{similarPort.url}}" ng-click="setportfolio(similarPort)">
							{{similarPort.portfolio_name}}
							</a>
						</div>
					</div>
				</div> -->
			</div>
			<div class="col-lg-9 col-md-9 col-sm-12">
				<iframe ng-src="{{url}}" width="100%" height="800px" ></iframe>
				<!-- <iframe src="http://docs.google.com/gview?url=localhost/angularjs/archue/upload-file/{{portfolio.portfolio_file}}"></iframe> -->
				
			</div>
		</div>
	</div>
</section>