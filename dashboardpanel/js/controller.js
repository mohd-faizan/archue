app.controller("rootController", (saveData, $scope) => {
    $scope.showNav = saveData.isLoggedIn();
    $scope.showNavigation = () => {
        $scope.showNav = saveData.isLoggedIn();;
    }
    $scope.isShowViewImage = false;
    $scope.isShowViewImages = () => {
        $scope.isShowViewImage = true;
    }
    $scope.upSetImageView = () => {
            $scope.isShowViewImage = false;
        }
        // search bar
    $scope.searchtype = "PROJECTS";
    $scope.querySubmit = (form, query, type) => {
        var type = type.toLowerCase();
        window.location.href = "./search/" + query + "/" + type;
    }
});
app.controller('loginController', ($location, $scope, loginService, saveData) => {
        var loginData = {};
        $scope.onSubmit = (form) => {
            loginData.username = $scope.username;
            loginData.password = $scope.password;
            loginService.login(loginData, (resp) => {
                console.log("resp", resp);
                if (resp.status == "ok") {
                    saveData.saveDataLocal(resp.data);
                    $scope.$parent.showNavigation();
                    $location.path("./e-magazines");
                } else {
                    console.log(resp.data);
                }
            });
        }
    })
    /*upload blog */
app.controller("blogController", (validationService, $rootScope, $scope, uploadService) => {
    $scope.fontsize = [8, 9, 10, 11, 12, 14, 16, 18, 20, 22, 24, 26, 28, 36, 48, 72]
    $scope.blog_category = "Select Category";
    $scope.validatePortfolioFile = (blog) => {
        ext = ['jpeg', 'jpg', 'png'];
        return validationService.validPortfolio(blog, ext);
    }
    $scope.submitBlog = () => {
        var myBlogData = {};
        myBlogData.blog_heading = $scope.blog_heading;
        myBlogData.blog_category = $scope.blog_category;
        myBlogData.myBlog = $scope.myBlog;
        myBlogData.blog_file = $scope.portfolioFile;
        myBlogData.id = 1;
        var fd = new FormData();
        for (let i in myBlogData) {
            fd.append(i, myBlogData[i]);
        }
        uploadService.sUploadBlog(fd, (data) => {
            if (data.status == "yes") {
                alert("you have upload succesfylly");
                window.location.href = "./blogs";
            } else {
                alert("oops! something going wrong");
                window.location.reload();
            }
        })
    }
})
app.controller("fetchImageController", (fetchservice, $scope) => {
    if ($scope.$parent.isShowViewImage) {
        $scope.images = fetchservice.getImages();
        console.log($scope.images);
    }
    console.log($scope.$parent.isShowViewImage);
});
app.controller("navController", ($scope, countService) => {
    countService.getUnapprovedCount((resp) => {
        $scope.blogUnapprove = resp.blogUnapprove.blogUnapprove;
        $scope.projectUnapprove = resp.projectUnapprove.projectUnapprove;
        $scope.portfolioUnapprove = resp.portfolioUnapprove.portfolioUnapprove;
        $scope.thesisReportUnapprove = resp.thesisReportUnapprove.thesisReportUnapprove;
        $scope.dessertationUnapprove = resp.dessertationUnapprove.dessertationUnapprove;
        $scope.thesisUnapprove = resp.thesisUnapprove.thesisUnapprove;
        $scope.eventUnapprove = resp.eventUnapprove.eventUnapprove;
        $scope.jobUnapprove = resp.jobUnapprove.jobUnapprove;
        $scope.competitionUnapprove = resp.competitionUnapprove.competitionUnapprove;
        $scope.blogCommentsUnapprove = resp.blogCommentsUnapprove.blogCommentsUnapprove;
    })
})


