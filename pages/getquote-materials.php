<section id="get-quote" class=" mt-4 mb-4" >
    <div class="container" ng-controller="getQuotePageCtrl">
        <div  ng-controller="materialController" class="architecture-material-container">
            <h5 class="bg-font text-center mb-4">We will help you get the best suppliers.<br />Lets get started!</h5>
            <form name="materialForm" ng-submit="onsubmit($event.target)">
                <div class="container-fluid">
                    <div class="form-group">
                        <input type="text" name="product_name" class="form-control" placeholder="Enter Product Name/Service Name"
                            data-ng-model="product_name" required list="options">
                        <datalist id="options">
                            <option ng-repeat="item in options track by $index">{{item}}</option>
                        </datalist>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="area" class="form-control" placeholder="Area" data-ng-model="area"
                                    required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" name="budget" placeholder=" Tentative Budget"
                                    data-ng-model="budget" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="specification" placeholder="Specification(if any)"
                            data-ng-model="specification">
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" placeholder="Email Id"
                                    data-ng-model="email" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="number" class="form-control" name="phone" placeholder="Phone Number"
                                    data-ng-model="phone" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" class="form-control" name="locat" placeholder="Location" ng-model="locat"
                                    >
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <textarea class="form-control" placeholder="Requirements Details.." rows="5" cols="20" name="requirement"
                            data-ng-model="requirement" ></textarea>
                    </div>
                    <button class="btn btn-primary bg-color border-0 w-100" ng-disabled="!materialForm.$valid">Get
                        Qoute</button>
                </div>
            </form>
        </div>
       
    </div>

</section>