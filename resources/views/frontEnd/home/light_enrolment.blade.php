@extends('frontEnd.home.layout.front_master')
@push('css')
<link rel="stylesheet" href="{{asset('public/')}}/frontend/css/new_style.css" />
@endpush
@push('css')
<link rel="stylesheet" type="text/css" href="{{asset('public/backEnd/')}}/css/croppie.css">
@endpush
@section('main_content')
<br>
<img src="{{asset('public/')}}/images/banner-du-an.jpeg" alt="">
<div class="container">
	<section class="sms-breadcrumb mb-40 up_breadcrumb white-box" style="
	background-image: linear-gradient(to top, #051937, #001940, #001848, #011750, #0a1457);
	">
		<br>
		<form action="" method="post">
			@csrf
			<div class="container-fluid">
				<h2 style="text-align: center; color: white; font-size: 30px;">SAIGON STAR ENROLMENT FORM</h2>

				<div class="row mt-30">
					<div class="col-lg-12">
						<div class="white-box">
							<div class="row">
								<div class="col-lg-12">
									<div class="main-title">
										<h4 class="stu-sub-head">Personal info</h4>
									</div>
								</div>
							</div>
							<div class="row mb-40 mt-30">
								<div class="col-lg-3">
									<div class="input-effect">
										<input class="primary-input form-control{{ $errors->has('student_full_name') ? ' is-invalid' : '' }}" type="text" name="student_full_name" value="{{old('student_full_name')}}">

										<label>Student’s full name *</label>
										<span class="focus-border"></span>
										<span class="invalid-feedback" id="student_full_name_feedback" role="alert"></span>
										@if ($errors->has('student_full_name'))
										<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('student_full_name') }}</strong>
										</span>
										@endif
									</div>
								</div>

								<div class="col-lg-3">
									<div class="input-effect">
										<input class="primary-input form-control{{ $errors->has('student_preferred_name') ? ' is-invalid' : '' }}" type="text" name="student_preferred_name" value="{{old('student_preferred_name')}}">

										<label>Student’s preferred name</label>
										<span class="focus-border"></span>
										<span class="invalid-feedback" id="student_preferred_name_feedback" role="alert"></span>
										@if ($errors->has('student_preferred_name'))
										<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('student_preferred_name') }}</strong>
										</span>
										@endif
									</div>
								</div>

								<div class="col-lg-3">
									<div class="no-gutters input-right-icon">
										<div class="col">
											<div class="input-effect sm2_mb_20 md_mb_20">
												<input class="primary-input date form-control{{ $errors->has('date_of_birth') ? ' is-invalid' : '' }}" id="startDate" type="text" name="date_of_birth" value="{{old('date_of_birth')}}" autocomplete="off">
												<label>Date of birth *</label>
												<span class="focus-border"></span>
												@if ($errors->has('date_of_birth'))
												<span class="invalid-feedback" role="alert">
													<strong>{{ $errors->first('date_of_birth') }}</strong>
												</span>
												@endif
											</div>
										</div>
										<div class="col-auto">
											<button class="" type="button">
												<i class="ti-calendar" id="start-date-icon"></i>
											</button>
										</div>
									</div>
								</div>
							</div>

							<div class="row mb-10">
								<div class="col-lg-12 d-flex">
									<small style="color: #DC3545;">{{ $errors->first('gender') }}</small>
								</div>
								<div class="col-lg-12 d-flex">
									<p class="text-uppercase fw-100 mb-10">Gender *</p>
									<div class="d-flex radio-btn-flex ml-40">
										<div class="mr-30">
											<input type="radio" name="gender" id="relationFather" value="0" class="common-radio relationButton" @if(old('gender')=='0' ) checked @endif>
											<label for="relationFather">Male</label>
										</div>
										<div class="mr-30">
											<input type="radio" name="gender" id="relationMother" value="1" class="common-radio relationButton" @if(old('gender')=='1' ) checked @endif>
											<label for="relationMother">Female</label>
										</div>
									</div>
								</div>
							</div>
							<div class="row mb-10">
								<div class="col-lg-12 d-flex">
									<small style="color: #DC3545;">{{ $errors->first('session') }}</small>
								</div>
								<div class="col-lg-12 d-flex">
									<p class="text-uppercase fw-100 mb-10">Session *</p>
									<div class="d-flex radio-btn-flex ml-40">
										<div class="mr-30">
											<input type="radio" name="session" id="early_years" value="1" class="common-radio relationButton" @if(old('session')=='1' ) checked @endif>
											<label for="early_years">Early Years</label>
										</div>
										<div class="mr-30">
											<input type="radio" name="session" id="primary_years" value="2" class="common-radio relationButton" @if(old('session')=='2' ) checked @endif>
											<label for="primary_years">Primary Years</label>
										</div>
										<div class="mr-30">
											<input type="radio" name="session" id="middle_years" value="3" class="common-radio relationButton" @if(old('session')=='3' ) checked @endif>
											<label for="middle_years">Middle Years</label>
										</div>
									</div>
								</div>
							</div>

							<div class="row mb-40">
								<div class="col-lg-3">
									<div class="input-effect">
										<input class="primary-input form-control{{ $errors->has('first_nationality') ? ' is-invalid' : '' }}" type="text" name="first_nationality" value="{{old('first_nationality')}}">

										<label>First Nationality *</label>
										<span class="focus-border"></span>
										<span class="invalid-feedback" id="first_nationality_feedback" role="alert"></span>
										@if ($errors->has('first_nationality'))
										<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('first_nationality') }}</strong>
										</span>
										@endif
									</div>
								</div>
								<div class="col-lg-3">
									<div class="input-effect">
										<input class="primary-input form-control{{ $errors->has('second_nationality') ? ' is-invalid' : '' }}" type="text" name="second_nationality" value="{{old('second_nationality')}}">

										<label>Second Nationality</label>
										<span class="focus-border"></span>
										<span class="invalid-feedback" id="second_nationality_feedback" role="alert"></span>
										@if ($errors->has('second_nationality'))
										<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('second_nationality') }}</strong>
										</span>
										@endif
									</div>
								</div>

								<div class="col-lg-6">
									<div class="input-effect">
										<input class="primary-input form-control{{ $errors->has('residential_address_in_vietnam') ? ' is-invalid' : '' }}" type="text" name="residential_address_in_vietnam" value="{{old('residential_address_in_vietnam')}}">

										<label>Residential address in Vietnam *</label>
										<span class="focus-border"></span>
										<span class="invalid-feedback" id="residential_address_in_vietnam_feedback" role="alert"></span>
										@if ($errors->has('residential_address_in_vietnam'))
										<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('residential_address_in_vietnam') }}</strong>
										</span>
										@endif
									</div>
								</div>
							</div>

							<div class="row mb-40">
								<div class="col-lg-12">
									<fieldset>
										<p>STUDENT LIVES WITH : (CHECK ALL THAT APPLY) *</p>
										<small style="color: #DC3545;">{{ $errors->first('student_lives_with') }}</small>

										@php
										$checked_father = false;
										$checked_mother = false;
										$checked_stepmother = false;
										$checked_stepfather = false;
										$checked_guardian = false;
										$checked_other = false;
										@endphp
										@if (old('student_lives_with'))
										@foreach (old('student_lives_with') as $i)
										@if ($i == "father")
										@php
										$checked_father = true
										@endphp
										@endif

										@if ($i == "mother")
										@php
										$checked_mother = true
										@endphp
										@endif

										@if ($i == "stepmother")
										@php
										$checked_stepmother = true
										@endphp
										@endif

										@if ($i == "stepfather")
										@php
										$checked_stepfather = true
										@endphp
										@endif

										@if ($i == "guardian")
										@php
										$checked_guardian = true
										@endphp
										@endif

										@if ($i == "other")
										@php
										$checked_other = true
										@endphp
										@endif
										@endforeach
										@endif
										<div>
											<input type="checkbox" id="coding" name="student_lives_with[]" value="father" @if($checked_father) checked @endif>
											<label for="coding">Father</label>
										</div>
										<div>
											<input type="checkbox" id="music" name="student_lives_with[]" value="mother" @if($checked_mother) checked @endif>
											<label for="music">Mother</label>
										</div>
										<div>
											<input type="checkbox" id="music" name="student_lives_with[]" value="stepmother" @if($checked_stepmother) checked @endif>
											<label for="music">Stepmother</label>
										</div>
										<div>
											<input type="checkbox" id="music" name="student_lives_with[]" value="stepfather" @if($checked_stepfather) checked @endif>
											<label for="music">Stepfather</label>
										</div>
										<div>
											<input type="checkbox" id="music" name="student_lives_with[]" value="guardian" @if($checked_guardian) checked @endif>
											<label for="music">Guardian</label>
										</div>
										<div>
											<input type="checkbox" id="music" name="student_lives_with[]" value="other" @if($checked_other) checked @endif>
											<label for="music">Other</label>
										</div>
									</fieldset>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="row mt-15">
					<div class="col-lg-12">
						<div class="white-box">
							<div class="row">
								<div class="col-lg-12">
									<div class="main-title">
										<h4 class="stu-sub-head">PARENTS & GUARDIAN INFO</h4>
									</div>
								</div>
							</div>
							<div class="row mb-40 mt-30">
								<div class="col-lg-3">
									<div class="input-effect">
										<input class="primary-input form-control{{ $errors->has('fathers_full_name') ? ' is-invalid' : '' }}" type="text" name="fathers_full_name" value="{{old('fathers_full_name')}}">

										<label>Father’s full name *</label>
										<span class="focus-border"></span>
										<span class="invalid-feedback" id="fathers_name_feedback" role="alert"></span>
										@if ($errors->has('fathers_full_name'))
										<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('fathers_full_name') }}</strong>
										</span>
										@endif
									</div>
								</div>

								<div class="col-lg-3">
									<div class="input-effect">
										<input class="primary-input form-control{{ $errors->has('fathers_nationality') ? ' is-invalid' : '' }}" type="text" name="fathers_nationality" value="{{old('fathers_nationality')}}">
										<label>Father's nationality *</label>
										<span class="focus-border"></span>
										<span class="invalid-feedback" id="fathers_nationality_feedback" role="alert"></span>
										@if ($errors->has('fathers_nationality'))
										<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('fathers_nationality') }}</strong>
										</span>
										@endif
									</div>
								</div>

								<div class="col-lg-3">
									<div class="input-effect">
										<input class="primary-input form-control{{ $errors->has('fathers_contact_phone_number') ? ' is-invalid' : '' }}" name="fathers_contact_phone_number" value="{{old('fathers_contact_phone_number')}}">

										<label>Father's contact phone number *</label>
										<span class="focus-border"></span>
										<span class="invalid-feedback" id="fathers_contact_phone_number_feedback" role="alert"></span>
										@if ($errors->has('fathers_contact_phone_number'))
										<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('fathers_contact_phone_number') }}</strong>
										</span>
										@endif
									</div>
								</div>

								<div class="col-lg-3">
									<div class="input-effect">
										<input class="primary-input form-control{{ $errors->has('fathers_email_address') ? ' is-invalid' : '' }}" type="text" name="fathers_email_address" value="{{old('fathers_email_address')}}">

										<label>Father's email address *</label>
										<span class="focus-border"></span>
										<span class="invalid-feedback" id="fathers_email_address_feedback" role="alert"></span>
										@if ($errors->has('fathers_email_address'))
										<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('fathers_email_address') }}</strong>
										</span>
										@endif
									</div>
								</div>

							</div>

							<div class="row mb-40 mt-30">
								<div class="col-lg-3">
									<div class="input-effect">
										<input class="primary-input form-control{{ $errors->has('mothers_full_name') ? ' is-invalid' : '' }}" type="text" name="mothers_full_name" value="{{old('mothers_full_name')}}">

										<label>Mother’s full name *</label>
										<span class="focus-border"></span>
										<span class="invalid-feedback" id="mothers_full_name_feedback" role="alert"></span>
										@if ($errors->has('mothers_full_name'))
										<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('mothers_full_name') }}</strong>
										</span>
										@endif
									</div>
								</div>

								<div class="col-lg-3">
									<div class="input-effect">
										<input class="primary-input form-control{{ $errors->has('mothers_nationality') ? ' is-invalid' : '' }}" type="text" name="mothers_nationality" value="{{old('mothers_nationality')}}">

										<label>Mother's nationality *</label>
										<span class="focus-border"></span>
										<span class="invalid-feedback" id="mothers_nationality_feedback" role="alert"></span>
										@if ($errors->has('mothers_nationality'))
										<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('mothers_nationality') }}</strong>
										</span>
										@endif
									</div>
								</div>

								<div class="col-lg-3">
									<div class="input-effect">
										<input class="primary-input form-control{{ $errors->has('mothers_contact_phone_number') ? ' is-invalid' : '' }}" type="text" name="mothers_contact_phone_number" value="{{old('mothers_contact_phone_number')}}">

										<label>Mother's contact phone number*</label>
										<span class="focus-border"></span>
										<span class="invalid-feedback" id="mothers_contact_phone_number_feedback" role="alert"></span>
										@if ($errors->has('mothers_contact_phone_number'))
										<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('mothers_contact_phone_number') }}</strong>
										</span>
										@endif
									</div>
								</div>

								<div class="col-lg-3">
									<div class="input-effect">
										<input class="primary-input form-control{{ $errors->has('mothers_email_address') ? ' is-invalid' : '' }}" type="text" name="mothers_email_address" value="{{old('mothers_email_address')}}">

										<label>Mother's email address *</label>
										<span class="focus-border"></span>
										<span class="invalid-feedback" id="mothers_email_address_feedback	" role="alert"></span>
										@if ($errors->has('mothers_email_address'))
										<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('mothers_email_address') }}</strong>
										</span>
										@endif
									</div>
								</div>

							</div>

						</div>
					</div>
				</div>

				<div class="row mt-15">
					<div class="col-lg-12">
						<div class="white-box">
							<div class="row">
								<div class="col-lg-12">
									<div class="main-title">
										<h4 class="stu-sub-head">EMERGENCY CONTACT INFORMATION</h4>
										<small>Please provide details of someone who can act on your behalf, if neither parent can be reached in an emergency</small>
									</div>
								</div>
							</div>
							<div class="row mb-40 mt-30">
								<div class="col-lg-3">
									<div class="input-effect">
										<input class="primary-input form-control{{ $errors->has('emergency_full_name') ? ' is-invalid' : '' }}" type="text" name="emergency_full_name" value="{{old('emergency_full_name')}}">

										<label>Full name *</label>
										<span class="focus-border"></span>
										<span class="invalid-feedback" id="emergency_full_name_feedback" role="alert"></span>
										@if ($errors->has('emergency_full_name'))
										<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('emergency_full_name') }}</strong>
										</span>
										@endif
									</div>
								</div>

								<div class="col-lg-3">
									<div class="input-effect">
										<input class="primary-input form-control{{ $errors->has('emergency_relationship_to_parents') ? ' is-invalid' : '' }}" type="text" name="emergency_relationship_to_parents" value="{{old('emergency_relationship_to_parents')}}">

										<label>Relationship to parents *</label>
										<span class="focus-border"></span>
										<span class="invalid-feedback" id="emergency_relationship_to_parents_feedback" role="alert"></span>
										@if ($errors->has('emergency_relationship_to_parents'))
										<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('emergency_relationship_to_parents') }}</strong>
										</span>
										@endif
									</div>
								</div>

								<div class="col-lg-3">
									<div class="input-effect">
										<input class="primary-input form-control{{ $errors->has('emergency_contact_phone_number') ? ' is-invalid' : '' }}" type="text" name="emergency_contact_phone_number" value="{{old('emergency_contact_phone_number')}}">

										<label>Contact phone number *</label>
										<span class="focus-border"></span>
										<span class="invalid-feedback" id="emergency_contact_phone_number_feedback" role="alert"></span>
										@if ($errors->has('emergency_contact_phone_number'))
										<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('emergency_contact_phone_number') }}</strong>
										</span>
										@endif
									</div>
								</div>

							</div>

						</div>
					</div>
				</div>

				<div class="row mt-15">
					<div class="col-lg-12">
						<div class="white-box">
							<div class="row">
								<div class="col-lg-12">
									<div class="main-title">
										<h4 class="stu-sub-head">SCHOOL HISTORY</h4>
										<small>Please list your child's current or most recent school.</small>
									</div>
								</div>
							</div>
							<div class="row mb-40 mt-30">
								<div class="col-lg-3">
									<div class="input-effect">
										<input class="primary-input form-control{{ $errors->has('school_name') ? ' is-invalid' : '' }}" type="text" name="school_name" value="{{old('school_name')}}">

										<label>School Name *</label>
										<span class="focus-border"></span>
										<span class="invalid-feedback" id="school_name_feedback" role="alert"></span>
										@if ($errors->has('school_name'))
										<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('school_name') }}</strong>
										</span>
										@endif
									</div>
								</div>

								<div class="col-lg-3">
									<div class="input-effect">
										<input class="primary-input form-control{{ $errors->has('location_or_country') ? ' is-invalid' : '' }}" type="text" name="location_or_country" value="{{old('location_or_country')}}">

										<label>Location/Country *</label>
										<span class="focus-border"></span>
										<span class="invalid-feedback" id="location_or_country_feedback" role="alert"></span>
										@if ($errors->has('location_or_country'))
										<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('location_or_country') }}</strong>
										</span>
										@endif
									</div>
								</div>

								<div class="col-lg-3">
									<div class="input-effect">
										<input class="primary-input form-control{{ $errors->has('language_of_instruction') ? ' is-invalid' : '' }}" type="text" name="language_of_instruction" value="{{old('language_of_instruction')}}">

										<label>Language of Instruction *</label>
										<span class="focus-border"></span>
										<span class="invalid-feedback" id="language_of_instruction_feedback" role="alert"></span>
										@if ($errors->has('language_of_instruction'))
										<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('language_of_instruction') }}</strong>
										</span>
										@endif
									</div>
								</div>

							</div>

							<div class="row mb-40 mt-30">
								<div class="col-lg-3">
									<div class="input-effect">
										<input class="primary-input form-control{{ $errors->has('from') ? ' is-invalid' : '' }}" type="text" name="from" value="{{old('from')}}">

										<label>From *</label>
										<span class="focus-border"></span>
										<span class="invalid-feedback" id="from_feedback" role="alert"></span>
										@if ($errors->has('from'))
										<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('from') }}</strong>
										</span>
										@endif
									</div>
								</div>

								<div class="col-lg-3">
									<div class="input-effect">
										<input class="primary-input form-control{{ $errors->has('to') ? ' is-invalid' : '' }}" type="text" name="to" value="{{old('to')}}">

										<label>To *</label>
										<span class="focus-border"></span>
										<span class="invalid-feedback" id="to_feedback" role="alert"></span>
										@if ($errors->has('to'))
										<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('to') }}</strong>
										</span>
										@endif
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>

				<div class="row mt-15">
					<div class="col-lg-12">
						<div class="white-box">
							<div class="row">
								<div class="col-lg-12">
									<div class="main-title">
										<h4 class="stu-sub-head">LANGUAGE INFORMATION</h4>
									</div>
								</div>
							</div>
							<div class="row mb-40 mt-30">
								<div class="col-lg-3">
									<div class="input-effect">
										<input class="primary-input form-control{{ $errors->has('childs_first_language') ? ' is-invalid' : '' }}" type="text" name="childs_first_language" value="{{old('childs_first_language')}}">

										<label>Child's first language *</label>
										<span class="focus-border"></span>
										<span class="invalid-feedback" id="childs_first_language_feedback" role="alert"></span>
										@if ($errors->has('childs_first_language'))
										<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('childs_first_language') }}</strong>
										</span>
										@endif
									</div>
								</div>

								<div class="col-lg-3">
									<div class="input-effect">
										<input class="primary-input form-control{{ $errors->has('childs_second_language') ? ' is-invalid' : '' }}" type="text" name="childs_second_language" value="{{old('childs_second_language')}}">

										<label>Child's second language</label>
										<span class="focus-border"></span>
										<span class="invalid-feedback" id="child_second_language_feedback" role="alert"></span>
										@if ($errors->has('childs_second_language'))
										<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('childs_second_language') }}</strong>
										</span>
										@endif
									</div>
								</div>

								<div class="col-lg-6">
									<fieldset>
										<small style="color: #DC3545;">{{ $errors->first('level_of_E_language_experience') }}</small>
										<p>Child's level of English Language experience *</p>
										<div>
											<input type="radio" id="native" class="common-radio relationButton" name="level_of_E_language_experience" value="0" @if(old('level_of_E_language_experience')=='0' ) checked @endif>
											<label for="native">Native</label>
											<br>
										</div>
										<div>
											<input type="radio" id="more_than_5_years" class="common-radio relationButton" name="level_of_E_language_experience" value="1" @if(old('level_of_E_language_experience')=='1' ) checked @endif>
											<label for="more_than_5_years">More than 5 years</label>
											<br>
										</div>
										<div>
											<input type="radio" id="2-5_years" class="common-radio relationButton" name="level_of_E_language_experience" value="2" @if(old('level_of_E_language_experience')=='2' ) checked @endif>
											<label for="2-5_years">2-5 years</label>
											<br>
										</div>
										<div>
											<input type="radio" id="less_than_2_years" class="common-radio relationButton" name="level_of_E_language_experience" value="3" @if(old('level_of_E_language_experience')=='3' ) checked @endif>
											<label for="less_than_2_years">Less than 2 years</label>
											<br>
										</div>
										<div>
											<input type="radio" id="no_pior_experience" class="common-radio relationButton" name="level_of_E_language_experience" value="4" @if(old('level_of_E_language_experience')=='4' ) checked @endif>
											<label for="no_pior_experience">No pior experience</label>
											<br>
										</div>
										<div>
											<input type="radio" id="other" class="common-radio relationButton" name="level_of_E_language_experience" value="5" @if(old('level_of_E_language_experience')=='5' ) checked @endif>
											<label for="other">Other</label>
											<br>
										</div>
									</fieldset>
								</div>

							</div>

						</div>
					</div>
				</div>

				<div class="row mt-15">
					<div class="col-lg-12">
						<div class="white-box">
							<div class="row">
								<div class="col-lg-12">
									<div class="main-title">
										<h4 class="stu-sub-head">HEALTH INFORMATION</h4>
									</div>
								</div>
							</div>
							<div class="row mb-40 mt-30">
								<div class="col-lg-10">
									<p>If your child has any medical condition or chronic disease which requires medication, or which mayaffect his/her daily routine, please describe it here *</p>
									<div class="input-effect">
										<input class="primary-input form-control{{ $errors->has('answer1') ? ' is-invalid' : '' }}" type="text" name="answer1" value="{{old('answer1')}}">

										<label>Answer</label>
										<span class="focus-border"></span>
										<span class="invalid-feedback" id="answer1_feedback" role="alert"></span>
										@if ($errors->has('answer1'))
										<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('answer1') }}</strong>
										</span>
										@endif
									</div>
								</div>
							</div>
							<div class="row mb-40 mt-30">
								<div class="col-lg-10">
									<p>Allergies to medications and/or foods *</p>
									<div class="input-effect">
										<input class="primary-input form-control{{ $errors->has('answer2') ? ' is-invalid' : '' }}" type="text" name="answer2" value="{{old('answer2')}}">

										<label>Answer</label>
										<span class="focus-border"></span>
										<span class="invalid-feedback" id="answer2_feedback" role="alert"></span>
										@if ($errors->has('answer2'))
										<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('answer2') }}</strong>
										</span>
										@endif
									</div>
								</div>
							</div>

							<div class="row mb-40 mt-30">
								<div class="col-lg-10">
									<p>Medications taken on a regular basis *</p>
									<div class="input-effect">
										<input class="primary-input form-control{{ $errors->has('answer3') ? ' is-invalid' : '' }}" type="text" name="answer3" value="{{old('answer3')}}">

										<label>Answer</label>
										<span class="focus-border"></span>
										<span class="invalid-feedback" id="answer3_feedback" role="alert"></span>
										@if ($errors->has('answer3'))
										<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('answer3') }}</strong>
										</span>
										@endif
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>

				<div class="row mt-15">
					<div class="col-lg-12">
						<div class="white-box">
							<div class="row">
								<div class="col-lg-12">
									<div class="main-title">
										<h4 class="stu-sub-head">HEALTH PERMISSIONS</h4>
									</div>
								</div>
							</div>

							@php
							$checked_0 = false;
							$checked_1 = false;
							@endphp
							@if (old('health_permissions'))
							@foreach (old('health_permissions') as $i)
							@if ($i == "0")
							@php
							$checked_0 = true
							@endphp
							@endif

							@if ($i == "1")
							@php
							$checked_1 = true
							@endphp
							@endif
							@endforeach
							@endif

							<div class="row mb-40 mt-30">
								<div class="col-lg-12">
									<fieldset>
										<small style="color: #DC3545;">{{ $errors->first('health_permissions') }}</small>
										<p>CHECK ALL THAT APPLY *</p>
										<div>
											<input type="checkbox" id="health1" name="health_permissions[]" value="0" @if($checked_0) checked @endif>
											<label for="health1">I DO NOT consent to the school nurse administering over-the-counter medications for symptom relief of minor illnesses</label>
										</div>
										<div>
											<input type="checkbox" id="health2" name="health_permissions[]" value="1" @if($checked_1) checked @endif>
											<label for="health2">I DO NOT consent to emergency hospital treatment for my child</label>
										</div>
									</fieldset>
								</div>

							</div>

						</div>
					</div>
				</div>

				<div class="row mt-15">
					<div class="col-lg-12">
						<div class="white-box">
							<div class="row">
								<div class="col-lg-12">
									<div class="main-title">
										<h4 class="stu-sub-head">SPECIAL EDUCATIONAL NEEDS (SEN)</h4>
									</div>
								</div>
							</div>
							<div class="row mb-40 mt-30">
								<div class="col-lg-10">
									<p>If your child has a vision or hearing impairment, please describe it here *</p>
									<div class="input-effect">
										<input class="primary-input form-control{{ $errors->has('answer4') ? ' is-invalid' : '' }}" type="text" name="answer4" value="{{old('answer4')}}">

										<label>Answer</label>
										<span class="focus-border"></span>
										<span class="invalid-feedback" id="answer4_feedback" role="alert"></span>
										@if ($errors->has('answer4'))
										<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('answer4') }}</strong>
										</span>
										@endif
									</div>
								</div>
							</div>
							<div class="row mb-40 mt-30">
								<div class="col-lg-10">
									<p>Please describe any other Special Educational Need *</p>
									<div class="input-effect">
										<input class="primary-input form-control{{ $errors->has('answer5') ? ' is-invalid' : '' }}" type="text" name="answer5" value="{{old('answer5')}}">

										<label>Answer</label>
										<span class="focus-border"></span>
										<span class="invalid-feedback" id="answer5_feedback" role="alert"></span>
										@if ($errors->has('answer5'))
										<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('answer5') }}</strong>
										</span>
										@endif
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>

				<div class="row mt-15">
					<div class="col-lg-12">
						<div class="white-box">
							<div class="row">
								<div class="col-lg-12">
									<div class="main-title">
										<h4 class="stu-sub-head">PAYMENT INFORMATION</h4>
									</div>
								</div>
							</div>
							<div class="row mt-10">
								<div class="col-lg-2">
									<small style="color: #DC3545;">{{ $errors->first('lunch_requested') }}</small>
								</div>
								<div class="col-lg-4">
									<small style="color: #DC3545;">{{ $errors->first('school_bus') }}</small>
								</div>
								<div class="col-lg-3">
									<small style="color: #DC3545;">{{ $errors->first('payment_by') }}</small>
								</div>
								<div class="col-lg-3">
									<small style="color: #DC3545;">{{ $errors->first('VAT') }}</small>
								</div>
							</div>
							<div class="row mb-40">
								<div class="col-lg-2">
									<fieldset>
										<p>Lunch requested: *</p>
										<div>
											<input type="radio" id="lunch_requested_yes" class="common-radio relationButton" name="lunch_requested" value="1" @if(old('lunch_requested')=='1' ) checked @endif>
											<label for="lunch_requested_yes">YES</label>
											<br>
										</div>
										<div>
											<input type="radio" id="lunch_request_no" class="common-radio relationButton" name="lunch_requested" value="0" @if(old('lunch_requested')=='0' ) checked @endif>
											<label for="lunch_request_no">NO</label>
											<br>
										</div>
									</fieldset>
								</div>
								<div class="col-lg-4">
									<fieldset>
										<p>School bus service requested *</p>
										<div>
											<input type="radio" id="bus_0" class="common-radio relationButton" name="school_bus" value="0" @if(old('school_bus')=='0' ) checked @endif>
											<label for="bus_0">Vista Verde or Diamond Island</label>
											<br>
										</div>
										<div>
											<input type="radio" id="bus_1" class="common-radio relationButton" name="school_bus" value="1" @if(old('school_bus')=='1' ) checked @endif>
											<label for="bus_1">District 2</label>
											<br>
										</div>
										<div>
											<input type="radio" id="bus_2" class="common-radio relationButton" name="school_bus" value="2" @if(old('school_bus')=='2' ) checked @endif>
											<label for="bus_2">Other districts</label>
											<br>
										</div>
										<div>
											<input type="radio" id="bus_3" class="common-radio relationButton" name="school_bus" value="3" @if(old('school_bus')=='3' ) checked @endif>
											<label for="bus_3">No</label>
											<br>
										</div>
										<div>
											<input type="radio" id="bus_4" class="common-radio relationButton" name="school_bus" value="4" @if(old('school_bus')=='4' ) checked @endif>
											<label for="bus_4">Other</label>
											<br>
										</div>
									</fieldset>
								</div>
								<div class="col-lg-3">
									<fieldset>
										<p>Payment by *</p>
										<div>
											<input type="radio" id="payment_by_0" class="common-radio relationButton" name="payment_by" value="0" @if(old('payment_by')=='0' ) checked @endif>
											<label for="payment_by_0">Father</label>
											<br>
										</div>
										<div>
											<input type="radio" id="payment_by_1" class="common-radio relationButton" name="payment_by" value="1" @if(old('payment_by')=='1' ) checked @endif>
											<label for="payment_by_1">Mother</label>
											<br>
										</div>
										<div>
											<input type="radio" id="payment_by_2" class="common-radio relationButton" name="payment_by" value="2" @if(old('payment_by')=='2' ) checked @endif>
											<label for="payment_by_2">Company</label>
											<br>
										</div>
										<div>
											<input type="radio" id="payment_by_3" class="common-radio relationButton" name="payment_by" value="3" @if(old('payment_by')=='3' ) checked @endif>
											<label for="payment_by_3">Other</label>
											<br>
										</div>
									</fieldset>
								</div>
								<div class="col-lg-3">
									<fieldset>
										<p>Do you require a VAT Invoice? *</p>
										<div>
											<input type="radio" id="VAT0" class="common-radio relationButton" name="VAT" value="0" @if(old('VAT')=='0' ) checked @endif>
											<label for="VAT0">Yes</label>
											<br>
										</div>
										<div>
											<input type="radio" id="VAT1" class="common-radio relationButton" name="VAT" value="1" @if(old('VAT')=='1' ) checked @endif>
											<label for="VAT1">No</label>
											<br>
										</div>
										<div>
											<input type="radio" id="VAT2" class="common-radio relationButton" name="VAT" value="2" @if(old('VAT')=='2' ) checked @endif>
											<label for="VAT2">Other</label>
											<br>
										</div>
									</fieldset>
								</div>
							</div>

							<div class="row mb-40 mt-30">
								<div class="col-lg-4">
									<div class="input-effect">
										<input class="primary-input form-control{{ $errors->has('company_name') ? ' is-invalid' : '' }}" type="text" name="company_name" value="{{old('company_name')}}">

										<label>Company Name (if payment by company)</label>
										<span class="focus-border"></span>
										<span class="invalid-feedback" id="company_name_feedback" role="alert"></span>
										@if ($errors->has('company_name'))
										<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('company_name') }}</strong>
										</span>
										@endif
									</div>
								</div>
								<div class="col-lg-4">
									<div class="input-effect">
										<input class="primary-input form-control{{ $errors->has('contact_name') ? ' is-invalid' : '' }}" type="text" name="contact_name" value="{{old('contact_name')}}">

										<label>Contact Name</label>
										<span class="focus-border"></span>
										<span class="invalid-feedback" id="contact_name_feedback" role="alert"></span>
										@if ($errors->has('contact_name'))
										<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('contact_name') }}</strong>
										</span>
										@endif
									</div>
								</div>
								<div class="col-lg-4">
									<div class="input-effect">
										<input class="primary-input form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" type="text" name="address" value="{{old('address')}}">

										<label>Address</label>
										<span class="focus-border"></span>
										<span class="invalid-feedback" id="address_feedback" role="alert"></span>
										@if ($errors->has('address'))
										<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('address') }}</strong>
										</span>
										@endif
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>

				<div class="row mt-15">
					<div class="col-lg-12">
						<div class="white-box">
							<div class="row">
								<div class="col-lg-12">
									<div class="main-title">
										<h4 class="stu-sub-head">OTHER PERMISSIONS</h4>
									</div>
								</div>
							</div>

							@php
							$checked_0 = false;
							$checked_1 = false;
							@endphp
							@if (old('other_permissions'))
							@foreach (old('other_permissions') as $i)
							@if ($i == "0")
							@php
							$checked_0 = true
							@endphp
							@endif

							@if ($i == "1")
							@php
							$checked_1 = true
							@endphp
							@endif
							@endforeach
							@endif
							<div class="row mb-40 mt-30">
								<div class="col-lg-12">
									<fieldset>
										<small style="color: #DC3545;">{{ $errors->first('other_permissions') }}</small>
										<div>
											<input type="checkbox" id="permissions0" name="other_permissions[]" value="0" @if($checked_0) checked @endif>
											<label for="permissions0">Please tick if you DO NOT consent to group photographs of your child being used for school advertising and marketing purposes</label>
										</div>
										<div>
											<input type="checkbox" id="permissions1" name="other_permissions[]" value="1" @if($checked_1) checked @endif>
											<label for="permissions1">Please tick if you DO NOT consent to joining a class parents What'sApp group (to learn about birthday parties etc)</label>
										</div>
									</fieldset>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="row mt-40">
					<div class="col-lg-12 text-center">
						<button class="primary-btn fix-gr-bg" id="_submit_btn_admission" type="submit">
							<span class="ti-check"></span>
							NEXT
						</button>
					</div>
				</div>
				<br>
			</div>
		</form>
	</section>
</div>
@endsection