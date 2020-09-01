<?php $__env->startPush('css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('public/')); ?>/frontend/css/new_style.css" />
<?php $__env->stopPush(); ?>
<?php $__env->startPush('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/backEnd/')); ?>/css/croppie.css">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('main_content'); ?>
<br>

<script>
	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function(e) {
				$('#blah')
					.attr('src', e.target.result);
			};

			reader.readAsDataURL(input.files[0]);
		}
	}
</script>
<img src="<?php echo e(asset('public/')); ?>/images/banner-du-an.jpeg" alt="">
<div class="container">
	<section class="sms-breadcrumb mb-40 up_breadcrumb white-box" style="
	background-image: linear-gradient(to top, #051937, #001940, #001848, #011750, #0a1457);
	">
		<br>
		<form action="" method="post" enctype="multipart/form-data">
			<?php echo csrf_field(); ?>
			<input type="hidden" name="student_full_name" value="<?php echo e(old('student_full_name')); ?>">
			<input type="hidden" name="date_of_birth" value="<?php echo e(old('date_of_birth')); ?>">
			<input type="hidden" name="gender" value="<?php echo e(old('gender')); ?>">
			<input type="hidden" name="session" value="<?php echo e(old('session')); ?>">
			<input type="hidden" name="first_nationality" value="<?php echo e(old('first_nationality')); ?>">
			<input type="hidden" name="residential_address_in_vietnam" value="<?php echo e(old('residential_address_in_vietnam')); ?>">
			<?php for($i = 0; $i < count(old('student_lives_with')); $i++): ?> <input type="hidden" name="student_lives_with[]" value="<?php echo e(old('student_lives_with.'.$i)); ?>">
				<?php endfor; ?>
				<input type="hidden" name="fathers_full_name" value="<?php echo e(old('fathers_full_name')); ?>">
				<input type="hidden" name="fathers_nationality" value="<?php echo e(old('fathers_nationality')); ?>">
				<input type="hidden" name="fathers_contact_phone_number" value="<?php echo e(old('fathers_contact_phone_number')); ?>">
				<input type="hidden" name="fathers_email_address" value="<?php echo e(old('fathers_email_address')); ?>">
				<input type="hidden" name="mothers_full_name" value="<?php echo e(old('mothers_full_name')); ?>">
				<input type="hidden" name="mothers_nationality" value="<?php echo e(old('mothers_nationality')); ?>">
				<input type="hidden" name="mothers_contact_phone_number" value="<?php echo e(old('mothers_contact_phone_number')); ?>">
				<input type="hidden" name="mothers_email_address" value="<?php echo e(old('mothers_email_address')); ?>">
				<input type="hidden" name="emergency_full_name" value="<?php echo e(old('emergency_full_name')); ?>">
				<input type="hidden" name="emergency_relationship_to_parents" value="<?php echo e(old('emergency_relationship_to_parents')); ?>">
				<input type="hidden" name="emergency_contact_phone_number" value="<?php echo e(old('emergency_contact_phone_number')); ?>">
				<input type="hidden" name="school_name" value="<?php echo e(old('school_name')); ?>">
				<input type="hidden" name="location_or_country" value="<?php echo e(old('location_or_country')); ?>">
				<input type="hidden" name="language_of_instruction" value="<?php echo e(old('language_of_instruction')); ?>">
				<input type="hidden" name="from" value="<?php echo e(old('from')); ?>">
				<input type="hidden" name="to" value="<?php echo e(old('to')); ?>">
				<input type="hidden" name="childs_first_language" value="<?php echo e(old('childs_first_language')); ?>">
				<input type="hidden" name="level_of_E_language_experience" value="<?php echo e(old('level_of_E_language_experience')); ?>">
				<input type="hidden" name="answer1" value="<?php echo e(old('answer1')); ?>">
				<input type="hidden" name="answer2" value="<?php echo e(old('answer2')); ?>">
				<input type="hidden" name="answer3" value="<?php echo e(old('answer3')); ?>">
				<input type="hidden" name="answer4" value="<?php echo e(old('answer4')); ?>">
				<input type="hidden" name="answer5" value="<?php echo e(old('answer5')); ?>">
				<?php for($i = 0; $i < count(old('health_permissions')); $i++): ?> <input type="hidden" name="health_permissions[]" value="<?php echo e(old('health_permissions.'.$i)); ?>">
					<?php endfor; ?>
					<input type="hidden" name="lunch_requested" value="<?php echo e(old('lunch_requested')); ?>">
					<input type="hidden" name="school_bus" value="<?php echo e(old('school_bus')); ?>">
					<input type="hidden" name="payment_by" value="<?php echo e(old('payment_by')); ?>">
					<input type="hidden" name="VAT" value="<?php echo e(old('VAT')); ?>">
					<?php for($i = 0; $i < count(old('other_permissions')); $i++): ?> <input type="hidden" name="other_permissions[]" value="<?php echo e(old('other_permissions.'.$i)); ?>">
						<?php endfor; ?>
						<div class="container-fluid">
							<h1 style="text-align: center; color:whitesmoke; font-size: 30px;">SAIGON STAR ENROLMENT FORM</h1>

							<div class="row mt-15">
								<div class="col-lg-12">
									<div class="white-box">
										<div class="row">
											<div class="col-lg-12">
												<div class="main-title">
													<h4 class="stu-sub-head">Personal info</h4>
												</div>
											</div>
										</div>
										<div class="row mt-30">
											<div class="col-lg-4">
												<div class="row  d-flex justify-content-center">
													<div class="row mb-10">
														<div class="col-lg-12">
															<img style="border-radius: 10px" id="blah" width="100px" height="100px" src="<?php echo e(asset('public/uploads/staff/demo/staff.jpg')); ?>" alt="avt">
														</div>
													</div>
													<div class="row d-flex justify-content-end">
														<div class="col-lg-12">
															<input type='file' onchange="readURL(this);" name="avt" />
														</div>
													</div>
												</div>
											</div>
											<div class="col-lg-8">
												<div class="row">
													<div class="col-lg-4">
														<h6>Student’s full name</h6>
													</div>

													<div class="col-lg-4">
														<h6><?php echo e(strtoupper(old('student_full_name'))); ?></h6>
													</div>
												</div>
												<div class="row">
													<div class="col-lg-4">
														<h6>Date of birth</h6>
													</div>
													<div class="col-lg-4">
														<h6><?php echo e(old('date_of_birth')); ?></h6>
													</div>
												</div>
												<div class="row">
													<div class="col-lg-4">
														<h6>Gender</h6>
													</div>
													<div class="col-lg-4">
														<h6><?php echo e((old('gender') == '0') ? 'Male' : 'Female'); ?></h6>
													</div>
												</div>
												<div class="row">
													<div class="col-lg-4">
														<h6>Nationality</h6>
													</div>
													<div class="col-lg-4">
														<h6><?php echo e(old('first_nationality')); ?></h6>
													</div>
												</div>
												<div class="row">
													<div class="col-lg-4">
														<h6>Session</h6>
													</div>
													<div class="col-lg-4">
														<h6>
															<?php if(old('session') == '1'): ?>
															Early years
															<?php endif; ?>
															<?php if(old('session') == '2'): ?>
															Primary years
															<?php endif; ?>
															<?php if(old('session') == '3'): ?>
															Middle years
															<?php endif; ?>
														</h6>
													</div>
												</div>
											</div>
										</div>

										<div class="row mt-15 justify-content-end">
											<div class="col-lg-3">
												<div class="input-effect sm2_mb_20 md_mb_20">
													<select class="niceSelect w-100 bb form-control<?php echo e($errors->has('class') ? ' is-invalid' : ''); ?>" name="class" id="classSelectStudent">
														<option data-display="<?php echo app('translator')->get('lang.class'); ?> *" value=""><?php echo app('translator')->get('lang.class'); ?> *</option>
														<?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<option value="<?php echo e($class->id); ?>" <?php echo e(old('class') == $class->id? 'selected': ''); ?>><?php echo e($class->class_name); ?></option>
														<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
													</select>
													<span class="focus-border"></span>
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
													<h4 class="stu-sub-head">APPLICATION FEE</h4>
												</div>
											</div>
										</div>
										<div class="row mt-30">
											<div class="col-lg-9">
												<h6><?php echo e($fees->where("Name", "APPLICATION FEE")->first()->description); ?></h6>
											</div>

											<div class="col-lg-1 d-flex justify-content-center">
												<h6><?php echo e($fees->where("Name", "APPLICATION FEE")->first()->price); ?></h6>
											</div>
											<div class="col-lg-2">
												<h6>VND</h6>
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
													<h4 class="stu-sub-head">ENROLMENT FEE</h4>
												</div>
											</div>
										</div>
										<div class="row mt-30">
											<div class="col-lg-9">
												<h6><?php echo e($fees->where("Name", "ENROLMENT FEE")->first()->description); ?></h6>
											</div>
											<div class="col-lg-1">
												<h6><?php echo e($fees->where("Name", "ENROLMENT FEE")->first()->price); ?></h6>
											</div>
											<div class="col-lg-2">
												<h6>VND</h6>
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
													<h4 class="stu-sub-head">ENGLISH AS AN ADDITIONAL (EAL) FEE</h4>
												</div>
											</div>
										</div>
										<div class="row mt-30">
											<div class="col-lg-9">
												<h6><?php echo e($fees->where("Name", "ENGLISH AS AN ADDITIONAL (EAL) FEE")->first()->description); ?></h6>
											</div>
											<div class="col-lg-1">
												<h6><?php echo e($fees->where("Name", "ENGLISH AS AN ADDITIONAL (EAL) FEE")->first()->price); ?></h6>
											</div>
											<div class="col-lg-2">
												<h6>VND</h6>
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
													<h4 class="stu-sub-head">SUPPLEMENT FEE</h4>
												</div>
											</div>
										</div>
										<div class="row mt-30">
											<div class="col-lg-9">
												<h6><?php echo e($fees->where("Name", "SUPPLEMENT FEE")->first()->description); ?></h6>
											</div>
											<div class="col-lg-1">
												<h6><?php echo e($fees->where("Name", "SUPPLEMENT FEE")->first()->price); ?></h6>
											</div>
											<div class="col-lg-2">
												<h6>VND</h6>
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
													<h4 class="stu-sub-head">TUITION FEES</h4>
												</div>
											</div>
										</div>
										<div class="row mt-30">
											<div class="col-lg-12">
												<table class="table table-bordered text-center">
													<thead>
														<tr>
															<th class="align-middle" rowspan="3" width="20%">
																<h6>Year Group</h6>
															</th>
															<th class="align-middle" colspan="4" width="80%">
																<h6>Payment Option</h6>
															</th>
														</tr>
														<tr>
															<th class="align-middle" colspan="1" width="20%">
																<h6>Option A</h6>
															</th>
															<th class="align-middle" colspan="3" width="60%">
																<h6>Option B</h6>
															</th>
														</tr>
														<tr>
															<th class="align-middle" width="20%">
																<h6>Due by 15th May</h6>
															</th>
															<th class="align-middle" width="20%">
																<h6>Due by 15th May</h6>
															</th>
															<th class="align-middle" width="20%">
																<h6>Before starting of new academic year</h6>
															</th>
															<th class="align-middle" width="20%">
																<h6>Before of term 3</h6>
															</th>
														</tr>
													</thead>
													<tbody>
														<?php $__currentLoopData = $tuition_fees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<tr>
															<td class="align-middle">
																<h6><?php echo e($i->title); ?></h6>
															</td>
															<td class="align-middle">
																<h6><?php echo e($i->tuition_payment_A); ?></h6>
															</td>
															<td class="align-middle">
																<h6><?php echo e($i->tuition_payment_B1); ?></h6>
															</td>
															<td class="align-middle">
																<h6><?php echo e($i->tuition_payment_B2); ?></h6>
															</td>
															<td class="align-middle">
																<h6><?php echo e($i->tuition_payment_B3); ?></h6>
															</td>
														</tr>
														<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
													</tbody>
												</table>
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
													<h4 class="stu-sub-head">LUNCH FEE</h4>
												</div>
											</div>
										</div>
										<div class="row mt-30">
											<div class="col-lg-9">
												<h6><?php echo $fees->where("Name", "LUNCH FEE")->first()->description; ?></h6>
											</div>

											<div class="col-lg-1 d-flex justify-content-center">
												<h6><?php echo e($fees->where("Name", "LUNCH FEE")->first()->price); ?></h6>
											</div>
											<div class="col-lg-2">
												<h6>VND</h6>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontEnd.home.layout.front_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/x/sgss/resources/views/frontEnd/home/light_enrolment_2.blade.php ENDPATH**/ ?>