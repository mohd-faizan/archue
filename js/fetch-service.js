app.service("fetchservice",function($http){
	var fullProject;
	this.fetchPro = (cb)=>{
		$http({
			method:"POST",
			url:"php/fetch-project.php",
		})
		.then((resp)=>cb(resp.data),(err)=>console.log(err));
	}
	this.fetchOneImage = (image)=>{
		return image.split(",").pop();
	}
	this.convertToArrImages = (images)=>{
		return images.split(",");
	}
	this.setFullProject = (project)=>{
		localStorage.setItem("fullProject",JSON.stringify(project));
	}
    this.getFullProject = ()=>{
    	return JSON.parse(localStorage.getItem("fullProject"));
    }
    this.fetchPortfolio = (cb)=>{
    	$http({
			method:"GET",
			url:"php/fetch-portfolio.php",
		})
		.then((resp)=>cb(resp.data),(err)=>console.log(err));
    }
    this.setPortfolio = (portfolio)=>{
    	localStorage.setItem("portfolio",JSON.stringify(portfolio))
    }
    this.getPortfolio = ()=>{
    	return JSON.parse(localStorage.getItem("portfolio"));
    }
    this.fetchDessertation = (cb)=>{
    	$http({
			method:"GET",
			url:"php/fetch-dessertation.php"
		})
		.then((resp)=>cb(resp.data),(err)=>console.log(err));
    }
    this.setDessertation = (dessertation)=>{
    	localStorage.setItem("dessertation",JSON.stringify(dessertation));
    }
    this.getDessertation = ()=>{
    	return JSON.parse(localStorage.getItem("dessertation"));
    }
    this.fecthStudentWork = (cb)=>{
    	$http({
			method:"GET",
			url:"php/fetch-student.php"
		})
		.then((resp)=>cb(resp.data),(err)=>console.log(err));
    }
    this.fetchThesisReport = (cb)=>{
    	$http({
			method:"GET",
			url:"php/fetch-thesis-report.php"
		})
		.then((resp)=>{console.log(resp.data);cb(resp.data)},(err)=>console.log(err));
    }
    this.setThesisReport = (thesisReport)=>{
    	localStorage.setItem("thesisReport",JSON.stringify(thesisReport));
    }
    this.getThesisReport = ()=>{
    	return JSON.parse(localStorage.getItem("thesisReport"));
    }
    /*similar projects */
    this.fetchSimilarThesisReport = (fd,cb)=>{
    	$http({
    		method:"post",
    		url:"php/fetch-similer-thesis-report.php",
    		data:fd,
    		headers:{
    			"Content-Type":undefined
    		}
    	})
    	.then((resp)=>cb(resp.data),(err)=>console.log(err));
    }
    /*similar portfolio*/
    this.fetchSimilarPortfolio = (fd,cb)=>{
        $http({
            method:"post",
            url:"php/fetch-similer-portfolio.php",
            data:fd,
            headers:{
                "Content-Type":undefined
            }
        })
        .then((resp)=>cb(resp.data),(err)=>console.log(err));
    }
    /*fetch similar dessertation*/
    this.fetchSimilarDessertation = (fd,cb)=>{
         $http({
            method:"post",
            url:"php/fetch-similer-dessertation.php",
            data:fd,
            headers:{
                "Content-Type":undefined
            }
        })
        .then((resp)=>cb(resp.data),(err)=>console.log(err));
    }

    /*fecth blog*/
    this.fetchBlog = (cb)=>{
        $http({
            method:"get",
            url:"php/fetch-post.php",
            headers:{
                "Content-Type":undefined
            }
        })
        .then((resp)=>cb(resp.data),(err)=>console.log(err));
    }
    /*full blog store*/
    this.setFullBlog = (blog)=>{
        localStorage.setItem("blog",JSON.stringify(blog));
    }
    this.getBlog = ()=>{
        return JSON.parse(localStorage.getItem("blog"));
    }


    /*fetch thesis */
    this.fetchThesis = (cb)=>{
        $http({
            method:"get",
            url:"php/fetch-thesis.php"
        })
        .then((resp)=>cb(resp.data),(err)=>console.log(err));
    };
})

