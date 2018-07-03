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
			//console.log($scope.blogs);
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
	$scope.searchtype = "PROJECTS";
	$scope.querySubmit = (form)=>{
		var param = $scope.searchquery;
		var type = $scope.searchtype;
		var type = type.toLowerCase();
		window.location.href="./search/"+param+"/"+type;
	}
	// $scope.showHideSearch = ()=>{
	// 	$scope.isShowSearch = !$scope.isShowSearch;
	// }
})
app.controller("loginController",($scope)=>{
	$scope.remember = true;
	// sessionStorage.clear();
	//console.log($scope.$parent.user.isLoggedIn());
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
	$scope.user = {
		username:"",
		email:""
	};
	$scope.onGoogleLogin = ()=>{
		var params = {
			'clientid':'897129621545-8t6kc8f1o4p70lh2r6ol77okclnoff38.apps.googleusercontent.com',
		    'cookiepolicy':'single_host_origin',
		    'callback':function(result){
		    	if(result['status']['signed_in']){
		    		var request = gapi.client.plus.people.get(
			    		{
			    			'userId':'me'	
			    		}
		    		);
		    		request.execute(function(resp){
		    			$scope.$apply(function(){
		    				$scope.user.username = resp.displayName;
		    				$scope.user.email = resp.emails[0].value;
		    				console.log($scope.user);
		    			});
		    		});
		    	}
		    },
		    'approvalprompt':'force',
		    'scope':'https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/plus.profile.emails.read'		
		}
		gapi.auth.signIn(params);
	};
	$scope.fbuser = {
		username:"",
		email:""
	};
	$scope.onFBLogin = ()=>{
		FB.login(function(response){
			if(response.authResponse){
				FB.api('/me','GET',{feilds:'email,first_name,name,id,'},function(response){
					$scope.$apply(function(){
						$scope.fbuser.username = response.displayName;
						$scope.fbuser.email = response.email;
						console.log($scope.fbuser);
					});
				})
			}
			else{
				console.log("not logged in");
			}
		})
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
	 		if(data.status=="ok"){
	 			alert("Password has been sent to your mail.");
	 			window.location.href="./login";
	 		}
	 		else{
	 			alert("something going wrong");
	 		}	 	
	 	});
 	}
 })
 /*contact controller*/
 app.controller("contactController",($scope,myService)=>{
 	var contactData = {};
 	$scope.onsubmit = (form)=>{
 		contactData.name = $scope.name;
 		contactData.email = $scope.email;
 		contactData.query = $scope.query;
 		myService.contact(contactData,(data)=>{
 			if(data){
 				alert("Thank For Query.We will contact you soon");
 				window.location.reload();
 			}
 			else{
 				alert("not sent mail");
 			}

 		})
 	}
 })
 /*search controller*/
 app.controller("serachController",($scope,$sce,myService,fetchservice,$routeParams)=>{
 	var fd = new FormData();
 	for(let i in $routeParams){
 		fd.append(i,$routeParams[i]);
 	}
 	$scope.isShowProjects = false;
 	$scope.isShowThesis = false;
 	$scope.isShowEvents = false;
 	$scope.isShowcompetitions = false;
 	$scope.isShowJobs = false;
 	function fetchPro(data){
		// console.log(data);
		// for array of project shown into home
		$scope.myProjectsArr = [];
		// project object 
		$scope.myProjects = {
			mainImage:"",
			url:"",
			images:[],
			mainData:{}
		};
		//for carousel images
		$scope.singleProjectImages = [];
		$scope.singleProject = {
			image:"",
			projectname:""
		};
		if(data.status==1){
			$scope.projects = data.data;
			for(let project of $scope.projects){
				$scope.singleProject.image = fetchservice.fetchOneImage(project.site_image);
				$scope.singleProject.projectname = project.project_name;
				$scope.singleProjectImages.push($scope.singleProject);
				$scope.myProjects.mainImage = fetchservice.fetchOneImage(project.site_image);
				$scope.myProjects.images = $scope.myProjects.images .concat(fetchservice.convertToArrImages(project.site_image));
				$scope.myProjects.images = $scope.myProjects.images .concat(fetchservice.convertToArrImages(project.floor_image));
				$scope.myProjects.images = $scope.myProjects.images .concat(fetchservice.convertToArrImages(project.elevation_image));
				$scope.myProjects.images = $scope.myProjects.images .concat(fetchservice.convertToArrImages(project.section_image));
				$scope.myProjects.images = $scope.myProjects.images .concat(fetchservice.convertToArrImages(project.view3d_img));
				$scope.myProjects.mainData = project;
				$scope.myProjects.url = project.project_name.replace(/\//g,"or");
				$scope.myProjects.url = $scope.myProjects.url.replace(/ /g,"-");
				$scope.myProjectsArr.push($scope.myProjects);
				// for emptying $scope.myProjects
				$scope.myProjects = {
					mainImage:"",
					images:[],
					url:"",
					mainData:{}
				};
				$scope.singleProject = {
					image:"",
					projectname:""
				};
			}
			// console.log($scope.singleProjectImages);
			// console.log($scope.myProjectsArr);
		}
		else{
			console.log("check all files in which data is flowing");
		}
	};
	$scope.setFullProject = (project)=>{
		fetchservice.setFullProject(project);
		// console.log($rootScope.fullProject);
	}
	$scope.setImages = (images)=>{
		fetchservice.setImages(images);
		$scope.$parent.isShowViewImages();
	}
	$scope.myLimit = 10;
	function fectThesis(data){
		console.log(data);
		let singleThesis = {
			file:"",
			file_name:"",
			project_type:""
		}
		let fullThesis = {
			singleThesis:{},
			images:[],
			thesis:{}	
		};
		$scope.fullThesisArr = [];
		for(let thesis of data.data){
			singleThesis.file = fetchservice.fetchOneImage(thesis.casestudy);
			singleThesis.file_name = thesis.thesis_name;
			singleThesis.project_type = thesis.thesis_proj_type;
			fullThesis.singleThesis = singleThesis;
			fullThesis.images = fullThesis.images .concat(fetchservice.convertToArrImages(thesis.casestudy));
			fullThesis.images = fullThesis.images .concat(fetchservice.convertToArrImages(thesis.conceptsheet));
			fullThesis.images = fullThesis.images .concat(fetchservice.convertToArrImages(thesis.siteplan));
			fullThesis.images = fullThesis.images .concat(fetchservice.convertToArrImages(thesis.plan));
			fullThesis.images = fullThesis.images .concat(fetchservice.convertToArrImages(thesis.elevation));
			fullThesis.thesis = thesis;
			$scope.fullThesisArr.push(fullThesis);
			singleThesis = {
				file:"",
				file_name:"",
				project_type:""
			};
			fullThesis = {
				singleThesis:{},
				images:[],
				thesis:{}	
			};
		};
		$scope.categories =  ["Adaptive Reuse","Building Services design","Cultural Architecture","Transports","Urban Design/Planning",
		                       "Commercial Architecture","Educational and Research Center","Greens Building",
		                       "Healthcare Architecture","Interiors Design","Industrial Design","indexustrial and Infrastructure",
		                       "Landscape Design","Mixed-use Architecture","Recreational Architecture","Office Building","Housing Residential","Sports",
		                       "Residential and Housing","Public Facilities and Infrastructure","Recreational Architecture","Religious","Interior/exterior Design",
		                       "Landscape Architecture","sports Architecture","Urban Design","Hotels/Motel/Resort/Leisure","Institutional"];
		$scope.category = "";                       
		$scope.setCategory = (cat)=>{
			$scope.category = cat;
		}
		$scope.setThesis = (x)=>{
			fetchservice.setThesis(x);
		}
	}
	function events(data){
		if(data.status==1 ||data.status==2){
			$scope.events = data.data;
		}
		else{
			alert("please contact the website owner");
		}
	};
	$scope.saintize = (html)=>{
		return $sce.trustAsHtml(html);
	}
	$scope.setEvent = (event)=>{
		fetchservice.setEvent(event);
	}
	function jobs(data){
		if(data.status==1||data.status==2){
			$scope.jobs = data.data;
		}
		else{
			console.log("error in jobs");
		}
	}
	$scope.setJob = (job)=>{
		fetchservice.setJob(job);
	}
	function competitions(data){
		if(data.status==1||data.status==2){
			$scope.competitions = data.data;
		}
		else{
			console.log("error in competitor");
		}
	}
	$scope.setCompetition = (comp)=>{
		fetchservice.setCompetitor(comp);
	}
 	myService.runSearchQuery(fd,(data)=>{
 		//console.log(data);
 		switch(data.type){
 			case "project":
 				$scope.isShowProjects = true;
 				fetchPro(data)
 			break;
 			case "thesis":
 				$scope.isShowThesis = true;
 				fectThesis(data);
 			break;
 			case "events":
 				$scope.isShowEvents = true;
 				events(data);
 			break;
 			case "competition":
 				$scope.isShowcompetitions = true;
 				competitions(data);
 			break;
 			case "jobs":
 				$scope.isShowJobs = true;
 				jobs(data);
 			break;
 		}
 	})
 });