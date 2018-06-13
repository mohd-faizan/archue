app.service("user",function(){
	this.saveDataSession = (data)=>{
		username = data.name;
		id = data.user_id;
		sessionStorage.setItem('slogin',JSON.stringify({
			username:username,
			id:id,
			loggedIn:true
		}));
		console.log(this.isLoggedIn());
	}
	this.saveDataLocal = (data)=>{
		username = data.name;
		id = data.user_id;
		localStorage.setItem('clogin',JSON.stringify({
			username:username,
			id:id,
			loggedIn:true
		}));
		console.log(this.isLoggedIn());
	}
	this.clearData = ()=>{
		if(sessionStorage.getItem("slogin")!=null){
			sessionStorage.clear('slogin');
		}
		else{
			localStorage.clear('clogin');
		}
	}
	this.isLoggedIn = ()=>{
		// console.log(sessionStorage.getItem('login'));
		var isLogged = false;
		if(sessionStorage.getItem("slogin")!=null){
			isLogged = true;
		}
		else if(localStorage.getItem("clogin")!=null){
			isLogged = true;
		}
		else{
			isLogged = false;
		}
		return isLogged;
	}
	this.getSaveData = ()=>{
		var data;
		if(sessionStorage.getItem("slogin")!=null){
			data = JSON.parse(sessionStorage.getItem("slogin"));
		}
		else if(localStorage.getItem("clogin")!=null){
			data = JSON.parse(localStorage.getItem("clogin"));
		}
		return data;
	}
})
app.service("myService",function($http){
	this.convertToForm = (formdata)=>{
		var fd = new FormData();
		for(let i in formdata){
			fd.append(i,formdata[i]);
		}
		return fd;
	}
	this.signup = (formdata,cb)=>{
		var formd = this.convertToForm(formdata);
		$http({
			method:"POST",
			data:formd,
			url:"php/sign-up.php",
			headers:{
				"Content-Type":undefined
			}
		})
		.then((resp)=>cb(resp.data),(err)=>console.log(err));
	}
	this.login = (formData,cb)=>{
		var fd = this.convertToForm(formData);
		$http({
			method:"POST",
			data:fd,
			url:"php/login.php",
			headers:{
				"Content-Type":undefined
			}
		})
		.then((resp)=>{
			cb(resp.data)
		},(error)=>console.log(error));
	}
});