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
            <?php $name = \Auth::user()->getName() . ' ' .\Auth::user()->branchcode; ?>
            <div class="col-md-8 col-md-offset-2" style="margin-bottom:20px">
              <div class="panel" style="background-color: #e8ddd3;">
                  <div class="panel-heading">
                      <h3 class="panel-title"><strong>{{$name}} Attendance</strong> Report</h3>
                  </div>
                <div class="panel-body">
                  <table class="table text-center">
                    <thead class="bg-warning text-center">
                      <tr><th colspan="3" class="bg-light text-center">{{$name}} Attendance Report </th></tr>
                      <tr>
                        <th>

                        </th>
                        <th class="text-center">
                          Till Date
                        </th>
                        <th class="text-center">
                          Today's
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th>
                          Total
                        </th>
                        <td>
                          <span class="badge badge-primary badge-pill">{{number_format($reports->total_attendance ? $reports->total_attendance : 0)}}</span>
                        </td>
                        <td>
                          <span class="badge badge-primary badge-pill">{{number_format($reports->todays_attendance ? $reports->todays_attendance : 0)}}</span>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

            <div class="col-md-8 col-md-offset-2" style="margin-bottom:20px">
              <div class="panel" style="background-color: #e8ddd3;">
                  <div class="panel-heading">
                      <h3 class="panel-title"><strong>Total Attendance By Type</strong></h3>
                  </div>
                <div class="panel-body">
                  <table class="table text-center">
                    <thead class="bg-warning text-center">
                      <tr>
                        <th class="text-center">
                          Type
                        </th>
                        <th class="text-center">
                          Till Date
                        </th>
                        <th class="text-center">
                          Today's
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th>
                          Male
                        </th>
                        <td>
                          <span class="badge badge-primary badge-pill">{{number_format($reports->male)}}</span>
                        </td>
                        <td>
                          <span class="badge badge-primary badge-pill">{{number_format($reports->malet)}}</span>
                        </td>
                      </tr>
                      <tr>
                        <th>
                          Female
                        </th>
                        <td>
                          <span class="badge badge-primary badge-pill">{{number_format($reports->female)}}</span>
                        </td>
                        <td>
                          <span class="badge badge-primary badge-pill">{{number_format($reports->femalet)}}</span>
                        </td>
                      </tr>
                      <tr>
                        <th>
                          Children
                        </th>
                        <td>
                          <span class="badge badge-primary badge-pill">{{number_format($reports->children)}}</span>
                        </td>
                        <td>
                          <span class="badge badge-primary badge-pill">{{number_format($reports->childrent)}}</span>
                        </td>
                      </tr>
                    </tbody>
                    <tfoot class="bg-success">
                      <tr>
                        <th>
                          Total
                        </th>
                        <td>
                          <span class="badge badge-primary badge-pill">{{number_format($reports->total)}}</span>
                        </td>
                        <td>
                          <span class="badge badge-primary badge-pill">{{number_format($reports->totalt)}}</span>
                        </td>
                      </tr>
                    </tfoot>
                  </table>
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
              <div class="panel" style="background-color: #e8ddd3; overflow:scroll">
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
              <div class="panel" style="background-color: #e8ddd3;">
                  <div class="panel-heading">
                      <h3 class="panel-title"><strong>Total attendance <i>By</i> Members Till Date</strong></h3>
                  </div>
                <div class="panel-body">
                  <table class="table text-center">
                    <thead class="bg-warning text-center">
                      <tr><th colspan="3" class="bg-light text-center">Member</th></tr>
                      <tr>
                        <th class="text-center">
                          Name
                        </th>
                        <th class="text-center">
                          Till Date
                        </th>
                        <th class="text-center">
                          Today's
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $total = 0; $totalt = 0;?>
                      @foreach ($m_r as $mc)
                      <?php $total += $mc->total; $totalt += $mc->totalt; ?>
                      <tr>
                        <th>
                          {{$mc->firstname}} {{$mc->lastname}}
                        </th>
                        <td>
                          <span class="badge badge-primary badge-pill">{{number_format($mc->total)}}</span>
                        </td>
                        <td>
                          <span class="badge badge-primary badge-pill">{{number_format($mc->totalt)}}</span>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                    <tfoot class="bg-success">
                      <tr>
                        <th>
                          Total
                        </th>
                        <td>
                          <span class="badge badge-primary badge-pill">{{number_format($total)}}</span>
                        </td>
                        <td>
                          <span class="badge badge-primary badge-pill">{{number_format($totalt)}}</span>
                        </td>
                      </tr>
                    </tfoot>
                  </table>
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
