/*fetch events*/
app.controller("fetchEventsController", ($sce, fetchservice, $scope) => {
    $scope.limit = 15;
    $scope.active = 1;
    $scope.skip = 0;
    $scope.fetchEvents = (skip, limit) => {
        fetchservice.fetchEvents(skip, limit, (data) => {
            console.log(data);
            if (data.status == "yes") {
                $scope.events = data.data;
                for (let event of $scope.events) {
                    event.event_name = fetchservice.removeSpeciolChar(event.event_name)
                }
            } else {
                alert("please contact the website owner");
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

    $scope.fetchEvents(0, $scope.limit);

    $scope.toPage = (index) => {
        if ($scope.active === index) {
            return;
        }
        $scope.skip = index * $scope.limit - $scope.limit;
        $scope.fetchEvents($scope.skip, $scope.limit);
        $scope.active = index;
    }
    $scope.next = () => {
        $scope.active = $scope.active + 1;
        $scope.skip = $scope.active * $scope.limit - $scope.limit;
        $scope.fetchEvents($scope.skip, $scope.limit);
    }
    $scope.prev = () => {
        $scope.active = $scope.active - 1;
        $scope.skip = $scope.active * $scope.limit - $scope.limit;
        $scope.fetchEvents($scope.skip, $scope.limit);
    }
    $scope.saintize = (html) => {
        return $sce.trustAsHtml(html);
    }
    $scope.setEvent = (event) => {
        fetchservice.setEvent(event);
    }
    $scope.increaseLike = (id) => {
        if ($scope.$parent.user.isLoggedIn()) {
            fetchservice.increaseLikeEvent(id).then(
                (res) => {
                    console.log(res);
                    $scope.fetchEvents($scope.skip, $scope.limit);
                },
                (err) => {
                    console.log(err);
                }
            );
        } else {
            const url = window.location.pathname;
            localStorage.setItem('backTo', url);
            $scope.$parent.location.path("/login");
        }
    }
})
app.controller("fullEventController", async($sce, fetchservice, $scope, $routeParams, ngMeta) => {
        $scope.fetchEvent = () => {
            fetchservice.fetchSingleEvent($routeParams.id, (data) => {
                console.log("single event", data);
                if (data.status == "yes") {
                    // $scope.events = data.data;
                    // fetchservice.getOneFromArrObj($routeParams.id, $scope.events, (resp) => {
                    $scope.event = data.data;
                    $scope.event.event_name = fetchservice.removeSpeciolChar($scope.event.event_name);
                    $scope.event.event_content = $sce.trustAsHtml($scope.event.event_content);
                    // $scope.event.event_name = $scope.event.event_name.replace(/ /g,"-");
                    // $scope.event.event_name = $scope.event.event_name.replace(/\//g,"-");
                    // $scope.event.event_name = $scope.event.event_name.replace("|","-");
                    /* Get text from Html content with Tag */
                    function stripHtml(html) {
                        // Create a new div element
                        var temporalDivElement = document.createElement("div");

                        // Set the HTML content with the providen
                        temporalDivElement.innerHTML = html;

                        // Retrieve the text property of the element (cross-browser support)
                        return temporalDivElement.textContent || temporalDivElement.innerText || "";
                    }

                    /* Title of the Page as Title of the Project */
                    ngMeta.setTitle($scope.event.event_name, '');
                    ngMeta.setTag('description', stripHtml($scope.event.event_content));
                    ngMeta.setTag('url', 'https://www.archue.com/event/' + $scope.event.event_id + '/' + $scope.event.event_name);
                    ngMeta.setTag('image', 'https://www.archue.com/upload-file/' + $scope.event.event_file);
                    // });
                } else {
                    alert("please contact the website owner");
                }
            });
        }
        let next = await fetchservice.getNextPrevEvent($routeParams.id, true);
        let prev = await fetchservice.getNextPrevEvent($routeParams.id, false);
        if (prev.data.status) {
            $scope.prev = prev.data.data;
            $scope.$apply();
        }
        if (next.data.status) {
            $scope.nxt = next.data.data;
            $scope.$apply();
        }
        $scope.fetchEvent();
        $scope.increaseLike = () => {
            if ($scope.$parent.user.isLoggedIn()) {
                fetchservice.increaseLikeEvent($routeParams.id).then(
                    (res) => {
                        console.log(res);
                        $scope.fetchEvent();
                    },
                    (err) => {
                        console.log(err);
                    }
                );
            } else {
                const url = window.location.pathname;
                localStorage.setItem('backTo', url);
                $scope.$parent.location.path("/login");
            }
        }
        $scope.increaseViews = (id) => {
            fetchservice.increaseViewsEvent(id).then(
                (res) => {
                    console.log(res);
                    $scope.fetchEvent();
                },
                (err) => {
                    console.log(err);
                }
            );
        }
        $scope.increaseViews($routeParams.id);

    })
    /*events controller */
app.controller("eventsController", (validationService, uploadService, $scope) => {
        $scope.fontsize = [8, 9, 10, 11, 12, 14, 16, 18, 20, 22, 24, 26, 28, 36, 48, 72]
        $scope.event_category = "Select Category";
        let eventData = {};
        $scope.isLoad = false;
        $scope.validatePortfolioFile = (file) => {
            ext = ['jpeg', 'jpg', 'png'];
            return validationService.validPortfolio(file, ext);
        };
        $scope.submitBlog = () => {
            $scope.isLoad = true;
            eventData.event_content = $scope.myBlog;
            eventData.event_name = $scope.event_name;
            eventData.event_category = $scope.event_category;
            eventData.eventor_name = $scope.eventor_name;
            eventData.event_file = $scope.portfolioFile;
            let fd = new FormData();
            for (let i in eventData) {
                fd.append(i, eventData[i]);
            }
            uploadService.uploadEvent(fd, (data) => {
                console.log(data);
                if (data.status == "ok") {
                    $scope.isLoad = false;
                    window.location.href = "./events";
                } else {
                    $scope.isLoad = false;
                    alert(data.message);
                }
            });
        };
    })
    /*job controller*/