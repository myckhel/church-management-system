
@extends('layouts.app')

@section('title') Collection Analysis @endsection

@section('link')
<link href="{{ URL::asset('plugins/bootstrap-select/bootstrap-select.min.css') }}" rel="stylesheet">
<style media="screen">
.adaptive-color{
  width: auto;
}
</style>
@endsection

@section('content')
<!--CONTENT CONTAINER-->
<!--===================================================-->
@include('layouts.helpers.colors')
<?php $colors = colo(); ?>
<div id="content-container">
    <div id="page-head">

        <!--Page Title-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <div id="page-title">
            <h1 class="page-header text-overflow">Collection Analysis</h1>
        </div>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--End page title-->


        <!--Breadcrumb-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <ol class="breadcrumb">
          <li>
              <i class="fa fa-home"></i><a href="{{route('dashboard')}}"> Dashboard</a>
          </li>
            <li class="active">Analysis</li>
        </ol>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--End breadcrumb-->

    </div>

    <!--Page content-->
    <!--===================================================-->
    <div id="page-content">
    <div class="row">
      <!-- stats -->
      <div class="col-md-12">

          <!-- Line Chart -->
          <!---------------------------------->
          <div class="panel rounded-top">
            <div class="text-center">
                <div class="col-xs-12">
                  <?php $i = 0; ?>
                  @foreach($c_types as $type)
                  <span style="background-color:{{$colors[$i]}}" class="badge badge-pill">{{$type->disFormatString()}}</span>
                  <?php $i++; ?>
                  @endforeach
                </div>
              </div>
            <div id="manual-analysis-hd" class="text-center bg-info">
            </div>
            <div class="panel-heading bg-dark">
              <div class="col-xs-12 text-center">
                <h3 class="panel-title">Manual Collections Analysis</h3>
              </div>
            </div>
              <div class="pad-all" style="background-color: #e8ddd3;" style="overflow: scroll">
                <div class="row">
                  <div class="col-xs-6">
                    <label for="group" class="">Group By</label>
                    <select id="group" required style="outline:none;" name="sort" class="selectpicker col-md-12" data-style="btn-primary">
                      <option value="1">Days</option>
                      <option value="2">Weeks</option>
                      <option selected value="3">Months</option>
                      <option value="4">Years</option>
                    </select>
                  </div>
                  <div class="col-xs-6">
                    <label for="range" class="">Select Range</label>
                    <select id="m-i" required style="outline:none;" name="range" class="selectpicker col-md-12 nav nav-pills ranges" data-style="btn-primary">
                      <option selected disabled value="">Choose Number of Months</option>
                      @for($i = 1; $i < 13; $i++)
                      <option value="{{$i}}">Last{{$i}} Months</option>
                      @endfor
                    </select>
                  </div>
                </div>

                <div id="stats-container" class="legendInline" style="height: 250px;"></div>
              </div>
          </div>
          <!---------------------------------->
        </div>
      <!--/div-->
      <div class="col-md-6">

          <!-- Line Chart -->
          <!---------------------------------->
          <div class="panel rounded-top">
            <div class="panel-heading bg-dark">
              <div class="col-xs-12 text-center">
                <h3 class="panel-title">Last 12 Months Collections</h3>
              </div>
            </div>
            <div class="pad-all" style="background-color: #e8ddd3;">
                <div id="demo-morris-bar-month" class="legendInline" style="height:250px"></div>
            </div>
          </div>
          <!---------------------------------->
        </div>
        <!-- week -->
        <div class="col-md-6">

            <!-- Line Chart -->
            <!---------------------------------->
            <div class="panel rounded-top">
              <div class="panel-heading bg-dark">
                <div class="col-xs-12 text-center">
                    <h3 class="panel-title">Last 10 Weeks Collections</h3>
                  </div>
                </div>
                <div class="pad-all" style="background-color: #e8ddd3;">
                    <div id="demo-morris-bar-week" class="legendInline" style="height:250px"></div>
                </div>
            </div>
            <!---------------------------------->
          </div>

          <!-- day -->
          <div class="col-md-6">

              <!-- Line Chart -->
              <!---------------------------------->
              <div class="panel rounded-top">
                <div class="panel-heading bg-dark">
                  <div class="col-xs-12 text-center">
                    <h3 class="panel-title">Last 7 Days Collections</h3>
                  </div>
                </div>
                <div class="pad-all" style="background-color: #e8ddd3;">
                    <div id="demo-morris-bar-day" class="legendInline" style="height:250px"></div>
                </div>
              </div>
              <!---------------------------------->
            </div>

            <!-- year -->
            <div class="col-md-6">

                <!-- Line Chart -->
                <!---------------------------------->
                <div class="panel rounded-top">
                  <div class="panel-heading bg-dark">
                    <div class="col-xs-12 text-center">
  	                    <h3 class="panel-title">Yearly Collections</h3>
                      </div>
  	                </div>
                    <div class="pad-all" style="background-color: #e8ddd3;">
                        <div id="demo-morris-bar-year" class="legendInline" style="height:250px"></div>
                    </div>
                </div>
                <!---------------------------------->
              </div>


  			    </div>

    </div>
    <!--===================================================-->
    <!--End page content-->

