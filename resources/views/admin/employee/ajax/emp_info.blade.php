
<script>
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
                                // console.log(employee_id);
                                // $('#results').append('<li class="list-group result-item" data-name="'+ item.firstName'">' + item.firstName + '</li>');
                                // $('#results').append('<li class="list-group result-item" data-id="'+employee_id+'" data-name="' + fullName + '">' +fullName+ '</li>');
                                $('#results').append('<div class="suggestion-item "><div class="result-item" data-id="'+employee_id+'" data-name="' + fullName + '"> <span class="suggestion-name" >' +fullName+ '</span> <span class="suggestion-id ">ID: ' +employee_id+ '</span></div></div>');
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
        const id = $(this).data('id');
        const name = $(this).data('name');
        // Set the input value to the clicked item's name
        $('#search').val(name);
        $('#search_id').val(id);
        // $('#search').val(name+' '+id);
        // Clear the results after selection
        $('#results').empty();
    });

    // search submit
    $('#search-form').on('submit', function(e) {
      $('#spinner').show();
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
                          $('#empDetailInfo').show();
                          $('.empID').attr('data-id', employee.id);
                          $('#employeeId').val(employee.id);
                          $('#firstName').text(employee.firstName + ' ' + employee.lastName);
                          $('#title').text(employee.title);
                          $('#nick_name').text(employee.nick_name);
                          $('#gender').text(employee.gender);
                          $('#username').text(employee.username);
                          $('#phone').text(employee.phone);
                          $('#email').text(employee.email);
                          $('#extension').text(employee.extension);
                          // Personal Info
                          $('#dob').text(employee.dob);
                          $('#birth_day').text(employee.birth_day);
                          $('#blood_group').text(employee.blood_group);
                          $('#father_name').text(employee.father_name);
                          $('#marital_status').text(employee.marital_status);
                          $('#marital_date').text(employee.marital_date);
                          $('#spouse_name').text(employee.spouse_name);
                          $('#nationality').text(employee.nationality);
                          $('#residential_status').text(employee.residential_status);
                          $('#place_of_birth').text(employee.place_of_birth);
                          $('#country_of_origin').text(employee.country_of_origin);
                          $('#religion').text(employee.religion);
                          $('#international_emp').text(employee.international_emp);
                          $('#physically_challened').text(employee.physically_challened);
                          $('#is_director').text(employee.is_director);
                          $('#personal_email').text(employee.personal_email);
                          // Joining Details
                          $('#joining_Date').text(employee.joining_Date);
                          $('#join_confrimation_date').text(employee.join_confrimation_date);
                          $('#joining_status').text(employee.joining_status);
                          $('#probation_period').text(employee.probation_period);
                          $('#notice_period').text(employee.notice_period);
                          $('#current_company_experience').text(employee.current_company_experience);
                          $('#pre_company_experiecne').text(employee.pre_company_experiecne);
                          $('#total_experience').text(employee.total_experience);
                          $('#referred_by').text(employee.referred_by);

                          // current position
                          $('#division').text(employee.division);
                          $('#grade').text(employee.grade);
                          $('#departmentName').text(employee.departmentName);
                          $('#location').text(employee.location);
                          $('#position_name').text(employee.position_name);
                          $('#reporting').text(employee.reporting);
                          $('#role').text(employee.role);
                          $('#attendance_marking_option').text(employee.attendance_marking_option);
                          // Address
                          $('#extension').text(employee.extension);
                          $('#address').text(employee.address);
                          $('#city').text(employee.city);
                          $('#state').text(employee.state);
                          $('#country').text(employee.country);
                          $('#pin').text(employee.pin);
                          $('#phone1').text(employee.phone1);
                          $('#phone2').text(employee.phone2);
                          $('#extension').text(employee.extension);
                          $('#fax').text(employee.fax);
                          $('#phone').text(employee.phone);
                          $('#email').text(employee.email);
                          
                            resultsHtml += `<div class="profile-header">
  <div class="profile-image">
      ${
        employee.picture 
          ? `<img src="{{asset('employee/img/${employee.picture}')}}" alt="${employee.picture}">`
          : `<img src="{{asset('employee/img/large.png')}}" alt="Employee Image">`
      }
  </div>
  <div class="profile-info">
      <h2>${employee.firstName} ${employee.lastName}</h2>
      <p>${employee.employee_id || "--"}</p>
  </div>
  <div class="profile-actions">
      <button class="action-btn updatePhotoBtn" id="updatePhotoBtn" data-id="${employee.id}">
          <i class="fa fa-camera"></i> Update Photo
      </button>
      <!-- Hidden File Input -->
      <input type="file" id="photoInput" name="picture" data-id="${employee.id}" class="photoInput" style="display: none;" accept="image/*">
      <button class="action-btn delete-btn deletePhotoBtn" data-id="${employee.id}">
          <i class="fa fa-trash"></i>
      </button>
  </div>
</div>

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
                },
                complete: function() {
                // Hide the spinner after the AJAX request completes
                $('#spinner').hide();
            }
            });
        });
    });
    </script>
    <script>
      $(document).ready(function()  {
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
// alert('employeeId');
$(document).on('click', '.editEmpInfo', function() {
    const employeeId = $(this).data('id');
    $('#empInformation').show();
    $('#empDetail').hide();
    // alert(employeeId);
    $.get('/admin/employee/edit/' + employeeId, function (data) {
            $('#employeeId').val(data.id);
           
            $('.title').val(data.title);
            $('.nick_name').val(data.nick_name);
            $('.firstName').val(data.firstName);
            $('.lastName').val(data.lastName);
            $('.username').val(data.username);
            $('.emp_id').val(data.employee_id);
            $('.phone').val(data.phone);
            $('.email').val(data.email);
            $('.extension').val(data.extension);
            $('.gender').val(data.gender);
            // $('#picture').html(`<img src"{{asset("/employee/img")}}/"`+ data.picture);
            $('.departmentName').val(data.departmentName);
                
            
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
            $('#empInformation').hide();
            $('#empDetail').show();
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
    </script>
    <script>
      $(document).ready(function () {
        // Open file input when button is clicked
        // $('.updatePhotoBtn').click(function () {
          $(document).on('click', '.updatePhotoBtn', function() {
          $('#photoInput').click();
        });
    
        // Handle file selection and send it to the server via AJAX
        // $('#photoInput').change(function () {
          $(document).on('change', '.photoInput', function() {
            const id = $(this).data('id');
            // alert('id: '+id)
           var formData = new FormData();
          formData.append('picture', this.files[0]);
          formData.append('id', id);  
          $.ajax({
            // url: '/upload-photo',
            url: `/admin/employee/${id}/update`,
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            
            success: function (response) {
              // alert('Photo uploaded successfully!');
              $('#search-form').trigger('submit');
            },
            error: function (xhr) {
              alert('Failed to upload photo.');
            }
          });
        });
      });
    </script>
<script>
  $(document).ready(function () {
    $(document).on('click', '.deletePhotoBtn', function() {
    var id = $(this).data('id');
    //  alert(id); 
    if (confirm('Are you sure you want to delete this photo?')) {
      $.ajax({
        url: '{{route("delete.photo")}}',
        type: 'POST',
        data: { id: id },
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
          // alert(response.message);
          $('#search-form').trigger('submit');
          // Reset the image to a default placeholder
          // $('#uploadedPhoto').attr('src', '/storage/default.png');
        },
        error: function (xhr) {
          alert('Failed to delete photo.');
        }
      });
    }
  });

  // cancel
  $(document).on('click', '#cancelEpmInfoFrom', function() {
            // alert('ok');
            $('#empInformation').hide();
            $('#empDetail').show();
        });

        $(document).on('click', '#cancelPersonalInfoForm', function() {
            // alert('ok');
            $('#editPersonalInfo').hide();
            $('#empPersonalDetails').show();
        });

        $(document).on('click', '#cancelJoiningInfoForm', function() {
            // alert('ok');
            $('#empJoiningInfo').hide();
            $('#empJoiningDetails').show();
        });

        $(document).on('click', '#cancelPositionForm', function() {
            // alert('ok');
            $('#empCurrentPosition').hide();
          $('#empPositionDetails').show();
        });

        $(document).on('click', '#cancelAddressForm', function() {
            // alert('ok');
            $('#empAddress').hide();
          $('#empAddressDetails').show();
        });


});


</script>
   