<div class="modal fade" id="edit_withdraw" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Withdraw </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form  method="POST" >
          @csrf
          
          <div class="form-group">
            <input type="hidden" name="id_withdraw" id="id_withdraw">
            <label for="recipient-name" class="col-form-label">WITHDRAWAL DATE:</label>
            <input type="text" class="form-control" id="date_withdraw" name="date_withdraw">

            <label for="recipient-name" class="col-form-label">RATE OF REFUNDABLE:</label>
            <input type="text" class="form-control" id="rate_withdraw" name="rate_withdraw">
          </div>
          
          

          <div class="modal-footer">
        
            <button type="button" id="withdraw_edit" class="btn btn-primary withdraw_edit">Submit</button>
          </div>

        </form>
      </div>
      
    </div>
  </div>
</div>