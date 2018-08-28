
<!DOCTYPE html>
<html lang="en">


<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title>@yield('title') - {{config('app.name')}}</title>


	<!--STYLESHEET-->
	<!--=================================================-->

	<!--Open Sans Font [ OPTIONAL ]-->
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>


	<!--Bootstrap Stylesheet [ REQUIRED ]-->
	<link href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet">


	<!--Nifty Stylesheet [ REQUIRED ]-->
	<link href="{{ URL::asset('css/nifty.min.css') }}" rel="stylesheet">


	<!--Nifty Premium Icon [ DEMONSTRATION ]-->
	<link href="{{ URL::asset('css/demo/nifty-demo-icons.min.css') }}" rel="stylesheet">
        @if (Route::currentRouteName() == ('calendar'))

        <link href="https://cdnjs.cloudflare.com/ajax/libs/clockpicker/0.0.7/bootstrap-clockpicker.min.css" rel="stylesheet">
        @endif
	<!--=================================================-->
	@if (Route::currentRouteName() == ('email'))
	    <!--Summernote [ OPTIONAL ]-->
		<link href="{{ URL::asset('plugins/summernote/summernote.min.css')}}" rel="stylesheet">
		@endif



	<!--Pace - Page Load Progress Par [OPTIONAL]-->
        <!--<link href="{{ URL::asset('plugins/pace/pace.min.css') }}" rel="stylesheet">
        <script src="{{ URL::asset('plugins/pace/pace.min.js') }}"></script>-->


	<!--Demo [ DEMONSTRATION ]-->
	<link href="{{ URL::asset('css/demo/nifty-demo.min.css') }}" rel="stylesheet">

	<!--Font Awesome [ OPTIONAL ]-->
	<link href="{{ URL::asset('plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">


    <!--Bootstrap Timepicker [ OPTIONAL ]-->
    <link href="{{ URL::asset('plugins/bootstrap-timepicker/bootstrap-timepicker.min.css') }}" rel="stylesheet">


    @if (Route::currentRouteName() == ('member.register' || 'attendance.mark' || 'collection.offering' || 'calendar'))
	<!--Bootstrap Datepicker [ OPTIONAL ]-->
	<link href="{{ URL::asset('plugins/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet">
    <!--Bootstrap Select [ OPTIONAL ]-->
    <link href="{{ URL::asset('plugins/bootstrap-select/bootstrap-select.min.css') }}" rel="stylesheet">
    @endif

    @if (Route::currentRouteName() == 'members.all' || 'collection.report')
    <!--DataTables [ OPTIONAL ]-->
    <link href="{{ URL::asset('plugins/datatables/media/css/dataTables.bootstrap.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('plugins/datatables/extensions/Responsive/css/responsive.dataTables.min.css') }}" rel="stylesheet">
	@endif

	@if (Route::currentRouteName() == ('calendar'))
    <!--Full Calendar [ OPTIONAL ]-->
    <link href="{{ URL::asset('plugins/fullcalendar/fullcalendar.min.css') }}" rel="stylesheet">
	<link href="{{ URL::asset('plugins/fullcalendar/nifty-skin/fullcalendar-nifty.min.css') }}" rel="stylesheet">
	@endif

	    <!--Morris.js [ OPTIONAL ]-->
		<link href="{{ URL::asset('plugins/morris-js/morris.min.css') }}" rel="stylesheet">

	@if (Route::currentRouteName() == 'branch.ho')
	<!--link href="{{ URL::asset('css/bootstrap-editable.css') }}" rel="stylesheet">
    <script src="{{ URL::asset('js/bootstrap-editable.min.js') }}"></script-->
	@endif

	<!--<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
	<link href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css" rel="stylesheet">-->

	<link href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.0/semantic.min.css" rel="stylesheet">
	<link href="https://cdn.datatables.net/1.10.16/css/dataTables.semanticui.min.css" rel="stylesheet">
	<link href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.semanticui.min.css" rel="stylesheet">

	<link href="{{ URL::asset('plugins/flag-icon-css/css/flag-icon.min.css') }}" rel="stylesheet">

	    <!--Ion Icons [ OPTIONAL ]-->
		<link href="{{ URL::asset('plugins/ionicons/css/ionicons.min.css') }}" rel="stylesheet">







	<!--=================================================

    REQUIRED
    You must include this in your project.


    RECOMMENDED
    This category must be included but you may modify which plugins or components which should be included in your project.


    OPTIONAL
    Optional plugins. You may choose whether to include it in your project or not.


    DEMONSTRATION
    This is to be removed, used for demonstration purposes only. This category must not be included in your project.


    SAMPLE
    Some script samples which explain how to initialize plugins or components. This category should not be included in your project.


    Detailed information and more samples can be found in the document.

    =================================================-->

</head>

<!--TIPS-->
<!--You may remove all ID or Class names which contain "demo-", they are only used for demonstration. -->

