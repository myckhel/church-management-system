@extends('layouts.app')

@section('title') Dashboard @endsection

@section('link')
<!--custom.css [ OPTIONAL ]-->
<link href="{{ URL::asset('css/custom.css') }}" rel="stylesheet">
<link href="{{ URL::asset('css/stylemashable.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{URL::asset('css/icofont.min.css')}}">
<style media="screen">
.icofont{
  font-size: 35px;
}
</style>
@endsection

@section('content')
<!--CONTENT CONTAINER-->
<!--===================================================-->
<div id="content-container">
  <div id="page-head">
    <hr class="new-section-sm bord-no">
    <div class="text-center">
      <h3>Welcome to <strong>{{strtoupper(\Auth::user()->branchname)}}</strong> Dashboard.</h3>
      <!--<p>Check out your past searches and the content you’ve browsed in. <a href="dashboard" class="btn-link">View last results</a></p>-->
    </div>
    <!-- <hr class="new-section-md bord-no"> -->
  </div>
    <!--Page content-->
    <!--===================================================-->
  <div id="page-content">
    <div class="row" >
     @if (session('status'))
      <div class="alert alert-success">
          {{ session('status') }}
      </div>
      @endif
      <style>
      .img-center {        display: block;        margin-left: auto;        margin-right: auto;        width: 80%;      }
      </style>
     <div class="text-center col-md-10 col-md-offset-1" style="background-color: #e8ddd3;">
      <img src="data:image/jpeg;base64, {{base64_encode($options->HOLOGO) . ''}}" class="img-center img-responsive" alt="Cinque Terre">
      <!--   <div class="img-responsive">
      <img style="margin-top:-200px; max-width: 914px; min-width:500px ; min-height:150px ; max-height: 228px;" src="data:image/jpeg;base64, {{base64_encode($options->HOLOGO) . ''}}" class="center-block img-responsive" /> <!-- ./images/church-logo.png -->
     </div>
    </div>
    <div class="row">
     <div class="col-md-10 col-md-offset-1">
       <div class="border">
       <div class="well  bodyshadow" style="background-color: #e8ddd3;">
         @if(session()->has('message.level'))
          <div class="alert alert-{{ session('message.level') }}">
          {!! session('message.content') !!}
          </div>
          @endif
          <div class="text-center">
            <h3 class="ji">Announcement Board </h3>
          </div>
          <div class="vew">
            @if (count($eventsall) > 0)
            @foreach ($eventsall as $event)
              <?php $sql ="DELETE FROM announcements WHERE (start_date <= CURDATE())  ";
            \DB::delete($sql);
            ?>
            @if ($event->start_date >= now())
             <div class="list-group bg-trans">
                <a href="#" class="list-group-item">
                  <div class="media-body">
                    <h4 class="shadow"><p>by {{$event->by_who}}</p></h4>
                    <div class="bodyshadow">
                    <h class="pad-top text-semibold ano"> <h4 class="textcolor">{{ html_entity_decode(str_limit($event->details, 100)) }}</h4>
                        <p class="pull-right">{{$event->branchname}} </p>
                        @if (strlen(strip_tags($event->details)) > 100)
                        <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#createTopic_{{$event->id}}">
                        <i class="fa fa-book fa-2x" aria-hidden="true"></i> Read More</a>  &nbsp;&nbsp;&nbsp
                        @endif</p>
                     </div>
                  </div>
                </a>
             </div>
             @endif

            <div class="modal" id="createTopic_{{$event->id}}" tabindex="-1" role="dialog" aria-labelledby="largeModalHead" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                     <!--  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button> -->
                      <h1 class="text-center bodyshadow">{{$event->branchname}}!</h1>
                  </div>
                  <div class="modal-body">
                    <div class="bodyshadow">
                    <blockquote class="bq-sm bq-open bq-close bg-warning"><h3> {{$event->details}} </h3></blockquote>
                    <p class="pull-right">by <a><strong>{{$event->by_who}}</strong>   </a>    </p>
                   </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
             </div>
              @endforeach
            <div class="alert alert-danger">
              <strong>Sorry!</strong> No New Announcement.
            </div>
            @endif
          </div>
        </div>
      </div>
      <br>  <br>  <br>
    </div>
  </div>

  <div class="panel">

      <!--Chart information-->
      <div class="panel-body">
          <div class="row mar-top">
              <div class="col-md-5">
                  <h3 class="text-main text-normal text-2x mar-no">Member Stats</h3>
                  <h5 class="text-uppercase text-muted text-normal">Report for last 12 Months</h5>
                  <div class="row mar-top">
                      <div class="col-sm-7">
                          <table class="table table-condensed table-trans">
                              <tr>
                                  <td class="text-lg" style="width: 40px"><span id="member-male" class="badge badge-purple">0</span></td>
                                  <td>Male</td>
                              </tr>
                              <tr>
                                  <td class="text-lg"><span class="badge badge-dark" id="member-female">0</span></td>
                                  <td>Female</td>
                              </tr>
                              <!-- <tr>
                                  <td class="text-lg"><span class="badge badge-danger">25</span></td>
                                  <td>Teachers</td>
                              </tr> -->
                          </table>
                      </div>
                      <div class="col-sm-5 text-center">
                          <div class="text-lg"><p class="text-5x text-thin text-main mar-no" id="member-total">0</p></div>
                          <p class="text-sm">Peoples already registered Since Last 12 Months</p>
                      </div>
                  </div>
              </div>
              <div class="col-md-7">
                  <div id="users-chart" style="height:230px"></div>
              </div>
          </div>
      </div>
  </div>

  <div class="panel">

      <!--Chart information-->
      <div class="panel-body">
          <div class="row mar-top">
              <div class="col-md-5">
                  <h3 class="text-main text-normal text-2x mar-no">Collection Stats</h3>
                  <h5 class="text-uppercase text-muted text-normal">Report for last 12 Months</h5>
                  <div class="row mar-top">
                      <div class="col-sm-7">
                          <table class="table table-condensed table-trans">
                              <tr>
                                  <td class="text-lg" style="width: 40px"><span class="badge badge-purple">N30,254</span></td>
                                  <td>Offering</td>
                              </tr>
                              <tr>
                                  <td class="text-lg"><span class="badge badge-dark">N70,400</span></td>
                                  <td>Seed Offering</td>
                              </tr>
                              <tr>
                                  <td class="text-lg"><span class="badge badge-danger">N22,305</span></td>
                                  <td>Tithe</td>
                              </tr>
                          </table>
                      </div>
                      <div class="col-sm-5 text-center">
                          <div class="text-lg"><p class="text-5x text-thin text-main mar-no">520</p></div>
                          <p class="text-sm">Since Last 12 Month N190 were collected</p>
                      </div>
                  </div>
              </div>
              <div class="col-md-7">
                  <div id="collection-chart" style="height:230px"></div>
              </div>
          </div>
      </div>
  </div>

  <div class="panel">

      <!--Chart information-->
      <div class="panel-body">
          <div class="row mar-top">
              <div class="col-md-5">
                  <h3 class="text-main text-normal text-2x mar-no">Attendance Stats</h3>
                  <h5 class="text-uppercase text-muted text-normal">Report for last 12 Months</h5>
                  <div class="row mar-top">
                      <div class="col-sm-7">
                          <table class="table table-condensed table-trans">
                              <tr>
                                  <td class="text-lg" style="width: 40px"><span class="badge badge-purple" id="attendance-male">0</span></td>
                                  <td>Male</td>
                              </tr>
                              <tr>
                                  <td class="text-lg"><span class="badge badge-dark" id="attendance-female">0</span></td>
                                  <td>Female</td>
                              </tr>
                              <tr>
                                  <td class="text-lg"><span class="badge badge-danger" id="attendance-children">0</span></td>
                                  <td>Children</td>
                              </tr>
                          </table>
                      </div>
                      <div class="col-sm-5 text-center">
                          <div class="text-lg"><p class="text-5x text-thin text-main mar-no" id="attendance-total">0</p></div>
                          <p class="text-sm">Attendances were recorded since last 12 months</p>
                      </div>
                  </div>
              </div>
              <div class="col-md-7">
                  <div id="attendance-chart" style="height:230px"></div>
              </div>
          </div>
      </div>
  </div>

  <div class="row">
      <div class="col-lg-3">
          <div class="row">
              <div class="col-sm-3 col-lg-6">

                  <!--Tile-->
                  <!--===================================================-->
                  <div class="panel panel-primary panel-colorful">
                      <div class="pad-all text-center">
                        <span class="text-3x text-thin">{{\App\User::all()->count()}}</span>
                        <p>Parishes</p>
                        <i class="icofont icofont-building-alt text-success"></i>
                      </div>
                  </div>
                  <!--===================================================-->


                  <!--Tile-->
                  <!--===================================================-->
                  <div class="panel panel-warning panel-colorful">
                      <div class="pad-all text-center">
                        <span class="text-3x text-thin">{{$total['members']}}</span>
                        <p>Members</p>
                        <i class="icofont icofont-ui-user-group text-success"></i>
                      </div>
                  </div>
                  <!--===================================================-->

              </div>
              <div class="col-sm-3 col-lg-6">

                  <!--Tile-->
                  <!--===================================================-->
                  <div class="panel panel-purple panel-colorful">
                      <div class="pad-all text-center">
                          <span class="text-3x text-thin">{{$total['workers']}}</span>
                          <p>Workers</p>
                          <i class="icofont icofont-workers-group text-success"></i>
                      </div>
                  </div>
                  <!--===================================================-->


                  <!--Tile-->
                  <!--===================================================-->
                  <div class="panel panel-dark panel-colorful">
                      <div class="pad-all text-center">
                        <span class="text-3x text-thin">{{$total['pastors']}}</span>
                        <p>Pastors</p>
                        <i class="icofont icofont-man-in-glasses text-success"></i>
                      </div>
                  </div>
                  <!--===================================================-->

              </div>
              <div class="col-sm-6 col-lg-12">
                <div class="pad-all">
                    <span class="pad-ver text-main text-sm text-uppercase text-bold">Total Earning</span>
                    <p class="text-sm">December 17, 2017</p>
                    <p class="text-2x text-main">$798.54</p>
                    <button class="btn btn-block btn-success mar-top">Payout</button>
                </div>
                <hr class="new-section-xs">


              </div>
          </div>
      </div>

      <?php
      $celebs = []; $i = 1;
      foreach ($members as $key => $member) {
        // code...
        if (date('F', (strtotime($member->dob))) == date('F') || date('F', (strtotime($member->wedding_anniversary))) == date('F')  ) {
          array_push($celebs, $member); }
      }
      ?>
      <div class="col-lg-9">
          <div class="panel">
            <div class="panel-heading"> <!--body text-center"-->
                <h3 class="panel-title"><strong>Birthday(s) For <?php echo date('F Y'); ?></strong> </h3>
                <!--i class="demo-pli-coin icon-4x"></i-->
            </div>
              <div class="panel-body text-center clearfix">
                @if(count($celebs) > 0)
                  <div class="table-responsive">
                      <table class="table table-vcenter mar-top">
                          <thead>
                              <tr>
                                  <th class="min-w-td">#</th>
                                  <th class="min-w-td">User</th>
                                  <th class="text-center">Full Name</th>
                                  <th class="text-center">Email</th>
                                  <th class="text-center">Status</th>
                                  <th class="text-center">Role</th>
                                  <th class="text-center">Date</th>
                              </tr>
                          </thead>
                          <tbody>
                            @foreach ($celebs as $member)
                            @if(date('F', (strtotime($member->dob))) == date('F'))
                              <tr>
                                  <td class="min-w-td">{{$i}}</td>
                                  <td class="text-center"><img src="{{url('/public/images/')}}/{{$member->photo}}" alt="{{$member->firstname}} image" class="img-circle img-sm"></td>
                                  <td class="text-center"><a class="btn-link" href="#">{{ucwords($member->getFullname())}}</a></td>
                                  <td class="text-center">{{$member->email}}</td>
                                  <td class="text-center">
                                    @if((int)substr(date('jS'),0,2) <= (int)substr(date('jS', strtotime($member->dob)), 0,2))
                                  <span class="label label-table label-success">Upcoming</span>
                                  @else
                                  <span class="label label-table label-purple">Past</span>
                                  @endif
                                  </td>
                                  <td class="text-center"><span class="label label-table label-info">{{ucwords($member->position)}}</span></td>
                                  <td class="text-center">
                                      <div class="btn-group">
                                        {{date('jS', strtotime($member->dob))}}
                                      </div>
                                  </td>
                              </tr>
                              <?php $i++; ?>
                              @endif
                              @endforeach

                          </tbody>
                      </table>
                      <hr>
                      <!--Pagination-->
                  </div>
                  @else
                  <p class="text-danger"> No Birthday </p>
                  @endif
              </div>
          </div>
      </div>

      <div class="col-lg-9">
          <div class="panel">
            <div class="panel-heading"> <!--body text-center"-->
                <h3 class="panel-title"><strong>Wedding Anniversarie(s) For <?php echo date('F Y'); $i = 1; ?></strong> </h3>
                <!--i class="demo-pli-coin icon-4x"></i-->
            </div>
              <div class="panel-body text-center clearfix">
                @if(count($celebs) > 0)
                  <div class="table-responsive">
                      <table class="table table-vcenter mar-top">
                          <thead>
                              <tr>
                                  <th class="min-w-td">#</th>
                                  <th class="min-w-td">User</th>
                                  <th class="text-center">Full Name</th>
                                  <th class="text-center">Email</th>
                                  <th class="text-center">Status</th>
                                  <th class="text-center">Role</th>
                                  <th class="text-center">Date</th>
                              </tr>
                          </thead>
                          <tbody>
                            @foreach ($celebs as $member)
                            @if(date('F', (strtotime($member->wedding_anniversary))) == date('F'))
                              <tr>
                                  <td class="min-w-td">{{$i}}</td>
                                  <td class="text-center"><img src="{{url('/public/images/')}}/{{$member->photo}}" alt="{{$member->firstname}} image" class="img-circle img-sm"></td>
                                  <td class="text-center"><a class="btn-link" href="#">{{ucwords($member->getFullname())}}</a></td>
                                  <td class="text-center">{{$member->email}}</td>
                                  <td class="text-center">
                                    @if((int)substr(date('jS'),0,2) <= (int)substr(date('jS', strtotime($member->wedding_anniversary)), 0,2))
                                  <span class="label label-table label-success">Upcoming</span>
                                  @else
                                  <span class="label label-table label-purple">Past</span>
                                  @endif
                                  </td>
                                  <td class="text-center"><span class="label label-table label-info">{{ucwords($member->position)}}</span></td>
                                  <td class="text-center">
                                      <div class="btn-group">
                                        {{date('jS', strtotime($member->wedding_anniversary))}}
                                      </div>
                                  </td>
                              </tr>
                              <?php $i++; ?>
                              @endif
                              @endforeach

                          </tbody>
                      </table>
                      <hr>
                      <!--Pagination-->
                  </div>
                  @else
                  <p class="text-danger"> No Anniversary </p>
                  @endif
              </div>
          </div>
      </div>

  </div>
  <?php $eventss = []; foreach ($events as $event)
    if($event->date >= now())
      array_push($eventss, $event)
  ?>
  <div class="col-md-10 col-md-offset-1">
      <div class="panel">
          <div class="panel-heading">
              <h1 class="text-bold panel-title">Upcoming Events for {{strtoupper(\Auth::user()->branchname)}}</h1>
          </div>
          <div class="nano" style="height:360px">
              <div class="nano-content">
                @foreach ($eventss as $event)
                  <div class="panel-body bord-btm">
                      <p class="text-bold text-main text-sm"># {{ucwords($event->title)}}</p>
                      <p class="pad-btm">{{ucwords($event->details)}}</p>
                      <a href="#" class="task-footer">
                          <span class="box-inline">
                              <label class="label label-warning"><i class="icofont-location-arrow"></i> {{$event->location}}</label>
                              <label class="label label-danger"><i class="icofont-user"></i> {{ucwords($event->by_who)}}</label>
                              <label class="label label-primary"><i class="icofont-stop-watch"></i> {{$event->date}}</label>
                              <label class="label label-info"><i class="icofont-wall-clock icon-fw text-main"></i> {{$event->time}}</label>
                              <!-- <span class="pad-rgt"><i class="demo-pli-like"></i> 45</span> -->
                          </span>
                          <span class="box-inline">
                            <label class="label label-purple"><i class="icofont-ui-user-group"></i> </label>
                            <?php
                            if(isset($event->assign_to)){
                              $emails = explode(',',$event->assign_to);
                              foreach($emails as $email){
                                $name = App\Member::getNameByEmail($email);
                                if($name){
                                  echo "<img class='img-xs img-circle' src='".url('/public/images/')."/".App\Member::getPhotoByEmail($email)."' alt='".ucwords($name)."'> ".ucwords($name).", ";
                                }
                              }
                          }else{
                            echo '<td>None</td>';
                          }
                            ?>
                              <!-- <img class="img-xs img-circle" src="img/profile-photos/8.png" alt="task-user">
                              Brenda Fuller -->
                          </span>
                      </a>
                  </div>
                @endforeach
              </div>
          </div>
          <div class="panel-footer text-right">
              <!-- <button class="btn btn-sm btn-Default">Load mre</button> -->
              @if(count($eventss) < 1)
                <p class="text-danger"> No Event </p>
              @endif
              <button class="btn btn-sm btn-primary"><i class="icofont icofont-plus m-r-0"></i></button>
          </div>
      </div>
  </div>

  <div class="row">
    <div class="col-md-10 col-md-offset-1">

         <div class="row">
            <div class="col-sm-12">
              <div class="panel" style="background-color: #e8ddd3;">

                  <!-- Striped Table -->
                  <!--===================================================-->
                  <div class="panel-body">


                  </div>
                  <!--===================================================-->
                  <!-- End Striped Table -->
              </div>
          </div>
      </div>
    </div>

  </div>


