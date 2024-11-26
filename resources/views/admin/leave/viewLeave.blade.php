<div class="modal modal-blur fade" id="view_details" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">View Details</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="applyLeaveVerify" method="PUT">
                @csrf
                <input type="hidden" id="id" name="id">
                <div class="form-group">
                   <label class="mt-2 form-label">Employee ID <span class="text-danger">*</span></label>
                   <input name="emp_office_id"  class="form-control" type="text" id="emp_office_id" disabled>
                   <span class="error text-danger" id="departmenError"></span>
                </div>
                <div class="form-group">
                 <label class="mt-2 form-label">Leave Type<span class="text-danger">*</span></label>
                 <input name="type_name"  class="form-control" type="text" id="type_name" disabled>
                 
                 <span class="error text-danger" id="departmenError"></span>
              </div>
              <div class="form-group">
                 <label class="mt-2 form-label">From<span class="text-danger">*</span></label>
                 <input name="leave_from"  class="form-control" type="text" id="leave_from" disabled>
                 <span class="error text-danger" id="departmenError"></span>
              </div>
              <div class="form-group">
                 <label class="mt-2 form-label">To<span class="text-danger">*</span></label>
                 <input name="leave_to"  class="form-control" type="text" id="leave_to" disabled>
                 <span class="error text-danger" id="departmenError"></span>
              </div>
              <div class="form-group">
                 <label class="mt-2 form-label">Description<span class="text-danger">*</span></label>
                 <input name="description"  class="form-control" type="text" id="description" disabled>
                 <span class="error text-danger" id="departmenError"></span>
              </div>
              <div class="form-group">
                <label class="mt-2 form-label">Leave Status<span class="text-danger">*</span></label>
                <select name="leave_status" id="leave_status" class="form-control">
                    <option value="approval">Approval</option>
                    <option value="reject">Reject</option>
                    <option value="pending">Pending</option>
                </select>
             </div>
                <div class="mt-1 modal-footer">
                   <button  id="add_department" class="btn btn-primary submit-btn add_leave">Submit</button>
                </div>
             </form>
        </div>
      </div>
    </div>
  </div>