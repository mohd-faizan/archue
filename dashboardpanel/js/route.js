app.config(($routeProvider, $locationProvider) => {
    var myresolve = () => {
        return {
            "check": ($location, saveData) => {
                if (!saveData.isLoggedIn()) {
                    $location.path("./");
                }
            }
        }
    }
    $routeProvider
        .when("/", {
            templateUrl: "pages/login.php",
        })
        .when("/e-magazines", {
            resolve: myresolve(),
            templateUrl: "pages/e-magazines.php"
        })
        .when("/add-e-magazine", {
            resolve: myresolve(),
            templateUrl: "pages/add-e-magazine.php"
        })
        .when("/e-magazine/:id", {
            resolve: myresolve(),
            templateUrl: "pages/e-magazine.php"
        })
        .when("/projects", {
            resolve: myresolve(),
            templateUrl: "pages/projects.php"
        })
        .when("/project/:id/:name", {
            resolve: myresolve(),
            templateUrl: "pages/project.php"
        })
        .when("/blogs", {
            resolve: myresolve(),
            templateUrl: "pages/blogs.php"
        })
        .when("/blog/:id/:name", {
            resolve: myresolve(),
            templateUrl: "pages/blog.php"
        })
        .when('/:id/edit-blog', {
            resolve: myresolve(),
            templateUrl: "pages/edit-blog.php"
        })
        .when("/write-blog", {
            resolve: myresolve(),
            templateUrl: "pages/write-blog.php"
        })
        .when("/portfolio", {
            resolve: myresolve(),
            templateUrl: "pages/portfolio.php"
        })
        .when("/full-portfolio/:name", {
            resolve: myresolve(),
            templateUrl: "pages/full-portfolio.php"
        })
        .when("/thesis-report", {
            resolve: myresolve(),
            templateUrl: "pages/thesis-report.php"
        })
        .when("/full-thesis-report/:name", {
            resolve: myresolve(),
            templateUrl: "pages/full-thesis-report.php"
        })
        .when("/dessertation", {
            resolve: myresolve(),
            templateUrl: "pages/dissertation.php"
        })
        .when("/full-dessertation/:name", {
            resolve: myresolve(),
            templateUrl: "pages/full-dissertation.php"
        })
        .when("/thesis", {
            resolve: myresolve(),
            templateUrl: "pages/thesis.php"
        })
        .when("/full-thesis/:name", {
            resolve: myresolve(),
            templateUrl: "pages/full-thesis.php"
        })
        .when("/architect", {
            resolve: myresolve(),
            templateUrl: "pages/architect.php"
        })
        .when("/material-request", {
            resolve: myresolve(),
            templateUrl: "pages/material-request.php"
        })
        .when("/uploaded-material", {
            resolve: myresolve(),
            templateUrl: "pages/uploaded-material.php"
        })
        .when('/upload-lead', {
            resolve: myresolve(),
            templateUrl: 'pages/upload-lead.php'
        })
        .when('/edit-lead/:id', {
            resolve: myresolve(),
            templateUrl: 'pages/edit-lead.php'
        })
        .when('/leads', {
            resolve: myresolve(),
            templateUrl: 'pages/leads.php'
        })
        .when("/full-material/:id", {
            resolve: myresolve(),
            templateUrl: "pages/material.php"
        })
        // .when("/mymaterial",{
        // 	resolve:myresolve(),
        // 	templateUrl:"pages/material.php"
        // })
        .when("/events", {
            resolve: myresolve(),
            templateUrl: "pages/events.php"
        })
        .when("/event/:id/:name", {
            resolve: myresolve(),
            templateUrl: "pages/event.php"
        })
        .when("/jobs", {
            resolve: myresolve(),
            templateUrl: "pages/jobs.php"
        })
        .when("/job/:id/:name", {
            resolve: myresolve(),
            templateUrl: "pages/job.php"
        })
        .when("/competitions", {
            resolve: myresolve(),
            templateUrl: "pages/competitions.php"
        })
        .when("/competition/:id/:name", {
            resolve: myresolve(),
            templateUrl: "pages/competition.php"
        })
        .when("/blog-comments", {
            resolve: myresolve(),
            templateUrl: "pages/blog-comments.php"
        })
        .when("/search/:query/:type", {
            resolve: myresolve(),
            templateUrl: "pages/search.php"
        })
        .when("/logout", {
            resolve: {
                deadresolve: (saveData, $location) => {
                    saveData.clearData();
                    $location.path("./");
                }
            }
        })
        .when("/users", {
            resolve: myresolve(),
            templateUrl: "pages/users.php"
        })
        .when("/newsletter-users", {
            resolve: myresolve(),
            templateUrl: "pages/newsletter-users.php"
        })
        .otherwise({
            templateUrl: "pages/404.php"
        })
    $locationProvider.html5Mode(true);
});