<div>
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
            <div class="heading d-flex">
                <span><strong>ARC</strong></span>
                <a href="./"><img src="image/logo.png"></a>
                <!-- <a href="./"><strong>ARCHUE</strong></a> -->
                <span class="text-white header-logo-heading">A complete architecture platform </span>
                <div class="ml-auto my-side-bar-search">
                    <form class="my-search-child " ng-submit="querySubmit($event.target)">
                        <div class="input-group">
                            <select class="myselect" ng-model="searchtype">
								<option>{{searchtype}}</option>
								<option>PROJECTS</option>
								<option>THESIS</option>
								<option>EVENTS</option>
								<option value="JOBS">CAREERS</option>
								<option>COMPETITION</option>
								<option>MATERIAL</option>
							</select>
                            <input type="text" class="form-control" id="search" style="border:1px solid #dddddd" placeholder="Search&hellip;" ng-model="searchquery" ng-click="showSmallSearch()" autocomplete="off">
                            <!-- <span class="input-group-btn">
									<button class="btn btn-default"><span class="fa fa-search"></span></button>
								</span> -->
                        </div>
                    </form>
                </div>
            </div>

            <div class="search-bar">
                <span class="fa fa-search fa-2x" ng-click="showSmallSearch()"></span>
            </div>
        </div>

        <!-- mobile searchbar start-->
        <div class="small-searchbar-container" ng-class="{'hide-small-search':!isShowSmallSearch}">
            <div class="small-searchbar">
                <button ng-click="showSmallSearch()"><span class="fa fa-close fa-2x"></span></button>
                <div class="small-search-form">
                    <form class="my-search-child" ng-submit="querySubmit($event.target)">
                        <div class="input-group">
                            <select class="myselect" ng-model="searchtype">
								<option>{{searchtype}}</option>
								<option>PROJECTS</option>
								<option>THESIS</option>
								<option>EVENTS</option>
								<option>JOBS</option>
								<option>COMPETITION</option>
								<option>MATERIAL</option>
							</select>
                            <input type="text" class="form-control" id="search" style="border:1px solid #dddddd" placeholder="Search&hellip;" ng-model="searchquery">
                            <span class="input-group-btn">
								<button class="btn btn-default"><span class="fa fa-search"></span></button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- mobile searcbar end-->
        <nav id="navbar">
            <div class="navbar-container">
                <div class="heading heading-hide">
                    <a href="./"><img src="image/logo.png"></a>
                </div>
                <ul class="inline-list">
                    <li><a href="./" class="active">HOME</a></li>
                    <li><a href="./project">PROJECTS</a></li>
                    <li class="material-dropdown">
                        <a href="#" class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">MATERIALS</a>
                        <div class="material-dropdown-menu">
                            <ul class="list">
                                <li class="material-dropdown-item"><a href="./products/Finishes" class="active-material-item" id="first-material-dropdown-item">Finishes</a>
                                    <div class="material-sub-dropdown" id="first-material-sub-dropdown">
                                        <div class="space"></div>
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6">
                                                    <ul class="sub-menu-list">
                                                        <li><a href="./materials/Finishes/Metallics">Metallics</a></li>
                                                        <li><a href="./materials/Finishes/Porcelain-Stoneware">Porcelain
																Stoneware</a></li>
                                                        <li><a href="./materials/Finishes/Ceramics">Ceramics</a></li>
                                                        <li><a href="./materials/Finishes/Wood-Bamboo">Wood / Bamboo</a>
                                                        </li>
                                                        <li><a href="./materials/Finishes/Stones">Stones</a></li>
                                                        <li><a href="./materials/Finishes/Glass">Glass</a></li>
                                                        <li><a href="./materials/Finishes/Fiber Cements-Cements">Fiber
																Cements / Cements</a></li>
                                                        <li><a href="./materials/Finishes/Plastics">Plastics</a></li>
                                                        <li><a href="./materials/Finishes/Composites">Composites</a>
                                                        </li>
                                                        <li><a href="./materials/Finishes/Organics-Rubber-Cork">Organics
																/ Rubber / Cork</a></li>
                                                        <li><a href="./materials/Finishes/Doors">Doors</a></li>
                                                        <li><a href="./materials/Finishes/Dropped-Ceilings">Dropped
																Ceilings</a></li>
                                                        <li><a href="./materials/Finishes/Suspension-Systems">Suspension
																Systems</a></li>
                                                        <li><a href="./materials/Finishes/Skylights">Skylights</a></li>
                                                        <li><a href="./materials/Finishes/Windows">Windows</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <ul class="sub-menu-list">
                                                        <li><a href="./materials/Finishes/Concrete-Floors">Concrete
																Floors</a></li>
                                                        <li><a href="./materials/Finishes/Wodern-Flooring">Wodern
																Flooring</a></li>
                                                        <li><a href="./materials/Finishes/Linoleum-Vina Flooring">Linoleum/Vina
																Flooring</a></li>
                                                        <li><a href="./materials/Finishes/Wodern-Flooring">Wodern
																Flooring</a></li>
                                                        <li><a href="./materials/Finishes/Blinds-Mosquito-Nets-Curtains">Blinds
																/ Mosquito Nets /
																Curtains</a></li>
                                                        <li><a href="./materials/Finishes/Louvers-Shutters">Louvers /
																Shutters</a></li>
                                                        <li><a href="./materials/Finishes/Awnings">Awnings</a></li>
                                                        <li><a href="./materials/Finishes/windows">Windows</a></li>
                                                        <li><a href="./materials/Finishes/skylights">Skylights</a></li>
                                                        <li><a href="./materials/Finishes/Sealents-Protectors">Sealents/Protectors</a>
                                                        </li>
                                                        <li><a href="./materials/Finishes/Wooden-Flooring">Wooden
																Flooring</a></li>
                                                        <li><a href="./materials/Finishes/Linoleum-Vinyl-Epoxy-Urethane">Linoleum
																/ Vinyl / Epoxy /
																Urethane</a></li>
                                                        <li><a href="./materials/Finishes/Carpets">Carpets</a></li>
                                                        <li><a href="./materials/Finishes/Adhesives">Adhesives</a></li>
                                                        <li><a href="./materials/Finishes/Wallpaper">Wallpaper</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="material-dropdown-item"><a href="./products/Construction-And-Material">Construction And
										Material</a>
                                    <div class="material-sub-dropdown">
                                        <div class="space"></div>
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6">
                                                    <ul class="sub-menu-list">
                                                        <li><a href="#">Glass</a></li>
                                                        <li><a href="./materials/Construction-And-Material/Wood">Wood</a>
                                                        </li>
                                                        <li><a href="./materials/Construction-And-Material/Metals">Metals</a>
                                                        </li>
                                                        <li><a href="./materials/Construction-And-Material/System-Prefabricated-Panells">System/Prefabricated
																Panells</a></li>
                                                        <li><a href="./materials/Construction-And-Material/Plastics-Fibers">Plastics/Fibers</a>
                                                        </li>
                                                        <li><a href="./materials/Construction-And-Material/Enclosures-Double-Skin-Facades">Enclosures
																/ Double Skin Facades</a></li>
                                                        <li><a href="./materials/Construction-And-Material/Louvers">Louvers</a>
                                                        </li>
                                                        <li><a href="./materials/Construction-And-Material/Curtain-Walls">Curtain
																Walls</a></li>
                                                        <li><a href="./materials/Construction-And-Material/Green-Facades">Green
																Facades</a></li>
                                                        <li><a href="./materials/Construction-And-Material/Metallics">Metallics</a>
                                                        </li>
                                                        <li><a href="./materials/Construction-And-Material/Tiles">Tiles</a>
                                                        </li>
                                                        <li><a href="./materials/Construction-And-Material/Planting">Planting</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <ul class="sub-menu-list">
                                                        <li><a href="./materials/Construction-And-Material/Fasteners">Fasteners</a>
                                                        </li>
                                                        <li><a href="./materials/Construction-And-Material/Railing">Railing</a>
                                                        </li>
                                                        <li><a href="./materials/Construction-And-Material/Stairs">Stairs</a>
                                                        </li>
                                                        <li><a href="./materials/Construction-And-Material/Freestanding-Umbrellas">Freestanding
																Umbrellas</a></li>
                                                        <li><a href="./materials/Construction-And-Material/Tensile-Structures">Tensile
																Structures</a>
                                                        </li>
                                                        <li><a href="./materials/Construction-And-Material/Retractable-Structures">Retractable
																Structures</a></li>
                                                        <li><a href="./materials/Construction-And-Material/Membranes">Membranes</a>
                                                        </li>
                                                        <li><a href="./materials/Construction-And-Material/Sealants">Sealants</a>
                                                        </li>
                                                        <li><a href="./materials/Construction-And-Material/Acoustic">Acoustic</a>
                                                        </li>
                                                        <li><a href="./materials/Construction-And-Material/Thermal">Thermal</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="material-dropdown-item"><a href="./products/Equipment">Equipment</a>
                                    <div class="material-sub-dropdown">
                                        <div class="space"></div>
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6">
                                                    <ul class="sub-menu-list">
                                                        <li><a href="./materials/Equipment/Sinks">Sinks</a></li>
                                                        <li><a href="./materials/Equipment/Accessories">Accessories</a>
                                                        </li>
                                                        <li><a href="./materials/Equipment/Shower">Shower</a></li>
                                                        <li><a href="./materials/Equipment/Toilets-Urinals">Toilets /
																Urinals</a></li>
                                                        <li><a href="./materials/Equipment/Bathroom-Furniture">Bathroom
																Furniture</a></li>
                                                        <li><a href="./materials/Equipment/Faucets">Faucets</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <ul class="sub-menu-list">
                                                        <li><a href="./materials/Equipment/Residential">Residential</a>
                                                        </li>
                                                        <li><a href="./materials/Equipment/Office-Furniture">Office
																Furniture</a></li>
                                                        <li><a href="./materials/Equipment/Cultural-Sports">Cultural /
																Sports</a></li>
                                                        <li><a href="./materials/Equipment/Kitchen-Furniture-Countertops">Kitchen
																Furniture /
																Countertops</a></li>
                                                        <li><a href="./materials/Equipment/Equipment">Equipment</a></li>
                                                        <li><a href="./materials/Equipment/Elevators">Elevators</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="material-dropdown-item"><a href="./products/MEP-and-HVAC">MEP &amp; HVAC</a>
                                    <div class="material-sub-dropdown">
                                        <div class="space"></div>
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6">
                                                    <ul class="sub-menu-list">
                                                        <li><a href="./materials/MEP-and-HVAC/Lights">Lights</a></li>
                                                        <li><a href="./materials/MEP-and-HVAC/Bulbs">Bulbs</a></li>
                                                        <li><a href="./materials/MEP-and-HVAC/Bulbs-Spots-Wall-Lights">Bulbs
																/ Spots / Wall Lights</a>
                                                        </li>
                                                        <li><a href="./materials/MEP-and-HVAC/Reflectors-Street-Lighting">Reflectors
																/ Street
																Lighting</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <ul class="sub-menu-list">
                                                        <li><a href="./materials/MEP-and-HVAC/Switches-Ballasts">Switches
																/ Ballasts</a></li>
                                                        <li><a href="./materials/MEP-and-HVAC/Comfort">Comfort</a></li>
                                                        <li><a href="./materials/MEP-and-HVAC/Fluids-Treatment">Fluids
																Treatment</a></li>
                                                        <li><a href="./materials/MEP-and-HVAC/Heating">Heating</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="material-dropdown-item"><a href="./products/Application">Application</a>
                                    <div class="material-sub-dropdown">
                                        <div class="space"></div>
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6">
                                                    <ul class="sub-menu-list">
                                                        <li><a href="./materials/Application/Residential-Applications">Residential
																Applications</a>
                                                        </li>
                                                        <li><a href="./materials/Application/Corporate-Applications">Corporate
																Applications</a></li>
                                                        <li><a href="./materials/Application/Educational-Applications">Educational
																Applications</a>
                                                        </li>
                                                        <li><a href="./materials/Application/Hotel-Applications">Hotel
																Applications</a></li>
                                                        <li><a href="./materials/Application/Urban-Applications">Urban
																Applications</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <ul class="sub-menu-list">
                                                        <li><a href="./materials/Application/Cultural-Patrimonial">Cultural
																/ Patrimonial</a></li>
                                                        <li><a href="./materials/Application/Retail-Applications">Retail
																Applications</a></li>
                                                        <li><a href="./materials/Application/Healthcare-Applications">Healthcare
																Applications</a></li>
                                                        <li><a href="./materials/Application/Sports-Applications">Sports
																Applications</a></li>
                                                        <li><a href="./materials/Application/Industrial-Applications">Industrial
																Applications</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="material-dropdown-item"><a href="./products/Outdoor-Spaces">Outdoor
										Spaces</a>
                                    <div class="material-sub-dropdown">
                                        <div class="space"></div>
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6">
                                                    <ul class="sub-menu-list">
                                                        <li><a href="./materials/Outdoor-Spaces/Outdoor-Spaces">Outdoor
																Spaces</a></li>
                                                        <li><a href="./materials/Outdoor-Spaces/Bicycle-Rack-Bollards">Bicycle
																Rack / Bollards</a>
                                                        </li>
                                                        <li><a href="./materials/Outdoor-Spaces/Playground-Sports-Equipment">Playground
																/ Sports
																Equipment</a></li>
                                                        <li><a href="./materials/Outdoor-Spaces/Urban-Shading">Urban
																Shading</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <ul class="sub-menu-list">
                                                        <li><a href="./materials/Outdoor-Spaces/Patio-Furniture">Patio
																Furniture</a></li>
                                                        <li><a href="./materials/Outdoor-Spaces/Exterior-Decking">Exterior
																Decking</a></li>
                                                        <li><a href="./materials/Outdoor-Spaces/Living-Fences">Living
																Fences</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="material-dropdown-item"><a href="./products/Technology">Technology</a>
                                    <div class="material-sub-dropdown">
                                        <div class="space"></div>
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6">
                                                    <ul class="sub-menu-list">
                                                        <li><a href="./materials/Technology/Home-Appliances">Home
																Appliances</a></li>
                                                        <li><a href="./materials/Technology/Connectivity-Accessories">Connectivity
																Accessories</a>
                                                        </li>
                                                        <li><a href="./materials/Technology/Renders-3D-Animation">Renders
																/ 3D Animation</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">STUDENT CORNER</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="./thesis">THESIS</a>
                            <a class="dropdown-item" href="./portfolio">PORTFOLIO &amp; CASE STUDY</a>
                            <a class="dropdown-item" href="./dissertation">DISSERTATION</a>
                            <a class="dropdown-item" href="./thesis-report">THESIS REPORT</a>
                            <a class="dropdown-item" href="./studentwork">STUDENT WORK</a>
                        </div>
                    </li>

                    <li><a href="./blog">BLOG</a></li>

                    <li><a href="#" ng-click="ifUpload()" ng-if="isButtonHide">UPLOAD</a></li>
                    <li><a href="./leads" >LEADS</a></li>
                    <li><a href="#" class="bg-font" data-toggle="modal" data-target="#qouteModal" ng-if="isShowGetQuote">BUY PRODUCTS/SERVICES</a></li>
                    <li ng-show="isShow" class="dropdown">
                        <a href="./user-profile/{{userData.myUsername}}" class="dropdown-toggle" data-toggle="dropdown">
                            <img ng-src="uploads/{{userData.profile}}" height="25" width="25"> {{userData.username}}
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="./user-profile/{{userData.myUsername}}">Dashboard</a>
                            <a class="dropdown-item" href="logout">Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="nav-bottom-container shadow-sm">
                <ul class="inline-list">
                    <li><a href="./e-magazines">E-MAGAZINE</a></li>
                    <li><a href="./events">EVENTS</a></li>
                    <li><a href="./jobs">CAREERS</a></li>
                    <li><a href="./competitions">COMPETITION</a></li>
                    <li><a href="./partner-with-us" ng-show="!isShow">SELL YOUR PRODUCT/SERVICE</a></li>
                    <li><a href="./login" ng-show="!isShow">LOGIN/REGISTER</a></li>

                </ul>
            </div>
        </nav>


        <!-- Smalll Device Navbar  -->
        <div class="black-layer">
        </div>
        <nav id="sidenav">
            <ul class="sidenav-list">
                <li ng-show="isShow" class="dropdown">
                    <a href="./user-profile/{{userData.myUsername}}" class="dropdown-toggle" data-toggle="dropdown">
                        <img ng-src="uploads/{{userData.profile}}" height="25" width="25"> {{userData.username}}
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item sidenav-li" href="./user-profile/{{userData.myUsername}}">Dashboard</a>
                        <a class="dropdown-item sidenav-li" href="./logout">logout</a>
                    </div>
                </li>
                <li class="sidenav-li"><a class="sidenav-link" href="./">HOME</a></li>
                <li class="sidenav-li"><a class="sidenav-link" href="./project">PROJECTS</a></li>

                <!-- student  Dropdown Button -->
                <li class="sidenav-li material-drp-btn">
                    <a class="sidenav-link" href="#" id="material-link">
						STUDENT CORNER
						<span class="fa fa-angle-right" id="angle-down-symbol"></span>
					</a>
                </li>
                <li class="sidenav-li"><a class="sidenav-link" href="./blog">BLOG</a></li>
                <li class="sidenav-li"><a class="sidenav-link" href="./upload">UPLOAD</a></li>
                <li><a href="/leads" >LEADS</a></li>
                <li class="sidenav-li"><a class="sidenav-link bg-font" href="#" data-toggle="modal" data-target="#qouteModal">BUY PRODUCTS/SERVICES</a></li>

                <!-- MATERIAL Dropdown Button -->
                <li class="sidenav-li more-drp-btn">
                    <a href="#" class="sidenav-link" id="more-link">
						MATERIAL
						<span class="fa fa-angle-right" id="angle-down-symbol"></span>
					</a>
                </li>
                <li class="sidenav-li" ng-show="!isShow"><a class="sidenav-link" href="./partner-with-us">SELL YOUR PRODUCT/SERVICE</a></li>
                <li class="sidenav-li"><a class="sidenav-link" href="./e-magazines">E-MAGAZINE</a></li>
                <li class="sidenav-li"><a class="sidenav-link" href="./events">EVENTS</a></li>
                <li class="sidenav-li"><a class="sidenav-link" href="./jobs">CAREERS</a></li>
                <li class="sidenav-li"><a class="sidenav-link" href="./competitions">COMPETITION</a></li>
                <li class="sidenav-li"><a class="sidenav-link" href="./login" ng-show="!isShow">LOGIN/REGISTER</a></li>
            </ul>
        </nav>

        <!-- MATERIAL Dropdown Mwnu -->
        <div class="more-drop-dn-div">
            <ul class="more-drp-menu">
                <li>
                    <a class="sidenav-link" href="#" id="dropdown-back-btn">
                        <span class="fa fa-angle-left"></span> &nbsp; Back
                    </a>
                </li>
                <li class="sidenav-li"><a class="sidenav-link" href="./products/Finishes">Finishes</a></li>
                <li class="sidenav-li"><a class="sidenav-link" href="./products/Construction-And-Material">Construction
						And
						Material</a></li>
                <li class="sidenav-li"><a class="sidenav-link" href="./products/Equipment">Equipment</a></li>
                <li class="sidenav-li"><a class="sidenav-link" href="./products/MEP-and-HVAC">MEP & HVAC</a></li>
                <li class="sidenav-li"><a class="sidenav-link" href="./products/Application">Application</a></li>
                <li class="sidenav-li"><a class="sidenav-link" href="./products/Outdoor-Spaces">Outdoor Spaces</a></li>
                <li class="sidenav-li"><a class="sidenav-link" href="./products/Technology">Technology</a></li>
            </ul>
        </div>

        <!-- student Dropdown Menu -->
        <div class="material-drop-dn-div">
            <ul class="material-drp-menu">
                <li>
                    <a class="sidenav-link" href="#" id="dropdown-back-btn">
                        <span class="fa fa-angle-left"></span> &nbsp; Back
                    </a>
                </li>
                <li class="sidenav-li"><a class="sidenav-link" href="./thesis">THESIS</a></li>
                <li class="sidenav-li"><a class="sidenav-link" href="./portfolio">PORTFOLIO</a></li>
                <li class="sidenav-li"><a class="sidenav-link" href="./dissertation">DISSERTATION</a></li>
                <li class="sidenav-li"><a class="sidenav-link" href="./thesis-report">THESIS REPORT</a></li>
                <li class="sidenav-li"><a class="sidenav-link" href="./studentwork">STUDENT WORK</a></li>
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
                    <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div ng-if="isGetActive" ng-controller="materialController">
                        <h5 class="bg-font text-center mb-4">We will help you get the best suppliers.<br />Lets get started!
                        </h5>
                        <form name="materialForm" ng-submit="onsubmit($event.target)">
                            <div class="container-fluid">
                                <div class="form-group">
                                    <input type="text" name="product_name" class="form-control" placeholder="Enter Product Name/Service Name" data-ng-model="product_name" required list="options">
                                    <datalist id="options">
										<option ng-repeat="item in options track by $index">{{item}}</option>
									</datalist>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="area" class="form-control" placeholder="Area" data-ng-model="area" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="budget" placeholder=" Tentative Budget" data-ng-model="budget" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="specification" placeholder="Specification(if any)" data-ng-model="specification">
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input type="email" class="form-control" name="email" placeholder="Email Id" data-ng-model="email" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input type="number" class="form-control" name="phone" placeholder="Phone Number" data-ng-model="phone" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="locat" placeholder="Location" ng-model="locat">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <textarea class="form-control" placeholder="Requirements Details.." rows="5" cols="20" name="requirement" data-ng-model="requirement"></textarea>
                                </div>
                                <button class="btn btn-primary bg-color border-0 w-100" ng-disabled="!materialForm.$valid">Get
									Qoute</button>
                            </div>
                        </form>
                    </div>
                    <div ng-if="!isGetActive" ng-controller="architectController">
                        <h5 class="bg-font text-center mb-4">We will help you connect with best Architects &amp; Interior designers
                        </h5>
                        <form name="architectForm" ng-submit="onsubmit($event.target)">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <select class="form-control" name="service" data-ng-model="service" required>
												<option>{{service}}</option>
												<option>Design Only</option>
												<option>Design &amp; execution</option>
												<option>Interior Design only</option>
												<option>Interior Design &amp; execution</option>
											</select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="project_type" class="form-control" placeholder="Project type" data-ng-model="project_type">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="area" class="form-control" placeholder="Area" data-ng-model="area" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="budget" placeholder=" Tentative Budget" data-ng-model="budget" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="specification" placeholder="Specification(if any)" data-ng-model="specification">
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input type="email" class="form-control" name="email" placeholder="Email Id" data-ng-model="email" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input type="number" class="form-control" name="phone" placeholder="Phone Number" data-ng-model="phone" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="locat" placeholder="Location" data-ng-model="locat" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <textarea class="form-control" placeholder="Requirements Details.." rows="5" cols="20" name="requirement" data-ng-model="requirement"></textarea>
                                </div>
                                <button class="btn btn-primary bg-color border-0 w-100" ng-disabled="!architectForm.$valid">Get
									Qoute</button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>