<div my-nav></div>
<section id="full-blog-sec" ng-controller="fullJobController">
	<div class="main-conatiner mt-6 mb-4">
  		<div class="container">
  			<div class="row">
  				<div class="col-md-12">
  					<div class="mb-4">
  						<button class="btn btn-danger mt-4" ng-click="del(job.job_id)">DELETE THIS JOB</button>
              <button class="btn btn-success mt-4" ng-click="approve(job.job_id)" ng-if="job.is_approve==0">APPROVE</button>
  					</div>
  					<div class="outer-border">
  						<div class="blog-container">
	  						<div class="blog-image-container">
	  							<a href="#"><img ng-src="../upload-file/{{job.job_file}}" class="img-fluid"></a>
	  							<div class="blog-image-abs">
	  								<h3>{{job.job_heading}}</h3>
	  							</div>
	  						</div>
	  						<p><span class="fa fa-calendar"></span>&nbsp; {{job.job_date}} &nbsp;&nbsp;</p>
	  					</div>	
	  					<div data-ng-bind-html="sanitize(job.job_content)"></div>
  					</div>
  				</div>
  			</div>
  		</div>
  	</div>
</section>