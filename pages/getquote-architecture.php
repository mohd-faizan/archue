<section ng-controller="getQuotePageCtrl" class="material-architecture" style="background-image: url(image/getquote-architecture.jpg);">
    <div  ng-controller="architectController" class="architecture-material-container">
        <h5 class="bg-font text-center mb-4">We will help you connect with best Architects &amp; Interior designers</h5>
        <form name="architectForm" ng-submit="onsubmit($event.target)">
            <div class="container-fluid" >
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <select class="form-control" name="service" data-ng-model="service" required>
                                <option>{{service}}</option>
                                <option>Design Only</option>
                                <option>Design &amp; execution</option>
                                <option>Interior Design only</option>
                                <option>Interior Design &amp; execution</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="project_type" class="form-control" placeholder="Project type" data-ng-model="project_type" >
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="area" class="form-control" placeholder="Area" data-ng-model="area" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" name="budget" placeholder=" Tentative Budget" data-ng-model="budget" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="specification" placeholder="Specification(if any)" data-ng-model="specification">
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" placeholder="Email Id" data-ng-model="email" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="number" class="form-control" name="phone" placeholder="Phone Number" data-ng-model="phone" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="text" class="form-control" name="locat" placeholder="Location" data-ng-model="locat" required>
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <textarea class="form-control" placeholder="Requirements Details.." rows="5" cols="20" name="requirement" data-ng-model="requirement"></textarea>
                </div>
                <button class="btn btn-primary bg-color border-0 w-100" ng-disabled="!architectForm.$valid">Get Qoute</button>
            </div>
        </form>
    </div>
</section>