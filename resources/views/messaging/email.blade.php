@extends('layouts.app')

@section('title') Messaging - Email @endsection

@section('link')
<!--Bootstrap Datepicker [ OPTIONAL ]-->
<link href="{{ URL::asset('plugins/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet">
<!--Bootstrap Select [ OPTIONAL ]-->
<link href="{{ URL::asset('plugins/bootstrap-select/bootstrap-select.min.css') }}" rel="stylesheet">
<!--Summernote [ OPTIONAL ]-->
<link href="{{ URL::asset('css/summernote.css')}}" rel="stylesheet">
@endsection

@section('content')
            <!--CONTENT CONTAINER-->
            <!--===================================================-->
<div id="content-container">
  <div id="page-head">

        <!--Page Title-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <div id="page-title">
            <h1 class="page-header text-overflow">Messaging - Email</h1>
        </div>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--End page title-->


        <!--Breadcrumb-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <ol class="breadcrumb">
          <li>
              <i class="fa fa-home"></i><a href="{{route('dashboard')}}"> Dashboard</a>
          </li>
            <li class="active">Email</li>
        </ol>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--End breadcrumb-->
  </div>


                <!--Page content-->
                <!--===================================================-->
                <div id="page-content">
						@if (session('status'))
							<!-- Line Chart -->
							<!---------------------------------->
							<div class="panel">
								<div class="panel-heading">
								</div>
								<div class="pad-all">
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
							</div>
							<!---------------------------------->
						@endif
                        <div class="panel" style="background-color: #e8ddd3;">

					        <div class="panel-body">
					            <div class="fixed-fluid">

					                <div class="fluid">
					                    <!-- COMPOSE EMAIL -->
					                    <!--===================================================-->

					                    <div class="pad-btm clearfix">
					                        <!--Cc & bcc toggle buttons-->
					                        <div class="pull-right pad-btm">
					                            <div class="btn-group">
					                                <button id="demo-toggle-cc" data-toggle="button" type="button" class="btn btn-sm btn-default btn-active-info">Cc</button>
					                                <button id="demo-toggle-bcc" data-toggle="button" type="button" class="btn btn-sm btn-default btn-active-info">Bcc</button>
					                            </div>
					                        </div>
					                    </div>

					                    <!--Input form-->
					                    <form id="send-mail-form" role="form" class="form-horizontal" method=POST action="{{route('sendMail')}}">
							                      @csrf
					                        <div class="form-group">

					                            <label class="col-lg-1 control-label text-left"  for="inputEmail">To</label>
					                            <div class="col-lg-6">
                                        <?php if(isset($_GET['mail'])) { ?>
					                                <input type="email" id="inputEmail" name="to[]" value="<?php echo $_GET['mail']; ?> " class="form-control" required>
                                        <?php echo '</div>'; }else{ ?>
                                        <select id="num-selector" data-live-search="true" name="to[]" data-width="100%" data-actions-box="true" class="selectpicker" multiple required>
                                          @foreach ($members as $member)
                                            <option value="{{$member->email}}">{{ucwords($member->getFullname())}}</option>
                                          @endforeach
                                        </select>
					                            </div>
                                      <div class="col-lg-5">
                                        <div class="col-lg-9">
                                          <input id="emails" type="text" placeholder="Type in comma seperated emails and click add" class="form-control" aria-label="Recipient's email" aria-describedby="basic-addon2">
                                        </div>
                                      <div class="col-lg-3">
                                        <div class="input-group-append">
                                          <button id="add-num" type="button" class="btn btn-success form-control input-group-text" id="basic-addon2">Add</button>
                                        </div>
                                      </div>
                                    </div>
                                  <?php }?>
					                        </div>
					                        <div id="demo-cc-input" class="hide form-group">
					                            <label class="col-lg-1 control-label text-left" for="inputCc">Cc</label>
					                            <div class="col-lg-11">
					                                <input type="text" id="inputCc" name="cc" class="form-control">
					                            </div>
					                        </div>
					                        <div id="demo-bcc-input" class="hide form-group">
					                            <label class="col-lg-1 control-label text-left" for="inputBcc">Bcc</label>
					                            <div class="col-lg-11">
					                                <input type="text" id="inputBcc" name="bcc" class="form-control">
					                            </div>
					                        </div>
                                  <div class="row">
  					                        <div class="form-group">
  				                            <label class="col-lg-1 control-label text-left" for="inputSubject">Subject</label>
  				                            <div class="col-lg-6">
  				                                <input type="text" id="inputSubject" name="subject" class="form-control"  required>
  				                            </div>

                                      <div class="col-lg-5">
                                        <div class="col-lg-9">
                                          <select id="groups-selector" data-live-search="true" data-width="100%" data-actions-box="true" class="selectpicker" multiple>
                                            <option data-hidden="true" selected >Select Group to send to</option>
                                            @foreach ($groups as $group)
                                              <option value="{{$group->id}}">{{ucwords($group->name)}}</option>
                                            @endforeach
                                            @foreach ($default_groups as $group)
                                              <option value="{{$group->id}}">{{ucwords($group->name)}}</option>
                                            @endforeach
                                          </select>
                                        </div>
                                      <div class="col-lg-3">
                                        <div class="input-group-append">
                                          <button id="add-group" type="button" class="btn btn-success form-control input-group-text" id="basic-addon2">Add</button>
                                        </div>
                                      </div>
                                    </div>
                                      <div class="col-lg-4">
                                        <ul id="list" class="list-group">
                                        </ul>
                                      </div>
                                    </div>
					                    <!--Wysiwyg editor : Summernote placeholder-->
					                    <!-- <div id="demo-mail-compose"></div> -->
                              <textarea id="demo-mail-textarea" name="message"></textarea>
                              <!-- <textarea id="message-text-area" name="message" style="display:none"></textarea> -->

					                    <div class="pad-ver">

					                        <!--Send button-->
                                  <button id="demo-mail-send-btn" type="submit" class="btn btn-primary">
					                        <!-- <button id="mail-send-btn" type="submit" class="btn btn-primary"> -->
					                            <i class="demo-psi-mail-send icon-lg icon-fw"></i> Send Mail
					                        </button>
					                    </div>

										</form>
					                    <!--===================================================-->
					                    <!-- END COMPOSE EMAIL -->
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
<!--Summernote [ OPTIONAL ]-->
<script src="{{ URL::asset('js/summernote.min.js')}}"></script>
<script src="{{ URL::asset('plugins/bootstrap-select/bootstrap-select.min.js') }}"></script>
<script src="{{ URL::asset('plugins/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
<script> $('.datepicker').datepicker(); </script>
<!--Mail [ SAMPLE ]-->
<script src="{{ URL::asset('js/demo/mail.js')}}"></script>

