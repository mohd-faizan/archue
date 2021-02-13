<section id="contact-sec-1" class="section-padding grey-bg">
	<div lang="home-margin">
		<div class="container">
			<h4 class="bg-font">CONTACT US</h4>
			<div>
				<p class="p-text">
					Your feedback is very important for us, if you want to submit a project, share an article or a great story with our readers, report an error, give us a tip, please email us at the following email addresses.
				</p>
				<p>For publications: <a href="mailto:admin@archue.com?Subject=publication">admin@archue.com</a></p>
				<p>For support, information and any feedback: <a href="mailto:admin@archue.com?Subject=Feedback">admin@archue.com</a></p>
			</div>
			<div class="space"></div>
			<h4 class="bg-font">UPLOAD FAQ</h4>
			<div>
				<p>
					To submit a project u can directly upload it to the projects, whereas u can submit ur project via mail.
				</p>
				<p>To submit your project via mail, we recommend u to upload separate files, don’t upload one zipped folder, this makes the review process much more efficient. Also, make sure your submission includes the following:</p>
			</div>
			<div class="faq-list-div">
				<ul class="faq-list">
					<li><b>1- Separate Drawings</b>:- Plans, Sections, Perspectives, etc. (Jpg Format, Longest dimension should not exceed 1800 pixels, with a minimum size of 1200 pixels)</li>
					<li><b>2- Project description</b>:-  Word Format – No PDFs please</li>
					<li><b>3- Project Credits</b>:- Word Format -Project Name, Your name/team members name, etc.</li>
				</ul>
			</div>
			<p class="p-text">Send your project email <a href="mailto:submissions@archue.com?Subject=Project Email">submissions@archue.com</a></p>
		</div>
	</div>
</section>
<section class="d-flex flex-row-reverse pr-4 pt-4">
	<p>Designed &amp; Developed By<a href="http://wampinfotech.com" target="_blank">wampinfotech</a></p>
</section>
<section id="contact-sec-2" class="section-padding">
	<div class="home-margin">
		<div class="container">
			<div class="contact-div text-center text-white">
				<h4>Any Other Query?</h4>
				<p class="text-center p-text">Just Fill Up the Form</p>
			</div>
			<div class="contact-form-div" ng-controller="contactController">
				<form id="contact-form" name="contactForm" ng-submit="onsubmit($event.target)">
					<div class="container-fluid">
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="form-group">
									<input type="text" name="name" class="form-control" placeholder="Your Name..." id="nameid" required ng-model="name">
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="form-group">
									<input type="email" name="email" class="form-control" placeholder="Your Email..." id="emailid" required ng-model="email">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12">
								<div class="form-group">
									<textarea cols="20" rows="5" class="form-control" placeholder="Your Query..." id="queryid" required ng-model="query"></textarea>
								</div>
							</div>
						</div>
						<div class="contact-form-sub-btn text-center">
							<button class="btn btn-lg" ng-disabled="!contactForm.$valid">Submit</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>