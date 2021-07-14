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
	<!-- <link href="{{ URL::asset('css/demo/nifty-demo-icons.min.css') }}" rel="stylesheet"> -->
	<!-- PARTICLES -->
	<link href="{{ URL::asset('css/particles.css') }}" rel="stylesheet">
	<!-- PARTICLES -->

	@yield('link')
  @if (Route::currentRouteName() == ('calendar')  || Route::currentRouteName() == ('notification')  || Route::currentRouteName() == ('ticket'))
  <link href="{{ URL::asset('plugins/bootstrap-datepicker/bootstrap-clockpicker.min.css') }}" rel="stylesheet">
  @endif
	<!--=================================================-->
	@if(Route::currentRouteName() == "gallery")
	<link href="{{ URL::asset('plugins/gallery/ekko-lightbox.css') }}" rel="stylesheet">
	@endif
	<!--Demo [ DEMONSTRATION ]-->
	<!-- <link href="{{ URL::asset('css/demo/nifty-demo.min.css') }}" rel="stylesheet"> -->
	<!--Font Awesome [ OPTIONAL ]-->
	<link href="{{ URL::asset('css/font-awesome.min.css')}}" rel="stylesheet">

    @if (Route::currentRouteName() == 'member.register.form' || Route::currentRouteName() == 'attendance' || Route::currentRouteName() == 'attendance.mark' || Route::currentRouteName() == 'collection.offering' || Route::currentRouteName() == 'calendar'  || Route::currentRouteName() == ('ticket'))
	<!--Bootstrap Datepicker [ OPTIONAL ]-->
	<link href="{{ URL::asset('plugins/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet">
  <!--Bootstrap Select [ OPTIONAL ]-->
  <link href="{{ URL::asset('plugins/bootstrap-select/bootstrap-select.min.css') }}" rel="stylesheet">
  @endif

	@if (Route::currentRouteName() == 'inbox')
	<!--CHAT [ OPTIONAL ]-->
	<link href="{{ URL::asset('css/chat.css') }}" rel="stylesheet">
	@endif

	@if (Route::currentRouteName() == ('calendar')  || Route::currentRouteName() == ('notification')  || Route::currentRouteName() == ('ticket'))
    <!--Full Calendar [ OPTIONAL ]-->
    <link href="{{ URL::asset('plugins/fullcalendar/fullcalendar.min.css') }}" rel="stylesheet">
	<link href="{{ URL::asset('plugins/fullcalendar/nifty-skin/fullcalendar-nifty.min.css') }}" rel="stylesheet">
	@endif

	@if (Route::currentRouteName() == 'member.register.form' || Route::currentRouteName() == 'attendance.view.form' || Route::currentRouteName() == 'collection.offering' || Route::currentRouteName() == 'attendance')
	<link href="{{ URL::asset('css/sweetalert.css') }}" rel="stylesheet">
	@endif

    <!--Morris.js [ OPTIONAL ]-->
		@if (Route::currentRouteName() == 'member.profile' || Route::currentRouteName() == 'attendance.analysis' || Route::currentRouteName() == 'collection.analysis')
		<link href="{{ URL::asset('plugins/morris-js/morris.min.css') }}" rel="stylesheet">
		@endif

	<!--<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
	<link href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css" rel="stylesheet">-->

	@if(Route::currentRouteName() == 'attendance.view.form' )
	<!-- <link href="{{ URL::asset('plugins/datatables/dataTables.semanticui.min.css') }}" rel="stylesheet"> -->
	<!-- <link href="{{ URL::asset('plugins/datatables/buttons.semanticui.min.css') }}" rel="stylesheet"> -->
	<!--DataTables [ OPTIONAL ]-->
	<link href="{{ URL::asset('plugins/datatables/media/css/dataTables.bootstrap.css') }}" rel="stylesheet">
	<!-- <link href="{{ URL::asset('plugins/datatables/extensions/Responsive/css/responsive.dataTables.min.css') }}" rel="stylesheet"> -->
	@endif

	<link href="{{ URL::asset('plugins/datatables/semantic.min.css') }}" rel="stylesheet">
	<!-- <link href="{{ URL::asset('plugins/flag-icon-css/css/flag-icon.min.css') }}" rel="stylesheet"> -->
	    <!--Ion Icons [ OPTIONAL ]-->
	<!-- <link href="{{ URL::asset('plugins/ionicons/css/ionicons.min.css') }}" rel="stylesheet"> -->
