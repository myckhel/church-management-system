@extends('layouts.app')

@section('title') {{\Auth::user()->branchname}}{{\Auth::user()->branchcode}}: Attendance Report @endsection

@section('link')
<link rel="stylesheet" href="{{URL::asset('css/pignose.calendar.min.css')}}">
@endsection
@section('content')
<?php

// extract addedVariables value to variable
if (isset($addedVariables)) extract($addedVariables);

?>
<!--CONTENT CONTAINER-->
<!--===================================================-->
<style>
li {
    display: inline;
}
/* Dropdown Button */
.dropbtn {
    background-color: #4CAF50;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
    position: relative;
    display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f1f1f1;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #ddd;}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {display: block;}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {background-color: #3e8e41;}

.icon {
  font-size: 100px;
}
</style>
<div id="content-container">
    <div id="page-head">

        <!--Page Title-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <div id="page-title">
            <h1 class="page-header text-overflow">Attendance</h1>
        </div>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--End page title-->


        <!--Breadcrumb-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <ol class="breadcrumb">
          <li>
              <i class="fa fa-home"></i><a href="{{route('dashboard')}}"> Dashboard</a>
          </li>
            <li class="active">All</li>
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
            <div class="col-sm-8 col-sm-offset-2" style="margin-bottom:<?php
            echo (isset($formatted_date)) ? '30' : '60';
            ?>px">
                <div class="panel rounded-top" style="background-color: #e8ddd3;">
                    <div class="panel-heading text-center">
                        <h3 class="panel-title">Select Attendance To View</h3>
                    </div>
                    <!--Block Styled Form -->
                    <!--===================================================-->
                    <div class="row">
                      <div class="col-sm-12">
                        <!-- <div class="weather-calender"> -->
                          <div class="widget-calender"></div>
                        <!-- </div> -->
                      </div>
                    </div>
                    <br />
                    <!-- <form id="viewByDate" method="POST" action="{{route('attendance.view')}}">
                        @csrf
                        <input name="branch_id" value="3" type="text" hidden="hidden"/>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">Choose Specific Date</label>
                                        <input id="yearDate" type="date" name="date" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer text-right bg-dark">
                            <button class="btn btn-success" type="submit">VIEW ATTENDANCE</button>
                        </div>
                    </form> -->
                    <!--===================================================-->
                    <!--End Block Styled Form -->

                </div>

            </div>
            <div class="col-md-offset-1 col-md-10" style="margin-bottom:50px">
              <div class="panel rounded-top" style="background-color: #e8ddd3;">
                <div class="panel-heading text-center">
                  <h1 class="panel-title">Branch Attendance History<h1>
                </div>
                <div class="panel-body clearfix table-resposive">
                  <table id="demo-dt-basic" class="table table-striped table-bordered datatable" cellspacing="0" width="100%" >
                <thead>
                    <tr>
                        <th>S/N</th>
                        <th class="min-tablet">Service type</th>
                        <th class="min-tablet">Men</th>
                        <th class="min-tablet">Women</th>
                        <th class="min-tablet">Children</th>
                        <th class="min-tablet">Total</th>
                        <th class="min-tablet">Transaction Date</th>
                        <th class="min-tablet">Processed Date</th>
                        <th class="min-desktop">Action</th>
                    </tr>
                </thead>
                <tbody>
                  <?php $count=1;?>
                    @foreach($attendance as $list)
                    <?php
                      $date = $list->attendance_date;
                      $d = date("F,Y,D", strtotime($date));
                      $p = explode(',',$d);
                    ?>
                    <tr>
                        <td><strong>{{$count}}</strong></td>
                        <td>{{$list->service_types->name}}</td>
                        <td>{{$list->male}}</td>
                        <td>{{$list->female}}</td>
                        <td>{{$list->children}}</td>
                        <td>{{$list->male + $list->female + $list->children}}</td>
                        <td>{{$list->attendance_date}}</td>
                        <td>{{$list->created_at}}</td>
                        <td><button id="{{$list->attendance_date}}" type="submit" class="btn btn-primary viewBtn" onclick="viewer(this);">View</button></td>
                    </tr>
                    <?php $count++;?>
                    @endforeach
                </tbody>
            </table>
          </div>
          </div>
        </div>

            <!-- MEMBERS ATTENDANCE -->
            <div class="col-md-offset-1 col-md-10" style="margin-bottom:50px">
                <div class="panel rounded-top" style="background-color: #e8ddd3;">
                  <div class="panel-heading">
                    <h1 class="panel-title text-center">Members Attendance History<h1>
                  </div>
                  <div class="panel-body text-center clearfix table-response">
                    <table id="demo-dt-basic" class="table table-striped table-bordered datatable" cellspacing="0" width="100%" >
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th class="min-tablet">Title</th>
                                <th class="min-tablet">First Name</th>
                                <th class="min-tablet">Last Name</th>
                                <th class="min-tablet">View History</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php $count=1;?>
                            @foreach($members as $member)
                            <tr>
                                <td><strong>{{$count}}</strong></td>
                                <td>{{ucwords($member->title)}}</td>
                                <td>{{ucwords($member->firstname)}}</td>
                                <td>{{ucwords($member->lastname)}}</td>
                                <td>
                                  <button data-fullname="{{$member->getFullname()}}" data-id="{{$member->id}}" class="btn btn-primary show-member-history fa fa-eye"> View</button>
                                </td>
                            </tr>
                            <?php $count++;?>
                            @endforeach
                        </tbody>
                    </table>
                  </div>
          </div>
        </div>

          <!-- ATTENDANCE Modal -->
          <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog" style="width: 50%; margin: 0 auto;">
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header bg-warning">
                  <button type="button" class="close" data-dismiss="modal"><h1>&times;</h1></button>
                  <div class="d-inline pull-left"><h1 class="">Date: </h1></div>
                  <div class="d-inline text-center text-white"><h1 id="date-title"></h1></div>
                </div>
                <div id="modal-body" class="modal-body">

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>

          <!-- MEMBER ATTENDANCE Modal -->
          <div id="memberAttendanceModal" class="modal fade" role="dialog">
            <div class="modal-dialog" style="width: 50%; margin: 0 auto;">
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header bg-warning">
                  <button type="button" class="close" data-dismiss="modal"><h1>&times;</h1></button>
                  <!-- <div class="d-inline pull-left"><h1 class="">Date: </h1></div> -->
                  <div class="d-inline text-center text-white"><h1 id="member-fullname"></h1></div>
                </div>
                <div id="modal-body" class="modal-body">
                  <div class="table-responsive">
                    <table id="member-attendance-table" class="table table-striped table-bordered" cellspacing="0" width="100%" >
                      <thead></thead>
                      <tbody> </tbody>
                    </table>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
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

@section('js')
<script src="{{ URL::asset('js/functions.js') }}"></script>
<script src="{{URL::asset('js/pignose.calendar.full.min.js')}}"></script>
<script>
$(document).ready(() => {
  $(function() {
    $('.widget-calender').pignoseCalendar({
      theme: 'blue',
      select: handleSelect,
    });
  });
  //Attnedance Module
  $('#view-year').click(function (){
  	$('#show-year').show();
    // loadElement($('#viewByDate').find(':submit'), true, 'fetching')
  });

  $('#viewByDate').submit((e) => {
    e.preventDefault()
    submit = $('#viewByDate').find(':submit')
    toggleAble(submit, true, 'fetching')
    let date = $('#yearDate').val()
    let h1 = document.createElement('h1')
    $(h1).attr('id')
    h1.setAttribute("id", date);
  	view(h1, () => {
      toggleAble(submit, false)
    })
  });

  // member attendance event
  $('.show-member-history').click( e => {
    const id = $(e.target).data('id')
    const fullname = $(e.target).data('fullname')
    $('#member-fullname').text(fullname)
    viewMemberAttendance(id, $(e.target))
  })

})
const viewer = (element) => {
  loadElement($(element), true)
  view(element, () => {
    loadElement($(element), false)
  })
}

function handleSelect(date, context){
  let h1 = document.createElement('h1')
  $(h1).attr('id')
  let sdate = date[0].format('YYYY-MM-DD');
  h1.setAttribute("id", sdate);
  view(h1, () => {})
}

function showe(date){
  $('#date-title').html(date)
  $('#myModal').modal('show')
}

function viewMemberAttendance(id, element){
  // show the Modal
  $('#memberAttendanceModal').modal('show')
  // uninitialize the datatable
  // console.log($('#member-attendance-table').DataTable({}));
  if ($.fn.DataTable.isDataTable('#member-attendance-table')) {
    $('#member-attendance-table').DataTable().clear().destroy()
  }
  // initialize the database
  member_attendance_table = $('#member-attendance-table').DataTable({
      processing: true,
      serverSide: true,
      "columnDefs": [
        // { "orderable": false, "targets": 0 }
      ],
      oLanguage: {sProcessing: divLoader()},
      ajax: `../member/attendance/${id}`,
      columns: [
          { title: "Service type", data: 'service_types.name', name: 'service_types.name' },
          { title: "Attendance", data: 'attendance', name: 'attendance' },
          { title: "Transaction Date", data: 'updated_at', name: 'updated_at' },
          { title: "Processed Date", data: 'date', name: 'date' },
      ],
      dom: 'Bfrtip',
      lengthChange: false,
      buttons: ['copy', 'excel', 'pdf', 'colvis']
  });
  return ;
}

function view(d, fn){
  var id = $(d).attr('id');
  $.ajax({url: "{{route('attendance.view')}}", data: {'date': id, '_token' : '{{ csrf_token() }}'}, type: 'POST'})
  .done((res) => {
    if (res.status) {
      $('#modal-body').html(viewAttendance(res.attendance))
      showe(res.attendance.attendance_date)
    }else {
      swal("Oops", res.text, "error");
    }
    if (typeof(fn) === 'function') {
      fn(res)
    }
  })
  .fail((e) => {
    swal("Oops", "internal server error", "error");
    // stop loading element
    loadElement($(d), false)
    console.log(e);
  })
}

const viewAttendance = (attendance) => {
return  `
  <div class="col-md-12">
      <div class="panel rounded-top" style="background-color: #e8ddd3;">
          <div class="panel-body text-center clearfix">
              <div class="col-sm-4 pad-top">
                  <div class="text-lg">
                      <p class="text-5x text-thin text-main">${(parseInt(attendance.male) + parseInt(attendance.female) + parseInt(attendance.children))}</p>
                  </div>
                  <p class="text-sm text-bold text-uppercase">Total Attendance</p>
              </div>
              <div class="col-sm-8">
                  <!--<button class="btn btn-pink mar-ver">View Details</button>
                  <p class="text-xs">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>-->
                  <ul class="list-unstyled text-center bord-to pad-top mar-no row">
                      <li class="col-xs-4">
                        <div class="col">
                          <span class="text-lg text-semibold text-main">${attendance.male}</span>
                          <p class="text-sm text-muted mar-no">Men</p>
                        </div>
                        <div class="col">
                          <span class="icon fa fa-male"></span>
                        </div>
                      </li>
                      <li class="col-xs-4">
                        <div class="col">
                          <span class="text-lg text-semibold text-main">${attendance.female}</span>
                          <p class="text-sm text-muted mar-no">Women</p>
                        </div>
                        <div class="col">
                          <span class="icon fa fa-female"></span>
                        </div>
                      </li>
                      <li class="col-xs-4">
                        <div class="col">
                          <span class="text-lg text-semibold text-main">${attendance.children}</span>
                          <p class="text-sm text-muted mar-no">Children</p>
                        </div>
                        <div class="col">
                          <span class="icon fa fa-child"></span>
                        </div>
                      </li>
                  </ul>
              </div>
          </div>
      </div>
  </div>`
}
</script>
@endsection
