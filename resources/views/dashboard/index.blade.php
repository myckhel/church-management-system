<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Dashboard - {{strtoupper(\Auth::user()->branchname)}} {{config('app.name')}}</title>
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
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

    <!--=================================================-->



    <!--Pace - Page Load Progress Par [OPTIONAL]-->
    <link href="{{ URL::asset('plugins/pace/pace.min.css') }}" rel="stylesheet">
    <script src="{{ URL::asset('plugins/pace/pace.min.js') }}"></script>


    <!--Demo [ DEMONSTRATION ]-->
    <link href="{{ URL::asset('css/demo/nifty-demo.min.css') }}" rel="stylesheet">



    <!--Morris.js [ OPTIONAL ]-->
    <link href="{{ URL::asset('css/themes/type-d/theme-navy.min.css') }}" rel="stylesheet">


    <!--Morris.js [ OPTIONAL ]-->
    <link href="{{ URL::asset('plugins/morris-js/morris.min.css') }}" rel="stylesheet">

    <!--custom.css [ OPTIONAL ]-->
    <link href="{{ URL::asset('css/custom.css') }}" rel="stylesheet">
    <!--=================================================

    REQUIRED
    You must include this in your project.


    RECOMMENDED
    This category must be included but you may modify which plugins or components which should be included in your project.


    OPTIONAL
    Optional plugins. You may choose whether to include it in your project or not.


    DEMONSTRATION
    This is to be removed, used for demonstration purposes only. This category must not be included in your project.


    SAMPLE
    Some script samples which explain how to initialize plugins or components. This category should not be included in your project.


    Detailed information and more samples can be found in the document.

    =================================================-->
        <!--Font Awesome [ OPTIONAL ]-->
        <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css' rel='stylesheet' type='text/css'>
<!--    <link href="{{ URL::asset('plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet"> -->

</head>

<!--TIPS-->
<!--You may remove all ID or Class names which contain "demo-", they are only used for demonstration. -->

<body>
    <div id="container" class="effect aside-float aside-bright mainnav-out slide">

        <!--NAVBAR-->
        <!--===================================================-->
        <header id="navbar">
            <div id="navbar-container" class="boxed">

                <!--Brand logo & name-->
                <!--================================-->
                <div class="navbar-header">
                    <a href="{{url('/dashboard')}}" class="navbar-brand">
                        <img src="img/logo.png" alt="Nifty Logo" class="brand-icon">
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
                            <a class="mainnav-toggle slide" href="dashboard">
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
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                          <!--Notification dropdown-->
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <li class="dropdown">
                            <a href="{{ route('notification') }}">
                              <i class="fa fa-bullhorn fa-3x" aria-hidden="true"></i> Announcement &nbsp;&nbsp;&nbsp
                                <span class="badge badge-header badge-danger"></span>
                            </a>



                            <!--Notification dropdown menu-->

                        </li>
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <!--End notifications dropdown-->
                        <!--User dropdown-->
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <li id="dropdown-user" class="dropdown">
                            <a href="dashboard" data-toggle="dropdown" class="dropdown-toggle text-right">
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
            <div id="content-container">
                <div id="page-head">

                    <hr class="new-section-sm bord-no">
                    <div class="text-center">
                        <h3>Welcome to <strong>{{strtoupper(\Auth::user()->branchname)}}</strong> Dashboard.</h3>
                        <!--<p>Check out your past searches and the content you’ve browsed in. <a href="dashboard" class="btn-link">View last results</a></p>-->
                    </div>
                    <!-- <hr class="new-section-md bord-no"> -->
                </div>
                <!--Page content-->
                <!--===================================================-->
                <div id="page-content">

                    <div class="row">

                             @if (session('status'))

                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                <!--     @if (count($errors) > 0)
                        @foreach ($errors->all() as $error)

                            <div class="alert alert-danger">{{ $error }}</div>

                        @endforeach

                    @endif -->
                           <div class="col-md-12 col-md-offset-2">

                            <img  src="data:image/jpeg;base64, {{base64_encode($options->HOLOGO) . ''}}" class="img-responsive" alt="Cinque Terre">
                                <!--   <div class="img-responsive">
                        <img style="margin-top:-200px; max-width: 914px; min-width:500px ; min-height:150px ; max-height: 228px;" src="data:image/jpeg;base64, {{base64_encode($options->HOLOGO) . ''}}" class="center-block img-responsive" /> <!-- ./images/church-logo.png -->
                     </div>
                    </div>
                        <div class="row">
                             <div class="col-md-10 col-md-offset-1">
 <div class="border">
 <div class="well  bodyshadow">

                                @if(session()->has('message.level'))
    <div class="alert alert-{{ session('message.level') }}">
    {!! session('message.content') !!}
    </div>
