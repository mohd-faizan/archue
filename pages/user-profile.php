<section id="edit-profile-page" ng-controller="userProfileController">
	<div class="space"></div>
	<div class="space"></div>
	<div class="container">
        <div class="row" ng-if="isDataFound">
            <div class="col-md-3">
                <div class="profile-container">
                    <div class="d-flex justify-content-center">
                        <div class="img position-ralative">
                            <img src="../uploads/{{ user.profile }}" class="profile-image"  alt="">
                            <label for="profile" ng-if="loggedIn">Change profile photo</label>
                            <input ng-change="onChange($event)" ng-model="profile" type="file" id="profile" accept="image/*"  hidden>
                        </div>
                    </div>
                    <div class="bg-grey d-flex pt-3 pb-3 justify-content-center">
                        <div class="text-center">
                            <h3 class="mb-0 font-weight-bold">{{ user.name }}</h3>
                            <span>{{ user.profession }}</span>
                        
                            <p class="mt-1 mb-0 font-weight-bold">Profile views</p>
                            <span>{{ user.views }}</span>
                        
                            <p class="mt-1 mb-0 font-weight-bold">Total likes</p>
                            <span>{{ user.likes }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div>
                    <h3 >About you</h3>
                    <p style="background: white;
                    padding: 17px;
                    padding-left: 10px;">{{user.about_me}}</p>
                </div>
                <div class="work-container">
                    <div class="d-flex">
						<div class="project-top-header">
							<h5>{{category | uppercase}}</h5>
							<h5 ng-if="category==''">All</h5>
							<h5 ng-if="category==undefined">All</h5>
						</div>
						<div class="category">
							<div class="dropdown">
							  <button class="dropdown-toggle bg-color" type="button" data-toggle="dropdown">
							    CATEGORY+
							  </button>
							  <div class="dropdown-menu">
							  	<a href="#" class="dropdown-item" ng-click = "setCategory($)">All</a>
							    <a class="dropdown-item" href="#" ng-repeat="key in keys" ng-click="setCategory(key)">{{key | uppercase}}</a>
							  </div>
							</div>
						</div>
					</div>
					<div class="yellow-line bg-color"></div>
                    <div class="user-upload-container" >
                        <div ng-if="data.length > 0" ng-repeat="singlepro in data" class="user-upload">
                            <a href="{{singlepro.fullUrl}}" >
                                <img ng-src="{{singlepro.imgPath}}" class="img-fluid">
                            </a>
                            <a href="{{singlepro.fullUrl}}" >
                                <p class="mt-2">{{singlepro.myTitle | uppercase}}</p>
                            </a>
                        </div>
                        <div ng-if="data.length==0" class="alert alert-danger">
                            <b>NO DATA FOUND!</b>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div ng-if="!isDataFound">
            <h2>No Data found</h2>
        </div>
    </div>
	<div class="space"></div>
	<div class="space"></div>
</section>