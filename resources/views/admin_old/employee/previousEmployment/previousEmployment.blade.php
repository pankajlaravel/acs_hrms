
@extends('admin.layouts.app')

@section('title', 'Dashboard - HRMS Admin')

@section('content')
<div class="page-wrapper">
    <!-- Page header -->
    <div class="page-header d-print-none">
      <div class="container-xl">
        <div class="row g-2 align-items-center">
          
   
        
          <!-- Page title actions -->
          <div class="col-auto ms-auto d-print-none">
           
          </div>
        </div>
      </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
      <div class="container-xl">
        <div class="row row-deck row-cards">

          <div class="col-auto ms-auto d-print-none">
            <div class="btn-list">
              
              <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#basic_info">
                <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
              Add Employee
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
                        <form id="search-pre-emp" method="post" >
                          @csrf
                        <div class="mb-3">
                          <p>Search Employee</p>
                          <div class="input-group">
                            <span class="input-group-text" id="basic-addon1" style="border-radius: 50px 0px 0px 50px">
                              <i class="fa fa-user" ></i> <!-- Bootstrap user icon -->
                            </span>
                          
                            <input required type="search" id="search"  class="form-control custom-radius" placeholder="Search by Emp No/ Name"  />
                            <input  type="hidden" id="search_id" name="query" class="form-control custom-radius" placeholder="Search by Emp No/ Name" />
                       
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
            <button id="add-pre-info-button" class="mt-4 btn btn-success" style="display: none;">Previous Employment</button>
            <div class="page-body" id="original" >
                <div class="container">
                    <div class="card">
                        <div class="card-body">
                            <div id="table-default" class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            {{-- <th>Employee ID</th>
                                            <th>Employee Name</th> --}}
                                            <th>Company Name</th>
                                            <th>Designation</th>
                                            <th>Relevant Experience</th>
                                            <th>From Date</th>
                                            <th>To Date</th>
                                            <th>Company Address</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-tbody" id="search-results">
                                        <!-- Data will be appended here -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('admin.employee.previousEmployment.edit-info-form')
            @include('admin.employee.previousEmployment.add-info-form')
            <div id="message" class="mt-3"></div>
            </div>
          </div>
        </div>
         <!-- Display area for document info -->
  @endsection
  @section('script')
  <script>
    // Handle document search
    $('#search-pre-emp').on('submit', function(e) {
        e.preventDefault();
        
        let formData = $(this).serialize();

        $.ajax({
            url: "{{ route('previousEmployeementGet') }}", // Replace with your route
            method: "POST",
            data: formData,
            success: function(data) {
                $('#employee_id').val(data.empID);
                if (data.empInfo.length > 0) {
                    $('#original').show();
                    let dataList = '';
                    data.empInfo.forEach(function(value) {
                        dataList +=
                         `
                        <tr>
                               
                                <td>${value.company_name}</td>
                                <td>${value.designationName}</td>
                                <td>${value.relevant_experience_in_year} Years, ${value.relevant_experience_in_month} Months</td>
                                <td>${value.from_date}</td>
                                <td>${value.to_date}</td>
                                <td>${value.company_address || 'N/A'}</td>
                                <td class="text-right">
                                    <a class="editButton" href="javascript::void()" data-id="${value.id}"><i class="fa fa-pencil m-r-5"></i></a>
                                    <a class="deleteBtn" href="javascript::void()" data-id="${value.id}"><i class="fa fa-trash-o m-r-5"></i></a>
                                </td>
                            </tr>
                        `;
                    });
                    // $('#original').show();
                    $('#search-results').html(dataList); 
                    // $('#message').html(`<p>Document Found: ${data.empDoc.doc_name}</p>`);
                    $('#add-pre-info-button').show();      // Hide "Add Document" button
                    $('#addEmploymentForm').hide();        // Hide form if a document exists
                    $('#message').hide();
                } else {
                    $('#message').html(`<p>No document found. You can add a new one.</p>`);
                    $('#add-pre-info-button').show();      // Show "Add Document" button
                    $('#addEmploymentForm').hide(); 
                    $('#search-results').hide();       // Ensure the form is hidden initially
                }
            },
            error: function(xhr) {
                $('#message').html(`<p style="color:red;">${xhr.responseText}</p>`);
            }
        });
    });

    // Show add document form on button click
    $('#add-pre-info-button').on('click', function() {
        $(this).hide();  // Hide the "Add Document" button
        $('#addEmploymentForm').show();
        $('#original').hide();
        
          // Show the form
    });

    $('#cancel-file').on('click', function() {
        $('#file').val('');  // Clear the file input field
        $('#original').show();
    });

    $('#cancel-form').on('click', function() {
        // Reset the form
        $('#addEmploymentForm')[0].reset();
        
        // Hide the form and show the "Add Document" button again
        $('#addEmploymentForm').hide();
        $('#add-pre-info-button').show();
        $('#original').show();
        $('#search-pre-emp').trigger('submit');
    });


    // edit
    $('#cancele-edit-form').on('click', function() {
        $('#addEmploymentForm')[0].reset();
        
        // Hide the form and show the "Add Document" button again
        $('#editEmploymentForm').hide();
        $('#add-pre-info-button').show();
        $('#original').show();
        $('#search-pre-emp').trigger('submit');
       
    });

    // Handle add document form submission
    $('#addEmploymentForm,#edit-doc-form').on('submit', function(e) {
        e.preventDefault();
        
        let formData = new FormData(this);

        $.ajax({
            url: "{{ route('previousEmployeementPost') }}", // Your route to handle document creation
            method: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                if (response.status === 'success') {
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: response.message,
                    timer: 2000,
                    showConfirmButton: false,
                });

                // Reset the form and refresh data if needed
                $('#addEmploymentForm')[0].reset();
                $('#edit-doc-form').hide();
                $('#original').show();
                $('#search-pre-emp').trigger('submit'); // Refresh data if needed
            }
            },
            error: function(xhr) {
                // $('#message').html(`<p style="color:red;">${xhr.responseText}</p>`);
                if (xhr.status === 422) {
                let errorMessages = '';
                let response = JSON.parse(xhr.responseText);
                // alert(response);
                let errorMessage = response.message || 'Validation error occurred.';
                // alert(errorMessage);

                Swal.fire({
                    icon: 'error',
                    title: 'Validation Error',
                    text: errorMessage,
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Unexpected Error',
                    text: 'An unexpected error occurred. Please try again.',
                });
            }
            }
        });
    });
