
@extends('layouts.app')

@section('title') Member Registration @endsection

@section('link')
<link href="{{ URL::asset('css/cam-style.css') }}" rel="stylesheet">
<!-- inline style -->
<style media="screen">
.element {
display: inline-flex;
align-items: center;
}
i.fa-camera {
margin: 10px;
cursor: pointer;
font-size: 30px;
}
i:hover {
opacity: 0.6;
}
input {
display: none;
}
</style>
@endsection

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
				<div class="panel rounded-top" style="background-color: #e8ddd3;">
					<div class="panel-heading">
						<h1 class="text-center" style="padding-top:5px">Register Member</h2>
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
					<div class="row panel-body" style="background-color: #e8ddd3;">
						<div class=""  style="border:1pt solid #090c5e; border-radius:25px;">
							<!-- BASIC FORM ELEMENTS -->
							<!--===================================================-->
							<form id="register-form" method="POST" action="{{route('member.register')}}" class="panel-body form-horizontal form-padding" enctype="multipart/form-data">
							@csrf
								<div class="col-md-6">
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
										<select name="title" class="selectpicker col-xs-6 col-sm-4 col-md-6 col-lg-9" style="padding-left:0px !important" data-style="btn-primary">
											<option value="Mr">Mr</option>
											<option value="Mrs">Mrs</option>
											<option value="Miss">Miss</option>
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
									<label class="col-md-3 control-label" for="demo-text-input">First Name</label>
									<div class="col-md-9">
										<input type="text" id="demo-text-input" name="firstname" value="{{old('firstname')}}" class="form-control" placeholder="Firstname" required>

									</div>
								</div>
														<!--Text Input-->
														<div class="form-group">
									<label class="col-md-3 control-label" for="demo-text-input">Last Name</label>
									<div class="col-md-9">
										<input type="text" id="demo-text-input" name="lastname" class="form-control" placeholder="Lastname" required>

									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" for="demo-text-input">Date Of Birth</label>
									<div class="col-md-9">
									<input  type="text" placeholder="Date of Birth" name="dob" class="datepicker form-control" required/>

									</div>
								</div>



								<!--Email Input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="demo-email-input">Email</label>
									<div class="col-md-9">
										<input type="email" id="demo-email-input" class="form-control" name="email" placeholder="Enter your email" required>
										<!--small class="help-block">Please enter your email</small-->
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" for="demo-email-input">Phone Number</label>
									<div class="col-md-9">
										<input type="number" class="form-control" name="phone" placeholder="Enter your phone number" required>
									</div>
								</div>
								<!--Text Input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="demo-text-input">Occupation</label>
									<div class="col-md-9">
										<select name="occupation" class="selectpicker col-xs-6 col-sm-4 col-md-6 col-lg-9" data-style="btn-success" required>
											<option value="Doctor">Doctor</option>
											<option value="Engineer">Engineer</option>
											<option value="Surveyor">Surveyor</option>
											<option value="Business Person">Business Person</option>
											<option value="Lecturer">Lecturer</option>
											<option value="Professor">Professor</option>
											<option value="Pharmacist">Pharmacist</option>
											<option value="Trader">Trader</option>
											<option value="Civil Servant">Civil Servant</option>
											<option value="Retired">*Retired</option>
											<option value="Other">Other</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" for="demo-text-input">Position</label>
									<div class="col-md-9">
										<select name="position" class="selectpicker col-xs-6 col-sm-4 col-md-6 col-lg-9" data-style="btn-success">
											<option value="senior pastor">Senior Pastor</option>
											<option value="pastor">Pastor</option>
											<option value="member">Member</option>
											<option value="usher">Usher</option>
											<option value="worker">Worker</option>
											<option value="chorister">Chorister</option>
											<option value="elder">Elder</option>
											<option value="technician">Technician</option>
											<option value="instrumentalist">Instrumentalist</option>
											<option value="deacon">Deacon</option>
											<option value="deaconess">Deaconess</option>
											<option value="evangelist">Evangelist</option>
											<option value="minister">Minister</option>
											<option value="protocol">Protocol</option>
											<option value="hod">HOD</option>
										</select>
									</div>
								</div>


								<!--Textarea-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="demo-textarea-input">Address I</label>
									<div class="col-md-9">
										<textarea id="demo-textarea-input" name="address" rows="5" class="form-control" placeholder="Address I" required></textarea>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" for="demo-textarea-input">Address II</label>
									<div class="col-md-9">
										<textarea id="demo-textarea-input" name="address2" rows="5" class="form-control" placeholder="Address II"></textarea>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<?php $ipInfo = app('App\Http\Controllers\VisitorController')->ip_info(app('App\Http\Controllers\VisitorController')->getUserIP(), "Location"); ?>
								<?php if($ipInfo && $ipInfo['continent'] != 'Africa'){ ?>
								<div class="form-group">
									<label class="col-md-3 control-label" for="demo-textarea-input">Postal</label>
									<div class="col-md-9">
										<input type="text" class="form-control" name="postal" placeholder="Enter member Postal/ZIP Code">
									</div>
								</div>
							<?php } ?>
								<div class="form-group">
									<label class="col-md-3 control-label" for="demo-textarea-input">City</label>
									<div class="col-md-9">
										<input type="text" class="form-control" name="city" placeholder="Enter member city" required>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" for="demo-textarea-input">State</label>
									<div class="col-md-9">
										<input type="text" class="form-control" name="state" placeholder="Enter member state" required>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" for="demo-textarea-input">Country</label>
									<div class="col-md-9">
										<!--input type="text" class="form-control" name="country" placeholder="Enter member country" required-->
										<select class="form-control" name="country" required placeholder="Enter member country">
                                                               <option selected value="{{$ipInfo && $ipInfo['country']}}">{{$ipInfo && $ipInfo['country']}}</option>
                                                            	 <option value="United States">United States</option>
                                                            	<option value="United Kingdom">United Kingdom</option>
                                                            	<option value="Afghanistan">Afghanistan</option>
                                                            	<option value="Albania">Albania</option>
                                                            	<option value="Algeria">Algeria</option>
                                                            	<option value="American Samoa">American Samoa</option>
                                                            	<option value="Andorra">Andorra</option>
                                                            	<option value="Angola">Angola</option>
                                                            	<option value="Anguilla">Anguilla</option>
                                                            	<option value="Antarctica">Antarctica</option>
                                                            	<option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                                            	<option value="Argentina">Argentina</option>
                                                            	<option value="Armenia">Armenia</option>
                                                            	<option value="Aruba">Aruba</option>
                                                            	<option value="Australia">Australia</option>
                                                            	<option value="Austria">Austria</option>
                                                            	<option value="Azerbaijan">Azerbaijan</option>
                                                            	<option value="Bahamas">Bahamas</option>
                                                            	<option value="Bahrain">Bahrain</option>
                                                            	<option value="Bangladesh">Bangladesh</option>
                                                            	<option value="Barbados">Barbados</option>
                                                            	<option value="Belarus">Belarus</option>
                                                            	<option value="Belgium">Belgium</option>
                                                            	<option value="Belize">Belize</option>
                                                            	<option value="Benin">Benin</option>
                                                            	<option value="Bermuda">Bermuda</option>
                                                            	<option value="Bhutan">Bhutan</option>
                                                            	<option value="Bolivia">Bolivia</option>
                                                            	<option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                                            	<option value="Botswana">Botswana</option>
                                                            	<option value="Bouvet Island">Bouvet Island</option>
                                                            	<option value="Brazil">Brazil</option>
                                                            	<option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                                            	<option value="Brunei Darussalam">Brunei Darussalam</option>
                                                            	<option value="Bulgaria">Bulgaria</option>
                                                            	<option value="Burkina Faso">Burkina Faso</option>
                                                            	<option value="Burundi">Burundi</option>
                                                            	<option value="Cambodia">Cambodia</option>
                                                            	<option value="Cameroon">Cameroon</option>
                                                            	<option value="Canada">Canada</option>
                                                            	<option value="Cape Verde">Cape Verde</option>
                                                            	<option value="Cayman Islands">Cayman Islands</option>
                                                            	<option value="Central African Republic">Central African Republic</option>
                                                            	<option value="Chad">Chad</option>
                                                            	<option value="Chile">Chile</option>
                                                            	<option value="China">China</option>
                                                            	<option value="Christmas Island">Christmas Island</option>
                                                            	<option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                                            	<option value="Colombia">Colombia</option>
                                                            	<option value="Comoros">Comoros</option>
                                                            	<option value="Congo">Congo</option>
                                                            	<option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
                                                            	<option value="Cook Islands">Cook Islands</option>
                                                            	<option value="Costa Rica">Costa Rica</option>
                                                            	<option value="Cote D'ivoire">Cote D'ivoire</option>
                                                            	<option value="Croatia">Croatia</option>
                                                            	<option value="Cuba">Cuba</option>
                                                            	<option value="Cyprus">Cyprus</option>
                                                            	<option value="Czech Republic">Czech Republic</option>
                                                            	<option value="Denmark">Denmark</option>
                                                            	<option value="Djibouti">Djibouti</option>
                                                            	<option value="Dominica">Dominica</option>
                                                            	<option value="Dominican Republic">Dominican Republic</option>
                                                            	<option value="Ecuador">Ecuador</option>
                                                            	<option value="Egypt">Egypt</option>
                                                            	<option value="El Salvador">El Salvador</option>
                                                            	<option value="Equatorial Guinea">Equatorial Guinea</option>
                                                            	<option value="Eritrea">Eritrea</option>
                                                            	<option value="Estonia">Estonia</option>
                                                            	<option value="Ethiopia">Ethiopia</option>
                                                            	<option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                                                            	<option value="Faroe Islands">Faroe Islands</option>
                                                            	<option value="Fiji">Fiji</option>
                                                            	<option value="Finland">Finland</option>
                                                            	<option value="France">France</option>
                                                            	<option value="French Guiana">French Guiana</option>
                                                            	<option value="French Polynesia">French Polynesia</option>
                                                            	<option value="French Southern Territories">French Southern Territories</option>
                                                            	<option value="Gabon">Gabon</option>
                                                            	<option value="Gambia">Gambia</option>
                                                            	<option value="Georgia">Georgia</option>
                                                            	<option value="Germany">Germany</option>
                                                            	<option value="Ghana">Ghana</option>
                                                            	<option value="Gibraltar">Gibraltar</option>
                                                            	<option value="Greece">Greece</option>
                                                            	<option value="Greenland">Greenland</option>
                                                            	<option value="Grenada">Grenada</option>
                                                            	<option value="Guadeloupe">Guadeloupe</option>
                                                            	<option value="Guam">Guam</option>
                                                            	<option value="Guatemala">Guatemala</option>
                                                            	<option value="Guinea">Guinea</option>
                                                            	<option value="Guinea-bissau">Guinea-bissau</option>
                                                            	<option value="Guyana">Guyana</option>
                                                            	<option value="Haiti">Haiti</option>
                                                            	<option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                                                            	<option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                                                            	<option value="Honduras">Honduras</option>
                                                            	<option value="Hong Kong">Hong Kong</option>
                                                            	<option value="Hungary">Hungary</option>
                                                            	<option value="Iceland">Iceland</option>
                                                            	<option value="India">India</option>
                                                            	<option value="Indonesia">Indonesia</option>
                                                            	<option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                                                            	<option value="Iraq">Iraq</option>
                                                            	<option value="Ireland">Ireland</option>
                                                            	<option value="Israel">Israel</option>
                                                            	<option value="Italy">Italy</option>
                                                            	<option value="Jamaica">Jamaica</option>
                                                            	<option value="Japan">Japan</option>
                                                            	<option value="Jordan">Jordan</option>
                                                            	<option value="Kazakhstan">Kazakhstan</option>
                                                            	<option value="Kenya">Kenya</option>
                                                            	<option value="Kiribati">Kiribati</option>
                                                            	<option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                                                            	<option value="Korea, Republic of">Korea, Republic of</option>
                                                            	<option value="Kuwait">Kuwait</option>
                                                            	<option value="Kyrgyzstan">Kyrgyzstan</option>
                                                            	<option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                                                            	<option value="Latvia">Latvia</option>
                                                            	<option value="Lebanon">Lebanon</option>
                                                            	<option value="Lesotho">Lesotho</option>
                                                            	<option value="Liberia">Liberia</option>
                                                            	<option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                                            	<option value="Liechtenstein">Liechtenstein</option>
                                                            	<option value="Lithuania">Lithuania</option>
                                                            	<option value="Luxembourg">Luxembourg</option>
                                                            	<option value="Macao">Macao</option>
                                                            	<option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
                                                            	<option value="Madagascar">Madagascar</option>
                                                            	<option value="Malawi">Malawi</option>
                                                            	<option value="Malaysia">Malaysia</option>
                                                            	<option value="Maldives">Maldives</option>
                                                            	<option value="Mali">Mali</option>
                                                            	<option value="Malta">Malta</option>
                                                            	<option value="Marshall Islands">Marshall Islands</option>
                                                            	<option value="Martinique">Martinique</option>
                                                            	<option value="Mauritania">Mauritania</option>
                                                            	<option value="Mauritius">Mauritius</option>
                                                            	<option value="Mayotte">Mayotte</option>
                                                            	<option value="Mexico">Mexico</option>
                                                            	<option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                                                            	<option value="Moldova, Republic of">Moldova, Republic of</option>
                                                            	<option value="Monaco">Monaco</option>
                                                            	<option value="Mongolia">Mongolia</option>
                                                            	<option value="Montserrat">Montserrat</option>
                                                            	<option value="Morocco">Morocco</option>
                                                            	<option value="Mozambique">Mozambique</option>
                                                            	<option value="Myanmar">Myanmar</option>
                                                            	<option value="Namibia">Namibia</option>
                                                            	<option value="Nauru">Nauru</option>
                                                            	<option value="Nepal">Nepal</option>
                                                            	<option value="Netherlands">Netherlands</option>
                                                            	<option value="Netherlands Antilles">Netherlands Antilles</option>
                                                            	<option value="New Caledonia">New Caledonia</option>
                                                            	<option value="New Zealand">New Zealand</option>
                                                            	<option value="Nicaragua">Nicaragua</option>
                                                            	<option value="Niger">Niger</option>
                                                            	<option value="Nigeria">Nigeria</option>
                                                            	<option value="Niue">Niue</option>
                                                            	<option value="Norfolk Island">Norfolk Island</option>
                                                            	<option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                                            	<option value="Norway">Norway</option>
                                                            	<option value="Oman">Oman</option>
                                                            	<option value="Pakistan">Pakistan</option>
                                                            	<option value="Palau">Palau</option>
                                                            	<option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                                                            	<option value="Panama">Panama</option>
                                                            	<option value="Papua New Guinea">Papua New Guinea</option>
                                                            	<option value="Paraguay">Paraguay</option>
                                                            	<option value="Peru">Peru</option>
                                                            	<option value="Philippines">Philippines</option>
                                                            	<option value="Pitcairn">Pitcairn</option>
                                                            	<option value="Poland">Poland</option>
                                                            	<option value="Portugal">Portugal</option>
                                                            	<option value="Puerto Rico">Puerto Rico</option>
                                                            	<option value="Qatar">Qatar</option>
                                                            	<option value="Reunion">Reunion</option>
                                                            	<option value="Romania">Romania</option>
                                                            	<option value="Russian Federation">Russian Federation</option>
                                                            	<option value="Rwanda">Rwanda</option>
                                                            	<option value="Saint Helena">Saint Helena</option>
                                                            	<option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                                            	<option value="Saint Lucia">Saint Lucia</option>
                                                            	<option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                                                            	<option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                                                            	<option value="Samoa">Samoa</option>
                                                            	<option value="San Marino">San Marino</option>
                                                            	<option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                                            	<option value="Saudi Arabia">Saudi Arabia</option>
                                                            	<option value="Senegal">Senegal</option>
                                                            	<option value="Serbia and Montenegro">Serbia and Montenegro</option>
                                                            	<option value="Seychelles">Seychelles</option>
                                                            	<option value="Sierra Leone">Sierra Leone</option>
                                                            	<option value="Singapore">Singapore</option>
                                                            	<option value="Slovakia">Slovakia</option>
                                                            	<option value="Slovenia">Slovenia</option>
                                                            	<option value="Solomon Islands">Solomon Islands</option>
                                                            	<option value="Somalia">Somalia</option>
                                                            	<option value="South Africa">South Africa</option>
                                                            	<option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
                                                            	<option value="Spain">Spain</option>
                                                            	<option value="Sri Lanka">Sri Lanka</option>
                                                            	<option value="Sudan">Sudan</option>
                                                            	<option value="Suriname">Suriname</option>
                                                            	<option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                                            	<option value="Swaziland">Swaziland</option>
                                                            	<option value="Sweden">Sweden</option>
                                                            	<option value="Switzerland">Switzerland</option>
                                                            	<option value="Syrian Arab Republic">Syrian Arab Republic</option>
                                                            	<option value="Taiwan, Province of China">Taiwan, Province of China</option>
                                                            	<option value="Tajikistan">Tajikistan</option>
                                                            	<option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                                                            	<option value="Thailand">Thailand</option>
                                                            	<option value="Timor-leste">Timor-leste</option>
                                                            	<option value="Togo">Togo</option>
                                                            	<option value="Tokelau">Tokelau</option>
                                                            	<option value="Tonga">Tonga</option>
                                                            	<option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                                            	<option value="Tunisia">Tunisia</option>
                                                            	<option value="Turkey">Turkey</option>
                                                            	<option value="Turkmenistan">Turkmenistan</option>
                                                            	<option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                                            	<option value="Tuvalu">Tuvalu</option>
                                                            	<option value="Uganda">Uganda</option>
                                                            	<option value="Ukraine">Ukraine</option>
                                                            	<option value="United Arab Emirates">United Arab Emirates</option>
                                                            	<option value="United Kingdom">United Kingdom</option>
                                                            	<option value="United States">United States</option>
                                                            	<option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                                                            	<option value="Uruguay">Uruguay</option>
                                                            	<option value="Uzbekistan">Uzbekistan</option>
                                                            	<option value="Vanuatu">Vanuatu</option>
                                                            	<option value="Venezuela">Venezuela</option>
                                                            	<option value="Viet Nam">Viet Nam</option>
                                                            	<option value="Virgin Islands, British">Virgin Islands, British</option>
                                                            	<option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                                                            	<option value="Wallis and Futuna">Wallis and Futuna</option>
                                                            	<option value="Western Sahara">Western Sahara</option>
                                                            	<option value="Yemen">Yemen</option>
                                                            	<option value="Zambia">Zambia</option>
                                                            	<option value="Zimbabwe">Zimbabwe</option>
                                                            </select>
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
									<label class="col-md-3 control-label" for="demo-text-input">Member Since</label>
									<div class="col-md-9">
									<input  type="text" id="member_since" placeholder="Member Since" name="member_since" class="datepicker form-control" required/>

									</div>
								</div>
								<div class="form-group"  id="member_status_div" style="display:none">
									<label class="col-md-3 control-label" for="demo-text-input">Member Status</label>
									<div id="selectparent" class="col-md-9">
										<select id="member_status" name="member_status" class="selectpicker col-xs-6 col-sm-4 col-md-6 col-lg-9" data-style="btn-info">
											<option selected value="old">Member</option>
											<option value="new">First Timer</option>
										</select>
									</div>
								</div>
								<div id="wedding" class="form-group" style="display:none">
									<label class="col-md-3 control-label" for="demo-text-input">Wedding Aniversary</label>
									<div class="col-md-9">
									<input id="anniversary"  type="text" placeholder="Wedding Anniversary" name="wedding_anniversary" class="datepicker form-control"/>

									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">Photo</label>
									<div class="col-md-9">
										<div class="btn btn-file element">
												<i class="fa fa-3x fa-folder"></i>
												<span class="name">Choose File</span>
												<input id="img-input" type="file" accept="image/*" name="photo">
											<!-- <input  id="img-input" type="file" accept="image/*" capture="user" name="photo"> -->
										</div>
										<div class="btn element" data-toggle="modal" data-target="#myModal">
										  <i class="fa fa-camera"></i><span class="name">From Cam</span>
											<input id="img-input" type="file" accept="image/*" capture name="photo" style="display: none">
										</div>
										<!-- <span class="pull-left btn btn-primary btn-file">
											Select...
											<input id="img-input" type="file" accept="image/*" capture name="photo">
										</span> -->
										<!-- <input type="file" accept="image/*" capture="camera"> -->
									</div>
								</div>
								<div class="image" id="img-show-container" style="display: none">
									<div class="fa fa-remove blue delete" onclick="resetImgUpl()"></div>
									<canvas id="img-show" class="img-thumbnail img-response"></canvas>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">Relative</label>
									<div class="col-md-9">
									<button type="button" data-target="#demo-default-modal" id="open-modal-btn" data-toggle="modal" class="btn btn-primary btn-lg" style="display:none;">Launch demo modal</button>
									<button id="add-relative-btn"  class="btn btn-info"type="button">Add Relative</button>
									</div>
								</div>
								<!--div class="row">
									<div class="col-md-3" style="">
										<button class="btn btn-info pull-center" type="submit">REGISTER MEMBER</button>
									</div>
								</div-->
								<div class="form-group" style="padding-top:50px">
									<div class="col-md-9">
										<span class=" pull-right">
											<button id="submit" class="btn btn-info pull-center" type="submit">REGISTER MEMBER</button>
										</span>
									</div>
									<div class="col-md-3">
										<span class=" pull-left">
											<button class="btn-danger" onclick="resetForm('#register-form')" >reset</button>
										</span>
									</div>
								</div>
							</div>
							</form>
						</div>
					</div>
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
					<div class="panel-footer panel-primary bg-dark">
						<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="fa fa-3x close" onclick="stopWebcam();"  data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Take a photo</h4>
      </div>
      <div class="modal-body">
				<!-- <h1>Take a snapshot of the current video stream</h1>
				Click on the Start WebCam button.
				 <p>
				<button onclick="startWebcam();">Start WebCam</button>
				<button onclick="stopWebcam();">Stop WebCam</button>
					 <button onclick="snapshot();">Take Snapshot</button>
				</p>
				<video onclick="snapshot(this);" width=400 height=400 id="video" controls autoplay></video> -->
				<div id="captured" class="" style="display:none">
					<h3 class="text-primary">	Screenshots : <h3>
					<canvas  id="myCanvas" width="400" height="350"></canvas>
				</div>

					<!--  -->
					<div id="container-cam">
						<button class="btn btn-warning" onclick="startWebcam();">Start WebCam</button>
				    <div id="vid_container">
				        <video id="video" autoplay playsinline></video>
				        <div id="video_overlay"></div>
				    </div>
				    <div id="gui_controls">
				        <button id="switchCameraButton" class="button" name="switch Camera" type="button" aria-pressed="false"></button>
				        <button id="takePhotoButton" class="button" name="take Photo" type="button"></button>
				        <button id="toggleFullScreenButton" class="button" name="toggle FullScreen" type="button" aria-pressed="false" style="display:none"></button>
				    </div>
				  </div>

      </div>
      <div class="modal-footer">
				<button id="choose-img" type="button" onclick="choose(canvas); stopWebcam();" class="btn btn-success" data-dismiss="modal" style="display:none">Select Image</button>
        <button type="button" onclick="stopWebcam();" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
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

