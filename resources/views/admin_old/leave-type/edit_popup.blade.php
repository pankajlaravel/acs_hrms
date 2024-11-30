<div class="modal modal-blur fade" id="edit_leave_type" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title">Edit Leave Type</h5>
         <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
       </div>
       <div class="modal-body">
         <form id="editForm" method="PUT" >
            @csrf
            <input type="hidden" name="id" id="id">
            <div class="form-group">
               <label class="mt-2 form-label">Type Name <span class="text-danger">*</span></label>
               {{-- <label class="mt-2 form-label">Name</label> --}}
               <input class="form-control" name="type_name" id="type_name" type="text" required>
            </div>
            <div class="form-group">
               <label class="mt-2 form-label">Code<span class="text-danger">*</span></label>
               <input class="form-control" name="code" id="code" type="text" required>
            </div>
            
         
      </div>
      <div class="mt-1 modal-footer">
         <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
         <button class="btn btn-primary submit-btn " id="update">Save</button>
         {{-- <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Add Team</button> --}}
      </form>
       </div>
     </div>
   </div>
 </div>