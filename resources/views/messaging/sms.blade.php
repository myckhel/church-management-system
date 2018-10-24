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
            <h1 class="page-header text-overflow">Messaging</h1>
        </div>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--End page title-->


        <!--Breadcrumb-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <ol class="breadcrumb">
          <li>
              <i class="fa fa-home"></i><a href="{{route('dashboard')}}"> Dashboard</a>
          </li>
            <li class="active">SMS</li>
        </ol>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--End breadcrumb-->

    </div>


    <!--Page content-->
    <!--===================================================-->
    <div id="page-content">
        <div class="row">
            <div class="col-md-6 col-md-offset-3"  >
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
            <div class="col-sm-6 col-sm-offset-3" style="margin-bottom:420px">
                <div class="panel" style="background-color: #e8ddd3;">
                    <div class="panel-heading">
                        <h3 class="panel-title">SMS Messaging</h3>
                    </div>

                    <!--Block Styled Form -->
                    <!--===================================================-->
                    <form method="POST" action="{{route('sendSMS')}}">
                        @csrf
                        <input name="branch_id" value="3" type="text" hidden="hidden"/>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">Number</label>
                                        <!--input type="text" name="to" class="form-control"-->
                                        <select id="num-selector" name="to[]" class="selectpicker" data-live-search="true" data-actions-box="true" data-width="100%" multiple required>
                                          @foreach ($members as $member)
                                            <option value="{{$member->phone}}">{{ucwords($member->getFullname()) . ' - ' . $member->phone}}</option>
                                          @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-12">
                                      <div class="col-lg-9">
                                        <input id="nums" type="text" placeholder="Type in comma seperated Numbers and click add" class="form-control" aria-label="Recipient's Number" aria-describedby="basic-addon2">
                                      </div>
                                    <div class="col-lg-3">
                                      <div class="input-group-append">
                                        <button id="add-num" type="button" class="btn btn-success form-control input-group-text" id="basic-addon2">Add</button>
                                      </div>
                                    </div>
                                  </div>
                                  <br><br><br>
                                  <div class="col-sm-12">
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
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">Message</label>
                                        <textarea name="message" class="form-control" style="height:300px"  required></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer text-right">
                            <button class="btn btn-success" type="submit">Submit</button>
                        </div>
                    </form>
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
<!-- for email manual number input -->
<script>
$(document).ready(function(){
	$('#add-num').click(function(){
    if(!$('#nums').val()){return;}
		var items = $('#nums').val().split(',');
		$.each(items, function (i, item) {
			$('#nums').val('');
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
		alert('Added ' + items);
    $('#num-selector').selectpicker('refresh');
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
            let options = $("#num-selector option[value='"+item.phone+"'], #num-selector optgroup[value='"+item.phone+"']");
            if(options.length > 0){
              $.each(options, function(){
                //delete email options
                $(this).remove();
              });
            }
            $('#num-selector optgroup[label="'+i+'"]').append($('<option>',
            {
              value: item.phone,
              text : item.firstname  + ' ' + item.lastname + ' - ' + item.phone,
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
