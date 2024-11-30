
@extends('admin.layouts.app')

@section('title', 'Dashboard - HRMS Admin')

@section('content')
<div class="content">
  <div class="employee-search-container">
    <div class="employee-search-content">
      <h4>Start searching to see specific employee details here</h4>
      <div class="employee-type-container">

      </div>
      <form id="search-family" method="post" >
        @csrf
      <div class="employee-search-bar">
        
        <div class="search-icon">
          <i class="fa fa-user"></i>
        </div>
      
        <input required type="search" id="search"  class="search-input" placeholder="Search by Emp No/ Name"  />
        <input  type="hidden" id="search_id" name="query" class="search-input" placeholder="Search by Emp No/ Name" />
        <button class="search-button" type="submit">
        <i class="fa fa-search"></i> 
        </button>
      </div>
    </form>
    
      <!-- Suggestions List -->
      <div class="suggestions-list" id="results" ></div>
      <div class="suggestions-list" id="suggestionsList">
        <!-- Suggestions will be dynamically populated -->
      </div>
    </div>
    <div class="employee-search-image">
      <img src="{{asset('admin/assets/img/emp-search.png')}}" alt="Search Illustration" />
    </div>
  </div>
<div class="main-header-unique" >
      {{-- <h2>Family Details</h2> --}}
      <div id="add_family" class="mt-4" style="display: none;">

        <button id="open-form"  >Add Family</button>
      </div>
  </div>
  <div class="employee-details" id="original">
  <div class="table-body-unique">
    
    <table class="table">
      <thead>
        <tr>
          <th>Name</th>
          <th>Relation</th>
          <th>DOB</th>
          <th>Age</th>
          <th>Blood Group</th>
          <th>Gender</th>
          <th>Nationality</th>
          <th>Profession</th>
          <th>Remark</th>
        </tr>
      </thead>
      <tbody class="table-tbody" id="search-results">
        {{-- <div  style="display: none;">
        
        </div> --}}
      </tbody>
    </table>
  </div> 
</div> 
<div class="open-form" style="display: none">
    

  <div class="page-wrapper">
      <!-- Page body -->
      <form class="employee-details" id="addFamaliyForm" method="POST">
        @csrf
        <input type="hidden" name="emp_id" id="employee_id" >
        <div class="card-body">
            <h3 class="card-title">Add Family</h3>
            <div class="row row-cards">
                <div class="col-md-5">
                    <div class="mb-3">
                        <label class="mt-2 form-label">Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Name">
            </div>
          </div>
          <div class="col-sm-6 col-md-3">
            <div class="mb-3">
              <label class="mt-2 form-label">Profession</label>
              <input type="text" name="profession" class="form-control" placeholder="Profession">
            </div>
          </div>
          <div class="col-sm-6 col-md-4">
            <div class="mb-3">
              <label class="mt-2 form-label">DOB</label>
              <input type="date" name="dob" class="form-control" placeholder="Date of birth">
            </div>
          </div>
          <div class="col-sm-6 col-md-6">
            <div class="mb-3">
              <label class="mt-2 form-label">Nationality</label>
              <input type="text" name="nationality" class="form-control" placeholder="Nationality" >
            </div>
          </div>
          <div class="col-sm-6 col-md-6">
            <div class="mb-3">
              <label class="mt-2 form-label">Remarks</label>
              <input type="text" name="remarks" class="form-control" placeholder="Remarks">
            </div>
          </div>

          <div class="col-md-5">
            <div class="mb-3">
                <label class="mt-2 form-label">Gender</label>
                <select class="form-control form-select" name="gender">
                  <option value="">--Select one--</option>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                </select>
              </div>
          </div>
          <div class="col-sm-6 col-md-3 ">
            <div class="mb-3">
                <label class="mt-2 form-label">Blood Group
                </label>
                <select class="form-control form-select" name="blood_group">
                    <option value="">--Select one--</option>
                    <option value="A +ve">A +ve</option>
                    <option value="A -ve">A -ve</option>
                    <option value="B +ve">B +ve</option>
                    <option value="B -ve">B -ve</option>
                    <option value="AB +ve">AB +ve</option>
                    <option value="AB -ve">AB -ve</option>
                    <option value="O +ve">O +ve</option>
                    <option value="O -ve">O -ve</option>
                </select>
              </div>
        </div>
        <div class="col-sm-6 col-md-4">
            <div class="mb-3">
              <label class="mt-2 form-label">Relation</label>
              <select class="form-control form-select" name="relation">
                <option value="">--Select one--</option>
                <option value="Father">Father</option>
                <option value="Mother">Mother</option>
                <option value="Brother">Brother</option>
                <option value="Sister">Sister</option>
                <option value="Son">Son</option>
                <option value="Daughter">Daughter</option>
                <option value="Spouse">Spouse</option>
                <option value="Grandfather">Grandfather</option>
                <option value="Grandmother">Grandmother</option>
                <option value="Uncle">Uncle</option>
                <option value="Aunt">Aunt</option>
              </select>
            </div>
          </div>
      </div>
      <div class="card-footer text-end">
        <button type="button" id="cancelAddFamilyBUtton" class="btn btn-secondary">Cancel</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
    </form>    
          
  </div>
