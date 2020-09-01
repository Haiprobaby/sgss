<!--ASSET-->
<?php $__env->startSection('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/backEnd/css')); ?>/lightbox.css">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('public/backEnd/js/')); ?>/lightbox-plus-jquery.js"></script>
<?php $__env->stopSection(); ?>

<!--MAIN CONTENT-->
<?php $__env->startSection('mainContent'); ?>

<!--Section--->
<section class="sms-breadcrumb mb-20 white-box">
  <div class="container-fluid">
    <div class="row justify-content-between">
      <h1><?php echo app('translator')->get('lang.classes'); ?> <?php echo app('translator')->get('Schedule'); ?></h1>
      <div class="bc-pages" style="width: 270px">
        <form action="/schedule/select" method="POST">
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
<section class="container-fluid p-0">
  <div class="row">
    <div class="col text-left mr-20">
      <?php if(count($table) > 0): ?>
      <button class="primary-btn-small-input primary-btn small tr-bg" type="button" data-toggle="modal" data-target="#addNoteSchedule">
        <span class="ti-plus pr-2"></span>
        <?php echo app('translator')->get('lang.note'); ?>
      </button>
      <?php endif; ?> 
    </div>
    <div class="col text-right mr-20">
      <button class="primary-btn-small-input primary-btn small fix-gr-bg" type="button" data-toggle="modal" data-target="#addSchedule">
        <span class="ti-plus pr-2"></span>
        <?php echo app('translator')->get('lang.add'); ?>
      </button>
    </div>
  </div>
  <!--Modal note schedule-->
  <div class="modal fade" id="addNoteSchedule">
    <div class="modal-dialog small-modal modal-dialog-centered">
      <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title"><?php echo app('translator')->get('Note Schedule'); ?></h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <div class="container-fluid">
              <form action="/schedule/note_add" method="post">
                <?php echo e(csrf_field()); ?>

                <div class="row">
                  <div class="col">
                    <select class="niceSelect w-100 bb form-control" id="select_class" name="schedule_id">
                      <option data-display="<?php echo app('translator')->get('lang.select'); ?> <?php echo app('translator')->get('Row'); ?> *" value=""><?php echo app('translator')->get('lang.select'); ?> <?php echo app('translator')->get('lang.field'); ?></option>
                      
                      <?php $__currentLoopData = $table; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($i->id); ?>"><?php echo e(date("h:i A", strtotime($i->start))); ?> - <?php echo e(date("h:i A", strtotime($i->end))); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                  </div>
                  <div class="col">
                    <select class="niceSelect w-100 bb form-control" id="select_class" name="element">
                      <option data-display="<?php echo app('translator')->get('lang.select'); ?> <?php echo app('translator')->get('Field'); ?> *" value=""><?php echo app('translator')->get('lang.select'); ?> <?php echo app('translator')->get('lang.field'); ?></option>
                      
                      <option value="id">No</option>
                      <option value="start">Start</option>
                      <option value="end">End</option>
                      <option value="mon">Monday</option>
                      <option value="tue">Tuesday</option>
                      <option value="wed">Wednesday</option>
                      <option value="thu">Thursday</option>
                      <option value="fri">Friday</option>
                      <option value="sat">Saturday</option>
                      <option value="sun">Sunday</option>
                    </select>
                  </div>
                </div>
                <div class="row mt-35">
                  <div class="col">
                    <div class="input-effect">
                      <textarea class="primary-input" name="note" rows="3"></textarea>
                      <label>Note</label>
                      <span class="focus-border"></span>
                    </div>
                  </div>
                </div>
                <div class="col-lg-12 text-center mt-40">
                  <div class="mt-40 d-flex justify-content-center">
                    <button class="primary-btn fix-gr-bg" id="save_button_query" type="submit"><?php echo app('translator')->get('lang.save'); ?></button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

  <!--Modal Add schedule-->
  <div class="modal fade" id="addSchedule">
    <div class="modal-dialog large-modal modal-dialog-centered">
      <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title"><?php echo app('translator')->get('Add Schedule'); ?></h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <div class="container-fluid">
              <form action="" method="post">
                <?php echo e(csrf_field()); ?>

                <div class="row justify-content-center">
                  <div class="col-3">
                    <div class="row no-gutters input-right-icon mt-25">
                      <div class="col">
                        <div class="input-effect">
                          <input class="primary-input time form-control has-content" type="text" name="in_time" value="" required="">
                          <label>Start *</label>
                          <span class="focus-border"></span>
                        </div>
                      </div>
                      <div class="col-auto">
                        <button class="" type="button">
                          <i class="ti-timer"></i>
                        </button>
                      </div>
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="row no-gutters input-right-icon mt-25">
                      <div class="col">
                        <div class="input-effect">
                          <input class="primary-input time form-control has-content" type="text" name="out_time" value="" required="">
                          <label>End *</label>
                          <span class="focus-border"></span>
                        </div>
                      </div>
                      <div class="col-auto">
                        <button class="" type="button">
                          <i class="ti-timer"></i>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row mt-35 justify-content-center">
                  <div class="col-lg-2">
                    <div class="input-effect">
                      <textarea class="primary-input" name="mon" rows="2"></textarea>
                      <label>Monday</label>
                      <span class="focus-border"></span>
                    </div>
                  </div>
                  <div class="col-lg-2">
                    <div class="input-effect">
                      <textarea class="primary-input" name="tue" rows="2"></textarea>
                      <label>Tuesday</label>
                      <span class="focus-border"></span>
                    </div>
                  </div>
                  <div class="col-lg-2">
                    <div class="input-effect">
                      <textarea class="primary-input" name="wed" rows="2"></textarea>
                      <label>Wednesday</label>
                      <span class="focus-border"></span>
                    </div>
                  </div>
                  <div class="col-lg-2">
                    <div class="input-effect">
                      <textarea class="primary-input" name="thu" rows="2"></textarea>
                      <label>Thursday</label>
                      <span class="focus-border"></span>
                    </div>
                  </div>
                  <div class="col-lg-2">
                    <div class="input-effect">
                      <textarea class="primary-input" name="fri" rows="2"></textarea>
                      <label>Friday</label>
                      <span class="focus-border"></span>
                    </div>
                  </div>
                </div>
                <div class="row justify-content-center mt-35">
                  <div class="col-lg-2">
                    <div class="input-effect">
                      <textarea class="primary-input" name="sat" rows="2"></textarea>
                      <label>Saturday</label>
                      <span class="focus-border"></span>
                    </div>
                  </div>
                  <div class="col-lg-2">
                    <div class="input-effect">
                      <textarea class="primary-input" name="sun" rows="2"></textarea>
                      <label>Sunsay</label>
                      <span class="focus-border"></span>
                    </div>
                  </div>
                </div>
                <div class="col-lg-12 text-center mt-40">
                  <div class="mt-40 d-flex justify-content-between">
                    <button type="button" class="primary-btn tr-bg" data-dismiss="modal"><?php echo app('translator')->get('lang.cancel'); ?></button>
                    <button class="primary-btn fix-gr-bg" id="save_button_query" type="submit"><?php echo app('translator')->get('lang.save'); ?></button>
                  </div>
                </div>
              </form>
            </div>
          </div>
      </div>
    </div>
