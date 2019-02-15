@extends('layouts.app')

@section('title') Branch Tools @endsection

@section('link')
<link href="{{ URL::asset('css/sweetalert.css') }}" rel="stylesheet">
<link href="{{ URL::asset('plugins/datatables/media/css/dataTables.bootstrap.css') }}" rel="stylesheet">
@endsection

@section('content')
<div id="content-container">
  <div id="page-head">

      <!--Page Title-->
      <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
      <div id="page-title">
          <h1 class="page-header text-overflow">Branch Tools</h1>
      </div>
      <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
      <!--End page title-->
      <!--Breadcrumb-->
      <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
      <ol class="breadcrumb">
        <li>
            <i class="fa fa-home"></i><a href="{{route('dashboard')}}"> Dashboard</a>
        </li>
          <li class="active">Tools</li>
      </ol>
      <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
      <!--End breadcrumb-->

  </div>

  <div id="page-content">

    <div class="panel"  style="background-color: #e8ddd3;">
      <div class="panel-heading">
          <h3 class="panel-title text-center">Types</h3>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="pad-all">
            <form id="collection_type_form" method="POST" action="{{route('branch.toolsPost')}}">
              @csrf
              <label>Create Collection Type</label>
              <input type=text name=branch_id value="{{\Auth::user()->branchcode}}" hidden=hidden />
              <input type=text name=c_type_c value="{{\Auth::user()->branchcode}}" hidden=hidden />
              <input style="border:1px solid #ddd; padding:7px;outline:none" name="name" type=text pattern="[a-zA-Z0-9_ -]+" title="Only letters, numbers, _ and - accepted" Placeholder="Collection Name" required/>
              <button type="submit" class="btn btn-success btn-md"><i class="fa fa-plus"></i> Create Collection</button>
            </form>
          </div>
          <div class="pad-all">
            <table id="c-type-table" class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
        </div>
        <div class="col-md-6">
          <div class="pad-all">
            <form id="service_type_form" method="POST" action="{{route('branch.toolsPost')}}">
              @csrf
              <label>Create Service Type</label>
              <input type=text name=branch_id value="{{\Auth::user()->branchcode}}" hidden=hidden />
              <input type=text name=s_type_c value="{{\Auth::user()->branchcode}}" hidden=hidden />
              <input style="border:1px solid #ddd; padding:7px;outline:none" name="name" type=text Placeholder="Service Name" type=text pattern="[a-zA-Z0-9_ -]+" title="Only letters, numbers, _ and - accepted" required/>
              <button type="submit" class="btn btn-success btn-md"><i class="fa fa-plus"></i> Create Service</button>
            </form>
          </div>
          <div class="pad-all">
            <table id="s-type-table" class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('js')