/*search controller*/
app.controller("serachController", ($scope, $sce, myService, fetchservice, $routeParams) => {
    var fd = new FormData();
    for (let i in $routeParams) {
        fd.append(i, $routeParams[i]);
    }
    $scope.isShowProjects = false;
    $scope.isShowThesis = false;
    $scope.isShowEvents = false;
    $scope.isShowcompetitions = false;
    $scope.isShowJobs = false;

    function fetchPro(data) {
        console.log(data);
        // for array of project shown into home
        $scope.myProjectsArr = [];
        // project object 
        $scope.myProjects = {
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
        if (data.status == 1) {
            $scope.projects = data.data;
            for (let project of $scope.projects) {
                $scope.singleProject.image = fetchservice.fetchOneImage(project.site_image);
                $scope.singleProject.projectname = project.project_name;
                $scope.singleProjectImages.push($scope.singleProject);
                $scope.myProjects.mainImage = fetchservice.fetchOneImage(project.site_image);
                $scope.myProjects.images = $scope.myProjects.images.concat(fetchservice.convertToArrImages(project.site_image));
                $scope.myProjects.images = $scope.myProjects.images.concat(fetchservice.convertToArrImages(project.floor_image));
                $scope.myProjects.images = $scope.myProjects.images.concat(fetchservice.convertToArrImages(project.elevation_image));
                $scope.myProjects.images = $scope.myProjects.images.concat(fetchservice.convertToArrImages(project.section_image));
                $scope.myProjects.images = $scope.myProjects.images.concat(fetchservice.convertToArrImages(project.view3d_img));
                $scope.myProjects.mainData = project;
                $scope.myProjects.url = project.project_name.replace(/\//g, "or");
                $scope.myProjects.url = $scope.myProjects.url.replace(/ /g, "-");
                $scope.myProjectsArr.push($scope.myProjects);
                // for emptying $scope.myProjects
                $scope.myProjects = {
                    mainImage: "",
                    images: [],
                    url: "",
                    mainData: {}
                };
                $scope.singleProject = {
                    image: "",
                    projectname: ""
                };
            }
            // console.log($scope.singleProjectImages);
            // console.log($scope.myProjectsArr);
        } else {
            console.log("check all files in which data is flowing");
        }
    };
    $scope.setFullProject = (project) => {
        fetchservice.setFullProject(project);
        // console.log($rootScope.fullProject);
    }
    $scope.setImages = (images) => {
        fetchservice.setImages(images);
        $scope.$parent.isShowViewImages();
    }
    $scope.myLimit = 10;

    function fectThesis(data) {
        console.log(data);
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
        $scope.fullThesisArr = [];
        for (let thesis of data.data) {
            singleThesis.file = fetchservice.fetchOneImage(thesis.casestudy);
            singleThesis.file_name = thesis.thesis_title;
            singleThesis.project_type = thesis.thesis_proj_type;
            fullThesis.singleThesis = singleThesis;
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
        };
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
    }

    function events(data) {
        if (data.status == 1 || data.status == 2) {
            $scope.events = data.data;
        } else {
            alert("please contact the website owner");
        }
    };
    $scope.saintize = (html) => {
        return $sce.trustAsHtml(html);
    }
    $scope.setEvent = (event) => {
        fetchservice.setEvent(event);
    }

    function jobs(data) {
        if (data.status == 1 || data.status == 2) {
            $scope.jobs = data.data;
        } else {
            console.log("error in jobs");
        }
    }
    $scope.setJob = (job) => {
        fetchservice.setJob(job);
    }

    function competitions(data) {
        if (data.status == 1 || data.status == 2) {
            $scope.competitions = data.data;
        } else {
            console.log("error in competitor");
        }
    }
    $scope.setCompetition = (comp) => {
        fetchservice.setCompetitor(comp);
    }
    myService.runSearchQuery(fd, (data) => {
        //console.log(data);
        switch (data.type) {
            case "project":
                $scope.isShowProjects = true;
                fetchPro(data)
                break;
            case "thesis":
                $scope.isShowThesis = true;
                fectThesis(data);
                break;
            case "events":
                $scope.isShowEvents = true;
                events(data);
                break;
            case "competition":
                $scope.isShowcompetitions = true;
                competitions(data);
                break;
            case "jobs":
                $scope.isShowJobs = true;
                jobs(data);
                break;
        }
    })
});

app.controller('newsLetterUsersController', ($scope, $http, saveData) => {
    $scope.myUserLimit = 15;

    $http.get('./php/newsletter-users.php').then((response) => {
        $scope.newsLetterUsers = response.data.data;
    });

    $scope.increaseUserLimit = () => {
        $scope.myUserLimit += 5;
    }

    $scope.cToExcel = () => {
        saveData.converToExcel($scope.newsLetterUsers);
    }
})

app.controller('eMagazines', ($scope, fetchservice) => {
    fetchservice.getEMagazines((data) => {
        if (data.status == 'no') {
            $scope.eMagazines = null;
        } else {
            $scope.eMagazines = data.data;
        }
    });
    $scope.setEMagazine = (eMagazine) => {
        fetchservice.setEMagazine(eMagazine);
    }
});
app.controller('eMagazine', ($scope, fetchservice, $sce) => {
    $scope.eMagazine = fetchservice.getEMagazine();
    $scope.eMagazine.uploaded_on = new Date($scope.eMagazine.uploaded_on), 'dd/MM/yyyy';
    $scope.url = $sce.trustAsResourceUrl("../upload-file/magazines/" + $scope.eMagazine.magazine);
});
app.controller('addEMagazines', ($scope, uploadService, validationService, $timeout) => {
    $scope.validatePortfolioFile = (file) => {
        ext = ['pdf'];
        return validationService.validPortfolio(file, ext);
    }

    $scope.fileSelected = function(element) {
        $scope.cover_image = element.files[0];
    };

    $scope.addEMagazine = () => {
        var eMagazineData = {};
        eMagazineData.name = $scope.name;
        eMagazineData.magazine_description = $scope.magazine_description;
        eMagazineData.cover_image = $scope.cover_image;
        eMagazineData.magazine = $scope.portfolioFile;
        var fd = new FormData();
        for (let i in eMagazineData) {
            fd.append(i, eMagazineData[i]);
        }
        uploadService.addEMagazine(fd, (data) => {
            if (data.status) {
                $scope.success = true;
                $scope.message = "Magazines uploaded successfully.";
                $timeout(function() { $scope.redirect('./e-magazines'); }, 3000);
            } else {

            }
        })
    }

    $scope.redirect = function(route) {
        window.location.href = route;
    }
});

//upload controller
app.controller('EditLeadController', ($scope, $route, uploadLeadService, fetchservice, $timeout) => {
    $scope.budgets = ["1 lakh-5 lakh", '5 lakh-10 lakh', '10 lakh-20 lakh', '20 lakh-50 lakh', '50 lakh+'];
    $scope.workTypes = ["Interiors", "Architectural Design", "Construction", "Landscape"];
    $scope.leadTypes = ['Normal', 'Featured', 'Featured & verified'];
    $scope.isLoading = false;
    $scope.errMessage = ''
    $scope.successMessage = ''
    $scope.getLeadById = async (id) => {
        try{
            const leadResp = await fetchservice.getLeadById(id);
            if (leadResp.status) {
                $scope.lead = leadResp.data[0];
                for(let key of Object.keys($scope.lead)) {
                    if (['phone', 'tentativeBudget', 'cost'].includes(key)) {
                        $scope.lead[key] = +$scope.lead[key];
                    }
                    if (key === 'expectedStartTime') {
                        $scope.lead[key] = new Date($scope.lead[key]);
                    }
                }
                if ($scope.lead.person_count !== '0') {
                    $scope.lead.status = '1';
                } else {
                    $scope.lead.status = '0';
                }
                console.log('$scope.lead', $scope.lead);
            } else {
                console.log('something wrong while fetching lead by id')
            }
        }catch(e) {
            console.log('something wrong while fetching lead by id')
            console.log(e);
        }
    }
    $scope.getLeadById($route.current.params.id)
    $scope.onSubmit = () => {
        // check if status is avaialeble and person count before update is not 0
        if ($scope.lead.status === '1' && $scope.lead.person_count === '0') {
            if ($scope.lead.leadType === 'Normal') {
                $scope.lead.person_count = 4;
            } else if ($scope.lead.leadType === 'Featured') {
                $scope.lead.person_count = 2;
            } else if ($scope.lead.leadType === 'Featured & verified') {
                $scope.lead.person_count = 1;
            }
        } else if ($scope.lead.status === '0' && $scope.lead.person_count !== '0') {
            $scope.lead.person_count = 0;
        }
        $scope.isLoading = true;
        uploadLeadService.updateLeadById($scope.lead).then(
            (resp) => {
                console.log(resp)
                $scope.errMessage = ''
                $scope.isLoading = false;
                if (resp.data.status) {
                    $scope.successMessage = resp.data.message;

                } else {
                    $scope.successMessage = '';
                    $scope.errMessage = resp.data.message;
                }
                $timeout(() => {
                    $scope.successMessage = ''
                    $scope.errMessage = ''
                    window.location.href = '/dashboardpanel/leads'
                }, 3000);
            },
            (err) => {
                $scope.isLoading = false;
                $scope.successMessage = '';
                console.log(err)
                $scope.errMessage = 'Lead upload failed.';
            }
        );
    }

});
app.controller('uploadLeadController', ($scope, uploadLeadService, $timeout) => {
    $scope.budgets = ["1 lakh-5 lakh", '5 lakh-10 lakh', '10 lakh-20 lakh', '20 lakh-50 lakh', '50 lakh+'];
    $scope.workTypes = ["Interiors", "Architectural Design", "Construction", "Landscape"];
    $scope.leadTypes = ['Normal', 'Featured', 'Featured & verified'];
    $scope.lead = {
        name: '',
        phone: '',
        email: '',
        tentativeBudget: 0,
        workType: '',
        city: '',
        leadType: '',
        expectedStartTime: '',
        description: '',
        cost: 0,
        person_count: 0
    }
    $scope.isLoading = false;
    $scope.errMessage = ''
    $scope.successMessage = ''
    $scope.onSubmit = () => {
        console.log($scope.lead);
        if ($scope.lead.leadType === 'Normal') {
            $scope.lead.person_count = 4;
        } else if ($scope.lead.leadType === 'Featured') {
            $scope.lead.person_count = 2;
        } else if ($scope.lead.leadType === 'Featured & verified') {
            $scope.lead.person_count = 1;
        }
        $scope.isLoading = true;
        uploadLeadService.uploadLead($scope.lead).then(
            (resp) => {
                console.log(resp.data)
                $scope.errMessage = ''
                $scope.isLoading = false;
                if (resp.data.status) {
                    $scope.successMessage = resp.data.message;

                } else {
                    $scope.successMessage = '';
                    $scope.errMessage = resp.data.message;
                }
                $timeout(() => {
                    $scope.successMessage = ''
                    $scope.errMessage = ''
                }, 3000);
                $scope.lead = {
                    name: '',
                    phone: '',
                    email: '',
                    tentativeBudget: 0,
                    workType: '',
                    city: '',
                    leadType: '',
                    expectedStartTime: '',
                    description: '',
                    cost: 0
                }
            },
            (err) => {
                $scope.isLoading = false;
                $scope.successMessage = '';
                console.log(err)
                $scope.errMessage = 'Lead upload failed.';
            }
        );
    }

});