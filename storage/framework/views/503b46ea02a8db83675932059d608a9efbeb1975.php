
<?php $__env->startSection('mainContent'); ?>

    <section class="sms-breadcrumb mb-40 white-box">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('lang.news'); ?> <?php echo app('translator')->get('lang.category'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(url('dashboard')); ?>"><?php echo app('translator')->get('lang.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('lang.news'); ?></a>
                    <a href="<?php echo e(url('news-sub-category')); ?>"><?php echo app('translator')->get('Sub'); ?> <?php echo app('translator')->get('lang.category'); ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid p-0">
            <?php if(isset($editData)): ?>
                <div class="row">
                    <div class="offset-lg-10 col-lg-2 text-right col-md-12 mb-20">
                        <a href="<?php echo e(url('news-sub-category')); ?>" class="primary-btn small fix-gr-bg">
                            <span class="ti-plus pr-2"></span>
                            <?php echo app('translator')->get('lang.add'); ?>
                        </a>
                    </div>
                </div>
            <?php endif; ?>
            <div class="row">
                <div class="col-lg-3">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="main-title">
                                <h3 class="mb-30"><?php if(isset($editData)): ?>
                                        <?php echo app('translator')->get('lang.edit'); ?>
                                    <?php else: ?>
                                        <?php echo app('translator')->get('lang.add'); ?>
                                    <?php endif; ?>
                                    <?php echo app('translator')->get('sub category'); ?>
                                </h3>
                            </div>
                            <?php if(isset($editData)): ?>
                                <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'update_Sub_category',
                            'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'add-income-update'])); ?>

                            <?php else: ?>
                                <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'store_Sub_category',
                                'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'add-income'])); ?>

                            <?php endif; ?>

                            <div class="white-box">
                                <div class="add-visitor">
                                    <div class="row">
                                       

                                        <div class="col-lg-12 mb-20">
                                            <div class="input-effect">
                                                <input class="primary-input form-control<?php echo e($errors->has('sub_category_name') ? ' is-invalid' : ''); ?>"
                                                       type="text" name="sub_category_name" autocomplete="off" value="<?php echo e(isset($editData)? $editData->sub_category_name : ''); ?>">
                                                <input type="hidden" name="id" value="<?php echo e(isset($editData)? $editData->id: ''); ?>">
                                                <label><?php echo app('translator')->get('lang.category'); ?> <?php echo app('translator')->get('lang.name'); ?> <span>*</span> </label>
                                                <span class="focus-border"></span>
                                                <?php if($errors->has('category_name')): ?>
                                                    <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($errors->first('category_name')); ?></strong>
                                            </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                        <div class="col-lg-12 mb-20">

                                                <select
                                                    class="niceSelect w-100 bb form-control<?php echo e($errors->has('accounts') ? ' is-invalid' : ''); ?>"
                                                    name="category_id">
                                                    <option data-display="<?php echo app('translator')->get('lang.select'); ?> *" value=""><?php echo app('translator')->get('lang.select'); ?> *</option>
                                                    <?php $__currentLoopData = $newsCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option data-display="<?php echo e($value->category_name); ?>" value="<?php echo e($value->id); ?>"
                                                        <?php if(isset($editData)): ?>
                                                            <?php if($editData->category_id == $value->id): ?>
                                                                selected
                                                            <?php endif; ?>
                                                        <?php endif; ?>>
                                                        <?php echo e($value->category_name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                                <?php if($errors->has('accounts')): ?>
                                                    <span class="invalid-feedback invalid-select" role="alert">
                                            <strong><?php echo e($errors->first('accounts')); ?></strong>
                                        </span>
                                                <?php endif; ?>
                                        </div>
                                        <div class="col-lg-12 mb-20">
                                                <div class="input-effect">
                                                    <textarea class="primary-input form-control" cols="0" rows="4" name="description"><?php echo e(isset($editData)? $editData->description: old('description')); ?></textarea>
                                                    <label><?php echo app('translator')->get('lang.description'); ?> <span></span></label>
                                                    <span class="focus-border textarea"></span>
                                                </div>
                                            </div>
                                        <div class="col-lg-12">                                      
                                        <div class="row no-gutters input-right-icon mt-20">
                                            <div class="col">
                                                <div class="row no-gutters input-right-icon">
                                                    <div class="col">
                                                        <div class="input-effect">
                                                            <input class="primary-input" type="text" id="placeholderFileOneName"
                                                                   placeholder="<?php echo e(isset($editData)? $editData->image : ''); ?>"
                                                                   readonly
                                                            >
                                                            <span class="focus-border"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-auto">
                                                        <button class="primary-btn-small-input" type="button">
                                                            <label class="primary-btn small fix-gr-bg"
                                                                   for="document_file_1"><?php echo app('translator')->get('lang.browse'); ?></label>
                                                            <input type="file" class="d-none" name="image" id="document_file_1" >
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>

                                    <div class="row mt-40">
                                        <div class="col-lg-12 text-center">
                                            <button class="primary-btn fix-gr-bg">
                                                <span class="ti-check"></span>
                                                <?php if(isset($editData)): ?>
                                                    <?php echo app('translator')->get('lang.update'); ?>
                                                <?php else: ?>
                                                    <?php echo app('translator')->get('lang.save'); ?>
                                                <?php endif; ?>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php echo e(Form::close()); ?>

                        </div>
                    </div>
                </div>

                <div class="col-lg-9">

                    <div class="row">
                        <div class="col-lg-4 no-gutters">
                            <div class="main-title">
                                <h3 class="mb-0"> <?php echo app('translator')->get('lang.news'); ?>  <?php echo app('translator')->get('lang.list'); ?></h3>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-lg-12">
                            <table id="table_id" class="display school-table" cellspacing="0" width="100%">

                                <thead>
                                <?php if(session()->has('message-success') != "" ||
                                        session()->get('message-danger') != ""): ?>
                                    <tr>
                                        <td colspan="2">
                                            <?php if(session()->has('message-success')): ?>
                                                <div class="alert alert-success">
                                                    <?php echo e(session()->get('message-success')); ?>

                                                </div>
                                            <?php elseif(session()->has('message-danger')): ?>
                                                <div class="alert alert-danger">
                                                    <?php echo e(session()->get('message-danger')); ?>

                                                </div>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                                <tr>
                                    <th><?php echo app('translator')->get('lang.title'); ?></th>
                                    <th>Category</th>
                                    <th>Image</th>
                                    <th> <?php echo app('translator')->get('lang.action'); ?></th>
                                </tr>
                                </thead>

                                <tbody>
                                <?php if(isset($newsSubCategories)): ?>
                                    <?php $__currentLoopData = $newsSubCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>

                                            <td><?php echo e($value->sub_category_name); ?></td>
                                            <td><?php echo e($value->NewsCategory->category_name); ?></td>
                                            <td><img src="<?php echo e(asset($value->image_path)); ?>\<?php echo e($value->image); ?>" height="70px" width="100px"></td>
                                            <td>
                                                <div class="dropdown">
                                                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                                                        <?php echo app('translator')->get('lang.select'); ?>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right">

                                                        <a class="dropdown-item" href="<?php echo e(url('edit-sub-category/'.$value->id)); ?>"> <?php echo app('translator')->get('lang.edit'); ?></a>

                                                        <a class="deleteUrl dropdown-item" data-modal-size="modal-md" title="Delete Item Category" href="<?php echo e(url('for-delete-sub-category/'.$value->id)); ?>"> <?php echo app('translator')->get('lang.delete'); ?></a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\SGSS\resources\views/backEnd/news/news_sub_category.blade.php ENDPATH**/ ?>