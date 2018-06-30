app.controller("myHomeController",($scope,fetchservice)=>{
	fetchservice.fetchPro((data)=>{
		// console.log(data);
		// for array of project shown into home
		$scope.myProjectsArr = [];
		// project object 
		$scope.myProjects = {
			mainImage:"",
			url:"",
			approve:"",
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
				$scope.myProjects.approve = project.project_approve;
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
			console.log($scope.myProjectsArr);
		}
		else{
			console.log("check all files in which data is flowing");
		}

	});
	$scope.setFullProject = (project)=>{
		fetchservice.setFullProject(project);
		// console.log($rootScope.fullProject);
	}
	$scope.setImages = (images)=>{
		fetchservice.setImages(images);
		$scope.$parent.isShowViewImages();
	}
	$scope.isShowApprove = true;
	$scope.isShowUnApprove = ()=>{
		$scope.isShowApprove = false;
	}
	$scope.isShowsApprove = ()=>{
		$scope.isShowApprove = true;
	}
})


app.controller("fullProjectController",($location,deleteService,$scope,fetchservice)=>{
	// console.log($routeParams.projectid);
	$scope.fullProject = fetchservice.getFullProject();
	/*console.log($scope.fullProject.mainData.site_image);*/
	$scope.siteImages = fetchservice.convertToArrImages($scope.fullProject.mainData.site_image);
	$scope.floorImages = fetchservice.convertToArrImages($scope.fullProject.mainData.floor_image)
	$scope.elevationImages = fetchservice.convertToArrImages($scope.fullProject.mainData.elevation_image)
	$scope.sectionImages = fetchservice.convertToArrImages($scope.fullProject.mainData.section_image)
	$scope.view3dImages = fetchservice.convertToArrImages($scope.fullProject.mainData.view3d_img)
	/*console.log($scope.siteImages);*/
	$scope.setImages = (images)=>{
		fetchservice.setImages(images);
		$scope.$parent.isShowViewImages();
	}
	$scope.approve = (id)=>{
		deleteService.approveProject(id,(data)=>{
			console.log(data);
		});
	}
	$scope.del = (id)=>{
		var isDel = confirm("Do you want to delete");
		if(isDel){
			deleteService.delete(id,(data)=>{
				console.log(data);
				$location.path('./projects');
			});
		}
		else{
			console.log("no deleted");
		}
	}
})


