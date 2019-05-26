@extends('layouts.app')

@section('title') Mark Attendance @endsection

@section('link')
<link href="{{ URL::asset('css/sweetalert.css') }}" rel="stylesheet">
@endsection

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
              <i class="fa fa-home"></i><a href="{{route('dashboard')}}"> Dashboard</a>
          </li>
            <li class="active">Mark</li>
        </ol>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--End breadcrumb-->

    </div>


    <!--Page content-->
    <!--===================================================-->
    <div id="page-content">
      @include('layouts.error')
      <div class="col-md-12 col-md-offset-0 col-lg-8 col-lg-offset-1" style="margin-bottom:20px">
          <div class="panel rounded-top" style="background-color: #e8ddd3;">
              <div class="panel-heading">
                  <h3 class="panel-title text-center">Mark Attendnace for <strong>{{\Auth::user()->branchname}} <i>{{\Auth::user()->branchcode}}</i></strong></h3>
              </div>
              <!-- if service types not exists -->
              @if(!count($services) > 0)
              <div class="col-12 well text-center bg-danger">
                <div class="text-lg">
                  <div class="col-8">
                    Oooops! to mark attendance please create service type here
                  </div>
                  <div class="col-4">
                    <a class="btn btn-info" href="{{route('branch.tools')}}">Add Service Type</a>
                  </div>
                </div>
              </div>
              @else

              <!--Block Styled Form -->
              <!--===================================================-->
              <form id="b-attendance-form" method="POST" action="{{route('attendance.submit')}}">
                  @csrf
                  <input name="branch_id" value="3" type="text" hidden="hidden"/>
                  <div class="panel-body">
                      <div class="row">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-6">
                            <div class="form-group text-center">
                                <label class="control-label">Date</label>
                                <input id="mark-date" type="date" name="date" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-sm-3"></div>
                      </div>
                      <div class="row text-center">
                          <div class="col-sm-2">
                              <div class="form-group">
                                  <label class="control-label">Male</label>
                                  <input type="number" min=0 name="male" class="form-control" required>
                              </div>
                          </div>
                          <div class="col-sm-2">
                              <div class="form-group">
                                  <label class="control-label">Female</label>
                                  <input type="number" min=0 name="female" class="form-control" required>
                              </div>
                          </div>

                          <div class="col-sm-2">
                              <div class="form-group">
                                  <label class="control-label">Children</label>
                                  <input type="number" min=0 name="children" class="form-control" required>
                              </div>
                          </div>

                          <div class="col-sm-5">
                              <div class="form-group">
                                <label class="control-label">Service Type</label>
                                  <select name="type" id="mark-select" class="selectpicker" data-style="btn-success" required>
                                    @foreach($services as $service)
                                    <option value="{{$service->id}}">{{$service->name}}</option>
                                    @endforeach
                                  </select>
                              </div>
                          </div>
                      <div class="row">
                      </div>
                      <div class="row">
                          </div>
                      </div>
                  </div>
                  <div class="panel-footer text-right bg-dark">
                      <button id="btn-mark" class="btn btn-success" type="submit">Submit</button>
                  </div>
              </form>
              @endif
            </div>
          </div>
                    <!--===================================================-->
                    <!--End Block Styled Form -->

          <div class="col-md-12 col-md-offset-0 col-lg-8 col-lg-offset-1" style="margin-bottom:20px">
              <div class="panel bg-warning rounded-top"  style="overflow:scroll; background-color: #e8ddd3;">
                  <div class="panel-heading">
                      <h3 class="panel-title text-center">Mark Attendnace for <strong>{{\Auth::user()->branchname}} <i>{{\Auth::user()->branchcode}}</i></strong></h3>
                  </div>

                  @if(!count($services) > 0)
                  <div class="col-12 well text-center bg-danger">
                    <div class="text-lg">
                      <div class="col-8">
                        Oooops! to mark attendance please create service type here
                      </div>
                      <div class="col-4">
                        <a class="btn btn-info" href="{{route('branch.tools')}}">Add Service Type</a>
                      </div>
                    </div>
                  </div>
                  @else

                  <div class="panel-body">
                  <form id="m-attendance" action="{{route('attendance.mark')}}" method="post" >
                    @csrf
                  <table id="mTable" class="table table-striped table-bordered datatable text-dark" cellspacing="0" width="100%" >
                      <thead>
                          <tr>
                              <th>S/N</th>
                              <th>Title</th>
                              <th>First Name</th>
                              <th>Last Name</th>
                              <th><input id="select-all" type="checkbox" />Mark All</th>
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
                              <td>{{$member->firstname}}
                              <td>{{$member->lastname}}
                              <td>
                                <div id="" class="input-group">
                                  <div class="checkbox">
                                    <label><input name="atte" type="checkbox" >Present<input id="" type="hidden" value="no" name="attendance[]" class="" /></label>
                                  </div>
                                </div>
                              </td>
                                <input id="" type="hidden" value="{{$member->id}}" name="member_id[]" class="" />
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
                            @foreach($services as $service)
                            <option value="{{$service->id}}">{{$service->name}}</option>
                            @endforeach
                          </select>
                      </div>
                    <div class="col-md-3 form-group pull-right" style="">
                      <h3><label for="date">Submit Attendance</label></h3>
                      <div class="input-group" style="width:100%">
                        <input id="m-submit-btn" type="submit" name="save" value="Submit" class="btn btn-primary form-control"/>
                      </div>
                    </div>

                    </div>
                </form>
              </div>
              @endif
          </div>
      </div>
    </div>
  </div>
  <!--===================================================-->
  <!--End page content-->

