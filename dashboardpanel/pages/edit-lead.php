<div my-nav></div>
<div class="space"></div>
<div class="space"></div>
<div class="space"></div>
<div class="space"></div>
<section ng-controller="EditLeadController" class="margin" id="uploaded-lead-sec">
    <div class="card">
        <div class="card-body">
            <div class="alert alert-success" ng-if="successMessage">{{successMessage}}</div>
            <div class="alert alert-danger" ng-if="errMessage">{{errMessage}}</div>

            <form class="row" ng-submit="onSubmit()" ng-if="!isLoading">
                <div class="col-md-12 mb-4">
                    <h2 class="text-center">Update lead here</h2>
                </div>
                <div class="col-md-4 mb-4">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" class="form-control" ng-model="lead.name" required>
                </div>
                <div class="col-md-4 mb-4">
                    <label for="phone">Phone </label>
                    <input type="number" maxlength="10" id="phone" name="phone" ng-model="lead.phone" class="form-control" required>
                </div>
                <div class="col-md-4 mb-4">
                    <label for="email">Email </label>
                    <input type="email" class="form-control" id="email" ng-model="lead.email" name="email" required>
                </div>
                <div class="col-md-4 mb-4">
                    <label for="tentative-budget">Tentative budget</label>
                    <input type="number" class="form-control" id="tentative-budget" name="tentative-budget" ng-model="lead.tentativeBudget">
                </div>
                <div class="col-md-4 mb-4">
                    <label for="work-type">Work type</label>
                    <select name="work-type" class="form-control" id="work-type" ng-model="lead.workType" required>
                        <option value="" disabled>Select work type</option>
                        <option value="{{type}}" ng-repeat="type in workTypes">{{type}}</option>
                    </select>
                </div>
                <div class="col-md-4 mb-4">
                    <label for="lead-type">Lead type</label>
                    <select name="lead-type" id="lead-type" class="form-control" ng-model="lead.leadType" required>
                        <option value="" disabled>Select lead type</option>
                        <option value="{{lead}}" ng-repeat="lead in leadTypes">{{lead}}</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="cost">Lead Status</label>
                    <select name="lead-type" id="lead-type" class="form-control" ng-model="lead.status" required>
                        <option value="" disabled>Select Status</option>
                        <option value="0" >Sold Out</option>
                        <option value="1" >Available</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="cost">Lead cost</label>
                    <input type="number" ng-model="lead.cost" name="cost" id="cost" class="form-control" required>
                </div>
                <div class="col-md-4 mb-4">
                    <label for="city">City </label>
                    <input type="text" ng-model="lead.city" name="city" id="city" class="form-control" required>
                </div>
                <div class="col-md-4 mb-4">
                    <label for="ecpected-start-time">Expected start time </label>
                    <input type="date" ng-model="lead.expectedStartTime" name="ecpected-start-time" class="form-control" id="ecpected-start-time" required>
                </div>
                <div class="col-md-8 mb-4">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" class="form-control" ng-model="lead.description" cols="10" rows="5" required></textarea>
                </div>
                <div class="col-md-12 d-flex">
                    <button class="btn btn-primary ml-auto">Update</button>
                </div>
            </form>
            <p ng-if="isLoading">Loading....</p>
        </div>
    </div>
</section>