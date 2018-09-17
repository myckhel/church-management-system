@extends('layouts.app')

@section('title') All Branches Collection Report @endsection

@section('content')
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
              <div class="panel">
                  <div class="panel-heading">
                      <h3 class="panel-title"><strong>Collections <i>Report Counts</i> For</strong></h3>
                  </div>
                <div class="panel-body">
                  <ul>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      Total Amount of All Collections Till Date
                      <span class="badge badge-primary badge-pill">{{$currency}} {{number_format($reports[0]->total_collections)}}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      Total Amount Of Today's Collections
                      <span class="badge badge-primary badge-pill">{{$currency}} {{number_format($reports[0]->todays_collections)}}</span>
                    </li>
                  </ul>
                </div>
              </div>
            </div>

            <div class="col-md-8 col-md-offset-2" style="margin-bottom:20px">
              <div class="panel">
                  <div class="panel-heading">
                      <h3 class="panel-title"><strong>Total <i>Collections</i> By Collections Type Till Date</strong></h3>
                  </div>
                <div class="panel-body">
                  <ul>
                    <li class="bg-warning list-group-item d-flex justify-content-between align-items-center">
                      Collection Type
                      <span class="badge badge-primary badge-pill">Collection Type Total</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      Special Offering
                      <span class="badge badge-primary badge-pill">{{$currency}} {{number_format($reports[0]->so)}}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      Seed Offering
                      <span class="badge badge-primary badge-pill">{{$currency}} {{number_format($reports[0]->sdo)}}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      Offering
                      <span class="badge badge-primary badge-pill">{{$currency}} {{number_format($reports[0]->o)}}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      Donation
                      <span class="badge badge-primary badge-pill">{{$currency}} {{number_format($reports[0]->d)}}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      Tithe
                      <span class="badge badge-primary badge-pill">{{$currency}} {{number_format($reports[0]->t)}}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      First Fruit
                      <span class="badge badge-primary badge-pill">{{$currency}} {{number_format($reports[0]->ff)}}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      Covenant Seed
                      <span class="badge badge-primary badge-pill">{{$currency}} {{number_format($reports[0]->cs)}}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      Love Seed
                      <span class="badge badge-primary badge-pill">{{$currency}} {{number_format($reports[0]->ls)}}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      Sacrifice
                      <span class="badge badge-primary badge-pill">{{$currency}} {{number_format($reports[0]->s)}}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      Thanksgiving
                      <span class="badge badge-primary badge-pill">{{$currency}} {{number_format($reports[0]->tg)}}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      Thanksgiving Seed
                      <span class="badge badge-primary badge-pill">{{$currency}} {{number_format($reports[0]->tgs)}}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      Other
                      <span class="badge badge-primary badge-pill">{{$currency}} {{number_format($reports[0]->ot)}}</span>
                    </li>
                    <li class="bg-success list-group-item d-flex justify-content-between align-items-center">
                      Total
                      <span class="badge badge-primary badge-pill">{{$currency}} {{number_format($reports[0]->total_collections)}} <!--/span> ₦ {{number_format(($reports[0]->so + $reports[0]->sdo + $reports[0]->o + $reports[0]->d + $reports[0]->t + $reports[0]->ff + $reports[0]->cs + $reports[0]->ls + $reports[0]->s + $reports[0]->tg + $reports[0]->tgs + $reports[0]->ot))}}</span-->
                    </li>
                  </ul>
                </div>
              </div>
            </div>

            <div class="col-md-8 col-md-offset-2" style="margin-bottom:20px">
              <div class="panel">
                  <div class="panel-heading">
                      <h3 class="panel-title"><strong>Total Branches <i>By</i> Collections Till Date</strong></h3>
                  </div>
                <div class="panel-body">
                  <ul>
                    <li class="bg-warning list-group-item d-flex justify-content-between align-items-center">
                      Branch Name
                      <span class="badge badge-primary badge-pill">Branch Total</span>
                    </li>
                    <?php $total = 0; ?>
                    @foreach ($ad_rep as $ar)
                    <?php $total += ($ar->ctotal); ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      {{$ar->name}}
                      <span class="badge badge-primary badge-pill">{{$currency}} {{number_format($ar->ctotal)}}</span>
                    </li>
                    @endforeach
                    <li class="bg-success list-group-item d-flex justify-content-between align-items-center">
                      Total
                      <span class="badge badge-primary badge-pill">{{$currency}} {{number_format($total)}}</span>
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
                      <h3 class="panel-title"><strong>Last 10 <i>Years</i> Collection</strong> Report</h3>
                  </div>
                <div class="panel-body">
                  <table id="demo-dt-basic" class="table table-striped table-bordered datatable" cellspacing="0" width="100%">
                    <thead class="bg-dark text-white">
                      <tr>
                        <th>Type</th>
                        <?php  $totalss = [];
                        $totals = []; $type = ['tithe', 'offering', 'other'];
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
                        @foreach($c_years as $k => $v)
                        <?php if($v->year == $value){
                          $found = true;
                          if($v->$t){
                            $totals[$value] += ($v->$t) ? $v->$t : 0;
                            $totalss[$t] += ($v->$t) ? $v->$t : 0;
                            echo '<td>'.$currency.number_format($v->$t).'</td>';}else{echo $currency.'<td>0</td>';
                            }
                          } ?>
                        @endforeach
                        @if(!$found)
                        <td>No Record</td>
                        @endif
                        @endforeach
                        <th>{{$currency.''.number_format($totalss[$t])}}</th>
                      </tr>
                      @endforeach
                        <!--th scope="row">3</th-->
                    </tbody>
                    <tfoot class="bg-success text-white">
                      <tr>
                        <th>Total</th>
                        <?php foreach ($totals as $key => $value) { ?>
                        <th>{{$currency.number_format($value)}}</th>
                        <?php } ?>
                        <th><?php $q = 0; foreach($totalss as $plus => $v){$q += $v;} echo $currency.number_format($q);?></th>
                      </tr>
                    </tfoot>
                  </table>
                </div>
              </div>
            </div>

            <div class="col-md-8 col-md-offset-2" style="margin-bottom:20px">
              <div class="panel">
                  <div class="panel-heading">
                      <h3 class="panel-title"><strong>Total Collections <i>By</i> Members Till Date</strong></h3>
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
                      <span class="badge badge-primary badge-pill">{{$currency}} {{number_format($mc->total)}}</span>
                    </li>
                    @endforeach
                    <li class="bg-success list-group-item d-flex justify-content-between align-items-center">
                      Total
                      <span class="badge badge-primary badge-pill">{{$currency}} {{number_format($total)}}</span>
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
