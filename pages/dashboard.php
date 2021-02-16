<div ng-controller="dashboardController">
    <div class="space"></div>
    <div class="space"></div>
    <div class="container">
        <div class="dashboard-top-container">
            <div class="user-image">
                <img ng-src="uploads/{{userData.profile}}" alt="user-image" class="img-fluid">
            </div>
            <div class="user-info">

                <h3>{{userData.username}}</h3>
                <p class="mb-0"><strong>{{userData.profession}}</strong></p>
                <p ng-if="userData.company_name != 'No Available'">{{userData.company_name}}</p>

                <br>
                <a ng-href="./upload" class="btn btn-primary bg-color border-0" ng-if="pro.indexOf(userData.profession) == -1"><span
						class="fa fa-file">&nbsp;&nbsp;</span>Upload</a>
                <a href="./user-profile/{{userData.myUsername}}" class="btn btn-primary bg-color border-0"><span
						class="fa fa-eye">&nbsp;&nbsp;</span>View profile</a>
                <button class="btn btn-danger" ng-click="delHimself(userData.id)" disabled>Delete</button>
            </div>
            <div class="buy-now">
                <a class="btn btn-primary bg-color border-0" href="./plan-info" ng-if="myLeads.length==0">Subscribe Our
					Plans</a>
            </div>
        </div>

        <section id="user-uploads" ng-if="pro.indexOf(userData.profession)==-1">
        <div class="space"></div>
            <div class="space"></div>
        <h3>Leads</h3>
            <div class="space"></div>
            <div class="user-upload-container">
                <table class="table table-striped table-bordered">
                    <tr>
                        <td>Sr.No.</td>
                        <td>Name</td>
                        <td>Email</td>
                        <td>Purchased on</td>
                        <td>Cost</td>
                        <td>Phone</td>
                        <td>Description</td>
                    </tr>
                    <tr ng-repeat="lead in (leads | limitTo:leadLimit) track by $index">
                        <td>{{$index + 1}}</td>
                        <td>{{lead.name}}</td>
                        <td>{{lead.email}}</td>
                        <td>{{lead.purchasedOn  | date :'mediumDate'}}</td>
                        <td>{{lead.cost}}</td>
                        <td>{{lead.phone}}</td>
                        <td>{{lead.description}}</td>
                    </tr>
                    <tr class="text-center" ng-if="leads.length == 0">
                        <td colspan="7">No Data Found</td>
                    </tr>
                </table>
                <div class="increment-btn d-block m-2" ng-if="leads.length > 3">
                <button class="btn btn-info" ng-click="incrementLead()">Show More Leads</button>
            </div>
            </div>
            
            <div class="space"></div>
            <div class="space"></div>
            <h3>BLOG</h3>
            <div class="space"></div>
            <div class="user-upload-container" ng-init="bloglimit = 3">
                <div ng-if="blogs.length > 0" ng-repeat="blog in blogs|limitTo:bloglimit" class="user-upload">
                    <a ng-href="./blogs/{{blog.blog_id}}/{{blog.url}}" ng-click="setUserData(blog,'blog')">
                        <img ng-src="upload-file/{{blog.blog_file}}" class="img-fluid">
                    </a>
                    <a ng-href="./blogs/{{blog.blog_id}}/{{blog.url}}" ng-click="setUserData(blog,'blog')">
                        <p class="mt-2">{{blog.heading | toUpperCaseFirst}}</p>
                    </a>
                    <button class="delete-btn" title="Delete" ng-click="delete(blog.blog_id,'blog')"><span
							class="fa fa-times fa-2x"></span></button>
                </div>
                <div class="alert alert-danger" ng-if="blogs.length==0">
                    <b>NO BLOG FOUND!</b>
                </div>
            </div>
            <div class="increment-btn d-block m-2" ng-if="blogs.length > 0">
                <button class="btn btn-info" ng-click="bloglimit = bloglimit + 3">Show More Blog</button>
            </div>
            <div class="space"></div>
            <div class="space"></div>

            <h3>PROJECTS</h3>
            <div class="space"></div>
            <div class="user-upload-container" ng-init="projLimit = 3">
                <div ng-if="myProjectsArr.length > 0" ng-repeat="singlepro in myProjectsArr track by $index|limitTo: projLimit" class="user-upload">

                    <a href="./full-project/{{singlepro.mainData.project_id}}/{{singlepro.url}}" ng-click="setUserData(singlepro,'project')">
                        <img ng-src="uploads/{{singlepro.mainImage}}" class="img-fluid">
                    </a>

                    <a href="./full-project/{{singlepro.mainData.project_id}}/{{singlepro.url}}" ng-click="setUserData(singlepro,'project')">
                        <p class="mt-2">{{singlepro.mainData.project_name | toUpperCaseFirst}}</p>
                    </a>
                    <button class="delete-btn" title="Delete" ng-click="delete(singlepro.mainData.project_id,'projects')"><span
							class="fa fa-times fa-2x"></span></button>
                </div>
                <div ng-if="myProjectsArr.length==0" class="alert alert-danger">
                    <b>NO PROJECT FOUND!</b>
                </div>
            </div>
            <div class="increment-btn d-block m-2" ng-if="myProjectsArr.length > 0">
                <button class="btn btn-info" ng-click="projLimit = projLimit + 3">Show More Projects</button>
            </div>

            <div class="space"></div>
            <div class="space"></div>

            <h3>DESSERTATIONS</h3>
            <div class="space"></div>
            <div class="user-file-data" ng-init="dessLimit = 3">
                <div ng-if="dessertations.length > 0" ng-repeat="dessertation in dessertations|limitTo: dessLimit">
                    <div class="conntent-div">
                        <div class="content-box">
                            <div class="content-img">
                                <img src="image/pdf-icon.png">
                            </div>
                            <div class="content-data">
                                <h5>
                                    <a href="./full-dissertation/{{dessertation.dessertation_id}}/{{dessertation.dessertation_college}}/{{dessertation.dessertation_name}}" ng-click="setUserData(dessertation,'dessertation')">{{dessertation.dessertation_name | toUpperCaseFirst}}</a>
                                </h5>
                            </div>
                        </div>
                        <button class="delete-btn" title="Delete" ng-click="delete(dessertation.dessertation_id,'dessertation')"><span
								class="fa fa-times fa-2x"></span></button>
                    </div>
                </div>
                <div ng-if="dessertations.length == 0" class="alert alert-danger">
                    <b>NO DESSERTATION FOUND!</b>
                </div>
            </div>
            <div class="increment-btn d-block m-2" ng-if="dessertations.length > 0">
                <button class="btn btn-info" ng-click="dessLimit = dessLimit + 3">Show More Dessertations</button>
            </div>

            <div class="space"></div>
            <div class="space"></div>

            <h3>PORTFOLIO</h3>
            <div class="space"></div>
            <div class="user-file-data" ng-init="portLimit = 3">
                <div ng-if="portfolios.length > 0" ng-repeat="portfolio in portfolios|limitTo: portLimit">
                    <div class="conntent-div">
                        <div class="content-box">
                            <div class="content-img">
                                <img src="image/pdf-icon.png">
                            </div>
                            <div class="content-data">
                                <h5>
                                    <a href="./full-portfolio/{{portfolio.portfolio_id}}/{{portfolio.portfolio_college}}" ng-click="setUserData(portfolio,'portfolio')">{{portfolio.portfolio_name | toUpperCaseFirst}}</a>
                                </h5>
                            </div>
                        </div>
                        <button class="delete-btn" title="Delete" ng-click="delete(portfolio.portfolio_id,'portfolio')"><span
								class="fa fa-times fa-2x"></span></button>
                    </div>
                </div>
                <div ng-if="portfolios.length == 0" class="alert alert-danger">
                    <b>NO PORTFOLIO FOUND!</b>
                </div>
            </div>
            <div class="increment-btn d-block m-2" ng-if="portfolios.length > 0">
                <button class="btn btn-info" ng-click="portLimit = portLimit + 3">Show More Portfolio</button>
            </div>

            <div class="space"></div>
            <div class="space"></div>

            <h3>THESIS</h3>
            <div class="space"></div>
            <div class="user-upload-container" ng-init="thesisLimit = 3">
                <div ng-if="fullThesisArr.length > 0" ng-repeat="singlepro in fullThesisArr track by $index|limitTo:thesisLimit" class="user-upload">
                    <a href="./full-thesis/{{singlepro.singleThesis.file_name}}" ng-click="setUserData(singlepro,'thesis')">
                        <img ng-src="uploads/{{singlepro.singleThesis.file}}" class="img-fluid">
                    </a>
                    <a href="./full-thesis/{{singlepro.singleThesis.thesis_id}}/{{singlepro.singleThesis.file_name}}" ng-click="setUserData(singlepro,'thesis')">
                        <p class="mt-2">{{singlepro.singleThesis.file_name | toUpperCaseFirst}}</p>
                    </a>
                    <button class="delete-btn" title="Delete" ng-click="delete(singlepro.thesis.thesis_id,'thesis')"><span
							class="fa fa-times fa-2x"></span></button>
                </div>
                <div ng-if="fullThesisArr.length==0" class="alert alert-danger">
                    <b>NO THESIS FOUND!</b>
                </div>
            </div>
            <div class="increment-btn d-block m-2" ng-if="fullThesisArr.length > 0">
                <button class="btn btn-info" ng-click="thesisLimit = thesisLimit + 3">Show More Thesis</button>
            </div>

            <div class="space"></div>
            <div class="space"></div>

            <h3>THESIS REPORT</h3>
            <div class="space"></div>
            <div class="user-file-data" ng-init="thesisRepLimit = 3">
                <div ng-if="thesis_reports.length > 0" ng-repeat="thesis_report in thesis_reports|limitTo:thesisRepLimit">
                    <div class="conntent-div">
                        <div class="content-box">
                            <div class="content-img">
                                <img src="image/pdf-icon.png">
                            </div>
                            <div class="content-data">
                                <h5>
                                    <a href="./full-thesis-report/{{thesis_report.thesis_report_id}}/{{thesis_report.thesis_report_college}}/{{thesis_report.thesis_report_name}}" ng-click="setUserData(thesis_report,'thesis_report')">{{thesis_report.thesis_report_name | toUpperCaseFirst}}</a>
                                </h5>
                            </div>
                        </div>
                        <button class="delete-btn" title="Delete" ng-click="delete(thesis_report.thesis_report_id,'thesis_report')"><span
								class="fa fa-times fa-2x"></span></button>
                    </div>
                </div>
                <div ng-if="thesis_reports.length == 0" class="alert alert-danger">
                    <b>NO THESIS REPORT FOUND!</b>
                </div>
            </div>
            <div class="increment-btn d-block m-2" ng-if="thesis_reports.length > 0">
                <button class="btn btn-info" ng-click="thesisRepLimit = thesisRepLimit + 3">Show More Thesis
					Report</button>
            </div>
        </section>

        <div class="space"></div>
        <div class="space"></div>
        <section ng-if="pro.indexOf(userData.profession)!=-1">
            <div ng-if="!isExpired">
                <div class="leads-main-container">
                    <div class="lead-heading">
                        <h1>Leads</h1>
                    </div>
                    <div class="leads-plan-info">
                        <a href="./plan-info" class="btn btn-primary bg-color border-0"> Upgrade/Renew</a>
                        <div class="space"></div>
                        <p class="plan-validity">
                            <b>Active Plan</b>
                            <span ng-if="plan==null">Subscribe Plan</span>
                            <span>
								{{plan.plan_name | toUpperCaseFirst}}
								( {{initialDate|date:'mediumDate'}} - {{expireDate|date:'mediumDate'}} )
							</span>
                        </p>
                    </div>
                </div>
                <div class="leads-container" ng-if="plan.plan_name=='SMALL BRAND'">
                    <div class="leades" ng-repeat="lead in leads|limitTo:leadLimit">
                        <div class="table-data">
                            <table width="100%">
                                <tr>
                                    <th>Product/Service Name:</th>
                                    <td>: {{lead.product_name | toUpperCaseFirst}}</td>
                                </tr>
                                <tr>
                                    <th>Location</th>
                                    <td>: {{lead.locat}}</td>
                                </tr>
                                <tr>
                                    <th>Specification</th>
                                    <td>: {{lead.specification}}</td>
                                </tr>
                                <tr>
                                    <th>Area</th>
                                    <td>: {{lead.area}}</td>
                                </tr>
                                <tr>
                                    <th>Tentative Budget</th>
                                    <td>: {{lead.budget}}</td>
                                </tr>
                            </table>
                        </div>
                        <a class="btn btn-primary bg-color border-0 text-white">{{lead.mat_date|toDate|date:'mediumDate'}}</a>
                        <a href="plan-info" class="btn btn-primary bg-color border-0 ml-3">View</a>
                    </div>
                    <div ng-if="leads.length > 0" style="align-self: center;display: block;width:100%"><button class="btn btn-default bg-color border-0" ng-click="updateLead()" ng-if="leadLimit<leads.length">MORE</button></div>

                    <div ng-if="leads.length==0" class="alert alert-danger">
                        No leads
                    </div>
                </div>
                <div class="leads-container" ng-if="plan.plan_name!='SMALL BRAND'">
                    <div class="leades" ng-repeat="lead in leads|limitTo:leadLimit as res">
                        <p><b>Product/Service Name:</b>&nbsp;&nbsp;{{lead.product_name | toUpperCaseFirst}}</p>
                        <p><b>Email:</b>&nbsp;&nbsp;{{lead.email}}</p>
                        <p><b>Phone Number:</b>&nbsp;&nbsp;{{lead.phone}}</p>
                        <p><b>Location:</b>&nbsp;&nbsp;{{lead.locat}}</p>
                        <p><b>Specification:</b>&nbsp;&nbsp;{{lead.specification}}</p>
                        <p><b>Area:</b>&nbsp;&nbsp;{{lead.area}}</p>
                        <p><b>Tentative Budget:</b>&nbsp;&nbsp;{{lead.budget}}</p>
                        <p><b>Upload On:</b>&nbsp;&nbsp;{{lead.mat_date|toDate|date:'mediumDate'}}</p>
                    </div>
                    <div ng-if="leads.length > 0" style="align-self: center"><button class="btn btn-default bg-color border-0" ng-click="updateLead()" ng-if="leadLimit<leads.length">MORE</button></div>
                    <div ng-if="leads.length==0" class="alert alert-danger">
                        No leads related to your product.
                    </div>
                </div>
            </div>
            <div ng-if="isExpired" class="alert alert-info">
                <small><span class="fa fa-info"></span>&nbsp;&nbsp;Your Plan has been expired .Please Upgrade
					it.&nbsp;&nbsp;<a href="plan-info" class="btn btn-primary bg-color border-0">Upgrade</a></small>
            </div>
            <h2>Your Products</h2>
            <div class="upload-container">
                <a ng-href="/material/{{material.material_upload_id}}/{{material.product_name}}" class="product text-dark" ng-repeat="material in materials" ng-if="materials">
                    <img ng-src="upload-file/{{material.product_image|getSingleImage}}" height="200">
                    <h6 style="padding:.5rem 0">{{material.product_name}}</h6>
                </a>
                <div ng-if="materials.length==0" class="alert alert-danger">No products added</div>
                <div ng-if="plan.pages==0" style="flex-grow: 1;display: flex;margin-left:1rem">
                    <div class="uploads">
                        <a href="./plan-info">
                            <div>
                                <span class="btn btn-primary bg-color border-0"> To add more products subscribe our
									plans.</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <h2>Remaining Product</h2>
            <div class="upload-container">
                <a class="uploads" href="#" ng-repeat="prod in noOfProd track by $index" data-toggle="modal" data-target="#materialModal">
                    <div>
                        <span class="bg-color text-white" style="width: 100%;text-align: center;">Add your product
							here</span>
                    </div>
                </a>
                <div ng-if="noOfProd.length==0" class="alert alert-danger">
                    <small>Please upgrade your plan to add more products.</small>
                </div>
            </div>

            <!-- The Modal -->
            <div class="modal" id="materialModal" ng-controller="materialUploadController">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Materials Upload</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <div class="alert alert-info">
                                <small>You can upload pdf in catalogue and all valid images in product image</small>
                            </div>
                            <form name="myMaterialForm" ng-submit="onMaterialSubmit($event.target)">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" name="proname" placeholder="Product Name" class="form-control" ng-model="proname" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" name="website" placeholder="Website" class="form-control" ng-model="website" ng-disabled="plan.plan_name != 'Featured'">
                                                <small class="text-danger" ng-if="plan.plan_name == 'Basic'">Subscribe our Featured plan for this.</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" name="cname" placeholder="Company Name" class="form-control" ng-model="cname" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group upload-mat">
                                                <label for="cat" class="label">Catalogue</label>
                                                <input type="file" name="cataloguepdf" class="form-control" ng-model="catelogueImage" valid-file collect-file accept="application/pdf" id="cat" hidden ng-disabled="plan.plan_name == 'Basic'" /> {{catelogueImage|getName}}
                                                <br>
                                                <small class="text-danger" ng-if="plan.plan_name == 'Basic'">This
													option is not Free. Upgrade your plan.</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" name="specification" placeholder="Specification" class="form-control" ng-model="specification" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group upload-mat">
                                                <label for="prod" class="label">+&nbsp;Product Images</label>
                                                <input type="file" name="proimages" placeholder="Product image" class="form-control" id="prod" ng-model="proimages" valid-file collect-file required multiple accept="image/*" hidden>
                                                <div ng-if="productImages" class="upload-material-images">
                                                    <div ng-repeat="image in productImages" class="images">
                                                        <img ng-src='{{image.image}}' width="50">
                                                        <button ng-click="remove($index)"><span
																class="fa fa-times"></span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <select class="form-control" ng-model="category" ng-options="item.item for item in items" required>
												</select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" name="clocation" placeholder="Company Location" class="form-control" ng-model="clocation" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <select class="form-control" ng-model="subcategory" ng-options="item for item in category.subItem" required>
												</select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" name="price" placeholder="Price" class="form-control" ng-model="price">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <textarea class="form-control" ng-model="abtproduct" placeholder="About Product" cols="10" rows="5" required></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary bg-color border-0" ng-disabled="myMaterialForm.$invalid">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="loader" ng-if="isShowLoad">
                    <div class="load-container">
                        <!-- <div class="loader-main"></div> -->
                        <p align="center">Uploading......</p>
                        <img src="image/loader.gif" width="200">
                    </div>
                </div>
            </div>
        </section>
    </div>

</div>