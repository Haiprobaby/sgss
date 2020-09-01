
<?php $__env->startSection('mainContent'); ?>

<?php  $setting = App\SmGeneralSettings::find(1); if(!empty($setting->currency_symbol)){ $currency = $setting->currency_symbol; }else{ $currency = '$'; } ?>

<section class="sms-breadcrumb mb-40 white-box">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('careers'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(url('dashboard')); ?>"><?php echo app('translator')->get('lang.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('humanResource'); ?></a>
                <a href="<?php echo e(url('careers-list')); ?>"><?php echo app('translator')->get('careers'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area up_st_admin_visitor">
	<div class="container-fluid p-0">
		<?php if(isset($career)): ?>
        <?php if(in_array(132, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1 ): ?>
                       
        <div class="row">
            
        </div>
        <?php endif; ?>
        <?php endif; ?>
		<div class="row">
                    <div class="col-lg-12">

                        <table id="table_id" class="display school-table" cellspacing="0" width="100%">

                            <thead>
                                <?php if(session()->has('message-success-delete') != "" ||
                                session()->get('message-danger-delete') != ""): ?>
                                <tr>
                                    <td colspan="5">
                                        <?php if(session()->has('message-success-delete')): ?>
                                        <div class="alert alert-success">
                                            <?php echo e(session()->get('message-success-delete')); ?>

                                        </div>
                                        <?php elseif(session()->has('message-danger-delete')): ?>
                                        <div class="alert alert-danger">
                                            <?php echo e(session()->get('message-danger-delete')); ?>

                                        </div>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php endif; ?>
                                <tr>
                                    <th> <?php echo app('translator')->get('lang.name'); ?></th>
                                    
                                    <th> <?php echo app('translator')->get('lang.status'); ?> 	</th>
                                    <th><?php echo app('translator')->get('salary'); ?> (<?php echo e($currency); ?>)</th>
                                    <th><?php echo app('translator')->get('lang.action'); ?></th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $__currentLoopData = $careers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $careers): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td data-toggle="tooltip" data-placement="top" title="<?php echo e($careers->description); ?>"><?php echo e($careers->name); ?></td>
                                    
                                    <td><?php if($careers->status==1): ?>Published <?php else: ?> Unpublish <?php endif; ?></td>
                                    <td><?php echo e($careers->salary); ?></td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                                                <?php echo app('translator')->get('lang.select'); ?>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                
                                                <?php if(in_array(133, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1 ): ?>

                                                <a class="dropdown-item" href="<?php echo e(route('career_edit', [$careers->id])); ?>"><?php echo app('translator')->get('lang.edit'); ?></a>
                                                <?php endif; ?>
                                                <?php if(in_array(134, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1 ): ?>

                                                <a class="dropdown-item" data-toggle="modal" data-target="#deleteFeesDiscountModal<?php echo e($careers->id); ?>"
                                                    href="#"><?php echo app('translator')->get('lang.delete'); ?></a>
                                           <?php endif; ?>
                                                </div>
                                        </div>
                                    </td>
                                </tr>
                                <div class="modal fade admin-query" id="deleteFeesDiscountModal<?php echo e($careers->id); ?>" >
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title"><?php echo app('translator')->get('lang.delete'); ?> <?php echo app('translator')->get('career'); ?></h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>

                                            <div class="modal-body">
                                                <div class="text-center">
                                                    <h4><?php echo app('translator')->get('lang.are_you_sure_to_delete'); ?></h4>
                                                </div>

                                                <div class="mt-40 d-flex justify-content-between">
                                                    <button type="button" class="primary-btn tr-bg" data-dismiss="modal"><?php echo app('translator')->get('lang.cancel'); ?></button>
                                                    <a href="<?php echo e(route('career_delete', [$careers->id])); ?>"><button class="primary-btn fix-gr-bg" type="submit"><?php echo app('translator')->get('lang.delete'); ?></button></a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div></div></section>

<section>
<div class="row">
                    <div class="col-lg-12">
                        <div class="main-title">
                            <h3 class="mb-30"><?php if(isset($career)): ?>
                                    <?php echo app('translator')->get('lang.edit'); ?>
                                <?php else: ?>
                                    <?php echo app('translator')->get('lang.add'); ?>
                                <?php endif; ?>
                                <?php echo app('translator')->get('career'); ?>
                            </h3>
                        </div>
                        <?php if(isset($career)): ?>
                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' =>
                        'career_update', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                        <?php else: ?>
                         <?php if(in_array(132, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1 ): ?>
                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'career_store',
                        'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                        <?php endif; ?>
                        <?php endif; ?>
                        <div class="white-box">
                            <div class="add-visitor">
                                <div class="row  mt-25">
                                    <div class="col-lg-12">
                                        <?php if(session()->has('message-success')): ?>
                                        <div class="alert alert-success">
                                            <?php echo e(session()->get('message-success')); ?>

                                        </div>
                                        <?php elseif(session()->has('message-danger')): ?>
                                        <div class="alert alert-danger">
                                            <?php echo e(session()->get('message-danger')); ?>

                                        </div>
                                        <?php endif; ?>
                                        <div class="input-effect">
                                            <input class="primary-input form-control<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>"
                                                type="text" name="name" autocomplete="off" value="<?php echo e(isset($career)? $career->name: ''); ?>">
                                            <input type="hidden" name="id" value="<?php echo e(isset($career)? $career->id: ''); ?>">
                                            <label><?php echo app('translator')->get('lang.name'); ?> <span>*</span></label>
                                            <span class="focus-border"></span>
                                            <?php if($errors->has('name')): ?>
                                            <span class="invalid-feedback" role="alert">	
                                                <strong><?php echo e($errors->first('name')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div>

                                    </div>
                                </div>
                                <div class="row mt-25">
                                    <div class="col-lg-12">
                                        <div class="input-effect">
                                            <input class="primary-input form-control<?php echo e($errors->has('location') ? ' is-invalid' : ''); ?>"
                                                type="text" name="location" autocomplete="off"
                                                value="<?php echo e(isset($career)? $career->location: ''); ?>">
                                            <label><?php echo app('translator')->get('lang.location'); ?> <span>*</span></label>
                                            <span class="focus-border"></span>
                                            <?php if($errors->has('location')): ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($errors->first('location')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-25">
                                    <div class="col-lg-12">
                                        <div class="input-effect">
                                            <input class="primary-input form-control<?php echo e($errors->has('salary') ? ' is-invalid' : ''); ?>"
                                                type="text" name="salary" autocomplete="off"
                                                value="<?php echo e(isset($career)? $career->salary: ''); ?>">
                                            <label><?php echo app('translator')->get('salary'); ?> <span>*</span></label>
                                            <span class="focus-border"></span>
                                            <?php if($errors->has('salary')): ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($errors->first('salary')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-40">
                                    <div class="col-lg-12 d-flex">
                                        
                                        <p class="text-uppercase fw-500"><?php echo app('translator')->get('lang.status'); ?></p>
                                        <div class="radio-btn-flex ml-40">
                                            <div class="mr-30">
                                                <input type="radio" name="status" id="Published" value="1" class="common-radio relationButton" <?php echo e(isset($career)? ($career->status == 1? 'checked':''):'checked'); ?>>
                                                <label for="Published"><?php echo app('translator')->get('Published'); ?></label><br>
                                            </div>
                                            <div class="mr-30">
                                                <input type="radio" name="status" id="Unpublish" value="0" class="common-radio relationButton" <?php echo e(isset($career)? ($career->status == 0? 'checked':''):''); ?>>
                                                <label for="Unpublish"><?php echo app('translator')->get('Unpublish'); ?></label>
                                            </div>

                                        </div>
                                        
                                    </div>
                                </div>

                                 <div class="row mt-25">
                                    <div class="col-lg-12">
                                    	<label><?php echo app('translator')->get('DESCRIPTION'); ?> <span></span></label>
                                        <div class="input-effect">
                                            <textarea id="summernote"  cols="" rows="4"
                                                name="description"><?php echo e(isset($career)? $career->description: ''); ?></textarea>
                                                
                                            <span class="focus-border textarea"></span>
                                        </div>
                                    </div>
                                </div>
                                
                            	<?php 
                                  $tooltip = "";
                                  if(in_array(132, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1 ){
                                        $tooltip = "";
                                    }else{
                                        $tooltip = "You have no permission to add";
                                    }
                                ?>

                                <div class="row mt-40">
                                    <div class="col-lg-12 text-center">
                                        <button class="primary-btn fix-gr-bg" data-toggle="tooltip" title="<?php echo e($tooltip); ?>">
                                            <span class="ti-check"></span>
                                            <?php if(isset($fees_discount)): ?>
                                                <?php echo app('translator')->get('lang.update'); ?>
                                            <?php else: ?>
                                                <?php echo app('translator')->get('lang.save'); ?>
                                            <?php endif; ?>
                                            <?php echo app('translator')->get('career'); ?>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php echo e(Form::close()); ?>

                    </div>
</div>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script type="text/javascript">
	$('#summernote').summernote({

       toolbar: [
    ['style', ['bold', 'italic', 'underline', 'clear']],
    ['font', ['strikethrough', 'superscript', 'subscript']],
    ['fontsize', ['fontsize']],
    ['fontname', ['fontname']],
    ['color', ['color']],
    ['para', ['ul', 'ol', 'paragraph']],
    ['table', ['table']],
    ['insert', ['link', 'picture', 'video']],
    ['view', ['fullscreen', 'codeview', 'help']],
    ['height', ['height']]
],
});
</script>
<?php $__env->stopSection(); ?>
    
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\SGSS\resources\views/backEnd/humanResource/careers/index.blade.php ENDPATH**/ ?>