@endif
                       <div class="text-center">
                            <h3 class="ji">Announcement Board </h3>
                        </div>



                       <div class="vew">
                           @if (count($eventsall) > 0)
                                  @foreach ($eventsall as $event)
                                    <?php $sql ="DELETE FROM announcements WHERE (start_date <= CURDATE())  ";
                                  \DB::delete($sql);
                                  ?>
                                  @if ($event->start_date >= now())
                                  <?php //$n = rand(1,$size_of_array-1);
    //$class = $color_arrar[$n%3];?>

                             <div class="list-group bg-trans">
                                    <a href="#" class="list-group-item">
                                      <!--   <div class="media-left pos-rel">
                                            <img class="img-circle img-xs" src="img/profile-photos/2.png" alt="Profile Picture">
                                            <i class="badge badge-success badge-stat badge-icon pull-left"></i>
                                        </div> -->
                                        <div class="media-body">
                                            <h4 class="shadow"><p>by {{$event->by_who}}</p></h4>
                                            <div class="bodyshadow">
                                            <h class="pad-top text-semibold ano"> <h4 class="textcolor">{{ html_entity_decode(str_limit($event->details, 100)) }}</h4>
                                                <p class="pull-right">{{$event->branchname}} </p>
            @if (strlen(strip_tags($event->details)) > 100)
            <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#createTopic_{{$event->id}}">
                                               <i class="fa fa-book fa-2x" aria-hidden="true"></i> Read More</a>  &nbsp;&nbsp;&nbsp
