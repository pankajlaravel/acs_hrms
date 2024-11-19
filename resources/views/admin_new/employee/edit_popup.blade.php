<div class="modal modal-blur fade" id="edit_employee" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title">Edit Employee Information <i id="emp_id"></i> </h5>
         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
       </div>
       <div class="modal-body">
         <form id="employeeInfoEditForm" method="PUT" enctype="multipart/form-data">
           @csrf
           <input type="hidden" id="employeeId" name="id">
           <input type="hidden" id="emp_image" name="emp_image">
 
           <div class="row">

            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label mt-2">Title <span class="text-danger">*</span></label>
                <select name="title" id="title" class="form-select" required>
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
                 <label class="form-label mt-2">Nik Name</label>
                 <input name="nick_name" id="nick_name" class="form-control" type="text" required>
                 <span class="error text-danger" id="nick_nameError"></span>
               </div>
             </div>

             <div class="col-sm-6">
               <div class="mb-3">
                 <label class="form-label mt-2">First Name <span class="text-danger">*</span></label>
                 <input name="firstName" id="firstName" class="form-control" type="text" required>
                 <span class="error text-danger" id="firstnameError"></span>
               </div>
             </div>
 
             <div class="col-sm-6">
               <div class="mb-3">
                 <label class="form-label mt-2">Last Name <span class="text-danger">*</span></label>
                 <input name="lastName" id="lastName" class="form-control" type="text" required>
                 <span class="error text-danger" id="lastnameError"></span>
               </div>
             </div>
 
             <div class="col-sm-6">
               <div class="mb-3">
                 <label class="form-label mt-2">Username <span class="text-danger">*</span></label>
                 <input name="username" id="username" class="form-control" type="text" required>
                 <span class="error text-danger" id="usernameError"></span>
               </div>
             </div>
 
             <div class="col-sm-6">
               <div class="mb-3">
                 <label class="form-label mt-2">Email <span class="text-danger">*</span></label>
                 <input name="email" id="email" class="form-control" type="email" required>
                 <span class="error text-danger" id="emailError"></span>
               </div>
             </div>
 
             
 
             <div class="col-sm-6">
               <div class="mb-3">
                 <label class="form-label mt-2">Phone</label>
                 <input name="phone" id="phone" class="form-control" type="text" required>
                 <span class="error text-danger" id="phoneError"></span>
               </div>
             </div>
 
             
 
             <div class="col-md-6">
               <div class="mb-3">
                 <label class="form-label mt-2">Gender <span class="text-danger">*</span></label>
                 <select name="gender" id="gender" class="form-select" required>
                   <option value="male">Male</option>
                   <option value="female">Female</option>
                 </select>
                 <span class="error text-danger" id="designationError"></span>
               </div>
             </div>
 
             <div class="col-md-12">
               <div class="mb-3">
                 <label class="form-label mt-2">Extension</label>
                 <input class="form-control" id="extension" name="extension" type="text" required>
                 <span class="error text-danger" id="extensionError"></span>
               </div>
             </div>
 
             {{-- <div class="col-md-12">
               <div class="mb-3">
                 <label class="form-label mt-2">Employee Picture</label>
                 <input class="form-control" name="picture" type="file">
                 <span class="error text-danger" id="pictureError"></span>
                 <img id="previewImage" src="" alt="User Image" class="img-fluid" style="display:none;" height="80px" width="100px">
               </div>
             </div> --}}
           </div>
 
           <div class="modal-footer mt-3">
             {{-- <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">Cancel</a> --}}
             <button type="submit" id="updating" class="btn btn-primary submit-btn">Update</button>
           </div>
         </form>
       </div>
     </div>
   </div>
 </div>
 

 {{-- Personal Model --}}
 <div class="modal modal-blur fade" id="editPersonalInfo" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Personal Information <i id="emp_id"></i> </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="employeePersonalInfoEditForm" method="PUT" enctype="multipart/form-data">
          @csrf
          <input type="hidden" class="employeeId" name="id">

          <div class="row">

           <div class="col-md-6">
             <div class="mb-3">
               <label class="form-label mt-2">DOB <span class="text-danger">*</span></label>
               <input name="dob" id="dob" class="form-control" type="date" >
        
             </div>
           </div>

            <div class="col-sm-6">
              <div class="mb-3">
                <label class="form-label mt-2">Birthday <span class="text-danger">*</span></label>
                <input name="birth_day" id="birth_day" class="form-control" type="text" >
                <span class="error text-danger" id="nick_nameError"></span>
              </div>
            </div>

            <div class="col-sm-6">
              <div class="mb-3">
                <label class="form-label mt-2">Blood Group<span class="text-danger">*</span></label>
                <input name="blood_group" id="blood_group" class="form-control" type="text" >
                <span class="error text-danger" id="blood_groupError"></span>
              </div>
            </div>

            <div class="col-sm-6">
              <div class="mb-3">
                <label class="form-label mt-2">Father's Name <span class="text-danger">*</span></label>
                <input name="father_name" id="father_name" class="form-control" type="text" >
                <span class="error text-danger" id="father_nameError"></span>
              </div>
            </div>

            <div class="col-sm-6">
              <div class="mb-3">
                <label class="form-label mt-2">Marital Status <span class="text-danger">*</span></label>
                <input name="marital_status" id="marital_status" class="form-control" type="text" >
                <span class="error text-danger" id="marital_statusError"></span>
              </div>
            </div>

            <div class="col-sm-6">
              <div class="mb-3">
                <label class="form-label mt-2">Marital Date <span class="text-danger">*</span></label>
                <input name="marital_date" id="marital_date" class="form-control" type="date" >
                <span class="error text-danger" id="emailError"></span>
              </div>
            </div>

            

            <div class="col-sm-6">
              <div class="mb-3">
                <label class="form-label mt-2">Spouse Name</label>
                <input name="spouse_name" id="spouse_name" class="form-control" type="text" >
                <span class="error text-danger" id="spouse_nameError"></span>
              </div>
            </div>

            

            <div class="col-sm-6">
              <div class="mb-3">
                <label class="form-label mt-2">Nationality</label>
                <input name="nationality" id="nationality" class="form-control" type="text" >
                <span class="error text-danger" id="nationalityError"></span>
              </div>
            </div>

            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label mt-2">Residential Status</label>
                <input class="form-control" id="residential_status" name="residential_status" type="text" >
                <span class="error text-danger" id="extensionError"></span>
              </div>
            </div>

            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label mt-2">Place of Birth</label>
                <input class="form-control" id="place_of_birth" name="place_of_birth" type="text" >
                <span class="error text-danger" id="extensionError"></span>
              </div>
            </div>

            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label mt-2">Country of Origin</label>
                <input class="form-control" id="country_of_origin" name="country_of_origin" type="text" >
                <span class="error text-danger" id="extensionError"></span>
              </div>
            </div>


            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label mt-2">Religion</label>
                <input class="form-control" id="religion" name="religion" type="text" >
                <span class="error text-danger" id="extensionError"></span>
              </div>
            </div>


            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label mt-2">Physically Challenged</label>
                <input class="form-control" id="physically_challened" name="physically_challened" type="text" >
                <span class="error text-danger" id="extensionError"></span>
              </div>
            </div>

            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label mt-2">Is Director</label>
                <input class="form-control" id="is_director" name="is_director" type="text" >
                <span class="error text-danger" id="extensionError"></span>
              </div>
            </div>

            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label mt-2">Personal Email</label>
                <input class="form-control" id="personal_email" name="personal_email" type="text" >
                <span class="error text-danger" id="extensionError"></span>
              </div>
            </div>

            {{-- <div class="col-md-12">
              <div class="mb-3">
                <label class="form-label mt-2">Employee Picture</label>
                <input class="form-control" name="picture" type="file">
                <span class="error text-danger" id="pictureError"></span>
                <img id="previewImage" src="" alt="User Image" class="img-fluid" style="display:none;" height="80px" width="100px">
              </div>
            </div> --}}
          </div>

          <div class="modal-footer mt-3">
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
 <div class="modal modal-blur fade" id="editJoiningInfo" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Joining Details <i id="emp_id"></i> </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="employeeJoiningInfoEditForm" method="PUT" enctype="multipart/form-data">
          @csrf
          <input type="hidden" class="employeeId" name="id">

          <div class="row">

           <div class="col-md-6">
             <div class="mb-3">
               <label class="form-label mt-2">Joined On <span class="text-danger">*</span></label>
               <input name="joining_Date" id="joining_Date" class="form-control" type="date" >
        
             </div>
           </div>

            <div class="col-sm-6">
              <div class="mb-3">
                <label class="form-label mt-2">Confirmation Date <span class="text-danger">*</span></label>
                <input name="join_confrimation_date" id="join_confrimation_date" class="form-control" type="date" >
                <span class="error text-danger" id="nick_nameError"></span>
              </div>
            </div>

            <div class="col-sm-6">
              <div class="mb-3">
                <label class="form-label mt-2">Status<span class="text-danger">*</span></label>
                <input name="joining_status" id="joining_status" class="form-control" type="text" >
                <span class="error text-danger" id="joining_statusError"></span>
              </div>
            </div>

            <div class="col-sm-6">
              <div class="mb-3">
                <label class="form-label mt-2">Probation Period <span class="text-danger">*</span></label>
                <input name="probation_period" id="probation_period" class="form-control" type="text" >
                <span class="error text-danger" id="probation_periodError"></span>
              </div>
            </div>

            <div class="col-sm-6">
              <div class="mb-3">
                <label class="form-label mt-2">Notice Period<span class="text-danger">*</span></label>
                <input name="notice_period" id="notice_period" class="form-control" type="text" >
                <span class="error text-danger" id="notice_periodError"></span>
              </div>
            </div>

            <div class="col-sm-6">
              <div class="mb-3">
                <label class="form-label mt-2">Current Company Experience<span class="text-danger">*</span></label>
                <input name="current_company_experience" id="current_company_experience" class="form-control" type="text" >
                <span class="error text-danger" id="emailError"></span>
              </div>
            </div>

            

            <div class="col-sm-6">
              <div class="mb-3">
                <label class="form-label mt-2">Previous Experience</label>
                <input name="pre_company_experiecne" id="pre_company_experiecne" class="form-control" type="text" >
                <span class="error text-danger" id="pre_company_experiecneError"></span>
              </div>
            </div>

            

            <div class="col-sm-6">
              <div class="mb-3">
                <label class="form-label mt-2">Total Experience</label>
                <input name="total_experience" id="total_experience" class="form-control" type="text" >
                <span class="error text-danger" id="total_experienceError"></span>
              </div>
            </div>

            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label mt-2">Referred By</label>
                <input class="form-control" id="referred_by" name="referred_by" type="text" >
                <span class="error text-danger" id="extensionError"></span>
              </div>
            </div>

          </div>

          <div class="modal-footer mt-3">
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
<div class="modal modal-blur fade" id="editPresentInfo" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Present Address <i id="emp_id"></i> </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="employeePresentAddressEditForm" method="PUT" enctype="multipart/form-data">
          @csrf
          <input type="hidden" class="employeeId" name="id">

          <div class="row">

           <div class="col-md-6">
             <div class="mb-3">
               <label class="form-label mt-2">Name <span class="text-danger">*</span></label>
               <input name="" id="" class="form-control" type="date" >
        
             </div>
           </div>

            <div class="col-sm-6">
              <div class="mb-3">
                <label class="form-label mt-2">Address<span class="text-danger">*</span></label>
                <input name="address" id="address" class="form-control" type="text" >
                <span class="error text-danger" id="nick_nameError"></span>
              </div>
            </div>

            <div class="col-sm-6">
              <div class="mb-3">
                <label class="form-label mt-2">City<span class="text-danger">*</span></label>
                <input name="city" id="city" class="form-control" type="text" >
                <span class="error text-danger" id="cityError"></span>
              </div>
            </div>

            <div class="col-sm-6">
              <div class="mb-3">
                <label class="form-label mt-2">State <span class="text-danger">*</span></label>
                <input name="state" id="state" class="form-control" type="text" >
                <span class="error text-danger" id="stateError"></span>
              </div>
            </div>

            <div class="col-sm-6">
              <div class="mb-3">
                <label class="form-label mt-2">Country<span class="text-danger">*</span></label>
                <input name="country" id="country" class="form-control" type="text" >
                <span class="error text-danger" id="countryError"></span>
              </div>
            </div>

            <div class="col-sm-6">
              <div class="mb-3">
                <label class="form-label mt-2">Pincode<span class="text-danger">*</span></label>
                <input name="pin" id="pin" class="form-control" type="text" >
                <span class="error text-danger" id="emailError"></span>
              </div>
            </div>

            

            <div class="col-sm-6">
              <div class="mb-3">
                <label class="form-label mt-2">Phone1</label>
                <input name="phone1" id="phone1" class="form-control" type="text" >
                <span class="error text-danger" id="phone1Error"></span>
              </div>
            </div>

            

            <div class="col-sm-6">
              <div class="mb-3">
                <label class="form-label mt-2">Phone2</label>
                <input name="phone2" id="phone2" class="form-control" type="text" >
                <span class="error text-danger" id="phone2Error"></span>
              </div>
            </div>

            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label mt-2">Ext</label>
                <input class="form-control" id="extension" name="extension" type="text" >
                <span class="error text-danger" id="extensionError"></span>
              </div>
            </div>

            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label mt-2">Fax</label>
                <input class="form-control" id="fax" name="fax" type="text" >
                <span class="error text-danger" id="extensionError"></span>
              </div>
            </div>



            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label mt-2">Mobile</label>
                <input class="form-control" id="phone" name="phone" type="text" >
                <span class="error text-danger" id="extensionError"></span>
              </div>
            </div>


            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label mt-2">Emial</label>
                <input class="form-control" id="personal_email " name="personal_email " type="text" >
                <span  class="error text-danger" id="extensionError"></span>
              </div>
            </div>

          </div>

          <div class="modal-footer mt-3">
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
<div class="modal modal-blur fade" id="editPositionInfo" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Current Position <i id="emp_id"></i> </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="employeePositoinEditForm" method="PUT" enctype="multipart/form-data">
          @csrf
          <input type="hidden" class="employeeId" name="id">

          <div class="row">

           <div class="col-md-6">
             <div class="mb-3">
               <label class="form-label mt-2">Division <span class="text-danger">*</span></label>
               <input name="division" id="division" class="form-control" type="text" >
        
             </div>
           </div>

            <div class="col-sm-6">
              <div class="mb-3">
                <label class="form-label mt-2">Grade<span class="text-danger">*</span></label>
                <input name="grade" id="grade" class="form-control" type="text" >
                <span class="error text-danger" id="nick_nameError"></span>
              </div>
            </div>

            <div class="col-sm-6">
              <div class="mb-3">
                <label class="form-label mt-2">Department<span class="text-danger">*</span></label>
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
                <label class="form-label mt-2">Designation<span class="text-danger">*</span></label>
                <select name="position" id="designation_select" class="form-control">
                  @foreach ($designation as $val)
                    
                  <option value="{{$val->id}}">{{$val->name}}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="col-sm-6">
              <div class="mb-3">
                <label class="form-label mt-2">Location <span class="text-danger">*</span></label>
                <input name="location" id="location" class="form-control" type="text" >
                <span class="error text-danger" id="stateError"></span>
              </div>
            </div>

            <div class="col-sm-6">
              <div class="mb-3">
                <label class="form-label mt-2">Reporting To<span class="text-danger">*</span></label>
                <input name="reporting" id="reporting" class="form-control" type="text" >
                <span class="error text-danger" id="reportingError"></span>
              </div>
            </div>

            <div class="col-sm-6">
              <div class="mb-3">
                <label class="form-label mt-2">Category<span class="text-danger">*</span></label>
                <input name="role" id="role" class="form-control" type="text" >
                <span class="error text-danger" id="emailError"></span>
              </div>
            </div>

            

            <div class="col-sm-6">
              <div class="mb-3">
                <label class="form-label mt-2">Attendance Marking Option</label>
                <input name="attendance_marking_option" id="attendance_marking_option" class="form-control" type="text" >
                <span class="error text-danger" id="attendance_marking_optionError"></span>
              </div>
            </div>


          </div>

          <div class="modal-footer mt-3">
            {{-- <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">Cancel</a> --}}
            <button type="submit" id="" class="btn btn-primary submit-btn updating">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
{{-- end --}}