<script>
// for summernote
// $('#summernote').summernote({
//   placeholder: 'Compose Your Message',
//   tabsize: 2,
//   height: 300,
//   focus: true
// });

// let shouldSubmit = false;

$('#send-mail-form').on('submit', function(e){

// if (!shouldSubmit) e.preventDefault();
// if (shouldSubmit) return;

// let message = $('.note-editable').html();
// console.log(message);

// $('#message-text-area').val(message);

// shouldSubmit = true;

// $('#send-mail-form').trigger('reset');

})


// for email manual number input

$(document).ready(function(){
	$('#add-num').click(function(){
    if(!$('#emails').val()){return;}
		var items = $('#emails').val().split(',');
		$('#emails').val('');
		$.each(items, function (i, item) {
			//$("#list").append('<li class="list-group-item d-flex justify-content-between align-items-center">'+ item +'  <span class="badge badge-danger badge-pill"><i onClick="rm_num(this);" class="btn fa fa-trash"></i></span></li>');
				$('#num-selector').append($('<option>'
				, {
						value: item,
						text : item,
						selected: 'selected'
				}, '</option>'
				));
		});
		var val = $('#num-selector').text().split(',');
    $('#num-selector').selectpicker('refresh');
		alert('Added ' + items);
		$.each(val, function(i,item){
		});
	});

  //add group function
  $('#add-group').click(function(){
    //remove attribute on click
    $('#groups-selector').find(":selected").removeAttr("selected");
    var items = $('#groups-selector').find(":selected").map(function() {
        return this.text;
    }).get();
    //do nothing if empty
    if(items.length == 0){return;}
    //transfer the groups
    var values = {'group': items, '_token': '{{ csrf_token() }}' };
    //get list of members in each group
    $.ajax({
        type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
        url         : "{{route('group.members')}}", // the url where we want to POST
        data        : values, // our data object
        dataType    : 'json', // what type of data do we expect back from the server
        encode      : true
    })//<optgroup label="filter2">
    // using the done promise callback
    .done(function(data) {
      if(data.status){
        let itemss = data.groupMember;
        //append list to the emails
        $.each(itemss, function (i, items) {
          $('#num-selector').append($('<optgroup label="'+i+'"></optgroup>'));
          $.each( items, function (ii, item) {
            //check if already in list
            let options = $("#num-selector option[value='"+item.email+"'], #num-selector optgroup[value='"+item.email+"']");
            if(options.length > 0){
              $.each(options, function(){
                //delete email options
                $(this).remove();
              });
            }
            $('#num-selector optgroup[label="'+i+'"]').append($('<option>',
            {
              value: item.email,
              text : item.firstname  + ' ' + item.lastname ,
              selected: 'selected'
            }, '</option>'
            ));
          });
        });
      }
      else{
        alert('Error occured Please try again');
      }
      //clear the selectpicker
      $('#groups-selector').find(":selected").removeAttr("selected");
      $('#groups-selector').selectpicker('deselectAll');
      $('#groups-selector').selectpicker('refresh');
      $('#num-selector').selectpicker('refresh');
      alert('Group Members Added');
    });
  });
});
 //selected="selected" value="' + item +'" >'+ item +'</option>'
function rm_num(d){
	var text = $(d).parent().parent().text();
	var input = $("#num-selector option[value='"+ text +"']").remove();
	var ll = $('#list ' + d).remove();
}
</script>
@endsection
