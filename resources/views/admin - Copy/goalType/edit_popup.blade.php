<div id="edit_type" class="modal custom-modal fade" role="dialog">
   <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Edit Goal Type</h5>
           <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <form id="goalTypeEditForm" method="PUT" >
               @csrf
               <input type="hidden" id="goalType_id" name="id" required>
               <div class="form-group">
                  <label class="form-label mt-2">Goal Type <span class="text-danger">*</span></label>
                  <input class="form-control " type="text" name="name" id="goalType_name">
                  <span class="error text-danger" id="nameError"></span>
               </div>
               <div class="form-group">
                  <label class="form-label mt-2">Description <span class="text-danger">*</span></label>
                  <textarea class="form-control" rows="4" name="description" id="goalType_description" edit_type></textarea>
               </div>
               <div class="form-group">
                  <label class="col-form-label">Status</label>
                  <select class="form-select goal_type_status" name="status" id="goal_type_status">
                     
                  </select>
               </div>
               <div class="modal-footer mt-3">
                  <button class="btn btn-primary submit-btn update">Update</button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>