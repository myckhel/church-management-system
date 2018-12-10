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
        <div class="panel" style="background-color: #e8ddd3;">
            <div class="panel-heading">
                <h3 class="panel-title">List of Members In {{\Auth::user()->branchname}}</h3>
            </div>
            @if (session('status'))

            <div class="col-lg-10 col-lg-offset-2">

                          <div class="alert alert-success">
                              {{ session('status') }}
                          </div>
                      @endif
                      @if (count($errors) > 0)
                          @foreach ($errors->all() as $error)

                              <div class="alert alert-danger">{{ $error }}</div>

                          @endforeach

                          </div>
                      @endif
            <div class="panel-body">
                <div class="row">
                  <div class="col-md-6">
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
                  <h3 class="panel-title"><strong>Last 10 <i>Years</i> Members</strong> Registration Report</h3>
              </div>
            <div class="panel-body">
              <table class="table" id="demo-dt-basic" class="table table-striped table-bordered datatable" cellspacing="0" width="100%">
                <thead class="bg-dark text-white">
                  <tr>
                    <th>Gender</th>
                    <?php $totalss = [];
                    $totals = []; $type = ['male', 'female'];
                    foreach ($type as $key => $value) {
                      $totalss[$value] = 0;
                    }
                    foreach ($years as $key => $value) { $totals[$value] = 0; ?>
                    <th>{{$value}}</th>
                    <?php } ?>
                    <th>Total</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($type as $t)
                <tr>
                  <th>{{ucwords($t)}}</th>
                  @foreach($years as $key => $value)
                  <?php $found = false; ?>
                    @foreach($r_years as $k => $v)
                    <?php if($v->year == $value){
                      $found = true; if($v->$t){
                        $totals[$value] += ($v->$t) ? $v->$t : 0;
                        $totalss[$t] += ($v->$t) ? $v->$t : 0;
                        echo '<td>'.$v->$t.'</td>';}else{echo '<td>0</td>';
                        }
                    } ?>
                    @endforeach
                    @if(!$found)
                    <td>No Record</td>
                    @endif
                    @endforeach
                    <td class="bg-warning">{{$totalss[$t]}}</td>
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
                    <th><?php $q = 0; foreach($totalss as $plus => $v){$q += $v;} echo $q;?></th>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>

        <!--INDIVIDUAL -->
        <div class="col-md-12 col-md-offset-0" style="margin-bottom:20px">
          <div class="panel" style="background-color: #e8ddd3; overflow:scroll">
              <div class="panel-heading">
                  <h3 class="panel-title"><strong>Last 10 <i>Years</i> Members</strong> Registration Report</h3>
              </div>
            <div class="panel-body">
              <table id="demo-dt-basic" class="table table-striped table-bordered datatable" cellspacing="0" width="100%">
                <thead class="bg-dark text-white">
                  <tr>
                    <th>Branch</th>
                    <th>Gender</th>
                    <?php $totalss = [[]];
                    $totals = []; $type = ['male', 'female'];
                    $i = 0;
                    foreach($i_years as $branch => $v){
                      foreach ($type as $key => $value) {
                        $totalss[$v->name][$value] = 0;
                      }
                      $i++;
                    }
                    foreach ($years as $key => $value) { $totals[$value] = 0; ?>
                    <th>{{$value}}</th>
                    <?php } ?>
                    <th>Total</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($i_years as $k => $v)
                  @foreach($type as $t)
                <tr>
                  <th>{{$v->name}}</th>
                  <th>{{ucwords($t)}}</th>
                  @foreach($years as $key => $value)
                  <?php $found = false; ?>
                    <?php
                    if($v->year == $value){
                      $found = true; if($v->$t){
                        $totals[$value] += ($v->$t) ? $v->$t : 0;
                        $totalss[$v->name][$t] += ($v->$t) ? $v->$t : 0;
                        echo '<td>'.$v->$t.'</td>';}else{echo '<td>0</td>';
                        }
                    } ?>
                    @if(!$found)
                    <td>No Record</td>
                    @endif
                    @endforeach
                    <td class="bg-warning"><?php echo $totalss[$v->name][$t]; ?></td>
                  </tr>
                  @endforeach
                  @endforeach
                    <!--th scope="row">3</th-->
                </tbody>
                <tfoot class="bg-success text-white">
                  <tr>
                    <th>###</th>
                    <th>Total</th>
                    <?php foreach ($totals as $key => $value) { ?>
                    <th>{{$value}}</th>
                    <?php } ?>
                    <th><?php $q = 0;
                      foreach($totalss as $bra => $v){
                        foreach($v as $s){
                            $q += $s;
                          }
                      }
                      echo $q;
                      ?></th>
                  </tr>
                </tfoot>
              </table>

              <br><br>
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
