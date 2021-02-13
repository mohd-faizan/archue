<div my-nav></div>
<section class="section-padding" id="blog-sec-1" ng-controller="eventsController">
	<div class="home-margin">
		
		<button class="btn" ng-click="isShowUnApprove()" ng-class="{'btn-primary':!isShowApprove}">SEE APPROVE EVENTS</button>
		<button class="btn" ng-click="isShowsApprove()" ng-class="{'btn-primary':isShowApprove}">SEE UNAPPROVE EVENTS</button>
		
		<div class="space"></div>
		<div class="container-fluid">
			<div class="row">
				<div ng-if="event.is_approve==0" ng-show="isShowApprove" class="mb-5 col-md-4 border border-dark p-2" ng-repeat="event in events">
					<p><b>Uploaded By:</b>{{event.eventor_name}}</p>
					<a ng-href="./event/{{event.event_id}}/{{event.event_name}}" ng-click="setEvent(event)" class="blog-img">
						<img ng-src="../upload-file/{{event.event_file}}" class="img-fluid">
					</a>
					<div class="blog-heading border-bottom border-info ">
						<div class="date-time">
							<span class="fa fa-calendar"></span>&nbsp;{{event.event_date}}
							<span class="fa fa-clock-o"></span>&nbsp;{{event.event_time}}
						</div>
					</div>
					<div class="blog-content">
						<div ng-bind-html="trust(event.event_content)"></div>
					</div>
					<div class="continue-btn pull-right">
						<a ng-href="./event/{{event.event_id}}/{{event.event_name}}" ng-click="setEvent(event)">Continue Reading <span class="fa fa-long-arrow-right"></span></a>
					</div>
				</div>
				<div ng-if="event.is_approve==1" ng-show="!isShowApprove" class="mb-5 col-md-4 border border-dark p-2" ng-repeat="event in events">
					<p><b>Uploaded By:</b>{{event.eventor_name}}</p>
					<a ng-href="./event/{{event.event_id}}/{{event.event_name}}" ng-click="setEvent(event)" class="blog-img">
						<img ng-src="../upload-file/{{event.event_file}}" class="img-fluid">
					</a>
					<div class="blog-heading border-bottom border-info ">
						<div class="date-time">
							<span class="fa fa-calendar"></span>&nbsp;{{event.event_date}}
							<span class="fa fa-clock-o"></span>&nbsp;{{event.event_time}}
						</div>
					</div>
					<div class="blog-content">
						<div ng-bind-html="trust(event.event_content)"></div>
					</div>
					<div class="continue-btn pull-right">
						<a ng-href="./event/{{event.event_id}}/{{event.event_name}}" ng-click="setEvent(event)">Continue Reading <span class="fa fa-long-arrow-right"></span></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>