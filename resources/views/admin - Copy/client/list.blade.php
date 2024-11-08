@extends('admin.layouts.app')

@section('title', 'Dashboard - HRMS Admin')

@section('content')

            <!-- Page Content -->
            <div class="page-wrapper">
			
				<!-- Page Content -->
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row align-items-center">
							<div class="col">
								<h3 class="page-title">Clients</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
									<li class="breadcrumb-item active">Clients</li>
								</ul>
							</div>
							
							<div class="float-right col-auto ml-auto">
								<a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_client"><i class="fa fa-plus"></i> Add Client</a>
								<div class="view-icons">
									<a href="clients.php" class="grid-view btn btn-link active"><i class="fa fa-th"></i></a>
									<a href="javascript::void()" class="list-view btn btn-link"><i class="fa fa-bars"></i></a>
								</div>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<!-- Search Filter -->
                    <form id="search_client" method="post" >
                        @csrf
					<div class="row filter-row">
						<div class="col-sm-6 col-md-3">  
							<div class="form-group form-focus">
								<input type="text" class="form-control floating" name="client_id" required>
								<label class="focus-label">Client ID</label>
							</div>
						</div>
						<div class="col-sm-6 col-md-3">  
							<div class="form-group form-focus">
								{{-- <input type="text" class="form-control floating">
								<label class="focus-label">Client Name</label> --}}
							</div>
						</div>
						<div class="col-sm-6 col-md-3"> 
							<div class="form-group form-focus select-focus">
								{{-- <select class="form-select floating"> 
									<option>Select Company</option>
									<option>Global Technologies</option>
									<option>Delta Infotech</option>
								</select>
								<label class="focus-label">Company</label> --}}
							</div>
						</div>
						<div class="col-sm-6 col-md-3"> 
                            <button type="submit" class="btn btn-success btn-block">Search</button> 
							{{-- <a href="#" class="btn btn-success btn-block"> Search </a>   --}}
						</div>     
                    </div>
                    </form>
					<!-- Search Filter -->
					<div class="original">
					<div class="row staff-grid-row">
					@foreach ($clients as $val)
                    <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
                        <div class="profile-widget">
                            <div class="profile-img">
                                <a href="javascript::voide()" class="avatar"><img alt="picture" src="{{asset('clients/img/'.$val->picture)}}"></a>
                            </div>
                            <div class="dropdown profile-action">
                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item editClient" href="#" data-toggle="modal" data-id="{{$val->id}}" data-target="#edit_client"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                <a class="dropdown-item deleteClientBtn" href="#" data-toggle="modal" data-id="{{$val->id}}" data-target="#delete_client"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                            </div>
                            </div>
                            <h4 class="mb-0 user-name m-t-10 text-ellipsis"><a href="javascript::voide()">{{$val->company_name}}</a></h4>
                            <h5 class="mb-0 user-name m-t-10 text-ellipsis"><a href="javascript::voide()">{{$val->firstName.' '.$val->lastName}}</a></h5>
                            <div class="small text-muted">{{$val->client_id}}</div>
                            <a href="{{route('admin.client.view',$val->id)}}" class="btn btn-white btn-sm m-t-10">View Profile</a>
                        </div>
                    </div>
                    @endforeach
                </div>
             </div>
                    <div id="search_results_client" ></div>
                </div>
				<!-- /Page Content -->
			
				<!-- Add Client Modal -->
				@include('admin.client.add_popup');
				<!-- /Add Client Modal -->
				
				<!-- Edit Client Modal -->
				@include('admin.client.edit_popup');
				<!-- /Edit Client Modal -->
				
				<!-- Delete Client Modal -->
				
				<!-- /Delete Client Modal -->
				
            </div>
            <!-- /Page Content -->
       

@endsection
@section('script')
<script>
    $(document).ready(function() {
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).on('click', '.editClient', function() {
        const clientId = $(this).data('id');
      
        $.get('/admin/client/edit/' + clientId, function (data) {
                $('#clientId').val(data.id);
                $('#firstName').val(data.firstName);
                $('#lastName').val(data.lastName);
                $('#phone').val(data.phone);
                $('#clt_id').val(data.client_id);
                $('#company_name').val(data.company_name);
                $('#address').val(data.address);
                $('#email').val(data.email);
                $('#emp_image').val(data.picture);
                // $('#picture').html(`<img src"{{asset("/employee/img")}}/"`+ data.picture);
                if (data.picture) {
            $('#previewImage').attr('src', '{{asset("/clients/img")}}/' + data.picture).show(); // Set the src and show the image
                } else {
                    $('#previewImage').hide(); // Hide if no image
                }
            });
    });

    $('#clientEditForm').on('submit', function (e) {
     e.preventDefault();

     
     
     const formData = new FormData(this);
     const client_id = $('#clientId').val();
     $(".updating").text('Updating...');
    $.ajax({
    url: '/admin/client/${client_id}/update', // Adjust the URL as needed
    type: 'POST',
    contentType: false,
    processData: false,
    data: formData,// Assuming you have a form with the ID employeeForm

    success: function(response) {
        $('#edit_client').modal('hide');
        // alert(response.success);
        Swal.fire({
        icon: 'success',
        title: 'Edit Record Successfully',
        })
        // Redirect after 3 seconds
        setTimeout(function() {
            window.location.href = '/admin/clients'; // Redirect to home page
        }, 1000);
        $('#clientForm')[0].reset();
                    fetchEmployeeId();
    },
    error: function(xhr) {
        console.error(xhr.responseText);
        // Handle errors (display error messages, etc.)
    }
});
});
        $('#clientForm').on('submit', function(e) {
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

       

        if ($('input[name="email"]').val() === '') {
            $('#emailError').text('Email is required.');
            isValid = false;
        }
        
 


        if ($('input[name="phone"]').val() === '') {
            $('#phoneError').text('Phone is required.');
            isValid = false;
        }

        if ($('input[name="company_name"]').val() === '') {
            $('#company_nameError').text('Company Name is required.');
            isValid = false;
        }

        if ($('input[name="address"]').val() === '') {
            $('#addressError').text('Address is required.');
            isValid = false;
        }

        if ($('input[name="picture"]').val() === '') {
            $('#pictureError').text('Picture is required.');
            isValid = false;
        }

        

        if (!isValid) {
            e.preventDefault(); // Prevent form submission
            return;
        }
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
                            window.location.href = '/admin/clients'; // Redirect to home page
                        }, 3000);
                  
                    $('#clientForm')[0].reset();
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
    $(document).on('click', '.deleteClientBtn', function() {
    const clientId = $(this).data('id');
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
                url: '/admin/client/delete/' + clientId,
                method: 'DELETE',
                success: function(response) {
                    Swal.fire(
                        'Deleted!',
                        response.success,
                        'success'
                    ).then(() => {
                        // Redirect after a successful deletion
                        window.location.href = '/admin/clients';
                    });
                    // window.location.href = '/admin/employees';
                    // Remove the employee row from the table
                    $('#employee-' + clientId).remove();
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

         
      