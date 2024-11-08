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
                   Training Type
                  </h2>
                  <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Training Type</li>
                </ul>
                </div>
                <div class="float-right col-auto ml-auto">
                    <a href="#" class="btn btn-primary d-none d-sm-inline-block add-btn" data-toggle="modal" data-target="#add_training_type"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg> Add Training Type</a>
                   
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
                                <th>Type </th>
                                <th>Description </th>
                                <th>Status </th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($trainingType as $index => $val )
                            <tr>
                                <td>{{$index+1}}</td>
                                <td>{{$val->name}}</td>
                                <td>{{ \Illuminate\Support\Str::words($val->description, 10, '...') }}</td>
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
                                            <a class="dropdown-item edit_training_type" href="javascript::void()" data-id="{{$val->id}}" data-toggle="modal" data-target="#edit_training_type"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                            <a class="dropdown-item delete_training_type" href="javascript::void()" data-id="{{$val->id}}" data-toggle="modal" data-target="#delete_type"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
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

    <!-- Add Training Type Modal -->
   @include('admin.trainingType.add_popup')
    <!-- /Add Training Type Modal -->
    
    <!-- Edit Training Type Modal -->
    @include('admin.trainingType.edit_popup')
    <!-- /Edit Training Type Modal -->
    
    <!-- Delete Training Type Modal -->
 
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

    $(document).on('click', '.edit_training_type', function() {
        const trainingType_id = $(this).data('id');
        // alert(trainingType_id);
        $.get('/admin/training-type/edit/' + trainingType_id, function (data) {
                $('#trainingType_id').val(data.id);
                $('#type_name').val(data.name);
                $('#trainingType_description').val(data.description);
                
                let status = data.status;
            // alert(status);
                if(status == 0){
                    $('.training_type_status').append(`<option value="${status}" selected>Active</option>`);
                    $('.training_type_status').append(`<option value="1">Inactive</option>`);
                }else if(status == 1){
                    $('.training_type_status').append(`<option value="${status}" selected>Inactive</option>`);
                    $('.training_type_status').append(`<option value="0">Active</option>`);
                }
                
            });
    });

    $('#trainingTypeEditForm').on('submit', function (e) {
     e.preventDefault();
     
     const formData = new FormData(this);
     const trainingType_id = $('#trainingType_id').val();
     $(".update").text('Updating...');
    $.ajax({
    url: '/admin/training-type/${trainingType_id}/update', // Adjust the URL as needed
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
        window.location.href = '/admin/training-type'; // Redirect to home page
        $('#trainingTypeEditForm')[0].reset();
                    fetchEmployeeId();
    },
    error: function(xhr) {
        console.error(xhr.responseText);
        // Handle errors (display error messages, etc.)
    }
});
});
        $('#trainingTypeForm').on('submit', function(e) {
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
        
        $(".add_training_type").text('Saving...')
            $.ajax({
                url: '{{ route("admin.training-type.store")}}',
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
                    window.location.href = '/admin/training-type'; // Redirect to home page
                  
                    $('#trainingTypeForm')[0].reset();
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
    $(document).on('click', '.delete_training_type', function() {
    const trainingType_id = $(this).data('id');
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
                url: '/admin/training-type/delete/' + trainingType_id,
                method: 'DELETE',
                success: function(response) {
                    Swal.fire(
                        'Deleted!',
                        response.success,
                        'success'
                    ).then(() => {
                        // Redirect after a successful deletion
                        window.location.href = '/admin/training-type';
                    });
                    // window.location.href = '/admin/employees';
                    // Remove the employee row from the table
                    $('#employee-' + trainingType).remove();
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

         
      