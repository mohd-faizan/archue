<section id="partner-with-us" class="partner-with-us" ng-controller="partnerController">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-8">
				<div class="space"></div>
				<div class="space"></div>
				<div class="space"></div>
				<h2 class="bg-font">Why Partner With Us</h2>
				<p class="text-white"><b class="bg-font">Archue</b> is one of the growing platform for architects,Interior,Designer,Contractors with a mission to provide a complete architecture solution to each and every person</p>
				<p class="text-white">Join us with hands and be part of <b class="bg-font">Archue</b> family</p>
			</div>
			<div class="col-md-4">
				<form name="partnerWithUsForm" ng-submit="onSubmit($event.target)">
					<div class="form-group">
						<input type="text" name="name" id="name" class="form-control" ng-model="name" required placeholder="Name">
						<small class="error" ng-show="partnerWithUsForm.name.$error.required&&partnerWithUsForm.name.$touched">Required Fields</small>
					</div>
					<div class="form-group">
						<input type="text" name="company_name"  class="form-control" ng-model="company_name" required placeholder="Name of company/Organization">
						<small class="error" ng-show="partnerWithUsForm.company_name.$error.required&&partnerWithUsForm.company_name.$touched">Required Fields</small>
					</div>
					<div class="form-group">
						<input type="text" name="website" ng-model="website"  class="form-control" required placeholder="Website">
						<small class="error" ng-show="partnerWithUsForm.website.$error.required&&partnerWithUsForm.website.$touched">Required Fields</small>
					</div>
					<div class="form-group">
						<input type="text" name="type" ng-model="type" class="form-control" required placeholder="Type">
						<small class="error" ng-show="partnerWithUsForm.type.$error.required&&partnerWithUsForm.type.$touched">Required Fields</small>
					</div>
					<div class="form-group">
						<input type="email" name="email" ng-model="email" class="form-control" required placeholder="Email">
						<small class="error" ng-show="partnerWithUsForm.email.$error.required&&partnerWithUsForm.email.$touched">Required Fields</small>
					</div>
					<div class="form-group">
						<input type="password" name="password" ng-model="password"  class="form-control" required placeholder="password">
						<small class="error" ng-show="partnerWithUsForm.password.$error.required&&partnerWithUsForm.password.$touched">Required Fields</small>
					</div>
					<div class="form-group">
						<input type="password" name="cpassword"  class="form-control" ng-model="cpassword" required placeholder="confirm Password" ng-pattern="password">
						<small class="error" ng-show="partnerWithUsForm.cpassword.$error.pattern&&partnerWithUsForm.cpassword.$touched">Password should match</small>
					</div>
					<button class="btn bg-color text-white" ng-disabled="!partnerWithUsForm.$valid">Next</button>
				</form>
			</div>
		</div>
	</div>
</section>
