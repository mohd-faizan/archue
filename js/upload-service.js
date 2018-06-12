app.service("validationService",function(){
	this.fileValidation = (image,ext)=>{
		myImgExt = image.split('/').pop();
		if(ext.includes(myImgExt)){ 
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
})