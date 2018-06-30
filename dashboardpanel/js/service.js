app.service("deleteService",function($http){
	this.deleteBlog = (id,cb)=>{
		var fd = new FormData();
		fd.append("id",id);
		$http({
			method:"POST",
			data:fd,
			url:"php/delete-blog.php",
			headers:{
				"Content-Type":undefined
			}
		})
		.then((resp)=>cb(resp.data),(err)=>console.log(err));
	}
	this.approveProject = (id,cb)=>{
		var fd = new FormData();
		fd.append("id",id);
		$http({
			method:"POST",
			data:fd,
			url:"php/approve-project.php",
			headers:{
				"Content-Type":undefined
			}
		})
		.then((resp)=>cb(resp.data),(err)=>console.log(err))
	}
	this.delete = (id,cb)=>{
		var fd = new FormData();
		fd.append("id",id);
		$http({
			method:"POST",
			data:fd,
			url:"php/delete-project.php",
			headers:{
				"Content-Type":undefined
			}
		})
		.then((resp)=>cb(resp.data),(err)=>console.log(err))
	}
	this.deletePortfolio = (id,cb)=>{
		var fd = new FormData();
		fd.append("id",id);
		$http({
			method:"POST",
			data:fd,
			url:"php/delete-portfolio.php",
			headers:{
				"Content-Type":undefined
			}
		})
		.then((resp)=>cb(resp.data),(err)=>console.log(err))
	}
	this.deleteThesisReport = (id,cb)=>{
		var fd = new FormData();
		fd.append("id",id);
		$http({
			method:"POST",
			data:fd,
			url:"php/delete-thesis-report.php",
			headers:{
				"Content-Type":undefined
			}
		})
		.then((resp)=>cb(resp.data),(err)=>console.log(err))
	}
	this.deleteDessertation = (id,cb)=>{
		var fd = new FormData();
		fd.append("id",id);
		$http({
			method:"POST",
			data:fd,
			url:"php/delete-dessertation.php",
			headers:{
				"Content-Type":undefined
			}
		})
		.then((resp)=>cb(resp.data),(err)=>console.log(err))
	}
	this.deleteThesis = (id,cb)=>{
		var fd = new FormData();
		fd.append("id",id);
		$http({
			method:"POST",
			data:fd,
			url:"php/delete-thesis.php",
			headers:{
				"Content-Type":undefined
			}
		})
		.then((resp)=>cb(resp.data),(err)=>console.log(err))
	}
	this.approveThesis = (id,cb)=>{
		var fd = new FormData();
		fd.append("id",id);
		$http({
			method:"POST",
			data:fd,
			url:"php/approve-thesis.php",
			headers:{
				"Content-Type":undefined
			}
		})
		.then((resp)=>cb(resp.data),(err)=>console.log(err))
	}
});