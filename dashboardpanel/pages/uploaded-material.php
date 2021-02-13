<div my-nav></div>
<div class="space"></div>
<div class="space"></div>
<div class="space"></div>
<div class="space"></div>
<section ng-controller="fetchUploadedMaterialCtrl" class="margin" id="uploadedmaterial-sec">
	<div class="container" ng-if="uploadedMaterials">
		<div class="row">
			<div class="col-md-4" ng-repeat="uploadedMaterial in uploadedMaterials">
				<div class="card mb-3">
					<img ng-src="../upload-file/{{uploadedMaterial.product_image|getSingleImage}}" class="img-fluid">
					<div class="card-body p-0">
						<table class="table table-bordered material-table">
							<tr>
								<th>Product Name</th>
								<td>{{uploadedMaterial.product_name}}</td>
							</tr>
							<tr>
								<th>Website</th>
								<td>{{uploadedMaterial.website}}</td>
							</tr>
							<tr>
								<th>Company Name</th>
								<td>{{uploadedMaterial.company_name}}</td>
							</tr>
							<tr>
								<th>Company Location</th>
								<td>{{uploadedMaterial.company_location}}</td>
							</tr>
							<tr>
								<th>Specification</th>
								<td>{{uploadedMaterial.specification}}</td>
							</tr>
							<tr>
								<th>Catlogue Link</th>
								<td>{{uploadedMaterial.catalogue_link}}</td>
							</tr>
						</table>
						<div class="pl-4 pr-4 pb-2">
							<h6>About Material:</h6>
							<p style="max-height: 35px; overflow:hidden">{{uploadedMaterial.about_product}}</p>
							<a href="./full-material/{{uploadedMaterial.material_upload_id}}" ng-click="setMaterial(uploadedMaterial)" class="pull-right">Read More</a>
							<br>
							<br>
							<div class="text-center">
								<button class="btn btn-sm btn-success" ng-if="uploadedMaterial.arbitory_show == 0" ng-click="addToHomeScreen(uploadedMaterial.material_upload_id)">ADD
									TO HOME SCREEN</button>
								<button class="btn btn-sm btn-warning text-white" ng-if="uploadedMaterial.arbitory_show == 1" ng-click="removeFromHomeScreen(uploadedMaterial.material_upload_id)">REMOVE
									FROM HOME SCREEN</button>
								<button class="btn btn-sm btn-danger" ng-click="deleteMaterial(uploadedMaterial.material_upload_id)">DELETE</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div ng-if="uploadedMaterials.length == 0">
					<div class="alert alert-danger">No Data Exist</div>
			</div>
		</div>
	</div>
	<div ng-if="!uploadedMaterials">
		Loading...
	</div>
</section>