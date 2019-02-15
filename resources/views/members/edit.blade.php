
@extends('layouts.app')

@section('title') Edit Member Profile @endsection

@section('content')

<!--CONTENT CONTAINER-->
<!--===================================================-->
<div id="content-container">
	<div id="page-head">

		<!--Page Title-->
		<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
		<div id="page-title">
			<h1 class="page-header text-overflow">Edit Member Profile</h1>
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
				<a href="{{route('members.all')}}">Member</a>
			</li>
			<li class="active">Edit</li>
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

						<?php
            $id = $member->id;
            $title = $member->title;
            $fname = $member->firstname;
            $lname = $member->lname;
            $dob = $member->dob;
            $email = $member->email;
            $phone = $member->phone;
            $occupation = $member->occupation;
            $position = $member->postion;
            $address = $member->address;
            $address2 = $member->address2;
            $postal = $member->postal;
            $city = $member->city;
            $state = $member->state;
            $country = $member->country;
            $sex = $member->sex;
            $mstatus = $member->marital_status;
            $wedding_anniversary = $member->wedding_anniversary;
            $member_since = $member->member_since;
            $photo = $member->photo;
            $relative = $member->relative;
						?>
					<div class="row panel-body">
						<div class=""  style="border:1pt solid #090c5e; border-radius:25px;">
							<!-- BASIC FORM ELEMENTS -->
							<!--===================================================-->
							<form method="POST" action="{{route('member.edit',$id)}}" class="panel-body form-horizontal form-padding" enctype="multipart/form-data">
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
										<select name="title" class="selectpicker col-xs-6 col-sm-4 col-md-6 col-lg-4" style="padding-left:0px !important" data-style="btn-primary">
                      <option selected value="{{$title}}">{{$title}}</option>
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
									<label class="col-md-3 control-label" for="demo-text-input">Firstname</label>
									<div class="col-md-9">
										<input type="text" id="demo-text-input" name="firstname" value="{{old('firstname') or $fname}}" class="form-control" placeholder="Firstname" required>

									</div>
								</div>
														<!--Text Input-->
														<div class="form-group">
									<label class="col-md-3 control-label" for="demo-text-input">Lastname</label>
									<div class="col-md-9">
										<input type="text" id="demo-text-input" value="{{$lname}}" name="lastname" class="form-control" placeholder="Lastname" required>

									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" for="demo-text-input">Date Of Birth</label>
									<div class="col-md-9">
									<input  type="text" placeholder="Date of Birth" value="{{$dob}}" name="dob" class="datepicker form-control" required/>

									</div>
								</div>



								<!--Email Input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="demo-email-input">Email</label>
									<div class="col-md-9">
										<input type="email" id="demo-email-input" value="{{$email}}" class="form-control" name="email" placeholder="Enter your email" required>
										<small class="help-block">Please enter your email</small>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" for="demo-email-input">Phone Number</label>
									<div class="col-md-9">
										<input type="number" class="form-control" value="{{$phone}}" name="phone" placeholder="Enter your phone number" required>
									</div>
								</div>
								<!--Text Input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="demo-text-input">Occupation</label>
									<div class="col-md-9">
										<select name="occupation" class="selectpicker col-xs-6 col-sm-4 col-md-6 col-lg-4" data-style="btn-success" required>
                      <option selected value="{{$occupation}}">{{$occupation}}</option>
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
                      <option class="bg-primary" value="{{$position}}">{{$position}}</option>
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
										<textarea id="demo-textarea-input" name="address" value="{{$address}}" rows="5" class="form-control" placeholder="Address I" required></textarea>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" for="demo-textarea-input">Address II</label>
									<div class="col-md-9">
										<textarea id="demo-textarea-input" name="address2" value="{{$address2}}" rows="5" class="form-control" placeholder="Address II"></textarea>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="col-md-3 control-label" for="demo-textarea-input">Postal</label>
									<div class="col-md-9">
										<input type="text" class="form-control" value="{{$postal}}" name="postal" placeholder="Enter memeber Postal/ZIP Code" required>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" for="demo-textarea-input">City</label>
									<div class="col-md-9">
										<input type="text" class="form-control" name="city" value="{{$city}}" placeholder="Enter memeber city" required>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" for="demo-textarea-input">State</label>
									<div class="col-md-9">
										<input type="text" class="form-control" value="{{$state}}" name="state" placeholder="Enter memeber state" required>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" for="demo-textarea-input">Country</label>
									<div class="col-md-9">
										<!--input type="text" class="form-control" name="country" placeholder="Enter member country" required-->
										<select class="form-control" name="country" required placeholder="Enter member country">
                                                              <option selected value="{{$country}}">{{$country}}</option>
                                                               <option value="Nigeria">Nigeria</option>
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

												<input id="demo-form-radio" class="magic-radio" value="male" type="radio" name="sex" <?php if($sex == 'male'){echo 'checked';}?> >
												<label for="demo-form-radio">Male</label>
												<input id="demo-form-radio-2" class="magic-radio" value="female" type="radio" name="sex" <?php if($sex == 'female'){echo 'checked';}?> >
												<label for="demo-form-radio-2">Female</label>

											</div>



									</div>
								</div>
								<div class="form-group pad-ver">
									<label class="col-md-3 control-label">Marital Status</label>
									<div class="col-md-9">
										<div class="radio">


												<!-- Inline radio buttons -->
												<input id="demo-inline-form-radio" class="magic-radio" value="single" type="radio" name="marital_status" <?php if($mstatus == 'single'){echo 'checked';}?>>
												<label for="demo-inline-form-radio">Single</label>

												<input id="demo-inline-form-radio-2" class="magic-radio" value="married" type="radio" name="marital_status" <?php if($mstatus == 'married'){echo 'checked';}?>>
												<label for="demo-inline-form-radio-2">Married</label>

										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" for="demo-text-input">Member Since</label>
									<div class="col-md-9">
									<input  type="text" placeholder="Member Since" name="member_since" value="{{$member_since}}" class="datepicker form-control" required/>

									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" for="demo-text-input">Wedding Aniversary</label>
									<div class="col-md-9">
									<input  type="text" placeholder="Wedding Anniversary" name="wedding_anniversary" value="{{$wedding_anniversary}}" class="datepicker form-control" required/>

									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">Photo</label>
									<div class="col-md-9">
										<span class="pull-left btn btn-primary btn-file">
											Select...
											<input type="file" name="photo" value="{{$photo}}">
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
								<div class="col-md-6" style="padding: 130px 0 0 320px;">
									<button class="btn btn-info pull-center" type="submit">UPDATE MEMBER</button>
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
