@extends('layouts.app')

@section('title') Branch Options @endsection

@section('link')
<!--X-editable [ OPTIONAL ]-->
    <link href="{{ URL::asset('plugins/x-editable/css/bootstrap-editable.css')}}" rel="stylesheet">
    <!--TypeaheadJS [ OPTIONAL ]-->
    <link href="{{ URL::asset('plugins/x-editable/inputs-ext/typeaheadjs/lib/typeahead.js-bootstrap.css')}}" rel="stylesheet">
    <!--Address [ OPTIONAL ]-->
    <link href="{{ URL::asset('plugins/x-editable/inputs-ext/address/address.css')}}" rel="stylesheet">

<link href="{{ URL::asset('css/stylemashable.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{URL::asset('css/icofont.min.css')}}">
@endsection

@section('content')
<!--CONTENT CONTAINER-->
<!--===================================================-->
<div id="content-container">
    <div id="page-head">

        <!--Page Title-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <div id="page-title">
            <h1 class="page-header text-overflow">Branch Options</h1>
        </div>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--End page title-->


        <!--Breadcrumb-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <ol class="breadcrumb">
          <li>
              <i class="fa fa-home"></i><a href="{{route('dashboard')}}"> Dashboard</a>
          </li>
            <li class="active">Options</li>
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
        <div class="col-12">
            <div class="panel" style="overflow:scroll; background-color: #e8ddd3;">
                <!--Block Styled Form -->
                <!--===================================================-->
      			<div class="panel-body">
                <div class="sub-title">Tabs</div>
                  <!---------------------------------->
					             <div class="pad-btm form-inline">
					                <div class="row">
					                    <div class="col-sm-6 table-toolbar-left">
					                        <p>Click to edit</p>
					                    </div>
					                    <div class="col-sm-6 table-toolbar-right">
					                        <div class="checkbox mar-rgt">
					                             <input id="demo-editable-auto-open" class="magic-checkbox" type="checkbox">
					                             <label for="demo-editable-auto-open">Auto-Open Next Field</label>
					                        </div>
					                        <button id="demo-editable-enable" class="btn btn-purple"><i class="fa fa-edit"></i>Edit</button>
					                    </div>
					                </div>
					            </div>

					            <table id="demo-editable-table" class="table table-bordered table-response">
					                <tbody>
					                    <tr>
					                        <td width="35%">Sms Api</td>
					                        <td width="65%"><a href="#" id="smsapi"></a></td>
					                    </tr>
                              <tr>
					                        <td width="35%">Sms Balance Api</td>
					                        <td width="65%"><a href="#" id="smsbalanceapi"></a></td>
					                    </tr>
                              <tr>
					                        <td width="35%">Branch Name</td>
					                        <td width="65%"><a href="#" id="branchname"></a></td>
					                    </tr>
                              <tr>
					                        <td width="35%">Branch Address</td>
					                        <td width="65%"><a href="#" id="branchaddress"></a></td>
					                    </tr>
                              <tr>
					                        <td width="35%">Branch City</td>
					                        <td width="65%"><a href="#" id="branchcity"></a></td>
					                    </tr>
                              <tr>
					                        <td width="35%">Branch State</td>
					                        <td width="65%"><a href="#" id="branchstate"></a></td>
					                    </tr>
                              <tr>
					                        <td width="35%">Branch Country</td>
					                        <td width="65%"><a href="#" id="branchcountry"></a></td>
					                    </tr>
					                    <tr>
					                        <td>Branch Logo</td>
					                        <td>
                                    <div class="row">
                                       <div class="col-md-3">
                                         <form id="upload-form" action="{{route('option.branch.post')}}" method="post" enctype="multipart/form-data">
                                           <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                           <input id="img-logo-input" style="display:none" name="branchlogo" type="file" accept=".jpg,.gif,.png"  class="form-control">
                                           <img id="img-logo" class="img-responsive" src="{{url('/images/')}}/church-logo.png">
                                           <button id="edit-ho" type='button' class="btn btn-danger" onclick="">Edit</button>
                                           <button style="display:none" id="save-ho" type='submit' name="update" class="btn btn-danger" onclick="">Save</button>
                                           <button style="display:none" id="cancel-ho" type='button' class="btn btn-warning" onclick="">Cancel</button>
                                          </form>
                                        </div>
                                    </div>
                                  </td>
					                    </tr>
					                    <tr>
					                        <td>Branch Currency Symbol</td>
					                        <td><a href="#" id="currency" data-type="select" data-pk="1" data-source="{{route('option.currencies')}}" data-title="Select currency Symbol"></a></td>
					                    </tr>
                              <tr>
					                        <td>Branch Line 1</td>
					                        <td><a href="#" id="branchline1" data-type="number" data-pk="1" data-placement="right" data-placeholder="e.g, 081100000000" data-title="Enter Branch's Line 1"></a></td>
					                    </tr>
                              <tr>
					                        <td>Branch Line 2</td>
					                        <td><a href="#" id="branchline2" data-type="number" data-pk="1" data-placement="right" data-placeholder="e.g, 081100000000" data-title="Enter Branch's Line 2"></a></td>
					                    </tr>
                              @if(Auth::user()->isAdmin())
                              <tr>
					                        <td>Collection Commission</td>
					                        <td><a href="#" id="collection_commission" data-type="number" data-pk="1" data-placement="right"
                                    data-placeholder="e.g, 20" data-title="Collection's commission percentage"></a>
                                  </td>
					                    </tr>
                              @endif
					                </tbody>
					            </table>
					    <!---------------------------------->
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
<!--jQuery Mockjax [ OPTIONAL ]-->
   <script src="{{ URL::asset('plugins/x-editable/inputs-ext/mockjax/jquery.mockjax.js')}}"></script>
   <!--MomentJS [ OPTIONAL ]-->
   <script src="{{ URL::asset('plugins/momentjs/moment.min.js')}}"></script>
   <!--X-editable [ OPTIONAL ]-->
   <script src="{{ URL::asset('plugins/x-editable/js/bootstrap-editable.min.js')}}"></script>
   <!--TypeaheadJS [ OPTIONAL ]-->
   <script src="{{ URL::asset('plugins/x-editable/inputs-ext/typeaheadjs/lib/typeahead.js')}}"></script>
   <!--TypeaheadJS [ OPTIONAL ]-->
   <script src="{{ URL::asset('plugins/x-editable/inputs-ext/typeaheadjs/typeaheadjs.js')}}"></script>
   <!--Address [ OPTIONAL ]-->
   <script src="{{ URL::asset('plugins/x-editable/inputs-ext/address/address.js')}}"></script>

