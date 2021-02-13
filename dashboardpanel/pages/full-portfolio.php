<div my-nav></div>
<div class="space"></div>
<section id="full-portfolio-sec-1" ng-controller="fullPortfolioController">
	<div class="container">
		<div class="mb-4 mt-6">
			<button class="btn btn-primary" ng-click="approve(portfolio.portfolio_id)" ng-if="portfolio.portfolio_approve==0">APPROVE THIS PORTFOLIO</button>
			<button class="btn btn-danger" ng-click="del(portfolio.portfolio_id)">DELETE THIS PORTFOLIO</button>
		</div>
		<div class="row">
			<div class="col-lg-3 col-md-3 col-sm-12">
				<div class="file-details">
					<div class="content-data">
						<h5>{{portfolio.portfolio_name}}</h5>
						<p><b>Name</b>&nbsp;&nbsp;{{portfolio.name}}</p>
						<p><b>College</b>&nbsp;&nbsp;{{portfolio.portfolio_college}}</p>
						<p><b>Year</b>&nbsp;&nbsp;{{portfolio.portfolio_year}}</p>
					</div>
				</div>
			</div>
			<div class="col-lg-9 col-md-9 col-sm-12">
				<iframe ng-src="{{url}}" width="100%" height="800px" ></iframe>
			</div>
		</div>
	</div>
</section>