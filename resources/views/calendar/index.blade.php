@extends('layouts.app')

@section('title') All Branches @endsection

@section('content')
<!--CONTENT CONTAINER-->
<!--===================================================-->
<div id="content-container">
    <div id="page-head">


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

            <div class="panel">
                <div class="panel-body">
                    <div class="fixed-fluid">
                        <div class="fixed-sm-200 pull-sm-left fixed-right-border">
                            <form method="POST" action="{{route('calendar.update')}}">
                            @csrf
                            <input type="text" value="3" name="branch_id" hidden="hidden"/>

                            <div class="form-group">
                                <input type="text" id="event_title" placeholder="Event Title..." name="title" class="form-control" value="" style="margin-bottom:15px">
                                <input type="text" id="event_title" placeholder="By who" name="by_who" class="form-control" value=""><br/>
                                <input type="text" id="event_title" placeholder="Location" name="location" class="form-control" value="">
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
    background-color: #fff;outline:none; margin-top:15px;padding:2px 10px" type="text" placeholder="Event Date" name="date" class="datepicker"/>
                            </div>

                            <button class="btn btn-block btn-purple btn-lg">Add New Event</button>

                            <hr>

                            <!-- Draggable Events -->
                            <!-- ============================================ -->
                            <!--<div id="demo-external-events">
                                <div class="fc-event fc-list" data-class="warning">All Day Event</div>
                                <div class="fc-event fc-list" data-class="success">Meeting</div>
                                <div class="fc-event fc-list" data-class="mint">Birthday Party</div>
                                <div class="fc-event fc-list" data-class="purple">Happy Hour</div>
                                <div class="fc-event fc-list">Lunch</div>
                                <hr>
                                <div class="checkbox pad-btm text-left">
                                    <input id="drop-remove" class="magic-checkbox" type="checkbox">
                                    <label for="drop-remove">Remove after drop</label>
                                </div>
                                <hr class="bord-no">
                                <p class="text-muted text-sm text-uppercase">Sample Events</p>
                                <div class="fc-event" data-class="warning">All Day Event</div>
                                <div class="fc-event" data-class="success">Meeting</div>
                                <div class="fc-event" data-class="mint">Birthday Party</div>
                                <div class="fc-event" data-class="purple">Happy Hour</div>
                                <div class="fc-event">Lunch</div>
                            </div>-->
                            <!-- ============================================ -->
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