<body>
	<div id="container" class="effect aside-float aside-bright mainnav-lg">

		<!--NAVBAR-->
		<!--===================================================-->
		<header id="navbar">
			<div id="navbar-container" class="boxed">

				<!--Brand logo & name-->
				<!--================================-->
				<div class="navbar-header">
					<a href="{{url('/dashboard')}}" class="navbar-brand">
						<img src="{{ URL::asset('img/logo.png') }}" alt="Nifty Logo" class="brand-icon">
						<div class="brand-title">
							<span class="brand-text">{{strtoupper(\Auth::user()->branchname)}}</span>
						</div>
					</a>
				</div>
				<!--================================-->
				<!--End brand logo & name-->


				<!--Navbar Dropdown-->
				<!--================================-->
				<div class="navbar-content">
					<ul class="nav navbar-top-links">

						<!--Navigation toogle button-->
						<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
						<li class="tgl-menu-btn">
							<a class="mainnav-toggle" href="forms-general.html#">
								<i class="demo-pli-list-view"></i>
							</a>
						</li>
						<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
						<!--End Navigation toogle button-->



						<!--Search-->
						<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
						<li>
							<div class="custom-search-form">
								<label class="btn btn-trans" for="search-input" data-toggle="collapse" data-target="#nav-searchbox">
									<i class="demo-pli-magnifi-glass"></i>
								</label>
								<form>
									<div class="search-container collapse" id="nav-searchbox">
										<input id="search-input" type="text" class="form-control" placeholder="Type for search...">
									</div>
								</form>
							</div>
						</li>
						<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
						<!--End Search-->

					</ul>
					<ul class="nav navbar-top-links">



						<!--User dropdown-->
						<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
						<li id="dropdown-user" class="dropdown">
							<a href="forms-general.html#" data-toggle="dropdown" class="dropdown-toggle text-right">
								<span class="ic-user pull-right">
									<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
									<!--You can use an image instead of an icon.-->
									<!--<img class="img-circle img-user media-object" src="img/profile-photos/1.png" alt="Profile Picture">-->
									<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
									<i class="demo-pli-male"> Hello {{\Auth::user()->branchname}}</i>
								</span>
								<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
								<!--You can also display a user name in the navbar.-->
								<!--<div class="username hidden-xs">Aaron Chavez</div>-->
								<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
							</a>


							<div class="dropdown-menu dropdown-menu-sm dropdown-menu-right panel-default">
								<ul class="head-list">
									<li>

	                  <form method="POST" action="{{route('logout')}}">
	                  @csrf
	                  <button type="submit"><i class="demo-pli-unlock icon-lg icon-fw"></i> Logout</button>
	                  </form>
									</li>
								</ul>
							</div>
						</li>
						<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
						<!--End user dropdown-->

						<!--<li>
                            <a href="forms-general.html#" class="aside-toggle">
                                <i class="demo-pli-dot-vertical"></i>
                            </a>
                        </li>-->
					</ul>
				</div>
				<!--================================-->
				<!--End Navbar Dropdown-->

			</div>
		</header>
		<!--===================================================-->
		<!--END NAVBAR-->

		<div class="boxed">

			<!--CONTENT CONTAINER-->
			<!--===================================================-->



            @yield('content')


			<!--===================================================-->
			<!--END CONTENT CONTAINER-->



			<!--ASIDE-->
			<!--===================================================-->
			<aside style="display:none" id="aside-container">
				<div id="aside">
					<div class="nano">
						<div class="nano-content">

							<!--Nav tabs-->
							<!--================================-->
							<ul class="nav nav-tabs nav-justified">
								<li class="active">
									<a href="forms-general.html#demo-asd-tab-1" data-toggle="tab">
										<i class="demo-pli-speech-bubble-7 icon-lg"></i>
									</a>
								</li>
								<li>
									<a href="forms-general.html#demo-asd-tab-2" data-toggle="tab">
										<i class="demo-pli-information icon-lg icon-fw"></i> Report
									</a>
								</li>
								<li>
									<a href="forms-general.html#demo-asd-tab-3" data-toggle="tab">
										<i class="demo-pli-wrench icon-lg icon-fw"></i> Settings
									</a>
								</li>
							</ul>
							<!--================================-->
							<!--End nav tabs-->



							<!-- Tabs Content -->
							<!--================================-->
							<div class="tab-content">

								<!--First tab (Contact list)-->
								<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
								<div class="tab-pane fade in active" id="demo-asd-tab-1">
									<p class="pad-all text-main text-sm text-uppercase text-bold">
										<span class="pull-right badge badge-warning">3</span> Family
									</p>

									<!--Family-->
									<div class="list-group bg-trans">
										<a href="forms-general.html#" class="list-group-item">
											<div class="media-left pos-rel">
												<img class="img-circle img-xs" src="img/profile-photos/2.png" alt="Profile Picture">
												<i class="badge badge-success badge-stat badge-icon pull-left"></i>
											</div>
											<div class="media-body">
												<p class="mar-no text-main">Stephen Tran</p>
												<small class="text-muteds">Availabe</small>
											</div>
										</a>
										<a href="forms-general.html#" class="list-group-item">
											<div class="media-left pos-rel">
												<img class="img-circle img-xs" src="img/profile-photos/7.png" alt="Profile Picture">
											</div>
											<div class="media-body">
												<p class="mar-no text-main">Brittany Meyer</p>
												<small class="text-muteds">I think so</small>
											</div>
										</a>
										<a href="forms-general.html#" class="list-group-item">
											<div class="media-left pos-rel">
												<img class="img-circle img-xs" src="img/profile-photos/1.png" alt="Profile Picture">
												<i class="badge badge-info badge-stat badge-icon pull-left"></i>
											</div>
											<div class="media-body">
												<p class="mar-no text-main">Jack George</p>
												<small class="text-muteds">Last Seen 2 hours ago</small>
											</div>
										</a>
										<a href="forms-general.html#" class="list-group-item">
											<div class="media-left pos-rel">
												<img class="img-circle img-xs" src="img/profile-photos/4.png" alt="Profile Picture">
											</div>
											<div class="media-body">
												<p class="mar-no text-main">Donald Brown</p>
												<small class="text-muteds">Lorem ipsum dolor sit amet.</small>
											</div>
										</a>
										<a href="forms-general.html#" class="list-group-item">
											<div class="media-left pos-rel">
												<img class="img-circle img-xs" src="img/profile-photos/8.png" alt="Profile Picture">
												<i class="badge badge-warning badge-stat badge-icon pull-left"></i>
											</div>
											<div class="media-body">
												<p class="mar-no text-main">Betty Murphy</p>
												<small class="text-muteds">Idle</small>
											</div>
										</a>
										<a href="forms-general.html#" class="list-group-item">
											<div class="media-left pos-rel">
												<img class="img-circle img-xs" src="img/profile-photos/9.png" alt="Profile Picture">
												<i class="badge badge-danger badge-stat badge-icon pull-left"></i>
											</div>
											<div class="media-body">
												<p class="mar-no text-main">Samantha Reid</p>
												<small class="text-muteds">Offline</small>
											</div>
										</a>
									</div>

									<hr>
									<p class="pad-all text-main text-sm text-uppercase text-bold">
										<span class="pull-right badge badge-success">Offline</span> Friends
									</p>

									<!--Works-->
									<div class="list-group bg-trans">
										<a href="forms-general.html#" class="list-group-item">
											<span class="badge badge-purple badge-icon badge-fw pull-left"></span> Joey K. Greyson
										</a>
										<a href="forms-general.html#" class="list-group-item">
											<span class="badge badge-info badge-icon badge-fw pull-left"></span> Andrea Branden
										</a>
										<a href="forms-general.html#" class="list-group-item">
											<span class="badge badge-success badge-icon badge-fw pull-left"></span> Johny Juan
										</a>
										<a href="forms-general.html#" class="list-group-item">
											<span class="badge badge-danger badge-icon badge-fw pull-left"></span> Susan Sun
										</a>
									</div>


									<hr>
									<p class="pad-all text-main text-sm text-uppercase text-bold">News</p>

									<div class="pad-hor">
										<p>Lorem ipsum dolor sit amet, consectetuer
											<a data-title="45%" class="add-tooltip text-semibold text-main" href="forms-general.html#">adipiscing elit</a>, sed diam nonummy nibh. Lorem ipsum dolor sit amet.
										</p>
										<small>
											<em>Last Update : Des 12, 2014</em>
										</small>
									</div>


								</div>
								<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
								<!--End first tab (Contact list)-->


								<!--Second tab (Custom layout)-->
								<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
								<div class="tab-pane fade" id="demo-asd-tab-2">

									<!--Monthly billing-->
									<div class="pad-all">
										<p class="pad-ver text-main text-sm text-uppercase text-bold">Billing &amp; reports</p>
										<p>Get
											<strong class="text-main">$5.00</strong> off your next bill by making sure your full payment reaches us before August 5, 2018.</p>
									</div>
									<hr class="new-section-xs">
									<div class="pad-all">
										<span class="pad-ver text-main text-sm text-uppercase text-bold">Amount Due On</span>
										<p class="text-sm">August 17, 2018</p>
										<p class="text-2x text-thin text-main">$83.09</p>
										<button class="btn btn-block btn-success mar-top">Pay Now</button>
									</div>


									<hr>

									<p class="pad-all text-main text-sm text-uppercase text-bold">Additional Actions</p>

									<!--Simple Menu-->
									<div class="list-group bg-trans">
										<a href="forms-general.html#" class="list-group-item">
											<i class="demo-pli-information icon-lg icon-fw"></i> Service Information</a>
										<a href="forms-general.html#" class="list-group-item">
											<i class="demo-pli-mine icon-lg icon-fw"></i> Usage Profile</a>
										<a href="forms-general.html#" class="list-group-item">
											<span class="label label-info pull-right">New</span>
											<i class="demo-pli-credit-card-2 icon-lg icon-fw"></i> Payment Options</a>
										<a href="forms-general.html#" class="list-group-item">
											<i class="demo-pli-support icon-lg icon-fw"></i> Message Center</a>
									</div>


									<hr>

									<div class="text-center">
										<div>
											<i class="demo-pli-old-telephone icon-3x"></i>
										</div>
										Questions?
										<p class="text-lg text-semibold text-main"> (415) 234-53454 </p>
										<small>
											<em>We are here 24/7</em>
										</small>
									</div>
								</div>
								<!--End second tab (Custom layout)-->
								<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->


								<!--Third tab (Settings)-->
								<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
								<div class="tab-pane fade" id="demo-asd-tab-3">
									<ul class="list-group bg-trans">
										<li class="pad-top list-header">
											<p class="text-main text-sm text-uppercase text-bold mar-no">Account Settings</p>
										</li>
										<li class="list-group-item">
											<div class="pull-right">
												<input class="toggle-switch" id="demo-switch-1" type="checkbox" checked>
												<label for="demo-switch-1"></label>
											</div>
											<p class="mar-no text-main">Show my personal status</p>
											<small class="text-muted">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</small>
										</li>
										<li class="list-group-item">
											<div class="pull-right">
												<input class="toggle-switch" id="demo-switch-2" type="checkbox" checked>
												<label for="demo-switch-2"></label>
											</div>
											<p class="mar-no text-main">Show offline contact</p>
											<small class="text-muted">Aenean commodo ligula eget dolor. Aenean massa.</small>
										</li>
										<li class="list-group-item">
											<div class="pull-right">
												<input class="toggle-switch" id="demo-switch-3" type="checkbox">
												<label for="demo-switch-3"></label>
											</div>
											<p class="mar-no text-main">Invisible mode </p>
											<small class="text-muted">Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. </small>
										</li>
									</ul>


									<hr>

									<ul class="list-group pad-btm bg-trans">
										<li class="list-header">
											<p class="text-main text-sm text-uppercase text-bold mar-no">Public Settings</p>
										</li>
										<li class="list-group-item">
											<div class="pull-right">
												<input class="toggle-switch" id="demo-switch-4" type="checkbox" checked>
												<label for="demo-switch-4"></label>
											</div>
											Online status
										</li>
										<li class="list-group-item">
											<div class="pull-right">
												<input class="toggle-switch" id="demo-switch-5" type="checkbox" checked>
												<label for="demo-switch-5"></label>
											</div>
											Show offline contact
										</li>
										<li class="list-group-item">
											<div class="pull-right">
												<input class="toggle-switch" id="demo-switch-6" type="checkbox" checked>
												<label for="demo-switch-6"></label>
											</div>
											Show my device icon
										</li>
									</ul>



									<hr>

									<p class="pad-hor text-main text-sm text-uppercase text-bold mar-no">Task Progress</p>
									<div class="pad-all">
										<p class="text-main">Upgrade Progress</p>
										<div class="progress progress-sm">
											<div class="progress-bar progress-bar-success" style="width: 15%;">
												<span class="sr-only">15%</span>
											</div>
										</div>
										<small>15% Completed</small>
									</div>
									<div class="pad-hor">
										<p class="text-main">Database</p>
										<div class="progress progress-sm">
											<div class="progress-bar progress-bar-danger" style="width: 75%;">
												<span class="sr-only">75%</span>
											</div>
										</div>
										<small>17/23 Database</small>
									</div>

								</div>
								<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
								<!--Third tab (Settings)-->

							</div>
						</div>
					</div>
				</div>
			</aside>
			<!--===================================================-->
			<!--END ASIDE-->


			<!--MAIN NAVIGATION-->
			<!--===================================================-->
			<nav id="mainnav-container">
				<div id="mainnav">


					<!--OPTIONAL : ADD YOUR LOGO TO THE NAVIGATION-->
					<!--It will only appear on small screen devices.-->
					<!--================================
                    <div class="mainnav-brand">
                        <a href="index.html" class="brand">
                            <img src="img/logo.png" alt="Nifty Logo" class="brand-icon">
                            <span class="brand-text">Nifty</span>
                        </a>
                        <a href="#" class="mainnav-toggle"><i class="pci-cross pci-circle icon-lg"></i></a>
                    </div>
                    -->



					<!--Menu-->
					<!--================================-->
					<div id="mainnav-menu-wrap">
						<div class="nano">
							<div class="nano-content">

								<!--Profile Widget-->
								<!--================================-->
								<div id="mainnav-profile" class="mainnav-profile">
									<div class="profile-wrap text-center">
										<div class="pad-btm">
											<img class="img-circle img-md" src="{{ URL::asset('img/profile-photos/1.png') }}" alt="Profile Picture">
										</div>
										<a href="dashboardprofile-nav" class="box-block" data-toggle="collapse" aria-expanded="false">
											<span class="pull-right dropdown-toggle">
												<i class="dropdown-caret"></i>
											</span>
											<p class="mnp-name"><span class="flag-icon flag-icon-ng"></span> {{\Auth::user()->branchname}}</p>
											<p class="mnp-desc">{{\Auth::user()->branchcode}}</p>
										</a>
									</div>

									<!--<div id="profile-nav" class="collapse list-group bg-trans">
                                        <a href="dashboard" class="list-group-item">
                                            <i class="demo-pli-male icon-lg icon-fw"></i> View Profile
                                        </a>
                                        <a href="dashboard" class="list-group-item">
                                            <i class="demo-pli-gear icon-lg icon-fw"></i> Settings
                                        </a>
                                        <a href="dashboard" class="list-group-item">
                                            <i class="demo-pli-information icon-lg icon-fw"></i> Help
                                        </a>
                                        <a href="dashboard" class="list-group-item">
                                            <i class="demo-pli-unlock icon-lg icon-fw"></i> Logout
                                        </a>
                                    </div>-->
								</div>


                                                                <!--Shortcut buttons-->                                                                <!--================================-->                                                                <div id="mainnav-shortcut" class="hidden">
									<ul class="list-unstyled shortcut-wrap">
										<li class="col-xs-3" data-content="My Profile">
											<a class="shortcut-grid" href="dashboard">
												<div class="icon-wrap icon-wrap-sm icon-circle bg-mint">
													<i class="demo-pli-male"></i>
												</div>
											</a>
										</li>
										<li class="col-xs-3" data-content="Messages">
											<a class="shortcut-grid" href="dashboard">
												<div class="icon-wrap icon-wrap-sm icon-circle bg-warning">
													<i class="demo-pli-speech-bubble-3"></i>
												</div>
											</a>
										</li>
										<li class="col-xs-3" data-content="Activity">
											<a class="shortcut-grid" href="dashboard">
												<div class="icon-wrap icon-wrap-sm icon-circle bg-success">
													<i class="demo-pli-thunder"></i>
												</div>
											</a>
										</li>
										<li class="col-xs-3" data-content="Lock Screen">
											<a class="shortcut-grid" href="dashboard">
												<div class="icon-wrap icon-wrap-sm icon-circle bg-purple">
													<i class="demo-pli-lock-2"></i>
												</div>
											</a>
										</li>
									</ul>
								</div>
								<!--================================-->
								<!--End shortcut buttons-->


								<ul id="mainnav-menu" class="list-group">

									<!--Category name-->
									<li class="list-header">Navigation</li>

									<!--Menu list item-->
									<li class="{{ Route::currentRouteName() === 'dashboard' ? 'active-sub active' : '' }}">
										<a href="{{route('dashboard')}}">
											<!--<i class="demo-pli-home"></i>-->
											<span class="menu-title">Dashboard</span>
											<!--<i class="arrow"></i>-->
										</a>


										<!--<ul class="collapse in">
						                    <li><a href="index.html">Dashboard 1</a></li>
											<li><a href="dashboard-2.html">Dashboard 2</a></li>
											<li class="active-link"><a href="dashboard-3.html">Dashboard 3</a></li>

						                </ul>-->
									</li>

									<!--Menu list item-->
									<!--<li>
						                <a href="dashboard">
						                    <i class="demo-pli-split-vertical-2"></i>
						                    <span class="menu-title">Layouts</span>
											<i class="arrow"></i>
						                </a>


						                <ul class="collapse">
						                    <li><a href="layouts-collapsed-navigation.html">Collapsed Navigation</a></li>
											<li><a href="layouts-offcanvas-navigation.html">Off-Canvas Navigation</a></li>
											<li><a href="layouts-offcanvas-slide-in-navigation.html">Slide-in Navigation</a></li>
											<li><a href="layouts-offcanvas-revealing-navigation.html">Revealing Navigation</a></li>
											<li class="list-divider"></li>
											<li><a href="layouts-aside-right-side.html">Aside on the right side</a></li>
											<li><a href="layouts-aside-left-side.html">Aside on the left side</a></li>
											<li><a href="layouts-aside-dark-theme.html">Dark version of aside</a></li>
											<li class="list-divider"></li>
											<li><a href="layouts-fixed-navbar.html">Fixed Navbar</a></li>
											<li><a href="layouts-fixed-footer.html">Fixed Footer</a></li>

						                </ul>
						            </li>-->

									<!--Menu list item-->
									<!--<li>
						                <a href="widgets.html">
						                    <i class="demo-pli-gear"></i>
						                    <span class="menu-title">
												Widgets
												<span class="pull-right badge badge-warning">24</span>
											</span>
						                </a>
						            </li>-->

									<li class="list-divider"></li>

									<!--Category name-->
									<!--<li class="list-header">Components</li>-->

									<!--Menu list item-->
                                    <li class="{{ Route::currentRouteName() === 'members.all' || Route::currentRouteName() === 'member.register.form' ? 'active-sub active' : ''}}

                                    {{Route::currentRouteName() === 'member.profile' ? 'active-sub' : ''}}">
										<a href="{{route('members.all')}}">
											<i class="demo-pli-boot-2"></i>
											<span class="menu-title">Members</span>
											<i class="arrow"></i>
										</a>


										<ul class="collapse">
											<li class="{{ Route::currentRouteName() === 'members.all' ? 'active-sub active' : '' }}">
												<a href="{{ route('members.all') }}">All Members</a>
											</li>
											<li class="{{ Route::currentRouteName() === 'member.register.form' ? 'active-sub active' : '' }}">
												<a href="{{route('member.register.form')}}">Registration</a>
                                            </li>

											<!--<li><a href="ui-modals.html">Modals</a></li>
											<li><a href="ui-progress-bars.html">Progress bars</a></li>
											<li><a href="ui-components.html">Components</a></li>
											<li><a href="ui-typography.html">Typography</a></li>
											<li><a href="ui-list-group.html">List Group</a></li>
											<li><a href="ui-tabs-accordions.html">Tabs &amp; Accordions</a></li>
											<li><a href="ui-alerts-tooltips.html">Alerts &amp; Tooltips</a></li>-->

										</ul>
									</li>

									<!--Menu list item-->
                                                                        <li class="{{ Route::currentRouteName() === 'attendance' || Route::currentRouteName() === 'attendance.analysis' || Route::currentRouteName() === 'attendance.view.form' ? 'active-sub active' : ''}}
									{{Route::currentRouteName() === 'attendance' ? 'active-sub' : ''}}">
										<a href="dashboard">
											<i class="demo-pli-pen-5"></i>
											<span class="menu-title">Attendance</span>
											<i class="arrow"></i>
										</a>


										<ul class="collapse">
											<li class="{{ Route::currentRouteName() === 'attendance' ? 'active-sub active' : '' }}">
												<a href="{{route('attendance')}}">Mark Attendance</a>
											</li>
                      <li class="{{ Route::currentRouteName() === 'attendance.view.form' ? 'active-sub active' : '' }}">
                              <a href="{{route('attendance.view.form')}}">View Attendance</a>
											</li>
											<li class="{{ Route::currentRouteName() === 'attendance.analysis' ? 'active-sub active' : '' }}">
												<a href="{{route('attendance.analysis')}}">Attendance Analysis</a>
											</li>
											<!--<li><a href="forms-wizard.html">Wizard</a></li>
											<li><a href="forms-file-upload.html">File Upload</a></li>
											<li><a href="forms-text-editor.html">Text Editor</a></li>
											<li><a href="forms-markdown.html">Markdown</a></li>-->

										</ul>
									</li>

									<!--Menu list item-->
									<li>
										<a href="#">
											<i class="demo-pli-receipt-4"></i>
											<span class="menu-title">Collection</span>
											<i class="arrow"></i>
										</a>
										<ul class="collapse">
											<li>
												<a href="{{route('collection.offering')}}">Save Collection</a>
											</li>
											<li>
												<a href="{{route('collection.report')}}">Collection Report</a>
											</li>
											<li>
												<a href="{{route('collection.analysis')}}">Collection Analysis</a>
											</li>

										</ul>

										<!--<ul class="collapse">
											<li>
												<a href="tables-static.html">Offering Collection</a>
											</li>
											<li>
												<a href="tables-bootstrap.html">Offering Analysis</a>
											</li>

										</ul>-->
									</li>
									<li class="{{Route::currentRouteName() === 'groups' ? 'active-sub' : ''}}">
										<a href="{{ route('groups') }}">
											<i class="fa fa-users"></i>
											<span class="menu-title">Small Groups</span>

										</a>
									</li>
									<li class="{{Route::currentRouteName() === 'messaging' ? 'active-sub' : ''}}">
										<a href="#">
											<i class="fa fa-envelope"></i>
											<span class="menu-title">Messaging</span>
											<i class="arrow"></i>
										</a>
										<ul class="collapse">
											<li>
												<a href="{{route('email')}}">Email</a>
											</li>
											<li>
												<a href="{{route('sms')}}">Bulk SMS</a>
											</li>

										</ul>
									</li>
									@if (\Auth::user()->isAdmin())
									<li class="{{Route::currentRouteName() === 'branches' ? 'active-sub' : ''}}">
										<a href="#">
											<i class="fa fa-building-o"></i>
											<span class="menu-title">Admin Tools</span>
											<i class="arrow"></i>
										</a>
										<ul class="collapse">
											<li>
												<a href="{{route('branches')}}">Branches</a>
											</li>
											<li>
												<a href="{{route('branch.register')}}">Add New Branch</a>
											</li>
											<li>
												<a href="{{route('branch.ho')}}">Head Office Options</a>
											</li>
											<!--li>
												<a href="{{route('branches')}}">Coming Soon</a>
											</li-->

										</ul>
									</li>
									@endif
									<li class="{{Route::currentRouteName() === 'calendar' ? 'active-sub' : ''}}">
										<a href="{{ route('calendar') }}">
											<i class="fa fa-calendar"></i>
											<span class="menu-title">Calendar & Events</span>
											<!--<i class="arrow"></i>-->
										</a>
									</li>
									<li class="{{Route::currentRouteName() === 'report.membership' || Route::currentRouteName() === 'report.collections' || Route::currentRouteName() === 'report.attendance' ? 'active-sub' : ''}}">
										<a href="#">
											<i class="fa fa-envelope"></i>
											<span class="menu-title">Report</span>
											<i class="arrow"></i>
										</a>
										<ul class="collapse">
											<li>
												<a href="{{route('report.membership')}}">Membership</a>
											</li>
											<li>
												<a href="{{route('report.collections')}}">Collections</a>
											</li>
											<li>
												<a href="{{route('report.attendance')}}">Attendance</a>
											</li>
										</ul>
									</li>
									<!--Menu list item-->
									<!--<li>
						                <a href="dashboard">
						                    <i class="demo-pli-bar-chart"></i>
						                    <span class="menu-title">Charts</span>
											<i class="arrow"></i>
						                </a>
						                <ul class="collapse">
						                    <li><a href="charts-morris-js.html">Morris JS</a></li>
											<li><a href="charts-flot-charts.html">Flot Charts</a></li>
											<li><a href="charts-easy-pie-charts.html">Easy Pie Charts</a></li>
											<li><a href="charts-sparklines.html">Sparklines</a></li>

						                </ul>
						            </li>-->

									<!--Menu list item-->
									<!--<li>
						                <a href="dashboard">
						                    <i class="demo-pli-repair"></i>
						                    <span class="menu-title">Miscellaneous</span>
											<i class="arrow"></i>
						                </a>


						                <ul class="collapse">
						                    <li><a href="misc-timeline.html">Timeline</a></li>
											<li><a href="misc-maps.html">Google Maps</a></li>
											<li><a href="xplugins-notifications.html">Notifications<span class="label label-purple pull-right">Improved</span></a></li>
											<li><a href="misc-nestable-list.html">Nestable List</a></li>
											<li><a href="misc-animate-css.html">CSS Animations</a></li>
											<li><a href="misc-css-loaders.html">CSS Loaders</a></li>
											<li><a href="misc-spinkit.html">Spinkit</a></li>
											<li><a href="misc-tree-view.html">Tree View</a></li>
											<li><a href="misc-clipboard.html">Clipboard</a></li>
											<li><a href="misc-x-editable.html">X-Editable</a></li>

						                </ul>
						            </li>-->

									<!--Menu list item-->
									<!--<li>
						                <a href="dashboard">
						                    <i class="demo-pli-warning-window"></i>
						                    <span class="menu-title">Grid System</span>
											<i class="arrow"></i>
						                </a>


						                <ul class="collapse">
						                    <li><a href="grid-bootstrap.html">Bootstrap Grid</a></li>
											<li><a href="grid-liquid-fixed.html">Liquid Fixed</a></li>
											<li><a href="grid-match-height.html">Match Height</a></li>
											<li><a href="grid-masonry.html">Masonry</a></li>

						                </ul>
						            </li>-->

									<li class="list-divider"></li>

									<!--Category name-->
									<!--<li class="list-header">More</li>-->

									<!--Menu list item-->
									<!--<li>
						                <a href="dashboard">
						                    <i class="demo-pli-computer-secure"></i>
						                    <span class="menu-title">App Views</span>
											<i class="arrow"></i>
						                </a>


						                <ul class="collapse">
						                    <li><a href="app-file-manager.html">File Manager</a></li>
											<li><a href="app-users.html">Users</a></li>
											<li><a href="app-users-2.html">Users 2</a></li>
											<li><a href="app-profile.html">Profile</a></li>
											<li><a href="app-calendar.html">Calendar</a></li>
											<li><a href="app-taskboard.html">Taskboard</a></li>
											<li><a href="app-chat.html">Chat</a></li>
											<li><a href="app-contact-us.html">Contact Us</a></li>

						                </ul>
						            </li>-->

									<!--Menu list item-->
									<!--<li>
						                <a href="dashboard">
						                    <i class="demo-pli-speech-bubble-5"></i>
						                    <span class="menu-title">Blog Apps</span>
											<i class="arrow"></i>
						                </a>


						                <ul class="collapse">
						                    <li><a href="blog.html">Blog</a></li>
											<li><a href="blog-list.html">Blog List</a></li>
											<li><a href="blog-list-2.html">Blog List 2</a></li>
											<li><a href="blog-details.html">Blog Details</a></li>
											<li class="list-divider"></li>
											<li><a href="blog-manage-posts.html">Manage Posts</a></li>
											<li><a href="blog-add-edit-post.html">Add Edit Post</a></li>

						                </ul>
						            </li>-->

									<!--Menu list item-->
									<!--<li>
						                <a href="dashboard">
						                    <i class="demo-pli-mail"></i>
						                    <span class="menu-title">Email</span>
											<i class="arrow"></i>
						                </a>


						                <ul class="collapse">
						                    <li><a href="mailbox.html">Inbox</a></li>
											<li><a href="mailbox-message.html">View Message</a></li>
											<li><a href="mailbox-compose.html">Compose Message</a></li>
											<li><a href="mailbox-templates.html">Email Templates</a></li>

						                </ul>
						            </li>-->

									<!--Menu list item-->
									<!--<li>
						                <a href="dashboard">
						                    <i class="demo-pli-file-html"></i>
						                    <span class="menu-title">Other Pages</span>
											<i class="arrow"></i>
						                </a>


						                <ul class="collapse">
						                    <li><a href="pages-blank.html">Blank Page</a></li>
											<li><a href="pages-invoice.html">Invoice</a></li>
											<li><a href="pages-search-results.html">Search Results</a></li>
											<li><a href="pages-faq.html">FAQ</a></li>
											<li><a href="pages-pricing.html">Pricing<span class="label label-success pull-right">New</span></a></li>
											<li class="list-divider"></li>
											<li><a href="pages-404-alt.html">Error 404 alt</a></li>
											<li><a href="pages-500-alt.html">Error 500 alt</a></li>
											<li class="list-divider"></li>
											<li><a href="pages-404.html">Error 404 </a></li>
											<li><a href="pages-500.html">Error 500</a></li>
											<li><a href="pages-maintenance.html">Maintenance</a></li>
											<li><a href="pages-login.html">Login</a></li>
											<li><a href="pages-register.html">Register</a></li>
											<li><a href="pages-password-reminder.html">Password Reminder</a></li>
											<li><a href="pages-lock-screen.html">Lock Screen</a></li>

						                </ul>
						            </li>-->

									<!--Menu list item-->
									<!--<li>
						                <a href="dashboard">
						                    <i class="demo-pli-photo-2"></i>
						                    <span class="menu-title">Gallery</span>
											<i class="arrow"></i>
						                </a>


						                <ul class="collapse">
						                    <li><a href="gallery-columns.html">Columns</a></li>
											<li><a href="gallery-justified.html">Justified</a></li>
											<li><a href="gallery-nested.html">Nested</a></li>
											<li><a href="gallery-grid.html">Grid</a></li>
											<li><a href="gallery-carousel.html">Carousel</a></li>
											<li class="list-divider"></li>
											<li><a href="gallery-slider.html">Slider</a></li>
											<li><a href="gallery-default-theme.html">Default Theme</a></li>
											<li><a href="gallery-compact-theme.html">Compact Theme</a></li>
											<li><a href="gallery-grid-theme.html">Grid Theme</a></li>

						                </ul>
						            </li>-->


									<!--Menu list item-->
									<!--<li>
                                        <a href="dashboard">
                                            <i class="demo-pli-tactic"></i>
                                            <span class="menu-title">Menu Level</span>
                                            <i class="arrow"></i>
                                        </a>


                                        <ul class="collapse">
                                            <li><a href="dashboard">Second Level Item</a></li>
                                            <li><a href="dashboard">Second Level Item</a></li>
                                            <li><a href="dashboard">Second Level Item</a></li>
                                            <li class="list-divider"></li>
                                            <li>
                                                <a href="dashboard">Third Level<i class="arrow"></i></a>


                                                <ul class="collapse">
                                                    <li><a href="dashboard">Third Level Item</a></li>
                                                    <li><a href="dashboard">Third Level Item</a></li>
                                                    <li><a href="dashboard">Third Level Item</a></li>
                                                    <li><a href="dashboard">Third Level Item</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="dashboard">Third Level<i class="arrow"></i></a>


                                                <ul class="collapse">
                                                    <li><a href="dashboard">Third Level Item</a></li>
                                                    <li><a href="dashboard">Third Level Item</a></li>
                                                    <li class="list-divider"></li>
                                                    <li><a href="dashboard">Third Level Item</a></li>
                                                    <li><a href="dashboard">Third Level Item</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>-->


									<li class="list-divider"></li>

									<!--Category name-->
									<!--<li class="list-header">Extras</li>-->

									<!--Menu list item-->
									<!--<li>
						                <a href="dashboard">
						                    <i class="demo-pli-happy"></i>
						                    <span class="menu-title">Icons Pack</span>
											<i class="arrow"></i>
						                </a>


						                <ul class="collapse">
						                    <li><a href="icons-ionicons.html">Ion Icons</a></li>
											<li><a href="icons-themify.html">Themify</a></li>
											<li><a href="icons-font-awesome.html">Font Awesome</a></li>
											<li><a href="icons-flagicons.html">Flag Icon CSS</a></li>
											<li><a href="icons-weather-icons.html">Weather Icons</a></li>

						                </ul>
						            </li>-->

									<!--Menu list item-->
									<!--<li>
						                <a href="dashboard">
						                    <i class="demo-pli-medal-2"></i>
						                    <span class="menu-title">
												PREMIUM ICONS
												<span class="label label-danger pull-right">BEST</span>
											</span>
						                </a>


						                <ul class="collapse">
						                    <li><a href="premium-line-icons.html">Line Icons Pack</a></li>
											<li><a href="premium-solid-icons.html">Solid Icons Pack</a></li>

						                </ul>
						            </li>-->

									<!--Menu list item-->
									<!--<li>
						                <a href="helper-classes.html">
						                    <i class="demo-pli-inbox-full"></i>
						                    <span class="menu-title">Helper Classes</span>
						                </a>
						            </li> -->
								</ul>




							</div>
						</div>
					</div>
					<!--================================-->
					<!--End menu-->

				</div>
			</nav>
			<!--===================================================-->
			<!--END MAIN NAVIGATION-->
		</div>



		<!-- FOOTER -->
		<!--===================================================-->
		<footer id="footer">

			<!-- Visible when footer positions are fixed -->
			<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
			<div class="show-fixed pad-rgt pull-right">
				You have
				<a href="forms-general.html#" class="text-main">
					<span class="badge badge-danger">3</span> pending action.</a>
			</div>



			<!-- Visible when footer positions are static -->
			<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
			<div class="hide-fixed pull-right pad-rgt">
			Powered By <a href="https://hoffenheimtechnologies.com" style="color:#274868;font-weight:bolder">Hoffenheim Technologies </a>
			</div>



			<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
			<!-- Remove the class "show-fixed" and "hide-fixed" to make the content always appears. -->
			<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->

			<p class="pad-lft">&#0169; 2018 {{config('app.name')}}</p>



		</footer>
		<!--===================================================-->
		<!-- END FOOTER -->


		<!-- SCROLL PAGE BUTTON -->
		<!--===================================================-->
		<button class="scroll-top btn">
			<i class="pci-chevron chevron-up"></i>
		</button>
		<!--===================================================-->



	</div>
	<!--===================================================-->
	<!-- END OF CONTAINER -->





	<!--JAVASCRIPT-->
	<!--=================================================-->

	<!--jQuery [ REQUIRED ]-->
	<script src="{{ URL::asset('js/jquery.min.js') }}"></script>


	<!--BootstrapJS [ RECOMMENDED ]-->
	<script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>


	<!--NiftyJS [ RECOMMENDED ]-->
	<script src="{{ URL::asset('js/nifty.min.js') }}"></script>
        @if (Route::currentRouteName() == ('calendar'))
        <script src="https://cdnjs.cloudflare.com/ajax/libs/clockpicker/0.0.7/bootstrap-clockpicker.min.js"></script>
        <script type="text/javascript">
    $('.clockpicker').clockpicker();
        </script>
        @endif

	<!--Bootstrap Datepicker [ OPTIONAL ]-->
	<script src="{{ URL::asset('plugins/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
	    <!--Bootstrap Timepicker [ OPTIONAL ]-->
		<script src="{{ URL::asset('plugins/bootstrap-timepicker/bootstrap-timepicker.min.js') }}"></script>

    @if (Route::currentRouteName() == ('member.register' || 'attendance.mark' || 'collection.offering'))
    <!--Bootstrap Select [ OPTIONAL ]-->
    <script src="{{ URL::asset('plugins/bootstrap-select/bootstrap-select.min.js') }}"></script>
    @endif

	<!--=================================================-->

	<!--Demo script [ DEMONSTRATION ]-->
    <!--<script src="{{ URL::asset('js/demo/nifty-demo.min.js') }}"></script>-->


    @if (Route::currentRouteName() == 'members.all' || Route::currentRouteName() == 'branches' || 'collection.report')
    <!--DataTables [ OPTIONAL ]-->
    <script src="{{ URL::asset('plugins/datatables/media/js/jquery.dataTables.js') }}"></script>
	<script src="{{ URL::asset('plugins/datatables/media/js/dataTables.bootstrap.js') }}"></script>
    <!--<script src="{{ URL::asset('plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js') }}"></script>-->

    <!--DataTables Sample [ SAMPLE ]-->
	<!--<script src="{{ URL::asset('js/demo/tables-datatables.js') }}"></script>-->

	<script src="https://cdn.datatables.net/1.10.16/js/dataTables.semanticui.min.js"></script>

	<script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
	<!--<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>-->


	<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.semanticui.min.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>

	<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.colVis.min.js"></script>



	<script>
		$(document).ready(function () {

			if ($.fn.dataTable.isDataTable('.datatable')) {
				table = $('.datatable').DataTable()
			} else {
				/*$('.datatable').DataTable({
					dom: 'Bfrtip',
					buttons: [
						'copy', 'csv', 'excel', 'pdf', 'print'
					]
				});*/

				var table = $('.datatable').DataTable({
					lengthChange: false,
					buttons: ['copy', 'excel', 'pdf', 'colvis']
				});

				table.buttons().container()
					.appendTo($('div.eight.column:eq(0)', table.table().container()));

			}
		});
	</script>
	@endif




        @if (Route::currentRouteName() == ('member.profile' || 'attendance.analysis' || 'collection.offering'))
    <!--Morris.js [ OPTIONAL ]-->
    <script src="{{ URL::asset('plugins/morris-js/morris.min.js') }}"></script>
	<script src="{{ URL::asset('plugins/morris-js/raphael-js/raphael.min.js') }}"></script>


    <!--Morris.js Sample [ SAMPLE ]-->
    <!--<script src="{{ URL::asset('js/demo/morris-js.js') }}"></script>-->
	@endif
    <!--Flot Chart [ OPTIONAL ]-->
    <script src="{{ URL::asset('plugins/flot-charts/jquery.flot.min.js') }}"></script>
	<script src="{{ URL::asset('plugins/flot-charts/jquery.flot.resize.min.js') }}"></script>
	<script src="{{ URL::asset('plugins/flot-charts/jquery.flot.pie.min.js') }}"></script>
	<script src="{{ URL::asset('plugins/flot-charts/jquery.flot.tooltip.min.js') }}"></script>

	@if (Route::currentRouteName() == ('calendar'))

	<!--Full Calendar [ OPTIONAL ]-->
	<script src="plugins/fullcalendar/lib/moment.min.js"></script>
	<script src="plugins/fullcalendar/lib/jquery-ui.custom.min.js"></script>
	<script src="plugins/fullcalendar/fullcalendar.min.js"></script>


    <!--Full Calendar [ SAMPLE ]-->
        <script>

