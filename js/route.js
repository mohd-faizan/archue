app.config(($routeProvider, $locationProvider) => {
    $routeProvider
    /* ============== Home Page ============== */
        .when("/", {
            templateUrl: "pages/home.php",
            data: {
                meta: {
                    'title': 'Archue – A complete Architecture Platform',
                    'keywords': 'Architecture Design,Architecture,Architect,Buildings,Design,Architecture Magzine',
                    'description': 'Archue: A complete architecture platform: A platform covering architecture news, projects, portfolios, reports, case studies and products. ',
                }
            }
        })
        .when("/leads", {
            templateUrl: "pages/leads.php",
            data: {
                meta: {
                    'title': 'Archue – A complete Architecture Platform',
                    'keywords': 'Architecture Design,Architecture,Architect,Buildings,Design,Architecture Magzine',
                    'description': 'Archue: A complete architecture platform: A platform covering architecture news, projects, portfolios, reports, case studies and products. ',
                }
            }
        })
        .when("/buy-now", {
            templateUrl: "pages/buy-now.php",
            data: {
                meta: {
                    'title': 'Archue – A complete Architecture Platform',
                    'keywords': 'Architecture Design,Architecture,Architect,Buildings,Design,Architecture Magzine',
                    'description': 'Archue: A complete architecture platform: A platform covering architecture news, projects, portfolios, reports, case studies and products. ',
                }
            }
        })
        .when("/pay", {
            templateUrl: "php/payement-gateway/pay.php",
            data: {
                meta: {
                    'title': 'Archue – A complete Architecture Platform',
                    'keywords': 'Architecture Design,Architecture,Architect,Buildings,Design,Architecture Magzine',
                    'description': 'Archue: A complete architecture platform: A platform covering architecture news, projects, portfolios, reports, case studies and products. ',
                }
            }
        })
        /* ============== Projects and Full Project ============== */
        .when("/project", {
            templateUrl: "pages/project.php",
            data: {
                meta: {
                    'title': 'Archue - Architecture Projects',
                    'description': 'Best architecture works designed by the world leading architects.',
                    'keywords': 'Architecture, Architecture Projects, Architecture Design, Best Architects, Design, Residential Projects ,Commercial Projects,Projects'
                }
            }
        })
        .when("/full-project/:projectid/:projectname", {
            templateUrl: "pages/full-project.php"
        })

    /* ============== Materials and and Single Material ============== */
    .when("/materials/:category/:subcategory", {
            templateUrl: "pages/materials.php",
            data: {
                meta: {
                    'title': 'Archue - Material',
                    'description': 'Find among thousands of Architectural Product, Construction Materials for the designing of Buildings. Choose and compare between different construction materials. Connect with thousands of Building Material Supplier.',
                    'keywords': 'Construction Material, Construction Materials, Construction Material for Buildings, Architecture Material, Sustainable Architecture Materials, Building Material Suppliers, Building Material Construction'
                }
            }
        })
        .when("/material/:id/:name", {
            templateUrl: "pages/material.php"
        })

    /* **************** Start of Student Corner **************** */

    /* ============== Thesises and Single Thesis ============== */
    .when("/thesis", {
            templateUrl: "pages/thesis.php",
            data: {
                meta: {
                    'title': 'Archue - Architecture Thesis',
                    'keywords': 'Thesis, Architecture Thesis, Architecture Thesis Projects, Architecture Thesis Proposals, Undergraduate Architecture Thesis Projects, Best Architecture Thesis, Architecture Graduation Project Ideas',
                    'description': 'See the best architecture thesis, Architecture thesis proposals among the various top architecture colleges/institutions of the world'
                }
            }
        })
        .when("/full-thesis/:id/:name", {
            templateUrl: "pages/full-thesis.php"
        })

    /* ============== Portfolios and Single Portfolio ============== */
    .when("/portfolio", {
            templateUrl: "pages/portfolio.php",
            data: {
                meta: {
                    'title': 'Archue - Architecture Portfolio',
                    'keywords': 'Portfolio,Architecture Portfolio,Architecture Portfolio Ideas,Architecture Portfolio Cover Page,Building Case Study,',
                    'description': 'See the best architecture portfolio, architecture portfolio ideas& Case Studies of the various buildings, projects, Heritage etc',
                }
            }
        })
        .when("/full-portfolio/:id/:college/:name", {
            templateUrl: "pages/full-portfolio.php",
            data: {
                meta: {
                    'image': 'https://www.archue.com/image/pdf-icon.png',
                    'description': 'See the best architecture portfolio, architecture portfolio ideas& Case Studies of the various buildings, projects, Heritage etc'
                }
            }
        })

    /* ============== Dissertations and Single Dissertation ============== */
    .when("/dissertation", {
            templateUrl: "pages/dissertation.php",
            data: {
                meta: {
                    'title': 'Archue - Architecture Dissertation',
                    'keywords': 'Architecture Dissertation, Architecture Dissertation Synopsis, Architecture Report Topics, Architecture Dissertation Topics, Dissertation',
                    'description': 'See the best architecture dissertations and reports, also dissertation topics from the thousand of works done around the globe'
                }
            }
        })
        .when("/full-dissertation/:id/:college/:name", {
            templateUrl: "pages/full-dissertation.php",
            data: {
                meta: {
                    'image': 'https://www.archue.com/image/pdf-icon.png',
                    'description': `See the best architecture dissertations and reports, also dissertation topics from the thousand of 
					works done around the globe`
                }
            }
        })

    /* ============== Thesis Reports and Single Thesis Report ============== */
    .when("/thesis-report", {
            templateUrl: "pages/thesis-report.php",
            data: {
                meta: {
                    'title': 'Archue - Thesis Report',
                    'keywords': 'Thesis Report, Architecture Thesis Report, Architecture Thesis Projects, Architecture Thesis Proposals, Undergraduate Architecture Thesis Projects',
                    'Description': 'See the best architecture thesis reports, Architecture thesis proposals among the various top architecture colleges/institutions of the world'
                }
            }
        })
        .when("/full-thesis-report/:id/:college/:name", {
            templateUrl: "pages/full-thesis-report.php",
            data: {
                meta: {
                    'image': 'https://www.archue.com/image/pdf-icon.png',
                }
            }
        })

    /* ============== Student Works ============== */
    .when("/studentwork", {
            templateUrl: "pages/studentwork.php",
            data: {
                meta: {
                    'title': 'Archue - Student Projects',
                    'description': 'Best architecture works designed by the world leading architects.',
                    'keywords': 'Architecture,Architecture Projects,Architecture Design,Best Architects,Design,	Residential Projects ,Commercial Projects,Projects'
                }
            }
        })
        /* **************** End of Student Corner **************** */

    /* ============== Blogs and Single Blog ============== */
    .when("/blog", {
            templateUrl: "pages/blog.php",
            data: {
                meta: {
                    'title': 'Archue - Blog',
                    'keywords': 'Blogs,Architecture Blogs,Architectural Digest,What Is Architecture ,Interior design blogs,Tumble,Architectural engineering',
                    'description': 'Publish and remain updated with the architecture blogs around the globe with the emerging issues in architecture.'
                }
            }
        })
        .when("/blogs/:id/:name", {
            templateUrl: 'pages/full-blog.php'
        })

    /* **************** Start of Upload **************** */

    /* ============== Upload Page ============== */
    .when("/upload", {
        resolve: {
            check: ($location, user) => {
                if (!user.isLoggedIn()) {
                    $location.path("./login");
                }
            }
        },
        templateUrl: "pages/upload.php",
        data: {
            meta: {
                'title': 'Archue - Upload',
                'description': 'Upload Architecture Projects, Thesis, Blogs, Thesis Report, Dissertations and let your ideas shared to the world.',
                'keywords': 'Architecture Publish Platform, Architectural Works Upload, Thesis Upload, Project Upload, Best Platform, to publish architecture Works'
            }
        }
    })

    /* ============== Project Upload ============== */
    .when("/project-upload", {
        resolve: {
            check: ($location, user) => {
                if (!user.isLoggedIn()) {
                    $location.path("/");
                }
            }
        },
        templateUrl: "pages/upload-pages/project-upload.php"
    })

    /* ============== Portfolio Upload ============== */
    .when("/portfolio-upload", {
        resolve: {
            check: ($location, user) => {
                if (!user.isLoggedIn()) {
                    $location.path("/");
                }
            }
        },
        templateUrl: "pages/upload-pages/portfolio-upload.php"
    })

    /* ============== Thesis Upload ============== */
    .when("/thesis-upload", {
        resolve: {
            check: ($location, user) => {
                if (!user.isLoggedIn()) {
                    $location.path("/");
                }
            }
        },
        templateUrl: "pages/upload-pages/thesis-upload.php"
    })

    /* ============== Post Upload ============== */
    .when("/post-blog", {
        resolve: {
            check: ($location, user) => {
                if (!user.isLoggedIn()) {
                    $location.path("/");
                }
            }
        },
        templateUrl: "pages/upload-pages/post-blog.php"
    })

    /* ============== Dessertation Upload ============== */
    .when("/dissertation-upload", {
        resolve: {
            check: ($location, user) => {
                if (!user.isLoggedIn()) {
                    $location.path("/");
                }
            }
        },
        templateUrl: "pages/upload-pages/dissertation-upload.php"
    })

    /* ============== Thesis Report Upload ============== */
    .when("/thesis-report-upload", {
            resolve: {
                check: ($location, user) => {
                    if (!user.isLoggedIn()) {
                        $location.path("/");
                    }
                }
            },
            templateUrl: "pages/upload-pages/thesis-report-upload.php"
        })
        /* **************** End of Upload **************** */

    /* ======= Magazines =======*/

    .when("/subscribe-e-magazine", {
            templateUrl: "pages/subscribe-e-magazine.php",
            data: {
                meta: {
                    'title': 'Archue - E-Magazine',
                    'keywords': 'architecture, competition, competitions, competitive, architects, architect, charrette, deadlines, event, events, jobs, architecture jobs, architect salary, architect placement.',
                    'description': 'Archue is all about architecture and architecture-related competitions, architecture events and architecture jobs.'
                }
            }
        })
        .when("/e-magazines", {
            loginRequired: true,
            templateUrl: "pages/e-magazines.php",
            data: {
                meta: {
                    'title': 'Archue - E-Magazine',
                    'keywords': 'architecture, competition, competitions, competitive, architects, architect, charrette, deadlines, event, events, jobs, architecture jobs, architect salary, architect placement.',
                    'description': 'Archue is all about architecture and architecture-related competitions, architecture events and architecture jobs.'
                }
            }
        })
        .when("/e-magazine/:id", {
            loginRequired: true,
            templateUrl: "pages/e-magazine.php",
            data: {
                meta: {
                    'title': 'Archue - E-Magazine',
                    'keywords': 'architecture, competition, competitions, competitive, architects, architect, charrette, deadlines, event, events, jobs, architecture jobs, architect salary, architect placement.',
                    'description': 'Archue is all about architecture and architecture-related competitions, architecture events and architecture jobs.'
                }
            }
        })

    .when("/confirm-magazine-subscription", {
        loginRequired: true,
        templateUrl: "pages/confirm-magazine-subscription.php",
        data: {
            meta: {
                'title': 'Archue - E-Magazine',
                'keywords': 'architecture, competition, competitions, competitive, architects, architect, charrette, deadlines, event, events, jobs, architecture jobs, architect salary, architect placement.',
                'description': 'Archue is all about architecture and architecture-related competitions, architecture events and architecture jobs.'
            }
        }
    })

    /* ======= Events, Single Event and Add Event =======*/
    .when("/events", {
            templateUrl: "pages/events.php",
            data: {
                meta: {
                    'title': 'Archue - Events',
                    'keywords': 'architecture, competition, competitions, competitive, architects, architect, charrette, deadlines, event, events, jobs, architecture jobs, architect salary, architect placement.',
                    'description': 'Archue is all about architecture and architecture-related competitions, architecture events and architecture jobs.'
                }
            }
        })
        .when("/event/:id/:name", {
            templateUrl: "pages/event.php",
            data: {
                meta: {
                    'description': 'Archue is all about architecture and architecture-related competitions, architecture events and architecture jobs.'
                }
            }
        })
        .when("/add-event", {
            templateUrl: "pages/add-event.php"
        })

    /* ======= Jobs, Single Job and Add Job =======*/
    .when("/jobs", {
            templateUrl: "pages/jobs.php",
            data: {
                meta: {
                    'title': 'Archue - Jobs',
                    'keywords': 'architecture, competition, competitions, competitive, architects, architect, charrette, deadlines, event, events, jobs, architecture jobs, architect salary, architect placement.',
                    'description': 'Archue is all about architecture and architecture-related competitions, architecture events and architecture jobs.'
                }
            }
        })
        .when("/job/:id/:name", {
            templateUrl: "pages/job.php",
            data: {
                meta: {
                    'description': 'Archue is all about architecture and architecture-related competitions, architecture events and architecture jobs.'
                }
            }
        })
        .when("/add-jobs", {
            templateUrl: "pages/add-jobs.php"
        })

    /* ======= Competitions, Single Competition and Add Competition =======*/
    .when("/competitions", {
            templateUrl: "pages/competitions.php",
            data: {
                meta: {
                    'title': 'Archue - Competitions',
                    'keywords': 'architecture, competition, competitions, competitive, architects, architect, charrette, deadlines, event, events, jobs, architecture jobs, architect salary, architect placement.',
                    'description': 'Archue is all about architecture and architecture-related competitions, architecture events and architecture jobs.'
                }
            }
        })
        .when("/competition/:id/:name", {
            templateUrl: "pages/competition.php",
            data: {
                meta: {
                    'description': 'Archue is all about architecture and architecture-related competitions, architecture events and architecture jobs.'
                }
            }
        })
        .when("/add-competition", {
            templateUrl: "pages/add-competition.php"
        })

    /* ======= Pertner With US =======*/
    .when("/partner-with-us", {
        resolve: {
            check: ($location, user) => {
                if (user.isLoggedIn()) {
                    $location.path("/dashboard");
                }
            }
        },
        templateUrl: "pages/partner-with-us.php",
        data: {
            meta: {
                'title': 'Archue - Partner with Us',
                'keywords': 'Seller, Supplier, Buyers, ​ selling, Sell on Archue, paid membership, MDC, Maximiser, buy leads, Archue Achievers, sell, online, products, grow, business',
                'description': 'Connect and start selling to millions of buyers across the world. Archue is one of the growing platform for architects,Interior,Designer,Contractors with a mission to provide a complete architecture solution to each and every person',
                'image': 'https://www.archue.com/image/logo.png'
            }
        }
    })

    /* ======= Login, Signup, Logout and Forgot Password =======*/
    .when("/login", {
            resolve: {
                check: ($location, user) => {
                    if (user.isLoggedIn()) {
                        $location.path("/dashboard");
                    }
                }
            },
            templateUrl: "pages/login.php",
            data: {
                meta: {
                    'title': 'Archue - Login',
                    'description': 'Archue login',
                    'title': 'archue login'

                }
            }
        })
        .when("/signup", {
            templateUrl: "pages/signup.php",
            data: {
                meta: {
                    'title': 'Archue - Sign Up',
                    'description': 'Signup and Be the part of Archue Family where ideas Matter.',
                    'keywords': 'Signup Archue, Signup',
                }
            }
        })
        .when("/forgot-password", {
            templateUrl: "pages/forgot-password.php"
        })
        .when("/reset-password/:id/:hash", {
            templateUrl: "pages/reset-password.php"
        })
        .when("/logout", {
            templateUrl: 'pages/logout.php',
            resolve: {
                deadResolve: ($location, user, $rootScope) => {
                    user.clearData();
                    $rootScope.isShow = false;
                    $rootScope.isButtonHide = true;
                    $location.path("/");
                }
            }
        })

    /* ======= Search Query Result Page =======*/
    .when("/search/:query/:type", {
        templateUrl: "pages/search.php"
    })

    /* ======= Dashboard Pages =======*/
    .when("/dashboard", {
            resolve: {
                check: ($location, user) => {
                    if (!user.isLoggedIn()) {
                        $location.path("/");
                    }
                }
            },
            templateUrl: "pages/dashboard.php"
        })
        .when("/edit-profile", {
            resolve: {
                check: ($location, user) => {
                    if (!user.isLoggedIn()) {
                        $location.path("./");
                    }
                },
            },
            templateUrl: "pages/edit-profile.php"
        })
        .when("/plan-info", {
            resolve: {
                check: ($location, user) => {
                    if (!user.isLoggedIn()) {
                        $location.path("./");
                    }
                }
            },
            templateUrl: "pages/plan-info.php"
        })

    /* ======= Contact Us =======*/
    .when("/contact", {
        templateUrl: "pages/contact-us.php",
        data: {
            meta: {
                'title': 'Archue - Contact Us',
                'description': 'Connect with us for any queries, issues and submissions.',
                'keywords': 'Contact Us, Contact Archue'
            }
        }
    })

    /* ======= Terms and Conditions =======*/
    .when("/terms-and-conditions", {
            templateUrl: "pages/terms-and-conditions.php",
            data: {
                meta: {
                    'title': 'Terms and Conditions'
                }
            }
        })
        .when("/getquote-materials", {
            templateUrl: "pages/getquote-materials.php",
            data: {
                meta: {
                    'title': 'Getquote material',
                    'description': 'getqoute material'
                }
            }
        })
        .when("/getquote-architecture", {
            templateUrl: "pages/getquote-architecture.php",
            data: {
                meta: {
                    'title': 'Looking for Architecture, Interior design and construction of your space ',
                    'description': 'Archue has completed thousands of projects across pan india .Get free consultation and qoutations for design of your space'
                }
            }
        })
        .when("/products/:category", {
            templateUrl: "pages/products.php",
            data: {
                meta: {
                    'title': 'Archue products'
                }
            }
        })
        .otherwise({
            templateUrl: "pages/404.php"
        })
    $locationProvider.html5Mode(true);
    $locationProvider.hashPrefix('!');
});
app.run(['$location', '$rootScope', 'ngMeta', 'user', '$window', function($location, $rootScope, ngMeta, user, $window) {
    ngMeta.init();

    // Login and Redirection
    var postLogInRoute;
    $rootScope.$on('$routeChangeStart', function(event, nextRoute, currentRoute) {

        //if login required and you're logged out, capture the current path
        if (nextRoute.loginRequired && (!user.isLoggedIn())) {
            postLogInRoute = $location.path();
            $window.location.href = './login?redirect=e-magazines';
        } else if (postLogInRoute && (!user.isLoggedIn())) {
            //once logged in, redirect to the last route and reset it
            $location.path(postLogInRoute).replace();
            postLogInRoute = null;
        }
    });
}]);