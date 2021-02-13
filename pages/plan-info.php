<section id="plan-with-us" class="px-3 py-5" ng-controller="planInfoController">
	<div class="container-fluid">
		<p class="text-center"><b>You have already a free plan. if you want to buy it see below or just <a href="./dashboard">skip it</a>.</b></p>
		<br>
		<table class="table table-hover table-bordered text-center">
			<thead>
				<tr class=".bg-color">
					<th></th>
					<th class="bg-color">Basic <br><span class="text-light">&#8377; 999/month</span></th>
					<th class="bg-color">Standard <br><span class="text-light"> &#8377; 1999/month</span></th>
					<th class="bg-color">Featured <br><span class="text-light"> &#8377; 2999/month</span></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th class="w-50 text-left">Product Listing on Arhue</th>
					<td><i class="fa fa-check text-warning" aria-hidden="true"></i></td>
					<td><i class="fa fa-check text-warning" aria-hidden="true"></i></td>
					<td><i class="fa fa-check text-warning" aria-hidden="true"></i></td>
				</tr>
				<tr>
					<th class="w-50 text-left">Edit Listing anytime online</th>
					<td><i class="fa fa-check text-warning" aria-hidden="true"></i></td>
					<td><i class="fa fa-check text-warning" aria-hidden="true"></i></td>
					<td><i class="fa fa-check text-warning" aria-hidden="true"></i></td>
				</tr>
				<tr>
					<th class="w-50 text-left">Place your advertising banner prominently</th>
					<td><i class="fa fa-times text-danger" aria-hidden="true"></i></td>
					<td><i class="fa fa-check text-warning" aria-hidden="true"></i></td>
					<td><i class="fa fa-check text-warning" aria-hidden="true"></i></td>
				</tr>
				<tr>
					<th class="w-50 text-left">Select days to advertise your listing</th>
					<td><i class="fa fa-times text-danger" aria-hidden="true"></i></td>
					<td><i class="fa fa-check text-warning" aria-hidden="true"></i></td>
					<td><i class="fa fa-check text-warning" aria-hidden="true"></i></td>
				</tr>
				<tr>
					<th class="w-50 text-left">Listing goes live immediately no editorial review required</th>
					<td><i class="fa fa-times text-danger" aria-hidden="true"></i></td>
					<td><i class="fa fa-check text-warning" aria-hidden="true"></i></td>
					<td><i class="fa fa-check text-warning" aria-hidden="true"></i></td>
				</tr>
				<tr>
					<th class="w-50 text-left">Published in Quaterely E-Magazine</th>
					<td><i class="fa fa-times text-danger" aria-hidden="true"></i></td>
					<td><i class="fa fa-check text-warning" aria-hidden="true"></i></td>
					<td><i class="fa fa-check text-warning" aria-hidden="true"></i></td>
				</tr>
				<tr>
					<th class="w-50 text-left">Add images to Product</th>
					<td><i class="fa fa-check text-warning" aria-hidden="true"></i></td>
					<td><i class="fa fa-check text-warning" aria-hidden="true"></i></td>
					<td><i class="fa fa-check text-warning" aria-hidden="true"></i></td>
				</tr>
				<tr>
					<th class="w-50 text-left">Add website link of your product</th>
					<td><i class="fa fa-times text-danger" aria-hidden="true"></i></td>
					<td><i class="fa fa-times text-danger" aria-hidden="true"></i></td>
					<td><i class="fa fa-check text-warning" aria-hidden="true"></i></td>
				</tr>
				<tr>
					<th class="w-50 text-left">Get showed on the homepage</th>
					<td><i class="fa fa-times text-danger" aria-hidden="true"></i></td>
					<td><i class="fa fa-times text-danger" aria-hidden="true"></i></td>
					<td><i class="fa fa-check text-warning" aria-hidden="true"></i></td>
				</tr>
				<tr>
					<th class="w-50 text-left">Upload catalogue to Product Listing</th>
					<td><i class="fa fa-times text-danger" aria-hidden="true"></i></td>
					<td><i class="fa fa-check text-warning" aria-hidden="true"></i></td>
					<td><i class="fa fa-check text-warning" aria-hidden="true"></i></td>
				</tr>
				<tr>
					<th class="w-50 text-left">Add direct contact number on listing</th>
					<td><i class="fa fa-times text-danger" aria-hidden="true"></i></td>
					<td><i class="fa fa-times text-danger" aria-hidden="true"></i></td>
					<td><i class="fa fa-check text-warning" aria-hidden="true"></i></td>
				</tr>
				<tr>
					<th class="w-50 text-left">Embed video is the listing</th>
					<td><i class="fa fa-times text-danger" aria-hidden="true"></i></td>
					<td><i class="fa fa-times text-danger" aria-hidden="true"></i></td>
					<td><i class="fa fa-check text-warning" aria-hidden="true"></i></td>
				</tr>
				<tr>
					<th class="w-50 text-left">Included in daily Newsletter</th>
					<td><i class="fa fa-times text-danger" aria-hidden="true"></i></td>
					<td><i class="fa fa-times text-danger" aria-hidden="true"></i></td>
					<td><i class="fa fa-check text-warning" aria-hidden="true"></i></td>
				</tr>
			</tbody>
			<tfoot>
				<tr>
					<th class="text-left">
						Plans
					</th>
					<td>
						<button class="btn btn-primary w-100" ng-click="selectPlan(1)" data-toggle="modal" data-target="#planDurationModal">SELECT</button>
					</td>

					<td>
						<button class="btn btn-primary w-100" ng-click="selectPlan(2)" data-toggle="modal" data-target="#planDurationModal">SELECT</button>
					</td>

					<td>
						<button class="btn btn-primary w-100" ng-click="selectPlan(3)" data-toggle="modal" data-target="#planDurationModal">SELECT</button>
					</td>
				</tr>
			</tfoot>
		</table>

		<!-- Plan Duration Modal -->
		<div class="modal" tabindex="-1" role="dialog" id="planDurationModal">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Plans and Duration</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true" ng-click="clear()">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="alert alert-success" ng-if="showSuccess">{{message}}</div>
						<div class="alert alert-danger" ng-if="showError">{{message}}</div>
						<form action="#" name="partnerPlanForm">
							<p><b>Plan Name: {{planInfo.plan_name}}</b></p>
							<select ng-model="selectedDuration" ng-change="setPrice(selectedDuration)" class="form-control" required>
								<option value="">Select Subscription Duration</option>
								<option ng-repeat="(key, duration) in durations" value="{{ key + 1 }}">{{duration}}
								</option>
							</select>
						</form>
						<br>
						<h4>{{ planInfo.price | currency : "&#8377" }}</h4>
					</div>
					<div class="modal-footer">
						<div class="pull-right">
							<button class="btn btn-primary" ng-click="subscribe()" ng-disabled="partnerPlanForm.$invalid || planInfo.price == null">Subscribe Now</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- <section id="plan-info">
	<div class="space"></div>
	<div class="space"></div>
	<div class="container">
		<div class="plan-container" ng-controller="planInfoController">
			<div class="plan">
				<div class="plan-top">
					<h4>LARGE BRAND</h4>
					<p class="bg-font">2999/month*</p>
				</div>
				<div class="plan-info">
					<ol>
						<li>Product Pages <strong>5</strong></li>
						<li>Website<strong class="fa fa-check"></strong></li>
						<li>Brochure <strong class="fa fa-check"></strong></li>
						<li>Impression<strong> Unlimited</strong></li>
						<li>Leads <strong> Unlimited</strong></li>
						<div class="space"></div>
					</ol>
					<form ng-submit="onsubmit($event.target,1)">
						<label>Duration</label>
						<select class="form-control" ng-model="plan">
							<option>{{plan}}</option>
							<option>12 month</option>
							<option>24 month</option>
							<option>36 month</option>
						</select>
						<div class="space"></div>
						<button class="btn btn-primary bg-color border-0">SELECT</button>
					</form>
				</div>
			</div>
			<div class="plan">
				<div class="plan-top">
					<h4 >MEDIUM BRAND</h4>
					<p class="bg-font">1999/month*</p>
				</div>
				<div class="plan-info">
					<ol>
						<li>Product Pages <strong>3</strong></li>
						<li>Website <strong class="fa fa-check"></strong></li>
						<li>Brochure <strong class="fa fa-check"></strong></li>
						<li>Impression<strong> Unlimited</strong></li>
						<li>Leads <strong> Unlimited</strong></li>
						<div class="space"></div>
					</ol>
					<form ng-submit="onsubmit($event.target,2)">
						<label>Duration</label>
						<select class="form-control" ng-model="plan">
							<option>{{plan}}</option>
							<option>12 month</option>
							<option>24 month</option>
							<option>36 month</option>
						</select>
						<div class="space"></div>
						<button class="btn btn-primary bg-color border-0">SELECT</button>
					</form>
				</div>
			</div>
			<div class="plan">
				<div class="plan-top">
					<h4  >SMALL BRAND</h4>
					<p class="bg-font">999/month*</p>
				</div>
				<div class="plan-info">
					<ol>
						<li>Pages <strong>1</strong></li>
						<li>Website <strong class="fa fa-check"></strong></li>
						<li>Brochure <strong class="fa fa-check"></strong></li>
						<li>Impression<strong> Limited</strong></li>
						<li>Leads<strong> Limited</strong></li>
						<div class="space"></div>
					</ol>
					<form ng-submit="onsubmit($event.target,3)">
						<label>Duration</label>
						<select class="form-control" ng-model="plan">
							<option>{{plan}}</option>
							<option>12 month</option>
							<option>24 month</option>
							<option>36 month</option>
						</select>
						<div class="space"></div>
						<button class="btn btn-primary bg-color border-0">SELECT</button>
					</form>
				</div>
			</div>
			<div class="loader" ng-if="isShowLoad">
				<div class="load-container">
					<div class="loader-main"></div>
				</div>
			</div>
		</div>

	</div>
	<div class="space"></div>
	<div class="space"></div>
</section> -->