<script src="{{ URL::asset('js/sweetalert.min.js') }}"></script>
<script src="{{ URL::asset('js/functions.js') }}"></script>
<script src="{{ URL::asset('plugins/datatables/media/js/jquery.dataTables.js') }}"></script>
<script src="{{ URL::asset('plugins/datatables/media/js/dataTables.bootstrap.js') }}"></script>
<script src="{{ URL::asset('plugins/datatables/dataTables.buttons.min.js') }}"></script>
<script src="{{ URL::asset('plugins/datatables/buttons.html5.min.js') }}"></script>
<script>
$(document).ready(() => {
  $.fn.dataTable.ext.errMode = () => alert('Error while loading the table data. Please refresh');
  $('#collection_type_form').submit((e) => {
    e.preventDefault()
    $this = $('#collection_type_form')
    let data = $($this).serializeArray()
    url = $($this).attr('action')
    poster({url,data}, () => {collection_table.ajax.reload(null, false); resetForm('#collection_type_form')})
  })
  //
  $('#service_type_form').submit((e) => {
    e.preventDefault()
    $this = $('#service_type_form')
    data = $($this).serializeArray()
    url = $($this).attr('action')
    poster({url,data}, () => {service_table.ajax.reload(null, false); resetForm('#service_type_form')})
  })
  // tables
  var collection_table = $('#c-type-table').DataTable({
    processing: true,
    serverSide: true,
    "columnDefs": [
      { "orderable": false, "targets": 0, "searchable": false }
    ],
    oLanguage: {sProcessing: divLoader()},
    ajax: "{{route('collection.type')}}",
    columns: [
      { title: "Name", data: 'name', name: 'name' },
      { title: "Actions", data: {id: 'id'}, /*name: 'name'*/
      render: (data) => (
        `
        ${data.name}
        `
      ),
      render: (data) => (`
        <div class="btn-group">
          <button style="background-color:green" class="btn text-light edit" data-id="${data.id}"><i class="fa fa-edit"></i></button>
          <button id="${data.id}" style="background-color:#8c0e0e" class="d-collection btn text-light"><i class="fa fa-trash"></i></button></td>
        </div>
      `)},
    ],
  })
  // tables
  var service_table = $('#s-type-table').DataTable({
    processing: true,
    serverSide: true,
    "columnDefs": [
      { "orderable": false, "targets": 0, "searchable": false }
    ],
    oLanguage: {sProcessing: divLoader()},
    ajax: "{{route('service.type')}}",
    columns: [
      { title: "Name", data: 'name', name: 'name' },
      { title: "Actions", data: {id: 'id'}, name: 'name', render: (data) => (`
        <div class="btn-group">
          <button style="background-color:green" class="btn text-light edit" data-id="${data.id}"><i class="fa fa-edit"></i></button>
          <button id="${data.id}" style="background-color:#8c0e0e" class="d-service btn text-light"><i class="fa fa-trash"></i></button></td>
        </div>
      `)},
    ],
  })
  // deletes
  //for delete collection
  $('#c-type-table').on('click', '.d-collection', (e) => {
    confirmation = confirm('Are you sure you want to delete the collection type?')
    if(confirmation){
      $this = $(e.target)
      toggleAble($this, true, "deleting")
      data = {}
      data.id = e.target.id
      data._token = "{{csrf_token()}}"
      url = "{{route('delete.collection.type')}}"
      poster({data, url}, () => {
        collection_table.ajax.reload(null, false)
        toggleAble($this, false)
      })
    }
  })
  // collection edit table row
  $('#c-type-table').on( 'click', 'tbody tr td .edit ', function (e) {
    id = $(this).attr('data-id')
    let i = 0;
    columns = $(this).parent().closest('tr').find('td').each(function(){
      if (i == 0) {
        $(this).html('<input value="'+$(this).text()+'" />')
      }else if (i == 1) {
          $(this).html(`
            <input type="hidden" value="${id}"  />
            <button type="button" class="restore btn btn-sm btn-warning" style="float: left;">Cancel</button><div>
            <button type="button" class="save btn btn-sm btn-success" style="float: right;">Save</button>
          `)
      }
      i++
    })
  });
  //for cancel collection
  $('#c-type-table').on( 'click', 'tbody tr td .restore', function (e) {
    collection_table.ajax.reload(null, false)
  })
  //for save collection
  $('#c-type-table').on( 'click', 'tbody tr td .save', function (e) {
    data = {}
    data.name = $($(this).parent().closest('tr').find('td :input')[0]).val()
    data.id = $($(this).parent().closest('tr').find('td :input')[1]).val()
    data._token = "{{csrf_token()}}"
    url = "{{route('update.collection.type')}}"
      poster({url,data}, () => {collection_table.ajax.reload(null, false)})
  })


  //for delete service
  $('#s-type-table').on('click', '.d-service', (e) => {
    confirmation = confirm('Are you sure you want to delete the service type?')
    if(confirmation){
      $this = $(e.target)
      toggleAble($this, true, "deleting")
      data = {}
      data.id = e.target.id
      data._token = "{{csrf_token()}}"
      url = "{{route('delete.service.type')}}"
      poster({data, url}, () => {
        service_table.ajax.reload(null, false)
        toggleAble($this, false)
      })
    }
  })

  // serice edit table row
  $('#s-type-table').on( 'click', 'tbody tr td .edit ', function (e) {
    id = $(this).attr('data-id')
    let i = 0;
    columns = $(this).parent().closest('tr').find('td').each(function(){
      if (i == 0) {
        $(this).html('<input value="'+$(this).text()+'" />')
      }else if (i == 1) {
          $(this).html(`
            <input type="hidden" value="${id}"  />
            <button type="button" class="restore btn btn-sm btn-warning" style="float: left;">Cancel</button><div>
            <button type="button" class="save btn btn-sm btn-success" style="float: right;">Save</button>
          `)
      }
      i++
    })
  });
  //for cancel
  $('#s-type-table').on( 'click', 'tbody tr td .restore', function (e) {
    service_table.ajax.reload(null, false)
  })
  //for save
  $('#s-type-table').on( 'click', 'tbody tr td .save', function (e) {
    data = {}
    data.name = $($(this).parent().closest('tr').find('td :input')[0]).val()
    data.id = $($(this).parent().closest('tr').find('td :input')[1]).val()
    data._token = "{{csrf_token()}}"
    url = "{{route('update.service.type')}}"
      poster({url,data}, () => {service_table.ajax.reload(null, false)})
  })

})
</script>
@endsection
