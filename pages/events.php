<div class="space"></div>
<section class="section-padding" id="blog-sec-1" ng-controller="fetchEventsController">
	<div class="container-fluid">
		<div class="row" ng-if="events">
			<div class="col-lg-9 col-md-7 col-sm-12 my-order">
				<p><a ng-href="./" class="bg-font">Home</a> > <a href="/events" class="bg-font">Events</a> </p>
				<div class="blog-container border-bottom" ng-repeat="event in events">
					<div class="container-fluid">
						<div class="row mb-4 blogs">
							<div class="col-md-12 col-lg-6 col-sm-12">
								<div class="blog-heading border-bottom border-info show-blog-heading">
									<h3><a ng-href="./event/{{ event.event_id }}/{{event.event_name}}" ng-click="setEvent(event)">{{event.event_name | toUpperCaseFirst}}</a></h3>
									<div class="date-time-container">
										<div class="date-time">
											<span class="fa fa-calendar"></span>&nbsp;{{event.event_date|myDate|date:'mediumDate'}}
											<span class="fa fa-clock-o"></span>&nbsp;{{event.event_date}}
										</div>
										<div class="user">
											<p><span class="fa fa-user"></span> {{event.eventor_name}}</p>
										</div>
									</div>
									
								</div>
								<div class="blog-img">
									<a ng-href="./event/{{ event.event_id }}/{{event.event_name}}"><img ng-src="upload-file/{{event.event_file}}" class="img-fluid"></a>
								</div>
							</div>
							<div class="col-md-12 col-lg-6 col-sm-12 " >
								<div class="blog-heading border-bottom border-info hide-blog-heading">
									<h3><a ng-href="./event/{{ event.event_id }}/{{event.event_name}}" ng-click="setEvent(event)">{{event.event_name}}</a></h3>
									<div class="date-time-container">
										<div class="date-time">
											<span class="fa fa-calendar"></span>&nbsp;{{event.event_date|myDate|date:'mediumDate'}}
											<span class="fa fa-clock-o"></span>&nbsp;{{event.event_date|myTime|date:"shortTime"}}
										</div>
										<div class="user">
											<p><span class="fa fa-user"></span> {{event.eventor_name}}</p>
										</div>
									</div>
									
								</div>
								<div class="blog-content">
									<div ng-bind-html="saintize(event.event_content)">
										
									</div>
								</div>
							</div>
						</div>
					</div>	
					<div class="project-share-option">
						<div>
						<a href="" class="fa {{event.like ? 'fa-heart text-danger' : 'fa-heart-o'}}" ng-click = "increaseLike(event.event_id)">&nbsp;{{event.likes}}</a>
									<a href=""><span class="fa fa-eye"></span>&nbsp;{{event.views}}</a>
							<a href=""><span class="fa fa-facebook"
								socialshare
								socialshare-provider="facebook"
								socialshare-type="sharer"
								socialshare-via="167503137442216"
								socialshare-url="https://www.archue.com/event/{{event.event_id}}/{{event.event_name}}"
								socialshare-redirect-uri="http://google.com"
								socialshare-popup-height="300"
								socialshare-popup-width="400"
								socialshare-trigger="click"></span></a>
							<a href=""><span class="fa fa-twitter"
								socialshare
								socialshare-provider="twitter"
								socialshare-hashtags="Architect, development, internet"
								socialshare-via="twitter"
								socialshare-text=""
								socialshare-url="https://www.archue.com/event/{{event.event_id}}/{{event.event_name}}"
								socialshare-popup-height="300"
								socialshare-popup-width="400"
								socialshare-trigger="click"></span></a>
							<a href=""
							socialshare
							socialshare-provider="google"
							socialshare-url="https://www.archue.com/event/{{event.event_id}}/{{event.event_name}}"
							socialshare-popup-height="300"
							socialshare-popup-width="400"
							socialshare-trigger="click"><span class="fa fa-google-plus"></span></a>
							<a href=""
								socialshare
							socialshare-media="http://www.archue.com/upload-file/{{event.event_file}}"
							socialshare-provider="pinterest"
							socialshare-text="{{event.event_name}}"
							socialshare-url="http://www.archue.com/event/{{event.event_id}}/{{event.event_name}}"
							socialshare-popup-height="300"
							socialshare-popup-width="400"
							socialshare-trigger="click"><span class="fa fa-pinterest"></span></a>
							
							<a href=""
							socialshare
							socialshare-provider="tumblr"
							socialshare-type="link"
							socialshare-text="{{event.event_name}}"
							socialshare-url="https://www.archue.com/event/{{event.event_id}}/{{event.event_name}}"
							socialshare-popup-height="300"
							socialshare-popup-width="540"
							socialshare-trigger="click"><span class="fa fa-tumblr"></span></a>
							<a href=""
							socialshare
							socialshare-provider="linkedin"
							socialshare-text="{{event.event_name}}"
							socialshare-url="https://www.archue.com/event/{{event.event_id}}/{{event.event_name}}"
							socialshare-description="Architect"
							socialshare-source="Archue"
							socialshare-popup-height="300"
							socialshare-popup-width="400"
							socialshare-trigger="click"><span class="fa fa-linkedin"></span></a>
							
						</div>
						<div class="ml-auto">
							<a ng-href="./event/{{event.event_id}}/{{event.event_name}}" ng-click="setEvent(event)">Read More</a>
						</div>
					</div>
				</div>
				<nav aria-label="pagination" class="mt-2" ng-if="(events).length > 0">
                        <ul class="pagination justify-content-center">
                            <li class="page-item" ng-class="{'disabled': active === 1}">
                                <a class="page-link" href="#" tabindex="-1" ng-click="prev()">Previous</a>
                            </li>
                            <li class="page-item" ng-class="{'active': active === ($index +1)}" ng-repeat="page in paginations track by $index"><a class="page-link" href="#" ng-click="toPage($index+1)">{{$index+1}}</a></li>

                            <li class="page-item" ng-class="{'disabled': active === paginations.length}">
                                <a class="page-link" href="#" ng-click="next()">Next</a>
                            </li>
                        </ul>
                    </nav>
				<div class="alert alert-danger" ng-if="events.length == 0">
					No Events Found!!
				</div>
			</div>
			<div class="col-lg-3 col-md-5 col-sm-12 ">
				<!-- <div class="connect-us-container">
					<div class="head">
						<div class="head-text">
							<h4>Connect With Us</h4>
						</div>
						<div class="social-icon-div">
							<a href="#" class="icon" id="fb-icon"><span class="fa fa-facebook"></span></a>
							<a href="#" class="icon" id="twitter-icon"><span class="fa fa-twitter"></span></a>
							<a href="#" class="icon" id="insta-icon"><span class="fa fa-instagram"></span></a>
							<a href="#" class="icon" id="pint-icon"><span class="fa fa-pinterest"></span></a>
							<a href="#" class="icon" id="pint-icon"><span class="fa fa-google-plus"></span></a>
							<a href="#" class="icon" id="pint-icon"><span class="fa fa-linkedin"></span></a>
							<a href="#" class="icon" id="pint-icon"><span class="fa fa-tumblr"></span></a>
						</div>
					</div>
				</div> -->
				<div class="recent-post-container">
					<a href="./add-event" class="btn btn-primary bg-color border-0">Add Events Here</a>
				</div>
			</div>
		</div>
		<div ng-if="!events" ng-include="'../include/loader.php'"></div>
	</div>
</section>