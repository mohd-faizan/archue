app.service("user", function () {
    this.saveDataSession = (data) => {
        console.log(data);
        username = data.name;
        id = data.user_id;
        profession = data.profession;
        company_name = data.company_name;
        profile = data.profile;
        sessionStorage.setItem('slogin', JSON.stringify({
            username: username,
            id: id,
            profession: profession,
            company_name: company_name,
            profile: profile,
            loggedIn: true
        }));
        console.log(this.isLoggedIn());
    }
    this.saveDataLocal = (data) => {
        username = data.name;
        id = data.user_id;
        profession = data.profession;
        company_name = data.company_name;
        profile = data.profile;
        localStorage.setItem('clogin', JSON.stringify({
            username: username,
            id: id,
            profession: profession,
            company_name: company_name,
            profile: profile,
            loggedIn: true
        }));
        // console.log(this.isLoggedIn());
    }
    this.clearData = () => {
        if (sessionStorage.getItem("slogin") != null) {
            sessionStorage.clear('slogin');
        } else {
            localStorage.clear('clogin');
        }
    }
    this.isLoggedIn = () => {
        // console.log(sessionStorage.getItem('login'));
        var isLogged = false;
        if (sessionStorage.getItem("slogin") != null) {
            isLogged = true;
        } else if (localStorage.getItem("clogin") != null) {
            isLogged = true;
        } else {
            isLogged = false;
        }
        return isLogged;
    }
    this.getSaveData = () => {
        var data;
        if (sessionStorage.getItem("slogin") != null) {
            data = JSON.parse(sessionStorage.getItem("slogin"));
        } else if (localStorage.getItem("clogin") != null) {
            data = JSON.parse(localStorage.getItem("clogin"));
        }
        return data;
    }
})
app.service("myService", function ($http) {
    this.subscribeNewsletter = (data, cb) => {
        var formd = this.convertToForm(data);
        $http({
            method: "POST",
            data: formd,
            url: "php/subscribe-newsletter.php",
            headers: {
                "Content-Type": undefined
            }
        })
            .then((resp) => cb(resp.data), (err) => console.log(err));
    }
    this.convertToForm = (formdata) => {
        var fd = new FormData();
        for (let i in formdata) {
            fd.append(i, formdata[i]);
        }
        return fd;
    }
    this.checkEmailExistence = (data, cb) => {
        var fd = new FormData;
        fd.append("email", data);
        $http({
            method: "POST",
            data: fd,
            url: "php/checkemailexistence.php",
            headers: {
                "Content-Type": undefined
            }
        }).then((resp) => {
            cb(resp.data);
        })
    }
    this.signup = (formdata, cb) => {
        var formd = this.convertToForm(formdata);
        $http({
            method: "POST",
            data: formd,
            url: "php/sign-up.php",
            headers: {
                "Content-Type": undefined
            }
        })
            .then((resp) => cb(resp.data), (err) => console.log(err));
    }

    this.login = (formData, cb) => {
        var fd = this.convertToForm(formData);
        $http({
            method: "POST",
            data: fd,
            url: "php/login.php",
            headers: {
                "Content-Type": undefined
            }
        })
            .then((resp) => {
                cb(resp.data)
            }, (error) => console.log(error));
    }
    this.deleteHim = (id, cb) => {
        var fd = new FormData();
        fd.append('id', id);
        $http({
            method: "POST",
            data: fd,
            url: "php/delete-him.php",
            headers: {
                "Content-Type": undefined
            }
        })
            .then((resp) => cb(resp.data), (err) => console.log(err));
    }
    this.delete = (id, tableName, cb) => {
        let fd = new FormData();
        fd.append('id', id);
        fd.append('tableName', tableName);
        $http({
            method: "POST",
            data: fd,
            url: "php/delete.php",
            headers: {
                "Content-Type": undefined
            }
        })
            .then((resp) => cb(resp.data), (err) => console.log(err));
    }
    this.fetchUserData = (myid, cb) => {
        var fd = new FormData();
        fd.append('id', myid);
        $http({
            method: "POST",
            data: fd,
            url: "php/user-data.php",
            headers: {
                "Content-Type": undefined
            }
        })
            .then((resp) => {
                cb(resp.data)
            }, (error) => console.log(error));
    }
    this.fetchUserData1 = (myid) => {
        var fd = new FormData();
        fd.append('id', myid);
        return $http({
            method: "POST",
            data: fd,
            url: "php/user-data.php",
            headers: {
                "Content-Type": undefined
            }
        }).then(resp => resp.data);
    }
    this.updateUser = (data, cb) => {
        var fd = this.convertToForm(data);
        $http({
            method: "POST",
            data: fd,
            url: "php/update-user.php",
            headers: {
                "Content-Type": undefined
            }
        })
            .then((resp) => {
                cb(resp.data)
            }, (error) => console.log(error));
    }
    this.uploadMaterial = (fdata, cb) => {
        var fd = this.convertToForm(fdata);
        $http({
            method: "POST",
            data: fd,
            url: "php/update-material.php",
            headers: {
                "Content-Type": undefined
            }
        })
            .then((resp) => {
                cb(resp.data)
            }, (error) => console.log(error));
    }
    this.uploadArchitect = (fdata, cb) => {
        var fd = this.convertToForm(fdata);
        $http({
            method: "POST",
            data: fd,
            url: "php/update-architect.php",
            headers: {
                "Content-Type": undefined
            }
        })
            .then((resp) => {
                cb(resp.data)
            }, (error) => console.log(error));
    }
    this.forgotPassword = (fData, cb) => {
        var fd = this.convertToForm(fData);
        $http({
            method: "POST",
            data: fd,
            url: "php/forgot-password.php",
            headers: {
                "Content-Type": undefined
            }
        })
            .then((resp) => {
                cb(resp.data)
            }, (error) => console.log(error));
    }
    this.contact = (data, cb) => {
        var fd = this.convertToForm(data);
        $http({
            method: "POST",
            data: fd,
            url: "php/contact.php",
            headers: {
                "Content-Type": undefined
            }
        })
            .then((resp) => {
                cb(resp.data)
            }, (error) => console.log(error));
    }
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
                cb(resp.data);
            }, (error) => console.log(error));
    }
    this.fetchPlanInfo = (id, cb) => {
        var fd = new FormData();
        fd.append("id", id);
        $http({
            method: "POST",
            data: fd,
            url: "php/fecth-plan-info.php",
            headers: {
                "Content-Type": undefined
            }
        })
            .then((resp) => cb(resp.data), (err) => console.log(err));
    }
    this.uploadMaterilas = (mateData, proimages, cb) => {
        var fd = this.convertToForm(mateData);
        for (let obj of proimages) {
            fd.append("prodimages[]", obj);
        }
        $http({
            method: "POST",
            data: fd,
            url: "php/material-upload.php",
            headers: {
                "Content-Type": undefined
            }
        })
            .then((resp) => cb(resp.data), (err) => console.log(err));
    }
    this.loginWith = (additionWith, cb) => {
        var fd = this.convertToForm(additionWith);
        $http({
            method: "POST",
            url: "php/login-with.php",
            data: fd,
            headers: {
                "Content-Type": undefined
            }
        })
            .then((resp) => cb(resp.data), (err) => console.log(err));
    }
    this.forgotPass = (data) => {
        let fd = this.convertToForm(data);
        return $http.post("php/reset-password.php", fd, { headers: { "content-type": undefined } });
    }
    this.getUserProfile = (username) => {
        // let fd = this.convertToForm({username});
        return $http.get(`php/user-profile.php?username=${username}`).then(resp => resp.data);
    }
    this.incrementUserviews = (id) => {
        return $http.get(`php/increment-user-view.php?id=${id}`).then(resp => resp.data);
    }
});


