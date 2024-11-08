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
                    <h3 class="page-title">Goal Tracking</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Goal Tracking</li>
                    </ul>
                </div>
                
                <div class="float-right col-auto ml-auto">
                    <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_goal"><i class="fa fa-plus"></i> Add New</a>
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
                                <th>Goal Type</th>
                                <th>Subject</th>
                                <th>Target Achievement</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Description </th>
                                <th>Status </th>
                                {{-- <th>Progress </th> --}}
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @foreach ($goals as $index=> $val)
                            <tr>
                                <td>{{$index+1}}</td>
                                <td>{{$val->name}}</td>
                                <td>{{$val->subject}}</td>
                                <td>{{$val->target_achievement}}</td>
                                <td>{{ \Carbon\Carbon::parse($val->start_date)->format('d M Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($val->end_date)->format('d M Y') }}</td>
                                <td>{{ \Illuminate\Support\Str::words($val->description, 5, '...') }}</td>
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
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item editGoal" href="javascript::void()" data-id="{{$val->id}}" data-toggle="modal" data-target="#edit_goal"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                            <a class="dropdown-item deleteGoal" href="javascript::void()" data-id="{{$val->id}}" data-toggle="modal" data-target="#delete_goal"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
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
    @include('admin.goals.add_popup');
    <!-- /Add Goal Modal -->
    
    <!-- Edit Goal Modal -->
    @include('admin.goals.edit_popup');
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

    $(document).on('click', '.editGoal', function() {
        const editGoal_id = $(this).data('id');
        // alert(editGoal_id);
        $.get('/admin/goal-tracking/edit/' + editGoal_id, function (data) {
                $('#goal_id').val(data.id);
                $('.goal_type_id').val(data.goal_type_id);
                $('.subject').val(data.subject);
                $('.target_achievement').val(data.target_achievement);
                $('.start_date').val(data.start_date);
                $('.end_date').val(data.end_date);
                $('.description').val(data.description);
                $('.status').val(data.status);
                
                let goal_type_id = data.goal_type_id; 
                let name = data.name;
                $('.goal_name').append(`<option value="${goal_type_id}" selected>${name}</option>`);
                let status = data.status;
                if(status == 0){
                    $('.goal_status').append(`<option value="${status}" selected>Active</option>`);
                    $('.goal_status').append(`<option value="1">Inactive</option>`);
                }else if(status == 1){
                    $('.goal_status').append(`<option value="${status}" selected>Inactive</option>`);
                    $('.goal_status').append(`<option value="0">Active</option>`);
                }
                
            });
    });

    $('#goalEditForm').on('submit', function (e) {
     e.preventDefault();
     
     const formData = new FormData(this);
     const goal_id = $('#goal_id').val();
    //  alert(goal_id);
     $(".update").text('Updating...');
    $.ajax({
    url: '/admin/goal-tracking/${goal_id}/update', // Adjust the URL as needed
    type: 'POST',
    contentType: false,
    processData: false,
    data: formData,// Assuming you have a form with the ID employeeForm

    success: function(response) {
        $('#edit_type').modal('hide');
        alert('ok');
        Swal.fire({
        icon: 'success',
        title: 'Edit Record Successfully',
        })
        // Redirect after 3 seconds
        setTimeout(function() {
        }, 2000);
        window.location.href = '/admin/goal-tracking'; // Redirect to home page
        $('#goalEditForm')[0].reset();
                    fetchEmployeeId();
    },
    error: function(xhr) {
        console.error(xhr.responseText);
        // Handle errors (display error messages, etc.)
    }
});
});
        $('#goalForm').on('submit', function(e) {
            e.preventDefault();

        let isValid = true;
        $('.error').text(''); // Clear existing errors

        // Client-side validation example
        if ($('select[name="goal_type_id"]').val() === '') {
            $('#goal_type_idError').text('Type is required.');
            isValid = false;
        }

        if ($('input[name="subject"]').val() === '') {
            $('#subjectError').text('Subject is required.');
            isValid = false;
        }

        if ($('input[name="target_achievement"]').val() === '') {
            $('#target_achievementError').text('Target is required.');
            isValid = false;
        }
        
        if ($('input[name="start_date"]').val() === '') {
            $('#start_dateError').text('Date is required.');
            isValid = false;
        }

        if ($('input[name="end_date"]').val() === '') {
            $('#end_dateError').text('Date is required.');
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
        
        $(".add_goal").text('Saving...')
            $.ajax({
                url: '{{ route("admin.goal-tracking.store")}}',
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
                    window.location.href = '/admin/goal-tracking'; // Redirect to home page
                  
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
    $(document).on('click', '.deleteGoal', function() {
    const goal_id = $(this).data('id');
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
                url: '/admin/goal-tracking/delete/' + goal_id,
                method: 'DELETE',
                success: function(response) {
                    Swal.fire(
                        'Deleted!',
                        response.success,
                        'success'
                    ).then(() => {
                        // Redirect after a successful deletion
                        window.location.href = '/admin/goal-tracking';
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

         
      