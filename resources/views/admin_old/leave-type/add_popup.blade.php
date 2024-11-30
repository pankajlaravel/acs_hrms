{{-- <div id="add_department" class="modal custom-modal fade" role="dialog">
   <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Add Department</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <form id="departmentForm" method="POST">
               @csrf
               <div class="form-group">
                  <label class="mt-2 form-label">Department Name <span class="text-danger">*</span></label>
                  <input name="name"  class="form-control" type="text">
                  <span class="error text-danger" id="departmenError"></span>
               </div>
               <div class="mt-1 modal-footer">
                  <button name="add_department" id="add_department" class="btn btn-primary submit-btn">Submit</button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div> --}}

<div class="modal modal-blur fade" id="add_leave_type" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title">Add Leave Type</h5>
         <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
       </div>
       <div class="modal-body">
         <form id="addForm" method="POST" >
            @csrf
            <div class="form-group">
               <label class="mt-2 form-label">Type Name <span class="text-danger">*</span></label>
               {{-- <label class="mt-2 form-label">Name</label> --}}
               <input class="form-control" name="type_name"  type="text" required>
            </div>
            <div class="form-group">
               <label class="mt-2 form-label">Code<span class="text-danger">*</span></label>
               <input class="form-control" name="code"  type="text" required>
            </div>
            
         
      </div>
      <div class="mt-1 modal-footer">
         <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
         <button class="btn btn-primary submit-btn add_leave">Save</button>
         {{-- <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Add Team</button> --}}
      </form>
       </div>
     </div>
   </div>
 </div>