<?php $__env->startSection('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/backEnd/css')); ?>/lightbox.css">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('public/backEnd/js/')); ?>/lightbox-plus-jquery.js"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
<section class="sms-breadcrumb mb-40 white-box">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('lang.home'); ?> <?php echo app('translator')->get('lang.settings'); ?><?php echo app('translator')->get('lang.page'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(url('dashboard')); ?>"><?php echo app('translator')->get('lang.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('lang.front'); ?> <?php echo app('translator')->get('lang.settings'); ?></a>
                <a href="#"><?php echo app('translator')->get('lang.home'); ?> <?php echo app('translator')->get('lang.page'); ?></a>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container-fluid p-0">
        <div class="row mb-40">
            <div class="col-lg-12">
                <div class="row mb-30">
                    <div class="col-lg-8">
                        <div class="main-title">
                            <h3>Categories Imgages</h3>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <?php if(count($errors) > 0): ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo e($errors->first()); ?>

                        </div>
                        <?php endif; ?>

                        <?php if($msg = Session::get("success")): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e($msg); ?>

                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 pr-0">
                        <div class="white-box">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form method="POST" action="" enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?>
                                        <div class="form-group row">
                                            <div class="col-lg-8">
                                                <div class="input-effect">
                                                    <input class="primary-input form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text" name="title" autocomplete="off" value="<?php echo e(old('title')); ?>">
                                                    <label><?php echo app('translator')->get('lang.title'); ?></label>
                                                    <span class="focus-border"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 text-center pl-0">
                                                <button type="submit" class="primary-btn small fix-gr-bg">
                                                    <?php echo app('translator')->get('lang.upload'); ?>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-12">
                                                <input id="images" type="file" name="imgs[]" multiple accept='image/*'>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="white-box">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-8">
                                            <h4>Albums</h4>
                                        </div>
                                        <div class="col-4 text-right">
                                            <h4><strong><?php echo e(count($album)); ?></strong></h4>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 text-center">
                                    <?php if(count($album) > 0): ?>
                                    <div class="row">
                                        <?php $__currentLoopData = $album; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-md-4 pr-0 mb-10">
                                            <div class="">
                                                <div class="text-center" style="text-transform: uppercase">
                                                    <strong><?php echo e($i['album']['title']); ?></strong>
                                                </div>
                                                <div class="card-body">
                                                    <?php $__currentLoopData = $i["gallery"]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <a href="public/uploads/category/<?php echo e($img['path']); ?>" data-lightbox="<?php echo e($i['album']['id']); ?>">
                                                        <?php if($loop->index == 0): ?>
                                                        <img src="public/uploads/category/<?php echo e($img['path']); ?>" alt="<?php echo e($img['created_at']); ?>" width="100%" height="100" style="border-radius: 10px; object-fit: cover">
                                                        <?php endif; ?>
                                                    </a>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="row">
                                                        <div class="col">
                                                            <?php echo e(Form::open(['method' => 'POST', 'url' => 'admin-category/display', 'enctype' => 'multipart/form-data'])); ?>

                                                            <input type="hidden" name="display_album" value="<?php echo e($i['album']['id']); ?>">
                                                            <button type="submit" class="primary-btn fix-gr-bg small mt-10">
                                                                <?php if($display_album): ?>
                                                                <?php if($display_album->album_id == $i['album']['id']): ?>
                                                                <span class="ti-check"></span>
                                                                <?php endif; ?>
                                                                <?php endif; ?>
                                                                Display
                                                            </button>
                                                            <?php echo e(Form::close()); ?>

                                                            </a>
                                                        </div>
                                                        <div class="col">
                                                            <a data-toggle="modal" data-target="#deleteGallery<?php echo e($i['album']['id']); ?>" href="#">
                                                                <button type="submit" class="primary-btn small mt-10">
                                                                    Delete
                                                                </button>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade admin-query" id="deleteGallery<?php echo e($i['album']['id']); ?>">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h6 class="modal-title">Delete Album</h6>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>

                                                    <div class="modal-body">
                                                        <div class="text-center">
                                                            <h4><?php echo app('translator')->get('lang.are_you_sure_to_delete'); ?></h4>
                                                            <img src="public/uploads/category/<?php echo e($img['path']); ?>" alt="<?php echo e($img['created_at']); ?>" width="200" height="100" style="border-radius: 10px; object-fit: cover">
                                                        </div>

                                                        <div class="mt-40 d-flex justify-content-between">
                                                            <button type="button" class="primary-btn tr-bg" data-dismiss="modal"><?php echo app('translator')->get('lang.cancel'); ?></button>
                                                            <?php echo e(Form::open(['method' => 'DELETE', 'enctype' => 'multipart/form-data'])); ?>

                                                            <input type="hidden" name="album_id" value="<?php echo e($i['album']['id']); ?>">
                                                            <button class="primary-btn fix-gr-bg" type="submit"><?php echo app('translator')->get('lang.delete'); ?></button>
                                                            <?php echo e(Form::close()); ?>

                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                    <?php else: ?>
                                    <p>Empty</p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/x/sgss/resources/views/backEnd/category/admin-category.blade.php ENDPATH**/ ?>