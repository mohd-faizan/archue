<div id="demo" class="carousel slide my-carousal-container" data-ride="carousel" ng-controller="CarouselCtrl">
    <ul class="carousel-indicators">
        <li data-target="#demo" data-slide-to="0" class="active"></li>
        <li data-target="#demo" data-slide-to="1"></li>
        <li data-target="#demo" data-slide-to="2"></li>
    </ul>
    <div class="carousel-inner">
        <div class="carousel-item my-carousel" ng-class="{'active': $index===0}" ng-repeat="link in links">
            <img src="{{link.src}}">
            <div class="my-caption">
                <h4>{{link.caption}}</h4>
                <div ng-if="link.lists" class="p-2  d-flex justify-content-between align-items-center designation">
                    <p class="m-0 font-weight-bold" ng-repeat="li in link.lists">{{li}}</p>
                </div>
                <div class="p-3 designation" ng-if="link.listsText">
                    <p class="m-0 text-center font-weight-bold">{{link.listsText[0]}}</p>
                    <p class="m-0 text-center font-weight-bold">{{link.listsText[1]}}</p>
                </div>
                <div class="text-center mt-2">
                    <a class="btn btn-primary" href='{{link.link}}'>{{link.buttonText}}</a>
                </div>
            </div>
        </div>

    </div>
    <a class="carousel-control-prev" data-target="#demo" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" data-target="#demo" data-slide="next">
        <span class="carousel-control-next-icon"></span>
    </a>
</div>