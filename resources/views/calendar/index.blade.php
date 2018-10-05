@extends('layouts.app')

@section('title') Events @endsection

@section('content')
<!--CONTENT CONTAINER-->
<!--===================================================-->
<div id="content-container">
    <div id="page-head">
      <ol class="breadcrumb">
          <li>
              <i class="fa fa-home"></i><a href="{{route('dashboard')}}"> Dashboard</a>
          </li>
          <li class="active">Add Event</li>
      </ol>
    </div>


    <!--Page content-->
    <!--===================================================-->
    <div id="page-content">

    <div class="col-md-12" style="margin-top:15px"  >
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

            <div class="panel" style="background-color: #e8ddd3;">
                <div class="panel-body">
                    <div class="fixed-fluid">
                        <div class="fixed-sm-200 pull-sm-left fixed-right-border">
                            <form method="POST" action="{{route('calendar.update')}}">
                            @csrf
                            <input type="text" value="3" name="branch_id" hidden="hidden"/>

                            <div class="form-group">
                                <input type="text" id="event_title" placeholder="Event Title..." name="title" class="form-control" value="" style="margin-bottom:15px" required>
                                <input type="text" id="event_title" placeholder="By who" name="by_who" class="form-control" value="" required><br/>
                                <center><label>assign to</label></center>
                                <select id="num-selector" data-live-search="true" name="assign[]" data-width="100%" data-actions-box="true" class="selectpicker" multiple>
                                  @foreach ($pastors as $pastor)
                                    <option id="event_title" value="{{$pastor->email}}">{{ucwords($pastor->getFullname())}}</option>
                                  @endforeach
                                </select>
                                <br/>
                                <input type="text" id="event_title" placeholder="Location" name="location" class="form-control" value="" required>
                                <input type="text" id="event_title" placeholder="details" name="details" class="form-control" value="" required>
                                <div class="input-group clockpicker">
                                <input type="text" class="form-control" value="09:30" name="time">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-time"></span>
                                </span>
                            </div>
                                <input style="border:1px solid rgba(0,0,0,0.07);height: 33px;
                                  font-size: 13px;
                                  border-radius: 3px;display: block;
                                  width: 100%;
                                   color: #555;
                                  background-color: #fff;outline:none; margin-top:15px;padding:2px 10px" type="text" placeholder="Event Date" name="date" class="datepicker" required/>
                            </div>

                            <button class="btn btn-block btn-purple btn-lg">Add New Event</button>

                            <hr>
                        </div>
                        <div class="fluid">
                            <!-- Calendar placeholder-->
                            <!-- ============================================ -->
                            <div id='demo-calendar'></div>
                            <!-- ============================================ -->
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div id="myModal" class="modal fade" role="dialog">
              <div class="modal-dialog" style="width: 50%; margin: 0 auto;">

                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header bg-warning">
                    <button type="button" class="close" data-dismiss="modal"><h1>&times;</h1></button>
                    <div class="d-inline pull-left"><h1 class="">Event Title: </h1></div>
                    <div class="d-inline text-center text-white"><h1 id="title"></h1></div>
                  </div>
                  <div class="modal-body">
                    <ul>
                      <li class="list-group-item d-flex justify-content-between align-items-center">
                        By:
                        <span class="badge badge-info badge-pill"><p id="by"></p></span>
                      </li>
                      <li class="list-group-item d-flex justify-content-between align-items-center">
                        Time:
                        <span class="badge badge-info badge-pill"><p id="time"></p></span>
                      </li>
                      <li class="list-group-item d-flex justify-content-between align-items-center">
                        Location:
                        <span class="badge badge-info badge-pill"><p id="location"></p></span>
                      </li>

                    </ul>
                    <li class="text-center bg-purple list-group-item d-flex justify-content-between align-items-center">
                      Details:
                    </li>
                    <li class="text-center list-group-item d-flex justify-content-between align-items-center">
                      <p id="details"></p>
                    </li>
                    <li class="text-center list-group-item d-flex justify-content-between align-items-center">
                      Assigned To:
                    </li>
                    <li id="assign" class="text-center list-group-item d-flex justify-content-between align-items-center">

                    </li>
                  </div>
                  <div class="modal-footer">
                    <button id="id" type="button" class="btn btn-danger" value="" data-dismiss="modal" onclick="dele(this.value);">Delete</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                </div>

              </div>
            </div>
            <?php //print_r($events); ?>
    </div>
    <!--===================================================-->
    <!--End page content-->

</div>
<!--===================================================-->
<!--END CONTENT CONTAINER-->
    <!--Bootstrap Modal without Animation-->
    <!--===================================================-->
    <div class="modal" id="demo-modal-wo-anim" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <!--Modal header-->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                    <h4 class="modal-title">Modal Heading</h4>
                </div>


                <!--Modal body-->
                <div class="modal-body">
                    <p class="text-semibold text-main">Bootstrap Modal Vertical Alignment Center</p>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>
                    <br>
                    <p class="text-semibold text-main">Popover in a modal</p>
                    <p>This
                        <button class="btn btn-sm btn-warning demo-modal-popover add-popover" data-toggle="popover" data-trigger="focus" data-content="And here's some amazing content. It's very engaging. right?"data-original-title="Popover Title">button</button>
                        should trigger a popover on click.
                    </p>
                    <br>
                    <p class="text-semibold text-main">Tooltips in a modal</p>
                    <p>
                        <a class="btn-link text-bold add-tooltip" href="ui-modals.html#" data-original-title="Tooltip">This link</a> and
                        <a class="btn-link text-bold add-tooltip" href="ui-modals.html#" data-original-title="Tooltip">that link</a> should have tooltips on hover.
                    </p>
                </div>


                <!--Modal footer-->
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                    <button class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <!--===================================================-->
    <!--End Bootstrap Modal without Animation-->
@endsection
