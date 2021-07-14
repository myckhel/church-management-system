@extends('layouts.app')

@section('title') Member Profile @endsection

@section('link')
<link href="{{ URL::asset('plugins/bootstrap-select/bootstrap-select.min.css') }}" rel="stylesheet">
<style media="screen">
.adaptive-color{
  width: auto;
}
</style>
@endsection

@section('content')
<?php
$dataPoints = array(
array("label"=> "No", "y"=> $attendance->no, 'color' => 'red'),
array("label"=> "Yes", "y"=> $attendance->yes, 'color' => 'green'),
);
?>

@include('layouts.helpers.colors')
<?php
$colors = colo();//$generateColor($c_types);
?>
<!--CONTENT CONTAINER-->
<!--===================================================-->
<div id="content-container">
        <div id="page-head">

                <!--Page Title-->
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <div id="page-title">
                        <h1 class="page-header text-overflow">Member</h1>
                </div>
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <!--End page title-->


                <!--Breadcrumb-->
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <ol class="breadcrumb">
                  <li>
                      <i class="fa fa-home"></i><a href="{{route('dashboard')}}"> Dashboard</a>
                  </li>
                  <li>
                      <i class="fa fa-users"></i><a href="{{route('members.all')}}"> Members</a>
                  </li>
                        <li class="active">Profile</li>
                </ol>
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <!--End breadcrumb-->

        </div>


        <!--Page content-->
        <!--===================================================-->
        <div id="page-content">
          <div class="col-md-12 col-md-offset-0 col-lg-12 col-lg-offset-0">
            <div class="panel" style="background-color: #e8ddd3;">
              <div class="panel-body">
                <div class="row row-broken" data-height>
                  <div class="col-sm-12 col-md-4" style="border-right:1pt solid rgba(0, 0, 0, 0.1)">
                    <div class="text-center">
                      <div class="pad-ver">
                        <img src="{{url('images/')}}/{{$member->photo}}" class="img-lg img-circle" alt="Profile Picture">
                      </div>
                      <h4 class="text-lg text-overflow mar-no">{{$member->title}}. {{$member->getFullname()}}</h4>
                      <p class="text-sm text-muted">{{$member->occupation}}</p>
                      <div class="pad-ver btn-groups">
                        <a href="app-profile.html#" class="btn btn-icon fa fa-facebook icon-lg add-tooltip" data-original-title="Facebook" data-container="body"></a>
                        <a href="app-profile.html#" class="btn btn-icon fa fa-twitter icon-lg add-tooltip" data-original-title="Twitter" data-container="body"></a>
                        <a href="app-profile.html#" class="btn btn-icon fa fa-google-plus icon-lg add-tooltip" data-original-title="Google+" data-container="body"></a>
                        <a href="app-profile.html#" class="btn btn-icon fa fa-instagram icon-lg add-tooltip" data-original-title="Instagram" data-container="body"></a>
                      </div>
                      <a href="tel:{{$member->phone}}" class="btn  btn-success btn-md">Call</a>
                      <a href="{{route('email')}}?mail={{$member->email}}" class="btn  btn-primary btn-md">Email</a>
                    </div>
                    <br><br>
                    <div class="col-md-12">
                      <div class="text-center">
                      <p class=" text-center text-sm text-uppercase text-bold">Details</p>
                      <hr>
                      <p class="text-align-right">Address:    <i class="fa fa-map-marker icon-lg icon-fw"></i>{{$member->address}}</p>
                      <p>Email:    <a href="app-profile.html#" class="btn-link">
                        <i class="fa fa-inbox icon-lg icon-fw"></i>{{$member->email}}</a>
                      </p>
                      <p>Phone:    <i class="fa fa-phone icon-lg icon-fw"></i>{{$member->phone}}</p>
                        <p>City:    <i class="fa fa-home icon-lg icon-fw"></i>{{$member->city}}</p>
                        <p>State:    <i class="fa fa-home icon-lg icon-fw"></i>{{$member->state}}</p>
                        <p>Country:    <i class="fa fa-home icon-lg icon-fw"></i>{{$member->country}}</p>
                      <p class="text-sm text-center"></p>
                    </div>
                      <hr>
                      <div class="col-md-6 col-md-offset-2">
                      <p class="pad-ver text-main text-sm text-capitalize text-bold">Position: <span class="pull-right">{{$member->position}}</span></p>

                      <p class="pad-ver text-main text-sm text-capitalize text-bold">Relatives:
                        <span class="pull-right">
                          <?php if (!empty($member->relative) || strlen($member->relative)>0){ // do this only if there are relatives assigned to the member?>
                          <?php $relatives = json_decode($member->relative); ?>
                          <?php
                            foreach ($relatives as $relative){
                              if($rel = App\Member::where('id',$relative->id)->get()->first()){
                          ?>
                          <li class="tag tag-sm"><a href="{{route('member.profile', $rel->id)}}">{{$rel->getFullname()}}</a> - {{$relative->relationship}}</li><br/>
                          <?php
                              }
                              }
                            } else {echo 'No Relatives<br/>';}
                          ?>
                        </span></p>
                        </div>
                    </div>
                  </div>
                  <div class="col-sm-12 col-md-8">
                    <div class="row" style="height: 250px">
                      <div class="col-md-12">
                        <div class="panel rounded-top">
                            <div class="panel-heading bg-dark">
                              <div class="co" style="padding-top:7px;">
                                <h2 class="text-center text-white" style="color:white;">Attendance Analysis - {{date("Y")}}</h2>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-12" id="chartContainer" style="height: 250px;"></div>
                        </div>
                      </div>
                       <br>
                        <hr>
                        <div class="row" style="margin-top:100px">
                      <div class="col-md-12">
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
                          <div id="manual-analysis-hd" class="bg-primary text-center"></div>
                          <div class="panel-heading bg-dark">
                            <div id="" class="col-xs-12 text-center" style="padding-top:7px;">
                              <h2 class="text-center text-white"><p style="color:white;" >Collection  Analysis </p></h2>
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
                            <div id="member-analysis" class="legendInline" style="height: 250px"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
        <!--===================================================-->
        <!--End page content-->

