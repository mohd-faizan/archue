app.controller("myHomeController", ($scope, fetchservice) => {
    fetchservice.fetchPro((data) => {
        console.log(data);
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
        if (data.status == "yes") {
            $scope.projects = data.data;
            for (let project of $scope.projects) {
                $scope.singleProject.image = fetchservice.fetchOneImage(project.view3d_img);
                $scope.singleProject.projectname = project.project_name;
                $scope.singleProjectImages.push($scope.singleProject);
                $scope.myProjects.mainImage = fetchservice.fetchOneImage(project.view3d_img);
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
    });
    $scope.setFullProject = (project) => {
        fetchservice.setFullProject(project);
    }
    $scope.setImages = (images) => {
        fetchservice.setImages(images);
        $scope.$parent.isShowViewImages();
    }
    $scope.myLimit = 1;
})



/*Fetch All Materials of a Category*/






/*fetch thesis report controller (In controller js root Controller) */