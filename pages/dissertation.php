<section class="section-padding" id="dissertation-sec-1"  ng-controller="fetchDessertController">
	<div class="home-margin">
		<div class="container-fluid" ng-if="dessertations">
			<div class="row">
				<div class="col-lg-9 col-md-9 col-sm-12">
					<div class="student-main-div">
						<div class="cur-page-div">
							<a href="/" class="bg-font">Archue</a>
							<span class="fa fa-angle-right"></span>
							<a href="/dissertation">Dissertation</a>
						</div>
						<div class="yellow-line bg-color"></div>
						<!-- <div class="yellow-separator"></div> -->
						<div class="space"></div>
						<div class="conntent-div mb-4" ng-repeat="dessertation in res=(dessertations)">
							<div class="content-box" >
								<div class="content-img">
									<a href="./full-dissertation/{{ dessertation.dessertation_id }}/{{dessertation.dessertation_college}}/{{dessertation.url}}" ng-click="setDessertation(dessertation)"><img src="image/pdf-icon.png"></a>
								</div>
								<div class="content-data">
									<h5><a href="./full-dissertation/{{ dessertation.dessertation_id }}/{{dessertation.dessertation_college}}/{{dessertation.url}}" ng-click="setDessertation(dessertation)" class="bg-font">{{dessertation.dessertation_name | toUpperCaseFirst}}</a></h5>
									<table>
										<tbody>
											<tr>
												<th>Name</th>
												<td>{{dessertation.name}}</td>
											</tr>
											<tr>
												<th>College</th>
												<td>{{dessertation.dessertation_college}}</td>
											</tr>
											<tr>
												<th>Year</th>
												<td>{{dessertation.dessertation_year}}</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
							<div class="project-share-option">
								<div>
									<a href="" class="fa {{dessertation.like ? 'fa-heart text-danger' : 'fa-heart-o'}}" ng-click = "increaseLike(dessertation.dessertation_id)">&nbsp;{{dessertation.likes}}</a>
									<a href=""><span class="fa fa-eye"></span>&nbsp;{{dessertation.views}}</a>

									<!-- ==================================== -->
									<a href=""><span class="fa fa-facebook"
										socialshare
										socialshare-provider="facebook"
										socialshare-type="sharer"
										socialshare-via="167503137442216"
										socialshare-url="https://www.archue.com/full-dissertation/{{dessertation.dessertation_id}}/{{dessertation.dessertation_college}}/{{dessertation.url}}"
										socialshare-redirect-uri=""
										socialshare-popup-height="450"
										socialshare-popup-width="350"
										socialshare-trigger="click"></span></a>
									
									<a href=""><span class="fa fa-twitter"
										socialshare
										socialshare-provider="twitter"
										socialshare-hashtags="Architect, Dessertatations"
										socialshare-via="twitter"
										socialshare-text=""
										socialshare-url="https://www.archue.com/full-dissertation/{{dessertation.dessertation_id}}/{{dessertation.dessertation_college}}/{{dessertation.url}}"
										socialshare-popup-height="450"
										socialshare-popup-width="350"
										socialshare-trigger="click"></span></a>
									
									<a href=""
										socialshare
										socialshare-provider="google"
										socialshare-url="https://www.archue.com/full-dissertation/{{dessertation.dessertation_id}}/{{dessertation.dessertation_college}}/{{dessertation.url}}"
										socialshare-popup-height="450"
										socialshare-popup-width="350"
										socialshare-trigger="click"><span class="fa fa-google-plus"></span></a>
									
									<a href=""
										socialshare
										socialshare-media="https://www.archue.com/image/pdf-icon.png"
										socialshare-provider="pinterest"
										socialshare-text="{{dessertation.dessertation_name}}"
										socialshare-url="https://www.archue.com/full-dissertation/{{dessertation.dessertation_id}}/{{dessertation.dessertation_college}}/{{dessertation.url}}"
										socialshare-popup-height="450"
										socialshare-popup-width="350"
										socialshare-trigger="click"><span class="fa fa-pinterest"></span></a>

									<a href=""
										socialshare
										socialshare-provider="tumblr"
										socialshare-media="https://www.archue.com/image/pdf-icon.png"
										socialshare-text="{{dessertation.dessertation_name}}"
										socialshare-url="https://www.archue.com/full-dissertation/{{dessertation.dessertation_id}}/{{dessertation.dessertation_college}}/{{dessertation.url}}"
										socialshare-popup-height="450"
										socialshare-popup-width="350"
										socialshare-trigger="click"><span class="fa fa-tumblr"></span></a>
									
									<a href=""
										socialshare
										socialshare-provider="linkedin"
										socialshare-url="https://www.archue.com/full-dissertation/{{dessertation.dessertation_id}}/{{dessertation.dessertation_college}}/{{dessertation.url}}"
										socialshare-text="{{dessertation.dessertation_name}}"
										socialshare-description=""
										socialshare-source=""
										socialshare-popup-height="450"
										socialshare-popup-width="350"
										socialshare-trigger="click"><span class="fa fa-linkedin"></span></a>
								</div>
								<div class="ml-auto">
									<a href="./full-dissertation/{{ dessertation.dessertation_id }}/{{dessertation.dessertation_college}}/{{dessertation.url}}" ng-click="setDessertation(dessertation)">Read More</a>
								</div>
							</div>
						</div>
						<nav aria-label="pagination" ng-if="(dessertations).length > 0">
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
						<div>
							<a href="#" class="btn btn-primary" ng-click="increaseLimit()" ng-if="res.length>10">Load More</a>
						</div>
						<div class="alert alert-danger" ng-if="res.length==0">
							No Data Found!
						</div>
					</div>
				</div>
				<div class="col-md-3 pr-0">
					<div ng-include="'include/sidematerial.php'" style="margin-top: 3rem"></div>
				</div>
			</div>
		</div>
		<div ng-if="!dessertations" ng-include="'../include/loader.php'"></div>
	</div>
</section>
