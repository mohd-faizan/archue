<div class="space"></div>
<section id="full-portfolio-sec-1" ng-controller="fullPortfolioController">
	<div class="container" ng-if="portfolio">
		<div class="row">
			<div class="col-lg-3 col-md-3 col-sm-12">
				<div class="file-details">
					<div class="content-data">
						<h5>{{portfolio.portfolio_name | toUpperCaseFirst}}</h5>
						<p><b>Name</b>&nbsp;&nbsp;{{portfolio.name |toUpperCaseFirst}}</p>
						<p><b>College</b>&nbsp;&nbsp;{{portfolio.portfolio_college | toUpperCaseFirst}}</p>
						<p><b>Year</b>&nbsp;&nbsp;{{portfolio.portfolio_year}}</p>
					</div>
				</div>
				<div class="advertisement-div">
					<div class="blog-header material-bg">
						<h3 class="home-page-heading">Similar Portfolio</h2>
					</div>
					<div class="sm-blog-container" ng-repeat="similarPort in similarPorts">
						<div class="link">
							<a href="./full-portfolio/{{similarPort.portfolio_id}}/{{similarPort.portfolio_college}}/{{similarPort.portfolio_name}}" ng-click="setportfolio(similarPort)">
							{{similarPort.portfolio_name | toUpperCaseFirst}}
							</a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-9 col-md-9 col-sm-12">
				<div class="project-share-option">
				<div>
				<a href="" ng-click="increaseLike()"><span class="fa {{portfolio.like ? 'fa-heart text-danger' : 'fa-heart-o'}}" ></span>&nbsp;{{portfolio.likes}}</a>
									<a href=""><span class="fa fa-eye"></span>&nbsp;{{portfolio.views}}</a>
					
					<!-- ==================================== -->
					<a href=""><span class="fa fa-facebook"
						socialshare
						socialshare-provider="facebook"
						socialshare-type="sharer"
						socialshare-via="167503137442216"
						socialshare-url="https://www.archue.com/full-portfolio/{{portfolio.portfolio_id}}/{{portfolio.portfolio_college}}/{{portfolio.portfolio_name}}"
						socialshare-redirect-uri="http://www.archue.com/full-portfolio/{{portfolio.portfolio_id}}/{{portfolio.portfolio_college}}/{{portfolio.portfolio_name}}"
						socialshare-popup-height="450"
						socialshare-popup-width="350"
						socialshare-trigger="click"></span></a>
					
					<a href=""><span class="fa fa-twitter"
						socialshare
						socialshare-provider="twitter"
						socialshare-hashtags="Architect, Portfolio"
						socialshare-via="twitter"
						socialshare-text=""
						socialshare-url="https://www.archue.com/full-portfolio/{{portfolio.portfolio_id}}/{{portfolio.portfolio_college}}/{{portfolio.portfolio_name}}"
						socialshare-popup-height="450"
						socialshare-popup-width="350"
						socialshare-trigger="click"></span></a>
					
					<a href=""
						socialshare
						socialshare-provider="google"
						socialshare-url="https://www.archue.com/full-portfolio/{{portfolio.portfolio_id}}/{{portfolio.portfolio_college}}/{{portfolio.portfolio_name}}"
						socialshare-popup-height="450"
						socialshare-popup-width="350"
						socialshare-trigger="click"><span class="fa fa-google-plus"></span></a>
					
					<a href=""
						socialshare
						socialshare-media="https://www.archue.com/image/pdf-icon.png"
						socialshare-provider="pinterest"
						socialshare-text="{{portfolio.portfolio_name}}"
						socialshare-url="https://www.archue.com/full-portfolio/{{portfolio.portfolio_id}}/{{portfolio.portfolio_college}}/{{portfolio.portfolio_name}}"
						socialshare-popup-height="450"
						socialshare-popup-width="350"
						socialshare-trigger="click"><span class="fa fa-pinterest"></span></a>

					<a href=""
						socialshare
						socialshare-provider="tumblr"
						socialshare-media="https://www.archue.com/image/pdf-icon.png"
						socialshare-text="{{portfolio.portfolio_name}}"
						socialshare-url="https://www.archue.com/full-portfolio/{{portfolio.portfolio_id}}/{{portfolio.portfolio_college}}/{{portfolio.portfolio_name}}"
						socialshare-popup-height="450"
						socialshare-popup-width="350"
						socialshare-trigger="click"><span class="fa fa-tumblr"></span></a>
					
					<a href=""
						socialshare
						socialshare-provider="linkedin"
						socialshare-url="https://www.archue.com/full-portfolio/{{portfolio.portfolio_id}}/{{portfolio.portfolio_college}}/{{portfolio.portfolio_name}}"
						socialshare-text="{{portfolio.portfolio_name}}"
						socialshare-description=""
						socialshare-source=""
						socialshare-popup-height="450"
						socialshare-popup-width="350"
						socialshare-trigger="click"><span class="fa fa-linkedin"></span></a>
				</div>
				</div>
				<br>
				<iframe class="iframe-loader" ng-src="{{url}}" width="100%" height="800px" ></iframe>
			</div>
		</div>
	</div>
	<div ng-if="!portfolio" ng-include="'../include/loader.php'"></div>
</section>