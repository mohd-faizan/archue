app.controller("rootController",($sce,fetchservice,$document,$location,$scope,$interval,user,$rootScope,$timeout,myService)=>{
	$scope.interval = $interval;
	$scope.timeout = $timeout;
	$scope.errorMessage;
	$scope.isShowError = 0;
	$scope.myser = myService;
	$scope.location = $location;
	$scope.user = user;
	$rootScope.isShow = user.isLoggedIn();
	$rootScope.userData = user.getSaveData();
	$scope.setUser = ()=>{
		$rootScope.userData = user.getSaveData();
		$rootScope.isShow = user.isLoggedIn(); 
	}
	fetchservice.fetchThesisReport((data)=>{
		if(data.status=="yes"){
			$scope.common_thesis_reports = data.data;
		}
	});
	$scope.setThesisReport = (theisReport)=>{
		fetchservice.setThesisReport(theisReport);
	}
	
});
app.controller("signUpController",($scope)=>{
	$scope.regex = "^[0-9]*$";
	$scope.profession = "Select Profession";
	$scope.professions = ["Architect","Student","Interior Designer","Others"];
	$scope.isInterest = false;
	 $scope.emailMe = false;
	$scope.onSignup = (form)=>{
		var formData = {};
		formData.name = $scope.fname+" "+$scope.lname;
		formData.email = $scope.email;
		formData.password = $scope.password;
		formData.profession = $scope.profession;
		formData.mobileno = $scope.mobileno;
		formData.country = $scope.country;
		formData.city = $scope.city;
		formData.isInterest = $scope.isInterest;
		formData.emailMe = $scope.emailMe;
		$scope.$parent.myser.signup(formData,(data)=>{
			if(data.status=="ok"){
				$scope.$parent.isShowError = 1;
				$scope.$parent.errorMessage = data.message;
				
			}
			else{
				$scope.$parent.isShowError = 2;
				$scope.$parent.errorMessage = data.message;
			}
		});
		$scope.$parent.timeout(()=>{
			if($scope.$parent.isShowError==1){
				$scope.$parent.location.path("/login");
				$scope.$parent.isShowError = 0;
			}
			else{
				form.reset();
			}
		},3000);
	}
});
app.controller("navController",($scope)=>{
	// $scope.isShowSearch = false;
	$scope.ifUpload = ()=>{
		if($scope.$parent.user.isLoggedIn()){
			$scope.$parent.location.path("/upload");
		}
		else{
			$scope.$parent.location.path("/login");
		}
	}
	// $scope.showHideSearch = ()=>{
	// 	$scope.isShowSearch = !$scope.isShowSearch;
	// }
})
app.controller("loginController",($scope)=>{
	$scope.remember = true;
	// sessionStorage.clear();
	console.log($scope.$parent.user.isLoggedIn());
	$scope.onLogin = ()=>{
		var data = {};
		data.email = $scope.email;
		data.password = $scope.password;
		data.remember = $scope.remember;
		$scope.isShowError = false;
		$scope.$parent.myser.login(data,(resp)=>{
			console.log(resp);
			if(resp.status=="yes"){
				$scope.$parent.user.saveDataSession(resp.data);
				$scope.$parent.location.path("/upload");
				$scope.$parent.setUser();
			}	
			else if(resp.status=="remember"){
				$scope.$parent.user.saveDataLocal(resp.data);
				$scope.$parent.location.path("/upload");
				$scope.$parent.setUser();
			}
			else{
				$scope.isShowError = true;
				console.log("Error");
			}
		});
	}
});
app.controller("dashboardController",(myService,$scope,$rootScope)=>{
	$scope.userData = $rootScope.userData;
	//console.log($scope.userData);
	myService.fetchUserData($scope.userData.id,(data)=>{
		$scope.blogs = data.blogs;
		$scope.dessertations = data.dessertation;
		$scope.portfolios = data.portfolio;
		$scope.projects = data.projects;
		$scope.thesises = data.thesis;
		$scope.thesis_reports = data.thesis_report;
		console.log($scope.projects);
	})

})

app.controller("getQouteController",($scope)=>{
	$scope.isGetActive = true;
	$scope.getChange = ()=>{
		$scope.isGetActive = !$scope.isGetActive;
	}
})
app.controller("editController",($scope,$rootScope)=>{
	console.log($rootScope.userData);
	$scope.name = $rootScope.userData.username;
	$scope.profession = $rootScope.userData.profession;
	
})