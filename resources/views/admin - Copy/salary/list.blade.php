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
                    <h3 class="page-title">Employee Salary</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Salary</li>
                    </ul>
                </div>
                <div class="float-right col-auto ml-auto">
                    <a href="javascript::void()" class="btn add-btn" data-toggle="modal" data-target="#add_salary"><i class="fa fa-plus"></i> Add Salary</a>
                </div>
            </div>
        </div>
        <!-- /Page Header -->
        
        <!-- Search Filter -->
        {{-- <div class="row filter-row">
           <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">  
                <div class="form-group form-focus">
                    <input type="text" class="form-control floating">
                    <label class="focus-label">Employee Name</label>
                </div>
           </div>
           <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">  
                <div class="form-group form-focus select-focus">
                    <select class="form-select floating"> 
                        <option value=""> -- Select -- </option>
                        <option value="">Employee</option>
                        <option value="1">Manager</option>
                    </select>
                    <label class="focus-label">Role</label>
                </div>
           </div>
           <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12"> 
                <div class="form-group form-focus select-focus">
                    <select class="form-select floating"> 
                        <option> -- Select -- </option>
                        <option> Pending </option>
                        <option> Approved </option>
                        <option> Rejected </option>
                    </select>
                    <label class="focus-label">Leave Status</label>
                </div>
           </div>
           <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">  
                <div class="form-group form-focus">
                    <div class="cal-icon">
                        <input class="form-control floating datetimepicker" type="text">
                    </div>
                    <label class="focus-label">From</label>
                </div>
            </div>
           <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">  
                <div class="form-group form-focus">
                    <div class="cal-icon">
                        <input class="form-control floating datetimepicker" type="text">
                    </div>
                    <label class="focus-label">To</label>
                </div>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">  
                <a href="#" class="btn btn-success btn-block"> Search </a>  
            </div>     
        </div> --}}
        <!-- /Search Filter -->
        
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped custom-table datatable">
                        <thead>
                            <tr>
                                <th>Employee</th>
                                <th>Employee ID</th>
                                <th>Email</th>
                                <th>Join Date</th>
                                <th>Role</th>
                                <th>Salary</th>
                                <th>Payslip</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($staff as $val)
                            <tr>
                                <td>
                                    <h2 class="table-avatar">
                                        <a href="javascript::void()" class="avatar"><img alt="" src="{{asset('employee/img/'.$val->picture)}}"></a>
                                        <a href="javascript::void()">{{$val->firstName.' '.$val->lastName}}<span>{{$val->work_role}}</span></a>
                                    </h2>
                                </td>
                                <td>{{$val->employee_id}}</td>
                                <td>{{$val->email}}</td>
                                <td>{{$val->joining_Date}}</td>
                                <td>
                                    <div class="dropdown">
                                        <a href="javascript::void()" class="btn btn-white btn-sm btn-rounded dropdown-toggle" data-toggle="dropdown" aria-expanded="false">{{$val->work_role}} </a>
                                
                                    </div>
                                </td>
                                <td>Rs.{{$val->basic_salary}}</td>
                                <td><a class="btn btn-sm btn-primary" href="{{route('admin.employee.salary.slip',$val->primary_key)}}">Generate Slip</a></td>
                                <td class="text-right">
                                    <div class="dropdown dropdown-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item editSalary" href="javascript::void()" data-toggle="modal" data-id="{{$val->primary_key}}" data-target="#edit_salary"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                            <a class="dropdown-item deleteSalaryBtn" href="javascript::void()" data-toggle="modal" data-id="{{$val->primary_key}}" data-target="#delete_salary"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
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
    
    <!-- Add Holiday Modal -->
    @include('admin.salary.add_popup');
    <!-- /Add Holiday Modal -->
    
    <!-- Edit Holiday Modal -->
    @include('admin.salary.edit_popup');
    <!-- /Edit Holiday Modal -->

    <!-- Delete Holiday Modal -->
  
    <!-- /Delete Holiday Modal -->
    
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

    $(document).on('click', '.editSalary', function() {
        const salary_id = $(this).data('id');
        // alert(salary_id);
        $.get('/admin/employee/salary/edit/' + salary_id, function (data) {
                $('.salaryID').val(data.id);
                $('.emp_id').val(data.emp_id);
                $('.net_salary').val(data.net_salary);
                $('.basic_salary').val(data.basic_salary);
                $('.tds').val(data.tds);
                $('.da').val(data.da);
                $('.esi').val(data.esi);
                $('.hra').val(data.hra);
                $('.pf').val(data.pf);
                $('.allowance').val(data.allowance);
                $('.prof_tax').val(data.prof_tax);
                $('.medical_allowance').val(data.medical_allowance);
                $('.conveyance').val(data.conveyance);
                $('.leave').val(data.leave);
                $('.labour_welfare').val(data.labour_welfare);
                $('.other').val(data.other);
            
                let emp_id = data.emp_id; 
                let emp_name = data.emp_first_name+' '+data.emp_last_name; 
                // alert(emp_name);
                $('.emp_name').append(`<option value="${emp_id}" selected>${emp_name}</option>`);
            });
    });

    $('#salaryEditForm').on('submit', function (e) {
     e.preventDefault();
     
     const formData = new FormData(this);
     const salaryID = $('#salaryID').val();
     $(".update_btn").text('Updating...');
    $.ajax({
    url: '/admin/employee/salary/${salaryID}/update', // Adjust the URL as needed
    type: 'POST',
    contentType: false,
    processData: false,
    data: formData,// Assuming you have a form with the ID employeeForm

    success: function(response) {
        $('#edit_salary').modal('hide');
        // alert(response.success);
        Swal.fire({
        icon: 'success',
        title: 'Edit Record Successfully',
        })
        // Redirect after 3 seconds
        setTimeout(function() {
        }, 1000);
        window.location.href = '/admin/employee/salary'; // Redirect to home page
        $('#salaryEditForm')[0].reset();
                    fetchEmployeeId();
    },
    error: function(xhr) {
        console.error(xhr.responseText);
        // Handle errors (display error messages, etc.)
    }
});
});
        $('#salaryForm').on('submit', function(e) {
            e.preventDefault();
            $(".save_btn").text('Saving...');
        let isValid = true;
        $('.error').text(''); // Clear existing errors

        // Client-side validation example
        if ($('select[name="emp_id"]').val() === '') {
            $('#emp_idError').text('Staf is required.');
            isValid = false;
        }

        if ($('input[name="net_salary"]').val() === '') {
            $('#net_salaryError').text('Net salary is required.');
            isValid = false;
        }

        if ($('input[name="basic_salary"]').val() === '') {
            $('#basic_salaryError').text('Basic salary is required.');
            isValid = false;
        }

        if ($('input[name="tds"]').val() === '') {
            $('#tdsError').text('TDS is required.');
            isValid = false;
        }

        if ($('input[name="hra"]').val() === '') {
            $('#hraError').text('HRA is required.');
            isValid = false;
        }

        if ($('input[name="da"]').val() === '') {
            $('#daError').text('DA is required.');
            isValid = false;
        }

        if ($('input[name="esi"]').val() === '') {
            $('#esiError').text('ESI is required.');
            isValid = false;
        }

        if ($('input[name="pf"]').val() === '') {
            $('#pfError').text('PF is required.');
            isValid = false;
        }


        if ($('input[name="allowance"]').val() === '') {
            $('#allowanceError').text('Allowance is required.');
            isValid = false;
        }


        if ($('input[name="prof_tax"]').val() === '') {
            $('#prof_taxError').text('Prof. Tax is required.');
            isValid = false;
        }


        if ($('input[name="medical_allowance"]').val() === '') {
            $('#medical_allowanceError').text('Medical Allowance is required.');
            isValid = false;
        }


        if ($('input[name="esi"]').val() === '') {
            $('#esiError').text('ESI is required.');
            isValid = false;
        }

       
        // Add more client-side validation as needed

        // if (!isValid) {
        //     e.preventDefault(); // Prevent form submission
        //     return;
        // }
        
        
            $.ajax({
                url: '{{ route("admin.employee.salary.store")}}',
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
                    window.location.href = '/admin/employee/salary'; // Redirect to home page
                  
                    $('#salaryForm')[0].reset();
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
    $(document).on('click', '.deleteSalaryBtn', function() {
    const salaryId = $(this).data('id');
    // alert(salaryId);
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
                url: '/admin/employee/salary/delete/' + salaryId,
                method: 'DELETE',
                success: function(response) {
                    Swal.fire(
                        'Deleted!',
                        response.success,
                        'success'
                    ).then(() => {
                        // Redirect after a successful deletion
                        window.location.href = '/admin/employee/salary';
                    });
                    // window.location.href = '/admin/employees';
                    // Remove the employee row from the table
                    $('#employee-' + salaryId).remove();
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

         
      