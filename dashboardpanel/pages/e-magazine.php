<div my-nav></div>
<section>
    <div class="main-conatiner mt-6 mb-4" ng-controller="eMagazine">
        <div class="container">
            <div class="card shadow">
                <div class="card-header">
                    <h5 class="mb-0 d-inline-block">{{eMagazine.name}}</h5>
                    <button class="btn btn-danger pull-right">Delete</button>
                    <!-- <button class="btn btn-danger mt-4" ng-click="del(blog.blog_id)">DELETE THIS BLOG</button> -->
                </div>
                <div class="card-body">
                    <iframe ng-src="{{url}}" width="100%" height="800px"></iframe>
                </div>
                <div class="card-footer">
                    <span class="fa fa-calendar"></span>&nbsp; {{eMagazine.uploaded_on | date}}
                </div>
            </div>
        </div>
    </div>
</section>