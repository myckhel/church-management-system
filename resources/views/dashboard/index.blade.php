@extends('layouts.app')

@section('title') Dashboard @endsection

@section('link')
<!--custom.css [ OPTIONAL ]-->
<link href="{{ URL::asset('css/custom.css') }}" rel="stylesheet">
<link href="{{ URL::asset('css/stylemashable.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{URL::asset('css/icofont.min.css')}}">
<link href="{{ URL::asset('plugins/datatables/media/css/dataTables.bootstrap.css') }}" rel="stylesheet">
<style media="screen">
.icofont{
  font-size: 35px;
}
</style>
@endsection

@section('content')
<!--CONTENT CONTAINER-->
<?php $user = Auth::user(); $money = function($number){ return \Auth::user()::toMoney((float) $number); } ?>
<?php
function random_color_part() {
  return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
}

function random_color() {
    return random_color_part() . random_color_part() . random_color_part();
}

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
              <div class="col-md-5">
                  <h3 class="text-main text-normal text-2x mar-no">Member Stats</h3>
                  <h5 class="text-uppercase text-muted text-normal">Report for last 12 Months</h5>
                  <div class="row mar-top">
                      <div class="col-sm-7">
                          <table class="table table-condensed table-trans">
                              <tr>
                                  <td class="text-lg" style="width: 40px">
                                    <span id="member-male" style="background-color: {{$colors[0]}}" class="badge badge-purple">0</span></td>
                                  <td>Male</td>
                              </tr>
                              <tr>
                                  <td class="text-lg">
                                    <span class="badge badge-dark" style="background-color: {{$colors[1]}}" id="member-female">0</span></td>
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
                            <?php $i = 0; ?>
                            @foreach($c_types as $type)
                            <tr>
                                <td class="text-lg" style="width: 40px"><span style="background-color: {{$colors[$i]}}"
                                  class="badge badge-purple" id="collection-{{$type->name}}">N0</span></td>
                                <td>{{$type->disFormatString()}}</td>
                            </tr>
                            <?php $i++; ?>
                            @endforeach
                          </table>
                      </div>
                      <div class="col-sm-5 text-center">
                          <div class="text-lg"><p class="text-5x text-thin text-main mar-no" id="collection-total">N0</p></div>
                          <p class="text-sm">Were collected since Last 12 Month </p>
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
                                <td class="text-center"><img src="{{url('/public/images/')}}/{{$member->photo}}" alt="{{$member->firstname}} image" class="img-circle img-sm"></td>
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
                                  <td class="text-center"><img src="{{url('/public/images/')}}/{{$member->photo}}" alt="{{$member->firstname}} image" class="img-circle img-sm"></td>
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
      <div class="col-xs-12 col-md-6">
          <div class="panel">
              <div class="panel-heading">
                  <h3 class="panel-title">Order Status</h3>
              </div>

              <!--Data Table-->
              <!--===================================================-->
              <div class="panel-body">
                  <div class="table-responsive">
                      <table id="order-table" class="table table-striped">
                          <thead>
                              <!-- <tr>
                                  <th>Invoice</th>
                                  <th>User</th>
                                  <th>Order date</th>
                                  <th>Amount</th>
                                  <th class="text-center">Status</th>
                                  <th class="text-center">Tracking Number</th>
                              </tr> -->
                          </thead>
                          <tbody>
                              <!-- <tr>
                                  <td><a href="#" class="btn-link"> Order #53431</a></td>
                                  <td>Steve N. Horton</td>
                                  <td><span class="text-muted"><i class="fa fa-clock-o"></i> Oct 22, 2014</span></td>
                                  <td>$45.00</td>
                                  <td class="text-center">
                                      <div class="label label-table label-success">Paid</div>
                                  </td>
                                  <td class="text-center">-</td>
                              </tr>
                              <tr>
                                  <td><a href="#" class="btn-link"> Order #53432</a></td>
                                  <td>Charles S Boyle</td>
                                  <td><span class="text-muted"><i class="fa fa-clock-o"></i> Oct 24, 2014</span></td>
                                  <td>$245.30</td>
                                  <td class="text-center">
                                      <div class="label label-table label-info">Shipped</div>
                                  </td>
                                  <td class="text-center"><i class="fa fa-plane"></i> CGX0089734531</td>
                              </tr>
                              <tr>
                                  <td><a href="#" class="btn-link"> Order #53433</a></td>
                                  <td>Lucy Doe</td>
                                  <td><span class="text-muted"><i class="fa fa-clock-o"></i> Oct 24, 2014</span></td>
                                  <td>$38.00</td>
                                  <td class="text-center">
                                      <div class="label label-table label-info">Shipped</div>
                                  </td>
                                  <td class="text-center"><i class="fa fa-plane"></i> CGX0089934571</td>
                              </tr>
                              <tr>
                                  <td><a href="#" class="btn-link"> Order #53434</a></td>
                                  <td>Teresa L. Doe</td>
                                  <td><span class="text-muted"><i class="fa fa-clock-o"></i> Oct 15, 2014</span></td>
                                  <td>$77.99</td>
                                  <td class="text-center">
                                      <div class="label label-table label-info">Shipped</div>
                                  </td>
                                  <td class="text-center"><i class="fa fa-plane"></i> CGX0089734574</td>
                              </tr>
                              <tr>
                                  <td><a href="#" class="btn-link"> Order #53435</a></td>
                                  <td>Teresa L. Doe</td>
                                  <td><span class="text-muted"><i class="fa fa-clock-o"></i> Oct 12, 2014</span></td>
                                  <td>$18.00</td>
                                  <td class="text-center">
                                      <div class="label label-table label-success">Paid</div>
                                  </td>
                                  <td class="text-center">-</td>
                              </tr>
                              <tr>
                                  <td><a href="#" class="btn-link">Order #53437</a></td>
                                  <td>Charles S Boyle</td>
                                  <td><span class="text-muted"><i class="fa fa-clock-o"></i> Oct 17, 2014</span></td>
                                  <td>$658.00</td>
                                  <td class="text-center">
                                      <div class="label label-table label-danger">Refunded</div>
                                  </td>
                                  <td class="text-center">-</td>
                              </tr>
                              <tr>
                                  <td><a href="#" class="btn-link">Order #536584</a></td>
                                  <td>Scott S. Calabrese</td>
                                  <td><span class="text-muted"><i class="fa fa-clock-o"></i> Oct 19, 2014</span></td>
                                  <td>$45.58</td>
                                  <td class="text-center">
                                      <div class="label label-table label-warning">Unpaid</div>
                                  </td>
                                  <td class="text-center">-</td>
                              </tr> -->
                          </tbody>
                      </table>
                  </div>
              </div>
              <!--===================================================-->
              <!--End Data Table-->

          </div>
      </div>

      <?php $eventss = []; foreach ($events as $event)
        if($event->date >= now())
          array_push($eventss, $event)
      ?>
      <div class="col-md-6">
          <div class="panel">
              <div class="panel-heading">
                  <h1 class="text-bold panel-title">Upcoming Events for {{strtoupper($user->branchname)}}</h1>
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
                    <p class="text-danger" > No Event </p>
                  @endif
                  <button onclick="window.location.replace(`{{route('calendar')}}`)" class="btn btn-sm btn-primary"><i class="icofont icofont-plus m-r-0"></i></button>
              </div>
          </div>
      </div>
  </div>


  <div class="row">
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
<script src="{{ URL::asset('js/functions.js') }}"></script>
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
function formatMoney(number) {
  return number.toLocaleString('en-US', { style: 'currency', currency: '{{$currency->currency_code}}' });
}

