app.controller("rootController", ($sce, fetchservice, $document, $location, $scope, $interval, user, $rootScope, $timeout, myService) => {
    $scope.isShowLoad = true;
    $scope.isShowViewImage = false;
    $scope.interval = $interval;
    $scope.timeout = $timeout;
    $scope.errorMessage;
    $scope.isShowError = 0;
    $scope.myser = myService;
    $scope.location = $location;
    $scope.user = user;
    $rootScope.isShow = user.isLoggedIn();
    $rootScope.userData = user.getSaveData();
    $scope.likes = 'likes';
    $scope.views = "views";
    $scope.workLimit = 5;

    $scope.increaseLimit = () => {
        $scope.workLimit += 2;
    }

    $timeout(() => { $scope.isShowLoad = false }, 500);

    $scope.isShowViewImages = () => {
        $scope.isShowViewImage = true;
    }

    $scope.upSetImageView = () => {
        $scope.isShowViewImage = false;
    }

    $scope.setUser = () => {
        $rootScope.userData = user.getSaveData();
        $rootScope.isShow = user.isLoggedIn();
    }

    /* Fetch Thesis Reports */
    fetchservice.fetchThesisReport(0, 15, (data) => {
        console.log(data);
        if (data.status == "yes") {
            $scope.common_thesis_reports = data.data;
            for (let common_thesis_report of $scope.common_thesis_reports) {
                common_thesis_report.url = common_thesis_report.thesis_report_name.replace(/\//g, "OR");
                common_thesis_report.url = common_thesis_report.thesis_report_name.replace(/ /g, "-");
            }
        }
    });

    $scope.setThesisReport = (theisReport) => {
        fetchservice.setThesisReport(theisReport);
    }

    fetchservice.fetchBlog(0, 15, (data) => {
        if (data.status == "yes") {
            $scope.blogs = data.resp;
            for (let blog of $scope.blogs) {
                blog.url = blog.heading.replace(/\//g, 'OR');
                blog.url = blog.url.replace(/ /g, '-');
                blog.url = encodeURI(blog.url);
            }
        }
    });

    $scope.setBlog = (blog) => {
        fetchservice.setFullBlog(blog);
    }

    fetchservice.uploadMaterial((data) => {
        $scope.uploadMaterials = data.data;
    });

    /*Set Side Materials*/
    $scope.setSideMaterial = (material) => {
        localStorage.setItem('material', JSON.stringify(material));
    }

    /*Hide Upload Button When Manufacturer*/
    $rootScope.isButtonHide = true;
    $scope.hideUpload = () => {
        $rootScope.isButtonHide = false;
    }
    $rootScope.isShowGetQuote = true;
    $rootScope.hideGetQuoteButton = () => {
        $rootScope.isShowGetQuote = false;
    }
    $rootScope.timeout = () => {
        $timeout(() => {
            alert("Sorry ! server timeout.");
            window.location.href = './home';
        }, 900000)
    }


});
app.controller("signUpController", ($scope, myService, mailService) => {
    // $scope.regex = "^[0-9]*$";
    $scope.isLoad = false;
    $scope.passRegex = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]/;
    $scope.profession = "Select Profession";
    $scope.professions = ["Architect", "Architecture Student", "Interior Designer", "Others"];
    $scope.isInterest = false;
    $scope.emailMe = false;
    $scope.type = 'password';
    $scope.togglePasswordView = () => {
        console.log('working');
        $scope.type = $scope.type === 'password' ? 'text' : 'password'
    }
    $scope.onSignup = (form) => {
        var formData = {};
        formData.name = $scope.fname;
        formData.email = $scope.email;
        formData.password = $scope.password;
        formData.profession = $scope.profession;
        formData.mobileno = $scope.mobileno;
        // formData.country = $scope.country;
        // formData.city = $scope.city;
        formData.isInterest = $scope.isInterest;
        formData.emailMe = $scope.emailMe;
        $scope.$parent.myser.signup(formData, (data) => {
            if (data.status == "ok") {
                $scope.isLoad = true;
                $scope.$parent.isShowError = 1;
                $scope.$parent.errorMessage = "Signed Up";
                $scope.$parent.user.saveDataSession({ name: formData.name, user_id: data.data, profession: formData.profession, company_name: '', profile: "default-user.png" });
                $scope.$parent.setUser();
            } else {
                $scope.$parent.isShowError = 2;
                $scope.$parent.errorMessage = data.message;
            }
        });
        $scope.$parent.timeout(() => {
            if ($scope.$parent.isShowError == 1) {
                $scope.$parent.location.path("/dashboard");
                mailService.mailWhileLogin(formData.email)
                $scope.$parent.isShowError = 0;
            } else {
                form.reset();
            }
        }, 3000);
    }

    $scope.checkEmailExistence = () => {
        $scope.existCheck = false;
        myService.checkEmailExistence($scope.email, (data) => {
            if (data.data) {
                $scope.existCheck = true;
            } else {
                $scope.existCheck = false;
            }
        })
    }
});
app.controller("navController", ($scope) => {
    $scope.isShowSmallSearch = false;
    $scope.ifUpload = () => {
        if ($scope.$parent.user.isLoggedIn()) {
            $scope.$parent.location.path("/upload");
        } else {
            $scope.$parent.location.path("/login");
        }
    }
    $scope.searchtype = "PROJECTS";
    $scope.querySubmit = (form) => {
        var param = $scope.searchquery;
        var type = $scope.searchtype;
        var type = type.toLowerCase();
        window.location.href = "./search/" + param + "/" + type;
    }
    $scope.showSmallSearch = () => {
        $scope.isShowSmallSearch = !$scope.isShowSmallSearch;
    }
})
app.controller("loginController", ($scope, $location) => {
    // Added by Aeshar //
    var searchObject = $location.search();
    // End by Aeshar //

    $scope.remember = true;
    $scope.passRegex = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]/;
    $scope.type = 'password';
    $scope.togglePasswordView = () => {
        console.log('working');
        $scope.type = $scope.type === 'password' ? 'text' : 'password'
    }
    $scope.onLogin = () => {
        var data = {};
        data.email = $scope.email;
        data.password = $scope.password;
        data.remember = $scope.remember;
        $scope.isShowError = false;
        $scope.$parent.myser.login(data, (resp) => {
            console.log(resp);
            const user_id = resp.data.user_id;
            if (resp.status == "yes") {
                $scope.$parent.user.saveDataSession(resp.data);
                $scope.$parent.setUser();
                let usrAfterLogin = localStorage.getItem('usrAfterLogin');
                const backUrl = localStorage.getItem('backTo');
                if (usrAfterLogin) {
                    usrAfterLogin = usrAfterLogin + '&user_id=' + user_id;
                    $scope.$parent.location.path(usrAfterLogin);

                } else if (backUrl) {
                    $scope.$parent.location.path(backUrl);
                } else if (searchObject.redirect) {
                    $scope.$parent.location.path("./" + searchObject.redirect);
                } else {
                    /*New Changes*/
                    $scope.pro = ["Manufacture and Supplier", "vendor"];
                    if ($scope.pro.indexOf(resp.data.profession) == -1) {
                        $scope.$parent.location.path("/upload");
                    } else {
                        $scope.$parent.location.path("/dashboard");
                    }
                }
            } else if (resp.status == "remember") {
                $scope.$parent.user.saveDataLocal(resp.data);
                $scope.$parent.setUser();
                let usrAfterLogin = localStorage.getItem('usrAfterLogin');
                const backUrl = localStorage.getItem('backTo');
                if (usrAfterLogin) {
                    usrAfterLogin = usrAfterLogin + '&user_id=' + user_id;

                    // $scope.$parent.location.path(usrAfterLogin);
                    window.location.href = usrAfterLogin;
                    localStorage.removeItem('usrAfterLogin');
                } else if (backUrl) {
                    $scope.$parent.location.path(backUrl);
                } else if (searchObject.redirect) {
                    $scope.$parent.location.path("./" + searchObject.redirect);
                } else {
                    /*New Changes*/
                    $scope.pro = ["Manufacture and Supplier", "vendor"];
                    if ($scope.pro.indexOf(resp.data.profession) == -1) {
                        $scope.$parent.location.path("/upload");
                    } else {
                        $scope.$parent.location.path("/dashboard");
                    }
                }
            } else {
                $scope.isShowError = true;
                console.log("Error");
            }
        });
    }
    $scope.user = {
        name: "",
        id: ""
    };
    $scope.onGoogleLogin = () => {
        var params = {
            // 'clientid': '362804443140-fe67logvlrs03p9ev7et4ausgvni5856.apps.googleusercontent.com',
            'clientid': '992182296423-dth33m6qi6lj0nsmu1h49d7jgtbgujle.apps.googleusercontent.com',
            'cookiepolicy': 'single_host_origin',
            'callback': function(result) {
                if (result['status']['signed_in']) {
                    var request = gapi.client.plus.people.get({
                        'userId': 'me'
                    });
                    request.execute(function(resp) {
                        $scope.$apply(function() {
                            $scope.availEmail = resp.emails[0].value;
                            $scope.isLoginWith = true;
                            $scope.user.name = resp.displayName;
                            $scope.user.id = resp.id;
                        });
                    });
                }
            },
            'approvalprompt': 'force',
            'scope': 'https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/plus.profile.emails.read'
        }
        gapi.auth.signIn(params);
    };
    $scope.onFBLogin = () => {
        FB.login(function(response) {
            if (response.authResponse) {
                FB.api('/me', 'GET', { feilds: 'email,first_name,name,id' }, function(response) {
                    $scope.$apply(function() {
                        $scope.user.name = response.name;
                        $scope.user.id = response.id;
                        $scope.isLoginWith = true;
                    });
                })
            } else {
                console.log("not logged in");
            }
        })
    }
});
app.controller("loginWithController", ($scope, myService, user) => {
    $scope.lprofession = "select option";
    additionInfo = {};
    $scope.lemail = $scope.$parent.availEmail;
    $scope.onsuubmit = () => {

        additionInfo.lemail = $scope.lemail;
        additionInfo.lphone = $scope.lphone;
        additionInfo.lprofession = $scope.lprofession;
        additionInfo.name = $scope.$parent.user.name;
        additionInfo.password = $scope.password;

        /*Email Exist Check */
        $scope.existCheck = false;
        myService.checkEmailExistence($scope.lemail, (data) => {

            if (data.data) {
                $scope.existCheck = true;
                return;
            } else {
                $scope.existCheck = false;
                /*Additional Data Submit*/
                myService.loginWith(additionInfo, (data) => {
                    if (data.status == 1) {
                        user.saveDataSession(data.data);
                        if (searchObject.redirect) {
                            $scope.$parent.location.path("./" + searchObject.redirect);
                        } else {
                            window.location.href = '/upload';
                        }
                        $scope.$parent.setUser();
                    }
                });
            }
        })
    }
})
app.controller("dashboardController", (myService, $scope, $rootScope, fetchservice) => {
    $scope.$parent.setUser();
    $scope.leadLimit = 3;
    $scope.userData = $rootScope.userData;
    console.log($scope.userData);
    $scope.pro = ["Manufacture and Supplier", "vendor"];
    $scope.leads;
    $scope.incrementLead = () => {
        $scope.leadLimit = $scope.leadLimit + 3;
    }
    if ($scope.pro.indexOf($scope.userData.profession) == -1) {
        console.log($scope.userData.id);
        myService.fetchUserData($scope.userData.id, (data) => {
            console.log(data);
            /*Blogs*/
            $scope.leads = data.payLeads;
            if ($scope.leads && $scope.leads.length > 0) {
                $scope.leads = $scope.leads.map(lead => {
                    return {...lead, purchasedOn: new Date(lead.purchased_on) };
                });
            }
            $scope.blogs = data.blogs;
            for (let blog of $scope.blogs) {
                blog.url = encodeURI(blog.heading);
            }
            $scope.blogs = $scope.blogs.filter((o) => o.is_approve != "0");
            console.log($scope.blogs);
            /*Projects*/
            $scope.projects = data.projects;
            $scope.projects = $scope.projects.filter((o) => o.project_approve != "0");
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

            /*Dessertations*/
            $scope.dessertations = data.dessertations;
            $scope.dessertations = $scope.dessertations.filter((o) => o.dessertation_approve != "0");

            /*Portfolios*/
            $scope.portfolios = data.portfolios;
            $scope.portfolios = $scope.portfolios.filter((o) => o.portfolio_approve != "0");

            /*Thesises*/
            $scope.thesises = data.thesises;
            $scope.thesises = $scope.thesises.filter((o) => o.thesis_approve != "0");

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
            for (let thesis of $scope.thesises) {
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
                // console.log($scope.fullThesisArr);
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
            // console.log($scope.fullThesisArr);

            /*Thesis Reports*/
            $scope.thesis_reports = data.thesis_reports;
            $scope.thesis_reports = $scope.thesis_reports.filter((o) => o.thesis_report_approve != "0");


        });
    }
    // if profession coming from archutecture
    else {
        $scope.$parent.hideUpload();
        $scope.isShowLoad = true;
        $scope.leadLimit = 5;

        $scope.updateLead = () => {
            $scope.leadLimit += 5;
        }
        myService.fetchPlanInfo($scope.userData.id, (data) => {
            $scope.isShowLoad = false;
            $scope.plan = null;
            $scope.leads = [];
            $scope.material = [];
            if (data.status == 1) {
                $scope.leads = data.data.leads;
                $scope.plan = data.data.planinfo;
                console.log($scope.plan);
                $scope.materials = data.data.material;
                if ($scope.materials == undefined) {
                    $scope.materials = [];
                } else {
                    $scope.materials = data.data.material;
                    for (let material of $scope.materials) {
                        material.product_name = fetchservice.removeSpeciolChar(material.product_name);
                    }

                }
                // remaining product can be upload
                $scope.noOfProd = new Array(parseInt($scope.plan.pages));

                // getting month from duration
                let month = parseInt($scope.plan.duration.split(" ")[0]);

                // plan kb s kb tk
                $scope.initialDate = new Date($scope.plan.plan_update_date);
                $scope.expireDate = new Date($scope.initialDate);
                $scope.expireDate.setMonth($scope.expireDate.getMonth() + month);

                // check whether plan expired or not
                $scope.isExpired = false;
                let currentDate = new Date();
                if (currentDate == $scope.expireDate) {
                    $scope.isExpired = true;
                }
            } else {
                console.log(data.data);
            }

        })

    }
    $scope.setUserData = (data, type) => {
        switch (type) {
            case "blog":
                fetchservice.setFullBlog(data);
                break;
            case "project":
                fetchservice.setFullProject(data);
                break;
            case 'dessertation':
                fetchservice.setDessertation(data);
                break;
            case 'portfolio':
                fetchservice.setPortfolio(data);
                break;
            case 'thesis':
                fetchservice.setThesis(data);
                break;
            case 'thesis_report':
                fetchservice.setThesisReport(data);
                break;
            default:
                console.log('default');
        }
    }
    $scope.delHimself = (id) => {
        var isDel = confirm("Are you syre to delete your compelete profile or work");
        if (isDel) {
            myService.deleteHim(id, (data) => {
                if (data.status) {
                    $scope.$parent.user.clearData();
                    window.location.href = "./";
                }
            });
        }
    }
    $scope.delete = (id, tableName) => {
        var isDel = confirm("Are you syre to delete");
        if (isDel) {
            myService.delete(id, tableName, (data) => {
                console.log(data);
                if (data.status) {
                    alert("you have succefully delete");
                    window.location.href = './dashboard';
                } else {
                    alert("Not deleted");
                }
            });
        }
    }
})
app.controller("newsletterController", ($scope, myService, $timeout) => {
    console.log("newsletterController");
    $scope.showSuccess = false;
    $scope.showError = false;
    var data = {};

    function clearForm() {
        form = document.getElementById("subscriberForm");
        form.reset();

        nameField = document.getElementById("name");
        nameField.classList.add('ng-pristine', 'ng-untouched', 'ng-empty', 'ng-invalid', 'ng-invalid-required');
        nameField.classList.remove('ng-not-empty', 'ng-dirty', 'ng-valid-parse', 'ng-valid', 'ng-valid-required', 'ng-touched');

        emailField = document.getElementById("email");
        emailField.classList.add('ng-pristine', 'ng-untouched', 'ng-empty', 'ng-invalid', 'ng-invalid-required');
        emailField.classList.remove('ng-not-empty', 'ng-dirty', 'ng-valid-parse', 'ng-valid', 'ng-valid-required', 'ng-touched');
    }

    $scope.subscribe = () => {
        data.name = $scope.name;
        data.email = $scope.email;

        myService.subscribeNewsletter(data, (response) => {
            $scope.message = response.message;
            if (response.status) {
                $scope.showSuccess = true;
                clearForm();
                $timeout(function() {
                    $('#newsletterModal').modal('hide');
                    $scope.showSuccess = false;
                }, 5000);
            } else {
                $scope.showError = true;
                clearForm();
                $timeout(function() {
                    $scope.showError = false;
                }, 5000);
            }
        });
    }
})
app.controller("getQouteController", ($scope) => {
    $scope.isGetActive = true;
    $scope.getChange = () => {
        $scope.isGetActive = !$scope.isGetActive;
    }
})
app.controller("getQuotePageCtrl", ($rootScope) => {
    $rootScope.hideGetQuoteButton();
})
app.controller("editController", (user, myService, validationService, $scope, $rootScope) => {
    console.log($rootScope.userData);
    $scope.name = $rootScope.userData.username;
    $scope.profession = $rootScope.userData.profession;
    $scope.validatePortfolioFile = (img) => {
        var ext = ['png', 'jpeg', 'jpg'];
        return validationService.validPortfolio(img, ext);
    }
    $scope.onSubmit = (form) => {
        let editData = {};
        editData.profile = $scope.portfolioFile;
        editData.profession = $scope.profession;
        editData.name = $scope.name;
        editData.id = $rootScope.userData.id;
        myService.updateUser(editData, (data) => {
            if (data.status == "ok") {
                alert("you have succesfully updated. Login to See Changes");
                user.clearData();
                window.location.href = "./";
            } else {
                alert("Error");
            }
        })
    }
})
app.controller('userProfileController', ($scope, $route, myService) => {
    $scope.username = $route.current.params.username;
    $scope.isDataFound = false;
    $scope.getProfileData = () => {
        myService.getUserProfile($scope.username).then(
            (resp) => {
                console.log(resp);
                if (resp.status) {
                    $scope.user = resp.data;
                    $scope.isDataFound = true;
                    $scope.getUserData();
                    $scope.incrementViews();
                } else {
                    $scope.isDataFound = false;
                }
            },
            (err) => {
                console.log(err);
                $scope.isDataFound = false;
            }
        );
    }
    $scope.getProfileData();
    $scope.incrementViews = () => {
        myService.incrementUserviews($scope.user.user_id).then(
            (resp) => {
                console.log(resp);
            },
            (err) => {
                console.log(err);
            }
        );
    }
    $scope.getUserData = () => {
        myService.fetchUserData1($scope.user.user_id).then(
            (resp) => {
                const response = resp;
                delete response['payLeads'];
                $scope.keys = Object.keys(response);
                for(key in response) {
                    const arrayOfObj = response[key];
                    for(let obj of arrayOfObj) {
                        obj.myCategory = key;
                        if (key === 'projects') {
                            var images = obj.view3d_img ? obj.view3d_img.split(',') : [];
                            obj.mainImage = images.length > 1 ? images[0] : obj.view3d_img;
                            obj.myTitle = obj.project_name;
                            obj.fullUrl = `./full-project/${obj.project_id}/${encodeURIComponent(obj.project_name)}`;
                            obj.imgPath = `uploads/${obj.mainImage}`;
                        }
                        if (key === 'blogs') {
                            obj.mainImage = obj.blog_file;
                            obj.myTitle = obj.heading;
                            obj.fullUrl = `./blogs/${obj.blog_id}/${encodeURIComponent(obj.heading)}`;
                            obj.imgPath = `upload-file/${obj.blog_file}`;
                        }
                        if (key === 'dessertations') {
                            obj.mainImage = '';
                            obj.myTitle = obj.dessertation_name;
                            obj.fullUrl = `./full-dissertation/${obj.dessertation_id}/${obj.dessertation_college}/${encodeURIComponent(obj.myTitle)}`;
                            obj.imgPath = `image/pdf-icon.png`;
                        }
                        if (key === 'portfolios') {
                            obj.mainImage = '';
                            obj.myTitle = obj.portfolio_name;
                            obj.fullUrl = `./full-portfolio/${obj.portfolio_id}/${encodeURIComponent(obj.myTitle)}`;
                            obj.imgPath = `image/pdf-icon.png`;
                        }
                        if (key === 'thesis_reports') {
                            obj.mainImage = '';
                            obj.myTitle = obj.thesis_report_name;
                            obj.fullUrl = `./full-thesis-report/${obj.thesis_report_id}/${encodeURIComponent(obj.myTitle)}`;
                            obj.imgPath = `image/pdf-icon.png`;
                        }
                        if (key === 'thesises') {
                            var images = obj.casestudy ? obj.casestudy.split(',') : [];
                            obj.mainImage = images.length > 1 ? images[0] : obj.casestudy;
                            obj.myTitle = obj.thesis_title;
                            obj.fullUrl = `./full-thesis/${obj.thesis_id}/${encodeURIComponent(obj.myTitle)}`;
                            obj.imgPath = `uploads/${obj.mainImage}`;
                        }
                    }
                }
                $scope.data = [];
                $scope.category = ''
                $scope.keys.forEach(key => {
                    $scope.data = [...$scope.data, ...response[key]];
                });
                $scope.userData = $scope.data;
                console.log('$scope.data', $scope.data);
                $scope.setCategory = (category) => {
                    console.log(category);
                    if (!category) {
                        $scope.category = 'All' 
                        $scope.data = $scope.userData
                        return;
                    }
                    $scope.category = category;
                    $scope.data = $scope.userData.filter(el => el.myCategory === $scope.category);
                    console.log('$scope.data', $scope.data);
                }
            },
            (err) => {
                console.log(err);
            }
        );
    }
});
app.controller("fetchImageController", (fetchservice, $scope) => {
    if ($scope.$parent.isShowViewImage) {
        $scope.images = fetchservice.getImages();
    }
    console.log($scope.$parent.isShowViewImage);
});


app.controller("materialController", (myService, $scope, $http, mailService) => {
    let materialObj = {};
    $scope.options = [];
    $http.get("js/category.json")
        .then((resp) => {
            let items = resp.data;
            for (let obj of items) {
                $scope.options = $scope.options.concat(obj.subItem);
            }
        }, (err) => console.log(err));
    $scope.onsubmit = (form) => {
        materialObj.product_name = $scope.product_name;
        materialObj.area = $scope.area;
        materialObj.budget = $scope.budget;
        materialObj.specification = $scope.specification;
        materialObj.email = $scope.email;
        materialObj.phone = $scope.phone;
        materialObj.locat = $scope.locat;
        materialObj.requirement = $scope.requirement;
        materialObj.mat_date = new Date();
        myService.uploadMaterial(materialObj, (data) => {
            console.log(data);
            if (data.status == "ok") {
                mailService.maileWhileGetQoute(materialObj.email, true);
                alert("Thank You ! We will reach you within 24hrs.");
            } else {
                alert("Error");
            }
            form.reset();
            window.location = "./";
        });
    }
})

/*architect controller*/
app.controller("architectController", (myService, $scope, mailService) => {
    $scope.service = "select service";
    architectData = {};
    $scope.onsubmit = (form) => {
        architectData.service = $scope.service;
        architectData.project_type = $scope.project_type;
        architectData.area = $scope.area;
        architectData.budget = $scope.budget;
        architectData.specification = $scope.specification;
        architectData.email = $scope.email;
        architectData.phone = $scope.phone;
        architectData.locat = $scope.locat;
        architectData.requirement = $scope.requirement;
        architectData.arc_date = new Date();
        myService.uploadArchitect(architectData, (data) => {
            if (data.status == "ok") {
                mailService.maileWhileGetQoute(architectData.email, false);
                alert("Thank You ! We will reach you within 24hrs.");
            } else {
                alert("Error");
            }
            form.reset();
            window.location = "./";
        })
    }
})

/*forgot controller*/
app.controller("forgotController", (myService, $scope) => {
    var forgotData = {};
    $scope.onSubmit = (form) => {
        forgotData.email = $scope.email;
        myService.forgotPassword(forgotData, (data) => {
            console.log(data);
            if (data.status == "ok") {
                alert("Please Check Your Email For Password Reset");
                window.location.href = "./login";
            } else {
                alert("Email Does Not Exist.Please Enter the Register Email ");
            }
        });
    }
})

/* forgot password */
app.controller("resetPasswordController", ($scope, myService, $route) => {
    $scope.onSubmit = (form) => {
        let id = $route.current.params.id;
        let hash = $route.current.params.hash;
        let password = $scope.password;
        myService.forgotPass({ id, password, hash }).then((res) => {
            if (res.data.status == "ok") {
                alert(res.data.message);
                window.location.href = "./login";
            } else {
                alert(res.data.message);
            }
        }, (err) => {
            alert("Error!please Contact to web Admin");
        });
    }
})

/*contact controller*/
app.controller("contactController", ($scope, myService) => {
    var contactData = {};
    $scope.onsubmit = (form) => {
        contactData.name = $scope.name;
        contactData.email = $scope.email;
        contactData.query = $scope.query;
        myService.contact(contactData, (data) => {
            if (data) {
                alert("Thank For Query.We will contact you soon");
                window.location.reload();
            } else {
                alert("not sent mail");
            }

        })
    }
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
    $scope.isShowMaterial = false;

    function fetchPro(data) {
        // console.log(data);
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
    $scope.myLimit = 1;

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

    function material(data) {
        if (data.status == 1 || data.status == 2) {
            $scope.materials = data.data;
        }
    }
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
            case 'material':
                $scope.isShowMaterial = true;
                material(data);
                break;
        }
    })
});

