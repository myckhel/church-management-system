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
                  <table class="table text-center">
                    <thead class="bg-warning text-center">
                      <tr><th colspan="2" class="bg-light text-center">Total Amount of Collections </th></tr>
                      <tr>
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
                        <td>
                          <span class="badge badge-primary badge-pill">{{$currency}} {{number_format($reports[0]->total_collections)}}</span>
                        </td>
                        <td>
                          <span class="badge badge-primary badge-pill">{{$currency}} {{number_format($reports[0]->todays_collections)}}</span>
                        </td>
                      </tr>
                    </tbody>
                  </table>

                </div>
              </div>
            </div>

            <div class="col-md-8 col-md-offset-2" style="margin-bottom:20px">
              <div class="panel">
                  <div class="panel-heading">
                      <h3 class="panel-title"><strong>Total <i>Collections</i> By Collections Type Till Date</strong></h3>
                  </div>
                <div class="panel-body">
                  <table class="table text-center">
                    <thead class="bg-warning text-center">
                      <tr><th colspan="3" class="bg-light text-center">Collections</th></tr>
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
                          Special Offering
                        </th>
                        <td>
                          <span class="badge badge-primary badge-pill">{{$currency}} {{number_format($reports[0]->so)}}</span>
                        </td>
                        <td>
                          <span class="badge badge-primary badge-pill">{{$currency}} {{number_format($reports[0]->sot)}}</span>
                        </td>
                      </tr>
                      <tr>
                        <th>
                          Seed Offering
                        </th>
                        <td>
                          <span class="badge badge-primary badge-pill">{{$currency}} {{number_format($reports[0]->sdo)}}</span>
                        </td>
                        <td>
                          <span class="badge badge-primary badge-pill">{{$currency}} {{number_format($reports[0]->sdot)}}</span>
                        </td>
                      </tr>
                      <tr>
                        <th>
                          Offering
                        </th>
                        <td>
                          <span class="badge badge-primary badge-pill">{{$currency}} {{number_format($reports[0]->o)}}</span>
                        </td>
                        <td>
                          <span class="badge badge-primary badge-pill">{{$currency}} {{number_format($reports[0]->ot)}}</span>
                        </td>
                      </tr>
                      <tr>
                        <th>
                          Donation
                        </th>
                        <td>
                          <span class="badge badge-primary badge-pill">{{$currency}} {{number_format($reports[0]->d)}}</span>
                        </td>
                        <td>
                          <span class="badge badge-primary badge-pill">{{$currency}} {{number_format($reports[0]->dt)}}</span>
                        </td>
                      </tr>
                      <tr>
                        <th>
                          Tithe
                        </th>
                        <td>
                          <span class="badge badge-primary badge-pill">{{$currency}} {{number_format($reports[0]->t)}}</span>
                        </td>
                        <td>
                          <span class="badge badge-primary badge-pill">{{$currency}} {{number_format($reports[0]->tt)}}</span>
                        </td>
                      </tr>
                      <tr>
                        <th>
                          First Fruit
                        </th>
                        <td>
                          <span class="badge badge-primary badge-pill">{{$currency}} {{number_format($reports[0]->ff)}}</span>
                        </td>
                        <td>
                          <span class="badge badge-primary badge-pill">{{$currency}} {{number_format($reports[0]->fft)}}</span>
                        </td>
                      </tr>
                      <tr>
                        <th>
                          Covenant Seed
                        </th>
                        <td>
                          <span class="badge badge-primary badge-pill">{{$currency}} {{number_format($reports[0]->cs)}}</span>
                        </td>
                        <td>
                          <span class="badge badge-primary badge-pill">{{$currency}} {{number_format($reports[0]->cst)}}</span>
                        </td>
                      </tr>
                      <tr>
                        <th>
                          Love Seed
                        </th>
                        <td>
                          <span class="badge badge-primary badge-pill">{{$currency}} {{number_format($reports[0]->ls)}}</span>
                        </td>
                        <td>
                          <span class="badge badge-primary badge-pill">{{$currency}} {{number_format($reports[0]->lst)}}</span>
                        </td>
                      </tr>
                      <tr>
                        <th>
                          Sacrifice
                        </th>
                        <td>
                          <span class="badge badge-primary badge-pill">{{$currency}} {{number_format($reports[0]->s)}}</span>
                        </td>
                        <td>
                          <span class="badge badge-primary badge-pill">{{$currency}} {{number_format($reports[0]->st)}}</span>
                        </td>
                      </tr>
                      <tr>
                        <th>
                          Thanksgiving
                        </th>
                        <td>
                          <span class="badge badge-primary badge-pill">{{$currency}} {{number_format($reports[0]->tg)}}</span>
                        </td>
                        <td>
                          <span class="badge badge-primary badge-pill">{{$currency}} {{number_format($reports[0]->tgt)}}</span>
                        </td>
                      </tr>
                      <tr>
                        <th>
                          Thanksgiving Seed
                        </th>
                        <td>
                          <span class="badge badge-primary badge-pill">{{$currency}} {{number_format($reports[0]->tgs)}}</span>
                        </td>
                        <td>
                          <span class="badge badge-primary badge-pill">{{$currency}} {{number_format($reports[0]->tgst)}}</span>
                        </td>
                      </tr>
                      <tr>
                        <th>
                          Other
                        </th>
                        <td>
                          <span class="badge badge-primary badge-pill">{{$currency}} {{number_format($reports[0]->ot)}}</span>
                        </td>
                        <td>
                          <span class="badge badge-primary badge-pill">{{$currency}} {{number_format($reports[0]->ott)}}</span>
                        </td>
                      </tr>
                    </tbody>
                    <tfoot class="bg-success">
                      <tr>
                        <th>
                          Total
                        </th>
                        <td>
                          <span class="badge badge-primary badge-pill">{{$currency}} {{number_format($reports[0]->total_collections)}}</span>
                        </td>
                        <td>
                          <span class="badge badge-primary badge-pill">{{$currency}} {{number_format($reports[0]->todays_collectionst)}}</span>
                        </td>
                      </tr>
                    </tfoot>
                  </table>
                </div>
              </div>
            </div>

            <div class="col-md-8 col-md-offset-2" style="margin-bottom:20px">
              <div class="panel">
                  <div class="panel-heading">
                      <h3 class="panel-title"><strong>Total Branches <i>By</i> Collections Till Date</strong></h3>
                  </div>
                <div class="panel-body">
                  <table class="table text-center">
                    <thead class="bg-warning text-center">
                      <tr><th colspan="3" class="bg-light text-center">Branch</th></tr>
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
                      <?php $total = 0; $totalt = 0; ?>
                      @foreach ($ad_rep as $ar)
                      <?php $total += ($ar->ctotal); $totalt += ($ar->ctotalt); ?>
                      <tr>
                        <th>
                          {{$ar->name}}
                        </th>
                        <td>
                          <span class="badge badge-primary badge-pill">{{$currency}} {{number_format($ar->ctotal)}}</span>
                        </td>
                        <td>
                          <span class="badge badge-primary badge-pill">{{$currency}} {{number_format($ar->ctotalt)}}</span>
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