</div>
    <!--===================================================-->
    <!--End page content-->

</div>
@endsection

@section('js')
<script src="{{URL::asset('plugins/flot-charts/jquery.flot.min.js')}}"></script>
<script>
// let male = [["Jan", 0], ["Feb", 0], ["Mar", 0], ["Apr", 0], ["May", 0], ["Jun", 0], ["Jul", 0], ["Aug", 0], ["Sep", 0], ["Oct", 0], ["Nov", 0], ["Dec", 0]];
// female = [["Jan", 0], ["Feb", 0], ["Mar", 0], ["Apr", 0], ["May", 0], ["Jun", 0], ["Jul", 0], ["Aug", 0], ["Sep", 0], ["Oct", 0], ["Nov", 0], ["Dec", 0]];
var monthName = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov","Dec"]
var months = []
let incr = 11
let i = 0
while (incr >= 0) {
  let makeDate = new Date();
  months[incr] = monthName[new Date(makeDate.setMonth(makeDate.getMonth() - i)).getMonth()]; //1 week ago
  i++; incr--
}
function setPeriod(data, totalObj, dataKey){
  let newarr = dataKey.map(() => [])
  // console.log(newarr);
  newarr.total = totalObj
  newarr.total.total = 0
  let i = 0;
    data.map((v) => {
      // push array to the first index of the new array
      dataKey.map((key,l) => {
        newarr[l].push([i, parseInt(v[key])])
        // calculate each datakey
        newarr.total[key] += parseInt(v[key])
        // calculate total
        newarr.total.total += parseInt(v[key])
      })
      i++
    })

  return newarr
}