// Misc-FullCalendar.js
// ====================================================================
// This file should not be included in your project.
// This is just a sample how to initialize plugins or components.
//
// - ThemeOn.net -



$(document).on('nifty.ready', function() {


// Calendar
// =================================================================
// Require Full Calendar
// -----------------------------------------------------------------
// http://fullcalendar.io/
// =================================================================


// initialize the external events
// -----------------------------------------------------------------
$('#demo-external-events .fc-event').each(function() {
        // store data so the calendar knows to render an event upon drop
        $(this).data('event', {
                title: $.trim($(this).text()), // use the element's text as the event title
                stick: true, // maintain when user navigates (see docs on the renderEvent method)
                className : $(this).data('class')
        });


        // make the event draggable using jQuery UI
        $(this).draggable({
                zIndex: 99999,
                revert: true,      // will cause the event to go back to its
                revertDuration: 0  //  original position after the drag
        });
});


// Initialize the calendar
// -----------------------------------------------------------------
$('#demo-calendar').fullCalendar({
        header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
        },
        editable: true,
        droppable: true, // this allows things to be dropped onto the calendar
        drop: function() {
                // is the "remove after drop" checkbox checked?
                if ($('#drop-remove').is(':checked')) {
                        // if so, remove the element from the "Draggable Events" list
                        $(this).remove();
                }
        },
        defaultDate: new Date,
        eventLimit: true, // allow "more" link when too many events
        events: [
                @foreach ($events as $event)
                {
                        title: '{{$event->title}}',
                        start: '{{$event->date}}',
												location: '{{$event->location}}',
												by: '{{$event->by_who}}',
												time: '{{$event->time}}',
												idss: '{{$event->id}}',
                        className: 'purple',
												details: '{{$event->details}}'
								},
                @endforeach
                {
                        title: 'Meeting',
                        start: '2017-12-20T10:30:00',
                        end: '2017-12-20T12:30:00',
                        className: 'danger'
                },
                {
                        id: 999,
                        title: 'Repeating Event',
                        start: '2018-01-09T16:00:00'
                },
                {
                        title: 'Click for Google',
                        url: 'http://google.com/',
                        start: '2018-08-28'
                }
        ],
				eventClick: function(calEvent, jsEvent, view){
					var title = calEvent.title;
					var location = calEvent.location;
					var by = calEvent.by;
					var idss = calEvent.idss;
					var time = calEvent.time;
					var details = calEvent.details;
					$('#by').text(by);
					$('#title').text(title);
					$('#location').text(location);
					$('#time').text(time);
					$('#id').val(idss);
					$('#details').text(details);
					$('#myModal').modal('show');
				},
				eventMouseover: function(calEvent, jsEvent, view){
				},
				eventMouseout: function(){
					//$('#myModal').modal('hide');
				},
				dayClick: function(){
				}
});

});
function dele(input){
	var decide = confirm('Are you sure you want to delete this event?');
	if(decide){
		var url = "./calendar/"+input+"/delete";
		window.location.replace(url);
	}
}
        </script>
	@endif

    <!--Flot Sample [ SAMPLE ]-->
    <!--<script src="{{ URL::asset('js/demo/flot-charts.js') }}"></script>-->

	    <!--Icons [ SAMPLE ]-->
		<script src="{{ URL::asset('js/demo/icons.js') }}"></script>


    <!--Icons [ SAMPLE ]-->
	<script >

		// MORRIS BAR CHART
		// =================================================================
		// Require MorrisJS Chart
		// -----------------------------------------------------------------
		// http://morrisjs.github.io/morris.js/
		// =================================================================
		Morris.Bar({
			element: 'demo-morris-bar',
			data: [
				{ y: 'Jan', a: 1, b: 3 },
				{ y: 'Feb', a: 3,  b: 4 },
				{ y: 'Mar', a: 2,  b: 5 },
				{ y: 'Apr', a: 5,  b: 4 },
				{ y: 'May', a: 7,  b: 5 },
				{ y: 'Jun', a: 0,  b: 5 },
				{ y: 'July', a: 7,  b: 1 },
				{ y: 'Aug', a: 1, b: 7 },
				{ y: 'Sept', a: 5, b: 7 },
				{ y: 'Oct', a: 2, b: 1 },
				{ y: 'Nov', a: 4, b: 9 },
				{ y: 'Dec', a: 2, b: 5 }
			],
			xkey: 'y',
			ykeys: ['a', 'b'],
			labels: ['Absent', 'Present'],
			gridEnabled: true,
			gridLineColor: 'rgba(0,0,0,.1)',
			gridTextColor: '#8f9ea6',
			gridTextSize: '11px',
			barColors: ['red', 'green'],
			resize:true,
			hideHover: 'auto'
		});
                </script>

