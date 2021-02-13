<div my-nav></div>
<div class="space"></div>
<section id="architect" ng-controller="architectController">
	<div class="container-fluid" style="overflow-y:scroll">
		<h3 class="theme-font mb-4"> REQUEST FOR ARCHITECT</h3>
		<button class="btn btn-primary pull-right mb-4" ng-click="cToExcel()"><span class="fa fa-upload"></span>&nbsp; Export Excel</button>
		<table class="table table-bordered">
		  	<thead class="thead-dark">
			    <tr>
			      	<th scope="col">#</th>
			      	<th scope="col">SERVICE</th>
					<th scope="col">PROJECT TYPE</th>
					<th scope="col">AREA</th>
					<th scope="col">TENTATIVE BUDGET</th>
					<th scope="col">SPECIFICATION</th>
					<th scope="col">EMAIL ID</th>
					<th scope="col">PHONE NUMBER</th>
					<th scope="col">LOCATION</th>
					<th scope="col">REQUIREMENTS</th>
					<th scope="col">DATE</th>
					<th scope="col"></th>
			    </tr>
		  	</thead>
		  	<tbody>
				<tr ng-repeat="architect in architects track by $index">
					<td>{{ $index + 1 }}</td>
					<td>{{architect.service}}</td>
					<td>{{architect.project_type}}</td>
					<td>{{architect.area}}</td>
					<td>{{architect.budget}}</td>
					<td>{{architect.specification}}</td>
					<td>{{architect.email}}</td>
					<td>{{architect.phone}}</td>
					<td>{{architect.locat}}</td>
					<td>{{architect.requirement}}</td>
					<td>{{architect.arc_date|converToDate|date:mediumDate}}</td>
					<td><button ng-click="delete(architect.architect_id)" class="btn btn-danger">Delete</button></td>
				</tr>  	
		  	</tbody>
		</table>
		<!-- <div class="architect-container mb-4" ng-repeat="architect in architects|limitTo:10">
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
		</div> -->
	</div>
</section>