app.directive("rootDir", () => {
	return {
		link: (scope, elem, att) => {
			scope.$watch('[isShowModal,isShowThanksModal]', (newV, oldv) => {
				if (newV) {
					elem.find('#myModal').modal('show');
				}
			});
			$('#myModal').on('hide.bs.modal', function (e) {
				console.log('123');
				window.location.href = "./dashboard";
			})
			// let isIncrement = true;
			scope.increaseLike = (like) => {
				let likes;
				if ($(like).hasClass("fa-heart-o")) {
					likes = parseInt($(like).text()) + 1;
					$(like).removeClass("fa-heart-o");
					$(like).addClass("fa-heart text-danger");
				}
				else {
					$(like).removeClass("fa-heart text-danger");
					$(like).addClass("fa-heart-o");
					likes = parseInt($(like).text()) - 1;
				}
				$(like).html('&nbsp;' + likes);
			}
			scope.increaseView = (view, other = false) => {

			}

		}
	}
});
app.directive("loginDir", () => {
	return {
		link: (scope, elem, attrs) => {
			scope.$watch("isLoginWith", (newV, oldVal) => {
				if (newV) {
					elem.find("#loginModal").modal({
						backdrop: 'static',
						keyboard: false,
						show: true
					});
				}
			})
		}
	}
})
app.directive("myNav", () => {
	return {
		templateUrl: "include/nav.php",
		link: (scope, elem, attr) => {
			elem.find(".black-layer").click(() => {
				$('#sidenav').css('margin-left', '-270px');
				$('.black-layer').hide();
				$('.close-btn').hide();
				$('.open-btn').show();
			});
			elem.find('.open-btn').click(() => {
				$('.black-layer').show();
				$('.open-btn').hide();
				$('.close-btn').show();
				$('#sidenav').css('margin-left', '0px');
			})
			elem.find('.close-btn').click(() => {
				$('.black-layer').hide();
				$('.close-btn').hide();
				$('.open-btn').show();
				$('#sidenav,.more-drp-menu,.material-drp-menu').css('margin-left', '-270px');
			})
			elem.find('.sidenav-li').not('.more-drp-btn,.material-drp-btn').click(function () {
				$('.close-btn').hide();
				$('.black-layer').hide();
				$('.open-btn').show();
				$('#sidenav,.more-drp-menu,.material-drp-menu').css('margin-left', '-270px');
			})
			angular.element(window).on("scroll", () => {
				if (angular.element(window).scrollTop() > 160) {
					elem.find(".navbar-container").addClass("fixed-nav");
					elem.find(".navbar-container .heading").removeClass("heading-hide");
					elem.find(".navbar-container .material-dropdown-menu").addClass("onscroll-material-drop-menu");
				}
				else {
					elem.find(".navbar-container .heading").addClass("heading-hide");
					elem.find(".navbar-container").removeClass("fixed-nav");
					elem.find(".navbar-container .material-dropdown-menu").removeClass("onscroll-material-drop-menu");
				}
			})

			elem.find(".navbar-container ul li>a").on('click', (x) => {
				elem.find(".navbar-container ul li a").removeClass('active');
				elem.find(".nav-bottom-container ul li > a").removeClass('active');
				angular.element(x.target).addClass('active');
			})

			elem.find(".nav-bottom-container ul li>a").on('click', (x) => {
				elem.find(".navbar-container ul li a").removeClass('active');
				elem.find(".nav-bottom-container ul li>a").removeClass('active');
				angular.element(x.target).addClass('active');
			});

			elem.find(".material-dropdown-item > a").mouseenter((e) => {
				$('.material-dropdown-item > a').removeClass('active-material-item');
				$(e.target).addClass('active-material-item');
			});
			elem.find('.material-dropdown').mouseenter(() => {
				$('.material-dropdown-menu').show();
				// $('body').css("overflow","hidden");
			})
			elem.find('.material-dropdown').mouseleave(() => {
				$('.material-dropdown-menu').hide();
				// $('body').css("overflow","auto");

			})
			elem.find('.material-dropdown-menu').mouseleave(() => {
				$('.material-dropdown-menu').hide();
				$('.material-dropdown-item > a').removeClass('active-material-item');
				$('#first-material-dropdown-item').addClass('active-material-item');
			})
			elem.find('.material-sub-dropdown li a').click(() => {
				$('.material-dropdown-menu').hide();
			})
			elem.find(".material-dropdown-item a").click(() => {
				$('.material-dropdown-menu').hide();
			})
			// More Dropdown Button Action
			elem.find('.more-drp-btn').click((event) => {
				event.preventDefault();
				$('.more-drp-menu').css('margin-left', '0px');
			})
			// More Dropdown Menu Back 
			$('.more-drp-menu #dropdown-back-btn').click(function (event) {
				event.preventDefault();
				$('.more-drp-menu').css('margin-left', '-270px');
			});

			// Material Dropdown Button
			elem.find('.material-drp-btn').click((event) => {
				event.preventDefault();
				$('.material-drp-menu').css('margin-left', '0px');
			})
			// Matrerial Dropdown Menu Back
			$('.material-drp-menu #dropdown-back-btn').click(function (event) {
				event.preventDefault();
				$('.material-drp-menu').css('margin-left', '-270px');
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





app.directive("homeDir", () => {
	return {
		link: (scope, elem, attr) => {
			$(".project-heading,.full-project-image,.ml-auto a").click(() => {
				$(".navbar-container ul li a").removeClass('active');
				$(".nav-bottom-container ul li>a").removeClass('active');
				$(".navbar-container ul li:nth-child(2) a").addClass('active');
			});
		}
	}
})
app.directive("myCarousel", ($timeout) => {
	return {
		link: (scope, elem, attr) => {

			$(".main-image").click(() => {
				$(".navbar-container ul li a").removeClass('active');
				$(".nav-bottom-container ul li>a").removeClass('active');
				$(".navbar-container ul li:nth-child(2) a").addClass('active');
			});

			var counter = 0;
			var changeImg = (event, proname, project) => {
				if (typeof project == "string") {
					project = JSON.parse(project);
				}
				var img = angular.element(event);
				var imgSrc = img.attr('src');
				if (img.parent().hasClass("whiteness")) {
					img.parent().removeClass("whiteness");
					img.parent().siblings().addClass("whiteness");
				}
				elem.find(".main-image img").attr("src", imgSrc);
				elem.find(".main-image-con-div p").html(proname);
				elem.find(".main-image").attr('href', './full-project/' + project.mainData.project_id + "/" + project.url);
				if (elem.find(".main-image").on('click', () => {
					scope.setFullProject(project);
				}));
			}
			elem.find('.myclass').click((e) => {
				changeImg(e.target, angular.element(e.target).attr('data-project'), angular.element(e.target).attr('data-fullproject'));
			});
			//typeof scope.singleProjectImages=='Array'
			// console.log( scope.singleProjectImages);
			if (typeof scope.singleProjectImages == 'object' && scope.singleProjectImages.length != 0 && scope.myProjectsArr != 0) {
				scope.interval(() => {
					var images = elem.find('.img-ref img');
					if (counter == images.length) {
						counter = 0;
					}
					changeImg(images[counter], scope.singleProjectImages[counter].projectname, scope.myProjectsArr[counter]);
					counter++;
				}, 2000);
			}
		}
	}
});
app.directive('uploadDir', function () {
	return {
		link: (scope, elem, attr) => {
			elem.find('.upload-nav-link').click(function () {
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
app.directive('socialLogin', () => {
	return {
		link: (scope, elem, attr) => {
			if ($(window).width() <= 340) {
				elem.find('.s-btn').children().removeClass('btn-lg');
			} else {
				elem.find('.s-btn').children().addClass('btn-lg');
			}
		}
	}
})
app.directive("imageViewer", () => {
	return {
		link: (scope, elem, attr) => {
			/*elem.find(".small-images-view img").click(()=>{
				console.log(this);
			});*/
			$(".small-images-view").click(($event) => {
				var atr = angular.element($event.target).attr('src');
				$(".images>img").attr("src", atr);
			})
		}
	}
})

app.directive("limitDir", () => {
	var myObj = {};
	myObj.link = (scope, elem, attr) => {
		let win = angular.element(window);
		win.on("scroll", () => {
			if (win.scrollTop() > elem.offset().top - 700) {
				scope.myLimit += 5;
				scope.$apply();
			}
		});
	}
	return myObj;
})

app.directive("imageViewer", () => {
	return {
		link: (scope, elem, attr) => {
			/*elem.find(".small-images-view img").click(()=>{
				console.log(this);
			});*/
			$(".small-images-view").click(($event) => {
				var atr = angular.element($event.target).attr('src');
				$(".images>img").attr("src", atr);
			})
		}
	}
})
//custom filter
