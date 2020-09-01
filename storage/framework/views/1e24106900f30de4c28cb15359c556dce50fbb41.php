  <div class="modal fade" id="booktour" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Book a Tour</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" action="/book-tour" accept-charset="UTF-8" class="form-horizontal">
            <?php echo csrf_field(); ?>
                 
              <div class="add-visitor">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="input-effect">
                                                                <input class="primary-input form-control" type="text" name="purpose" autocomplete="off" value="" required="">

                                                                <input type="hidden" name="id" value="">
                                                                <label>Purpose<span>*</span></label>
                                                                <span class="focus-border"></span>
                                                            </div>


                                                        </div>
                                                    </div>
                                                    <div class="row mt-35">
                                                        <div class="col-lg-12">
                                                            <div class="input-effect">
                                                                <input class="primary-input form-control" type="text" name="name" autocomplete="off" value="" required="">
                                                                <label>Name<span>*</span></label>
                                                                <span class="focus-border"></span>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    

                                                    

                                                    <div class="row mt-35">
                                                        <div class="col-lg-12">
                                                            <div class="input-effect">
                                                                <input class="primary-input form-control" type="text" onkeypress="return isNumberKey(event)" name="no_of_person" value="" required="">
                                                                <label>No. of Person *</label>
                                                                <span class="focus-border"></span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row no-gutters input-right-icon mt-35">
                                                        <div class="col">
                                                            <div class="input-effect">
                                                                <input class="primary-input date read-only-input" id="startDate" type="text" name="date" required="" value="<?php echo date('m/d/Y'); ?>">
                                                                <label>Date</label>
                                                                <span class="focus-border"></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-auto">
                                                            <button class="" type="button">
                                                                <i class="ti-calendar" id="start-date-icon"></i>
                                                            </button>
                                                        </div>
                                                    </div>

                                                    <div class="row no-gutters input-right-icon mt-25">
                                                        <div class="col">
                                                            <div class="input-effect">
                                                                <input class="primary-input time form-control has-content" type="text" name="in_time" value="" required="">
                                                                <label>In Time *</label>
                                                                <span class="focus-border"></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-auto">
                                                            <button class="" type="button">
                                                                <i class="ti-timer"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="row no-gutters input-right-icon mt-25">
                                                        <div class="col">
                                                            <div class="input-effect">
                                                                <input class="primary-input time form-control has-content" type="text" name="out_time" value="" required="">
                                                                <label>Out time *</label>
                                                                <span class="focus-border"></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-auto">
                                                            <button class="" type="button">
                                                                <i class="ti-timer"></i>
                                                            </button>
                                                        </div>
                                                    </div>

                                                <div class="row mt-25">
                                                    <div class="col-lg-12">
                                                        <div class="input-effect">                                                                                                    
                                                            <textarea class="primary-input form-control" cols="0" rows="4" name="description"></textarea>
                                                            <span class="focus-border textarea"></span>
                                                            <label>Description <span></span></label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-35">
                                                        <div class="col-lg-12">
                                                            
                                                                <input width="50px" class="primary-input form-control" id="telephone2" class="telephone" type="tel" name="phone" value="" required="" placeholder="phone number">
                                                                <input type="hidden" name="dial_code" id="dial2">
                                                                <input type="hidden" name="country_name" id="country2">
                                                            
                                                        </div>
                                                    </div>
                                                    
                                               
                                                    <div class="row mt-40">
                                                        <div class="col-lg-12 text-center">
                                                           <button class="primary-btn fix-gr-bg btn-booktour" data-toggle="tooltip" title="" data-original-title="">
                                                                <span class="ti-check">Save</span>
                                                            </button>
                                                        </div>
                                                    </div>
              </div>
    
          </form>
        </div>
        
      </div>
    </div>
  </div><?php /**PATH C:\wamp64\www\sgss\resources\views/frontEnd/modals_form/book_tour.blade.php ENDPATH**/ ?>