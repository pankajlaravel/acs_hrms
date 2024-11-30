
@extends('admin.layouts.app')

@section('title', 'Dashboard - HRMS Admin')

@section('content')
<div class="content">
    
    <!-- Page body -->
    <div class="employee-search-container">
        <div class="employee-search-content">
          <h4>Start searching to see specific employee details here</h4>
          <div class="employee-type-container">
    
          </div>
          <form id="search-pre-emp" method="post" >
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

      <div class="mt-4 employee-details" id="original">
        <!-- Left Container: Table -->
        <div class="table-wrapper-unique">
            <div class="main-header-unique">
                <h2>Company Details</h2>
                <button id="add-pre-info-button" style="display: none;">Add Previous Employment</button>
            </div>

            <!-- Table -->
            <div class="table-body-unique" >
                <table>
                    <thead>
                        <tr>
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
                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('admin.employee.previousEmployment.edit-info-form')
            @include('admin.employee.previousEmployment.add-info-form')
            <div id="message" class="mt-3"></div>
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
                                <td>
                                    <a class="editButton" href="javascript::void()" data-id="${value.id}"><i class="fa fa-pencil m-r-5"></i></a>
                                    <a class="deleteBtn" href="javascript::void()" data-id="${value.id}"><i class="fa fa-trash m-r-5"></i></a>
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