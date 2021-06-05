app.service("deleteService", function($http) {
    this.deleteBlog = (id, cb) => {
        var fd = new FormData();
        fd.append("id", id);
        $http({
                method: "POST",
                data: fd,
                url: "php/delete-blog.php",
                headers: {
                    "Content-Type": undefined
                }
            })
            .then((resp) => cb(resp.data), (err) => console.log(err));
    }
    this.approveBlog = (id, cb) => {
        var fd = new FormData();
        fd.append("id", id);
        $http({
                method: "POST",
                data: fd,
                url: "php/approve-blog.php",
                headers: {
                    "Content-Type": undefined
                }
            })
            .then((resp) => cb(resp.data), (err) => console.log(err));
    }



    this.deleteEvent = (id, cb) => {
        var fd = new FormData();
        fd.append("id", id);
        $http({
                method: "POST",
                data: fd,
                url: "php/delete-event.php",
                headers: {
                    "Content-Type": undefined
                }
            })
            .then((resp) => cb(resp.data), (err) => console.log(err));
    }
    this.approveEvent = (id, cb) => {
        var fd = new FormData();
        fd.append("id", id);
        $http({
                method: "POST",
                data: fd,
                url: "php/approve-event.php",
                headers: {
                    "Content-Type": undefined
                }
            })
            .then((resp) => cb(resp.data), (err) => console.log(err));
    }


    this.deleteJob = (id, cb) => {
        var fd = new FormData();
        fd.append("id", id);
        $http({
                method: "POST",
                data: fd,
                url: "php/delete-job.php",
                headers: {
                    "Content-Type": undefined
                }
            })
            .then((resp) => cb(resp.data), (err) => console.log(err));
    }
    this.approveJob = (id, cb) => {
        var fd = new FormData();
        fd.append("id", id);
        $http({
                method: "POST",
                data: fd,
                url: "php/approve-job.php",
                headers: {
                    "Content-Type": undefined
                }
            })
            .then((resp) => cb(resp.data), (err) => console.log(err));
    }


    this.deleteComp = (id, cb) => {
        var fd = new FormData();
        fd.append("id", id);
        $http({
                method: "POST",
                data: fd,
                url: "php/delete-comp.php",
                headers: {
                    "Content-Type": undefined
                }
            })
            .then((resp) => cb(resp.data), (err) => console.log(err));
    }
    this.approveCompetition = (id, cb) => {
        var fd = new FormData();
        fd.append("id", id);
        $http({
                method: "POST",
                data: fd,
                url: "php/approve-competition.php",
                headers: {
                    "Content-Type": undefined
                }
            })
            .then((resp) => cb(resp.data), (err) => console.log(err));
    }


    this.approveProject = (id, cb) => {
        var fd = new FormData();
        fd.append("id", id);
        $http({
                method: "POST",
                data: fd,
                url: "php/approve-project.php",
                headers: {
                    "Content-Type": undefined
                }
            })
            .then((resp) => cb(resp.data), (err) => console.log(err))
    }
    this.delete = (id, cb) => {
        var fd = new FormData();
        fd.append("id", id);
        $http({
                method: "POST",
                data: fd,
                url: "php/delete-project.php",
                headers: {
                    "Content-Type": undefined
                }
            })
            .then((resp) => cb(resp.data), (err) => console.log(err))
    }


    this.deletePortfolio = (id, cb) => {
        var fd = new FormData();
        fd.append("id", id);
        $http({
                method: "POST",
                data: fd,
                url: "php/delete-portfolio.php",
                headers: {
                    "Content-Type": undefined
                }
            })
            .then((resp) => cb(resp.data), (err) => console.log(err))
    }
    this.approvePortfolio = (id, cb) => {
        var fd = new FormData();
        fd.append("id", id);
        $http({
                method: "POST",
                data: fd,
                url: "php/approve-portfolio.php",
                headers: {
                    "Content-Type": undefined
                }
            })
            .then((resp) => cb(resp.data), (err) => console.log(err));
    }


    this.deleteThesisReport = (id, cb) => {
        var fd = new FormData();
        fd.append("id", id);
        $http({
                method: "POST",
                data: fd,
                url: "php/delete-thesis-report.php",
                headers: {
                    "Content-Type": undefined
                }
            })
            .then((resp) => cb(resp.data), (err) => console.log(err))
    }
    this.approveThesisReport = (id, cb) => {
        var fd = new FormData();
        fd.append("id", id);
        $http({
                method: "POST",
                data: fd,
                url: "php/approve-thesis-report.php",
                headers: {
                    "Content-Type": undefined
                }
            })
            .then((resp) => cb(resp.data), (err) => console.log(err));
    }


    this.deleteDessertation = (id, cb) => {
        var fd = new FormData();
        fd.append("id", id);
        $http({
                method: "POST",
                data: fd,
                url: "php/delete-dessertation.php",
                headers: {
                    "Content-Type": undefined
                }
            })
            .then((resp) => cb(resp.data), (err) => console.log(err))
    }
    this.approveDessertation = (id, cb) => {
        var fd = new FormData();
        fd.append("id", id);
        $http({
                method: "POST",
                data: fd,
                url: "php/approve-dessertation.php",
                headers: {
                    "Content-Type": undefined
                }
            })
            .then((resp) => cb(resp.data), (err) => console.log(err))
    }


    this.deleteThesis = (id, cb) => {
        var fd = new FormData();
        fd.append("id", id);
        $http({
                method: "POST",
                data: fd,
                url: "php/delete-thesis.php",
                headers: {
                    "Content-Type": undefined
                }
            })
            .then((resp) => cb(resp.data), (err) => console.log(err))
    }
    this.approveThesis = (id, cb) => {
        var fd = new FormData();
        fd.append("id", id);
        $http({
                method: "POST",
                data: fd,
                url: "php/approve-thesis.php",
                headers: {
                    "Content-Type": undefined
                }
            })
            .then((resp) => cb(resp.data), (err) => console.log(err))
    }

    this.deleteMaterial = (id, cb) => {
            var fd = new FormData();
            fd.append("id", id);
            $http({
                    method: "POST",
                    data: fd,
                    url: "php/delete-material.php",
                    headers: {
                        "Content-Type": undefined
                    }
                })
                .then((resp) => cb(resp.data), (err) => console.log(err))
        }
        // delete archutects

    this.deleteArchitect = (id) => {
            var fd = new FormData();
            fd.append("id", id);
            return $http.post("php/delete-architect.php", fd, {
                headers: {
                    "content-type": undefined
                }
            });
        }
        // delete material request
    this.deleteMaterialReq = (id) => {
        var fd = new FormData();
        fd.append("id", id);
        return $http.post("php/delete-material-req.php", fd, {
            headers: {
                "content-type": undefined
            }
        });
    }
});