@section('js')
<script src="{{ URL::asset('js/cam/DetectRTC.min.js')}}"></script>
<script src="{{ URL::asset('js/cam/adapter.min.js')}}"></script>
<script src="{{ URL::asset('js/cam/screenfull.min.js')}}"></script>
<script src="{{ URL::asset('js/cam/howler.core.min.js')}}"></script>
<script src="{{ URL::asset('js/cam/main.js')}}"></script>
<script>
function uploadImg() {
  var input = document.querySelector('input[type=file]');
  var file = input.files[0];
  var form = new FormData(),
      xhr = new XMLHttpRequest();
	// form.append("filename", imageData);
	// console.log(file);
	console.log(blobs);
	form.append('photo', blobs);
  // form.append('photo', file);
  form.append('_token', "{{csrf_token()}}");
  xhr.open('post', "{{route('member.upload.img')}}", true);
  xhr.send(form);
}
	$(document).ready(function(){
		// Upload file section
		// $("i").click(function () {
		//   $("input[type='file']").trigger('click');
		// });

		$('input[type="file"]').on('change', function() {
		  var val = $(this).val();
		  $(this).siblings('span').text(val);
		})

		//new
		var input = document.querySelector('input[type=file]'); // see Example 4

		input.onchange = function () {
		  var file = input.files[0];

		  // upload(file);
		  drawOnCanvas(file);   // see Example 6
		  // displayAsImage(file); // see Example 7
		};

		// toggle Anniversary
		$('input:radio[name="marital_status"]').change(
			function(){
				if(this.checked && this.value == 'married'){
					$('#wedding').show();
					$("#anniversary").prop('required',true);
				}
				else{
					$('#wedding').hide();
					$("#anniversary").prop('required',false);
				}
			});
			// toggle member since date
		$('#member_since').change(function(){
			let today = new Date();
			let member_date = this.value;
			let lastWeek = Date.parse(new Date(today.getFullYear(), today.getMonth(), today.getDate() - 7));
			//check if date within 7 days
			//If nextWeek is smaller (earlier) than the value of the input date, alert...
			if (lastWeek > Date.parse(member_date)){
					$('#member_status').val('old');
					$('#member_status').selectpicker('render');
					$('#member_status_div').show();
			}else{
				$('#member_status').val('new');
				$('#member_status').selectpicker('render');
				$('#member_status_div').show();
			}
		});

		// handle register form submission
		$('#register-form').on('submit', (e) => {
			e.preventDefault()
			toggleAble('#submit', true, 'registering member...')
			// let data = {}
			let input = document.querySelector('#img-input')
			data = $('#register-form').serializeArray()
			//send to db route
			$.ajax({url: "{{route('member.register')}}", data, type: 'POST'})
			.done((res) => {
				if (res.status) {
					swal("Success!", res.text, "success");
					uploadImg()
					resetForm('#register-form')
					resetImgUpl()
					toggleAble('#submit', false)
				}else {
					swal("Oops", res.text, "error");
					toggleAble('#submit', false)
				}
			})
			.fail((e) => {
				swal("Oops", "Internal Server Error", "error");
				toggleAble('#submit', false)
				console.log(e);
			})
		})
	});
	let html = `<div class="form-group">
					<label class="col-md-3 control-label">Relative</label>
					<div class="col-md-9">
					<button id="add-relative-btn"  class="btn btn-danger"type="button">Add Relative</button>
					</div>
				</div>`;
	$('#add-relative-btn').on('click', function () {

		$('#open-modal-btn').trigger('click');


		//$('#add-relative-btn').parents('.form-group').after(html)
	})

	function remove_relative(id) {

		$(`#container_relative_${id}`).remove()
	}

	function add_relative(id, name) {
		$('#add-relative-btn').parents('.form-group').after(`<div class="form-group" id="container_relative_${id}">
					<label class="col-md-3 control-label">Added Relative</label>
					<div class="col-md-9">
	        <input  value="${name}" readonly>
	        <input name="relative_${id}" value="${id}" hidden=hidden>
					<select name="relationship_${id}" class="selectpicker" style="border:1px solid #ccc;display:inline !important;outline:none" data-style="btn-success" required>
					<option value="relative">Relationship</option>
						<option value="husband">Husband</option>
						<option value="wife">Wife</option>
						<option value="brother">Brother</option>
						<option value="sister">Sister</option>
						<option value="father">Father</option>
						<option value="mother">Mother</option>
						<option value="son">Son</option>
						<option value="daughter">Daughter</option>
					</select>
					<button  class="btn btn-xs btn-danger"type="button" onClick="remove_relative(${id})">Remove Relative</button>
					</div>
				</div>`)

		$('#close-modal-btn').trigger('click');
		$('#relatives-result-container').html('')
		$('#search-relative-input').val('')

	}
	$('#search-relative-input').on('keyup', function () {
		//alert('hello')
		$('#relatives-result-container').html('<img class="center-block" width="50" height="50" src="../images/spinner.gif"/>')
		let search_term = $('#search-relative-input').val()
		$.ajax({
			url: `../get-relative/${search_term}`,

		}).done(function (data) {
			console.log(data.result)
			//console.log(typeof data)
			$('#relatives-result-container').html('')

			if (typeof data.result == 'string' || data.result.message) {
				$('#relatives-result-container').html('<span style="height:50px" class="text-info">No result found</span>')
				return
			}
			console.log(typeof data.result)
			for (let person in data.result) {
				console.log(data.result[person])
				let table = `<div class="col-md-12" style="margin-bottom:10px"><span class="text-info" style="margin-right:30px;width:100px !important">${data.result[person].firstname} ${data.result[person].lastname}</span> <button onClick="add_relative(${data.result[person].id},'${data.result[person].firstname} ${data.result[person].lastname}' )" type="button" class="btn-sm btn btn-info select-relativ
	e">Select Relative</button></div>
							`;
				$('#relatives-result-container').append(table)
			}
		}).fail(function () {
			$('#relatives-result-container').html('<span style="height:50px" class="text-info">No result found</span>')
		})
	})

	$(document).ready(()=> {
		init()
	})

	//--------------------
