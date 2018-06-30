app.directive("rootDir",()=>{
	return{
		link:(scope,elem,att)=>{
			scope.$watch('isShowModal',(newV,oldv)=>{
                if(newV){
                    elem.find('#myModal').modal('show');
                }
            });
		}
	}
});
app.directive("myNav",()=>{
	return{
		templateUrl:"include/nav.php",
		link:(scope,elem,attr)=>{
			elem.find('.open-btn').click(()=>{
				$('.open-btn').hide();
				$('.close-btn').show();
				$('#sidenav').css('margin-left','0px');
			})
			elem.find('.close-btn').click(()=>{
				$('.close-btn').hide();
				$('.open-btn').show();
				$('#sidenav,.more-drp-menu,.material-drp-menu').css('margin-left','-270px');
			})
			elem.find('.sidenav-li').not('.more-drp-btn,.material-drp-btn').click(function() {
				$('.close-btn').hide();
				$('.open-btn').show();
				$('#sidenav,.more-drp-menu,.material-drp-menu').css('margin-left','-270px');
			})
			angular.element(window).on("scroll",()=>{
				if(angular.element(window).scrollTop()>160){
					elem.find(".navbar-container").addClass("fixed-nav");
					elem.find(".navbar-container .heading").removeClass("heading-hide");
					elem.find(".navbar-container .material-dropdown-menu").addClass("onscroll-material-drop-menu");
				}
				else{
					elem.find(".navbar-container .heading").addClass("heading-hide");
					elem.find(".navbar-container").removeClass("fixed-nav");
					elem.find(".navbar-container .material-dropdown-menu").removeClass("onscroll-material-drop-menu");
				}
			})
			elem.find(".navbar-container ul li>a,nav-bottom-container  ul li").on('click',(x)=>{
				elem.find(".navbar-container ul li a,nav-bottom-container  ul li").removeClass('active');
				angular.element(x.target).addClass('active');
			})

			// More Dropdown Button Action
			elem.find('.more-drp-btn').click((event)=>{
				event.preventDefault();
				$('.more-drp-menu').css('margin-left','0px');
			})
			// More Dropdown Menu Back 
			$('.more-drp-menu #dropdown-back-btn').click(function(event) {
				event.preventDefault();
				$('.more-drp-menu').css('margin-left','-270px');	
			});

			// Material Dropdown Button
			elem.find('.material-drp-btn').click((event)=>{
				event.preventDefault();
				$('.material-drp-menu').css('margin-left','0px');
			})
			// Matrerial Dropdown Menu Back
			$('.material-drp-menu #dropdown-back-btn').click(function(event) {
				event.preventDefault();
				$('.material-drp-menu').css('margin-left','-270px');	
			});
			/*elem.find(".material-dropdown").mouseenter(()=>{
				elem.find(".material-dropdown-menu").css("display","block");
			});
			elem.find(".material-dropdown").mouseleave(()=>{
				elem.find(".material-dropdown-menu").css("display","none");
			});*/
		}
	}
});
app.directive("myCarousel",()=>{
	return{
		link:(scope,elem,attr)=>{
			var counter = 0;
			var changeImg = (event,proname)=>{
				var img = angular.element(event);
				var imgSrc = img.attr('src');
				if(img.parent().hasClass("whiteness")){
					img.parent().removeClass("whiteness");
					img.parent().siblings().addClass("whiteness");
				}
				elem.find(".main-image img").attr("src",imgSrc);
				elem.find(".main-image-con-div p").html(proname)				
			}
			elem.find('.myclass').click((e)=>{
				changeImg(e.target,angular.element(e.target).attr('data-project'));
			});
			scope.interval(()=>{
				var images = elem.find('.img-ref img');
				if(counter==3){
					counter=0;
				}
				changeImg(images[counter],scope.singleProjectImages[counter].projectname);
				counter++;
			},2000);
		}
	}
});
app.directive('uploadDir',function() {
	return{
		link:(scope,elem,attr)=>{
			elem.find('.upload-nav-link').click(function() {
				// For Active Showing
				$(this).addClass('upload-active-link');
				$(this).siblings().removeClass('upload-active-link');
				
				// Form Form Changing
				var selectedButton = $(this).attr('data-target');
				$(selectedButton).show();
				$(selectedButton).siblings().hide();
			});
		}
	}
});
app.directive('socialLogin',()=>{
	return{
		link:(scope,elem,attr)=>{
			if ($(window).width()<=340) {
				elem.find('.s-btn').children().removeClass('btn-lg');
			}else{
				elem.find('.s-btn').children().addClass('btn-lg');
			}
		}
	}
})
app.directive("imageViewer",()=>{
	return{
		link:(scope,elem,attr)=>{
			/*elem.find(".small-images-view img").click(()=>{
				console.log(this);
			});*/
			$(".small-images-view").click(($event)=>{
				var atr = angular.element($event.target).attr('src');
				$(".images>img").attr("src",atr);
			})
		}
	}
})

app.directive("limitDir",()=>{
	var myObj = {};
	myObj.link = (scope,elem,attr)=>{
		let win = angular.element(window);
		win.on("scroll",()=>{
			if(win.scrollTop()>elem.offset().top-700){
				scope.myLimit += 10;
				scope.$apply();
			}
		});
	}
	return myObj;
})

app.directive("imageViewer",()=>{
	return{
		link:(scope,elem,attr)=>{
			/*elem.find(".small-images-view img").click(()=>{
				console.log(this);
			});*/
			$(".small-images-view").click(($event)=>{
				var atr = angular.element($event.target).attr('src');
				$(".images>img").attr("src",atr);
			})
		}
	}
})
//custom filter
app.filter("myTime",()=>{
	return (time)=>{
		return time.split(" ").pop();
	}
})
 app.filter("myDate",()=>{
 	return function(date){
 		return date.split(" ")[0];
 	}
 })
 app.filter("getSingleImage",()=>{
 	return function(obj){
 		return obj.split(",").pop();
 	}
 })