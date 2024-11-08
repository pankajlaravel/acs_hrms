<div id="success-message" style="display:none;"></div>
<div id="add_employee" class="modal custom-modal fade" role="dialog">
   <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Add Employee</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <form data-action='{{route("admin.employee.store")}}' id="employeeForm" method="POST" enctype="multipart/form-data">
            @csrf
               <div class="row">
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label class="col-form-label">First Name <span class="text-danger" >*</span></label>
                        <input name="firstName"  class="form-control" type="text">
                        <span class="error text-danger"  id="firstnameError"></span> <!-- Error message area -->
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label class="col-form-label">Last Name</label>
                        <input name="lastName" class="form-control" type="text">
                        <span class="error text-danger" id="lastnameError"></span> <!-- Error message area -->
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label class="col-form-label">Username <span class="text-danger" id="firstnameError">*</span></label>
                        <input name="username"  class="form-control" type="text">
                        <span class="error text-danger" id="usernameError"></span> <!-- Error message area -->
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label class="col-form-label">Email <span class="text-danger" id="firstnameError">*</span></label>
                        <input name="email"  class="form-control" type="email">
                        <span class="error text-danger" id="emailError"></span> <!-- Error message area -->
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label class="col-form-label">Password</label>
                        <input class="form-control"  name="password" type="password">
                        <span class="error text-danger" id="passwordError"></span> <!-- Error message area -->
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label class="col-form-label">Confirm Password</label>
                        <input class="form-control"  name="password_confirmation" type="password">
                        <span class="error text-danger" id="confirmationError"></span> <!-- Error message area -->
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label class="col-form-label">Employee ID <span class="text-danger" id="firstnameError">*</span></label>
                        <input name="employee_id" id="employee_id" readonly type="text" value="{{ 'EMP-'.$employeeId}}" class="form-control">
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label class="col-form-label">Phone </label>
                        <input name="phone"  class="form-control" type="text">
                        <span class="error text-danger" id="phoneError"></span> <!-- Error message area -->
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <label class="form-label mt-2">Department <span class="text-danger" >*</span></label>
                        <select  name="department" class="form-select" >
                           <option value="">Select Department</option>
                           @foreach ($department as $val)
                              <option value="{{$val['id']}}">{{$val['name']}}</option>
                           @endforeach
                            </select>
                        <span class="error text-danger " id="departmentError"></span> <!-- Error message area -->
                     </div>
                  </div>
                  
                  <div class="col-md-6">
                     <div class="form-group">
                        <label class="form-label mt-2">Designation <span class="text-danger" >*</span></label>
                        <select  name="position" class="form-select" required >
                           <option value=" ">Select designation</option>
                           @foreach ($designation as $val)
                              <option value="{{$val['id']}}">{{$val['name']}}</option>
                           @endforeach
                           
                        </select>
                        <span class="error text-danger positionError" id="errorposition"></span> <!-- Error message area -->
                     </div>
                  </div>
                  
                  <div class="col-md-12">
                     <div class="form-group">
                        <label class="col-form-label">Joining Date</label>
                        <input class="form-control"  name="joining_Date" type="date" min="10">
                        <span class="error text-danger" id="joining_DateError"></span> <!-- Error message area -->
                     </div>
                  </div>

                  <div class="col-md-12">
                     <div class="form-group">
                        <label class="col-form-label">Employee Picture</label>
                        <input class="form-control"  name="picture" type="file">
                        <span class="error text-danger" id="pictureError"></span> <!-- Error message area -->
                     </div>
                  </div>
               </div>
               <div class="modal-footer mt-3">
                  <button type="submit" id="addData" name="add_employee" class="btn btn-primary submit-btn">Submit</button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>