app.controller("materialUploadController", ($scope, $rootScope, myService, $http) => {
    $scope.isShowLoad = false;
    $http.get("js/category.json")
        .then((resp) => {
            $scope.items = resp.data;
            $scope.category = $scope.items[0];
            $scope.subcategory = $scope.category.subItem[0];
        }, (err) => console.log(err));
    $scope.images = [];
    $scope.remove = (index) => {
        $scope.productImages.splice(index, 1);
    }
    $scope.onMaterialSubmit = (form) => {
        $scope.isShowLoad = true;
        var materialData = {};
        materialData.proname = $scope.proname;
        materialData.website = $scope.website;
        materialData.cname = $scope.cname;
        materialData.specification = $scope.specification;
        materialData.category = $scope.category.item;
        materialData.catelogueImage = $scope.catalogueImage;
        // materialData.proimages = $scope.images
        materialData.clocation = $scope.clocation;
        materialData.subcategory = $scope.subcategory;
        materialData.abtproduct = $scope.abtproduct;
        materialData.price = $scope.price;
        materialData.id = $rootScope.userData.id;
        for (let image of $scope.productImages) {
            $scope.images.push(image.src);
        }
        /*Category CHanges fr URL Management*/
        materialData.category = materialData.category.split('/').join(' ');
        materialData.subcategory = materialData.subcategory.split('/').join(' ');
        myService.uploadMaterilas(materialData, $scope.images, (data) => {
            $scope.isShowLoad = false;
            if (data.status == "ok") {
                window.location.href = "./dashboard";
                alert("You Have Succesfullty Upload Material.");
            } else {
                alert(data.message);
                window.location.href = "./dashboard";
            }
        })
    }
});

