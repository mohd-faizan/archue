/*fetch jobs*/
app.controller("fetchJobController", ($sce, fetchservice, $scope) => {
    $scope.limit = 15;
    $scope.active = 1;
    $scope.skip = 0;
    $scope.fetchJobs = (skip, limit) => {
        fetchservice.fetchJob(skip, limit, (data) => {
            console.log(data);
            if (data.status == "yes") {
                $scope.jobs = data.data;
                for (let job of $scope.jobs) {
                    job.job_heading = fetchservice.removeSpeciolChar(job.job_heading);
                }
            } else {
                console.log("error in jobs");
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
        })
    }
    $scope.fetchJobs(0, $scope.limit);

    $scope.toPage = (index) => {
        if ($scope.active === index) {
            return;
        }
        $scope.skip = index * $scope.limit - $scope.limit;
        $scope.fetchJobs($scope.skip, $scope.limit);
        $scope.active = index;
    }
    $scope.next = () => {
        $scope.active = $scope.active + 1;
        $scope.skip = $scope.active * $scope.limit - $scope.limit;
        $scope.fetchJobs($scope.skip, $scope.limit);
    }
    $scope.prev = () => {
        $scope.active = $scope.active - 1;
        $scope.skip = $scope.active * $scope.limit - $scope.limit;
        $scope.fetchJobs($scope.skip, $scope.limit);
    }
    $scope.sanitize = (html) => {
        return $sce.trustAsHtml(html);
    }
    $scope.setJob = (job) => {
        fetchservice.setJob(job);
    }
    $scope.increaseLike = (id) => {
        if ($scope.$parent.user.isLoggedIn()) {
            fetchservice.increaseLikeJob(id).then(
                (res) => {
                    console.log(res);
                    $scope.fetchJobs($scope.skip, $scope.limit);
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
app.controller("fullJobController", async function($sce, fetchservice, $scope, $routeParams, ngMeta) {
    $scope.fetchJob = () => {
        fetchservice.fetchOneJob($routeParams.id, (data) => {
            console.log('single job', data);
            if (data.status == "yes") {

                // $scope.jobs = data.data;

                // fetchservice.getOneFromArrObj($routeParams.id, $scope.jobs, (resp) => {
                $scope.job = data.data;
                $scope.job.job_heading = fetchservice.removeSpeciolChar($scope.job.job_heading);
                $scope.job.job_content = $sce.trustAsHtml($scope.job.job_content);

                /* Get text from Html content with Tag */
                function stripHtml(html) {
                    // Create a new div element
                    var temporalDivElement = document.createElement("div");

                    // Set the HTML content with the providen
                    temporalDivElement.innerHTML = html;

                    // Retrieve the text property of the element (cross-browser support)
                    return temporalDivElement.textContent || temporalDivElement.innerText || "";
                }

                /* Title of the Page as Title of the Project */
                ngMeta.setTitle($scope.job.job_heading, '');
                ngMeta.setTag('url', 'https://www.archue.com/job/' + $scope.job.job_id + "/" + $scope.job.job_heading);
                ngMeta.setTag('image', 'https://www.archue.com/upload-file/' + $scope.job.job_file);
                ngMeta.setTag('description', stripHtml($scope.job.job_content));

                // })

            } else {
                console.log("error in jobs");
            }
        })
    }
    $scope.fetchJob();
    let next = await fetchservice.getNextPrevJob($routeParams.id, true);
    let prev = await fetchservice.getNextPrevJob($routeParams.id, false);
    if (prev.data.status) {
        $scope.prev = prev.data.data;
        $scope.$apply();
    }
    if (next.data.status) {
        $scope.nxt = next.data.data;
        $scope.$apply();
    }
    $scope.increaseLike = () => {
        if ($scope.$parent.user.isLoggedIn()) {
            fetchservice.increaseLikeJob($routeParams.id).then(
                (res) => {
                    console.log(res);
                    $scope.fetchJob();
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
        fetchservice.increaseViewsJob(id).then(
            (res) => {
                console.log(res);
                $scope.fetchJob();
            },
            (err) => {
                console.log(err);
            }
        );
    }
    $scope.increaseViews($routeParams.id);
})


/*Thesis upload controller */
app.controller("thesisUploadController", (uploadService, $rootScope, $scope, validationService) => {
    $scope.thesis_proj_type = "Select Type";
    $scope.projects = ["Adaptive Reuse", "Building Services design", "Cultural Architecture", "Transports", "Urban Design/Planning",
        "Commercial Architecture", "Educational and Research Center", "Greens Building", "Housing",
        "Healthcare Architecture", "Industrial and Infrastructure",
        "Residential", "Public Facilities and Infrastructure", "Religious", "Interior/exterior Design",
        "Mixed-use Architecture", "Recreational Architecture", "Office Building",
        "Landscape", "sports Architecture", "Hotels/Motel/Resort/Leisure", "Institutional"
    ];
    var ext = ['jpeg', 'png', 'jpg'];
    $scope.callService = (file) => {
        return validationService.fileValidation(file, ext);
    }
    $scope.images1 = [];
    $scope.images2 = [];
    $scope.images3 = [];
    $scope.images4 = [];
    $scope.images5 = [];
    $scope.uploadfiles1 = [];
    $scope.uploadfiles2 = [];
    $scope.uploadfiles3 = [];
    $scope.uploadfiles4 = [];
    $scope.uploadfiles5 = [];
    $scope.removeImage = (images, upload, index) => {
            images.splice(index, 1);
            upload.splice(index, 1);
        }
        /*submit data*/
    $scope.uploadThesis = (form) => {
        $scope.$parent.isLoad = true;
        var thesisData = {};
        // thesisData.thesis_name = $scope.thesis_name;
        thesisData.thesis_title = $scope.thesis_title;
        thesisData.thesis_location = $scope.thesis_location;
        thesisData.thesis_area = $scope.thesis_area;
        thesisData.thesis_year = $scope.thesis_year;
        thesisData.thesis_ins = $scope.thesis_ins;
        thesisData.thesis_guide = $scope.thesis_guide;
        thesisData.thesis_proj_type = $scope.thesis_proj_type;
        thesisData.id = $rootScope.userData.id;
        var fd = new FormData();
        angular.forEach($scope.uploadfiles1, (file) => {
            fd.append('casestudy[]', file);
        })
        angular.forEach($scope.uploadfiles2, (file) => {
            fd.append('conceptsheet[]', file);
        })
        angular.forEach($scope.uploadfiles3, (file) => {
            fd.append('siteplan[]', file);
        })
        angular.forEach($scope.uploadfiles4, (file) => {
            fd.append('plan[]', file);
        })
        angular.forEach($scope.uploadfiles5, (file) => {
            fd.append('elevation[]', file);
        })
        for (let i in thesisData) {
            fd.append(i, thesisData[i]);
        }
        uploadService.uploadThesis(fd, (data) => {
            console.log(data);
            if (data.status == "yes") {
                $scope.$parent.isLoad = false;
                $rootScope.isShowThanksModal = true;
                form.reset();
                // alert("Succesfully submitted.Your Work is published within 72 hours");
                // window.location.href = "./dashboard";
            } else {
                alert(data.message);
            }
        })
    }
})

app.controller("jobController", (uploadService, validationService, $scope) => {
    $scope.fontsize = [8, 9, 10, 11, 12, 14, 16, 18, 20, 22, 24, 26, 28, 36, 48, 72]
    $scope.job_category = "Select Category";
    // let jobData = {};
    $scope.isLoad = false;
    $scope.validatePortfolioFile = (file) => {
        ext = ['jpeg', 'jpg', 'png'];
        return validationService.validPortfolio(file, ext);
    };
    $scope.jobData = {
        name: '',
        email: '',
        companyName: '',
        companyLocation: '',
        position: '',
        payscale: ''
    }
    $scope.submitBlog = () => {
        $scope.isLoad = true;
        // jobData.job_heading = $scope.job_heading;
        // jobData.job_category = $scope.job_category;
        // jobData.job_file = $scope.portfolioFile;
        // jobData.job_provider_name = $scope.job_provider_name;
        $scope.jobData.job_content = $scope.myBlog;
        console.log($scope.jobData);
        let fd = new FormData();
        for (let i in $scope.jobData) {
            fd.append(i, $scope.jobData[i]);
        }
        uploadService.uploadJob(fd, (data) => {
            console.log(data);
            if (data.status == "ok") {
                $scope.isLoad = false;
                window.location.href = "./jobs";
            } else {
                $scope.isLoad = false;
                alert(data.message);
            }
        });
    }
})