// GET USER MEDIA CODE
//--------------------
		navigator.getUserMedia = ( navigator.getUserMedia ||
											 navigator.webkitGetUserMedia ||
											 navigator.mozGetUserMedia ||
											 navigator.msGetUserMedia);

var video;
var webcamStream;

// function startWebcam() {
// 	if (navigator.getUserMedia) {
// 		 navigator.getUserMedia (
//
// 				// constraints
// 				{
// 					 video: true,
// 					 audio: false
// 				},
//
// 				// successCallback
// 				function(localMediaStream) {
// 						video = document.querySelector('video');
// 					 video.src = window.URL.createObjectURL(localMediaStream);
// 					 webcamStream = localMediaStream;
// 				},
//
// 				// errorCallback
// 				function(err) {
// 					 console.log("The following error occured: " + err);
// 				}
// 		 );
// 	} else {
// 		 console.log("getUserMedia not supported");
// 	}
// }

function stopWebcam() {
	// if (webcamStream) {
  //    webcamStream.getTracks().forEach(function (track) { track.stop(); });
	// }
	if (window.stream) {
     window.stream.getTracks().forEach(function (track) { track.stop(); });
	}
		// webcamStream.stop();
}
//---------------------
// TAKE A SNAPSHOT CODE
//---------------------
var canvas, ctx;

function init() {
	// Get the canvas and obtain a context for
	// drawing in it
	canvas = document.getElementById("myCanvas");
	ctx = canvas.getContext('2d');
}

function snapshot() {
	 // Draws current image from the video element into the canvas
	ctx.drawImage(video, 0,0, canvas.width, canvas.height);
}
</script>
@endsection
