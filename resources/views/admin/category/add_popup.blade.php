

<div class="modal modal-blur fade" id="add_Category" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title">Add Category</h5>
         <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
       </div>
       <div class="modal-body">
         <form id="categoryForm" method="POST" >
            @csrf
            <div class="form-group">
               <label class="mt-2 form-label">Category Name <span class="text-danger">*</span></label>
               {{-- <label class="mt-2 form-label">Name</label> --}}
               <input class="form-control" name="name" id="name" type="text" required>
            </div>
            <div class="mt-1 modal-footer">
            </div>
         
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