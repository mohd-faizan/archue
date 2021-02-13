<div my-nav></div>
<section id="full-blog-sec" ng-controller="fullEventController">
	<div class="main-conatiner mt-6 mb-4">
  		<div class="container">
  			<div class="row">
  				<div class="col-md-12">
  					<div class="mb-4">
              <button class="btn btn-danger mt-4" ng-click="del(event.event_id)">DELETE</button>
  						<button class="btn btn-success mt-4" ng-click="approve(event.event_id)" ng-if="event.is_approve==0">APPROVE</button>
  					</div>
  					<div class="outer-border">
  						<div class="blog-container">
	  						<div class="blog-image-container">
	  							<a href="#"><img ng-src="../upload-file/{{event.event_file}}" class="img-fluid"></a>
	  							<div class="blog-image-abs">
	  								<!-- <h3>{{blog.heading}}</h3> -->
	  							</div>
	  						</div>
	  						<p><span class="fa fa-calendar"></span>&nbsp; {{event.event_date}} &nbsp;&nbsp;<span class="fa fa-clock-o"></span>&nbsp;&nbsp;{{event.event_time}}</p>
	  					</div>	
	  					<div data-ng-bind-html="sanitize(event.event_content)"></div>
  					</div>
  				</div>
  			</div>
  		</div>
  	</div>
</section>