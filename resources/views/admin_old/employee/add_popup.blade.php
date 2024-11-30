<div class="modal modal-blur fade" id="basic_info" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title">Basic Information <i id="emp_id"></i> </h5>
         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
       </div>
       <div class="modal-body">
         <form id="employeeForm" method="POST" enctype="multipart/form-data">
            @csrf
            {{-- <input type="hidden" name="email" class="employeeId" value="{{ $employee->email }}"> --}}
           <div class="row">
            <div class="col-sm-12">
              <div class="mb-3">
                <label class="mt-2 form-label">Employee ID</label>
                <input required name="employee_id" id="employee_id" class="form-control" value="" type="text" >
                <span class="error text-danger" id="employee_idError"></span>
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label class="mt-2 form-label">Title <span class="text-danger">*</span></label>
                <select name="title" id="title" class="form-select" >
                  <option value="Mr.">Mr.</option>
                  <option value="Ms.">Ms.</option>
                  <option value="Mrs.">Mrs.</option>
                  <option value="Dr.">Dr.</option>
                  <option value="Prof.">Prof.</option>
                </select>
                <span class="error text-danger" id="departmentError"></span>
              </div>
            </div>
 
             <div class="col-sm-6">
               <div class="mb-3">
                 <label class="mt-2 form-label">Nik Name</label>
                 <input name="nick_name" id="nick_name" class="form-control" value="" type="text" >
                 <span class="error text-danger" id="nick_nameError"></span>
               </div>
             </div>

             <div class="col-sm-6">
               <div class="mb-3">
                 <label class="mt-2 form-label">First Name <span class="text-danger">*</span></label>
                 <input name="firstName" id="firstName" class="form-control" type="text" >
                 <span class="error text-danger" id="firstnameError"></span>
               </div>
             </div>
 
             <div class="col-sm-6">
               <div class="mb-3">
                 <label class="mt-2 form-label">Last Name <span class="text-danger">*</span></label>
                 <input name="lastName" id="lastName" class="form-control" type="text" >
                 <span class="error text-danger" id="lastnameError"></span>
               </div>
             </div>
 
             <div class="col-sm-6">
               <div class="mb-3">
                 <label class="mt-2 form-label">Username <span class="text-danger">*</span></label>
                 <input name="username" id="username" class="form-control" type="text" >
                 <span class="error text-danger" id="usernameError"></span>
               </div>
             </div>
 
             <div class="col-sm-6">
               <div class="mb-3">
                 <label class="mt-2 form-label">Email <span class="text-danger">*</span></label>
                 <input name="email" id="email" class="form-control" type="email" >
                 <span class="error text-danger" id="emailError"></span>
               </div>
             </div>
 
             
 
             <div class="col-sm-6">
               <div class="mb-3">
                 <label class="mt-2 form-label">Phone</label>
                 <input name="phone" id="phone" class="form-control" type="text" >
                 <span class="error text-danger" id="phoneError"></span>
               </div>
             </div>
 
             
 
             <div class="col-md-6">
               <div class="mb-3">
                 <label class="mt-2 form-label">Gender <span class="text-danger">*</span></label>
                 <select name="gender" id="gender" class="form-select" >
                   <option value="male">Male</option>
                   <option value="female">Female</option>
                 </select>
                 <span class="error text-danger" id="designationError"></span>
               </div>
             </div>
 
             <div class="col-md-6">
               <div class="mb-3">
                 <label class="mt-2 form-label">Extension</label>
                 <input class="form-control" id="extension" name="extension" type="text" >
                 <span class="error text-danger" id="extensionError"></span>
               </div>
             </div>

             <div class="col-md-6">
               <div class="mb-3">
                 <label class="mt-2 form-label">Password</label>
                 <input class="form-control" id="password" name="password" type="password" >
                 <span class="error text-danger" id="extensionError"></span>
               </div>
             </div>
 
             {{-- <div class="col-md-12">
               <div class="mb-3">
                 <label class="mt-2 form-label">Employee Picture</label>
                 <input class="form-control" name="picture" type="file">
                 <span class="error text-danger" id="pictureError"></span>
                 <img id="previewImage" src="" alt="User Image" class="img-fluid" style="display:none;" height="80px" width="100px">
               </div>
             </div> --}}
           </div>
 
           <div class="mt-3 modal-footer">
             {{-- <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">Cancel</a> --}}
             <button type="submit" id="updating" class="btn btn-primary submit-btn">Save</button>
           </div>
         </form>
       </div>
     </div>
   </div>
 </div>
 

 {{-- Personal Model --}}
 <div class="modal modal-blur fade" id="employeePersonalInfo" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Personal Information <i id="emp_id"></i> </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="employeePersonalInfoForm" method="POST"  enctype="multipart/form-data">
          @csrf
          
          <div class="row">

           <div class="col-md-6">
             <div class="mb-3">
               <label class="mt-2 form-label">DOB <span class="text-danger">*</span></label>
               <input name="dob" id="dob" class="form-control" type="date" >
        
             </div>
           </div>

            <div class="col-sm-6">
              <div class="mb-3">
                <label class="mt-2 form-label">Birthday <span class="text-danger">*</span></label>
                <input name="birth_day" id="birth_day" class="form-control" type="text" >
                <span class="error text-danger" id="nick_nameError"></span>
              </div>
            </div>

            <div class="col-sm-6">
              <div class="mb-3">
                <label class="mt-2 form-label">Blood Group<span class="text-danger">*</span></label>
                <input name="blood_group" id="blood_group" class="form-control" type="text" >
                <span class="error text-danger" id="blood_groupError"></span>
              </div>
            </div>

            <div class="col-sm-6">
              <div class="mb-3">
                <label class="mt-2 form-label">Father's Name <span class="text-danger">*</span></label>
                <input name="father_name" id="father_name" class="form-control" type="text" >
                <span class="error text-danger" id="father_nameError"></span>
              </div>
            </div>

            <div class="col-sm-6">
              <div class="mb-3">
                <label class="mt-2 form-label">Marital Status <span class="text-danger">*</span></label>
                <input name="marital_status" id="marital_status" class="form-control" type="text" >
                <span class="error text-danger" id="marital_statusError"></span>
              </div>
            </div>

            <div class="col-sm-6">
              <div class="mb-3">
                <label class="mt-2 form-label">Marital Date <span class="text-danger">*</span></label>
                <input name="marital_date" id="marital_date" class="form-control" type="date" >
                <span class="error text-danger" id="emailError"></span>
              </div>
            </div>

            

            <div class="col-sm-6">
              <div class="mb-3">
                <label class="mt-2 form-label">Spouse Name</label>
                <input name="spouse_name" id="spouse_name" class="form-control" type="text" >
                <span class="error text-danger" id="spouse_nameError"></span>
              </div>
            </div>

            

            <div class="col-sm-6">
              <div class="mb-3">
                <label class="mt-2 form-label">Nationality</label>
                <input name="nationality" id="nationality" class="form-control" type="text" >
                <span class="error text-danger" id="nationalityError"></span>
              </div>
            </div>

            <div class="col-md-6">
              <div class="mb-3">
                <label class="mt-2 form-label">Residential Status</label>
                <input class="form-control" id="residential_status" name="residential_status" type="text" >
                <span class="error text-danger" id="extensionError"></span>
              </div>
            </div>

            <div class="col-md-6">
              <div class="mb-3">
                <label class="mt-2 form-label">Place of Birth</label>
                <input class="form-control" id="place_of_birth" name="place_of_birth" type="text" >
                <span class="error text-danger" id="extensionError"></span>
              </div>
            </div>

            <div class="col-md-6">
              <div class="mb-3">
                <label class="mt-2 form-label">Country of Origin</label>
                <input class="form-control" id="country_of_origin" name="country_of_origin" type="text" >
                <span class="error text-danger" id="extensionError"></span>
              </div>
            </div>


            <div class="col-md-6">
              <div class="mb-3">
                <label class="mt-2 form-label">Religion</label>
                <input class="form-control" id="religion" name="religion" type="text" >
                <span class="error text-danger" id="extensionError"></span>
              </div>
            </div>


            <div class="col-md-6">
              <div class="mb-3">
                <label class="mt-2 form-label">Physically Challenged</label>
                <input class="form-control" id="physically_challened" name="physically_challened" type="text" >
                <span class="error text-danger" id="extensionError"></span>
              </div>
            </div>

            <div class="col-md-6">
              <div class="mb-3">
                <label class="mt-2 form-label">Is Director</label>
                <input class="form-control" id="is_director" name="is_director" type="text" >
                <span class="error text-danger" id="extensionError"></span>
              </div>
            </div>

            <div class="col-md-6">
              <div class="mb-3">
                <label class="mt-2 form-label">Personal Email</label>
                <input class="form-control" id="personal_email" name="personal_email" type="text" >
                <span class="error text-danger" id="extensionError"></span>
              </div>
            </div>

            {{-- <div class="col-md-12">
              <div class="mb-3">
                <label class="mt-2 form-label">Employee Picture</label>
                <input class="form-control" name="picture" type="file">
                <span class="error text-danger" id="pictureError"></span>
                <img id="previewImage" src="" alt="User Image" class="img-fluid" style="display:none;" height="80px" width="100px">
              </div>
            </div> --}}
          </div>

          <div class="mt-3 modal-footer">
            {{-- <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">Cancel</a> --}}
            <button type="submit" id="" class="btn btn-primary submit-btn updating">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
{{-- end --}}

{{-- Joining Details --}}
 <div class="modal modal-blur fade" id="employeeJoiningInfo" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Joining Details <i id="emp_id"></i> </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="employeeJoiningInfoForm" method="POST"  enctype="multipart/form-data">
          @csrf
      
          <div class="row">

           <div class="col-md-6">
             <div class="mb-3">
               <label class="mt-2 form-label">Joined On <span class="text-danger">*</span></label>
               <input name="joining_Date" id="joining_Date" class="form-control" type="date" >
        
             </div>
           </div>

            <div class="col-sm-6">
              <div class="mb-3">
                <label class="mt-2 form-label">Confirmation Date <span class="text-danger">*</span></label>
                <input name="join_confrimation_date" id="join_confrimation_date" class="form-control" type="date" >
                <span class="error text-danger" id="nick_nameError"></span>
              </div>
            </div>

            <div class="col-sm-6">
              <div class="mb-3">
                <label class="mt-2 form-label">Status<span class="text-danger">*</span></label>
                <input name="joining_status" id="joining_status" class="form-control" type="text" >
                <span class="error text-danger" id="joining_statusError"></span>
              </div>
            </div>

            <div class="col-sm-6">
              <div class="mb-3">
                <label class="mt-2 form-label">Probation Period <span class="text-danger">*</span></label>
                <input name="probation_period" id="probation_period" class="form-control" type="text" >
                <span class="error text-danger" id="probation_periodError"></span>
              </div>
            </div>

            <div class="col-sm-6">
              <div class="mb-3">
                <label class="mt-2 form-label">Notice Period<span class="text-danger">*</span></label>
                <input name="notice_period" id="notice_period" class="form-control" type="text" >
                <span class="error text-danger" id="notice_periodError"></span>
              </div>
            </div>

            <div class="col-sm-6">
              <div class="mb-3">
                <label class="mt-2 form-label">Current Company Experience<span class="text-danger">*</span></label>
                <input name="current_company_experience" id="current_company_experience" class="form-control" type="text" >
                <span class="error text-danger" id="emailError"></span>
              </div>
            </div>

            

            <div class="col-sm-6">
              <div class="mb-3">
                <label class="mt-2 form-label">Previous Experience</label>
                <input name="pre_company_experiecne" id="pre_company_experiecne" class="form-control" type="text" >
                <span class="error text-danger" id="pre_company_experiecneError"></span>
              </div>
            </div>

            

            <div class="col-sm-6">
              <div class="mb-3">
                <label class="mt-2 form-label">Total Experience</label>
                <input name="total_experience" id="total_experience" class="form-control" type="text" >
                <span class="error text-danger" id="total_experienceError"></span>
              </div>
            </div>

            <div class="col-md-6">
              <div class="mb-3">
                <label class="mt-2 form-label">Referred By</label>
                <input class="form-control" id="referred_by" name="referred_by" type="text" >
                <span class="error text-danger" id="extensionError"></span>
              </div>
            </div>

          </div>

          <div class="mt-3 modal-footer">
            {{-- <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">Cancel</a> --}}
            <button type="submit" id="" class="btn btn-primary submit-btn updating">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
{{-- end --}}

{{-- Current Position --}}
<div class="modal modal-blur fade" id="employeePositionInfo" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Current Position <i id="emp_id"></i> </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="employeePositoinForm" method="POST" enctype="multipart/form-data">
          @csrf
          <input type="hidden" class="employeeId" name="id">

          <div class="row">

           <div class="col-md-6">
             <div class="mb-3">
               <label class="mt-2 form-label">Division <span class="text-danger">*</span></label>
               <input name="division" id="division" class="form-control" type="text" >
        
             </div>
           </div>

            <div class="col-sm-6">
              <div class="mb-3">
                <label class="mt-2 form-label">Grade<span class="text-danger">*</span></label>
                <input name="grade" id="grade" class="form-control" type="text" >
                <span class="error text-danger" id="nick_nameError"></span>
              </div>
            </div>

            <div class="col-sm-6">
              <div class="mb-3">
                <label class="mt-2 form-label">Department<span class="text-danger">*</span></label>
                {{-- <input name="city" id="department_select" class="form-control" type="text" > --}}
                <select name="department" id="department_select" class="form-control">
                  @foreach ($department as $val)
                    
                  <option value="{{$val->id}}">{{$val->name}}</option>
                  @endforeach
                </select>
                <span class="error text-danger" id="cityError"></span>
              </div>
            </div>

            <div class="col-sm-6">
              <div class="mb-3">
                <label class="mt-2 form-label">Designation<span class="text-danger">*</span></label>
                <select name="designation_id" id="designation_select" class="form-control">
                  @foreach ($designation as $val)
                    
                  <option value="{{$val->id}}">{{$val->name}}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="col-sm-6">
              <div class="mb-3">
                <label class="mt-2 form-label">Location <span class="text-danger">*</span></label>
                <input name="location" id="location" class="form-control" type="text" >
                <span class="error text-danger" id="stateError"></span>
              </div>
            </div>

            <div class="col-sm-6">
              <div class="mb-3">
                <label class="mt-2 form-label">Reporting To<span class="text-danger">*</span></label>
                <input name="reporting" id="reporting" class="form-control" type="text" >
                <span class="error text-danger" id="reportingError"></span>
              </div>
            </div>

            {{-- <div class="col-sm-6">
              <div class="mb-3">
                <label class="mt-2 form-label">Category<span class="text-danger">*</span></label>
                <input name="role" id="role" class="form-control" type="text" >
                <span class="error text-danger" id="emailError"></span>
              </div>
            </div> --}}

            

            <div class="col-sm-6">
              <div class="mb-3">
                <label class="mt-2 form-label">Attendance Marking Option</label>
                <input name="attendance_marking_option" id="attendance_marking_option" class="form-control" type="text" >
                <span class="error text-danger" id="attendance_marking_optionError"></span>
              </div>
            </div>


          </div>

          <div class="mt-3 modal-footer">
            {{-- <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">Cancel</a> --}}
            <button type="submit" id="" class="btn btn-primary submit-btn updating">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
{{-- end --}}

{{-- Present Address --}}
<div class="modal modal-blur fade" id="employeeAddressInfo" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Present Address <i id="emp_id"></i> </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="employeePresentAddressForm" method="POST" enctype="multipart/form-data">
          @csrf
         

          <div class="row">

           {{-- <div class="col-md-6">
             <div class="mb-3">
               <label class="mt-2 form-label">Name <span class="text-danger">*</span></label>
               <input name="" id="" class="form-control" type="date" >
        
             </div>
           </div> --}}

            <div class="col-sm-6">
              <div class="mb-3">
                <label class="mt-2 form-label">Address<span class="text-danger">*</span></label>
                <input name="address" id="address" class="form-control" type="text" >
                <span class="error text-danger" id="nick_nameError"></span>
              </div>
            </div>

            <div class="col-sm-6">
              <div class="mb-3">
                <label class="mt-2 form-label">City<span class="text-danger">*</span></label>
                <input name="city" id="city" class="form-control" type="text" >
                <span class="error text-danger" id="cityError"></span>
              </div>
            </div>

            <div class="col-sm-6">
              <div class="mb-3">
                <label class="mt-2 form-label">State <span class="text-danger">*</span></label>
                <input name="state" id="state" class="form-control" type="text" >
                <span class="error text-danger" id="stateError"></span>
              </div>
            </div>

            <div class="col-sm-6">
              <div class="mb-3">
                <label class="mt-2 form-label">Country<span class="text-danger">*</span></label>
                <input name="country" id="country" class="form-control" type="text" >
                <span class="error text-danger" id="countryError"></span>
              </div>
            </div>

            <div class="col-sm-6">
              <div class="mb-3">
                <label class="mt-2 form-label">Pincode<span class="text-danger">*</span></label>
                <input name="pin" id="pin" class="form-control" type="text" >
                <span class="error text-danger" id="emailError"></span>
              </div>
            </div>

            

            <div class="col-sm-6">
              <div class="mb-3">
                <label class="mt-2 form-label">Phone1</label>
                <input name="phone1" id="phone1" class="form-control" type="text" >
                <span class="error text-danger" id="phone1Error"></span>
              </div>
            </div>

            

            <div class="col-sm-6">
              <div class="mb-3">
                <label class="mt-2 form-label">Phone2</label>
                <input name="phone2" id="phone2" class="form-control" type="text" >
                <span class="error text-danger" id="phone2Error"></span>
              </div>
            </div>

            <div class="col-md-6">
              <div class="mb-3">
                <label class="mt-2 form-label">Ext</label>
                <input class="form-control" id="extension" name="extension" type="text" >
                <span class="error text-danger" id="extensionError"></span>
              </div>
            </div>

            <div class="col-md-6">
              <div class="mb-3">
                <label class="mt-2 form-label">Fax</label>
                <input class="form-control" id="fax" name="fax" type="text" >
                <span class="error text-danger" id="extensionError"></span>
              </div>
            </div>



            <div class="col-md-6">
              <div class="mb-3">
                <label class="mt-2 form-label">Mobile</label>
                <input class="form-control" id="phone" name="phone" type="text" >
                <span class="error text-danger" id="extensionError"></span>
              </div>
            </div>


            <div class="col-md-6">
              <div class="mb-3">
                <label class="mt-2 form-label">Emial</label>
                <input class="form-control" id="personal_email " name="personal_email " type="text" >
                <span  class="error text-danger" id="extensionError"></span>
              </div>
            </div>

          </div>

          <div class="mt-3 modal-footer">
            {{-- <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">Cancel</a> --}}
            <button type="submit" id="" class="btn btn-primary submit-btn updating">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
{{-- end --}}

