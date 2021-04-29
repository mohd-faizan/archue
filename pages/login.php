<section id="login-sec" ng-controller="loginController" login-dir>
	<h5 class="text-center text-white" style="padding-top:2rem">For uploading you have to signup/login on platform</h5>
	<div class="mid-box">
		<form id="login-form" name="loginForm" ng-submit="onLogin()">
			<div class="container-fluid">
				<h5 class="text-center">New in Archue? <a href="./signup" class="bg-font">Register</a></h5>
				<p class="error text-center" ng-show="isShowError">Invalid Username or Password</p>
				<div class="space"></div>
				
				<div class="input-group mb-3">
				  <div class="input-group-prepend">
				    <span class="input-group-text" id="basic-addon1"><span class="fa fa-user"></span></span>
				  </div>
				  <input type="email" name="email" id="emailid" class="form-control" placeholder="Email..." aria-label="Email" aria-describedby="basic-addon1" required ng-model="email">
				  <br>
				  <small class="error" ng-show="loginForm.email.$error.required&&loginForm.email.$dirty">Required Filed *</small>
				  <small class="error" ng-show="loginForm.email.$error.email&&loginForm.email.$dirty">
				  	Enter valid email
				  </small>
				</div>
				
				<div class="input-group position-relative">
				  <div class="input-group-prepend">
				    <span class="input-group-text" id="basic-addon1"><span class="fa fa-lock"></span></span>
				  </div>
				  <input type="{{type}}" name="password" id="passid" class="form-control" placeholder="Password..." aria-label="Password" aria-describedby="basic-addon1" required ng-model="password" >
				  <div class="password-view-icon">
					<span class="fa {{type === 'password' ? 'fa-eye-slash' : 'fa-eye'}}" ng-click="togglePasswordView()"></span>
				  </div>
				</div>
				  <small class="error" ng-show="loginForm.password.$error.required&&loginForm.password.$dirty">Required Filed *</small>
				  <!-- <small class="error" ng-show="loginForm.password.$error.minlength&&loginForm.password.$dirty">Min length should be 6</small>
				  <small class="error" ng-show="loginForm.password.$error.maxlength&&loginForm.password.$dirty">Max length should be 10</small> -->
				<div class="form-check">
				    <label class="form-check-label">
				      <input type="checkbox" class="form-check-input" name="remember"  ng-model="remember">
				      Remember Me
				    </label>
				</div>
				<div class="form-check">
				    <label class="form-check-label">
				      <input type="checkbox" class="form-check-input" name="agree" checked>
				      I am agree with <a href="terms-and-conditions" class="bg-font">terms and conditions</a>
				    </label>
				</div>
				<div class="space"></div>
				<div><a href="./forgot-password" class="bg-font">Forgot Password ?</a></div>
				<div class="space"></div>
				<div class="signup-btn text-center">
					<button class="btn btn-lg bg-color text-white" ng-disabled="!loginForm.$valid">Login</button>
				</div>
			</div>
		</form>
		<!-- <div class="space"></div>
		<div class="or-div">OR</div>
		<div class="space"></div>
		<div class="login-with-social" social-login>
			<div class="s-btn">
				<button class="btn btn-lg btn-primary"><span class="fa fa-facebook" ng-click="onFBLogin()">&nbsp;&nbsp; Sing Up With Facebook</span></button>
			</div>
			<div class="space"></div>
			<div class="s-btn">
				<button class="btn btn-lg btn-danger"><span class="fa fa-google-plus" ng-click="onGoogleLogin()">&nbsp;&nbsp; Sing Up With Google</span></button>
			</div>
		</div>	 -->
	</div>
	<!-- login modal -->
	<div class="modal" id="loginModal" ng-controller="loginWithController" ng-if="isLoginWith">
	  <div class="modal-dialog">
	    <div class="modal-content">

	      <!-- Modal Header -->
	      <div class="modal-header">
	        <h4 class="modal-title">Before Continue please provide the following info</h4>
	        <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
	      </div>

	      <!-- Modal body -->
	      <div class="modal-body">
	       <form ng-submit="onsuubmit($event.target)" name="myForm">
		       	 <div class="form-group">
		        	<input type="email" name="lemail" class="form-control" placeholder="email" ng-model="lemail"  required>
					<small class="error" ng-if="existCheck">This email already Exist. <a href="https://www.archue.com/login" target="_self">Click here</a> for login</small>
		        </div>
		        <div class="form-group">
		        	<input type="number" name="lphone" class="form-control" placeholder="phone number" ng-model="lphone" required>
		        </div>
		        <div class="form-group">
		        	<select ng-model="lprofession" class="form-control" required>
		        		<option>{{lprofession}}</option>
		        		<option>Architect</option>
		        		<option>Architecture Student</option>
		        		<option>Interior Designer</option>
		        		<option>Others</option>
		        	</select>
		        </div>
		        <div class="form-group">
		        	<input type="password" name="password" class="form-control" placeholder="Password" ng-model="password" required ng-pattern="passRegex">
							<small class="error" ng-show="myForm.password.$error.required&&myForm.password.$dirty">Required Filed *</small>
							<small class="error" ng-show="myForm.password.$error.pattern&&myForm.password.$dirty">Password must contain Alphabetl, Number and Special Character </small>
		        </div>
		        <button ng-disabled="!myForm.$valid" class="btn btn-success">Login</button>
	       </form>
	      </div>

	      <!-- Modal footer -->
	     <!--  <div class="modal-footer">
	        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
	      </div> -->

	    </div>
	  </div>
	</div>
</section>
<script type="text/javascript" src="js/route.js"></script>
<script type="text/javascript">
	(function(){
		var mynode = document.createElement('script'); 
		mynode.type = "text/javascript";
		mynode.async = true;
		mynode.src = "https://apis.google.com/js/client.js?onload=onLoadFunction";
		var s = document.getElementsByTagName('script')[0];
		s.parentNode.insertBefore(mynode,s);
	})();
	(function(d, s, id){
	 var js, fjs = d.getElementsByTagName(s)[0];
	 if (d.getElementById(id)) {return;}
	 js = d.createElement(s); js.id = id;
	 js.src = "https://connect.facebook.net/en_US/sdk.js";
	 fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
</script>




