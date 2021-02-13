<div class="my-tetimonial">
    <div id="demo1" class="carousel slide " data-ride="carousel" ng-controller="testimonialController">
        <ul class="carousel-indicators">
            <li data-target="#demo1" data-slide-to="{{$index}}" class="active" ng-repeat="testimonial in testimonials"></li>
           
        </ul>
        <div class="carousel-inner">
            <div class="carousel-item my-carousel" ng-class="{'active': $index===0}" ng-repeat="testimonial in testimonials">
                <div class="image text-center mb-3">
                    <img src="{{testimonial.src}}" width="{{testimonial.isResize ? '100' : '200'}}" >
                </div>
                <!-- <div class="my-caption">
                    <h4 class="text-center">{{testimonial.caption}}</h4>
                </div> -->
                <div class="text">
                    <h2 class="text-center font-weight-bold">{{testimonial.text}}</h2>
                </div>
            </div>

        </div>
    </div>
</div>