@if (Route::currentRouteName() == 'collection.report'))
                <script>


		   // FLOT BAR CHART
    // =================================================================
    // Require Flot Charts
    // -----------------------------------------------------------------
    // http://www.flotcharts.org/
    // =================================================================
    /*var data = [

		<?php //$months = ['Jan', 'Feb', 'Mar','Apr','May','Jun','Jul','Aug','Sept','Oct','Now','Dec']; ?>
		<?php/*
		foreach ($months as $k => $month){
			$month_num = $k+1;
			$found = false;
			foreach($collections as $collection){

				if ($collection->month == ($k+1) ){
					$found = true;
					echo"[$month_num,$collection->amount ],";
				}
			}

			if (!$found){

					echo "[$month_num,0],";

			}
		}*/

        ?>
	];

    $.plot('#demo-flot-bar', [data], {
        series: {
            bars: {
                show: true,
                barWidth: 0.6,
                fill: true,
                fillColor: {
                    colors: [{
                        opacity: 0.9
                    }, {
                        opacity: 0.9
                    }]
                }
            }
        },
        colors: ['#9B59B6'],
        yaxis: {
            ticks: 5,
            tickColor: 'rgba(0,0,0,.1)'
        },
        xaxis: {
            ticks: 7,
            tickColor: 'transparent'
        },
        grid: {
            hoverable: true,
            clickable: true,
            tickColor: '#eeeeee',
            borderWidth: 0
        },
        legend: {
            show: true,
            position: 'nw'
        },
        tooltip: {
            show: true,
            content: 'x: %x, y: %y'
        }
    });*/
	</script>
        @endif