app.controller("projectsController",($route,$scope,fetchservice)=>{
	fetchservice.fetchPro((data)=>{
		// console.log(data);
		$scope.projects = data.data;
		// for array of project shown into home
		$scope.myProjectsArr = [];
		// project object 
		$scope.myProjects = {
			category:"",
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
			$scope.myProjects.url = project.project_name.replace(/\//g,"or");
			$scope.myProjects.url = $scope.myProjects.url.replace(/ /g,"-");
			$scope.myProjects.mainData = project;
			$scope.myProjectsArr.push($scope.myProjects);
			// for emptying $scope.myProjects
			$scope.myProjects = {
				category:"",
				mainImage:"",
				url:"",
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
	$scope.category = " ";                       
	$scope.setCategory = (cat)=>{
		$scope.category = cat;
		console.log(cat);
	}
	
})
/*portfolio */
app.controller("fetchPortfolioController",($scope,fetchservice)=>{
	fetchservice.fetchPortfolio((data)=>{
		if(data.status=="yes"){
			$scope.portfolios = data.data;
			for(let portfolio of $scope.portfolios){
				portfolio.url = portfolio.portfolio_name.replace(/\//g,"-");
			}
		}
	});
	$scope.setportfolio = (portfolio)=>{
		fetchservice.setPortfolio(portfolio);
	}
})


/*full portfolio constroller*/
app.controller("fullPortfolioController",(deleteService,$sce,$scope,fetchservice)=>{
	$scope.portfolio = fetchservice.getPortfolio();
	// let file = $scope.portfolio.portfolio_file.split(" ");

	$scope.url = $sce.trustAsResourceUrl("http://docs.google.com/gview?url=http://archue.professionalaccountingnow.com/upload-file/"
		+$scope.portfolio.portfolio_file
		+"&embedded=true");
	var fd = new FormData();
	fd.append('id',$scope.portfolio.portfolio_id);
	$scope.del = (id)=>{
		var isDel = confirm("Do you want to delete");
		if(isDel){
			deleteService.deletePortfolio(id,(data)=>{
				if(data.status=="ok"){
					alert("succesfully deleted");
					window.location.href="./portfolio";
				}
				else{
					alert("not deleted");
				}
			});
		}
		else{
			console.log("do not delete portfolio");
		}
	}
})

app.controller("fetchThesisReportController",(fetchservice,$scope)=>{
	fetchservice.fetchThesisReport((data)=>{
		if(data.status=="yes"){
			$scope.common_thesis_reports = data.data;
		}
	});
	$scope.setThesisReport = (theisReport)=>{
		fetchservice.setThesisReport(theisReport);
	}
})

/*dessertation controller*/
app.controller("fetchDessertController",($scope,fetchservice)=>{
	fetchservice.fetchDessertation((data)=>{
		if(data.status=="yes"){
			$scope.dessertations = data.data;
			for(let dessertation of $scope.dessertations){
				dessertation.url = dessertation.dessertation_name.replace(/\//g,"-");
			}
			
		}
	});
	$scope.setDessertation = (dessertation)=>{
		fetchservice.setDessertation(dessertation);
	}
})

/* full dessertation controller */
app.controller("fetchFullDessert",(deleteService,$sce,$scope,fetchservice)=>{
	$scope.dessertation = fetchservice.getDessertation();
	$scope.url = $sce.trustAsResourceUrl("https://docs.google.com/gview?url=http://archue.professionalaccountingnow.com/upload-file/"
		+$scope.dessertation.dessertation_file+
		"&embedded=true");
	$scope.del = (id)=>{
		var isDel = confirm("Do you want to delete");
		if(isDel){
			deleteService.deleteDessertation(id,(data)=>{
				if(data.status=="ok"){
					alert("deleted");
					window.location.href="./dessertation";
				}
				else{
					alert("not deleted something going wrong");
				}
			})
		}
		else{
			console.log("not deleted");
		}
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
	});
	$scope.category = "";
	$scope.setCategory = (cat)=>{
		$scope.category = cat;
	}
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
app.controller("fullThesisReportCtrl",(deleteService,$sce,$scope,fetchservice)=>{	
	$scope.thesis_report = fetchservice.getThesisReport();
	$scope.url = $sce.trustAsResourceUrl("upload-file/"+$scope.thesis_report.thesis_report_file);
	$scope.getTrustUrl = ()=>{
		return "uplaod-file/"+$sce.trustAsResourceUrl($scope.thesis_report.thesis_report_file);
	}
	$scope.del = (id)=>{
		var isDel = confirm("Do you want to delete");
		if(isDel){
			deleteService.deleteThesisReport(id,(data)=>{
				console.log(data);
				if(data.status=="ok"){
					alert("deleted succesfully");
					window.location.href="./thesis-report";
				}
				else{
					alert("not deleted ");
				}
			})
		}
	}
})

/*blog fetched*/
app.controller("fetchBlogController",(deleteService,$sce,fetchservice,$scope)=>{
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
	$scope.del = (id)=>{
		var isDel = confirm("Do You Want To delete the blog");
		if(isDel==true){
			deleteService.deleteBlog(id,(data)=>{
				console.log(data);
				alert("you have succesfully deleted");
				window.location.reload();
			});
		}
		else{
			console.log("not deleted");
		}
	}
})


/*fetch thesis*/
app.controller("fetchThesisController",($scope,fetchservice)=>{
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
	fetchservice.fetchThesis((data)=>{
		for(let thesis of data){
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
		}
		console.log($scope.fullThesisArr);
		$scope.isShowApprove = true;
		$scope.isShowsApprove = ()=>{
			$scope.isShowApprove = true;
		}
		$scope.isShowUnApprove = ()=>{
			$scope.isShowApprove = false;	
		}
	});
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
})
/*fetch full project*/
app.controller("fullThesisController",(deleteService,$scope,fetchservice)=>{
	$scope.thesis = fetchservice.getThesis();
	$scope.setImages = (images)=>{
		fetchservice.setImages(images);
		$scope.$parent.isShowViewImages();
	}
	$scope.approve = (id)=>{
		deleteService.approveThesis(id,(data)=>{
			if(data.status=="ok"){
				alert("succesfully approved");
			}
			else{
				alert("error");
			}
		})
	}
	$scope.del = (id)=>{
		var isDel = confirm("do you want delete");
		if(isDel){
			deleteService.deleteThesis(id,(data)=>{
				if(data.status=="ok"){
					alert("deleted succesfully");
					window.location.href="./thesis";
				}
				else{
					alert("not deleted");
				}
			})
		}
		else{
			console.log("not deleted");
		}
	}

})
/*fetch events*/
app.controller("fetchEventsController",($sce,fetchservice,$scope)=>{
	fetchservice.fetchEvents((data)=>{
		if(data.status=="yes"){
			$scope.events = data.data;
		}
		else{
			alert("please contact the website owner");
		}
	});
	$scope.saintize = (html)=>{
		return $sce.trustAsHtml(html);
	}
	$scope.setEvent = (event)=>{
		fetchservice.setEvent(event);
	}
})
/*full event*/
app.controller("fullEventController",($sce,fetchservice,$scope)=>{
	$scope.event = fetchservice.getEvent();
	$scope.sanitize = (html)=>{
		return $sce.trustAsHtml(html);
	}
})
/*fetch jobs*/
app.controller("fetchJobController",($sce,fetchservice,$scope)=>{
	fetchservice.fetchJob((data)=>{
		if(data.status=="yes"){
			$scope.jobs = data.data;
		}
		else{
			console.log("error in jobs");
		}
	})
	$scope.sanitize = (html)=>{
		return $sce.trustAsHtml(html);
	}
	$scope.setJob = (job)=>{
		fetchservice.setJob(job);
	}
})
app.controller("fullJobController",($sce,fetchservice,$scope)=>{
	$scope.job = fetchservice.getJob();
	$scope.sanitize = (html)=>{
		return $sce.trustAsHtml(html);
	}
})
/*fetch competitor*/
app.controller("fetchCompetitionController",($sce,fetchservice,$scope)=>{
	fetchservice.fetchCompetitor((data)=>{
		if(data.status=="yes"){
			$scope.competitions = data.data;
		}
		else{
			console.log("error in competitor");
		}
	})
	$scope.sanitize = (html)=>{
		return $sce.trustAsHtml(html);
	}
	$scope.setCompetition = (comp)=>{
		fetchservice.setCompetitor(comp);
	}
})

app.controller("fullCompController",(fetchservice,$sce,$scope)=>{
	$scope.competition = fetchservice.getCompetition();
	$scope.sanitize = (html)=>{
		return $sce.trustAsHtml(html);
	}
})

app.controller("architectController",(fetchservice,$scope)=>{
	fetchservice.fetchArchitect((data)=>{
		if(data.status=="ok"){
			$scope.architects = data.data
		}
		else{
			console.log("error");
		}
	});
})

app.controller("materialRequestController",($scope,fetchservice)=>{
	fetchservice.fetchMaterial((data)=>{
		if(data.status=="ok"){
			$scope.materials = data.data;
		}
		else{
			console.log(error);
		}
	})
})
