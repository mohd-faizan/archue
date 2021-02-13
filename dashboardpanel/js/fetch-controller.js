app.controller("myHomeController", ($scope, fetchservice) => {
    fetchservice.fetchPro((data) => {
        // for array of project shown into home
        $scope.myProjectsArr = [];
        // project object 
        $scope.myProjects = {
            mainImage: "",
            url: "",
            approve: "",
            images: [],
            mainData: {}
        };
        //for carousel images
        $scope.singleProjectImages = [];
        $scope.singleProject = {
            image: "",
            projectname: ""
        };
        if (data.status == "yes") {
            $scope.projects = data.data;
            for (let project of $scope.projects) {
                $scope.singleProject.image = fetchservice.fetchOneImage(project.site_image);
                $scope.singleProject.projectname = project.project_name;
                $scope.singleProjectImages.push($scope.singleProject);
                $scope.myProjects.mainImage = fetchservice.fetchOneImage(project.view3d_img);
                $scope.myProjects.images = $scope.myProjects.images.concat(fetchservice.convertToArrImages(project.site_image));
                $scope.myProjects.images = $scope.myProjects.images.concat(fetchservice.convertToArrImages(project.floor_image));
                $scope.myProjects.images = $scope.myProjects.images.concat(fetchservice.convertToArrImages(project.elevation_image));
                $scope.myProjects.images = $scope.myProjects.images.concat(fetchservice.convertToArrImages(project.section_image));
                $scope.myProjects.images = $scope.myProjects.images.concat(fetchservice.convertToArrImages(project.view3d_img));
                $scope.myProjects.mainData = project;
                $scope.myProjects.approve = project.project_approve;
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

    });
    $scope.setFullProject = (project) => {
        fetchservice.setFullProject(project);
    }
    $scope.setImages = (images) => {
        fetchservice.setImages(images);
        $scope.$parent.isShowViewImages();
    }

    $scope.isShowApprove = true;
    $scope.isShowUnApprove = () => {
        $scope.isShowApprove = false;
    }
    $scope.isShowsApprove = () => {
        $scope.isShowApprove = true;
    }

    $scope.fetchFeedback = (id) => {
        $scope.isShowFeed = true;
        $scope.projectId = id;
    }
    $scope.close = () => {
        $scope.isShowFeed = false;
    }
})

app.controller("projectsController", ($route, $scope, fetchservice) => {
    fetchservice.fetchPro((data) => {
        // console.log(data);
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
            $scope.singleProject.image = fetchservice.fetchOneImage(project.site_image);
            $scope.singleProject.projectname = project.project_name;
            $scope.singleProjectImages.push($scope.singleProject);
            $scope.myProjects.category = project.project_type;
            $scope.myProjects.mainImage = fetchservice.fetchOneImage(project.site_image);
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
    });
    $scope.setFullProject = (project) => {
        fetchservice.setFullProject(project);
    }
    $scope.categories = ["Adaptive Reuse", "Building Services design", "Cultural Architecture", "Transports", "Urban Design/Planning",
        "Commercial Architecture", "Educational and Research Center", "Greens Building",
        "Healthcare Architecture", "Interiors Design", "Industrial Design", "indexustrial and Infrastructure",
        "Landscape Design", "Mixed-use Architecture", "Recreational Architecture", "Office Building", "Housing Residential", "Sports",
        "Residential and Housing", "Public Facilities and Infrastructure", "Recreational Architecture", "Religious", "Interior/exterior Design",
        "Landscape Architecture", "sports Architecture", "Urban Design", "Hotels/Motel/Resort/Leisure", "Institutional"
    ];
    $scope.category = " ";
    $scope.setCategory = (cat) => {
        $scope.category = cat;
    }

})
app.controller("fullProjectController", ($location, deleteService, $scope, fetchservice) => {
    // console.log($routeParams.projectid);
    $scope.fullProject = fetchservice.getFullProject();
    /*console.log($scope.fullProject.mainData.site_image);*/
    $scope.siteImages = fetchservice.convertToArrImages($scope.fullProject.mainData.site_image);
    $scope.floorImages = fetchservice.convertToArrImages($scope.fullProject.mainData.floor_image)
    $scope.elevationImages = fetchservice.convertToArrImages($scope.fullProject.mainData.elevation_image)
    $scope.sectionImages = fetchservice.convertToArrImages($scope.fullProject.mainData.section_image)
    $scope.view3dImages = fetchservice.convertToArrImages($scope.fullProject.mainData.view3d_img)
        /*console.log($scope.siteImages);*/
    $scope.setImages = (images) => {
        fetchservice.setImages(images);
        $scope.$parent.isShowViewImages();
    }
    $scope.approve = (id) => {
        deleteService.approveProject(id, (data) => {
            if (data.status == "ok") {
                // console.log(data.data);
                alert("succefully approved");
                window.location.href = "./projects"
            } else {
                alert("Erro! not approved ");
            }
        });
    }
    $scope.del = (id) => {
        var isDel = confirm("Do you want to delete");
        if (isDel) {
            deleteService.delete(id, (data) => {
                if (data.status == "ok") {
                    alert("succesfully deleted");
                    $location.path('./projects');
                } else {
                    alert("error found");
                }
            });
        } else {
            console.log("no deleted");
        }
    }
})
app.controller("projectFeedCtrl", ($scope, fetchservice) => {
    fetchservice.fetchProFeed($scope.$parent.projectId, (data) => {
        $scope.feedbacks = [];
        if (data.status == "ok") {
            $scope.feedbacks = data.data;
        }

    });
})


app.controller("fetchUploadedMaterialCtrl", ($scope, fetchservice, addToHomeScreenService, removeFromHomeScreenService, deleteService) => {
    fetchservice.fetchUploadedMaterial((data) => {
        console.log(data);
        if (data.status == "ok") {
            $scope.uploadedMaterials = data.data;
        } else {
            $scope.uploadedMaterials = [];
        }
    });
    $scope.setMaterial = (material) => {
            fetchservice.setMat(material);
        }
        /*Add or Remove Material from Home screen*/
    $scope.addToHomeScreen = (id) => {
        addToHomeScreenService.addToHomeScreen(id, (data) => {
            if (data) {
                alert('Material has been added to Home screen');
                window.location.reload();
            } else {
                alert('Something went wrong. Please try after sometime');
                window.location.reload();
            }
        });
    }
    $scope.removeFromHomeScreen = (id) => {
        removeFromHomeScreenService.removeFromHomeScreen(id, (data) => {
            if (data) {
                alert('Material has been removed Home screen');
                window.location.reload();
            } else {
                alert('Something went wrong. Please try after sometime');
                window.location.reload();
            }
        });
    }

    $scope.deleteMaterial = (id) => {
        var deleteConfirmation = confirm("Are You Sure ?");
        if (deleteConfirmation) {
            deleteService.deleteMaterial(id, (resp) => {
                if (resp.status == 'ok') {
                    window.location.reload();
                } else {
                    alert("Please Try after some time !");
                }
            })
        }
    }
})
app.controller("fullMaterialCtrl", ($scope, fetchservice) => {
    $scope.uploadedMaterial = fetchservice.getMat();
})

/*portfolio */
app.controller("fetchPortfolioController", ($scope, fetchservice) => {
        fetchservice.fetchPortfolio((data) => {
            if (data.status == "yes") {
                $scope.portfolios = data.data;
                for (let portfolio of $scope.portfolios) {
                    portfolio.url = portfolio.portfolio_name.split("/").join("or");
                    portfolio.url = portfolio.url.split(" ").join("or");
                }
            }
        });
        $scope.setportfolio = (portfolio) => {
            fetchservice.setPortfolio(portfolio);
        }

        $scope.isShowApprove = true;
        $scope.isShowUnApprove = () => {
            $scope.isShowApprove = false;
        }
        $scope.isShowsApprove = () => {
            $scope.isShowApprove = true;
        }
    })
    /*full portfolio constroller*/
app.controller("fullPortfolioController", (deleteService, $sce, $scope, fetchservice) => {
    $scope.portfolio = fetchservice.getPortfolio();
    // let file = $scope.portfolio.portfolio_file.split(" ");

    $scope.url = $sce.trustAsResourceUrl("https://docs.google.com/gview?url=https://archue.com/upload-file/" +
        $scope.portfolio.portfolio_file +
        "&embedded=true");
    var fd = new FormData();
    fd.append('id', $scope.portfolio.portfolio_id);

    $scope.del = (id) => {
        var isDel = confirm("Do you want to delete");
        if (isDel) {
            deleteService.deletePortfolio(id, (data) => {
                if (data.status == "ok") {
                    alert("succesfully deleted");
                    window.location.href = "./portfolio";
                } else {
                    alert("not deleted");
                }
            });
        } else {
            console.log("do not delete portfolio");
        }
    }
    $scope.approve = (id) => {
        deleteService.approvePortfolio(id, (data) => {
            if (data.status == "ok") {
                alert("succefully approved");
                window.location.href = "./portfolio";
            } else {
                alert("Erro! not approved ");
            }
        });
    }
})

app.controller("fetchThesisReportController", (fetchservice, $scope) => {
        fetchservice.fetchThesisReport(0, 15, (data) => {
            console.log(data);
            if (data.status == "yes") {
                $scope.common_thesis_reports = data.data;
            }
        });
        $scope.setThesisReport = (theisReport) => {
            fetchservice.setThesisReport(theisReport);
        }

        $scope.isShowApprove = true;
        $scope.isShowUnApprove = () => {
            $scope.isShowApprove = false;
        }
        $scope.isShowsApprove = () => {
            $scope.isShowApprove = true;
        }
    })
    /*full thesis report controller */
app.controller("fullThesisReportCtrl", (deleteService, $sce, $scope, fetchservice) => {
    $scope.thesis_report = fetchservice.getThesisReport();
    $scope.url = $sce.trustAsResourceUrl("../upload-file/" + $scope.thesis_report.thesis_report_file);
    $scope.getTrustUrl = () => {
        return "../uplaod-file/" + $sce.trustAsResourceUrl($scope.thesis_report.thesis_report_file);
    }
    $scope.del = (id) => {
        var isDel = confirm("Do you want to delete");
        if (isDel) {
            deleteService.deleteThesisReport(id, (data) => {
                if (data.status == "ok") {
                    alert("deleted succesfully");
                    window.location.href = "./thesis-report";
                } else {
                    alert("not deleted ");
                }
            })
        }
    }
    $scope.approve = (id) => {
        deleteService.approveThesisReport(id, (data) => {
            if (data.status == "ok") {
                alert("succefully approved");
                window.location.href = "./thesis-report";
            } else {
                alert("Erro! not approved ");
            }
        });
    }
})

/*dessertation controller*/
app.controller("fetchDessertController", ($scope, fetchservice) => {
        fetchservice.fetchDessertation((data) => {
            if (data.status == "yes") {
                $scope.dessertations = data.data;
                for (let dessertation of $scope.dessertations) {
                    dessertation.url = dessertation.dessertation_name.replace(/\//g, "or");
                    dessertation.url = dessertation.url.replace(/ /g, "or");
                }
            }
        });
        $scope.setDessertation = (dessertation) => {
            fetchservice.setDessertation(dessertation);
        }

        $scope.isShowApprove = true;
        $scope.isShowUnApprove = () => {
            $scope.isShowApprove = false;
        }
        $scope.isShowsApprove = () => {
            $scope.isShowApprove = true;
        }
    })
    /* full dessertation controller */
app.controller("fetchFullDessert", (deleteService, $sce, $scope, fetchservice) => {
    $scope.dessertation = fetchservice.getDessertation();
    console.log($scope.dessertation);
    $scope.url = $sce.trustAsResourceUrl("https://docs.google.com/gview?url=https://archue.com/upload-file/" +
        $scope.dessertation.dessertation_file +
        "&embedded=true");
    $scope.del = (id) => {
        var isDel = confirm("Do you want to delete");
        if (isDel) {
            deleteService.deleteDessertation(id, (data) => {
                if (data.status == "ok") {
                    alert("deleted");
                    window.location.href = "./dessertation";
                } else {
                    alert("not deleted something going wrong");
                }
            })
        } else {
            console.log("not deleted");
        }
    }
    $scope.approve = (id) => {
        deleteService.approveDessertation(id, (data) => {
            if (data.status == "ok") {
                alert("succefully approved");
                window.location.href = "./dessertation";
            } else {
                alert("Erro! not approved ");
            }
        });
    }
})

/*fetch student projects*/
app.controller("studentWorkController", ($scope, fetchservice) => {
    // console.log(data);
    // for array of project shown into home
    $scope.myStudentProjectsArr = [];
    // project object 
    $scope.myStudentProjects = {
        mainImage: "",
        images: [],
        mainData: {}
    };
    //for carousel images
    $scope.singleStudentProjectImages = [];
    $scope.singleStudentProject = {
        image: "",
        projectname: ""
    };
    fetchservice.fecthStudentWork((data) => {
        if (data.status == "yes") {
            $scope.studentWorkProjects = data.data;
            for (let project of $scope.studentWorkProjects) {
                $scope.singleStudentProject.image = fetchservice.fetchOneImage(project.site_image);
                $scope.singleStudentProject.projectname = project.project_name;
                $scope.singleStudentProjectImages.push($scope.singleStudentProject);
                $scope.myStudentProjects.mainImage = fetchservice.fetchOneImage(project.site_image);
                $scope.myStudentProjects.images = $scope.myStudentProjects.images.concat(fetchservice.convertToArrImages(project.site_image));
                $scope.myStudentProjects.images = $scope.myStudentProjects.images.concat(fetchservice.convertToArrImages(project.floor_image));
                $scope.myStudentProjects.images = $scope.myStudentProjects.images.concat(fetchservice.convertToArrImages(project.elevation_image));
                $scope.myStudentProjects.images = $scope.myStudentProjects.images.concat(fetchservice.convertToArrImages(project.section_image));
                $scope.myStudentProjects.images = $scope.myStudentProjects.images.concat(fetchservice.convertToArrImages(project.view3d_img));
                $scope.myStudentProjects.mainData = project;
                $scope.myStudentProjectsArr.push($scope.myStudentProjects);
                // for emptying $scope.myProjects
                $scope.myStudentProjects = {
                    mainImage: "",
                    images: [],
                    mainData: {}
                };
                $scope.singleStudentProject = {
                    image: "",
                    projectname: ""
                };
            }
        }
    });
    $scope.category = "";
    $scope.setCategory = (cat) => {
        $scope.category = cat;
    }
})

/*blog fetched*/
app.controller("fetchBlogController", ($sce, fetchservice, $scope) => {
    fetchservice.fetchBlog((data) => {
        if (data.status == "yes") {
            $scope.blogs = data.resp;
            for (let blog of $scope.blogs) {
                blog.url = blog.heading.replace(/\//g, "or");
                blog.url = blog.url.replace(/ /g, "-");
                blog.url = encodeURI(blog.url);
            }
        } else {
            console.log(data.resp);
        }
    });
    $scope.trust = (html) => {
        return $sce.trustAsHtml(html);
    }
    $scope.setBlog = (blog) => {
        fetchservice.setFullBlog(blog);
    }

    $scope.isShowApprove = true;
    $scope.isShowsApprove = () => {
        $scope.isShowApprove = true;
    }
    $scope.isShowUnApprove = () => {
        $scope.isShowApprove = false;
    }
})
app.controller("fullBlogController", ($sce, $scope, fetchservice, deleteService) => {
        $scope.blog = fetchservice.getBlog();

        /* Get Comments Of This Blog */
        fetchservice.fetchCommentsOfBlog($scope.blog.blog_id, (data) => {
            console.log(data);
            if (data.status == 'Ok') {
                $scope.commentsOfBlog = data.data;
            }
        })

        $scope.trust = (html) => {
            return $sce.trustAsHtml(html);
        }
        $scope.del = (id) => {
            var isDel = confirm("Do You Want To delete the blog");
            if (isDel == true) {
                deleteService.deleteBlog(id, (data) => {
                    alert("you have succesfully deleted");
                    window.location.href = './blogs';
                });
            } else {
                console.log("not deleted");
            }
        }

        $scope.approve = (id) => {
            deleteService.approveBlog(id, (data) => {
                if (data.status == "ok") {
                    alert("succefully approved");
                    window.location.href = "./blogs";
                } else {
                    alert("Erro! not approved ");
                }
            });
        }
        $scope.edit = (id) => {
            window.location.href = './' + id + '/edit-blog';
        }
    })
    /* Fetch Blog Comments */
app.controller("fetchBlogCommentsController", (fetchservice, $scope) => {
    fetchservice.fetchBlogComments((data) => {
        if (data.status == "yes") {
            $scope.commentsWithBlog = data.data;

            for (let commentWithBlog of $scope.commentsWithBlog) {
                commentWithBlog.blog.url = commentWithBlog.blog.heading.replace(/\//g, "or");
                commentWithBlog.blog.url = commentWithBlog.blog.url.replace(/ /g, "-");
                commentWithBlog.blog.url = encodeURI(commentWithBlog.blog.url);
                console.log($scope.commentsWithBlog);
            }
        } else {
            console.log("Error while Fetching Blogs Comment !!")
        }
    });

    $scope.setBlog = (blog) => {
        fetchservice.setFullBlog(blog);
    }

    $scope.isShowApprove = true;
    $scope.isShowsApprove = () => {
        $scope.isShowApprove = true;
    }
    $scope.isShowUnApprove = () => {
        $scope.isShowApprove = false;
    }

    $scope.deleteBlogComment = (comment_id) => {
        var fd = new FormData();
        fd.append('comment_id', comment_id);
        var delConfirmation = confirm("Are you sure ?");
        if (delConfirmation) {
            fetchservice.deleteBlogComment(fd, (data) => {
                if (data.status == 'ok') {
                    window.location.href = "./blog-comments";
                }
            })
        }
    }
    $scope.approveBlogComment = (comment_id) => {
        var fd = new FormData();
        fd.append('comment_id', comment_id);
        fetchservice.approveBlogComment(fd, (data) => {
            if (data.status == 'ok') {
                window.location.href = "./blog-comments";
            }
        })
    }
})

/*fetch thesis*/
app.controller("fetchThesisController", ($scope, fetchservice) => {
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
        fetchservice.fetchThesis((data) => {
            console.log(data);
            for (let thesis of data) {
                singleThesis.file = fetchservice.fetchOneImage(thesis.casestudy);
                singleThesis.file_name = thesis.thesis_title.replace(/\//g, "-");
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
            }

            $scope.isShowApprove = true;
            $scope.isShowsApprove = () => {
                $scope.isShowApprove = true;
            }
            $scope.isShowUnApprove = () => {
                $scope.isShowApprove = false;
            }
        });
        $scope.categories = ["Adaptive Reuse", "Building Services design", "Cultural Architecture", "Transports", "Urban Design/Planning",
            "Commercial Architecture", "Educational and Research Center", "Greens Building",
            "Healthcare Architecture", "Interiors Design", "Industrial Design", "indexustrial and Infrastructure",
            "Landscape Design", "Mixed-use Architecture", "Recreational Architecture", "Office Building", "Housing Residential", "Sports",
            "Residential and Housing", "Public Facilities and Infrastructure", "Recreational Architecture", "Religious", "Interior/exterior Design",
            "Landscape Architecture", "sports Architecture", "Urban Design", "Hotels/Motel/Resort/Leisure", "Institutional"
        ];
        $scope.category = "";
        $scope.setCategory = (cat) => {
            $scope.category = cat;
        }
        $scope.setThesis = (x) => {
            fetchservice.setThesis(x);
        }
    })
    /*fetch full Thesis*/
app.controller("fullThesisController", (deleteService, $scope, fetchservice) => {
    $scope.thesis = fetchservice.getThesis();
    $scope.setImages = (images) => {
        fetchservice.setImages(images);
        $scope.$parent.isShowViewImages();
    }
    $scope.approve = (id) => {
        deleteService.approveThesis(id, (data) => {
            if (data.status == "ok") {
                alert("succesfully approved");
            } else {
                alert("error");
            }
        })
    }
    $scope.del = (id) => {
        var isDel = confirm("do you want delete");
        if (isDel) {
            deleteService.deleteThesis(id, (data) => {
                if (data.status == "ok") {
                    alert("deleted succesfully");
                    window.location.href = "./thesis";
                } else {
                    alert("not deleted");
                }
            })
        } else {
            console.log("not deleted");
        }
    }

})

/*fetch events*/
app.controller('eventsController', ($scope, fetchservice, $sce) => {
    fetchservice.getEvents((data) => {
        $scope.events = data.data;
    })
    $scope.trust = (data) => {
        return $sce.trustAsHtml(data);
    }
    $scope.setEvent = (event) => {
        fetchservice.setEvent(event);
    }

    $scope.isShowApprove = true;
    $scope.isShowUnApprove = () => {
        $scope.isShowApprove = false;
    }
    $scope.isShowsApprove = () => {
        $scope.isShowApprove = true;
    }
})
app.controller("fullEventController", ($sce, fetchservice, $scope, deleteService) => {
    $scope.event = fetchservice.getEvent();
    $scope.sanitize = (html) => {
        return $sce.trustAsHtml(html);
    }
    $scope.del = (id) => {
        var isDel = confirm("Do You Want To delete this event!");
        if (isDel == true) {
            deleteService.deleteEvent(id, (data) => {
                alert("you have succesfully deleted");
                window.location.href = './events';
            });
        } else {
            console.log("not deleted");
        }
    }
    $scope.approve = (id) => {
        deleteService.approveEvent(id, (data) => {
            if (data.status == "ok") {
                alert("succefully approved");
                window.location.href = "./events";
            } else {
                alert("Erro! not approved ");
            }
        });
    }
})

/*fetch jobs*/
app.controller("fetchJobController", ($sce, fetchservice, $scope) => {
    fetchservice.fetchJob((data) => {
        if (data.status == "yes") {
            $scope.jobs = data.data;
        } else {
            console.log("error in jobs");
        }
    })
    $scope.sanitize = (html) => {
        return $sce.trustAsHtml(html);
    }
    $scope.setJob = (job) => {
        fetchservice.setJob(job);
    }

    $scope.isShowApprove = true;
    $scope.isShowUnApprove = () => {
        $scope.isShowApprove = false;
    }
    $scope.isShowsApprove = () => {
        $scope.isShowApprove = true;
    }
})
app.controller("fullJobController", ($sce, fetchservice, $scope, deleteService) => {
    $scope.job = fetchservice.getJob();
    $scope.sanitize = (html) => {
        return $sce.trustAsHtml(html);
    }
    $scope.del = (id) => {
        var isDel = confirm("Do You Want To delete this Job!");
        if (isDel == true) {
            deleteService.deleteJob(id, (data) => {
                alert("you have succesfully deleted");
                window.location.href = './jobs';
            });
        } else {
            console.log("not deleted");
        }
    }

    $scope.approve = (id) => {
        deleteService.approveJob(id, (data) => {
            if (data.status == "ok") {
                alert("succefully approved");
                window.location.href = "./jobs";
            } else {
                alert("Erro! not approved ");
            }
        });
    }
})

/*fetch competitor*/
app.controller("fetchCompetitionController", ($sce, fetchservice, $scope) => {
    fetchservice.fetchCompetitor((data) => {
        if (data.status == "yes") {
            $scope.competitions = data.data;
        } else {
            console.log("error in competitor");
        }
    })
    $scope.sanitize = (html) => {
        return $sce.trustAsHtml(html);
    }
    $scope.setCompetition = (comp) => {
        fetchservice.setCompetitor(comp);
    }

    $scope.isShowApprove = true;
    $scope.isShowUnApprove = () => {
        $scope.isShowApprove = false;
    }
    $scope.isShowsApprove = () => {
        $scope.isShowApprove = true;
    }
})
app.controller("fullCompController", (fetchservice, $sce, $scope, deleteService) => {
    $scope.competition = fetchservice.getCompetition();
    $scope.sanitize = (html) => {
        return $sce.trustAsHtml(html);
    }
    $scope.del = (id) => {
        var isDel = confirm("Do You Want To delete this Competition!");
        if (isDel == true) {
            deleteService.deleteComp(id, (data) => {
                alert("you have succesfully deleted");
                window.location.href = './competitions';
            });
        } else {
            console.log("not deleted");
        }
    }

    $scope.approve = (id) => {
        deleteService.approveCompetition(id, (data) => {
            if (data.status == "ok") {
                alert("succefully approved");
                window.location.href = "./competitions";
            } else {
                alert("Erro! not approved ");
            }
        });
    }
})

/*Architect Controller*/
app.controller("architectController", (fetchservice, $scope, saveData, deleteService) => {
    fetchservice.fetchArchitect((data) => {
        if (data.status == "ok") {
            $scope.architects = data.data
        } else {
            console.log("error");
        }
    });
    $scope.cToExcel = () => {
        saveData.converToExcel($scope.architects);
    }
    $scope.delete = (id) => {
        var isDel = confirm("Are you sure to delete?");
        if (isDel) {
            console.log("deleted");
            deleteService.deleteArchitect(id).then((res) => {
                if (res.data.status == "ok") {
                    alert("Succefully deleted.");
                    window.location.href = "./architect";
                } else {
                    alert("Error! Not deleted.");
                    window.location.href = "./architect";
                }
            }, (err) => {
                alert("Server Error! Not deleted.");
                console.log(err);
            });
        } else {
            console.log("not deleted");
        }
    }
})

app.controller("materialRequestController", ($scope, fetchservice, saveData, deleteService) => {
    fetchservice.fetchMaterial((data) => {
        if (data.status == "ok") {
            $scope.materials = data.data;
        } else {
            console.log("error");
        }
    });
    $scope.cToExcel = () => {
        saveData.converToExcel($scope.materials);
    }
    $scope.delete = (id) => {
        var isDel = confirm("Are you sure to delete?");
        if (isDel) {
            console.log("deleted");
            deleteService.deleteMaterialReq(id).then((res) => {
                if (res.data.status == "ok") {
                    alert("Succefully deleted.");
                    window.location.href = "./material-request";
                } else {
                    alert("Error! Not deleted.");
                    window.location.href = "./material-request";
                }
            }, (err) => {
                alert("Server Error! Not deleted.");
                console.log(err);
            });
        } else {
            console.log("not deleted");
        }
    }
})

/* Fetch User */
app.controller("usersController", ($scope, fetchservice, saveData) => {
    $scope.myUserLimit = 15;
    $scope.initial = 0;
    $scope.isThroughLead = '';
    $scope.professions = ["Architect", "Architecture Student", "Interior Designer", "Others"];
    $scope.userCategory = '';
    fetchservice.fetchUsers((data) => {
        if (data.status == "ok") {
            $scope.users = data.data;
            for (let user of $scope.users) {
                user.user_date = new Date(user.user_date);
            }
        } else {
            console.log("error");
        }
    })
    $scope.increaseUserLimit = () => {
        $scope.initial++;
        $scope.myUserLimit += 5;
    }
    $scope.decreaseUserLimit = () => {
        if ($scope.initial > 0) {
            $scope.initial--;
            $scope.myUserLimit -= 5;
        }
    }
    $scope.delUser = (id) => {
        var isDel = confirm("Are you sure to delete. It will delete all the data uploaded by this user");
        if (isDel) {
            fetchservice.deleteUser(id, (data) => {
                if (data.status) {
                    // saveData.clearData();
                    window.location.href = "./users";
                }
            })
        }
    }
    $scope.cToExcel = () => {
        if ($scope.isThroughLead) {
            const filtered = $scope.users.filter(val => val.throughLead);
            saveData.converToExcel(filtered);
        } else {
            saveData.converToExcel($scope.users);
        }
    }

})

//
app.controller('leadsController', ($scope, fetchservice) => {
    $scope.leads = [];
    $scope.myLimit = 15;
    $scope.increaseUserLimit = () => {
        $scope.myLimit += 5;
    }
    fetchservice.fetchLeads().then(
        (res) => {
            $scope.leads = res.data.data;
            if ($scope.leads && $scope.leads.length > 0) {
                $scope.leads = $scope.leads.map((val) => {
                    val.expectedStartTime = new Date(val.expectedStartTime);
                    return val;
                });
            }
        },
        (err) => {
            console.log(err);
        }
    );
    $scope.dellead = (id) => {
        const isDelete = confirm('Are you sure you want to delete the lead?');
        if (isDelete) {
            fetchservice.deleteLead(id).then(
                (resp) => {
                    window.location.href = "./leads";
                },
                (err) => {
                    console.log(err);
                }
            );
        }
    }
})