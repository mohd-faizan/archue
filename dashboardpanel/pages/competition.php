<div my-nav></div>
<section id="full-blog-sec" ng-controller="fullCompController">
  <div class="main-conatiner mt-6 mb-4">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="mb-4">
              <button class="btn btn-danger mt-4" ng-click="del(competition.competitor_id)">DELETE THIS COMPETITION</button>
              <button class="btn btn-success mt-4" ng-click="approve(competition.competitor_id)" ng-if="competition.is_approve==0">APPROVE</button>
            </div>
            <div class="outer-border">
              <div class="blog-container">
                <div class="blog-image-container">
                  <a href="#"><img ng-src="../upload-file/{{competition.competitor_file}}" class="img-fluid"></a>
                  <div class="blog-image-abs">
                    <h3>{{competition.competition_heading}}</h3>
                  </div>
                </div>
                <p><span class="fa fa-calendar"></span>&nbsp; {{competition.competitor_date}}</p>
              </div>  
              <div data-ng-bind-html="sanitize(competition.competitor_content)"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>