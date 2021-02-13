<div class="space"></div>
<div class="home-margin" ng-controller="getMaterialController">
	<div ng-if="material">
		<a href="./home">Archue</a> > <a href="/products/Finishes">Material </a> > <a href="/products/{{material.category}}">{{material.category | toUpperCaseFirst}}</a> > <a href="/materials/{{material.category}}/{{material.sub_category}}">{{material.sub_category | toUpperCaseFirst}}</a> > <a href="/material/{{material.material_upload_id}}/{{material.product_name}}">{{material.product_name |toUpperCaseFirst}}</a>
		<div class="space"></div>
		<section id="home-sec-2">
			<div class="container-fluid" id="material">
				<div class="row">
					<div class="col-md-9">
						<div class="card">
							<h2 class="card-title home-page-heading">{{material.product_name |toUpperCaseFirst}}</h2>
							<br />
							<a ng-href="./upload-file/{{material.product_image|getSingleImage}}" data-lightbox="images"><img class="card-img-top" ng-src="./upload-file/{{material.product_image|getSingleImage}}" width="100%">
								<div class="mycontainer">
									<div class="small-img" ng-repeat="img in material.product_image|toArray as res track by $index" ng-class="{'image-layer':$index==4}" ng-if="getType(res)">
										<a ng-href="./upload-file/{{img}}" data-lightbox="images" ng-if="$index<5">
											<img ng-src="./upload-file/{{img}}" style="width:100px;height:100px;object-fit:cover;object-position:center;">
										</a>
										<div class="img-no" ng-if="$index==4">
											<span>+{{res.length-5}}</span>
										</div>
										<!-- <a href="./upload-file/{{img}}" class="layer-image" data-lightbox="images" ng-if="$index==4">
											<img src="./upload-file/{{img}}">
										</a> -->
									</div>

								</div>
								<!-- share options -->
								<div class="project-share-option" style="justify-content:flex-start">
									<div>
										<a href="" class="fa {{material.like ? 'fa-heart text-danger' : 'fa-heart-o'}}" ng-click="increaseLike()">&nbsp;{{material.likes}}</a>
										<a href=""><span class="fa fa-eye"></span>&nbsp;{{material.views}}</a>
										<a href=""><span class="fa fa-facebook" socialshare socialshare-provider="facebook" socialshare-type="sharer" socialshare-via="167503137442216" socialshare-url="https://www.archue.com/material/{{material.material_upload_id}}/{{material.product_name}}" socialshare-redirect-uri="http://google.com" socialshare-popup-height="450" socialshare-popup-width="350" socialshare-trigger="click"></span></a>

										<a href=""><span class="fa fa-twitter" socialshare socialshare-provider="twitter" socialshare-hashtags="Architect, development, internet" socialshare-via="twitter" socialshare-text="" socialshare-url="https://www.archue.com/material/{{material.material_upload_id}}/{{material.product_name}}" socialshare-popup-height="450" socialshare-popup-width="350" socialshare-trigger="click"></span></a>

										<a href="" socialshare socialshare-provider="google" socialshare-url="https://www.archue.com/material/{{material.material_upload_id}}/{{material.product_name}}" socialshare-popup-height="450" socialshare-popup-width="350" socialshare-trigger="click"><span class="fa fa-google-plus"></span></a>

										<a href="" socialshare socialshare-media="https://www.archue.com/upload-file/{{material.product_image | getSingleImage}}" socialshare-provider="pinterest" socialshare-text="{{material.about_product}}" socialshare-url="https://www.archue.com/material/{{material.material_upload_id}}/{{material.product_name}}" socialshare-popup-height="450" socialshare-popup-width="350" socialshare-trigger="click"><span class="fa fa-pinterest"></span></a>

										<a href="" socialshare socialshare-provider="tumblr" socialshare-media="https://www.archue.com/upload-file/{{material.product_image | getSingleImage}}" socialshare-text="{{material.about_product}}" socialshare-url="https://www.archue.com/material/{{material.material_upload_id}}/{{material.product_name}}" socialshare-popup-height="450" socialshare-popup-width="350" socialshare-trigger="click"><span class="fa fa-tumblr"></span></a>

										<a href="" socialshare socialshare-provider="linkedin" socialshare-url="https://www.archue.com/material/{{material.material_upload_id}}/{{material.product_name}}" socialshare-text="{{fullProject.mainData.project_name}}" socialshare-description="{{fullProject.mainData.project_desc}}" socialshare-source="https://www.archue.com/material/{{material.material_upload_id}}/{{material.product_name}}" socialshare-popup-height="450" socialshare-popup-width="350" socialshare-trigger="click"><span class="fa fa-linkedin"></span></a>

									</div>
								</div>
								<div class="card-body">

									<div class="space"></div>
									<div class="table-data">
										<table width="100%">
											<tr>
												<th>Company Location</th>
												<td>: {{material.company_location | toUpperCaseFirst}}</td>
											</tr>
											<tr>
												<th>Company Name</th>
												<td>: {{material.company_name | toUpperCaseFirst}}</td>
											</tr>
											<tr>
												<th>Website</th>
												<td>:
													<a href="{{material.link}}" target="_blank" ng-if="material.website != 'undefined'">{{material.website}}</a>
													<span ng-if="material.website == 'undefined'">Not Available</span>
												</td>
											</tr>
											<tr>
												<th>Catalogue Link</th>
												<td>:
													<a href="javascript:void(0)" ng-click="openLink(material.catalogue_pdf)" ng-if="material.catalogue_pdf">Click here to open</a>
													<span ng-if="!material.catalogue_pdf">Not Available</span>
												</td>
											</tr>
											<tr>
												<th>Material Specifications</th>
												<td>:{{material.specification}}</td>
											</tr>
											<tr>
												<th>Price</th>
												<td>:{{material.price}}</td>
											</tr>
										</table>
									</div>
									<div class="space"></div>
									<div class="space"></div>
									<!-- <div class="specification">
										<h6>Material Specifications</h6>
										<p>{{material.specification}}</p>
									</div> -->
									<div class="specification">
										<h6>About Product</h6>
										<p>{{material.about_product}}</p>
									</div>
								</div>

						</div>
					</div>
					<div class="col-md-3 hide-on-small-screeen">
						<div class="material-quote-btn">
							<button class="btn btn-primary bg-color border-0 w-100" data-target="#qouteModal" data-toggle="modal">BUY PRODUCTS/SERVICES</button>
						</div>

						<br>

						<!-- Similar Materials -->
						<div class="card shadow">
							<div class="card-header blog-bg text-white font-weight-bold">Similar Materials</div>
							<ul class="list-group list-group-flush" ng-if="similarMaterials.length>0">
								<li class="list-group-item p-0 mt-0 link" ng-repeat="material in similarMaterials|limitTo:3">
									<a href="./material/{{material.material_upload_id}}/{{material.product_name}}" ng-click="setSideMaterial(material)" class="sm-blog-container mt-0">
										<div class="image">
											<img ng-src="upload-file/{{material.product_image|getSingleImage}}" alt="project-img-1" width="100%">
										</div>
										<div class="line-height p-3">
											{{material.product_name | toUpperCaseFirst}}
										</div>
									</a>
								</li>
							</ul>
							<div class="alert alert-danger mb-0" ng-if="similarMaterials.length==0">
								<p>No Similar Materials Found! </p>
							</div>
						</div>
						<!-- End of Similar Materials -->

						<!-- <div class="material-header material-bg">
							<h3 class="home-page-heading">Similar Materials</h2>
						</div>
						<div class="side-material-container link" ng-if="similarMaterials.length>0">
							<a ng-href="./material/{{material.material_upload_id}}/{{material.product_name}}" ng-click="setSideMaterial(material)" class="material-image" ng-repeat="material in similarMaterials|limitTo:3">
								<img ng-src="upload-file/{{material.product_image|getSingleImage}}" alt="project-img-1" width="100%">
								<div class="main-image-con-div">
									<p>{{material.product_name | toUpperCaseFirst}}</p>
								</div>
							</a>
						</div>
						<div class="alert alert-danger mt-2" ng-if="similarMaterials.length==0">
							<small>No Similar Products Found</small>
						</div> -->
					</div>
				</div>
			</div>
		</section>
		<div class="next-prev-container">
			<div class="prev">
				<!-- <button ng-click="next(fullProject.mainData.project_id,false)"><<&nbsp;Prev</button> -->
				<a ng-href="./material/{{prev.material_upload_id}}/{{prev.product_name}}" ng-if="prev!=undefined">
					<div class="mr-auto">
						<img ng-src="upload-file/{{prev.product_image|getSingleImage}}" height="50" width="50">
					</div>
					<div>
						<span>{{prev.product_name|uppercase}}</span>
						<span>PREVIOUS MATERIAL</span>
					</div>
				</a>
			</div>
			<div class="next">
				<!-- <button ng-click="next(fullProject.mainData.material_upload_id,true)">Next&nbsp;>></button> -->
				<a ng-href="./material/{{next.material_upload_id}}/{{next.product_name}}" ng-if="next!=undefined">
					<div>
						<span>{{next.product_name|uppercase}}</span>
						<span>NEXT MATERIAL</span>
					</div>
					<div class="ml-auto">
						<img ng-src="upload-file/{{next.product_image|getSingleImage}}" height="50" width="50">
					</div>
				</a>
			</div>
		</div>
	</div>
	<div ng-if="!material" ng-include="'../include/loader.php'"></div>
</div>
<div class="space"></div>