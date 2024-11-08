<div id="add_department" class="modal custom-modal fade" role="dialog">
   <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Add Department</h5>
           <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <form id="departmentForm" method="POST">
               @csrf
               <div class="form-group">
                  <label class="form-label mt-2">Department Name <span class="text-danger">*</span></label>
                  <input name="name"  class="form-control" type="text">
                  <span class="error text-danger" id="departmenError"></span>
               </div>
               <div class="modal-footer mt-3">
                  <button name="add_department" id="add_department" class="btn btn-primary submit-btn">Submit</button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>