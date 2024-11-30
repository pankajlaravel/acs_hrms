$(document).ready(function() {
  $('#search').on('keyup', function() {
      let query = $(this).val();
      if (query.length > 1) {
          $.ajax({
              url: employeeListRoute, 
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
          url: ajaxSearch, // Ensure this is the correct route
          method: 'POST',
          data: $(this).serialize(), // Serialize form data for submission
          success: function(data) {
              let resultsHtml = '';

              if (data.length > 0) {
                  $('#original').hide(); // Hide original content
                  $.each(data, function(index, employee) {
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

<!-- Employee Information Section -->
@include('admin.employee.edit_popup')
<div class="employee-information empDetail" id="empDetail">
<h3>Employee Information <a href="javascript:void(0)" class="edit-icon editEmpInfo" data-id="${employee.id}"><i class="fa fa-pencil" title="Edit"></i></a></h3>
<div class="details-container" id="empInfo">
<div class="detail-item">
<p class="detail-label">Title</p>
<p class="detail-value">${employee.title || "--"}</p>
</div>
<div class="detail-item">
<p class="detail-label">Nick Name</p>
<p class="detail-value">${employee.nick_name || "--"}</p>
</div>
<div class="detail-item">
<p class="detail-label">Gender</p>
<p class="detail-value">${employee.gender || "--"}</p>
</div>
<div class="detail-item">
<p class="detail-label">Name</p>
<p class="detail-value">${employee.firstName} ${employee.lastName}</p>
</div>
<div class="detail-item">
<p class="detail-label">Employee Login Username</p>
<p class="detail-value">${employee.username || "--"}</p>
</div>
<div class="detail-item">
<p class="detail-label">Mobile</p>
<p class="detail-value">${employee.phone || "--"}</p>
</div>
<div class="detail-item">
<p class="detail-label">Email</p>
<p class="detail-value">${employee.email || "--"}</p>
</div>
<div class="detail-item">
<p class="detail-label">Extension</p>
<p class="detail-value">${employee.extension || "--"}</p>
</div>
</div>
</div>





<!-- Grid Section -->
<div class="employee-details">
<h3>Personal  Information<a href="" class="edit-icon"><i class="fa fa-pencil" title="Edit"></i></a></h3>
<div class="details-container">
<div class="detail-item">
<p class="detail-label">DOB</p>
<p class="detail-value">${employee.dob || "--"}</p>
</div>
<div class="detail-item">
<p class="detail-label">Birthday</p>
<p class="detail-value">${employee.birth_day || "--"}</p>
</div>
<div class="detail-item">
<p class="detail-label">Blood Group</p>
<p class="detail-value">${employee.blood_group || "--"}</p>
</div>
<div class="detail-item">
<p class="detail-label">Father's Name</p>
<p class="detail-value">${employee.father_name || "--"}</p>
</div>
<div class="detail-item">
<p class="detail-label">Marital Status</p>
<p class="detail-value">${employee.marital_status || "--"}</p>
</div>
<div class="detail-item">
<p class="detail-label">Marriage Date</p>
<p class="detail-value">${employee.marital_date || "--"}</p>
</div>
<div class="detail-item">
<p class="detail-label">Spouse Name</p>
<p class="detail-value">${employee.spouse_name || "--"}</p>
</div>
<div class="detail-item">
<p class="detail-label">Nationality</p>
<p class="detail-value">${employee.nationality || "--"}</p>
</div>
<div class="detail-item">
<p class="detail-label">Residential Status</p>
<p class="detail-value">${employee.residential_status || "--"}</p>
</div>

<div class="detail-item">
<p class="detail-label">Residential Status</p>
<p class="detail-value">${employee.residential_status || "--"}</p>
</div>
<div class="detail-item">
<p class="detail-label">Country Of Origin</p>
<p class="detail-value">${employee.country_of_origin || "--"}</p>
</div>
<div class="detail-item">
<p class="detail-label">Religion</p>
<p class="detail-value">${employee.religion || "--"}</p>
</div>
<div class="detail-item">
<p class="detail-label">International Employee</p>
<p class="detail-value">${employee.international_emp || "--"}</p>
</div>
<div class="detail-item">
<p class="detail-label">Physically Challenged</p>
<p class="detail-value">${employee.is_director || "--"}</p>
</div>
<div class="detail-item">
<p class="detail-label">Is Director</p>
<p class="detail-value">${employee.residential_status || "--"}</p>
</div>
<div class="detail-item">
<p class="detail-label">Personal Email</p>
<p class="detail-value">${employee.personal_email || "--"}</p>
</div>
</div>
</div>


<div class="employee-details">
<h3>Joining Details <a href="" class="edit-icon"><i class="fa fa-pencil" title="Edit"></i></a></h3>
<div class="details-container">
<div class="detail-item">
<p class="detail-label">Joined On</p>
<p class="detail-value">${employee.joining_Date || "--"}</p>
</div>
<div class="detail-item">
<p class="detail-label">Confirmation Date</p>
<p class="detail-value">${employee.join_confrimation_date || "--"}</p>
</div>
<div class="detail-item">
<p class="detail-label">Status</p>
<p class="detail-value">${employee.joining_status || "--"}</p>
</div>
<div class="detail-item">
<p class="detail-label">Probation Period</p>
<p class="detail-value">${employee.probation_period || "--"}</p>
</div>
<div class="detail-item">
<p class="detail-label">Notice Period</p>
<p class="detail-value">${employee.notice_period || "--"}</p>
</div>
<div class="detail-item">
<p class="detail-label">Current Company Experience</p>
<p class="detail-value">${employee.current_company_experience || "--"}</p>
</div>
<div class="detail-item">
<p class="detail-label">Previous Experience</p>
<p class="detail-value">${employee.pre_company_experiecne || "--"}</p>
</div>
<div class="detail-item">
<p class="detail-label">Total Experience</p>
<p class="detail-value">${employee.total_experience || "--"}</p>
</div>
<div class="detail-item">
<p class="detail-label">Referred By</p>
<p class="detail-value">${employee.referred_by || "--"}</p>
</div>
</div>
</div>

<div class="employee-details">
<h3>Current Position <a href="" class="edit-icon"><i class="fa fa-pencil" title="Edit"></i></a></h3>
<div class="details-container">
<div class="detail-item">
<p class="detail-label">Division</p>
<p class="detail-value">${employee.division || "--"}</p>
</div>
<div class="detail-item">
<p class="detail-label">Grade</p>
<p class="detail-value">${employee.grade || "--"}</p>
</div>
<div class="detail-item">
<p class="detail-label">Department</p>
<p class="detail-value">${employee.departmentName || "--"}</p>
</div>
<div class="detail-item">
<p class="detail-label">Location</p>
<p class="detail-value">${employee.location || "--"}</p>
</div>
<div class="detail-item">
<p class="detail-label">Designation</p>
<p class="detail-value">${employee.position_name || "--"}</p>
</div>
<div class="detail-item">
<p class="detail-label">Reporting To</p>
<p class="detail-value">${employee.reporting || "--"}</p>
</div>
<div class="detail-item">
<p class="detail-label">Category</p>
<p class="detail-value">${employee.role || "--"}</p>
</div>
<div class="detail-item">
<p class="detail-label">Attendance Marking Option</p>
<p class="detail-value">${employee.attendance_marking_option || "--"}</p>
</div>
</div>
</div>

<div class="employee-details">
<h3>Present Address <a href="" class="edit-icon"><i class="fa fa-pencil" title="Edit"></i></a></h3>
<div class="details-container">
<div class="detail-item">
<p class="detail-label">Name</p>
<p class="detail-value">${employee.extension || "--"}</p>
</div>
<div class="detail-item">
<p class="detail-label">Address</p>
<p class="detail-value">${employee.address || "--"}</p>
</div>
<div class="detail-item">
<p class="detail-label">City</p>
<p class="detail-value">${employee.city || "--"}</p>
</div>
<div class="detail-item">
<p class="detail-label">State</p>
<p class="detail-value">${employee.state || "--"}</p>
</div>
<div class="detail-item">
<p class="detail-label">Country</p>
<p class="detail-value">${employee.country || "--"}</p>
</div>
<div class="detail-item">
<p class="detail-label">Pincode</p>
<p class="detail-value">${employee.reporting || "--"}</p>
</div>
<div class="detail-item">
<p class="detail-label">Category</p>
<p class="detail-value">${employee.pin || "--"}</p>
</div>
<div class="detail-item">
<p class="detail-label">Phone1</p>
<p class="detail-value">${employee.phone1 || "--"}</p>
</div>
<div class="detail-item">
<p class="detail-label">Phone2</p>
<p class="detail-value">${employee.phone2 || "--"}</p>
</div>
<div class="detail-item">
<p class="detail-label">Ext</p>
<p class="detail-value">${employee.extension || "--"}</p>
</div>
<div class="detail-item">
<p class="detail-label">Fax</p>
<p class="detail-value">${employee.fax || "--"}</p>
</div>
<div class="detail-item">
<p class="detail-label">Mobile</p>
<p class="detail-value">${employee.phone || "--"}</p>
</div>
<div class="detail-item">
<p class="detail-label">Emial</p>
<p class="detail-value">${employee.email || "--"}</p>
</div>
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