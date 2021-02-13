<section id="e-magazine" class="py-5" ng-controller="showEMagazine">
    <div class="container">
        <div class="card shadow">
            <div class="card-header">
                <a href="./e-magazines"><span class="fa fa-long-arrow-left"></span></a>
                <h5 class="d-inline-block ml-3"> {{emagazine.name}} </h5>
                <div class="pull-right">
                    <span class="fa fa-calendar"></span>&nbsp; {{emagazine.uploaded_on| date:'yyyy-MM-dd'}}
                </div>
            </div>
            <div class="card-body p-0">
                <iframe ng-src="{{url}}" width="100%" height="800px"></iframe>
            </div>
        </div>
    </div>
</section>