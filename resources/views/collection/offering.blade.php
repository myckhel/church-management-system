
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
                <a href="forms-general.html#">Collection</a>
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
					        
            <div class="col-sm-12 col-md-10 col-md-offset-1">
                <div class="panel">
                    <div class="panel-body demo-nifty-btn">

                        <!--Rounded Buttons-->
                        <!--===================================================-->
                        <a style="min-width:100px !important" class="btn btn-primary btn-rounded">Offering</a>
                        <a style="min-width:100px !important" class="btn btn-primary btn-rounded">Donation</a>
                        <a style="min-width:100px !important" class="btn btn-primary btn-rounded">Tithe</a>
                        <a href="{{route('collection.report')}}" style="min-width:100px !important"  class="btn btn-success btn-rounded">Reports</a>
                        <!--===================================================-->

                    </div>
                </div>
            </div>
                
                            
		
					
					
            <div class="col-md-10 col-md-offset-1" style="margin-bottom:500px">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Total Amount</h3>
                    </div>
                    <div class="panel-body">
                
                        <!-- Inline Form  -->
                        <!--===================================================-->
                        <form class="form-inline" method="POST" action="{{route('collection.save')}}">
                        @csrf
                        <input type="text" value="3" name="branch_id" hidden=hidden>
                            <div class="form-group">
                                <label for="demo-inline-inputmail" class="sr-only">Amount</label>
                                <input type="number" placeholder="₦ Amount in Naira" name="amount" id="demo-inline-inputmail" class="form-control">
                                
                            </div>
                            <div class="form-group">
                            <input style="border:1px solid rgba(0,0,0,0.07);height: 33px;
    font-size: 13px;
    border-radius: 3px;display: block;
   
     color: #555;
    background-color: #fff;outline:none; padding:2px 10px" type="text" placeholder="Date" name="date" class="datepicker form-control"/>
                            </div>
                            <div class="form-group">
							<div>
								<select style="outline:none" name="type" class="selectpicker col-md-12" data-style="btn-info">
									<option value="offering">Offering</option>
									<option value="donation">Donation</option>
									<option value="tithe">Tithe</option>
                                    <option value="special">Special Offering</option>
									<option value="other">Other</option>
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


