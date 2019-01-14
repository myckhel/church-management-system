
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

function yKeys2($c_types){
  foreach ($c_types as $key => $value) {echo "'{$value->name}',";}
}

function labels($c_types){
  foreach ($c_types as $key => $value) {echo "'{$value->disFormatString()}',";}
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
                    <div class="col-xs-2 small adaptive-color" style="background-color:{{$colors[$i]}}">{{$type->disFormatString()}}</div>
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
                    <div id="manual-analysis-hd" class="panel-heading bg-primary">
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

                      <!-- <ul class="nav nav-pills ranges">
                        <li class="active"><a href="#" data-range='7'>7 Days</a></li>
                        <li><a href="#" data-range='30'>30 Days</a></li>
                        <li><a href="#" data-range='60'>60 Days</a></li>
                        <li><a href="#" data-range='90'>90 Days</a></li>
                      </ul> -->
                        <div id="stats-container" class="legendInline" style="height: 250px;"></div>
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
<script>
var group = 'month';
var switchSelect = (to) => {
  let rangeMin = 1; let rangeMax = 7
  if(to == 1){  group = 'day';    rangeMin = 1; rangeMax = 7  }
  if(to == 3){   group = 'month';  rangeMin = 1; rangeMax = 12  }
  if(to == 2){  group = 'week';    rangeMin = 10; rangeMax = 30 }
  if(to == 4){  group = 'year';    rangeMin = 1; rangeMax = 10  }
  $('#m-i').html($('<option>'
  , { value: 0,
      text : 'Choose range',
      selected: 'selected',
      disabled: true,
  }, '</option>'
  ))
  for(let i = rangeMin; i < rangeMax+rangeMin; i = i + rangeMin){
    $('#m-i').append($('<option>'
    , { value: i,
        text : `Last ${i} ${group}s`,
    }, '</option>'
    ));
    $('#m-i').selectpicker('refresh');
  }
}
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
    requestData(days, chart, group);
  })

  $('#m-i').change((e) => {
    var el = e.target;
    requestData(el.value, chart, group);
  })

  $('#group').change((e) => {
    let value = e.target.value;
    switchSelect(value)
    // group = value
    // requestData(el.value, chart, group);
  })

  // Create a function that will handle AJAX requests
  function requestData(days, chart, group){
    $.ajax({
      type: "GET",
      dataType: 'json',
      url: "{{route('apis')}}", // This is the URL to the API
      data: { interval: days, group }
    })
    .done(function( data ) {
      // When the response to the AJAX request comes back render the chart with new data
      $('#manual-analysis-hd').html(manual_analysis_hd({group, interval: days, data, c_types: <?php echo json_encode($c_types); ?>}))
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
    xkey: 'y', // Set the key for X-axis
    ykeys: [<?php yKeys2($c_types); ?>],
    labels: [<?php labels($c_types); ?>],
    hideHover: 'auto',
    xLabelAngle:25,
    barColors: [<?php barColors($colors); ?>],
  });

  // Request initial data for the past 7 days:
  requestData(8, chart, group);

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

var manual_analysis_hd = (data) => {
  let collection = data.data
  let middle = '';
  nameTotal = []
  let total = 0;
  data.c_types.forEach((i, v) => {
    let name = i.name;
    collection.forEach((c) => {
      nameTotal[name] = nameTotal[name] + c[name] || c[name]
      total +=  c[name]
      })
      middle += '<div  id="'+name+'" class="col-xs-2 small adaptive-color" style="">'+name+': '+(nameTotal[name] || 0)+'</div>';
    })
  return `
  <marquee>
  <div id="manual-analysis-hd" class="panel-heading bg-primary">
    <div class="col-xs-12 text-center">
      <div class="col-xs-12 panel-title">
        <div  id="specifier" class="col-xs-2 small adaptive-color" style="">Within Last ${data.interval} ${data.group}s  </div>
        ${middle}
        <div  id="total" class="col-xs-2 small adaptive-color" style="">Total: ${total}</div>
      </div>
    </div>
  </div>
  </marquee>
  `
}
</script>

@endsection
