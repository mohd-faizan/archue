<section class="section-padding" id="portfolio-sec-1" ng-controller="fetchPortfolioController">
	<div class="home-margin">
		<div class="container-fluid" ng-if="portfolios">
			<div class="row">
				<div class="col-lg-9 col-md-9 col-sm-12">
					<div class="student-main-div">
						<div class="cur-page-div">
							<a href="/">Archue</a>
							<span class="fa fa-angle-right"></span>
							<a href="/portfolio">Portfolio</a>
						</div>
						<div class="yellow-line bg-color"></div>
						<div class="space"></div>
						<div class="conntent-div mb-4" ng-repeat="portfolio in res=(portfolios) track by $index">
							<div class="content-box">
								<div class="content-img">
									<a href="./full-portfolio/{{portfolio.portfolio_id}}/{{portfolio.portfolio_college}}/{{portfolio.portfolio_name}}" ng-click="setportfolio(portfolio)"><img src="image/pdf-icon.png"></a>
								</div>
								<div class="content-data">
									<h5><a href="./full-portfolio/{{portfolio.portfolio_id}}/{{portfolio.portfolio_college}}/{{portfolio.portfolio_name}}" ng-click="setportfolio(portfolio)" class="bg-font">&nbsp;&nbsp;{{portfolio.portfolio_name | toUpperCaseFirst}}</a></h5>
									<table>
										<tbody>
											<tr>
												<th>Name</th>
												<td>{{portfolio.portfolio_name}}</td>
											</tr>
											<tr>
												<th>College</th>
												<td>{{portfolio.portfolio_college}}</td>
											</tr>
											<tr>
												<th>Year</th>
												<td>{{portfolio.portfolio_year}}</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
							<div class="project-share-option">
								<div>
									<a href="" ng-click="increaseLike(portfolio.portfolio_id)"><span class="fa {{portfolio.like ? 'fa-heart text-danger' : 'fa-heart-o'}}" ></span>&nbsp;{{portfolio.likes}}</a>
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
								<div class="ml-auto">
									<a href="./full-portfolio/{{portfolio.portfolio_id}}/{{portfolio.portfolio_college}}/{{portfolio.portfolio_name}}" ng-click="setportfolio(portfolio)">Read More</a>
								</div>
							</div>
						</div>
						<nav aria-label="pagination" ng-if="(portfolios).length > 0">
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
						<div class="alert alert-danger" ng-if="portfolios.length==0">
							No Data Found!
						</div>
					</div>
				</div>
				<div class="col-md-3 pr-0">
					<div ng-include="'include/sidematerial.php'" style="margin-top:3rem"></div>
				</div>
			</div>
		</div>
		<div ng-if="!portfolios" ng-include="'../include/loader.php'"></div>

	</div>
</section>
