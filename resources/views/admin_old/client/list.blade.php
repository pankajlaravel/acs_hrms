@extends('admin.layouts.app')

@section('title', 'Dashboard - HRMS Admin')

@section('content')

       
{{-- new --}}

<!-- Page Wrapper -->
<div class="page-wrapper">
			
    <!-- Page Content -->
    <div class="content container-fluid">
    
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Clients </h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Clients </li>
                    </ul>
                </div>
                <div class="float-right col-auto ml-auto">
                    <a href="#" class="btn btn-primary d-none d-sm-inline-block add-btn" data-toggle="modal" data-target="#add_client"><i class="fa fa-plus"></i> Add New Client</a>
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
                                <th>Name </th>
                                <th>Contact Number </th>
                                <th>Email </th>
                                <th>Company Name </th>
                                <th>Address </th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clients as $index => $val)
                            <tr>
                                <td>{{$index+1}}</td>
                                <td>
                                 
                                        <a href="javascript::void()" class="avatar"><img alt="" src="{{asset('clients/img/'.$val->picture)}}"></a>
                                        <a href="javascript::void()">{{$val->firstName.' '.$val->lastName}}</a>
                                
                                </td>
                                <td>{{$val->phone}}</td>
                                <td>{{$val->email}}</td>
                                <td>{{ $val->company_name }}</td>
                                <td>
                                    {{$val->address}}
                                </td>
                                <td class="text-right">
                                    <div class="dropdown dropdown-action">
                                        <button class="align-text-top btn dropdown-toggle" data-bs-boundary="viewport" data-bs-toggle="dropdown">Actions</button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item editClient" href="#" data-toggle="modal" data-id="{{$val->id}}" data-target="#edit_client"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                            <a class="dropdown-item deleteClientBtn" href="#" data-toggle="modal" data-id="{{$val->id}}" data-target="#delete_client"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
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
</div>
     
      @include('admin.client.add_popup')
				<!-- /Add Client Modal -->
				
				<!-- Edit Client Modal -->
				@include('admin.client.edit_popup')
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

         
      