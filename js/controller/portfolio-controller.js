/*portfolio */
app.controller("fetchPortfolioController", ($scope, fetchservice) => {
        $scope.limit = 15;
        $scope.active = 1;
        $scope.skip = 0;
        $scope.fetchPortfolio = (skip, limit) => {
            fetchservice.fetchPortfolio(skip, limit, (data) => {
                console.log(data);
                if (data.status == "yes") {
                    $scope.portfolios = data.data;
                    for (let portfolio of $scope.portfolios) {
                        portfolio.portfolio_college = portfolio.portfolio_college.replace(/\//g, "-");
                        portfolio.portfolio_college = portfolio.portfolio_college.replace(/ /g, "-");
                        portfolio.portfolio_name = portfolio.portfolio_name.replace(/\//g, "-");
                        portfolio.portfolio_name = portfolio.portfolio_name.replace(/ /g, "-");
                    }
                }
                $scope.count = data.count;
                console.log($scope.count)
                let pages = 0;
                if ($scope.count > $scope.limit) {
                    pages = ($scope.count % $scope.limit) === 0 ? ($scope.count / $scope.limit) : Math.floor(($scope.count / $scope.limit)) + 1;
                } else {
                    pages = 1;
                }
                $scope.paginations = new Array(pages);
            });
        }
        $scope.fetchPortfolio($scope.skip, $scope.limit);

        $scope.toPage = (index) => {
            if ($scope.active === index) {
                return;
            }
            $scope.skip = index * $scope.limit - $scope.limit;
            $scope.fetchPortfolio($scope.skip, $scope.limit);
            $scope.active = index;
        }
        $scope.next = () => {
            $scope.active = $scope.active + 1;
            $scope.skip = $scope.active * $scope.limit - $scope.limit;
            $scope.fetchPortfolio($scope.skip, $scope.limit);
        }
        $scope.prev = () => {
            $scope.active = $scope.active - 1;
            $scope.skip = $scope.active * $scope.limit - $scope.limit;
            $scope.fetchPortfolio($scope.skip, $scope.limit);
        }

        $scope.setportfolio = (portfolio) => {
            fetchservice.setPortfolio(portfolio);
        }
        $scope.increaseLike = (id) => {
            if ($scope.$parent.user.isLoggedIn()) {
                fetchservice.increaseLikePortfolio(id).then(
                    (res) => {
                        console.log(res);
                        $scope.fetchPortfolio($scope.skip, $scope.limit);
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
    /*full portfolio constroller*/
app.controller("fullPortfolioController", ($sce, $scope, fetchservice, $routeParams, ngMeta) => {
    $scope.fetchOnePortfolio = () => {
        fetchservice.fetchOnePortfolio($routeParams.id, (data) => {
            console.log('single portfolio', data);
            if (data.status == "yes") {
                let documents = ['docs'];
                // $scope.portfolios = data.data;
                // fetchservice.getOneFromArrObj($routeParams.id, $scope.portfolios, (resp) => {
                $scope.portfolio = data.data;
                $scope.url = $sce.trustAsResourceUrl("https://archue.com/upload-file/" + $scope.portfolio.portfolio_file);

                /* Title of the Page as Title of the Project */
                ngMeta.setTitle($scope.portfolio.name, '');
                ngMeta.setTag('url', 'https://www.archue.com/full-portfolio/' + $scope.portfolio.portfolio_id + "/" + $scope.portfolio.portfolio_college + "/" + $scope.url);

                var fd = new FormData();
                fd.append('id', $scope.portfolio.portfolio_id);
                fetchservice.fetchSimilarPortfolio(fd, (data) => {
                        $scope.similarPorts = data.data;
                    })
                    // })
            }
        });
    }
    if ($scope.portfolio == undefined || $scope.portfolio == null) {
        $scope.fetchOnePortfolio();
    } else {
        $scope.url = $sce.trustAsResourceUrl("https://docs.google.com/gview?url=https://archue.com/upload-file/" +
            $scope.portfolio.portfolio_file +
            "&embedded=true");

        /* Title of the Page as Title of the Project */
        ngMeta.setTitle($scope.portfolio.name, '');
        ngMeta.setTag('url', 'https://www.archue.com/full-portfolio/' + $scope.portfolio.portfolio_id);

        var fd = new FormData();
        fd.append('id', $scope.portfolio.portfolio_id);
        fetchservice.fetchSimilarPortfolio(fd, (data) => {
            $scope.similarPorts = data.data;
            for (let portfolio of $scope.similarPorts) {
                portfolio.portfolio_college = portfolio.portfolio_college.replace(/\//g, "-");
                portfolio.portfolio_college = portfolio.portfolio_college.replace(/ /g, "-");
                portfolio.portfolio_name = portfolio.portfolio_name.replace(/\//g, "-");
                portfolio.portfolio_name = portfolio.portfolio_name.replace(/ /g, "-");
            }
        })
    }
    $scope.setportfolio = (portfolio) => {
        fetchservice.setPortfolio(portfolio);
    }
    $scope.increaseLike = () => {
        if ($scope.$parent.user.isLoggedIn()) {
            fetchservice.increaseLikePortfolio($routeParams.id).then(
                (res) => {
                    console.log(res);
                    $scope.fetchOnePortfolio();
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
        fetchservice.increaseViewsPortfolio(id).then(
            (resp) => {
                console.log(resp);
                $scope.fetchOnePortfolio();
            },
            (err) => {
                console.log(err);
            }
        );
    }
    $scope.increaseViews($routeParams.id);
})

/*upload portfolio controller */
app.controller("portfolioUploadController", ($scope, $rootScope, uploadService, validationService) => {
    validExt = ['docx', 'pptx', 'doc', 'ppt', 'pdf'];
    $scope.validatePortfolioFile = (file) => {
        return validationService.validPortfolio(file, validExt);
    }
    $scope.submitPortfolio = (form) => {
        $scope.$parent.isLoad = true;
        // console.log(form);
        // console.log($scope.portfolioFile);
        myData = {};
        myData.portfolio_name = $scope.portfolio_name;
        myData.portfolio_place = $scope.portfolio_place;
        myData.portfolio_college = $scope.portfolio_college;
        myData.portfolio_year = $scope.portfolio_year;
        myData.portfolioFile = $scope.portfolioFile;
        myData.userid = $rootScope.userData.id;
        var fd = new FormData();
        for (let i in myData) {
            fd.append(i, myData[i]);
        }
        uploadService.uploadPortfolio(fd, (data) => {
            console.log(data);
            if (data.status == "yes") {
                $scope.$parent.isLoad = false;
                $rootScope.isShowThanksModal = true;
                form.reset();
                // alert("Succesfully submitted.Your Work is published within 72 hours");
                // window.location.href = "./dashboard";
            } else {
                alert(data.message);
                window.location.reload();
            }
        });
    }
    $scope.getFileName = (filePath) => {
        if (filePath != undefined) {
            return filePath.split("\\").pop();
        }
    }
});