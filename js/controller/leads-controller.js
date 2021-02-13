app.controller('leadsController', ($scope, leadService, user) => {
    $scope.limit = 15;
    $scope.active = 1;
    $scope.leads = '';
    $scope.isLoaded = false;
    $scope.budgets = [{ label: "0 lakh-5 lakh", value: '0-500000' }, { label: '5 lakh-10 lakh', value: '500000-1000000' }, { label: '10 lakh-20 lakh', value: '1000000-2000000' }, { label: '20 lakh-50 lakh', value: '2000000-5000000' }, { label: '50 lakh+', value: '5000000' }];
    $scope.workTypes = ["Interiors", "Architectural Design", "Construction", "Landscape"];
    $scope.filter = {
        budget: '',
        city: '',
        worktype: ''
    }
    $scope.key = ''
    $scope.val = ''
    $scope.countries = '';
    $scope.onChange = () => {
        $scope.filter.val = '';
    }
    $scope.getLead = (skip, limit) => {
        leadService.getLeads(skip, limit).then(
            (resp) => {
                $scope.isLoaded = true;
                const data = resp.data;
                if (!data.data || data.data.length == 0) {
                    return;
                }
                $scope.countries = data.data.map((lead) => lead.city);
                console.log($scope.countries);
                $scope.count = data.count;
                let pages = 0;
                if ($scope.count > $scope.limit) {
                    pages = ($scope.count % $scope.limit) === 0 ? ($scope.count / $scope.limit) : Math.floor(($scope.count / $scope.limit)) + 1;
                } else {
                    pages = 1;
                }
                $scope.paginations = new Array(pages);
                $scope.leads = data.data.map(lead => {
                    lead.expectedStartTime = new Date(lead.expectedStartTime);
                    return lead;
                }).sort((a, b) => b.person_count - a.person_count);
            },
            (err) => {
                console.log(err);
                $scope.isLoaded = true;
            }
        );
    }
    $scope.getLead(0, $scope.limit);
    $scope.toPage = (index) => {
        if ($scope.active === index) {
            return;
        }
        const skip = index * $scope.limit - $scope.limit;
        $scope.getLead(skip, $scope.limit);
        $scope.active = index;
    }
    $scope.next = () => {
        $scope.active = $scope.active + 1;
        const skip = $scope.active * $scope.limit - $scope.limit;
        $scope.getLead(skip, $scope.limit);
    }
    $scope.prev = () => {
        $scope.active = $scope.active - 1;
        const skip = $scope.active * $scope.limit - $scope.limit;
        $scope.getLead(skip, $scope.limit);
    }
    $scope.submit = () => {
        console.log($scope.filter);
        $scope.key = $scope.filter.key;
        $scope.val = $scope.filter.val;
    }
    $scope.reset = () => {
        console.log($scope.filter);
        $scope.filter = {
            key: '',
            val: ''
        }
        $scope.key = '';
        $scope.val = '';
    }
    $scope.buyNow = (lead) => {
        console.log(user.isLoggedIn());
        if (user.isLoggedIn()) {
            console.log(user.getSaveData());
            const user_id = user.getSaveData().id;
            debugger;
            window.location.href = '/payement-gateway/pay.php?id=' + lead.lead_id + '&user_id=' + user_id;
        } else {
            localStorage.setItem('buNowInfo', JSON.stringify({ cost: lead.cost, description: lead.description, id: lead.lead_id }));
            $scope.$parent.location.path("/buy-now");
        }
    }
})