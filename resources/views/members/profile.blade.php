@extends('layouts.app')

@section('title') Member Profile @endsection
@section('content')
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
                        <img src="{{url('/public/images/')}}/{{$member->photo}}" class="img-lg img-circle" alt="Profile Picture">
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
                              $rel = App\Member::where('id',$relative->id)->get()->first();
                          ?>
                          <li class="tag tag-sm"><a href="{{route('member.profile', $rel->id)}}">{{$rel->getFullname()}}</a> - {{$relative->relationship}}</li><br/>
                          <?php
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
                              <div class="col-xs-8" style="padding-top:7px;">
                                <h2 class="text-center text-white" style="color:white;">Attendance Analysis - {{date("Y")}}</h2>
                              </div>
                              <div class="col-xs-4 panel-title">
                                <div class="col-xs-6  small bg-success">Absent</div>
                                <div class="col-xs-6  small bg-danger">Present</div>
                              </div>
                              <div id="demo-morris-bar-month" style="height: 250px"></div>
                            </div>
                          </div>
                        </div>
                      </div>
                       <br>
                        <hr>
                        <div class="row" style="height: 250px">
                      <div class="col-md-12">
                        <div class="panel rounded-top">
                            <div class="panel-heading bg-dark">
                              <div class="col-xs-6" style="padding-top:7px;">
                                  <h2 class="text-center text-white"><p style="color:white;" >Collection  Analysis - {{date("Y")}}</p></h2>
                              </div>
                              <div class="col-xs-6 panel-title">
                                <div class="col-xs-4  small bg-danger">Tithe</div>
                                <div class="col-xs-4  small bg-success">Offering</div>
                                <div class="col-xs-4  small bg-purple">Other</div>
                              </div>
                              <div id="demo-morris-bar-month-collection" style="height: 250px"></div>
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
