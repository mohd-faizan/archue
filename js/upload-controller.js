/*partner with us*/
app.controller("partnerController", (user, uploadService, $scope, myService) => {
    $scope.type = "Select Category";
    $scope.isShowLoad = false;
    let vendorData = {};
    $scope.onSubmit = (form) => {
        vendorData.name = $scope.name;
        vendorData.company_name = $scope.company_name;
        vendorData.website = $scope.website;
        vendorData.type = $scope.type;
        vendorData.email = $scope.email;
        vendorData.password = $scope.password;
        vendorData.phone = $scope.phone;
        // console.log(vendorData);
        let fd = new FormData();
        for (let i in vendorData) {
            fd.append(i, vendorData[i]);
        }
        uploadService.uploadVendor(fd, (data) => {
            console.log(data);
            $scope.isShowLoad = true;
            if (data.status == "ok") {
                $scope.isShowLoad = false;
                user.clearData();
                console.log(data.data);
                user.saveDataSession(data.data);
                $scope.$parent.setUser();
                window.location.href = './plan-info';
            }
        });
    }

    /*Already exist Email Check*/
    $scope.checkEmailExistence = () => {
        $scope.existCheck = false;
        myService.checkEmailExistence($scope.email, (data) => {
            if (data.data) {
                $scope.existCheck = true;
            } else {
                $scope.existCheck = false;
            }
        })
    }
})

app.controller("planInfoController", ($scope, $rootScope, planService) => {
    $scope.planInfo = {};
    // $scope.plan = "Select Month";
    // $scope.onsubmit = (form, id) => {
    //     if ($scope.plan == "Select Month") {
    //         $scope.plan = "12 month";
    //     }
    //     if (id == 1) {
    //         planInfo.pages = "5";
    //         planInfo.plan_name = "LARGE BRAND";
    //         planInfo.impression = "unlimited";
    //         planInfo.leads = "unlimited";
    //         planInfo.duration = $scope.plan;
    //     } else if (id == 2) {
    //         planInfo.pages = "3";
    //         planInfo.plan_name = "MEDIUM BRAND";
    //         planInfo.impression = "unlimited";
    //         planInfo.leads = "unlimited";
    //         planInfo.duration = $scope.plan;
    //     } else if (id == 3) {
    //         planInfo.pages = "1";
    //         planInfo.plan_name = "SMALL BRAND";
    //         planInfo.impression = "limited";
    //         planInfo.leads = "limited";
    //         planInfo.duration = $scope.plan;
    //     }
    //     planInfo.id = $rootScope.userData.id;
    //     $scope.isShowLoad = true;
    //     planService.uploadPlan(planInfo, (data) => {
    //         if (data.status == "ok") {
    //             $scope.isShowLoad = false;
    //             window.location.href = "./dashboard";
    //         }
    //     })
    // }

    // New Code
    $scope.selectPlan = (val) => {
        switch (val) {
            case 1:
                $scope.planInfo.pages = "1";
                $scope.planInfo.plan_name = "Basic";
                $scope.planInfo.impression = "limited";
                $scope.planInfo.leads = "limited";
                $scope.planInfo.monthlyPrice = 999;
                break;
            case 2:
                $scope.planInfo.pages = "3";
                $scope.planInfo.plan_name = "Standard";
                $scope.planInfo.impression = "unlimited";
                $scope.planInfo.leads = "unlimited";
                $scope.planInfo.monthlyPrice = 1999;
                break;
            case 3:
                $scope.planInfo.pages = "5";
                $scope.planInfo.plan_name = "Featured";
                $scope.planInfo.impression = "unlimited";
                $scope.planInfo.leads = "unlimited";
                $scope.planInfo.monthlyPrice = 2999;
                break;
            default:
                $scope.plan_name = null;
        }
    }

    $scope.durations = ['6 Months', '12 Months', '24 Months'];
    $scope.setPrice = (selectedDurationVal) => {
        switch (selectedDurationVal) {
            case '1':
                $scope.planInfo.duration = '6 Months';
                $scope.planInfo.price = $scope.planInfo.monthlyPrice * 6;
                break;
            case '2':
                $scope.planInfo.duration = '12 Months';
                $scope.planInfo.price = $scope.planInfo.monthlyPrice * 12;
                break;
            case '3':
                $scope.planInfo.duration = '24 Months';
                $scope.planInfo.price = $scope.planInfo.monthlyPrice * 24;
                break;
            default:
                $scope.planInfo.duration = null;
                $scope.planInfo.price = null;
        }
    }

    $scope.clear = () => {
        $scope.planInfo.duration = null;
        $scope.planInfo.price = null;
    }

    $scope.subscribe = () => {
        $scope.planInfo.user_id = $rootScope.userData.id;
        // To be removed
        $scope.planInfo.transaction_id = "SAMPLE_NOW";
        $scope.isShowLoad = true;
        planService.uploadPlan($scope.planInfo, (data) => {
            if (data.status == "ok") {
                $scope.isShowLoad = false;
                window.location.href = "./dashboard";
            }
        })
    }
})