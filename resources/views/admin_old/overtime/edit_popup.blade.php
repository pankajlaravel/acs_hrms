<div id="edit_overtime" class="modal custom-modal fade" role="dialog">
   <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Edit Overtime</h5>
            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <form id="employeeOvertimeEditForm" method="PUT" >
               @csrf
               <input type="hidden" id="employeeId" name="id">
               <div class="form-group">
                  <label class="mt-2 form-label">Select Employee <span class="text-danger">*</span></label>
                  <select class="form-select emp_name"  name="emp_id" required>
                     
                     @foreach($employees as $val)
                     <option value="{{ $val->id}}">{{ $val->firstName.' '.$val->lastName}}</option>
                     @endforeach
                  </select>
               </div>
               <div class="form-group">
                  <label class="mt-2 form-label">Overtime Date <span class="text-danger">*</span></label>
                  
                     <input class="form-control" name="date" id="date" type="date" required>
                 
               </div>
               <div class="form-group">
                  <label class="mt-2 form-label">Overtime Hours <span class="text-danger">*</span></label>
                  <input class="form-control" name="working_hours" required id="working_hours" type="text">
               </div>
               <div class="form-group">
                  <label class="mt-2 form-label">Description <span class="text-danger">*</span></label>
                  <textarea rows="4" name="description" required id="description" class="form-control"></textarea>
               </div>
            </div>
               <div class="modal-footer mt-3">
                  <button class="btn btn-primary submit-btn updating">Update</button>
               </div>
            </form>
         
      </div>
   </div>
</div>