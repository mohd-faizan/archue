<div my-nav></div>
<div class="space"></div>
<div class="space"></div>
<div class="space"></div>
<div class="space"></div>
<section id="material" ng-controller="usersController">
    <div class="container table-responsive">
        <div class="row mb-2">
            <div class="col-md-6">
                <h3 class="theme-font mb-4">ALL USERS</h3>
                <span class="pull-left"><b>Total:</b> {{users.length}}</span>
            </div>
            <div class="col-md-6">
                <button class="btn btn-primary pull-right mb-4" ng-click="cToExcel()">TO EXCEL</button>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-md-12">
                <div class="d-flex">
                    <div class="ml-auto">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" value="" ng-model="isThroughLead" class="form-check-input"
                                    name="optradio">All users
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" value="true" ng-model="isThroughLead" class="form-check-input"
                                    name="optradio">Users who bought lead
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <div class="form-group">
                                <select ng-model="userCategory" class="form-control" id="sel1">
                                    <option value="">All</option>
                                    <option ng-repeat="profession in professions">{{profession}}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="architect-container table-responsive mb-4">
            <!-- <div class="architect-attribute">
				<p>name</p>
				<p>EMAIL</p>
				<p>PHONE NUMBER</p>
				<p>PROFESSION</p>
			</div>
			<div class="architect-value">
				<p>{{user.name}}</p>
				<p>{{user.email}}</p>
				<p>{{user.mobileno}}</p>
				<p>{{user.profession}}</p>
				
			</div> -->
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Index</th>
                        <th>Name</th>
                        <th>EMAIL</th>
                        <th>SIGN ON</th>
                        <th>PHONE NUMBER</th>
                        <th>PROFESSION</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="user in users | userCategory: userCategory|myUserFilter:isThroughLead |limitTo:myUserLimit">
                        <td>{{$index + 1}}</td>
                        <td>{{user.name}}</td>
                        <td>{{user.email}}</td>
                        <td>{{user.user_date | date:"mediumDate"}}</td>
                        <td>{{user.mobileno}}</td>
                        <td>{{user.profession}}</td>
                        <td><button class="btn btn-danger" ng-click="delUser(user.user_id)">Delete</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="d-flex">
            <div class="ml-auto" ng-if="(users|myUserFilter:isThroughLead).length > 15">
                <button ng-click="decreaseUserLimit()" class="btn btn-primary" ng-disabled="initial === 0">Prev</button>
                <button ng-click="increaseUserLimit()" class="btn btn-primary">Next</button>
            </div>
        </div>
    </div>
</section>