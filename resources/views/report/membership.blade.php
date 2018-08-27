@extends('layouts.app')

@section('title') All Members report @endsection

@section('content')
<!--CONTENT CONTAINER-->
<!--===================================================-->
<div id="content-container">
    <div id="page-head">

        <!--Page Title-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <div id="page-title">
            <h1 class="page-header text-overflow">Membership</h1>
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
                <a href="{{route('members.all')}}">Members</a>
            </li>
            <li class="active">Report</li>
        </ol>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--End breadcrumb-->

    </div>


    <!--Page content-->
    <!--===================================================-->
    <div id="page-content">



        <!-- Basic Data Tables -->
        <!--===================================================-->
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">List of Members In {{\Auth::user()->branchname}}</h3>
            </div>
            <div class="col-lg-10 col-lg-offset-2">
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
            <div class="panel-body">
                <div class="row">
                  <div class="col-lg-3">
                    <ul class="list-group">
                      <?php $count=1;?>
                      @foreach($reports as $report)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                          Total No Of All members
                          <span class="badge badge-primary badge-pill">{{($report->total_member)}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                          Total No Of All Male Members
                          <span class="badge badge-primary badge-pill">{{$report->male}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                          Total No Of All Female Members
                          <span class="badge badge-primary badge-pill">{{$report->female}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                          Total No Of All Single Members
                          <span class="badge badge-primary badge-pill">{{$report->single}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                          Total No Of All Married Members
                          <span class="badge badge-primary badge-pill">{{$report->married}}</span>
                        </li>
                      <?php $count++;?>
                      @endforeach
                    </ul>
                  </div>
                </div>
            </div>
        </div>
        <!--===================================================-->
        <!-- End Striped Table -->


    </div>
    <!--===================================================-->
    <!--End page content-->

</div>
<!--===================================================-->
<!--END CONTENT CONTAINER-->
@endsection
