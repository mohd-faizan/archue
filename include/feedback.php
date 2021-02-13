	<section ng-controller="projectUploadFeedController" feedback-dir>
		<!-- The Modal -->
		<div class="modal fade" id="myModal" >
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <!-- Modal Header -->
		      <div class="modal-header bg-color">
		        <h4 class="modal-title text-white">For Feedback &amp; Query</h4>
		      </div>

		      <!-- Modal body -->
		      <div class="modal-body">
		        <h4 class="text-center text-success">{{modalData}}!</h4>
		        <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
		          <p class="text-success">Your Project will be reviewed and published within 72 hrs.</p>
		        <form name="feedbackForm"  ng-submit="onFeedback($event.target)" class="feedbackForm">
		        	<div class="form-group" rating-star>
		        		<!-- <input type="number" name="star"   required class="form-control" style="width:50px" required ng-model="star">&nbsp;&nbsp;Star -->
		        		<h4>Rating star</h4>
						<span class="fa fa-star"></span>
		        		<span class="fa fa-star"></span>
						<span class="fa fa-star"></span>
						<span class="fa fa-star"></span>
						<span class="fa fa-star"></span>
		        	</div>
			     
		        	<div class="form-group"> 
		        		<textarea class="form-control" name="feedback" placeholder="Feedback.." required="" ng-model="feedback"></textarea>	
		        	</div>
		        	<button class="btn btn-primary" type="submit" ng-disabled="!feedbackForm.$valid">Send</button>
		        </form>
		      </div>

		      <!-- Modal footer -->
		      <div class="modal-footer">
		        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
		      </div>

		    </div>
		  </div>
		</div>
	</section>	