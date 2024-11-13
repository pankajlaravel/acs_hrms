

<<div class="modal modal-blur fade" id="add_Branch" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title">Add Branch</h5>
         <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
       </div>
       <div class="modal-body">
         <form id="bankBranchForm" method="POST" >
            @csrf
            <div class="form-group">
               <label class="mt-2 form-label">Branch Name <span class="text-danger">*</span></label>
               {{-- <label class="mt-2 form-label">Name</label> --}}
               <input class="form-control" name="branch_name" id="branch_name" type="text">
               <span class="error text-danger" id="branch_nameError"></span>
            </div>
            <div class="form-group">
               <label class="mt-2 form-label">Bank Name <span class="text-danger">*</span></label>
               <select class="form-select" name="bank_id">
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
              <input class="form-control" name="ifsc" id="ifsc" type="text">
              <span class="error text-danger" id="ifscError"></span>
           </div>
            {{-- <div class="mt-1 modal-footer">
            </div> --}}
         
      </div>
      <div class="mt-1 modal-footer">
         <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
         <button class="btn btn-primary submit-btn save">Save</button>
         {{-- <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Add Team</button> --}}
      </form>
       </div>
     </div>
   </div>
 </div>