/*Add to Home Screen Service*/
app.service('addToHomeScreenService', function($http) {
    this.addToHomeScreen = (id, cb) => {
        var fd = new FormData();
        fd.append('id', id);
        $http({
            method: "POST",
            url: "php/addtohomescreen.php",
            data: fd,
            headers: {
                "Content-Type": undefined
            }
        }).then((resp) => {
            cb(resp.data);
        }, (err) => {
            console.log(err);
        })
    }
});
app.service('removeFromHomeScreenService', function($http) {
    this.removeFromHomeScreen = (id, cb) => {
        var fd = new FormData();
        fd.append('id', id);
        $http({
            method: "POST",
            url: "php/removefromhomescreen.php",
            data: fd,
            headers: {
                "Content-Type": undefined
            }
        }).then((resp) => {
            cb(resp.data);
        }, (err) => {
            console.log(err);
        })
    }

});
app.service('countService', function($http) {
    this.getUnapprovedCount = (cb) => {
        $http.get('php/getcount.php').then((resp) => {
            cb(resp.data);
        })
    }
});

app.service("myService", function($http) {
    this.runSearchQuery = (fd, cb) => {
        $http({
                method: "POST",
                data: fd,
                url: "php/search-query.php",
                headers: {
                    "Content-Type": undefined
                }
            })
            .then((resp) => {
                cb(resp.data)
            }, (error) => console.log(error));
    }
})
app.service('uploadLeadService', function($http) {
    this.convertToFormData = (data) => {
        const fd = new FormData();
        Object.keys(data).forEach((key) => {
            fd.append(key, data[key]);
        });
        return fd;
    }
    this.uploadLead = (data) => {
        return $http({
            method: 'POST',
            data: this.convertToFormData(data),
            url: 'php/upload-lead.php',
            headers: {
                "Content-Type": undefined
            }
        });
    }
    this.updateLeadById = (data) => {
        console.log('data', data);
        return $http({
            method: 'POST',
            data: this.convertToFormData(data),
            url: 'php/update-lead.php',
            headers: {
                "Content-Type": undefined
            }
        });
    }
})