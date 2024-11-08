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
                    <h3 class="page-title">Goal Type</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Goal Type</li>
                    </ul>
                </div>
                <div class="float-right col-auto ml-auto">
                    <a href="javascript::void()" class="btn add-btn" data-toggle="modal" data-target="#add_type"><i class="fa fa-plus"></i> Add New</a>
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
                                <th>Type </th>
                                <th>Description </th>
                                <th>Status</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @foreach ($goalTypes as $index => $val)
                            <tr>
                                <td>{{$index+1}}</td>
                                <td>{{$val->name}}</td>
                                <td>{{ \Illuminate\Support\Str::words($val->description, 10, '...') }}</td>
                                <td>
                                    <div class="dropdown action-label">
                                       @if ($val->status==0)
                                       <a class="btn btn-white btn-sm btn-rounded " href="javascript::void()" data-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-dot-circle-o text-success"></i> Active
                                       </a>
                                       @elseif($val->status==1)
                                         
                                        <a class="btn btn-white btn-sm btn-rounded " href="javascript::void()" data-toggle="dropdown" aria-expanded="false">
                                            <i class="fa fa-dot-circle-o text-danger"></i> Inactive
                                        </a>
                                        @endif
                                    </div>
                                </td>
                                <td class="text-right">
                                    <div class="dropdown dropdown-action">
                                        <a href="javascript::void()" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item editGolType" href="javascript::void()" data-id="{{$val->id}}" data-toggle="modal" data-target="#edit_type"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                            <a class="dropdown-item deleteGoalType" href="javascript::void()" data-id="{{$val->id}}" data-toggle="modal" data-target="#delete_type"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
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

    <!-- Add Goal Modal -->
    @include('admin.goalType.add_popup');
    <!-- /Add Goal Modal -->
    
    <!-- Edit Goal Modal -->
    @include('admin.goalType.edit_popup');
    <!-- /Edit Goal Modal -->
    
    <!-- Delete Goal Modal -->
    
    <!-- /Delete Goal Modal -->

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

    $(document).on('click', '.editGolType', function() {
        const goalType_id = $(this).data('id');
        $.get('/admin/goal-type/edit/' + goalType_id, function (data) {
                $('#goalType_id').val(data.id);
                $('#goalType_name').val(data.name);
                $('#goalType_description').val(data.description);
                
                let status = data.status;
            // alert(status);
                if(status == 0){
                    $('.goal_type_status').append(`<option value="${status}" selected>Active</option>`);
                    $('.goal_type_status').append(`<option value="1">Inactive</option>`);
                }else if(status == 1){
                    $('.goal_type_status').append(`<option value="${status}" selected>Inactive</option>`);
                    $('.goal_type_status').append(`<option value="0">Active</option>`);
                }
                
            });
    });

    $('#goalTypeEditForm').on('submit', function (e) {
     e.preventDefault();
     
     const formData = new FormData(this);
     const gaol_type_id = $('#goalType_id').val();
     $(".update").text('Updating...');
    $.ajax({
    url: '/admin/goal-type/${gaol_type_id}/update', // Adjust the URL as needed
    type: 'POST',
    contentType: false,
    processData: false,
    data: formData,// Assuming you have a form with the ID employeeForm

    success: function(response) {
        $('#edit_type').modal('hide');
        // alert(response.success);
        Swal.fire({
        icon: 'success',
        title: 'Edit Record Successfully',
        })
        // Redirect after 3 seconds
        setTimeout(function() {
        }, 2000);
        window.location.href = '/admin/goal-type'; // Redirect to home page
        $('#goalTypeEditForm')[0].reset();
                    fetchEmployeeId();
    },
    error: function(xhr) {
        console.error(xhr.responseText);
        // Handle errors (display error messages, etc.)
    }
});
});
        $('#goalTypeForm').on('submit', function(e) {
            e.preventDefault();

        let isValid = true;
        $('.error').text(''); // Clear existing errors

        // Client-side validation example
        if ($('input[name="name"]').val() === '') {
            $('#nameError').text('Name is required.');
            isValid = false;
        }

        if ($('textarea[name="description"]').val() === '') {
            $('#descriptionError').text('Description is required.');
            isValid = false;
        }

       
        // Add more client-side validation as needed

        if (!isValid) {
            e.preventDefault(); // Prevent form submission
            return;
        }
        
        $(".add_goal_type").text('Saving...')
            $.ajax({
                url: '{{ route("admin.goal-type.store")}}',
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
                    }, 2000);
                    window.location.href = '/admin/goal-type'; // Redirect to home page
                  
                    $('#goalTypeForm')[0].reset();
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
    $(document).on('click', '.deleteGoalType', function() {
    const goalType = $(this).data('id');
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
                url: '/admin/goal-type/delete/' + goalType,
                method: 'DELETE',
                success: function(response) {
                    Swal.fire(
                        'Deleted!',
                        response.success,
                        'success'
                    ).then(() => {
                        // Redirect after a successful deletion
                        window.location.href = '/admin/goal-type';
                    });
                    // window.location.href = '/admin/employees';
                    // Remove the employee row from the table
                    $('#employee-' + goalType).remove();
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

         
      