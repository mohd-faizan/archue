<section class="hide-on-small-screeen">
	<div class="card shadow">
		<div class="card-header blog-bg text-white font-weight-bold">Materials</div>
		<ul class="list-group list-group-flush">
			<li class="list-group-item p-0 mt-0 link" ng-repeat="material in uploadMaterials|limitTo:3">
				<a href="./material/{{material.material_upload_id}}/{{material.product_name}}"
					ng-click="setSideMaterial(material)" class="sm-blog-container mt-0">
					<div class="image">
						<img ng-src="upload-file/{{material.product_image|getSingleImage}}" alt="project-img-1"
							width="100%">
					</div>
					<div class="line-height p-3">
						{{material.product_name}}
					</div>
				</a>
			</li>
		</ul>
		<div class="alert alert-danger mb-0" ng-if="uploadMaterials.length==0">
			<p>No Materials</p>
		</div>
	</div>
</section>