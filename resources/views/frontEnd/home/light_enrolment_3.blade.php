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
			<input type="hidden" name="student_full_name" value="{{old('student_full_name')}}">
			<input type="hidden" name="date_of_birth" value="{{old('date_of_birth')}}">
			<input type="hidden" name="gender" value="{{old('gender')}}">
			<input type="hidden" name="session" value="{{old('session')}}">
			<input type="hidden" name="first_nationality" value="{{old('first_nationality')}}">
			<input type="hidden" name="residential_address_in_vietnam" value="{{old('residential_address_in_vietnam')}}">
			@for ($i = 0; $i < count(old('student_lives_with')); $i++)
			<input type="hidden" name="student_lives_with[]" value="{{old('student_lives_with.'.$i)}}">
			@endfor
			<input type="hidden" name="fathers_full_name" value="{{old('fathers_full_name')}}">
			<input type="hidden" name="fathers_nationality" value="{{old('fathers_nationality')}}">
			<input type="hidden" name="fathers_contact_phone_number" value="{{old('fathers_contact_phone_number')}}">
			<input type="hidden" name="fathers_email_address" value="{{old('fathers_email_address')}}">
			<input type="hidden" name="mothers_full_name" value="{{old('mothers_full_name')}}">
			<input type="hidden" name="mothers_nationality" value="{{old('mothers_nationality')}}">
			<input type="hidden" name="mothers_contact_phone_number" value="{{old('mothers_contact_phone_number')}}">
			<input type="hidden" name="mothers_email_address" value="{{old('mothers_email_address')}}">
			<input type="hidden" name="emergency_full_name" value="{{old('emergency_full_name')}}">
			<input type="hidden" name="emergency_relationship_to_parents" value="{{old('emergency_relationship_to_parents')}}">
			<input type="hidden" name="emergency_contact_phone_number" value="{{old('emergency_contact_phone_number')}}">
			<input type="hidden" name="school_name" value="{{old('school_name')}}">
			<input type="hidden" name="location_or_country" value="{{old('location_or_country')}}">
			<input type="hidden" name="language_of_instruction" value="{{old('language_of_instruction')}}">
			<input type="hidden" name="from" value="{{old('from')}}">
			<input type="hidden" name="to" value="{{old('to')}}">
			<input type="hidden" name="childs_first_language" value="{{old('childs_first_language')}}">
			<input type="hidden" name="level_of_E_language_experience" value="{{old('level_of_E_language_experience')}}">
			<input type="hidden" name="answer1" value="{{old('answer1')}}">
			<input type="hidden" name="answer2" value="{{old('answer2')}}">
			<input type="hidden" name="answer3" value="{{old('answer3')}}">
			<input type="hidden" name="answer4" value="{{old('answer4')}}">
			<input type="hidden" name="answer5" value="{{old('answer5')}}">
			@for ($i = 0; $i < count(old('health_permissions')); $i++)
			<input type="hidden" name="health_permissions[]" value="{{old('health_permissions.'.$i)}}">
			@endfor
			<input type="hidden" name="lunch_requested" value="{{old('lunch_requested')}}">
			<input type="hidden" name="school_bus" value="{{old('school_bus')}}">
			<input type="hidden" name="payment_by" value="{{old('payment_by')}}">
			<input type="hidden" name="VAT" value="{{old('VAT')}}">
			@for ($i = 0; $i < count(old('other_permissions')); $i++)
			<input type="hidden" name="other_permissions[]" value="{{old('other_permissions.'.$i)}}">
			@endfor
			<input type="hidden" name="avt" value="{{old('avt')}}">
			<input type="hidden" name="class" value="{{old('class')}}">
			@if(!empty(old('class')))
	            @php
	            $old_sections = DB::table('sm_class_sections')->where('class_id', '=', old('class'))
	            ->join('sm_sections','sm_class_sections.section_id','=','sm_sections.id')
	            ->get();
	        	@endphp
			@endif

			<div class="container-fluid">
				<h1 style="text-align: center; color:whitesmoke; font-size: 30px;">SAIGON STAR ENROLMENT FORM</h1>

				<div class="row mt-15">
					<div class="col-lg-12">
						<div class="white-box">
							<div class="row">
								<div class="col-lg-12">
									<div class="main-title">
										<h4 class="stu-sub-head">Payment methods</h4>
									</div>
								</div>
							</div>
							<div class="row mt-30">
								<div class="col-lg-12">
									<div class="row  mb-30">
										<div class="col-lg-3">
											<div class="input-effect">
												<input class="primary-input form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" type="text" name="price" value="{{old('price')}}">

												<label>Price VND *</label>
												<span class="focus-border"></span>
												<span class="invalid-feedback" id="student_preferred_name_feedback" role="alert"></span>
												@if ($errors->has('price'))
												<span class="invalid-feedback" role="alert">
													<strong>{{ $errors->first('price') }}</strong>
												</span>
												@endif
											</div>
										</div>
									</div>
									<div class="row d-flex justify-content-center">
										<div class="col-lg-12">
											<small style="color: #DC3545;">{{ $errors->first('method') }}</small>
										</div>
										<div class="col-lg-12">
											<p class="text-uppercase fw-100 mb-10">Option *</p>
											<div class="d-flex radio-btn-flex ml-40">
												@foreach ($payment_methods as $i)
												<div class="mr-30">
													<input type="radio" name="method" id="{{$i->id}}" value="{{$i->method}}" class="common-radio relationButton" @if(old('method')==$i->method ) checked @endif>
													<label for="{{$i->id}}">{{$i->method}}</label>
												</div>
												@endforeach
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="row mt-40">
					<div class="col-lg-12 text-center">
						<button class="primary-btn fix-gr-bg" id="_submit_btn_admission" type="submit">
							<span class="ti-check"></span>
							FINISH
						</button>
					</div>
				</div>
				<br>
			</div>
		</form>
	</section>
</div>
@endsection