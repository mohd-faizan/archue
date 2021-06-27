app.service("fetchservice", function($http) {

    this.removeSpeciolChar = (name) => {
        name = name.replace(/ /g, "-");
        name = name.replace(/\//g, "-");
        return name;
    }

    /*To Fetch Project*/
    this.fetchPro = (offset, limit, cb) => {
        $http({
                method: "POST",
                url: "php/fetch-project.php?offset=" + offset + "&limit=" + limit
            })
            .then((resp) => { cb(resp.data); }, (err) => console.log(err));
    }
    this.fetchOneImage = (image) => {
        return image.split(",").pop();
    }
    this.convertToArrImages = (images) => {
        if (images.split(",") == undefined) {
            return images;
        }
        return images.split(",");
    }
    this.setFullProject = (project) => {
        sessionStorage.setItem("fullProject", JSON.stringify(project));
    }
    this.getFullProject = () => {
        return JSON.parse(sessionStorage.getItem("fullProject"));
    }
    this.fetchSingleProject = (id, cb) => {
            $http({
                    method: "post",
                    url: "php/fetch-single-project.php?project_id=" + id,
                    headers: {
                        "Content-Type": undefined
                    }
                })
                .then((resp) => cb(resp.data), (err) => console.log(err));
        }
        /*similar projects */
    this.fetchSimilarThesisReport = (fd, cb) => {
        $http({
                method: "post",
                url: "php/fetch-similer-thesis-report.php",
                data: fd,
                headers: {
                    "Content-Type": undefined
                }
            })
            .then((resp) => cb(resp.data), (err) => console.log(err));
    }
    this.setImages = (images) => {
        localStorage.setItem("images", JSON.stringify(images));
    }
    this.getImages = () => {
        return JSON.parse(localStorage.getItem("images"));
    }

    /*Materials Fetching*/
    this.getAllMaterials = (offset, limit, fd, cb) => {
        $http({
            method: 'POST',
            url: 'php/getallmaterials.php?offset=' + offset + "&limit=" + limit,
            data: fd,
            headers: {
                'Content-Type': undefined
            }
        }).then((resp) => {
            cb(resp.data);
        }, (err) => {
            console.log(err);
        })
    }
    this.getOneMaterial = (fd, cb) => {
        $http({
            method: 'POST',
            url: 'php/getmaterial.php',
            data: fd,
            headers: {
                'Content-Type': undefined
            }
        }).then((resp) => {
            cb(resp.data);
        }, (err) => {
            console.log(err);
        })
    }
    this.increaseViewForMaterial = (id) => {
        return $http.get('./php/increment-view-material.php?id=' + id);
    }
    this.incrementLikesMaterial = (id) => {
        return $http.get('./php/increment-like-material.php?id=' + id);
    }
    this.setMaterial = (data) => {
        localStorage.setItem('material', JSON.stringify(data));
    }
    this.getMaterial = () => {
        return JSON.parse(localStorage.getItem('material'));
    }
    this.uploadMaterial = (cb) => {
        $http({
                method: "GET",
                url: "php/get-material-upload.php"
            })
            .then((resp) => cb(resp.data), (err) => console.log(err));
    }

    /*To Fetch Portfolio */
    this.fetchPortfolio = (offset, limit, cb) => {
        $http({
                method: "GET",
                url: "php/fetch-portfolio.php?offset=" + offset + "&limit=" + limit,
            })
            .then((resp) => cb(resp.data), (err) => console.log(err));
    }
    this.fetchOnePortfolio = (id, cb) => {
        $http({
                method: "GET",
                url: "php/fetch-one-portfolio.php?id=" + id,
            })
            .then((resp) => cb(resp.data), (err) => console.log(err));
    }
    this.increaseViewsPortfolio = (id) => {
        return $http.get('./php/increase-views-portfolio.php?id=' + id);
    }
    this.increaseViewsDessertation = (id) => {
        return $http.get('./php/increase-views-dessertation.php?id=' + id);
    }
    this.increaseLikeDessertation = (id) => {
        return $http.get('./php/increase-like-dessertation.php?id=' + id);
    }
    this.getOneThesisReport = (id, cb) => {
        return $http.get('./php/get-one-thesis-report.php?id=' + id)
            .then((resp) => cb(resp.data), (err) => console.log(err));
    }
    this.increaseViewsThesisReport = (id) => {
        return $http.get('./php/increase-views-thesis-report.php?id=' + id);
    }
    this.increaseViewsBlog = (id) => {
        return $http.get('./php/increase-views-blog.php?id=' + id);
    }
    this.increaseViewsEvent = (id) => {
        return $http.get('./php/increase-views-event.php?id=' + id);
    }
    this.increaseViewsJob = (id) => {
        return $http.get('./php/increase-views-job.php?id=' + id);
    }
    this.increaseLikeThesisReport = (id) => {
        return $http.get('./php/increase-like-thesis-report.php?id=' + id);
    }
    this.increaseLikeEvent = (id) => {
        return $http.get('./php/increase-like-event.php?id=' + id);
    }
    this.increaseLikeJob = (id) => {
        return $http.get('./php/increase-like-job.php?id=' + id);
    }
    this.increaseLikeCompetition = (id) => {
        return $http.get('./php/increase-like-competition.php?id=' + id);
    }
    this.increaseViewsCompetition = (id) => {
        return $http.get('./php/increase-view-competition.php?id=' + id);
    }
    this.increaseLikeBlog = (id) => {
        return $http.get('./php/increase-like-blog.php?id=' + id);
    }
    this.setPortfolio = (portfolio) => {
        localStorage.setItem("portfolio", JSON.stringify(portfolio))
    }
    this.getPortfolio = () => {
            return JSON.parse(localStorage.getItem("portfolio"));
        }
        /*similar portfolio*/
    this.fetchSimilarPortfolio = (fd, cb) => {
        $http({
                method: "post",
                url: "php/fetch-similer-portfolio.php",
                data: fd,
                headers: {
                    "Content-Type": undefined
                }
            })
            .then((resp) => cb(resp.data), (err) => console.log(err));
    }

    /*To Fetch Dessertation */
    this.fetchDessertation = (offset, limit, cb) => {
        $http({
                method: "GET",
                url: "php/fetch-dessertation.php?offset=" + offset + '&limit=' + limit
            })
            .then((resp) => cb(resp.data), (err) => console.log(err));
    }
    this.fetchOneDessertation = (id, cb) => {
        $http({
                method: "GET",
                url: "php/fetch-one-dessertation.php?id=" + id
            })
            .then((resp) => cb(resp.data), (err) => console.log(err));
    }
    this.setDessertation = (dessertation) => {
        localStorage.setItem("dessertation", JSON.stringify(dessertation));
    }
    this.getDessertation = () => {
            return JSON.parse(localStorage.getItem("dessertation"));
        }
        /*fetch similar dessertation*/
    this.fetchSimilarDessertation = (fd, cb) => {
        $http({
                method: "post",
                url: "php/fetch-similer-dessertation.php",
                data: fd,
                headers: {
                    "Content-Type": undefined
                }
            })
            .then((resp) => cb(resp.data), (err) => console.log(err));
    }

    /*To Fetch Student Work */
    this.fecthStudentWork = (offset, limit, cb) => {
        $http({
                method: "GET",
                url: "php/fetch-student.php?offset=" + offset + "&limit=" + limit
            })
            .then((resp) => cb(resp.data), (err) => console.log(err));
    }

    /*To Fetch Thesis Report */
    this.fetchThesisReport = (offset, limit, cb) => {
        $http({
                method: "GET",
                url: "php/fetch-thesis-report.php?offset=" + offset + "&limit=" + limit
            })
            .then((resp) => { cb(resp.data) }, (err) => console.log(err));
    }

    this.setThesisReport = (thesisReport) => {
        localStorage.setItem("thesisReport", JSON.stringify(thesisReport));
    }
    this.getThesisReport = () => {
        return JSON.parse(localStorage.getItem("thesisReport"));
    }

    /*fecth blog*/
    this.fetchBlog = (offset, limit, cb) => {
        $http({
                method: "get",
                url: "php/fetch-post.php?offset=" + offset + '&limit=' + limit,
                headers: {
                    "Content-Type": undefined
                }
            })
            .then((resp) => cb(resp.data), (err) => console.log(err));
    }
    this.fetchOneBlog = (id, cb) => {
        $http({
                method: "get",
                url: "php/fetch-one-blog.php?blog_id=" + id,
                headers: {
                    "Content-Type": undefined
                }
            })
            .then((resp) => cb(resp.data), (err) => console.log(err));
    }
    this.setFullBlog = (blog) => {
        localStorage.setItem("blog", JSON.stringify(blog));
    }
    this.getBlog = () => {
        return JSON.parse(localStorage.getItem("blog"));
    }
    this.fetchSimilarBlogs = (id, cb) => {
        var fd = new FormData();
        fd.append('blog_id', id);
        $http({
                method: "post",
                url: "php/fetch-similer-blogs.php",
                data: fd,
                headers: {
                    "Content-Type": undefined
                }
            })
            .then((resp) => cb(resp.data), (err) => console.log(err));
    }
    this.submitCommentBlog = (fd, cb) => {
            $http({
                    method: "POST",
                    url: "php/comment-blog.php",
                    data: fd,
                    headers: {
                        "Content-Type": undefined
                    }
                })
                .then((resp) => cb(resp.data), (err) => console.log(err));
        }
        /* Fetch Comments of Particular Blog */
    this.fetchCommentsOfBlog = ({id, type}, cb) => {
        //  console.log("In Service While Getting Comments : " + id);
        var fd = new FormData();
        fd.append('id', id);
        fd.append('type', type);

        $http({
                method: "POST",
                url: "php/fetch-comments-of-blog.php",
                data: fd,
                headers: {
                    "Content-Type": undefined
                }
            })
            .then((resp) => cb(resp.data), (err) => console.log(err));
    }

    /*fetch thesis */
    this.fetchThesis = (offset, limit, cb) => {
        $http({
                method: "get",
                url: "php/fetch-thesis.php?offset=" + offset + "&limit=" + limit
            })
            .then((resp) => cb(resp.data), (err) => console.log(err));
    };
    this.fetchOneThesis = (id, cb) => {
        $http({
                method: "GET",
                url: "php/fetch-one-thesis.php?id=" + id
            })
            .then((resp) => { cb(resp.data) }, (err) => console.log(err));
    }
    this.setThesis = (thesis) => {
        localStorage.setItem("thesis", JSON.stringify(thesis));
    }
    this.getThesis = () => {
        return JSON.parse(localStorage.getItem("thesis"));
    }


    /*fetch events*/
    this.fetchEvents = (offset, limit, cb) => {
        $http({
                method: "get",
                url: "php/fetch-events.php?offset=" + offset + '&limit=' + limit
            })
            .then((resp) => cb(resp.data), (err) => console.log(err));
    };
    this.fetchSingleEvent = (id, cb) => {
        $http({
                method: "get",
                url: "php/fetch-single-event.php?id=" + id
            })
            .then((resp) => cb(resp.data), (err) => console.log(err));
    }
    this.setEvent = (event) => {
        localStorage.setItem("event", JSON.stringify(event));
    }
    this.getEvent = () => {
        return JSON.parse(localStorage.getItem("event"));
    }


    /*fetch job*/
    this.fetchJob = (offset, limit, cb) => {
        $http({
                method: "get",
                url: "php/fetch-job.php?offset=" + offset + '&limit=' + limit
            })
            .then((resp) => cb(resp.data), (err) => console.log(err));
    }
    this.fetchOneJob = (id, cb) => {
        $http({
                method: "get",
                url: "php/fetch-one-job.php?id=" + id
            })
            .then((resp) => cb(resp.data), (err) => console.log(err));
    }
    this.setJob = (job) => {
        localStorage.setItem("job", JSON.stringify(job));
    }
    this.getJob = () => {
        return JSON.parse(localStorage.getItem("job"));
    }

    /*fetch Competitor*/
    this.fetchCompetitor = (offset, limit, cb) => {
        $http({
                method: "get",
                url: "php/fetch-competitor.php?offset=" + offset + '&limit=' + limit
            })
            .then((resp) => cb(resp.data), (err) => console.log(err));
    }
    this.fetchOneCompetitor = (id, cb) => {
        $http({
                method: "get",
                url: "php/fetch-one-competitor.php?id=" + id
            })
            .then((resp) => cb(resp.data), (err) => console.log(err));
    }
    this.setCompetitor = (comp) => {
        localStorage.setItem("comp", JSON.stringify(comp));
    }
    this.getCompetition = () => {
        return JSON.parse(localStorage.getItem("comp"));
    }
    this.getSimilarCompetitions = (category, id) => {
        return $http({
            method: "get",
            url: "php/fetch-similar-competitor.php?category=" + category + "&id=" + id
        })
        .then((resp) => resp.data, (err) => console.log(err));
    }

    /*TO Fetch One Item From Array OF Object*/
    this.getOneFromArrObj = async(id, data, cb) => {
            // console.log(id);
            // console.log(data);
            let notFind = true;
            await data.find(obj => {
                if (obj.project_id == id || obj.blog_id == id || obj.portfolio_id == id || obj.dessertation_id == id || obj.thesis_id == id || obj.thesis_report_id == id || obj.event_id == id || obj.job_id == id || obj.competitor_id == id) {
                    cb(obj);
                    notFind = false;
                }
            });
            if (notFind) {
                cb({ message: "Not found", status: true });
            }
        }
        // fetch product by category 

    this.fetchMatproducts = (offset, limit, data, cb) => {
            $http.get("php/fetch-mat-products.php?offset=" + offset + "&limit=" + limit + "&cat=+" + data)
                .then((resp) => {
                    cb(resp.data)
                })
                .catch((err) => {
                    console.log(err);
                })
        }
        // get similar material 
    this.getSimilarMaterial = (key, id, cb) => {
            $http.get("./php/get-similar-material.php?key=" + key + "&id=" + id)
                .then((resp) => {
                    cb(resp.data);
                })
                .catch((err) => {
                    console.log(err);
                })
        }
        // fetch next project 
    this.fetchProject = (id, isNext, cb) => {
        $http.get("./php/get-next-prev-project.php?id=" + id + "&isNext=" + isNext)
            .then((resp) => {
                cb(resp.data);
            }, (err) => {
                console.log(err);
            })
    }
    this.getSimilarProjects = (id, project_type, cb) => {
        $http.get("./php/get-similar-projects.php?project_id=" + id + "&project_type=" + project_type)
            .then((resp) => {
                cb(resp.data)
            }, (err) => {
                console.log(err);
            })
    }
    this.getSimilarThesis = (thesis) => {
        return $http.get("./php/get-similar-thesis.php?thesis_id=" + thesis.thesis.thesis_id + "&thesis_type=" + thesis.thesis.thesis_proj_type);

    }
    this.fetchNextPrevThesis = (id, isNext, cb) => {
        $http.get("./php/get-next-prev-thesis.php?id=" + id + "&isNext=" + isNext)
            .then((resp) => {
                cb(resp.data);
            }, (err) => {
                console.log(err);
            })
    }
    this.fetchNextPrevBlog = (id, isNext, cb) => {
        $http.get("./php/get-next-prev-blog.php?id=" + id + "&isNext=" + isNext)
            .then((resp) => {
                cb(resp.data);
            }, (err) => {
                console.log(err);
            })
    }
    this.nextPrevMaterial = (id, category, subcatgory, isNext) => {
        return $http.get("./php/get-next-prev-material.php?materialId=" + id + "&category=" + category + "&subcategory=" + subcatgory + "&isNext=" + isNext);
    }
    this.getNextPrevEvent = (id, isNext) => {
        return $http.get("./php/get-next-prev-event.php?event_id=" + id + "&isNext=" + isNext);
    }
    this.getNextPrevJob = (id, isNext) => {
        return $http.get("./php/get-next-prev-job.php?job_id=" + id + "&isNext=" + isNext);
    }
    this.getNextPrevCompetetor = (id, isNext) => {
        return $http.get("./php/get-next-prev-competitor.php?comp_id=" + id + "&isNext=" + isNext);
    }
    this.increaseLikePortfolio = (id) => {
        return $http.get('./php/increase-portfolio-likes.php?id=' + id);
    }
})
app.service('categoryListService', function($http) {
    this.searchCategory = (cb) => {
        categoryArr = $http.get("js/category.json")
            .then((resp) => {
                cb(resp.data);
            })
            .catch((err) => {
                console.log(err);
            })
    }

    this.search = (categ, isReplace, cb) => {
        this.searchCategory((data) => {
            for (let category of data) {
                if (category.item === categ) {
                    if (isReplace) {
                        for (let i in category.subItem) {
                            category.subItem[i] = category.subItem[i].replace(/\//g, "-");
                            category.subItem[i] = category.subItem[i].replace(/ /g, "-");
                        }
                    }
                    cb(category.subItem);
                }
            }
        });

    }
});