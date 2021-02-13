<section id="project-sec" ng-controller="getAllMaterialsController">
    <div class="home-margin">
        <div class="space"></div>
        <div class="container-fluid ">
            <div class="row">
                <div class="col-md-3 hide-on-small-screeen">
                    <div class="space"></div>
                    <div class="pt-2"></div>
                    <div class="card">
                        <div class="card-body" style="padding: 5px 15px;">
                            <b>Material</b>
                        </div>
                    </div>
                    <div class="categ-list-div">
                        <br>
                        <p><b>{{categoryForTemplate}}</b></p>
                        <ul>
                            <li ng-repeat="selectedSubCateg in selectedSubCategs track by $index">
                                <a href="./materials/{{categoryForUrl}}/{{selectedSubCateg}}" ng-class="{'active-categ':subCategoryForUrl==selectedSubCateg}">
									{{showCategories[$index]}}
								</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="project-container">
                        <p><a href="/">Archue </a> > <a href="/products/Finishes">Materials </a> ><a href="/products/{{categoryForUrl}}">{{categoryForTemplate}}</a>><a href="./materials/{{categoryForUrl}}/{{subCategoryForUrl}}">{{subCategoryForUrl}}</a>
                        </p>
                        <ul class="projects">
                            <li ng-repeat="material in materials track by $index">
                                <a href="./material/{{material.material_upload_id}}/{{material.product_name}}" ng-click="setMaterial(material)" class="text-dark">
                                    <img ng-src="upload-file/{{material.product_image|getSingleImage}}" width="100%" height="100%">
                                </a>
                                <a href="./material/{{material.material_upload_id}}/{{material.product_name}}" ng-click="setMaterial(material)" class="text-dark">
                                    <p>{{material.product_name | toUpperCaseFirst}}</p>
                                </a>
                            </li>
                        </ul>
                        <nav aria-label="pagination" ng-if="(materials).length > 0">
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
                        <div ng-if="materials.length==0" class="alert alert-danger">
                            No Materials Found!
                        </div>
                        <a href="#" limit-dir></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>