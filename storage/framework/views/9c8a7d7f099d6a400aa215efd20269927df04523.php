

<?php $__env->startPush('css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('public/')); ?>/frontend/css/new_style.css" />
<?php $__env->stopPush(); ?>
<?php $__env->startPush('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/backEnd/')); ?>/css/croppie.css">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('main_content'); ?>
<!--Section--->
<div class="container">
  <section class="sms-breadcrumb mb-20 white-box">
  <div class="container-fluid">
    <div class="row justify-content-between">
      <h1><?php echo app('translator')->get('lang.classes'); ?> <?php echo app('translator')->get('Schedule'); ?></h1>
      <div class="bc-pages" style="width: 270px">
        <form action="/schedule/view/select" method="POST">
          <?php echo e(csrf_field()); ?>

          <select class="niceSelect w-100 bb form-control" id="select_class" name="class_id" onchange="this.form.submit()">
            <option data-display="<?php echo app('translator')->get('lang.select'); ?> <?php echo app('translator')->get('lang.class'); ?> *" value=""><?php echo app('translator')->get('lang.select'); ?> <?php echo app('translator')->get('lang.class'); ?></option>
            
            <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($i->id); ?>" <?php if($id == $i->id): ?> selected <?php endif; ?>><?php echo e($i->class_name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </select>
        </form>
      </div>
    </div>
  </div>
</section>

