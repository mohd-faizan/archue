app.controller("rootController",($sce,fetchservice,$document,$location,$scope,$interval,user,$rootScope,$timeout,myService)=>{
	$scope.isShowViewImage = false;
	$scope.interval = $interval;
	$scope.timeout = $timeout;
	$scope.errorMessage;
	$scope.isShowError = 0;
	$scope.myser = myService;
	$scope.location = $location;
	$scope.user = user;
	$rootScope.isShow = user.isLoggedIn();
	$rootScope.userData = user.getSaveData();
	$scope.isShowViewImages = ()=>{
		$scope.isShowViewImage = true;
	}
	$scope.upSetImageView = ()=>{
		$scope.isShowViewImage = false;
	}
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
	fetchservice.fetchBlog((data)=>{
		if(data.status=="yes"){
			$scope.blogs = data.resp;
			console.log($scope.blogs);
		}
	});
	$scope.setBlog = (blog)=>{
		fetchservice.setFullBlog(blog);
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
	$scope.$parent.setUser();
	$scope.userData = $rootScope.userData;
	console.log($rootScope.userData);
	if($scope.userData.company_name==undefined){
		
	}
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
app.controller("editController",(user,myService,validationService,$scope,$rootScope)=>{
	console.log($rootScope.userData);
	$scope.name = $rootScope.userData.username;
	$scope.profession = $rootScope.userData.profession;
	$scope.validatePortfolioFile = (img)=>{
		var ext = ['png','jpeg','jpg'];
		return validationService.validPortfolio(img,ext);
	}
	$scope.onSubmit = (form)=>{
		let editData = {};
		editData.profile = $scope.portfolioFile;
		editData.profession = $scope.profession;
		editData.name = $scope.name;
		editData.id = $rootScope.userData.id;
		myService.updateUser(editData,(data)=>{
			if(data.status=="ok"){
				alert("you have succesfully updated. Login to See Changes");
				user.clearData();
				window.location.href="./";
			}
			else{
				alert("Error");
			}
		})
	}
})
app.controller("fetchImageController",(fetchservice,$scope)=>{
	if($scope.$parent.isShowViewImage){
		$scope.images = fetchservice.getImages();
		console.log($scope.images);
	}
	console.log($scope.$parent.isShowViewImage);
});
 

 app.controller("materialController",(myService,$scope)=>{
 	let materialObj = {};
 	$scope.onsubmit = (form)=>{
 		materialObj.product_name = $scope.product_name;
 		materialObj.area = $scope.area;
 		materialObj.budget = $scope.budget;
 		materialObj.specification = $scope.specification;
 		materialObj.email = $scope.email;
 		materialObj.phone = $scope.phone;
 		materialObj.locat = $scope.locat;
 		materialObj.requirement = $scope.requirement;
 		materialObj.mat_date = new Date();
 		myService.uploadMaterial(materialObj,(data)=>{
 			console.log(data);
 			if(data.status=="ok"){
 				alert("thank you");
 			}
 			else{
 				alert("Error");
 			}
 			form.reset();
 			window.location = "./";
 		});
 	}
 })

 /*architect controller*/
 app.controller("architectController",(myService,$scope)=>{
 	$scope.service = "select service";
 	architectData = {};
 	$scope.onsubmit = (form)=>{
 		architectData.service = $scope.service;
 		architectData.project_type = $scope.project_type;
 		architectData.area = $scope.area;
 		architectData.budget = $scope.budget;
 		architectData.specification = $scope.specification;
 		architectData.email = $scope.email;
 		architectData.phone = $scope.phone;
 		architectData.locat = $scope.locat;
 		architectData.requirement = $scope.requirement;
 		architectData.arc_date = new Date();
 		myService.uploadArchitect(architectData,(data)=>{
 			if(data.status=="ok"){
 				alert("Thank you");
 			}
 			else{
 				alert("Error");
 			}
 	        form.reset();
 	        window.location = "./";
 		})
 	}
 })

 /*forgot controller*/
 app.controller("forgotController",(myService,$scope)=>{
 	var forgotData = {};
 	$scope.onSubmit = (form)=>{
 		forgotData.email = $scope.email;
	 	myService.forgotPassword(forgotData,(data)=>{
	 		console.log(data);
	 	});
 	}
 })