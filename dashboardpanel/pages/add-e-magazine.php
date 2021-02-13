<div my-nav></div>
<section class="section-padding" ng-controller="addEMagazines">
    <div class="container-fluid">
        <div class="add-magazine-container">
            <div class="card shadow">
                <div class="card-header">
                    <a href="./e-magazines"><span class="fa fa-long-arrow-left"></span></a>
                    <h4 class="d-inline-block ml-3">Add Magazine</h4>
                </div>
                <div class="card-body">
                    <div class="alert alert-success" ng-if="success">
                        {{message}}
                    </div>
                    <form ng-submit="addEMagazine()">
                        <div class="form-group">
                            <label for="magazine-name">E-Magazine Name:</label>
                            <input type="text" class="form-control" id="magazine-name" placeholder="Enter E-Magazine Name" ng-model="name" required>
                        </div>

                        <div class="form-group">
                            <label for="magazine-name">E-Magazine Description:</label>
                            <textarea id="magazine-description" cols="20" rows="5" ng-model="magazine_description" class="form-control" placeholder="Enter Magazine Description" required></textarea>
                        </div>

                        <p class="mb-0">Magazine Cover Image:</p>
                        <div class="form-group custom-file">
                            <input type="file" class="custom-file-input" id="cover-image" ng-model="cover_image" 	onchange = "angular.element(this).scope().fileSelected(this)" required>
                            <label class="custom-file-label" for="cover-image">Choose file</label>
                        </div>

                        <br><br>

                        <p class="mb-0">Magazine:</p>
                        <div class="form-group custom-file">
                            <input type="file" class="custom-file-input" id="magazineFile" ng-model="magazine" valid-file portfolio-valid required>
                            <label class="custom-file-label" for="magazineFile">Choose file</label>
                        </div>

                        <br><br>

                        <div class="form-group">
                            <button class="btn theme-bg text-light">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Add the following code if you want the name of the file appear on select
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>
</section>