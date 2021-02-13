<div class="space"></div>
<div class="space"></div>
<section ng-controller="buyNowController">
    <div class="container-fluid">
        <div class="row">
            <div style="width: 500px; margin: 0 auto;">
                <div class="card">
                    <p class="m-0 mt-2 p-2 text-center">To buy lead you have to create an account. If already have an account please <a style="color: blue;cursor: pointer" ng-click="login()">login</a> instead.</p>
                    <form class="card-body" name="signupForm">
                        <label for="name">Your Name</label>
                        <input type="text" class="form-control mb-2" id="name" ng-model="buyNow.name" required>
                        <label for="name">Your Email</label>
                        <input type="email" class="form-control mb-2" id="email" ng-model="buyNow.email" required ng-blur="checkEmailExistence()">
                        <p class="error" ng-if="existCheck">Email already exist!</p>
                        <label for="name">Your Contact</label>
                        <input type="number" class="form-control mb-2" id="name" min-length="10" ng-model="buyNow.number" required>
                        <label for="password">Create Password</label>
                        <input type="password" class="form-control mb-2" name="password" id="password" ng-model="buyNow.password" required ng-pattern="passRegex">
                        <p class="error" ng-show="signupForm.password.$error.required&&signupForm.password.$dirty">
                            Required Filed *</p>
                        <p class="error" ng-show="signupForm.password.$error.pattern&&signupForm.password.$dirty">
                            Password must contain Alphabet, Number and Special Character </p>
                        <label for="cpassword">Confirm Password</label>
                        <input type="password" class="form-control mb-2" name="cpassword" id="cpassword" ng-model="buyNow.cpassword" ng-pattern="buyNow.password" required>
                        <p class="error" ng-show="signupForm.cpassword.$error.pattern">Password shoud match</p>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" ng-model="buyNow.agree" class="form-check-input" name="agree"
                                    checked required>
                                I am agree with <a href="terms-and-conditions" class="bg-font">terms and conditions</a>
                            </label>
                        </div>
                        <div class="d-flex mt-4 justify-content-center align-items-center">
                            <!-- <a ng-href="/login">Sign In instaed</a> -->
                            <button type="submit" ng-disabled="!(signupForm.$valid && !existCheck)" class="btn btn-primary bg-color" ng-click="submit()">Sign up</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="space"></div>
<div class="space"></div>