$(document).ready(() => {
  // get map
  // $.ajax({url: "{{route('map')}}", data: {'ajax': true}})
  // .done((res) => {
  //   $('#map-area').html(res)
  // })
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
    // display calulations
    $("#attendance-male").html(attendance.total.male)
    $("#attendance-female").html(attendance.total.female)
    $("#attendance-children").html(attendance.total.children)
    $("#attendance-total").html(attendance.total.total)
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

  $.ajax({url: "{{route('member.analysis')}}", data: {'interval': 8, 'group': 'month', 'id': 59}})
  .done((res) => {
    let dd1 = []; dd2 = []
    res.map((v) => {
      dd1.push([v.y, v.Offering])
      dd1.push([v.y, v.Building_Collection])
    })
  })
  var d1 = [["Jan", 85], ["Feb", 45], [2, 58], [3, 35], [4, 95], [5, 25], [6, 65], [7, 12], [8, 52], [9, 25], [10, 98], [11, 85], [12, 96]],
      d2 = [["Jan", 520], ["Feb", 370], [2, 820], [3, 209], [4, 495], [5, 170], [6, 185], [7, 273], [8, 304], [9, 877], [10, 489], [11, 420], [12, 710]],
      d3 = [["Jan", 50], ["Feb", 30], [2, 80], [3, 29], [4, 95], [5, 70], [6, 15], [7, 73], [8, 34], [9, 87], [10, 49], [11, 20], [12, 70]];

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
        dataKey.map((v) => {
          $(`#collection-${v.name}`).html(newarr.total[v.name])
        })
        $("#collection-total").html(newarr.total.total)
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
  $.get("{{route('payments.index')}}").done((res) => console.log(res))
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
      // { title: 'Branch', data: 'user.branchname', name: 'branchname'}
      { title: 'Order Date', data: 'payed_at', name: 'payed_at'},
      { title: 'Amount', data: 'amount', name: 'amount'},
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
// <th>User</th>
// <th>Order date</th>
// <th>Amount</th>
// <th class="text-center">Status</th>
// <th class="text-center">Tracking Number</th>
</script>
@endsection
