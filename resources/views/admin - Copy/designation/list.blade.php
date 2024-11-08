@extends('admin.layouts.app')

@section('title', 'Dashboard - HRMS Admin')

@section('content')

<!-- Page Wrapper -->
<div class="page-wrapper">
			
    <!-- Page Content -->
    <div class="content container-fluid">
    
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Designations</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Designations</li>
                    </ul>
                </div>
                <div class="float-right col-auto ml-auto">
                    <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_designation"><i class="fa fa-plus"></i> Add Designation</a>
                </div>
            </div>
        </div>
        <!-- /Page Header -->
        
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table mb-0 table-striped custom-table datatable">
                        <thead>
                            <tr>
                                <th style="width: 30px;">#</th>
                                <th>Designation </th>
                                <th>Department </th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                       
                        <tbody>
                            @foreach ($designations as $num => $val)
                            <tr>
                                <td>{{ $num + 1 }}</td>
                                <td>{{ $val->name }}</td>
                                <td>{{ $val->department_name }}</td>
                                <td class="text-right">
                                <div class="dropdown dropdown-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item editDesignation" href="#" data-toggle="modal" data-id="{{ $val->id }}" data-target="#edit_designation"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                        <a class="dropdown-item deleteDesignationtBtn" href="#" data-toggle="modal" data-id="{{ $val->id }}" data-target="#delete_designation"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                    </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                           
                        </tbody>
                       
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /Page Content -->

    <!-- Add Holiday Modal -->
    @include('admin.designation.add_popup');
    <!-- /Add Holiday Modal -->
    
    <!-- Edit Holiday Modal -->
    @include('admin.designation.edit_popup');
    <!-- /Edit Holiday Modal -->

    <!-- Delete Holiday Modal -->
  
    <!-- /Delete Holiday Modal -->

</div>
    <!-- /Page Content -->
    
    
    
</div>
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

    $(document).on('click', '.editDesignation', function() {
        const designation_id = $(this).data('id');
        $.get('/admin/designation/edit/' + designation_id, function (data) {
                $('#designation_id').val(data.id);
                $('#name').val(data.name);
                $('#department').val(data.department);
                    
            });
    });

    $('#designationEditForm').on('submit', function (e) {
     e.preventDefault();
     
     const formData = new FormData(this);
     $(".designation_updating").text('Updating...');
    $.ajax({
    url: '/admin/designation/${userId}/update', // Adjust the URL as needed
    type: 'POST',
    contentType: false,
    processData: false,
    data: formData,// Assuming you have a form with the ID employeeForm

    success: function(response) {
        // $('#edit_designation').modal('hide');
        // alert(response.success);
        Swal.fire({
        icon: 'success',
        title: 'Edit Record Successfully',
        })
        // Redirect after 3 seconds
        setTimeout(function() {
            window.location.href = '/admin/designations'; // Redirect to home page
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
        $('#designationForm').on('submit', function(e) {
            e.preventDefault();

        let isValid = true;
        $('.error').text(''); // Clear existing errors

        // Client-side validation example
        if ($('input[name="name"]').val() === '') {
            $('#nameError').text('Name is required.');
            isValid = false;
        }

        if ($('select[name="department"]').val() === '') {
            $('#departmentError').text('Designation is required.');
            isValid = false;
        }

        if (!isValid) {
            e.preventDefault(); // Prevent form submission
            return;
        }
        
        $(".add_designation").text('Saving...')
            $.ajax({
                url: '{{ route("admin.designation.store")}}',
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
                            window.location.href = '/admin/designations'; // Redirect to home page
                        }, 3000);
                  
                    $('#designationForm')[0].reset();
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
    $(document).on('click', '.deleteDesignationtBtn', function() {
    const designationId = $(this).data('id');
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
                url: '/admin/designation/delete/' + designationId,
                method: 'DELETE',
                success: function(response) {
                    Swal.fire(
                        'Deleted!',
                        response.success,
                        'success'
                    ).then(() => {
                        // Redirect after a successful deletion
                        window.location.href = '/admin/designations';
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

         
      