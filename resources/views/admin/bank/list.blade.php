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
                    Category
                  </h2>
                  <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Bank</li>
                </ul>
                </div>
                <div class="float-right col-auto ml-auto">
                    <a href="#" class="btn btn-primary d-none d-sm-inline-block add-btn" data-toggle="modal" data-target="#add_Bank"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg> Add Category</a>
                   
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
                                    <th style="width: 30px;">#</th>
                                    <th>Bank Name</th>
                                    <th>Short Name</th>
                                    <th class="text-end">Action</th>
                                </tr>
                            </thead>
                           
                            <tbody>
                               
                                @foreach ($data as $num => $val )
                                
                                <tr>
                                    <td>{{ $num + 1 }}</td>
                                    <td>{{ $val['bank_name']  }}</td>
                                    <td>{{ $val['short_name']  }}</td>
                                    
                                    <td class="text-end">
                                        <span class="dropdown">
                                          <button class="align-text-top btn dropdown-toggle" data-bs-boundary="viewport" data-bs-toggle="dropdown">Actions</button>
                                          <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item editBank" href="#" data-bs-toggle="modal" data-id="{{ $val['id'] }}" data-bs-target="#edit_Bank"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                            <a class="dropdown-item deleteBankBtn" href="#" data-toggle="modal" data-id="{{ $val['id'] }}" data-target="#delete_category"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                          </div>
                                        </span>
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
    @include('admin.bank.add_popup')
    <!-- /Add Holiday Modal -->
    
    <!-- Edit Holiday Modal -->
    @include('admin.bank.edit_popup')
    <!-- /Edit Holiday Modal -->

    <!-- Delete Holiday Modal -->
  
    <!-- /Delete Holiday Modal -->
    

    <!-- /Page Content -->
    
    
    

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

    $(document).on('click', '.editBank', function() {
        const cat_id = $(this).data('id');
        // alert(cat_id);
        $.get('/admin/bank-list/edit/' + cat_id, function (data) {
                $('.bank_id').val(data.id);
                $('.bank_name').val(data.bank_name);
                $('.short_name').val(data.short_name);
              
            });
    });

    $('#bankEditForm').on('submit', function (e) {
     e.preventDefault();
     
     const formData = new FormData(this);
     $("#department_updating").text('Updating...');
    $.ajax({
    url: '/admin/bank-list/${userId}/update', // Adjust the URL as needed
    type: 'POST',
    contentType: false,
    processData: false,
    data: formData,// Assuming you have a form with the ID employeeForm

    success: function(response) {
        $('#edit_department').modal('hide');
        // alert(response.success);
        Swal.fire({
        icon: 'success',
        title: 'Edit Record Successfully',
        })
        // Redirect after 3 seconds
        setTimeout(function() {
            window.location.href = '/admin/bank-list'; // Redirect to home page
        }, 3000);
        $('#bankEditForm')[0].reset();
                    fetchEmployeeId();
    },
    error: function(xhr) {
        console.error(xhr.responseText);
        // Handle errors (display error messages, etc.)
    }
});
});
        $('#bankForm').on('submit', function(e) {
            e.preventDefault();

        let isValid = true;
        $('.error').text(''); // Clear existing errors

        // Client-side validation example
        if ($('input[name="bank_name"]').val() === '') {
            $('#bank_nameError').text('Name is required.');
            isValid = false;
        }

        if ($('input[name="short_name"]').val() === '') {
            $('#short_nameError').text('Short Name is required.');
            isValid = false;
        }

        if (!isValid) {
            e.preventDefault(); // Prevent form submission
            return;
        }
        
        $(".save").text('Saving...')
            $.ajax({
                url: '{{ route("bank.store")}}',
                type: 'POST',
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function(response) {
                    // alert(response.success);
                    $('#add_Bank').modal('hide');
                     Swal.fire({
                        icon: 'success',
                        title: 'Inserted Successfully',
                     })
                     // Redirect after 3 seconds
                     setTimeout(function() {
                            window.location.href = '/admin/bank-list'; // Redirect to home page
                        }, 3000);
                  
                    $('#bankForm')[0].reset();
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
    $(document).on('click', '.deleteBankBtn', function() {
    const category_id = $(this).data('id');
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
                url: '/admin/bank-list/delete/' + category_id,
                method: 'DELETE',
                success: function(response) {
                    Swal.fire(
                        'Deleted!',
                        response.success,
                        'success'
                    ).then(() => {
                        // Redirect after a successful deletion
                        window.location.href = '/admin/bank-list';
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

         
      