<div class="space"></div>
<div class="home-margin" ng-controller="fullProjectController">
    <a href="./">Archue</a> >
    <a href="/project">Project</a> > {{fullProject.mainData.project_type}} >
    <!-- <a href="/full-project/{{fullProject.mainData.project_id}}/{{fullProject.url}}">
		
	</a> > -->
    <b>{{fullProject.mainData.project_name | toUpperCaseFirst}}</b>

    <div class="space"></div>

    <section id="home-sec-2" ng-if="fullProject">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-9">
                    <div class="project-heading">
                        <h2 class="home-page-heading">{{fullProject.mainData.project_name | toUpperCaseFirst}}</h2>
                    </div>
                    <div class="d-flex mt-2 mb-4">
                        <span class="m-0"><span class="fa fa-user"></span> {{fullProject.mainData.user_name}}
                        </span>
                    </div>
                    <div class="whats-app-btn mb-4  mt-2">
                        <a class="font-bold" socialshare socialshare-provider="whatsapp" socialshare-url="https://www.archue.com/full-project/{{fullProject.mainData.project_id}}/{{fullProject.url}}">
                            <i class="fa fa-whatsapp"></i> Share in Whatsapp
                        </a>
                    </div>

                    <div class="full-project-image">
                        <a href="uploads/{{fullProject.mainImage}}" data-lightbox="proj_images">
                            <img ng-src="uploads/{{fullProject.mainImage}}" width="100%" ng-click="setImages(fullProject.images)">
                        </a>
                        <p class="mt-4">{{fullProject.mainData.project_desc}}</p>
                    </div>

                    <div class="table-data">
                        <table width="100%">
                            <tr>
                                <th>Location</th>
                                <td>: {{fullProject.mainData.location}}</td>
                            </tr>
                            <tr>
                                <th>Institute/Firm</th>
                                <td>: {{fullProject.mainData.institute}}</td>
                            </tr>
                            <tr>
                                <th>Area</th>
                                <td>: {{fullProject.mainData.area}}</td>
                            </tr>
                            <tr>
                                <th>Project Type</th>
                                <td>: {{fullProject.mainData.project_type}}</td>
                            </tr>
                            <tr>
                                <th>Project Year</th>
                                <td>: {{fullProject.mainData.project_year}}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="project-share-option">
                        <div>
                            <a href="" class="fa {{fullProject.mainData.like ? 'fa-heart text-danger' : 'fa-heart-o'}}" ng-click="increaseLike()">&nbsp;{{fullProject.mainData.likes}}</a>
                            <a href=""><span class="fa fa-eye"></span>&nbsp;{{fullProject.mainData.views}}</a>
                            <a href=""><span class="fa fa-facebook" socialshare socialshare-provider="facebook"
									socialshare-type="sharer" socialshare-via="167503137442216"
									socialshare-url="https://www.archue.com/full-project/{{fullProject.mainData.project_id}}/{{fullProject.url}}"
									socialshare-redirect-uri="http://google.com" socialshare-popup-height="450"
									socialshare-popup-width="350" socialshare-trigger="click"></span></a>

                            <a href=""><span class="fa fa-twitter" socialshare socialshare-provider="twitter"
									socialshare-hashtags="Architect, development, internet" socialshare-via="twitter"
									socialshare-text=""
									socialshare-url="https://www.archue.com/full-project/{{fullProject.mainData.project_id}}/{{fullProject.url}}"
									socialshare-popup-height="450" socialshare-popup-width="350"
									socialshare-trigger="click"></span></a>

                            <a href="" socialshare socialshare-provider="google" socialshare-url="https://www.archue.com/full-project/{{fullProject.mainData.project_id}}/{{fullProject.url}}" socialshare-popup-height="450" socialshare-popup-width="350" socialshare-trigger="click"><span class="fa fa-google-plus"></span></a>

                            <a href="" socialshare socialshare-media="https://www.archue.com/uploads/{{fullProject.mainImage}}" socialshare-provider="pinterest" socialshare-text="{{fullProject.mainData.project_name}}" socialshare-url="https://www.archue.com/full-project/{{fullProject.mainData.project_id}}/{{fullProject.url}}"
                                socialshare-popup-height="450" socialshare-popup-width="350" socialshare-trigger="click"><span class="fa fa-pinterest"></span></a>

                            <a href="" socialshare socialshare-provider="tumblr" socialshare-media="https://www.archue.com/uploads/{{fullProject.mainImage}}" socialshare-text="{{fullProject.mainData.project_name}}" socialshare-url="https://www.archue.com/full-project/{{fullProject.mainData.project_id}}/{{fullProject.url}}"
                                socialshare-popup-height="450" socialshare-popup-width="350" socialshare-trigger="click"><span class="fa fa-tumblr"></span></a>

                            <a href="" socialshare socialshare-provider="linkedin" socialshare-url="https://www.archue.com/full-project/{{fullProject.mainData.project_id}}/{{fullProject.url}}" socialshare-text="{{fullProject.mainData.project_name}}" socialshare-description="{{fullProject.mainData.project_desc}}"
                                socialshare-source="https://www.archue.com/full-project/{{fullProject.mainData.project_id}}/{{fullProject.url}}" socialshare-popup-height="450" socialshare-popup-width="350" socialshare-trigger="click"><span class="fa fa-linkedin"></span></a>

                        </div>
                    </div>
                    <br>
                    <div class="project-images mt-4">
                        <a href="uploads/{{siteImages[0]}}" data-lightbox="proj_images">
                            <img ng-src="uploads/{{siteImages[0]}}" width="100%" ng-click="setImages(fullProject.images)">
                        </a>
                        <p class="mt-4" ng-if="fullProject.mainData.site_image_desc != 'undefined'">
                            {{fullProject.mainData.site_image_desc}}</p>
                    </div>
                    <div class="space"></div>
                    <div class="project-images mt-4">
                        <a href="uploads/{{elevationImages[0]}}" data-lightbox="proj_images">
                            <img ng-src="uploads/{{elevationImages[0]}}" width="100%" ng-click="setImages(fullProject.images)">
                        </a>
                        <p class="mt-4" ng-if="fullProject.mainData.elevation_image_desc != 'undefined'">
                            {{fullProject.mainData.elevation_image_desc}}</p>
                    </div>
                    <div class="space"></div>
                    <div class="project-images mt-4">
                        <a href="uploads/{{sectionImages[0]}}" data-lightbox="proj_images">
                            <img ng-src="uploads/{{sectionImages[0]}}" width="100%" ng-click="setImages(fullProject.images)">
                        </a>
                        <p class="mt-4" ng-if="fullProject.mainData.section_image_desc != 'undefined'">
                            {{fullProject.mainData.section_image_desc}}</p>
                    </div>
                    <div class="space"></div>
                    <div class="project-images mt-4">
                        <a href="uploads/{{floorImages[0]}}" data-lightbox="proj_images" ng-if="floorImages[0]!=''">
                            <img ng-src="uploads/{{floorImages[0]}}" width="100%" ng-click="setImages(fullProject.images)">

                        </a>
                        <p class="mt-4" ng-if="fullProject.mainData.floor_image_desc != 'undefined'">
                            {{fullProject.mainData.floor_image_desc}}</p>
                    </div>

                    <div class="space"></div>

                    <div class="project-images mt-4">
                        <a href="uploads/{{view3dImages[0]}}" data-lightbox="proj_images">
                            <img ng-src="uploads/{{view3dImages[0]}}" width="100%" ng-click="setImages(fullProject.images)">
                        </a>
                    </div>

                    <div class="space"></div>

                    <p><b>View More Images Of The Project</b></p>
                    <div class="mycontainer">
                        <div class="samll-img" ng-repeat="myimage in fullProject.images track by $index">
                            <a href="uploads/{{myimage}}" data-lightbox="proj_images" ng-if="myimage!=''">
                                <img src="uploads/{{myimage}}" width="100%" height="100%">
                            </a>
                        </div>
                        <div class="samll-img" style="opacity: 0">

                        </div>
                    </div>
                    <div class="space"></div>
                    <div class="space"></div>
                    <div class="next-prev-container">
                        <div class="prev">
                            <!-- <button ng-click="next(fullProject.mainData.project_id,false)"><<&nbsp;Prev</button> -->
                            <a ng-href="./full-project/{{prev.project_id}}/{{prev.url}}" ng-if="prev!=undefined">
                                <div class="mr-auto">
                                    <img ng-src="uploads/{{prev.view3d_img|getSingleImage}}" height="50" width="50">
                                </div>
                                <div>
                                    <span>{{prev.project_name|uppercase}}</span>
                                    <span>PREVIOUS PROJECT</span>
                                </div>
                            </a>
                        </div>
                        <div class="next">
                            <!-- <button ng-click="next(fullProject.mainData.project_id,true)">Next&nbsp;>></button> -->
                            <a ng-href="./full-project/{{nxt.project_id}}/{{nxt.url}}" ng-if="nxt!=undefined">
                                <div>
                                    <span>{{nxt.project_name|uppercase}}</span>
                                    <span>NEXT PROJECT</span>
                                </div>
                                <div class="ml-auto">
                                    <img ng-src="uploads/{{nxt.view3d_img|getSingleImage}}" height="50" width="50">
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 pr-0">
                    <br>
                    <!-- Similar Projects -->
                    <div class="card shadow">
                        <div class="card-header blog-bg text-white font-weight-bold">Similar Projects</div>
                        <ul class="list-group list-group-flush" ng-if="similarProjects">
                            <li class="list-group-item p-0 mt-0 link" ng-repeat="project in similarProjects|limitTo:3">
                                <a href="./blogs/{{blog.blog_id}}/{{blog.url}}" ng-click="similar(project.project_id,project.url)" class="sm-blog-container mt-0">
                                    <div class="image">
                                        <img ng-src="uploads/{{project.view3d_img|getSingleImage}}" alt="project-img-1" width="100%">
                                    </div>
                                    <div class="line-height p-3">
                                        {{project.project_name | toUpperCaseFirst}}
                                    </div>
                                </a>
                            </li>
                        </ul>
                        <div class="alert alert-danger mb-0" ng-if="!similarProjects">
                            <p>No Similar Project Found! </p>
                        </div>
                    </div>
                    <!-- End of Similar Projects -->

                    <br><br>

                    <!-- Included Side Material -->
                    <div ng-include="'include/sidematerial.php'"></div>
                    <!-- End of Side Material -->
                </div>
            </div>
        </div>
        <div ng-if="!fullProject" class="alert alert-danger">
            <small>No Data Found</small>
        </div>
    </section>
    <div ng-if="!fullProject" ng-include="'../include/loader.php'"></div>

</div>
<div class="space"></div>