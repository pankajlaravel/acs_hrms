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
                    <h3 class="page-title">Employee </h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Employee </li>
                    </ul>
                </div>
                {{-- <div class="float-right col-auto ml-auto">
                    <a href="#" class="btn btn-primary d-none d-sm-inline-block add-btn" data-toggle="modal" data-target="#add_client"><i class="fa fa-plus"></i> Add New Client</a>
                </div> --}}
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
                            @foreach ($employees as $index => $val)
                            <tr>
                                <td>{{$index+1}}</td>
                                <td>
                                 
                                        <a href="javascript::void()" class="avatar"><img alt="" src="{{asset('clients/img/'.$val->picture)}}"></a>
                                        <a href="javascript::void()">{{$val->firstName.' '.$val->lastName}}</a>
                                
                                </td>
                                <td>{{$val->phone}}</td>
                                <td>{{$val->email}}</td>
                                <td>{{ $val->employee_id }}</td>
                                <td>
                                    {{$val->address}}
                                </td>
                                <td class="text-right">
                                    <div class="dropdown dropdown-action">
                                        <button class="align-text-top btn dropdown-toggle" data-bs-boundary="viewport" data-bs-toggle="dropdown">Actions</button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <form action="{{route('account.create',$val->id)}}" method="POST">
                                                @csrf
                                                <button class="btn btn-close-white" type="submit">Create Connected Account</button>
                                            </form>

                                            <form action="{{route('pay.emp.salary',$val->id)}}" method="POST">
                                                @csrf
                                                <button class="btn btn-close-white" type="submit">Pay</button>
                                            </form>

                                            {{-- <form id="payment-form" action="{{route('createPayout',$val->id)}}" method="POST">
                                                @csrf
                                                <button class="btn btn-close-white" type="submit">Pay with Razor </button>
                                            </form> --}}
                                            <a class="dropdown-item editClient" href="{{route('payroll',$val->id)}}" ><i class="fa fa-pencil m-r-5"></i>Razor Pay</a>
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
<!-- Employee Modal -->
 @include('admin.employee.add_popup');
 @include('admin.employee.edit_popup');
 @include('admin.employee.delete_popup');
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

    $(document).on('click', '.editEmployee', function() {
        const employeeId = $(this).data('id');
        $.get('/admin/employee/edit/' + employeeId, function (data) {
                $('#employeeId').val(data.id);
                $('#firstName').val(data.firstName);
                $('#lastName').val(data.lastName);
                $('#username').val(data.username);
                $('#emp_id').val(data.employee_id);
                $('#phone').val(data.phone);
                $('#email').val(data.email);
                $('#department_name').val(data.department);
                $('#designation').val(data.work_role);
                $('#joining_Date').val(data.joining_Date);
                $('#emp_image').val(data.picture);
                // $('#picture').html(`<img src"{{asset("/employee/img")}}/"`+ data.picture);
                $('.departmentName').val(data.departmentName);
                let department_name = data.departmentName; 
                let department_id = data.department; 

                let designation_name = data.work_role; 
                let designation_id = data.position; 
                // $('#department_select').append(`<option value="${imageUrl}">${imageUrl}</option>`); 
                $('#department_select').append(`<option value="${department_id}" selected>${department_name}</option>`); 
                $('#designation_select').append(`<option value="${designation_id}" selected>${designation_name}</option>`); 
                
                if (data.picture) {
                     $('#previewImage').attr('src', '{{asset("/employee/img")}}/' + data.picture).show(); // Set the src and show the image
                } else {
                    $('#previewImage').hide(); // Hide if no image
                }

                let resultsHtml = `<option value="">Select Department test</option>`;
        if (data.departmentName && data.departmentName.length > 0) {
            $.each(data.departmentName, function(index, department) {
                let selected = (department.id == data.department_id) ? 'selected' : '';
                resultsHtml += `<option value="${data.departmentName}" ${selected}>${data.departmentName}</option>`;
            });
        }
        // $('select[name="department"]').html(resultsHtml);
            });
    });

    $('#employeeEditForm').on('submit', function (e) {
     e.preventDefault();
     
     const formData = new FormData(this);
     const userId = $('#employeeId').val();
     $("#updating").text('Updating...');
    $.ajax({
    url: '/admin/employee/${userId}/update', // Adjust the URL as needed
    type: 'POST',
    contentType: false,
    processData: false,
    data: formData,// Assuming you have a form with the ID employeeForm

    success: function(response) {
        $('#edit_employee').modal('hide');
        // alert(response.success);
        Swal.fire({
        icon: 'success',
        title: 'Edit Record Successfully',
        })
        // Redirect after 3 seconds
        setTimeout(function() {
        }, 1000);
        window.location.href = '/admin/employees'; // Redirect to home page
        $('#employeeForm')[0].reset();
                    fetchEmployeeId();
    },
    error: function(xhr) {
        console.error(xhr.responseText);
        // Handle errors (display error messages, etc.)
    }
});
});
        $('#employeeForm').on('submit', function(e) {
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

        if ($('input[name="picture"]').val() === '') {
            $('#pictureError').text('Picture is required.');
            isValid = false;
        }

        // Add more client-side validation as needed

        if (!isValid) {
            e.preventDefault(); // Prevent form submission
            return;
        }
        var url = $(this).attr('data-action');
        $("#addData").text('Saving...')
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
                            window.location.href = '/admin/employees'; // Redirect to home page
                        }, 3000);
                  
                    $('#employeeForm')[0].reset();
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
    $(document).on('click', '.deleteUserBtn', function() {
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
                url: '/admin/employee/delete/' + employeeId,
                method: 'DELETE',
                success: function(response) {
                    Swal.fire(
                        'Deleted!',
                        response.success,
                        'success'
                    ).then(() => {
                        // Redirect after a successful deletion
                        window.location.href = '/admin/employees';
                    });
                    // window.location.href = '/admin/employees';
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

         
      