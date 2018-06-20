/*project upload controller */
app.controller("projectUploadController",($scope,$rootScope,uploadService,validationService)=>{
	$scope.isShowFeedMessage = false;
	$scope.userData = $rootScope.userData;
	$scope.proj_type = "Project Type";
	$scope.projectType = ["Adaptive Reuse","Building Services design","Cultural Architecture","Transports","Urban Design/Planning",
	                       "Commercial Architecture","Educational and Research Center","Greens Building",
	                       "Healthcare Architecture","Interiors Design","Industrial Design","indexustrial and Infrastructure",
	                       "Landscape Design","Mixed-use Architecture","Recreational Architecture","Office Building","Housing Residential","Sports",
	                       "Residential and Housing","Public Facilities and Infrastructure","Recreational Architecture","Religious","Interior/exterior Design",
	                       "Landscape Architecture","sports Architecture","Urban Design","Hotels/Motel/Resort/Leisure","Institutional"];
	// console.log($scope.userData);
	$scope.uploadfiles1 = [];	
	$scope.uploadfiles2 = [];
	$scope.uploadfiles3 = [];
	$scope.uploadfiles4 = [];
	$scope.uploadfiles5 = [];
	
	$scope.images1 = [];
	$scope.images2 = [];
	$scope.images3 = [];
	$scope.images4 = [];
	$scope.images5 = [];
	/*after filling feedback form this method occur*/
	$scope.changeFeedMessage = ()=>{
		$scope.isShowFeedMessage = true;
	}
	/*for validation project upload*/
	var imageExt = ['jpg','jpeg','png'];
	$scope.callService = (image)=>{
        return validationService.fileValidation(image,imageExt);
    }
    $scope.upload = function(form){
    	data = {};
    	data.proj_name = $scope.proj_name;
    	data.loc = $scope.loc;
    	data.ins_name = $scope.ins_name;
    	data.area = $scope.area;
    	data.proj_year = $scope.proj_year;
    	data.proj_type = $scope.proj_type;
    	data.proj_site_img_desc = $scope.proj_site_img_desc;
    	data.proj_floor_img_desc = $scope.proj_floor_img_desc;
    	data.proj_elev_img_desc = $scope.proj_elev_img_desc;
    	data.proj_sec_img_desc = $scope.proj_sec_img_desc;
    	data.proj_desc = $scope.proj_desc;
    	data.userId = $scope.userData.id;
	   var fd = new FormData();
	   angular.forEach($scope.uploadfiles1,function(file){
	     fd.append('site[]',file);

	   });
	   angular.forEach($scope.uploadfiles2,function(file){
	     fd.append('floor[]',file);
	   });
	   angular.forEach($scope.uploadfiles3,function(file){
	     fd.append('elevation[]',file);
	   });
	   angular.forEach($scope.uploadfiles4,function(file){
	     fd.append('section[]',file);
	   });
	   angular.forEach($scope.uploadfiles4,function(file){
	     fd.append('view3d[]',file);
	   });
	   for(let i in data){
	   	  fd.append(i,data[i]);
	   }
	   uploadService.upload(fd,(data)=>{
		   	console.log(data);
   			$rootScope.isShowModal = true;
	   		$rootScope.modalData = data.message;
	   		if(data.status="yes"){
	   			form.reset();
	   			$scope.uploadfiles1 = [];	
				$scope.uploadfiles2 = [];
				$scope.uploadfiles3 = [];
				$scope.uploadfiles4 = [];
				$scope.uploadfiles5 = [];
				
				$scope.images1 = [];
				$scope.images2 = [];
				$scope.images3 = [];
				$scope.images4 = [];
				$scope.images5 = [];
				
	   		}
	   });
	}
	$scope.removeImage = (arr,upload,index)=>{
		arr.splice(index,1);
		upload.splice(index,1);
	}
});

