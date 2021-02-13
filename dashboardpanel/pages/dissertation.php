<div my-nav></div>
<section class="section-padding" id="dissertation-sec-1"  ng-controller="fetchDessertController">
	<div class="home-margin">
		<button class="btn" ng-class="{'btn-primary':!isShowApprove}" ng-click="isShowUnApprove()">SEE APPROVE DESSERTATION</button>
		<button class="btn" ng-class="{'btn-primary':isShowApprove}" ng-click="isShowsApprove()">SEE UNAPPROVE DESSERTATION</button>
		<div class="space"></div>
		<div class="container-fluid">
			<div class="row">
				<div class="conntent-div mb-4 col-md-4" ng-if="dessertation.dessertation_approve==0" ng-show="isShowApprove" ng-repeat="dessertation in dessertations">
					<p><b>Uploaded By:</b>{{dessertation.name}}</p>
					<div class="content-box">
						<div class="content-img">
							<a href="./full-dessertation/{{dessertation.url}}" ng-click="setDessertation(dessertation)"><img src="../image/pdf-icon.png"></a>
						</div>
						<div class="content-data">
							<h5>
								<a href="./full-dessertation/{{dessertation.url}}" ng-click="setDessertation(dessertation)" class="text-dark">{{dessertation.dessertation_name}}</a></h5>
							<p class="p-text">
								{{dessertation.dessertation_place}}
							</p>
							<div class="file-link pull-right">
								<a href="./full-dessertation/{{dessertation.url}}" ng-click="setDessertation(dessertation)">Show Dissertation <span class="fa fa-long-arrow-right"></span></a>
							</div>
						</div>
					</div>
				</div>
				<div class="conntent-div mb-4 col-md-4" ng-if="dessertation.dessertation_approve==1" ng-show="!isShowApprove" ng-repeat="dessertation in dessertations">
					<p><b>Uploaded By:</b>{{dessertation.name}}</p>
					<div class="content-box" >
						<div class="content-img">
							<a href="./full-dessertation/{{dessertation.url}}" ng-click="setDessertation(dessertation)"><img src="../image/pdf-icon.png"></a>
						</div>
						<div class="content-data">
							<h5>
								<a href="./full-dessertation/{{dessertation.url}}" ng-click="setDessertation(dessertation)" class="text-dark">{{dessertation.dessertation_name}}</a></h5>
							<p class="p-text">
								{{dessertation.dessertation_place}}
							</p>
							<div class="file-link pull-right">
								<a href="./full-dessertation/{{dessertation.url}}" ng-click="setDessertation(dessertation)">Show Dissertation <span class="fa fa-long-arrow-right"></span></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