@if (Route::currentRouteName() == ('collection.offering'))
                <script>

    // FLOT LINE CHART
    // =================================================================
    // Require Flot Charts
    // -----------------------------------------------------------------
    // http://www.flotcharts.org/
    // =================================================================

    var pageviews = [ [1, 1436], [2, 1395], [3, 1479], [4, 1595], [5, 1509], [6, 1550], [7, 1480], [8, 1390], [9, 1550], [10, 1400], [11, 1590], [12, 1436]],
                visitor = [ [1, 1124], [2, 1183], [3, 1126], [4, 887], [5, 754], [6, 865], [7, 889], [8, 854], [9, 958], [10, 925], [11, 1056], [12, 984]],
                women = [ [1, 1024], [2, 1283], [3, 1126], [4, 487], [5, 754], [6, 565], [7, 889], [8, 814], [9, 918], [10, 825], [11, 456], [12, 1084]];;

    var plot = $.plot('#demo-flot-line', [
        {
            label: 'Men',
            data: pageviews,
            lines: {
                show: true,
                lineWidth: 1,
                fill: false
            },
            points: {
                show: true,
                radius: 2
            }
            },
        {
            label: 'Women',
            data: women,
            lines: {
                show: true,
                lineWidth: 1,
                fill: false
            },
            points: {
                show: true,
                radius: 2
            }
                        },
                        {
            label: 'Children',
            data: visitor,
            lines: {
                show: true,
                lineWidth: 1,
                fill: false
            },
            points: {
                show: true,
                radius: 2
            }
            }
        ], {
        series: {
            lines: {
                show: true
            },
            points: {
                show: true
            },
            shadowSize: 0 // Drawing is faster without shadows
        },
        colors: ['#b5bfc5', 'red','#177bbb'],
        legend: {
            show: true,
            position: 'nw',
            margin: [15, 0]
        },
        grid: {
            borderWidth: 0,
            hoverable: true,
            clickable: true
        },
        yaxis: {
            ticks: 5,
            tickColor: 'rgba(0,0,0,.1)'
        },
        xaxis: {
            ticks: 7,
            tickColor: 'transparent'
        },
        tooltip: {
            show: true,
            content: 'x: %x, y: %y'
        }
    });
	</script>
	@endif



