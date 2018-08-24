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
            <div class="panel-body" style="overflow:scroll">
                <!--div style="height:100px;border:1px solid green">
                Sort by Newest Members, Gender
              </div-->
                <table id="demo-dt-basic" class="table table-striped table-bordered datatable" cellspacing="0" width="100%" >
                    <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Total No Of All members</th>
                            <th>Total No Of All Male Members</th>
                            <th>Total No Of All Female Members</th>
                            <th>Total No Of All Single Members</th>
                            <th>Total No Of All Married Members</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $count=1;?>
                        @foreach($reports as $report)
                        <tr>
                            <th>{{$count}}</th>
                            <td>{{($report->total_member)}}</td>
                            <td>{{$report->male}}</td>
                            <td>{{$report->female}}</td>
                            <td>{{$report->single}}</td>
                            <td>{{$report->married}}</td>
                        </tr>
                        <?php $count++;?>
                        @endforeach

                    </tbody>
                </table>
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
