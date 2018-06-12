<section id="login-sec" ng-controller="loginController">
	<div class="mid-box">
		<form id="login-form" name="loginForm" ng-submit="onLogin()">
			<div class="container-fluid">
				<h5 class="text-center">New in Archue? <a href="./signup" class="bg-font">Sign Up</a></h5>
				<p class="error text-center" ng-show="isShowError">Invalid Username or Password</p>
				<div class="space"></div>
				<div class="input-group mb-3">
				  <div class="input-group-prepend">
				    <span class="input-group-text" id="basic-addon1"><span class="fa fa-user"></span></span>
				  </div>
				  <input type="email" name="email" id="emailid" class="form-control" placeholder="Email..." aria-label="Email" aria-describedby="basic-addon1" required ng-model="email">
				  <small class="error" ng-show="loginForm.email.$error.required&&loginForm.email.$dirty">Required Filed *</small>
				  <small class="error" ng-show="loginForm.email.$error.email&&loginForm.email.$dirty">
				  	Enter valid email
				  </small>
				</div>
				<div class="input-group">
				  <div class="input-group-prepend">
				    <span class="input-group-text" id="basic-addon1"><span class="fa fa-lock"></span></span>
				  </div>
				  <input type="password" name="password" id="passid" class="form-control" placeholder="Password..." aria-label="Password" aria-describedby="basic-addon1" required ng-model="password" ng-minlength="7">
				</div>
				  <small class="error" ng-show="loginForm.password.$error.required&&loginForm.password.$dirty">Required Filed *</small>
				  <small class="error" ng-show="loginForm.password.$error.minlength&&loginForm.password.$dirty">Min length should be 7</small>
				<div class="form-check">
				    <label class="form-check-label">
				      <input type="checkbox" class="form-check-input" name="remember"  ng-model="remember">
				      Remember Me
				    </label>
				</div>
				<div class="form-check">
				    <label class="form-check-label">
				      <input type="checkbox" class="form-check-input" name="agree" checked>
				      I am agree with <a href="#">terms and conditions</a>
				    </label>
				</div>
				
				<div class="signup-btn text-center">
					<button class="btn btn-lg btn-success" ng-disabled="!loginForm.$valid">Login</button>
				</div>
			</div>
		</form>
		<div class="space"></div>
		<div class="or-div">OR</div>
		<div class="space"></div>
		<div class="login-with-social" social-login>
			<div class="s-btn">
				<button class="btn btn-lg btn-primary"><span class="fa fa-facebook">&nbsp;&nbsp; Login With Facebook</span></button>
			</div>
			<div class="space"></div>
			<div class="s-btn">
				<button class="btn btn-lg btn-danger"><span class="fa fa-google-plus" >&nbsp;&nbsp; Login With Google</span></button>
			</div>
			<div class="g-signin2" data-onsuccess="onSignIn"></div>
			<div class="space"></div>
			<div class="s-btn">
				<button class="btn btn-lg btn-info"><span class="fa fa-linkedin">&nbsp;&nbsp; Login With LinkedIn</span></button>
			</div>
		</div>	
	</div>
</section>
<script type="text/javascript" src="js/route.js"></script>