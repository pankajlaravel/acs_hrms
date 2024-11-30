
@extends('admin.layouts.app')

@section('title', 'Dashboard - HRMS Admin')

@section('content')
<div class="page-wrapper">
    <!-- Page header -->
    
    <!-- Page body -->
    <div class="mt-6">
      <div class="container">
        <div class="row row-deck row-cards">

          <div class="col-auto ms-auto d-print-none" id="add_family" style="display: none">
            <div class="btn-list">
              
              <a href="#" class="btn btn-primary d-none d-sm-inline-block" id="open-form" >
                <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
              Add Family
              </a>
              
            </div>
          </div>

          {{-- Search --}}
          <div class="col-12">
            <div class="row row-cards">
              <div class="col-12">
                <div class="card" >
                  <div class="card-body">
                    <h3 class="card-title">Start searching to see specific employee details here</h3>
                    <div class="row row-cards">
                      <div class="col-md-5">
                        <form id="search-family" method="post" >
                          @csrf
                        <div class="mb-3">
                          <p>Search Employee</p>
                          <div class="input-group">
                            <span class="input-group-text" id="basic-addon1" style="border-radius: 50px 0px 0px 50px">
                              <i class="fa fa-user" ></i> <!-- Bootstrap user icon -->
                            </span>
                            <input required type="search" id="search"  class="form-control custom-radius" placeholder="Search by Emp No/ Name"  />
                            <input  type="hidden" id="search_id" name="query" class="form-control custom-radius" placeholder="Search by Emp No/ Name"  />
                            {{-- <div id="suggestions" class="suggestions" style="position: absolute; z-index: 1000; display: none; background: white; border: 1px solid #ddd;"></div> --}}
                            <button class="btn btn-primary" type="submit" style="border-radius: 0px 50px 50px 0px">
                              <i class="fa fa-search"></i> <!-- Bootstrap search icon -->
                            </button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <ul class="list-group" style="display:block;position:relative;z-index:1" id="results" ></ul>
              </div>
            </div>
          </div>
        </div>
          
          {{--  --}}
          
        
        </div>
      </div>
    </div>
    <div class="page-body" id="original">
        <div class="container">
          <div class="card">
            <div class="card-body">

                <div id="table-default" class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th><button class="table-sort" data-sort="sort-name">Name</button></th>
                          <th><button class="table-sort" data-sort="sort-city">Relation</button></th>
                          <th><button class="table-sort" data-sort="sort-type">DOB</button></th>
                          <th><button class="table-sort" data-sort="sort-score">Age</button></th>
                          <th><button class="table-sort" data-sort="sort-date">Blood Group</button></th>
                          <th><button class="table-sort" data-sort="sort-quantity">Gender</button></th>
                          <th><button class="table-sort" data-sort="sort-progress">Nationality</button></th>
                          <th><button class="table-sort" data-sort="sort-progress">Profession</button></th>
                          <th><button class="table-sort" data-sort="sort-progress">Remark</button></th>
                        </tr>
                      </thead>
                      <tbody class="table-tbody" id="search-results">
                        {{-- <div  style="display: none;">
                        
                        </div> --}}
                      </tbody>
                    </table>
                  </div> 
                    
            
            </div>
          </div>
        </div>
      </div>
    
<div class="open-form" style="display: none">
    

<div class="page-wrapper">
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
          <div class="row row-cards">
            
          <div class="col-lg-12">
            <div class="row row-cards">
              <div class="col-12">
                <form class="card" id="addFamaliyForm" method="POST">
                    @csrf
                    <input type="hidden" name="emp_id" id="employee_id" >
                    <div class="card-body">
                        <h3 class="card-title">Add Family</h3>
                        <div class="row row-cards">
                            <div class="col-md-5">
                                <div class="mb-3">
                                    <label class="form-label mt-2">Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Name">
                        </div>
                      </div>
                      <div class="col-sm-6 col-md-3">
                        <div class="mb-3">
                          <label class="form-label mt-2">Profession</label>
                          <input type="text" name="profession" class="form-control" placeholder="Profession">
                        </div>
                      </div>
                      <div class="col-sm-6 col-md-4">
                        <div class="mb-3">
                          <label class="form-label mt-2">DOB</label>
                          <input type="date" name="dob" class="form-control" placeholder="Date of birth">
                        </div>
                      </div>
                      <div class="col-sm-6 col-md-6">
                        <div class="mb-3">
                          <label class="form-label mt-2">Nationality</label>
                          <input type="text" name="nationality" class="form-control" placeholder="Nationality" >
                        </div>
                      </div>
                      <div class="col-sm-6 col-md-6">
                        <div class="mb-3">
                          <label class="form-label mt-2">Remarks</label>
                          <input type="text" name="remarks" class="form-control" placeholder="Remarks">
                        </div>
                      </div>
    
                      <div class="col-md-5">
                        <div class="mb-3">
                            <label class="form-label mt-2">Gender</label>
                            <select class="form-control form-select" name="gender">
                              <option value="">--Select one--</option>
                              <option value="Male">Male</option>
                              <option value="Female">Female</option>
                            </select>
                          </div>
                      </div>
                      <div class="col-sm-6 col-md-3 ">
                        <div class="mb-3">
                            <label class="form-label mt-2">Blood Group
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
                          <label class="form-label mt-2">Relation</label>
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
                    <button type="submit" class="btn btn-primary">Save</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>    
        
</div>
  @endsection
@section('script')
<script>
    $(document).ready(function() {
        
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