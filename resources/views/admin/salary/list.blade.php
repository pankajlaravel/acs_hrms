@extends('admin.layouts.app')

@section('title', 'Dashboard - HRMS Admin')

@section('content')

<!-- Page Wrapper -->
<div class="page-wrapper">
			

    
        <!-- Page Header -->
       

        <div class="page-header d-print-none">
            <div class="container-xl">
              <div class="row g-2 align-items-center">
                <div class="col">
                  <h2 class="page-title">
                    Employee Salary
                  </h2>
                  <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Employee Salary</li>
                </ul>
                </div>
                <div class="float-right col-auto ml-auto">
                    <a href="#" class="btn btn-primary d-none d-sm-inline-block add-btn" data-toggle="modal" data-target="#add_salary"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg> Add Employee Salary</a>
                   
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
                                    
                                    <div class="py-1 d-flex align-items-center">
                                        <span class="avatar me-2" >
                                        <img src="{{asset('employee/img/'.$val->picture)}}" alt="">
                                        </span>
                                        <div class="flex-fill">
                                          <div class="font-weight-medium">{{$val->firstName.' '.$val->lastName}}</div>
                                          <div class="text-secondary"><a href="javascript::void()" class="text-reset">{{$val->work_role}}</a></div>
                                        </div>
                                      </div>
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
                                        <button class="align-text-top btn dropdown-toggle" data-bs-boundary="viewport" data-bs-toggle="dropdown">Actions</button>
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

         
      