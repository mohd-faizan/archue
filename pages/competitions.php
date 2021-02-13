<div class="space"></div>
<section class="section-padding" id="blog-sec-1" ng-controller="fetchCompetitionController">
    <div class="container-fluid">
        <div class="row" ng-if="competitions">
            <div class="col-lg-9 col-md-7 col-sm-12 my-order">
                <div class="blog-container border-bottom " ng-repeat="competition in competitions">
                    <div class="container-fluid">
                        <p><a ng-href="./" class="bg-font">Home</a> > <a href="/competitions" class="bg-font">Competitions</a></p>
                        <div class="row mb-4 blogs">
                            <div class="col-md-12 col-lg-6 col-sm-12">
                                <div class="blog-heading border-bottom border-info show-blog-heading">
                                    <h3><a ng-href="./competition/{{competition.competitor_id}}/{{competition.competition_heading}}" ng-click="setCompetition(competition)">{{competition.competition_heading | toUpperCaseFirst}}</a>
                                    </h3>
                                    <div class="date-time-container">
                                        <div class="date-time">
                                            <span class="fa fa-calendar"></span>&nbsp;{{competition.competitor_date|myDate|date:"mediumDate"}}
                                            <span class="fa fa-clock-o"></span>&nbsp;{{competition.competitor_date|myTime|date:"mediumTime"}}
                                        </div>
                                        <div class="user">
                                            <p><span class="fa fa-user"></span> {{competition.competitor_name}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="blog-img">
                                    <a ng-href="./competition/{{competition.competitor_id}}/{{competition.competition_heading}}"><img ng-src="upload-file/{{competition.competitor_file}}" class="img-fluid"></a>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-6 col-sm-12">
                                <div class="blog-heading border-bottom border-info hide-blog-heading">
                                    <h3><a ng-href="./competition/{{competition.competitor_id}}/{{competition.competition_heading}}" ng-click="setCompetition(competition)">{{competition.competition_heading}}</a>
                                    </h3>
                                    <div class="date-time-container">
                                        <div class="date-time">
                                            <span class="fa fa-calendar"></span>&nbsp;{{competition.competitor_date|myDate|date:"mediumDate"}}
                                            <span class="fa fa-clock-o"></span>&nbsp;{{competition.competitor_date|myTime|date:"mediumTime"}}
                                        </div>
                                        <div class="user">
                                            <p><span class="fa fa-user"></span> {{competition.competitor_name}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="blog-content">
                                    <div data-ng-bind-html="sanitize(competition.competitor_content)">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="project-share-option">
                        <div>

                            <a href="" class="fa {{competition.like ? 'fa-heart text-danger' : 'fa-heart-o'}}" ng-click="increaseLike(competition.competitor_id)">&nbsp;{{competition.likes}}</a>
                            <a href=""><span class="fa fa-eye"></span>&nbsp;{{competition.views}}</a>
                            <a href=""><span class="fa fa-facebook" socialshare socialshare-provider="facebook"
									socialshare-type="sharer" socialshare-via="167503137442216"
									socialshare-url="https://www.archue.com/competition/{{competition.competitor_id}}/{{competition.competition_heading}}"
									socialshare-redirect-uri="http://google.com" socialshare-popup-height="300"
									socialshare-popup-width="400" socialshare-trigger="click"></span></a>
                            <a href=""><span class="fa fa-twitter" socialshare socialshare-provider="twitter"
									socialshare-hashtags="Architect, development, internet" socialshare-via="twitter"
									socialshare-text=""
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
                        <div class="ml-auto">
                            <a ng-href="./competition/{{competition.competitor_id}}/{{competition.competition_heading}}" ng-click="setCompetition(competition)">Read More</a>
                        </div>
                    </div>
                </div>
                <nav aria-label="pagination" class="mt-2" ng-if="(competitions).length > 0">
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
                <div class="alert alert-danger" ng-if="competitions.length == 0">
                    No Competition Found!
                </div>
            </div>
            <div class="col-lg-3 col-md-5 col-sm-12">
                <div class="recent-post-container">
                    <a href="./add-competition" class="btn btn-primary bg-color border-0">Add Competition Here</a>
                </div>
            </div>
        </div>
        <div ng-if="!competitions" ng-include="'../include/loader.php'"></div>

    </div>
</section>