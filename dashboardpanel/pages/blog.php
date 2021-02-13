<div my-nav></div>
<section id="full-blog-sec" ng-controller="fullBlogController">
	<div class="main-conatiner mt-6 mb-4">
  		<div class="container border border-success p-2">
  			<div class="row">
  				<div class="col-md-12">
  					<div class="mb-4">
  						<button class="btn btn-danger mt-4" ng-click="del(blog.blog_id)">DELETE THIS BLOG</button>
  						<button class="btn btn-success mt-4" ng-click="approve(blog.blog_id)" ng-if="blog.is_approve==0">APPROVE</button>
						  <button class="btn btn-primary mt-4" ng-click="edit(blog.blog_id)" >Edit</button>
  					</div>
  					<div class="outer-border">
  						<div class="blog-container">
	  						<div class="blog-image-container">
	  							<a href="#"><img ng-src="../upload-file/{{blog.blog_file}}" class="img-fluid"></a>
	  							<div class="blog-image-abs">
	  								<h3>{{blog.heading}}</h3>
	  							</div>
	  						</div>
	  						<p><span class="fa fa-calendar"></span>&nbsp; {{blog.blog_date}} &nbsp;&nbsp;<span class="fa fa-clock-o"></span>&nbsp;&nbsp;{{blog.blog_time}}</p>
	  					</div>	
	  					<div data-ng-bind-html="trust(blog.html_content)"></div>
  					</div>
  				</div>
  			</div>
			<br />
			<div class="material-header bg-warning">
				<h3 class="home-page-heading">Comments</h3>
			</div>
			<br />
			<div class="comments-container p-4">
				<div class="card mb-3" ng-repeat="commentOfBlog in commentsOfBlog">
					<div class="card-header">
						<div class="d-flex">
							<div class="mr-3"><span class="fa fa-user fa-3x"></span></div>
							<div>
								{{ commentOfBlog.commented_by }} <br />
								{{ commentOfBlog.commented_on | date:'mediumDate' }}
							</div>
						</div>
					</div>
					<div class="card-body">{{ commentOfBlog.comment }}</div>
				  </div>
			</div>
  		</div>
  	</div>
</section>