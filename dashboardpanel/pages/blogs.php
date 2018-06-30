<div class="space"></div>
<section class="section-padding" id="blog-sec-1" ng-controller="fetchBlogController">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-9 col-md-7 col-sm-12">
				<div class="blog-container border-bottom border-dark p-3">
					<div class="container-fluid">
						<div class="row mb-4" ng-repeat="blog in blogs|limitTo:10 track by $index">
							<div class="col-md-12 col-lg-6 col-sm-12">
								<div class="blog-img">
									<img ng-src="../upload-file/{{blog.blog_file}}" class="img-fluid">
								</div>
								
							</div>
							<div class="col-md-12 col-lg-6 col-sm-12 " >
								<div class="blog-heading border-bottom border-info ">
									<h3>{{blog.heading}}</h3>
									<div class="date-time">
										<span class="fa fa-calendar"></span>&nbsp;{{blog.blog_date}}
										<span class="fa fa-clock-o"></span>&nbsp;{{blog.blog_time}}
									</div>
								</div>
								<div class="blog-content">
									<div ng-bind-html="trust(blog.html_content)">
										
									</div>
								</div>
								<div class="continue-btn pull-right">
									<a ng-href="./blog/{{blog.blog_id}}/{{blog.heading}}" ng-click="setBlog(blog)">Continue Reading <span class="fa fa-long-arrow-right"></span></a>
								</div>
							</div>

						</div>
					</div>	
				</div>
			</div>
			<div class="col-lg-3 col-md-5 col-sm-12">
				
				<div class="mb-4">
					<a href="./write-blog" class="btn btn-primary bg-color border-0 w-100">Write Blog</a>
				</div>
			
			</div>
		</div>
	</div>
</section>