@extends('admin.layouts.app')

@section('title', 'Dashboard - HRMS Admin')

@section('content')
<div class="content">
<div class="employee-details">
 
    <div class="card-list-container-unique">
        <ul class="nav nav-tabs " data-bs-toggle="tab">
          <li class="nav-item">
            <a href="#tabs-home-1" class="nav-link active active-unique" data-bs-toggle="tab">
                <div class="card-item-unique">
                    <span class="star-icon-unique">☆</span>
                    <span>All</span>
                  </div>
            </a>
          </li>
          <li class="nav-item">
            <a href="#tabs-profile-1" class="nav-link" data-bs-toggle="tab">
                <div class="card-item-unique">
                    <span class="star-icon-unique">☆</span>
                    <span>Personal Information (PII Data)</span>
                  </div>
            </a>
          </li>
          <li class="nav-item">
            <a href="#tabs-basic-1" class="nav-link" data-bs-toggle="tab">
                <div class="card-item-unique">
                    <span class="star-icon-unique">☆</span>
                    <span>Basic Information</span>
                  </div>
            </a>
          </li>
          <li class="nav-item">
            <a href="#tabs-joining-1" class="nav-link" data-bs-toggle="tab">
                <div class="card-item-unique">
                    <span class="star-icon-unique">☆</span>
                    <span>Joining Information</span>
                  </div>
            </a>
          </li>
          <li class="nav-item">
            <a href="#tabs-position-1" class="nav-link" data-bs-toggle="tab">
                <div class="card-item-unique">
                    <span class="star-icon-unique">☆</span>
                    <span>Position Information</span>
                  </div>
                </a>
          </li>
          <li class="nav-item">
            <a href="#tabs-address-1" class="nav-link" data-bs-toggle="tab">
                <div class="card-item-unique">
                    <span class="star-icon-unique">☆</span>
                    <span>Address Information</span>
                  </div>
                </a>
          </li>
          <li class="nav-item ms-auto">
            {{-- <a href="#tabs-settings-1" class="nav-link" title="Settings" data-bs-toggle="tab"><!-- Download SVG icon from http://tabler-icons.io/i/settings -->
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z" /><path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" /></svg>
            </a> --}}
            {{-- <input type="text" id="allSearch" class="form-control" placeholder="Search in All Table"> --}}
          </li>
        </ul>
      </div>   
    </div>   
    <div class="mt-4 employee-details">
    
        <div class="search-section-unique">
            <div class="search-bar-container-unique">
                <input type="text" id="allSearch" class="form-control" placeholder="Search in All Table">
                <button>
                    <i class="fa fa-search"></i> 
                </button>
            </div>
            <div>

                {{-- <button class="restore-button-unique">Restore</button>
                <button class="download-button-unique">
                    <i>⬇️</i>
                </button> --}}
            </div>
        </div>

    <div class="page-body ">
        <div class="container-xl">
          <div class="row row-cards">
            <div class="col-md-12">
                <div class="card">
                  
                  <div class="card-body">

                    {{-- All Info --}}
                    <div class="tab-content">
                      <div class="tab-pane active show" id="tabs-home-1">
                        <h4>All Employee Info</h4>
                        
                        <div class="table-responsive">
                            <table  id="employeeTable"class="table mb-0 card-table display table-vcenter text-nowrap custom-table datatable items-table">
                                <thead>
                                    <tr>
                                        <th>Emp ID</th>
                                        <th>Title</th>
                                        <th>Emp Name</th>
                                        <th>Nik Name</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Gender</th>
                                        <th>Extension</th>

                                        <th>DOB</th>
                                        <th>Birthday</th>
                                        <th>Blood Group</th>
                                        <th>Father Name</th>
                                        <th>Marital Status</th>
                                        <th>Marital Date</th>
                                        <th>Spouse Name</th>
                                        <th>Nationality</th>
                                        <th>Residential Status</th>
                                        <th>Place of Date</th>
                                        <th>Place of Birth</th>
                                        <th>Country of origin</th>
                                        <th>Religion</th>
                                        <th>Physically Challened</th>
                                        <th>Personal Email</th>
                                        
                                        <th>Joined On</th>
                                        <th>Confirmation Date</th>
                                        <th>Status</th>
                                        <th>Probation Period</th>
                                        <th>Notice Period</th>
                                        <th>Current Company Experience</th>
                                        <th>Previous Experience</th>
                                        <th>Total Experience</th>
                                        <th>Referred By</th>
                                        <th>Division</th>
                                        <th>Grade</th>
                                        <th>Department</th>
                                        <th>Designation</th>
                                        <th>Location</th>
                                        
                                        <th>Reporting To</th>


                                        <th>Address</th>
                                        <th>City</th>
                                        <th>State</th>
                                        <th>Country</th>
                                        <th>Pincode</th>
                                        <th>Phone 1</th>
                                        <th>Phone 2</th>
                                        <th>Fax</th>
                                        <th>Mobile</th>
                                        <!-- Add more headers as needed -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Data will be appended here dynamically -->
                                </tbody>
                                
                            </table>
                        </div>
                      </div>
                      
                      {{-- Personal Info --}}
                      <div class="tab-pane" id="tabs-profile-1">
                        <h4>Personal Information (PII Data)</h4>
                        <div class="table-responsive">
                            <table  id="employeePersonalTable"class="table mb-0 card-table display table-vcenter text-nowrap custom-table datatable items-table">
                                <thead>
                                    <tr>
                                        <th>Emp ID</th>
                                        <th>Emp Name</th>
                                        <th>DOB</th>
                                        <th>Birthday</th>
                                        <th>Blood Group</th>
                                        <th>Father Name</th>
                                        <th>Marital Status</th>
                                        <th>Marital Date</th>
                                        <th>Spouse Name</th>
                                        <th>Nationality</th>
                                        <th>Residential Status</th>
                                        <th>Place of Date</th>
                                        <th>Place of Birth</th>
                                        <th>Country of origin</th>
                                        <th>Religion</th>
                                        <th>Physically Challened</th>
                                        <th>Personal Email</th>
                                        <!-- Add more headers as needed -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Data will be appended here dynamically -->
                                </tbody>
                                
                            </table>
                        </div>
                      </div>

                      {{-- Basic Info --}}
                      <div class="tab-pane" id="tabs-basic-1">
                        <h4>Basic Information</h4>
                        <div class="table-responsive">
                            <table  id="employeeBasicInfoTable"class="table mb-0 card-table display table-vcenter text-nowrap custom-table datatable items-table">
                                <thead>
                                    <tr>
                                        <th>Emp ID</th>
                                        <th>Title</th>
                                        <th>Nik Name</th>
                                        <th>Emp Name</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Gender</th>
                                        <th>Extension</th>
    
                                        <!-- Add more headers as needed -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Data will be appended here dynamically -->
                                </tbody>
                                
                            </table>
                        </div>
                      </div>

                      {{-- Joining Info --}}
                      <div class="tab-pane" id="tabs-joining-1">
                        <h4>Joining Information</h4>
                        <div class="table-responsive">
                            <table  id="employeeJoiningInfoTable"class="table mb-0 card-table display table-vcenter text-nowrap custom-table datatable items-table">
                                <thead>
                                    <tr>
                                        <th>Emp ID</th>
                                        <th>Emp Name</th>
                                        <th>Joined On</th>
                                        <th>Confirmation Date</th>
                                        <th>Status</th>
                                        <th>Probation Period</th>
                                        <th>Notice Period</th>
                                        <th>Current Company Experience</th>
                                        <th>Previous Experience</th>
                                        <th>Total Experience</th>
                                        <th>Referred By</th>
    
                                        <!-- Add more headers as needed -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Data will be appended here dynamically -->
                                </tbody>
                                
                            </table>
                        </div>
                      </div>

                      {{-- Position Info --}}
                      <div class="tab-pane" id="tabs-position-1">
                        <h4>Position Information</h4>
                        <div class="table-responsive">
                            <table  id="employeePositionInfoTable"class="table mb-0 card-table display table-vcenter text-nowrap custom-table datatable items-table">
                                <thead>
                                    <tr>
                                        <th>Emp ID</th>
                                        <th>Emp Name</th>
                                        <th>Division</th>
                                        <th>Grade</th>
                                        <th>Department</th>
                                        <th>Designation</th>
                                        <th>Location</th>
                                        <th>Reporting To</th>
                                        <th>Attendance Marking Option</th>
                                        
    
                                        <!-- Add more headers as needed -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Data will be appended here dynamically -->
                                </tbody>
                                
                            </table>
                        </div>
                      </div>

                      {{-- Address Info --}}
                      <div class="tab-pane" id="tabs-address-1">
                        <h4>Address Information</h4>
                        <div class="table-responsive">
                            <table  id="employeeAddressInfoTable"class="table mb-0 card-table display table-vcenter text-nowrap custom-table datatable items-table">
                                <thead>
                                    <tr>
                                        <th>Emp ID</th>
                                        <th>Emp Name</th>
                                        <th>Address</th>
                                        <th>City</th>
                                        <th>State</th>
                                        <th>Country</th>
                                        <th>Pincode</th>
                                        <th>Phone 1</th>
                                        <th>Phone 2</th>
                                        <th>Fax</th>
                                        <th>Mobile</th>
                                        
                                        
    
                                        <!-- Add more headers as needed -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Data will be appended here dynamically -->
                                </tbody>
                                
                            </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              
            <div class="col-md-12">
            
        </div>
    </div>
    </div>
