<section id="e-magazine" class="py-5" ng-controller="eMagazine">
    <div class="container" ng-if="isUserHasSubscription">

        <h4 class="text-center">Welcome to the World of Best Architecture E-Magazines</h4>

        <br>

        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card text-center shadow h-100">
                    <div class="card-body">
                        <h5 class="card-title">Referral Earning: {{userReferralEarning | currency : "&#8377"}} </h5>
                        <h6 class="card-subtitle mb-2">Referral Code: <span class="text-success">{{userReferralCode}}</span> </h6>
                        <p class="card-text">Share E-magazines to the world and Earn.</p>

                        <a href="#" class="d-inline-block mr-2"><span class="fa fa-2x fa-facebook-square"></span></a>
                        <a href="#" class="d-inline-block mr-2"><span class="fa fa-2x fa-instagram"></span></a>
                        <a href="#" class="d-inline-block mr-2"><span class="fa fa-2x fa-twitter-square"></span></a>
                        <a href="#" class="d-inline-block"><span class="fa fa-2x fa-pinterest-square"></span></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12" ng-repeat="(key, emagazine) in emagazines">
                <div class="card shadow h-100">
                    <img class="card-img-top" src="./upload-file/magazines/{{emagazine.cover_image}}" alt="Card image cap">
                    <div class="card-footer">
                        <h6><a href="./e-magazine/{{emagazine.id}}" ng-click="setEMagazine(emagazine)">
                                #{{emagazines.length - key}} {{emagazine.name}}</a></h6>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container" ng-if="showPlans">
        <div class="row align-items-center">
            <div class="col-lg-8 col-md-6 col-sm-12">
                <h4>ARCHUE E-MAGAZINE</h4>
                <p><b>We believe in feeding mind, not the mindless feed</b></p>
                <p>Become a Archue E-Magazine subscriber and get unlimited access to the Architecture content all over
                    the world and also the new techniques events and Competitions.</p>

                <h4>Subscription Scheme</h4>
                <p>After Successful Subscription, you have been provided with a Referral Code. if
                    someone uses your referral code you will get 10% on every successful subscription
                </p>

                <p>Note: OFFER VALID FOR LIMITED TIME</p>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="card shadow">
                    <img class="card-img-top" src="./image/magazine-cover.jpg" alt="Magazine Cover">
                    <div class="card-body">
                        <ul id="features-list">
                            <li>Quaterly</li>
                            <li>Access Anywehere</li>
                            <li>4 Magazine in one year</li>
                            <li>Weekly Newsletter</li>
                        </ul>
                        <br>
                        <div class="form-group">
                            <select ng-model="selectedDuration" ng-change="setPrice(selectedDuration)" class="form-control">
                                <option value="">Select Subscription Duration</option>
                                <option ng-repeat="(key, duration) in durations" value="{{ key + 1 }}">{{duration}}
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="card-footer" ng-if="duration && currency == 'INR'">
                        <h5 class="d-inline-block">
                            {{ price | currency : "&#8377" }}
                        </h5>
                        <button class="btn btn-primary pull-right" ng-click="subcribe()">Continue</button>
                    </div>
                    <div class="card-footer" ng-if="duration && currency == 'USD'">
                        <h5 class="d-inline-block">
                            {{ price | currency : "$" }}
                        </h5>
                        <button class="btn btn-primary pull-right" ng-click="subcribe()">Continue</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>