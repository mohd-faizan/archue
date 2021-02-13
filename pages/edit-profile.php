<section id="edit-profile-page" ng-controller="editController">
	<div class="space"></div>
	<div class="space"></div>
	<div class="container">
		<form name="editForm" class="edit-form" ng-submit="onSubmit($event.target)">
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<input type="text" name="name" ng-model="name" class="form-control" required>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<input type="text" name="profession" ng-model="profession" class="form-control" required>
					</div>
				</div>
			</div>
			<div class="form-group">
				<input type="file" name="profile" ng-model="profile" class="form-control" required valid-file portfolio-valid>
			</div>
			<button class="btn btn-primary bg-color border-0" ng-disabled="!editForm.$valid">Update</button>
		</form>
	</div>
	<div class="space"></div>
	<div class="space"></div>
</section>