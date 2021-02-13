<section id="project-sec" ng-controller="matProductsController">
        <div class="home-margin" >
            <div class="space"></div>
            <div class="container-fluid " ng-if="materials">
                <div class="row">
                    <div class="col-md-3 hide-on-small-screeen">
                        <div class="space"></div>
                        <div class="pt-2"></div>
                        <div class="card">
                             <div class="card-body bg-color text-white" style="padding: 5px 15px;">
                                <b>{{category}}</b>
                              </div>
                        </div>
                        <br>
                        <div class="categ-list-div">
                            <p><b>All Category</b></p>
                            <ul>
                                <li ng-repeat="selectedSubCateg in selectedSubCategs track by $index">
                                    <a href="./materials/{{categoryForUrl}}/{{selectedSubCateg}}">
                                        {{selectedSubCateg | toUpperCaseFirst}}							
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="project-container">
                            <div class="d-flex mb-2">
                                <p><a href="/">Archue  </a> > <a href="/products/Finishes">Materials  </a> ><a href="/products/{{categoryForUrl}}">{{category | toUpperCaseFirst}}</a><span ng-if="selected!=undefined"> > {{selected | toUpperCaseFirst}}</span>>All</p>
                                <!-- <label class="ml-auto">
                                    <select ng-model='selected' id="select"  style="outline: none;border: none;">
                                        <option ng-repeat="subcat in selectedSubCategs track by $index">{{subcat}}</option>
                                    </select>
                                    <span ng-if="selected==undefined">Select SubCategory</span>
                                </label> -->
                                <div class="ml-auto category">
                                    <div class="dropdown">
                                    <button class="dropdown-toggle bg-color" type="button" data-toggle="dropdown">
                                        CATEGORY+
                                    </button>
                                    <div class="dropdown-menu">
                                        <a href="#" class="dropdown-item" ng-click = "setCategory($)">All</a>
                                        <a class="dropdown-item" href="#" ng-repeat="cat in selectedSubCategs|orderBy:cat track by $index" ng-click="setCategory(cat)">{{cat | toUpperCaseFirst}}</a>
                                    </div>
                                    </div>
                                </div>
                               
                            </div>
                            <ul class="projects" >
                                <li ng-repeat="material in materials|filter:selected as res track by $index">
                                    <a href="./material/{{material.material_upload_id}}/{{material.product_name}}" ng-click="setMaterial(material)" class="text-dark">
                                        <img ng-src="upload-file/{{material.product_image|getSingleImage}}" width="100%" height="100%">
                                    </a>
                                    <a href="./material/{{material.material_upload_id}}/{{material.product_name}}" ng-click="setMaterial(material)" class="text-dark">
                                        <p>{{material.product_name | toUpperCaseFirst}}</p>
                                    </a>
                                </li>
                                <!-- <li class="alert alert-danger" ng-if="res.length==0" style="flex-basis:100%!important">
                                    <small>No Data Found</small>
                                </li> -->
                            </ul>
                            <nav aria-label="pagination" ng-if="(materials|filter:selected).length > 0">
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

                            <div ng-if="res.length==0" class="alert alert-danger">
                                No Materials Found!
                            </div>
                            <a href="#" limit-dir></a>
                        </div>	
                    </div>
                </div>
            </div>
            <div ng-if="!materials" ng-include="'../include/loader.php'"></div>
        </div>
    </section>