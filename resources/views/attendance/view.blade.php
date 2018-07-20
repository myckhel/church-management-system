@extends('layouts.app')

@section('title') {{\Auth::user()->branchname}}{{\Auth::user()->branchcode}}: Attendance Report @endsection

@section('content')
<?php

// extract addedVariables value to variable
if (isset($addedVariables)) extract($addedVariables);

?>
<!--CONTENT CONTAINER-->
<!--===================================================-->
<div id="content-container">
    <div id="page-head">

        <!--Page Title-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <div id="page-title">
            <h1 class="page-header text-overflow">Member</h1>
        </div>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--End page title-->


        <!--Breadcrumb-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <ol class="breadcrumb">
            <li>
                <a href="forms-general.html#">
                    <i class="demo-pli-home"></i>
                </a>
            </li>
            <li>
                <a href="forms-general.html#">Members</a>
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
            echo (isset($formatted_date)) ? '30' : '460';
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
                                        <label class="control-label">Date</label>
                                        <input type="date" value="<?php if (isset($request_date)) echo $request_date;?>" name="date" class="form-control">
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
            <?php if (isset($addedVariables)){ ?>
            <div class="col-md-offset-3 col-md-6" style="margin-bottom:350px">
                <div class="panel">
                <div class="panel-heading">
                        <h3 class="panel-title"><strong>{{\Auth::user()->branchname}} <i>{{\Auth::user()->branchcode}}</i></strong>: Attendance Report for {{$date_in_words}}</h3>
                    </div>
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
            </div>
            <?php } ?>
                                
                               
        </div>
    </div>
    <!--===================================================-->
    <!--End page content-->

</div>
<!--===================================================-->
<!--END CONTENT CONTAINER-->
@endsection