@extends('layouts.app')

@section('title') Ticketing - Report @endsection

@section('content')


<!--CONTENT CONTAINER-->
<!--===================================================-->
<div id="content-container">
  <div id="page-head">

    <!--Page Title-->
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <div id="page-title">
      <h1 class="page-header text-overflow">Create Ticket</h1>
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
         <a href="{{route('dashboard')}}">Dashboard</a>
            </li>
            <li class="active">Ticketing</li>
    </ol>
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <!--End breadcrumb-->

  </div>


  <!--Page content-->
  <!--===================================================-->
  <div id="page-content">
    <div class="row">
      <div class="col-lg-8 col-lg-offset-2">
        <div class="panel" style="background-color: #e8ddd3;">
          <div class="panel-heading">
            <h1 class="text-center" style="padding-top:5px">Create Ticket</h2>
          </div>
          <div class="col-lg-10 col-lg-offset-2">
          @if (session('status'))

                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                   <!--  @if (count($errors) > 0)
                        @foreach ($errors->all() as $error)

                            <div class="alert alert-danger">{{ $error }}</div>

                        @endforeach

                    @endif -->


          </div>
          <div class="row panel-body">
            <div class=""  style="border:1pt solid #090c5e; border-radius:25px;">
              <!-- BASIC FORM ELEMENTS -->
              <!--===================================================-->
                  <form id="send-ticket-form" role="form"  method="POST" action="{{route('sendTicket')}}">
                                    <?php   $randid= mt_rand(13, rand(100, 99999990));?>
                                         @csrf  <div class="panel-body">
                                        <div class="row">
                                               <input type="hidden"  id="TicketID" class="form-control" name="TicketID" value="{{$randid}}">
                                            <div class="col-md-4 mar-btm">
                                                 <label class=" control-label"  for="inputEmail">Error Code</label>
                                                     <input type="text"  id="error_code" class="form-control{{ $errors->has('error_code') ? ' is-invalid' : '' }}" name="error_code" value="{{ old('error_code') }}">
                                                      <br>
                                @if ($errors->has('error_code'))
                                    <span class="alert alert-danger">
                                        <strong>{{ $errors->first('error_code') }}</strong>
                                    </span>
                                @endif
                                            </div>
                                        <div class="col-md-4 mar-btm">
                                                 <label class=" control-label"  for="inputEmail">Error Name</label>
                                                     <input type="text"  id="error_name" class="form-control{{ $errors->has('error_name') ? ' is-invalid' : '' }}" name="error_name" value="{{ old('error_name') }}">
                                            <br>
                                @if ($errors->has('error_name'))
                                    <span class="alert alert-danger">
                                        <strong>{{ $errors->first('error_name') }}</strong>
                                    </span>
                                @endif </div>
                                              <div class="col-md-4 mar-btm">
                                           <label class="control-label"  for="inputEmail">Severity</label>
                                         <select class="form-control" name="severity" id="severity">
                                           <option >select Option</option>
                          <option value="Show Stopper">Show Stopper</option>
                          <option value="One Offs">One Offs</option>
                          <option value="Severe">Severe</option>
                          <option value="Can Manage">Can Manage</option>
                      </select>
                                             <br>
                                @if ($errors->has('severity'))
                                    <span class="alert alert-danger">
                                        <strong>{{ $errors->first('severity') }}</strong>
                                    </span>
                                @endif
                    </div>
                                         </div>
                                         <div class="row">

                           <div class="col-md-4 mar-btm">
                                             <label class="control-label"  for="inputEmail">Service Level</label>
                                         <select class="form-control" name="servicelevel" id="servicelevel">
                                           <option >select Option</option>
                          <option class="bg bg-success" value="Level 1"><p >Green</p></option>
                          <option class="bg-yellow" value="Level 2"><p >Yellow</p></option>
                          <option class="bg-danger" value="Level 3"><p >Red</p></option>
                      </select>
                                             <br>
                                @if ($errors->has('servicelevel'))
                                    <span class="alert alert-danger">
                                        <strong>{{ $errors->first('servicelevel') }}</strong>
                                    </span>
                                @endif
                    </div>
                      <div class="col-md-4 mar-btm">
                                                         <label class=" control-label" for="inputSubject">Ticket Date</label>
                                             <input style="border:1px solid rgba(0,0,0,0.07);height: 33px;
                                  font-size: 13px;
                                  border-radius: 3px;display: block;
                                  width: 100%;
                                   color: #555;
                                  background-color: #fff;outline:none; margin-top:2px;padding:2px 10px" type="text" placeholder="Ticket  Date" name="date" class="datepicker"/>

                    <br>
                                @if ($errors->has('date'))
                                    <span class="alert alert-danger">
                                        <strong>{{ $errors->first('date') }}</strong>
                                    </span>
                                @endif

                                        </div>

                                            <div class="col-md-4 mar-btm">
                                                         <label class=" control-label" for="inputSubject">Ticket Time</label>
                                  <div class="input-group clockpicker col-md-9">
                                <input type="text" class="form-control" value="09:00" name="time">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-time"></span>
                                </span>
                            </div> @if ($errors->has('time'))
                                    <span class="alert alert-danger">
                                        <strong>{{ $errors->first('time') }}</strong>
                                    </span>
                                @endif
                                            </div>


                  </div>
                        <div class="row">

                                            <div class="col-md-4 mar-btm">
                                                 <label class=" control-label"  for="inputEmail">Full Name</label>
                                                     <input type="text"  id="full_name" class="form-control{{ $errors->has('full_name') ? ' is-invalid' : '' }}" name="full_name" value="{{ old('full_name') }}">
                                        @if ($errors->has('full_name'))
                                    <span class="alert alert-danger">
                                        <strong>{{ $errors->first('full_name') }}</strong>
                                    </span>
                                @endif     </div>

                                       <div class="col-md-4 mar-btm">
                                                 <label class="col-md-3 control-label"  for="inputEmail">Email</label>
                                                     <input type="email"  id="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}">
                                          @if ($errors->has('email'))
                                    <span class="alert alert-danger">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif   </div>
                                            <div class="col-md-4 mar-btm">
                                                 <label class=" control-label"  for="inputEmail">Phone Number</label>
                                                     <input type="tel"  id="phone_number" class="form-control{{ $errors->has('phone_number') ? ' is-invalid' : '' }}" name="phone_number" value="{{ old('phone_number') }}">
                                           @if ($errors->has('phone_number'))
                                    <span class="alert alert-danger">
                                        <strong>{{ $errors->first('phone_number') }}</strong>
                                    </span>
                                @endif  </div>
                                         </div>

                                           <div class="row">


                                        <textarea placeholder="Error Description" name="message" rows="10" class="form-control"></textarea>
                                   @if ($errors->has('message'))
                                    <span class="alert alert-danger">
                                        <strong>{{ $errors->first('message') }}</strong>
                                    </span>
                                @endif  </div>
                                    <div class="panel-footer text-right">
                                       <button id="mail-send-btn" type="submit" class="btn btn-primary">
                                                <i class="demo-psi-mail-send icon-lg icon-fw"></i> Create Ticket
                                            </button>
                                    </div>
                                </form>
            </div>
          </div>
          <!--===================================================-->
          <!-- END BASIC FORM ELEMENTS -->




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
