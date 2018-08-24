@extends('layouts.app')

@section('title') All Members @endsection

@section('content')
<!--CONTENT CONTAINER-->
<!--===================================================-->
<div id="content-container">
    <div id="page-head">

        <!--Page Title-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <div id="page-title">
            <h1 class="page-header text-overflow">Mark Attendance</h1>
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
                <a href="{{route('attendance')}}">Attendance</a>
            </li>
            <li class="active">Mark</li>
        </ol>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--End breadcrumb-->

    </div>


    <!--Page content-->
    <!--===================================================-->
    <div id="page-content">
        <div class="row">
            <div class="col-md-6 col-md-offset-3"  >
                @if (session('status'))

                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                @if (count($errors) > 0)
                    @foreach ($errors->all() as $error)

                        <div class="alert alert-danger">{{ $error }}</div>

                    @endforeach

                @endif
            </div>
            <div class="col-md-8 col-md-offset-1" style="margin-bottom:20px">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Mark Attendnace for <strong>{{\Auth::user()->branchname}} <i>{{\Auth::user()->branchcode}}</i></strong></h3>
                    </div>

                    <!--Block Styled Form -->
                    <!--===================================================-->
                    <form method="POST" action="{{route('attendance.selectDate')}}">
                        @csrf
                        <input name="branch_id" value="3" type="text" hidden="hidden"/>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">Date</label>
                                        <input id="mark-date" type="date" name="date" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label class="control-label">Male</label>
                                        <input type="number" min=0 name="male" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label class="control-label">Female</label>
                                        <input type="number" min=0 name="female" class="form-control">
                                    </div>
                                </div>

                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label class="control-label">Children</label>
                                        <input type="number" min=0 name="children" class="form-control">
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label class="control-label">Attendance Type</label>
                                        <select id="mark-select" class="selectpicker" data-style="btn-success">
                                            <option value="sunday service" selected>Sunday Service</option>
                                            <option value="wednessday service">Wednessday Service</option>
                                            <option value="thursday service">Thursday Service</option>
                                        </select>

                                    </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label class="control-label">Other Attendance Type</label>
                                    <input type="text" name="custom_type" class="form-control">
                                </div>
                            </div>
                            <div class="row">

                            </div>
                            <div class="row">

                                </div>

                            </div>
                        </div>
                        <div class="panel-footer text-right">
                            <button id="btn-mark" class="btn btn-success" type="submit">Submit</button>
                        </div>
                    </form>
                  </div>
                </div>
                    <!--===================================================-->
                    <!--End Block Styled Form -->

            <div class="col-md-8 col-md-offset-1" style="margin-bottom:20px">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Mark Attendnace for <strong>{{\Auth::user()->branchname}} <i>{{\Auth::user()->branchcode}}</i></strong></h3>
                    </div>
                    <div class="panel-body">
                    <form action="{{route('attendance.mark')}}" method="post" >
                      @csrf
                    <table id="demo-dt-basic" class="table table-striped table-bordered datatable" cellspacing="0" width="100%" >
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Title</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Mark</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php $count = 1; ?>
                          <?php $class = ['normal', 'alt']; $i = 0; $size = sizeof($members); ?>
                          @foreach ($members as $member)
                          <?php if($i == 1){ $num = 0; $i = 0; }else{ $num = 1; $i = 1;} ?>
                            <tr class="<?php echo $class[$num]; ?>" id="row,{{$count}}">
                                <td><strong>{{$count}}</strong></td>
                                <td>{{$member->title}}
                                <input id="" type="hidden" value="{{$member->title}}" name="title[]" class="" /></td>
                                <td>{{$member->firstname}}
                                <input id="" type="hidden" value="{{$member->firstname}}" name="fname[]" class="" /></td>
                                <td>{{$member->lastname}}
                                <input id="" type="hidden" value="{{$member->lastname}}" name="lname[]" class="" /></td>
                                <td>
                                  <div id="" class="input-group">
                                    <div class="checkbox">
                                      <label><input name="atte" type="checkbox" >Present<input id="" type="hidden" value="no" name="attendance[]" class="" /></label>
                                    </div>
                                  </div>
                                </td>
                                  <input id="" type="hidden" value="{{$member->id}}" name="member_id[]" class="" />
                                  <input id="" type="hidden" value="{{$member->branch_id}}" name="branch_id[]" class="" />
                            </tr>
                            <?php $count++; ?>
                            @endforeach

                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-md-3" style="width:30%;">
                          <h3><label for="date">Choose Date</label></h3>
                        <input style="border:1px solid rgba(0,0,0,0.07);height: 33px; font-size: 13px; border-radius: 3px;display: block;color: #555; background-color: #fff;outline:none; padding:2px 10px"
                         type="text" placeholder="Choose Date" name="date" class="datepicker form-control" required/>
                        </div>

                        <div class="form-group col-md-3">
                          <h3><label for="date">Choose Service Type</label></h3>
                            <select style="outline:none" name="type" class="selectpicker col-md-12" data-style="btn-info">
                            <option value="sunday service" selected>Sunday Service</option>
                            <option value="monday service">Monday Service</option>
                            <option value="tuesday service">Tuesday Service</option>
                            <option value="wednessday service">Wednessday Service</option>
                            <option value="thursday service">Thursday Service</option>
                            <option value="friday service">Friday Service</option>
                            <option value="saturday service">Saturday Service</option>
                            </select>
                        </div>
                      <div class="col-md-3 form-group pull-right" style="">
                        <h3><label for="date">Submit Attendance</label></h3>
                        <div class="input-group" style="width:100%">
                          <input type="submit" name="save" value="Submit" class="btn btn-primary form-control"/>
                        </div>
                      </div>

                      </div>
                  </form>
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
