<div class="modal fade" id="job_apply" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Apply for a job</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo e(url('apply')); ?>" method="POST" enctype="multipart/form-data">
          <?php echo csrf_field(); ?>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Name:</label>
            <input type="text" class="form-control" id="name" name="name" required="">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Sex:</label><br>
            <input type="radio" name="sex" checked value="male"> Male
            <input type="radio" name="sex" value="female"> Female
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Phone:</label>
            <input type="tel" class="form-control" id="phone" name="phone" required="">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required="">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" id="message" name="message"></textarea>
          </div>
          <label for="recipient-name" class="col-form-label">CV:</label>
          <div class="custom-file">
            
            <input type="file" class="custom-file-input" id="customFile" name="cv">
            <label class="custom-file-label" for="customFile">Choose file</label>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Send</button>
          </div>
        </form>
      </div>
      
    </div>
  </div>
</div><?php /**PATH C:\wamp64\www\SGSS\resources\views/frontEnd/modals_form/job_apply.blade.php ENDPATH**/ ?>