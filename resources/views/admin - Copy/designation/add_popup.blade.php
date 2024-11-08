<div id="add_designation" class="modal custom-modal fade" role="dialog">
   <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Add Designation</h5>
           <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <form id="designationForm" method="POST">
               @csrf
               <div class="form-group">
                  <label class="form-label mt-2">Designation Name <span class="text-danger">*</span></label>
                  <input name="name"  class="form-control" type="text">
                  <span class="error text-danger" id="nameError"></span>
               </div>
               <div class="form-group">
                  <label class="form-label mt-2">Department <span class="text-danger">*</span></label>
                  <select  name="department" class="form-select">
                     <option value="">Select Department</option>
                     @foreach ($department as $val )
                     <option value="{{$val['id']}}">{{$val['name']}}</option>
                     @endforeach
                  </select>
                  <span class="error text-danger" id="departmentError"></span>
               </div>
               <div class="modal-footer mt-3">
                  <button name="add_designation" id="add_designation" type="submit" class="btn btn-primary submit-btn">Submit</button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>