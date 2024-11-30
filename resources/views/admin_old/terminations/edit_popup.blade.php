<div id="edit_termination" class="modal custom-modal fade" role="dialog">
   <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Edit Termination</h5>
           <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <form id="terminationEditForm" method="PUT">
               @csrf
               <input type="hidden" id="terminationId" name="id">
               <div class="form-group">
                  <label class="form-label mt-2">Termination Employee <span class="text-danger">*</span></label>
                  <select class="form-select emp_name" name="emp_id">
                     @foreach ($employees as $val )
                     <option value="{{$val->id}}">{{$val->firstName.' '.$val->lastName}}</option> 
                     @endforeach
                  </select>
               </div>
               <div class="form-group">
                  <label class="form-label mt-2">Notice Date <span class="text-danger">*</span></label>
                
                     <input type="text" class="form-control datetimepicker notice_date" name="notice_date" >
                  
               </div>
               <div class="form-group">
                  <label class="form-label mt-2">Termination Date <span class="text-danger">*</span></label>
               
                     <input type="text" class="form-control datetimepicker termination_date" name="termination_date">
             
               </div>
               <div class="form-group">
                  <label class="form-label mt-2">Reason <span class="text-danger">*</span></label>
                  <textarea class="form-control reason" name="reason" rows="4"></textarea>
               </div>
               <div class="modal-footer mt-3">
                  <button class="btn btn-primary submit-btn update">Submit</button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>