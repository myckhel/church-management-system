@extends('layouts.app')

@section('title') Head Office @endsection

@section('link')
<link href="{{ URL::asset('css/stylemashable.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{URL::asset('css/icofont.min.css')}}">
@endsection

@section('content')
<!-- <link href="{{ URL::asset('plugins/datatables/media/css/dataTables.bootstrap.css') }}" rel="stylesheet">
<link href="{{ URL::asset('plugins/datatables/extensions/Responsive/css/responsive.dataTables.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('plugins/datatables/semantic.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('plugins/datatables/dataTables.semanticui.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('plugins/datatables/buttons.semanticui.min.css') }}" rel="stylesheet"> -->
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
                <!-- <div class="panel-heading">
                    <h3 class="panel-title">Add Collection Type</h3>
                </div> -->
                <!--Block Styled Form -->
                <!--===================================================-->
      			<div class="panel-body">
              <div class="col-lg-12 col-xl-6">

                <div class="sub-title">Tabs</div>

                <ul class="nav nav-tabs md-tabs " role="tablist">
                <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#home7" role="tab"><i class="icofont icofont-home"></i>Home</a>
                <div class="slide"></div>
                </li>
                <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#profile7" role="tab"><i class="icofont icofont-ui-user "></i>Profile</a>
                <div class="slide"></div>
                </li>
                <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#messages7" role="tab"><i class="icofont icofont-ui-message"></i>Messages</a>
                <div class="slide"></div>
                </li>
                <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#settings7" role="tab"><i class="icofont icofont-ui-settings"></i>Settings</a>
                <div class="slide"></div>
                </li>
                </ul>

                <div class="tab-content card-block">
                <div class="tab-pane active" id="home7" role="tabpanel">
                <p class="m-0">1. This is Photoshop's version of Lorem IpThis is Photoshop's version of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean mas Cum sociis natoque penatibus et magnis dis.....</p>
                </div>
                <div class="tab-pane" id="profile7" role="tabpanel">
                <p class="m-0">2.Cras consequat in enim ut efficitur. Nulla posuere elit quis auctor interdum praesent sit amet nulla vel enim amet. Donec convallis tellus neque, et imperdiet felis amet.</p>
                </div>
                <div class="tab-pane" id="messages7" role="tabpanel">
                <p class="m-0">3. This is Photoshop's version of Lorem IpThis is Photoshop's version of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean mas Cum sociis natoque penatibus et magnis dis.....</p>
                </div>
                <div class="tab-pane" id="settings7" role="tabpanel">
                <p class="m-0">4.Cras consequat in enim ut efficitur. Nulla posuere elit quis auctor interdum praesent sit amet nulla vel enim amet. Donec convallis tellus neque, et imperdiet felis amet.</p>
                </div>
                </div>
              </div>
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
<!-- <script src="{{ URL::asset('plugins/datatables/dataTables.semanticui.min.js') }}"></script>

<script src="{{ URL::asset('plugins/datatables/dataTables.buttons.min.js') }}"></script> -->
<!--<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>-->


<!-- <script src="{{ URL::asset('plugins/datatables/buttons.semanticui.min.js') }}"></script>

<script src="{{ URL::asset('plugins/datatables/jszip.min.js') }}"></script>
<script src="{{ URL::asset('plugins/datatables/pdfmake.min.js') }}"></script>
<script src="{{ URL::asset('plugins/datatables/vfs_fonts.js') }}"></script>
<script src="{{ URL::asset('plugins/datatables/buttons.html5.min.js') }}"></script>
<script src="{{ URL::asset('plugins/datatables/buttons.print.min.js') }}"></script>

<script src="{{ URL::asset('plugins/datatables/buttons.colVis.min.js') }}"></script> -->

<script>
$(document).ready( () => {

  // if ($.fn.dataTable.isDataTable('.datatable')) {
  //   table = $('.datatable').DataTable()
  // } else {
  //   /*$('.datatable').DataTable({
  //     dom: 'Bfrtip',
  //     buttons: [
  //       'copy', 'csv', 'excel', 'pdf', 'print'
  //     ]
  //   });*/
  //
  //   var table = $('.datatable').DataTable({
  //     dom: 'Bfrtip',
  //     lengthChange: false,
  //     buttons: ['copy', 'excel', 'pdf', 'colvis']
  //   });
  //
  //   table.buttons().container()
  //     .appendTo($('div.eight.column:eq(0)', table.table().container()));
  //
  // }
});
</script>
@endsection
