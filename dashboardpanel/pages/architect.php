<section id="architect" ng-controller="architectController">
	<div class="container">
		<h3 class="theme-font mb-4"> REQUEST FOR ARCHITECT</h3>
		<div class="architect-container mb-4" ng-repeat="architect in architects|limitTo:10">
			<div class="architect-attribute ">
				<p>SERVICE</p>
				<p>PROJECT TYPE</p>
				<p>AREA</p>
				<p>TENTATIVE BUDGET</p>
				<p>SPECIFICATION</p>
				<p>EMAIL ID</p>
				<p>PHONE NUMBER</p>
				<p>LOCATION</p>
				<p>REQUIREMENTS</p>
				<p>DATE</p>
			</div>
			<div class="architect-value">
				<p>{{architect.service}}</p>
				<p>{{architect.project_type}}</p>
				<p>{{architect.area}}</p>
				<p>{{architect.budget}}</p>
				<p>{{architect.specification}}</p>
				<p>{{architect.email}}</p>
				<p>{{architect.phone}}</p>
				<p>{{architect.locat}}</p>
				<p>{{architect.requirement}}</p>
				<p>{{architect.arc_date|converToDate|date:mediumDate}}</p>
			</div>
		</div>
	</div>
</section>