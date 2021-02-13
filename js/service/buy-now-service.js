app.service('buyNowService', function($http) {
    this.buyNow = (data) => {
        var fd = new FormData();
        Object.keys(data).forEach(key => {
            fd.append(key, data[key]);
        });
        return $http({
            method: "POST",
            url: "./php/api/login-signup/signup.php",
            data: fd,
            headers: {
                "Content-Type": undefined
            }
        });
    }
})