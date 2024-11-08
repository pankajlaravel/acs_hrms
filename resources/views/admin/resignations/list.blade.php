@extends('admin.layouts.app')

@section('title', 'Dashboard - HRMS Admin')

@section('content')

<!-- Page Wrapper -->
<div class="page-wrapper">
	
        <div class="page-header d-print-none">
            <div class="container-xl">
              <div class="row g-2 align-items-center">
                <div class="col">
                  <h2 class="page-title">
                   Resignation
                  </h2>
                  <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Resignation</li>
                </ul>
                </div>
                <div class="float-right col-auto ml-auto">
                    <a href="#" class="btn btn-primary d-none d-sm-inline-block add-btn" data-toggle="modal" data-target="#add_resignation"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg> Add Resignation</a>
                   
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
                                <th>#</th>
                                <th>Resigning Employee </th>
                                <th>Department </th>
                                <th>Reason </th>
                                <th>Notice Date </th>
                                <th>Resignation Date </th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($resignations as $index => $val)
                            <tr>
                                <td>{{$index+1}}</td>
                                <td>
                                    
                                        <a href="{{route('admin.employee.view',$val->emp_id)}}" class="avatar"><img alt="" src="{{asset('employee/img/'.$val->img)}}"></a>
                                        <a href="{{route('admin.employee.view',$val->emp_id)}}">{{$val->fname.' '.$val->lname}}</a>
                                 
                                </td>
                                <td>{{$val->department_name}}</td>
                                {{-- <td>Misconduct</td> --}}
                                <td>{{ \Carbon\Carbon::parse($val->resignation_date)->format('d M Y') }}</td>
                                <td>{{ \Illuminate\Support\Str::words($val->reason, 4, '...') }}</td>
                                <td>{{ \Carbon\Carbon::parse($val->notice_date)->format('d M Y') }}</td>
                                <td class="text-right">
                                    <div class="dropdown dropdown-action">
                                        <button class="align-text-top btn dropdown-toggle" data-bs-boundary="viewport" data-bs-toggle="dropdown">Actions</button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item resignationEdit" href="javacript::void()" id="resignationEdit" data-id="{{$val->id}}" data-toggle="modal" data-target="#edit_resignation"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                            <a class="dropdown-item resignationDelete" href="javacript::void()" data-id="{{$val->id}}" data-toggle="modal" data-target="#delete_resignation"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
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

    <!-- Add Resignation Modal -->
   @include('admin.resignations.add_popup')
    <!-- /Add Resignation Modal -->
    
    <!-- Edit Resignation Modal -->
    @include('admin.resignations.edit_popup')
    <!-- /Edit Resignation Modal -->
    
 
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

    $(document).on('click', '#resignationEdit', function() {
        const resigntionId = $(this).data('id');
        dd(resigntionId);
        $.get('/admin/resignations/edit/' + resigntionId, function (data) {
                $('#resigntionId').val(data.id);
                $('.emp_id').val(data.emp_id);
                $('.notice_date').val(data.notice_date);
                $('.resignation_date').val(data.resignation_date);
                $('.reason').val(data.reason);
                
                let emp_id = data.emp_id; 
                let emp_name = data.fname+' '+data.lname; 
                // alert(emp_name);
                $('.emp_name').append(`<option value="${emp_id}" selected>${emp_name}</option>`);
                
            });
    });

    $('#resignationEditForm').on('submit', function (e) {
     e.preventDefault();
     
     const formData = new FormData(this);
     const resigntionId = $('#resigntionId').val();
    //  alert(goal_id);
     $(".update").text('Updating...');
    $.ajax({
    url: '/admin/resignations/${resigntionId}/update', // Adjust the URL as needed
    type: 'POST',
    contentType: false,
    processData: false,
    data: formData,// Assuming you have a form with the ID employeeForm

    success: function(response) {
        $('#edit_resignation').modal('hide');
        // alert('ok');
        Swal.fire({
        icon: 'success',
        title: 'Edit Record Successfully',
        })
        // Redirect after 3 seconds
        setTimeout(function() {
        }, 2000);
        window.location.href = '/admin/resignations'; // Redirect to home page
        $('#resignationEditForm')[0].reset();
                    fetchEmployeeId();
    },
    error: function(xhr) {
        console.error(xhr.responseText);
        // Handle errors (display error messages, etc.)
    }
});
});
        $('#resignationForm').on('submit', function(e) {
            e.preventDefault();

        let isValid = true;
        $('.error').text(''); // Clear existing errors

        // Client-side validation example
        if ($('select[name="emp_id"]').val() === '') {
            $('#emp_idError').text('Employee Name is required.');
            isValid = false;
        }

        if ($('input[name="notice_date"]').val() === '') {
            $('#notice_dateError').text('Notice Date is required.');
            isValid = false;
        }

        if ($('input[name="resignation_date"]').val() === '') {
            $('#resignation_dateError').text('Resignation Date is required.');
            isValid = false;
        }
        
        if ($('textarea[name="reason"]').val() === '') {
            $('#reasonError').text('Reason is required.');
            isValid = false;
        }


       
        // Add more client-side validation as needed

        if (!isValid) {
            e.preventDefault(); // Prevent form submission
            return;
        }
        
        $(".add_data").text('Saving...')
            $.ajax({
                url: '{{ route("admin.resignations.store")}}',
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
                    window.location.href = '/admin/resignations'; // Redirect to home page
                  
                    $('#resignationForm')[0].reset();
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
    $(document).on('click', '.resignationDelete', function() {
    const resigntionId = $(this).data('id');
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
                url: '/admin/resignations/delete/' + resigntionId,
                method: 'DELETE',
                success: function(response) {
                    Swal.fire(
                        'Deleted!',
                        response.success,
                        'success'
                    ).then(() => {
                        // Redirect after a successful deletion
                        window.location.href = '/admin/resignations';
                    });
                    // window.location.href = '/admin/employees';
                    // Remove the employee row from the table
                    $('#employee-' + resigntion).remove();
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

         
      