<!--===================================================-->
<!--END CONTENT CONTAINER-->
@endsection

@section('js')
<script src="{{ URL::asset('js/sweetalert.min.js') }}"></script>
<script src="{{ URL::asset('js/functions.js') }}"></script>
<script src="{{ URL::asset('plugins/datatables/media/js/jquery.dataTables.js') }}"></script>
<script src="{{ URL::asset('plugins/datatables/media/js/dataTables.bootstrap.js') }}"></script>
<script src="{{ URL::asset('plugins/datatables/dataTables.buttons.min.js') }}"></script>
<script src="{{ URL::asset('plugins/datatables/buttons.semanticui.min.js') }}"></script>
<script src="{{ URL::asset('plugins/datatables/jszip.min.js') }}"></script>
<script src="{{ URL::asset('plugins/datatables/vfs_fonts.js') }}"></script>
<script src="{{ URL::asset('plugins/datatables/buttons.html5.min.js') }}"></script>

<script src="{{ URL::asset('plugins/datatables/buttons.colVis.min.js') }}"></script>
<script>
$(document).ready(() => {
  //for bulk delete
  $('#select-all').click(function(){
    console.log('s');
    if(this.checked){
      $('input[name=atte]').each(function()
      {
        this.checked = true;
      });
    }else{
      $('input[name=atte]').each(function()
      {
        this.checked = false;
      });
    }
  });

  //configure member table
  if ($.fn.dataTable.isDataTable('.datatable')) {
    table = $('#mTable').DataTable()
  } else {
    var table = $('.datatable').DataTable({
      dom: 'Bfrtip',
      lengthChange: false,
      "paging": false,
      buttons: ['colvis']
    });
    table.buttons().container()
      .appendTo($('div.eight.column:eq(0)', table.table().container()));
  }
  // Branch Attendnace
  $('#b-attendance-form').submit((e) => {
    toggleAble($('#btn-mark'), true, 'submitting...')
    e.preventDefault()
    data = $('#b-attendance-form').serializeArray()
    url = "{{route('attendance.submit')}}"
    poster({url, data}, (res) => {
      if (res.status) {
        // toggleAble($('#btn-mark'), false)
        $('#b-attendance-form').trigger('reset')
      }
      toggleAble($('#btn-mark'), false)
    })
  })
  //member Attendnace
  $(":checkbox").change(function() {
		if($(this).is(':checked')){
			$(this).next().val('yes');
		}else{
			$(this).next().val('no');
		}
	});
  $('#m-attendance').submit((e) => {
    toggleAble($('#m-submit-btn'), true, 'marking...')
    e.preventDefault()
    let data = $('#m-attendance').serializeArray()
    url = "{{route('attendance.mark')}}"
    poster({url, data}, (res) => {
      if (res.status) {
        // location.reload()
        $('#m-attendance').trigger('reset')
      }
      toggleAble($('#m-submit-btn'), false)
    })
  })
})
</script>
@endsection
