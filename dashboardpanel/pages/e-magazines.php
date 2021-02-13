<div my-nav></div>
<section id="e-magazine" class="section-padding" ng-controller="eMagazines">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3" ng-if="eMagazines" ng-repeat="eMagazine in eMagazines">
                <div class="card shadow h-100">
                    <img class="card-img-top" src="../upload-file/magazines/{{eMagazine.cover_image}}" alt="Card image cap">
                    <div class="card-footer">
                        <h5>
                            <a href="./e-magazine/{{eMagazine.id}}" ng-click="setEMagazine(eMagazine)">{{eMagazine.name}}</a>
                        </h5>
                    </div>
                </div>
            </div>
            <div class="col-md-12" ng-if="eMagazines.length == null">
                <div class="alert alert-danger">There not any magazine uploaded yet</div>
            </div>
        </div>
    </div>


    <!-- Floating Action Button -->
    <div class="add-magazine-btn">
        <button class="btn shadow" onclick="window.location.href='./add-e-magazine'">
            <span class="fa fa-2x fa-plus"></span>
        </button>
    </div>
</section>