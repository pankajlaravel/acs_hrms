@extends('admin.layouts.app')

@section('title', 'Dashboard - HRMS Admin')

@section('content')
<div class="page-wrapper">
			
    <!-- Page Content -->
    <div class="content container-fluid">
    
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Overtime</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Overtime</li>
                    </ul>
                </div>
                <div class="float-right col-auto ml-auto">
                    <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_overtime"><i class="fa fa-plus"></i> Add Overtime</a>
                </div>
            </div>
        </div>
        <!-- /Page Header -->
        
        <!-- Overtime Statistics -->
        {{-- <div class="row">
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                <div class="stats-info">
                    <h6>Overtime Employee</h6>
                    <h4>12 <span>this month</span></h4>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                <div class="stats-info">
                    <h6>Overtime Hours</h6>
                    <h4>118 <span>this month</span></h4>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                <div class="stats-info">
                    <h6>Pending Request</h6>
                    <h4>23</h4>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                <div class="stats-info">
                    <h6>Rejected</h6>
                    <h4>5</h4>
                </div>
            </div>
        </div> --}}
        <!-- /Overtime Statistics -->
        
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table mb-0 table-striped custom-table datatable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Employee Name</th>
                                <th>OT Date</th>
                                <th class="text-center">OT Hours</th>
                                {{-- <th>OT Type</th> --}}
                                <th>Description</th>
                                
                                <th class="text-right">Actions</th>
                            </tr>
                        </thead>
                       
                        <tbody>
                            @foreach ( $get_data as $num => $val )
                            <tr>
                                <td>{{ $num +1  }}</td>
                                <td>
                                    <h2 class="table-avatar blue-link">
                                        
                                        <a href="profile.php">{{$val->fname.' '.$val->lname}}</a>
                                    </h2>
                                </td>
                                <td>{{$val->date}}</td>
                                <td class="text-center">{{$val->working_hours}}</td>
                                <td>{{$val->description}}</td>
                                {{-- <td>{{$val->date}}</td> --}}
                                <td class="text-right">
                                    <div class="dropdown dropdown-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item editEmployeeOvertime" href="#" data-toggle="modal" data-id="{{ $val->id }}" data-target="#edit_overtime"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                            <a class="dropdown-item deleteBtn" href="#" data-toggle="modal" data-id="{{ $val->id }}" data-target="#delete_overtime"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
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
    
    <!-- Add Overtime Modal -->
    @include('admin.overtime.add_popup');
    <!-- /Add Overtime Modal -->
    
    <!-- Edit Overtime Modal -->
    @include('admin.overtime.edit_popup');
    <!-- /Edit Overtime Modal -->
    
    <!-- Delete Overtime Modal -->
    
    <!-- /Delete Overtime Modal -->
    
</div>
            <!-- /Page Content -->
         </div>
<!-- Employee Modal -->

 
 
<!-- / Employee Modal -->
@endsection
@section('script')
<script>
    $(document).ready(function() {
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).on('click', '.editEmployeeOvertime', function() {
        const employeeId = $(this).data('id');
        // alert(employeeId);
        $.get('/admin/employee/overtime/edit/' + employeeId, function (data) {
                $('#employeeId').val(data.id);
                $('#emp_id').val(data.emp_id);
                $('#date').val(data.date);
                $('#working_hours').val(data.working_hours);
                $('#description').val(data.description);
                
                let emp_id = data.emp_id; 
                let emp_name = data.emp_first_name+' '+data.emp_last_name; 
                $('.emp_name').append(`<option value="${emp_id}" selected>${emp_name}</option>`);
                // $('#picture').html(`<img src"{{asset("/employee/img")}}/"`+ data.picture);
                if (data.picture) {
            $('#previewImage').attr('src', '{{asset("/employee/img")}}/' + data.picture).show(); // Set the src and show the image
                } else {
                    $('#previewImage').hide(); // Hide if no image
                }
            });
    });

    $('#employeeOvertimeEditForm').on('submit', function (e) {
     e.preventDefault();
     
     const formData = new FormData(this);
     const userId = $('#employeeId').val();
     $(".updating").text('Updating...');
    $.ajax({
    url: '/admin/employee/overtime/${userId}/update', // Adjust the URL as needed
    type: 'POST',
    contentType: false,
    processData: false,
    data: formData,// Assuming you have a form with the ID employeeForm

    success: function(response) {
        $('#edit_overtime').modal('hide');
        // alert(response.success);
        Swal.fire({
        icon: 'success',
        title: 'Edit Record Successfully',
        })
        // Redirect after 3 seconds
        setTimeout(function() {
        }, 2000);
        window.location.href = '/admin/employee/overtime'; // Redirect to home page
        $('#employeeOvertimeEditForm')[0].reset();
                    fetchEmployeeId();
    },
    error: function(xhr) {
        console.error(xhr.responseText);
        // Handle errors (display error messages, etc.)
    }
});
});
        $('#overtimeForm').on('submit', function(e) {
            e.preventDefault();

        let isValid = true;
        $('.error').text(''); // Clear existing errors

        // Client-side validation example
        

        if ($('select[name="emp_id"]').val() === '') {
            $('#emp_idError').text('Select is required.');
            isValid = false;
        }

        if ($('input[name="date"]').val() === '') {
            $('#dateError').text('Date is required.');
            isValid = false;
        }

        if ($('input[name="working_hours"]').val() === '') {
            $('#working_hoursError').text('Working hours is required.');
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
        var url = $(this).attr('data-action');
        $(".addData").text('Saving...')
            $.ajax({
                url: '{{route("admin.employee.overtime.store")}}',
                type: 'POST',
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function(response) {
                    // alert(response.success);
                    $('#edit_overtime').modal('hide');
                     Swal.fire({
                        icon: 'success',
                        title: 'Inserted Successfully',
                     })
                     // Redirect after 3 seconds
                     setTimeout(function() {
                            window.location.href = '/admin/employee/overtime'; // Redirect to home page
                        }, 3000);
                  
                    $('#overtimeForm')[0].reset();
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
    $(document).on('click', '.deleteBtn', function() {
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
                url: '/admin/employee/overtime/delete/' + employeeId,
                method: 'DELETE',
                success: function(response) {
                    $('#edit_overtime').modal('hide');
                    Swal.fire(
                        'Deleted!',
                        response.success,
                        'success'
                    ).then(() => {
                        // Redirect after a successful deletion
                        window.location.href = '/admin/employee/overtime';
                    });
                    // window.location.href = '/admin/employee/overtime';
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

         
      