</div>

  <div class="white-box mt-10 p-3">
    <div>
      <table class="w-100 text-center mb-10" style="table-layout:fixed;">
        <tr>
          <th width="4%">No</th>
          <th width="8%">Start</th>
          <th width="8%">End</th>
          <th width="12%">SUN</th>
          <th width="12%">MON</th>
          <th width="12%">TUE</th>
          <th width="12%">WED</th>
          <th width="12%">THU</th>
          <th width="12%">FRI</th>
          <th width="12%">SAT</th>
        </tr>
      </table>
    </div>
    <div>
      <table class="w-100 text-center" style="table-layout:fixed;">
        <?php $__currentLoopData = $table; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr style="border-top: 1px solid #828BB2;">
          <td style="overflow: hidden;" width="4%">
          <?php
            $id_note = $note->where("schedule_id", $i->id)->where("element", "id")->first();
            $id_note_id = $id_note->color_id;
            $id_note_color = $colors->find($id_note_id)->color;
            $id_note_body = $id_note->body;
          ?>

          <?php if($id_note_body != ""): ?>
          <a 
            href="" 
            data-toggle="modal" 
            data-target="#info_no_<?php echo e($loop->index); ?>"
          >
            <div style="color:<?php echo e($id_note_color); ?>">
              <?php echo e($loop->index + 1); ?>

            </div>
          </a>
          <?php else: ?> 
          <?php echo e($loop->index + 1); ?>

          <?php endif; ?>
          <div class="modal fade" id="info_no_<?php echo e($loop->index); ?>">
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
                        <p style="color:<?php echo e($id_note_color); ?>"><?php echo e($id_note_body); ?></p>
                      </div>
                    </div>
                    <hr>
                    <div class="row justify-content-between">
                      <div class="col-6">
                        <form action="/schedule/select_color" method="POST">
                          <?php echo e(csrf_field()); ?>

                          <input type="hidden" name="id" value="<?php echo e($id_note->id); ?>">
                          <select class="niceSelect w-100 bb form-control" name="color" onchange="this.form.submit()">
                            <option data-display="<?php echo app('translator')->get('lang.select'); ?> <?php echo app('translator')->get('lang.color'); ?> *" value=""></option>
                            <?php $__currentLoopData = $colors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option 
                              value="<?php echo e($c->id); ?>"
                              <?php if($c->id == $id_note_id): ?>
                                selected
                              <?php endif; ?>
                            >
                              <?php echo e($c->color); ?>

                            </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </select>
                         </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          </td>
          <td style="overflow: hidden;" width="8%">
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
                    <hr>
                    <div class="row justify-content-between">
                      <div class="col-6">
                        <form action="/schedule/select_color" method="POST">
                          <?php echo e(csrf_field()); ?>

                          <input type="hidden" name="id" value="<?php echo e($start_note->id); ?>">
                          <select class="niceSelect w-100 bb form-control" name="color" onchange="this.form.submit()">
                            <option data-display="<?php echo app('translator')->get('lang.select'); ?> <?php echo app('translator')->get('lang.color'); ?> *" value=""></option>
                            <?php $__currentLoopData = $colors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option 
                              value="<?php echo e($c->id); ?>"
                              <?php if($c->id == $start_note_id): ?>
                                selected
                              <?php endif; ?>
                            >
                              <?php echo e($c->color); ?>

                            </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </select>
                         </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          </td>
          <td style="overflow: hidden;" width="8%">
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
          >
            <div style="color:<?php echo e($end_note_color); ?>">
              <?php echo e(date("h:i A", strtotime($i->end))); ?>

            </div>
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
                    <hr>
                    <div class="row justify-content-between">
                      <div class="col-6">
                        <form action="/schedule/select_color" method="POST">
                          <?php echo e(csrf_field()); ?>

                          <input type="hidden" name="id" value="<?php echo e($end_note->id); ?>">
                          <select class="niceSelect w-100 bb form-control" name="color" onchange="this.form.submit()">
                            <option data-display="<?php echo app('translator')->get('lang.select'); ?> <?php echo app('translator')->get('lang.color'); ?> *" value=""></option>
                            <?php $__currentLoopData = $colors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option 
                              value="<?php echo e($c->id); ?>"
                              <?php if($c->id == $end_note_id): ?>
                                selected
                              <?php endif; ?>
                            >
                              <?php echo e($c->color); ?>

                            </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </select>
                         </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          </td>
          <td style="overflow: hidden;" width="12%">
            <?php
              $sun_note = $note->where("schedule_id", $i->id)->where("element", "sun")->first();
              $sun_note_id = $sun_note->color_id;
              $sun_note_color = $colors->find($sun_note_id)->color;
              $sun_note_body = $sun_note->body;
            ?>

            <?php if($sun_note_body != ""): ?>
            <a 
              href="" 
              data-toggle="modal" 
              data-target="#info_sun_<?php echo e($loop->index); ?>"
            >
              <div style="color:<?php echo e($sun_note_color); ?>">
                <?php echo e($i->sun); ?>

              </div>
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
                      <hr>
                      <div class="row justify-content-between">
                        <div class="col-6">
                          <form action="/schedule/select_color" method="POST">
                            <?php echo e(csrf_field()); ?>

                            <input type="hidden" name="id" value="<?php echo e($sun_note->id); ?>">
                            <select class="niceSelect w-100 bb form-control" name="color" onchange="this.form.submit()">
                              <option data-display="<?php echo app('translator')->get('lang.select'); ?> <?php echo app('translator')->get('lang.color'); ?> *" value=""></option>
                              <?php $__currentLoopData = $colors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <option 
                                value="<?php echo e($c->id); ?>"
                                <?php if($c->id == $sun_note_id): ?>
                                  selected
                                <?php endif; ?>
                              >
                                <?php echo e($c->color); ?>

                              </option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                           </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </td>
          <td style="overflow: hidden;" width="12%">
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
                          <p style="color:<?php echo e($mon_note_color); ?>"><?php echo e($mon_note_body); ?></p>
                        </div>
                      </div>
                      <hr>
                      <div class="row justify-content-between">
                        <div class="col-6">
                          <form action="/schedule/select_color" method="POST">
                            <?php echo e(csrf_field()); ?>

                            <input type="hidden" name="id" value="<?php echo e($mon_note->id); ?>">
                            <select class="niceSelect w-100 bb form-control" name="color" onchange="this.form.submit()">
                              <option data-display="<?php echo app('translator')->get('lang.select'); ?> <?php echo app('translator')->get('lang.color'); ?> *" value=""></option>
                              <?php $__currentLoopData = $colors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <option 
                                value="<?php echo e($c->id); ?>"
                                <?php if($c->id == $mon_note_id): ?>
                                  selected
                                <?php endif; ?>
                              >
                                <?php echo e($c->color); ?>

                              </option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                           </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </td>
          <td style="overflow: hidden;" width="12%">
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
                            <?php echo e($tue_note_body); ?></p>
                        </div>
                      </div>
                      <hr>
                      <div class="row justify-content-between">
                        <div class="col-6">
                          <form action="/schedule/select_color" method="POST">
                            <?php echo e(csrf_field()); ?>

                            <input type="hidden" name="id" value="<?php echo e($tue_note->id); ?>">
                            <select class="niceSelect w-100 bb form-control" name="color" onchange="this.form.submit()">
                              <option data-display="<?php echo app('translator')->get('lang.select'); ?> <?php echo app('translator')->get('lang.color'); ?> *" value=""></option>
                              <?php $__currentLoopData = $colors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <option 
                                value="<?php echo e($c->id); ?>"
                                <?php if($c->id == $tue_note_id): ?>
                                  selected
                                <?php endif; ?>
                              >
                                <?php echo e($c->color); ?>

                              </option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                           </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </td>
          <td style="overflow: hidden;" width="12%">
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
                      <hr>
                      <div class="row justify-content-between">
                        <div class="col-6">
                          <form action="/schedule/select_color" method="POST">
                            <?php echo e(csrf_field()); ?>

                            <input type="hidden" name="id" value="<?php echo e($wed_note->id); ?>">
                            <select class="niceSelect w-100 bb form-control" name="color" onchange="this.form.submit()">
                              <option data-display="<?php echo app('translator')->get('lang.select'); ?> <?php echo app('translator')->get('lang.color'); ?> *" value=""></option>
                              <?php $__currentLoopData = $colors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <option 
                                value="<?php echo e($c->id); ?>"
                                <?php if($c->id == $wed_note_id): ?>
                                  selected
                                <?php endif; ?>
                              >
                                <?php echo e($c->color); ?>

                              </option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                           </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </td>
          <td style="overflow: hidden;" width="12%">
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
                      <hr>
                      <div class="row justify-content-between">
                        <div class="col-6">
                          <form action="/schedule/select_color" method="POST">
                            <?php echo e(csrf_field()); ?>

                            <input type="hidden" name="id" value="<?php echo e($thu_note->id); ?>">
                            <select class="niceSelect w-100 bb form-control" name="color" onchange="this.form.submit()">
                              <option data-display="<?php echo app('translator')->get('lang.select'); ?> <?php echo app('translator')->get('lang.color'); ?> *" value=""></option>
                              <?php $__currentLoopData = $colors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <option 
                                value="<?php echo e($c->id); ?>"
                                <?php if($c->id == $thu_note_id): ?>
                                  selected
                                <?php endif; ?>
                              >
                                <?php echo e($c->color); ?>

                              </option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                           </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </td>
          <td style="overflow: hidden;" width="12%">
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
                      <hr>
                      <div class="row justify-content-between">
                        <div class="col-6">
                          <form action="/schedule/select_color" method="POST">
                            <?php echo e(csrf_field()); ?>

                            <input type="hidden" name="id" value="<?php echo e($fri_note->id); ?>">
                            <select class="niceSelect w-100 bb form-control" name="color" onchange="this.form.submit()">
                              <option data-display="<?php echo app('translator')->get('lang.select'); ?> <?php echo app('translator')->get('lang.color'); ?> *" value=""></option>
                              <?php $__currentLoopData = $colors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <option 
                                value="<?php echo e($c->id); ?>"
                                <?php if($c->id == $fri_note_id): ?>
                                  selected
                                <?php endif; ?>
                              >
                                <?php echo e($c->color); ?>

                              </option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                           </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </td>
          <td style="overflow: hidden;" width="12%">
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
                      <hr>
                      <div class="row justify-content-between">
                        <div class="col-6">
                          <form action="/schedule/select_color" method="POST">
                            <?php echo e(csrf_field()); ?>

                            <input type="hidden" name="id" value="<?php echo e($sat_note->id); ?>">
                            <select class="niceSelect w-100 bb form-control" name="color" onchange="this.form.submit()">
                              <option data-display="<?php echo app('translator')->get('lang.select'); ?> <?php echo app('translator')->get('lang.color'); ?> *" value=""></option>
                              <?php $__currentLoopData = $colors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <option 
                                value="<?php echo e($c->id); ?>"
                                <?php if($c->id == $sat_note_id): ?>
                                  selected
                                <?php endif; ?>
                              >
                                <?php echo e($c->color); ?>

                              </option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                           </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </td>
        </tr>
        <tr>
          <td colspan="8"></td>
          <td>
            <div class="col-lg-2 mr-20 text-right">
              <button class="primary-btn-small-input primary-btn small mb-10 mt-10" type="button" data-toggle="modal" data-target="#updateSchedule<?php echo e($loop->index); ?>">
                <?php echo app('translator')->get('lang.update'); ?>
              </button>
            </div>
          </td>
          <td>
            <div class="col-lg-2 mr-20 text-right">
              <button class="primary-btn-small-input primary-btn small mb-10 mt-10" type="button" data-toggle="modal" data-target="#deleteSchedule<?php echo e($loop->index); ?>">
                <?php echo app('translator')->get('lang.delete'); ?>
              </button>
            </div>
          </td>
        </tr>
        <!--update schedule-->
        <div class="modal fade" id="updateSchedule<?php echo e($loop->index); ?>">
          <div class="modal-dialog large-modal modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title"><?php echo app('translator')->get('Update Staff Schedule'); ?></h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                  <div class="container-fluid">
                    <form action="/schedule/update/<?php echo e($i->id); ?>" method="post">
                      <?php echo e(csrf_field()); ?>

                      <div class="row justify-content-center">
                        <div class="col-3">
                          <div class="row no-gutters input-right-icon mt-25">
                            <div class="col">
                              <div class="input-effect">
                                <input class="primary-input time form-control has-content" type="text" name="in_time" value="<?php echo e($i->start); ?>" required="">
                                <label>Start *</label>
                                <span class="focus-border"></span>
                              </div>
                            </div>
                            <div class="col-auto">
                              <button class="" type="button">
                                <i class="ti-timer"></i>
                              </button>
                            </div>
                          </div>
                        </div>
                        <div class="col-3">
                          <div class="row no-gutters input-right-icon mt-25">
                            <div class="col">
                              <div class="input-effect">
                                <input class="primary-input time form-control has-content" type="text" name="out_time" value="<?php echo e($i->end); ?>" required="">
                                <label>End *</label>
                                <span class="focus-border"></span>
                              </div>
                            </div>
                            <div class="col-auto">
                              <button class="" type="button">
                                <i class="ti-timer"></i>
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row mt-35 justify-content-center">
                        <div class="col-lg-2">
                          <div class="input-effect">
                            <textarea class="primary-input" name="mon" rows="2"><?php echo e($i->mon); ?></textarea>
                            <label>Monday</label>
                            <span class="focus-border"></span>
                          </div>
                        </div>
                        <div class="col-lg-2">
                          <div class="input-effect">
                            <textarea class="primary-input" name="tue" rows="2"><?php echo e($i->tue); ?></textarea>
                            <label>Tuesday</label>
                            <span class="focus-border"></span>
                          </div>
                        </div>
                        <div class="col-lg-2">
                          <div class="input-effect">
                            <textarea class="primary-input" name="wed" rows="2"><?php echo e($i->wed); ?></textarea>
                            <label>Wednesday</label>
                            <span class="focus-border"></span>
                          </div>
                        </div>
                        <div class="col-lg-2">
                          <div class="input-effect">
                            <textarea class="primary-input" name="thu" rows="2"><?php echo e($i->thu); ?></textarea>
                            <label>Thursday</label>
                            <span class="focus-border"></span>
                          </div>
                        </div>
                        <div class="col-lg-2">
                          <div class="input-effect">
                            <textarea class="primary-input" name="fri" rows="2"><?php echo e($i->fri); ?></textarea>
                            <label>Friday</label>
                            <span class="focus-border"></span>
                          </div>
                        </div>
                      </div>
                      <div class="row justify-content-center mt-35">
                        <div class="col-lg-2">
                          <div class="input-effect">
                            <textarea class="primary-input" name="sat" rows="2"><?php echo e($i->sat); ?></textarea>
                            <label>Saturday</label>
                            <span class="focus-border"></span>
                          </div>
                        </div>
                        <div class="col-lg-2">
                          <div class="input-effect">
                            <textarea class="primary-input" name="sun" rows="2"><?php echo e($i->sun); ?></textarea>
                            <label>Sunday</label>
                            <span class="focus-border"></span>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-12 text-center mt-40">
                        <div class="mt-40 d-flex justify-content-center">
                          <button class="primary-btn fix-gr-bg" id="save_button_query" type="submit"><?php echo app('translator')->get('lang.save'); ?></button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
            </div>
          </div>
        </div>
        <!--delete schedule-->
        <div class="modal fade" id="deleteSchedule<?php echo e($loop->index); ?>">
          <div class="modal-dialog small-modal modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title"><?php echo app('translator')->get('Delete Staff Schedule'); ?> <?php echo e($loop->index + 1); ?></h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                  <div class="container-fluid">
                    <form action="/schedule/delete/<?php echo e($i->id); ?>" method="post">
                      <?php echo e(csrf_field()); ?>

                      <div class="row justify-content-center">
                        <div class="col text-center">
                          <h5>Are you sure?</h5>
                        </div>
                      </div>
                      <div class="col-lg-12 text-center mt-40">
                        <div class="mt-40 d-flex justify-content-between">
                          <button type="button" class="primary-btn tr-bg" data-dismiss="modal"><?php echo app('translator')->get('lang.cancel'); ?></button>
                          <button class="primary-btn fix-gr-bg" id="save_button_query" type="submit"><?php echo app('translator')->get('lang.save'); ?></button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
            </div>
          </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </table>
    </div>
  </div>
</section>
<?php $__env->stopSection(); ?>
<!--END MAIN CONTENT-->
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/x/sgss/Modules/Schedule/Resources/views/index.blade.php ENDPATH**/ ?>