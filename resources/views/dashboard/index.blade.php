<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Dashboard - {{config('app.name')}}</title>


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
                    <a href="index.html" class="navbar-brand">
                        <img src="img/logo.png" alt="Nifty Logo" class="brand-icon">
                        <div class="brand-title">
                            <span class="brand-text">ChurchCMS</span>
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


                        <!--Mega dropdown-->
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <!--<li class="mega-dropdown">
                            <a href="dashboard" class="mega-dropdown-toggle">
                                <i class="demo-pli-layout-grid"></i>
                            </a>
                            <div class="dropdown-menu mega-dropdown-menu">
                                <div class="row">
                                    <div class="col-sm-4 col-md-3">

                                        
                                        <ul class="list-unstyled">
                                                                                <li class="dropdown-header"><i class="demo-pli-file icon-lg icon-fw"></i> Pages</li>
                                                                                <li><a href="dashboard">Profile</a></li>
                                                                                <li><a href="dashboard">Search Result</a></li>
                                                                                <li><a href="dashboard">FAQ</a></li>
                                                                                <li><a href="dashboard">Sreen Lock</a></li>
                                                                                <li><a href="dashboard">Maintenance</a></li>
                                                                                <li><a href="dashboard">Invoice</a></li>
                                                                                <li><a href="dashboard" class="disabled">Disabled</a></li>                                        </ul>

                                    </div>
                                    <div class="col-sm-4 col-md-3">

                                        
                                        <ul class="list-unstyled">
                                                                                <li class="dropdown-header"><i class="demo-pli-mail icon-lg icon-fw"></i> Mailbox</li>
                                                                                <li><a href="dashboard"><span class="pull-right label label-danger">Hot</span>Indox</a></li>
                                                                                <li><a href="dashboard">Read Message</a></li>
                                                                                <li><a href="dashboard">Compose</a></li>
                                                                                <li><a href="dashboard">Template</a></li>
                                        </ul>
                                        <p class="pad-top text-main text-sm text-uppercase text-bold"><i class="icon-lg demo-pli-calendar-4 icon-fw"></i>News</p>
                                        <p class="pad-top mar-top bord-top text-sm">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes.</p>
                                    </div>
                                    <div class="col-sm-4 col-md-3">
                                        
                                        <ul class="list-unstyled">
                                            <li>
                                                <a href="dashboard" class="media mar-btm">
                                                    <span class="badge badge-success pull-right">90%</span>
                                                    <div class="media-left">
                                                        <i class="demo-pli-data-settings icon-2x"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <p class="text-semibold text-main mar-no">Data Backup</p>
                                                        <small class="text-muted">This is the item description</small>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="dashboard" class="media mar-btm">
                                                    <div class="media-left">
                                                        <i class="demo-pli-support icon-2x"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <p class="text-semibold text-main mar-no">Support</p>
                                                        <small class="text-muted">This is the item description</small>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="dashboard" class="media mar-btm">
                                                    <div class="media-left">
                                                        <i class="demo-pli-computer-secure icon-2x"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <p class="text-semibold text-main mar-no">Security</p>
                                                        <small class="text-muted">This is the item description</small>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="dashboard" class="media mar-btm">
                                                    <div class="media-left">
                                                        <i class="demo-pli-map-2 icon-2x"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <p class="text-semibold text-main mar-no">Location</p>
                                                        <small class="text-muted">This is the item description</small>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-12 col-md-3">
                                        <p class="dropdown-header"><i class="demo-pli-file-jpg icon-lg icon-fw"></i> Gallery</p>
                                        <div class="row img-gallery">
                                            <div class="col-xs-4">
                                                <img class="img-responsive" src="img/thumbs/img-1.jpg" alt="thumbs">
                                            </div>
                                            <div class="col-xs-4">
                                                <img class="img-responsive" src="img/thumbs/img-3.jpg" alt="thumbs">
                                            </div>
                                            <div class="col-xs-4">
                                                <img class="img-responsive" src="img/thumbs/img-2.jpg" alt="thumbs">
                                            </div>
                                            <div class="col-xs-4">
                                                <img class="img-responsive" src="img/thumbs/img-4.jpg" alt="thumbs">
                                            </div>
                                            <div class="col-xs-4">
                                                <img class="img-responsive" src="img/thumbs/img-6.jpg" alt="thumbs">
                                            </div>
                                            <div class="col-xs-4">
                                                <img class="img-responsive" src="img/thumbs/img-5.jpg" alt="thumbs">
                                            </div>
                                        </div>
                                        <a href="dashboard" class="btn btn-block btn-primary">Browse Gallery</a>
                                    </div>
                                </div>
                            </div>
                        </li>-->
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <!--End mega dropdown-->



                        <!--Notification dropdown-->
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <!--<li class="dropdown">
                            <a href="dashboard" data-toggle="dropdown" class="dropdown-toggle">
                                <i class="demo-pli-bell"></i>
                                <span class="badge badge-header badge-danger"></span>
                            </a>


                            
                            <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                                <div class="nano scrollable">
                                    <div class="nano-content">
                                        <ul class="head-list">
                                            <li>
                                                <a href="dashboard" class="media add-tooltip" data-title="Used space : 95%" data-container="body" data-placement="bottom">
                                                    <div class="media-left">
                                                        <i class="demo-pli-data-settings icon-2x text-main"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <p class="text-nowrap text-main text-semibold">HDD is full</p>
                                                        <div class="progress progress-sm mar-no">
                                                            <div style="width: 95%;" class="progress-bar progress-bar-danger">
                                                                <span class="sr-only">95% Complete</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="media" href="dashboard">
                                                    <div class="media-left">
                                                        <i class="demo-pli-file-edit icon-2x"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <p class="mar-no text-nowrap text-main text-semibold">Write a news article</p>
                                                        <small>Last Update 8 hours ago</small>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="media" href="dashboard">
                                                    <span class="label label-info pull-right">New</span>
                                                    <div class="media-left">
                                                        <i class="demo-pli-speech-bubble-7 icon-2x"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <p class="mar-no text-nowrap text-main text-semibold">Comment Sorting</p>
                                                        <small>Last Update 8 hours ago</small>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="media" href="dashboard">
                                                    <div class="media-left">
                                                        <i class="demo-pli-add-user-star icon-2x"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <p class="mar-no text-nowrap text-main text-semibold">New User Registered</p>
                                                        <small>4 minutes ago</small>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="media" href="dashboard">
                                                    <div class="media-left">
                                                        <img class="img-circle img-sm" alt="Profile Picture" src="img/profile-photos/9.png">
                                                    </div>
                                                    <div class="media-body">
                                                        <p class="mar-no text-nowrap text-main text-semibold">Lucy sent you a message</p>
                                                        <small>30 minutes ago</small>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="media" href="dashboard">
                                                    <div class="media-left">
                                                        <img class="img-circle img-sm" alt="Profile Picture" src="img/profile-photos/3.png">
                                                    </div>
                                                    <div class="media-body">
                                                        <p class="mar-no text-nowrap text-main text-semibold">Jackson sent you a message</p>
                                                        <small>40 minutes ago</small>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                
                                <div class="pad-all bord-top">
                                    <a href="dashboard" class="btn-link text-main box-block">
                                        <i class="pci-chevron chevron-right pull-right"></i>Show All Notifications
                                    </a>
                                </div>
                            </div>
                        </li>-->
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
                                    <i class="demo-pli-male"></i>
                                </span>
                                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                                <!--You can also display a user name in the navbar.-->
                                <!--<div class="username hidden-xs">Aaron Chavez</div>-->
                                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                            </a>


                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right panel-default">
                                <ul class="head-list">
                                    <li>
                                        <a href="dashboard">
                                            <i class="demo-pli-male icon-lg icon-fw"></i> Profile</a>
                                    </li>
                                    <li>
                                        <a href="dashboard">
                                            <span class="badge badge-danger pull-right">9</span>
                                            <i class="demo-pli-mail icon-lg icon-fw"></i> Messages</a>
                                    </li>
                                    <li>
                                        <a href="dashboard">
                                            <span class="label label-success pull-right">New</span>
                                            <i class="demo-pli-gear icon-lg icon-fw"></i> Settings</a>
                                    </li>
                                    <li>
                                        <a href="dashboard">
                                            <i class="demo-pli-computer-secure icon-lg icon-fw"></i> Lock screen</a>
                                    </li>
                                    <li>
                                        <a href="pages-login.html">
                                            <i class="demo-pli-unlock icon-lg icon-fw"></i> Logout</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <!--End user dropdown-->

                        <!--<li>
                            <a href="dashboard" class="aside-toggle">
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
            <div id="content-container">
                <div id="page-head">

                    <hr class="new-section-sm bord-no">
                    <div class="text-center">
                        <h3>Welcome back to the Dashboard.</h3>
                        <!--<p>Check out your past searches and the content you’ve browsed in. <a href="dashboard" class="btn-link">View last results</a></p>-->
                    </div>
                    <hr class="new-section-md bord-no">
                </div>


                <!--Page content-->
                <!--===================================================-->
                <div id="page-content">


                    <!--<div class="row">
                                                <div class="col-md-2 col-md-offset-3">
                                                    <div class="panel">
                                                        <div class="panel-body text-center">
                                                            <div class="pad-ver mar-top text-main"><i class="demo-pli-data-settings icon-4x"></i></div>
                                                            <p class="text-lg text-semibold mar-no text-main">Storage</p>
                                                            <p class="text-muted">32TB Total storage</p>
                                                            <p class="text-sm">The Big Oxmox advised her not to do so, because there were thousands of bad.</p>
                                                            <button class="btn btn-primary mar-ver">Get it now</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="panel">
                                                        <div class="panel-body text-center">
                                                            <div class="pad-ver mar-top text-main"><i class="demo-pli-computer-secure icon-4x"></i></div>
                                                            <p class="text-lg text-semibold mar-no text-main">Secured</p>
                                                            <p class="text-muted">Latest Technology</p>
                                                            <p class="text-sm">The Big Oxmox advised her not to do so, because there were thousands of bad.</p>
                                                            <button class="btn btn-primary mar-ver">View reports</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="panel">
                                                        <div class="panel-body text-center">
                                                            <div class="pad-ver mar-top text-main"><i class="demo-pli-consulting icon-4x"></i></div>
                                                            <p class="text-lg text-semibold mar-no text-main">Support</p>
                                                            <p class="text-muted">We are here 24/7</p>
                                                            <p class="text-sm">The Big Oxmox advised her not to do so, because there were thousands of bad.</p>
                                                            <button class="btn btn-primary mar-ver">Contact us</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>-->

                    <hr class="new-section-md bord-no">
                    <div class="row">
                    <img style="margin-top:-200px" src="./images/church-logo.png" class="center-block img-responsive" />
                        <div class="col-md-10 col-md-offset-1">
                            <div clas="row">
                            <div class="col-md-12">
                                <div class="panel">
                                                        <div class="panel-body text-center clearfix">
                                                            <div class="col-sm-4 pad-top">
                                                                <div class="text-lg">
                                                                    <p class="text-5x text-thin text-main">195</p>
                                                                </div>
                                                                <p class="text-sm text-bold text-uppercase">Total Number of Branches</p>
                                                            </div>
                                                            <div class="col-sm-8">
                                                                <button class="btn btn-pink mar-ver">View Details</button>
                                                                <p class="text-xs">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>
                                                                <ul class="list-unstyled text-center bord-top pad-top mar-no row">
                                                                    <li class="col-xs-4">
                                                                        <span class="text-lg text-semibold text-main">1,345</span>
                                                                        <p class="text-sm text-muted mar-no">Workers</p>
                                                                    </li>
                                                                    <li class="col-xs-4">
                                                                        <span class="text-lg text-semibold text-main">23K</span>
                                                                        <p class="text-sm text-muted mar-no">Members</p>
                                                                    </li>
                                                                    <li class="col-xs-4">
                                                                        <span class="text-lg text-semibold text-main">278</span>
                                                                        <p class="text-sm text-muted mar-no">Pastors</p>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                            </div>
                            <div class="col-md-6">

                            
                                        
                                                <!--Tile-->
                                                <!--===================================================-->
                                                <div class="panel panel-dark panel-colorful" >
                                                    <div class="panel-body text-center">
                                                        <i class="demo-pli-coin icon-4x"></i>
                                                    </div>
                                                    <div class="pad-al text-center">
                                                        <p class="text-semibold text-lg mar-no">Earning</p>
                                                        <p class="text-1x text-bold mar-no ">$7,428</p>
                                                        <p class="text-overflow pad-top pad-all">
                                                            <span class="label label-dark">22,675</span> Total Earning
                                                        </p>
                                                    </div>
                                                </div>
                                                <!--===================================================-->
                                        
                                            
                        </div>
                        <div class="col-sm-6">
                                                <div class="panel">
                                                    <div class="panel-heading">
                                                        <h3 class="panel-title">Upcoming Events</h3>
                                                    </div>
                                        
                                                    <!-- Striped Table -->
                                                    <!--===================================================-->
                                                    <div class="panel-body">
                                                        <div class="table-responsive">
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
                                                @foreach ($events as $event)
                                                                    <tr>
                                                                        <td><a href="tables-static.html#fakelink" class="btn-link">{{$event->title}}</a></td>
                                                                        <td>{{$event->location}}</td>
                                                                        <td>{{$event->time}}</td>
                                                    <td>{{$event->by_who}}</td>
                                                    <td>{{$event->date}}</td>
                                                                    </tr>
                                                @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <!--===================================================-->
                                                    <!-- End Striped Table -->
                                        
                                                </div>
                                            </div>
                        </div>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <!-- Line Chart -->
                            <!---------------------------------->
                            <div class="panel">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Nationwide Offering collection</h3>
                                </div>
                                <div class="pad-all">
                                    <div id="demo-morris-line-legend" class="text-center"></div>
                                    <div id="demo-morris-line" style="height:268px"></div>
                                </div>
                            </div>
                            <!---------------------------------->

                            <!--<div class="row">
                                                        <div class="col-md-3">
                                                            <div class="panel panel-warning panel-colorful media middle pad-all">
                                                                <div class="media-left">
                                                                    <div class="pad-hor">
                                                                        <i class="demo-pli-file-word icon-3x"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="media-body">
                                                                    <p class="text-2x mar-no text-semibold">241</p>
                                                                    <p class="mar-no">Documents</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="panel panel-info panel-colorful media middle pad-all">
                                                                <div class="media-left">
                                                                    <div class="pad-hor">
                                                                        <i class="demo-pli-file-zip icon-3x"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="media-body">
                                                                    <p class="text-2x mar-no text-semibold">241</p>
                                                                    <p class="mar-no">Zip Files</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="panel panel-mint panel-colorful media middle pad-all">
                                                                <div class="media-left">
                                                                    <div class="pad-hor">
                                                                        <i class="demo-pli-camera-2 icon-3x"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="media-body">
                                                                    <p class="text-2x mar-no text-semibold">241</p>
                                                                    <p class="mar-no">Photos</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="panel panel-purple panel-colorful media middle pad-all">
                                                                <div class="media-left">
                                                                    <div class="pad-hor">
                                                                        <i class="demo-pli-video icon-3x"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="media-body">
                                                                    <p class="text-2x mar-no text-semibold">241</p>
                                                                    <p class="mar-no">Videos</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                        
                                                    </div>-->

                            <!--<div class="row">
                                                        <div class="col-md-6">
                                                            <div class="panel">
                                                                <div class="panel-heading">
                                                                    <h3 class="panel-title">Newsfeed</h3>
                                                                </div>
                                                                <div class="nano" style="height:360px">
                                                                    <div class="nano-content">
                                                                        <div class="panel-body bord-btm">
                                                                            <p class="text-bold text-main text-sm">#68464</p>
                                                                            <p class="pad-btm">To achieve this, it would be necessary to have uniform grammar, pronunciation and more common words. </p>
                                                                            <a href="dashboard" class="task-footer">
                                                                                <span class="box-inline">
                                                                                    <label class="label label-warning">Feature Request</label>
                                                                                    <label class="label label-danger">Bug</label>
                                                                                </span>
                                                                            </a>
                                                                        </div>
                                                                        <div class="panel-body bord-btm">
                                                                            <p class="text-bold text-main text-sm">#45684</p>
                                                                            <p class="pad-btm">A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
                                                                            <a href="dashboard" class="task-footer">
                                                                                <span class="box-inline">
                                                                                    <span class="pad-rgt"><i class="demo-pli-speech-bubble-7"></i> 45</span>
                                                                                    <span class="pad-rgt"><i class="demo-pli-like"></i> 45</span>
                                                                                </span>
                                                                                <span class="text-sm"><i class="demo-pli-clock icon-fw text-main"></i>9:25</span>
                                                                            </a>
                                                                        </div>
                                                                        <div class="panel-body bord-btm">
                                                                             <p class="text-bold text-main text-sm">#84564</p>
                                                                             <div class="task-img">
                                                                                 <img class="img-responsive" src="img/shared-img-2.jpg" alt="Image">
                                                                             </div>
                                                                             <p class="pad-btm">No one rejects, dislikes, or avoids pleasure itself, because it is pleasure.</p>
                                                                             <a href="dashboard" class="task-footer">
                                                                                 <span class="box-inline">
                                                                                     <span class="pad-rgt"><i class="demo-pli-heart-2"></i> 54K</span>
                                                                                 </span>
                                                                                 <span class="text-sm"><i class="demo-pli-clock icon-fw text-main"></i>03:08</span>
                                                                             </a>
                                                                         </div>
                                                                        <div class="panel-body bord-btm">
                                                                             <p class="text-bold text-main text-sm">#23255</p>
                                                                             <p class="pad-btm">The new common language will be more simple and regular than the existing European languages.</p>
                                                                             <a href="dashboard" class="task-footer">
                                                                                 <span class="box-inline">
                                                                                     <img class="img-xs img-circle" src="img/profile-photos/8.png" alt="task-user">
                                                                                     Brenda Fuller
                                                                                 </span>
                                                                             </a>
                                                                         </div>
                                                                        <div class="panel-body bord-btm">
                                                                            <p class="text-bold text-main text-sm">#34522</p>
                                                                            <p class="pad-btm">To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it?</p>
                                                                            <a href="dashboard" class="task-footer">
                                                                                <span class="text-sm"><i class="demo-pli-clock icon-fw text-main"></i>9:25</span>
                                                                            </a>
                                                                        </div>
                                                                        <div class="panel-body bord-btm">
                                                                            <p class="text-bold text-main text-sm">#45684</p>
                                                                            <p class="pad-btm">A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
                                                                            <a href="dashboard" class="task-footer">
                                                                                <span class="box-inline">
                                                                                    <span class="pad-rgt"><i class="demo-pli-speech-bubble-7"></i> 45</span>
                                                                                    <span class="pad-rgt"><i class="demo-pli-like"></i> 45</span>
                                                                                </span>
                                                                                <span class="text-sm"><i class="demo-pli-clock icon-fw text-main"></i>9:25</span>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="panel-footer text-right">
                                                                    <button class="btn btn-sm btn-Default">Load more</button>
                                                                    <button class="btn btn-sm btn-primary">View all</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="panel">
                                        
                                                                <div class="panel">
                                                                    <div class="panel-heading">
                                                                        <h3 class="panel-title">Top User</h3>
                                                </div>
                                                

                                                                    <div class="panel-body">
                                                                        <div class="table-responsive">
                                                                            <table class="table">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th class="text-center">#</th>
                                                                                        <th>User</th>
                                                                                        <th>Order date</th>
                                                                                        <th>Plan</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td class="text-center">34521</td>
                                                                                        <td><a href="dashboard" class="btn-link">Scott S. Calabrese</a></td>
                                                                                        <td><span class="text-muted">Oct 10, 2017</span></td>
                                                                                        <td><span class="label label-purple">Bussines</span></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="text-center">23422</td>
                                                                                        <td><a href="dashboard" class="btn-link">Teresa L. Doe</a></td>
                                                                                        <td><span class="text-muted">Oct 22, 2017</span></td>
                                                                                        <td><span class="label label-info">Personal</span></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="text-center">73455</td>
                                                                                        <td><a href="dashboard" class="btn-link">Steve N. Horton</a></td>
                                                                                        <td><span class="text-muted">Oct 22, 2017</span></td>
                                                                                        <td><span class="label label-warning">Trial</span></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="text-center">34523</td>
                                                                                        <td><a href="dashboard" class="btn-link">Charles S Boyle</a></td>
                                                                                        <td><span class="text-muted">Nov 03, 2017</span></td>
                                                                                        <td><span class="label label-purple">Bussines</span></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="text-center">74634</td>
                                                                                        <td><a href="dashboard" class="btn-link">Lucy Doe</a></td>
                                                                                        <td><span class="text-muted">Nov 05, 2017</span></td>
                                                                                        <td><span class="label label-success">Special</span></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="text-center">23423</td>
                                                                                        <td><a href="dashboard" class="btn-link">Michael Bunr</a></td>
                                                                                        <td><span class="text-muted">Nov 07, 2017</span></td>
                                                                                        <td><span class="label label-info">Personal</span></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="text-center">23422</td>
                                                                                        <td><a href="dashboard" class="btn-link">Teresa L. Doe</a></td>
                                                                                        <td><span class="text-muted">Nov 10, 2017</span></td>
                                                                                        <td><span class="label label-info">Personal</span></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="text-center">73455</td>
                                                                                        <td><a href="dashboard" class="btn-link">Steve N. Horton</a></td>
                                                                                        <td><span class="text-muted">Nov 10, 2017</span></td>
                                                                                        <td><span class="label label-danger">VIP</span></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="text-center">34521</td>
                                                                                        <td><a href="dashboard" class="btn-link">Scott S. Calabrese</a></td>
                                                                                        <td><span class="text-muted">Nov 11, 2017</span></td>
                                                                                        <td><span class="label label-purple">Bussines</span></td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                </div>
                                                
                                        
                                                                </div>
                                        
                                                            </div>
                                                        </div>
                                        
                                                    </div>-->
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
                                                                                        <p class="mnp-name"><span class="flag-icon flag-icon-ng"></span> WINNERS CHAPEL - OTAA</p>
                                                                                        <p class="mnp-desc">BRANCH001</p>
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


                                                                <!--Shortcut buttons-->
                                                                <!--================================-->
                                                                <div id="mainnav-shortcut" class="hidden">
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
                                                                                <a href="{{route('collection.offering')}}">
                                                                                        <i class="demo-pli-receipt-4"></i>
                                                                                        <span class="menu-title">Collection</span>
                                                                                        <i class="arrow"></i>
                                                                                </a>


                                                                                <!--<ul class="collapse">
                                                                                        <li>
                                                                                                <a href="tables-static.html">Offering Collection</a>
                                                                                        </li>
                                                                                        <li>
                                                                                                <a href="tables-bootstrap.html">Offering Analysis</a>
                                                                                        </li>

                                                                                </ul>-->
                                                                        </li>
                                                                        <li class="{{Route::currentRouteName() === 'branches' ? 'active-sub' : ''}}">
                                                                                <a href="{{ route('branches') }}">
                                                                                        <i class="fa fa-building-o"></i>
                                                                                        <span class="menu-title">Branches</span>
                                                                                        <!--<i class="arrow"></i>-->
                                                                                </a>
                                                                        </li>
                                                                        <li class="{{Route::currentRouteName() === 'calendar' ? 'active-sub' : ''}}">
                                                                                <a href="{{ route('calendar') }}">
                                                                                        <i class="fa fa-building-o"></i>
                                                                                        <span class="menu-title">Calendar & Events</span>
                                                                                        <!--<i class="arrow"></i>-->
                                                                                </a>
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
                <a href="dashboard" class="text-main">
                    <span class="badge badge-danger">3</span> pending action.</a>
            </div>



            <!-- Visible when footer positions are static -->
            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
            <div class="hide-fixed pull-right pad-rgt">
                Church
                <strong>CMS</strong>
            </div>



            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
            <!-- Remove the class "show-fixed" and "hide-fixed" to make the content always appears. -->
            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->

            <p class="pad-lft">&#0169; 2017 Winners Chapel</p>



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




    <!--=================================================-->

    <!--Demo script [ DEMONSTRATION ]-->
    <script src="{{ URL::asset('js/demo/nifty-demo.min.js') }}"></script>


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