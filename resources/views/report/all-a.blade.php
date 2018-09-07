@extends('layouts.app')

@section('title') Attendance Report @endsection

@section('content')
<!--CONTENT CONTAINER-->
<!--===================================================-->
<div id="content-container">
    <div id="page-head">

        <!--Page Title-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <div id="page-title">
            <h1 class="page-header text-overflow">Attendance Report</h1>
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
                <a href="{{route('attendance')}}">Reports</a>
            </li>
            <li class="active">Attendance</li>
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
            <div class="col-md-8 col-md-offset-2" style="margin-bottom:20px">
              <div class="panel">
                  <div class="panel-heading">
                      <h3 class="panel-title"><strong>Attendance <i>Report Counts</i></strong></h3>
                  </div>
                <div class="panel-body">
                  <ul>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      Total No Of All Attendance Till Date
                      <span class="badge badge-primary badge-pill">{{$reports[0]->total_attendance or 0}}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      Total No Of All Today's Attendance
                      <span class="badge badge-primary badge-pill">{{$reports[0]->todays_attendance or 0}}</span>
                    </li>
                  </ul>
                </div>
              </div>
            </div>

            <div class="col-md-8 col-md-offset-2" style="margin-bottom:20px">
              <div class="panel">
                  <div class="panel-heading">
                      <h3 class="panel-title"><strong>Total <i>attendance</i> By attendance Type Till Date</strong></h3>
                  </div>
                <div class="panel-body">
                  <ul>
                    <li class="bg-warning list-group-item d-flex justify-content-between align-items-center">
                      attendance Type
                      <span class="badge badge-primary badge-pill">attendance Type Total</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      Male
                      <span class="badge badge-primary badge-pill">{{($reports[0]->male)}}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      Female
                      <span class="badge badge-primary badge-pill">{{($reports[0]->female)}}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      Children
                      <span class="badge badge-primary badge-pill">{{($reports[0]->children)}}</span>
                    </li>
                    <li class="bg-success list-group-item d-flex justify-content-between align-items-center">
                      Total
                      <span class="badge badge-primary badge-pill">{{($reports[0]->total)}}</span>
                    </li>
                  </ul>
                </div>
              </div>
            </div>

            <div class="col-md-8 col-md-offset-2" style="margin-bottom:20px">
              <div class="panel">
                  <div class="panel-heading">
                      <h3 class="panel-title"><strong>Total Branches <i>By</i> attendance Till Date</strong></h3>
                  </div>
                <div class="panel-body">
                  <ul>
                    <li class="bg-warning list-group-item d-flex justify-content-between align-items-center">
                      Branch Name
                      <span class="badge badge-primary badge-pill">Branch Total</span>
                    </li>
                    <?php $total = 0; ?>
                    @foreach ($ad_rep as $ar)
                    <?php $total += ($ar->atotal + $ar->mtotal); ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      {{$ar->name}}
                      <span class="badge badge-primary badge-pill">{{($ar->atotal + $ar->mtotal)}}</span>
                    </li>
                    @endforeach
                    <li class="bg-success list-group-item d-flex justify-content-between align-items-center">
                      Total
                      <span class="badge badge-primary badge-pill">{{$total}}</span>
                    </li>
                  </ul>
                </div>
              </div>
            </div>

            <?php
            $years = [];
            $i = 9;
            while ($i >= 0) {

            $years[$i] = date('Y', strtotime("-$i year")); //1 week ago
            $i--;
            }
            ?>

            <div class="col-md-12 col-md-offset-0" style="margin-bottom:20px">
              <div class="panel">
                  <div class="panel-heading">
                      <h3 class="panel-title"><strong>Last 10 <i>Years</i> Attendance</strong> Report</h3>
                  </div>
                <div class="panel-body">
                  <table class="table" id="demo-dt-basic" class="table table-striped table-bordered datatable" cellspacing="0" width="100%">
                    <thead class="bg-dark text-white">
                      <tr>
                        <th>Type</th>
                        <?php $totals = []; $type = ['male', 'female', 'children']; foreach ($years as $key => $value) { $totals[$value] = 0; ?>
                        <th>{{$value}}</th>
                        <?php } ?>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($type as $t)
                    <tr>
                      <th>{{ucwords($t)}}</th>
                      @foreach($years as $key => $value)
                      <?php $found = false; ?>
                        @foreach($a_years as $k => $v)
                        <?php if($v->year == $value){
                          $found = true; if($v->$t){
                            $totals[$value] += ($v->$t) ? $v->$t : 0;
                            echo '<td>'.$v->$t.'</td>';}else{echo '<td>0</td>';
                            }
                        } ?>
                        @endforeach
                        @if(!$found)
                        <td>No Record</td>
                        @endif
                        @endforeach
                      </tr>
                      @endforeach
                        <!--th scope="row">3</th-->
                    </tbody>
                    <tfoot class="bg-success text-white">
                      <tr>
                        <th>Total</th>
                        <?php foreach ($totals as $key => $value) { ?>
                        <th>{{$value}}</th>
                        <?php } ?>
                      </tr>
                    </tfoot>
                  </table>
                </div>
              </div>
            </div>
            <div class="col-md-8 col-md-offset-2" style="margin-bottom:20px">
              <div class="panel">
                  <div class="panel-heading">
                      <h3 class="panel-title"><strong>Total attendance <i>By</i> Members Till Date</strong></h3>
                  </div>
                <div class="panel-body">
                  <ul>
                    <li class="bg-warning list-group-item d-flex justify-content-between align-items-center">
                      Member Name
                      <span class="badge badge-primary badge-pill">Member Total</span>
                    </li>
                    <?php $total = 0; ?>
                    @foreach ($m_r as $mc)
                    <?php $total += $mc->total; ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      {{$mc->fname}} {{$mc->lname}}
                      <span class="badge badge-primary badge-pill">{{$mc->total or 0}}</span>
                    </li>
                    @endforeach
                    <li class="bg-success list-group-item d-flex justify-content-between align-items-center">
                      Total
                      <span class="badge badge-primary badge-pill">{{$total}}</span>
                    </li>
                  </ul>
                </div>
              </div>
            </div>

        </div>
    </div>
    <!--===================================================-->
    <!--End page content-->
</div>
<!--===================================================-->
<!--END CONTENT CONTAINER-->
@endsection
