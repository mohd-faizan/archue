<section ng-controller="leadsController">
    <div class="container-fluid">
        <div class="cur-page-div mb-4 mt-3">
            <a href="./" class="bg-font">Archue</a>
            <span class="fa fa-angle-right"></span>
            <a href="/leads" class="bg-font">Leads</a>
        </div>
        <div class="bg-white pt-5 pl-2 pr-2 pb-5 mb-4">
            <div class="row">
                <div class="col-md-7 col-sm-12">
                    <img src="/image/lead-process.jpg" class="img-fluid" alt="">
                </div>
                <div class="col-md-5 col-sm-12">
                    <div class="position-relative h-100">
                        <div class="lead-process-text">
                            <h1>Looking to connect with the customers for business?</h1>
                            <p>Let Archue the Business solutions act as a bridge to help you connect with verified customers to grow your business successfully
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="filter mb-2">
                    <form class="row d-flex align-items-center mb-3">
                        <!-- <div class="col-md-4">
                            <label for="key">Select Key</label>
                            <select class="form-control" ng-change="onChange()" name="key" id="key" ng-model="filter.key">
                                <option value="" disabled>Select key</option>
                                <option value="workType">Work type</option>
                                <option value="tentativeBudget">Budget</option>
                                <option value="city">Location</option>
                            </select>
                        </div> -->
                        <div class="col-md-4">
                            <label for="val">Worktype</label>
                            <select name="val" id="val" class="form-control" ng-model="filter.worktype">
                                <option value="">All</option>
                                <option value="{{work}}" ng-repeat="work in workTypes">{{work}}</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="val">Budget</label>
                            <select name="val" id="val" ng-model="filter.budget" class="form-control">
                                <option value="">All</option>
                                <option value="{{budget.value}}" ng-repeat="budget in budgets">{{budget.label}}</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="val">Enter City</label>
                            <!-- <input name="val" placeholder="Enter city" class="form-control" id="val" ng-model="filter.city"> -->
                            <!-- <input list="countries" name="countries" placeholder="Enter city" class="form-control" id="countries" ng-model="filter.city">
                            <datalist id="countries">
                                <option ng-repeat="country in countries track by $index">{{country}}</option>
                            </datalist> -->
                            <input list="countries" name="country" ng-model="filter.city" id="country" class="form-control">

                            <datalist id="countries">
                                <option ng-repeat="country in countries track by $index" value="{{country}}">{{country}}
                                </option>
                            </datalist>
                        </div>
                        <!-- <div class="col-md-4">
                            <button class="btn btn-primary bg-color" ng-click="submit()">Apply</button>
                            <button class="btn btn-secondary" type="button" ng-click="reset()">Reset</button>
                        </div> -->
                    </form>
                    <div class="yellow-line bg-color"></div>
                </div>
                <div class="leads">
                    <div class="lead mb-4 text-white" ng-repeat="lead in leads | myfilter: 'tentativeBudget' : filter.budget | myfilter: 'city' : filter.city | myfilter : 'workType' : filter.worktype ">
                        <span class="lead-type bg-color text-white">{{lead.leadType}}</span>
                        <div class="row w-100">
                            <div class="col-md-6">
                                <p>Name: {{lead.name}}</p>
                                <p>Tentative Budget: {{lead.tentativeBudget}}</p>
                                <p>Expected start time: {{lead.expectedStartTime | date : 'mediumDate'}}</p>
                                <p>Status:
                                    <span ng-if="lead.person_count === '0'" class="text-danger">Sold out</span>
                                    <span class="text-success" ng-if="lead.person_count !== '0'">Available</span>
                                </p>
                            </div>
                            <div class="col-md-6">
                                <p>Location: {{lead.city}}</p>
                                <p>Lead Cost: {{lead.cost}}</p>
                                <p>Work type: {{lead.workType}}</p>
                            </div>
                            <div class="col-md-12">
                                <p>Description: {{lead.description}}</p>
                            </div>
                            <div class="col-md-12 d-flex">
                                <button ng-if="lead.person_count !== '0'" ng-click="buyNow(lead)" class="btn btn-primary bg-color ml-auto">Buy
                                    Now</button>
                                <button disabled ng-if="lead.person_count === '0'" class="btn btn-primary ml-auto">Sold
                                    Out</button>
                            </div>
                        </div>
                    </div>
                    <nav aria-label="pagination" ng-if="(leads | myfilter: 'tentativeBudget' : filter.budget | myfilter: 'city' : filter.city | myfilter : 'workType' : filter.worktype).length > 0">
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
                    <div ng-if="!isLoaded" ng-include="'../include/loader.php'"></div>
                    <p ng-if="isLoaded && (leads | myfilter: 'tentativeBudget' : filter.budget | myfilter: 'city' : filter.city | myfilter : 'workType' : filter.worktype ).length === 0">
                        No data found</p>
                </div>
            </div>
            <div class="col-md-4 lead-right">
                <div class="register-block bg-color p-4 text-center mb-2">
                    <p class="text-white mb-4">Register your Architecture or Interior Design firm with us to get daily lead updates</p>
                    <a href="./signup" class="home-button font-weight-bold">Register Now</a>
                </div>
                <div class="register-block bg-color p-4 text-center mb-2">
                    <p class="text-white mb-4">Looking for construction material for your upcoming project</p>
                    <div class="image">
                        <img src="image/lead-2.jpg" alt="Lead" style="height: 161px;">
                    </div>
                    <button class="home-button mt-2 font-weight-bold" data-toggle="modal" data-target="#qouteModal" ng-if="isShowGetQuote">Order Now</button>
                </div>
                <div class="register-block bg-color p-4 text-center mb-2">
                    <p class="text-white mb-4">Looking for service like 3D, BIM modeling etc for your upcoming project
                    </p>
                    <div>
                        <img src="image/lead-1.jpg" style="height: 161px;" alt="Lead">
                    </div>
                    <button class="home-button mt-2 font-weight-bold" data-toggle="modal" data-target="#qouteModal" ng-if="isShowGetQuote">Get quote Now</button>
                </div>
                <div class="register-block bg-color p-4 text-center mb-2">
                    <p class="text-white mb-4">Get your Architecture & Interior Design firm branded with Archue</p>
                    <a class="home-button font-weight-bold" href="./project">Know more</a>
                </div>
            </div>
        </div>
    </div>
</section>