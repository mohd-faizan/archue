<div class="space"></div>
<section class="section-padding" id="blog-sec-1" ng-controller="fetchBlogController">
	<div class="container-fluid">
		<div class="row" ng-if="blogs">
			<div class="col-lg-9 col-md-7 col-sm-12">
				<div class="blog-container border-bottom border-dark ">
					<div class="container-fluid">
						<p><a ng-href="./" class="bg-font">Home</a> > <a href="/blog" class="bg-font">Blogs</a></p>
						<br>
						<div class="row mb-4 blogs" ng-repeat="blog in blogs">
							<div class="col-md-12 col-lg-6 col-sm-12">
								<div class="blog-heading border-bottom border-info show-blog-heading">
									<h3><a ng-href="./blogs/{{blog.blog_id}}/{{blog.url}}" ng-click="setBlog(blog)">{{blog.heading | toUpperCaseFirst}}</a></h3>
									<div class="date-time">
										<span class="fa fa-calendar"></span>&nbsp;{{blog.blog_date|date:'mediumDate'}}
										<span class="fa fa-clock-o"></span>&nbsp;{{blog.blog_time}}
									</div>
								</div>
								<br />
								<div class="blog-img">
									<a ng-href="./blogs/{{blog.blog_id}}/{{blog.url}}"><img ng-src="upload-file/{{blog.blog_file}}"></a>
								</div>
							</div>
							<div class="col-md-12 col-lg-6 col-sm-12 ">
								<div class="blog-heading border-bottom border-info hide-blog-heading">
									<h3><a ng-href="./blogs/{{blog.blog_id}}/{{blog.url}}" ng-click="setBlog(blog)">{{blog.heading}}</a></h3>
									<div class="date-time">
										<span class="fa fa-calendar"></span>&nbsp;{{blog.blog_date|date:'mediumDate'}}
										<span class="fa fa-clock-o"></span>&nbsp;{{blog.blog_time}}
									</div>
								</div>
								<div class="blog-content">
									<div ng-bind-html="trust(blog.html_content)"></div>
								</div>
								<!-- <div class="continue-btn pull-right">
									<a ng-href="./blogs/{{blog.blog_id}}/{{blog.url}}" ng-click="setBlog(blog)">Continue Reading <span class="fa fa-long-arrow-right"></span></a>
								</div> -->
							</div>
							<div class="project-share-option">
								<div>
								<a href="" class="fa {{blog.like ? 'fa-heart text-danger' : 'fa-heart-o'}}" ng-click = "increaseLike(blog.blog_id)">&nbsp;{{blog.likes}}</a>
									<a href=""><span class="fa fa-eye"></span>&nbsp;{{blog.views}}</a>

									<!-- ==================================== -->
									<a href=""><span class="fa fa-facebook" socialshare socialshare-provider="facebook" socialshare-type="sharer" socialshare-via="167503137442216" socialshare-url="https://www.archue.com/blogs/{{blog.blog_id}}/{{blog.url}"
										socialshare-redirect-uri=""
										socialshare-popup-height="450"
										socialshare-popup-width="350"
										socialshare-trigger="click"></span></a>
									
									<a href=""><span class="fa fa-twitter"
										socialshare
										socialshare-provider="twitter"
										socialshare-hashtags="Architect, development, internet"
										socialshare-via="twitter"
										socialshare-text=""
										socialshare-url="https://www.archue.com/blogs/{{blog.blog_id}}/{{blog.url}}" socialshare-popup-height="450" socialshare-popup-width="350" socialshare-trigger="click"></span></a>

									<a href="" socialshare socialshare-provider="google" socialshare-url="https://www.archue.com/blogs/{{blog.blog_id}}/{{blog.url}"
										socialshare-popup-height="450"
										socialshare-popup-width="350"
										socialshare-trigger="click"><span class="fa fa-google-plus"></span></a>
									
									<a href=""
										socialshare
										socialshare-media="https://www.archue.com/upload-file/{{blog.blog_file}}" socialshare-provider="pinterest" socialshare-text="{{blog.heading}}" socialshare-url="https://www.archue.com/blogs/{{blog.blog_id}}/{{blog.url}"
										socialshare-popup-height="450"
										socialshare-popup-width="350"
										socialshare-trigger="click"><span class="fa fa-pinterest"></span></a>

									<a href=""
										socialshare
										socialshare-provider="tumblr"
										socialshare-media="https://www.archue.com/upload-file/{{blog.blog_file}}" socialshare-text="{{blog.heading}}" socialshare-url="https://www.archue.com/blogs/{{blog.blog_id}}/{{blog.url}"
										socialshare-popup-height="450"
										socialshare-popup-width="350"
										socialshare-trigger="click"><span class="fa fa-tumblr"></span></a>
									
									<a href=""
										socialshare
										socialshare-provider="linkedin"
										socialshare-url="https://www.archue.com/blogs/{{blog.blog_id}}/{{blog.url}"
										socialshare-text="{{blog.heading}}" socialshare-description="" socialshare-source="https://www.archue.com/blogs/{{blog.blog_id}}/{{blog.url}"
										socialshare-popup-height="450"
										socialshare-popup-width="350"
										socialshare-trigger="click"><span class="fa fa-linkedin"></span></a>
								</div>
								<div class="ml-auto">
									<a ng-href="./blogs/{{blog.blog_id}}/{{blog.url}}" ng-click="setBlog(blog)">Read More</a>
								</div>
							</div>
						</div>
						<nav aria-label="pagination" ng-if="(blogs).length > 0">
                        <ul class="pagination justify-content-center">
                            <li class="page-item" ng-class="{'disabled': active === 1}">
                                <a class="page-link" href="#" tabindex="-1" ng-click="prev()">Previous</a>
                            </li>
                            <li class="page-item" ng-class="{'active': active === ($index +1)}" ng-repeat="page in paginations track by $index"><a class="page-link" href="#" ng-click="toPage($index+1)">{{$index+1}}</a></li>

                            <li class="page-item" ng-class="{'disabled': active === paginations.length}">
                                <a class="page-link" href="#" ng-click="next()">Next</a>
                            </li>
                        </ul>
                    </nav>
						<div class="alert alert-danger" ng-if="blogs.length == 0">
							No Blogs Found!!
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-5 col-sm-12">
				<div ng-include="'include/sidematerial.php'" style="margin-top: 3.0rem"></div>
			</div>
		</div>
		<div ng-if="!blogs" ng-include="'../include/loader.php'"></div>
	</div>
</section>