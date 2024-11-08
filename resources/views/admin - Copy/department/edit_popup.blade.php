<div id="edit_department" class="modal custom-modal fade" role="dialog">
   <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Edit Department</h5>
           <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <form id="departmentEditForm" method="PUT" >
               @csrf
               <input type="hidden" id="department_id" name="id">
               <div class="form-group">
                  <label class="form-label mt-2">Department Name <span class="text-danger">*</span></label>
                  <input class="form-control" name="name" id="name" type="text" required>
               </div>
               <div class="modal-footer mt-3">
                  <button class="btn btn-primary submit-btn department_updating">Save</button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>