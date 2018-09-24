@extends('layouts.app')

@section('title') {{\Auth::user()->branchname}}{{\Auth::user()->branchcode}}: Attendance Report @endsection

@section('content')
<?php

// extract addedVariables value to variable
if (isset($addedVariables)) extract($addedVariables);

?>
<!--CONTENT CONTAINER-->
<!--===================================================-->
<style>
li {
    display: inline;
}
/* Dropdown Button */
.dropbtn {
    background-color: #4CAF50;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
    position: relative;
    display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f1f1f1;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #ddd;}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {display: block;}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {background-color: #3e8e41;}
</style>
<div id="content-container">
    <div id="page-head">

        <!--Page Title-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <div id="page-title">
            <h1 class="page-header text-overflow">Attendance</h1>
        </div>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--End page title-->


        <!--Breadcrumb-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <ol class="breadcrumb">
          <li>
              <i class="fa fa-home"></i><a href="{{route('dashboard')}}"> Dashboard</a>
          </li>
            <li class="active">All</li>
        </ol>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--End breadcrumb-->

    </div>


    <!--Page content-->
    <!--===================================================-->
    <div id="page-content">
        <div class="row">
            <div class="col-md-6 col-md-offset-3"  >
                @if (session('status'))

                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                @if (count($errors) > 0)
                    @foreach ($errors->all() as $error)

                        <div class="alert alert-danger">{{ $error }}</div>

                    @endforeach

                @endif
            </div>
            <div class="col-sm-6 col-sm-offset-3" style="margin-bottom:<?php
            echo (isset($formatted_date)) ? '30' : '60';
            ?>px">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">View Attendance for <strong>{{\Auth::user()->branchname}} <i>{{\Auth::user()->branchcode}}</i></strong></h3>

                    </div>

                    <!--Block Styled Form -->
                    <!--===================================================-->
                    <form method="POST" action="{{route('attendance.view')}}">
                        @csrf
                        <input name="branch_id" value="3" type="text" hidden="hidden"/>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">Choose Specific Date</label>
                                        <input type="date" value="<?php if (isset($request_date)) echo $request_date;?>" name="date" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer text-right">
                            <button class="btn btn-success" type="submit">VIEW ATTENDANCE</button>
                        </div>
                    </form>
                    <!--===================================================-->
                    <!--End Block Styled Form -->

                </div>

            </div>
            <?php if (!isset($addedVariables)){ ?>
            <div class="col-md-offset-1 col-md-10" style="margin-bottom:50px">
                <div class="panel">
                <div class="panel-body text-center clearfix" style="overflow:scroll">
                  <table id="demo-dt-basic" class="table table-striped table-bordered datatable" cellspacing="0" width="100%" >
                <thead>
                    <tr>
                        <th>S/N</th>
                        <th class="min-tablet">Service type</th>
                        <th class="min-tablet">Men</th>
                        <th class="min-tablet">Women</th>
                        <th class="min-tablet">Children</th>
                        <th class="min-tablet">Total</th>
                        <th class="min-tablet">Date</th>
                        <th class="min-tablet">Day</th>
                        <th class="min-tablet">Month</th>
                        <th class="min-tablet">Year</th>
                        <th class="min-desktop">Action</th>
                    </tr>
                </thead>
                <tbody>
                  <?php $count=1;?>
                  <h1>Branch Attendance History<h1>
                    @foreach($attendance as $list)
                    <?php
                      $date = $list->attendance_date;
                      $d = date("F,Y,D", strtotime($date));
                      $p = explode(',',$d);
                    ?>
                    <tr>
                        <td><strong>{{$count}}</strong></td>
                        <td>{{$list->service_type}}</td>
                        <td>{{$list->male}}</td>
                        <td>{{$list->female}}</td>
                        <td>{{$list->children}}</td>
                        <td>{{$list->male + $list->female + $list->children}}</td>
                        <td>{{$list->attendance_date}}</td>
                        <td>{{$p[2]}}</td>
                        <td>{{$p[0]}}</td>
                        <td>{{$p[1]}}</td>
                        <td><button id="{{$list->attendance_date}}" type="submit" class="btn btn-primary" onclick="view(this);">View</button></td>
                    </tr>
                    <?php $count++;?>
                    @endforeach
                </tbody>
            </table>
          </div>
          </div>
        </div>

      <?php }else{ ?>
            <div class="col-md-offset-3 col-md-6" style="margin-bottom:350px">
                <div class="panel">
                    <div class="panel-body text-center clearfix">
                        <div class="col-sm-4 pad-top">
                            <div class="text-lg">
                                <p class="text-5x text-thin text-main">{{$attendance->getTotal()}}</p>
                            </div>
                            <p class="text-sm text-bold text-uppercase">Total Attendance</p>
                        </div>
                        <div class="col-sm-8">
                            <!--<button class="btn btn-pink mar-ver">View Details</button>
                            <p class="text-xs">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>-->
                            <ul class="list-unstyled text-center bord-to pad-top mar-no row">
                                <li class="col-xs-4">
                                    <span class="text-lg text-semibold text-main">{{$attendance->male}}</span>
                                    <p class="text-sm text-muted mar-no">Men</p>
                                </li>
                                <li class="col-xs-4">
                                    <span class="text-lg text-semibold text-main">{{$attendance->female}}</span>
                                    <p class="text-sm text-muted mar-no">Women</p>
                                </li>
                                <li class="col-xs-4">
                                    <span class="text-lg text-semibold text-main">{{$attendance->children}}</span>
                                    <p class="text-sm text-muted mar-no">Children</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <a style="float:right;" href="{{route('attendance.view.form')}}" class="btn btn-success">View Attendance History</a>
            </div>
            <?php } ?>

            <!-- MEMBERS ATTENDANCE -->
            <?php if (!isset($addedVariables)){ ?>
            <div class="col-md-offset-1 col-md-10" style="margin-bottom:50px">
                <div class="panel">
                <div class="panel-body text-center clearfix" style="overflow:scroll">
            <table id="demo-dt-basic" class="table table-striped table-bordered datatable" cellspacing="0" width="100%" >
                <thead>
                    <tr>
                        <th>S/N</th>
                        <th class="min-tablet">Title</th>
                        <th class="min-tablet">First Name</th>
                        <th class="min-tablet">Last Name</th>
                        <th class="min-tablet">Attendance</th>
                        <th class="min-tablet">Service type</th>
                        <th class="min-tablet">Date</th>
                        <!--th class="min-desktop">Action</th-->
                    </tr>
                </thead>
                <tbody>
                  <?php $count=1;?>
                  <h1>Members Attendance History<h1>
                    @foreach($attendances as $li)
                    <?php
                      $date = $li->attendance_date;
                      $d = date("F,Y,D", strtotime($date));
                      $p = explode(',',$d);
                    ?>
                    <tr>
                        <td><strong>{{$count}}</strong></td>
                        <td>{{$li->title}}</td>
                        <td>{{$li->firstname}}</td>
                        <td>{{$li->lastname}}</td>
                        <td>{{$li->attendance}}</td>
                        <td>{{$li->service_type}}</td>
                        <td >{{$li->attendance_date}}</td>
                        <!--td><button id="{{$li->attendance_date}}" type="submit" class="btn btn-primary" onclick="view(this);">View</button></td-->
                    </tr>
                    <?php $count++;?>
                    @endforeach
                </tbody>
            </table>
          </div>
          </div>
        </div>
      <?php }?>
        </div>
    </div>
    <!--===================================================-->
    <!--End page content-->

</div>
<!--===================================================-->
<!--END CONTENT CONTAINER-->
@endsection