<!-- FOR COLLECTION ANALYSIS -->

@if (Route::currentRouteName() == ('collection.analysis'))
<!-- for demo -->
<?php require_once 'js/views/collection/analysis.php'; ?>
@endif
<!-- END COLLECTION ANALYSIS -->

<!-- FOR ATTENDANCE ANALYSIS -->
@if (Route::currentRouteName() == ('attendance.analysis'))
<?php require_once 'js/views/attendance/analysis.php';?>
@endif
<!-- FOR ATTENDANCE ANALYSIS -->

<!-- FOR ATTENDANCE MARK -->
@if (Route::currentRouteName() == ('attendance'))
hhhhfh
<?php require_once 'js/views/attendance/mark.php';?>
@endif
<!-- FOR ATTENDANCE MARK -->

	@if ( Route::currentRouteName() ==  'member.profile'))
	<script>


		   // FLOT BAR CHART
    // =================================================================
    // Require Flot Charts
    // -----------------------------------------------------------------
    // http://www.flotcharts.org/
    // =================================================================
    var data = [[1, 10], [2, 8], [3, 4], [4, 13], [5, 17], [6, 9], [7, 12], [8, 15], [9, 9], [10, 15]];

    $.plot('#demo-flot-bar', [data], {
        series: {
            bars: {
                show: true,
                barWidth: 0.6,
                fill: true,
                fillColor: {
                    colors: [{
                        opacity: 0.9
                    }, {
                        opacity: 0.9
                    }]
                }
            }
        },
        colors: ['#9B59B6'],
        yaxis: {
            ticks: 5,
            tickColor: 'rgba(0,0,0,.1)'
        },
        xaxis: {
            ticks: 7,
            tickColor: 'transparent'
        },
        grid: {
            hoverable: true,
            clickable: true,
            tickColor: '#eeeeee',
            borderWidth: 0
        },
        legend: {
            show: true,
            position: 'nw'
        },
        tooltip: {
            show: true,
            content: 'x: %x, y: %y'
        }
    });
	</script>
        @endif
	<script>
    $('.datepicker').datepicker();

