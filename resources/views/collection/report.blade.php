
@extends('layouts.app')

@section('title') View Collection @endsection

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
                <a href="forms-general.html#">
                    <i class="demo-pli-home"></i>
                </a>
            </li>
            <li>
                <a href="{{route('collection.report')}}">Collection</a>
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

            <!--div class="col-sm-12 col-md-10 col-md-offset-1">
                <div class="panel">
                    <div class="panel-body demo-nifty-btn">

                        <!--Rounded Buttons-->
                        <!--===================================================-->
                        <!--a style="min-width:100px !important" class="btn btn-primary btn-rounded">Offering</a>
                        <a style="min-width:100px !important" class="btn btn-primary btn-rounded">Donation</a>
                        <a style="min-width:100px !important" class="btn btn-primary btn-rounded">Tithe</a-->
                        <!--a href="{{route('collection.report')}}" style="min-width:100px !important"  class="btn btn-success btn-rounded">Reports</a>
                        <!--===================================================-->

                    <!--/div>
                </div>
            </div-->


        <!--div class="col-md-8 col-md-offset-2">

          <!-- Bar Chart -->
          <!---------------------------------->
          <!--div class="panel">
              <div class="panel-heading">
                  <h3 class="panel-title">Total Monthly Collection</h3>
              </div>
              <div class="panel-body">
                  <div id="demo-flot-bar" style="height: 250px"></div>
              </div>
          </div-->
          <!---------------------------------->


        <!--/div-->

            <div class="col-md-12 col-md-offset-0">
        <!-- Basic Data Tables -->
        <!--===================================================-->
        <div class="panel">
            <div class="panel-heading">
            </div>
            <div class="panel-body">
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
                          <th class="min-desktop">Date</th>
                          <th class="min-desktop">Month</th>
                          <th class="min-desktop">Year</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php $count=1;?>
                      <h1>Collection History<h1>
                        @foreach($collections as $list)
                        <?php
                          $date = $list->date_collected;
                          $d = date("F,Y,D", strtotime($date));
                          $p = explode(',',$d);
                        ?>
                        <tr>
                          <td>{{$count}}</td>
                          <td>{{$list->type}}</td>
                          <td>{{$list->special_offering}}</td>
                          <td>{{$list->seed_offering}}</td>
                          <td>{{$list->tithe}}</td>
                          <td>{{$list->offering}}</td>
                          <td>{{$list->donation}}</td>
                          <td>{{$list->first_fruit}}</td>
                          <td>{{$list->covenant_seed}}</td>
                          <td>{{$list->love_seed}}</td>
                          <td>{{$list->sacrifice}}</td>
                          <td>{{$list->thanksgiving}}</td>
                          <td>{{$list->thanksgiving_seed}}</td>
                          <td>{{$list->other}}</td>
                          <td>{{$list->amount}}</td>
                          <!--td>{{$list->date_collected}}</td-->
                          <td>{{$date}}</td>
                          <td>{{$p[0]}}</td>
                          <td>{{$p[1]}}</td>
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
            <div class="panel">
            <div class="panel-heading">
                    <h3 class="panel-title"><strong> <i></i> </strong>Members Collection History</h3>
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
                  <th class="min-desktop">Date</th>
                    <!--th class="min-desktop">Action</th-->
                </tr>
            </thead>
            <tbody>
              <?php $count=1;?>
              <h1>Members Collection History<h1>
                @foreach($collectionss as $li)
                <tr>
                    <td><strong>{{$count}}</strong></td>
                    <td>{{$li->fname}} {{$li->lname}}</td>
                    <td>{{$li->service_type}}</td>
                    <td>{{$li->special_offering}}</td>
                    <td>{{$li->seed_offering}}</td>
                    <td>{{$li->tithe}}</td>
                    <td>{{$li->offering}}</td>
                    <td>{{$li->donation}}</td>
                    <td>{{$li->first_fruit}}</td>
                    <td>{{$li->covenant_seed}}</td>
                    <td>{{$li->love_seed}}</td>
                    <td>{{$li->sacrifice}}</td>
                    <td>{{$li->thanksgiving}}</td>
                    <td>{{$li->thanksgiving_seed}}</td>
                    <td>{{$li->other}}</td>
                    <td>{{($li->special_offering + $li->seed_offering + $li->tithe + $li->offering + $li->donation + $li->first_fruit + $li->covenant_seed + $li->sacrifice + $li->thanksgiving + $li->thanksgiving_seed + $li->other)}}</td>
                    <td>{{$li->date_added}}</td>
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
