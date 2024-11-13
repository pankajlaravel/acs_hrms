

<div class="modal modal-blur fade" id="edit_Bank" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title">Edit Category</h5>
         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
       </div>
       <div class="modal-body">
         <form id="bankEditForm" method="PUT" >
            @csrf
            <input type="hidden" id="bank_id" name="id" class="bank_id">
            <div class="form-group">
               {{-- <label class="mt-2 form-label">Department Name <span class="text-danger">*</span></label> --}}
               <label class="mt-2 form-label">Bank Name</label>
               <input class="form-control bank_name" name="bank_name" id="bank_name" type="text" required>
            </div>
            <div class="form-group">
               <label class="mt-2 form-label">Short Name <span class="text-danger">*</span></label>
               {{-- <label class="mt-2 form-label">Name</label> --}}
               <input class="form-control short_name" name="short_name" id="short_name" type="text">
               <span class="error text-danger" id="short_nameError"></span>
            </div>

            <div class="form-group">
               <label class="mt-2 form-label">IFSC Code <span class="text-danger">*</span></label>
               {{-- <label class="mt-2 form-label">Name</label> --}}
               <input class="form-control ifsc" name="ifsc" id="ifsc" type="text">
               <span class="error text-danger" id="ifscError"></span>
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