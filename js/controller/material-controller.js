app.controller('getAllMaterialsController', ($scope, $routeParams, fetchservice, categoryListService) => {
    // console.log("...................material page...............");
    $scope.limit = 15;
    $scope.active = 1;
    /*Category and Subcategory Passed with URL*/
    var category = $routeParams.category;
    var subcategory = $routeParams.subcategory;

    /*Category and Subcategory with added dash(-) for Template Use*/
    $scope.categoryForUrl = category;
    $scope.subCategoryForUrl = subcategory;

    /*Category and Subcategory with replaced dash(-) with spaces for FOR URL use. Its is same as Database Entry*/
    category = category.split('-').join(' ');
    subcategory = subcategory.split('-').join(' ');
    /*To Show in Template Just Scope added*/
    $scope.categoryForTemplate = category;


    var fd = new FormData();
    fd.append('category', category);
    fd.append('subcategory', subcategory);
    $scope.fetchMaterials = (skip, limit) => {
        fetchservice.getAllMaterials(skip, limit, fd, (data) => {
            // console.log(data);
            $scope.materials = data.data;
            for (let material of $scope.materials) {
                material.product_name = fetchservice.removeSpeciolChar(material.product_name);
            }
            $scope.count = data.count;
            // console.log($scope.count)
            let pages = 0;
            if ($scope.count > $scope.limit) {
                pages = ($scope.count % $scope.limit) === 0 ? ($scope.count / $scope.limit) : Math.floor(($scope.count / $scope.limit)) + 1;
            } else {
                pages = 1;
            }
            $scope.paginations = new Array(pages);
            $scope.getCategroies();
        });
    }


    $scope.fetchMaterials(0, $scope.limit);

    $scope.setMaterial = (data) => {
        fetchservice.setMaterial(data);
    }

    $scope.toPage = (index) => {
        if ($scope.active === index) {
            return;
        }
        const skip = index * $scope.limit - $scope.limit;
        $scope.fetchMaterials(skip, $scope.limit);
        $scope.active = index;
    }
    $scope.next = () => {
        $scope.active = $scope.active + 1;
        const skip = $scope.active * $scope.limit - $scope.limit;
        $scope.fetchMaterials(skip, $scope.limit);
    }
    $scope.prev = () => {
        $scope.active = $scope.active - 1;
        const skip = $scope.active * $scope.limit - $scope.limit;
        $scope.fetchMaterials(skip, $scope.limit);
    }
    // $scope.selectedSubCategs = [];
    $scope.getCategroies = async () => {
        const categoriesResp = await categoryListService.getAllMaterialcategories();
        // console.log('categories', categoriesResp);
        if (categoriesResp.status) {
            const data = categoriesResp.data;
            const cat = data.find(category => category.title == $scope.categoryForTemplate);
            if (cat) {
                $scope.selectedSubCategs = cat.subCategory.map(subCategory => {
                    return {
                        ...subCategory,
                        url: subCategory.title.replace(/ /g, '-')
                    }
                });
                $scope.$digest();
            }
        }
    }
})
app.controller('getMaterialController', ($scope, ngMeta, $window, fetchservice, $routeParams) => {
    $scope.fetchSimilarMaterial = (key, id) => {
        fetchservice.getSimilarMaterial(key, id, (data) => {
            $scope.similarMaterials = [];
            if (data.status == 1) {
                $scope.similarMaterials = data.data;
                // console.log($scope.similarMaterials);
            }
        })
    }
    $scope.increaseLike = () => {
        if ($scope.$parent.user.isLoggedIn()) {
            fetchservice.incrementLikesMaterial($routeParams.id).then(
                (resp) => {
                    $scope.getMaterial();
                },
                (err) => { console.log(err) }
            );
        } else {
            const url = window.location.pathname;
            localStorage.setItem('backTo', url);
            $scope.$parent.location.path("/login");
        }
    };
    $scope.increaseView = (id) => {
        fetchservice.increaseViewForMaterial(id).then(
            (res) => {
                $scope.getMaterial()
            },
            (err) => {
                console.log(res);
            }
        );
    }
    $scope.increaseView($routeParams.id);
    $scope.materialID = $routeParams.id;
    var fd = new FormData();
    fd.append('materialID', $scope.materialID);
    $scope.getMaterial = () => {
        fetchservice.getOneMaterial(fd, async(data) => {
            // console.log(data);
            $scope.material = data.data;
            $scope.material.product_name = fetchservice.removeSpeciolChar($scope.material.product_name);
            /* Title of the Page as Title of the Project */
            ngMeta.setTitle($scope.material.product_name, '');
            let imgUrl = $scope.material.product_image.split(",")
            if (imgUrl) {
                imgUrl = imgUrl.pop();
            } else {
                imgUrl = $scope.material.product_image;
            }
            ngMeta.setTag('description', $scope.material.about_product);
            ngMeta.setTag('image', 'https://archue.com/upload-file/' + imgUrl);
            ngMeta.setTag('url', 'https://www.archue.com/material/' + $scope.material.material_upload_id + '/' + $scope.material.product_name);
            let prev = await fetchservice.nextPrevMaterial($scope.materialID, $scope.material.category, $scope.material.sub_category, false);
            let next = await fetchservice.nextPrevMaterial($scope.materialID, $scope.material.category, material.sub_category, true);
            // console.log(next, prev);
            if (prev.data.status) {
                $scope.prev = prev.data.data;
            }
            if (next.data.status) {
                $scope.next = next.data.data;
            }
            $scope.fetchSimilarMaterial($scope.material.sub_category, $scope.material.material_upload_id);
            if ($scope.material.website.indexOf('http') == -1) {
                $scope.material.link = 'https://' + $scope.material.website;
            }
        });
    }
    $scope.getMaterial();

    $scope.openLink = (file) => {
        $window.open("https://docs.google.com/viewerng/viewer?url=https://archue.com/upload-file/" + file, '_blank');
    }
    $scope.getType = (data) => {
        // console.log(data);
        if (data instanceof Array) {
            return true;
        } else {
            return false;
        }
    }
});
app.controller("matProductsController", ($scope, $routeParams, $location, categoryListService, fetchservice) => {
    // console.log("...................products page...............");
    let category = $routeParams.category;
    $scope.limit = 15;
    $scope.active = 1;
    $scope.selected;
    $scope.categoryForUrl = category;
    $scope.category = category.replace(/-/g, " ");
    $scope.fetchMatproducts = (skip, limit) => {
        fetchservice.fetchMatproducts(skip, limit, $scope.category, (data) => {
            // console.log(data);
            $scope.materials = [];
            if (data.status == 1) {
                // console.log(data);
                $scope.materials = data.data;
                for (let material of $scope.materials) {
                    material.product_name = fetchservice.removeSpeciolChar(material.product_name);
                }
                $scope.count = data.count;
                // console.log($scope.count)
                let pages = 0;
                if ($scope.count > $scope.limit) {
                    pages = ($scope.count % $scope.limit) === 0 ? ($scope.count / $scope.limit) : Math.floor(($scope.count / $scope.limit)) + 1;
                } else {
                    pages = 1;
                }
                $scope.paginations = new Array(pages);
            }
        });
    }

    $scope.fetchMatproducts(0, $scope.limit);

    $scope.toPage = (index) => {
        if ($scope.active === index) {
            return;
        }
        const skip = index * $scope.limit - $scope.limit;
        $scope.fetchMatproducts(skip, $scope.limit);
        $scope.active = index;
    }
    $scope.next = () => {
        $scope.active = $scope.active + 1;
        const skip = $scope.active * $scope.limit - $scope.limit;
        $scope.fetchMatproducts(skip, $scope.limit);
    }
    $scope.prev = () => {
        $scope.active = $scope.active - 1;
        const skip = $scope.active * $scope.limit - $scope.limit;
        $scope.fetchMatproducts(skip, $scope.limit);
    }
    $scope.setMaterial = (data) => {
        fetchservice.setMaterial(data);
    }
    $scope.setCategory = (cat) => {
        $scope.selected = cat;
    }
    $scope.getCategroies = async () => {
        const categoriesResp = await categoryListService.getAllMaterialcategories();
        // console.log('categories', categoriesResp);
        if (categoriesResp.status) {
            const category = categoriesResp.data.find(category => category.title === $scope.category);
            // console.log('category', category);
            if (category) {
                $scope.selectedSubCategs = category.subCategory.map(subCategory => {
                    return {
                        ...subCategory,
                        url: subCategory.title.replace(/ /g, '-')
                    }
                });
                $scope.$digest();
            }
        }
    }
    $scope.getCategroies();
        // console.log($scope.selected);
        // console.log($scope.selectedSubCategs);
})