<div class="modal fade" id="late_enrol" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Late Enrol </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form  method="POST" >
          @csrf
          
          <div class="form-group">
            <input type="hidden" name="id_late" id="id_late">
            <label for="recipient-name" class="col-form-label">Term:</label>
            <input type="text" class="form-control" id="term" name="term">

            <label for="recipient-name" class="col-form-label">Rate:</label>
            <input type="text" class="form-control" id="rate" name="rate">
          </div>
          
          

          <div class="modal-footer">
        
            <button type="button" id="edit_late_enrol" class="btn btn-primary">Submit</button>
          </div>

        </form>
      </div>
      
    </div>
  </div>
</div>