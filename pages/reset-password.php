<section id="forgot-password">
	<div class="space"></div>
	<div class="space"></div>
	 <div class="forgot-form-container" ng-controller="resetPasswordController">
	 	<div class="forgot-form">
		 	<div class="forgot-header">
		 		<p> Reset Password!</p>
		 	</div>
	 		<form name="myForgotForm" ng-submit="onSubmit($event.target)">
	 			<div class="form-group">
	 				<input type="password" name="password" placeholder="New Password" class="form-control" ng-model="password" required>
	 			</div>
                <div class="form-group">
	 				<input type="password" name="confirm_password" placeholder="confirm Password" class="form-control" ng-model="confirm_password" ng-pattern="password" required>
	 			</div>
	 			<button class="btn  bg-color text-white border-0 w-100" ng-disabled="!myForgotForm.$valid">Update Password</button>
	 		</form>
	 	</div>
	 </div>
	<div class="space"></div>
	<div class="space"></div>
</section>