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
            <div class="panel-body" style="overflow:scroll">
                <!--div style="height:100px;border:1px solid green">
                Sort by Newest Members, Gender
              </div-->
              <form id="" onsubmit="return false;" >
                <table id="users-table" class="table table-striped table-bordered" cellspacing="0" width="100%" >
                    <thead>
                    </thead>
                    <tbody>
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
var users_table = null
$(document).ready(function () {
    var i = 1
    users_table = $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        "columnDefs": [
          { "orderable": false, "targets": 0 }
        ],
        oLanguage: {sProcessing: divLoader()},
        ajax: "{{route('members.all')}}",
        columns: [
            { title: '<input id="select-all" type="checkbox" /> Select all', data: 'id', render : ( data ) => (`<input type="checkbox" name="member[]" value="${data}" />`)
            , name: 'id' },
            { title: "S/N", render: () => (i++), name: 'id' },
            { title: "Photo", data: 'photo', render: (photo) => (`<img src="{{url('/public/images/')}}/${photo}"  class="img-md img-circle" alt="Profile Picture">`), name: 'photo' },
            { title: "Full Name", data: {firstname: 'firstname', lastname: 'lastname'}, name: 'fullname', render: (data) => (`${data.firstname + ' ' + data.lastname}`) },
            { title: "Occupation", data: 'occupation', name: 'occupation' },
            { title: "Member Status", data: {member_status: 'member_status', id: 'id', firstname: 'firstname', lastname: 'lastname'}, name: 'member_status',
             render: (data) => (`${data.member_status == 'new' ? 'First Timer ' : 'Full Member '}
             ${data.member_status == 'new' ? '<button value="' + data.id + '" onClick="makeMember(this, users_table.ajax.reload)" class="btn-info" data-placement="up" title="Make ' + data.firstname + ' ' + data.lastname +
             ' a Full Member"><i class="fa fa-level-up"></i> <i class="fa fa-user"></i></button>' : ''}`)
            },
            { title: "Marital Status", data: 'marital_status', name: 'marital_status' },
            { title: "phone Number", data: 'phone', name: 'phone' },
            { title: "Email", data: 'email', name: 'email' },
            { title: "Birthdate", data: 'dob', name: 'dob' },
            { title: "Member Since", data: 'member_since', name: 'member_since' },
            { title: "Action", data: 'id', name: 'action', render: (id) => (`
              <div class="btn-group">
                <a style="background-color:green" class="btn text-light" href="../member/profile/${id}">View Profile</a>
                <a id="${id}" style="background-color:#8c0e0e" class="d-member btn text-light"><i class="fa fa-trash"></i> Delete Member</a></td>
              </div>
              `)
            },
        ],
        dom: 'Bfrtip',
        lengthChange: false,
        buttons: ['copy', 'excel', 'pdf', 'colvis']
    });
    //for delete member
    $('#users-table').on('click', '.d-member', (e) => {
      // e.preventDefault()
      $this = $(e.target)
      toggleAble($this, true, "deleting")
      confirmation = confirm('Are you sure you want to delete the member?')
      if(confirmation){
        data = {}
        data.id = e.target.id
        data._token = "{{csrf_token()}}"
        url = `../member/delete/${data.id}`
        poster({data, url}, (res) => {
          if (res.status) {
            users_table.ajax.reload(null, false)
          } else {
            swal('Oops', res.text, "error")
          }
          toggleAble($this, false)
        })
      }
    })

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
      loadElement($('#apply'), true)
      var example = $('input[name=member\\[\\]]').map(function(){
        if($(this).is(':checked')){return this.value;}
      }).get();
      if(example.length == 0){return;}
      if($('#action').find(":selected[value=delete]").length == 0){loadElement($('#apply'), false); return;}
      let confirmed = confirm('Are you sure you want to delete selected items?');
      if(confirmed){
        var values = {'id': example, '_token': '{{ csrf_token() }}' };
        $.ajax({type: "POST", url: "{{route('member.delete.multi')}}", data: values, dataType: "json", encode: true})
          .done(function(response){
            // if(response.status){
            swal('Success', response.text, 'success')
            // }else{
            //   swal('Oops', 'Error Occured', 'error');
            // }
            users_table.ajax.reload(null, false)
        });
      }
      loadElement($('#apply'), false)
    });
  });
function makeMember(element, fn){
  var confirmed = confirm('Are you sure you make this member a full member?');
  if (confirmed){
    loadElement($(element), true)
    var values = {'id': $(element).val(), '_token': '{{ csrf_token() }}' };
    // process the form
    $.ajax({
        type        : 'POST',
        url         : "{{route('member.upgrade')}}",
        data        : values,
        dataType    : 'json',
        encode      : true
    })
    // using the done promise callback
    .done(function(data) {
      if(data.status){
        swal("Success!", data.text, "success");
      }
      else{
        swal("Oops", data.text, "error");
      }
      if (typeof(fn) === 'function') {
        fn(null, false);
      }
      loadElement($(element), false)
    });
  }
}
</script>
@endsection
