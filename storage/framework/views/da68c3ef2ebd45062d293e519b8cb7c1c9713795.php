<?php $__env->startPush('css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('public/')); ?>/frontend/css/new_style.css" />
<?php $__env->stopPush(); ?>
<?php $__env->startPush('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/backEnd/')); ?>/css/croppie.css">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('main_content'); ?>
<br>
<div class="container">
	<section class="sms-breadcrumb mb-40 up_breadcrumb white-box" style="
	background-image: linear-gradient(to top, #051937, #001940, #001848, #011750, #0a1457);
	">
		<br>
		<form action="" method="post">
			<?php echo csrf_field(); ?>
			<div class="container-fluid">
				<h1 style="text-align: center; color:whitesmoke; font-size: 30px;">SAIGON STAR ENROLMENT FORM</h1>


				<div class="row mt-15">
					<div class="col-lg-12">
						<div class="white-box">
							<div class="row">
								<div class="col-lg-12">
									<div class="main-title">
										<h4 class="stu-sub-head">Student id card</h4>
									</div>
								</div>
							</div>
							<div class="row mt-30">
								<div class="col-lg-4">
									<div class="row  d-flex justify-content-center">
										<div class="row mb-10">
											<div class="col-lg-12 ">
												<div class="row">
													<img style="border-radius: 10px" id="blah" width="100px" height="100px" src="<?php if($student->student_photo): ?> <?php echo e(asset($student->student_photo)); ?> <?php else: ?> <?php echo e(asset('public/uploads/staff/demo/staff.jpg')); ?> <?php endif; ?>" alt="avt">
												</div>
												<div class="row justify-content-center mt-10">
													<!--2708_Long-->
													<strong>ID: <?php echo e($student->admission_no); ?></strong> 
													<!--End-->
												</div>
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
						</div>
					</div>
				</div>
				<br>
			</div>
		</form>
	</section>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontEnd.home.layout.front_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/x/sgss/resources/views/frontEnd/home/light_enrolment_finished.blade.php ENDPATH**/ ?>