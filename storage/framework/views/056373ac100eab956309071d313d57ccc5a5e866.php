  <style type="text/css">
      &__option {
    display: block;
    padding: 15px;
    background-color: #fff;
    
    &:hover,
    &:focus {
      color: #546c84;
      background-color: #fbfbfb;
    }
  }
  </style>
  <div class="modal fade" id="complaint" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Make a Complaint</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" action="/add-complaint" accept-charset="UTF-8" class="form-horizontal">
            <?php echo csrf_field(); ?>
                <div class="add-visitor">
                    <div class="row no-gutters input-right-icon">
                        <div class="col">
                            <div class="input-effect">
                                <input class="primary-input form-control" id="complaint_by" type="text" name="complaint_by" value="" required="">
                                <label>Complaint By<span>*</span></label>
                                <span class="focus-border"></span>
                            </div>
                        </div>

                    </div>

                                <input type="hidden" name="id" value="">
                                    <div class="row mt-25">
                                        <div class="col-lg-12">
                                             <div class="input-effect">
                                                <input class="primary-input form-control" id="complaint_type" type="text" name="complaint_type" value="" required="">
                                                <label>Complaint type <span>*</span></label>
                                                <span class="focus-border"></span>
                                            </div>   
                                                <?php if($errors->has('complaint_type')): ?>
                                                <span class="invalid-feedback invalid-select" role="alert">
                                            <strong><?php echo e(@$errors->first('complaint_type')); ?></strong>
                                        </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                    
                                    <div class="row mt-25">
                                        <div class="col-lg-12">
                                            <div class="input-effect">
                                                <input class="primary-input form-control" id="email" type="email" name="email" value="" required="">
                                                <label>Email<span>*</span></label>
                                                <span class="focus-border"></span>
                                            </div>   
                                                
                                            
                                            
                                        </div>
                                    </div>
                                    
                                    <div class="row no-gutters input-right-icon mt-25">
                                        <div class="col">
                                            <div class="input-effect">
                                                <input class="primary-input date form-control read-only-input" id="date" type="text" name="date" value="<?php echo date('m/d/Y'); ?>" required="">
                                                <label>Date <span></span></label>
                                                <span class="focus-border"></span>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <button class="" type="button">
                                                <i class="ti-calendar" id="start-date-icon"></i>
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
                                    <div class="row mt-25">
                                        <div class="col-lg-12">
                                            
                                                <input class="primary-input form-control" id="telephone1" class="telephone" type="tel" name="phone" value="" placeholder="phone number" required="">
                                                <input type="hidden" name="dial_code" id="dial1">
                                                <input type="hidden" name="country_name" id="country1">
                                               
                                           
                                        </div>
                                    </div>
                                    <div class="row mt-40">
                                        <div class="col-lg-12 text-center">
                                           <button class="primary-btn fix-gr-bg now_wrap_lg save_complaint" data-toggle="tooltip" title="" data-original-title="">
                                                <span class="ti-check">Save Complaint</span>
                                            </button> 
                                        </div>
                                    </div>
                                </div>                
             
    
          </form>
        </div>
        
      </div>
    </div>
  </div>
<?php /**PATH /home/x/sgss/resources/views/frontEnd/modals_form/complaint.blade.php ENDPATH**/ ?>