</script>

<script>
let html = `<div class="form-group">
				<label class="col-md-3 control-label">Relative</label>
				<div class="col-md-9">
				<button id="add-relative-btn"  class="btn btn-danger"type="button">Add Relative</button>
				</div>
			</div>`;
$('#add-relative-btn').on('click', function () {

	$('#open-modal-btn').trigger('click');


	//$('#add-relative-btn').parents('.form-group').after(html)
})

function remove_relative(id) {

	$(`#container_relative_${id}`).remove()
}

function add_relative(id, name) {
	$('#add-relative-btn').parents('.form-group').after(`<div class="form-group" id="container_relative_${id}">
				<label class="col-md-3 control-label">Added Relative</label>
				<div class="col-md-9">
                                <input  value="${name}" readonly>
                                <input name="relative_${id}" value="${id}" hidden=hidden>
				<select name="relationship_${id}" class="selectpicker" style="border:1px solid #ccc;display:inline !important;outline:none" data-style="btn-success" required>
				<option value="relative">Relationship</option>
					<option value="husband">Husband</option>
					<option value="wife">Wife</option>
					<option value="brother">Brother</option>
					<option value="sister">Sister</option>
					<option value="father">Father</option>
					<option value="mother">Mother</option>
					<option value="son">Son</option>
					<option value="daughter">Daughter</option>
				</select>
				<button  class="btn btn-xs btn-danger"type="button" onClick="remove_relative(${id})">Remove Relative</button>
				</div>
			</div>`)

	$('#close-modal-btn').trigger('click');
	$('#relatives-result-container').html('')
	$('#search-relative-input').val('')

}
$('#search-relative-input').on('keyup', function () {
	//alert('hello')
	$('#relatives-result-container').html('<img class="center-block" width="50" height="50" src="../images/spinner.gif"/>')
	let search_term = $('#search-relative-input').val()
	$.ajax({
		url: `../get-relative/${search_term}`,

	}).done(function (data) {
		console.log(data.result)
		//console.log(typeof data)
		$('#relatives-result-container').html('')

		if (typeof data.result == 'string' || data.result.message) {
			$('#relatives-result-container').html('<span style="height:50px" class="text-info">No result found</span>')
			return
		}
		console.log(typeof data.result)
		for (let person in data.result) {
			console.log(data.result[person])
			let table = `<div class="col-md-12" style="margin-bottom:10px"><span class="text-info" style="margin-right:30px;width:100px !important">${data.result[person].firstname} ${data.result[person].lastname}</span> <button onClick="add_relative(${data.result[person].id},'${data.result[person].firstname} ${data.result[person].lastname}' )" type="button" class="btn-sm btn btn-info select-relativ
e">Select Relative</button></div>
						`;
			$('#relatives-result-container').append(table)
		}
	}).fail(function () {
		$('#relatives-result-container').html('<span style="height:50px" class="text-info">No result found</span>')
	})
})
</script>
	@if (Route::currentRouteName() == ('email'))
    <!--Summernote [ OPTIONAL ]-->
    <script src="{{ URL::asset('plugins/summernote/summernote.min.js')}}"></script>


    <!--Mail [ SAMPLE ]-->
    <script src="{{ URL::asset('js/demo/mail.js')}}"></script>

	<script>
	let shouldSubmit = false;

	$('#send-mail-form').on('submit', function(e){

		if (!shouldSubmit) e.preventDefault();
		if (shouldSubmit) return;

		let message = $('.note-editable.panel-body').html();

		$('#message-textarea').html(message);

		shouldSubmit = true;

		$('#send-mail-form').trigger('submit');

	})

	</script>

