<div my-nav></div>
<div class="space"></div>
<div class="space"></div>
<div class="space"></div>
<div class="space"></div>
<section id="material" ng-controller="leadsController">
	<div class="container table-responsive">
		<h3 class="theme-font mb-4">ALL Leads</h3>
		<span class="pull-left"><b>Total:</b> {{leads.length}}</span>
		
		<div class="architect-container table-responsive mb-4" >
			<!-- <div class="architect-attribute">
				<p>name</p>
				<p>EMAIL</p>
				<p>PHONE NUMBER</p>
				<p>PROFESSION</p>
			</div>
			<div class="architect-value">
				<p>{{user.name}}</p>
				<p>{{user.email}}</p>
				<p>{{user.mobileno}}</p>
				<p>{{user.profession}}</p>
				
			</div> -->
			 <table class="table table-striped">
			    <thead>
			      <tr>
			      	<th>Index</th>
			        <th>Name</th>
			        <th>EMAIL</th>
			        <th>Expected start time</th>
			        <th>Phone number</th>
			        <th>Tentative budget</th>
			        <th>workType</th>
			        <th>City</th>
			        <th>Cost </th>
			        <th>Description</th>
			        <th>Action</th>
			      </tr>
			    </thead>
			    <tbody>
                <tr ng-repeat="lead in leads|limitTo:myLimit" ng-if="leads.length > 0">
			      	<td>{{leads.length-$index}}</td>
			        <td>{{lead.name}}</td>
			        <td>{{lead.email}}</td>
                    <td>{{lead.expectedStartTime | date:"mediumDate"}}</td>
			        <td>{{lead.phone}}</td>
			        <td>{{lead.tentativeBudget}}</td>
			        <td>{{lead.workType}}</td>
			        <td>{{lead.city}}</td>
			        <td>{{lead.cost}}</td>
			        <td>{{lead.description}}</td>
			        <td><button class="btn btn-danger" ng-click="dellead(lead.lead_id)">Delete</button></td>
			      </tr>
                  <tr class="text-center" ng-if="leads.length === 0">
                  <td colspan="11">No lead found</td>
                  </tr>
			    </tbody>
			  </table>
		</div>
		<div align="left" ng-if="leads && leads.length > 15">  <button ng-click="increaseUserLimit()" class="btn btn-primary">Next</button></div>
	</div>
</section>