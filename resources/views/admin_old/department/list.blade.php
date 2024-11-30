@extends('admin.layouts.app')

@section('title', 'Dashboard - HRMS Admin')

@section('content')

<!-- Page Wrapper -->
<div class="page-wrapper">
			

        <!-- Page Header -->
        
        <div class="page-header d-print-none">
            <div class="container-xl">
              <div class="row g-2 align-items-center">
                <div class="col">
                  <h2 class="page-title">
                    Department
                  </h2>
                  <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Department</li>
                </ul>
                </div>
                <div class="float-right col-auto ml-auto">
                    <a href="#" class="btn btn-primary d-none d-sm-inline-block add-btn" data-toggle="modal" data-target="#add_department"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg> Add Department</a>
                   
                </div>
              </div>
            </div>
          </div>
        <!-- /Page Header -->
        <div class="page-body">
            <div class="container-xl">
              <div class="row row-cards">
                <div class="col-md-12"> 
                    <div class="table-responsive">
                        <table id="items-table" class="table mb-0 card-table display table-vcenter text-nowrap custom-table datatable">
                            <thead>
                                <tr>
                                    <th style="width: 30px;">#</th>
                                    <th>Department Name</th>
                                    <th class="text-end">Action</th>
                                </tr>
                            </thead>
                           
                            <tbody>
                                @foreach ($departments as $num => $val )
                                
                                <tr>
                                    <td>{{ $num + 1 }}</td>
                                    <td>{{ $val['name']  }}</td>
                                    
                                    <td class="text-end">
                                        <span class="dropdown">
                                          <button class="align-text-top btn dropdown-toggle" data-bs-boundary="viewport" data-bs-toggle="dropdown">Actions</button>
                                          <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item editDepartment" href="#" data-bs-toggle="modal" data-id="{{ $val['id'] }}" data-bs-target="#edit_department"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                            <a class="dropdown-item deleteDepartmentBtn" href="#" data-toggle="modal" data-id="{{ $val['id'] }}" data-target="#delete_department"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                          </div>
                                        </span>
                                      </td>
                                </tr>
    
                                @endforeach
                                
                            </tbody>
                            
                        </table>
                    </div>
                </div>
              </div>
            </div>
          </div>
        
    
    <!-- /Page Content -->
    
    <!-- Add Holiday Modal -->
    @include('admin.department.add_popup')
    <!-- /Add Holiday Modal -->
    
    <!-- Edit Holiday Modal -->
    @include('admin.department.edit_popup')
    <!-- /Edit Holiday Modal -->

    <!-- Delete Holiday Modal -->
  
    <!-- /Delete Holiday Modal -->
    

    <!-- /Page Content -->
    
    
    

<!-- /Page Wrapper -->

@endsection
@section('script')
<script>
    $(document).ready(function() {
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).on('click', '.editDepartment', function() {
        const department_id = $(this).data('id');
        // alert(department_id);
        $.get('/admin/department/edit/' + department_id, function (data) {
                $('#department_id').val(data.id);
                $('#name').val(data.name);
                    
            });
    });

    $('#departmentEditForm').on('submit', function (e) {
     e.preventDefault();
     
     const formData = new FormData(this);
     $("#department_updating").text('Updating...');
    $.ajax({
    url: '/admin/department/${userId}/update', // Adjust the URL as needed
    type: 'POST',
    contentType: false,
    processData: false,
    data: formData,// Assuming you have a form with the ID employeeForm

    success: function(response) {
        $('#edit_department').modal('hide');
        // alert(response.success);
        Swal.fire({
        icon: 'success',
        title: 'Edit Record Successfully',
        })
        // Redirect after 3 seconds
        setTimeout(function() {
            window.location.href = '/admin/departments'; // Redirect to home page
        }, 3000);
        $('#employeeForm')[0].reset();
                    fetchEmployeeId();
    },
    error: function(xhr) {
        console.error(xhr.responseText);
        // Handle errors (display error messages, etc.)
    }
});
});
        $('#departmentForm').on('submit', function(e) {
            e.preventDefault();

        let isValid = true;
        $('.error').text(''); // Clear existing errors

        // Client-side validation example
        if ($('input[name="name"]').val() === '') {
            $('#departmenError').text('Name is required.');
            isValid = false;
        }

        if (!isValid) {
            e.preventDefault(); // Prevent form submission
            return;
        }
        
        $("#add_department").text('Saving...')
            $.ajax({
                url: '{{ route("admin.department.store")}}',
                type: 'POST',
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function(response) {
                    // alert(response.success);
                     Swal.fire({
                        icon: 'success',
                        title: 'Inserted Successfully',
                     })
                     // Redirect after 3 seconds
                     setTimeout(function() {
                            window.location.href = '/admin/departments'; // Redirect to home page
                        }, 3000);
                  
                    $('#departmentForm')[0].reset();
                    fetchEmployeeId();
                },
                error: function(xhr) {
                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.errors;
                        $.each(errors, function(key, value) {
                            // alert(value[0]);
                        });
                    }
                }
            });
        });
    });
</script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).on('click', '.deleteDepartmentBtn', function() {
    const employeeId = $(this).data('id');
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
                url: '/admin/department/delete/' + employeeId,
                method: 'DELETE',
                success: function(response) {
                    Swal.fire(
                        'Deleted!',
                        response.success,
                        'success'
                    ).then(() => {
                        // Redirect after a successful deletion
                        window.location.href = '/admin/departments';
                    });
                    // window.location.href = '/admin/employees';
                    // Remove the employee row from the table
                    $('#employee-' + employeeId).remove();
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
@endsection

         
      