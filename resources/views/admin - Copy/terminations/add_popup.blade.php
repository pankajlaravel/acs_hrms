<div id="add_termination" class="modal custom-modal fade" role="dialog">
   <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Add Termination</h5>
           <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <form id="terminationForm" method="POST">
               @csrf
               <div class="form-group">
                  <label class="form-label mt-2">Termination Employee <span class="text-danger">*</span></label>
                  <select class="form-select emp_data" name="emp_id">
                     <option value="">Select one</option>
                     @foreach ($employees as $val )
                     <option value="{{$val->id}}">{{$val->firstName.' '.$val->lastName}}</option> 
                     @endforeach
                  </select>
                  <span class="error text-danger"  id="emp_idError"></span>
               </div>
               <div class="form-group">
                  <label class="form-label mt-2">Notice Date <span class="text-danger">*</span></label>
                  
                     <input type="date" name="notice_date" class="form-control datetimepicker">
                     <span class="error text-danger"  id="notice_dateError"></span>
               </div>
               <div class="form-group">
                  <label class="form-label mt-2">Termination Date <span class="text-danger">*</span></label>
                  
                     <input type="date" name="termination_date" class="form-control datetimepicker">
                     <span class="error text-danger"  id="termination_dateError"></span>
               </div>
               <div class="form-group">
                  <label class="form-label mt-2">Reason <span class="text-danger">*</span></label>
                  <textarea class="form-control" rows="4" name="reason"></textarea>
                  <span class="error text-danger"  id="reasonError"></span>
               </div>
               <div class="modal-footer mt-3">
                  <button class="btn btn-primary submit-btn add_data">Submit</button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>