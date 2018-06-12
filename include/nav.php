<header id="header" ng-controller="navController">
	<div class="header-container bg-color header-fixed">
		<div class="nav-coll-btn">
			<div class="open-btn">
				<div class="bar"></div>
				<div class="bar"></div>
				<div class="bar"></div>
			</div>
			<div class="close-btn">
				<div class="cross-div"></div>
			</div>
		</div>
		<div class="heading">
			<a href="./"><img src="image/logo.png"></a>
			<a href="./"><strong>ARCHUE</strong></a>
		</div>
	</div>
	<nav id="navbar">
		<div class="navbar-container">
			<div class="heading heading-hide">
				<a href="./"><img src="image/logo.png"></a>
			</div>
			<ul class="inline-list">
				<li><a href="./" class="active">HOME</a></li>
				
				

				<li><a href="./project">PROJECTS</a></li>
				
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">MATERIALS</a>

					<div class="dropdown-menu sub-menu-container" aria-labelledby="dropdownMenuButton">
					    
					    <div class="dropdown-item drop-dn-btn" href="#">
					    	FINISHES
					    	<div  class="sub-dropdown">
					    		<div class="space"></div>
					    		<div class="container">
					    			<div class="row">
					    				<div class="col-lg-6 col-md-6">
					    					<h6><a href="#">WALLCOVERING/CLADDING</a></h6>
					    					<ul class="sub-menu-list">
					    						<li><a href="#">Metallics</a></li>
					    						<li><a href="#">Porcelain Stoneware</a></li>
					    						<li><a href="#">Ceramics</a></li>
					    						<li><a href="#">Wood / Bamboo</a></li>
					    						<li><a href="#">Stones</a></li>
					    						<li><a href="#">Glass</a></li>
					    						<li><a href="#">Fiber Cements / Cements</a></li>
					    						<li><a href="#">Plastics</a></li>
					    						<li><a href="#">Composites</a></li>
					    						<li><a href="#">Organics / Rubber / Cork</a></li>
					    					</ul>
					    					<h6><a href="#">Doors / Partitions</a></h6>
					    					<ul class="sub-menu-list">
					    						<li><a href="#">Doors</a></li>
					    					</ul>
					    					<h6><a href="#">CEILINGS</a></h6>
					    					<ul class="sub-menu-list">
					    						<li><a href="#">Dropped Ceilings</a></li>
					    						<li><a href="#">Suspension Systems</a></li>
					    					</ul>
					    					<h6><a href="#">WINDOWS</a></h6>
					    					<ul class="sub-menu-list">
					    						<li><a href="#">Skylights</a></li>
					    						<li><a href="#">Windows</a></li>
					    					</ul>
					    				</div>
					    				<div class="col-lg-6 col-md-6">
					    					<h6><a href="#">FLOORS</a></h6>
					    					<ul class="sub-menu-list">
					    						<li><a href="#">Concrete Floors</a></li>
					    						<li><a href="#">Wodern Flooring</a></li>
					    						<li><a href="#">Linoleum/Vina Flooring</a></li>
					    						<li><a href="#">Wodern Flooring</a></li>
					    					</ul>
					    					<h6><a href="#">WINDOW SHADES/AWNINGS</a></h6>
					    					<ul class="sub-menu-list">
					    						<li><a href="#">Blinds / Mosquito Nets / Curtains</a></li>
					    						<li><a href="#">Louvers / Shutters</a></li>
					    					</ul>
					    				</div>
					    			</div>
					    		</div>
					    	</div>
					    </div>

				    	<div class="dropdown-item drop-dn-btn" href="#">
					    	CONSTRUCTION MATERIALS
					    	<div  class="sub-dropdown sub-item-2">
				
					    	</div>
					    </div>
				    	
				    	<div class="dropdown-item drop-dn-btn" href="#">
					    	EQUIPEMENT
					    	<div  class="sub-dropdown sub-item-3">
					    			
					    	</div>
					    </div>
				    	
				    	<div class="dropdown-item drop-dn-btn" href="#">
					    	MEP &amp; HVAC
					    	<div  class="sub-dropdown sub-item-4">
					    			
					    	</div>
					    </div>
				    </div>
				</li>
				<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">STUDENT CORNER</a>
					 <div class="dropdown-menu">
					    <a class="dropdown-item" href="./thesis">THESIS</a>
					    <a class="dropdown-item" href="./portfolio">PORTFOLIO</a>
					    <a class="dropdown-item" href="./dissertation">DISSERTATION</a>
					    <a class="dropdown-item" href="./thesis-report">THESIS REPORT</a>
					    <a class="dropdown-item" href="./studentwork">STUDIO WORK</a>
					  </div>
				</li>
				
				<li><a href="./blog">BLOG</a></li>

				<li><a href="#" ng-click="ifUpload()">UPLOAD</a></li>
				<li><a href="#" class="bg-font" data-toggle="modal" data-target="#qouteModal">GET QUOTE</a></li>
				<li ng-show="isShow" class="dropdown"><a href="/dashboard" class="dropdown-toggle" data-toggle="dropdown"> 
				    <img src="uploads/default-user.png" height="25" width="25">
				    {{userData.username}}
				</a>
				    <div class="dropdown-menu">
					    <a class="dropdown-item" href="./dashboard">Dashboard</a>
					    <a class="dropdown-item" href="./logout">logout</a>
					</div>
				</li>
			</ul>
		</div>
		<div class="nav-bottom-container">
			<ul class="inline-list">
				<!-- <li class="dropdown">
					<a href="#"  class="dropdown-toggle" data-toggle="dropdown">MORE</a>
					<div class="dropdown-menu">
					    <a class="dropdown-item" href="#">EVENTS</a>
					    <a class="dropdown-item" href="#">JOBS</a>
					    <a class="dropdown-item" href="#">COMPETITION</a>
					   
					</div>
				</li> -->
				<li><a href="#">EVENTS</a></li>
				<li><a href="#">JOBS</a></li>
				<li><a class="dropdown-item" href="#">COMPETITION</a></li>
				<li><a href="#">PARTNERS WITH US</a></li>
				<li><a href="./login" ng-show="!isShow">LOGIN</a></li>
				<!-- <li class="my-search-parent"><a href="#" ng-click="showHideSearch()" ng-show="!isShowSearch"><span class="fa fa-search"></span></a>
					 <form ng-show="isShowSearch" class="my-search-child">
						<div class="input-group">
			                <input type="text" class="form-control" placeholder="Search&hellip;">
			                <span class="input-group-btn">
			                    <button type="button" class="btn btn-default">Go</button>
			                </span>
			            </div>
					 </form>	
				</li> -->
				<li>
					<form class="my-search-child">
						<div class="input-group">
			                <input type="text" class="form-control" placeholder="Search&hellip;">
			                <span class="input-group-btn">
			                    <button type="button" class="btn btn-default"><span class="fa fa-search"></span></button>
			                </span>
			            </div>
					 </form>	
				</li>
			</ul>
		</div>
	</nav>

	<!-- Smalll Device Navbar  -->
	<nav id="sidenav">
		<ul class="sidenav-list">
			<li class="sidenav-li"><a class="sidenav-link" href="./">HOME</a></li>
			<li class="sidenav-li"><a class="sidenav-link" href="./project">PROJECTS</a></li>
			<li class="sidenav-li"><a class="sidenav-link" href="#">STUDENT CORNER</a></li>
			<li class="sidenav-li"><a class="sidenav-link" href="./blog">BLOG</a></li>

			<!-- Material Dropdown Button -->
			<li class="sidenav-li material-drp-btn">
				<a class="sidenav-link" href="#" id="material-link">
					MATERIALS
					<span class="fa fa-angle-right" id="angle-down-symbol"></span>
				</a>
			</li>

			<li class="sidenav-li"><a class="sidenav-link" href="./upload">UPLOAD</a></li>
			<li class="sidenav-li"><a class="sidenav-link" href="#" class="bg-font">GET QUOTE</a></li>

			<!-- More Dropdown Button -->
			<li class="sidenav-li more-drp-btn">
				<a href="#" class="sidenav-link" id="more-link">
					MORE 
					<span class="fa fa-angle-right" id="angle-down-symbol"></span>
				</a>
			</li>

			<li class="sidenav-li"><a class="sidenav-link" href="#">ADVERTISE WITH US</a></li>
			<li class="sidenav-li"><a class="sidenav-link" href="./signup">SIGNUP</a></li>
			<li class="sidenav-li"><a class="sidenav-link" href="#!login">LOGIN</a></li>
		</ul>
	</nav>

	<!-- More Dropdown Mwnu -->
	<div class="more-drop-dn-div">
		<ul class="more-drp-menu">
			<li>
				<a class="sidenav-link" href="#" id="dropdown-back-btn">
					<span class="fa fa-angle-left"></span> &nbsp;
					Back
				</a>
			</li>
			<li class="sidenav-li"><a class="sidenav-link" href="#">EVENTS</a></li>
			<li class="sidenav-li"><a class="sidenav-link" href="#">CAREER</a></li>
			<li class="sidenav-li"><a class="sidenav-link" href="#">OTHERS</a></li>
		</ul>
	</div>

	<!-- Material Dropdown Menu -->
	<div class="material-drop-dn-div">
		<ul class="material-drp-menu">
			<li>
				<a class="sidenav-link" href="#" id="dropdown-back-btn">
					<span class="fa fa-angle-left"></span> &nbsp;
					Back
				</a>
			</li>
			<li class="sidenav-li"><a class="sidenav-link" href="#">EVENTS</a></li>
			<li class="sidenav-li"><a class="sidenav-link" href="#">CAREER</a></li>
			<li class="sidenav-li"><a class="sidenav-link" href="#">OTHERS</a></li>
		</ul>
	</div>
