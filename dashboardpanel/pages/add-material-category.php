
<div my-nav></div>
<div class="space"></div>
<div class="space"></div>
<div class="space"></div>
<div class="space"></div>
<section ng-controller="addMaterialCategoryController" class="margin" id="uploaded-lead-sec">
    <div class="card">
        <div class="card-body">
            <div class="alert alert-success" ng-if="successMessage">{{successMessage}}</div>
            <div class="alert alert-danger" ng-if="errMessage">{{errMessage}}</div>

            <form class="row" ng-submit="onSubmit()" ng-if="!isLoading">
                <div class="col-md-12 mb-4">
                    <h2 class="text-center">{{update ? 'Update category' : 'Add Category'}}</h2>
                </div>
                <div class="col-md-6 mb-4">
                    <label for="category">Category</label>
                    <input type="text" id="category" name="category" class="form-control" ng-model="category.category" placeholder="Category" required>
                </div>
                
                <div class="col-md-7 mb-4">
                    <label for="subcategory">Subcategory (<b>Seperated with comma</b>)</label>
                    <textarea name="subcategory" id="subcategory" class="form-control" ng-model="category.subCategory" placeholder="Subcategory" cols="10" rows="5" required></textarea>
                </div>
                <div class="col-md-12 d-flex">
                    <button class="btn btn-primary ml-auto">{{update ? 'Update' : 'Submit'}}</button>
                </div>
            </form>
            <p ng-if="isLoading">Loading....</p>
        </div>
    </div>
</section>