<!--Section-->
<section class="container-fluid p-0 sms-breadcrumb mb-50 white-box" style="box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);">
  <div class="white-box mt-10 p-3">
    <div>
      <table class="w-100 text-center mb-10" style="table-layout:fixed;">
        <tr>
          <th width="12.5%" style="color: #33FF39">Time</th>
          <th width="12.5%" style="color: #FCFF33">SUN</th>
          <th width="12.5%" style="color: #336BFF">MON</th>
          <th width="12.5%" style="color: #FF8D33">TUE</th>
          <th width="12.5%" style="color: #FF4633">WED</th>
          <th width="12.5%" style="color: #FF337A">THU</th>
          <th width="12.5%" style="color: #33DDFF">FRI</th>
          <th width="12.5%" style="color: #FF33F3">SAT</th>
        </tr>
      </table>
    </div>
    <div>
      <table class="w-100 text-center" style="table-layout:fixed;">
        <?php $__currentLoopData = $table; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr style="border-top: 1px solid #828BB2;">
          <td style="overflow: hidden;" width="6.25%" class="text-center">
          <?php
            $start_note = $note->where("schedule_id", $i->id)->where("element", "start")->first();
            $start_note_id = $start_note->color_id;
            $start_note_color = $colors->find($start_note_id)->color;
            $start_note_body = $start_note->body;
          ?>

          <?php if($start_note_body != ""): ?>
          <a 
            href="" 
            data-toggle="modal" 
            data-target="#info_start_<?php echo e($loop->index); ?>"
            style="color:<?php echo e($start_note_color); ?>"
          >
            <?php echo e(date("h:i A", strtotime($i->start))); ?>

          </a>
          <?php else: ?> 
            <?php echo e(date("h:i A", strtotime($i->start))); ?>

          <?php endif; ?>
          <div class="modal fade" id="info_start_<?php echo e($loop->index); ?>">
            <div class="modal-dialog small-modal modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title"><?php echo app('translator')->get('Note'); ?></h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                  <div class="container-fluid">
                      <div class="row">
                        <div class="col">
                          <p style="color:<?php echo e($start_note_color); ?>">
                            <?php echo e($start_note_body); ?>

                          </p>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          </td>
          <td style="overflow: hidden;" width="6.25%" class="text-center">
          <?php
            $end_note = $note->where("schedule_id", $i->id)->where("element", "end")->first();
            $end_note_id = $end_note->color_id;
            $end_note_color = $colors->find($end_note_id)->color;
            $end_note_body = $end_note->body;
          ?>

          <?php if($end_note_body != ""): ?>
          <a 
            href="" 
            data-toggle="modal" 
            data-target="#info_end_<?php echo e($loop->index); ?>"
            style="color:<?php echo e($end_note_color); ?>"
          >
            <?php echo e(date("h:i A", strtotime($i->end))); ?>

          </a>
          <?php else: ?>
          <?php echo e(date("h:i A", strtotime($i->end))); ?>

          <?php endif; ?>
          <div class="modal fade" id="info_end_<?php echo e($loop->index); ?>">
            <div class="modal-dialog small-modal modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title"><?php echo app('translator')->get('Note'); ?></h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                  <div class="container-fluid">
                      <div class="row">
                        <div class="col">
                          <p style="color:<?php echo e($end_note_color); ?>">
                            <?php echo e($end_note_body); ?>

                          </p>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          </td>
          <td style="overflow: hidden;" width="12.5%" class="text-center">
            <?php
              $sun_note = $note->where("schedule_id", $i->id)->where("element", "sun")->first();
              $sun_note_id = $sun_note->color_id;
              $sun_note_color = $colors->find($sun_note_id)->color;
              $sun_note_body = $sun_note->body;
            ?>
            
            <?php if($sun_note != ""): ?>
            <a 
              href="" 
              data-toggle="modal" 
              data-target="#info_sun_<?php echo e($loop->index); ?>"
              style="color:<?php echo e($sun_note_color); ?>"
            >
              <?php echo e($i->sun); ?>

            </a>
            <?php else: ?>
            <?php echo e($i->sun); ?>

            <?php endif; ?>
            <div class="modal fade" id="info_sun_<?php echo e($loop->index); ?>">
              <div class="modal-dialog small-modal modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title"><?php echo app('translator')->get('Note'); ?></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                          <div class="col">
                            <p style="color:<?php echo e($sun_note_color); ?>">
                              <?php echo e($sun_note_body); ?>

                            </p>
                          </div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </td>
          <td style="overflow: hidden;" width="12.5%" class="text-center">
            <?php
              $mon_note = $note->where("schedule_id", $i->id)->where("element", "mon")->first();
              $mon_note_id = $mon_note->color_id;
              $mon_note_color = $colors->find($mon_note_id)->color;
              $mon_note_body = $mon_note->body;
            ?>

            <?php if($mon_note_body != ""): ?>
            <a 
              href="" 
              data-toggle="modal" 
              data-target="#info_mon_<?php echo e($loop->index); ?>"
              style="color:<?php echo e($mon_note_color); ?>"
            >
              <?php echo e($i->mon); ?>

            </a>
            <?php else: ?>
            <?php echo e($i->mon); ?>

            <?php endif; ?>
            <div class="modal fade" id="info_mon_<?php echo e($loop->index); ?>">
              <div class="modal-dialog small-modal modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title"><?php echo app('translator')->get('Note'); ?></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                          <div class="col">
                            <p style="color:<?php echo e($mon_note_color); ?>">
                              <?php echo e($mon_note_body); ?>

                            </p>
                          </div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </td>
          <td style="overflow: hidden;" width="12.5%" class="text-center">
            <?php
              $tue_note = $note->where("schedule_id", $i->id)->where("element", "tue")->first();
              $tue_note_id = $tue_note->color_id;
              $tue_note_color = $colors->find($tue_note_id)->color;
              $tue_note_body = $tue_note->body;
            ?>
            
            <?php if($tue_note_body != ""): ?>
            <a 
              href="" 
              data-toggle="modal" 
              data-target="#info_tue_<?php echo e($loop->index); ?>"
              style="color:<?php echo e($tue_note_color); ?>"
            >
              <?php echo e($i->tue); ?>

            </a>
            <?php else: ?>
            <?php echo e($i->tue); ?>

            <?php endif; ?>
            <div class="modal fade" id="info_tue_<?php echo e($loop->index); ?>">
              <div class="modal-dialog small-modal modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title"><?php echo app('translator')->get('Note'); ?></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                          <div class="col">
                            <p style="color:<?php echo e($tue_note_color); ?>">
                              <?php echo e($tue_note_body); ?>

                            </p>
                          </div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </td>
          <td style="overflow: hidden;" width="12.5%" class="text-center">
            <?php
              $wed_note = $note->where("schedule_id", $i->id)->where("element", "wed")->first();
              $wed_note_id = $wed_note->color_id;
              $wed_note_color = $colors->find($wed_note_id)->color;
              $wed_note_body = $wed_note->body;
            ?>
            
            <?php if($wed_note_body != ""): ?>
            <a 
              href="" 
              data-toggle="modal" 
              data-target="#info_wed_<?php echo e($loop->index); ?>"
              style="color:<?php echo e($wed_note_color); ?>"
            >
              <?php echo e($i->wed); ?>

            </a>
            <?php else: ?>
            <?php echo e($i->wed); ?>

            <?php endif; ?>
            <div class="modal fade" id="info_wed_<?php echo e($loop->index); ?>">
              <div class="modal-dialog small-modal modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title"><?php echo app('translator')->get('Note'); ?></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                          <div class="col">
                            <p style="color:<?php echo e($wed_note_color); ?>">
                              <?php echo e($wed_note_body); ?>

                            </p>
                          </div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </td>
          <td style="overflow: hidden;" width="12.5%" class="text-center">
            <?php
              $thu_note = $note->where("schedule_id", $i->id)->where("element", "thu")->first();
              $thu_note_id = $thu_note->color_id;
              $thu_note_color = $colors->find($thu_note_id)->color;
              $thu_note_body = $thu_note->body;
            ?>

            <?php if($thu_note_body != ""): ?>
            <a 
              href="" 
              data-toggle="modal" 
              data-target="#info_thu_<?php echo e($loop->index); ?>"
              style="color:<?php echo e($thu_note_color); ?>"
            >
              <?php echo e($i->thu); ?>

            </a>
            <?php else: ?>
            <?php echo e($i->thu); ?>

            <?php endif; ?>
            <div class="modal fade" id="info_thu_<?php echo e($loop->index); ?>">
              <div class="modal-dialog small-modal modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title"><?php echo app('translator')->get('Note'); ?></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                          <div class="col">
                            <p style="color:<?php echo e($thu_note_color); ?>">
                              <?php echo e($thu_note_body); ?>

                            </p>
                          </div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </td>
          <td style="overflow: hidden;" width="12.5%" class="text-center">
            <?php
              $fri_note = $note->where("schedule_id", $i->id)->where("element", "fri")->first();
              $fri_note_id = $fri_note->color_id;
              $fri_note_color = $colors->find($fri_note_id)->color;
              $fri_note_body = $fri_note->body;
            ?>
            
            <?php if($fri_note_body != ""): ?>
            <a 
              href="" 
              data-toggle="modal" 
              data-target="#info_fri_<?php echo e($loop->index); ?>"
              style="color:<?php echo e($fri_note_color); ?>"
            >
              <?php echo e($i->fri); ?>

            </a>
            <?php else: ?>
            <?php echo e($i->fri); ?>

            <?php endif; ?>
            <div class="modal fade" id="info_fri_<?php echo e($loop->index); ?>">
              <div class="modal-dialog small-modal modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title"><?php echo app('translator')->get('Note'); ?></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                          <div class="col">
                            <p style="color:<?php echo e($fri_note_color); ?>">
                               <?php echo e($fri_note_body); ?>

                            </p>
                          </div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </td>
          <td style="overflow: hidden;" width="12.5%" class="text-center">
            <?php
              $sat_note = $note->where("schedule_id", $i->id)->where("element", "sat")->first();
              $sat_note_id = $sat_note->color_id;
              $sat_note_color = $colors->find($sat_note_id)->color;
              $sat_note_body = $sat_note->body;
            ?>
            <?php if($sat_note_body != ""): ?>
            <a 
              href="" 
              data-toggle="modal" 
              data-target="#info_sat_<?php echo e($loop->index); ?>"
              style="color:<?php echo e($sat_note_color); ?>"
            >
              <?php echo e($i->sat); ?>

            </a>
            <?php else: ?>
            <?php echo e($i->sat); ?>

            <?php endif; ?>
            <div class="modal fade" id="info_sat_<?php echo e($loop->index); ?>">
              <div class="modal-dialog small-modal modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title"><?php echo app('translator')->get('Note'); ?></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                          <div class="col">
                            <p style="color:<?php echo e($sat_note_color); ?>">
                              <?php echo e($sat_note_body); ?>

                            </p>
                          </div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </table>
    </div>
  </div>
</section>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontEnd.home.layout.front_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\PC\Desktop\sgss\t\sgss\Modules/Schedule\Resources/views/view-index.blade.php ENDPATH**/ ?>