<div class="modal custom-modal fade" id="edit_holiday" role="dialog">
   <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Edit Holiday</h5>
           <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <form id="holidayEditForm" method="PUT" >
               @csrf
               <input type="hidden" id="holiday_id" name="id">
               <div class="form-group">
                  <label class="form-label mt-2">Holiday Name <span class="text-danger">*</span></label>
                  <input class="form-control" id="holiday_name" name="holiday_name" type="text" required>
               </div>
               <div class="form-group">
                  <label class="form-label mt-2">Holiday Date <span class="text-danger">*</span></label>
                  <input class="form-control" name="holiday_date" id="holiday_date" type="date" required>
                  <span class="error text-danger" id="holiday_dateError"></span>
               </div>
               <div class="modal-footer mt-3">
                  <button class="btn btn-primary submit-btn updating">Update</button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>