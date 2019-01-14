@extends('layouts.app')

@section('title') Dashboard @endsection

@section('link')
<!--custom.css [ OPTIONAL ]-->
<link href="{{ URL::asset('css/custom.css') }}" rel="stylesheet">
<link href="{{ URL::asset('css/stylemashable.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{URL::asset('css/icofont.min.css')}}">
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



  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div clas="row">
        <div class="col-md-12">
            <div class="panel" style="background-color: #e8ddd3;">
              <div class="row">
                <div class="col-md-6 col-xl-3">
              <div class="card client-blocks dark-primary-border">
              <div class="card-block">
              <h5>Number of Our Branches</h5>
              <ul>
              <li>
              <i class="icofont icofont-building-alt"></i>
              </li>
              <li class="text-right">
              {{\App\User::all()->count()}}
              </li>
              </ul>
              </div>
              </div>
              </div>


              <div class="col-md-6 col-xl-3">
              <div class="card client-blocks warning-border">
              <div class="card-block">
              <h5>Number of Our Members</h5>
              <ul>
              <li>
              <i class="icofont icofont-ui-user-group text-warning"></i>
              </li>
              <li class="text-right text-warning">
              {{$total['members']}}
              </li>
              </ul>
              </div>
              </div>
              </div>


              <div class="col-md-6 col-xl-3">
              <div class="card client-blocks success-border">
              <div class="card-block">
              <h5>Number of  Our Workers</h5>
              <ul>
              <li>
              <i class="icofont-workers-group text-success"></i>
              </li>
              <li class="text-right text-success">
              {{$total['workers']}}
              </li>
              </ul>
              </div>
              </div>
              </div>


              <div class="col-md-6 col-xl-3">
              <div class="card client-blocks">
              <div class="card-block">
              <h5>Number of Our Pastors</h5>
              <ul>
              <li>
              <i class="icofont-man-in-glasses text-primary"></i>
              </li>
              <li class="text-right text-primary">
              {{$total['pastors']}}
              </li>
              </ul>
              </div>
              </div>
              </div>
              </div>
          </div>
        </div>
      </div>
      <div clas="row">
        <div class="col-md-6">
          <div class="view2">
            <!--Tile-->
            <!--===================================================-->
            <div class="panel" style="background-color: #e8ddd3;"> <!--panel-dark panel-colorful" -->
              <div class="panel-heading"> <!--body text-center"-->
                  <h3 class="panel-title"><strong>Birthdays For <?php echo date('F Y'); ?></strong> </h3>
                  <!--i class="demo-pli-coin icon-4x"></i-->
              </div>
              <!-- Striped Table -->
              <!--===================================================-->
              <?php
              $celebs = [];
              foreach ($members as $key => $member) {
                // code...
                if (date('F', (strtotime($member->dob))) == date('F') || date('F', (strtotime($member->wedding_anniversary))) == date('F')  ) {
                  array_push($celebs, $member); }
              }
              ?>
              <div class="panel-body">
                <div class="col-lg-12">
                  @if(count($celebs) > 0)
                  <div class="card table-1-card">
                  <div class="card-block">
                  <div class="table-responsive">
                  <table class="table">
                  <thead>
                  <tr class="text-capitalize">
                  <th>  </th>
                  <th>Type</th>
                  <th>Celebrant Name</th>
                  <th>Position</th>
                  <th>Date</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($celebs as $member)
                    @if(date('F', (strtotime($member->dob))) == date('F'))
                    <tr>
                    <td>
                      <img class="d-flex mr-3 img-circle img-40 img-thumbnail" src="{{url('/public/images/')}}/{{$member->photo}}" alt="{{$member->firstname}} image">
                    </td>
                    <td>
                      @if((int)substr(date('jS'),0,2) <= (int)substr(date('jS', strtotime($member->dob)), 0,2))
                      <a href="#!">Upcoming</a>
                      @else
                      <a class="text-danger" href="#!">Past</a>
                      @endif
                    </td>
                    <td>{{ucwords($member->getFullname())}}</td>
                    <td>{{ucwords($member->position)}}</td>
                    <td>{{date('jS', strtotime($member->dob))}}</td>
                    </tr>
                    @endif
                    @endforeach
                  </tbody>
                  </table>
                  </div>
                   </div>
                  </div>
                  @else
                  <p class="text-danger"> No Birthday </p>
                  @endif
                </div>
              </div>
            </div>
              <!--===================================================-->
          </div>
       </div>
        <div class="col-md-6">
            <div class="view2">
              <!--Tile-->
              <!--===================================================-->
              <div class="panel" style="background-color: #e8ddd3;"> <!--panel-dark panel-colorful" -->
                  <div class="panel-heading"> <!--body text-center"-->
                      <h3 class="panel-title"><strong>Anniversaries For <?php echo date('F Y'); ?></strong> </h3>
                      <!--i class="demo-pli-coin icon-4x"></i-->
                  </div>
                  <!-- Striped Table -->
                  <!--===================================================-->
                    <div class="panel-body">
                      <div class="col-lg-12">
                        @if(count($celebs) > 0)
                        <div class="card table-1-card">
                        <div class="card-block">
                        <div class="table-responsive">
                        <table class="table">
                        <thead>
                        <tr class="text-capitalize">
                        <th>  </th>
                        <th>Type</th>
                        <th>Celebrant Name</th>
                        <th>Position</th>
                        <th>Date</th>
                        </tr>
                        </thead>
                        <tbody>
                          @foreach ($celebs as $member)
                          @if(date('F', (strtotime($member->wedding_anniversary))) == date('F'))
                          <tr>
                          <td>
                            <img class="d-flex mr-3 img-circle img-40 img-thumbnail" src="{{url('/public/images/')}}/{{$member->photo}}" alt="{{$member->firstname}} image">
                          </td>
                          <td>
                            @if((int)substr(date('jS'),0,2) <= (int)substr(date('jS', strtotime($member->wedding_anniversary)), 0,2))
                            <a href="#!">Upcoming</a>
                            @else
                            <a class="text-danger" href="#!">Past</a>
                            @endif
                          </td>
                          <td>{{ucwords($member->getFullname())}}</td>
                          <td>{{ucwords($member->position)}}</td>
                          <td>{{date('jS', strtotime($member->wedding_anniversary))}}</td>
                          </tr>
                          @endif
                          @endforeach
                        </tbody>
                        </table>
                        </div>
                         </div>
                        </div>
                        @else
                        <p class="text-danger"> No Anniversary </p>
                        @endif
                      </div>
                    </div>
              </div>
              <!--===================================================-->
            </div>
          </div>
        </div>
         <div class="row">
            <div class="col-sm-12">
              <div class="panel" style="background-color: #e8ddd3;">
                  <div class="panel-heading">
                      <h3 class="panel-title"><strong>Upcoming Events for {{strtoupper(\Auth::user()->branchname)}}</strong></h3>
                  </div>
                  <?php $eventss = []; foreach ($events as $event)
                    if($event->date >= now())
                      array_push($eventss, $event)
                  ?>
                  <!-- Striped Table -->
                  <!--===================================================-->
                  <div class="panel-body">
                    <div class="col-lg-12">
                      @if(count($eventss) > 0)
                      <div class="card table-1-card">
                      <div class="card-block">
                      <div class="table-responsive">
                      <table class="table">
                      <thead>
                      <tr class="text-capitalize">
                        <th>Title</th>
                        <th>Location</th>
                        <th>Time</th>
                        <th>By</th>
                        <th>Assigned Pastor(s)</th>
                        <th>Date</th>
                      </tr>
                      </thead>
                      <tbody>
                        @foreach ($eventss as $event)
                        <tr>
                          <td><a href="#" class="btn-link">{{$event->title}}</a></td>
                          <td>{{$event->location}}</td>
                          <td>{{$event->time}}</td>
                          <td>{{$event->by_who}}</td>
                          <?php
                          if(isset($event->assign_to)){
                            $emails = explode(',',$event->assign_to);
                            echo '<td>';
                            foreach($emails as $email){
                              $name = App\Member::getNameByEmail($email);
                              if($name){
                                echo "<a href='#'><img class='img-fluid img-circle d-flex mr-3 img-30 img-thumbnail' src='".url('/public/images/')."/".App\Member::getPhotoByEmail($email)."' alt='".ucwords($name)."'></a>";
                              }
                            }
                            echo '</td>';
                        }else{
                          echo '<td>None</td>';
                        }
                          ?>
                          <td>{{$event->date}}</td>
                        </tr>
                        @endforeach
                      </tbody>
                      </table>
                      </div>
                       </div>
                      </div>
                      @else
                      <div class="text-center">
                        <p class="text-danger"> No Event </p>
                        <a href="{{route('calendar')}}" class="btn btn-primary"><i class="icofont icofont-plus m-r-0"></i></a>
                      </div>
                      @endif
                    </div>

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

@endsection
