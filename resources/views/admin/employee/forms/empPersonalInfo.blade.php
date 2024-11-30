

<div class="employee-details" id="editPersonalInfo" style="display: none;">
    <h3>Personal Information</h3>
    <form id="employeePersonalInfoEditForm" method="PUT" enctype="multipart/form-data">
      @csrf
      <input type="hidden" class="employeeId" name="id">
    <div class="details-container">
      <div class="detail-item">
        <p class="detail-label">DOB</p>
        <div class="control">
            <input name="dob" class="form-control dob" type="date" >
        </div>
      </div>
      <div class="detail-item">
        <p class="detail-label">Birthday</p>
        <div class="control">
            <input name="birth_day" class="form-control birth_day" type="text" >
        </div>
      </div>
      <div class="detail-item">
        <p class="detail-label">Blood Group</p>
        <div class="control">
        <input name="blood_group"  class="form-control blood_group" type="text" >
        </div>
      </div>
      <div class="detail-item">
        <p class="detail-label">Father's Name</p>
        <div class="control">
            <input name="father_name" class="form-control father_name" type="text" >
        </div>
      </div>
      <div class="detail-item">
        <p class="detail-label">Marital Status</p>
        <div class="control">
            <input name="marital_status"  class="form-control marital_status" type="text" >
        </div>
      </div>
      <div class="detail-item">
        <p class="detail-label">Marital Date</p>
        <div class="control">
            <input name="marital_date" id="" class="form-control marital_date" type="date" >
        </div>
      </div>
      <div class="detail-item">
        <p class="detail-label">Spouse Name</p>
        <div class="control">
            <input name="spouse_name" id="" class="form-control spouse_name" type="text" >
        </div>
      </div>
      <div class="detail-item">
        <p class="detail-label">Nationality</p>
        <div class="control">
            <input name="nationality" id="" class="form-control nationality" type="text" >
        </div>
      </div>
      <div class="detail-item">
        <p class="detail-label">Residential Status</p>
        <div class="control">
            <input class="form-control residential_status" id="" name="residential_status" type="text" >
        </div>
      </div>

      

      <div class="detail-item">
        <p class="detail-label">Place of Birth</p>
        <div class="control">
            <input class="form-control place_of_birth" id="" name="place_of_birth" type="text" >
        </div>
      </div>

      <div class="detail-item">
        <p class="detail-label">Country of Origin</p>
        <div class="control">
            <input class="form-control religion" id="" name="religion" type="text" >
        </div>
      </div>

      

      <div class="detail-item">
        <p class="detail-label">Religion</p>
        <div class="control">
            <input class="form-control religion" id="" name="religion" type="text" >
        </div>
      </div>

      <div class="detail-item">
        <p class="detail-label">International Employee</p>
        <div class="control">
            <input class="form-control international_emp" id="" name="international_emp" type="text" >
        </div>
      </div>

      <div class="detail-item">
        <p class="detail-label">Physically Challenged</p>
        <div class="control">
            <input class="form-control physically_challened" id="" name="physically_challened" type="text" >
        </div>
      </div>

      <div class="detail-item">
        <p class="detail-label">Is Director</p>
        <div class="control">
            <input class="form-control is_director" id="" name="is_director" type="text" >
        </div>
      </div>

      <div class="detail-item">
        <p class="detail-label">Personal Email</p>
        <div class="control">
            <input class="form-control personal_email" id="" name="personal_email" type="text" >
        </div>
      </div>
      
    </div>
    <div class="mt-5 form-actions">
      <button type="submit" class="btn btn-primary btn-sm">Save</button>
      <button type="button" id="cancelPersonalInfoForm" class="btn btn-secondary btn-sm" >Cancel</button>
    </div>
    </form>
    <!-- Save and Cancel Buttons -->
    
  </div>
   
  
   