// Subscribe and Magazine Controller
app.controller('eMagazine', ($scope, user, magazine, $http) => {
    userData = user.getSaveData();
    // For Subscribed User
    $http.get("./php/api/isUserHasSubscription.php?id= " + userData.id).then(function(response) {
        $scope.userReferralCode = response.data.referralCode;

        $http.get("./php/api/getUserEarning.php?id= " + userData.id).then(function(response) {
            if (response.data.status) {
                $scope.userReferralEarning = response.data.userEarning.amount;
            } else {
                $scope.userReferralEarning = 0;
            }
        });

        if (response.data.status) {
            $http.get("./php/api/getEMagazines.php").then(function(response) {
                $scope.emagazines = response.data.magazines;
            });
            $scope.isUserHasSubscription = true;
            $scope.showPlans = false;
        } else {
            $scope.isUserHasSubscription = false;
            $scope.showPlans = true;
        }
    });



    // User Who does not Subscribed
    $http.get("https://geoip-db.com/json/").then(function(response1) {
        $scope.ip = response1.data.country_name;
        if ($scope.ip == 'India') {
            $scope.currency = 'INR';
        } else {
            $scope.currency = 'USD';
        }
    });

    $scope.durations = ['6 Months', '1 Year', '2 Year'];
    $scope.setPrice = (selectedDurationVal) => {
        if ($scope.currency == 'INR') {
            switch (selectedDurationVal) {
                case '1':
                    $scope.duration = '6 Months';
                    $scope.price = 500;
                    break;
                case '2':
                    $scope.duration = '1 Year';
                    $scope.price = 700;
                    break;
                case '3':
                    $scope.duration = '2 Year';
                    $scope.price = 1200;
                    break;
                default:
                    $scope.duration = null;
            }
        } else if ($scope.currency == 'USD') {
            switch (selectedDurationVal) {
                case '1':
                    $scope.duration = '6 Months';
                    $scope.price = '10';
                    break;
                case '2':
                    $scope.duration = '1 Year';
                    $scope.price = '12';
                    break;
                case '3':
                    $scope.duration = '2 Year';
                    $scope.price = '15';
                    break;
                default:
                    $scope.duration = null;
            }
        }
    }

    $scope.subcribe = function() {
        subscriptionData = {};
        subscriptionData.currency = $scope.currency;
        subscriptionData.price = $scope.price;
        subscriptionData.duration = $scope.duration;
        subscriptionData.user_id = userData.id;

        magazine.setSubscriptionData(subscriptionData);

        window.location.href = './confirm-magazine-subscription';
    }

    $scope.setEMagazine = (emagazine) => {
        magazine.setEMagazine(emagazine);
    }
});

