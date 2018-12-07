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
            <li class="active">All</li>
        </ol>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--End breadcrumb-->

    </div>

    <!--Page content-->
    <!--===================================================-->
    <div id="page-content">
        <!-- Basic Data Tables -->
        <!--===================================================-->
        <div class="panel rounded-top" style="background-color: #e8ddd3;">
            <div class="panel-heading card-block text-center">
                <h1 class="panel-title text-primary text-bold">List of Members In {{\Auth::user()->branchname}}</h1>
            </div>
            <div class="col-lg-10 col-lg-offset-2">
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
            <div class="panel-body" style="overflow:scroll">
                <!--div style="height:100px;border:1px solid green">
                Sort by Newest Members, Gender
              </div-->
              <form id="members" onsubmit="return false;" >
                <table id="demo-dt-basic" class="table table-striped table-bordered datatable" cellspacing="0" width="100%" >
                    <thead>
                        <tr>
                            <th><input id="select-all" type="checkbox" /> Select all</th>
                            <th>S/N</th>
                            <th>Photo</th>
                            <th>Position</th>
                            <th>Full Name</th>
                            <th>Occupation</th>
                            <th class="min-tablet">Member Status</th>
                            <th class="min-tablet">Marital Status</th>
                            <th class="min-tablet">Phone Number</th>
                            <th class="min-desktop">Birthday</th>
                            <th class="min-desktop">Member Since</th>
                            <th class="min-desktop">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $count=1;?>
                        @foreach($members as $member)
                        <tr>
                            <th><input type="checkbox" name="member[]" value="{{$member->id}}" /></th>
                            <th>{{$count}}</th>
                            <th><img src="{{url('/public/images/')}}/{{$member->photo}}"  class="img-md img-circle" alt="Profile Picture"></th>
                            <td><strong>{{strtoupper($member->position)}}</strong></td>
                            <td>{{ucwords($member->getFullname())}}</td>
                            <td>{{$member->occupation}}</td>
                            <td><?php
                              echo $member->member_status == 'new' ? 'First Timer ' : 'Full Member ';
                              echo $member->member_status == 'new' ? '<button onClick="makeMember('. $member->id .')" class="btn-info" data-placement="up" title="Make '.$member->getFullname().' a Full Member"><i class="fa fa-level-up"></i> <i class="fa fa-user"></i></button>' : '';
                            ?></td>
                            <td>{{$member->marital_status}}</td>
                            <td>{{$member->phone}}</td>
                            <td>{{$member->dob}}</td>
                            <td>{{$member->member_since}}</td>
                            <td style='white-space: nowrap'>
                              <div class="btn-group">
                                <a style="background-color:green" class="btn text-light" href="{{route('member.profile', $member->id)}}">View Profile</a><!--a style="margin-left:5px;" class="btn btn-primary" href="{{route('member.edit', $member->id)}}">Edit Profile</a-->
                                <a style="background-color:#8c0e0e" class="btn text-light" href="{{route('member.delete', $member->id)}}" onclick="return confirm('Are you sure you want to delete the member?')"><i class="fa fa-trash"></i> Delete Member</a></td>
                              </div>
                        </tr>
                        <?php $count++;?>
                        @endforeach
                    </tbody>
                </table>
                <select id="action" name="action">
                  <option>with selected</option>
                  <option value="delete">delete</option>
                </select>
                <input class="btn-danger" id="apply" type="button" value="apply">
              </form>
            </div>
        </div>
        <!--===================================================-->
        <!-- End Striped Table -->


    </div>
    <!--===================================================-->
    <!--End page content-->

</div>
<!--===================================================-->
<!--END CONTENT CONTAINER-->
@endsection

@section('js')
<!--DataTables [ OPTIONAL ]-->
<script src="{{ URL::asset('plugins/datatables/media/js/jquery.dataTables.js') }}"></script>
<script src="{{ URL::asset('plugins/datatables/media/js/dataTables.bootstrap.js') }}"></script>
<!--<script src="{{ URL::asset('plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js') }}"></script>-->

<!--DataTables Sample [ SAMPLE ]-->
<!--<script src="{{ URL::asset('js/demo/tables-datatables.js') }}"></script>-->

<script src="{{ URL::asset('plugins/datatables/dataTables.semanticui.min.js') }}"></script>

<script src="{{ URL::asset('plugins/datatables/dataTables.buttons.min.js') }}"></script>
<!--<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>-->


<script src="{{ URL::asset('plugins/datatables/buttons.semanticui.min.js') }}"></script>

<script src="{{ URL::asset('plugins/datatables/jszip.min.js') }}"></script>
<script src="{{ URL::asset('plugins/datatables/pdfmake.min.js') }}"></script>
<script src="{{ URL::asset('plugins/datatables/vfs_fonts.js') }}"></script>
<script src="{{ URL::asset('plugins/datatables/buttons.html5.min.js') }}"></script>
<script src="{{ URL::asset('plugins/datatables/buttons.print.min.js') }}"></script>

<script src="{{ URL::asset('plugins/datatables/buttons.colVis.min.js') }}"></script>

<script>
$(document).ready(function () {

  if ($.fn.dataTable.isDataTable('.datatable')) {
    table = $('.datatable').DataTable()
  } else {
    var table_buttons = $('.datatable').DataTable({
      dom: 'Bfrtip',
      lengthChange: false,
      buttons: ['copy', 'excel', 'pdf', 'colvis']
    });

    table_buttons.buttons().container()
      .appendTo($('div.eight.column:eq(0)', table_buttons.table().container()));
  }
});
</script>
<script>
  $(document).ready(function(){
    //for bulk delete
    $('#select-all').click(function(){
      if(this.checked){
        $('input[name=member\\[\\]]').each(function()
        {
          this.checked = true;
        });
      }else{
        $('input[name=member\\[\\]]').each(function()
        {
          this.checked = false;
        });
      }
    });
    $('#apply').click(function(){
      var example = $('input[name=member\\[\\]]').map(function(){
        if($(this).is(':checked')){return this.value;}
      }).get();
      if(example.length == 0){return;}
      if($('#action').find(":selected[value=delete]").length == 0){return;}
      let confirmed = confirm('Are you sure you want to delete selected items?');
      if(confirmed){
        var values = {'id': example, '_token': '{{ csrf_token() }}' };
        $.ajax({type: "POST", url: "{{route('member.delete.multi')}}", data: values, dataType: "json", encode: true})
          .done(function(response){
            if(response.status){
              alert('Selected Members Has Been Deleted Successfully');
              if(response.failed.length > 0){
                alert('Couldnt Delete'+response.failed);
              }
              window.location.reload();
            }else{
              alert('Error Occured');
            }
        });
      }
    });
  });
function makeMember(member_id){
  var confirmed = confirm('Are you sure you make this member a full member?');
  var values = {'id': member_id, '_token': '{{ csrf_token() }}' };
  // process the form
  $.ajax({
      type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
      url         : "{{route('member.upgrade')}}", // the url where we want to POST
      data        : values, // our data object
      dataType    : 'json', // what type of data do we expect back from the server
      encode      : true
  })
  // using the done promise callback
  .done(function(data) {
    if(data.status){
      // log data to the console so we can see
      // data.name +
      alert(data.status + ' is now a full member');
      window.location.reload();
    }
    // else if (!data.status) {
    //   alert(data.reason);
    // }
    else{
      alert('Error occured Please try again');
      window.location.reload();
    }
  });
}
</script>
@endsection
