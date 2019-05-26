
@extends('layouts.app')

@section('title') Branch Registration @endsection

@section('content')
<!--CONTENT CONTAINER-->
<!--===================================================-->
<div id="content-container">
	<div id="page-head">
		<!--Page Title-->
		<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
		<div id="page-title">
			<h1 class="page-header text-overflow">Branch Registration</h1>
		</div>
		<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
		<!--End page title-->
		<!--Breadcrumb-->
		<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
		<ol class="breadcrumb">
			<li>
					<i class="fa fa-home"></i><a href="{{route('dashboard')}}"> Dashboard</a>
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
				<div class="panel" style="background-color: #e8ddd3;">
					<div class="panel-heading">
						<h2 class="panel-title text-center">Register Branch</h2>
					</div>
					@include('layouts.error')

					<!-- BASIC FORM ELEMENTS -->
					<!--===================================================-->
					<div class="cls-content">
		        <div class="cls-content-lg panel">
		            <div class="panel-body">
		                <div class="mar-ver pad-btm">
		                    <h1 class="h3">Create a New Branch Account</h1>
		                    <p>Set up account.</p>
		                </div>
										@if (isset($_GET['s']))
										<div class="alert alert-success" role="alert">
											<span class="text-danger">
													<strong>New Branch added Successfully</strong>
											</span>
										</div>
										@endif
		                <form id="branch-form" action="{{route('branch.register')}}" method="POST">
		                @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input id="branchname" placeholder="Branch Name" type="text" class="form-control{{ $errors->has('branchname') ? ' is-invalid' : '' }}" name="branchname" value="{{ old('branchname') }}" required autofocus>

                                @if ($errors->has('branchname'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('branchname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input id="branchcode" placeholder="Branch Code" type="text" class="form-control{{ $errors->has('branchcode') ? ' is-invalid' : '' }}" name="branchcode" value="{{ old('branchcode') }}" required>

                                @if ($errors->has('branchcode'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('branchcode') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input id="email" type="email" placeholder="Email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <input id="password" type="password" placeholder="Password " class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input id="password-confirm" type="password" placeholder="Password Confimation"  class="form-control" name="password_confirmation" required>

                            </div>
                        </div>
                    </div>
                    <div class="row">
											<div class="col-sm-12">
													<div class="form-group">
															<textarea type="text" class="form-control" placeholder="Branch Address" name="address"></textarea>
															@if ($errors->has('address'))
																	<span class="invalid-feedback">
																			<strong>{{ $errors->first('address') }}</strong>
																	</span>
															@endif
													</div>
											</div>
											<div class="col-sm-3">
													<div class="form-group">
															<input id="city" type="city" placeholder="City" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" name="city" value="{{ old('city') }}" required>

															@if ($errors->has('city'))
																	<span class="invalid-feedback">
																			<strong>{{ $errors->first('city') }}</strong>
																	</span>
															@endif
													</div>
											</div>
											<div class="col-sm-3">
													<div class="form-group">
															<input id="state" type="state" placeholder="State" class="form-control{{ $errors->has('state') ? ' is-invalid' : '' }}" name="state" value="{{ old('state') }}" required>

															@if ($errors->has('state'))
																	<span class="invalid-feedback">
																			<strong>{{ $errors->first('state') }}</strong>
																	</span>
															@endif
													</div>
											</div>
											<div class="col-sm-3">
													<div class="form-group">
															<!--input id="country" type="country" placeholder="Country" class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}" name="country" value="{{ old('country') }}" required-->
															<select  id="country"class="form-control {{ $errors->has('country') ? ' is-invalid' : '' }}" name="country" required>
																<option value="" selected disabled>Country</option>
                             		<!-- <option value="158">Nigeria</option> -->
                              </select>
															@if ($errors->has('country'))
																	<span class="invalid-feedback">
																			<strong>{{ $errors->first('country') }}</strong>
																	</span>
															@endif
													</div>
											</div>
											<div class="col-sm-3">
													<div class="form-group">
															<!--input id="country" type="country" placeholder="Country" class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}" name="country" value="{{ old('country') }}" required-->
															<select class="form-control {{ $errors->has('currency') ? ' is-invalid' : '' }}" name="currency" required placeholder="Enter Branch Currency">
																 <option value="" selected disabled>Currency</option>
																 @foreach($currencies as $currency)
																 @if($currency->currency_symbol)
																 <option value="{{$currency->currency_symbol}}" {{$currency->name == 'Nigeria' ? 'selected' : '' }}>{{$currency->currency_name}} - {{$currency->currency_symbol}}</option>
																 @endif
																 @endforeach
															 </select>
															@if ($errors->has('currency'))
																	<span class="invalid-feedback">
																			<strong>{{ $errors->first('currency') }}</strong>
																	</span>
															@endif
													</div>
											</div>
                    </div>
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Register</button>
                </form>
            </div>
        </div>
    </div>
    <!--===================================================-->
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
<script>
$(document).ready(() => {
	select = $('#country')
	getCountries().then((res)=>{ $(select).append(options(res))})
})
async function getCountries(){
  res = await $.ajax({url: "{{route('option.countries')}}"})
	return res
}

function options(countries){
	opt = ''
	countries.forEach((v) => {
		opt += `<option ${(v.name === 'Nigeria') ? 'selected' : ''} value="${v.name}">${v.name}</option>`
	})
	return opt
}
</script>
@endsection