<!--              <a href="{{ action('EventController@readmore', $event->id) }}" class="btn btn-info btn-sm"></a> -->
            @endif</p>
                                             </div>
                                        </div>
                                    </a>
                             </div>
                                   @endif

        <div class="modal" id="createTopic_{{$event->id}}" tabindex="-1" role="dialog" aria-labelledby="largeModalHead" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                   <!--  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button> -->
                                    <h1 class="text-center bodyshadow">{{$event->branchname}}!</h1>
                                </div>
                                <div class="modal-body">
                                    <div class="bodyshadow">
                                    <blockquote class="bq-sm bq-open bq-close bg-warning"><h3> {{$event->details}} </h3></blockquote>
                                     <p class="pull-right">by <a><strong>{{$event->by_who}}</strong>   </a>    </p>
                           </div>


                                </div>
                                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                                                </div>
                                            </div>
                                        </div>
         </div>
                                      @endforeach
                                      <?php else: ?>
                                        <div class="alert alert-danger">
                                  <strong>Sorry!</strong> No New Announcement.
                                </div>

                                        @endif
                    </div>

 </div>
                                    </div>
                             <br>  <br>  <br>

   </div>
               </div>
                          <div class="row">

                        <div class="col-md-10 col-md-offset-1">
                            <div clas="row">
                            <div class="col-md-12">
                                <div class="panel">
                                                        <div class="panel-body text-center clearfix">
                                                            <div class="col-sm-4 pad-top">
                                                                <div class="text-lg">
                                                                    <p class="text-5x text-thin text-main">{{\App\User::all()->count()}}</p>
                                                                </div>
                                                                <p class="text-sm text-bold text-uppercase">Total Number of Our Branches</p>
                                                            </div>
                                                            <div class="col-sm-8">
                                                              <div class="col-sm-4 pad-top">
                                                                  <div class="text-lg">
                                                                      <p class="text-5x text-thin text-main">{{$total['members']}}</p>
                                                                  </div>
                                                                  <p class="text-sm text-bold text-uppercase">Total Number of Our Members</p>
                                                              </div>
                                                              <div class="col-sm-4 pad-top">
                                                                  <div class="text-lg">
                                                                      <p class="text-5x text-thin text-main">{{$total['workers']}}</p>
                                                                  </div>
                                                                  <p class="text-sm text-bold text-uppercase">Total Number of  Our Workers</p>
                                                              </div>
                                                              <div class="col-sm-4 pad-top">
                                                                  <div class="text-lg">
                                                                      <p class="text-5x text-thin text-main">{{$total['pastors']}}</p>
                                                                  </div>
                                                                  <p class="text-sm text-bold text-uppercase">Total Number of Our Pastors</p>
                                                              </div>
                                                            </div>
                                                        </div>
                                                    </div>
                            </div>
                                 </div>
                                 <div clas="row">
                                          <div class="col-md-6">
                                            <div class="view2">
                                                <!--Tile-->
                                                <!--===================================================-->
                                                <div class="panel"> <!--panel-dark panel-colorful" -->
                                                    <div class="panel-heading"> <!--body text-center"-->
                                                        <h3 class="panel-title"><strong>Upcoming Birthdays For <?php echo date('F Y'); ?></strong> </h3>
                                                        <!--i class="demo-pli-coin icon-4x"></i-->
                                                    </div>
                                                    <!-- Striped Table -->
                                                    <!--===================================================-->
                                                      <div class="panel-body">
                                                            <div class="table-responsive t1">
                                                                <table class="table table-striped">
                                                                    <thead>
                                                                        <tr>
                                                                          <th>Name</th>
                                                                          <th>Birth Date</th>
                                                                        </tr>
                                                                    </thead>

                                                                    <tbody>
                                                                          <div class="ex1">
                                                                      @if (count($members) > 0)
                                                                @foreach ($members as $member)
                                                                @if (date('F', (strtotime($member->dob))) == date('F') && (int)substr(date('jS'),0,2) <= (int)substr(date('jS', strtotime($member->dob)), 0,2) )
                                                                                    <tr>
                                                                    <td><a href="#" class="btn-link">{{$member->getFullname()}}</a></td>
                                                                    <td>{{date('jS', strtotime($member->dob))}}</td>
                                                                                    </tr>
                                                                @endif
                                                                @endforeach
                                                                <?php else: ?>
                                                                  <tr class="no-data">
                                                                      <td colspan="4">No Upcoming Birthday</td>
                                                                  </tr>
                                                                @endif
                                                                   </div>
                                                                    </tbody>

                                                                </table>
                                                            </div>
                                                      </div>
                                                </div>
                                                <!--===================================================-->
                                              </div>
                                             </div>
                                              <div class="col-md-6">
                                                  <div class="view2">
                                                    <!--Tile-->
                                                    <!--===================================================-->
                                                    <div class="panel"> <!--panel-dark panel-colorful" -->
                                                        <div class="panel-heading"> <!--body text-center"-->
                                                            <h3 class="panel-title"><strong>Upcoming Anniversaries For <?php echo date('F Y'); ?></strong> </h3>
                                                            <!--i class="demo-pli-coin icon-4x"></i-->
                                                        </div>
                                                        <!-- Striped Table -->
                                                        <!--===================================================-->
                                                          <div class="panel-body">
                                                                <div class="table-responsive t2">
                                                                    <table class="table table-striped">
                                                                        <thead>
                                                                            <tr>
                                                                              <th>Name</th>
                                                                              <th>Anniversary Date</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                          @if (count($members) > 0)
                                                                    @foreach ($members as $member)
                                                                    @if (date('F', (strtotime($member->wedding_anniversary))) == date('F')  && (int)substr(date('jS'),0,2) <= (int)substr(date('jS', strtotime($member->wedding_anniversary)), 0,2))
                                                                                        <tr>
                                                                        <td><a href="#" class="btn-link">{{$member->getFullname()}}</a></td>
                                                                        <td>{{date('jS', strtotime($member->wedding_anniversary))}}</td>
                                                                                        </tr>
                                                                    @endif
                                                                    @endforeach
                                                                    <?php else: ?>
                                                                      <tr class="no-data">
                                                                          <td colspan="4">No Upcoming Anniversary</td>
                                                                      </tr>
                                                                      @endif
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                          </div>
                                                        <!--===================================================-->
                                                        <!-- End Striped Table -->
                                                        <!--div class="pad-al text-center">
                                                            <p class="text-semibold text-lg mar-no">Earning</p>
                                                            <p class="text-1x text-bold mar-no ">$7,428</p>
                                                            <p class="text-overflow pad-top pad-all">
                                                                <span class="label label-dark">22,675</span> Total Earning
                                                            </p>
                                                        </div-->
                                                    </div>
                                                    <!--===================================================-->
                                                  </div>
                                                   </div>
                    </div>
                                       <div class="row">
                                              <div class="col-sm-12">
                                                <div class="panel">
                                                    <div class="panel-heading">
                                                        <h3 class="panel-title"><strong>Upcoming Events for {{strtoupper(\Auth::user()->branchname)}}</strong></h3>
                                                    </div>

                                                    <!-- Striped Table -->
                                                    <!--===================================================-->
                                                    <div class="panel-body">
                                                        <div class="table-responsive t3">
                                                            <table class="table table-striped">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Title</th>
                                                                        <th>Location</th>
                                                                        <th>Time</th>
                                                                        <th>By</th>
                                                                        <th>Date</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                  @if (count($events) > 0)
                                                                  @foreach ($events as $event)
                                                                  @if ($event->date >= now())
                                                                  <tr>
                                                                      <td><a href="#" class="btn-link">{{$event->title}}</a></td>
                                                                      <td>{{$event->location}}</td>
                                                                      <td>{{$event->time}}</td>
                                                                      <td>{{$event->by_who}}</td>
                                                                      <td>{{$event->date}}</td>
                                                                  </tr>
                                                                  @endif
                                                                  @endforeach
                                                                  <?php else: ?>
                                                                    <tr class="no-data">
                                                                        <td colspan="4">No Upcoming Event</td>
                                                                    </tr>
                                                                    @endif
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <!--===================================================-->
                                                    <!-- End Striped Table -->

                                                </div>
                                            </div>
                                            <!--  <div class="col-sm-6">

                                            </div>
 -->
                        </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <!-- Line Chart -->
                            <!---------------------------------->
                            @if(\Auth::user()->isAdmin())
                            <!--div class="panel">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Nationwide Offering collection</h3>
                                </div>
                                <div class="pad-all">
                                    <div id="demo-morris-line-legend" class="text-center"></div>
                                    <div id="demo-morris-line" style="height:268px"></div>
                                </div>
                            </div-->
                            @endif
                            <!---------------------------------->
                        </div>
                    </div>


                </div>
                <!--===================================================-->
                <!--End page content-->

            </div>
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
                                                                        <a href="#" data-toggle="tab">
                                                                                <i class="demo-pli-speech-bubble-7 icon-lg"></i>
                                                                        </a>
                                                                </li>
                                                                <li>
                                                                        <a href="#" data-toggle="tab">
                                                                                <i class="demo-pli-information icon-lg icon-fw"></i> Report
                                                                        </a>
                                                                </li>
                                                                <li>
                                                                        <a href="#" data-toggle="tab">
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
                                    <li class="list-divider"></li>

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
                <a href="dashboard" class="text-main">
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

            <p class="pad-lft">&#0169; 2018 {{strtoupper(\Auth::user()->branchname)}}</p>



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