</div>
</div>
</div>
@endsection
@section('script') 

<script>
    $(document).ready(function () {
        $(document).on('click', '.view-employee', function() {
                let employeeId = $(this).data('id');
                dd(employeeId);
                // Make an AJAX request to get the full details of the employee
                $.ajax({
                    url: `/employees/${employeeId}`, // Assume route to fetch employee details
                    method: 'GET',
                    success: function(response) {
                        // Assuming 'response' contains the employee data
                        showEmployeeDetails(response); // Function to display the details in a modal
                    },
                    error: function(xhr) {
                        console.error('Error fetching employee details:', xhr);
                    }
                });
            });
        // AJAX request to get employee headcount by month
        $.ajax({
            url: "{{ route('employee.all.info.get') }}",  // URL for the controller method
            type: "GET",
            success: function (response) {
                let employees = response.employees;  // Assuming employees data is returned
                let personal = response.employees;  // Assuming employees data is returned
                let basicInfo = response.employees;  // Assuming employees data is returned
                let joiningInfo = response.employees;  // Assuming employees data is returned
                let positionInfo = response.employees;  // Assuming employees data is returned
                let addressInfo = response.employees;  // Assuming employees data is returned
                let tableBody = $('#employeeTable tbody');
                let personalTableBody = $('#employeePersonalTable tbody');
                let basicInfoTableBody = $('#employeeBasicInfoTable tbody');
                let joiningInfoTableBody = $('#employeeJoiningInfoTable tbody');
                let positionInfoTableBody = $('#employeePositionInfoTable tbody');
                let addressInfoTableBody = $('#employeeAddressInfoTable tbody');

                // Clear the table body
                tableBody.empty();
                personalTableBody.empty();
                basicInfoTableBody.empty();
                joiningInfoTableBody.empty();
                positionInfoTableBody.empty();
                addressInfoTableBody.empty();
                //All Loop through each employee and create a row
                employees.forEach(employee => {
                    let row = `<tr>
                        <td>${employee.employee_id}</td>
                        <td>${employee.title}</td>
                        <td>
                        <form action="{{route('employees.viewEmployee')}}" method="POST" style="display:inline;">
                            @csrf
                            <input  type="hidden"  name="query" value="${employee.employee_id}"  />
                            <button type="submit" class="view-employee" style="background:none; border:none; color:blue; cursor:pointer; text-decoration:underline;">
                                <form action="{{route('employees.viewEmployee')}}" method="POST" style="display:inline;">
                            @csrf
                            <input  type="hidden"  name="query" value="${employee.employee_id}"  />
                            <button type="submit" class="view-employee" style="background:none; border:none; color:blue; cursor:pointer; text-decoration:underline;">
                                ${employee.firstName} ${employee.lastName}
                            </button>
                        </form>
                            </button>
                        </form>   
                        </td>
                        <td>${employee.nick_name}</td>
                        <td>${employee.username}</td>
                        <td>${employee.email}</td>
                        <td>${employee.phone}</td>
                        <td>${employee.gender}</td>
                        <td>${employee.extension}</td>
                        <td>${employee.dob}</td>
                        <td>${employee.birth_day}</td>
                        <td>${employee.blood_group}</td>
                        <td>${employee.father_name}</td>
                        <td>${employee.marital_status}</td>
                        <td>${employee.marital_date}</td>
                        <td>${employee.spouse_name}</td>
                        <td>${employee.nationality}</td>
                        <td>${employee.residential_status}</td>
                        <td>${employee.place_of_date}</td>
                        <td>${employee.place_of_birth}</td>
                        <td>${employee.country_of_origin}</td>
                        <td>${employee.international_emp}</td>
                        <td>${employee.physically_challened}</td>
                        <td>${employee.personal_email }</td>
                        <td>${employee.joining_Date}</td>
                        <td>${employee.join_confrimation_date}</td>
                        <td>${employee.joining_status}</td>
                        <td>${employee.probation_period}</td>
                        <td>${employee.notice_period}</td>
                        <td>${employee.current_company_experience}</td>
                        <td>${employee.pre_company_experiecne}</td>
                        <td>${employee.total_experience}</td>
                        <td>${employee.referred_by}</td>
                        <td>${employee.division}</td>
                        <td>${employee.grade}</td>
                        <td>${employee.departmentName}</td>
                        <td>${employee.designationsName}</td>
                        <td>${employee.location}</td>
                        <td>${employee.reporting}</td>
                        <td>${employee.address}</td>
                        <td>${employee.city}</td>
                        <td>${employee.state}</td>
                        <td>${employee.country}</td>
                        <td>${employee.pin}</td>
                        <td>${employee.phone1}</td>
                        <td>${employee.phone2}</td>
                        <td>${employee.fax}</td>
                        <td>${employee.phone}</td>
                        <!-- Add more columns as needed -->
                    </tr>`;

                    // Append the row to the table body
                    tableBody.append(row);
                });

                

                // Personal
                personal.forEach(employee => {
                    let row = `<tr>
                        <td>${employee.employee_id}</td>
                        <td><form action="{{route('employees.viewEmployee')}}" method="POST" style="display:inline;">
                            @csrf
                            <input  type="hidden"  name="query" value="${employee.employee_id}"  />
                            <button type="submit" class="view-employee" style="background:none; border:none; color:blue; cursor:pointer; text-decoration:underline;">
                                ${employee.firstName} ${employee.lastName}
                            </button>
                        </form></td>
                        <td>${employee.dob}</td>
                        <td>${employee.birth_day}</td>
                        <td>${employee.blood_group}</td>
                        <td>${employee.father_name}</td>
                        <td>${employee.marital_status}</td>
                        <td>${employee.marital_date}</td>
                        <td>${employee.spouse_name}</td>
                        <td>${employee.nationality}</td>
                        <td>${employee.residential_status}</td>
                        <td>${employee.place_of_date}</td>
                        <td>${employee.place_of_birth}</td>
                        <td>${employee.country_of_origin}</td>
                        <td>${employee.international_emp}</td>
                        <td>${employee.physically_challened}</td>
                        <td>${employee.personal_email }</td>
                        <!-- Add more columns as needed -->
                    </tr>`;

                    // Append the row to the table body
                    personalTableBody.append(row);
                });

                // Basic Information
                basicInfo.forEach(employee => {
                    let row = `<tr>
                        <td>${employee.employee_id}</td>
                        <td>${employee.title}</td>
                        <td>${employee.nick_name}</td>
                        <td><form action="{{route('employees.viewEmployee')}}" method="POST" style="display:inline;">
                            @csrf
                            <input  type="hidden"  name="query" value="${employee.employee_id}"  />
                            <button type="submit" class="view-employee" style="background:none; border:none; color:blue; cursor:pointer; text-decoration:underline;">
                                ${employee.firstName} ${employee.lastName}
                            </button>
                        </form></td>
                        <td>${employee.username}</td>
                        <td>${employee.email}</td>
                        <td>${employee.phone}</td>
                        <td>${employee.gender}</td>
                        <td>${employee.extension}</td>
                        
                        <!-- Add more columns as needed -->
                    </tr>`;

                    // Append the row to the table body
                    basicInfoTableBody.append(row);
                });

                // Joining Information
                joiningInfo.forEach(employee => {
                    let row = `<tr>
                        <td>${employee.employee_id}</td>
                        <td><form action="{{route('employees.viewEmployee')}}" method="POST" style="display:inline;">
                            @csrf
                            <input  type="hidden"  name="query" value="${employee.employee_id}"  />
                            <button type="submit" class="view-employee" style="background:none; border:none; color:blue; cursor:pointer; text-decoration:underline;">
                                ${employee.firstName} ${employee.lastName}
                            </button>
                        </form></td>
                        <td>${employee.joining_Date}</td>
                        <td>${employee.join_confrimation_date}</td>
                        <td>${employee.joining_status}</td>
                        <td>${employee.probation_period}</td>
                        <td>${employee.notice_period}</td>
                        <td>${employee.current_company_experience}</td>
                        <td>${employee.pre_company_experiecne}</td>
                        <td>${employee.total_experience}</td>
                        <td>${employee.referred_by}</td>
                        
                        <!-- Add more columns as needed -->
                    </tr>`;

                    // Append the row to the table body
                    joiningInfoTableBody.append(row);
                });

                // Position Information
                positionInfo.forEach(employee => {
                    let row = `<tr>
                        <td>${employee.employee_id}</td>
                        <td><form action="{{route('employees.viewEmployee')}}" method="POST" style="display:inline;">
                            @csrf
                            <input  type="hidden"  name="query" value="${employee.employee_id}"  />
                            <button type="submit" class="view-employee" style="background:none; border:none; color:blue; cursor:pointer; text-decoration:underline;">
                                ${employee.firstName} ${employee.lastName}
                            </button>
                        </form></td>
                        <td>${employee.division}</td>
                        <td>${employee.grade}</td>
                        <td>${employee.departmentName}</td>
                        <td>${employee.designationsName}</td>
                        <td>${employee.location}</td>
                        <td>${employee.reporting}</td>
                        <td>${employee.attendance_marking_option}</td>
                        
                        
                        <!-- Add more columns as needed -->
                    </tr>`;

                    // Append the row to the table body
                    positionInfoTableBody.append(row);
                });

                // Address Information
                addressInfo.forEach(employee => {
                    let row = `<tr>
                        <td>${employee.employee_id}</td>
                        <td><form action="{{route('employees.viewEmployee')}}" method="POST" style="display:inline;">
                            @csrf
                            <input  type="hidden"  name="query" value="${employee.employee_id}"  />
                            <button type="submit" class="view-employee" style="background:none; border:none; color:blue; cursor:pointer; text-decoration:underline;">
                                ${employee.firstName} ${employee.lastName}
                            </button>
                        </form></td>
                        <td>${employee.address}</td>
                        <td>${employee.city}</td>
                        <td>${employee.state}</td>
                        <td>${employee.country}</td>
                        <td>${employee.pin}</td>
                        <td>${employee.phone1}</td>
                        <td>${employee.phone2}</td>
                        <td>${employee.fax}</td>
                        <td>${employee.phone}</td>
                        
                        
                        <!-- Add more columns as needed -->
                    </tr>`;

                    // Append the row to the table body
                    addressInfoTableBody.append(row);
                });
            },
            error: function () {
                console.error("Failed to fetch employee headcount data.");
            }
        });
        // Search filter for All Table
        $('#allSearch').on('keyup', function () {
            let value = $(this).val().toLowerCase();
            $('#employeeTable tbody tr').filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
            });
            // Personal
            $('#employeePersonalTable tbody tr').filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
            });
            // Basic
            $('#employeeBasicInfoTable tbody tr').filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
            });
            // Joinging 
            $('#employeeJoiningInfoTable tbody tr').filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
            });
            // Position
            $('#employeePositionInfoTable tbody tr').filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
            });
            // Address
            $('#employeeAddressInfoTable tbody tr').filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
            });
        });
        
        
        
    });
</script>
@endsection      
      