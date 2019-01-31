@extends('layouts.app')

@section('title') All Branches Collection Report @endsection

@section('content')
<?php
function issetor(&$var, $default = false) {
    return isset($var) ? $var : $default;
} ?>
<!--CONTENT CONTAINER-->
<!--===================================================-->
<div id="content-container">
  <div id="page-head">
      <!--Page Title-->
      <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
      <div id="page-title">
          <h1 class="page-header text-overflow">Collections Report</h1>
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
          <li class="active">Collections</li>
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
        <?php $currency = \Auth::user()->getCurrencySymbol()->currency_symbol; ?>
        <div class="col-md-8 col-md-offset-2" style="margin-bottom:20px">
          <div class="panel" style="background-color: #e8ddd3;">
              <div class="panel-heading">
                  <h3 class="panel-title"><strong>All Branches Collections Report</strong></h3>
              </div>
            <div class="panel-body">
              <table class="table text-center">
                <thead class="bg-warning text-center">
                  <tr><th colspan="3" class="bg-light text-center">Total Collections </th></tr>
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
                      Total Amount Collected
                    </th>
                    <td>
                      <span class="badge badge-primary badge-pill">{{$currency}} {{number_format($reports->collections['total'])}}</span>
                    </td>
                    <td>
                      <span class="badge badge-primary badge-pill">{{$currency}} {{number_format($reports->collections['today'])}}</span>
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
                  <h3 class="panel-title"><strong>Total Collection By Type</strong></h3>
              </div>
            <div class="panel-body">
              <table class="table text-center">
                <thead class="bg-warning text-center">
                  <tr>
                    <th class="text-center">
                      Collections Type
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
                  @foreach($c_types as $collect)
                  <tr>
                    <th>
                      {{$collect->disFormatString()}}
                    </th>
                    <td>
                      <?php $name = $collect->name; ?>
                      <span class="badge badge-primary badge-pill">{{$currency}} {{number_format(issetor($reports->collections[$name]['total']))}}</span>
                    </td>
                    <td>
                      <span class="badge badge-primary badge-pill">{{$currency}} {{number_format(issetor($reports->collections[$name]['today']))}}</span>
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
                      <span class="badge badge-primary badge-pill">{{$currency}} {{number_format($reports->collections['total'])}}</span>
                    </td>
                    <td>
                      <span class="badge badge-primary badge-pill">{{$currency}} {{number_format($reports->collections['today'])}}</span>
                    </td>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
        <?php $years = []; $CcolumnTotals = [];
          foreach ($c_types as $key => $value) {
            $totalss[$value->name] = 0;
          }
          $i = 9;
          while ($i >= 0) {
            $years[$i] = date('Y', strtotime("-$i year")); //1 year ago
            $i--;
          } ?>
        <div class="col-md-12 col-md-offset-0" style="margin-bottom:20px">
          <div class="panel" style="background-color: #e8ddd3; overflow:scroll">
              <div class="panel-heading">
                  <h3 class="panel-title"><strong>Last 10 <i>Years</i> Collection</strong> Report</h3>
              </div>
            <div class="panel-body">
              <table id="demo-dt-basic" class="table table-striped table-bordered datatable" cellspacing="0" width="100%">
                <thead class="bg-dark text-white">
                  <tr>
                    <th>Type</th>
                    @foreach ($years as $key => $value)
                    <th>{{$value}}</th>
                    @endforeach
                    <th>Year Total</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($c_types as $type)
                <tr>
                  <th>{{ucwords($type->disFormatString())}}</th>
                  @foreach($years as $key => $year)
                  <?php $typeName = $type->name; ?>
                    @if(isset($c_years->$typeName->$year))
                      <?php if(isset($ColumnTotals[$year])) { $ColumnTotals[$year] += $c_years->$typeName->$year; } else {
                        $ColumnTotals[$year] = $c_years->$typeName->$year;
                      }
                      if(isset($totalss[$typeName])) { $totalss[$typeName] += $c_years->$typeName->$year; } else {
                        $totalss[$typeName] = $c_years->$typeName->$year;
                      }
                      echo '<td>'.$currency.number_format($c_years->$typeName->$year).'</td>'; ?>
                    @else
                    <td>No Record</td>
                    @endif
                  @endforeach
                  <th>{{$currency.''.number_format($totalss[$type->name])}}</th>
                  <!-- <td>0</td> -->
                  </tr>
                @endforeach
                    <!--th scope="row">3</th-->
                </tbody>
                <tfoot class="bg-success text-white">
                  <tr>
                    <th>Total</th>
                    <?php
                    foreach ($years as $key => $year) {
                      $total = isset($ColumnTotals[$year]) ? $currency.number_format($ColumnTotals[$year]) : '0';
                      echo "<th>$total</th>";
                    } ?>
                    <th><?php $q = 0; foreach($totalss as $plus => $v){$q += $v;} echo $currency.number_format($q);?></th>
                    <!-- <td>0</td> -->
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>

        <div class="col-md-8 col-md-offset-2" style="margin-bottom:20px">
          <div class="panel" style="background-color: #e8ddd3;">
              <div class="panel-heading">
                  <h3 class="panel-title"><strong>Total Branches Collections</strong></h3>
              </div>
            <div class="panel-body">
              <table class="table text-center">
                <thead class="bg-warning text-center">
                  <tr>
                    <th class="text-center">
                      Branch Name
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
                  <?php $totalTotal = 0; $todayTotal = 0;?>
                  @foreach ($branchesName as $key => $nameObj)
                  <?php $name = $nameObj->branchname; $total = isset($reports->branch_collections[$name]) ? $reports->branch_collections[$name]['total'] : 0;
                    $today = isset($reports->branch_collections[$name]['today']) ? $reports->branch_collections[$name]['today'] : 0;
                    $totalTotal += isset($reports->branch_collections[$name]) ? $reports->branch_collections[$name]['total'] : 0;
                    $todayTotal += isset($reports->branch_collections[$name]) ? $reports->branch_collections[$name]['today'] : 0;
                  ?>
                  <tr>
                    <th>
                       {{$name}}
                    </th>
                    <td>
                      <span class="badge badge-primary badge-pill">{{$currency}} {{number_format($total)}}</span>
                    </td>
                    <td>
                      <span class="badge badge-primary badge-pill">{{$currency}} {{number_format($today)}}</span>
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
                      <span class="badge badge-primary badge-pill">{{$currency}} {{number_format($totalTotal)}}</span>
                    </td>
                    <td>
                      <span class="badge badge-primary badge-pill">{{$currency}} {{number_format($todayTotal)}}</span>
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
