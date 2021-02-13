/*fetch student projects*/
app.controller("studentWorkController", ($scope, fetchservice) => {
    $scope.limit = 15;
    $scope.active = 1;
    $scope.fetchStudentWorks = (skip, limit) => {
        fetchservice.fecthStudentWork(skip, limit, (data) => {
            console.log("student work", data);
            // for array of project shown into home
            $scope.myStudentProjectsArr = [];
            // project object 
            $scope.myStudentProjects = {
                mainImage: "",
                url: "",
                images: [],
                mainData: {}
            };
            //for carousel images
            $scope.singleStudentProjectImages = [];
            $scope.singleStudentProject = {
                image: "",
                projectname: ""
            };
            if (data.status == "yes") {
                $scope.studentWorkProjects = data.data;
                for (let project of $scope.studentWorkProjects) {
                    $scope.singleStudentProject.image = fetchservice.fetchOneImage(project.view3d_img);
                    $scope.singleStudentProject.projectname = project.project_name;
                    $scope.singleStudentProjectImages.push($scope.singleStudentProject);
                    $scope.myStudentProjects.mainImage = fetchservice.fetchOneImage(project.view3d_img);
                    $scope.myStudentProjects.images = $scope.myStudentProjects.images.concat(fetchservice.convertToArrImages(project.site_image));
                    $scope.myStudentProjects.images = $scope.myStudentProjects.images.concat(fetchservice.convertToArrImages(project.floor_image));
                    $scope.myStudentProjects.images = $scope.myStudentProjects.images.concat(fetchservice.convertToArrImages(project.elevation_image));
                    $scope.myStudentProjects.images = $scope.myStudentProjects.images.concat(fetchservice.convertToArrImages(project.section_image));
                    $scope.myStudentProjects.images = $scope.myStudentProjects.images.concat(fetchservice.convertToArrImages(project.view3d_img));
                    $scope.myStudentProjects.mainData = project;
                    $scope.myStudentProjects.url = project.project_name.replace(/\//g, "or");
                    $scope.myStudentProjects.url = $scope.myStudentProjects.url.replace(/ /g, "-");
                    $scope.myStudentProjectsArr.push($scope.myStudentProjects);
                    // for emptying $scope.myProjects
                    $scope.myStudentProjects = {
                        mainImage: "",
                        url: "",
                        images: [],
                        mainData: {}
                    };
                    $scope.singleStudentProject = {
                        image: "",
                        projectname: ""
                    };
                }
                //console.log($scope.myStudentProjectsArr);
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
    $scope.fetchStudentWorks(0, $scope.limit);

    $scope.toPage = (index) => {
        if ($scope.active === index) {
            return;
        }
        const skip = index * $scope.limit - $scope.limit;
        $scope.fetchStudentWorks(skip, $scope.limit);
        $scope.active = index;
    }
    $scope.next = () => {
        $scope.active = $scope.active + 1;
        const skip = $scope.active * $scope.limit - $scope.limit;
        $scope.fetchStudentWorks(skip, $scope.limit);
    }
    $scope.prev = () => {
        $scope.active = $scope.active - 1;
        const skip = $scope.active * $scope.limit - $scope.limit;
        $scope.fetchStudentWorks(skip, $scope.limit);
    }
    $scope.category = "";
    $scope.setCategory = (cat) => {
        $scope.category = cat;
    }
})