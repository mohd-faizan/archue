<div my-nav></div>
<section class="section-padding" id="portfolio-sec-1" ng-controller="fetchPortfolioController">
	<div class="home-margin">
		<button class="btn" ng-click="isShowUnApprove()" ng-class="{'btn-primary':!isShowApprove}">SEE APPROVE PORTFOLIO</button>
		<button class="btn" ng-click="isShowsApprove()" ng-class="{'btn-primary':isShowApprove}">SEE UNAPPROVE PORTFOLIO</button>
		
		<div class="space"></div>
		<div class="container-fluid">
			<div class="row">
				<div class="conntent-div mb-4 col-md-3 ml-2" ng-if="portfolio.portfolio_approve==0" ng-show="isShowApprove" ng-repeat="portfolio in portfolios">
					<p><b>Uploaded By:</b>{{portfolio.name}}</p>
					<div class="content-box">
						<div class="content-img">
							<a href="./full-portfolio/{{portfolio.url}}" ng-click="setportfolio(portfolio)"><img src="../image/pdf-icon.png"></a>
						</div>
						<div class="content-data">
							<h5><a href="./full-portfolio/{{portfolio.url}}" ng-click="setportfolio(portfolio)" class="text-dark">{{portfolio.portfolio_name}}</a></h5>
							<p class="p-text">{{portfolio.portfolio_place}}</p>
							<div class="file-link pull-right">
								<a href="./full-portfolio/{{portfolio.url}}" ng-click="setportfolio(portfolio)">Show Portfolio <span class="fa fa-long-arrow-right"></span></a>
							</div>
						</div>
					</div>
				</div>
				<div class="conntent-div mb-4 col-md-3 ml-2" ng-if="portfolio.portfolio_approve==1" ng-show="!isShowApprove" ng-repeat="portfolio in portfolios">
					<p><b>Uploaded By:</b>{{portfolio.name}}</p>
					<div class="content-box">
						<div class="content-img">
							<a href="./full-portfolio/{{portfolio.url}}" ng-click="setportfolio(portfolio)"><img src="../image/pdf-icon.png"></a>
						</div>
						<div class="content-data">
							<h5><a href="./full-portfolio/{{portfolio.url}}" ng-click="setportfolio(portfolio)" class="text-dark">{{portfolio.portfolio_name}}</a></h5>
							<p class="p-text">{{portfolio.portfolio_place}}</p>
							<div class="file-link pull-right">
								<a href="./full-portfolio/{{portfolio.url}}" ng-click="setportfolio(portfolio)">Show Portfolio <span class="fa fa-long-arrow-right"></span></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
