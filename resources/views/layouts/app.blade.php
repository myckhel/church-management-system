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
	@yield('link')
        @if (Route::currentRouteName() == ('calendar')  || Route::currentRouteName() == ('notification')  || Route::currentRouteName() == ('ticket'))

        <link href="https://cdnjs.cloudflare.com/ajax/libs/clockpicker/0.0.7/bootstrap-clockpicker.min.css" rel="stylesheet">
        @endif
	<!--=================================================-->

@if(Route::currentRouteName() == "gallery")
<link href="{{ URL::asset('plugins/gallery/ekko-lightbox.css') }}" rel="stylesheet">
@endif
	<!--Demo [ DEMONSTRATION ]-->
	<link href="{{ URL::asset('css/demo/nifty-demo.min.css') }}" rel="stylesheet">

	<!--Font Awesome [ OPTIONAL ]-->
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">


    <!--Bootstrap Timepicker [ OPTIONAL ]-->
    <link href="{{ URL::asset('plugins/bootstrap-timepicker/bootstrap-timepicker.min.css') }}" rel="stylesheet">


    @if (Route::currentRouteName() == ('member.register' || 'attendance.mark' || 'collection.offering' || 'calendar')  || Route::currentRouteName() == ('ticket'))
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

	@if (Route::currentRouteName() == 'inbox')
	<!--CHAT [ OPTIONAL ]-->
	<link href="{{ URL::asset('css/chat.css') }}" rel="stylesheet">
	@endif

	@if (Route::currentRouteName() == ('calendar')  || Route::currentRouteName() == ('notification')  || Route::currentRouteName() == ('ticket'))
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
											<img class="img-circle img-md" src="{{ URL::asset('img/profile-photos/1.png') }}" alt="Profile Picture">
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
									<li class="list-header">Navigation</li>

									<!--Menu list item-->
									<li class="{{ Route::currentRouteName() === 'dashboard' ? 'active-sub active' : '' }}">
										<a href="{{route('dashboard')}}">
											<!--<i class="demo-pli-home"></i>-->
											<span class="menu-title">Dashboard</span>
											<!--<i class="arrow"></i>-->
										</a>

									</li>
									<li class="list-divider"></li>

									<!--Category name-->
									<!--<li class="list-header">Components</li>-->

									<!--Menu list item-->
                                    <li class="{{ Route::currentRouteName() === 'members.all' || Route::currentRouteName() === 'member.register.form' ? 'active-sub active' : ''}}

                                    {{Route::currentRouteName() === 'member.profile' ? 'active-sub' : ''}}">
										<a href="{{route('members.all')}}">
											<i class="fa fa-users"></i>
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
										</ul>
									</li>

									<!--Menu list item-->
                                                                        <li class="{{ Route::currentRouteName() === 'attendance' || Route::currentRouteName() === 'attendance.analysis' || Route::currentRouteName() === 'attendance.view.form' ? 'active-sub active' : ''}}
									{{Route::currentRouteName() === 'attendance' ? 'active-sub' : ''}}">
										<a href="dashboard">
											<i class="fa fa-check"></i>
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
										</ul>
									</li>

									<!--Menu list item-->
									<li>
										<a href="#">
											<i class="fa fa-mars"></i>
											<span class="menu-title">Collection</span>
											<i class="arrow"></i>
										</a>
										<ul class="collapse">
											<li>
												<a href="{{route('collection.offering')}}">Save Collection</a>
											</li>
											<li>
												<a href="{{route('collection.report')}}">View Collection</a>
											</li>
											<li>
												<a href="{{route('collection.analysis')}}">Collection Analysis</a>
											</li>

										</ul>

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
											<li>
												<a href="{{route('inbox')}}">Communicator</a>
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
											<i class="fa fa-signal"></i>
											<span class="menu-title">Reports</span>
											<i class="arrow"></i>
										</a>
										<ul class="collapse">
											@if(!(\Auth::user()->isAdmin()))
											<li>
												<a href="{{route('report.membership')}}">Membership</a>
											</li>
											<li>
												<a href="{{route('report.collections')}}">Collections</a>
											</li>
											<li>
												<a href="{{route('report.attendance')}}">Attendance</a>
											</li>
											@else
											<li>
												<li>
													<a href="#">
														<i class="fa fa-envelope"></i>
														<span class="menu-title">Membership</span>
														<i class="arrow"></i>
													</a>
													<ul class="collapse">
														<li>
															<a href="{{route('report.membership.all')}}">All Branches</a>
														</li>
														<li>
															<a href="{{route('report.membership')}}">This Branch</a>
														</li>
													</ul>
												</li>
												<li>
													<a href="#">
														<i class="fa fa-envelope"></i>
														<span class="menu-title">Collections</span>
														<i class="arrow"></i>
													</a>
													<ul class="collapse">
														<li>
															<a href="{{route('report.collections.all')}}">All Branches</a>
														</li>
														<li>
															<a href="{{route('report.collections')}}">This Branch</a>
														</li>
													</ul>
												</li>
												<li>
													<a href="#">
														<i class="fa fa-envelope"></i>
														<span class="menu-title">Attendance</span>
														<i class="arrow"></i>
													</a>
													<ul class="collapse">
														<li>
															<a href="{{route('report.attendance.all')}}">All Branches</a>
														</li>
														<li>
															<a href="{{route('report.attendance')}}">This Branch</a>
														</li>
													</ul>
												</li>

											</li>

											@endif
										</ul>
									</li>
									 <li class="{{Route::currentRouteName() === 'ticket' ? 'active-sub' : ''}}">
                                        <a href="{{ route('ticket') }}">
                                            <i class="fa fa-users"></i>
                                            <span class="menu-title">Ticket</span>

                                        </a>
                                    </li>
									<!--Menu list item-->
									<li class="list-divider"></li>

									<!--Category name-->
									<!--Menu list item-->

									<li class="list-divider"></li>


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
        @if (Route::currentRouteName() == ('calendar')  || Route::currentRouteName() == ('notification')  || Route::currentRouteName() == ('ticket'))
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

		@if (Route::currentRouteName() == ('gallery'))
		<script src="{{ URL::asset('plugins/gallery/ekko-lightbox.min.js') }}"></script>
		@endif

	<!--=================================================-->

	<!--Demo script [ DEMONSTRATION ]-->
    <!--<script src="{{ URL::asset('js/demo/nifty-demo.min.js') }}"></script>-->


    @if (Route::currentRouteName() == 'members.all' || Route::currentRouteName() == 'branches' || 'collection.report' || Route::currentRouteName() == 'attendance' || Route::currentRouteName() == 'attendance.view.form')
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

	@if (Route::currentRouteName() == ('calendar') )

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
										$pastors[$i] = $name;
										$i++;
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


@if (Route::currentRouteName() == 'member.profile')
<?php require_once 'js/views/members/profile.php'; ?>
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
					$('#hidden-total').val(sum);
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

@if(Route::currentRouteName() == "member.register.form")
<script>
$(document).ready(function(){
	$('input:radio[name="marital_status"]').change(
		function(){
			if(this.checked && this.value == 'married'){
				$('#wedding').show();
				$("#anniversary").prop('required',true);
			}
			else{
							$('#wedding').hide();
							$("#anniversary").prop('required',false);
						}
		});
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
@yield('js')
</body>
</html>