<!--===================================================-->
<!--END CONTENT CONTAINER-->

@endsection

@section('js')
<script src="{{ URL::asset('plugins/bootstrap-select/bootstrap-select.min.js') }}"></script>
<script src="{{URL::asset('js/canvasjs.min.js')}}"></script>
<!--Morris.js [ OPTIONAL ]-->
<script src="{{ URL::asset('plugins/morris-js/morris.min.js') }}"></script>
<script src="{{ URL::asset('plugins/morris-js/raphael-js/raphael.min.js') }}"></script>
<script>
$(document).ready(function(){
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

  var chart = Morris.Bar({
    // ID of the element in which to draw the chart.
    element: 'member-analysis',
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

// Create a function that will handle AJAX requests
function requestData(days, chart, group){
  $.ajax({
    type: "GET",
    dataType: 'json',
    url: "{{route('member.analysis')}}", // This is the URL to the API
    data: { interval: days, group, id: "{{$member->id}}" }
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

var manual_analysis_hd = (data) => {
  let collection = data.data
  let middle = '';
  nameTotal = []
  let total = 0;
  data.c_types.forEach((i, v) => {
    let name = i.name;
    collection.forEach((c) => {
      nameTotal[name] = (parseInt(nameTotal[name]) + parseInt(c[name])) || parseInt(c[name])
      total +=  parseInt(c[name])
      })
      middle += '<div  id="'+name+'" class="col-xs-2 small adaptive-color" style="">'+name+': '+(parseInt(nameTotal[name]) || 0)+'</div>';
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

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	exportEnabled: true,
	title:{
		text: "Overall Attendance Rating"
	},
	subtitles: [{
		text: ""
	}],
	data: [{
		type: "pie",
		showInLegend: "true",
		legendText: "{label}",
		indexLabelFontSize: 16,
		indexLabel: "{label} - #percent%",
		// yValueFormatString: "฿#,##0",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
</script>

@endsection
