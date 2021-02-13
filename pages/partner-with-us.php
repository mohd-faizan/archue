<!-- <section id="partner-with-us" class="partner-with-us" ng-controller="partnerController">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-8">
				<div class="space"></div>
				<div class="space"></div>
				<div class="space"></div>
				<h2 class="bg-font">Why Partner With Us</h2>
				<p class="text-white"><b class="bg-font">Archue</b> is one of the growing platform for architects, Interior, Designer, Contractors with a mission to provide a complete architecture solution to each and every person</p>
				<p class="text-white">Join us with hands and be part of <b class="bg-font">Archue</b> family</p>
			</div>
			<div class="col-md-4">
				<form name="partnerWithUsForm" ng-submit="onSubmit($event.target)">
					<div class="form-group">
						<input type="text" name="name" id="name" class="form-control" ng-model="name" required placeholder="Name">
						<small class="error" ng-show="partnerWithUsForm.name.$error.required&&partnerWithUsForm.name.$touched">Required Fields</small>
					</div>
					<div class="form-group">
						<input type="text" name="company_name" class="form-control" ng-model="company_name" required placeholder="Name of company/Organization">
						<small class="error" ng-show="partnerWithUsForm.company_name.$error.required&&partnerWithUsForm.company_name.$touched">Required Fields</small>
					</div>
					<div class="form-group">
						<input type="text" name="website" ng-model="website" class="form-control" placeholder="Website">
						<small class="error" ng-show="partnerWithUsForm.website.$error.required&&partnerWithUsForm.website.$touched">Required Fields</small>
					</div>
					<div class="form-group">
						<select class="form-control" ng-model="type">
							<option>{{type}}</option>
							<option>Manufacture and Supplier</option>
							<option>vendor</option>
						</select>
					</div>
					<div class="form-group">
						<input type="email" name="email" ng-model="email" class="form-control" required placeholder="Email" ng-blur="checkEmailExistence()">
						<small class="error" ng-show="partnerWithUsForm.email.$error.required&&partnerWithUsForm.email.$touched">Required Fields</small>
						<small class="error" ng-if="existCheck">Email already exist!</small>
					</div>
					<div class="form-group">
						<input type="number" name="phone" ng-model="phone" class="form-control" required placeholder="Phone" ng-min="10">
						<small class="error" ng-show="partnerWithUsForm.phone.$error.required&&partnerWithUsForm.phone.$touched">Required Fields</small>
						<small class="error" ng-show="partnerWithUsForm.phone.$error.minlength">Min length must be 10</small>
					</div>
					<div class="form-group">
						<input type="password" name="password" ng-model="password" class="form-control" required placeholder="password">
						<small class="error" ng-show="partnerWithUsForm.password.$error.required&&partnerWithUsForm.password.$touched">Required Fields</small>
					</div>
					<div class="form-group">
						<input type="password" name="cpassword" class="form-control" ng-model="cpassword" required placeholder="confirm Password" ng-pattern="password">
						<small class="error" ng-show="partnerWithUsForm.cpassword.$error.pattern&&partnerWithUsForm.cpassword.$touched">Password should match</small>
					</div>
					<div class="form-check">
						<label class="form-check-label" style="color:#fff">
							<input type="checkbox" class="form-check-input" name="agree" checked>
							I am agree with <a href="terms-and-conditions" class="bg-font">terms and conditions</a>
						</label>
					</div>
					<br>
					<div class="partner-btn">
						<button class="btn bg-color text-white" ng-disabled="!(partnerWithUsForm.$valid && !existCheck)" ng-class="{'disabled':!(partnerWithUsForm.$valid && !existCheck)}">Next</button>
						<br /><br />
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="loader" ng-if="isShowLoad">
		<div class="load-container">
			<div class="loader-main"></div>
		</div>
	</div>
</section> -->

