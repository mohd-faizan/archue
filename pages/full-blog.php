<section id="full-blog-sec" ng-controller="fullBlogController">
    <div class="main-conatiner mt-4 mb-4">
        <div class="container">
            <div class="row" ng-if="blog">
                <div class="col-md-9 col-sm-12">
                    <div class="outer-border">
                        <div class="blog-container">
                            <div class="blog-image-container">
                                <div class="cur-page-div">
                                    <a href="./" class="bg-font">Archue</a>
                                    <span class="fa fa-angle-right"></span>
                                    <a href="/blog" class="bg-font">Blogs</a>
                                    <span class="fa fa-angle-right"></span>
                                    <a href="/blogs/{{blog.blog_id}}/{{blog.url}}" class="bg-font">{{blog.heading | toUpperCaseFirst}}</a>
                                </div>
                                <br>

                                <div class="blog-image-abs">
                                    <h3>{{blog.heading | toUpperCaseFirst}}</h3>
                                </div>
                                <div class="d-flex">
                                    <p class="mr-3">
                                        <span class="fa fa-calendar"></span> &nbsp; {{blog.blog_date|date:'mediumDate'}}
                                    </p>
                                    <p class="mr-3"><span class="fa fa-user"></span> <a style="color: #f4900d" href="./user-profile/{{ blog.username }}">{{blog.user_name}}</a>
                                    </p>
                                    <p class="m-0"><span class="fa fa-clock-o"></span> {{duration}} min read</p>
                                </div>


                                <br>

                                <div class="whats-app-btn">
                                    <a class="font-bold" socialshare socialshare-provider="whatsapp" socialshare-url="https://www.archue.com/blogs/{{blog.blog_id}}/{{blog.url}}">
                                        <i class="fa fa-whatsapp"></i> Share in Whatsapp
                                    </a>
                                </div>
                                <a href="#"><img ng-src="upload-file/{{blog.blog_file}}" class="img-fluid"></a>
                                <div class="project-share-option">
                                    <div>
                                        <a href="" class="fa {{blog.like ? 'fa-heart text-danger' : 'fa-heart-o'}}" ng-click="increaseLike()">&nbsp;{{blog.likes}}</a>
                                        <a href=""><span class="fa fa-eye"></span>&nbsp;{{blog.views}}</a>

                                        <!-- ==================================== -->
                                        <a href="">
                                            <span class="fa fa-facebook" socialshare socialshare-provider="facebook" socialshare-type="sharer" socialshare-via="167503137442216" socialshare-url="https://www.archue.com/blogs/{{blog.blog_id}}/{{blog.url}" socialshare-redirect-uri="" socialshare-popup-height="450"
                                                socialshare-popup-width="350" socialshare-trigger="click"></span></a>

                                        <a href=""><span class="fa fa-twitter"
											socialshare
											socialshare-provider="twitter"
											socialshare-hashtags="Architect, development, internet"
											socialshare-via="twitter"
											socialshare-text=""
											socialshare-url="https://www.archue.com/blogs/{{blog.blog_id}}/{{blog.url}}" socialshare-popup-height="450"
												socialshare-popup-width="350" socialshare-trigger="click"></span></a>

                                        <a href="" socialshare socialshare-provider="google" socialshare-url="https://www.archue.com/blogs/{{blog.blog_id}}/{{blog.url}" socialshare-popup-height="450" socialshare-popup-width="350" socialshare-trigger="click"><span class="fa fa-google-plus"></span></a>

                                        <a href="" socialshare socialshare-media="https://www.archue.com/upload-file/{{blog.blog_file}}" socialshare-provider="pinterest" socialshare-text="{{blog.heading}}" socialshare-url="https://www.archue.com/blogs/{{blog.blog_id}}/{{blog.url}" socialshare-popup-height="450"
                                            socialshare-popup-width="350" socialshare-trigger="click"><span class="fa fa-pinterest"></span></a>

                                        <a href="" socialshare socialshare-provider="tumblr" socialshare-media="https://www.archue.com/upload-file/{{blog.blog_file}}" socialshare-text="{{blog.heading}}" socialshare-url="https://www.archue.com/blogs/{{blog.blog_id}}/{{blog.url}" socialshare-popup-height="450"
                                            socialshare-popup-width="350" socialshare-trigger="click"><span class="fa fa-tumblr"></span></a>

                                        <a href="" socialshare socialshare-provider="linkedin" socialshare-url="https://www.archue.com/blogs/{{blog.blog_id}}/{{blog.url}" socialshare-text="{{blog.heading}}" socialshare-description="" socialshare-source="https://www.archue.com/blogs/{{blog.blog_id}}/{{blog.url}"
                                            socialshare-popup-height="450" socialshare-popup-width="350" socialshare-trigger="click"><span class="fa fa-linkedin"></span></a>
                                    </div>
                                </div>
                                <br />
                            </div>
                            <div data-ng-bind-html="trust(blog.html_content)"></div>
                        </div>
                        <div class="alert alert-danger" ng-if="!blog">
                            <small>No data Found</small>
                        </div>
                    </div>
                    <div class="space"></div>
                    <div class="next-prev-container">
                        <div class="prev">
                            <a ng-href="./blogs/{{prev.blog_id}}/{{prev.url}}" ng-if="prev!=undefined">
                                <div class="mr-auto">
                                    <img ng-src="upload-file/{{prev.blog_file}}" height="50" width="50">
                                </div>
                                <div>
                                    <span>{{prev.heading|uppercase}}</span>
                                    <span>PREVIOUS BLOG</span>
                                </div>
                            </a>
                        </div>
                        <div class="next">
                            <a ng-href="./blogs/{{nxt.blog_id}}/{{nxt.url}}" ng-if="nxt!=undefined">
                                <div>
                                    <span>{{nxt.heading|uppercase}}</span>
                                    <span>NEXT BLOG</span>
                                </div>
                                <div class="ml-auto">
                                    <img ng-src="upload-file/{{nxt.blog_file}}" height="50" width="50">
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="space"></div>
                    <!-- Commenting Form -->
                    <div class="blog-header blog-bg mt-4">
                        <h3 class="home-page-heading">Leave a Comment</h2>
                    </div>
                    <div class="comment-form-container">
                        <br />
                        <form class="form-horizontal" ng-submit="submitBlogComment($event.target,commentor)" name="commentform">
                            <fieldset>
                                <!-- Text input-->
                                <div class="form-group">
                                    <input type="text" name="name" ng-model="commentor.name" placeholder="Your Name" class="form-control input-md" required>
                                </div>

                                <!-- Textarea -->
                                <div class="form-group">
                                    <textarea class="form-control" ng-model="commentor.comment" name="comment" cols="20" rows="5" placeholder="Your Comment" required></textarea>
                                </div>

                                <!-- Button -->
                                <div class="form-group">
                                    <button class="btn bg-color text-white" ng-disabled="!commentform.$valid">Comment</button>
                                </div>
                            </fieldset>
                        </form>
                    </div>

                    <br />

                    <!-- Comments Container -->
                    <div class="blog-header blog-bg mt-4">
                        <h3 class="home-page-heading">Comments</h2>
                    </div>
                    <br />
                    <div class="comments-container">
                        <div class="card mb-3" ng-if="commentsOfBlog.length > 0" ng-repeat="commentOfBlog in commentsOfBlog">
                            <div class="card-header">
                                <div class="d-flex">
                                    <div class="mr-3"><span class="fa fa-user fa-3x"></span></div>
                                    <div>
                                        {{ commentOfBlog.commented_by }} <br /> {{ commentOfBlog.commented_on | date:'mediumDate' }}
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">{{ commentOfBlog.comment }}</div>
                        </div>
                        <div class="alert alert-danger" ng-if="commentsOfBlog.length == null || commentsOfBlog.length == undefined">
                            No Comments For this Blogs
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-12">

                    <br>

                    <!-- Similar Blog -->
                    <div class="card shadow">
                        <div class="card-header blog-bg text-white font-weight-bold">Similar Blogs</div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item p-0 mt-0 link" ng-repeat="similarBlog in similarBlogs">
                                <a href="./blogs/{{similarBlog.blog_id}}/{{similarBlog.url}}" class="sm-blog-container mt-0">
                                    <div class="image">
                                        <img ng-src="upload-file/{{ similarBlog.blog_file }}" alt="project-img-1" width="100%">
                                    </div>
                                    <div class="line-height p-3">
                                        {{ similarBlog.heading | limitTo: 30 }} {{similarBlog.heading.length > 30 ? '...' : ''}}
                                    </div>
                                </a>
                            </li>
                        </ul>
                        <div class="alert alert-danger mb-0" ng-if="similarBlogs.length == undefined || similarBlogs.length == null">
                            <p>No Blogs</p>
                        </div>
                    </div>
                    <!-- End of Similar Blog -->

                    <br><br>

                    <!-- E-Magazine -->
                    <div class="card shadow">
                        <div class="card-header blog-bg text-white font-weight-bold">Architecture E-Magazine
                        </div>
                        <div class="card-body">
                            <!-- <h5 class="card-title">Card title</h5> -->
                            <p class="card-text font-weight-bold">Subscribe to one of the best Architecture E-Magazine
                            </p>
                            <a href="./subscribe-e-magazine" class="btn btn-primary">Know more</a>
                        </div>
                        <div class="card-footer text-center link">
                            <a href="#" class="d-inline-block mr-2"><span
												class="fa fa-2x fa-facebook-square"></span></a>
                            <a href="#" class="d-inline-block mr-2"><span
												class="fa fa-2x fa-instagram"></span></a>
                            <a href="#" class="d-inline-block mr-2"><span
												class="fa fa-2x fa-twitter-square"></span></a>
                            <a href="#" class="d-inline-block"><span
												class="fa fa-2x fa-pinterest-square"></span></a>
                        </div>
                    </div>
                    <!-- End of E-Magazine -->

                    <br><br>

                    <!-- Included Side Material -->
                    <div ng-include="'include/sidematerial.php'"></div>
                    <!-- End of Side Material -->

                    <br><br>

                    <!-- Portfolio Sidebar -->
                    <div class="card shadow">
                        <div class="card-header blog-bg text-white font-weight-bold">Portfolio &amp; Case Study
                        </div>
                        <ul class="list-group list-group-flush" ng-controller="fetchPortfolioController">
                            <li class="list-group-item p-0 mt-0 link" ng-repeat="portfolio in portfolios|limitTo:3">
                                <a href="./full-portfolio/{{portfolio.portfolio_id}}/{{portfolio.portfolio_college}}/{{portfolio.portfolio_name}}" class="sm-blog-container mt-0" ng-click="setportfolio(portfolio)">
                                    <div class="image pb-3 pt-3">
                                        <img src="image/pdf-icon.png" class="pdf-icon">
                                    </div>
                                    <div class="line-height p-3">
                                        {{portfolio.portfolio_name}}
                                    </div>
                                </a>
                            </li>
                        </ul>
                        <div class="alert alert-danger mb-0" ng-if="portfolios.length==0">
                            <p>No Portfolio</p>
                        </div>
                    </div>
                    <!-- End of Portfolio Sidebar -->

                    <br><br>

                    <!-- Side Student Work -->
                    <div class="card shadow">
                        <div class="card-header blog-bg text-white font-weight-bold">Student Works</div>
                        <ul class="list-group list-group-flush" ng-controller="studentWorkController">
                            <li class="list-group-item p-0 mt-0 link" ng-controller="projectsController" ng-repeat="singlepro in myStudentProjectsArr|limitTo:3">
                                <a href="./full-project/{{singlepro.mainData.project_id}}/{{singlepro.url}}" ng-click="setFullProject(singlepro)" class="sm-blog-container mt-0">
                                    <div class="image">
                                        <img ng-src="uploads/{{singlepro.mainImage}}" alt="project-img-1" width="100%">
                                    </div>
                                    <div class="line-height p-3">
                                        {{singlepro.mainData.project_name}}
                                    </div>
                                </a>
                            </li>
                        </ul>
                        <div class="alert alert-danger mb-0" ng-if="myStudentProjectsArr.length==0">
                            <p>No Student Work Found!</p>
                        </div>
                    </div>
                    <!-- End of Side Student Work -->

                    <br><br>

                    <!-- Side Dessertation -->
                    <div class="card shadow">
                        <div class="card-header blog-bg text-white font-weight-bold">Dessertation</div>
                        <ul class="list-group list-group-flush" ng-controller="fetchDessertController">
                            <li class="list-group-item p-0 mt-0 link" ng-repeat="dessertation in dessertations|limitTo:3">
                                <a href="./full-dissertation/{{ dessertation.dessertation_id }}/{{dessertation.dessertation_college}}/{{dessertation.url}}" ng-click="setDessertation(dessertation)" class="sm-blog-container mt-0">
                                    <div class="image">
                                        <img src="image/pdf-icon.png" class="pdf-icon">
                                    </div>
                                    <div class="line-height p-3">
                                        {{dessertation.dessertation_name}}
                                    </div>
                                </a>
                            </li>
                        </ul>
                        <div class="alert alert-danger mb-0" ng-if="dessertations.length==0">
                            <p>No Dessertation</p>
                        </div>
                    </div>
                    <!-- End of Side Dessertation -->
                </div>
            </div>
            <div ng-if="!blog" ng-include="'../include/loader.php'"></div>
        </div>
        <div class="loader" ng-if="isShowLoad">
            <div class="load-container">
                <img src="image/loader.gif">
            </div>
        </div>
    </div>
</section>