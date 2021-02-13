<div ng-controller="homeController">
    <div>
        <div ng-include="'include/carousel.php'"></div>
        <section  class="yellow-section my-bg-primary p-5">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <p class="m-0 font-weight-bold">Inspire thousand with your works and build a portfolio
                    </p>
                </div>
                <div class="col-md-6 d-flex home-button-container">
                    <a class="home-button" href="upload">Upload your work now</a>
                </div>
            </div>
        </section>
        <section class="p-5 bg-light">
            <h2 class="text-center">Archue - A complete architecture platform</h2>
            <p class="text-center">With an aim to inspire Architects and Designers to enhance the productivity in construction industry.</p>
            <div class="row">
                <div class="col-md-4" ng-repeat="section in sections">
                    <a href="{{section.link}}" class="blog-comp-student">
                        <span class="text-white blog-name ">{{section.name}}</span>
                        <p class="hover-text m-0 p-4 text-white ">
                            <span class="d-block ">{{section.hoverText}}</span>
                            <span class="d-block">Click here</span>
                        </p>
                    </a>
                </div>
            </div>
        </section>
        <section class="p-5">
            <div class="row">
                <div class="col-md-12">
                    <h2>Find &amp; order materials:</h2>
                    <p>See the full range of building Materials related to construction industry</p>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <a href="{{material.url}}" class="col-md-4 mb-2 home-material" ng-repeat="material in homeMaterials track by $index">
                            <img style="height: 200px;
                            object-fit: cover;
                            object-position: center;" class="w-100" src="{{material.src}}">
                            <span>{{material.name}}</span>
                        </a>
                    </div>
                    <div class="d-flex">
                        <a href="/materials/Finishes/Metallics" class="text-dark">+More</a>
                    </div>
                </div>
            </div>

        </section>
        <section class="p-5 my-bg-primary yellow-section">
            <div class="row align-items-center">

                <div class="col-md-6 ">

                    <p class="m-0 font-weight-bold ">Looking for Construction Materials Supply for your Upcoming Project.</p>
                    <p class="m-0 font-weight-bold">Let Archue handle it.</p>
                </div>
                <div class=" col-md-6 d-flex home-button-container">
                    <a class="home-button" data-toggle="modal" data-target="#qouteModal" ng-if="isShowGetQuote">Order now</a>
                </div>
            </div>
        </section>

        <section class="p-5 bg-light ">
            <div class="row ">
                <div class="col-md-12 ">
                    <h2>Inspire from projects:</h2>
                    <p>Get inspired by thousands of projects by the Architects and Designs Worldwide</p>
                </div>
                <div class="col-md-12 ">
                    <div class="row">
                        <a href="{{project.url}} " class="col-md-4 mb-2 home-material " ng-repeat="project in homeProjects track by $index ">
                            <img style="height: 200px;
                            object-fit: cover;
                            object-position: center;" class="w-100 " src="{{project.src}} ">
                            <span>{{project.name}}</span>
                        </a>
                    </div>
                    <div class="d-flex ">
                        <a href="/project " class="text-dark ">+More</a>
                    </div>
                </div>
            </div>
        </section>
        <section class="p-5 my-bg-primary yellow-section">
            <div class="row align-items-center ">
                <div class="col-md-6 home-button-container">
                    <a class="home-button" data-toggle="modal" data-target="#qouteModal" ng-if="isShowGetQuote">Get
                        quote now</a>
                </div>
                <div class="col-md-6">
                    <p class="m-0 font-weight-bold ">Looking for any service related to architecture such as DPR, DBR, PLUMBING DESIGN, STRUCTURAL DESIGN, BIM, 3D RENDRING</p>
                </div>


            </div>
        </section>
        <section class="p-5 bg-light">
            <div class="row">
                <div class="col-md-12 mb-4">
                    <h2>Participate in latest design competitions</h2>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <a ng-href="./competition/{{competition.competitor_id}}/{{competition.competition_heading}}" class="col-md-4 mb-2 home-material" ng-repeat="competition in competitions track by $index">
                            <img style="height: 200px;
                            object-fit: cover;
                            object-position: center;" class="w-100" src="upload-file/{{competition.competitor_file}}">
                            <span>{{competition.competition_heading}}</span>
                        </a>
                    </div>

                </div>
            </div>
        </section>
        <section class="p-5 my-bg-primary yellow-section">
            <div class="row align-items-center">
                <div class=" col-md-6">
                    <p class="m-0 font-weight-bold ">Are you a company related real estate contractors, architecture service provider or building constructions materials supplier</p>
                </div>
                <div class="col-md-6 d-flex home-button-container">
                    <a class="home-button" href="partner-with-us">Sell your product/service</a>
                </div>

            </div>
        </section>
        <section class="p-5">
            <div class="row">
                <div class="col-md-3 text-center" style="line-height: 1.3; " ng-repeat="sec in blogSections ">
                    <img width="50 " src="{{sec.src}} ">
                    <p class="m-0 font-weight-bold mt-2 ">{{sec.heading}}</p>
                    <p class="m-0 " style="font-size: 15px; ">{{sec.description}}</p>
                    <a href="{{sec.link}} " class="text-dark " style="text-decoration: underline; ">{{sec.linkText}}</a>
                </div>

            </div>
        </section>

        <section class="p-5 bg-light ">

            <div class="row ">
                <div class="col-md-12 ">
                    <h2>Testimonials and partners</h2>
                </div>
                <div class="col-md-12 ">
                    <div ng-include="'include/testimonial.php'"></div>
                </div>
            </div>
        </section>
        <section ng-controller="newsletterController" class="p-5 my-bg-primary ">
            <div class="alert alert-success " ng-if="showSuccess ">{{message}}</div>
            <div class="alert alert-danger " ng-if="showError ">{{message}}</div>
            <!-- <h5>Subscribe to get every updates from us.</h5> -->
            <form id="subscriberForm " class="row " ng-submit="subscribe() ">
                <div class="col-md-4 ">
                    <h4 class="m-0 text-white">Subscribe to Archue newsletter</h4>
                </div>
                <div class="col-md-3 ">
                    <input type="text " class="form-control " id="name " ng-model="name " placeholder="Enter your name " required>
                </div>
                <div class="col-md-3 ">
                    <input type="email " class="form-control " id="email " ng-model="email " placeholder="Enter your email " required>
                </div>
                <div class="col-md-2">
                    <button type="submit " class="btn btn-primary bg-white text-dark  ">Submit</button>
                </div>
            </form>
    </div>
    </section>
</div>
</div>