</head>

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
							<a class="mainnav-toggle" href="#">
								<i class="fa fa-bars"></i>
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
						<li class="dropdown">
								<a href="{{ route('notification') }}">
									<i class="fa fa-bullhorn fa-3x" aria-hidden="true"></i> Announcement &nbsp;&nbsp;&nbsp
										<span class="badge badge-header badge-danger"></span>
								</a>



								<!--Notification dropdown menu-->

						</li>
						<!--User dropdown-->
						<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
						<li id="dropdown-user" class="dropdown">
							<a href="#" data-toggle="dropdown" class="dropdown-toggle text-right">
								<span class="ic-user pull-right">
									<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
									<!--You can use an image instead of an icon.-->
									<!--<img class="img-circle img-user media-object" src="img/profile-photos/1.png" alt="Profile Picture">-->
									<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
									<i class="fa fa-user"> Hello {{\Auth::user()->branchname}}</i>
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
			<!--MAIN NAVIGATION-->
			<!--===================================================-->
			<nav id="mainnav-container">
				<div id="mainnav">
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
											<img class="img-circle img-md" src="{{URL::asset('images/logo.png')}}" alt="Profile Picture">
										</div>
										<a href="dashboardprofile-nav" class="box-block" data-toggle="collapse" aria-expanded="false">
											<span class="pull-right dropdown-toggle">
												<i class="dropdown-caret"></i>
											</span>
											<p class="mnp-name"><!--span class="flag-icon flag-icon-ng"></span--> {{\Auth::user()->branchname}}</p>
											<p class="mnp-desc">{{\Auth::user()->branchcode}}</p>
										</a>
									</div>
								</div>
                                                                <!--Shortcut buttons-->                                                                <!--================================-->                                                                <div id="mainnav-shortcut" class="hidden">
									<ul class="list-unstyled shortcut-wrap">
										<li class="col-xs-3" data-content="My Profile">
											<a class="shortcut-grid" href="dashboard">
												<div class="icon-wrap icon-wrap-sm icon-circle bg-mint">
													<i class="fa fa-user"></i>
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
									<li class="list-header text-center">Navigation</li>
									<li class="list-divider"></li>
									<!--Menu list item-->
									<li class="{{ Route::currentRouteName() === 'dashboard' ? 'active-sub active' : '' }}">
										<a href="{{route('dashboard')}}">
											<i class="fa fa-dashboard"></i>
											<!--<i class="demo-pli-home"></i>-->
											<span class="menu-title">Dashboard</span>
											<!--<i class="arrow"></i>-->
										</a>
									</li>
									<!--Category name-->
									<!--<li class="list-header">Components</li>-->
									<!--Menu list item-->

                  <li class="{{ (Route::currentRouteName() == 'members.all' || Route::currentRouteName() ==  'member.register.form') ? 'active-sub active' : ''}}
                  	{{Route::currentRouteName() === 'member.profile' ? 'active-sub' : ''}}">

										<a href="{{route('members.all')}}">
											<i class="fa fa-users"></i>
											<span class="menu-title">Members</span>
											<i class="arrow"></i>
										</a>
										<ul class="collapse">
											<li class="{{ Route::currentRouteName() === 'members.all' ? 'active-sub active' : '' }}">
												<a href="{{ route('members.all') }}"><i class="fa fa-list"></i> All Members</a>
											</li>
											<li class="{{ Route::currentRouteName() === 'member.register.form' ? 'active-sub active' : '' }}">
												<a href="{{route('member.register.form')}}"><i class="fa fa-registered"></i> Registration</a>
                      </li>
										</ul>
									</li>
									<!--Menu list item-->
                  <li class="{{Route::currentRouteName() === 'attendance.analysis' || Route::currentRouteName() === 'attendance.view.form' ? 'active-sub active' : ''}}
									{{Route::currentRouteName() === 'attendance' ? 'active-sub active' : ''}}">
										<a href="#">
											<i class="fa fa-check"></i>
											<span class="menu-title">Attendance</span>
											<i class="arrow"></i>
										</a>
										<ul class="collapse">
											<li class="{{ Route::currentRouteName() === 'attendance' ? 'active-sub active' : '' }}">
												<a href="{{route('attendance')}}"><i class="fa fa-save"></i> Mark Attendance</a>
											</li>
                      <li class="{{ Route::currentRouteName() === 'attendance.view.form' ? 'active-sub active' : '' }}">
	                      <a href="{{route('attendance.view.form')}}"><i class="fa fa-eye"></i> View Attendance</a>
											</li>
											<li class="{{ Route::currentRouteName() === 'attendance.analysis' ? 'active-sub active' : '' }}">
												<a href="{{route('attendance.analysis')}}"><i class="fa fa-signal"></i> Analysis</a>
											</li>
										</ul>
									</li>
									<!--Menu list item-->
									<li class="{{ (Route::currentRouteName() === 'collection.offering' || Route::currentRouteName() === 'collection.report' || Route::currentRouteName() === 'collection.analysis') ? 'active-sub active' : ''}}">
										<a href="#">
											<i class="fa fa-money"></i>
											<span class="menu-title">Collection</span>
											<i class="arrow"></i>
										</a>
										<ul class="collapse">
											<li class="{{Route::currentRouteName() === 'collection.offering' ? 'active-sub active' : '' }}">
												<a href="{{route('collection.offering')}}"><i class="fa fa-save"></i> Save Collection</a>
											</li>
											<li class="{{ Route::currentRouteName() === 'collection.report' ? 'active-sub active' : '' }}">
												<a href="{{route('collection.report')}}"><i class="fa fa-eye"></i> View Collection</a>
											</li>
											<li class="{{ Route::currentRouteName() === 'collection.analysis' ? 'active-sub active' : '' }}">
												<a href="{{route('collection.analysis')}}"><i class="fa fa-signal"></i> Analysis</a>
											</li>

										</ul>

									</li>
									<li class="{{Route::currentRouteName() === 'groups' || Route::currentRouteName() === 'group.view' ? 'active-sub' : ''}}">
										<a href="{{ route('groups') }}">
											<i class="fa fa-users"></i>
											<span class="menu-title">Small Groups</span>

										</a>
									</li>
									<li class="{{Route::currentRouteName() === 'email' || Route::currentRouteName() === 'sms' || Route::currentRouteName() === 'inbox' ? 'active-sub active' : ''}}">
										<a href="#">
											<i class="fa fa-comments-o"></i>
											<span class="menu-title">Messaging</span>
											<i class="arrow"></i>
										</a>
										<ul class="collapse">
											<li class="{{Route::currentRouteName() === 'email' ? 'active-sub active' : ''}}">
												<a href="{{route('email')}}"><i class="fa fa-envelope"></i> Email</a>
											</li>
											<li class="{{Route::currentRouteName() === 'sms' ? 'active-sub active' : ''}}">
												<a href="{{route('sms')}}"><i class="fa fa-mobile"></i> Bulk SMS</a>
											</li>
											<li class="{{Route::currentRouteName() === 'inbox' ? 'active-sub active' : ''}}">
												<a href="{{route('inbox')}}"><i class="fa fa-comments"></i> Communicator</a>
											</li>

										</ul>
									</li>
									<!-- @ if (\Auth::user()->isAdmin()) -->
									<li class="{{Route::currentRouteName() === 'branch.tools' || Route::currentRouteName() === 'branch.options' || Route::currentRouteName() === 'branch.register' || Route::currentRouteName() === 'branches' ? 'active-sub active' : ''}}">
										<a href="#">
											<i class="fa fa-building-o"></i>
											<span class="menu-title">Admin Tools</span>
											<i class="arrow"></i>
										</a>
										<ul class="collapse">
											@if (\Auth::user()->isAdmin())
											<li class="{{Route::currentRouteName() === 'branches' ? 'active-sub' : ''}}">
												<a href="{{route('branches')}}"><i class="fa fa-tree"></i> Branches</a>
											</li>
											<li class="{{Route::currentRouteName() === 'branch.register' ? 'active-sub' : ''}}">
												<a href="{{route('branch.register')}}"><i class="fa fa-plus"></i> Add New Branch</a>
											</li>
											<li class="{{Route::currentRouteName() === 'branch.tools' ? 'active-sub' : ''}}">
												<a href="{{route('branch.tools')}}"><i class="fa fa-wrench"></i> Tools</a>
											</li>
											@endif
											<li class="{{Route::currentRouteName() === 'branch.options' ? 'active-sub' : ''}}">
												<a href="{{route('branch.options')}}"><i class="fa fa-cog"></i> Options</a>
											</li>

										</ul>
									</li>
									<!-- @ endif -->
									<li class="{{Route::currentRouteName() === 'calendar' ? 'active-sub' : ''}}">
										<a href="{{ route('calendar') }}">
											<i class="fa fa-calendar"></i>
											<span class="menu-title">Calendar & Events</span>
											<!--<i class="arrow"></i>-->
										</a>
									</li>
									<li class="{{Route::currentRouteName() == 'report.membership.all' || Route::currentRouteName() == 'report.membership' || Route::currentRouteName() == 'report.collections' || Route::currentRouteName() == 'report.collections.all' || Route::currentRouteName() == 'report.attendance' || Route::currentRouteName() == 'report.attendance.all' ? 'active-sub active' : ''}}">
										<a href="#">
											<i class="fa fa-signal"></i>
											<span class="menu-title">Reports</span>
											<i class="arrow"></i>
										</a>
										<ul class="collapse">
											@if(!(\Auth::user()->isAdmin()))
											<li class="{{ Route::currentRouteName() === 'report.membership' ? 'active-sub active' : '' }}">
												<a href="{{route('report.membership')}}">Membership</a>
											</li>
											<li class="{{ Route::currentRouteName() === 'report.collections' ? 'active-sub active' : '' }}">
												<a href="{{route('report.collections')}}">Collections</a>
											</li>
											<li class="{{ Route::currentRouteName() === 'report.attendance' ? 'active-sub active' : '' }}">
												<a href="{{route('report.attendance')}}">Attendance</a>
											</li>
											@else
											<li class="{{Route::currentRouteName() == 'report.membership.all' || Route::currentRouteName() == 'report.membership' || Route::currentRouteName() == 'report.collections' || Route::currentRouteName() == 'report.collections.all' || Route::currentRouteName() == 'report.attendance' || Route::currentRouteName() == 'report.attendance.all' ? 'active-sub active' : ''}}">
												<li class="{{Route::currentRouteName() == 'report.membership.all' || Route::currentRouteName() === 'report.membership' ? 'active-sub active' : '' }}">
													<a href="#">
														<i class="fa fa-users"></i>
														<span class="menu-title">Membership</span>
														<i class="arrow"></i>
													</a>
													<ul class="collapse">
														<li class="{{ Route::currentRouteName() == 'report.membership.all' ? 'active-sub active' : '' }}">
															<a href="{{route('report.membership.all')}}"><i class="fa fa-level-up"></i> All Branches</a>
														</li>
														<li class="{{ Route::currentRouteName() == 'report.membership' ? 'active-sub active' : '' }}">
															<a href="{{route('report.membership')}}"><i class="fa fa-map-marker"></i> This Branch</a>
														</li>
													</ul>
												</li>
												<li class="{{Route::currentRouteName() == 'report.collections' || Route::currentRouteName() == 'report.collections.all' ? 'active-sub active' : '' }}">
													<a href="#">
														<i class="fa fa-money"></i>
														<span class="menu-money">Collections</span>
														<i class="arrow"></i>
													</a>
													<ul class="collapse">
														<li class="{{Route::currentRouteName() == 'report.collections.all' ? 'active-sub active' : '' }}">
															<a href="{{route('report.collections.all')}}"><i class="fa fa-level-up"></i> All Branches</a>
														</li>
														<li class="{{ Route::currentRouteName() === 'report.collections' ? 'active-sub active' : '' }}">
															<a href="{{route('report.collections')}}"><i class="fa fa-map-marker"></i> This Branch</a>
														</li>
													</ul>
												</li>
												<li class="{{Route::currentRouteName() == 'report.attendance' || Route::currentRouteName() == 'report.attendance.all' ? 'active-sub active' : '' }}">
													<a href="#">
														<i class="fa fa-check"></i>
														<span class="menu-mark">Attendance</span>
														<i class="arrow"></i>
													</a>
													<ul class="collapse">
														<li class="{{ Route::currentRouteName() == 'report.attendance.all' ? 'active-sub active' : '' }}">
															<a href="{{route('report.attendance.all')}}"><i class="fa fa-level-up"></i> All Branches</a>
														</li>
														<li class="{{ Route::currentRouteName() == 'report.attendance' ? 'active-sub active' : '' }}">
															<a href="{{route('report.attendance')}}"><i class="fa fa-map-marker"></i> This Branch</a>
														</li>
													</ul>
												</li>

											</li>

											@endif
										</ul>
									</li>
									<li class="{{Route::currentRouteName() == 'ticket' ? 'active-sub' : ''}}">
	                  <a href="{{ route('ticket') }}">
                      <i class="fa fa-life-ring"></i>
                      <span class="menu-title">Ticket</span>
	                  </a>
	                </li>
									<li>
										<form id="logout" method="POST" action="{{route('logout')}}">
		                  @csrf
										</form>
										<a href="#" onclick="$('#logout').submit()">
											<i class="fa fa-sign-out"></i>
											<span class="menu-title">Logout</span>
										</a>
									</li>
									<!--Menu list item-->
									<li class="list-divider"></li>
									<!--Category name-->
									<!--Menu list item-->
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
			Powered By <a href="https://myckhel.adbin.com.ng" style="color:#274868;font-weight:bolder"> Myckhel </a>
			</div>
			<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
			<!-- Remove the class "show-fixed" and "hide-fixed" to make the content always appears. -->
			<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
			<p class="pad-lft">&#0169; {{date('Y')}} {{config('app.name')}}</p>
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
	<!-- <script src="{{ URL::asset('js/popper.min.js') }}"></script>
	<script src="{{ URL::asset('js/jquery-3.2.1.slim.min.js') }}"></script> -->
	<!--NiftyJS [ RECOMMENDED ]-->
	<script src="{{ URL::asset('js/nifty.min.js') }}"></script>
	<!-- PARTICLES -->
	<script src="{{ URL::asset('js/particles.min.js') }}"></script>
	<!-- PARTICLES -->
  @if (Route::currentRouteName() == 'calendar'  || Route::currentRouteName() == 'notification'  || Route::currentRouteName() == 'ticket')
  <script src="{{ URL::asset('plugins/bootstrap-datepicker/bootstrap-clockpicker.min.js') }}"></script>
  <script type="text/javascript">	$('.clockpicker').clockpicker(); </script>
  @endif

	@if (Route::currentRouteName() == 'member.register.form' || Route::currentRouteName() == 'attendance.view.form' || Route::currentRouteName() == 'collection.offering')
	<script src="{{ URL::asset('js/sweetalert.min.js') }}"></script>
	@endif

	@if (Route::currentRouteName() == 'member.register.form' || Route::currentRouteName() == 'attendance.view' || Route::currentRouteName() == 'collection.offering' || Route::currentRouteName() == "members.all")
	<script src="{{ URL::asset('js/functions.js') }}"></script>
	@endif

		@if (Route::currentRouteName() == 'w')
	    <!--Bootstrap Timepicker [ OPTIONAL ]-->
		<script src="{{ URL::asset('plugins/bootstrap-timepicker/bootstrap-timepicker.min.js') }}"></script>
		@endif

		@if (Route::currentRouteName() == 'member.register.form' || Route::currentRouteName() == 'attendance' || Route::currentRouteName() == 'attendance.mark' || Route::currentRouteName() == 'collection.offering' || Route::currentRouteName() == 'calendar'  || Route::currentRouteName() == ('ticket'))
    <!--Bootstrap Select [ OPTIONAL ]-->
    <script src="{{ URL::asset('plugins/bootstrap-select/bootstrap-select.min.js') }}"></script>
		<script src="{{ URL::asset('plugins/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
		<script> $('.datepicker').datepicker(); </script>
    @endif

		@if (Route::currentRouteName() == 'gallery')
		<script src="{{ URL::asset('plugins/gallery/ekko-lightbox.min.js') }}"></script>
		@endif

		@if (Route::currentRouteName() == 'attendance.view.form' )
    <!--DataTables [ OPTIONAL ]-->
		<script src="{{ URL::asset('plugins/datatables/media/js/jquery.dataTables.js') }}"></script>
		<script src="{{ URL::asset('plugins/datatables/media/js/dataTables.bootstrap.js') }}"></script>
		<script src="{{ URL::asset('plugins/datatables/dataTables.buttons.min.js') }}"></script>
		<script src="{{ URL::asset('plugins/datatables/buttons.semanticui.min.js') }}"></script>
		<script src="{{ URL::asset('plugins/datatables/jszip.min.js') }}"></script>
		<script src="{{ URL::asset('plugins/datatables/pdfmake.min.js') }}"></script>
		<script src="{{ URL::asset('plugins/datatables/vfs_fonts.js') }}"></script>
		<script src="{{ URL::asset('plugins/datatables/buttons.html5.min.js') }}"></script>
		<script src="{{ URL::asset('plugins/datatables/buttons.colVis.min.js') }}"></script>

	<script>
		$(document).ready(function () {

			if ($.fn.dataTable.isDataTable('.datatable')) {
				table = $('.datatable').DataTable()
			} else {
				var table = $('.datatable').DataTable({
					dom: 'Bfrtip',
					lengthChange: false,
					buttons: ['copy', 'excel', 'pdf', 'colvis']
				});
				table.buttons().container()
					.appendTo($('div.eight.column:eq(0)', table.table().container()));
			}
		});
	</script>
	@endif


  @if (Route::currentRouteName() == 'attendance.analysis')
  <!--Morris.js [ OPTIONAL ]-->
  <script src="{{ URL::asset('plugins/morris-js/morris.min.js') }}"></script>
	<script src="{{ URL::asset('plugins/morris-js/raphael-js/raphael.min.js') }}"></script>
	@endif

	@if (Route::currentRouteName() == 'calendar' )
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
									<?php $pastors = []; ?>
                @foreach ($events as $event)

								<?php
								$pastors = [];
								if(isset($event->assign_to)){
								$emails = explode(',',$event->assign_to);
								$i = 0;
									foreach($emails as $email){
										$name = App\Member::getNameByEmail($email);
										if ($name) {
											$pastors[$i] = $name;
											$i++;
										}
									}
									$pastors = implode(',',$pastors);
								}else{$pastors = '';}
								 ?>
                {
                        title: '{{$event->title}}',
                        start: '{{$event->date}}',
												location: '{{$event->location}}',
												by: '{{$event->by_who}}',
												time: '{{$event->time}}',
												idss: '{{$event->id}}',
                        className: 'purple',
												details: '{{$event->details}}',
												assign_to: '{{$pastors}}'
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
					var assign_to = calEvent.assign_to;
					var assign_tos = [];
					var assignee = assign_to.split(',');
					var i = 0;
					assignee.forEach(function(ch){
						assign_tos[i] = '<span><p class="bg-primary">'+ch+'</p></span>';
						i++;
					});
					$('#by').text(by);
					$('#title').text(title);
					$('#location').text(location);
					$('#time').text(time);
					$('#id').val(idss);
					$('#details').text(details);
					$('#myModal').modal('show');

					$('#assign').html(assign_tos);
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

<!-- FOR ATTENDANCE ANALYSIS -->
@if (Route::currentRouteName() == ('attendance.analysis'))
<?php require_once 'js/views/attendance/analysis.php';?>
@endif
<!-- FOR ATTENDANCE ANALYSIS -->

<!-- FOR ATTENDANCE MARK -->
@if (Route::currentRouteName() == ('attendance'))
<?php require_once 'js/views/attendance/mark.php';?>
@endif
<!-- FOR ATTENDANCE MARK -->

<!-- Head Office -->
@if (Route::currentRouteName() == ('branch.options'))
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

    // process the form
    $('#update_hog').submit(function(event) {
        var confirmed = confirm('confirm to update');
        var values = {};
        $.each($('#update_ho').serializeArray(), function(i, field) {
            values[field.name] = field.value;
        });
        // process the form
        $.ajax({
            type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url         : "{{route('branch.optionsPost')}}", // the url where we want to POST
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
</script>
@endif


@if(Route::currentRouteName() == "attendance")
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
@endif

@if(Route::currentRouteName() == "inbox")
<script>
$(document).ready(function(){

	$('#reply-btn').click(function(){
		var msg = $('#reply-text').val();//get d value from the input
		var to = $('#reply-to').val();//get d value from the input
		var from = $('#reply-from').val();//get d value from the input
		//var value = {'msg': msg, 'to': to, 'from': from};
		var values = {};//emtpy json obj
		$.each($('#chat-form').serializeArray(), function(i, field) {
				values[field.name] = field.value;//populate the values into d json obj
		});
		if(msg != ''){
			$.ajax({
				type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
				url         : "{{route('reply')}}", // the url where we want to POST
				data        : values, // use the data object
				dataType    : 'json', // what type of data do we expect back from the server
				encode      : true
			}).done(function(data){
				get_msg(from,to);
			});
		}
	});
});
var To;
var From;

function get_msg(to,from){
	$('#inbox-chat-body').html(`<div id="wait" style="display:none;width:69px;height:89px;position:absolute;top:50%;left:50%;padding:2px;"><img src="{{URL::asset('images/msg-loader.gif')}}" width="64" height="64" /><br>Loading..	</div>`);
	$("#wait").css("display", "block");
	To = to;
	From = from;
	var values = {'to':to, 'from':from};
	$.ajax({
			type        : 'GET', // define the type of HTTP verb we want to use (POST for our form)
			url         : "{{route('conversation')}}", // the url where we want to POST
			data        : values, // our data object
			dataType    : 'json', // what type of data do we expect back from the server
			encode      : true
	}).done(function(data) {
					$("#wait").css("display", "none");
					//alert(data['chats'][0]['msg']);
					// log data to the console so we can see
					var chat_msg = "";
					data['chats'].forEach(function(ch){
						if(ch.msg_from == from){
							chat_msg += '<div class="message info">'+
									'<img alt="" class="img-circle medium-image" src="https://bootdey.com/img/Content/avatar/avatar1.png">'+

									'<div class="message-body">'+
											'<div class="message-info">'+
													'<h4 id="msg-from-name">'+ ch.branchname +' </h4>'+
													'<h5> <i class="fa fa-clock-o"></i>'+ch.date+'</h5>'+
											'</div>'+
											'<hr>'+
											'<div class="message-text" id="msg-from"><p>'+
											ch.msg+
											'</p></div>'+
									'</div>'+
									'<br>'+
							'</div>';
						}else{
						chat_msg +='<div class="message my-message">'+
								'<img alt="" class="img-circle medium-image" src="https://bootdey.com/img/Content/avatar/avatar1.png">'+

								'<div class="message-body">'+
								'<div class="message-body-inner">'+
										'<div class="message-info">'+
												'<h4 id="msg-from-name">'+ ch.branchname+'</h4>'+
												'<h5> <i class="fa fa-clock-o"></i>'+ch.date+'</h5>'+
										'</div>'+
										'<hr>'+
										'<div class="message-text" id="msg-to"><p>'+
										ch.msg+
										'</p></div>'+
								'</div>'+
								'</div>'+
								'<br>'+
						'</div>';
							//chat_msg += "";
						}
					});
					$('#inbox-chat-body').html(chat_msg);
					$('#reply-from').val(to);
					$('#reply-to').val(from);
					$('#reply-text').val('');
					// Prior to getting your messages.
				  var shouldScroll = messages.scrollTop + messages.clientHeight === messages.scrollHeight;
				  /*
				   * Get your messages, we'll just simulate it by appending a new one syncronously.
				   */
				  //appendMessage();
				  // After getting your messages.
				  if (!shouldScroll) {
				    scrollToBottom();
				  }
					// here we will handle errors and validation messages
			});
}
var messages = document.getElementById('inbox-chat-body');

function scrollToBottom() {
  messages.scrollTop = messages.scrollHeight;
}
function clr_msg_box(){
	$('#inbox-chat-body').html('');
}
scrollToBottom();

</script>
@endif
@if(Route::currentRouteName() == "gallery")
<script>
function readURL(input) {

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#blah').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

$("#imgInp").change(function() {
  readURL(this);
});

$('#imgInp').filestyle({
iconName : 'glyphicon glyphicon-file',
buttonText : 'Select File',
buttonName : 'btn-warning'
});

$(document).on('click', '[data-toggle="lightbox"]', function(event) {
    event.preventDefault();
    $(this).ekkoLightbox();
});
</script>
@endif
<script>
$(document).ready(() => {

	particlesJS('page-head',

	  {
	    "particles": {
	      "number": {
	        "value": 150,
	        "density": {
	          "enable": true,
	          "value_area": 800
	        }
	      },
	      "color": {
	        "value": "#ffffff"
	      },
	      "shape": {
	        "type": "circle",
	        "stroke": {
	          "width": 0,
	          "color": "#000000"
	        },
	        "polygon": {
	          "nb_sides": 5
	        },
	        "image": {
	          "src": "img/github.svg",
	          "width": 100,
	          "height": 100
	        }
	      },
	      "opacity": {
	        "value": 0.5,
	        "random": false,
	        "anim": {
	          "enable": false,
	          "speed": 1,
	          "opacity_min": 0.1,
	          "sync": false
	        }
	      },
	      "size": {
	        "value": 5,
	        "random": true,
	        "anim": {
	          "enable": false,
	          "speed": 40,
	          "size_min": 0.1,
	          "sync": false
	        }
	      },
	      "line_linked": {
	        "enable": true,
	        "distance": 150,
	        "color": "#ffffff",
	        "opacity": 0.4,
	        "width": 1
	      },
	      "move": {
	        "enable": true,
	        "speed": 6,
	        "direction": "none",
	        "random": false,
	        "straight": false,
	        "out_mode": "out",
	        "attract": {
	          "enable": false,
	          "rotateX": 600,
	          "rotateY": 1200
	        }
	      }
	    },
	    "interactivity": {
	      "detect_on": "canvas",
	      "events": {
	        "onhover": {
	          "enable": true,
	          "mode": "repulse"
	        },
	        "onclick": {
	          "enable": true,
	          "mode": "push"
	        },
	        "resize": true
	      },
	      "modes": {
	        "grab": {
	          "distance": 400,
	          "line_linked": {
	            "opacity": 1
	          }
	        },
	        "bubble": {
	          "distance": 400,
	          "size": 40,
	          "duration": 2,
	          "opacity": 8,
	          "speed": 3
	        },
	        "repulse": {
	          "distance": 200
	        },
	        "push": {
	          "particles_nb": 4
	        },
	        "remove": {
	          "particles_nb": 2
	        }
	      }
	    },
	    "retina_detect": true,
	    "config_demo": {
	      "hide_card": false,
	      "background_color": "#b61924",
	      "background_image": "",
	      "background_position": "50% 50%",
	      "background_repeat": "no-repeat",
	      "background_size": "cover"
	    }
	  }

	);

})
</script>

@yield('js')

</body>
</html>
