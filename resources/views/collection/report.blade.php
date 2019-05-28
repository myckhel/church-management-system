@extends('layouts.app')

@section('title') View Collection Report @endsection

@section('link')
<link href="{{ URL::asset('css/sweetalert.css') }}" rel="stylesheet">
<link href="{{ URL::asset('plugins/datatables/media/css/dataTables.bootstrap.css') }}" rel="stylesheet">
<link href="{{ URL::asset('plugins/datatables/buttons.semanticui.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<!--CONTENT CONTAINER-->
<!--===================================================-->
<div id="content-container">
  <div id="page-head">
    <!--Page Title-->
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <div id="page-title">
      <h1 class="page-header text-overflow">View Collection</h1>
    </div>
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <!--End page title-->
    <!--Breadcrumb-->
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <ol class="breadcrumb">
      <li>
        <i class="fa fa-home"></i><a href="{{route('dashboard')}}"> Dashboard</a>
      </li>
      <li class="active">Report</li>
    </ol>
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <!--End breadcrumb-->
  </div>
  <!--Page content-->
  <!--===================================================-->
  <div id="page-content">
    <div class="row">
      <div class="col-md-12 col-md-offset-0">
      <!-- Branch collection History -->
      <!--===================================================-->
      <div class="panel" style="background-color: #e8ddd3;">
        <div class="panel-heading">
          <h1 class="text-center panel-title">Branch Collection History</h1>
        </div>
          <div class="panel-body" style="overflow:scroll">
            <table id="b-history" class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
                <th>Service Type</th>
                @foreach($c_types as $types)
                <th>{{ucwords($types->name)}}</th>
                @endforeach
                <th>Collection Date</th>
                <th class="min-tablet">Processed Date</th>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
      </div>
      <!--===================================================-->
      <!-- End Striped Table -->
      </div>
      <div class="col-md-12 col-md-offset-0" style="margin-bottom:50px">
          <div class="panel" style="background-color: #e8ddd3;">
            <div class="panel-heading">
                <h1 class="text-center panel-title">Members Collection History</h1>
            </div>
          <div class="panel-body text-center clearfix" style="overflow:scroll">
            <table id="m-history" class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
                <th>Member Name</th>
                <th>Service Type</th>
                @foreach($c_types as $types)
                <th>{{ucwords($types->name)}}</th>
                @endforeach
                <th>Collection Date</th>
                <th class="min-tablet">Processed Date</th>
              </thead>
              <tbody>
              </tbody>
            </table>
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
<script src="{{ URL::asset('js/sweetalert.min.js') }}"></script>
<script src="{{ URL::asset('js/functions.js') }}"></script>
<script src="{{ URL::asset('plugins/datatables/media/js/jquery.dataTables.js') }}"></script>
<script src="{{ URL::asset('plugins/datatables/media/js/dataTables.bootstrap.js') }}"></script>
<script src="{{ URL::asset('plugins/datatables/dataTables.buttons.min.js') }}"></script>
<script src="{{ URL::asset('plugins/datatables/buttons.semanticui.min.js') }}"></script>
<script src="{{ URL::asset('plugins/datatables/jszip.min.js') }}"></script>
<script src="{{ URL::asset('plugins/datatables/pdfmake.min.js') }}"></script>
<script src="{{ URL::asset('plugins/datatables/vfs_fonts.js') }}"></script>
<script src="{{ URL::asset('plugins/datatables/buttons.html5.min.js') }}"></script>
<script src="{{ URL::asset('plugins/datatables/buttons.colVis.min.js') }}"></script>
<script>
// for branch
$.ajax( {url: "{{route('collection.type')}}" })
.done((res) => { setup(res.data) })
var setup = (types) => {
  $.fn.dataTable.ext.errMode = (e) => console.log(e,'Error while loading the table data. Please refresh');
  var branchTable = $('#b-history').DataTable({
    processing: true,
    serverSide: true,
    "columnDefs": [
      { "orderable": false, "targets": 0 }
    ],
    oLanguage: {sProcessing: divLoader()},
    ajax: {url: "{{route('collection.history')}}", data: {'branch': 1},
    },
    columns: ((types) => {
      let cols = []
      cols.push({data: 'service_types'})
      types.forEach((v) => (
        cols.push({data: 'amounts.'+v.name, render: (data) => (
          `{{\Auth::user()->getCurrencySymbol()->currency_symbol}}${data ? data : 0}`
        )})
      ))
      cols.push({data: 'date_collected'})
      cols.push({data: 'updated_at'})
      return cols
    })(types),
    dom: 'Bfrtip',
    lengthChange: false,
    buttons: ['copy', 'excel', 'pdf', 'colvis']
  });
}
// for member
$.ajax( {url: "{{route('collection.type')}}" })
.done((res) => { MemberSetup(res.data) })
var MemberSetup = (types) => {
  // $.fn.dataTable.ext.errMode = (e) => console.log(e,'Error while loading the table data. Please refresh');
  var m_HistoryTable = $('#m-history').DataTable({
    processing: true,
    serverSide: true,
    "columnDefs": [
      { "orderable": false, "targets": 0 }
    ],
    oLanguage: {sProcessing: divLoader()},
    ajax: {url: "{{route('collection.history')}}", data: {'member': 1},
    },
    columns: ((types) => {
      let cols = []
      cols.push({data: 'name'})
      cols.push({data: 'service_types'})
      types.forEach((v) => (
        cols.push({data: 'amounts.'+v.name, render: (data) => (
          `{{\Auth::user()->getCurrencySymbol()->currency_symbol}}${data ? data : 0}`
        )})
      ))
      cols.push({data: 'date_collected'})
      cols.push({data: 'updated_at'})
      return cols
    })(types),
    dom: 'Bfrtip',
    lengthChange: false,
    buttons: ['copy', 'excel', 'pdf', 'colvis']
  });
}
</script>
@endsection
