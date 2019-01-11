
@extends('layouts.app')

@section('title') Collection Analysis @endsection

@section('link')
<style media="screen">
.adaptive-color{
  width: auto;
}
</style>
@endsection

@section('content')
<!--CONTENT CONTAINER-->
<!--===================================================-->
<?php
function random_color_part() {
  return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
}

function random_color() {
    return random_color_part() . random_color_part() . random_color_part();
}

function noData($c_types, $value){
  $y = "{y: '$value',"; $i=1;
  foreach ($c_types as $key => $value) { $y .= "'$i':0,"; $i++;}
  echo $y. "},";
}

function yKeys($c_types){
  $i=1; foreach ($c_types as $key => $value) {echo "'$i',"; $i++;}
}

function labels($c_types){
  foreach ($c_types as $key => $value) {echo "'$value->name',";}
}

function yData($collection,$c_types, $value){
  $y = "{y: '$value', ";  $i = 1; $size = sizeof($c_types);
  foreach ($c_types as $key => $value) {
    $name = $value->name;
    $amount = isset($collection->$name) ? $collection->$name : 0;
    $y .= "$i: $amount,";
    $i++;
  }
  echo $y . "},";
}
$months =  ['Jan', 'Feb', 'Mar','Apr','May','Jun','Jul','Aug','Sept','Oct','Nov','Dec'];
// $months =  ['Dec','Nov','Oct','Sept','Aug','Jul','Jun','May','Apr', 'Mar', 'Feb', 'Jan'];
 $generateColor = function($c_types){
   $c = [];
   foreach($c_types as $value){
     array_push($c,"#".random_color());
   }
   return $c;
 };
 $colors = $generateColor($c_types);

 function barColors($colors){
   foreach ($colors as $value) {echo "'".$value."',";}
 }
?>
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
        <!--/div-->
        <div class="col-md-8 col-md-offset-2">

            <!-- Line Chart -->
            <!---------------------------------->
            <div class="panel rounded-top">
              <div class="panel-heading">
                  <div class="col-xs-12 panel-title">
                    <?php $i = 0; ?>
                    @foreach($c_types as $type)
                    <div class="col-xs-2 small adaptive-color" style="background-color:{{$colors[$i]}}">{{$type->name}}</div>
                    <?php $i++; ?>
                    @endforeach
                  </div>
                </div>
              </div>
          </div>
          <!---------------------------------->
        </div>
    <div class="row">
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

              <!-- stats -->
              <div class="col-md-12">

                  <!-- Line Chart -->
                  <!---------------------------------->
                  <div class="panel rounded-top">
                    <div class="panel-heading bg-dark">
                      <div class="col-xs-12 text-center">
  		                    <h3 class="panel-title">Daily Collections</h3>
                        </div>
  		                </div>
                      <div class="pad-all" style="background-color: #e8ddd3;">
                      <ul class="nav nav-pills ranges">
                        <li class="active"><a href="#" data-range='7'>7 Days</a></li>
                        <li><a href="#" data-range='30'>30 Days</a></li>
                        <li><a href="#" data-range='60'>60 Days</a></li>
                        <li><a href="#" data-range='90'>90 Days</a></li>
                      </ul>
                        <div id="stats-container" style="height: 250px;"></div>
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
<script>
$(document).ready(() => {
  $('ul.ranges a').click(function(e){
    e.preventDefault();

    // Get the number of days from the data attribute
    var el = $(this);
    // remove classes from all
    $('ul li').not(this).removeClass('active');
    $(el).parent().toggleClass('active');
    days = el.attr('data-range');

    // Request the data and render the chart using our handy function
    requestData(days, chart);
  })

  // Create a function that will handle AJAX requests
  function requestData(days, chart){
    $.ajax({
      type: "GET",
      dataType: 'json',
      url: "{{route('apis')}}", // This is the URL to the API
      data: { days: days }
    })
    .done(function( data ) {
      // When the response to the AJAX request comes back render the chart with new data
      chart.setData(data);
    })
    .fail(function() {
      // If there is no communication between the server, show an error
      alert( "error occured" );
    });
  }

  var chart = Morris.Bar({
    // ID of the element in which to draw the chart.
    element: 'stats-container',
    data: [0, 0], // Set initial data (ideally you would provide an array of default data)
    xkey: 'date', // Set the key for X-axis
    ykeys: ['tithe', 'offering', 'special_offering','seed_offering','donation','first_fruit','covenant_seed','love_seed','sacrifice','thanksgiving','thanksgiving_seed','other'], // Set the key for Y-axis
    labels: ['tithe', 'offering', 'special_offering','seed_offering','donation','first_fruit','covenant_seed','love_seed','sacrifice','thanksgiving','thanksgiving_seed','other'] // Set the label when bar is rolled over
  });

  // Request initial data for the past 7 days:
  requestData(7, chart);

})


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
        //"', 1: 0, 2: 0, 3: 0, 4: 0, 5: 0},";
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

//FOR Week
<?php
$weeks = [];
$i = 10;
while ($i > 0) {

$weeks[$i] = date('W', strtotime("-$i week")); //1 week ago
$i--;
}
//$weeks =  [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17,
      //18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34,
      //35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51,
      //52,];
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
      // && ($collections->tithe != NULL && $collections->offering != NULL && $collections->other != NULL)){
				$found = true;
        yData($collections, $c_types, 'week '.$value);
				// echo "{y: 'Week " .$value. "', a: " .$collections->tithe.", b: ".$collections->offering.", c: ".$collections->other."},";
			}
		}
		if(!$found){
      noData($c_types, 'week '.$value);
			// echo "{y: 'Week " .$value. "', a: 0, b: 0, c: 0},";
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
         // && ($collections->tithe != NULL && $collections->offering != NULL && $collections->other != NULL)){
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

//FOR Year
<?php
$years = [];
$i = 11;
while ($i >= 0) {

$years[$i] = date('Y', strtotime("-$i year")); //1 week ago
$i--;
}
//$weeks =  [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17,
      //18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34,
      //35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51,
      //52,];
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
         // && ($collections->tithe != NULL && $collections->offering != NULL && $collections->other != NULL)){
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
</script>

@endsection
