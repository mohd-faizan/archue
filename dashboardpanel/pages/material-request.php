<div my-nav></div>
<div class="space"></div>
<section id="material" ng-controller="materialRequestController">
	<div class="container-fluid" style="overflow-y:scroll">
		<h3 class="theme-font mb-4">REQUEST FOR MATERIAL </h3>
		<button class="btn btn-primary pull-right mb-4" ng-click="cToExcel()"><span class="fa fa-upload"></span>&nbsp; Export Excel</button>
		<table class="table table-bordered">
		  	<thead class="thead-dark">
			    <tr>
						<th scope="col">#</th>
						<th scope="col">PRODUCT/SERVICE NAME </th>
						<th scope="col">AREA</th>
						<th scope="col">TENTATIVE BUDGET</th>
						<th scope="col">SPECIFICATION</th>
						<th scope="col">EMAIL</th>
						<th scope="col">PHONE NUMBER</th>
						<th scope="col">LOCATION</th>
						<th scope="col">REQUIREMENTS</th>
						<th scope="col">DATE</th>
						<th scope="col"></th>
			    </tr>
		 	 </thead>
		  	<tbody>
			    <tr ng-repeat="material in materials track by $index">
			    	<td>{{$index + 1}}</td>
			    	<td>{{material.product_name}}</td>
						<td>{{material.area}}</td>
						<td>{{material.budget}}</td>
						<td>{{material.specification}}</td>
						<td>{{material.email}}</td>
						<td>{{material.phone}}</td>
						<td>{{material.locat}}</td>
						<td>{{material.requirement}}</td>
						<td>{{material.mat_date|converToDate|date:mediumDate}}</td>
						<td><button class="btn btn-danger" ng-click="delete(material.material_id)">Delete</button></td>
			    </tr>
			</tbody>
		</table>
		</div>
	</div>
</section>