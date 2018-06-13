app.controller("myHomeController",($scope,fetchservice)=>{
	fetchservice.fetchPro((data)=>{
		// console.log(data);
		// for array of project shown into home
		$scope.myProjectsArr = [];
		// project object 
		$scope.myProjects = {
			mainImage:"",
			images:[],
			mainData:{}
		};
		//for carousel images
		$scope.singleProjectImages = [];
		$scope.singleProject = {
			image:"",
			projectname:""
		};
		if(data.status=="yes"){
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
				$scope.myProjectsArr.push($scope.myProjects);
				// for emptying $scope.myProjects
				$scope.myProjects = {
					mainImage:"",
					images:[],
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
	});
	$scope.setFullProject = (project)=>{
		fetchservice.setFullProject(project);
		// console.log($rootScope.fullProject);
	}
})


app.controller("fullProjectController",($scope,$routeParams,fetchservice)=>{
	// console.log($routeParams.projectid);
	$scope.fullProject = fetchservice.getFullProject();
	console.log($scope.fullProject.mainData.site_image);
	$scope.siteImages = fetchservice.convertToArrImages($scope.fullProject.mainData.site_image);
	$scope.floorImages = fetchservice.convertToArrImages($scope.fullProject.mainData.floor_image)
	$scope.elevationImages = fetchservice.convertToArrImages($scope.fullProject.mainData.elevation_image)
	$scope.sectionImages = fetchservice.convertToArrImages($scope.fullProject.mainData.section_image)
	$scope.view3dImages = fetchservice.convertToArrImages($scope.fullProject.mainData.view3d_img)
	console.log($scope.siteImages);
})


app.controller("projectsController",($scope,fetchservice)=>{
	fetchservice.fetchPro((data)=>{
		// console.log(data);
		$scope.projects = data.data;
		// for array of project shown into home
		$scope.myProjectsArr = [];
		// project object 
		$scope.myProjects = {
			category:"",
			mainImage:"",
			images:[],
			mainData:{}
		};
		//for carousel images
		$scope.singleProjectImages = [];
		$scope.singleProject = {
			image:"",
			projectname:""
		};
		for(let project of $scope.projects){
			$scope.singleProject.image = fetchservice.fetchOneImage(project.site_image);
			$scope.singleProject.projectname = project.project_name;
			$scope.singleProjectImages.push($scope.singleProject);
			$scope.myProjects.category = project.project_type;
			$scope.myProjects.mainImage = fetchservice.fetchOneImage(project.site_image);
			$scope.myProjects.images = $scope.myProjects.images .concat(fetchservice.convertToArrImages(project.site_image));
			$scope.myProjects.images = $scope.myProjects.images .concat(fetchservice.convertToArrImages(project.floor_image));
			$scope.myProjects.images = $scope.myProjects.images .concat(fetchservice.convertToArrImages(project.elevation_image));
			$scope.myProjects.images = $scope.myProjects.images .concat(fetchservice.convertToArrImages(project.section_image));
			$scope.myProjects.images = $scope.myProjects.images .concat(fetchservice.convertToArrImages(project.view3d_img));
			$scope.myProjects.mainData = project;
			$scope.myProjectsArr.push($scope.myProjects);
			// for emptying $scope.myProjects
			$scope.myProjects = {
				category:"",
				mainImage:"",
				images:[],
				mainData:{}
			};
			$scope.singleProject = {
				image:"",
				projectname:""
			};
		}
		// console.log($scope.myProjectsArr);
	});
	$scope.setFullProject = (project)=>{
		fetchservice.setFullProject(project);
		// console.log($rootScope.fullProject);
	}
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
})
/*portfolio */
app.controller("fetchPortfolioController",($scope,fetchservice)=>{
	fetchservice.fetchPortfolio((data)=>{
		if(data.status=="yes"){
			$scope.portfolios = data.data;
		}
	});
	$scope.setportfolio = (portfolio)=>{
		fetchservice.setPortfolio(portfolio);
	}
})


/*full portfolio constroller*/
app.controller("fullPortfolioController",($sce,$scope,fetchservice)=>{
	$scope.portfolio = fetchservice.getPortfolio();
	// let file = $scope.portfolio.portfolio_file.split(" ");
	$scope.url = $sce.trustAsResourceUrl("http://docs.google.com/gview?url=http://archue.professionalaccountingnow.com/upload-file/"
		+$scope.portfolio.portfolio_file
		+"&embedded=true");
	var fd = new FormData();
	fd.append('id',$scope.portfolio.portfolio_id);
	fetchservice.fetchSimilarPortfolio(fd,(data)=>{
		$scope.similarPorts = data.data;
	})
	$scope.setportfolio = (portfolio)=>{
		fetchservice.setPortfolio(portfolio);
	}
})

/*dessertation controller*/
app.controller("fetchDessertController",($scope,fetchservice)=>{
	fetchservice.fetchDessertation((data)=>{
		if(data.status=="yes"){
			$scope.dessertations = data.data;
		}
	});
	$scope.setDessertation = (dessertation)=>{
		fetchservice.setDessertation(dessertation);
	}
})

/* full dessertation controller */
app.controller("fetchFullDessert",($sce,$scope,fetchservice)=>{
	$scope.dessertation = fetchservice.getDessertation();
	$scope.url = $sce.trustAsResourceUrl("https://docs.google.com/gview?url=http://archue.professionalaccountingnow.com/upload-file/"
		+$scope.dessertation.dessertation_file+
		"&embedded=true");
	var fd = new FormData();
	fd.append('id',$scope.dessertation.dessertation_id);
	fetchservice.fetchSimilarDessertation(fd,(data)=>{
		$scope.similarDessertations = data.data;
	})
	$scope.setDessertation = (dessertation)=>{
		fetchservice.setDessertation(dessertation);
	}
})

/*fetch student projects*/
app.controller("studentWorkController",($scope,fetchservice)=>{
	// console.log(data);
	// for array of project shown into home
	$scope.myStudentProjectsArr = [];
	// project object 
	$scope.myStudentProjects = {
		mainImage:"",
		images:[],
		mainData:{}
	};
	//for carousel images
	$scope.singleStudentProjectImages = [];
	$scope.singleStudentProject = {
		image:"",
		projectname:""
	};
	fetchservice.fecthStudentWork((data)=>{
		if(data.status=="yes"){
			$scope.studentWorkProjects = data.data;
			for(let project of $scope.studentWorkProjects){
				$scope.singleStudentProject.image = fetchservice.fetchOneImage(project.site_image);
				$scope.singleStudentProject.projectname = project.project_name;
				$scope.singleStudentProjectImages.push($scope.singleStudentProject);
				$scope.myStudentProjects.mainImage = fetchservice.fetchOneImage(project.site_image);
				$scope.myStudentProjects.images = $scope.myStudentProjects.images .concat(fetchservice.convertToArrImages(project.site_image));
				$scope.myStudentProjects.images = $scope.myStudentProjects.images .concat(fetchservice.convertToArrImages(project.floor_image));
				$scope.myStudentProjects.images = $scope.myStudentProjects.images .concat(fetchservice.convertToArrImages(project.elevation_image));
				$scope.myStudentProjects.images = $scope.myStudentProjects.images .concat(fetchservice.convertToArrImages(project.section_image));
				$scope.myStudentProjects.images = $scope.myStudentProjects.images .concat(fetchservice.convertToArrImages(project.view3d_img));
				$scope.myStudentProjects.mainData = project;
				$scope.myStudentProjectsArr.push($scope.myStudentProjects);
				// for emptying $scope.myProjects
				$scope.myStudentProjects = {
					mainImage:"",
					images:[],
					mainData:{}
				};
				$scope.singleStudentProject = {
					image:"",
					projectname:""
				};
			}
		}
	})
})
/*fetch thesis report controller*/
// app.controller("fetchThesisReportController",($rootScope,$scope,fetchservice)=>{
// 	fetchservice.fetchThesisReport((data)=>{
// 		if(data.status=="yes"){
// 			$scope.thesis_reports = data.data;
// 		}
// 	});
	
// })
/*full thesis report controller */
app.controller("fullThesisReportCtrl",($sce,$scope,fetchservice)=>{	
	$scope.thesis_report = fetchservice.getThesisReport();
	$scope.url = $sce.trustAsResourceUrl("upload-file/"+$scope.thesis_report.thesis_report_file);
	var fd = new FormData();
	fd.append('id',$scope.thesis_report.thesis_report_id);
	fetchservice.fetchSimilarThesisReport(fd,(data)=>{
		if(data.status=="yes"){
			$scope.similarThesises = data.data;
		}
	});
	$scope.getTrustUrl = ()=>{
		return "uplaod-file/"+$sce.trustAsResourceUrl($scope.thesis_report.thesis_report_file);
	}
})

/*blog fetched*/
app.controller("fetchBlogController",($sce,fetchservice,$scope)=>{
	fetchservice.fetchBlog((data)=>{
		if(data.status=="yes"){
			$scope.blogs = data.resp;
		}
		else{
			console.log(data.resp);
		}
	});
	$scope.trust = (html)=>{
		return $sce.trustAsHtml(html);
	}
	$scope.setBlog = (blog)=>{
		fetchservice.setFullBlog(blog);
	}
})

app.controller("fullBlogController",($sce,$scope,fetchservice)=>{
	$scope.blog = fetchservice.getBlog();
	console.log($scope.blog);
	$scope.trust = (html)=>{
		return $sce.trustAsHtml(html);
	}
})