</script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).on('click', '.deleteBtn', function() {
    const id = $(this).data('id');
    // alert(employeeId);
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '/admin/previousemployeement/delete/' + id,
                method: 'DELETE',
                success: function(response) {
                    Swal.fire(
                        'Deleted!',
                        response.success,
                        'success'
                    ).then(() => {
                        // Redirect after a successful deletion
                        
                        $('#search-pre-emp').trigger('submit');
                    });
                    // window.location.href = '/admin/employees';
                    // Remove the employee row from the table
                    $('#employee-' + leadId).remove();
                    
                    $('#message').hide();
                },
                error: function(xhr) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'An unexpected error occurred.',
                    });
                }
            });
        }
    });
});

</script>

<script>
    $(document).ready(function() {
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).on('click', '.editButton', function() {
        const id = $(this).data('id');
        // alert(id);
        $.get('/admin/previousemployeement/edit/' + id, function (data) {
                $('#id').val(data.id);
                $('.employee_id').val(data.employee_id);
                $('#company_name').val(data.company_name);
                $('#designation_id').val(data.designation_id);
                $('#from_date').val(data.from_date);
                $('#to_date').val(data.to_date);
                $('#relevant_experience_in_year').val(data.relevant_experience_in_year);
                $('#relevant_experience_in_month').val(data.relevant_experience_in_month);
                $('#company_address').val(data.company_address);
                $('#nature_of_duties').val(data.nature_of_duties);
                $('#leaving_reason').val(data.leaving_reason);
              
            });
            $('#editEmploymentForm').show();
            $('#original').hide();
            $('#add-pre-info-button').hide();
    });

    $('#editEmploymentForm').on('submit', function (e) {
     e.preventDefault();
     
     const formData = new FormData(this);
     $("#department_updating").text('Updating...');
    $.ajax({
    url: '/admin/previousemployeement/${userId}/update', // Adjust the URL as needed
    type: 'POST',
    contentType: false,
    processData: false,
    data: formData,// Assuming you have a form with the ID employeeForm

    success: function(response) {
        $('#edit_department').modal('hide');
        Swal.fire(
                        'Updated!',
                        response.success,
                        'success'
                    ).then(() => {
                        // Redirect after a successful deletion
                        
                        $('#search-pre-emp').trigger('submit');
                        $('#editEmploymentForm').hide();
                    });
        $('#editEmploymentForm')[0].reset();
                    fetchEmployeeId();
    },
    error: function(xhr) {
        console.error(xhr.responseText);
        // Handle errors (display error messages, etc.)
    }
});
});
        
    });
</script>
  @endsection