@endif
<!-- branch delete -->
@if (Route::currentRouteName() == ('branches'))
<script>
    function del(d){
        var confirmed = confirm('confirm to delete');
        console.log(confirmed);
        console.log(d);
        if(confirmed){
            var id = $(d).attr('id');
            console.log(id);
            $.ajax({
                url: id,
            }).done(function(){
                location.reload();
            });
        }//{{route("branch.destroy",' + id + ')}}
    }
</script>
@endif
<!-- end branch delete -->
<!-- Head Office -->
@if (Route::currentRouteName() == ('branch.ho'))
<script>
    $(document).ready(function() {
			//head office module
			$('#save-ho').click(function (){
				$('#mod').hide();
				$('#def').show();
				$('#save-ho').hide();
				$('#cancel-ho').hide();
				$('#edit-ho').show();
			});
			$('#edit-ho').click(function (){
				$('#mod').show();
				$('#cancel-ho').show();
				$('#def').hide();
				$('#edit-ho').hide();
				$('#save-ho').show();
			});
			$('#cancel-ho').click(function (){
				$('#mod').hide();
				$('#cancel-ho').hide();
				$('#def').show();
				$('#edit-ho').show();
				$('#save-ho').hide();
			});

    /*$('.editable').on('click', function() {
        var that = $(this);
        if (that.find('input').length > 0) {
            return;
        }
        var currentText = that.text();

        var $input = $('<input>').val(currentText)
        .css({
            'position': 'absolute',
            top: '0px',
            left: '0px',
            width: that.width(),
            height: that.height(),
            opacity: 0.9,
            padding: '10px'
        });

        $(this).append($input);

        // Handle outside click
        $(document).click(function(event) {
            if(!$(event.target).closest('.editable').length) {
                if ($input.val()) {
                    that.text($input.val());
                }
                that.find('input').remove();
            }
        });
    });*/

    // process the form
    $('#update_hog').submit(function(event) {
        var confirmed = confirm('confirm to update');
        // get the form data
        // there are many ways to get this data using jQuery (you can use the class or id also)
        /*var value = {
            'name'              : $('input[name=name]').val(),
            'email'             : $('input[name=email]').val(),
            'superheroAlias'    : $('input[name=superheroAlias]').val()
        };*/
        var values = {};
        $.each($('#update_ho').serializeArray(), function(i, field) {
            values[field.name] = field.value;
        });
        // process the form
        $.ajax({
            type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url         : "{{route('branch.ho.up')}}", // the url where we want to POST
            data        : values, // our data object
            dataType    : 'json', // what type of data do we expect back from the server
                        encode          : true
        })
            // using the done promise callback
            .done(function(data) {

                // log data to the console so we can see
                console.log(data);
                location.reload();
                // here we will handle errors and validation messages
            });

        // stop the form from submitting the normal way and refreshing the page
        event.preventDefault();
    });
});

function saveHo(){

        //alert('saved');
    }
/*function save(d){
    var confirmed = confirm('confirm to update');
    if(confirmed){
        var values = {};
        $.each($('#update_ho').serializeArray(), function(i, field) {
            values[field.name] = field.value;
        });
        $.ajax({
            url: {{route('branch.ho.up')}},
            method: 'post',
        }).done(function(){
            location.reload();
        });
    }//{{route("branch.destroy",' + id + ')}}
}*/
@endif
</script>

@if (Route::currentRouteName() == ('attendance.view.form') || Route::currentRouteName() == ('attendance.view') )
<script src="{{URL::asset('js/jquery.redirect.js')}}"></script>
<script>
//Attnedance Module
$('#view-year').click(function (){
	$('#show-year').show();
});
//END Attnedance Module
function view(d){
		var confirmed = confirm('confirm to view');
		console.log(confirmed);
		console.log(d);
		if(confirmed){
				var id = $(d).attr('id');
				console.log(id);
				/*$.ajax({
					type        : 'POST',
					url: "{{route('attendance.view')}}",
					data        : id, // our data object
					dataType    : 'json', // what type of data do we expect back from the server
					encode          : true
				}).done(function(){
						location.reload();
				});*/
				$.redirect("{{route('attendance.view')}}", {'date': id, '_token' : '{{ csrf_token() }}'});

		}//{{route("branch.destroy",' + id + ')}}
}
</script>
@endif
@if(Route::currentRouteName() == "collection.offering")
<script>
	//check if js working
	//alert('ok');

	/*$(':input').keyup(function (){
		var sum = 0;
		var rowid = $(this).parent().parent().parent().attr('id');
		$('#row,1 > :input').each(function(){
			alert('im inside');
			sum = parseInt($(this).val()) + sum;
		});
		alert(sum);
	});*/

$(document).ready(function(){
	$(".saisie").each(function() {
			 $(this).keyup(function(){calculateTotal($(this).parent().index());
			 });
	 });
});

function calculateTotal(index)
{
	var total = 0;
	 $('table tr td').filter(function(){
			 if($(this).index()==index)
			 {
			 total += parseFloat($(this).find('.saisie').val())||0;
			 }
	 }
	 );
	 $('table tr td.totalCol:eq('+index+')').html(total);
	calculateSum();
	 calculateRowSum();
}
function calculateRowSum()
{
	 $('table tr:has(td):not(:last)').each(function(){
			var sum = 0; $(this).find('td').each(function(){
				 sum += parseFloat($(this).find('.saisie').val()) || 0;
			 });
					$(this).find('td:last').html(sum);
					$(this).find('#hidden-total').val(sum);
	 });
}
function calculateSum() {
	 var sum = 0;
	 $("td.totalCol").each(function() {
					 sum += parseFloat($(this).html())||0;
	 });
	 $("#sum").html(sum.toFixed(2));
}
</script>
@endif
<!-- mark attendance -->
<script>
	$(":checkbox").change(function() {
		if($(this).is(':checked')){
			$(this).next().val('yes');
		}else{
			$(this).next().val('no');
		}
	});
</script>

<!-- for email manual number input -->
<script>
$(document).ready(function(){
	$('#add-num').click(function(){
		alert('add clicked');
		var items = $('#emails').val().split(',');
		$.each(items, function (i, item) {
			$("#list").append('<li class="list-group-item d-flex justify-content-between align-items-center">'+ item +'  <span class="badge badge-danger badge-pill"><i onClick="rm_num(this);" class="btn fa fa-trash"></i></span></li>');
				$('#num-selector').append($('<option>'
				, {
						value: item,
						text : item,
						selected: 'selected'
				}, '</option>'
				));
		});
		var val = $('#num-selector').text().split(',');
		alert(val);
		$.each(val, function(i,item){
		});
	});
});
 //selected="selected" value="' + item +'" >'+ item +'</option>'
function rm_num(d){
	var text = $(d).parent().parent().text();
	var input = $("#num-selector option[value='"+ text +"']").remove();
}
</script>
</body>

</html>
