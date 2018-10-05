
@extends('layouts.app')

@section('title') View Collection Report @endsection

@section('content')
<!--CONTENT CONTAINER-->
<!--===================================================-->
<div id="content-container">
    <div id="page-head">

        <!--Page Title-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <div id="page-title">
            <h1 class="page-header text-overflow">View Collection</h1>
        </div>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--End page title-->


        <!--Breadcrumb-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <ol class="breadcrumb">
          <li>
              <i class="fa fa-home"></i><a href="{{route('dashboard')}}"> Dashboard</a>
          </li>
            <li class="active">Report</li>
        </ol>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--End breadcrumb-->

    </div>


    <!--Page content-->
    <!--===================================================-->
    <div id="page-content">
        <div class="row">

            <div class="col-md-12 col-md-offset-0">
        <!-- Basic Data Tables -->
        <!--===================================================-->
        <div class="panel" style="background-color: #e8ddd3;">
          <div class="panel-heading">
              <h1 class="text-center panel-title">Collection History</h1>
          </div>
            <?php $currency = \Auth::user()->getCurrencySymbol()->currency_symbol; ?>
            <div class="panel-body" style="overflow:scroll">
                <table id="demo-dt-basic" class="table table-striped table-bordered datatable" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                          <th>S/N</th>
                          <th>Collection Type</th>
                          <th>Special Offering</th>
                          <th>Seed Offering</th>
                          <th>Tithe</th>
                          <th class="min-tablet">Offering</th>
                          <th class="min-tablet">Donation</th>
                          <th class="min-desktop">First Fruit</th>
                          <th class="min-desktop">Covenant Seed</th>
                          <th class="min-desktop">Love Seed</th>
                          <th class="min-desktop">Sacrifice</th>
                          <th class="min-desktop">Thanksgiving</th>
                          <th class="min-desktop">Thanksgiving Seed</th>
                          <th class="min-desktop">Other</th>
                          <th class="min-desktop">Total</th>
                          <!--th class="min-desktop">Date Saved</th-->
                          <th class="min-desktop">Transaction Date</th>
                          <th class="min-desktop">Processed Date</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php $count=1;?>
                        @foreach($collections as $list)
                        <?php
                          $date = $list->date_collected;
                          $d = date("F,Y,D", strtotime($date));
                          $p = explode(',',$d);
                        ?>
                        <tr>
                          <td>{{$count}}</td>
                          <td>{{$list->type}}</td>
                          <td>{{$currency.number_format($list->special_offering)}}</td>
                          <td>{{$currency.number_format($list->seed_offering)}}</td>
                          <td>{{$currency.number_format($list->tithe)}}</td>
                          <td>{{$currency.number_format($list->offering)}}</td>
                          <td>{{$currency.number_format($list->donation)}}</td>
                          <td>{{$currency.number_format($list->first_fruit)}}</td>
                          <td>{{$currency.number_format($list->covenant_seed)}}</td>
                          <td>{{$currency.number_format($list->love_seed)}}</td>
                          <td>{{$currency.number_format($list->sacrifice)}}</td>
                          <td>{{$currency.number_format($list->thanksgiving)}}</td>
                          <td>{{$currency.number_format($list->thanksgiving_seed)}}</td>
                          <td>{{$currency.number_format($list->other)}}</td>
                          <td>{{$currency.number_format($list->amount)}}</td>
                          <!--td>{{$list->date_collected}}</td-->
                          <td>{{$date}}</td>
                          <td>{{$list->created_at}}</td>
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

        <div class="col-md-12 col-md-offset-0" style="margin-bottom:50px">
            <div class="panel" style="background-color: #e8ddd3;">
              <div class="panel-heading">
                  <h1 class="text-center panel-title">Members Collection History</h1>
              </div>
            <div class="panel-body text-center clearfix" style="overflow:scroll">
            <table id="demo-dt-basic" class="table table-striped table-bordered datatable" cellspacing="0" width="100%" >
            <thead>
                <tr>
                  <th>S/N</th>
                  <th>Name</th>
                  <th>Collection Type</th>
                  <th>Special Offering</th>
                  <th>Seed Offering</th>
                  <th>Tithe</th>
                  <th class="min-tablet">Offering</th>
                  <th class="min-tablet">Donation</th>
                  <th class="min-desktop">First Fruit</th>
                  <th class="min-desktop">Covenant Seed</th>
                  <th class="min-desktop">Love Seed</th>
                  <th class="min-desktop">Sacrifice</th>
                  <th class="min-desktop">Thanksgiving</th>
                  <th class="min-desktop">Thanksgiving Seed</th>
                  <th class="min-desktop">Other</th>
                  <th class="min-desktop">Total</th>
                  <!--th class="min-desktop">Date Saved</th-->
                  <th class="min-desktop">Transaction Date</th>
                  <th class="min-desktop">Processed Date</th>
                    <!--th class="min-desktop">Action</th-->
                </tr>
            </thead>
            <tbody>
              <?php $count=1;?>
                @foreach($collectionss as $li)
                <tr>
                    <td><strong>{{$count}}</strong></td>
                    <td>{{$li->fname}} {{$li->lname}}</td>
                    <td>{{$li->service_type}}</td>
                    <td>{{$currency.number_format($li->special_offering)}}</td>
                    <td>{{$currency.number_format($li->seed_offering)}}</td>
                    <td>{{$currency.number_format($li->tithe)}}</td>
                    <td>{{$currency.number_format($li->offering)}}</td>
                    <td>{{$currency.number_format($li->donation)}}</td>
                    <td>{{$currency.number_format($li->first_fruit)}}</td>
                    <td>{{$currency.number_format($li->covenant_seed)}}</td>
                    <td>{{$currency.number_format($li->love_seed)}}</td>
                    <td>{{$currency.number_format($li->sacrifice)}}</td>
                    <td>{{$currency.number_format($li->thanksgiving)}}</td>
                    <td>{{$currency.number_format($li->thanksgiving_seed)}}</td>
                    <td>{{$currency.number_format($li->other)}}</td>
                    <td>{{$currency.number_format(($li->special_offering + $li->seed_offering + $li->tithe + $li->offering + $li->donation + $li->first_fruit + $li->covenant_seed + $li->sacrifice + $li->thanksgiving + $li->thanksgiving_seed + $li->other))}}</td>
                    <td>{{$li->date_added}}</td>
                    <td>{{$li->date_submitted}}</td>
                    <!--td><button id="" type="submit" class="btn btn-primary" onclick="view(this);">View</button></td-->
                </tr>
                <?php $count++;?>
                @endforeach
            </tbody>
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
