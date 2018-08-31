
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
            <h1 class="page-header text-overflow">Collection</h1>
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
                <a href="{{route('collection.offering')}}">Collection</a>
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

            <!--div class="col-sm-12 col-md-10 col-md-offset-1">
                <div class="panel">
                    <div class="panel-body demo-nifty-btn">

                        <!--Rounded Buttons-->
                        <!--===================================================-->
                        <!--a style="min-width:100px !important" class="btn btn-primary btn-rounded">Offering</a>
                        <a style="min-width:100px !important" class="btn btn-primary btn-rounded">Donation</a>
                        <a style="min-width:100px !important" class="btn btn-primary btn-rounded">Tithe</a-->
                        <!--a href="{{route('collection.report')}}" style="min-width:100px !important"  class="btn btn-success btn-rounded">Reports</a>
                        <!--===================================================-->

                    <!--/div>
                </div>
            </div-->
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
                <div class="panel">
                    <div class="panel-body demo-nifty-btn" style="overflow:scroll">
                      <form action="{{route('collection.save.member')}}" method="post" >
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
                            @foreach ($members as $member)
                            <?php if($i == 1){ $num = 0; $i = 0; }else{ $num = 1; $i = 1;} ?>
                              <tr class="<?php echo $class[$num]; ?>" id="row,{{$count}}" onMouseOver="this.className='highlight'" onMouseOut="this.className='<?php echo $class[$num]; ?>'">
                                  <td><strong>{{$count}}</strong></td>
                                  <td>{{$member->title}}
                                  <input id="" type="hidden" value="{{$member->title}}" name="title[]" class="" /></td>
                                  <td>{{$member->firstname}}
                                  <input id="" type="hidden" value="{{$member->firstname}}" name="fname[]" class="" /></td>
                                  <td>{{$member->lastname}}
                                  <input id="" type="hidden" value="{{$member->lastname}}" name="lname[]" class="" /></td>
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
                                  <!--td>
                                    <div id="" class="input-group">
                                      <input id="" type="number" name="date_added[]" value="<?php echo now(); ?>" class="form-control saisie"/>
                                    </div>
                                  </td-->
                                  <td></td>
                              </tr>
                              <?php $count++; ?>
                              @endforeach
                                <div class="" style="width:30%;">
                                  <h3><label for="date">Choose Date</label></h3>
                                <input style="border:1px solid rgba(0,0,0,0.07);height: 33px; font-size: 13px; border-radius: 3px;display: block;color: #555; background-color: #fff;outline:none; padding:2px 10px"
                                 type="text" placeholder="Choose Date" name="date" class="datepicker form-control" required/>
                                </div>
                          </tbody>
                      </table><span id="sum" name sum></span>
                        <div class="input-group pull-right " style="margin-right:100">
                          <input type="submit" name="save" value="Submit" class="btn btn-primary form-control" />
                    </form>
                    </div>
                    </div>
                </div>
            </div>



            <div class="col-md-12 col-md-offset-0" style="margin-bottom:500px">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Total Amount</h3>
                    </div>
                    <div class="panel-body" style="overflow:scroll">

                        <!-- Inline Form  -->
                        <!--===================================================-->
                        <form class="form-inline" method="POST" action="{{route('collection.save')}}">
                        @csrf
                        <table id="demo-dt-basic" class="table table-striped table-bordered datatable" cellspacing="0" width="100%" >
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
                                  <input id="" type="hidden" value="{{$member->id}}" name="member_id" class="" />
                                  <input id="" type="hidden" value="{{$member->branch_id}}" name="branch_id" class="" />
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
                                <td style="display:none">
                                  <input id="hidden-total" name="amount" type="text" />
                                </td>
                                <td>
                                  <div class="input-group">
                                  </div>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        <!--input type="text" value="3" name="branch_id" hidden=hidden-->
                            <!--div class="form-group">
                                <label for="demo-inline-inputmail" class="sr-only">Amount</label>
                                <input type="number" placeholder="₦ Amount in Naira" name="amount" id="demo-inline-inputmail" class="form-control">

                            </div-->
                            <div class="form-group">
                            <input style="border:1px solid rgba(0,0,0,0.07);height: 33px; font-size: 13px; border-radius: 3px;display: block;

                             color: #555;
                            background-color: #fff;outline:none; padding:2px 10px" type="text" placeholder="Date" required name="date_collected" class="datepicker form-control"/>
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

                  <!--option value="offering">Offering</option>
									<option value="donation">Donation</option>
									<option value="tithe">Tithe</option>
                  <option value="special">Special Offering</option>
                  <option value="first fruit">First Fruit</option>
                  <option value="covenant seed">Covenant Seed</option>
                  <option value="love seed">Love Seed</option>
                  <option value="sacrifice">Sacrifice</option>
                  <option value="thanksgiving seed">Thanksgiving Seed</option>
									<option value="other">Other</option-->
								</select>
							</div>
						</div>
                            <button class="btn btn-primary" type="submit">SAVE</button>
                        </form>
                        <!--===================================================-->
                        <!-- End Inline Form  -->

                    </div>
				</div>
            </div>

        <div style="display:none" class="col-md-10 col-md-offset-1">
        <!-- Basic Data Tables -->
        <!--===================================================-->
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">List of Members in province004</h3>
            </div>
            <div class="panel-body">
                <table id="demo-dt-basic" class="table table-striped table-bordered datatable" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th style="width:200px">Fullname</th>
                            <th style="width:100px"><span class="text-success">Amount</span></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td >Tiger Nixon</td>
                            <td>
                            ₦ <input style="border:none;border-bottom:1px solid green;outline: none;"  class="magic-radio" type="text" name="form-radio-button" checked>

                            </td>
                        </tr>



                    </tbody>
                </table>
            </div>
        </div>
        <!--===================================================-->
        <!-- End Striped Table -->
        </div>


    </div>
    <!--===================================================-->
    <!--End page content-->

</div>
<!--===================================================-->
<!--END CONTENT CONTAINER-->
@endsection
