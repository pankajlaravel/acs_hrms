<div id="add_type" class="modal custom-modal fade" role="dialog">
   <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Add New Goal Type</h5>
           <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <form id="goalTypeForm" method="POST">
               @csrf
               <div class="form-group">
                  <label class="form-label mt-2">Goal Type <span class="text-danger">*</span></label>
                  <input  name="name" class="form-control" type="text">
                  <span class="error text-danger" id="nameError"></span>
               </div>
               <div class="form-group">
                  <label class="form-label mt-2">Description <span class="text-danger">*</span></label>
                  <textarea  name="description" class="form-control" rows="4"></textarea>
                  <span class="error text-danger" id="descriptionError"></span>
               </div>
               {{-- <div class="form-group">
                  <label class="col-form-label">Status</label>
                  <select name="status" class="form-select">
                     <option value="1">Active</option>
                     <option value="0">Inactive</option>
                  </select>
               </div> --}}
               <div class="modal-footer mt-3">
                  <button type="submit" name="add_goal_type" class="btn btn-primary submit-btn add_goal_type">Submit</button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
