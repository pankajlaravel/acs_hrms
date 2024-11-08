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
                    <h3 class="page-title">Trainers</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Trainers</li>
                    </ul>
                </div>
                <div class="float-right col-auto ml-auto">
                    <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_trainer"><i class="fa fa-plus"></i> Add New</a>
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
                                <th>Name </th>
                                <th>Contact Number </th>
                                <th>Email </th>
                                <th>Description </th>
                                <th>Status </th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($trainers as $index => $val)
                            <tr>
                                <td>{{$index+1}}</td>
                                <td>
                                    <h2 class="table-avatar">
                                        <a href="javascript::void()" class="avatar"><img alt="" src="{{asset('trainers/img/'.$val->picture)}}"></a>
                                        <a href="javascript::void()">{{$val->fname.' '.$val->lname}}</a>
                                    </h2>
                                </td>
                                <td>{{$val->phone}}</td>
                                <td>{{$val->email}}</td>
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
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item edit_trainer" href="javascript::void()" data-id="{{$val->id}}" data-toggle="modal" data-target="#edit_trainer"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                            <a class="dropdown-item delete_trainer" href="javascript::void()" data-id="{{$val->id}}" data-toggle="modal" data-target="#delete_type"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
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
   @include('admin.trainer.add_popup')
    <!-- /Add Trainers List Modal -->
    
    <!-- Edit Trainers List Modal -->
    @include('admin.trainer.edit_popup')
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

    $(document).on('click', '.edit_trainer', function() {
        const trainer_id = $(this).data('id');
        // alert(trainer_id);
        $.get('/admin/trainer/edit/' + trainer_id, function (data) {
                $('#trainerId').val(data.id);
                $('#fname').val(data.fname);
                $('#lname').val(data.lname);
                $('#trainer_image').val(data.picture);
                $('#role').val(data.role);
                $('#email').val(data.email);
                $('#phone').val(data.phone);
                $('#description').val(data.description);
                

                if (data.picture) {
                     $('#previewImage').attr('src', '{{asset("/trainers/img")}}/' + data.picture).show(); // Set the src and show the image
                } else {
                    $('#previewImage').hide(); // Hide if no image
                }
                let status = data.status;
            // alert(status);
                if(status == 0){
                    $('.trainer_status').append(`<option value="${status}" selected>Active</option>`);
                    $('.trainer_status').append(`<option value="1">Inactive</option>`);
                }else if(status == 1){
                    $('.trainer_status').append(`<option value="${status}" selected>Inactive</option>`);
                    $('.trainer_status').append(`<option value="0">Active</option>`);
                }
                
            });
    });

    $('#trainerEditForm').on('submit', function (e) {
     e.preventDefault();
     
     const formData = new FormData(this);
     const trainerId = $('#trainerId').val();
    //  alert(trainerId);
     $(".update").text('Updating...');
    $.ajax({
    url: '/admin/trainer/${trainerId}/update', // Adjust the URL as needed
    type: 'POST',
    contentType: false,
    processData: false,
    data: formData,// Assuming you have a form with the ID employeeForm

    success: function(response) {
        $('#edit_trainer').modal('hide');
        // alert(response.success);
        Swal.fire({
        icon: 'success',
        title: 'Edit Record Successfully',
        })
        // Redirect after 3 seconds
        setTimeout(function() {
        }, 2000);
        window.location.href = '/admin/trainer'; // Redirect to home page
        $('#trainerEditForm')[0].reset();
                    fetchEmployeeId();
    },
    error: function(xhr) {
        console.error(xhr.responseText);
        // Handle errors (display error messages, etc.)
    }
});
});
        $('#trainerForm').on('submit', function(e) {
            e.preventDefault();

        let isValid = true;
        $('.error').text(''); // Clear existing errors

        // Client-side validation example
        if ($('input[name="fname"]').val() === '') {
            $('#fnameError').text('First Name is required.');
            isValid = false;
        }

        if ($('input[name="lname"]').val() === '') {
            $('#lnameError').text('Last Name is required.');
            isValid = false;
        }

        if ($('input[name="role"]').val() === '') {
            $('#roleError').text('Role is required.');
            isValid = false;
        }

        if (!$('input[name="email"]').val()) {
            isValid = false;
            $('input[name="email"]').siblings('.error').text('Email is required');
        } else {
            const email = $('input[name="email"]').val();
            // Updated pattern to allow only .com, .org, or .in
            const emailPattern = /^[^ ]+@[^ ]+\.(com|org|in|be)$/;
            if (!email.match(emailPattern)) {
                isValid = false;
                $('input[name="email"]').siblings('.error').text('Invalid email format. Only .com, .org, or .in are allowed');
            }
        }

                const phone = $('input[name="phone"]').val().trim();
                // Phone number validation
                if (!phone) {
                isValid = false;
                $('input[name="phone"]').siblings('.error').text('Phone is required');
                } else {
                // Regular expression to validate phone number format
                const phonePattern = /^(\+?\d{1,3})?[-. ]?(\(?\d{3}\)?[-. ]?)?\d{3}[-. ]?\d{4}$/;
                if (!phonePattern.test(phone)) {
                isValid = false;
                $('input[name="phone"]').siblings('.error').text('Invalid phone number');
                }
                }

        if ($('textarea[name="description"]').val() === '') {
            $('#descriptionError').text('Description is required.');
            isValid = false;
        }

        
        if (!$('input[name="picture"]').val()) {
    isValid = false;
    $('input[name="picture"]').siblings('.error').text('Picture is required');
} else {
    const pictureInput = $('input[name="picture"]')[0]; // Access the input element
    const pictureFile = pictureInput.files[0]; // Get the file object

    // Check if the file is an image
    const validImageTypes = ['image/jpeg', 'image/png', 'image/jpg'];
    if (!pictureFile || !validImageTypes.includes(pictureFile.type)) {
        isValid = false;
        $('input[name="picture"]').siblings('.error').text('Invalid picture format. Only .jpg, .jpeg, or .png are allowed');
    } else if (pictureFile.size > 5 * 1024 * 1024) { // Check if the size exceeds 5MB
        isValid = false;
        $('input[name="picture"]').siblings('.error').text('File size must be less than 5MB');
    }
}
       
        // Add more client-side validation as needed

        if (!isValid) {
            e.preventDefault(); // Prevent form submission
            return;
        }
        
        $(".add_trainer").text('Saving...')
            $.ajax({
                url: '{{ route("admin.trainer.store")}}',
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
                    window.location.href = '/admin/trainer'; // Redirect to home page
                  
                    $('#trainerForm')[0].reset();
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
    $(document).on('click', '.delete_trainer', function() {
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
                url: '/admin/trainer/delete/' + id,
                method: 'DELETE',
                success: function(response) {
                    Swal.fire(
                        'Deleted!',
                        response.success,
                        'success'
                    ).then(() => {
                        // Redirect after a successful deletion
                        window.location.href = '/admin/trainer';
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

         
      