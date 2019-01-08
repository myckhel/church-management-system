@extends('layouts.app')

@section('title') Collections Report @endsection

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
            <!-- {{print_r($reports)}} -->
            <?php $currency = \Auth::user()->getCurrencySymbol()->currency_symbol; ?>
            <?php $name = \Auth::user()->getName() . ' ' .\Auth::user()->branchcode; ?>
            <?php $collects = ['offering','tithe','special_offering','seed_offering','donation','first_fruit','covenant_seed','love_seed','sacrifice','thanksgiving','thanksgiving_seed','other'];
            function sumRow($reports, $types){
              $values = [];
              foreach ($types as $key => $value) {
                // code...
                array_push($values, $reports->$value->name);
              }
              return array_sum($values);
            }
            ?>
            <div class="col-md-8 col-md-offset-2" style="margin-bottom:20px">
              <div class="panel" style="background-color: #e8ddd3;">
                  <div class="panel-heading">
                      <h3 class="panel-title"><strong>{{$name}} Collections Report</strong></h3>
                  </div>
                <div class="panel-body">
                  <table class="table text-center">
                    <thead class="bg-warning text-center">
                      <tr><th colspan="3" class="bg-light text-center">Total Collection Amount </th></tr>
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
                          <span class="badge badge-primary badge-pill">{{$currency}} {{number_format($reports->total_collections)}}</span>
                        </td>
                        <td>
                          <span class="badge badge-primary badge-pill">{{$currency}} {{number_format($reports->todays_total_collections)}}</span>
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
                      <h3 class="panel-title"><strong>Total Collections By Type</strong></h3>
                  </div>
                <div class="panel-body">
                  <table class="table text-center">
                    <thead class="bg-warning text-center">
                      <tr>
                        <th class="text-center">
                          Collection Type
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
                          {{$collect->name}}
                        </th>
                        <td>
                          <?php $name = $collect->name; ?>
                          <span class="badge badge-primary badge-pill">{{$currency}} {{number_format($reports->total_single_collections->$name)}}</span>
                        </td>
                        <td>
                          <span class="badge badge-primary badge-pill">{{$currency}} {{number_format($reports->total_single_collections->$name)}}</span>
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
                          <span class="badge badge-primary badge-pill">{{$currency}} {{number_format($reports->total_collections)}}</span>
                        </td>
                        <td>
                          <span class="badge badge-primary badge-pill">{{$currency}} {{number_format($reports->todays_total_collections)}}</span>
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
                      <h3 class="panel-title"><strong>Last 10 <i>Years</i> Collection</strong> Report</h3>
                  </div>
                <div class="panel-body">
                  <table id="demo-dt-basic" class="table table-striped table-bordered datatable" cellspacing="0" width="100%">
                    <thead class="bg-dark text-white">
                      <tr>
                        <th>Type</th>
                        <?php $totals = []; $type = ['tithe', 'offering', 'other']; foreach ($years as $key => $value) { $totals[$value] = 0; ?>
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
                        @foreach($c_years as $k => $v)
                        <?php if($v->year == $value){
                          $found = true;
                          if($v->$t){
                            $totals[$value] += ($v->$t) ? $v->$t : 0;
                            echo '<td>'.$currency.number_format($v->$t).'</td>';}else{echo $currency.'<td>0</td>';
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
                        <th>{{$currency.number_format($value)}}</th>
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
                                  <h3 class="panel-title"><strong>Total Collections By Members</strong></h3>
                              </div>
                            <div class="panel-body">
                              <table class="table text-center">
                                <thead class="bg-warning text-center">
                                  <tr>
                                    <th class="text-center">
                                      Member Name
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
                                      {{$mc->fname}} {{$mc->lname}}
                                    </th>
                                    <td>
                                      <span class="badge badge-primary badge-pill">{{$currency}} {{number_format($mc->total)}}</span>
                                    </td>
                                    <td>
                                      <span class="badge badge-primary badge-pill">{{$currency}} {{number_format($mc->totalt)}}</span>
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
                                      <span class="badge badge-primary badge-pill">{{$currency}} {{number_format($total)}}</span>
                                    </td>
                                    <td>
                                      <span class="badge badge-primary badge-pill">{{$currency}} {{number_format($totalt)}}</span>
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
