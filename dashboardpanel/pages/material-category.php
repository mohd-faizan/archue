<div my-nav></div>
<section id="full-mat" ng-controller="materialCategoryController" class="margin" style="margin-top: 7rem;">
	<div class="container">
                <div class="d-flex mb-4">
                    <button class="btn btn-success ml-auto" ng-click="navigateToAddCategory()">Add Category</button>
                </div>
				<div class="material-upload-container" style="flex-basis: 100%">
					<div class="table-data">
						<table class="table table-bordered">
							<tr>
                                <th>Category</th>
                                <th>Subcategory</th>
                                <th>Action</th>
                            </tr>
                            <tr ng-repeat="category in materialCategories">
                                <td>{{ category.title }}</td>
                                <td>{{ category.subCategoryText }}</td>
                                <td>
                                    <button class="btn btn-primary" ng-click="update(category)"><span class="fa fa-pencil"></span></button>
                                    <button class="btn btn-danger" ng-click="delete(category)"><span class="fa fa-trash"></span></button>
                                </td>
                            </tr>
                            <tr ng-if="!materialCategories || !materialCategories.length">
                                <td colspan="3" class="text-center">No Data found</td>
                            </tr>
						</table>
					</div>
				</div>
	</div>
</section>