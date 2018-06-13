
<section id="full-blog-sec" ng-controller="fullBlogController">
	<div class="main-conatiner mt-4 mb-4">
  		<div class="container">
  			<div class="row">
  				<div class="col-md-12">
  					<div class="outer-border">
  						<div class="blog-container">
	  						<div class="blog-image-container">
	  							<a href="#"><img ng-src="upload-file/{{blog.blog_file}}" class="img-fluid"></a>
	  							<div class="blog-image-abs">
	  								<h3>{{blog.heading}}</h3>
	  							</div>
	  						</div>
	  						<p><span class="fa fa-calendar"></span>&nbsp; {{blog.blog_date}} &nbsp;&nbsp;<span class="fa fa-clock-o"></span>&nbsp;&nbsp;{{blog.blog_time}}</p>
	  					</div>	
	  					<div data-ng-bind-html="trust(blog.html_content)">
	  						
	  					</div>
	  					<!-- <div class="d-flex flex-row-reverse pr-2">
	  						<div class="comment-container">
	  							<a href="#"><span class="fa fa-comment"></span>&nbsp;Leave a Comments</a>
	  							<p>comments:</p>
	  						</div>
	  					</div> -->
  					</div>
  				</div>
  				
  			</div>
  		</div>
  	</div>
</section>