<div my-nav></div>
<section class="section-padding" id="blog-sec-1" ng-controller="fetchBlogController">
	<div class="container-fluid" >
		<div class="row">
			<div class="col-lg-9 col-md-7 col-sm-12">
				<button class="btn" ng-click="isShowUnApprove()" ng-class="{'btn-primary':!isShowApprove}">SEE APPROVE BLOGS</button>
				<button class="btn" ng-click="isShowsApprove()" ng-class="{'btn-primary':isShowApprove}">SEE UNAPPROVE BLOGS</button>
				<div class="space"></div>

				<div class="blog-container" ng-if="blogs.length > 0">
					<div class="container-fluid">
						<div class="row">
							<div ng-if="blog.is_approve==0" ng-show="isShowApprove" class="mb-5 col-md-4 border border-dark p-4" ng-repeat="blog in blogs">
								<p><b>Uploaded By:</b>{{blog.name}}</p>
								<a ng-href="./blog/{{blog.blog_id}}/{{blog.url}}" ng-click="setBlog(blog)" class="blog-img">
									{{blog.heading}}
									<img ng-src="../upload-file/{{blog.blog_file}}" class="img-fluid">
								</a>
								<div class="blog-heading border-bottom border-info ">
									<h3>{{blog.heading}}</h3>
									<div class="date-time">
										<span class="fa fa-calendar"></span>&nbsp;{{blog.blog_date}}
										<span class="fa fa-clock-o"></span>&nbsp;{{blog.blog_time}}
									</div>
								</div>
								<div class="blog-content">
									<div ng-bind-html="trust(blog.html_content)"></div>
								</div>
								<div class="continue-btn pull-right">
									<a ng-href="./blog/{{blog.blog_id}}/{{blog.url}}" ng-click="setBlog(blog)">Continue Reading <span class="fa fa-long-arrow-right"></span></a>
								</div>
							</div>
							<div ng-if="blog.is_approve==1" ng-show="!isShowApprove" class="mb-5 col-md-4 border border-dark p-4" ng-repeat="blog in blogs">

								<p><b>Uploaded By:</b>{{blog.name}}</p>
								<a ng-href="./blog/{{blog.blog_id}}/{{blog.url}}" ng-click="setBlog(blog)" class="blog-img">
									<img ng-src="../upload-file/{{blog.blog_file}}" class="img-fluid">
								</a>
								<div class="blog-heading border-bottom border-info ">
									<h3>{{blog.heading}}</h3>
									<div class="date-time">
										<span class="fa fa-calendar"></span>&nbsp;{{blog.blog_date}}
										<span class="fa fa-clock-o"></span>&nbsp;{{blog.blog_time}}
									</div>
								</div>
								<div class="blog-content">
									<div ng-bind-html="trust(blog.html_content)"></div>
								</div>
								<div class="continue-btn pull-right">
									<a ng-href="./blog/{{blog.blog_id}}/{{blog.url}}" ng-click="setBlog(blog)">Continue Reading <span class="fa fa-long-arrow-right"></span></a>
								</div>
							</div>
						</div>
					</div>	
				</div>
				<div class="alert alert-danger" ng-if="blogs.length==0">
					No Blogs Found!
				</div>
			</div>
		</div>
	</div>
</section>