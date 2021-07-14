@extends('layouts.app')

@section('title') Dashboard @endsection

@section('link')
<!--custom.css [ OPTIONAL ]-->
<link href="{{ URL::asset('css/custom.css') }}" rel="stylesheet">
<link href="{{ URL::asset('css/stylemashable.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{URL::asset('css/icofont.min.css')}}">
<link href="{{ URL::asset('plugins/datatables/media/css/dataTables.bootstrap.css') }}" rel="stylesheet">
<link href="{{ URL::asset('plugins/bootstrap-select/bootstrap-select.min.css') }}" rel="stylesheet">
<style media="screen">
.icofont{
  font-size: 35px;
}
</style>
@endsection

@section('content')
@include('layouts.helpers.colors')
<!--CONTENT CONTAINER-->
<?php $user = Auth::user(); $money = function($number){ return \Auth::user()::toMoney((float) $number); } ?>
<?php
$colors = colo();//$generateColor($c_types);
?>
<!--===================================================-->
<div id="content-container">
  <div id="page-head">
    <hr class="new-section-sm bord-no">
    <div class="text-center">
      <h3>Welcome to <strong>{{strtoupper($user->branchname)}}</strong> Dashboard.</h3>
      <!--<p>Check out your past searches and the content you’ve browsed in. <a href="dashboard" class="btn-link">View last results</a></p>-->
    </div>
    <!-- <hr class="new-section-md bord-no"> -->
  </div>
    <!--Page content-->
    <!--===================================================-->
  <div id="page-content">
    <div class="row" >
     @include('layouts.error')
      <style>
      .img-center {        display: block;        margin-left: auto;        margin-right: auto;        width: 80%;      }
      </style>
    </div>

  <div class="panel">
    <div class="panel-body">
      <div class="row mar-top">
        <!--Tile-->
        <!--===================================================-->
        <div class=" panel-primary panel-colorful col-md-3 col-xs-6">
            <div class="pad-all text-center">
              <span class="text-3x text-thin">{{\App\User::all()->count()}}</span>
              <p>Parishes</p>
              <i class="icofont icofont-building-alt text-success"></i>
            </div>
        </div>
        <!--===================================================-->


        <!--Tile-->
        <!--===================================================-->
        <div class=" panel-warning panel-colorful col-md-3 col-xs-6">
            <div class="pad-all text-center">
              <span class="text-3x text-thin">{{$total['members']}}</span>
              <p>Members</p>
              <i class="icofont icofont-ui-user-group text-success"></i>
            </div>
        </div>
        <!--===================================================-->


        <!--Tile-->
        <!--===================================================-->
        <div class=" panel-purple panel-colorful col-md-3 col-xs-6">
            <div class="pad-all text-center">
                <span class="text-3x text-thin">{{$total['workers']}}</span>
                <p>Workers</p>
                <i class="icofont icofont-workers-group text-success"></i>
            </div>
        </div>
        <!--===================================================-->


        <!--Tile-->
        <!--===================================================-->
        <div class=" panel-dark panel-colorful col-md-3 col-xs-6">
            <div class="pad-all text-center">
              <span class="text-3x text-thin">{{$total['pastors']}}</span>
              <p>Pastors</p>
              <i class="icofont icofont-man-in-glasses text-success"></i>
            </div>
        </div>
      </div>
    </div>
  </div>

  <div class="panel">

      <!--Chart information-->
      <div class="panel-body">
          <div class="row mar-top">
              <div class="col-md-4 text-center">
                  <h3 class="text-main text-normal text-2x mar-no">Member Stats</h3>
                  <!-- <h5 class="text-uppercase text-muted text-normal">Report for last 12 Months</h5> -->
                  <div class="row mar-top">
                    <div class="col">
                        <table class="table table-condensed table-trans">
                            <tr>
                                <td class="text-lg" style="width: 40px">
                                  <span class="badge badge-purple" style="background-color: {{$colors[0]}}" id="member-male">0</span></td>
                                <td>Male</td>
                            </tr>
                            <tr>
                                <td class="text-lg">
                                  <span class="badge badge-dark" style="background-color: {{$colors[1]}}" id="member-female">0</span></td>
                                <td>Female</td>
                            </tr>
                            <hr>
                            <tr>
                              <td>
                                <div class="text-sm"><p class="text-5x text-thin text-main mar-no"><span class="badge badge-primary" id="member-total">N0</span></p></div>
                              </td>
                            </tr>
                        </table>
                    </div>
                  </div>
              </div>
              <div class="col-md-8">
                  <div id="users-chart" style="height:230px"></div>
              </div>
          </div>
      </div>
  </div>

  <div class="panel">
    <div id="manual-analysis-hd" class="text-center bg-primary">
    </div>
      <!--Chart information-->
      <div class="panel-body">
          <div class="row mar-top">
              <div class="col-md-4">
                  <h3 class="text-main text-normal text-2x mar-no">Collection Stats</h3>
                  <!-- <h5 class="text-uppercase text-muted text-normal">Report for last 12 Months</h5> -->
                  <div class="row mar-top">
                      <div class="col">
                          <table class="table table-condensed table-trans">
                            <?php $i = 0; ?>
                            @foreach($c_types as $type)
                            <tr>
                                <td class="text-lg" style="width: 40px"><span style="background-color: {{$colors[$i]}}"
                                  class="badge badge-purple" id="collection-{{$type->name}}">N0</span></td>
                                <td>{{$type->disFormatString()}}</td>
                            </tr>
                            <?php $i++; ?>
                            @endforeach
                            <hr>
                            <tr>
                              <td>
                                <div class="text-sm"><p class="text-5x text-thin text-main mar-no">
                                  <span class="badge badge-primary" id="collection-total">N0</span></p>
                                </div>
                              </td>
                            </tr>
                          </table>
                      </div>
                  </div>
              </div>
              <?php $isAdmin = auth()->user()->isAdmin(); ?>
              <div class="col-md-8">
                <div class="row">
                  @if($isAdmin)
                  <div class="col-xs-{{$isAdmin ? '4' : '6'}}">
                    <label for="show" class="">Show</label>
                    <select id="show" required style="outline:none;" name="sort" class="selectpicker col-md-12" data-style="btn-primary">
                      <option selected value="false">This Parish</option>
                      <option value="true">All Parishes</option>
                    </select>
                  </div>
                  @endif
                  <div class="col-xs-{{$isAdmin ? '4' : '6'}}">
                    <label for="group" class="">Group By</label>
                    <select id="group" required style="outline:none;" name="sort" class="selectpicker col-md-12" data-style="btn-primary">
                      <option value="1">Days</option>
                      <option value="2">Weeks</option>
                      <option selected value="3">Months</option>
                      <option value="4">Years</option>
                    </select>
                  </div>
                  <div class="col-xs-{{$isAdmin ? '4' : '6'}}">
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
                  <!-- <div id="collection-chart" style="height:230px"></div> -->
              </div>
          </div>
      </div>
  </div>

  <div class="panel">

      <!--Chart information-->
      <div class="panel-body">
          <div class="row mar-top">
              <div class="col-md-4">
                  <h3 class="text-main text-normal text-2x mar-no">Attendance Stats</h3>
                  <!-- <h5 class="text-uppercase text-muted text-normal">Report for last 12 Months</h5> -->
                  <div class="row mar-top">
                      <div class="col">
                          <table class="table table-condensed table-trans">
                              <tr>
                                  <td class="text-lg" style="width: 40px">
                                    <span class="badge badge-purple" style="background-color: {{$colors[0]}}" id="attendance-male">0</span></td>
                                  <td>Male</td>
                              </tr>
                              <tr>
                                  <td class="text-lg">
                                    <span class="badge badge-dark" style="background-color: {{$colors[1]}}" id="attendance-female">0</span></td>
                                  <td>Female</td>
                              </tr>
                              <tr>
                                  <td class="text-lg">
                                    <span class="badge badge-danger" style="background-color: {{$colors[2]}}" id="attendance-children">0</span></td>
                                  <td>Children</td>
                              </tr>
                              <hr>
                              <tr>
                                <td>
                                  <div class="text-sm"><p class="text-5x text-thin text-main mar-no"><span class="badge badge-primary" id="attendance-total">N0</span></p></div>
                                </td>
                              </tr>
                          </table>
                      </div>
                  </div>
              </div>
              <div class="col-md-8">
                  <div id="attendance-chart" style="height:230px"></div>
              </div>
          </div>
      </div>
  </div>

  <div class="row">
    <?php
    $celebs = []; $i = 1;
    foreach ($members as $key => $member) {
      // code...
      if (date('F', (strtotime($member->dob))) == date('F') || date('F', (strtotime($member->wedding_anniversary))) == date('F')  ) {
        array_push($celebs, $member); }
    }
    ?>
    <div class="col-md-6">
        <div class="panel">
          <div class="panel-heading"> <!--body text-center"-->
              <h3 class="panel-title"><strong>Wedding Anniversarie(s) For <?php echo date('F Y'); $i = 1; ?></strong> </h3>
              <!--i class="demo-pli-coin icon-4x"></i-->
          </div>
            <div class="panel-body text-center clearfix">
              @if(count($celebs) > 0)
                <div class="table-responsive">
                    <table id="anniversaries" class="table table-vcenter mar-top">
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
                                <td class="text-center"><img src="{{url('images/')}}/{{$member->photo}}" alt="{{$member->firstname}} image" class="img-circle img-sm"></td>
                                <td class="text-center"><a class="btn-link" href="{{$member->profile()}}">{{ucwords($member->getFullname())}}</a></td>
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


      <div class="col-md-6">
          <div class="panel">
            <div class="panel-heading"> <!--body text-center"-->
                <h3 class="panel-title"><strong>Birthday(s) For <?php echo date('F Y'); ?></strong> </h3>
                <!--i class="demo-pli-coin icon-4x"></i-->
            </div>
              <div class="panel-body text-center clearfix">
                @if(count($celebs) > 0)
                  <div class="table-responsive">
                      <table id="dobs" class="table table-vcenter mar-top">
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
                                  <td class="text-center"><img src="{{url('images/')}}/{{$member->photo}}" alt="{{$member->firstname}} image" class="img-circle img-sm"></td>
                                  <td class="text-center"><a class="btn-link" href="{{$member->profile()}}">{{ucwords($member->getFullname())}}</a></td>
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
  </div>

  <div class="panel">
    <div class="panel-body">
      <div class="row mar-top">
        <div class="col-md-3">
          <div class="pad-all text-center">
              <span class="pad-ver text-main text-sm text-uppercase text-bold">Total Due Collections Commission</span>
              <p class="text-sm">{{date('dS F Y', strtotime( NOW() ) )}}</p>
              <p class="text-2x text-main"><span id="due-commission">0</span> </p>
              <a href="{{route('branch.invoice')}}" class="btn btn-block btn-success mar-top">Pay Now</a>
          </div>
          <hr class="new-section-xs">


        </div>

        <div class="col-md-{{($user->isAdmin()) ? 5 : 9}}">
          <h3 class="text-center">Due Collections</h3>
          <div class="table-responsive">
            <table id="due-collection" class="table table-sm table-striped table-bordered nowrap">
              <thead>
                <tr class="bg-success">
                  <th>Date</th>
                  <th>Service Type</th>
                  <th>Amount</th>
                  <th>Commission {{$percentage}}%</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 0; $totalCommission = 0; $amount = 0; $branch_id = $user->id; ?>
                @if(isset($dueSavings[$branch_id]))
                @foreach($dueSavings[$branch_id] as $savings)
                <tr>
                  <td>{{$savings->date_collected}}</td>
                  <td>{{$savings->service_types}}</td>
                  <td>{{$money($savings->total)}}</td>
                  <?php $i++; $commission = (float)($savings->total * ($percentage / 100)); $totalCommission += $commission; $amount += $savings->total; ?>
                  <td>{{$money($commission)}}</td>
                </tr>
                @endforeach
                @endif
              </tbody>
              <tfoot>
                <tr class="bg-dark">
                  <th>Total</th>
                  <th></th>
                  <th>{{$money($amount)}}</th>
                  <th>{{$money($totalCommission)}}</th>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>

        @if($user->isAdmin())
        <div class="col-md-4">
          <h3 class="text-center">Parishes Owning</h3>
          <div class="table-responsive">
            <table id="owning-table" class="table table-sm table-striped table-bordered nowrap">
              <thead>
                <tr class="bg-success">
                  <th>Name</th>
                  <th>Amount</th>
                </tr>
              </thead>
              <tbody>
                <?php $totalCommission = 0; ?>
                @foreach($allDueSavings as $branch_id => $commission)
                <tr>
                  <td>{{ucwords($user->getUserById($branch_id)->branchname)}}</td>
                  <?php $totalCommission += $commission; ?>
                  <td>{{$money($commission)}}</td>
                </tr>
                @endforeach
              </tbody>
              <tfoot>
                <tr class="bg-dark">
                  <th>Total</th>
                  <th>{{$money($totalCommission)}}</th>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
        @endif
      </div>
    </div>
  </div>

  <div class="row">
      <?php $eventss = []; foreach ($events as $event)
        if($event->date >= now())
          array_push($eventss, $event)
      ?>
      <div class="col-md-6">
          <div class="panel">
              <div class="panel-heading">
                <h1 class="text-bold text-center ji">Upcoming Events for {{strtoupper($user->branchname)}}</h1>
              </div>
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
                                      echo "<img class='img-xs img-circle' src='".url('images/')."/".App\Member::getPhotoByEmail($email)."' alt='".ucwords($name)."'> ".ucwords($name).", ";
                                    }
                                  }
                              }else{
                                echo '<td>None</td>';
                              }
                                ?>
                              </span>
                          </a>
                      </div>
                    @endforeach
              <div class="panel-footer text-center">
                  <!-- <button class="btn btn-sm btn-Default">Load mre</button> -->
                  @if(count($eventss) < 1)
                    <p class="text-danger" > No Event </p>
                  @endif
                  <button onclick="window.location.replace(`{{route('calendar')}}`)" class="btn btn-sm btn-primary"><i class="icofont icofont-plus m-r-0"></i></button>
              </div>
          </div>
      </div>

      <div class="col-md-6">
        @if(session()->has('message.level'))
         <div class="alert alert-{{ session('message.level') }}">
         {!! session('message.content') !!}
         </div>
         @endif
          <div class="panel">
              <div class="panel-heading">
                  <h1 class="text-bold text-center ji">Announcement Board</h1>
              </div>
                    @if (count($eventsall) > 0)
                    @foreach ($eventsall as $event)
                    <?php $sql ="DELETE FROM announcements WHERE (start_date <= CURDATE())  "; \DB::delete($sql); ?>
                    @if ($event->start_date >= now())
                      <div class="panel-body bord-btm">
                          <p class="text-bold text-main text-sm"># {{ucwords($event->branchname)}}</p>
                          <p class="pad-btm">{{ucwords($event->details)}}</p>
                          <a href="#" class="task-footer">
                              <span class="box-inline">
                                  <label class="label label-warning">From <i class="icofont-location-arrow"></i> {{$event->branchname}}</label>
                                  <label class="label label-danger">By <i class="icofont-user"></i> {{ucwords($event->by_who)}}</label>
                                  <!-- <label class="label label-primary">Start Date <i class="icofont-stop-watch"></i> {{$event->start_date}}</label>
                                  <label class="label label-primary">Start Time <i class="icofont-stop-watch"></i> {{$event->start_time}}</label>
                                  <label class="label label-info">End Date <i class="icofont-wall-clock icon-fw text-main"></i> {{$event->stop_date}}</label>
                                  <label class="label label-info">End Time <i class="icofont-wall-clock icon-fw text-main"></i> {{$event->stop_time}}</label> -->
                              </span>
                          </a>
                      </div>
                      @endif
                    @endforeach
                    @endif
              <div class="panel-footer text-center">
                @if(count($eventsall) < 1)
                  <p class="text-danger" > No New Announcement </p>
                @endif
                <button onclick="window.location.replace(`{{route('notification')}}`)" class="btn btn-sm btn-primary"><i class="icofont icofont-plus m-r-0"></i></button>
              </div>
          </div>
      </div>
  </div>


  <div class="row">
    @if(auth()->user()->isAdmin())
    <div class="col-xs-12">
        <div class="panel">
            <div class="panel-heading">
              <h1 class="text-bold text-center ji">Payment Status</h1>
            </div>

            <!--Data Table-->
            <!--===================================================-->
            <div class="panel-body">
                <div class="table-responsive">
                    <table id="order-table" class="table table-striped">
                        <thead>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
            <!--===================================================-->
            <!--End Data Table-->

        </div>
    </div>
    @endif
    <div class="col-md-12">

         <div class="row">
            <div class="col-sm-12">
              <div class="panel" style="background-color: #e8ddd3;">

                  <!-- Striped Table -->
                  <!--===================================================-->
                  <!-- <div class="panel-body">
                    <div class="" style="width: 100%; height: 500px;" id="map-area">
                      { !  ! Mapper::render() !!}
                    </div>
                  </div> -->
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
<script src="{{ URL::asset('plugins/datatables/media/js/jquery.dataTables.js') }}"></script>
<script src="{{ URL::asset('plugins/datatables/media/js/dataTables.bootstrap.js') }}"></script>
<script src="{{ URL::asset('plugins/bootstrap-select/bootstrap-select.min.js') }}"></script>
<!--Morris.js [ OPTIONAL ]-->
<script src="{{ URL::asset('plugins/morris-js/morris.min.js') }}"></script>
<script src="{{ URL::asset('plugins/morris-js/raphael-js/raphael.min.js') }}"></script>
<script src="{{ URL::asset('js/functions.js') }}"></script>
@include('layouts.helpers.collection-stat')
<script>
// let male = [["Jan", 0], ["Feb", 0], ["Mar", 0], ["Apr", 0], ["May", 0], ["Jun", 0], ["Jul", 0], ["Aug", 0], ["Sep", 0], ["Oct", 0], ["Nov", 0], ["Dec", 0]];
// female = [["Jan", 0], ["Feb", 0], ["Mar", 0], ["Apr", 0], ["May", 0], ["Jun", 0], ["Jul", 0], ["Aug", 0], ["Sep", 0], ["Oct", 0], ["Nov", 0], ["Dec", 0]];
var monthName = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov","Dec"]
var colors = [<?php barColors($colors); ?>];
var months = []
let incr = 11
let i = 0
while (incr >= 0) {
  let makeDate = new Date();
  months[incr] = monthName[new Date(makeDate.setMonth(makeDate.getMonth() - i)).getMonth()]; //1 week ago
  i++; incr--
}
// console.log(months);
var ticks = []
months.map((v,i) => {
 ticks.push([i, v])
})
function setPeriod(data, totalObj, dataKey){
  let newarr = dataKey.map(() => [])
  // console.log(newarr);
  newarr.total = totalObj
  newarr.total.total = 0
  let i = 0;
    data.map((v) => {
      // push array to the first index of the new array
      dataKey.map((key,l) => {
        // get the index of the data month from months array
        // let getDIndex = 12 - v['month']
        // console.log(getDIndex, v['month']);
        newarr[l].push([v['month'], parseInt(v[key])])
        // newarr[l][v['month']] = [v['month'], parseInt(v[key])]
        // newarr[l].push([getDIndex, parseInt(v[key])])
        // calculate each datakey
        newarr.total[key] += parseInt(v[key])
        // calculate total
        newarr.total.total += parseInt(v[key])
      })
      i++
    })
// console.log(newarr);
  return newarr
}