/*feedbaack controller */
app.controller("projectUploadFeedController",($scope,$rootScope,$timeout,$window,uploadService)=>{
	$scope.star = 0;
	var mydata = {};
	$scope.onFeedback = (form)=>{
		$scope.$parent.changeFeedMessage(); 
		mydata.star = $scope.star;
		mydata.feedback = $scope.feedback;
		mydata.id = $rootScope.userData.id;
		var fd = new FormData();
		for(let i in mydata){
			fd.append(i,mydata[i]);
		}
		uploadService.feedback(fd,(data)=>{
			console.log(mydata);
			$timeout(()=>{$window.location.href = './dashboard'},5000);
		});
	}

});
/*upload portfolio controller */
app.controller("portfolioUploadController",($scope,$rootScope,uploadService,validationService)=>{
	validExt = ['docx','pptx','doc','ppt','pdf'];
	$scope.validatePortfolioFile = (file)=>{
		return validationService.validPortfolio(file,validExt);
	}
	$scope.submitPortfolio = (form)=>{
		// console.log(form);
		// console.log($scope.portfolioFile);
		myData = {};
		myData.portfolio_name = $scope.portfolio_name;
		myData.portfolio_place = $scope.portfolio_place;
		myData.portfolio_college = $scope.portfolio_college;
		myData.portfolio_year = $scope.portfolio_year;
		myData.portfolioFile = $scope.portfolioFile;
		myData.userid = $rootScope.userData.id;
		var fd = new FormData();
		for(let i in myData){
			fd.append(i,myData[i]);
		}
		uploadService.uploadPortfolio(fd,(data)=>{
			if(data.status=="yes"){
				form.reset();
				alert("you have succesfully submitted");
			}
			else{
				alert("something goes wrong");

			}
		});
	}
});
/*dessertation controller*/
app.controller("dessertationController",($scope,$rootScope,uploadService,validationService)=>{
	validExt = ['docx','doc','pdf'];
	$scope.validatePortfolioFile = (file)=>{
		return validationService.validPortfolio(file,validExt);
	}
	$scope.submitDesertation = (form)=>{
		formData = {};
		formData.dissertation_name = $scope.dissertation_name;
		formData.dissertation_place = $scope.dissertation_place;
		formData.dissertation_college = $scope.dissertation_college;
		formData.dissertation_year = $scope.dissertation_year;
		formData.dissertation_file = $scope.portfolioFile;
		formData.userid = $rootScope.userData.id;
		// console.log(formData);
		var fd = new FormData();
		for(let i in formData){
			fd.append(i,formData[i]);
		}
		uploadService.uploadDessertation(fd,(data)=>{
			if(data.status=="yes"){
				form.reset();
				alert("you have succesfully submitted");
			}
			else{
				alert("something goes wrong");

			}
		});
	}
})

