app.controller("projectsController", ($route, $scope, fetchservice) => {
    $scope.limit = 15;
    $scope.active = 1;
    $scope.fetchProject = (skip, limit) => {
        fetchservice.fetchPro(skip, limit, (data) => {
            console.log(data);
            $scope.projects = data.data;

            // for array of project shown into home
            $scope.myProjectsArr = [];
            // project object 
            $scope.myProjects = {
                category: "",
                mainImage: "",
                url: "",
                images: [],
                mainData: {}
            };

            //for carousel images
            $scope.singleProjectImages = [];
            $scope.singleProject = {
                image: "",
                projectname: ""
            };
            for (let project of $scope.projects) {
                $scope.singleProject.image = fetchservice.fetchOneImage(project.view3d_img);
                $scope.singleProject.projectname = project.project_name;
                $scope.singleProjectImages.push($scope.singleProject);
                $scope.myProjects.category = project.project_type;
                $scope.myProjects.mainImage = fetchservice.fetchOneImage(project.view3d_img);
                $scope.myProjects.images = $scope.myProjects.images.concat(fetchservice.convertToArrImages(project.site_image));
                $scope.myProjects.images = $scope.myProjects.images.concat(fetchservice.convertToArrImages(project.floor_image));
                $scope.myProjects.images = $scope.myProjects.images.concat(fetchservice.convertToArrImages(project.elevation_image));
                $scope.myProjects.images = $scope.myProjects.images.concat(fetchservice.convertToArrImages(project.section_image));
                $scope.myProjects.images = $scope.myProjects.images.concat(fetchservice.convertToArrImages(project.view3d_img));
                $scope.myProjects.url = project.project_name.replace(/\//g, "or");
                $scope.myProjects.url = $scope.myProjects.url.replace(/ /g, "-");
                $scope.myProjects.mainData = project;
                $scope.myProjectsArr.push($scope.myProjects);

                // for emptying $scope.myProjects
                $scope.myProjects = {
                    category: "",
                    mainImage: "",
                    url: "",
                    images: [],
                    mainData: {}
                };
                $scope.singleProject = {
                    image: "",
                    projectname: ""
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

    $scope.fetchProject(0, $scope.limit);

    $scope.toPage = (index) => {
        if ($scope.active === index) {
            return;
        }
        const skip = index * $scope.limit - $scope.limit;
        $scope.fetchProject(skip, $scope.limit);
        $scope.active = index;
    }
    $scope.next = () => {
        $scope.active = $scope.active + 1;
        const skip = $scope.active * $scope.limit - $scope.limit;
        $scope.fetchProject(skip, $scope.limit);
    }
    $scope.prev = () => {
        $scope.active = $scope.active - 1;
        const skip = $scope.active * $scope.limit - $scope.limit;
        $scope.fetchProject(skip, $scope.limit);
    }

    $scope.setFullProject = (project) => {
        fetchservice.setFullProject(project);
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
})

app.controller("fullProjectController", ($scope, projectService, fetchservice, $route, ngMeta) => {
    // fetch similar projects
    $scope.fetchSimilarProject = (id, projectType) => {
        fetchservice.getSimilarProjects(id, projectType, (data) => {
            console.log(data);
            if (data.status == 'ok') {
                // console.log(data);
                $scope.similarProjects = data.data;
                // console.log($scope.similarProjects);
                for (let project of $scope.similarProjects) {
                    project.url = project.project_name.replace(/\//g, "or");
                    project.url = project.url.replace(/ /g, "-");
                }
            } else {
                console.log("error");
            }
        });
    }

    // increment views
    $scope.incrementViews = (projectId) => {
        projectService.incrementProjectView(projectId)
            .then(
                (resp) => {
                    console.log(resp);
                    $scope.fetchSingleProject();
                },
                (err) => { console.log(err); }
            );
    }
    $scope.incrementViews($route.current.params.projectid);
    // next and prev
    $scope.increaseLike = () => {
        // console.log($route.current.params.projectid);
        // console.log($scope.$parent.user.isLoggedIn());
        if ($scope.$parent.user.isLoggedIn()) {
            projectService.incrementLikes($route.current.params.projectid).then(
                (resp) => {
                    console.log(resp);
                    $scope.fetchSingleProject();
                },
                (err) => { console.log(err) }
            );
        } else {
            const url = window.location.pathname;
            localStorage.setItem('backTo', url);
            $scope.$parent.location.path("/login");
        }
    }
    $scope.next = (id, isNext, cb) => {

        fetchservice.fetchProject(id, isNext, (data) => {
            // console.log(data);
            if (data.status) {
                sessionStorage.removeItem("fullProject");
                cb(data);
            } else {
                data.status = false;
                cb(data);
            }
        })
    }


    $scope.fetchSingleProject = () => {
        fetchservice.fetchSingleProject($route.current.params.projectid, (d) => {
            // fetchservice.getOneFromArrObj($route.current.params.projectid, data.data, (data) => {
            console.log("full project ", d);
            let data = d.data;
            console.log('data', data);
            if (!d.status) {
                console.log(data);
                $scope.fullProject = undefined;
            } else {
                $scope.fullProject = {
                    mainData: {},
                    mainImage: ""
                }
                $scope.next(data.project_id, true, (data) => {
                    if (data.status) {
                        $scope.nxt = data.data;
                        $scope.nxt.url = $scope.nxt.project_name.replace(/ /g, "-");
                        // console.log($scope.nxt);
                    } else {
                        console.log("next Project", data);
                    }
                });
                $scope.next(data.project_id, false, (data) => {
                    if (data.status) {
                        $scope.prev = data.data;
                        // console.log($scope.prev);
                        $scope.prev.url = $scope.prev.project_name.replace(/ /g, "-");
                    } else {
                        console.log(data);
                    }
                });
                $scope.fullProject.mainImage = fetchservice.fetchOneImage(data.view3d_img);
                $scope.fullProject.mainData = data;
                $scope.fetchSimilarProject(data.project_id, data.project_type);
                /* Title of the Page as Title of the Project */
                ngMeta.setTitle($scope.fullProject.mainData.project_name, '');
                ngMeta.setTag('description', $scope.fullProject.mainData.project_desc);
                ngMeta.setTag('image', 'https://archue.com/uploads/' + $scope.fullProject.mainImage);
                ngMeta.setTag('url', 'https://www.archue.com/full-project/' + $scope.fullProject.mainData.project_id + '/' + $scope.fullProject.url);

                $scope.siteImages = fetchservice.convertToArrImages($scope.fullProject.mainData.site_image);
                $scope.floorImages = fetchservice.convertToArrImages($scope.fullProject.mainData.floor_image);
                $scope.elevationImages = fetchservice.convertToArrImages($scope.fullProject.mainData.elevation_image);
                $scope.sectionImages = fetchservice.convertToArrImages($scope.fullProject.mainData.section_image);
                $scope.view3dImages = fetchservice.convertToArrImages($scope.fullProject.mainData.view3d_img);
                $scope.fullProject.url = data.project_name.replace(/\//g, "or");
                $scope.fullProject.url = $scope.fullProject.url.replace(/ /g, "-");
                $scope.fullProject.images = [...$scope.siteImages, ...$scope.floorImages, ...$scope.elevationImages, ...$scope.sectionImages, ...$scope.view3dImages];
            }
            // });
        })
    }
    $scope.fetchSingleProject();

    // }



    $scope.setImages = (images) => {
        fetchservice.setImages(images);
        $scope.$parent.isShowViewImages();
    }

    // trigger similar projects
    $scope.similar = (project_id, project_name) => {
        sessionStorage.removeItem("fullProject");
        window.location.href = "./full-project/" + project_id + "/" + project_name;
    }

})

/*project upload controller */
app.controller("projectUploadController", ($scope, $rootScope, uploadService, validationService) => {
    $scope.isShowFeedMessage = false;
    $scope.userData = $rootScope.userData;
    $scope.proj_type = "Project Type";
    $scope.projectType = ["Adaptive Reuse", "Building Services design", "Cultural Architecture", "Transports", "Urban Design/Planning",
        "Commercial Architecture", "Educational and Research Center", "Greens Building", "Housing",
        "Healthcare Architecture", "Industrial and Infrastructure",
        "Residential", "Public Facilities and Infrastructure", "Religious", "Interior/exterior Design",
        "Mixed-use Architecture", "Recreational Architecture", "Office Building",
        "Landscape", "Sports Architecture", "Hotels/Motel/Resort/Leisure", "Institutional"
    ];
    // console.log($scope.userData);
    $scope.uploadfiles1 = [];
    $scope.uploadfiles2 = [];
    $scope.uploadfiles3 = [];
    $scope.uploadfiles4 = [];
    $scope.uploadfiles5 = [];

    $scope.images1 = [];
    $scope.images2 = [];
    $scope.images3 = [];
    $scope.images4 = [];
    $scope.images5 = [];
    /*after filling feedback form this method occur*/
    $scope.changeFeedMessage = () => {
            $scope.isShowFeedMessage = true;
        }
        /*for validation project upload*/
    var imageExt = ['jpg', 'jpeg', 'png', 'webp'];
    $scope.callService = (image) => {
        return validationService.fileValidation(image, imageExt);
    }
    $scope.upload = function(form) {
        $scope.$parent.isLoad = true;
        data = {};
        data.proj_name = $scope.proj_name;
        data.loc = $scope.loc;
        data.ins_name = $scope.ins_name;
        data.area = $scope.area;
        data.proj_year = $scope.proj_year;
        data.proj_type = $scope.proj_type;
        data.proj_site_img_desc = $scope.proj_site_img_desc;
        data.proj_floor_img_desc = $scope.proj_floor_img_desc;
        data.proj_elev_img_desc = $scope.proj_elev_img_desc;
        data.proj_sec_img_desc = $scope.proj_sec_img_desc;
        data.proj_desc = $scope.proj_desc;
        data.userId = $scope.userData.id;
        var fd = new FormData();
        angular.forEach($scope.uploadfiles1, function(file) {
            fd.append('site[]', file);
        });
        angular.forEach($scope.uploadfiles2, function(file) {
            fd.append('floor[]', file);
        });
        angular.forEach($scope.uploadfiles3, function(file) {
            fd.append('elevation[]', file);
        });
        angular.forEach($scope.uploadfiles4, function(file) {
            fd.append('section[]', file);
        });
        angular.forEach($scope.uploadfiles5, function(file) {
            fd.append('view3d[]', file);
        });
        for (let i in data) {
            fd.append(i, data[i]);
        }
        uploadService.upload(fd, (data) => {
            console.log(data);
            if (data.status = "yes") {
                $scope.$parent.isLoad = false;
                $scope.projectId = data.data.project_id;
                $rootScope.isShowModal = true;
                $rootScope.modalData = data.message;
                form.reset();
                $scope.uploadfiles1 = [];
                $scope.uploadfiles2 = [];
                $scope.uploadfiles3 = [];
                $scope.uploadfiles4 = [];
                $scope.uploadfiles5 = [];

                $scope.images1 = [];
                $scope.images2 = [];
                $scope.images3 = [];
                $scope.images4 = [];
                $scope.images5 = [];

            }
        });
    }

});
/*feedbaack controller */
app.controller("projectUploadFeedController", ($scope, $rootScope, $timeout, $window, uploadService) => {
    $scope.star = 0;
    var mydata = {};
    $scope.onFeedback = (form) => {
        $scope.$parent.changeFeedMessage();
        mydata.star = $scope.star;
        mydata.feedback = $scope.feedback;
        mydata.id = $rootScope.userData.id;
        mydata.projectId = $scope.$parent.projectId;
        var fd = new FormData();
        for (let i in mydata) {
            fd.append(i, mydata[i]);
        }
        uploadService.feedback(fd, (data) => {
            console.log(mydata);
            $timeout(() => { $window.location.href = './' }, 1000);
        });
    }

});