function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

function formatMoney(number) {
  return number.toLocaleString('en-US', { style: 'currency', currency: '{{$currency->currency_code}}' });
}

$(document).ready(() => {
  // get branch due commision
  $.ajax({url: "{{route('branch.unsettled')}}"})
  .done((res) => {
    $('#due-commission').html(formatMoney(parseFloat(res)))
  })
  // get member registration statistics
  $.ajax({url: "{{route('member.reg.stats')}}"})
  .done((res) => {
    members = setPeriod(res, {male: 0, female: 0, total: 0}, ["male", "female"])
    // display calulations
    $("#member-male").html(numberWithCommas(members.total.male))
    $("#member-female").html(numberWithCommas(members.total.female))
    $("#member-total").html(numberWithCommas(members.total.total))
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
        colors: colors,
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
            ticks: ticks,
            tickColor: '#ffffff'
        },
    });
    // console.log(male);
    // console.log(res);
  })

  // get attendance statistics
  $.ajax({url: "{{route('attendance.stats')}}"})
  .done((res) => {
    attendance = setPeriod(res, {male: 0, female: 0, children: 0, total: 0}, ["male", "female", "children"])
    console.log(attendance);
    // display calulations
    $("#attendance-male").html(numberWithCommas(attendance.total.male))
    $("#attendance-female").html(numberWithCommas(attendance.total.female))
    $("#attendance-children").html(numberWithCommas(attendance.total.children))
    $("#attendance-total").html(numberWithCommas(attendance.total.total))
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
        colors: colors,
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
            ticks: ticks,//attendance[0].length,
            tickColor: '#ffffff'
        }
    });
  })

  // get member registration statistics
  $.ajax({url: "{{route('collection.stats')}}"})
  .done((res) => {
    collections = (() => {
      let newarr = []
      let dataKey = <?php echo json_encode($c_types) ?>;
      newarr.total = {total: 0}
      // console.log(newarr);
      dataKey.map((v) => { newarr.total[v.name] = 0; newarr.push([])})
      let i = 0;
        res.map((v) => {
          // push array to the first index of the new array
          dataKey.map((key,l) => {
            // get the index of the data month from months array
            newarr[l].push([v['month'], parseInt(v[key.name])])
            // calculate each datakey
            newarr.total[key.name] += parseInt(v[key.name])
            // calculate total
            newarr.total.total += parseInt(v[key.name])
          })
          i++
        })

        return newarr
    })()

    $.plot("#collection-chart", collections, {
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
        colors: colors,
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
            ticks: ticks,
            tickColor: '#ffffff'
        },
    });
    // console.log(male);
    // console.log(res);
  })
  // plot datatables
  $('#owning-table').DataTable()
  $('#due-collection').DataTable()
  $('#dobs').DataTable()
  $('#anniversaries').DataTable()
  $('#order-table').DataTable({
    processing: true,
    serverSide: true,
    "columnDefs": [
      { "orderable": false, "targets": 0 }
    ],
    oLanguage: {sProcessing: `loading...`},
    ajax: "{{route('payments.index')}}",
    columns: [
      { title: 'Invoice', data: 'id', render : ( data ) => (`Order #${data}`), name: 'reference' },
      { title: 'Branch', data: 'users.branchname', name: 'branchname'},
      { title: 'Order Date', data: {payed_at: 'payed_at', created_at: 'created_at'}, name: 'payed_at', render : ( data ) => (`${data.payed_at ? data.payed_at : data.created_at}`)},
      { title: 'Amount', data: 'amount', name: 'amount', render : ( data ) => (`${numberWithCommas(data)}`)},
      { title: 'Status', data: 'status', name: 'status', render : ( data ) => (`<td class="text-center">
        <div class="label label-table label-${data === '1' ? 'success' : data === 'pending' ? 'warning' : 'danger'}">${data === '1' ? 'Paid' : data }</div>
      </td>`),},
      { title: 'Reference', data: 'reference', name: 'reference'},
    ],
    dom: 'Bfrtip',
    lengthChange: false,
    // buttons: ['copy', 'excel', 'pdf', 'colvis']
  })
})
</script>
@endsection
