{{-- <div id="edit_department" class="modal modal-blur fade" tabindex="-1" role="dialog" aria-hidden="true">
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
                  <label class="mt-2 form-label">Department Name <span class="text-danger">*</span></label>
                  <input class="form-control" name="name" id="name" type="text" required>
               </div>
               <div class="mt-3 modal-footer">
                  <button class="btn btn-primary submit-btn department_updating">Save</button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div> --}}

<div class="modal modal-blur fade" id="edit_category" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title">Edit Category</h5>
         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
       </div>
       <div class="modal-body">
         <form id="categoryEditForm" method="PUT" >
            @csrf
            <input type="hidden" id="category_id" name="id" class="category_id">
            <div class="form-group">
               {{-- <label class="mt-2 form-label">Department Name <span class="text-danger">*</span></label> --}}
               <label class="mt-2 form-label">Name</label>
               <input class="form-control name" name="name" id="name" type="text" required>
            </div>
            <div class="mt-3 modal-footer">
            </div>
         
      </div>
      <div class="mt-3 modal-footer">
         <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
         <button class="btn btn-primary submit-btn department_updating">Save</button>
         {{-- <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Add Team</button> --}}
      </form>
       </div>
     </div>
   </div>
 </div>