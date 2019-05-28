@extends('layouts.app')

@section('title') Collections @endsection

@section('link')
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
        <h1 class="page-header text-overflow">Collection</h1>
    </div>
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <!--End page title-->
    <!--Breadcrumb-->
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <ol class="breadcrumb">
      <li>
        <i class="fa fa-home"></i><a href="{{route('dashboard')}}"> Dashboard</a>
      </li>
      <li class="active">Offering</li>
    </ol>
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <!--End breadcrumb-->
  </div>
  <!--Page content-->
  <!--===================================================-->
  <div id="page-content">
    <div class="row">
      @include('layouts.error')
      <style>
      table td input {
        position: absolute;
        display: block;
        top:0;
        left:0;
        margin: 0;
        height: 100%;
        width: 100%;
        border: none;
        padding: 10px;
        box-sizing: border-box;
      }
      </style>
      @if(sizeof($collections) == 0)
      <div class="col-sm-12 col-md-12 col-md-offset-0">
        <div class="panel" style="background-color: #e8ddd3;">
          <div class="panel-body bg-danger demo-nifty-btn table-responsive">
            <h1 class="text-center text-light">Ooops! No collection type.</h1>
            <h1 class="text-center text-light">Please <?php if( Auth::user()->isAdmin() ) echo '<a class="btn btn-primary" href="'.route('branch.tools').'" > add collection types </a>'; else echo 'add collection types from admin level'; ?> to be able to save collection.</h1>
          </div>
        </div>
      </div>
      @else
      <div class="col-sm-12 col-md-12 col-md-offset-0">
        <div class="panel" style="background-color: #e8ddd3;">
          <div class="panel-heading">
              <h1 class="text-center panel-title">Branch Collection</h1>
          </div>
          <div class="panel-body demo-nifty-btn table-responsive">
            <style>th{width: 300px; text-align: center;}</style>
              <form id="branch-collection-form" class="form-inline" method="POST" action="{{route('collection.save')}}">
                @csrf
                <table id="table2" class="table table-striped table-bordered datatable" cellspacing="0">
                  <thead>
                    <tr>
                      @foreach($collections as $collection)
                      <th>{{ucwords($collection->disFormatString())}}</th>
                      @endforeach
                      <th>Total</th>
                    </tr>
                  </thead>
                  <tbody>
                      <tr>
                        @foreach($collections as $collection)
                        <td>
                          <div id="" class="input-group">
                            <input id="" type="number" name="{{$collection->name}}" value="0" class="form-control saisie"/>
                          </div>
                        </td>
                        @endforeach
                        <div style="display:none">
                          <input id="hidden-total" type="number" name="amount" value="" type="text" />
                        </div>
                        <td>
                          <div class="input-group">
                          </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                  @if(sizeof($services) == 0)
                  <h1 class="text-danger">Please Add service type to be able to save the collection</h1>
                  @else
                  <div class="form-group">
                    <input style="border:1px solid rgba(0,0,0,0.07);height: 33px; font-size: 13px; border-radius: 3px;display: block;
                     color: #555; background-color: #fff;outline:none; padding:2px 10px"
                      type="text" placeholder="Date" required name="date_collected" class="datepicker form-control"/>
                  </div>
                 <div class="form-group">
                   <div>
			              <select required style="outline:none;" name="type" class="selectpicker col-md-12" data-style="btn-primary">
                      <option selected disabled value="">Choose Service Type</option>
                      @foreach($services as $service)
                      <option value="{{$service->id}}">{{$service->name}}</option>
                      @endforeach
            				</select>
            			</div>
            		</div>
              <button id="b-save" class="btn btn-warning" type="submit"><i class='visible-xs fa fa-save'></i> <span class="hidden-xs">SAVE</span></button>
              @endif
            </form>
          </div>
        </div>
      </div>

      <div class="col-sm-12 col-md-12 col-md-offset-0">
        <div class="panel" style="background-color: #e8ddd3;">
          <div class="panel-heading">
            <h3 class="panel-title text-center">Members Collection</h3>
          </div>
          <div class="panel-body demo-nifty-btn table-responsive">
            <form id="member-collection-form" action="{{route('collection.save.member')}}" method="post" >
            @csrf
              <table id="demo-dt-basic" class="table table-striped table-bordered datatable" cellspacing="0">
                <thead>
                  <tr>
                    <th>S/N</th>
                    <th>Title</th>
                    <th>Name</th>
                    @foreach($collections as $collection)
                    <th>{{ucwords($collection->disFormatString())}}</th>
                    @endforeach
                    <th>Total</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $count = 1; $class = ['normal', 'alt']; $i = 0; $size = sizeof($members); ?>
                  @if(isset($members))
                  @foreach ($members as $member)
                  <?php if($i == 1){ $num = 0; $i = 0; }else{ $num = 1; $i = 1;} ?>
                  <tr class="{{$class[$num]}}" id="row,{{$count}}" onMouseOver="this.className='highlight'" onMouseOut="this.className='{{$class[$num]}}'">
                    <td><strong>{{$count}}</strong></td>
                    <td>{{$member->title}}</td>
                    <td>{{$member->firstname}} {{$member->lastname}}</td>
                    @foreach($collections as $collection)
                    <td>
                      <div id="" class="input-group">
                        <input id="" type="number" name="{{$collection->name}}[]" value="0" class="form-control saisie"/>
                      </div>
                    </td>
                    @endforeach
                    <td></td>
                    <input id="" type="hidden" value="{{$member->id}}" name="member_id[]" class="" />
                  </tr>
                  <?php $count++; ?>
                  <input id="" type="hidden" value="{{$member->branch_id}}" name="branch_id[]" class="" />
                  @endforeach
                  @else
                  <tr>
                    <td>No Members</td>
                  </tr>
                  @endif
                  <div class="row">
                    <div class="col-md-4">
                      <h3><label for="date">Choose Date</label></h3>
                      <input style="border:1px solid rgba(0,0,0,0.07);height: 33px; font-size: 13px; border-radius: 3px;display: block;color: #555; background-color: #fff;outline:none; padding:2px 10px"
                      type="text" placeholder="Choose Date" name="date_collected" class="datepicker form-control" required/>
                    </div>
                    <div class="col-md-4 form-group">
                      <h3><label for="date">Service Type</label></h3>
                      <select required style="outline:none" name="type" class="selectpicker col-md-12" data-style="btn-primary">
                        <option selected disabled value="">Choose Service Type</option>
                        @foreach($services as $service)
                        <option value="{{$service->id}}">{{$service->name}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </tbody>
              </table>
              @if(sizeof($services) == 0)
              <h1 class="text-danger">Please Add service type to be able to save the collection</h1>
              @else
            <div class="input-group pull-right " style="margin-right:100">
              <button id="m-save" type="submit" name="save" value="Submit" class="btn btn-warning form-control"><i class='fa fa-save'></i> Submit</button>
            </form>
            </div>
            @endif
          </div>
        </div>
      </div>
      @endif

    </div>
    <!--===================================================-->
    <!--End page content-->
  </div>
<!--===================================================-->
<!--END CONTENT CONTAINER-->
</div>
@endsection

@section('js')
<script src="{{ URL::asset('plugins/datatables/media/js/jquery.dataTables.js') }}"></script>
<script src="{{ URL::asset('plugins/datatables/media/js/dataTables.bootstrap.js') }}"></script>
<script src="{{ URL::asset('plugins/datatables/dataTables.buttons.min.js') }}"></script>
<script src="{{ URL::asset('plugins/datatables/buttons.semanticui.min.js') }}"></script>
<script src="{{ URL::asset('plugins/datatables/buttons.html5.min.js') }}"></script>
<script src="{{ URL::asset('plugins/datatables/buttons.colVis.min.js') }}"></script>
<script>

$(document).ready(() => {
  if ($.fn.dataTable.isDataTable('.datatable')) {
    table = $('.datatable').DataTable()
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
  $('#member-collection-form').submit((e) => {
    //
    toggleAble('#m-save', true, 'saving')
    e.preventDefault()
    let data = $('#member-collection-form').serializeArray()
    let url = "{{route('collection.save.member')}}"
    poster({url, data}, (res) => {
      toggleAble('#m-save', false)
      if (res.status && res.status !== 500) {
        resetForm('#member-collection-form')
      }
    })
  })

  $('#branch-collection-form').submit((e) => {
    toggleAble('#b-save', true, 'saving')
    e.preventDefault()
    let url = "{{route('collection.save')}}"
    let data = $('#branch-collection-form').serializeArray()
    poster({url, data}, (res) => {
      toggleAble('#b-save', false)
      if (res.status && res.status !== 500) {
        resetForm('#branch-collection-form')
      }
    })
  })

	$(".saisie").each(function() {
			 $(this).keyup(function(){calculateTotal($(this).parent().index());
			 });
	 });
});

function calculateTotal(index)
{
	var total = 0;
	 $('table tr td').filter(function(){
			 if($(this).index()==index)
			 {
			 total += parseFloat($(this).find('.saisie').val())||0;
			 }
	 }
	 );
	 $('table tr td.totalCol:eq('+index+')').html(total);
	calculateSum();
	 calculateRowSum();
}
function calculateRowSum()
{
	 $('table tr:has(td):not(:last)').each(function(){
			var sum = 0; $(this).find('td').each(function(){
				 sum += parseFloat($(this).find('.saisie').val()) || 0;
			 });
					$(this).find('td:last').html(formatMoney(sum));
					$('#hidden-total').val(sum);
	 });
}
function calculateSum() {
	 var sum = 0;
	 $("td.totalCol").each(function() {
					 sum += parseFloat($(this).html())||0;
	 });
	 $("#sum").html(sum.toFixed(2));
}

function formatMoney(number) {
  return number.toLocaleString('en-US', { style: 'currency', currency: '{{$currency->currency_code}}' });
}
</script>
@endsection