</header>
<div class="nav-space-small-device"></div>


<!-- Get Qoute Modal -->
<div class="modal fade" id="qouteModal" ng-controller="getQouteController">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header ">
        <button class="get-qoute-btn" ng-class="{'active':isGetActive==true}" ng-click="getChange()">Material</button>
        <button class="get-qoute-btn" ng-class="{'active':isGetActive==false}" ng-click="getChange()">Architecture</button>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      	<h5 class="bg-font text-center mb-4">We will help you get the best suppliers.<br/>Lets get started!</h5>
        <form ng-if="isGetActive">	
        	<div class="container-fluid" >
        		<div class="form-group">
	        		<input type="text" name="" class="form-control" placeholder="Enter Product Name/Service Name">
	        	</div>
        		<div class="row">
        			<div class="col-md-6">
        				<div class="form-group">
			        		<input type="text" name="" class="form-control" placeholder="Area">
			        	</div>
        			</div>
        			<div class="col-md-6">
        				<div class="form-group">
			        		<input type="text" class="form-control" name="" placeholder=" Tentative Budget">
			        	</div>
        			</div>
        		</div>
        		<div class="form-group">
	        		<input type="text" class="form-control" name="" placeholder="Specification(if any)">
	        	</div>
	        	<div class="row">
	        		<div class="col-md-4">
	        			<div class="form-group">
			        		<input type="email" class="form-control" name="" placeholder="Email Id">
			        	</div>
	        		</div>
	        		<div class="col-md-4">
	        			<div class="form-group">
			        		<input type="text" class="form-control" name="" placeholder="Phone Number">
			        	</div>
	        		</div>
	        		<div class="col-md-4">
	        			<div class="form-group">
			        		<input type="text" class="form-control" name="" placeholder="Location">
			        	</div>
	        		</div>
	        	</div>
        		
	        	<div class="form-group">
	        		<textarea class="form-control" placeholder="Requirements Details.." rows="5" cols="20"></textarea>
	        	</div>
	        	<button class="btn btn-primary bg-color border-0">Get Qoute</button>
        	</div>
        </form>
    	<form ng-if="!isGetActive">
    		<div class="container-fluid" >
	    		this is another
	    	</div>
    	</form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        
      </div>

    </div>
  </div>
</div>