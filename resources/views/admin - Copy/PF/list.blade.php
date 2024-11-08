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
                    <h3 class="page-title">Provident Fund</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Provident Fund</li>
                    </ul>
                </div>
                <div class="float-right col-auto ml-auto">
                    <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_pf"><i class="fa fa-plus"></i> Add Provident Fund</a>
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
                                <th>Employee Name</th>
                                <th>Provident Fund Type</th>
                                <th>Employee Share</th>
                                <th>Organization Share</th>
                                <th>Status</th>
                                <th class="text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($getPF as $val)
                            <tr>
                                <td>
                                    <h2 class="table-avatar">
                                        <a href="javascript::void()" class="avatar"><img alt="" src="{{asset('employee/img/'.$val->picture)}}"></a>
                                        <a href="javascript::void()">{{$val->fname.' '.$val->lname}} <span>{{$val->work_role}}</span></a>
                                    </h2>
                                </td>
                                @if ($val->pf_type == 0)
                                <td>Fixed Amount</td>
                                @elseif($val->pf_type == 1)
                                <td>Percentage of Basic Salary</td>
                                @endif
                                
                                <td>{{$val->emp_share_persant}} %</td>
                                <td>{{$val->org_share_persant}} %</td>
                                <td>
                                    @if ($val->status == 0)
                                    <div class="dropdown action-label">
                                        <a class="btn btn-white btn-sm btn-rounded " href="javascript::void()" data-toggle="dropdown" aria-expanded="false">
                                            <i class="fa fa-dot-circle-o text-danger"></i> Pending
                                        </a>
                                    </div>
                                    @else
                                    <div class="dropdown action-label">
                                        <a class="btn btn-white btn-sm btn-rounded " href="javascript::void()" data-toggle="dropdown" aria-expanded="false">
                                            <i class="fa fa-dot-circle-o text-success"></i> Pending
                                        </a>
                                    </div>
                                    @endif
                                </td>
                                <td class="text-right">
                                    <div class="dropdown dropdown-action">
                                        <a href="javascript::void()" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item pfEdit" href="javascript::void()" data-id="{{$val->id}}" data-toggle="modal" data-target="#edit_pf"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                            <a class="dropdown-item pdDelete" href="javascript::void()" data-id="{{$val->id}}" data-toggle="modal" data-target="#delete_pf"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
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
    
    <!-- Add PF Modal -->
    @include('admin.PF.add_popup');
    <!-- /Add PF Modal -->
    
    <!-- Edit PF Modal -->
   @include('admin.PF.edit_popup')
    <!-- /Edit PF Modal -->
    
    <!-- Delete PF Modal -->
    
    <!-- /Delete PF Modal -->
    
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

    $(document).on('click', '.pfEdit', function() {
        const pf_id = $(this).data('id');
        // alert(pf_id);
        $.get('/admin/provident-fund/edit/' + pf_id, function (data) {
                $('#pf_id').val(data.id);
                $('#emp_id').val(data.emp_id);
                $('#pf_type').val(data.pf_type);
                $('#emp_share_amt').val(data.emp_share_amt);
                $('#org_share_amt').val(data.org_share_amt);
                $('#emp_share_persant').val(data.emp_share_persant);
                $('#org_share_persant').val(data.org_share_persant);
                $('#description').val(data.description);
                $('#status').val(data.status);

                let emp_id = data.emp_id; 
                let emp_name = data.fname+' '+data.lname; 
                $('.emp_name').append(`<option value="${emp_id}" selected>${emp_name}</option>`);

                let pf_type = data.pf_type;
                if(pf_type == 0){
                    $('.pf_type').append(`<option value="${pf_type}" selected>Fixed Amount</option>`);
                    $('.pf_type').append(`<option value="1">Percentage of Basic Salary</option>`);
                }else if(pf_type == 1){
                    $('.pf_type').append(`<option value="${pf_type}" selected>Percentage of Basic Salary</option>`);
                    $('.pf_type').append(`<option value="0">Fixed Amount</option>`);
                }

                let status = data.status;
                if(status == 0){
                    $('.status').append(`<option value="${status}" selected>Pending</option>`);
                    $('.status').append(`<option value="1">Approved</option>`);
                }else if(pf_type == 1){
                    $('.status').append(`<option value="${status}" selected>Approved</option>`);
                    $('.pf_tstatusype').append(`<option value="0">Pending</option>`);
                }
            
                
            });
    });

    $('#pfEditForm').on('submit', function (e) {
     e.preventDefault();
     
     const formData = new FormData(this);
     const pf_id = $('#pf_id').val();
     $(".updating").text('Updating...');
    $.ajax({
    url: '/admin/provident-fund/${pf_id}/update', // Adjust the URL as needed
    type: 'POST',
    contentType: false,
    processData: false,
    data: formData,// Assuming you have a form with the ID employeeForm

    success: function(response) {
        $('#edit_pf').modal('hide');
        // alert(response.success);
        Swal.fire({
        icon: 'success',
        title: 'Edit Record Successfully',
        })
        // Redirect after 3 seconds
        setTimeout(function() {
        }, 2000);
        window.location.href = '/admin/provident-fund'; // Redirect to home page
        $('#pfEditForm')[0].reset();
                    fetchEmployeeId();
    },
    error: function(xhr) {
        console.error(xhr.responseText);
        // Handle errors (display error messages, etc.)
    }
});
});
        $('#add_PF_Form').on('submit', function(e) {
            e.preventDefault();

        let isValid = true;
        $('.error').text(''); // Clear existing errors

        // Client-side validation example
        if ($('select[name="emp_id"]').val() === '') {
            $('#emp_idError').text('Employee Name is required.');
            isValid = false;
        }

        if ($('select[name="pf_type"]').val() === '') {
            $('#pf_typeError').text('PF Type is required.');
            isValid = false;
        }

        if ($('input[name="emp_share_amt"]').val() === '') {
            $('#emp_share_amtError').text('Employee Share (Amount) is required.');
            isValid = false;
        }

        if ($('input[name="org_share_amt"]').val() === '') {
            $('#org_share_amtError').text('Organization Share (Amount) is required.');
            isValid = false;
        }


        if ($('input[name="emp_share_persant"]').val() === '') {
            $('#emp_share_persantError').text('Employee Share (%) is required.');
            isValid = false;
        }

        if ($('input[name="org_share_persant"]').val() === '') {
            $('#org_share_persantError').text('Organization Share (%) is required.');
            isValid = false;
        }

        if ($('textarea[name="description"]').val() === '') {
            $('.descriptionError').text('Description is required.');
            isValid = false;
        }

       
        // Add more client-side validation as needed

        if (!isValid) {
            e.preventDefault(); // Prevent form submission
            return;
        }
        
        $(".add_pf").text('Saving...')
            $.ajax({
                url: '{{ route("admin.provident-fund.store")}}',
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
                    window.location.href = '/admin/provident-fund'; // Redirect to home page
                  
                    $('#add_PF_Form')[0].reset();
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
    $(document).on('click', '.pdDelete', function() {
    const pfId = $(this).data('id');
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
                url: '/admin/provident-fund/delete/' + pfId,
                method: 'DELETE',
                success: function(response) {
                    Swal.fire(
                        'Deleted!',
                        response.success,
                        'success'
                    ).then(() => {
                        // Redirect after a successful deletion
                        window.location.href = '/admin/provident-fund';
                    });
                    // window.location.href = '/admin/employees';
                    // Remove the employee row from the table
                    $('#employee-' + pfId).remove();
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

         
      