</div>
<!--===================================================-->
<!--END CONTENT CONTAINER-->
@endsection

@section('js')
<script src="{{ URL::asset('plugins/bootstrap-select/bootstrap-select.min.js') }}"></script>
<!--Morris.js [ OPTIONAL ]-->
<script src="{{ URL::asset('plugins/morris-js/morris.min.js') }}"></script>
<script src="{{ URL::asset('plugins/morris-js/raphael-js/raphael.min.js') }}"></script>
@include('layouts.helpers.collection-stat')
<script>
$(document).ready(() => {



Morris.Bar({
element: 'demo-morris-bar-month',
data: [
	<?php
  $months = [];
  for ($i = 11; $i >= 0; $i--) {
    $months[$i] = date('M', strtotime(date('Y-m-01'). "-$i months")); //1 week ago
  }
  // dd($months);
	foreach ($months as $key => $value) {
		$month = $value; $found = false;
		foreach ($collections as $collection) {
			if($value == $collection->month){
				$found = true;
        yData($collection, $c_types, $value);
			}
		}
		if(!$found){
			noData($c_types, $value);
		}

	} ?>
],
xkey: 'y',
ykeys: [<?php yKeys($c_types); ?>],
labels: [<?php labels($c_types); ?>],
barAnimated: true,
barAnimateDuration: 1000,
gridEnabled: true,
gridLineColor: 'rgba(0,0,0,.1)',
gridTextColor: '#8f9ea6',
gridTextSize: '11px',
barColors: [<?php barColors($colors); ?>],
resize:true,
hideHover: 'auto'
});

//FOR Week
<?php
$weeks = [];
$i = 10;
while ($i > 0) {

$weeks[$i] = date('W', strtotime("-$i week")); //1 week ago
$i--;
}
?>

Morris.Bar({
element: 'demo-morris-bar-week',
data: [
	<?php
	foreach ($weeks as $key => $value) {
		$week = $value;
		$found = false;
		foreach ($collections3 as $collections) {
			if($value == $collections->week){
				$found = true;
        yData($collections, $c_types, 'week '.$value);
			}
		}
		if(!$found){
      noData($c_types, 'week '.$value);
		}

	} ?>
],
xkey: 'y',
ykeys: [<?php yKeys($c_types); ?>],
labels: [<?php labels($c_types); ?>],
gridEnabled: true,
gridLineColor: 'rgba(0,0,0,.1)',
gridTextColor: '#8f9ea6',
gridTextSize: '11px',
barColors: [<?php barColors($colors); ?>],
resize:true,
hideHover: 'auto'
});

//FOR Day
<?php $days =  ['Sun', 'Mon', 'Tue', 'Wed','Thur','Fri','Sat']; ?>
Morris.Bar({
element: 'demo-morris-bar-day',
data: [
	<?php
	foreach ($days as $key => $value) {
		$day = $value;
		$found = false;
		foreach ($collections2 as $collections) {
			if($value == $collections->day){
				$found = true;
        yData($collections, $c_types, $value);
			}
		}
		if(!$found){
      noData($c_types, $value);
			// echo "{y: '" .$value. "', a: 0, b: 0, c: 0},";
		}

	} ?>
],
xkey: 'y',
ykeys: [<?php yKeys($c_types); ?>],
labels: [<?php labels($c_types); ?>],
gridEnabled: true,
gridLineColor: 'rgba(0,0,0,.1)',
gridTextColor: '#8f9ea6',
gridTextSize: '11px',
barColors: [<?php barColors($colors); ?>],
resize:true,
hideHover: 'auto'
});

//FOR Year
<?php
$years = [];
$i = 11;
while ($i >= 0) {

$years[$i] = date('Y', strtotime("-$i year")); //1 week ago
$i--;
}
?>

Morris.Bar({
element: 'demo-morris-bar-year',
data: [
	<?php
	foreach ($years as $key => $value) {
		// code...
		$year = $value;
		$found = false;
		foreach ($collections4 as $collections) {
			// code...
			if($value == $collections->year){
				$found = true;
        yData($collections, $c_types, $value);
				// echo "{y: '" .$value. "', a: " .$collections->tithe.", b: ".$collections->offering.", c: ".$collections->other."},";
			}
		}
		if(!$found){
      noData($c_types, $value);
			// echo "{y: '" .$value. "', a: 0, b: 0, c: 0},";
		}

	} ?>
],
xkey: 'y',
ykeys: [<?php yKeys($c_types); ?>],
labels: [<?php labels($c_types); ?>],
gridEnabled: true,
gridLineColor: 'rgba(0,0,0,.1)',
gridTextColor: '#8f9ea6',
gridTextSize: '11px',
barColors: [<?php barColors($colors); ?>],
resize:true,
hideHover: 'auto'
});

})
</script>

@endsection
