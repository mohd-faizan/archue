app.service("fetchservice", function($http) {
    var fullProject;
    this.fetchArchitect = (cb) => {
        $http({
                method: "GET",
                url: "php/fetch-architect.php"
            })
            .then((resp) => cb(resp.data), (err) => console.log(err));
    }
    this.fetchUsers = (cb) => {
        $http({
                method: "GET",
                url: "php/fetch-users.php"
            })
            .then((resp) => cb(resp.data), (err) => console.log(err));
    }
    this.deleteUser = (id, cb) => {
        var fd = new FormData();
        fd.append('id', id);
        $http({
                method: "POST",
                data: fd,
                url: 'php/delete-user.php',
                headers: {
                    "Content-Type": undefined
                }
            })
            .then((resp) => cb(resp.data), (err) => console.log(err));
    }
    this.fetchMaterial = (cb) => {
        $http({
                method: "GET",
                url: "php/fetch-material.php"
            })
            .then((resp) => cb(resp.data), (err) => console.log(err));
    }
    this.fetchPro = (cb) => {
        $http({
                method: "POST",
                url: "php/fetch-project.php",
            })
            .then((resp) => cb(resp.data), (err) => console.log(err));
    }
    this.fetchOneImage = (image) => {
        return image.split(",").pop();
    }
    this.convertToArrImages = (images) => {
        return images.split(",");
    }
    this.setFullProject = (project) => {
        localStorage.setItem("fullProject", JSON.stringify(project));
    }
    this.getFullProject = () => {
        return JSON.parse(localStorage.getItem("fullProject"));
    }
    this.fetchPortfolio = (cb) => {
        $http({
                method: "GET",
                url: "php/fetch-portfolio.php",
            })
            .then((resp) => cb(resp.data), (err) => console.log(err));
    }
    this.setPortfolio = (portfolio) => {
        localStorage.setItem("portfolio", JSON.stringify(portfolio))
    }
    this.getPortfolio = () => {
        return JSON.parse(localStorage.getItem("portfolio"));
    }
    this.fetchDessertation = (cb) => {
        $http({
                method: "GET",
                url: "php/fetch-dessertation.php"
            })
            .then((resp) => cb(resp.data), (err) => console.log(err));
    }
    this.setDessertation = (dessertation) => {
        localStorage.setItem("dessertation", JSON.stringify(dessertation));
    }
    this.getDessertation = () => {
        return JSON.parse(localStorage.getItem("dessertation"));
    }
    this.fecthStudentWork = (cb) => {
        $http({
                method: "GET",
                url: "php/fetch-student.php"
            })
            .then((resp) => cb(resp.data), (err) => console.log(err));
    }
    this.fetchThesisReport = (cb) => {
        $http({
                method: "GET",
                url: "php/fetch-thesis-report.php"
            })
            .then((resp) => {
                console.log(resp.data);
                cb(resp.data)
            }, (err) => console.log(err));
    }
    this.setThesisReport = (thesisReport) => {
        localStorage.setItem("thesisReport", JSON.stringify(thesisReport));
    }
    this.getThesisReport = () => {
            return JSON.parse(localStorage.getItem("thesisReport"));
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

    /*fecth blog*/
    this.fetchBlog = (cb) => {
            $http({
                    method: "get",
                    url: "php/fetch-post.php",
                    headers: {
                        "Content-Type": undefined
                    }
                })
                .then((resp) => cb(resp.data), (err) => console.log(err));
        }
        /*full blog store*/
    this.setFullBlog = (blog) => {
        localStorage.setItem("blog", JSON.stringify(blog));
    }
    this.getBlog = () => {
        return JSON.parse(localStorage.getItem("blog"));
    }

    /* Blog Comments */

    /* Fetch All Comments */
    this.fetchBlogComments = (cb) => {
        $http({
                method: "get",
                url: "php/fetch-blogs-comment.php",
                headers: {
                    "Content-Type": undefined
                }
            })
            .then((resp) => cb(resp.data), (err) => console.log(err));
    }

    /* Fetch Comments of Particular Blog */
    this.fetchCommentsOfBlog = (id, cb) => {
        var fd = new FormData();
        fd.append('blog_id', id);

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
    this.deleteBlogComment = (fd, cb) => {
        $http({
                method: "POST",
                url: "php/delete-blog-comment.php",
                data: fd,
                headers: {
                    "Content-Type": undefined
                }
            })
            .then((resp) => cb(resp.data), (err) => console.log(err));
    }
    this.approveBlogComment = (fd, cb) => {
        $http({
                method: "POST",
                url: "php/approve-blog-comment.php",
                data: fd,
                headers: {
                    "Content-Type": undefined
                }
            })
            .then((resp) => cb(resp.data), (err) => console.log(err));
    }


    /*fetch thesis */
    this.fetchThesis = (cb) => {
        $http({
                method: "get",
                url: "php/fetch-thesis.php"
            })
            .then((resp) => cb(resp.data), (err) => console.log(err));
    };

    /*Fetch Events*/
    this.getEvents = (cb) => {
            $http.get('php/getevents.php').then((resp) => {
                cb(resp.data);
            })
        }
        /*set evnets*/
    this.setEvent = (event) => {
        localStorage.setItem("event", JSON.stringify(event));
    }
    this.getEvent = () => {
            return JSON.parse(localStorage.getItem("event"));
        }
        /*fetch job*/
    this.fetchJob = (cb) => {
        $http({
                method: "get",
                url: "php/fetch-job.php"
            })
            .then((resp) => cb(resp.data), (err) => console.log(err));
    }
    this.setJob = (job) => {
        localStorage.setItem("job", JSON.stringify(job));
    }
    this.getJob = () => {
        return JSON.parse(localStorage.getItem("job"));
    }
    this.fetchCompetitor = (cb) => {
        $http({
                method: "get",
                url: "php/fetch-competitor.php"
            })
            .then((resp) => {
                // console.log(resp.data);
                cb(resp.data);
            }, (err) => console.log(err));
    }
    this.setCompetitor = (comp) => {
        localStorage.setItem("comp", JSON.stringify(comp));
    }
    this.getCompetition = () => {
        return JSON.parse(localStorage.getItem("comp"));
    }
    this.setImages = (images) => {
        localStorage.setItem("images", JSON.stringify(images));
    }
    this.getImages = () => {
        return JSON.parse(localStorage.getItem("images"));
    }
    this.setThesis = (thesis) => {
        localStorage.setItem("thesis", JSON.stringify(thesis));
    }
    this.getThesis = () => {
        return JSON.parse(localStorage.getItem("thesis"));
    }
    this.fetchProFeed = (id, cb) => {
        var fd = new FormData();
        fd.append("id", id);
        $http({
                method: "POST",
                url: "php/get-pro-feedback.php",
                data: fd,
                headers: {
                    "Content-Type": undefined
                }
            })
            .then((resp) => cb(resp.data), (err) => console.log(err));
    }
    this.fetchUploadedMaterial = (cb) => {
        $http({
                method: "GET",
                url: "php/get-uploaded-mat.php",
                headers: {
                    "Content-Type": undefined
                }
            })
            .then((resp) => cb(resp.data), (err) => console.log(err));
    }
    this.setMat = (material) => {
        localStorage.setItem("material", JSON.stringify(material));
    }
    this.getMat = () => {
        return JSON.parse(localStorage.getItem("material"));
    }
    this.getEMagazines = (cb) => {
        $http({
                method: "GET",
                url: "php/getEMagazines.php",
                headers: {
                    "Content-Type": undefined
                }
            })
            .then((resp) => cb(resp.data), (err) => console.log(err));
    }
    this.setEMagazine = (eMagazine) => {
        localStorage.setItem("eMagazine", JSON.stringify(eMagazine));
    }
    this.getEMagazine = () => {
            return JSON.parse(localStorage.getItem("eMagazine"));
        }
        // fetch leads
    this.fetchLeads = () => {
        return $http.get("php/get-leads.php");
    }
    this.deleteLead = (id) => {
        return $http.get("php/delete-lead.php?id=" + id);
    }
})

/*login Service */
app.service("loginService", function($http) {
    this.convertToForm = (data) => {
        var fd = new FormData();
        for (let i in data) {
            fd.append(i, data[i]);
        }
        return fd;
    }
    this.login = (data, cb) => {
        var formd = this.convertToForm(data);
        $http({
                method: "POST",
                data: formd,
                url: "php/login.php",
                headers: {
                    "Content-Type": undefined
                }
            })
            .then((resp) => cb(resp.data), (err) => console.log(err));
    }
})
app.service("saveData", function() {
    this.saveDataLocal = (data) => {
        localStorage.setItem("adminLogin", JSON.stringify(data));
    }
    this.isLoggedIn = () => {
        if (localStorage.getItem("adminLogin") != null) {
            return true;
        } else {
            return false;
        }
    }
    this.clearData = () => {
        localStorage.clear("adminLogin");
    }
    this.converToExcel = (obj) => {
        var doc = "Report" + "\n\n";
        var row = "";
        for (let index in obj[0]) {
            row += index + ",";
        }
        row = row.slice(0, -1);
        row += "\n";
        for (let i = 0; i < obj.length; i++) {
            for (let j in obj[i]) {
                row += obj[i][j] + ",";
            }
            row = row.slice(0, -1);
            row += "\n";
        }
        doc += row;
        var filename = "report";
        var uri = "data:text/csv;charset=utf-8," + escape(doc);
        var link = document.createElement("a");
        link.download = filename + ".csv";
        link.href = uri;
        link.style = "visibility:hidden";
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    }
});