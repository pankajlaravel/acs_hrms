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
                <h3 class="page-title">Training</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Training</li>
                </ul>
            </div>
            <div class="float-right col-auto ml-auto">
                <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_training"><i class="fa fa-plus"></i> Add New </a>
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
                            <th>Training Type</th>
                            <th>Trainer</th>
                            <th>Employee</th>
                            <th>Time Duration</th>
                            <th>Description </th>
                            <th>Cost </th>
                            <th>Status </th>
                            <th class="text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($trainings as $index => $val)
                        <tr>
                            <td>{{$index+1}}</td>
                            <td>{{$val->typeName}}</td>
                            <td>
                                <h2 class="table-avatar">
                                    <a href="javascript::void()" class="avatar"><img alt="" src="{{asset('trainers/img/'.$val->t_picture)}}"></a>
                                    <a href="javascript::void()">{{$val->t_fname.' '.$val->t_lname}} </a>
                                </h2>
                            </td>
                            <td>
                                <ul class="team-members">
                                    <li>
                                        <a href="{{route('admin.employee.view',$val->emp_id)}}" title="{{$val->emp_fname.' '.$val->emp_lname}}" data-toggle="tooltip"><img alt="" src="{{asset('employee/img/'.$val->emp_picture)}}"></a>
                                    </li>
                                    {{-- <li>
                                        <a href="#" title="Richard Miles" data-toggle="tooltip"><img alt="" src="../assets/img/profiles/avatar-09.jpg"></a>
                                    </li>
                                    <li class="dropdown avatar-dropdown">
                                        <a href="#" class="all-users dropdown-toggle" data-toggle="dropdown" aria-expanded="false">+15</a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <div class="avatar-group">
                                                <a class="avatar avatar-xs" href="#">
                                                    <img alt="" src="../assets/img/profiles/avatar-02.jpg">
                                                </a>
                                                <a class="avatar avatar-xs" href="#">
                                                    <img alt="" src="../assets/img/profiles/avatar-09.jpg">
                                                </a>
                                                <a class="avatar avatar-xs" href="#">
                                                    <img alt="" src="../assets/img/profiles/avatar-10.jpg">
                                                </a>
                                                <a class="avatar avatar-xs" href="#">
                                                    <img alt="" src="../assets/img/profiles/avatar-05.jpg">
                                                </a>
                                                <a class="avatar avatar-xs" href="#">
                                                    <img alt="" src="../assets/img/profiles/avatar-11.jpg">
                                                </a>
                                                <a class="avatar avatar-xs" href="#">
                                                    <img alt="" src="../assets/img/profiles/avatar-12.jpg">
                                                </a>
                                                <a class="avatar avatar-xs" href="#">
                                                    <img alt="" src="../assets/img/profiles/avatar-13.jpg">
                                                </a>
                                                <a class="avatar avatar-xs" href="#">
                                                    <img alt="" src="../assets/img/profiles/avatar-01.jpg">
                                                </a>
                                                <a class="avatar avatar-xs" href="#">
                                                    <img alt="" src="../assets/img/profiles/avatar-16.jpg">
                                                </a>
                                            </div>
                                            <div class="avatar-pagination">
                                                <ul class="pagination">
                                                    <li class="page-item">
                                                        <a class="page-link" href="#" aria-label="Previous">
                                                            <span aria-hidden="true">«</span>
                                                            <span class="sr-only">Previous</span>
                                                        </a>
                                                    </li>
                                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                    <li class="page-item">
                                                        <a class="page-link" href="#" aria-label="Next">
                                                            <span aria-hidden="true">»</span>
                                                            <span class="sr-only">Next</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>  --}}
                                </ul>
                            </td>
                            <td>{{ \Carbon\Carbon::parse($val->start_date)->format('d M Y') }} - {{ \Carbon\Carbon::parse($val->end_date)->format('d M Y') }}</td>
                            <td>{{ \Illuminate\Support\Str::words($val->description, 4, '...') }}</td>
                            <td>{{$val->trainer_cost}} Rs</td>
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
                                        <a class="dropdown-item editTraining" href="javascript::void()" data-id="{{$val->id}}" data-toggle="modal" data-target="#edit_training"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                        <a class="dropdown-item deleteTraining" href="javascript::void()" data-id="{{$val->id}}" data-toggle="modal" data-target="#delete_training"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
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

    <!-- Add Trainers List Modal -->
    @include('admin.training.add_popup')
    <!-- /Add Trainers List Modal -->
    
    <!-- Edit Trainers List Modal -->
   @include('admin.training.edit_popup')
    <!-- /Edit Trainers List Modal -->
    
    <!-- Delete Trainers List Modal -->
   
    <!-- /Delete Trainers List Modal -->

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

    $(document).on('click', '.editTraining', function() {
        const training = $(this).data('id');
        // alert(training);
        $.get('/admin/training/edit/' + training, function (data) {
                $('#trainingId').val(data.id);
                $('#emp_id').val(data.emp_id);
                $('#trainer_cost').val(data.trainer_cost);
                $('#start_date').val(data.start_date);
                $('#end_date').val(data.end_date);
                $('#training_description').val(data.description);

                let emp_id = data.emp_id; 
                let emp_name = data.emp_fname+' '+data.emp_lname; 
                $('.emp_name').append(`<option value="${emp_id}" selected>${emp_name}</option>`);

                let training_type_id = data.training_type_id; 
                let typeName = data.typeName; 
                $('.typeName').append(`<option value="${training_type_id}" selected>${typeName}</option>`);

                let trainer_id = data.trainer_id; 
                let trainerName = data.t_fname+' '+data.t_lname; 
                // alert(trainerName);
                $('.trainerName').append(`<option value="${trainer_id}" selected>${trainerName}</option>`);
                
                let status = data.status;
            // alert(status);
                if(status == 0){
                    $('.training_status').append(`<option value="${status}" selected>Active</option>`);
                    $('.training_status').append(`<option value="1">Inactive</option>`);
                }else if(status == 1){
                    $('.training_status').append(`<option value="${status}" selected>Inactive</option>`);
                    $('.training_status').append(`<option value="0">Active</option>`);
                }
                
            });
    });

    $('#trainingEditForm').on('submit', function (e) {
     e.preventDefault();
     
     const formData = new FormData(this);
     const trainingId = $('#trainingId').val();
     $(".update").text('Updating...');
    $.ajax({
    url: '/admin/training/${trainingId}/update', // Adjust the URL as needed
    type: 'POST',
    contentType: false,
    processData: false,
    data: formData,// Assuming you have a form with the ID employeeForm

    success: function(response) {
        $('#edit_training_type').modal('hide');
        // alert(response.success);
        Swal.fire({
        icon: 'success',
        title: 'Edit Record Successfully',
        })
        // Redirect after 3 seconds
        setTimeout(function() {
        }, 2000);
        window.location.href = '/admin/training'; // Redirect to home page
        $('#trainingEditForm')[0].reset();
                    fetchEmployeeId();
    },
    error: function(xhr) {
        console.error(xhr.responseText);
        // Handle errors (display error messages, etc.)
    }
});
});
        $('#trainingForm').on('submit', function(e) {
            e.preventDefault();

        let isValid = true;
        $('.error').text(''); // Clear existing errors

        // Client-side validation example
        if ($('select[name="trainer_id"]').val() === '') {
            $('#trainer_idError').text('Training Type is required.');
            isValid = false;
        }

        if ($('select[name="emp_id"]').val() === '') {
            $('#emp_idError').text('Employee is required.');
            isValid = false;
        }

        if ($('select[name="training_type_id"]').val() === '') {
            $('#training_type_idError').text('Trainer is required.');
            isValid = false;
        }

        if ($('input[name="trainer_cost"]').val() === '') {
            $('#trainer_costError').text('Trainer cost is required.');
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
        
        $(".add_training").text('Saving...')
            $.ajax({
                url: '{{ route("admin.training.store")}}',
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
                    window.location.href = '/admin/training'; // Redirect to home page
                  
                    $('#trainingForm')[0].reset();
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
    $(document).on('click', '.deleteTraining', function() {
    const trainingId = $(this).data('id');
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
                url: '/admin/training/delete/' + trainingId,
                method: 'DELETE',
                success: function(response) {
                    Swal.fire(
                        'Deleted!',
                        response.success,
                        'success'
                    ).then(() => {
                        // Redirect after a successful deletion
                        window.location.href = '/admin/training';
                    });
                    // window.location.href = '/admin/employees';
                    // Remove the employee row from the table
                    $('#employee-' + training).remove();
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

         
      