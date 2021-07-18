app.controller('materialCategoryController', ($scope, materialService, $location) => {
    $scope.getMaterialCategories = async () => {
        try {
            const materialCatResp = await materialService.getAllMaterialcategories();
            // console.log('materialCatResp', materialCatResp);
            if (materialCatResp.status) {
                $scope.materialCategories = materialCatResp.data.map(category => {
                    return {
                        ...category,
                        subCategoryText: category.subCategory.map(subCat => subCat.title).join(',')
                    };
                });
                // console.log('$scope.materialCategories', $scope.materialCategories);
            } else {
                $scope.materialCategories = []
            }

        } catch (e) {
            console.log(e);
            $scope.materialCategories = [];
        }

    }
    //get all material categories
    $scope.getMaterialCategories();

    $scope.delete = async (category) => {
        const isDelete = confirm('Are you sure to delete category?');
        if (isDelete) {
            try {
                const resp = await materialService.deleteCategory(category.id);
                console.log('resp', resp);
                if (resp.status) {
                    const index = $scope.materialCategories.findIndex(cat => cat.id == category.id);
                    $scope.materialCategories.splice(index, 1);
                    $scope.$digest();
                }
            } catch (e) {
                console.log(e);
            }
        }
    }
    $scope.update = (category) => {
        materialService.setCategory(category);
        $location.path('./add-material-category');
    }
    $scope.navigateToAddCategory = () => {
        materialService.setCategory(null);
        $location.path('./add-material-category');
    }
});

app.controller('addMaterialCategoryController', ($scope, materialService, $location) => {
    $scope.isLoading = false;
    $scope.update = false;
    $scope.category = {
        category: '',
        subCategory: ''
    };
    const category = materialService.getSelecetdCategory();
    if (category) {
        $scope.update = true;
        $scope.category = {
            category: category.title,
            subCategory: category.subCategoryText
        };
    } else {
        $scope.update = false;
    }

    $scope.onSubmit = () => {
        if ($scope.update) {
            $scope.updateCategory();
        } else {
            $scope.createCategory();
        }
    }

    $scope.createCategory = async () => {
        $scope.isLoading = true;
        try {
            const resp = await materialService.createCategory($scope.category);
            console.log(resp);
            if (resp.status) {
                $scope.errMessage = ''
                $scope.successMessage = resp.message;
                $scope.isLoading = false;
                $scope.category = {
                    category: '',
                    subCategory: ''
                };
            } else {
                $scope.successMessage = '';
                $scope.errMessage = resp.message;
                $scope.isLoading = false;
            }

        } catch (e) {
            $scope.successMessage = '';
            $scope.errMessage = 'Somthing went wrong'
            $scope.isLoading = false;
            console.log(e)
        }
        setTimeout(() => {
            $scope.successMessage = '';
            $scope.errMessage = '';
            $scope.$digest();
        }, 2000);
        $scope.$digest();
    }
    $scope.updateCategory = async () => {
     $scope.isLoading = true;
     try{
        const resp = await materialService.updateCategory(category.id, $scope.category);
        console.log(resp);
            if (resp.status) {
                $scope.errMessage = ''
                $scope.successMessage = resp.message;
                $scope.isLoading = false;
                window.location.href= '/dashboardpanel/material-category'
            } else {
                $scope.successMessage = '';
                $scope.errMessage = resp.message;
                $scope.isLoading = false;
            }

        } catch (e) {
            $scope.successMessage = '';
            $scope.errMessage = 'Somthing went wrong'
            $scope.isLoading = false;
            console.log(e)
        }
        setTimeout(() => {
            $scope.successMessage = '';
            $scope.errMessage = '';
            $scope.$digest();
        }, 2000);
        $scope.$digest();
    }
})