 {{-- Add Form --}}
 <div class="employee-details" id="addBankInfo" style="display: none;">
    <h3>Bank Account</h3>
    <form id="add_emp_bank_details_form" method="POST" enctype="multipart/form-data">
      @csrf
      <input type="hidden" name="employee_id" class="emp_id">
    <div class="details-container">
      <div class="detail-item">
        <p class="detail-label">Bank Name</p>
        <div class="control">
            <select name="bank_id" id="bank" class="form-control bank">
                <option value=""></option>
                @foreach ($banks as $val)
                    <option value="{{$val['id']}}">{{$val['bank_name']}}</option>
                @endforeach
               </select>
        </div>
      </div>
      <div class="detail-item">
        <p class="detail-label">Bank Branch</p>
        <div class="control">
            <select name="bank_branch_id" id="branch" class="form-control branch">
                {{-- <option value=""></option> --}}
              
               </select>
        </div>
      </div>
      <div class="detail-item">
        <p class="detail-label">Bank Account No</p>
        <div class="control">
            <input name="account_no"  class="form-control" type="text">
        </div>
      </div>
      <div class="detail-item">
        <p class="detail-label">IFSC CODE</p>
        <div class="control">
            <input rows="4" id="ifsc" class="form-control"></input>
        </div>
      </div>
      <div class="detail-item">
        <p class="detail-label">Account Type</p>
        <div class="control">
            <input name="account_type"  rows="4" class="form-control"></input>
        </div>
      </div>
      <div class="detail-item">
        <p class="detail-label">Payment Type</p>
        <div class="control">
            <input name="payment_type"  rows="4" class="form-control"></input>
        </div>
      </div>
      <div class="detail-item">
        <p class="detail-label">Name As Per Bank Records</p>
        <div class="control">
            <input name="account_holder_name"  rows="4" class="form-control"></input>
        </div>
      </div>
      
    </div>
    <div class="mt-5 form-actions">
      <button type="submit" class="btn btn-primary btn-sm">Save</button>
      <button type="button" id="cancelBankForm1" class="btn btn-secondary btn-sm" >Cancel</button>
    </div>
    </form>
    <!-- Save and Cancel Buttons -->
    
  </div>   
{{-- edit --}}
<div class="employee-details" id="empBankInfo" style="display: none;">
    <h3>Bank Account</h3>
    <form id="edit_employee_bank_details_form" method="POST" enctype="multipart/form-data">
      @csrf
      <input type="hidden" name="employee_id" class="emp_id">
     <input type="hidden" name="id" id="bankId">
    <div class="details-container">
      <div class="detail-item">
        <p class="detail-label">Bank Name</p>
        <div class="control">
            <select name="bank_id" id="bank" class="form-control bank_select bank">
                <option value="">Select One</option>
                @foreach ($banks as $val)
                    <option value="{{$val['id']}}">{{$val['bank_name']}}</option>
                @endforeach
               </select>
        </div>
      </div>
      <div class="detail-item">
        <p class="detail-label">Bank Branch</p>
        <div class="control">
            <select name="bank_branch_id" id="branch" class="form-control branch_select branch">
                {{-- <option value=""></option> --}}
              
               </select>
        </div>
      </div>
      <div class="detail-item">
        <p class="detail-label">Bank Account No</p>
        <div class="control">
            <input name="account_no"  class="form-control account_no" type="text">
        </div>
      </div>
      <div class="detail-item">
        <p class="detail-label">IFSC CODE</p>
        <div class="control">
            <input rows="4" id="ifsc" class="form-control ifsc"></input>
        </div>
      </div>
      <div class="detail-item">
        <p class="detail-label">Account Type</p>
        <div class="control">
            <input name="account_type"  rows="4" class="form-control account_type"></input>
        </div>
      </div>
      <div class="detail-item">
        <p class="detail-label">Payment Type</p>
        <div class="control">
            <input name="payment_type"  rows="4" class="form-control payment_type"></input>
        </div>
      </div>
      <div class="detail-item">
        <p class="detail-label">Name As Per Bank Records</p>
        <div class="control">
            <input name="account_holder_name"  rows="4" class="form-control account_holder_name"></input>
        </div>
      </div>
      
    </div>
    <div class="mt-5 form-actions">
      <button type="submit" class="btn btn-primary btn-sm">Save</button>
      <button type="button" id="cancelBankForm2" class="btn btn-secondary btn-sm" >Cancel</button>
    </div>
    </form>
    <!-- Save and Cancel Buttons -->
    
  </div>



  
   
  
   