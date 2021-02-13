app.controller('homeController', ($scope, homeService, $timeout) => {
    // console.log("i am in hoem controller");
    $scope.sections = [{ name: "Blogs", hoverText: "Get upto date with current topics in Architecture & design", link: "/blog" }, { name: 'Competitions', hoverText: "Participate in the ongoing Architecture & Design competitions", link: '/competitions' }, { name: "Student Work", hoverText: "Inspire through the works of Students all over the globe", link: '/studentwork' }];

    $scope.blogSections = [{ src: 'image/open-book.png', heading: 'Blogs', description: 'Find Valuable Resources', link: '/blog', linkText: 'Go to blog' }, { src: 'image/open-book.png', heading: 'Project Helper', description: 'Looking for help in project', link: '/project-helper', linkText: 'Go to project helper' }, { src: 'image/open-book.png', heading: 'Courses', description: 'Lokking for online courses', link: '/courses', linkText: 'Go to courses' }, { src: 'image/open-book.png', heading: 'Magazine', description: 'Subscribe to yearly magazine', link: '/e-magazines', linkText: 'Suscribe now' }]
    homeService.getMaterial(0, 3).then((res) => {
        $scope.homeMaterials = res.data.data.map((obj) => {
            newObj = {};
            newObj.src = "upload-file/" + obj.product_image.split(',')[0];
            newObj.name = obj.product_name;
            let url = obj.product_name.replace(/\//g, "or");
            url = url.replace(/ /g, "-");
            newObj.url = `material/${obj.material_upload_id}/${url}`
            return newObj;
        });
        // console.log($scope.homeMaterials);
    }, (err) => console.log(err));
    homeService.getProjects(0, 3).then(
        (res) => {
            // console.log(res.data);
            $scope.homeProjects = res.data.data.map((obj) => {
                newObj = {};
                newObj.src = 'uploads/' + obj.site_image.split(',')[0];
                newObj.name = obj.project_name;
                let url = obj.project_name.replace(/\//g, "or");
                url = url.replace(/ /g, "-");
                newObj.url = `full-project/${obj.project_id}/${url}`
                return newObj;
            });
            console.log($scope.homeProjects);
        },
        (err) => {
            console.log(err);
        }
    )
    homeService.getCompetitions(0, 3).then(
        (resp) => {
            // console.log(resp);
            $scope.competitions = resp.data.data;
            // console.log($scope.competition);
        },
        (err) => {
            console.log(err);
        }
    );
    // show modal
    $timeout(function() {
        const path = window.location.pathname;
        if (path.indexOf('login') === -1) {
            $('#newsletterModal').modal('show');
        }
    }, 4000);

})