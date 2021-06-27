<header id="header" style="position: fixed;width: 100%;z-index: 1;">
	<div class="header-container theme-bg">
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
			<a href="https://www.archue.com"><img src="image/logo.png"></a>
			<a href="https://www.archue.com"><strong>ARCHUE</strong></a>
		</div>
		<div class="search-bar">
			<form class="my-search-child" ng-submit="querySubmit($event.target,query,searchtype)">
				<div class="input-group">
					<select class="myselect" ng-model="searchtype">
						<option>{{searchtype}}</option>
						<option>PROJECTS</option>
						<option>THESIS</option>
						<option>EVENTS</option>
						<option value="JOBS">CAREERS</option>
						<option>COMPETITION</option>
					</select>
					<input type="text" class="form-control" style="border:1px solid #dddddd" placeholder="Search&hellip;" ng-model="query">
					<span class="input-group-btn">
						<button class="btn btn-default"><span class="fa fa-search"></span></button>
					</span>
				</div>
			</form>
		</div>
	</div>
	<!-- Smalll Device Navbar  -->
	<nav id="sidenav" ng-controller="navController">
		<ul class="sidenav-list">
			<li class="sidenav-li"><a class="sidenav-link" href="./e-magazines">E-MAGAZINES</a></li>

			<li class="sidenav-li"><a class="sidenav-link" href="./blogs">BLOG <span class="count pull-right">{{blogUnapprove}}</span></a></li>

			<li class="sidenav-li"><a class="sidenav-link" href="./projects">PROJECTS <span class="count pull-right">{{projectUnapprove}}</span></a></li>

			<li class="sidenav-li"><a class="sidenav-link" href="./portfolio">PORTFOLIO <span class="count pull-right">{{portfolioUnapprove}}</span></a></li>

			<li class="sidenav-li"><a class="sidenav-link" href="./thesis-report">THESIS REPORT <span class="count pull-right">{{thesisReportUnapprove}}</span></a></li>

			<li class="sidenav-li"><a href="./dessertation">DESSERTATION <span class="count pull-right">{{dessertationUnapprove}}</span></a></li>

			<li class="sidenav-li"><a href="./thesis">THESIS <span class="count pull-right">{{thesisUnapprove}}</span></a></li>

			<li class="sidenav-li"><a href="./architect">ARCHITECTS REQUEST</a></li>

			<li class="sidenav-li"><a href="./material-request">MATERIAL REQUEST</a></li>

			<li class="sidenav-li"><a href="./events">EVENTS <span class="count pull-right">{{eventUnapprove}}</span></a></li>

			<li class="sidenav-li"><a href="./jobs">Careers <span class="count pull-right">{{jobUnapprove}}</span></a></li>

			<li class="sidenav-li"><a href="./competitions">COMPETITION <span class="count pull-right">{{competitionUnapprove}}</span></a></li>

			<li class="sidenav-li"><a href="./blog-comments">COMMENTS <span class="count pull-right">{{blogCommentsUnapprove}}</span></a></li>

			<li class="sidenav-li"><a href="./users">USERS</a></li>

			<li class="sidenav-li"><a href="./newsletter-users">NEWSLETTER USERS</a></li>

			<li class="sidenav-li"><a href="./uploaded-material">UPLOADED MATERIAL</a></li>
			<li class="sidenav-li"><a href="./upload-lead">UPLOADED LEAD</a></li>
			<li class="sidenav-li"><a href="./leads">LEADS</a></li>

			<li class="sidenav-li"><a class="sidenav-link" href="./logout">LOGOUT</a></li>
		</ul>
	</nav>
</header>
<div class="nav-space-small-device"></div>