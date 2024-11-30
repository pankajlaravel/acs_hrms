@extends('admin.layouts.app')

@section('title', 'Dashboard - HRMS Admin')

@section('content')

<!-- Page Wrapper -->
<div class="content">
    
        <div class="page-body">
            
            <div class="container-xl">
              <div class="row row-cards">
                <div class="col-md-12"> 
                    <div class="main-container-unique">
                        <div class="main-header-unique">
                            <h3>All Category</h3>
                            <button data-bs-toggle="modal" data-bs-target="#add_Category">Add</button>
                        </div>
                        <table id="items-table" class="table-body-unique custom-table datatable">
                            <thead>
                                <tr>
                                    <th >#</th>
                                    <th>Category Name</th>
                                    <th >Action</th>
                                </tr>
                            </thead>
                           
                            <tbody>
                               
                                @foreach ($data as $num => $val )
                                
                                <tr>
                                    <td>{{ $num + 1 }}</td>
                                    <td>{{ $val['name']  }}</td>
                                    
                                    <td >
                                        <a class="editCategory" href="#" data-bs-toggle="modal" data-id="{{ $val['id'] }}" data-bs-target="#edit_category"><i class="fa fa-pencil m-r-5"></i> </a>
                                            <a class="deleteCategoryBtn" href="#" data-toggle="modal" data-id="{{ $val['id'] }}" data-target="#delete_category"><i class="fa fa-trash m-r-5"></i> </a>
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
    @include('admin.category.add_popup')
    <!-- /Add Holiday Modal -->
    
    <!-- Edit Holiday Modal -->
    @include('admin.category.edit_popup')
    
@endsection
@section('script')
<script>
    $(document).ready(function() {
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).on('click', '.editCategory', function() {
        const cat_id = $(this).data('id');
        $.get('/admin/category-list/edit/' + cat_id, function (data) {
                $('.category_id').val(data.id);
                $('.name').val(data.name);
              
            });
    });

    $('#categoryEditForm').on('submit', function (e) {
     e.preventDefault();
     
     const formData = new FormData(this);
     $("#department_updating").text('Updating...');
    $.ajax({
    url: '/admin/category-list/${userId}/update', // Adjust the URL as needed
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
            window.location.href = '/admin/category-list'; // Redirect to home page
        }, 3000);
        $('#employeeForm')[0].reset();
                    fetchEmployeeId();
    },
    error: function(xhr) {
        console.error(xhr.responseText);
        // Handle errors (display error messages, etc.)
    }
});
});
        $('#categoryForm').on('submit', function(e) {
            e.preventDefault();

        let isValid = true;
        $('.error').text(''); // Clear existing errors

        // Client-side validation example
        if ($('input[name="name"]').val() === '') {
            $('#departmenError').text('Name is required.');
            isValid = false;
        }

        if (!isValid) {
            e.preventDefault(); // Prevent form submission
            return;
        }
        
        $(".save").text('Saving...')
            $.ajax({
                url: '{{ route("category.store")}}',
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
                            window.location.href = '/admin/category-list'; // Redirect to home page
                        }, 3000);
                  
                    $('#categoryForm')[0].reset();
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
    $(document).on('click', '.deleteCategoryBtn', function() {
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
                url: '/admin/category-list/delete/' + category_id,
                method: 'DELETE',
                success: function(response) {
                    Swal.fire(
                        'Deleted!',
                        response.success,
                        'success'
                    ).then(() => {
                        // Redirect after a successful deletion
                        window.location.href = '/admin/category-list';
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

         
      