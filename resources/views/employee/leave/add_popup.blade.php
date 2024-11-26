<div id="apply_leave" class="modal custom-modal fade" role="dialog">
   <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Apply Leave</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <form id="addForm" method="POST">
                @csrf
                <div class="form-group">
                    <label class="mt-2 form-label">My ID <span class="text-danger">*</span></label>
                    <input name="emp_office_id" class="form-control" type="text" value="{{ $user['employee_id'] }}" disabled>
                    <span class="error text-danger" id="emp_office_idError"></span>
                </div>
            
                <div class="form-group">
                    <label class="mt-2 form-label">Leave Type <span class="text-danger">*</span></label>
                    <select name="leave_type_id" class="form-control">
                        <option value="">Select Type</option>
                        @foreach ($types as $val)
                            <option value="{{ $val['id'] }}">{{ $val['type_name'] }}</option>
                        @endforeach
                    </select>
                    <span class="error text-danger" id="leave_type_idError"></span>
                </div>
            
                <div class="form-group">
                    <label class="mt-2 form-label">Leave Duration <span class="text-danger">*</span></label>
                    <div>
                        <label>
                            <input type="radio" name="leave_duration" value="one_day" checked> One Day Leave
                        </label>
                        <label class="ms-3">
                            <input type="radio" name="leave_duration" value="more_days"> More Than One Day Leave
                        </label>
                    </div>
                </div>
            
                <div class="form-group">
                    <label class="mt-2 form-label">From <span class="text-danger">*</span></label>
                    <input name="leave_from" class="form-control" type="date">
                    <span class="error text-danger" id="leave_fromError"></span>
                </div>
            
                <div class="form-group to-date-group d-none">
                    <label class="mt-2 form-label">To <span class="text-danger">*</span></label>
                    <input name="leave_to" class="form-control" type="date">
                    <span class="error text-danger" id="leave_toError"></span>
                </div>
            
                <div class="form-group">
                    <label class="mt-2 form-label">Description <span class="text-danger">*</span></label>
                    <input name="description" class="form-control" type="text">
                    <span class="error text-danger" id="descriptionError"></span>
                </div>
            
                <div class="mt-1 modal-footer">
                    <button id="add_department" class="btn btn-primary submit-btn add_leave" type="button">Submit</button>
                </div>
            </form>
         </div>
      </div>
   </div>
</div>
