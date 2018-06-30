<section id="forgot-password">
	<div class="space"></div>
	<div class="space"></div>
	 <div class="forgot-form-container" ng-controller="forgotController">
	 	<div class="forgot-form">
		 	<div class="forgot-header">
		 		<p> Reset Password!</p>
		 	</div>
		 	<strong>Enter Your Registered Email</strong>
	 		<form name="myForgotForm" ng-submit="onSubmit($event.target)">
	 			<div class="form-group">
	 				<input type="email" name="reset_email" placeholder="Please enter your registered email" class="form-control" ng-model="email" required>
	 			</div>
	 			<button class="btn btn-primary bg-color border-0 w-100" ng-disabled="!myForgotForm.$valid">Get Password</button>
	 		</form>
	 	</div>
	 </div>
	<div class="space"></div>
	<div class="space"></div>
</section>