</div>

</div>

  @endsection
@section('script')
<script>
    $(document).ready(function() {
    
      $(document).on('click', '#cancelAddFamilyBUtton', function() {
            // alert('ok');
            $('.open-form').hide();
          $('#add_family').show();
          $('#original').show();
        });    
    // search submit
    $('#search-family').on('submit', function(e) {
      $('#spinner').show();
      $('#add_family').show();
      $('.open-form').hide();
      $('#original').show();
      $('#search-results').show();
            e.preventDefault(); // Prevent default form submission
            $.ajax({
                url: '{{ route("search.family_details") }}', // Ensure this is the correct route
                method: 'POST',
                data: $(this).serialize(), // Serialize form data for submission
                success: function(data) {
                    let resultsHtml = '';

                    if (data.length > 0) {
                        $('.original').hide(); // Hide original content 
                        $.each(data, function(index, employee) {
                            resultsHtml += `<tr>
                             <td class="sort-name">${employee.name || "--"}</td>  
                             <td class="sort-name">${employee.relation || "--"}</td>  
                             <td class="sort-name">${employee.dob || "--"}</td>  
                             <td class="sort-name">${employee.age || "--"}</td>  
                             <td class="sort-name">${employee.blood_group || "--"}</td>  
                             <td class="sort-name">${employee.gender || "--"}</td>  
                             <td class="sort-name">${employee.nationality || "--"}</td>  
                             <td class="sort-name">${employee.profession || "--"}</td>  
                             <td class="sort-name">${employee.remarks || "--"}</td>  
                        </tr> `;
                        });
                    } else {
                        $('.original').hide();
                        resultsHtml += ` `;
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
$(document).on('click', '#open-form', function() {
    // $('#search-results').hide();
    // location.reload();
    $('#original').hide();
    $('.open-form').show();
    let departmentId = 1;
    $.ajax({
                url: '{{ route("getEmpId") }}',
                type: 'GET',
                data: { id: departmentId },
                success: function(response) {
                    // Handle the response and display it
                    // alert(response.employee_id);
                    $('#employee_id').val(response.employee_id);
                    // $('#result').html('Department Name: ' + response.employee_id);
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
});

$('#addFamaliyForm').on('submit', function (e) {
    e.preventDefault(); // Prevent the default form submission behavior
    
    const formData = new FormData(this);
    // $("#updating").text('Updating...'); // Indicate updating process
    
    $.ajax({
        url: '{{ route("store.family_details") }}', // Ensure the correct URL is set
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
            $('#addFamaliyForm')[0].reset();
            
            // Update the search results area dynamically with the new data
            fetchUpdatedEmployeeList(); // Custom function to reload employee list
            
            // Clear the updating text
            // $("#updating").text('Update');
        },
        error: function(xhr) {
            console.error(xhr.responseText); // Log any errors for debugging
        }
    });
});

// Function to dynamically fetch and update employee list
function fetchUpdatedEmployeeList() {
 
        $('#search-family').trigger('submit');
}

});
    </script>
@endsection