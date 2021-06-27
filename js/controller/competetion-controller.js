/*fetch competitor*/
app.controller("fetchCompetitionController", ($sce, fetchservice, $scope) => {
    $scope.limit = 15;
    $scope.active = 1;
    $scope.skip = 0;
    $scope.categories = ['Awards/Grants/Scholarships', 'International', 'Regional/National', 'Student/Young architects', 'Ideas/Virtual', 'Non-architectural', 'Call for papers/architects'];
    $scope.category = '';
    $scope.setCategory = (cat) => {
        $scope.category = cat;
    }
    $scope.fetchCompetetions = (skip, limit) => {
        fetchservice.fetchCompetitor(skip, limit, (data) => {
            console.log(data);
            if (data.status == "yes") {
                $scope.competitions = data.data;
                for (let competition of $scope.competitions) {
                    competition.competition_heading = fetchservice.removeSpeciolChar(competition.competition_heading);
                }
            } else {
                console.log("error in competitor");
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
        })
    }
    $scope.fetchCompetetions(0, $scope.limit);

    $scope.toPage = (index) => {
        if ($scope.active === index) {
            return;
        }
        $scope.skip = index * $scope.limit - $scope.limit;
        $scope.fetchCompetetions($scope.skip, $scope.limit);
        $scope.active = index;
    }
    $scope.next = () => {
        $scope.active = $scope.active + 1;
        $scope.skip = $scope.active * $scope.limit - $scope.limit;
        $scope.fetchCompetetions($scope.skip, $scope.limit);
    }
    $scope.prev = () => {
        $scope.active = $scope.active - 1;
        $scope.skip = $scope.active * $scope.limit - $scope.limit;
        $scope.fetchCompetetions($scope.skip, $scope.limit);
    }
    $scope.sanitize = (html) => {
        return $sce.trustAsHtml(html);
    }
    $scope.setCompetition = (comp) => {
        fetchservice.setCompetitor(comp);
    }
    $scope.increaseLike = (id) => {
        if ($scope.$parent.user.isLoggedIn()) {
            fetchservice.increaseLikeCompetition(id).then(
                (resp) => {
                    console.log(resp);
                    $scope.fetchCompetetions($scope.skip, $scope.limit);
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
app.controller("fullCompController", async function(fetchservice, $sce, $scope, $routeParams, ngMeta) {
    $scope.id = $routeParams.id;
    $scope.type = 'COMPETITION';
    $scope.getSimilarCompetitions = async (category, id) => {
        const similarsCompetitionsResp = await fetchservice.getSimilarCompetitions(category, id);
        console.log('similarsCompetitions', similarsCompetitionsResp);
        if (similarsCompetitionsResp.status == 'ok') {
            $scope.similarsCompetitions = similarsCompetitionsResp.data;
            for(const comp of $scope.similarsCompetitions) {
                comp.competition_heading = fetchservice.removeSpeciolChar(comp.competition_heading);
            }
        }
    }

    $scope.getOneCompetition = () => {
        fetchservice.fetchOneCompetitor($routeParams.id, (data) => {
            console.log("full compettion", data);
            if (data.status == "yes") {
                // $scope.competitions = data.data;
                // fetchservice.getOneFromArrObj($routeParams.id, $scope.competitions, (resp) => {
                $scope.competition = data.data;
                $scope.getSimilarCompetitions($scope.competition.competition_category, $scope.competition.competitor_id)
                $scope.competition.competitor_content = $sce.trustAsHtml($scope.competition.competitor_content);
                $scope.competition.competition_heading = fetchservice.removeSpeciolChar($scope.competition.competition_heading);

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
                ngMeta.setTitle($scope.competition.competition_heading, '');
                ngMeta.setTag('description', stripHtml($scope.competition.competitor_content));
                ngMeta.setTag('url', 'https://www.archue.com/competition/' + $scope.competition.competitor_id + '/' + $scope.competition.competition_heading);
                ngMeta.setTag('image', 'https://www.archue.com/upload-file/' + $scope.competition.competitor_file);
                // })
            } else {
                console.log("error in competitor");
            }
        })
    }

    $scope.getOneCompetition();
    let next = await fetchservice.getNextPrevCompetetor($routeParams.id, true);
    let prev = await fetchservice.getNextPrevCompetetor($routeParams.id, false);
    console.log(next, prev);
    if (prev.data.status) {
        $scope.prev = prev.data.data;
        $scope.$apply();
    }
    if (next.data.status) {
        $scope.nxt = next.data.data;
        $scope.$apply();
    }
    $scope.increaseLike = () => {
        if ($scope.$parent.user.isLoggedIn()) {
            fetchservice.increaseLikeCompetition($routeParams.id).then(
                (resp) => {
                    console.log(resp);
                    $scope.getOneCompetition();
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
        fetchservice.increaseViewsCompetition(id).then(
            (res) => {
                console.log(res);
                $scope.getOneCompetition();
            },
            (err) => {
                console.log(err);
            }
        );
    }
    $scope.increaseViews($routeParams.id);
})
    // material category controllers
    /*competition controller*/
app.controller("competitionController", (uploadService, validationService, $scope) => {
    $scope.isShowLoad = false;
    $scope.competitorData = {
        competition_heading: '',
        competition_category: '',
        competitor_sub_deadline: '',
        competitor_reg_deadline: '',
        competitor_name: '',
        competitor_file: '',
        competitor_content: '',
        advertise: false
    };
    $scope.minDate = getFormattedDate(new Date());
    $scope.categories = ['Awards/Grants/Scholarships', 'International', 'Regional/National', 'Student/Young architects', 'Ideas/Virtual', 'Non-architectural', 'Call for papers/architects'];
    $scope.validatePortfolioFile = (file) => {
        ext = ['jpeg', 'jpg', 'png'];
        return validationService.validPortfolio(file, ext);
    };
    $scope.submitBlog = () => {
        $scope.isShowLoad = true;
        $scope.competitorData.competitor_file = $scope.portfolioFile;
        $scope.competitorData.competitor_content = $scope.myBlog;
        let fd = new FormData();
        for (let i in $scope.competitorData) {
            fd.append(i, $scope.competitorData[i]);
        }
        uploadService.uploadCompetition(fd, (data) => {
            console.log(data);
            if (data.status == "ok") {
                $scope.isShowLoad = false;
                alert('You have uploaded competition successfully.');
                window.location.href = "./competitions"
            } else {
                $scope.isShowLoad = false;
                console.error('eror in com', data.message);
                alert(data.message);
            }
        })
    }
})