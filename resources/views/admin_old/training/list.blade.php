@extends('admin.layouts.app')

@section('title', 'Dashboard - HRMS Admin')

@section('content')

<!-- Page Wrapper -->
<div class="page-wrapper">
			
    <div class="page-header d-print-none">
        <div class="container-xl">
          <div class="row g-2 align-items-center">
            <div class="col">
              <h2 class="page-title">
               Training
              </h2>
              <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item active">Training</li>
            </ul>
            </div>
            <div class="float-right col-auto ml-auto">
                <a href="#" class="btn btn-primary d-none d-sm-inline-block add-btn" data-toggle="modal" data-target="#add_training"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg> Add Training</a>
               
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
                                
                                    <a href="javascript::void()" class="avatar"><img alt="" src="{{asset('trainers/img/'.$val->t_picture)}}"></a>
                                    <a href="javascript::void()">{{$val->t_fname.' '.$val->t_lname}} </a>
                              
                            </td>
                            <td>
                                
                                        <a href="{{route('admin.employee.view',$val->emp_id)}}" class="avatar title="{{$val->emp_fname.' '.$val->emp_lname}}" data-toggle="tooltip"><img alt="" src="{{asset('employee/img/'.$val->emp_picture)}}"></a>
                                   
                            </td>
                            <td>{{ \Carbon\Carbon::parse($val->start_date)->format('d M Y') }} - {{ \Carbon\Carbon::parse($val->end_date)->format('d M Y') }}</td>
                            <td>{{ \Illuminate\Support\Str::words($val->description, 4, '...') }}</td>
                            <td>{{$val->trainer_cost}} Rs</td>
                            <td>
                                <div class="dropdown action-label">
                                    @if ($val->status == 0)
                                      <span class="badge bg-success me-1"></span> Active
                                    @else  
                                    
                                    <span class="badge bg-danger me-1"></span> Inactive
                                    @endif
                                    
                                </div>
                            </td>
                            <td class="text-right">
                                <div class="dropdown dropdown-action">
                                    <button class="align-text-top btn dropdown-toggle" data-bs-boundary="viewport" data-bs-toggle="dropdown">Actions</button>
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

         
      