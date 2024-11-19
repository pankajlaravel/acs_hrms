<div id="add_emp_bank_details" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
       <div class="modal-content">
          <div class="modal-header">
             <h5 class="modal-title">Bank Account</h5>
             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
             <form id="add_emp_bank_details_form" method="POST">
                @csrf
                <input type="hidden" name="employee_id" class="emp_id">
                <div class="mt-2 form-group">
                   <label class="mt-2 form-label">Bank Name<span class="text-danger">*</span></label>
                   <select name="bank_id" id="bank" class="form-control">
                    <option value=""></option>
                    @foreach ($banks as $val)
                        <option value="{{$val['id']}}">{{$val['bank_name']}}</option>
                    @endforeach
                   </select>
                   <span class="error text-danger" id="emp_idError"></span>
                </div>
                <div class="mt-2 form-group">
                   <label class="mt-2 form-label">Bank Branch<span class="text-danger">*</span></label>
                   <select name="bank_branch_id" id="branch" class="form-control">
                    {{-- <option value=""></option> --}}
                  
                   </select>
                   <span class="error text-danger" id="dateError"></span>
                </div>
               
 
                <div class="mt-2 form-group">
                   <label class="mt-2 form-label">Bank Account No<span class="text-danger">*</span></label>
                   <input name="account_no"  class="form-control" type="text">
                   <span class="error text-danger" id="working_hoursError"></span>
                </div>
                <div class="mt-2 form-group">
                   <label class="mt-2 form-label">IFSC CODE <span class="text-danger">*</span></label>
                   <input rows="4" id="ifsc" class="form-control"></input>
                   <span class="error text-danger" id="descriptionError"></span>
                </div>

                <div class="mt-2 form-group">
                    <label class="mt-2 form-label">Account Type<span class="text-danger">*</span></label>
                    <input name="account_type"  rows="4" class="form-control"></input>
                    <span class="error text-danger" id="descriptionError"></span>
                 </div>

                 <div class="mt-2 form-group">
                    <label class="mt-2 form-label">Payment Type<span class="text-danger">*</span></label>
                    <input name="payment_type"  rows="4" class="form-control"></input>
                    <span class="error text-danger" id="descriptionError"></span>
                 </div>

                 <div class="mt-2 form-group">
                    <label class="mt-2 form-label">Name As Per Bank Records<span class="text-danger">*</span></label>
                    <input name="account_holder_name"  rows="4" class="form-control"></input>
                    <span class="error text-danger" id="descriptionError"></span>
                 </div>
             </div>
             <div class="mt-3 modal-footer">
                   <button name="add_overtime" type="submit" class="btn btn-primary submit-btn addData">Submit</button>
                </div>
             </form>
          
       </div>
    </div>
 </div>

 {{-- Edit --}}
 <div id="edit_employee_bank_details" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
       <div class="modal-content">
          <div class="modal-header">
             <h5 class="modal-title">Edit Bank Account Details</h5>
             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
             <form id="edit_employee_bank_details_form" method="POST">
                @csrf
                <input type="hidden" name="employee_id" class="emp_id">
                <input type="hidden" name="id" id="bankId">
                <div class="mt-2 form-group">
                   <label class="mt-2 form-label">Bank Name<span class="text-danger">*</span></label>
                   <select name="bank_id" id="bank" class="form-control bank_select bank">
                    <option value=""></option>
                    @foreach ($banks as $val)
                        <option value="{{$val['id']}}">{{$val['bank_name']}}</option>
                    @endforeach
                   </select>
                   <span class="error text-danger" id="emp_idError"></span>
                </div>
                <div class="mt-2 form-group">
                   <label class="mt-2 form-label">Bank Branch<span class="text-danger">*</span></label>
                   <select name="bank_branch_id" id="branch" class="form-control branch_select branch">
                    {{-- <option value=""></option> --}}
                  
                   </select>
                   <span class="error text-danger" id="dateError"></span>
                </div>
               
 
                <div class="mt-2 form-group">
                   <label class="mt-2 form-label">Bank Account No<span class="text-danger">*</span></label>
                   <input name="account_no"  class="form-control account_no" type="text">
                   <span class="error text-danger" id="working_hoursError"></span>
                </div>
                <div class="mt-2 form-group">
                   <label class="mt-2 form-label">IFSC CODE <span class="text-danger">*</span></label>
                   <input rows="4" id="ifsc" class="form-control ifsc"></input>
                   <span class="error text-danger" id="descriptionError"></span>
                </div>

                <div class="mt-2 form-group">
                    <label class="mt-2 form-label">Account Type<span class="text-danger">*</span></label>
                    <input name="account_type"  rows="4" class="form-control account_no"></input>
                    <span class="error text-danger" id="descriptionError"></span>
                 </div>

                 <div class="mt-2 form-group">
                    <label class="mt-2 form-label">Payment Type<span class="text-danger">*</span></label>
                    <input name="payment_type"  rows="4" class="form-control payment_type"></input>
                    <span class="error text-danger" id="descriptionError"></span>
                 </div>

                 <div class="mt-2 form-group">
                    <label class="mt-2 form-label">Name As Per Bank Records<span class="text-danger">*</span></label>
                    <input name="account_holder_name"  rows="4" class="form-control account_holder_name"></input>
                    <span class="error text-danger" id="descriptionError"></span>
                 </div>
             </div>
             <div class="mt-3 modal-footer">
                   <button name="add_overtime" type="submit" class="btn btn-primary submit-btn addData">Submit</button>
                </div>
             </form>
          
       </div>
    </div>
 </div>