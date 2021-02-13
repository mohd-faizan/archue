app.service("validationService",function($http){
	this.fileValidation = (image,ext)=>{
		myImgExt = image.name.split('.').pop().toLowerCase();
		if(ext.includes(myImgExt)){ 
			// if(image.size>(5*1024*1024)){
			// 	return false;
			// }
			// else{
			// 	return true;
			// }
			return true;
		}
		else{
			return false;
		}
	}
	this.validPortfolio = (file,validext)=>{
		myfile = file.split(".").pop().toLowerCase();
		if(validext.includes(myfile)){
			return true;
		}
		else{
			return false;
		}
	}
	this.mycompress = (file,input=null)=>{
		var fd = new FormData();
		fd.append('file',file);
		var resp = $http({
						method:"POST",
						url:"php/demo.php",
						data:fd,
						headers:{
							"Content-Type":undefined
						},
						uploadEventHandlers:{
							progress:(e)=>{
								let percent = Math.round((e.loaded/e.total)*100) + "%";
								input.parent().next().next().html(`${percent}`);
							}
						}
					});
		return resp;
	}
})
app.service('uploadService',function($http){
	this.upload = (fd,cb)=>{
		$http({
		     method: 'post',
		     url: 'php/upload-project.php',
		     data: fd,
		     headers: {'Content-Type': undefined},
		}).then((response)=>{  
		     // Store response data
		    cb(response.data);
		});
	}

	this.feedback = (fd,cb)=>{
		$http({
			method:"POST",
			data:fd,
			url:"php/feed-back.php",
			headers:{
				"Content-Type":undefined
			}
		})
		.then((resp)=>cb(resp.data),(err)=>console.log(err));
	}
	this.uploadPortfolio = (fd,cb)=>{
		$http({
			method:"POST",
			data:fd,
			url:"php/upload-portfolio.php",
			headers:{
				"Content-Type":undefined
			}
		})
		.then((resp)=>cb(resp.data),(err)=>console.log(err));
	}
	this.uploadDessertation = (fd,cb)=>{
		$http({
			method:"POST",
			data:fd,
			url:"php/upload-dessertation.php",
			headers:{
				"Content-Type":undefined
			}
		})
		.then((resp)=>cb(resp.data),(err)=>console.log(err));
	}
	this.uploadThesisReport = (fd,cb)=>{
		$http({
			method:"POST",
			data:fd,
			url:"php/upload-thsis-report.php",
			headers:{
				"Content-Type":undefined
			}
		})
		.then((resp)=>cb(resp.data),(err)=>console.log(err));
	}
	this.sUploadBlog = (fd,cb)=>{
		$http({
			method:"POST",
			data:fd,
			url:"php/upload-blog.php",
			headers:{
				"Content-Type":undefined
			}
		})
		.then((resp)=>cb(resp.data),(err)=>console.log(err));
	}
	this.uploadThesis = (fd,cb)=>{
		$http({
			method:"POST",
			data:fd,
			url:"php/upload-thesis.php",
			headers:{
				"Content-Type":undefined
			}
		})
		.then((resp)=>cb(resp.data),(err)=>console.log(err));
	}
	this.uploadEvent = (fd,cb)=>{
		$http({
			method:"POST",
			data:fd,
			url:"php/upload-event.php",
			headers:{
				"Content-Type":undefined
			}
		})
		.then((resp)=>cb(resp.data),(err)=>console.log(err));
	}
	this.uploadJob = (fd,cb)=>{
		$http({
			method:"POST",
			data:fd,
			url:"php/upload-job.php",
			headers:{
				"Content-Type":undefined
			}
		})
		.then((resp)=>cb(resp.data),(err)=>console.log(err));
	}
	this.uploadCompetition = (fd,cb)=>{
		$http({
			method:"POST",
			data:fd,
			url:"php/upload-competition.php",
			headers:{
				"Content-Type":undefined
			}
		})
		.then((resp)=>cb(resp.data),(err)=>console.log(err));
	}
	this.uploadVendor = (fd,cb)=>{
		$http({
			method:"POST",
			data:fd,
			url:"php/upload-partner.php",
			headers:{
				"Content-Type":undefined
			}
		})
		.then((resp)=>cb(resp.data),(err)=>console.log(err));
	}
})