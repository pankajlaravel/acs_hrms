    

<div class="employee-details" id="empJoiningInfo" style="display: none;">
    <h3>Joining Details</h3>
    <form id="employeeJoiningInfoEditForm" method="PUT" enctype="multipart/form-data">
      @csrf
      <input type="hidden" class="employeeId" name="id">
    <div class="details-container">
      <div class="detail-item">
        <p class="detail-label">Joined On</p>
        <div class="control">
            <input name="joining_Date" class="form-control joining_Date" type="date" >
        </div>
      </div>
      <div class="detail-item">
        <p class="detail-label">Confirmation Date</p>
        <div class="control">
            <input name="join_confrimation_date" class="form-control join_confrimation_date" type="text" >
        </div>
      </div>
      <div class="detail-item">
        <p class="detail-label">Status</p>
        <div class="control">
        {{-- <input name="joining_status"  class="form-control joining_status" type="text" > --}}
        <select class="form-control joining_status" id="employee" name="joining_status" >
            {{-- <option value="">All</option> --}}
            <option value="Probation">Probation</option>
            <option value="Confirmed">Confirmed</option>
            <option value="Consultant">Consultant</option>
        </select>
        </div>
      </div>
      <div class="detail-item">
        <p class="detail-label">Probation Period</p>
        <div class="control">
            <input name="probation_period" class="form-control probation_period" type="text" >
        </div>
      </div>
      <div class="detail-item">
        <p class="detail-label">Notice Period</p>
        <div class="control">
            <input name="notice_period"  class="form-control notice_period" type="text" >
        </div>
      </div>
      <div class="detail-item">
        <p class="detail-label">Current Company Experience</p>
        <div class="control">
            <input name="current_company_experience" id="" class="form-control current_company_experience" type="text" >
        </div>
      </div>
      <div class="detail-item">
        <p class="detail-label">Previous Experience</p>
        <div class="control">
            <input name="pre_company_experiecne" id="" class="form-control pre_company_experiecne" type="text" >
        </div>
      </div>
      <div class="detail-item">
        <p class="detail-label">Total Experience</p>
        <div class="control">
            <input name="total_experience" id="" class="form-control total_experience" type="text" >
        </div>
      </div>
      <div class="detail-item">
        <p class="detail-label">Referred By</p>
        <div class="control">
            <input class="form-control referred_by" id="" name="referred_by" type="text" >
        </div>
      </div>

      
      
    </div>
    <div class="mt-5 form-actions">
      <button type="submit" class="btn btn-primary btn-sm">Save</button>
      <button type="button" id="cancelJoiningInfoForm" class="btn btn-secondary btn-sm" >Cancel</button>
    </div>
    </form>
    <!-- Save and Cancel Buttons -->
    
  </div>
   
  
   