app.controller('showEMagazine', ($scope, magazine, $http, $sce, $routeParams) => {
    $scope.emagazine = magazine.getEMagazine();
    var currentId = $routeParams.id;
    if ($scope.emagazine == null || $scope.emagazine == undefined) {
        $http.get("./php/api/getEMagazine.php?id= " + currentId).then(function(response) {
            $scope.emagazine = response.data.magazine;
            $scope.emagazine.uploaded_on = new Date($scope.emagazine.uploaded_on), 'dd/MM/yyyy';
            $scope.url = $sce.trustAsResourceUrl("./upload-file/magazines/" + $scope.emagazine.magazine);
        });
    } else {
        $scope.emagazine.uploaded_on = new Date($scope.emagazine.uploaded_on), 'dd/MM/yyyy';
        $scope.url = $sce.trustAsResourceUrl("./upload-file/magazines/" + $scope.emagazine.magazine);
    }
});

app.controller('confirmationEMagazine', ($scope, magazine, $http, $timeout) => {
    $scope.showConfirmation = true;

    $scope.showPrice = true;
    $scope.showForm = false;

    $scope.subscriptionData = {};
    $http.get('./php/api/getUserEmail.php').then((response) => {
        $scope.subscriptionData = magazine.getSubscriptionData();
        $scope.subscriptionData.email = response.data;
        $scope.subscriptionData.referred_by = null;

        // Details For Transactions
        $scope.options = {
            'key': 'rzp_live_KxFKnliPsz7jNN',
            'amount': parseInt($scope.subscriptionData.price) * 100,
            'currency': $scope.subscriptionData.currency,
            'name': '',
            'description': 'Pay for Magazine Subscription',
            'image': '',
            'handler': function(transaction) {
                $scope.transactionHandler(transaction);
            },
            'prefill': {
                'name': '',
                'email': $scope.subscriptionData.email,
                'contact': ''
            }
        };
    });

    $scope.showApplyReferralForm = () => {
        $scope.showPrice = false;
        $scope.showForm = true;
    }

    $scope.hideApplyReferralForm = () => {
        $scope.showPrice = true;
        $scope.showForm = false;
    }

    $scope.applyCode = function(referralCode) {
        magazine.applyReferral(referralCode, (response) => {
            if (response.status) {
                $scope.subscriptionData.oldPrice = $scope.subscriptionData.price;
                $scope.subscriptionData.price = $scope.subscriptionData.price - (parseInt($scope.subscriptionData.price) * 10) / 100;

                $scope.subscriptionData.referred_by = response.data.user_id;

                $scope.showSuccess = true;
                $scope.message = response.message;

                $scope.showPrice = true;
                $scope.showForm = false;

            } else {
                $scope.showError = true;
                $scope.message = response.message;

                $timeout(function() {
                    $scope.showError = false;
                    $scope.showPrice = true;
                    $scope.showForm = false;
                }, 3000);
            }
        })
    }

    $scope.subscribe = function() {
        // Payment Gateway
        $.getScript('https://checkout.razorpay.com/v1/checkout.js', function() {
            var rzp1 = new Razorpay($scope.options);
            rzp1.open();
        });

        // To be removed
        // $scope.subscriptionData.order_id = 'payment_id0012';
        // $scope.isShowLoad = true;
        // magazine.subscribe($scope.subscriptionData, (response) => {
        // 	console.log(response);
        // 	if (response.status == true) {
        // 		$scope.showConfirmation = false;
        // 		$scope.showSuccess = true;
        // 		$scope.message = "Successfully Subscribed. Redirecting to E-Magazine. Your Order ID is " + 'payment_id0012';
        // 		$timeout(function () { $scope.redirect('./e-magazines'); }, 6000);
        // 	} else {
        // 		$scope.showConfirmation = false;
        // 		$scope.showError = true;
        // 		$scope.message = "Something goes wrong. Please try after sometime";
        // 		$timeout(function () { $scope.redirect('./e-magazines'); }, 3000);
        // 	}
        // })
    };

    // Function After Transactions completed
    $scope.transactionHandler = (transaction) => {
        $scope.subscriptionData.order_id = transaction.razorpay_payment_id;
        $scope.isShowLoad = true;
        magazine.subscribe($scope.subscriptionData, (response) => {
            if (response.status == true) {
                $scope.showConfirmation = false;
                $scope.showSuccess = true;
                $scope.message = "Successfully Subscribed. Redirecting to E-Magazine. Your Order ID is " + transaction.razorpay_payment_id;
                $timeout(function() { $scope.redirect('./e-magazines'); }, 6000);
            } else {
                $scope.showConfirmation = false;
                $scope.showError = true;
                $scope.message = "Something goes wrong. Please try after sometime";
                $timeout(function() { $scope.redirect('./e-magazines'); }, 3000);
            }
        })
    }

    $scope.redirect = function(route) {
        window.location.href = route;
    }
})