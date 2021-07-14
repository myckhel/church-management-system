@extends('layouts.app')

@section('title') All Members @endsection

@section('link')
<link href="{{ URL::asset('plugins/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('css/sweetalert.css') }}" rel="stylesheet">
<link href="{{ URL::asset('plugins/datatables/media/css/dataTables.bootstrap.css') }}" rel="stylesheet">
@endsection

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
            <div class="panel-body">
                <!--div style="height:100px;border:1px solid green">
                Sort by Newest Members, Gender
              </div-->
              <form id="users-form" onsubmit="return false;" >
                <div class="table-responsive">
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
                </div>
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
<script src="{{ URL::asset('plugins/datatables/dataTables.buttons.min.js') }}"></script>
<script src="{{ URL::asset('plugins/datatables/buttons.semanticui.min.js') }}"></script>
<script src="{{ URL::asset('plugins/datatables/jszip.min.js') }}"></script>
<script src="{{ URL::asset('plugins/datatables/pdfmake.min.js') }}"></script>
<script src="{{ URL::asset('plugins/datatables/vfs_fonts.js') }}"></script>
<script src="{{ URL::asset('plugins/datatables/buttons.html5.min.js') }}"></script>
<script src="{{ URL::asset('plugins/datatables/buttons.colVis.min.js') }}"></script>
<script src="{{ URL::asset('plugins/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ URL::asset('js/sweetalert.min.js') }}"></script>

