<div id="add_overtime" class="modal custom-modal fade" role="dialog">
   <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Add Overtime</h5>
           <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <form id="overtimeForm" method="POST">
               @csrf
               <div class="form-group">
                  <label class="form-label mt-2">Select Employee <span class="text-danger">*</span></label>
                  <select  name="emp_id" class="form-select">
                     <option value=" ">Select Employee Name</option>
                     @foreach($employees as $val)
                     <option value="{{ $val->id}}">{{ $val->firstName.' '.$val->lastName}}</option>
                     @endforeach
                  </select>
                  <span class="error text-danger" id="emp_idError"></span>
               </div>
               <div class="form-group">
                  <label class="form-label mt-2">Overtime Date <span class="text-danger">*</span></label>
                  <input name="date"  class="form-control " type="date">
                  <span class="error text-danger" id="dateError"></span>
               </div>
               {{-- <div class="form-group">
                  <label class="form-label mt-2">Overtime Type <span class="text-danger">*</span></label>
                  <input name="ov_type"  class="form-control " type="text">
                  <span class="error text-danger" id="working_hoursError"></span>
               </div> --}}

               <div class="form-group">
                  <label class="form-label mt-2">Overtime Hours <span class="text-danger">*</span></label>
                  <input name="working_hours"  class="form-control" type="text">
                  <span class="error text-danger" id="working_hoursError"></span>
               </div>
               <div class="form-group">
                  <label class="form-label mt-2">Description <span class="text-danger">*</span></label>
                  <textarea name="description"  rows="4" class="form-control"></textarea>
                  <span class="error text-danger" id="descriptionError"></span>
               </div>
               <div class="modal-footer mt-3">
                  <button name="add_overtime" type="submit" class="btn btn-primary submit-btn addData">Submit</button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>