<script>
var dt = {}
$.ajax({url: "{{route('option.branch.get')}}"})
.done((res) => {
  if (res.status) {
    json = res.text
    json.forEach((index) => {
      dt[index.name] = index.value
    })
    console.log(dt);
    const opt = "setValue"
  	$("#smsapi").editable(opt, dt.smsapi)
    $("#smsbalanceapi").editable(opt, dt.smsbalanceapi)
    $("#branchname").editable(opt, dt.branchname)
    $("#currency").editable(opt, dt.currency)
    $("#branchaddress").editable(opt, dt.branchaddress)
    $("#branchline1").editable(opt, dt.branchline1)
    $("#branchline2").editable(opt, dt.branchline2)
    $("#branchcity").editable(opt, dt.branchcity)
    $("#branchstate").editable(opt, dt.branchstate)
    $("#branchcountry").editable(opt, dt.branchcountry)
    $("#collection_commission").editable(opt, dt.collection_commission)
  }
})
.fail((e) => {console.log(e);})
$(document).ready( () => {
      // datas
      var dT = {sex: {male: {value: 1, text: 'Male'}, female: { value: 1, text: "Female"} } }
			//defaults
			$.fn.editable.defaults.url = "{{route('option.branch.post')}}";
      $.fn.editable.defaults.send = 'always';
      // default params e.g token
      $.fn.editable.defaults.params = function (params) {
        params._token = "{{csrf_token()}}";
        return params;
      };

			//enable / disable
			$("#demo-editable-enable").click(function() {
			    $("#demo-editable-table .editable").editable("toggleDisabled");
			});

			//smsapi
			$("#smsapi").editable({
			    type: "text",
			    pk: 1,
			    name: "smsapi",
          params: function(d){
            d._token = "{{csrf_token()}}";
            d.value =  encodeURI(d.value)
            return d
          },
			    title: "Enter Your SMS Api Url Exluding message parameter",
          validate: function(value) {
			       if($.trim(value) == "") return "This field is required";
			    }
			});

      //smsbalanceapi
			$("#smsbalanceapi").editable({
			    type: "text",
			    pk: 1,
			    name: "smsbalanceapi",
          params: function(d){
            d._token = "{{csrf_token()}}";
            d.value =  encodeURI(d.value)
            return d
          },
			    title: "Enter Your SMS Balance Api Url For Getting SMS Unit Balance",
          validate: function(value) {
			       if($.trim(value) == "") return "This field is required";
			    }
			});

      //branchname
			$("#branchname").editable({
        type: "text",
        pk: 1,
        name: "branchname",
        // value: 'dt.branchname',
        title: "Enter Your Branchname",
        validate: function(value) {
           if($.trim(value) == "") return "This field is required";
        }
			});

      //branch address
			$("#branchaddress").editable({
        validate: function(value) {
           if($.trim(value) == "") return "This field is required";
        },
        type: "text",
        pk: 1,
        title: "Input Branch Address",
			});

      //branch city
			$("#branchcity").editable({
        validate: function(value) {
           if($.trim(value) == "") return "This field is required";
        },
        type: "text",
        pk: 1,
        title: "Input Branch City",
			});

      //branch state
			$("#branchstate").editable({
        validate: function(value) {
           if($.trim(value) == "") return "This field is required";
        },
        type: "text",
        pk: 1,
        title: "Input Branch State",
			});

      // branch country
      $("#branchcountry").editable({
			    validate: function(value) {
			       if($.trim(value) == "") return "This field is required";
			    }
			});

      // branch line 1
      $("#branchline1").editable({
			    validate: function(value) {
			       if($.trim(value) == "") return "This field is required";
			    }
			});

      // branch line 2
      $("#branchline2").editable({
			    validate: function(value) {
			       if($.trim(value) == "") return "This field is required";
			    }
			});

      // collection commission
      $("#collection_commission").editable({
			    validate: function(value) {
			       if($.trim(value) == "") return "This field is required";
			    }
			});

			$("#demo-editable-sex").editable({
			    prepend: "not selected",
			    source: [
			        dT.sex.male,
			        dT.sex.female
			    ],
			    display: function(value, sourceData) {
			         var colors = {"": "gray", 1: "green", 2: "blue"},
			             elem = $.grep(sourceData, function(o){return o.value == value;});

			         if(elem.length) {
			             $(this).text(elem[0].text).css("color", colors[value]);
			         } else {
			             $(this).empty();
			         }
			    }
			});


			$("#currency").editable({});

      //head office module
			$('#save-ho').click(function (){
        // saveClick()
			});
			$('#edit-ho').click(function (){
        editClick()
			});

			$('#cancel-ho').click(function (){
				cancelClick()
			});

    // process the form
    $('#upload-formss').submit(function(event) {
      // stop the form from submitting the normal way and refreshing the page
      event.preventDefault();
      var confirmed = confirm('confirm to update');
      var values = $('#upload-form').serializeArray()
      console.log(values);
      console.log($('#img-logo-input'));
      return
      // process the form
      $.ajax({type: 'POST', url: "{{route('branch.ho.up')}}", data: values})
      .done(function(data) {
        saveClick()
        console.log(data);
        // location.reload();
      });
    });
});
const saveClick = () => {
  $('#mod').hide();
  $('#def').show();
  $('#save-ho').hide();
  $('#cancel-ho').hide();
  $('#edit-ho').show();
  $('#img-logo').show();
  $('#img-logo-input').hide();
}
const editClick = () => {
  $('#img-logo').hide();
  $('#mod').show();
  $('#img-logo-input').show();
  $('#cancel-ho').show();
  $('#def').hide();
  $('#edit-ho').hide();
  $('#save-ho').show();
}
const cancelClick = () => {
  $('#mod').hide();
  $('#cancel-ho').hide();
  $('#img-logo').show();
  $('#def').show();
  $('#img-logo-input').hide();
  $('#edit-ho').show();
  $('#save-ho').hide();
}
</script>
@endsection
