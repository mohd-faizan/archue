/*fetch thesis*/
app.controller("fetchThesisController", ($scope, fetchservice) => {
        $scope.limit = 15;
        $scope.active = 1;
        let singleThesis = {
            file: "",
            file_name: "",
            project_type: ""
        }
        let fullThesis = {
            singleThesis: {},
            images: [],
            thesis: {}
        };
        $scope.fetchThesis = (skip, limit) => {
            fetchservice.fetchThesis(skip, limit, (data) => {
                console.log(data);
                $scope.fullThesisArr = [];
                for (let thesis of data.data) {
                    singleThesis.file = fetchservice.fetchOneImage(thesis.casestudy);
                    singleThesis.file_name = thesis.thesis_title.replace(/\//g, "-");
                    singleThesis.project_type = thesis.thesis_proj_type;

                    fullThesis.singleThesis = singleThesis;

                    fullThesis.singleThesis.url = fullThesis.singleThesis.file_name.replace(/\//g, "or");
                    fullThesis.singleThesis.url = fullThesis.singleThesis.file_name.replace(/ /g, "-");

                    fullThesis.images = fullThesis.images.concat(fetchservice.convertToArrImages(thesis.casestudy));
                    fullThesis.images = fullThesis.images.concat(fetchservice.convertToArrImages(thesis.conceptsheet));
                    fullThesis.images = fullThesis.images.concat(fetchservice.convertToArrImages(thesis.siteplan));
                    fullThesis.images = fullThesis.images.concat(fetchservice.convertToArrImages(thesis.plan));
                    fullThesis.images = fullThesis.images.concat(fetchservice.convertToArrImages(thesis.elevation));
                    fullThesis.thesis = thesis;
                    $scope.fullThesisArr.push(fullThesis);
                    singleThesis = {
                        file: "",
                        file_name: "",
                        project_type: ""
                    };
                    fullThesis = {
                        singleThesis: {},
                        images: [],
                        thesis: {}
                    };
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

        $scope.fetchThesis(0, $scope.limit);

        $scope.toPage = (index) => {
            if ($scope.active === index) {
                return;
            }
            const skip = index * $scope.limit - $scope.limit;
            $scope.fetchThesis(skip, $scope.limit);
            $scope.active = index;
        }
        $scope.next = () => {
            $scope.active = $scope.active + 1;
            const skip = $scope.active * $scope.limit - $scope.limit;
            $scope.fetchThesis(skip, $scope.limit);
        }
        $scope.prev = () => {
            $scope.active = $scope.active - 1;
            const skip = $scope.active * $scope.limit - $scope.limit;
            $scope.fetchThesis(skip, $scope.limit);
        }
        $scope.categories = ["Adaptive Reuse", "Building Services design", "Cultural Architecture", "Transports", "Urban Design/Planning",
            "Commercial Architecture", "Educational and Research Center", "Greens Building", "Housing",
            "Healthcare Architecture", "Industrial and Infrastructure",
            "Residential", "Public Facilities and Infrastructure", "Religious", "Interior/exterior Design",
            "Mixed-use Architecture", "Recreational Architecture", "Office Building",
            "Landscape", "sports Architecture", "Hotels/Motel/Resort/Leisure", "Institutional"
        ];
        $scope.category = "";
        $scope.setCategory = (cat) => {
            $scope.category = cat;
        }
        $scope.setThesis = (x) => {
            fetchservice.setThesis(x);
        }
    })
    /*fetch Full Thesis*/
app.controller("fullThesisController", ($scope, thesisService, fetchservice, $routeParams, ngMeta) => {
    // $scope.thesis = fetchservice.getThesis();
    // if ($scope.thesis == undefined || $scope.thesis == null) {
    $scope.getSingleThesis = () => {
        fetchservice.fetchOneThesis($routeParams.id, (data) => {
            console.log('single thesis', data);
            let resp = data.data;
            // fetchservice.getOneFromArrObj($routeParams.id, data, (resp) => {
            $scope.thesis = {
                singleThesis: {
                    file: "",
                    file_name: ""
                },
                thesis: {}
            }
            $scope.thesis.singleThesis.file = fetchservice.fetchOneImage(resp.casestudy);
            $scope.thesis.singleThesis.file_name = resp.thesis_title;
            $scope.thesis.thesis = resp;

            $scope.thesis.thesis.url = fetchservice.removeSpeciolChar($scope.thesis.singleThesis.file_name);
            console.log($scope.thesis.thesis.url);
            $scope.thesis.thesis.whatsapp = "https://www.archue.com/full-thesis/" + $scope.thesis.thesis.thesis_id + "/" + $scope.thesis.thesis.url.replace(/\//g, "-");
            if ($scope.thesis.thesis.images == undefined) {
                $scope.thesis.thesis.images = [];
            }
            $scope.thesis.thesis.images = $scope.thesis.thesis.images.concat(fetchservice.convertToArrImages($scope.thesis.thesis.casestudy));
            $scope.thesis.thesis.images = $scope.thesis.thesis.images.concat(fetchservice.convertToArrImages($scope.thesis.thesis.conceptsheet));
            $scope.thesis.thesis.images = $scope.thesis.thesis.images.concat(fetchservice.convertToArrImages($scope.thesis.thesis.elevation));
            $scope.thesis.thesis.images = $scope.thesis.thesis.images.concat(fetchservice.convertToArrImages($scope.thesis.thesis.plan));
            $scope.thesis.thesis.images = $scope.thesis.thesis.images.concat(fetchservice.convertToArrImages($scope.thesis.thesis.siteplan));

            /* Title of the Page as Title of the Project */
            ngMeta.setTitle($scope.thesis.singleThesis.file_name, '');
            ngMeta.setTag('image', 'https://archue.com/uploads/' + $scope.thesis.singleThesis.file);
            ngMeta.setTag('description', $scope.thesis.thesis.thesis_guide);
            ngMeta.setTag('url', 'https://www.archue.com/full-thesis/' + $scope.thesis.thesis.thesis_id + '/' + $scope.thesis.thesis.url);

            // similar theisis
            fetchservice.getSimilarThesis($scope.thesis).then((resp) => {
                    // console.log(resp.data);
                    if (resp.data.status == "ok") {
                        $scope.similarThesises = resp.data.data;
                    } else {
                        // console.log('error');
                    }
                }, (err) => {
                    console.log(err);
                })
                // next or previous
            $scope.next($scope.thesis.thesis.thesis_id, true, (data) => {
                if (data.status) {
                    $scope.nxt = data.data;
                    $scope.nxt.url = $scope.nxt.thesis_title.replace(/ /g, "-");
                    $scope.nxt.url = $scope.nxt.url.replace(/\//g, "-");
                } else {
                    console.log("no data");
                }
            });
            $scope.next($scope.thesis.thesis.thesis_id, false, (data) => {
                if (data.status) {
                    $scope.prev = data.data;
                    $scope.prev.url = $scope.prev.thesis_title.replace(/ /g, "-");
                    $scope.prev.url = $scope.prev.url.replace(/\//g, "-");
                } else {
                    console.log("no data");
                }
            });
            // });
        });
    }
    $scope.getSingleThesis();
    $scope.next = (thesis_id, isNext, cb) => {
        fetchservice.fetchNextPrevThesis(thesis_id, isNext, (data) => {
            if (data.status) {
                cb(data);
            } else {
                data.status = false;
                cb(data);
            }
        })
    }
    $scope.similar = (thesis_id, thesis_title) => {
        let url = thesis_title.replace(/ /g, "-")
        url = url.replace(/\//g, "-");
        window.location.href = "./full-thesis/" + thesis_id + "/" + url;
    }
    $scope.increaseLike = () => {
        if ($scope.$parent.user.isLoggedIn()) {
            thesisService.incrementLikes($routeParams.id).then(
                (resp) => {
                    console.log(resp);
                    $scope.getSingleThesis();
                },
                (err) => { console.log(err) }
            );
        } else {
            const url = window.location.pathname;
            localStorage.setItem('backTo', url);
            $scope.$parent.location.path("/login");
        }
    }
    $scope.incrementViews = (id) => {
        thesisService.incrementView(id).then(
            (res) => {
                console.log(res);
                $scope.getSingleThesis();
            },
            (err) => {
                console.log(err);
            }
        );
    }
    $scope.incrementViews($routeParams.id);
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