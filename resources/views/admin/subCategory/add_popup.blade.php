

<div class="modal modal-blur fade" id="add_subCategory" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title">Add Sub Category</h5>
         <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
       </div>
       <div class="modal-body">
         <form id="subCategoryForm" method="POST" >
            @csrf
            <div class="form-group">
               <label class="mt-2 form-label">Category Name <span class="text-danger">*</span></label>
               <select name="cat_id" id="" class="form-control">
                <option value="">Select One</option>
                @foreach ($category as $val)
                  <option value="{{$val['id']}}">{{$val['name']}}</option>
                @endforeach
               </select>
            </div>

            <div class="form-group">
              <label class="mt-2 form-label">Sub Category Name <span class="text-danger">*</span></label>
              {{-- <label class="mt-2 form-label">Name</label> --}}
              <input class="form-control" name="name" id="name" type="text" required>
           </div>
                    
      </div>
      <div class="mt-1 modal-footer">
         {{-- <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button> --}}
         <button type="submit" class="btn btn-primary submit-btn save">Save</button>
         {{-- <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Add Team</button> --}}
      </form>
       </div>
     </div>
   </div>
 </div>