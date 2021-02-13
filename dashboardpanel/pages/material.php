<div my-nav></div>
<section id="full-mat" ng-controller="fullMaterialCtrl" class="margin">
	<div class="container">
		<div class="card mb-3">
			<img ng-src="../upload-file/{{uploadedMaterial.product_image|getSingleImage}}" class="img-fluid">
			<div class="card-body p-0">
				<div class="material-upload-container" style="flex-basis: 100%">
					<div class="table-data">
						<table class="table table-bordered">
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
					</div>
					<div class="prod-text p-4">
						<h6>About Material:</h6>
						<p>{{uploadedMaterial.about_product}}</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>