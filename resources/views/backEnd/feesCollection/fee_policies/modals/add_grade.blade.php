<div class="modal fade" id="addgrade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Grade</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="add-grade" method="POST" action="/add-grade" >
          @csrf
          
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Start day:</label>
            <input type="date" class="form-control" id="born_from" name="born_from" value="2018-09-01">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">End day:</label>
            <input type="date" class="form-control" id="born_from" name="born_to" value="2019-08-31">
          </div>
          

          <div class="modal-footer">
        
            <button type="Submit" id="add_discount" class="btn btn-primary">Submit</button>
          </div>

        </form>
      </div>
      
    </div>
  </div>
</div>