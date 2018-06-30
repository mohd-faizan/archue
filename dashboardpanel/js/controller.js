app.controller("rootController",(saveData,$scope)=>{
	$scope.showNav = saveData.isLoggedIn();
	$scope.showNavigation = ()=>{
		$scope.showNav = saveData.isLoggedIn();;
	}
	$scope.isShowViewImage = false;
	$scope.isShowViewImages = ()=>{
		$scope.isShowViewImage = true;
	}
	$scope.upSetImageView = ()=>{
		$scope.isShowViewImage = false;
	}
});
app.controller('loginController',($location,$scope,loginService,saveData)=>{
	var loginData = {};
	$scope.onSubmit = (form)=>{
		loginData.username = $scope.username;
		loginData.password = $scope.password;
		loginService.login(loginData,(resp)=>{
			if(resp.status=="ok"){
				saveData.saveDataLocal(resp.data
					);
				$scope.$parent.showNavigation();
				$location.path("./blogs");
			}
			else{
				console.log(resp.data);
			}
		});
	}
})
/*upload blog */
app.controller("blogController",(validationService,$rootScope,$scope,uploadService)=>{
	$scope.fontsize = [8,9,10,11,12,14,16,18,20,22,24,26,28,36,48,72]
	$scope.blog_category = "Select Category";
	$scope.validatePortfolioFile = (blog)=>{
		ext = ['jpeg','jpg','png'];
		return validationService.validPortfolio(blog,ext);
	}
	$scope.submitBlog = ()=>{
		var myBlogData = {};
		myBlogData.blog_heading = $scope.blog_heading;
		myBlogData.blog_category = $scope.blog_category;
		myBlogData.myBlog = $scope.myBlog;
		myBlogData.blog_file = $scope.portfolioFile;
		myBlogData.id = 1;
		var fd = new FormData();
		for(let i in myBlogData){
			fd.append(i,myBlogData[i]);
		}
		uploadService.sUploadBlog(fd,(data)=>{
			if(data.status=="yes"){
				alert("you have upload succesfylly");
				window.location.href = "./blogs";
			}
			else{
				alert("oops! something going wrong");
				window.location.reload();
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