app.controller('buyNowController', function($scope, buyNowService, myService, $sce) {
    $scope.passRegex = '';
    $scope.buyNow = {
        name: '',
        email: '',
        number: '',
        password: '',
        cpassword: '',
        agree: true
    };
    $scope.existCheck = false;
    $scope.submit = () => {
        const info = JSON.parse(localStorage.getItem('buNowInfo'));
        console.log(info);
        buyNowService.buyNow({...$scope.buyNow, id: info.id }).then(
            (resp) => {
                console.log(resp.data);
                if (resp.data.status === 'ok') {
                    $scope.$parent.user.saveDataLocal(resp.data.data);
                    $scope.$parent.setUser();
                    console.log($scope.$parent.user.getSaveData());
                    const user_id = $scope.$parent.user.getSaveData().id;
                    window.location.href = '/payement-gateway/pay.php?id=' + info.id + '&user_id=' + user_id;

                } else {
                    alert('errir');
                }
            },
            (err) => {
                console.log(err);
            }
        );
    }
    $scope.checkEmailExistence = () => {
        $scope.existCheck = false;
        myService.checkEmailExistence($scope.buyNow.email, (data) => {
            if (data.data) {
                $scope.existCheck = true;
            } else {
                $scope.existCheck = false;
            }
        })
    }
    $scope.login = () => {
        const info = JSON.parse(localStorage.getItem('buNowInfo'));
        localStorage.setItem('usrAfterLogin', '/payement-gateway/pay.php?id=' + info.id);
        $scope.$parent.location.path("/login");

    }
})