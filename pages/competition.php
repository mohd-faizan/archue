<section id="full-blog-sec" ng-controller="fullCompController">
    <div class="main-conatiner mt-4 mb-4">
        <div class="container">
            <div class="row" ng-if="competition">
                <div class="col-md-9 col-sm-12">
                    <div class="outer-border">
                        <div class="blog-container">
                            <p><a ng-href="./" class="bg-font">Home</a> > <a class="bg-font" ng-href="/competitions">competitions</a> > <a class="bg-font" href="/competition/{{competition.competitor_id}}/{{competition.competition_heading}}">{{competition.competition_heading | toUpperCaseFirst}}</a>
                            </p>
                            <br>
                            <div class="blog-image-abs">
                                <h3>{{competition.competition_heading}}</h3>
                                <p><span class="fa fa-calendar"></span>&nbsp; {{competition.competitor_date|myDate|date:"mediumDate"}} &nbsp;&nbsp;<span class="fa fa-clock-o"></span>&nbsp;&nbsp;{{competition.competitor_date|myTime|date:"mediumTime"}}
                                </p>
                            </div>
                            <br />
                            <div class="whats-app-btn">
                                <a class="font-bold" socialshare socialshare-provider="whatsapp" socialshare-url="https://www.archue.com/competition/{{competition.competitor_id}}/{{competition.competition_heading}}">
                                    <i class="fa fa-whatsapp"></i> Share in Whatsapp
                                </a>
                            </div>
                            <div class="blog-image-container">
                                <a href="#"><img ng-src="upload-file/{{competition.competitor_file}}" class="img-fluid"></a>
                                <div class="project-share-option">
                                    <div>
                                        <a href="" class="fa {{competition.like ? 'fa-heart text-danger' : 'fa-heart-o'}}" ng-click="increaseLike()">&nbsp;{{competition.likes}}</a>
                                        <a href=""><span class="fa fa-eye"></span>&nbsp;{{competition.views}}</a>
                                        <a href=""><span class="fa fa-facebook" socialshare
												socialshare-provider="facebook" socialshare-type="sharer"
												socialshare-via="167503137442216"
												socialshare-url="https://www.archue.com/competition/{{competition.competitor_id}}/{{competition.competition_heading}}"
												socialshare-redirect-uri="http://google.com"
												socialshare-popup-height="300" socialshare-popup-width="400"
												socialshare-trigger="click"></span></a>
                                        <a href=""><span class="fa fa-twitter" socialshare
												socialshare-provider="twitter"
												socialshare-hashtags="Architect, development, internet"
												socialshare-via="twitter" socialshare-text=""
												socialshare-url="https://www.archue.com/competition/{{competition.competitor_id}}/{{competition.competition_heading}}"
												socialshare-popup-height="300" socialshare-popup-width="400"
												socialshare-trigger="click"></span></a>
                                        <a href="" socialshare socialshare-provider="google" socialshare-url="https://www.archue.com/competition/{{competition.competitor_id}}/{{competition.competition_heading}}" socialshare-popup-height="300" socialshare-popup-width="400" socialshare-trigger="click"><span class="fa fa-google-plus"></span></a>
                                        <a href="" socialshare socialshare-media="https://www.archue.com/upload-file/{{competition.competitor_file}}" socialshare-provider="pinterest" socialshare-text="{{competition.competition_heading}}" socialshare-url="https://www.archue.com/competition/{{competition.competitor_id}}/{{competition.competition_heading}}"
                                            socialshare-popup-height="300" socialshare-popup-width="400" socialshare-trigger="click"><span class="fa fa-pinterest"></span></a>

                                        <a href="" socialshare socialshare-provider="tumblr" socialshare-type="link" socialshare-text="{{competition.competition_heading}}" socialshare-url="https://www.archue.com/competition/{{competition.competitor_id}}/{{competition.competition_heading}}"
                                            socialshare-popup-height="300" socialshare-popup-width="540" socialshare-trigger="click"><span class="fa fa-tumblr"></span></a>
                                        <a href="" socialshare socialshare-provider="linkedin" socialshare-text="Architect" socialshare-url="https://www.archue.com/competition/{{competition.competitor_id}}/{{competition.competition_heading}}" socialshare-description="Architect" socialshare-source="Archue"
                                            socialshare-popup-height="300" socialshare-popup-width="400" socialshare-trigger="click"><span class="fa fa-linkedin"></span></a>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="html-content" ng-bind-html="competition.competitor_content"></div>
                    </div>
                    <div class="space"></div>
                    <div class="next-prev-container">
                        <div class="prev">
                            <!-- <button ng-click="next(fullProject.mainData.project_id,false)"><<&nbsp;Prev</button> -->
                            <a ng-href="./competition/{{prev.competitor_id}}/{{prev.competition_heading}}" ng-if="prev">
                                <div class="mr-auto">
                                    <img ng-src="upload-file/{{prev.competitor_file}}" height="50" width="50">
                                </div>
                                <div>
                                    <span>{{prev.competition_heading|uppercase}}</span>
                                    <span>PREVIOUS COMPETITION</span>
                                </div>
                            </a>
                        </div>
                        <div class="next">
                            <!-- <button ng-click="next(fullProject.mainData.project_id,true)">Next&nbsp;>></button> -->
                            <a ng-href="./competition/{{nxt.competitor_id}}/{{nxt.competition_heading}}" ng-if="nxt">
                                <div>
                                    <span>{{nxt.competition_heading|uppercase}}</span>
                                    <span>NEXT COMPETITION</span>
                                </div>
                                <div class="ml-auto">
                                    <img ng-src="upload-file/{{nxt.competitor_file}}" height="50" width="50">
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-12">
                    <div ng-include="'include/sidematerial.php'"></div>
                    <br />

                    <div class="blog-header material-bg">
                        <h3 class="home-page-heading"> Portfolio &amp; Case Study</h2>
                    </div>
                    <div ng-controller="fetchPortfolioController">
                        <div class="sm-blog-container" ng-repeat="portfolio in portfolios|limitTo:3">
                            <div class="image link">
                                <a href="./full-portfolio/{{portfolio.portfolio_id}}/{{portfolio.portfolio_college}}/{{portfolio.portfolio_name}}" ng-click="setportfolio(portfolio)"><img src="image/pdf-icon.png"></a>
                            </div>
                            <div class="link mb-2 line-height">
                                <a href="./full-portfolio/{{portfolio.portfolio_id}}/{{portfolio.portfolio_college}}/{{portfolio.portfolio_name}}" ng-click="setportfolio(portfolio)">{{portfolio.portfolio_name}}</a>
                            </div>
                        </div>
                        <div class="alert alert-danger" ng-if="portfolios.length==0">
                            <p>No Portfolio</p>
                        </div>
                    </div>

                    <div class="material-header material-bg mt-2">
                        <h3 class="home-page-heading"> Student works</h2>
                    </div>
                    <div ng-controller="studentWorkController" style="margin-bottom: 5rem">
                        <div class="sm-blog-container" ng-controller="projectsController" ng-repeat="singlepro in myStudentProjectsArr|limitTo:3">
                            <a ng-href="./full-project/{{singlepro.mainData.project_id}}/{{singlepro.url}}" class="image link" ng-click="setFullProject(singlepro)">
                                <img ng-src="uploads/{{singlepro.mainImage}}" alt="project-img-1" width="100%">
                                <br>
                            </a>
                            <div class="link line-height">
                                <a ng-href="./full-project/{{singlepro.mainData.project_id}}/{{singlepro.url}}" ng-click="setFullProject(singlepro)">
                                    <p>{{singlepro.mainData.project_name}}</p>
                                </a>
                            </div>
                        </div>

                        <div class="alert alert-danger" ng-if="myStudentProjectsArr.length==0">
                            <p>No Student Work</p>
                        </div>
                    </div>

                    <div class="blog-header material-bg">
                        <h3 class="home-page-heading"> Dessertation</h2>
                    </div>
                    <div ng-controller="fetchDessertController">
                        <div class="sm-blog-container" ng-repeat="dessertation in dessertations|limitTo:3">
                            <div class="image link">
                                <a href="./full-dissertation/{{ dessertation.dessertation_id }}/{{dessertation.dessertation_college}}/{{dessertation.url}}" ng-click="setDessertation(dessertation)"><img src="image/pdf-icon.png"></a>
                            </div>
                            <div class="link line-height">
                                <a href="./full-dissertation/{{ dessertation.dessertation_id }}/{{dessertation.dessertation_college}}/{{dessertation.url}}" ng-click="setDessertation(dessertation)">{{dessertation.dessertation_name}}</a>
                            </div>
                        </div>
                        <div class="alert alert-danger" ng-if="dessertations.length==0">
                            <p>No Dessertation</p>
                        </div>
                    </div>
                </div>
            </div>
            <div ng-if="!competition" ng-include="'../include/loader.php'"></div>

        </div>
    </div>
</section>