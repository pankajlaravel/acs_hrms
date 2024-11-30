<div id="add_training_type" class="modal custom-modal fade" role="dialog">
   <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Add New</h5>
           <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <form id="trainingTypeForm" method="POST">
               @csrf
               <div class="form-group">
                  <label class="form-label mt-2">Type <span class="text-danger">*</span></label>
                  <input class="form-control" type="text" name="name">
                  <span class="error text-danger" id="nameError"></span>
               </div>
               <div class="form-group">
                  <label class="form-label mt-2">Description <span class="text-danger">*</span></label>
                  <textarea class="form-control" rows="4" name="description"></textarea>
                  <span class="error text-danger" id="descriptionError"></span>
               </div>
               <div class="form-group">
                  <label class="col-form-label">Status</label>
                  <select class="form-select" name="status">
                     <option value="0">Active</option>
                     <option value="1">Inactive</option>
                  </select>
               </div>
               <div class="modal-footer mt-3">
                  <button class="btn btn-primary submit-btn add_training_type">Submit</button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>