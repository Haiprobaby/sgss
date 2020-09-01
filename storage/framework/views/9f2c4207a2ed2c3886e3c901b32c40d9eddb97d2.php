<?php $__env->startSection('mainContent'); ?>
    <?php
        function showPicName($data){
            $name = explode('/', $data);
            return $name[3];
        }
    ?>
    <section class="sms-breadcrumb mb-40 white-box up_breadcrumb">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('lang.manage'); ?> <?php echo app('translator')->get('lang.complaint'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(url('dashboard')); ?>"><?php echo app('translator')->get('lang.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('lang.admin_section'); ?></a>
                    <a href="#"><?php echo app('translator')->get('lang.complaint'); ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area up_admin_visitor">
        <div class="container-fluid p-0">
            <?php if(isset($complaint)): ?>
                <div class="row">
                    <div class="offset-lg-10 col-lg-2 text-right col-md-12 mb-20">
                        <a href="<?php echo e(url('complaint')); ?>" class="primary-btn small fix-gr-bg">
                            <span class="ti-plus pr-2"></span>
                            <?php echo app('translator')->get('lang.add'); ?>
                        </a>
                    </div>
                </div>
            <?php endif; ?>
            
                
                    <div class="row">
                        <div class="col-lg-4 no-gutters">
                            <div class="main-title">
                                <h3 class="mb-0"><?php echo app('translator')->get('lang.complaint'); ?> <?php echo app('translator')->get('lang.list'); ?></h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">

                            <table id="table_id" class="display school-table" cellspacing="0" width="100%">

                                <thead>
                                <?php if(session()->has('message-success-delete') != "" ||
                                session()->get('message-danger-delete') != ""): ?>
                                    <tr>
                                        <td colspan="6">
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
                                    <th><?php echo app('translator')->get('lang.complaint'); ?> <?php echo app('translator')->get('lang.by'); ?></th>
                                    <th><?php echo app('translator')->get('lang.complaint'); ?> <?php echo app('translator')->get('lang.type'); ?></th>
                                    <th><?php echo app('translator')->get('lang.email'); ?></th>
                                    <th><?php echo app('translator')->get('lang.description'); ?></th>
                                    <th><?php echo app('translator')->get('lang.phone'); ?></th>
                                    <th><?php echo app('translator')->get('lang.date'); ?></th>
                                    <th><?php echo app('translator')->get('lang.status'); ?></th>
                                    <th><?php echo app('translator')->get('lang.actions'); ?></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = @$complaints; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $complaint): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr <?php if($complaint->read==0): ?>style="background-color: #F9E9E5;"<?php endif; ?>>
                                        <td><?php echo e(@$complaint->complaint_by); ?></td>
                                        <td><?php echo e(isset($complaint->complaint_type)? @$complaint->complaint_type:''); ?></td>
                                        <td><?php echo e(isset($complaint->email)? @$complaint->email:''); ?></td>
                                        <td><?php echo e(isset($complaint->description)? @$complaint->description:''); ?></td>
                                        <td><?php echo e($complaint->phone); ?></td>

                                        <td data-sort="<?php echo e(strtotime(@$complaint->date)); ?>"><?php echo e(!empty(@$complaint->date)? App\SmGeneralSettings::DateConvater(@$complaint->date):''); ?>

                                         </td>
                                         <td><?php if($complaint->read==1): ?> Read <?php else: ?> Unread <?php endif; ?>   </td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn dropdown-toggle"
                                                        data-toggle="dropdown">
                                                    <?php echo app('translator')->get('lang.select'); ?>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <?php if(in_array(26, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>

                                                    <a id="<?php echo e($complaint->id); ?>" class="dropdown-item modalLink" title="Complaint Details"
                                                       data-modal-size="large-modal"
                                                       href="<?php echo e(url('complaint', [@$complaint->id])); ?>" onclick="markasread(<?php echo e($complaint->id); ?>)"><?php echo app('translator')->get('lang.view'); ?></a>
                                                    <?php endif; ?>
                                                    
                                                   <?php if(in_array(24, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>

                                                       <a class="dropdown-item" data-toggle="modal"
                                                       data-target="#deleteComplaintModal<?php echo e($complaint->id); ?>"
                                                       href="#"><?php echo app('translator')->get('lang.delete'); ?></a>
                                                    <?php endif; ?>
                                                       <?php if(@$complaint->file != ""): ?>
                                                     <?php if(in_array(25, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                                                   <?php if(@file_exists($complaint->file)): ?>
                                                        <a class="dropdown-item"
                                                            href="<?php echo e(url('download-complaint-document/'.showPicName(@$complaint->file))); ?>">
                                                                <?php echo app('translator')->get('lang.download'); ?> <span class="pl ti-download"></span>
                                                        </a>
                                                    <?php endif; ?>    
                                                    <?php endif; ?>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <div class="modal fade admin-query" id="deleteComplaintModal<?php echo e(@$complaint->id); ?>">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title"><?php echo app('translator')->get('lang.delete'); ?> <?php echo app('translator')->get('lang.complaint'); ?></h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="text-center">
                                                        <h4><?php echo app('translator')->get('lang.are_you_sure_to_delete'); ?></h4>
                                                    </div>
                                                    <div class="mt-40 d-flex justify-content-between">
                                                        <button type="button" class="primary-btn tr-bg"
                                                                data-dismiss="modal"><?php echo app('translator')->get('lang.cancel'); ?>
                                                        </button>
                                                        <?php echo e(Form::open(['url' => 'complaint/'.$complaint->id, 'method' => 'DELETE', 'enctype' => 'multipart/form-data'])); ?>

                                                        <button class="primary-btn fix-gr-bg" type="submit"><?php echo app('translator')->get('lang.delete'); ?>
                                                        </button>
                                                        <?php echo e(Form::close()); ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script type="text/javascript">
        function markasread(id)
            {
                $('#'+id).closest('tr').css('background-color','white');
                $('#'+id).closest('tr').find("td:eq(6)").text('Read');
                
            }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/x/sgss/resources/views/backEnd/admin/complaint.blade.php ENDPATH**/ ?>