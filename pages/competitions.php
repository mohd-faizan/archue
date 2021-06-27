<!-- <div class="space"></div>
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
</section> -->



<section ng-controller="fetchCompetitionController" id="project-sec">
    <div class="home-margin">
        <div class="space"></div>
        <div class="container-fluid " ng-if="competitions">
            <div class="row">
                <div class="col-md-9">
                    <div class="cur-page-div">
                        <a href="./">Archue</a>
                        <span class="fa fa-angle-right"></span>
                        <a href="competitions">Competitions</a>
                        <span class="fa fa-angle-right"></span>
                        <span>
                            <span ng-if="category">{{category}}</span>
                            <span ng-if="category==undefined">All</span>
                            <span ng-if="category==''">All</span>
                        </span>
                    </div>
                    <div class="space"></div>
                    <div class="d-flex">
                        <div class="project-top-header">
                            <h5>{{category ? category : 'All'}}</h5>
                        </div>
                        <div style="margin-left: auto;margin-top: -3px;">
                            <button class="btn btn-primary bg-color text-dark" style="height: 32px;padding-top: 2px;border-radius: 0;">Register By</button>
                            <button class="btn btn-primary bg-color text-dark" style="height: 32px;padding-top: 2px;border-radius: 0;">Submit By</button>
                        </div>
                        <div class="category">
                            <div class="dropdown">
                                <button class="dropdown-toggle" type="button" data-toggle="dropdown">
                                    CATEGORY+
                                </button>
                                <div class="dropdown-menu">
                                    <a href="#" class="dropdown-item" ng-click="setCategory($)">All</a>
                                    <a class="dropdown-item" href="#"
                                        ng-repeat="cat in categories|orderBy:cat track by $index"
                                        ng-click="setCategory(cat)">{{cat}}</a>
                                </div>
                            </div>
                            <!-- <select ng-model="category" class="project-select">
								<option>{{category}}</option>
								<option ng-repeat="cat in categories track by $index">{{cat}}</option>
								}
							</select> -->
                        </div>
                    </div>
                    <div class="yellow-line bg-color"></div>
                    <div class="project-container">
                        <ul class="projects">
                            <li ng-if="competitions.length>0" ng-repeat="competition in competitions | searchList: 'competition_category' : category">
                                <a
                                    ng-href="./competition/{{competition.competitor_id}}/{{competition.competition_heading}}"><img
                                        ng-src="upload-file/{{competition.competitor_file}}" class="img-fluid"></a>
                                <a class="competetion-heading" ng-href="./competition/{{competition.competitor_id}}/{{competition.competition_heading}}"
                                    ng-click="setCompetition(competition)">{{competition.competition_heading |
                                    toUpperCaseFirst}}</a>
                            </li>
                        </ul>
                        <nav aria-label="pagination" class="mt-2" ng-if="(competitions | searchList: 'competition_category' : category).length > 0">
                            <ul class="pagination justify-content-center">
                                <li class="page-item" ng-class="{'disabled': active === 1}">
                                    <a class="page-link" href="#" tabindex="-1" ng-click="prev()">Previous</a>
                                </li>
                                <li class="page-item" ng-class="{'active': active === ($index +1)}"
                                    ng-repeat="page in paginations track by $index"><a class="page-link" href="#"
                                        ng-click="toPage($index+1)">{{$index+1}}</a></li>

                                <li class="page-item" ng-class="{'disabled': active === paginations.length}">
                                    <a class="page-link" href="#" ng-click="next()">Next</a>
                                </li>
                            </ul>
                        </nav>
                        <div class="alert alert-danger" ng-if="(competitions | searchList: 'competition_category' : category).length == 0">
                            No Competition Found!
                        </div>


                    </div>
                </div>
                <div class="col-md-3 pr-0 ">
                    <div class="recent-post-container">
                        <a href="./add-competition" class="btn btn-primary bg-color border-0">Add Competition Here</a>
                        <div ng-include="'include/sidematerial.php'" style="margin-top:3rem;"></div>
                    </div>
                </div>
            </div>
        </div>
        <div ng-if="!competitions" ng-include="'../include/loader.php'"></div>
    </div>
</section>