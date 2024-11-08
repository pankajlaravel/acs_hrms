
$(document).ready(function() {
    $('#search').on('keyup', function() {
        let query = $(this).val();
        if (query.length > 1) {
            $.ajax({
                url: '{{route("admin.employee.list")}}',
                type: 'GET',
                data: { query: query },
                success: function(data) {
                    $('#results').empty();
                    if (data.length > 0) {
                        $.each(data, function(index, item) {
                            var fullName = item.firstName + ' '+ item.lastName
                            var employee_id = item.employee_id;
                            // $('#results').append('<li class="list-group result-item" data-name="'+ item.firstName'">' + item.firstName + '</li>');
                            $('#results').append('<li class="list-group result-item" data-name="' + fullName + '">' +fullName+ '</li>');
                        });
                    } else {
                        $('#results').append('<li class="list-group">No results found</li>');
                    }
                },
                error: function() {
                    $('#results').append('<li class="list-group">Error retrieving results</li>');
                }
            });
        } else {
            $('#results').empty();
        }
    });

    $('#results').on('click', '.result-item', function() {
    // Get the name from the clicked item
    const name = $(this).data('name');
    // Set the input value to the clicked item's name
    $('#search').val(name);
    // Clear the results after selection
    $('#results').empty();
});

// search submit
$('#search-form').on('submit', function(e) {
  alert('click');
        e.preventDefault(); // Prevent default form submission
        $('#search-results').show();
        $.ajax({
            url: '{{ route("employees.ajaxSearch") }}', // Ensure this is the correct route
            method: 'POST',
            data: $(this).serialize(), // Serialize form data for submission
            success: function(data) {
                let resultsHtml = '';

                if (data.length > 0) {
                    $('#original').hide(); // Hide original content
                    $.each(data, function(index, employee) {
                        resultsHtml += `
                        <div class="col-12">
        <div class="row row-cards">
          <div class="col-12">
            <div class="card" style="background-color: #ace5d3c4;">
              <div class="card-body">
                <h3 class="card-title">${employee.employee_id || "--"}</h3>
                <div class="row row-cards">
                  <div class="col-md-5">
                    <div class="mb-3">
                      {{-- <label class="form-label mt-2">Company</label> --}}
                      
                    </div>
                  </div>
                 
                </div>
              </div>

            </div>
          </div>
          
        </div>
      </div>
                         {{-- Employee Information --}}
      <div class="col-12">
        <div class="row row-cards">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <h3 class="card-title">Employee Information  <a href="#" class="btn editEmp" data-id="${employee.id}" data-bs-toggle="modal" data-bs-target="#edit_employee"><i class="fa fa-pencil"></i></a> </h3>
                <div class="row row-cards">
                  <!-- 4 columns in a row -->
                  <div class="col-md-3">
                    <div class="mb-3">
                      <label class="form-label mt-2">Title</label>
                      <p>${employee.title || "--"}</p>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="mb-3">
                      <label class="form-label mt-2">Nick Name</label>
                      <p>${employee.nick_name || "--"}</p>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="mb-3">
                      <label class="form-label mt-2">Gender</label>
                      <p>${employee.gender || "--"}</p>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="mb-3">
                      <label class="form-label mt-2">Name</label>
                      <p>${employee.firstName} ${employee.lastName}</p>
                    </div>
                  </div>
                </div>
      
                <!-- Add another row if more information is needed -->
                <div class="row row-cards">
                  <div class="col-md-3">
                    <div class="mb-3">
                      <label class="form-label mt-2">Employee Login Username
                      </label>
                      <p>${employee.username || "--"}</p>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="mb-3">
                      <label class="form-label mt-2">Mobile</label>
                      <p>${employee.phone || "--"}</p>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="mb-3">
                      <label class="form-label mt-2">Email</label>
                      <p>${employee.email || "--"}</p>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="mb-3">
                      <label class="form-label mt-2">Extension</label>
                      <p>${employee.extension || "--"}</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      {{-- Personal Inforamtion --}}
      <div class="mt-2 col-12">
        <div class="row row-cards">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <h3 class="card-title">Personal  Information  <a href=""><i class="fa fa-pencil"></i></a></h3>
                <div class="row row-cards">
                  <!-- 4 columns in a row -->
                  <div class="col-md-3">
                    <div class="mb-3">
                      <label class="form-label mt-2">DOB</label>
                      <p>${employee.dob || "--"}</p>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="mb-3">
                      <label class="form-label mt-2">Birthday</label>
                      <p>${employee.birth_day || "--"}</p>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="mb-3">
                      <label class="form-label mt-2">Blood Group
                      </label>
                      <p>${employee.blood_group || "--"}</p>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="mb-3">
                      <label class="form-label mt-2">Father's Name
                      </label>
                      <p>${employee.father_name || "--"}</p>
                    </div>
                  </div>
                </div>
      
                <!-- Add another row if more information is needed -->
                <div class="row row-cards">
                  <div class="col-md-3">
                    <div class="mb-3">
                      <label class="form-label mt-2">Marital Status
                      </label>
                      <p>${employee.marital_status || "--"}</p>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="mb-3">
                      <label class="form-label mt-2">Marriage Date
                      </label>
                      <p>${employee.marital_date || "--"}</p>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="mb-3">
                      <label class="form-label mt-2">Spouse Name
                      </label>
                      <p>${employee.spouse_name || "--"}</p>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="mb-3">
                      <label class="form-label mt-2">Nationality</label>
                      <p>${employee.nationality || "--"}</p>
                    </div>
                  </div>
                </div>

                <div class="row row-cards">
                  <div class="col-md-3">
                    <div class="mb-3">
                      <label class="form-label mt-2">Residential Status
                      </label>
                      <p>${employee.residential_status || "--"}</p>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="mb-3">
                      <label class="form-label mt-2">Place Of Birth
                      </label>
                      <p>${employee.place_of_birth || "--"}</p>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="mb-3">
                      <label class="form-label mt-2">Country Of Origin
                      </label>
                      <p>${employee.country_of_origin || "--"}</p>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="mb-3">
                      <label class="form-label mt-2">Religion</label>
                      <p>${employee.religion || "--"}</p>
                    </div>
                  </div>
                </div>

                <div class="row row-cards">
                  <div class="col-md-3">
                    <div class="mb-3">
                      <label class="form-label mt-2">International Employee
                      </label>
                      <p>${employee.international_emp || "--"}</p>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="mb-3">
                      <label class="form-label mt-2">Physically Challenged
                      </label>
                      <p>${employee.physically_challened || "--"}</p>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="mb-3">
                      <label class="form-label mt-2">Is Director
                      </label>
                      <p>${employee.is_director || "--"}</p>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="mb-3">
                      <label class="form-label mt-2">Personal Email
                      </label>
                      <p>${employee.personal_email  || "--"}</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      {{-- end --}}
      {{-- Joining Details --}}
      <div class="mt-2 col-12">
        <div class="row row-cards">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <h3 class="card-title">Joining Details <a href=""><i class="fa fa-pencil"></i></a></h3>
                <div class="row row-cards">
                  <!-- 4 columns in a row -->
                  <div class="col-md-3">
                    <div class="mb-3">
                      <label class="form-label mt-2">Joined On</label>
                      <p>${employee.joining_Date || "--"}</p>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="mb-3">
                      <label class="form-label mt-2">Confirmation Date</label>
                      <p>${employee.join_confrimation_date || "--"}</p>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="mb-3">
                      <label class="form-label mt-2">Status</label>
                      <p>${employee.joining_status || "--"}</p>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="mb-3">
                      <label class="form-label mt-2">Probation Period</label>
                      <p>${employee.probation_period || "--"}</p>
                    </div>
                  </div>
                </div>
      
                <!-- Add another row if more information is needed -->
                <div class="row row-cards">
                  <div class="col-md-3">
                    <div class="mb-3">
                      <label class="form-label mt-2">Notice Period
                      </label>
                      <p>${employee.notice_period || "--"}</p>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="mb-3">
                      <label class="form-label mt-2">Current Company Experience</label>
                      <p>${employee.current_company_experience || "--"}</p>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="mb-3">
                      <label class="form-label mt-2">Previous Experience</label>
                      <p>${employee.pre_company_experiecne || "--"}</p>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="mb-3">
                      <label class="form-label mt-2">Total Experience</label>
                      <p>${employee.total_experience || "--"}</p>
                    </div>
                  </div>
                </div>

                <!-- Add another row if more information is needed -->
                <div class="row row-cards">
                  <div class="col-md-3">
                    <div class="mb-3">
                      <label class="form-label mt-2">Referred By
                      </label>
                      <p>${employee.referred_by || "--"}</p>
                    </div>
                  </div>
                                                           
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      {{--  --}}

      {{-- Current Position --}}
      <div class="mt-2 col-12">
        <div class="row row-cards">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <h3 class="card-title">Current Position <a href=""><i class="fa fa-pencil"></i></a></h3>
                <div class="row row-cards">
                  <!-- 4 columns in a row -->
                  <div class="col-md-3">
                    <div class="mb-3">
                      <label class="form-label mt-2">Division</label>
                      <p>${employee.division || "--"}</p>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="mb-3">
                      <label class="form-label mt-2">Grade</label>
                      <p>${employee.grade || "--"}</p>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="mb-3">
                      <label class="form-label mt-2">Department</label>
                      <p>${employee.department || "--"}</p>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="mb-3">
                      <label class="form-label mt-2">Location</label>
                      <p>${employee.location || "--"}</p>
                    </div>
                  </div>
                </div>
      
                <!-- Add another row if more information is needed -->
                <div class="row row-cards">
                  <div class="col-md-3">
                    <div class="mb-3">
                      <label class="form-label mt-2">Designation
                      </label>
                      <p>${employee.position || "--"}</p>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="mb-3">
                      <label class="form-label mt-2">Reporting To</label>
                      <p>${employee.reporting || "--"}</p>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="mb-3">
                      <label class="form-label mt-2">Category</label>
                      <p>${employee.role || "--"}</p>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="mb-3">
                      <label class="form-label mt-2">Attendance Marking Option</label>
                      <p>${employee.attendance_marking_option || "--"}</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      {{-- end --}}

      {{-- Present Address --}}
      <div class="mt-2 col-12">
        <div class="row row-cards">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <h3 class="card-title">Present Address <a href=""><i class="fa fa-pencil"></i></a></h3>
                <div class="row row-cards">
                  <!-- 4 columns in a row -->
                  <div class="col-md-3">
                    <div class="mb-3">
                      <label class="form-label mt-2">Name</label>
                      <p>${employee.extension || "--"}</p>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="mb-3">
                      <label class="form-label mt-2">Address</label>
                      <p>${employee.address || "--"}</p>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="mb-3">
                      <label class="form-label mt-2">City
                      </label>
                      <p>${employee.city || "--"}</p>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="mb-3">
                      <label class="form-label mt-2">State
                      </label>
                      <p>${employee.state || "--"}</p>
                    </div>
                  </div>
                </div>
      
                <!-- Add another row if more information is needed -->
                <div class="row row-cards">
                  <div class="col-md-3">
                    <div class="mb-3">
                      <label class="form-label mt-2">Country
                      </label>
                      <p>${employee.country || "--"}</p>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="mb-3">
                      <label class="form-label mt-2">Pincode
                      </label>
                      <p>${employee.pin || "--"}</p>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="mb-3">
                      <label class="form-label mt-2">Phone1
                      </label>
                      <p>${employee.phone1 || "--"}</p>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="mb-3">
                      <label class="form-label mt-2">Phone2</label>
                      <p>${employee.phone2 || "--"}</p>
                    </div>
                  </div>
                </div>

                <div class="row row-cards">
                  <div class="col-md-3">
                    <div class="mb-3">
                      <label class="form-label mt-2">Ext
                      </label>
                      <p>${employee.extension || "--"}</p>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="mb-3">
                      <label class="form-label mt-2">Fax
                      </label>
                      <p>${employee.fax || "--"}</p>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="mb-3">
                      <label class="form-label mt-2">Mobile
                      </label>
                      <p>${employee.phone || "--"}</p>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="mb-3">
                      <label class="form-label mt-2">Emial</label>
                      <p>${employee.email || "--"}</p>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
      {{-- end --}}
                        `;
                    });
                } else {
                    $('#original').hide();
                    resultsHtml += `
                    <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
                        <div class="profile-widget">
                            <div class="profile-img">
                                <a href="javascript:void(0);" class="avatar">
                                    <img src="{{ asset('error/data_not_found.webp') }}" alt="No Image">
                                </a>
                            </div>
                            <div class="profile-action">
                                <h4 class="mb-0 user-name m-t-10 text-ellipsis">
                                    <a href="#">No Employee Found</a>
                                </h4>
                                <div class="small text-muted">Try adjusting your search criteria.</div>
                            </div>
                        </div>
                    </div>
                    `;
                }
                
                $('#search-results').html(resultsHtml);
            },
            error: function(xhr) {
                console.log(xhr.responseText);
                alert('An error occurred. Please try again.');
            }
        });
    });
});


  $(document).ready(function()  {
$.ajaxSetup({
headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
// alert('employeeId');
$(document).on('click', '.editEmp', function() {
const employeeId = $(this).data('id');
// alert(employeeId);
$.get('/admin/employee/edit/' + employeeId, function (data) {
        $('#employeeId').val(data.id);
        $('#title').val(data.title);
        $('#nick_name').val(data.nick_name);
        $('#firstName').val(data.firstName);
        $('#lastName').val(data.lastName);
        $('#username').val(data.username);
        $('#emp_id').val(data.employee_id);
        $('#phone').val(data.phone);
        $('#email').val(data.email);
        $('#extension').val(data.extension);
        $('#gender').val(data.gender);
        // $('#picture').html(`<img src"{{asset("/employee/img")}}/"`+ data.picture);
        $('.departmentName').val(data.departmentName);
        let department_name = data.title; 
        let department_id = data.title; 

        let designation_name = data.title; 
        let designation_id = data.title; 
        // $('#department_select').append(`<option value="${imageUrl}">${imageUrl}</option>`); 
        $('#department_select').append(`<option value="${department_id}" selected>${department_name}</option>`); 
        $('#designation_select').append(`<option value="${designation_id}" selected>${designation_name}</option>`); 
        
        if (data.picture) {
             $('#previewImage').attr('src', '{{asset("/employee/img")}}/' + data.picture).show(); // Set the src and show the image
        } else {
            $('#previewImage').hide(); // Hide if no image
        }

        let resultsHtml = `<option value="">Select Department test</option>`;
if (data.departmentName && data.departmentName.length > 0) {
    $.each(data.departmentName, function(index, department) {
        let selected = (department.id == data.department_id) ? 'selected' : '';
        resultsHtml += `<option value="${data.departmentName}" ${selected}>${data.departmentName}</option>`;
    });
}
// $('select[name="department"]').html(resultsHtml);
    });
});

$('#employeeInfoEditForm').on('submit', function (e) {
e.preventDefault(); // Prevent the default form submission behavior

const formData = new FormData(this);
const userId = $('#employeeId').val();
$("#updating").text('Updating...'); // Indicate updating process

$.ajax({
    url: `/admin/employee/${userId}/update`, // Ensure the correct URL is set
    type: 'POST',
    contentType: false,
    processData: false,
    data: formData, // FormData for file uploads or other form data
    
    success: function(response) {
        // Hide modal and show success alert
        $('#edit_employee').modal('hide');
        Swal.fire({
            icon: 'success',
            title: 'Record updated successfully',
        });

        // Reset the form after the update
        $('#employeeInfoEditForm')[0].reset();
        
        // Update the search results area dynamically with the new data
        fetchUpdatedEmployeeList(); // Custom function to reload employee list
        
        // Clear the updating text
        $("#updating").text('Update');
    },
    error: function(xhr) {
        console.error(xhr.responseText); // Log any errors for debugging
    }
});
});

// Function to dynamically fetch and update employee list
function fetchUpdatedEmployeeList() {

    $('#search-form').trigger('submit');
}

});
