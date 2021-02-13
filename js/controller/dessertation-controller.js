/*dessertation controller*/
app.controller("fetchDessertController", ($scope, fetchservice) => {
        $scope.limit = 15;
        $scope.active = 1;
        $scope.skip = 0;
        $scope.fetchDessertation = (skip, limit) => {
            fetchservice.fetchDessertation(skip, limit, (data) => {
                console.log(data);
                if (data.status == "yes") {

                    $scope.dessertations = data.data;

                    for (let dessertation of $scope.dessertations) {
                        dessertation.url = dessertation.dessertation_name.replace(/\//g, "-");
                        dessertation.url = dessertation.url.replace(/ /g, "-");
                        dessertation.dessertation_college = dessertation.dessertation_college.replace(/ /g, "-");
                        dessertation.dessertation_college = dessertation.dessertation_college.replace(/\//g, "-");
                    }

                }
                $scope.count = data.count;
                let pages = 0;
                if ($scope.count > $scope.limit) {
                    pages = ($scope.count % $scope.limit) === 0 ? ($scope.count / $scope.limit) : Math.floor(($scope.count / $scope.limit)) + 1;
                } else {
                    pages = 1;
                }
                $scope.paginations = new Array(pages);
            });
        }
        $scope.fetchDessertation(0, $scope.limit);

        $scope.toPage = (index) => {
            if ($scope.active === index) {
                return;
            }
            $scope.skip = index * $scope.limit - $scope.limit;
            $scope.fetchDessertation($scope.skip, $scope.limit);
            $scope.active = index;
        }
        $scope.next = () => {
            $scope.active = $scope.active + 1;
            $scope.skip = $scope.active * $scope.limit - $scope.limit;
            $scope.fetchDessertation($scope.skip, $scope.limit);
        }
        $scope.prev = () => {
            $scope.active = $scope.active - 1;
            $scope.skip = $scope.active * $scope.limit - $scope.limit;
            $scope.fetchDessertation($scope.skip, $scope.limit);
        }
        $scope.setDessertation = (dessertation) => {
            fetchservice.setDessertation(dessertation);
        }
        $scope.increaseLike = (id) => {
            if ($scope.$parent.user.isLoggedIn()) {
                fetchservice.increaseLikeDessertation(id).then(
                    (resp) => {
                        console.log(resp);
                        $scope.fetchDessertation($scope.skip, $scope.limit);
                    },
                    (err) => {
                        console.log(err);
                    }
                );
            } else {
                const url = window.location.pathname;
                localStorage.setItem('backTo', url);
                $scope.$parent.location.path("/login");
            }
        }
    })
    /* full dessertation controller */
app.controller("fetchFullDessert", ($sce, $scope, fetchservice, $routeParams, ngMeta) => {


    $scope.fetchDessertation = () => {
        fetchservice.fetchOneDessertation($routeParams.id, (data) => {
            console.log("single desswrttion", data);
            if (data.status) {
                // $scope.dessertations = data.data;
                // for (let dessertation of $scope.dessertations) {
                //     dessertation.url = dessertation.dessertation_name.replace(/\//g, "-");
                //     dessertation.url = dessertation.url.replace(/ /g, "-");
                // }

                // fetchservice.getOneFromArrObj($routeParams.id, $scope.dessertations, (resp) => {
                data.data.url = data.data.dessertation_name.replace(/\//g, "-");
                data.data.url = data.data.url.replace(/ /g, "-");
                $scope.dessertation = data.data;
                let wordFormats = ['docx']
                $scope.url = $sce.trustAsResourceUrl("https://archue.com/upload-file/" + $scope.dessertation.dessertation_file);
                let ext = $scope.dessertation.dessertation_file.split(".");
                if (wordFormats.includes(ext[ext.length - 1])) {
                    console.log("inluded");
                    $scope.url = $sce.trustAsResourceUrl("https://docs.google.com/gview?url=https://archue.com/upload-file/" +
                        $scope.dessertation.dessertation_file +
                        "&embedded=true");
                } else {
                    console.log(" not inluded");
                    $scope.url = $sce.trustAsResourceUrl("https://archue.com/upload-file/" + $scope.dessertation.dessertation_file);
                }

                /* Title of the Page as Title of the Project */
                ngMeta.setTitle($scope.dessertation.dessertation_name, '');
                ngMeta.setTag('url', 'https://www.archue.com/full-dissertation/' + $scope.dessertation.url);

                var fd = new FormData();
                fd.append('id', $scope.dessertation.dessertation_id);
                fetchservice.fetchSimilarDessertation(fd, (data) => {
                        $scope.similarDessertations = data.data;
                        for (let similarDessertation of $scope.similarDessertations) {
                            similarDessertation.url = similarDessertation.dessertation_name.replace(/\//g, "OR");
                            similarDessertation.url = similarDessertation.url.replace(/ /g, "-");
                            similarDessertation.dessertation_college = similarDessertation.dessertation_college.replace(/\//g, "-");
                            similarDessertation.dessertation_college = similarDessertation.dessertation_college.replace(/ /g, "-");
                            // console.log(similarDessertation);
                        }
                    })
                    // })
            }
        });
    }
    $scope.fetchDessertation();
    $scope.setDessertation = (dessertation) => {
        fetchservice.setDessertation(dessertation);
    }
    $scope.increaseLike = () => {
        if ($scope.$parent.user.isLoggedIn()) {
            fetchservice.increaseLikeDessertation($routeParams.id).then(
                (resp) => {
                    console.log(resp);
                    $scope.fetchDessertation();
                },
                (err) => {
                    console.log(err);
                }
            );
        } else {
            const url = window.location.pathname;
            localStorage.setItem('backTo', url);
            $scope.$parent.location.path("/login");
        }
    }
    $scope.increaseViews = (id) => {
        fetchservice.increaseViewsDessertation(id).then(
            (res) => {
                console.log(res);
                $scope.fetchDessertation();
            },
            (err) => {
                console.log(err);
            }
        );
    }
    $scope.increaseViews($routeParams.id);
})

/*dessertation controller*/
app.controller("dessertationController", ($scope, $rootScope, uploadService, validationService) => {
    validExt = ['docx', 'doc', 'pdf'];
    $scope.validatePortfolioFile = (file) => {
        return validationService.validPortfolio(file, validExt);
    }
    $scope.submitDesertation = (form) => {
        $scope.$parent.isLoad = true;
        formData = {};
        formData.dissertation_name = $scope.dissertation_name;
        formData.dissertation_place = $scope.dissertation_place;
        formData.dissertation_college = $scope.dissertation_college;
        formData.dissertation_year = $scope.dissertation_year;
        formData.dissertation_file = $scope.portfolioFile;
        formData.userid = $rootScope.userData.id;
        // console.log(formData);
        var fd = new FormData();
        for (let i in formData) {
            fd.append(i, formData[i]);
        }
        uploadService.uploadDessertation(fd, (data) => {
            console.log(data);
            if (data.status == "yes") {
                $rootScope.isShowThanksModal = true;
                form.reset();
                // alert("Succesfully submitted.Your Work is published within 72 hours");
                // window.location.href = "./dashboard";

            } else {
                alert(data.message);
                window.location.reload();
            }
            $scope.$parent.isLoad = false;
        });
    }
    $scope.getFileName = (filePath) => {
        if (filePath != undefined) {
            return filePath.split("\\").pop();
        }
    }
})