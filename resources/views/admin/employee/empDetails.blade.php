@include('admin.employee.forms.empInformation')
<div class="employee-information empDetail" id="empDetail">
    <h3>Employee Information <a href="javascript:void(0)" class="edit-icon editEmpInfo empID" data-id=""><i class="fa fa-pencil" title="Edit"></i></a></h3>
    <div class="details-container" id="empInfo">
      <div class="detail-item">
        <p class="detail-label">Title</p>
        <p class="detail-value" id="title"></p>
      </div>
      <div class="detail-item">
        <p class="detail-label">Nick Name</p>
        <p class="detail-value" id="nick_name"></p>
      </div>
      <div class="detail-item">
        <p class="detail-label">Gender</p>
        <p class="detail-value" id="gender"></p>
      </div>
      <div class="detail-item">
        <p class="detail-label">Name</p>
        <p class="detail-value" id="firstName"></p>
      </div>
      <div class="detail-item">
        <p class="detail-label">Employee Login Username</p>
        <p class="detail-value" id="username"></p>
      </div>
      <div class="detail-item">
        <p class="detail-label">Mobile</p>
        <p class="detail-value" id="phone"></p>
      </div>
      <div class="detail-item">
        <p class="detail-label">Email</p>
        <p class="detail-value" id="email"></p>
      </div>
      <div class="detail-item">
        <p class="detail-label">Extension</p>
        <p class="detail-value" id="extension"></p>
      </div>
    </div>
  </div>

  {{-- Personal Info --}}
  @include('admin.employee.forms.empPersonalInfo')
  <div class="employee-details" id="empPersonalDetails">
    <h3>Personal  Information<a href="" class="edit-icon"><a href="javascript:void(0)" class="edit-icon editPersonalInfo empID" data-id=""><i class="fa fa-pencil" title="Edit"></i></a></h3>
    <div class="details-container">
    <div class="detail-item">
      <p class="detail-label">DOB</p>
      <p class="detail-value" id="dob"></p>
    </div>
    <div class="detail-item">
      <p class="detail-label">Birthday</p>
      <p class="detail-value" id="birth_day"></p>
    </div>
    <div class="detail-item">
      <p class="detail-label">Blood Group</p>
      <p class="detail-value" id="blood_group"></p>
    </div>
    <div class="detail-item">
      <p class="detail-label">Father's Name</p>
      <p class="detail-value" id="father_name"></p>
    </div>
    <div class="detail-item">
      <p class="detail-label">Marital Status</p>
      <p class="detail-value" id="marital_status"></p>
    </div>
    <div class="detail-item">
      <p class="detail-label">Marriage Date</p>
      <p class="detail-value" id="marital_date"></p>
    </div>
    <div class="detail-item">
      <p class="detail-label">Spouse Name</p>
      <p class="detail-value" id="spouse_name"></p>
    </div>
    <div class="detail-item">
      <p class="detail-label">Nationality</p>
      <p class="detail-value" id="nationality"></p>
    </div>
    <div class="detail-item">
      <p class="detail-label">Residential Status</p>
      <p class="detail-value" id="residential_status"></p>
    </div>
    
    <div class="detail-item">
      <p class="detail-label">Place of Birth</p>
      <p class="detail-value" id="place_of_birth"></p>
    </div>
    <div class="detail-item">
      <p class="detail-label">Country Of Origin</p>
      <p class="detail-value" id="country_of_origin"></p>
    </div>
    <div class="detail-item">
      <p class="detail-label">Religion</p>
      <p class="detail-value" id="religion"></p>
    </div>
    <div class="detail-item">
      <p class="detail-label">International Employee</p>
      <p class="detail-value" id="international_emp"></p>
    </div>
    <div class="detail-item">
      <p class="detail-label">Physically Challenged</p>
      <p class="detail-value" id="physically_challened"></p>
    </div>
    <div class="detail-item">
      <p class="detail-label">Is Director</p>
      <p class="detail-value" id="is_director"></p>
    </div>
    <div class="detail-item">
      <p class="detail-label">Personal Email</p>
      <p class="detail-value" id="personal_email"></p>
    </div>
    </div>
    </div>

    {{-- Joining Details --}}
    @include('admin.employee.forms.empJoiningInfo')
    <div class="employee-details" id="empJoiningDetails">
      <h3>Joining Details <a href="javascript:void(0)" class="edit-icon"><i class="fa fa-pencil editJoiningInfo empID" title="Edit"></i></a></h3>
      <div class="details-container">
      <div class="detail-item">
        <p class="detail-label">Joined On</p>
        <p class="detail-value" id="joining_Date"></p>
      </div>
      <div class="detail-item">
        <p class="detail-label">Confirmation Date</p>
        <p class="detail-value" id="join_confrimation_date"></p>
      </div>
      <div class="detail-item">
        <p class="detail-label">Status</p>
        <p class="detail-value" id="joining_status"></p>
      </div>
      <div class="detail-item">
        <p class="detail-label">Probation Period</p>
        <p class="detail-value" id="probation_period"></p>
      </div>
      <div class="detail-item">
        <p class="detail-label">Notice Period</p>
        <p class="detail-value" id="notice_period"></p>
      </div>
      <div class="detail-item">
        <p class="detail-label">Current Company Experience</p>
        <p class="detail-value" id="current_company_experience"></p>
      </div>
      <div class="detail-item">
        <p class="detail-label">Previous Experience</p>
        <p class="detail-value" id="pre_company_experiecne"></p>
      </div>
      <div class="detail-item">
        <p class="detail-label">Total Experience</p>
        <p class="detail-value" id="total_experience"></p>
      </div>
      <div class="detail-item">
        <p class="detail-label">Referred By</p>
        <p class="detail-value" id="referred_by"></p>
      </div>
      </div>
      </div>

      {{-- Current Position --}}
      @include('admin.employee.forms.empCurrentPosition')
      <div class="employee-details" id="empPositionDetails">
        <h3>Current Position <a href="javascript:void(0)" class="edit-icon"><i class="fa fa-pencil editPositionInfo empID" title="Edit"></i></a></h3>
        <div class="details-container">
        <div class="detail-item">
          <p class="detail-label">Division</p>
          <p class="detail-value" id="division"></p>
        </div>
        <div class="detail-item">
          <p class="detail-label">Grade</p>
          <p class="detail-value" id="grade"></p>
        </div>
        <div class="detail-item">
          <p class="detail-label">Department</p>
          <p class="detail-value" id="departmentName"></p>
        </div>
        <div class="detail-item">
          <p class="detail-label">Location</p>
          <p class="detail-value" id="location"></p>
        </div>
        <div class="detail-item">
          <p class="detail-label">Designation</p>
          <p class="detail-value" id="position_name"></p>
        </div>
        <div class="detail-item">
          <p class="detail-label">Reporting To</p>
          <p class="detail-value" id="reporting"></p>
        </div>
        <div class="detail-item">
          <p class="detail-label">Category</p>
          <p class="detail-value" id="role"></p>
        </div>
        <div class="detail-item">
          <p class="detail-label">Attendance Marking Option</p>
          <p class="detail-value" id="attendance_marking_option"></p>
        </div>
        </div>
        </div>

        {{-- Address --}}
        @include('admin.employee.forms.empAddress')
        <div class="employee-details" id="empAddressDetails">
          <h3>Present Address <a href="javascript:void(0)" class="edit-icon editPresentInfo empID"><i class="fa fa-pencil" title="Edit"></i></a></h3>
          <div class="details-container">
          
          <div class="detail-item">
            <p class="detail-label">Address</p>
            <p class="detail-value" id="address"></p>
          </div>
          <div class="detail-item">
            <p class="detail-label">City</p>
            <p class="detail-value" id="city"></p>
          </div>
          <div class="detail-item">
            <p class="detail-label">State</p>
            <p class="detail-value" id="state"></p>
          </div>
          <div class="detail-item">
            <p class="detail-label">Country</p>
            <p class="detail-value" id="country"></p>
          </div>
          <div class="detail-item">
            <p class="detail-label">Pincode</p>
            <p class="detail-value" id="pin"></p>
          </div>

          <div class="detail-item">
            <p class="detail-label">Phone1</p>
            <p class="detail-value" id="phone1"></p>
          </div>
          <div class="detail-item">
            <p class="detail-label">Phone2</p>
            <p class="detail-value" id="phone2"></p>
          </div>
          <div class="detail-item">
            <p class="detail-label">Ext</p>
            <p class="detail-value" id="extension"></p>
          </div>
          <div class="detail-item">
            <p class="detail-label">Fax</p>
            <p class="detail-value" id="fax"></p>
          </div>
          
          </div>
          </div>