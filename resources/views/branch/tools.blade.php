@extends('layouts.app')

@section('title') Head Office @endsection

@section('content')
<link href="{{ URL::asset('plugins/datatables/media/css/dataTables.bootstrap.css') }}" rel="stylesheet">
<link href="{{ URL::asset('plugins/datatables/extensions/Responsive/css/responsive.dataTables.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('plugins/datatables/semantic.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('plugins/datatables/dataTables.semanticui.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('plugins/datatables/buttons.semanticui.min.css') }}" rel="stylesheet">
<!--CONTENT CONTAINER-->
<!--===================================================-->
<div id="content-container">
    <div id="page-head">

        <!--Page Title-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <div id="page-title">
            <h1 class="page-header text-overflow">Head office</h1>
        </div>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--End page title-->


        <!--Breadcrumb-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <ol class="breadcrumb">
            <li>
                <a href="forms-general.html#">
                    <i class="demo-pli-home"></i>
                </a>
            </li>
            <li>
                <a href="forms-general.html#">Admin Tools</a>
            </li>
            <li class="active">Tools</li>
        </ol>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--End breadcrumb-->

    </div>


    <!--Page content-->
    <!--===================================================-->
    <div id="page-content">
      <div class="row">
        <div class="table table-striped table-bordered"  >
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
        <div class="">
            <div class="panel" style="overflow:scroll; background-color: #e8ddd3;">
                <div class="panel-heading">
                    <h3 class="panel-title">Add Collection Type</h3>
                </div>
                <!--Block Styled Form -->
                <!--===================================================-->
      			<div class="panel-body">

      	    </div>
                <!--===================================================-->
                <!--End Block Styled Form -->
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
$(document).ready( () => {

  if ($.fn.dataTable.isDataTable('.datatable')) {
    table = $('.datatable').DataTable()
  } else {
    /*$('.datatable').DataTable({
      dom: 'Bfrtip',
      buttons: [
        'copy', 'csv', 'excel', 'pdf', 'print'
      ]
    });*/

    var table = $('.datatable').DataTable({
      dom: 'Bfrtip',
      lengthChange: false,
      buttons: ['copy', 'excel', 'pdf', 'colvis']
    });

    table.buttons().container()
      .appendTo($('div.eight.column:eq(0)', table.table().container()));

  }
});
</script>
@endsection
