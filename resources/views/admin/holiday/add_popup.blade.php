<div class="modal custom-modal fade" id="add_holiday" role="dialog">
   <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Add Holiday</h5>
           <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <form id="holidayForm" method="POST">
               @csrf
               <div class="form-group">
                  <label class="form-label mt-2">Holiday Name <span class="text-danger">*</span></label>
                  <input name="holiday_name" class="form-control"  type="text">
                  <span class="error text-danger" id="holiday_nameError"></span>
               </div>
               <div class="form-group">
                  <label class="form-label mt-2">Holiday Date <span class="text-danger">*</span></label>
                  <input class="form-control" name="holiday_date"  type="date">
                  <span class="error text-danger" id="holiday_dateError"></span>
               </div>
               <div class="modal-footer mt-3">
                  <button id="add_holiday" type="submit" class="btn btn-primary submit-btn">Submit</button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>