<script>
var users_table = null
$('.datepicker').datepicker();
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
            // { title: "S/N", render: () => (i++), name: 'id' },
            { title: "Photo", data: 'photo', render: (photo) => (`<img src="{{url('images/')}}/${photo}"  class="img-md img-circle" alt="Profile Picture">`), name: 'photo' },
            { title: "Full Name", data: {firstname: 'firstname', lastname: 'lastname'}, name: 'fullname', render: (data) => (`${data.firstname + ' ' + data.lastname}`) },
            // { title: "Occupation", data: 'occupation', name: 'occupation' },
            { title: "Member Status", data: {member_status: 'member_status', id: 'id', firstname: 'firstname', lastname: 'lastname'}, name: 'member_status',
             render: (data) => (`${data.member_status == 'new' ? 'First Timer ' : 'Full Member '}
             ${data.member_status == 'new' ? '<button value="' + data.id + '" onClick="makeMember(this, users_table.ajax.reload)" class="btn-info" data-placement="up" title="Make ' + data.firstname + ' ' + data.lastname +
             ' a Full Member"><i class="fa fa-level-up"></i> <i class="fa fa-user"></i></button>' : ''}`)
            },
            // { title: "Marital Status", data: 'marital_status', name: 'marital_status' },
            { title: "phone Number", data: 'phone', name: 'phone' },
            { title: "Email", data: 'email', name: 'email' },
            { title: "Sex", data: 'sex', name: 'sex' },
            // { title: "Birthdate", data: 'dob', name: 'dob' },
            // { title: "Member Since", data: 'member_since', name: 'member_since' },
            { title: "Position", data: 'position', name: 'position' },
            { title: "Address", data: 'address', name: 'address' },
            // { title: "Address2", data: 'address2', name: 'address2' },
            // { title: "State", data: 'state', name: 'state' },
            // { title: "City", data: 'city', name: 'city' },
            // { title: "Country", data: 'country', name: 'country' },
            // { title: "wedding Anniversary", data: 'wedding_anniversary', name: 'wedding_anniversary' },
            { title: "Action", data: 'id', name: 'action', render: (id) => (`
              <div class="btn-group">
                <button style="background-color:orange" class="btn text-light edit" data-id="${id}"><i class="fa fa-edit"></i></button>
                <a style="background-color:green" class="btn text-light" href="../member/profile/${id}"><i class="fa fa-eye"></i></a>
                <a id="${id}" style="background-color:#8c0e0e" class="d-member btn text-light"><i class="fa fa-trash"></i></a>
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
      confirmation = confirm('Are you sure you want to delete the member?')
      if(confirmation){
        data = {}
        toggleAble($this, true, "deleting")
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

    // members edit table row
    $('#users-table').on( 'click', 'tbody tr td .edit ', function (e) {
      id = $(this).attr('data-id')
      let i = 0;
      columns = $(this).parent().closest('tr').find('td').each(function(){
        if (i == 3) {
          fullname = $(this).text().split(' ');
          fname = fullname[0]
          lname = fullname[1]
          $(this).html('FirstName<input value="'+fname+'" />')
          $(this).append('LastName<input value="'+lname+'" />')
        } else if (i == 4) {
            $(this).html(`
              <select name="occupation" class="selectpicker col-xs-6 col-sm-4 col-md-6 col-lg-9" data-style="btn-success" required="" tabindex="-98">
                <option value="${$(this).text()}">${$(this).text()}</option>
                <option value="Doctor">Doctor</option>
                <option value="Engineer">Engineer</option>
                <option value="Surveyor">Surveyor</option>
                <option value="Business Person">Business Person</option>
                <option value="Lecturer">Lecturer</option>
                <option value="Professor">Professor</option>
                <option value="Pharmacist">Pharmacist</option>
                <option value="Trader">Trader</option>
                <option value="Civil Servant">Civil Servant</option>
                <option value="Retired">*Retired</option>
                <option value="Other">Other</option>
              </select>
            `)
        } else if (i == 5) {
          value = ($(this).text() === 'Member') ? 'old' : 'new';
            $(this).html(`
              <select id="member_status" name="member_status" class="selectpicker col-xs-6 col-sm-4 col-md-6 col-lg-9" data-style="btn-info" tabindex="-98">
                <option value="${value}">${$(this).text()}</option>
                <option value="old">Member</option>
                <option value="new">First Timer</option>
              </select>
            `)
        } else if (i == 6) {
          option = ($(this).text() === 'single') ? 'old' : 'new';
            $(this).html(`
              <div class="col-md-9">
                    <input id="demo-inline-form-radio" class="magic-radio" value="single" type="radio" name="marital_status" ${($(this).text() === 'single') ? 'checked=""' : ''}>
                    <label for="demo-inline-form-radio">Single</label>

                    <input id="demo-inline-form-radio-2" class="magic-radio" value="married" ${($(this).text() === 'married') ? 'checked=""' : ''} type="radio" name="marital_status">
                    <label for="demo-inline-form-radio-2">Married</label>
              </div>
            `)
        } else if (i == 7) {
            $(this).html(`
              <div class="col-md-9">
                <input type="number" class="form-control" value="${$(this).text()}" name="phone" placeholder="Enter your phone number" required="">
              </div>
            `)
        } else if (i == 8) {
            $(this).html(`
              <div class="col-md-9">
                <input type="email" id="demo-email-input" value="${$(this).text()}" class="form-control" name="email" placeholder="Enter your email" required="">
              </div>
            `)
        } else if (i == 9) {
            $(this).html(`
              <div class="col-md-9">
                <input id="demo-form-radio" class="magic-radio" value="male" type="radio" name="sex" ${($(this).text() === 'male') ? 'checked=""' : ''}>
                <label for="demo-form-radio">Male</label>
                <input id="demo-form-radio-2" class="magic-radio" value="female" type="radio" name="sex" ${($(this).text() === 'female') ? 'checked=""' : ''}>
                <label for="demo-form-radio-2">Female</label>
              </div>
            `)
        } else if (i == 10) {
            $(this).html(`
              <div class="col-md-9">
                <input type="text" placeholder="Date of Birth" value="${$(this).text()}" name="dob" class="datepicker form-control" required="">
              </div>
            `)
        } else if (i == 11) {
            $(this).html(`
              <div class="form-group">
              <div class="col-md-9">
                <input type="text" id="member_since" value="${$(this).text()}" placeholder="Member Since" name="member_since" class="datepicker form-control" required/>
              </div>
              </div>
            `)
        } else if (i == 12) {
            $(this).html(`
              <div class="col-md-9">
                <select name="position" class="selectpicker col-xs-6 col-sm-4 col-md-6 col-lg-9" data-style="btn-success">
                  <option selected value="${$(this).text()}">${$(this).text()}</option>
                  <option value="senior pastor">Senior Pastor</option>
                  <option value="pastor">Pastor</option>
                  <option value="member">Member</option>
                  <option value="usher">Usher</option>
                  <option value="worker">Worker</option>
                  <option value="chorister">Chorister</option>
                  <option value="elder">Elder</option>
                  <option value="technician">Technician</option>
                  <option value="instrumentalist">Instrumentalist</option>
                  <option value="deacon">Deacon</option>
                  <option value="deaconess">Deaconess</option>
                  <option value="evangelist">Evangelist</option>
                  <option value="minister">Minister</option>
                  <option value="protocol">Protocol</option>
                  <option value="hod">HOD</option>
                </select>
                <input type="hidden" value="${id}" name="id" />
              </div>
            `)
        } else if (i == 13) {
            $(this).html(`
              <div class="col-md-9">
                <textarea id="demo-textarea-input" value="${$(this).text()}" name="address" rows="5" class="form-control" placeholder="Address I" required>${$(this).text()}</textarea>
              </div>
            `)
        } else if (i == 14) {
            $(this).html(`
              <div class="col-md-9">
                <textarea id="demo-textarea-input" value="${$(this).text()}" name="address2" rows="5" class="form-control" placeholder="Address II">${$(this).text()}</textarea>
              </div>
            `)
        } else if (i == 15) {
            $(this).html(`
              <div class="col-md-9">
                <input type="text" class="form-control" value="${$(this).text()}" name="state" placeholder="Enter member state" required>
              </div>
            `)
        } else if (i == 16) {
            $(this).html(`
              <div class="col-md-9">
                <input type="text" class="form-control" value="${$(this).text()}" name="city" placeholder="Enter member state" required>
              </div>
            `)
        } else if (i == 17) {
            $(this).html(`
              <div class="col-md-9">
                <input type="text" class="form-control" value="${$(this).text()}" name="country" placeholder="Enter member country" required>
              </div>
            `)
        } else if (i == 18) {
            $(this).html(`
              <div class="col-md-9">
                <input id="anniversary" value="${$(this).text()}" type="text" placeholder="Wedding Anniversary" name="wedding_anniversary" class="datepicker form-control"/>
              </div>
            `)
        } else if (i == 19) {
            $(this).html(`
              <button type="button" class="restore btn btn-sm btn-warning" style="float: left;">Cancel</button><div>
              <button type="submit" class="save btn btn-sm btn-success" style="float: right;">Save</button>
              @csrf
            `)
        }
        i++
      })
    });

    //for save user
    // $('#users-table').on( 'click', 'tbody tr td .save', function (e) {
    $('#users-form').on('submit', function (e) {
      e.preventDefault()
      data = {}
      data = $(this).serializeArray()
      url = "{{route('member.update')}}"
        poster({url,data}, (res) => {users_table.ajax.reload(null, false); console.log(res);})
    })

    //for cancel user edit
    $('#users-table').on( 'click', 'tbody tr td .restore', function (e) {
      users_table.ajax.reload(null, false)
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
