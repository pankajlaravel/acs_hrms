

<div class="modal modal-blur fade" id="edit_category" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title">Edit Sub-Category</h5>
         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
       </div>
       <div class="modal-body">
         <form id="categoryEditForm" method="PUT" >
            @csrf
            <input type="hidden" id="category_id" name="id" class="category_id">
            <div class="form-group">
               <label class="mt-2 form-label">Category Name <span class="text-danger">*</span></label>
               <select name="cat_id" id="" class="form-control cat_id">
                
                @foreach ($category as $val)
                  <option value="{{$val['id']}}">{{$val['name']}}</option>
                @endforeach
               </select>
            </div>
            <div class="form-group">
               {{-- <label class="mt-2 form-label">Department Name <span class="text-danger">*</span></label> --}}
               <label class="mt-2 form-label">Name</label>
               <input class="form-control name" name="name" id="name" type="text" required>
            </div>
           
      </div>
      <div class="mt-3 modal-footer">
         {{-- <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button> --}}
         <button class="btn btn-primary submit-btn department_updating">Update</button>
         {{-- <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Add Team</button> --}}
      </form>
       </div>
     </div>
   </div>
 </div>