
@extends('layouts.app')

@section('title') Member Registration @endsection

@section('content')

<!--CONTENT CONTAINER-->
<!--===================================================-->
<div id="content-container">
	<div id="page-head">

		<!--Page Title-->
		<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
		<div id="page-title">
			<h1 class="page-header text-overflow">Member Registration</h1>
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
				<a href="forms-general.html#">Member</a>
			</li>
			<li class="active">Registration</li>
		</ol>
		<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
		<!--End breadcrumb-->

	</div>


	<!--Page content-->
	<!--===================================================-->
	<div id="page-content">



		<div class="row">
			<div class="col-lg-8 col-lg-offset-2">
				<div class="panel">
					<div class="panel-heading">
						<h2 class="panel-title text-center">Register Member</h2>
					</div>
					<div class="col-lg-10 col-lg-offset-2">
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


					<!-- BASIC FORM ELEMENTS -->
					<!--===================================================-->
					<form method="POST" action="{{route('member.register')}}" class="panel-body form-horizontal form-padding" enctype="multipart/form-data">
					@csrf

						<!--Static-->
						<div class="form-group">
							<label class="col-md-3 control-label" for="demo-readonly-input">Branch Code</label>
							<div class="col-md-9">
								<input type="text" id="demo-readonly-input" value="{{\Auth::user()->branchcode}}" class="form-control" placeholder="Readonly input here..." readonly>
							</div>
						</div>
						<!--Text Input-->
						<div class="form-group">
							<label class="col-md-3 control-label" for="demo-text-input">Title</label>
							<div class="col-md-9">
								<select name="title" class="selectpicker col-xs-6 col-sm-4 col-md-6 col-lg-4" style="padding-left:0px !important" data-style="btn-primary">
									<option value="Mr">Mr</option>
									<option value="Mrs">Mrs</option>
									<option value="Dr">Dr</option>
									<option value="Dr (Mrs)">Dr (Mrs)</option>
									<option value="Chief">Chief</option>
									<option value="Chief (Mrs)">Chief (Mrs)</option>
									<option value="Engr">Engr</option>
									<option value="Elder">Elder</option>
									<option value="Surveyor"> Surveyor</option>
									<option value="Oba">Oba</option>
									<option value="Olori">Olori</option>
								</select>
							</div>
						</div>

						<!--Text Input-->
						<div class="form-group">
							<label class="col-md-3 control-label" for="demo-text-input">Firstname</label>
							<div class="col-md-9">
								<input type="text" id="demo-text-input" name="firstname" value="{{old('firstname')}}" class="form-control" placeholder="Text">
								
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="demo-text-input">Date Of Birth</label>
							<div class="col-md-9">
							<input  type="text" placeholder="Date of Birth" name="dob" class="datepicker form-control"/>
								
							</div>
						</div>
						
						<!--Text Input-->
						<div class="form-group">
							<label class="col-md-3 control-label" for="demo-text-input">Lastname</label>
							<div class="col-md-9">
								<input type="text" id="demo-text-input" name="lastname" class="form-control" placeholder="Text">
								
							</div>
						</div>

						<!--Email Input-->
						<div class="form-group">
							<label class="col-md-3 control-label" for="demo-email-input">Email</label>
							<div class="col-md-9">
								<input type="email" id="demo-email-input" class="form-control" name="email" placeholder="Enter your email">
								<small class="help-block">Please enter your email</small>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="demo-email-input">Phone Number</label>
							<div class="col-md-9">
								<input type="number" class="form-control" name="phone" placeholder="Enter your phone number">
							</div>
						</div>
						<!--Text Input-->
						<div class="form-group">
							<label class="col-md-3 control-label" for="demo-text-input">Occupation</label>
							<div class="col-md-9">
								<select name="occupation" class="selectpicker col-xs-6 col-sm-4 col-md-6 col-lg-4" data-style="btn-success">
									<option value="Doctor">Doctor</option>
									<option value="Engineer">Engineer</option>
									<option value="Surveyor">Surveyor</option>
									<option value="Business Person">Business Person</option>
									<option value="Lecturer">Lecturer</option>
									<option value="Professor">Professor</option>
									<option value="Pharmacist">Pharmacist</option>
									<option value="Civil Servant">Civil Servant</option>
									<option value="Retired">*Retired</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="demo-text-input">Position</label>
							<div class="col-md-9">
								<select name="position" class="selectpicker col-xs-6 col-sm-4 col-md-6 col-lg-4" data-style="btn-success">
									<option value="senior pastor">Senior Pastor</option>
									<option value="pastor">Pastor</option>
									<option value="memebr">Member</option>
									<option value="usher">Usher</option>
									<option value="chorister">Chorister</option>
									<option value="elder">Elder</option>
									<option value="technician">Technician</option>
									<option value="insrumentalist">Instrumentalist</option>
								</select>
							</div>
						</div>


						<!--Textarea-->
						<div class="form-group">
							<label class="col-md-3 control-label" for="demo-textarea-input">Address</label>
							<div class="col-md-9">
								<textarea id="demo-textarea-input" name="address" rows="9" class="form-control" placeholder="Your content here.."></textarea>
							</div>
						</div>

						<div class="form-group pad-ve">
							<label class="col-md-3 control-label">Sex</label>
							<div class="col-md-9">
								
									<!-- Radio Buttons -->
									<div class="radio">
									
										<input id="demo-form-radio" class="magic-radio" value="male" type="radio" name="sex" checked>
										<label for="demo-form-radio">Male</label>
										<input id="demo-form-radio-2" class="magic-radio" value="female" type="radio" name="sex">
										<label for="demo-form-radio-2">Female</label>
										
									</div>
									
								

							</div>
						</div>
						<div class="form-group pad-ver">
							<label class="col-md-3 control-label">Marital Status</label>
							<div class="col-md-9">
								<div class="radio">
									

										<!-- Inline radio buttons -->
										<input id="demo-inline-form-radio" class="magic-radio" value="single" type="radio" name="marital_status" checked>
										<label for="demo-inline-form-radio">Single</label>

										<input id="demo-inline-form-radio-2" class="magic-radio" value="married" type="radio" name="marital_status">
										<label for="demo-inline-form-radio-2">Married</label>

									


								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="demo-text-input">Memebr Since</label>
							<div class="col-md-9">
							<input  type="text" placeholder="Date of Birth" name="member_since" class="datepicker form-control"/>
								
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Photo</label>
							<div class="col-md-9">
								<span class="pull-left btn btn-primary btn-file">
									Select...
									<input type="file" name="photo">
								</span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Relative</label>
							<div class="col-md-9">
							<button type="button" data-target="#demo-default-modal" id="open-modal-btn" data-toggle="modal" class="btn btn-primary btn-lg" style="display:none;">Launch demo modal</button>
							<button id="add-relative-btn"  class="btn btn-info"type="button">Add Relative</button>
							</div>
						</div>
						
						<button class="btn btn-info pull-right" type="submit">REGISTER MEMBER</button>
						</form>
					<!--===================================================-->
					<!-- END BASIC FORM ELEMENTS -->



					<!--Default Bootstrap Modal-->
					<!--===================================================-->
					<div class="modal fade" id="demo-default-modal" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">

								<!--Modal header-->
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
									<h4 class="modal-title">Add a Relative</h4>
								</div>


								<!--Modal body-->
								<div class="modal-body">
								
									<div class="form-group">
										<label class="col-md-2 control-label" for="demo-email-input">Search Relative</label>
										<div class="col-md-10">
											<input type="text" id="search-relative-input" class="form-control" name="name" placeholder="Enter relative Name">
										</div>
									</div>
									
									<div class="col-md-12" id="relatives-result-container"></div>
								</div>

								<!--Modal footer-->
								<div class="modal-footer">
									<button data-dismiss="modal" id="close-modal-btn" class="btn btn-default" type="button">Close</button>
									<button class="btn btn-primary">Save changes</button>
								</div>
							</div>
						</div>
					</div>
					<!--===================================================-->
					<!--End Default Bootstrap Modal-->



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

