<div id="edit_designation" class="modal custom-modal fade" role="dialog">
   <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Edit Designation</h5>
           <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <form id="designationEditForm" method="PUT" >
               @csrf
               <input type="hidden" id="designation_id" name="id">
               <div class="form-group">
                  <label class="form-label mt-2">Designation Name <span class="text-danger">*</span></label>
                  <input class="form-control" name="name" id="name" type="text" required>
               </div>
               <div class="form-group">
                  <label class="form-label mt-2">Department <span class="text-danger">*</span></label>
                  <select name="department" id="department" class="form-select" required>
                     <option value="">Select Department</option>
                     @foreach ($department as $val )
                     <option value="{{$val['id']}}">{{$val['name']}}</option>
                     @endforeach
                  </select>
               </div>
               <div class="modal-footer mt-3">
                  <button class="btn btn-primary submit-btn designation_updating">Save</button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>   