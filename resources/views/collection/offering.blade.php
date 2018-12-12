
@extends('layouts.app')

@section('title') Collections @endsection

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
      <div class="col-md-6 col-md-offset-3"  >
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        @if (count($errors) > 0)
          @foreach ($errors->all() as $error)
        <div class="alert alert-danger">{{ $error }}</div>
          @endforeach
        @endif
      </div>
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
      <div class="col-sm-12 col-md-12 col-md-offset-0">
        <div class="panel" style="background-color: #e8ddd3;">
          <div class="panel-heading">
              <h1 class="text-center panel-title">Branch Collection</h1>
          </div>
          <div class="panel-body demo-nifty-btn" style="overflow:scroll">
            <style>th{width: 300px; text-align: center;}</style>
              <form id="branch-collection-form" class="form-inline" method="POST" action="{{route('collection.save')}}">
                @csrf
                <table id="table2" class="table table-striped table-bordered datatable" cellspacing="0" width="1800px" >
                  <thead>
                    <tr>
                      <th>Special Offering</th>
                      <th>Seed Offering</th>
                      <th>Tithe</th>
                      <th>Offering</th>
                      <th>Donation</th>
                      <th>First Fruit</th>
                      <th>Covenant Seed</th>
                      <th>Love Seed</th>
                      <th>Sacrifice</th>
                      <th>Thanksgiving</th>
                      <th>Thanksgiving Seed</th>
                      <th>Other</th>
                      <th>Total</th>
                    </tr>
                  </thead>
                  <tbody>
                      <tr>
                        <td>
                          <div id="" class="input-group">
                            <input id="" type="number" name="special_offering" value="0" class="form-control saisie"/>
                          </div>
                        </td>
                        <td>
                          <div id="" class="input-group">
                            <input id="" type="number" name="seed_offering" value="0" class="form-control saisie"/>
                          </div>
                        </td>
                        <td>
                          <div class="input-group">
                            <input id="" type="number" name="tithe" value="0" class="form-control saisie" />
                          </div>
                        </td>
                        <td>
                          <div class="input-group">
                            <input id="" type="number" name="offering" value="0" class="form-control saisie" />
                          </div>
                        </td>
                        <td>
                          <div class="input-group">
                            <input id="" type="number" name="donation" value="0" class="form-control saisie" />
                          </div>
                        </td>
                        <td>
                          <div class="input-group">
                            <input id="" type="number" name="first_fruit" value="0" class="form-control saisie" />
                          </div>
                        </td>
                          <input id="" type="hidden" value="<?php if(isset($member->id)){echo $member->id;} ?>" name="member_id" class="" />
                          <input id="" type="hidden" value="<?php if(isset($member->branch_id)){echo $member->branch_id;} ?>" name="branch_id" class="" />
                          @csrf
                        <td>
                          <div class="input-group">
                            <input id="" type="number" name="covenant_seed" value="0" class="form-control saisie" />
                          </div>
                        </td>
                        <td>
                          <div class="input-group">
                            <input id="" type="number" name="love_seed" value="0" class="form-control saisie" />
                          </div>
                        </td>
                        <td>
                          <div class="input-group">
                            <input id="" type="number" name="sacrifice" value="0" class="form-control saisie" />
                          </div>
                        </td>
                        <td>
                          <div class="input-group">
                            <input id="" type="number" name="thanksgiving" value="0" class="form-control saisie" />
                          </div>
                        </td>
                        <td>
                          <div class="input-group">
                            <input type="number" name="thanksgiving_seed" value="0" class="form-control saisie" />
                          </div>
                        </td>
                        <td>
                          <div class="input-group">
                            <input type="number" name="other" value="0" class="form-control saisie" />
                          </div>
                        </td>
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
                  <div class="form-group">
                    <input style="border:1px solid rgba(0,0,0,0.07);height: 33px; font-size: 13px; border-radius: 3px;display: block;
                     color: #555; background-color: #fff;outline:none; padding:2px 10px"
                      type="text" placeholder="Date" required name="date_collected" class="datepicker form-control"/>
                  </div>
                 <div class="form-group">
                   <div>
			              <select style="outline:none" name="type" class="selectpicker col-md-12" data-style="btn-info">
                      <option value="sunday service" selected>Sunday Service</option>
                      <option value="monday service">Monday Service</option>
                      <option value="tuesday service">Tuesday Service</option>
                      <option value="wednessday service">Wednessday Service</option>
                      <option value="thursday service">Thursday Service</option>
                      <option value="friday service">Friday Service</option>
                      <option value="saturday service">Saturday Service</option>
            				</select>
            			</div>
            		</div>
              <button id="b-save" class="btn btn-primary" type="submit"><i class='fa fa-save'></i> SAVE</button>
            </form>
          </div>
        </div>
      </div>

      <div class="col-sm-12 col-md-12 col-md-offset-0">
        <div class="panel" style="background-color: #e8ddd3;">
          <div class="panel-heading">
            <h3 class="panel-title text-center">Members Collection</h3>
          </div>
          <div class="panel-body demo-nifty-btn" style="overflow:scroll">
            <form id="member-collection-form" action="{{route('collection.save.member')}}" method="post" >
              <table id="demo-dt-basic" class="table table-striped table-bordered datatable" cellspacing="0" width="1800px" >
                <thead>
                  <tr>
                    <th>S/N</th>
                    <th>Title</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Special Offering</th>
                    <th>Seed Offering</th>
                    <th>Tithe</th>
                    <th>Offering</th>
                    <th>Donation</th>
                    <th>First Fruit</th>
                    <th>Covenant Seed</th>
                    <th>Love Seed</th>
                    <th>Sacrifice</th>
                    <th>Thanksgiving</th>
                    <th>Thanksgiving Seed</th>
                    <th>Other</th>
                    <!--th>Date</th-->
                    <th>Total</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $count = 1; ?>
                  <?php $class = ['normal', 'alt']; $i = 0; $size = sizeof($members); ?>
                  @if(isset($members))
                  @foreach ($members as $member)
                  <?php if($i == 1){ $num = 0; $i = 0; }else{ $num = 1; $i = 1;} ?>
                  <tr class="<?php echo $class[$num]; ?>" id="row,{{$count}}" onMouseOver="this.className='highlight'" onMouseOut="this.className='<?php echo $class[$num]; ?>'">
                    <td><strong>{{$count}}</strong></td>
                    <td>{{$member->title}}
                      <input id="" type="hidden" value="{{$member->title}}" name="title[]" class="" />
                    </td>
                    <td>{{$member->firstname}}
                      <input id="" type="hidden" value="{{$member->firstname}}" name="fname[]" class="" />
                    </td>
                    <td>{{$member->lastname}}
                      <input id="" type="hidden" value="{{$member->lastname}}" name="lname[]" class="" />
                    </td>
                    <td>
                      <div id="" class="input-group">
                        <input id="" type="number" value="0" name="special_offering[]" class="form-control saisie"/>
                      </div>
                    </td>
                    <td>
                      <div id="" class="input-group">
                        <input id="" type="number" value="0" name="seed_offering[]" class="form-control saisie"/>
                      </div>
                    </td>
                    <td>
                      <div class="input-group">
                        <input id="" type="number" value="0" name="tithe[]" class="form-control saisie" />
                      </div>
                    </td>
                    <td>
                      <div class="input-group">
                        <input id="" type="number" value="0" name="offering[]" class="form-control saisie" />
                      </div>
                    </td>
                    <td>
                      <div class="input-group">
                        <input id="" type="number" value="0" name="donation[]" class="form-control saisie" />
                      </div>
                    </td>
                    <td>
                      <div class="input-group">
                        <input id="" type="number" value="0" name="first_fruit[]" class="form-control saisie" />
                      </div>
                    </td>
                    <input id="" type="hidden" value="{{$member->id}}" name="member_id[]" class="" />
                    <input id="" type="hidden" value="{{$member->branch_id}}" name="branch_id[]" class="" />
                    @csrf
                    <td>
                      <div class="input-group">
                        <input id="" type="number" value="0" name="covenant_seed[]" class="form-control saisie" />
                      </div>
                    </td>
                    <td>
                      <div class="input-group">
                        <input id="" type="number" value="0" name="love_seed[]" class="form-control saisie" />
                      </div>
                    </td>
                    <td>
                      <div class="input-group">
                        <input id="" type="number" value="0" name="sacrifice[]" class="form-control saisie" />
                      </div>
                    </td>
                    <td>
                      <div class="input-group">
                        <input id="" type="number" value="0" name="thanksgiving[]" class="form-control saisie" />
                      </div>
                    </td>
                    <td>
                      <div class="input-group">
                        <input type="number" value="0" name="thanksgiving_seed[]" class="form-control saisie" />
                      </div>
                    </td>
                    <td>
                      <div class="input-group">
                        <input type="number" value="0" name="other[]" class="form-control saisie" />
                      </div>
                    </td>
                    <td></td>
                  </tr>
                  <?php $count++; ?>
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
                      type="text" placeholder="Choose Date" name="date" class="datepicker form-control" required/>
                    </div>
                    <div class="col-md-4 form-group">
                      <h3><label for="date">Service Type</label></h3>
                      <select style="outline:none" name="type" class="selectpicker col-md-12" data-style="btn-info">
                        <option value="sunday service" selected>Sunday Service</option>
                        <option value="monday service">Monday Service</option>
                        <option value="tuesday service">Tuesday Service</option>
                        <option value="wednessday service">Wednessday Service</option>
                        <option value="thursday service">Thursday Service</option>
                        <option value="friday service">Friday Service</option>
                        <option value="saturday service">Saturday Service</option>
                      </select>
                    </div>
                  </div>
                </tbody>
              </table>
            <div class="input-group pull-right " style="margin-right:100">
              <button id="m-save" type="submit" name="save" value="Submit" class="btn btn-primary form-control"><i class='fa fa-save'></i> Submit</button>
            </form>
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
</div>
@endsection

@section('js')
<script>

$(document).ready(function(){
  $('#member-collection-form').submit((e) => {
    toggleAble('#m-save', true, 'saving')
    e.preventDefault()
    let data = $('#member-collection-form').serializeArray()
    poster("{{route('collection.save.member')}}", data, () => {
      toggleAble('#m-save', false)
    })
  })

  $('#branch-collection-form').submit((e) => {
    toggleAble('#b-save', true, 'saving')
    e.preventDefault()
    let data = $('#branch-collection-form').serializeArray()
    poster("{{route('collection.save')}}", data, () => {
      toggleAble('#b-save', false)
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
					$(this).find('td:last').html(sum);
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
</script>
@endsection
