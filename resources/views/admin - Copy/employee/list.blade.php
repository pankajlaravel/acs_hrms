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
								<h3 class="page-title">Employee</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
									<li class="breadcrumb-item active">Employee</li>
								</ul>
							</div>
							<div class="float-right col-auto ml-auto">
								<a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_employee"><i class="fa fa-plus"></i> Add Employee</a>
								<div class="view-icons">
									<a href="javascript::void()" title="Grid View" class="grid-view btn btn-link active"><i class="fa fa-th"></i></a>
									<a href="javascript::void" title="Tabular View" class="list-view btn btn-link"><i class="fa fa-bars"></i></a>
								</div>
							</div>
						</div>
					</div>
               <!-- /Page Header -->
                <!-- Search Filter -->
<form id="search-form" method="post" >
    @csrf
   <div class="row filter-row">
      <div class="col-sm-6 col-md-3">
         <div class="form-group form-focus">
            <input type="text" name="employee_id" class="form-control floating" required>
            <label class="focus-label">Employee ID</label>
         </div>
      </div>
      <div class="col-sm-6 col-md-3">
         <div class="form-group form-focus">
            <input type="text" class="form-control floating" >
            <label class="focus-label">Employee Name</label>
         </div>
      </div>
      <div class="col-sm-6 col-md-3">
         <div class="form-group form-focus select-focus">
            <select required class="form-select floating" name="position">
               <option>Select Designation</option>
               @foreach ($designation as $val)
                <option value="{{$val['id']}}">{{$val['name']}}</option>
               @endforeach
            </select>
            <label class="focus-label">Designation</label>
         </div>
      </div>
      <div class="col-sm-6 col-md-3">
         <button type="submit" class="btn btn-success btn-block">Search</button>
         <!-- <a href="#" class="btn btn-success btn-block"> Search </a>   -->
      </div>
   </div>
</form>
<!-- Search Filter -->
<div id="original">
<div class="row staff-grid-row" >
   <span class="error"></span>	
   @foreach ($employees as $value)
   <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
    <div class="profile-widget">
       <div class="profile-img">
          <a href="{{route('admin.employee.view',$value->id)}}" class="avatar">
            <img src="{{asset('employee/img/'.$value->picture)}}" alt="picture">
        </a>
       </div>
       <div class="dropdown profile-action">
          <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-pencil"></i></a>
          <div class="dropdown-menu dropdown-menu-right">
             <a class="dropdown-item editEmployee" href="#" data-toggle="modal" data-id="{{ $value->id}}" data-target="#edit_employee"><i class="fa fa-pencil m-r-5"></i> Edit</a>
             <a class="dropdown-item deleteUserBtn" href="javascript::void" data-id="{{ $value->id }}"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
             
          </div>
       </div>
       <h4 class="mb-0 user-name m-t-10 text-ellipsis"><a href="#">{{$value->firstName.' '.$value->lastName}}</a></h4>
       <div class="small text-muted">{{ $value->designations_name }}</div>
       <div class="small text-muted">{{ $value->employee_id }}</div>
    </div>
 </div>
   @endforeach 
   
    {{-- <p>This content will be hidden when search results are displayed.</p> --}}
</div>
</div>
{{$employees->links()}}
<div id="search-results" ></div>
</div>


            </div>
            <!-- /Page Content -->
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

         
      