/*upload thesis report controller*/
app.controller("thesisReportController",($rootScope,$scope,uploadService,validationService)=>{
	validExt = ['docx','doc','pdf'];
	$scope.validatePortfolioFile = (file)=>{
		return validationService.validPortfolio(file,validExt);
	}
	$scope.submitThesisReport = (form)=>{
		formData = {};
		formData.thesis_report_name = $scope.thesis_report_name;
		formData.thesis_report_place = $scope.thesis_report_place;
		formData.thesis_report_college = $scope.thesis_report_college;
		formData.thesis_report_year = $scope.thesis_report_year;
		formData.thesis_report_file = $scope.portfolioFile;
		formData.userid = $rootScope.userData.id;
		// console.log(formData);
		var fd = new FormData();
		for(let i in formData){
			fd.append(i,formData[i]);
		}
		uploadService.uploadThesisReport(fd,(data)=>{
			if(data.status=="yes"){
				form.reset();
				alert("you have succesfully submitted");
			}
			else{
				alert("something goes wrong");

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
		myBlogData.id = $rootScope.userData.id;
		var fd = new FormData();
		for(let i in myBlogData){
			fd.append(i,myBlogData[i]);
		}
		uploadService.sUploadBlog(fd,(data)=>{
			if(data.status=="yes"){
				alert("you have upload succesfylly");
				window.location.href = "./dashboard";
			}
			else{
				alert("oops! something going wrong");
				window.location.reload();
			}
		})
	}
})

/*Thesis upload controller */
app.controller("thesisUploadController",(uploadService,$rootScope,$scope,validationService)=>{
	$scope.thesis_proj_type = "Select Type";
	$scope.projects = ["Adaptive Reuse","Building Services design","Cultural Architecture","Transports","Urban Design/Planning",
	                       "Commercial Architecture","Educational and Research Center","Greens Building",
	                       "Healthcare Architecture","Interiors Design","Industrial Design","indexustrial and Infrastructure",
	                       "Landscape Design","Mixed-use Architecture","Recreational Architecture","Office Building","Housing Residential","Sports",
	                       "Residential and Housing","Public Facilities and Infrastructure","Recreational Architecture","Religious","Interior/exterior Design",
	                       "Landscape Architecture","sports Architecture","Urban Design","Hotels/Motel/Resort/Leisure","Institutional"];
	var ext = ['jpeg','pdf'];
	$scope.callService = (file)=>{
		return validationService.fileValidation(file,ext);
	}
	$scope.images1 = [];
	$scope.images2 = [];
	$scope.images3 = [];
	$scope.images4 = [];
	$scope.images5 = [];
	$scope.uploadfiles1 = [];
	$scope.uploadfiles2 = [];
	$scope.uploadfiles3 = [];
	$scope.uploadfiles4 = [];
	$scope.uploadfiles5 = [];
	$scope.removeImage = (images,upload,index)=>{
		images.splice(index,1);
		upload.splice(index,1);
	}
	/*submit data*/
	$scope.uploadThesis = (form)=>{
		var thesisData = {};
		thesisData.thesis_name = $scope.thesis_name;
		thesisData.thesis_title = $scope.thesis_title;
		thesisData.thesis_location = $scope.thesis_location;
		thesisData.thesis_area = $scope.thesis_area;
		thesisData.thesis_year = $scope.thesis_year;
		thesisData.thesis_ins = $scope.thesis_ins;
		thesisData.thesis_guide = $scope.thesis_guide;
		thesisData.thesis_proj_type = $scope.thesis_proj_type;
		thesisData.id = $rootScope.userData.id;
		var fd = new FormData();
		angular.forEach($scope.uploadfiles1,(file)=>{
			fd.append('casestudy[]',file);
		})
		angular.forEach($scope.uploadfiles2,(file)=>{
			fd.append('conceptsheet[]',file);
		})
		angular.forEach($scope.uploadfiles3,(file)=>{
			fd.append('siteplan[]',file);
		})
		angular.forEach($scope.uploadfiles4,(file)=>{
			fd.append('plan[]',file);
		})
		angular.forEach($scope.uploadfiles5,(file)=>{
			fd.append('elevation[]',file);
		})
		for(let i in thesisData){
			fd.append(i,thesisData[i]);
		}
		uploadService.uploadThesis(fd,(data)=>{
			if(data.status=="yes"){
				alert(data.message);
				form.reset();
				window.thesis_locationation.href = "./dashboard";
			}else{
				alert(data.message);
			}
		})
	}
})

/*events controller */
app.controller("eventsController",(validationService,uploadService,$scope)=>{
	$scope.fontsize = [8,9,10,11,12,14,16,18,20,22,24,26,28,36,48,72]
	$scope.event_category = "Select Category";
	let eventData = {};
	$scope.validatePortfolioFile = (file)=>{
		ext = ['jpeg','jpg','png'];
		return validationService.validPortfolio(file,ext);
	};
	$scope.submitBlog = ()=>{
		eventData.event_content = $scope.myBlog;
		eventData.event_name = $scope.event_name;
		eventData.event_category = $scope.event_category;
		eventData.eventor_name = $scope.eventor_name;
		eventData.event_file = $scope.portfolioFile;
		let fd = new FormData();
		for(let i in eventData){
			fd.append(i,eventData[i]);
		}
		uploadService.uploadEvent(fd,(data)=>{
			if(data.status=="ok"){
				window.location.href="./events";
			}
			else{
				alert("there is error");
			}
		});
	};
})
/*job controller*/
app.controller("jobController",(uploadService,validationService,$scope)=>{
	$scope.fontsize = [8,9,10,11,12,14,16,18,20,22,24,26,28,36,48,72]
	$scope.job_category = "Select Category";
	let jobData = {};
	$scope.validatePortfolioFile = (file)=>{
		ext = ['jpeg','jpg','png'];
		return validationService.validPortfolio(file,ext);
	};
	$scope.submitBlog = ()=>{
		jobData.job_heading = $scope.job_heading;
		jobData.job_category = $scope.job_category;
		jobData.job_file = $scope.portfolioFile;
		jobData.job_provider_name = $scope.job_provider_name;
		jobData.job_content  = $scope.myBlog;
		let fd = new FormData();
		for(let i in jobData){
			fd.append(i,jobData[i]);
		}
		uploadService.uploadJob(fd,(data)=>{
			console.log(data);
			if(data.status=="ok"){
				window.location.href = "./jobs";
			}
			else{
				alert("error");
			}
		});
	}
})
/*competition controller*/
app.controller("competitionController",(uploadService,validationService,$scope)=>{
	$scope.fontsize = [8,9,10,11,12,14,16,18,20,22,24,26,28,36,48,72]
	$scope.competition_category = "Select Category";
	let competitorData = {};
	$scope.validatePortfolioFile = (file)=>{
		ext = ['jpeg','jpg','png'];
		return validationService.validPortfolio(file,ext);
	};
	$scope.submitBlog = ()=>{
		competitorData.competition_heading = $scope.competition_heading;
		competitorData.competition_category = $scope.competition_category;
		competitorData.competitor_name = $scope.competitor_name;
		competitorData.competitor_file = $scope.portfolioFile;
		competitorData.competitor_content = $scope.myBlog;
		let fd = new FormData();
		for(let i in competitorData){
			fd.append(i,competitorData[i]);
		}
		uploadService.uploadCompetition(fd,(data)=>{
			if(data.status=="ok"){
				window.location.href = "./competition"
			}
			else{
				alert("error");
			}
		})
	}
})
/*partner with us*/
app.controller("partnerController",($scope)=>{
	
})