<section id="partner-with-us" class="partner-with-us" ng-controller="partnerController">
	<div class="container-fluid">
		<div class="text-center">
			<!-- <h3 class="text-center">Thousands of registered professionals and growwing</h3>
			<p>Aiming to be the highest number of visitors and professionals all over the world.</p> -->
			<p>Reach Directly to Thousands of Architects and Interior Designers and Get Leads for Your services.</p>
		</div>

		<br>

		<div class="row">
			<div class="col-lg-8 col-md-6 col-sm-12">
				<div id="carouselExampleControls" class="carousel slide h-100" data-ride="carousel">
					<div class="carousel-inner">
						<div class="carousel-item active">
							<iframe width="100%" height="580" src="https://www.youtube.com/embed/XJG7lk4wVIc?autoplay=1&loop=1&autopause=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
						</div>
						<div class="carousel-item">
							<img src="./image/partner-with-us-slide-1.jpg" class="d-block w-100" alt="partner-with-us-slide-1">
						</div>
						<div class="carousel-item">
							<img src="./image/partner-with-us-slide-2.jpg" class="d-block w-100" alt="partner-with-us-slide-2">
						</div>
					</div>
					<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-sm-12">
				<div class="card shadow">
					<div class="card-body">
						<form name="partnerWithUsForm" ng-submit="onSubmit($event.target)">
							<div class="form-group">
								<input type="text" name="name" id="name" class="form-control" ng-model="name" required placeholder="Name">
								<small class="error" ng-show="partnerWithUsForm.name.$error.required&&partnerWithUsForm.name.$touched">Required Fields</small>
							</div>
							<div class="form-group">
								<input type="text" name="company_name" class="form-control" ng-model="company_name" required placeholder="Name of company/Organization">
								<small class="error" ng-show="partnerWithUsForm.company_name.$error.required&&partnerWithUsForm.company_name.$touched">Required Fields</small>
							</div>
							<div class="form-group">
								<input type="text" name="website" ng-model="website" class="form-control" placeholder="Website">
								<small class="error" ng-show="partnerWithUsForm.website.$error.required&&partnerWithUsForm.website.$touched">Required Fields</small>
							</div>
							<div class="form-group">
								<select class="form-control" ng-model="type">
									<option>{{type}}</option>
									<option>Manufacture and Supplier</option>
									<option>vendor</option>
								</select>
							</div>
							<div class="form-group">
								<input type="email" name="email" ng-model="email" class="form-control" required placeholder="Email" ng-blur="checkEmailExistence()">
								<small class="error" ng-show="partnerWithUsForm.email.$error.required&&partnerWithUsForm.email.$touched">Required Fields</small>
								<small class="error" ng-if="existCheck">Email already exist!</small>
							</div>
							<div class="form-group">
								<input type="number" name="phone" ng-model="phone" class="form-control" required placeholder="Phone" ng-min="10">
								<small class="error" ng-show="partnerWithUsForm.phone.$error.required&&partnerWithUsForm.phone.$touched">Required Fields</small>
								<small class="error" ng-show="partnerWithUsForm.phone.$error.minlength">Min length must be 10</small>
							</div>
							<div class="form-group">
								<input type="password" name="password" ng-model="password" class="form-control" required placeholder="password">
								<small class="error" ng-show="partnerWithUsForm.password.$error.required&&partnerWithUsForm.password.$touched">Required Fields</small>
							</div>
							<div class="form-group">
								<input type="password" name="cpassword" class="form-control" ng-model="cpassword" required placeholder="confirm Password" ng-pattern="password">
								<small class="error" ng-show="partnerWithUsForm.cpassword.$error.pattern&&partnerWithUsForm.cpassword.$touched">Password should match</small>
							</div>
							<div class="form-check">
								<label class="form-check-label">
									<input type="checkbox" class="form-check-input" name="agree" checked>
									I am agree with <a href="terms-and-conditions" class="bg-font">terms and conditions</a>
								</label>
							</div>
							<br>
							<div class="partner-btn">
								<button class="btn bg-color text-white w-100" ng-disabled="!(partnerWithUsForm.$valid && !existCheck)" ng-class="{'disabled':!(partnerWithUsForm.$valid && !existCheck)}">Next</button>
								<br /><br />
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="loader" ng-if="isShowLoad">
		<div class="load-container">
			<div class="loader-main"></div>
		</div>
	</div>

</section>