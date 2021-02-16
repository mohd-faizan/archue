<section id="edit-profile-page" ng-controller="userProfileController">
    <div class="space"></div>
    <div class="space"></div>
    <div class="container">
        <div class="row" ng-if="isDataFound">
            <div class="col-md-3">
                <div class="profile-container">
                    <div class="d-flex justify-content-center">
                        <div class="img position-ralative">
                            <img src="../uploads/{{ user.profile }}" class="profile-image" alt="">
                            <label for="profile" ng-if="loggedIn">Change profile photo</label>
                            <input name="profile" ng-model="profile" type="file" id="profile" accept="image/*"
                                profile-photo hidden>
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
            <div class="col-md-9" ng-if="isEdit">
                <form class="row" ng-if="loggedIn">
                    <div class="col-md-12 d-flex mb-2">
                        <div class="ml-auto">
                            <button type="button" class="btn btn-default" ng-click="cancel()">Cancel</button>
                            <button class="btn btn-primary bg-color border-0" ng-click="updateProfile()">Update</button>
                        </div>
                    </div>
                    <div class="col-md-6 bg-white pt-2">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter name" name="name"
                                ng-model="user.name">
                        </div>
                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input type="text" class="form-control" id="username" placeholder="Enter name"
                                name="username" ng-model="user.username" ng-change="validateUsername()">
                                <span class="text-danger" ng-if="invalidUsername">Invalid username</span>
                        </div>

                        <div class="form-group">
                            <label for="about">About me:</label>
                            <textarea ng-model="user.about_me" row="10" cols="10" class="form-control" id="about"
                                placeholder="About me.." name="email"></textarea>
                        </div>
                    </div>
                    <div class="col-md-6 bg-white pt-2">
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" ng-model="user.email" class="form-control" id="email"
                                placeholder="Enter email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="email">Profession</label>
                            <select class="form-control" id="profession" ng-model="user.profession" name="profession">
                                <option ng-repeat="profession in professions">{{profession}}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="mobile">Mobile number:</label>
                            <input type="text" min="10" max="12" class="form-control" id="mobile"
                                placeholder="Enter mobile" name="mobile" ng-model="user.mobileno">
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-9" ng-if="!isEdit">
                <div class="d-flex" ng-if="loggedIn">
                    <button type="button" class="ml-auto btn btn-primary bg-color border-0" ng-click="edit()">Edit
                        profile</button>
                </div>
                <div>
                    <h3>About you</h3>
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
                                    <a href="#" class="dropdown-item" ng-click="setCategory($)">All</a>
                                    <a class="dropdown-item" href="#" ng-repeat="key in keys"
                                        ng-click="setCategory(key)">{{key | uppercase}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="yellow-line bg-color"></div>
                    <div class="user-upload-container">
                        <div ng-if="data.length > 0" ng-repeat="singlepro in data" class="user-upload">
                            <a href="{{singlepro.fullUrl}}">
                                <img ng-src="{{singlepro.imgPath}}" class="img-fluid">
                            </a>
                            <a href="{{singlepro.fullUrl}}">
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