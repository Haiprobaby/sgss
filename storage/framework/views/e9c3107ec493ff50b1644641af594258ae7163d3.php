<?php $__env->startPush('css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('public/')); ?>/frontend/css/new_style.css" />
<?php $__env->stopPush(); ?>
<?php $__env->startPush('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/backEnd/')); ?>/css/croppie.css">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('main_content'); ?>
<br>
<img src="<?php echo e(asset('public/')); ?>/images/banner-du-an.jpeg" alt="">
<div class="container">
	<section class="sms-breadcrumb mb-40 up_breadcrumb white-box" style="
	background-image: linear-gradient(to top, #051937, #001940, #001848, #011750, #0a1457);
	">
		<br>
		<form action="" method="post">
			<?php echo csrf_field(); ?>
			<input type="hidden" name="student_full_name" value="<?php echo e(old('student_full_name')); ?>">
			<input type="hidden" name="date_of_birth" value="<?php echo e(old('date_of_birth')); ?>">
			<input type="hidden" name="gender" value="<?php echo e(old('gender')); ?>">
			<input type="hidden" name="session" value="<?php echo e(old('session')); ?>">
			<input type="hidden" name="first_nationality" value="<?php echo e(old('first_nationality')); ?>">
			<input type="hidden" name="residential_address_in_vietnam" value="<?php echo e(old('residential_address_in_vietnam')); ?>">
			<?php for($i = 0; $i < count(old('student_lives_with')); $i++): ?>
			<input type="hidden" name="student_lives_with[]" value="<?php echo e(old('student_lives_with.'.$i)); ?>">
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
			<?php for($i = 0; $i < count(old('health_permissions')); $i++): ?>
			<input type="hidden" name="health_permissions[]" value="<?php echo e(old('health_permissions.'.$i)); ?>">
			<?php endfor; ?>
			<input type="hidden" name="lunch_requested" value="<?php echo e(old('lunch_requested')); ?>">
			<input type="hidden" name="school_bus" value="<?php echo e(old('school_bus')); ?>">
			<input type="hidden" name="payment_by" value="<?php echo e(old('payment_by')); ?>">
			<input type="hidden" name="VAT" value="<?php echo e(old('VAT')); ?>">
			<?php for($i = 0; $i < count(old('other_permissions')); $i++): ?>
			<input type="hidden" name="other_permissions[]" value="<?php echo e(old('other_permissions.'.$i)); ?>">
			<?php endfor; ?>
			<input type="hidden" name="avt" value="<?php echo e(old('avt')); ?>">
			<input type="hidden" name="class" value="<?php echo e(old('class')); ?>">
			<?php if(!empty(old('class'))): ?>
	            <?php
	            $old_sections = DB::table('sm_class_sections')->where('class_id', '=', old('class'))
	            ->join('sm_sections','sm_class_sections.section_id','=','sm_sections.id')
	            ->get();
	        	?>
			<?php endif; ?>

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
												<input class="primary-input form-control<?php echo e($errors->has('price') ? ' is-invalid' : ''); ?>" type="text" name="price" value="<?php echo e(old('price')); ?>">

												<label>Price VND *</label>
												<span class="focus-border"></span>
												<span class="invalid-feedback" id="student_preferred_name_feedback" role="alert"></span>
												<?php if($errors->has('price')): ?>
												<span class="invalid-feedback" role="alert">
													<strong><?php echo e($errors->first('price')); ?></strong>
												</span>
												<?php endif; ?>
											</div>
										</div>
									</div>
									<div class="row d-flex justify-content-center">
										<div class="col-lg-12">
											<small style="color: #DC3545;"><?php echo e($errors->first('method')); ?></small>
										</div>
										<div class="col-lg-12">
											<p class="text-uppercase fw-100 mb-10">Option *</p>
											<div class="d-flex radio-btn-flex ml-40">
												<?php $__currentLoopData = $payment_methods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<div class="mr-30">
													<input type="radio" name="method" id="<?php echo e($i->id); ?>" value="<?php echo e($i->method); ?>" class="common-radio relationButton" <?php if(old('method')==$i->method ): ?> checked <?php endif; ?>>
													<label for="<?php echo e($i->id); ?>"><?php echo e($i->method); ?></label>
												</div>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontEnd.home.layout.front_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/x/sgss/resources/views/frontEnd/home/light_enrolment_3.blade.php ENDPATH**/ ?>