<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>


    <!--=================================================-->

    <!--Demo script [ DEMONSTRATION ]-->
    <!--script src="{{ URL::asset('js/demo/nifty-demo.min.js') }}"></script-->


    <!--Morris.js [ OPTIONAL ]-->
    <script src="{{ URL::asset('plugins/morris-js/morris.min.js') }}"></script>
    <script src="{{ URL::asset('plugins/morris-js/raphael-js/raphael.min.js') }}"></script>



    <!--Custom script [ DEMONSTRATION ]-->
    <!--===================================================-->
    <script>
        $(document).on('nifty.ready', function () {

            // MORRIS LINE CHART
            // =================================================================
            // Require MorrisJS Chart
            // -----------------------------------------------------------------
            // http://morrisjs.github.io/morris.js/
            // =================================================================
            var day_data = [{
                    'elapsed': '2000',
                    'value': 18
                },
                {
                    'elapsed': '2001',
                    'value': 24
                },
                {
                    'elapsed': '2002',
                    'value': 9
                },
                {
                    'elapsed': '2003',
                    'value': 12
                },
                {
                    'elapsed': '2004',
                    'value': 13
                },
                {
                    'elapsed': '2005',
                    'value': 22
                },
                {
                    'elapsed': '2006',
                    'value': 11
                },
                {
                    'elapsed': '2007',
                    'value': 26
                },
                {
                    'elapsed': '2008',
                    'value': 12
                },
                {
                    'elapsed': '2009',
                    'value': 19
                },
                {
                    'elapsed': '2000',
                    'value': 15
                },
                {
                    'elapsed': '2001',
                    'value': 24
                },
                {
                    'elapsed': '2002',
                    'value': 9
                },
                {
                    'elapsed': '2003',
                    'value': 12
                },
                {
                    'elapsed': '2004',
                    'value': 13
                },
                {
                    'elapsed': '2005',
                    'value': 22
                },
                {
                    'elapsed': '2006',
                    'value': 15
                },
                {
                    'elapsed': '2007',
                    'value': 26
                },
                {
                    'elapsed': '2008',
                    'value': 12
                },
                {
                    'elapsed': '2009',
                    'value': 19
                }
            ];
            Morris.Line({
                element: 'demo-morris-line',
                data: day_data,
                xkey: 'elapsed',
                ykeys: ['value'],
                labels: ['value'],
                gridEnabled: true,
                gridLineColor: 'rgba(0,0,0,.1)',
                gridTextColor: '#8f9ea6',
                gridTextSize: '11px',
                lineColors: ['#177bbb'],
                lineWidth: 2,
                parseTime: false,
                resize: true,
                hideHover: 'auto'
            });

        });
    </script>



</body>

</html>
