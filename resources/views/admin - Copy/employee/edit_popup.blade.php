   
<div id="edit_employee" class="modal custom-modal fade" role="dialog">
   <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Edit Employee</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <form id="employeeEditForm" method="PUT" enctype="multipart/form-data">
            @csrf
            <input type="hidden" id="employeeId" name="id">
            <input type="hidden" id="emp_image" name="emp_image">
            {{-- <select id="">
               <option value="">Select Department</option>
           </select> --}}
               <div class="row">
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label class="col-form-label">First Name <span class="text-danger" >*</span></label>
                        <input name="firstName" id="firstName"  class="form-control" type="text" required>
                        <span class="error text-danger"  id="firstnameError"></span> <!-- Error message area -->
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label class="col-form-label">Last Name</label>
                        <input name="lastName" id="lastName" class="form-control" type="text" required>
                        <span class="error text-danger" id="lastnameError"></span> <!-- Error message area -->
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label class="col-form-label">Username <span class="text-danger" id="firstnameError">*</span></label>
                        <input name="username" id="username" class="form-control" type="text" required>
                        <span class="error text-danger" id="usernameError"></span> <!-- Error message area -->
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label class="col-form-label">Email <span class="text-danger" id="firstnameError">*</span></label>
                        <input name="email" id="email"  class="form-control" type="email">
                        <span class="error text-danger" id="emailError"></span> <!-- Error message area -->
                     </div>
                  </div>
                  {{-- <div class="col-sm-6">
                     <div class="form-group">
                        <label class="col-form-label">Password</label>
                        <input class="form-control"  name="password" type="password">
                        <span class="error text-danger" id="passwordError"></span> <!-- Error message area -->
                     </div>
                  </div> --}}
                  {{-- <div class="col-sm-6">
                     <div class="form-group">
                        <label class="col-form-label">Confirm Password</label>
                        <input class="form-control"  name="password_confirmation" type="password">
                        <span class="error text-danger" id="confirmationError"></span> <!-- Error message area -->
                     </div>
                  </div> --}}
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label class="col-form-label">Employee ID <span class="text-danger" id="firstnameError">*</span></label>
                        <input name="employee_id" id="emp_id" readonly type="text" required  class="form-control">
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label class="col-form-label">Phone </label>
                        <input name="phone" id="phone" class="form-control" type="text" required>
                        <span class="error text-danger" id="phoneError"></span> <!-- Error message area -->
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <label class="form-label mt-2">Department <span class="text-danger" >*</span></label>
                        <select  name="department" id="department_select" class="form-select departmentName" required>
                           
                           @foreach ($department as $val)
                              <option value="{{$val['id']}}">{{$val['name']}}</option>
                           @endforeach
                        </select>
                        <span class="error text-danger" id="departmentError"></span> <!-- Error message area -->
                     </div>
                  </div>
                  {{-- <div class="" id="search_results"></div> --}}

                  <div class="col-md-6">
                     <div class="form-group">
                        <label class="form-label mt-2">Designation <span class="text-danger" >*</span></label>
                        <select  name="position" id="designation_select" class="form-select" required >
                           @foreach ($designation as $val)
                              <option value="{{$val['id']}}">{{$val['name']}}</option>
                           @endforeach
                           
                        </select>
                        <span class="error text-danger" id="designationError"></span> <!-- Error message area -->
                     </div>
                  </div>

                  <div class="col-md-12">
                     <div class="form-group">
                        <label class="col-form-label">Joining Date</label>
                        <input class="form-control" id="joining_Date" name="joining_Date" type="date" required>
                        <span class="error text-danger" id="joining_DateError"></span> <!-- Error message area -->
                     </div>
                  </div>
                  
                  <div class="col-md-12">
                     <div class="form-group">
                        <label class="col-form-label">Employee Picture</label>
                        <input class="form-control"  name="picture" type="file" >
                        <span class="error text-danger" id="pictureError"></span>
        
                        <img id="previewImage" src="" alt="User Image" class="img-fluid" style="display:none;" height="80px" width="100px">
                     </div>
                  </div>
               </div>
               <div class="modal-footer mt-3">
                  <button type="submit" id="updating"  class="btn btn-primary submit-btn">Update</button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>