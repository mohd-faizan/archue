<div class="space"></div>
<section id="full-dissertation-sec-1" ng-controller="fetchFullDessert">
	<div class="container">
		<div class="row" ng-if="dessertation">
			<div class="col-lg-3 col-md-3 col-sm-12">
				<div class="file-details">
					<div class="content-data">
						<h5>{{dessertation.dessertation_name | toUpperCaseFirst}}</h5>
						<p><b>Name</b>&nbsp;&nbsp;{{dessertation.name}}</p>
						<p><b>College</b>&nbsp;&nbsp;{{dessertation.dessertation_college}}</p>
						<p><b>Year</b>&nbsp;&nbsp;{{dessertation.dessertation_year}}</p>
					</div>
				</div>
				<div class="advertisement-div">
					<div class="blog-header material-bg">
						<h3 class="home-page-heading">Similar Dissertation</h2>
					</div>
					<div class="sm-blog-container" ng-if="similarDessertations.length>0" ng-repeat="similarDessertation in similarDessertations">
						<div class="link">
							<a href="./full-dissertation/{{ similarDessertation.dessertation_id }}/{{ similarDessertation.dessertation_college }}/{{similarDessertation.url}}" ng-click="setDessertation(similarDessertation)">
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
				<div class="project-share-option" style="margin-top:0rem;">
					<div>
					<a href="" class="fa {{dessertation.like ? 'fa-heart text-danger' : 'fa-heart-o'}}" ng-click = "increaseLike()">&nbsp;{{dessertation.likes}}</a>
					<a href=""><span class="fa fa-eye"></span>&nbsp;{{dessertation.views}}</a>
						
						<!-- ==================================== -->
						<a href=""><span class="fa fa-facebook"
							socialshare
							socialshare-provider="facebook"
							socialshare-type="sharer"
							socialshare-via="167503137442216"
							socialshare-url="https://www.archue.com/full-dissertation/{{dessertation.dessertation_id}}/{{ similarDessertation.dessertation_college }}/{{dessertation.url}}"
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
							socialshare-url="https://www.archue.com/full-dissertation/{{dessertation.dessertation_id}}/{{ similarDessertation.dessertation_college }}/{{dessertation.url}}"
							socialshare-popup-height="450"
							socialshare-popup-width="350"
							socialshare-trigger="click"></span></a>
						
						<a href=""
							socialshare
							socialshare-provider="google"
							socialshare-url="https://www.archue.com/full-dissertation/{{dessertation.dessertation_id}}/{{ similarDessertation.dessertation_college }}/{{dessertation.url}}"
							socialshare-popup-height="450"
							socialshare-popup-width="350"
							socialshare-trigger="click"><span class="fa fa-google-plus"></span></a>
						
						<a href=""
							socialshare
							socialshare-media="https://www.archue.com/image/pdf-icon.png"
							socialshare-provider="pinterest"
							socialshare-text="{{dessertation.name}}"
							socialshare-url="https://www.archue.com/full-dissertation/{{dessertation.dessertation_id}}/{{ similarDessertation.dessertation_college }}/{{dessertation.url}}"
							socialshare-popup-height="450"
							socialshare-popup-width="350"
							socialshare-trigger="click"><span class="fa fa-pinterest"></span></a>

						<a href=""
							socialshare
							socialshare-provider="tumblr"
							socialshare-media="https://www.archue.com/image/pdf-icon.png"
							socialshare-text="{{dessertation.dessertation_name}}"
							socialshare-url="https://www.archue.com/full-dissertation/{{dessertation.dessertation_id}}/{{ similarDessertation.dessertation_college }}/{{dessertation.url}}"
							socialshare-popup-height="450"
							socialshare-popup-width="350"
							socialshare-trigger="click"><span class="fa fa-tumblr"></span></a>
						
						<a href=""
							socialshare
							socialshare-provider="linkedin"
							socialshare-url="https://www.archue.com/full-dissertation/{{dessertation.dessertation_id}}/{{ similarDessertation.dessertation_college }}/{{dessertation.url}}"
							socialshare-text="{{dessertation.dessertation_name}}"
							socialshare-description=""
							socialshare-source=""
							socialshare-popup-height="450"
							socialshare-popup-width="350"
							socialshare-trigger="click"><span class="fa fa-linkedin"></span></a>
					</div>
				</div>
				<br>
				<iframe  class="iframe-loader" ng-src="{{url}}" width="100%" height="800px"></iframe>
			</div>
		</div>
		<div ng-if="!dessertation" ng-include="'../include/loader.php'"></div>
	</div>
</section>






