
@extends('layouts.app')

@section('title') All Branches @endsection

@section('link')
<link href="{{ URL::asset('css/sweetalert.css') }}" rel="stylesheet">
@endsection

@section('content')
<!--CONTENT CONTAINER-->
<!--===================================================-->
<div id="content-container">
    <div id="page-head">
        <!--Page Title-->
        <div id="page-title">
            <h1 class="page-header text-overflow">Branch</h1>
        </div>
        <!--End page title-->
        <!--Breadcrumb-->
        <ol class="breadcrumb">
          <li>
              <i class="fa fa-home"></i><a href="{{route('dashboard')}}"> Dashboard</a>
          </li>
            <li class="active">All</li>
        </ol>
        <!--End breadcrumb-->
    </div>
    <!--Page content-->
    <!--===================================================-->
    <div id="page-content">
        <!-- Basic Data Tables -->
        <!--===================================================-->
        <div class="panel" style="overflow:scroll; background-color: #e8ddd3;">
            <div class="panel-heading">
                <h3 class="panel-title">List of All Branches</h3>
            </div>
            <div class="panel-body">
                <form id="users-form" onsubmit="return false;" >
                  <table id="users-table" class="table table-striped table-bordered" cellpadding="10" cellspacing="0" width="100%" >
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
<script src="{{ URL::asset('plugins/datatables/dataTables.semanticui.min.js') }}"></script>
<script src="{{ URL::asset('plugins/datatables/dataTables.buttons.min.js') }}"></script>
<script src="{{ URL::asset('plugins/datatables/buttons.semanticui.min.js') }}"></script>
<script src="{{ URL::asset('plugins/datatables/jszip.min.js') }}"></script>
<script src="{{ URL::asset('plugins/datatables/pdfmake.min.js') }}"></script>
<script src="{{ URL::asset('plugins/datatables/vfs_fonts.js') }}"></script>
<script src="{{ URL::asset('plugins/datatables/buttons.html5.min.js') }}"></script>
<script src="{{ URL::asset('plugins/datatables/buttons.print.min.js') }}"></script>
<script src="{{ URL::asset('plugins/datatables/buttons.colVis.min.js') }}"></script>
<script src="{{ URL::asset('js/functions.js') }}"></script>
<script src="{{ URL::asset('js/sweetalert.min.js') }}"></script>
<script>
function strim(text){
  return text.trim()
}
var currencies;
(function(){
  $.ajax({url: "{{route('option.currencies')}}"})
  .done((res) => { currencies = res })
})()
var countries;
(function(){
  $.ajax({url: "{{route('option.countries')}}"})
  .done((res) => { countries = res })
})()
$(document).ready(function () {
  var i = 1
  users_table = $('#users-table').DataTable({
      processing: true,
      serverSide: true,
      "columnDefs": [
        { "orderable": false, "targets": 0 }
      ],
      oLanguage: {sProcessing: divLoader()},
      ajax: "{{route('branches')}}",
      columns: [
          { title: '<input id="select-all" type="checkbox" /> Select all', data: 'id', render : ( id ) => (`<input type="checkbox" name="branch[]" value="${id}" />`)
          , name: 'id' },
          { title: "S/N", render: () => (i++), name: 'id' },
          { title: "Branch Name", data: 'branchname', name: 'branchname'},
          { title: "Address", data: 'address', name: 'address' },
          { title: "Branch Code", data: 'branchcode', name: 'branchcode', render: (code) => (`
            <div class="btn-group">
              <h5 style="background-color:pink; padding:5pt;" class="text-center">${code}</h5>
            </div>
            `)
          },
          // { title: "phone Number", data: 'phone', name: 'phone' },
          { title: "Email", data: 'email', name: 'email' },
          { title: "Branch Role", data: 'isadmin', name: 'isadmin', render: (bool) => (`
            ${(bool === 'true') ? '<strong>HeadQuaters</strong>' : 'Branch Church'}
            `)
          },
          { title: "State", data: 'state', name: 'state' },
          { title: "City", data: 'city', name: 'city' },
          { title: "Country", data: 'country', name: 'country', render : (data) => (`
            ${data}
            <input type="hidden" value="${data}" id="countryId" />
            `)
          },
          { title: "Currency", data: 'currency', name: 'currency', render : (data) => (`
            ${data}
            <input type="hidden" value="${data}" id="currencyId" />
            `)
          },
          { title: "Action", data: 'id', name: 'action', render: (id) => (`
            <div class="btn-group">
              <button style="background-color:orange" class="btn text-light edit" data-id="${id}"><i class="fa fa-edit"></i></button>
              <!--a style="background-color:green" class="btn text-light" disabled href="#"><i class="fa fa-eye"></i></a-->
              <a href="#" id="./branches/${id}/destroy" onclick="del(this);" class="btn btn-danger" />
                <i class="fa fa-trash"></i>
              </a>
              <!--a id="${id}" style="background-color:#8c0e0e" class="d-member btn text-light"><i class="fa fa-trash"></i></a-->
            </div>
            `)
          },
      ],
      dom: 'Bfrtip',
      lengthChange: false,
      buttons: ['copy', 'excel', 'pdf', 'colvis']
  });

  // members edit table row
  $('#users-table').on( 'click', 'tbody tr td .edit ', function (e) {
    id = $(this).attr('data-id')
    let i = 0;
    columns = $(this).parent().closest('tr').find('td').each(function(){
      if (i == 2) {
        $(this).html(`
          <div class="col-md-9">
            <input type="text" value="${strim($(this).text())}" class="form-control" name="branchname" placeholder="Enter your email" required="">
          </div>
        `)
      } else if (i == 3) {
        $(this).html(`
          <div class="col-md-9">
            <textarea id="demo-textarea-input" value="${strim($(this).text())}" name="address" rows="5" class="form-control" placeholder="Address I">${$(this).text()}</textarea>
          </div>
        `)
      } else if (i == 4) {
        $(this).html(`
          <div class="col-md-12">
            <input type="text" value="${strim($(this).text())}" class="form-control" name="branchcode" placeholder="Enter the code" required>
          </div>
        `)
      } else if (i == 5) {
          $(this).html(`
            <div class="col-md-12">
              <input type="email" id="demo-email-input" value="${strim($(this).text())}" class="form-control" name="email" placeholder="Enter your email" required>
            </div>
          `)
      } else if (i == 6) {
          $(this).html(`
            <div class="col-md-12">
              <input id="demo-form-radio" class="magic-radio" value="true" type="radio" name="isadmin" ${(strim($(this).text()) === 'HeadQuaters') ? 'checked=""' : ''}>
              <label for="demo-form-radio">HeadQuaters</label>
              <input id="demo-form-radio-2" class="magic-radio" value="false" type="radio" name="isadmin" ${(strim($(this).text()) === 'Branch Church') ? 'checked=""' : ''}>
              <label for="demo-form-radio-2">Branch Church</label>
            </div>
          `)
      } else if (i == 7) {
          $(this).html(`
            <div class="col-md-12">
              <input type="text" class="form-control" value="${strim($(this).text())}" name="state" placeholder="Enter bracnh state" required>
            </div>
          `)
      } else if (i == 8) {
          $(this).html(`
            <div class="col-md-12">
              <input type="text" class="form-control" value="${strim($(this).text())}" name="city" placeholder="Enter bracnh city" required>
            </div>
          `)
      } else if (i == 9) {
        function options(countries){
          opt = ''
          countries.forEach((v) => {
            opt += `<option value="${v.name}">${v.name}</option>`
          })
          return opt
        }
          $(this).html(`
            <div class="col-md-12">
              <select name="country" class="selectpicker col-xs-6 col-sm-4 col-md-6 col-lg-9" data-style="btn-success" required>
                <option selected value="${$(this).find('#countryId').val()}">${strim($(this).text())}</option>
                ${options(countries)}
              </select>
            </div>
          `)
      } else if (i == 10) {
        function options(currencies){
          opt = ''
          currencies.forEach((v) => {
            if (v.currency_symbol) {
              opt += `<option value="${v.currency_symbol}">${v.name} - ${v.currency_symbol}</option>`
            }
          })
          return opt
        }
          $(this).html(`
            <div class="col-md-9">
              <select name="currency" class="selectpicker col-xs-6 col-sm-4 col-md-6 col-lg-9" data-style="btn-success">
                <option selected value="${$(this).find('#currencyId').val()}">${strim($(this).text())}</option>
                ${options(currencies)}
              </select>
            </div>
          `)
      } else if (i == 11) {
          $(this).html(`
            <input type="hidden" value="${id}" name="id" />
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
    url = "{{route('branch.update')}}"
      poster({url,data}, (res) => {users_table.ajax.reload(null, false); console.log(res);})
  })

  //for cancel user edit
  $('#users-table').on( 'click', 'tbody tr td .restore', function (e) {
    users_table.ajax.reload(null, false)
  })

  //for bulk delete
  $('#select-all').click(function(){
    if(this.checked){
      $('input[name=branch\\[\\]]').each(function()
      {
        this.checked = true;
      });
    }else{
      $('input[name=branch\\[\\]]').each(function()
      {
        this.checked = false;
      });
    }
  });

  $('#apply').click(function(){
    loadElement($('#apply'), true)
    var example = $('input[name=branch\\[\\]]').map(function(){
      if($(this).is(':checked')){return this.value;}
    }).get();
    if(example.length == 0){return;}
    if($('#action').find(":selected[value=delete]").length == 0){loadElement($('#apply'), false); return;}
    let confirmed = confirm('Are you sure you want to delete selected item(s)?');
    if(confirmed){
      var values = {'id': example, '_token': '{{ csrf_token() }}' };
      $.ajax({type: "POST", url: "{{route('branch.delete.multi')}}", data: values, dataType: "json", encode: true})
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

function del(d){
    var confirmed = confirm('confirm to delete');
    console.log(confirmed);
    console.log(d);
    if(confirmed){
        var id = $(d).attr('id');
        console.log(id);
        $.ajax({
            url: id,
        }).done(function(){
            location.reload();
        });
    }//{{route("branch.destroy",' + id + ')}}
}
</script>
@endsection
