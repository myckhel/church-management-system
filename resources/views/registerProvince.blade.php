<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>General Elements | Nifty - Admin Template</title>


    <!--STYLESHEET-->
    <!--=================================================-->

    <!--Open Sans Font [ OPTIONAL ]-->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>



    <!--Bootstrap Stylesheet [ REQUIRED ]-->
    <link href="css/bootstrap.min.css" rel="stylesheet">


    <!--Nifty Stylesheet [ REQUIRED ]-->
    <link href="css/nifty.min.css" rel="stylesheet">


    <!--Nifty Premium Icon [ DEMONSTRATION ]-->
    <link href="css/demo/nifty-demo-icons.min.css" rel="stylesheet">


    <!--=================================================-->



    <!--Pace - Page Load Progress Par [OPTIONAL]-->
    <link href="plugins/pace/pace.min.css" rel="stylesheet">
    <script src="plugins/pace/pace.min.js"></script>


    <!--Demo [ DEMONSTRATION ]-->
    <link href="css/demo/nifty-demo.min.css" rel="stylesheet">



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
    <div id="container" class="effect aside-float aside-bright mainnav-lg">

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
                            <span class="brand-text">Nifty</span>
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


                        <!--Mega dropdown-->
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <li class="mega-dropdown">
                            <a href="forms-general.html#" class="mega-dropdown-toggle">
                                <i class="demo-pli-layout-grid"></i>
                            </a>
                            <div class="dropdown-menu mega-dropdown-menu">
                                <div class="row">
                                    <div class="col-sm-4 col-md-3">

                                        <!--Mega menu list-->
                                        <ul class="list-unstyled">
									        <li class="dropdown-header"><i class="demo-pli-file icon-lg icon-fw"></i> Pages</li>
									        <li><a href="forms-general.html#">Profile</a></li>
									        <li><a href="forms-general.html#">Search Result</a></li>
									        <li><a href="forms-general.html#">FAQ</a></li>
									        <li><a href="forms-general.html#">Sreen Lock</a></li>
									        <li><a href="forms-general.html#">Maintenance</a></li>
									        <li><a href="forms-general.html#">Invoice</a></li>
									        <li><a href="forms-general.html#" class="disabled">Disabled</a></li>                                        </ul>

                                    </div>
                                    <div class="col-sm-4 col-md-3">

                                        <!--Mega menu list-->
                                        <ul class="list-unstyled">
									        <li class="dropdown-header"><i class="demo-pli-mail icon-lg icon-fw"></i> Mailbox</li>
									        <li><a href="forms-general.html#"><span class="pull-right label label-danger">Hot</span>Indox</a></li>
									        <li><a href="forms-general.html#">Read Message</a></li>
									        <li><a href="forms-general.html#">Compose</a></li>
									        <li><a href="forms-general.html#">Template</a></li>
                                        </ul>
                                        <p class="pad-top text-main text-sm text-uppercase text-bold"><i class="icon-lg demo-pli-calendar-4 icon-fw"></i>News</p>
                                        <p class="pad-top mar-top bord-top text-sm">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes.</p>
                                    </div>
                                    <div class="col-sm-4 col-md-3">
                                        <!--Mega menu list-->
                                        <ul class="list-unstyled">
                                            <li>
                                                <a href="forms-general.html#" class="media mar-btm">
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
                                                <a href="forms-general.html#" class="media mar-btm">
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
                                                <a href="forms-general.html#" class="media mar-btm">
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
                                                <a href="forms-general.html#" class="media mar-btm">
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
                                        <a href="forms-general.html#" class="btn btn-block btn-primary">Browse Gallery</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <!--End mega dropdown-->



                        <!--Notification dropdown-->
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <li class="dropdown">
                            <a href="forms-general.html#" data-toggle="dropdown" class="dropdown-toggle">
                                <i class="demo-pli-bell"></i>
                                <span class="badge badge-header badge-danger"></span>
                            </a>


                            <!--Notification dropdown menu-->
                            <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                                <div class="nano scrollable">
                                    <div class="nano-content">
                                        <ul class="head-list">
                                            <li>
                                                <a href="forms-general.html#" class="media add-tooltip" data-title="Used space : 95%" data-container="body" data-placement="bottom">
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
                                                <a class="media" href="forms-general.html#">
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
                                                <a class="media" href="forms-general.html#">
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
                                                <a class="media" href="forms-general.html#">
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
                                                <a class="media" href="forms-general.html#">
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
                                                <a class="media" href="forms-general.html#">
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

                                <!--Dropdown footer-->
                                <div class="pad-all bord-top">
                                    <a href="forms-general.html#" class="btn-link text-main box-block">
                                        <i class="pci-chevron chevron-right pull-right"></i>Show All Notifications
                                    </a>
                                </div>
                            </div>
                        </li>
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <!--End notifications dropdown-->



                        <!--User dropdown-->
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <li id="dropdown-user" class="dropdown">
                            <a href="forms-general.html#" data-toggle="dropdown" class="dropdown-toggle text-right">
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
                                        <a href="forms-general.html#"><i class="demo-pli-male icon-lg icon-fw"></i> Profile</a>
                                    </li>
                                    <li>
                                        <a href="forms-general.html#"><span class="badge badge-danger pull-right">9</span><i class="demo-pli-mail icon-lg icon-fw"></i> Messages</a>
                                    </li>
                                    <li>
                                        <a href="forms-general.html#"><span class="label label-success pull-right">New</span><i class="demo-pli-gear icon-lg icon-fw"></i> Settings</a>
                                    </li>
                                    <li>
                                        <a href="forms-general.html#"><i class="demo-pli-computer-secure icon-lg icon-fw"></i> Lock screen</a>
                                    </li>
                                    <li>
                                        <a href="pages-login.html"><i class="demo-pli-unlock icon-lg icon-fw"></i> Logout</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <!--End user dropdown-->

                        <li>
                            <a href="forms-general.html#" class="aside-toggle">
                                <i class="demo-pli-dot-vertical"></i>
                            </a>
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

                    <!--Page Title-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <div id="page-title">
                        <h1 class="page-header text-overflow">General Elements</h1>
                    </div>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End page title-->


                    <!--Breadcrumb-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <ol class="breadcrumb">
					<li><a href="forms-general.html#"><i class="demo-pli-home"></i></a></li>
					<li><a href="forms-general.html#">Forms</a></li>
					<li class="active">General Elements</li>
                    </ol>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End breadcrumb-->

                </div>


                <!--Page content-->
                <!--===================================================-->
                <div id="page-content">

					<div class="panel">
					    <div class="panel-heading">
					        <h3 class="panel-title">Inline Form</h3>
					    </div>
					    <div class="panel-body">

					        <!-- Inline Form  -->
					        <!--===================================================-->
					        <form class="form-inline">
					            <div class="form-group">
					                <label for="demo-inline-inputmail" class="sr-only">Email address</label>
					                <input type="email" placeholder="Enter email" id="demo-inline-inputmail" class="form-control">
					            </div>
					            <div class="form-group">
					                <label for="demo-inline-inputpass" class="sr-only">Password</label>
					                <input type="password" placeholder="Password" id="demo-inline-inputpass" class="form-control">
					            </div>
					            <div class="checkbox">
					                <input id="demo-remember-me" class="magic-checkbox" type="checkbox">
					                <label for="demo-remember-me">Remember me</label>
					            </div>
					            <button class="btn btn-primary" type="submit">Sign in</button>
					        </form>
					        <!--===================================================-->
					        <!-- End Inline Form  -->

					    </div>
					</div>
					<div class="row">
					    <div class="col-sm-6">
					        <div class="panel">
					            <div class="panel-heading">
					                <h3 class="panel-title">Block styled form</h3>
					            </div>

					            <!--Block Styled Form -->
					            <!--===================================================-->
					            <form>
					                <div class="panel-body">
					                    <div class="row">
					                        <div class="col-sm-6">
					                            <div class="form-group">
					                                <label class="control-label">Firstname</label>
					                                <input type="text" class="form-control">
					                            </div>
					                        </div>
					                        <div class="col-sm-6">
					                            <div class="form-group">
					                                <label class="control-label">Lastname</label>
					                                <input type="text" class="form-control">
					                            </div>
					                        </div>
					                    </div>
					                    <div class="row">
					                        <div class="col-sm-6">
					                            <div class="form-group">
					                                <label class="control-label">Email</label>
					                                <input type="email" class="form-control">
					                            </div>
					                        </div>
					                        <div class="col-sm-6">
					                            <div class="form-group">
					                                <label class="control-label">Website</label>
					                                <input type="url" class="form-control">
					                            </div>
					                        </div>
					                    </div>
					                </div>
					                <div class="panel-footer text-right">
					                    <button class="btn btn-success" type="submit">Submit</button>
					                </div>
					            </form>
					            <!--===================================================-->
					            <!--End Block Styled Form -->

					        </div>
					    </div>
					    <div class="col-sm-6">
					        <div class="panel">
					            <div class="panel-heading">
					                <h3 class="panel-title">Horizontal form</h3>
					            </div>

					            <!--Horizontal Form-->
					            <!--===================================================-->
					            <form class="form-horizontal">
					                <div class="panel-body">
					                    <div class="form-group">
					                        <label class="col-sm-3 control-label" for="demo-hor-inputemail">Email</label>
					                        <div class="col-sm-9">
					                            <input type="email" placeholder="Email" id="demo-hor-inputemail" class="form-control">
					                        </div>
					                    </div>
					                    <div class="form-group">
					                        <label class="col-sm-3 control-label" for="demo-hor-inputpass">Password</label>
					                        <div class="col-sm-9">
					                            <input type="password" placeholder="Password" id="demo-hor-inputpass" class="form-control">
					                        </div>
					                    </div>
					                    <div class="form-group">
					                        <div class="col-sm-offset-3 col-sm-9">
					                            <input id="demo-remember-me-2" class="magic-checkbox" type="checkbox">
					                            <label for="demo-remember-me-2">Remember me</label>
					                        </div>
					                    </div>
					                </div>
					                <div class="panel-footer text-right">
					                    <button class="btn btn-success" type="submit">Sign in</button>
					                </div>
					            </form>
					            <!--===================================================-->
					            <!--End Horizontal Form-->

					        </div>
					    </div>
					</div>
					<div class="row">
					    <div class="col-lg-6">
					        <div class="panel">
					            <div class="panel-heading">
					                <h3 class="panel-title">Input size</h3>
					            </div>


					            <!--Input Size-->
					            <!--===================================================-->
					            <form class="form-horizontal">
					                <div class="panel-body">
					                    <div class="form-group">
					                        <label class="col-sm-3 control-label" for="demo-is-inputsmall">Small Input</label>
					                        <div class="col-sm-6">
					                            <input type="text" placeholder=".input-sm" class="form-control input-sm" id="demo-is-inputsmall">
					                        </div>
					                    </div>
					                    <div class="form-group">
					                        <label for="demo-is-inputnormal" class="col-sm-3 control-label">Normal Input</label>
					                        <div class="col-sm-6">
					                            <input type="text" placeholder="Normal" class="form-control" id="demo-is-inputnormal">
					                        </div>
					                    </div>
					                    <div class="form-group">
					                        <label for="demo-is-inputlarge" class="col-sm-3 control-label">Large Input</label>
					                        <div class="col-sm-6">
					                            <input type="text" placeholder=".input-lg" class="form-control input-lg" id="demo-is-inputlarge">
					                        </div>
					                    </div>
					                    <div class="form-group">
					                        <label class="col-sm-3 control-label">Grid Inputs</label>
					                        <div class="col-sm-3">
					                            <input type="text" placeholder=".col-sm-3" class="form-control">
					                        </div>
					                    </div>
					                    <div class="form-group">
					                        <div class="col-sm-5 col-sm-offset-3">
					                            <input type="text" placeholder=".col-sm-5" class="form-control">
					                        </div>
					                    </div>
					                    <div class="form-group">
					                        <div class="col-sm-7 col-sm-offset-3">
					                            <input type="text" placeholder=".col-sm-7" class="form-control">
					                        </div>
					                    </div>
					                    <div class="form-group">
					                        <div class="col-sm-9 col-sm-offset-3">
					                            <input type="text" placeholder=".col-sm-9" class="form-control">
					                        </div>
					                    </div>
					                </div>
					                <div class="panel-footer">
					                    <div class="row">
					                        <div class="col-sm-9 col-sm-offset-3">
					                            <button class="btn btn-mint" type="submit">Login</button>
					                            <button class="btn btn-warning" type="reset">Reset</button>
					                        </div>
					                    </div>
					                </div>
					            </form>
					            <!--===================================================-->
					            <!--End Input Size-->


					        </div>
					    </div>
					    <div class="col-lg-6">
					        <div class="panel">
					            <div class="panel-heading">
					                <h3 class="panel-title">No label form</h3>
					            </div>

					            <!--No Label Form-->
					            <!--===================================================-->
					            <form class="form-horizontal">
					                <div class="panel-body">
					                    <div class="row">
					                        <div class="col-md-4 mar-btm">
					                            <input type="text" class="form-control" placeholder="Name">
					                        </div>
					                        <div class="col-md-4 mar-btm">
					                            <input type="email" class="form-control" placeholder="Email">
					                        </div>
					                        <div class="col-md-4 mar-btm">
					                            <input type="url" class="form-control" placeholder="Website">
					                        </div>
					                    </div>
					                    <textarea placeholder="Message" rows="13" class="form-control"></textarea>
					                </div>
					                <div class="panel-footer text-right">
					                    <button class="btn btn-default">Send message</button>
					                </div>
					            </form>
					            <!--===================================================-->
					            <!--End No Label Form-->

					        </div>
					    </div>
					</div>
					<div class="row">
					    <div class="col-md-6">
					        <div class="panel">
					            <div class="panel-heading">
					                <h3 class="panel-title">Icons Addons</h3>
					            </div>

					            <!--Icons Addons-->
					            <!--===================================================-->
					            <form class="form-horizontal">
					                <div class="panel-body">
					                    <div class="input-group mar-btm">
					                        <span class="input-group-addon"><i class="demo-pli-star"></i></span>
					                        <input type="text" class="form-control" placeholder="Name">
					                    </div>
					                    <div class="input-group mar-btm">
					                        <input type="email" class="form-control" placeholder="Folder name">
					                        <span class="input-group-addon"><i class="demo-pli-inbox-full"></i></span>
					                    </div>
					                    <div class="input-group mar-btm">
					                        <span class="input-group-addon"><i class="demo-pli-wallet-2"></i></span>
					                        <input type="text" class="form-control">
					                        <span class="input-group-addon">.00</span>
					                    </div>
					                </div>
					            </form>
					            <!--===================================================-->
					            <!--End Icons Addons-->

					        </div>
					        <div class="panel">
					            <div class="panel-heading">
					                <h3 class="panel-title">Checkboxes and radio addons</h3>
					            </div>

					            <!--Checkboxes and Radio addons-->
					            <!--===================================================-->
					            <form class="form-horizontal">
					                <div class="panel-body">
					                    <div class="input-group mar-btm">
					                        <div class="input-group-addon">
					                            <input id="demo-checkbox-addons" class="magic-checkbox" type="checkbox">
					                            <label for="demo-checkbox-addons"></label>
					                        </div>
					                        <input type="text" class="form-control">
					                    </div>
					                    <div class="input-group mar-btm">
					                        <span class="input-group-addon">
					                            <input id="demo-radio-addons" class="magic-radio" type="radio" name="input-group-radio" checked>
					                            <label for="demo-radio-addons"></label>
					                        </span>
					                        <input type="text" class="form-control">
					                    </div>
					                    <div class="input-group mar-btm">
					                        <span class="input-group-addon">
					                            <input id="demo-radio-addons-2" class="magic-radio" type="radio" name="input-group-radio">
					                            <label for="demo-radio-addons-2"></label>
					                        </span>
					                        <input type="text" class="form-control">
					                    </div>
					                </div>
					            </form>
					            <!--===================================================-->
					            <!--End Checkboxes and Radio addons-->

					        </div>
					    </div>
					    <div class="col-md-6">
					        <div class="panel">
					            <div class="panel-heading">
					                <h3 class="panel-title">Buttons Addons</h3>
					            </div>

					            <!--Buttons Addons-->
					            <!--===================================================-->
					            <form class="form-horizontal">
					                <div class="panel-body">
					                    <div class="input-group mar-btm">
					                        <span class="input-group-btn">
					                            <button class="btn btn-mint" type="button">Submit</button>
					                        </span>
					                        <input type="email" placeholder="Email" class="form-control">
					                    </div>
					                    <div class="input-group mar-btm">
					                        <input type="text" placeholder="Search" class="form-control">
					                        <span class="input-group-btn">
					                            <button class="btn btn-mint" type="button">Search</button>
					                        </span>
					                    </div>
					                    <div class="input-group mar-btm">
					                        <span class="input-group-btn">
					                            <button class="btn btn-mint" type="button"><i class="demo-pli-like"></i></button>
					                        </span>
					                        <input type="text" placeholder="Comment" class="form-control">
					                        <span class="input-group-btn">
					                            <button class="btn btn-mint" type="button"><i class="demo-pli-unlike"></i></button>
					                        </span>
					                    </div>
					                </div>
					            </form>
					            <!--===================================================-->
					            <!--End Buttons Addon-->

					        </div>
					        <div class="panel">
					            <div class="panel-heading">
					                <h3 class="panel-title">Dropdowns Addons</h3>
					            </div>

					            <!--Dropdowns Addons-->
					            <!--===================================================-->
					            <form class="form-horizontal">
					                <div class="panel-body">
					                    <div class="input-group mar-btm">
					                        <div class="input-group-btn dropdown">
					                            <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle" type="button">
					                                Action <i class="dropdown-caret"></i>
					                            </button>
					                            <ul class="dropdown-menu">
					                                <li><a href="forms-general.html#">Action</a></li>
					                                <li><a href="forms-general.html#">Another action</a></li>
					                                <li><a href="forms-general.html#">Something else here</a></li>
					                                <li class="divider"></li>
					                                <li><a href="forms-general.html#">Separated link</a></li>
					                            </ul>
					                        </div>
					                        <input type="text" placeholder="Username" class="form-control">
					                    </div>
					                    <div class="input-group mar-btm">
					                        <input type="email" placeholder="Email" class="form-control">
					                        <div class="input-group-btn dropdown">
					                            <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle" type="button">
					                                Action <i class="dropdown-caret"></i>
					                            </button>
					                            <ul class="dropdown-menu dropdown-menu-right">
					                                <li><a href="forms-general.html#">Action</a></li>
					                                <li><a href="forms-general.html#">Another action</a></li>
					                                <li><a href="forms-general.html#">Something else here</a></li>
					                                <li class="divider"></li>
					                                <li><a href="forms-general.html#">Separated link</a></li>
					                            </ul>
					                        </div>
					                    </div>
					                    <div class="input-group mar-btm">
					                        <div class="input-group-btn dropdown">
					                            <button class="btn btn-primary" type="button">Action</button>
					                            <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-icon" type="button">
					                                <i class="dropdown-caret"></i>
					                            </button>
					                            <ul class="dropdown-menu">
					                                <li><a href="forms-general.html#">Action</a></li>
					                                <li><a href="forms-general.html#">Another action</a></li>
					                                <li><a href="forms-general.html#">Something else here</a></li>
					                                <li class="divider"></li>
					                                <li><a href="forms-general.html#">Separated link</a></li>
					                            </ul>
					                        </div>
					                        <input type="text" placeholder="Comment" class="form-control">
					                        <div class="input-group-btn dropdown">
					                            <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-icon" type="button">
					                                <i class="dropdown-caret"></i>
					                            </button>
					                            <ul class="dropdown-menu dropdown-menu-right">
					                                <li><a href="forms-general.html#">Action</a></li>
					                                <li><a href="forms-general.html#">Another action</a></li>
					                                <li><a href="forms-general.html#">Something else here</a></li>
					                                <li class="divider"></li>
					                                <li><a href="forms-general.html#">Separated link</a></li>
					                            </ul>
					                        </div>
					                    </div>
					                </div>
					            </form>
					            <!--===================================================-->
					            <!--End Dropdowns Addons-->

					        </div>
					    </div>
					</div>
					<div class="row">
					    <div class="col-lg-6">
					        <div class="panel">
					            <div class="panel-heading">
					                <h3 class="panel-title">Validation States</h3>
					            </div>

					            <!--Validation States-->
					            <!--===================================================-->
					            <div class="panel-body">
					                <div class="form-group">
					                    <label for="demo-vs-definput" class="control-label">Default input</label>
					                    <input type="text" id="demo-vs-definput" class="form-control">
					                </div>
					                <div class="form-group has-warning">
					                    <label for="demo-vs-warinput" class="control-label">Input with warning</label>
					                    <input type="text" id="demo-vs-warinput" class="form-control">
					                </div>
					                <div class="form-group has-error">
					                    <label for="demo-vs-errinput" class="control-label">Input with error</label>
					                    <input type="text" id="demo-vs-errinput" class="form-control">
					                </div>
					                <div class="form-group has-success">
					                    <label for="demo-vs-scsinput" class="control-label">Input with success</label>
					                    <input type="text" id="demo-vs-scsinput" class="form-control">
					                </div>
					            </div>
					            <!--===================================================-->
					            <!--END OF VALIDATION STATES-->

					        </div>
					    </div>
					    <div class="col-lg-6">
					        <div class="panel">
					            <div class="panel-heading">
					                <h3 class="panel-title">With optional icons</h3>
					            </div>
					            <div class="panel-body">

					                <!--Validation States-->
					                <!--===================================================-->
					                <div class="form-group has-feedback">
					                    <label for="demo-oi-definput" class="control-label text-semibold">Default input</label>
					                    <input type="text" id="demo-oi-definput" class="form-control">
					                    <i class="demo-pli-male form-control-feedback"></i>
					                </div>
					                <div class="form-group has-success has-feedback">
					                    <label for="demo-oi-sccinput" class="control-label text-semibold">Input with success</label>
					                    <input type="text" id="demo-oi-sccinput" class="form-control">
					                    <i class="demo-pli-like form-control-feedback"></i>
					                </div>
					                <div class="form-group has-warning has-feedback">
					                    <label for="demo-oi-warinput" class="control-label text-semibold">Input with warning</label>
					                    <input type="text" id="demo-oi-warinput" class="form-control">
					                    <i class="demo-pli-exclamation form-control-feedback"></i>
					                </div>
					                <div class="form-group has-error has-feedback">
					                    <label for="demo-oi-errinput" class="control-label text-semibold">Input with error</label>
					                    <input type="text" id="demo-oi-errinput" class="form-control">
					                    <i class="demo-pli-cross form-control-feedback"></i>
					                </div>
					                <!--===================================================-->
					                <!--End Validation States-->

					            </div>
					        </div>
					    </div>
					</div>
					<div class="row">
					    <div class="col-lg-6">
					        <div class="panel">
					            <div class="panel-heading">
					                <h3 class="panel-title">Basic Form Elements</h3>
					            </div>


					            <!-- BASIC FORM ELEMENTS -->
					            <!--===================================================-->
					            <form class="panel-body form-horizontal form-padding">

					                <!--Static-->
					                <div class="form-group">
					                    <label class="col-md-3 control-label">Static</label>
					                    <div class="col-md-9"><p class="form-control-static">Username</p></div>
					                </div>

					                <!--Text Input-->
					                <div class="form-group">
					                    <label class="col-md-3 control-label" for="demo-text-input">Text Input</label>
					                    <div class="col-md-9">
					                        <input type="text" id="demo-text-input" class="form-control" placeholder="Text">
					                        <small class="help-block">This is a help text</small>
					                    </div>
					                </div>

					                <!--Email Input-->
					                <div class="form-group">
					                    <label class="col-md-3 control-label" for="demo-email-input">Email Input</label>
					                    <div class="col-md-9">
					                        <input type="email" id="demo-email-input" class="form-control" placeholder="Enter your email">
					                        <small class="help-block">Please enter your email</small>
					                    </div>
					                </div>

					                <!--Password-->
					                <div class="form-group">
					                    <label class="col-md-3 control-label" for="demo-password-input">Password</label>
					                    <div class="col-md-9">
					                        <input type="password" id="demo-password-input" class="form-control" placeholder="Password">
					                        <small class="help-block">Please enter password</small>
					                    </div>
					                </div>

					                <!--Readonly Input-->
					                <div class="form-group">
					                    <label class="col-md-3 control-label" for="demo-readonly-input">Readonly input</label>
					                    <div class="col-md-9">
					                        <input type="text" id="demo-readonly-input" class="form-control" placeholder="Readonly input here..." readonly>
					                    </div>
					                </div>

					                <!--Textarea-->
					                <div class="form-group">
					                    <label class="col-md-3 control-label" for="demo-textarea-input">Textarea</label>
					                    <div class="col-md-9">
					                        <textarea id="demo-textarea-input" rows="9" class="form-control" placeholder="Your content here.."></textarea>
					                    </div>
					                </div>

					                <div class="form-group pad-ver">
					                    <label class="col-md-3 control-label">Radio Buttons</label>
					                    <div class="col-md-9">

					                        <!-- Radio Buttons -->
					                        <div class="radio">
					                            <input id="demo-form-radio" class="magic-radio" type="radio" name="form-radio-button" checked>
					                            <label for="demo-form-radio">Option 1 (pre-checked)</label>
					                        </div>
					                        <div class="radio">
					                            <input id="demo-form-radio-2" class="magic-radio" type="radio" name="form-radio-button">
					                            <label for="demo-form-radio-2">Option 2</label>
					                        </div>
					                        <div class="radio">
					                            <input id="demo-form-radio-3" class="magic-radio" type="radio" name="form-radio-button">
					                            <label for="demo-form-radio-3">Option 2</label>
					                        </div>

					                    </div>
					                </div>
					                <div class="form-group pad-ver">
					                    <label class="col-md-3 control-label">Inline Radio buttons</label>
					                    <div class="col-md-9">
					                        <div class="radio">

					                            <!-- Inline radio buttons -->
					                            <input id="demo-inline-form-radio" class="magic-radio" type="radio" name="inline-form-radio" checked>
					                            <label for="demo-inline-form-radio">Option 1 (pre-checked)</label>

					                            <input id="demo-inline-form-radio-2" class="magic-radio" type="radio" name="inline-form-radio">
					                            <label for="demo-inline-form-radio-2">Option 2</label>

					                            <input id="demo-inline-form-radio-3" class="magic-radio" type="radio" name="inline-form-radio">
					                            <label for="demo-inline-form-radio-3">Option 3</label>


					                        </div>
					                    </div>
					                </div>
					                <div class="form-group pad-ver">
					                    <label class="col-md-3 control-label">Checkboxes</label>
					                    <div class="col-md-9">

					                        <!-- Checkboxes -->
					                        <div class="checkbox">
					                            <input id="demo-form-checkbox" class="magic-checkbox" type="checkbox" checked>
					                            <label for="demo-form-checkbox">Option 1 (pre-checked)</label>
					                        </div>

					                        <div class="checkbox">
					                            <input id="demo-form-checkbox-2" class="magic-checkbox" type="checkbox">
					                            <label for="demo-form-checkbox-2">Option 2</label>
					                        </div>

					                        <div class="checkbox">
					                            <input id="demo-form-checkbox-3" class="magic-checkbox" type="checkbox">
					                            <label for="demo-form-checkbox-3">Option 3</label>
					                        </div>


					                    </div>
					                </div>
					                <div class="form-group pad-ver">
					                    <label class="col-md-3 control-label">Inline Checkboxes</label>
					                    <div class="col-md-9">
					                        <div class="checkbox">

					                            <!-- Inline Checkboxes -->
					                            <input id="demo-form-inline-checkbox" class="magic-checkbox" type="checkbox" checked>
					                            <label for="demo-form-inline-checkbox">Option 1 (pre-checked)</label>

					                            <input id="demo-form-inline-checkbox-2" class="magic-checkbox" type="checkbox">
					                            <label for="demo-form-inline-checkbox-2">Option 2</label>

					                            <input id="demo-form-inline-checkbox-3" class="magic-checkbox" type="checkbox">
					                            <label for="demo-form-inline-checkbox-3">Option 3</label>

					                        </div>
					                    </div>
					                </div>
					                <div class="form-group">
					                    <label class="col-md-3 control-label">File input</label>
					                    <div class="col-md-9">
					                        <span class="pull-left btn btn-primary btn-file">
					                        Browse... <input type="file">
					                        </span>
					                    </div>
					                </div>
					            </form>
					            <!--===================================================-->
					            <!-- END BASIC FORM ELEMENTS -->


					        </div>
					    </div>
					    <div class="col-lg-6">
					        <div class="panel">
					            <div class="panel-heading">
					                <h3 class="panel-title">Disabled</h3>
					            </div>


					            <!-- DISABLED FORM ELEMENTS-->
					            <!--===================================================-->
					            <form class="panel-body form-horizontal form-padding">

					                <!--Static-->
					                <div class="form-group">
					                    <label class="col-md-3 control-label">Static</label>
					                    <div class="col-md-9">
					                        <p class="form-control-static">Username</p>
					                    </div>
					                </div>

					                <!--Disabled Text Input-->
					                <div class="form-group">
					                    <label class="col-md-3 control-label">Text Input</label>
					                    <div class="col-md-9">
					                        <input type="text" class="form-control" placeholder="Text" disabled>
					                        <small class="help-block">This is a help text</small>
					                    </div>
					                </div>

					                <!--Disabled Email Input-->
					                <div class="form-group">
					                    <label class="col-md-3 control-label">Email Input</label>
					                    <div class="col-md-9">
					                        <input type="email" class="form-control" placeholder="Enter your email" disabled>
					                        <small class="help-block">Please enter your email</small>
					                    </div>
					                </div>

					                <!--Disabled Password-->
					                <div class="form-group">
					                    <label class="col-md-3 control-label">Password</label>
					                    <div class="col-md-9">
					                        <input type="password" class="form-control" placeholder="Password" disabled>
					                        <small class="help-block">Please enter password</small>
					                    </div>
					                </div>

					                <!--Readonly Input-->
					                <div class="form-group">
					                    <label class="col-md-3 control-label">Readonly input</label>
					                    <div class="col-md-9">
					                        <input type="text" class="form-control" placeholder="Readonly input here..." readonly disabled>
					                    </div>
					                </div>


					                <!--Disabled Textarea-->
					                <div class="form-group">
					                    <label class="col-md-3 control-label">Textarea</label>
					                    <div class="col-md-9">
					                        <textarea rows="9" class="form-control" placeholder="Your content here.." disabled></textarea>
					                    </div>
					                </div>

					                <div class="form-group pad-ver">
					                    <label class="col-md-3 control-label">Radio Buttons</label>
					                    <div class="col-md-9">

					                            <!--Disabled Radio Buttons -->
					                        <div class="radio">
					                            <input id="demo-disabled-form-radio" class="magic-radio" type="radio" name="disabled-form-radio-button" checked disabled>
					                            <label for="demo-disabled-form-radio">Option 1 (pre-checked)</label>
					                        </div>
					                        <div class="radio">
					                            <input id="demo-disabled-form-radio-2" class="magic-radio" type="radio" name="disabled-form-radio-button" disabled>
					                            <label for="demo-disabled-form-radio-2">Option 2</label>
					                        </div>
					                        <div class="radio">
					                            <input id="demo-disabled-form-radio-3" class="magic-radio" type="radio" name="disabled-form-radio-button" disabled>
					                            <label for="demo-disabled-form-radio-3">Option 2</label>
					                        </div>


					                    </div>
					                </div>
					                <div class="form-group pad-ver">
					                    <label class="col-md-3 control-label">Inline Radio Buttons</label>
					                    <div class="col-md-9">
					                        <div class="radio">

					                            <!-- Inline radio buttons -->
					                            <input id="demo-disabled-inline-form-radio" class="magic-radio" type="radio" name="disabled-inline-form-radio" checked disabled>
					                            <label for="demo-disabled-inline-form-radio">Option 1 (pre-checked)</label>

					                            <input id="demo-disabled-inline-form-radio-2" class="magic-radio" type="radio" name="disabled-inline-form-radio" disabled>
					                            <label for="demo-disabled-inline-form-radio-2">Option 2</label>

					                            <input id="demo-disabled-inline-form-radio-3" class="magic-radio" type="radio" name="disabled-inline-form-radio" disabled>
					                            <label for="demo-disabled-inline-form-radio-3">Option 3</label>


					                        </div>
					                    </div>
					                </div>
					                <div class="form-group pad-ver">
					                    <label class="col-md-3 control-label">Checkboxes</label>
					                    <div class="col-md-9">

					                        <div class="checkbox">
					                            <input id="demo-disabled-form-checkbox" class="magic-checkbox" type="checkbox" checked disabled>
					                            <label for="demo-disabled-form-checkbox">Option 1 (pre-checked)</label>
					                        </div>

					                        <div class="checkbox">
					                            <input id="demo-disabled-form-checkbox-2" class="magic-checkbox" type="checkbox" disabled>
					                            <label for="demo-disabled-form-checkbox-2">Option 2</label>
					                        </div>

					                        <div class="checkbox">
					                            <input id="demo-disabled-form-checkbox-3" class="magic-checkbox" type="checkbox" disabled>
					                            <label for="demo-disabled-form-checkbox-3">Option 3</label>
					                        </div>

					                    </div>
					                </div>
					                <div class="form-group pad-ver">
					                    <label class="col-md-3 control-label">Inline Checkboxes</label>
					                    <div class="col-md-9">
					                        <div class="checkbox">

					                            <!-- Inline Checkboxes -->
					                            <input id="demo-disabled-form-inline-checkbox" class="magic-checkbox" type="checkbox" checked disabled>
					                            <label for="demo-disabled-form-inline-checkbox">Option 1 (pre-checked)</label>

					                            <input id="demo-disabled-form-inline-checkbox-2" class="magic-checkbox" type="checkbox" disabled>
					                            <label for="demo-disabled-form-inline-checkbox-2">Option 2</label>

					                            <input id="demo-disabled-form-inline-checkbox-3" class="magic-checkbox" type="checkbox" disabled>
					                            <label for="demo-disabled-form-inline-checkbox-3">Option 3</label>

					                        </div>
					                    </div>
					                </div>
					                <div class="form-group">
					                    <label class="col-md-3 control-label">File input</label>
					                    <div class="col-md-9">
					                        <span class="pull-left btn btn-primary btn-file disabled">
					                            Browse... <input type="file" disabled>
					                        </span>
					                    </div>
					                </div>
					            </form>
					            <!--===================================================-->
					            <!-- END DISABLED FORM ELEMENTS -->

					        </div>
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
            <aside id="aside-container">
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
                                        <small><em>Last Update : Des 12, 2014</em></small>
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
                                        <p>Get <strong class="text-main">$5.00</strong> off your next bill by making sure your full payment reaches us before August 5, 2018.</p>
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
                                        <a href="forms-general.html#" class="list-group-item"><i class="demo-pli-information icon-lg icon-fw"></i> Service Information</a>
                                        <a href="forms-general.html#" class="list-group-item"><i class="demo-pli-mine icon-lg icon-fw"></i> Usage Profile</a>
                                        <a href="forms-general.html#" class="list-group-item"><span class="label label-info pull-right">New</span><i class="demo-pli-credit-card-2 icon-lg icon-fw"></i> Payment Options</a>
                                        <a href="forms-general.html#" class="list-group-item"><i class="demo-pli-support icon-lg icon-fw"></i> Message Center</a>
                                    </div>


                                    <hr>

                                    <div class="text-center">
                                        <div><i class="demo-pli-old-telephone icon-3x"></i></div>
                                        Questions?
                                        <p class="text-lg text-semibold text-main"> (415) 234-53454 </p>
                                        <small><em>We are here 24/7</em></small>
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
                                        <li class="list-header"><p class="text-main text-sm text-uppercase text-bold mar-no">Public Settings</p></li>
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
                                            <div class="progress-bar progress-bar-success" style="width: 15%;"><span class="sr-only">15%</span></div>
                                        </div>
                                        <small>15% Completed</small>
                                    </div>
                                    <div class="pad-hor">
                                        <p class="text-main">Database</p>
                                        <div class="progress progress-sm">
                                            <div class="progress-bar progress-bar-danger" style="width: 75%;"><span class="sr-only">75%</span></div>
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
                                            <img class="img-circle img-md" src="img/profile-photos/1.png" alt="Profile Picture">
                                        </div>
                                        <a href="forms-general.html#profile-nav" class="box-block" data-toggle="collapse" aria-expanded="false">
                                            <span class="pull-right dropdown-toggle">
                                                <i class="dropdown-caret"></i>
                                            </span>
                                            <p class="mnp-name">Aaron Chavez</p>
                                            <span class="mnp-desc">aaron.cha@themeon.net</span>
                                        </a>
                                    </div>
                                    <div id="profile-nav" class="collapse list-group bg-trans">
                                        <a href="forms-general.html#" class="list-group-item">
                                            <i class="demo-pli-male icon-lg icon-fw"></i> View Profile
                                        </a>
                                        <a href="forms-general.html#" class="list-group-item">
                                            <i class="demo-pli-gear icon-lg icon-fw"></i> Settings
                                        </a>
                                        <a href="forms-general.html#" class="list-group-item">
                                            <i class="demo-pli-information icon-lg icon-fw"></i> Help
                                        </a>
                                        <a href="forms-general.html#" class="list-group-item">
                                            <i class="demo-pli-unlock icon-lg icon-fw"></i> Logout
                                        </a>
                                    </div>
                                </div>


                                <!--Shortcut buttons-->
                                <!--================================-->
                                <div id="mainnav-shortcut" class="hidden">
                                    <ul class="list-unstyled shortcut-wrap">
                                        <li class="col-xs-3" data-content="My Profile">
                                            <a class="shortcut-grid" href="forms-general.html#">
                                                <div class="icon-wrap icon-wrap-sm icon-circle bg-mint">
                                                <i class="demo-pli-male"></i>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="col-xs-3" data-content="Messages">
                                            <a class="shortcut-grid" href="forms-general.html#">
                                                <div class="icon-wrap icon-wrap-sm icon-circle bg-warning">
                                                <i class="demo-pli-speech-bubble-3"></i>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="col-xs-3" data-content="Activity">
                                            <a class="shortcut-grid" href="forms-general.html#">
                                                <div class="icon-wrap icon-wrap-sm icon-circle bg-success">
                                                <i class="demo-pli-thunder"></i>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="col-xs-3" data-content="Lock Screen">
                                            <a class="shortcut-grid" href="forms-general.html#">
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
						            <li>
						                <a href="forms-general.html#">
						                    <i class="demo-pli-home"></i>
						                    <span class="menu-title">Dashboard</span>
											<i class="arrow"></i>
						                </a>

						                <!--Submenu-->
						                <ul class="collapse">
						                    <li><a href="index.html">Dashboard 1</a></li>
											<li><a href="dashboard-2.html">Dashboard 2</a></li>
											<li><a href="dashboard-3.html">Dashboard 3</a></li>

						                </ul>
						            </li>

						            <!--Menu list item-->
						            <li>
						                <a href="forms-general.html#">
						                    <i class="demo-pli-split-vertical-2"></i>
						                    <span class="menu-title">Layouts</span>
											<i class="arrow"></i>
						                </a>

						                <!--Submenu-->
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
						            </li>

						            <!--Menu list item-->
						            <li>
						                <a href="widgets.html">
						                    <i class="demo-pli-gear"></i>
						                    <span class="menu-title">
												Widgets
												<span class="pull-right badge badge-warning">24</span>
											</span>
						                </a>
						            </li>

						            <li class="list-divider"></li>

						            <!--Category name-->
						            <li class="list-header">Components</li>

						            <!--Menu list item-->
						            <li>
						                <a href="forms-general.html#">
						                    <i class="demo-pli-boot-2"></i>
						                    <span class="menu-title">UI Elements</span>
											<i class="arrow"></i>
						                </a>

						                <!--Submenu-->
						                <ul class="collapse">
						                    <li><a href="ui-buttons.html">Buttons</a></li>
											<li><a href="ui-panels.html">Panels</a></li>
											<li><a href="ui-modals.html">Modals</a></li>
											<li><a href="ui-progress-bars.html">Progress bars</a></li>
											<li><a href="ui-components.html">Components</a></li>
											<li><a href="ui-typography.html">Typography</a></li>
											<li><a href="ui-list-group.html">List Group</a></li>
											<li><a href="ui-tabs-accordions.html">Tabs &amp; Accordions</a></li>
											<li><a href="ui-alerts-tooltips.html">Alerts &amp; Tooltips</a></li>

						                </ul>
						            </li>

						            <!--Menu list item-->
						            <li class="active-sub">
						                <a href="forms-general.html#">
						                    <i class="demo-pli-pen-5"></i>
						                    <span class="menu-title">Forms</span>
											<i class="arrow"></i>
						                </a>

						                <!--Submenu-->
						                <ul class="collapse in">
						                    <li class="active-link"><a href="forms-general.html">General</a></li>
											<li><a href="forms-components.html">Advanced Components</a></li>
											<li><a href="forms-validation.html">Validation</a></li>
											<li><a href="forms-wizard.html">Wizard</a></li>
											<li><a href="forms-file-upload.html">File Upload</a></li>
											<li><a href="forms-text-editor.html">Text Editor</a></li>
											<li><a href="forms-markdown.html">Markdown</a></li>

						                </ul>
						            </li>

						            <!--Menu list item-->
						            <li>
						                <a href="forms-general.html#">
						                    <i class="demo-pli-receipt-4"></i>
						                    <span class="menu-title">Tables</span>
											<i class="arrow"></i>
						                </a>

						                <!--Submenu-->
						                <ul class="collapse">
						                    <li><a href="tables-static.html">Static Tables</a></li>
											<li><a href="tables-bootstrap.html">Bootstrap Tables</a></li>
											<li><a href="tables-datatable.html">Data Tables</a></li>
											<li><a href="tables-footable.html">Foo Tables</a></li>

						                </ul>
						            </li>

						            <!--Menu list item-->
						            <li>
						                <a href="forms-general.html#">
						                    <i class="demo-pli-bar-chart"></i>
						                    <span class="menu-title">Charts</span>
											<i class="arrow"></i>
						                </a>

						                <!--Submenu-->
						                <ul class="collapse">
						                    <li><a href="charts-morris-js.html">Morris JS</a></li>
											<li><a href="charts-flot-charts.html">Flot Charts</a></li>
											<li><a href="charts-easy-pie-charts.html">Easy Pie Charts</a></li>
											<li><a href="charts-sparklines.html">Sparklines</a></li>

						                </ul>
						            </li>

						            <!--Menu list item-->
						            <li>
						                <a href="forms-general.html#">
						                    <i class="demo-pli-repair"></i>
						                    <span class="menu-title">Miscellaneous</span>
											<i class="arrow"></i>
						                </a>

						                <!--Submenu-->
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
						            </li>

						            <!--Menu list item-->
						            <li>
						                <a href="forms-general.html#">
						                    <i class="demo-pli-warning-window"></i>
						                    <span class="menu-title">Grid System</span>
											<i class="arrow"></i>
						                </a>

						                <!--Submenu-->
						                <ul class="collapse">
						                    <li><a href="grid-bootstrap.html">Bootstrap Grid</a></li>
											<li><a href="grid-liquid-fixed.html">Liquid Fixed</a></li>
											<li><a href="grid-match-height.html">Match Height</a></li>
											<li><a href="grid-masonry.html">Masonry</a></li>

						                </ul>
						            </li>

						            <li class="list-divider"></li>

						            <!--Category name-->
						            <li class="list-header">More</li>

						            <!--Menu list item-->
						            <li>
						                <a href="forms-general.html#">
						                    <i class="demo-pli-computer-secure"></i>
						                    <span class="menu-title">App Views</span>
											<i class="arrow"></i>
						                </a>

						                <!--Submenu-->
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
						            </li>

						            <!--Menu list item-->
						            <li>
						                <a href="forms-general.html#">
						                    <i class="demo-pli-speech-bubble-5"></i>
						                    <span class="menu-title">Blog Apps</span>
											<i class="arrow"></i>
						                </a>

						                <!--Submenu-->
						                <ul class="collapse">
						                    <li><a href="blog.html">Blog</a></li>
											<li><a href="blog-list.html">Blog List</a></li>
											<li><a href="blog-list-2.html">Blog List 2</a></li>
											<li><a href="blog-details.html">Blog Details</a></li>
											<li class="list-divider"></li>
											<li><a href="blog-manage-posts.html">Manage Posts</a></li>
											<li><a href="blog-add-edit-post.html">Add Edit Post</a></li>

						                </ul>
						            </li>

						            <!--Menu list item-->
						            <li>
						                <a href="forms-general.html#">
						                    <i class="demo-pli-mail"></i>
						                    <span class="menu-title">Email</span>
											<i class="arrow"></i>
						                </a>

						                <!--Submenu-->
						                <ul class="collapse">
						                    <li><a href="mailbox.html">Inbox</a></li>
											<li><a href="mailbox-message.html">View Message</a></li>
											<li><a href="mailbox-compose.html">Compose Message</a></li>
											<li><a href="mailbox-templates.html">Email Templates</a></li>

						                </ul>
						            </li>

						            <!--Menu list item-->
						            <li>
						                <a href="forms-general.html#">
						                    <i class="demo-pli-file-html"></i>
						                    <span class="menu-title">Other Pages</span>
											<i class="arrow"></i>
						                </a>

						                <!--Submenu-->
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
						            </li>

						            <!--Menu list item-->
						            <li>
						                <a href="forms-general.html#">
						                    <i class="demo-pli-photo-2"></i>
						                    <span class="menu-title">Gallery</span>
											<i class="arrow"></i>
						                </a>

						                <!--Submenu-->
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
						            </li>


                                    <!--Menu list item-->
                                    <li>
                                        <a href="forms-general.html#">
                                            <i class="demo-pli-tactic"></i>
                                            <span class="menu-title">Menu Level</span>
                                            <i class="arrow"></i>
                                        </a>

                                        <!--Submenu-->
                                        <ul class="collapse">
                                            <li><a href="forms-general.html#">Second Level Item</a></li>
                                            <li><a href="forms-general.html#">Second Level Item</a></li>
                                            <li><a href="forms-general.html#">Second Level Item</a></li>
                                            <li class="list-divider"></li>
                                            <li>
                                                <a href="forms-general.html#">Third Level<i class="arrow"></i></a>

                                                <!--Submenu-->
                                                <ul class="collapse">
                                                    <li><a href="forms-general.html#">Third Level Item</a></li>
                                                    <li><a href="forms-general.html#">Third Level Item</a></li>
                                                    <li><a href="forms-general.html#">Third Level Item</a></li>
                                                    <li><a href="forms-general.html#">Third Level Item</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="forms-general.html#">Third Level<i class="arrow"></i></a>

                                                <!--Submenu-->
                                                <ul class="collapse">
                                                    <li><a href="forms-general.html#">Third Level Item</a></li>
                                                    <li><a href="forms-general.html#">Third Level Item</a></li>
                                                    <li class="list-divider"></li>
                                                    <li><a href="forms-general.html#">Third Level Item</a></li>
                                                    <li><a href="forms-general.html#">Third Level Item</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>


						            <li class="list-divider"></li>

						            <!--Category name-->
						            <li class="list-header">Extras</li>

						            <!--Menu list item-->
						            <li>
						                <a href="forms-general.html#">
						                    <i class="demo-pli-happy"></i>
						                    <span class="menu-title">Icons Pack</span>
											<i class="arrow"></i>
						                </a>

						                <!--Submenu-->
						                <ul class="collapse">
						                    <li><a href="icons-ionicons.html">Ion Icons</a></li>
											<li><a href="icons-themify.html">Themify</a></li>
											<li><a href="icons-font-awesome.html">Font Awesome</a></li>
											<li><a href="icons-flagicons.html">Flag Icon CSS</a></li>
											<li><a href="icons-weather-icons.html">Weather Icons</a></li>

						                </ul>
						            </li>

						            <!--Menu list item-->
						            <li>
						                <a href="forms-general.html#">
						                    <i class="demo-pli-medal-2"></i>
						                    <span class="menu-title">
												PREMIUM ICONS
												<span class="label label-danger pull-right">BEST</span>
											</span>
						                </a>

						                <!--Submenu-->
						                <ul class="collapse">
						                    <li><a href="premium-line-icons.html">Line Icons Pack</a></li>
											<li><a href="premium-solid-icons.html">Solid Icons Pack</a></li>

						                </ul>
						            </li>

						            <!--Menu list item-->
						            <li>
						                <a href="helper-classes.html">
						                    <i class="demo-pli-inbox-full"></i>
						                    <span class="menu-title">Helper Classes</span>
						                </a>
						            </li>                                </ul>


                                <!--Widget-->
                                <!--================================-->
                                <div class="mainnav-widget">

                                    <!-- Show the button on collapsed navigation -->
                                    <div class="show-small">
                                        <a href="forms-general.html#" data-toggle="menu-widget" data-target="#demo-wg-server">
                                            <i class="demo-pli-monitor-2"></i>
                                        </a>
                                    </div>

                                    <!-- Hide the content on collapsed navigation -->
                                    <div id="demo-wg-server" class="hide-small mainnav-widget-content">
                                        <ul class="list-group">
                                            <li class="list-header pad-no mar-ver">Server Status</li>
                                            <li class="mar-btm">
                                                <span class="label label-primary pull-right">15%</span>
                                                <p>CPU Usage</p>
                                                <div class="progress progress-sm">
                                                    <div class="progress-bar progress-bar-primary" style="width: 15%;">
                                                        <span class="sr-only">15%</span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="mar-btm">
                                                <span class="label label-purple pull-right">75%</span>
                                                <p>Bandwidth</p>
                                                <div class="progress progress-sm">
                                                    <div class="progress-bar progress-bar-purple" style="width: 75%;">
                                                        <span class="sr-only">75%</span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="pad-ver"><a href="forms-general.html#" class="btn btn-success btn-bock">View Details</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <!--================================-->
                                <!--End widget-->

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
                You have <a href="forms-general.html#" class="text-main"><span class="badge badge-danger">3</span> pending action.</a>
            </div>



            <!-- Visible when footer positions are static -->
            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
            <div class="hide-fixed pull-right pad-rgt">
                14GB of <strong>512GB</strong> Free.
            </div>



            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
            <!-- Remove the class "show-fixed" and "hide-fixed" to make the content always appears. -->
            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->

            <p class="pad-lft">&#0169; 2017 Your Company</p>



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
    <script src="js/jquery.min.js"></script>


    <!--BootstrapJS [ RECOMMENDED ]-->
    <script src="js/bootstrap.min.js"></script>


    <!--NiftyJS [ RECOMMENDED ]-->
    <script src="js/nifty.min.js"></script>




    <!--=================================================-->

    <!--Demo script [ DEMONSTRATION ]-->
    <script src="js/demo/nifty-demo.min.js"></script>




</body>
</html>
