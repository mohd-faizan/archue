/*full thesis report controller */
app.controller("fullThesisReportCtrl", ($sce, $scope, fetchservice, $routeParams, ngMeta) => {


    $scope.fetchOneThesisReport = () => {
        fetchservice.getOneThesisReport($routeParams.id, (resp) => {
            console.log(resp);
            $scope.thesis_report = resp.data;

            $scope.thesis_report.url = $scope.thesis_report.thesis_report_name.replace(/\//g, "OR");
            $scope.thesis_report.url = $scope.thesis_report.thesis_report_name.replace(/ /g, "-");

            $scope.url = $sce.trustAsResourceUrl("https://archue.com/upload-file/" + $scope.thesis_report.thesis_report_file);
            /* Title of the Page as Title of the Project */
            ngMeta.setTitle($scope.thesis_report.thesis_report_name, '');
            ngMeta.setTag('url', 'https://www.archue.com/full-thesis-report/' + $scope.thesis_report.thesis_report_name);

            var fd = new FormData();
            fd.append('id', $scope.thesis_report.thesis_report_id);

            fetchservice.fetchSimilarThesisReport(fd, (data) => {
                if (data.status == "yes") {
                    $scope.similarThesises = data.data;
                    for (let similarThesis of $scope.similarThesises) {
                        similarThesis.url = similarThesis.thesis_report_name.replace(/\//g, "OR");
                        similarThesis.url = similarThesis.thesis_report_name.replace(/ /g, "-");
                    }
                }
            });
        })

    }
    $scope.fetchOneThesisReport();
    $scope.increaseLike = () => {
        if ($scope.$parent.user.isLoggedIn()) {
            fetchservice.increaseLikeThesisReport($routeParams.id).then(
                (resp) => {
                    console.log(resp);
                    $scope.fetchOneThesisReport();
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
        fetchservice.increaseViewsThesisReport(id).then(
            (resp) => {
                console.log(resp);
                $scope.fetchOneThesisReport();
            },
            (err) => {
                console.log(err);
            }
        );
    }
    $scope.increaseViews($routeParams.id);
})


/*full thesis report controller */
app.controller("myThesisReportController", ($sce, $scope, fetchservice, $routeParams, ngMeta) => {

    $scope.limit = 15;
    $scope.active = 1;
    $scope.skip = 0;
    $scope.fetchThesisReport = (skip, limit) => {
        fetchservice.fetchThesisReport(skip, limit, (data) => {
            console.log(data);
            $scope.count = data.count;
            console.log($scope.count)
            let pages = 0;
            if ($scope.count > $scope.limit) {
                pages = ($scope.count % $scope.limit) === 0 ? ($scope.count / $scope.limit) : Math.floor(($scope.count / $scope.limit)) + 1;
            } else {
                pages = 1;
            }
            $scope.paginations = new Array(pages);
            if (data.status == "yes") {
                $scope.common_thesis_reports = data.data;
                fetchservice.getOneFromArrObj($routeParams.id, $scope.common_thesis_reports, (resp) => {
                    $scope.thesis_report = resp;

                    $scope.thesis_report.url = $scope.thesis_report.thesis_report_name.replace(/\//g, "OR");
                    $scope.thesis_report.url = $scope.thesis_report.thesis_report_name.replace(/ /g, "-");

                    $scope.url = $sce.trustAsResourceUrl("https://archue.com/upload-file/" + $scope.thesis_report.thesis_report_file);
                    /* Title of the Page as Title of the Project */
                    ngMeta.setTitle($scope.thesis_report.thesis_report_name, '');
                    ngMeta.setTag('url', 'https://www.archue.com/full-thesis-report/' + $scope.thesis_report.thesis_report_name);

                    var fd = new FormData();
                    fd.append('id', $scope.thesis_report.thesis_report_id);

                    fetchservice.fetchSimilarThesisReport(fd, (data) => {
                        if (data.status == "yes") {
                            $scope.similarThesises = data.data;
                            for (let similarThesis of $scope.similarThesises) {
                                similarThesis.url = similarThesis.thesis_report_name.replace(/\//g, "OR");
                                similarThesis.url = similarThesis.thesis_report_name.replace(/ /g, "-");
                            }
                        }
                    });
                })
            }
        });
    }
    $scope.fetchThesisReport(0, $scope.limit);

    $scope.toPage = (index) => {
        if ($scope.active === index) {
            return;
        }
        $scope.skip = index * $scope.limit - $scope.limit;
        $scope.fetchThesisReport($scope.skip, $scope.limit);
        $scope.active = index;
    }
    $scope.next = () => {
        $scope.active = $scope.active + 1;
        $scope.skip = $scope.active * $scope.limit - $scope.limit;
        $scope.fetchThesisReport($scope.skip, $scope.limit);
    }
    $scope.prev = () => {
        $scope.active = $scope.active - 1;
        $scope.skip = $scope.active * $scope.limit - $scope.limit;
        $scope.fetchThesisReport($scope.skip, $scope.limit);
    }
    $scope.increaseLike = (id) => {
        if ($scope.$parent.user.isLoggedIn()) {
            fetchservice.increaseLikeThesisReport(id).then(
                (resp) => {
                    console.log(resp);
                    $scope.fetchThesisReport($scope.skip, $scope.limit);
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
        fetchservice.increaseViewsThesisReport(id).then(
            (resp) => {
                console.log(resp);
                $scope.fetchThesisReport($scope.skip, $scope.limit);
            },
            (err) => {
                console.log(err);
            }
        );
    }
    $scope.increaseViews($routeParams.id);
})


/*upload thesis report controller*/
app.controller("thesisReportController", ($rootScope, $scope, uploadService, validationService) => {
    validExt = ['docx', 'doc', 'pdf'];
    $scope.validatePortfolioFile = (file) => {
        if (!validationService.validPortfolio(file, validExt)) {
            alert("File must be docx , doc amd pdf only.");
        } else {
            return true;
        }
    }
    $scope.submitThesisReport = (form) => {
        $scope.$parent.isLoad = true;
        formData = {};
        formData.thesis_report_name = $scope.thesis_report_name;
        formData.thesis_report_place = $scope.thesis_report_place;
        formData.thesis_report_college = $scope.thesis_report_college;
        formData.thesis_report_year = $scope.thesis_report_year;
        formData.thesis_report_file = $scope.portfolioFile;
        formData.userid = $rootScope.userData.id;
        // console.log(formData);
        var fd = new FormData();
        for (let i in formData) {
            fd.append(i, formData[i]);
        }
        uploadService.uploadThesisReport(fd, (data) => {
            console.log(data);
            if (data.status == "yes") {
                $scope.$parent.isLoad = false;
                form.reset();
                $rootScope.isShowThanksModal = true;
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
})