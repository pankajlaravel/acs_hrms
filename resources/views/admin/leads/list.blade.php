@extends('admin.layouts.app')

@section('title', 'Dashboard - HRMS Admin')

@section('content')

            <!-- Page Content -->
            <div class="page-wrapper">
			
				<!-- Page Content -->
             			
					<!-- Page Header -->
                    <div class="page-header d-print-none">
                        <div class="container-xl">
                          <div class="row g-2 align-items-center">
                            <div class="col">
                              <h2 class="page-title">
                                Leads
                              </h2>
                              <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Leads</li>
                            </ul>
                            </div>
                            <div class="float-right col-auto ml-auto">
                                <a href="#" class="btn btn-primary d-none d-sm-inline-block add-btn" data-toggle="modal" data-target="#add_lead"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg> Add Leads</a>
                               
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
											<th>#</th>
											<th>Lead Name</th>
											<th>Email</th>
											<th>Phone</th>
											{{-- <th>Project</th> --}}
											{{-- <th>Assigned Staff</th> --}}
											{{-- <th>Status</th> --}}
											{{-- <th>Created</th> --}}
											<th class="text-right">Actions</th>
										</tr>
									</thead>
									<tbody>
                                        @foreach ($leads as $key => $val)
                                        <tr>
											<td>{{ $key+1 }}</td>
											<td>
												
													<a href="#" class="avatar"><img alt="" src="{{asset('leads/img/'.$val->picture)}}"></a>
													<a href="#">{{$val->firstName.' '.$val->lastName}}</a>
												
											</td>
											<td>{{$val->email}}</td>
											<td>{{$val->phone}}</td>
                                            
											{{-- <td>
												<ul class="team-members">
													<li>
														<a href="#" title="John Doe" data-toggle="tooltip"><img alt="" src="assets/img/profiles/avatar-02.jpg"></a>
													</li>
													
												</ul>
											</td> --}}
											{{-- <td><span class="badge bg-inverse-success">Working</span></td> --}}
											{{-- <td>10 hours ago</td> --}}
											<td class="text-right">
												<div class="dropdown dropdown-action">
													<button class="align-text-top btn dropdown-toggle" data-bs-boundary="viewport" data-bs-toggle="dropdown">Actions</button>
													<div class="dropdown-menu dropdown-menu-right">
														<a class="dropdown-item leadEditForm" href="javascript::void()" data-id="{{ $val->id }}" data-toggle="modal" data-target="#edit_lead"><i class="fa fa-pencil m-r-5"></i> Edit</a>
														<a class="dropdown-item deleteLeadBtn" href="javascript::void()" data-id="{{ $val->id }}"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
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
                </div>
            <!-- /Page Content -->
            @include('admin.leads.add_popup')
            @include('admin.leads.edit_popup')
    


@endsection
@section('script')
<script>
    $(document).ready(function() {
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).on('click', '.leadEditForm', function() {
        const leadId = $(this).data('id');
        // alert(leadId);
        $.get('/admin/lead/edit/' + leadId, function (data) {
                $('#leadId').val(data.id);
                $('#firstName').val(data.firstName);
                $('#lastName').val(data.lastName);
                $('#phone').val(data.phone);
                $('#email').val(data.email);
                $('#lead_image').val(data.picture);
                // $('#picture').html(`<img src"{{asset("/employee/img")}}/"`+ data.picture);
                $('#department').text(data.department);
                if (data.picture) {
            $('#previewImage').attr('src', '{{asset("/leads/img")}}/' + data.picture).show(); // Set the src and show the image
                } else {
                    $('#previewImage').hide(); // Hide if no image
                }
            });
    });

    $('#leadEditForm').on('submit', function (e) {
     e.preventDefault();
     
     const formData = new FormData(this);
     const leadId = $('#leadId').val();
     $(".updating").text('Updating...');
    $.ajax({
    url: '/admin/lead/${userId}/update', // Adjust the URL as needed
    type: 'POST',
    contentType: false,
    processData: false,
    data: formData,// Assuming you have a form with the ID leadForm

    success: function(response) {
        $('#edit_lead').modal('hide');
        // alert(response.success);
        Swal.fire({
        icon: 'success',
        title: 'Edit Record Successfully',
        })
        // Redirect after 3 seconds
        setTimeout(function() {
        }, 1000);
        window.location.href = '/admin/leads'; // Redirect to home page
        $('#leadForm')[0].reset();
                    fetchEmployeeId();
    },
    error: function(xhr) {
        console.error(xhr.responseText);
        // Handle errors (display error messages, etc.)
    }
});
});
        $('#leadForm').on('submit', function(e) {
            e.preventDefault();

        let isValid = true;
        $('.error').text(''); // Clear existing errors

        // Client-side validation example
        if ($('input[name="firstName"]').val() === '') {
            $('#firstnameError').text('First Name is required.');
            isValid = false;
        }

        if ($('input[name="lastName"]').val() === '') {
            $('#lastnameError').text('Last Name is required.');
            isValid = false;
        }

        if ($('input[name="username"]').val() === '') {
            $('#usernameError').text('Username is required.');
            isValid = false;
        }

        // if ($('input[name="email"]').val() === '') {
        //     $('#emailError').text('Email is required.');
        //     isValid = false;
        // }

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
        
        // if ($('input[name="password_confirmation"]').val() === '') {
        //     $('#confirmationError').text('Confirm Password is required.');
        //     isValid = false;
        // }

        // if ($('input[name="password"]').val() === '') {
        //     $('#passwordError').text('Password is required.');
        //     isValid = false;
        // }

        // Password validation
const password = $('input[name="password"]').val();
const confirmPassword = $('input[name="password_confirmation"]').val();
if (!password || !confirmPassword) {
isValid = false;
$('input[name="password"], input[name="password_confirmation"]').siblings('.error').text('Passwords is required ');
} else if (password !== confirmPassword) {
isValid = false;
$('input[name="password_confirmation"]').siblings('.error').text('Passwords do not match');
}


        // if ($('input[name="phone"]').val() === '') {
        //     // $('#phoneError').text('Phone is required.');
        //     $('input[name="phone"]').siblings('.error').text('Phone is required');
        //     isValid = false;
        // }
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
        if ($('input[name="joining_Date"]').val() === '') {
            $('#joining_DateError').text('Phone is required.');
            isValid = false;
        }

        if ($('select[name="position"]').val() === '') {
            $('#errorposition').text('Designation is required.');
            isValid = false;
        }

        if ($('select[name="department"]').val() === '') {
            $('#departmentError').text('Department is required.');
            isValid = false;
        }

        // if ($('input[name="picture"]').val() === '') {
        //     $('#pictureError').text('Picture is required.');
        //     isValid = false;
        // }

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

        // if (!isValid) {
        //     e.preventDefault(); // Prevent form submission
        //     return;
        // }
        
        var url = $(this).attr('data-action');
        $(".addData").text('Saving...')
            $.ajax({
                url: url,
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
                    }, 1000);
                    window.location.href = '/admin/leads'; // Redirect to home page
                  
                    $('#leadForm')[0].reset();
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
    $(document).on('click', '.deleteLeadBtn', function() {
    const leadId = $(this).data('id');
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
                url: '/admin/lead/delete/' + leadId,
                method: 'DELETE',
                success: function(response) {
                    Swal.fire(
                        'Deleted!',
                        response.success,
                        'success'
                    ).then(() => {
                        // Redirect after a successful deletion
                        window.location.href = '/admin/leads';
                    });
                    // window.location.href = '/admin/employees';
                    // Remove the employee row from the table
                    $('#employee-' + leadId).remove();
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

         
      