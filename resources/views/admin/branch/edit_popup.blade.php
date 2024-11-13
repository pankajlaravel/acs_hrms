

<div class="modal modal-blur fade" id="edit_Bank" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title">Edit Branch</h5>
         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
       </div>
       <div class="modal-body">
         <form id="bankBranchEditForm" method="PUT" >
            @csrf
            <input type="hidden" id="bankID" name="id" class="bankID">
            <div class="form-group">
               {{-- <label class="mt-2 form-label">Department Name <span class="text-danger">*</span></label> --}}
               <label class="mt-2 form-label">Branch Name</label>
               <input class="form-control branch_name" name="branch_name" id="branch_name" type="text" required>
            </div>
            <div class="form-group">
              <label class="mt-2 form-label">Bank Name <span class="text-danger">*</span></label>
              <select class="form-select bank_name" name="bank_id">
               <option value="">Select One</option>
               @foreach ($bank as $val)
               <option value="{{$val->id}}">{{$val->bank_name}}</option>
                  
               @endforeach
            </select>
              <span class="error text-danger" id="bank_idError"></span>
           </div>
            <div class="form-group">
              <label class="mt-2 form-label">IFCS Code<span class="text-danger">*</span></label>
              {{-- <label class="mt-2 form-label">Name</label> --}}
              <input class="form-control ifsc" name="ifsc" id="ifsc" type="text">
              <span class="error text-danger" id="ifscError"></span>
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