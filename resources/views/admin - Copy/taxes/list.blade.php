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
                    <h3 class="page-title">Taxes</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Taxes</li>
                    </ul>
                </div>
                <div class="float-right col-auto ml-auto">
                    <a href="javascript::void()" class="btn add-btn" data-toggle="modal" data-target="#add_tax"><i class="fa fa-plus"></i> Add Tax</a>
                </div>
            </div>
        </div>
        <!-- /Page Header -->
        
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table mb-0 table-striped custom-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tax Name </th>
                                <th>Tax Percentage (%) </th>
                                <th>Status</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($taxes as $key => $val)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$val->name}}</td>
                                <td>{{$val->percentage}}%</td>
                                <td>
                                    <div class="dropdown action-label">
                                        @if ($val->status == 0)
                                        <a class="btn btn-white btn-sm btn-rounded " href="javascript::void()" data-toggle="dropdown" aria-expanded="false">
                                            <i class="fa fa-dot-circle-o text-success"></i> Active
                                        </a>
                                        @else  
                                        <a class="btn btn-white btn-sm btn-rounded " href="javascript::void()" data-toggle="dropdown" aria-expanded="false">
                                            <i class="fa fa-dot-circle-o text-danger"></i> Inactive
                                        </a>
                                        @endif
                                        {{-- <div class="dropdown-menu">
                                            <a class="dropdown-item" href="javascript::void()"><i class="fa fa-dot-circle-o text-success"></i> Active</a>
                                            <a class="dropdown-item" href="javascript::void()"><i class="fa fa-dot-circle-o text-danger"></i> Inactive</a>
                                        </div> --}}
                                    </div>
                                </td>
                                <td class="text-right">
                                    <div class="dropdown dropdown-action">
                                        <a href="javascript::void()" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item editTax" href="javascript::void()" data-toggle="modal" data-id="{{$val->id}}" data-target="#edit_tax"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                            <a class="dropdown-item deleteTaxBtn" href="javascript::void()" data-toggle="modal" data-id="{{$val->id}}"data-target="#delete_tax"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
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
    
    <!-- Add Tax Modal -->
    @include('admin.taxes.add_popup')
    <!-- /Add Tax Modal -->
    
    <!-- Edit Tax Modal -->
    @include('admin.taxes.edit_popup')
    <!-- /Edit Tax Modal -->
    
    <!-- Delete Tax Modal -->
   
    <!-- /Delete Tax Modal -->
    
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

    $(document).on('click', '.editTax', function() {
        const tax_id = $(this).data('id');
        $.get('/admin/tax/edit/' + tax_id, function (data) {
                $('#tax_id').val(data.id);
                $('#name').val(data.name);
                $('#percentage').val(data.percentage);
                let status = data.status; 
                if(status == 0){
                    $('#status').append(`<option value="${status}" selected>Active</option>`); 
                    $('#status').append(`<option value="0">Inactive</option>`);
                }
                else if(status == 1){
                    $('#status').append(`<option value="${status}" selected>Inactive</option>`); 
                    $('#status').append(`<option value="0">Active</option>`);
                }
                
            });
    });

    $('#taxEditForm').on('submit', function (e) {
     e.preventDefault();
     
     const formData = new FormData(this);
     const id = $('#tax_id').val();
    //  alert(tax_id);
     $(".update_data").text('Updating...');
    $.ajax({
    url: '{{ route("admin.tax.update", ":id") }}'.replace(':id', id),   // Adjust the URL as needed
    type: 'POST',
    contentType: false,
    processData: false,
    data: formData,// Assuming you have a form with the ID employeeForm

    success: function(response) {
        $('#edit_tax').modal('hide');
        // alert(response.success);
        Swal.fire({
        icon: 'success',
        title: 'Edit Record Successfully',
        })
        // Redirect after 3 seconds
        setTimeout(function() {
        }, 2000);
        window.location.href = '/admin/taxes'; // Redirect to home page
        $('#taxEditForm')[0].reset();
                    fetchEmployeeId();
    },
    error: function(xhr) {
        console.error(xhr.responseText);
        // Handle errors (display error messages, etc.)
    }
});
});
        $('#taxForm').on('submit', function(e) {
            e.preventDefault();

        let isValid = true;
        $('.error').text(''); // Clear existing errors

        // Client-side validation example
        if ($('input[name="name"]').val() === '') {
            $('#name_nameError').text('Name is required.');
            isValid = false;
        }

        if ($('input[name="percentage"]').val() === '') {
            $('#percentage_dateError').text('Percentage is required.');
            isValid = false;
        }

       

        $(".add_data").text('Saving...')
            $.ajax({
                url: '{{ route("admin.tax.store")}}',
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
                    window.location.href = '/admin/taxes'; // Redirect to home page
                  
                    $('#taxForm')[0].reset();
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
    $(document).on('click', '.deleteTaxBtn', function() {
    const taxId = $(this).data('id');
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
                url: '/admin/tax/delete/' + taxId,
                method: 'DELETE',
                success: function(response) {
                    Swal.fire(
                        'Deleted!',
                        response.success,
                        'success'
                    ).then(() => {
                        // Redirect after a successful deletion
                        window.location.href = '/admin/taxes';
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

         
      