$(document).ready(() => {
  // get member registration statistics
  $.ajax({url: "{{route('member.reg.stats')}}"})
  .done((res) => {
    members = setPeriod(res, {male: 0, female: 0, total: 0}, ["male", "female"])
    // display calulations
    $("#member-male").html(members.total.male)
    $("#member-female").html(members.total.female)
    $("#member-total").html(members.total.total)
    // console.log(members);
    $.plot("#users-chart", members, {
        series: {
            stack: 1,
            lines: {
                show: false,
                fill: true,
                steps: false
            },
            bars: {
                show: true,
                lineWidth: 0,
                barWidth: .7,
                fillColor: { colors: [ { opacity: .9 }, { opacity: .9 } ] }
            }
        },
        colors: ['#ab47bc', '#3a444e', '#ff0000'],
        grid: {
            borderWidth: 0,
            hoverable: true,
            clickable: true
        },
        yaxis: {
            ticks: 4,
             tickColor: '#f0f7fa'
        },
        xaxis: {
            ticks: 12,
            tickColor: '#ffffff'
        }
    });
    // console.log(male);
    // console.log(res);
  })

  // get attendance statistics
  $.ajax({url: "{{route('attendance.stats')}}"})
  .done((res) => {
    attendance = setPeriod(res, {male: 0, female: 0, children: 0, total: 0}, ["male", "female", "children"])
    // display calulations
    $("#attendance-male").html(attendance.total.male)
    $("#attendance-female").html(attendance.total.female)
    $("#attendance-children").html(attendance.total.children)
    $("#attendance-total").html(attendance.total.total)
    console.log(attendance.length);
    $.plot("#attendance-chart", attendance, {
        series: {
            stack: 1,
            lines: {
                show: false,
                fill: true,
                steps: false
            },
            bars: {
                show: true,
                lineWidth: 0,
                barWidth: .7,
                fillColor: { colors: [ { opacity: .9 }, { opacity: .9 } ] }
            }
        },
        colors: ['#ab47bc', '#3a444e', '#ff0000'],
        grid: {
            borderWidth: 0,
            hoverable: true,
            clickable: true
        },
        yaxis: {
            ticks: 4,
             tickColor: '#f0f7fa'
        },
        xaxis: {
            ticks: 12,//attendance[0].length,
            tickColor: '#ffffff'
        }
    });
    // console.log(attendance);
    // console.log(res);
  })

  // $.ajax({url: "{{route('member.reg.stats')}}"})
  // .done((res) => {
  //   console.log(res);
  // })

  $.ajax({url: "{{route('member.analysis')}}", data: {'interval': 8, 'group': 'month', 'id': 59}})
  .done((res) => {
    let dd1 = []; dd2 = []
    res.map((v) => {
      dd1.push([v.y, v.Offering])
      dd1.push([v.y, v.Building_Collection])
    })
    // console.log(dd1,dd2);
    // console.log(res);
  })
  var d1 = [["Jan", 85], ["Feb", 45], [2, 58], [3, 35], [4, 95], [5, 25], [6, 65], [7, 12], [8, 52], [9, 25], [10, 98], [11, 85], [12, 96]],
      d2 = [["Jan", 520], ["Feb", 370], [2, 820], [3, 209], [4, 495], [5, 170], [6, 185], [7, 273], [8, 304], [9, 877], [10, 489], [11, 420], [12, 710]],
      d3 = [["Jan", 50], ["Feb", 30], [2, 80], [3, 29], [4, 95], [5, 70], [6, 15], [7, 73], [8, 34], [9, 87], [10, 49], [11, 20], [12, 70]];
      // console.log([d1, d2, d3]);
      //
      // $.plot("#users-chart", [ d1, d2, d3 ], {
      //     series: {
      //         stack: 1,
      //         lines: {
      //             show: false,
      //             fill: true,
      //             steps: false
      //         },
      //         bars: {
      //             show: true,
      //             lineWidth: 0,
      //             barWidth: .7,
      //             fillColor: { colors: [ { opacity: .9 }, { opacity: .9 } ] }
      //         }
      //     },
      //     colors: ['#3a444e', '#ab47bc', '#ff0000'],
      //     grid: {
      //         borderWidth: 0,
      //         hoverable: true,
      //         clickable: true
      //     },
      //     yaxis: {
      //         ticks: 4, tickColor: '#f0f7fa'
      //     },
      //     xaxis: {
      //         ticks: 12,
      //         tickColor: '#ffffff'
      //     }
      // });


  // collection
  $.plot("#collection-chart", [ d1, d2, d3 ], {
      series: {
          stack: 1,
          lines: {
              show: false,
              fill: true,
              steps: false
          },
          bars: {
              show: true,
              lineWidth: 0,
              barWidth: .7,
              fillColor: { colors: [ { opacity: .9 }, { opacity: .9 } ] }
          }
      },
      colors: ['#3a444e', '#ab47bc', '#ff0000'],
      grid: {
          borderWidth: 0,
          hoverable: true,
          clickable: true
      },
      yaxis: {
          ticks: 4, tickColor: '#f0f7fa'
      },
      xaxis: {
          ticks: 12,
          tickColor: '#ffffff'
      }
  });

  // Attendnace
  $.plot("#attendance-chart", [ d1, d2, d3 ], {
      series: {
          stack: 1,
          lines: {
              show: false,
              fill: true,
              steps: false
          },
          bars: {
              show: true,
              lineWidth: 0,
              barWidth: .7,
              fillColor: { colors: [ { opacity: .9 }, { opacity: .9 } ] }
          }
      },
      colors: ['#3a444e', '#ab47bc', '#ff0000'],
      grid: {
          borderWidth: 0,
          hoverable: true,
          clickable: true
      },
      yaxis: {
          ticks: 4, tickColor: '#f0f7fa'
      },
      xaxis: {
          ticks: 12,
          tickColor: '#ffffff'
      }
  });

})
</script>
@endsection
