<section id="material" ng-controller="materialRequestController">
	<div class="container">
		<h3 class="theme-font mb-4">REQUEST FOR MATERIAL </h3>
		<div class="architect-container mb-4" ng-repeat="material in materials|limitTo:10">
			<div class="architect-attribute">
				<p>PRODUCT/SERVICE NAME </p>
				<p>AREA</p>
				<p>TENTATIVE BUDGET</p>
				<p>SPECIFICATION</p>
				<p>EMAIL</p>
				<p>PHONE NUMBER</p>
				<p>LOCATION</p>
				<p>REQUIREMENTS</p>
				<p>DATE</p>
			</div>
			<div class="architect-value">
				<p>{{material.product_name}}</p>
				<p>{{material.area}}</p>
				<p>{{material.budget}}</p>
				<p>{{material.specification}}</p>
				<p>{{material.email}}</p>
				<p>{{material.phone}}</p>
				<p>{{material.locat}}</p>
				<p>{{material.requirement}}</p>
				<p>{{material.mat_date|converToDate|date:mediumDate}}</p>
			</div>
		</div>
	</div>
</section>