app.service("leadService", function ($http) {
    this.fetchLeads = (cb) => {
        $http({
            method: "GET",
            url: "php/fetch-leads.php"
        })
            .then((resp) => cb(resp.data), (err) => console.log(err))
    }
})
app.service("planService", function ($http) {
    this.uploadPlan = (data, cb) => {
        var fd = new FormData();
        for (let i in data) {
            fd.append(i, data[i]);
        }
        $http({
            method: "POST",
            data: fd,
            url: 'php/upload-plan.php',
            headers: {
                "Content-Type": undefined
            }
        })
            .then((resp) => cb(resp.data), (err) => console.log(err));
    }
})
app.service('mailService', function ($http) {
    this.mailWhileLogin = (data) => {
        var fd = new FormData();
        fd.append('email', data);
        $http({
            method: 'POST',
            url: 'php/mailwhilelogin.php',
            data: fd,
            headers: {
                "Content-Type": undefined
            }
        }).then((resp) => {
            console.log(resp);
        }, (err) => {
            console.log(error);
        });
    }
    this.maileWhileGetQoute = (email, isFromMaterial) => {
        $http.get("php/send-getquote-mail.php?email=" + email + "&isFromMaterial=" + isFromMaterial)
            .then((resp) => {
                console.log(resp.data);
            }, (err) => {
                console.log(err);
            })
    }
})
app.service('magazine', function ($http) {
    this.setSubscriptionData = (data) => {
        stringdata = JSON.stringify(data);
        localStorage.setItem('subscriptionData', stringdata);
    }
    this.getSubscriptionData = () => {
        if (localStorage.getItem("subscriptionData") != null) {
            data = JSON.parse(localStorage.getItem("subscriptionData"));
        }
        return data;
    }

    this.applyReferral = (data, cb) => {
        var fd = new FormData();
        fd.append('referralCode', data);
        $http({
            method: "POST",
            data: fd,
            url: 'php/apply-referral.php',
            headers: {
                "Content-Type": undefined
            }
        }).then((resp) => cb(resp.data), (err) => console.log(err));
    }

    this.subscribe = (data, cb) => {
        var fd = new FormData();
        for (let i in data) {
            fd.append(i, data[i]);
        }
        $http({
            method: "POST",
            data: fd,
            url: 'php/subscribe-magazine.php',
            headers: {
                "Content-Type": undefined
            }
        }).then((resp) => cb(resp.data), (err) => console.log(err));
    }
    this.setEMagazine = (emagazine) => {
        localStorage.setItem('emagazine', JSON.stringify(emagazine));
    }
    this.getEMagazine = () => {
        return JSON.parse(localStorage.getItem('emagazine'));
    }
})