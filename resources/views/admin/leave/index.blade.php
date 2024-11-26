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
                    Leave Type
                  </h2>
                  <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Leave Type</li>
                </ul>
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
                        <table id="items-table" class="table mb-0 display table-striped custom-table datatable">
                            <thead>
                                <tr>
                                    <th style="width: 30px;">#</th>
                                    <th>Employee ID</th>
                                    <th>Employee Name</th>
                                    <th>Leave Type</th>
                                    <th>From Date</th>
                                    <th>To Date</th>
                                    <th>Status</th>
                                    <th >Action</th>
                                </tr>
                            </thead>
                           
                            <tbody>
                                @foreach ($leaves as $num => $val )
                                    
                                    <tr>
                                        <td>{{ $num + 1 }}</td>
                                        <td>{{ $val->empID  }}</td>
                                        <td>{{ $val->firstName.' '.$val->lastName  }}</td>
                                        <td>{{ $val->type_name  }}</td>
                                        <td>{{ $val->leave_from ? \Carbon\Carbon::parse($val->leave_from)->format('j M Y') : 'N/A' }}</td>
                                        <td>{{ $val->leave_to ? \Carbon\Carbon::parse($val->leave_to)->format('j M Y') : 'N/A' }}</td>
                                        <td>{{ $val->leave_status  }}</td>
                                        <td >
                                            <a class="dropdown-item viewButton" href="#" data-bs-toggle="modal" data-id="{{ $val->id }}" data-bs-target="#view_details"><i class="fa fa-eye m-r-5"></i></a>
                                                {{-- <a class="dropdown-item deleteButton" href="#" data-toggle="modal" data-id="{{ $val->id }}" data-target="#delete_department"><i class="fa fa-trash-o m-r-5"></i></a> --}}
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
  
@include('admin.leave.viewLeave')
@endsection
@section('script')
<script>
    $(document).ready(function() {
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).on('click', '.viewButton', function() {
        const id = $(this).data('id');
        // alert(id);
        $.get('/admin/view/apply/leave/' + id, function (data) {
                $('#id').val(data.id);
                $('#emp_office_id').val(data.emp_office_id);
                $('#type_name').val(data.type_name);
                $('#leave_from').val(data.leave_from);
                $('#leave_to').val(data.leave_to);
                $('#description').val(data.description);
                $('#leave_status').val(data.leave_status);
                    
            });
    });

    $('#applyLeaveVerify').on('submit', function (e) {
     e.preventDefault();
     
     const formData = new FormData(this);
     $("#update").text('Updating...');
    $.ajax({
    url: '/admin/verify/apply/leave/'+id, // Adjust the URL as needed
    type: 'POST',
    contentType: false,
    processData: false,
    data: formData,// Assuming you have a form with the ID employeeForm

    success: function(response) {
        $('#view_details').modal('hide');
        // alert(response.success);
        Swal.fire({
        icon: 'success',
        title: 'Edit Record Successfully',
        })
        // Redirect after 3 seconds
        setTimeout(function() {
            window.location.href = '/admin/employee/apply/leave'; // Redirect to home page
        }, 3000);
        $('#applyLeaveVerify')[0].reset();
                    fetchEmployeeId();
    },
    error: function(xhr) {
        console.error(xhr.responseText);
        // Handle errors (display error messages, etc.)
    }
});
});

    });
</script>
@endsection

         
      