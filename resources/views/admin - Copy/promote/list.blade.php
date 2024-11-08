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
                    <h3 class="page-title">Promotion</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Promotion</li>
                    </ul>
                </div>
                <div class="float-right col-auto ml-auto">
                    <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_promotion"><i class="fa fa-plus"></i> Add Promotion</a>
                </div>
            </div>
        </div>
        <!-- /Page Header -->
        
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                
                    <!-- Promotion Table -->
                    <table class="table mb-0 table-striped custom-table datatable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Promoted Employee </th>
                                <th>Department</th>
                                <th>Promotion Designation From </th>
                                <th>Promotion Designation To </th>
                                <th>Promotion Date </th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($promotes as $index => $val)
                            <tr>
                                <td>{{$index+1}}</td>
                                <td>
                                    <h2 class="table-avatar blue-link">
                                        <a href="{{route('admin.employee.view',$val->emp_id)}}" class="avatar">
                                            <img alt="" src="{{asset('employee/img/'.$val->img)}}">
                                        </a>
                                        <a href="{{route('admin.employee.view',$val->emp_id)}}">{{$val->fname.' '.$val->lname}}</a>
                                    </h2>
                                </td>
                                <td>{{$val->department_name}}</td>
                                <td>{{$val->promotion_from}}</td>
                                <td>{{$val->promotion_to}}</td>
                                <td>{{ \Carbon\Carbon::parse($val->promotion_date)->format('d M Y') }}</td>
                                <td class="text-right">
                                    <div class="dropdown dropdown-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item promorteEdit" href="javacript::void()" data-id="{{$val->id}}" data-toggle="modal" data-target="#edit_promotion"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                            <a class="dropdown-item promoteDelete" href="javacript::void()" data-id="{{$val->id}}" data-toggle="modal" data-target="#delete_promotion"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>  
                            @endforeach
                            
                        </tbody>
                    </table>
                    <!-- /Promotion Table -->
                    
                </div>
            </div>
        </div>
    </div>
    <!-- /Page Content -->
    
    <!-- Add Promotion Modal -->
   @include('admin.promote.add_popup')
    <!-- /Add Promotion Modal -->
    
    <!-- Edit Promotion Modal -->
   @include('admin.promote.edit_popup')
    <!-- /Edit Promotion Modal -->
    
    <!-- Delete Promotion Modal -->
   
    <!-- /Delete Promotion Modal -->

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

    $(document).on('click', '.promorteEdit', function() {
        const prom_id = $(this).data('id');
        // alert(editGoal_id);
        $.get('/admin/promotion/edit/' + prom_id, function (data) {
                $('#prom_id').val(data.id);
                $('.emp_id').val(data.emp_id);
                $('.promotion_from').val(data.promotion_from);
                // $('.promotion_to').val(data.promotion_to);
                $('.promotion_date').val(data.promotion_date);
                $('.promotion_for').val(data.promotion_for);
                $('.emp_name').val(data.fname+' '+data.lname);
                $('.status').val(data.status);
                
                let promotion_to = data.promotion_to; 
                let name = data.promotion_to_name;
                $('.promotion_to').append(`<option value="${promotion_to}" selected>${name}</option>`);
                let status = data.status;
                if(status == 0){
                    $('.prom_status').append(`<option value="${status}" selected>Active</option>`);
                    $('.prom_status').append(`<option value="1">Inactive</option>`);
                }else if(status == 1){
                    $('.prom_status').append(`<option value="${status}" selected>Inactive</option>`);
                    $('.prom_status').append(`<option value="0">Active</option>`);
                }
                
            });
    });

    $('#promorteEditForm').on('submit', function (e) {
     e.preventDefault();
     
     const formData = new FormData(this);
     const prom_id = $('#prom_id').val();
    //  alert(goal_id);
     $(".update").text('Updating...');
    $.ajax({
    url: '/admin/promotion/${prom_id}/update', // Adjust the URL as needed
    type: 'POST',
    contentType: false,
    processData: false,
    data: formData,// Assuming you have a form with the ID employeeForm

    success: function(response) {
        $('#edit_type').modal('hide');
        alert('ok');
        Swal.fire({
        icon: 'success',
        title: 'Edit Record Successfully',
        })
        // Redirect after 3 seconds
        setTimeout(function() {
        }, 2000);
        window.location.href = '/admin/promotion'; // Redirect to home page
        $('#promorteEditForm')[0].reset();
                    fetchEmployeeId();
    },
    error: function(xhr) {
        console.error(xhr.responseText);
        // Handle errors (display error messages, etc.)
    }
});
});
        $('#promotionForm').on('submit', function(e) {
            e.preventDefault();

        let isValid = true;
        $('.error').text(''); // Clear existing errors

        // Client-side validation example
        if ($('select[name="emp_id"]').val() === '') {
            $('#emp_idError').text('Employee Name is required.');
            isValid = false;
        }

        if ($('input[name="promotion_from"]').val() === '') {
            $('#promotion_fromError').text('Subject is required.');
            isValid = false;
        }

        if ($('select[name="promotion_to"]').val() === '') {
            $('#promotion_toError').text('Target is required.');
            isValid = false;
        }
        
        if ($('input[name="promotion_date"]').val() === '') {
            $('#promotion_dateError').text('Date is required.');
            isValid = false;
        }


       
        // Add more client-side validation as needed

        if (!isValid) {
            e.preventDefault(); // Prevent form submission
            return;
        }
        
        $(".add_data").text('Saving...')
            $.ajax({
                url: '{{ route("admin.promotion.store")}}',
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
                    window.location.href = '/admin/promotion'; // Redirect to home page
                  
                    $('#promotionForm')[0].reset();
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
    $(document).on('click', '.promoteDelete', function() {
    const promo_id = $(this).data('id');
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
                url: '/admin/promotion/delete/' + promo_id,
                method: 'DELETE',
                success: function(response) {
                    Swal.fire(
                        'Deleted!',
                        response.success,
                        'success'
                    ).then(() => {
                        // Redirect after a successful deletion
                        window.location.href = '/admin/promotion';
                    });
                    // window.location.href = '/admin/employees';
                    // Remove the employee row from the table
                    $('#employee-' + promotion).remove();
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
<script>
    $(document).ready(function(){
      $(document).on('change','.emp_data',function(){
         var id = $(this).val();
         
         $.ajax({
            type:'GET',
            url: '{{route("find.employee.name")}}',
            data:{'id':id},
            success:function(data){
               console.log('success');
               $('.designation').val(data.designation);
            //    $('.client_address').val(data.address);
               // console.log(data.email);
               // a.find('.client_email').val(data.email);
               
            },
            error:function(){

            }
         });
      });
   });
 </script>
@endsection

         
      