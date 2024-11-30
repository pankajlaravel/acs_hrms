@extends('admin.layouts.app')

@section('title', 'Dashboard - HRMS Admin')

@section('content')

<!-- Page Wrapper -->
<div class="page-wrapper">
			
    <!-- Page Content -->
            <div class="page-header d-print-none">
            <div class="container-xl">
              <div class="row g-2 align-items-center">
                <div class="col">
                  <h2 class="page-title">
                   Task
                  </h2>
                  <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Task</li>
                </ul>
                </div>
                <div class="float-right col-auto ml-auto">
                    <a href="#" class="btn btn-primary d-none d-sm-inline-block add-btn" data-toggle="modal" data-target="#add_task"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg> Add Task</a>
                   
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
                               
                                <th>Task Name</th>
                                <th>Assigne To</th>
                                <th>Status</th>
                                <th>Priority</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                {{-- <th>Progress </th> --}}
                                {{-- <th class="text-right">Action</th> --}}
                            </tr>
                        </thead>
                        @foreach ($data as $val)
                            <tr>
                                <td>{{$val->name}}</td>
                            <td>{{$val->fname.' '.$val->lname}}</td>
                            <td>{{$val->status}}</td>
                            <td>{{$val->priority}}</td>
                            <td>{{$val->start_date}}</td>
                            <td>{{$val->due_date}}</td>
                            </tr>
                        @endforeach
                        <tbody>
                           
                            
                        </tbody>
                        
                    </table>
                </div>
            </div>
        </div>
      </div>
    </div>
    <!-- /Page Content -->

    <!-- Add Goal Modal -->
    @include('admin.task.add_popup');
    <!-- /Add Goal Modal -->
    
    <!-- Edit Goal Modal -->
    {{-- @include('admin.goals.edit_popup'); --}}
    <!-- /Edit Goal Modal -->
    
    <!-- Delete Goal Modal -->
   

<!-- /Page Wrapper -->

@endsection
@section('script')
<script>
    $(document).ready(function() {
      $('#employee').select2({
        placeholder: "Select an employee",
        allowClear: true
      });
    });
  </script>
  <script>
    $(document).ready(function () {
        $('#taskForm').on('submit', function (e) {
            e.preventDefault();

            $.ajax({
                url: "{{ route('store.tasks') }}",
                type: "POST",
                data: $(this).serialize(),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    if (response.success) {
                        // toastr.success(response.message);
                        Swal.fire({
                        icon: 'success',
                        title: 'Inserted Successfully',
                     })
                     // Redirect after 3 seconds
                     setTimeout(function() {
                    }, 2000);
                    window.location.href = '/admin/portal/tasks';
                        $('#taskForm')[0].reset();
                    } else {
                        toastr.error('Failed to create task.');
                    }
                },
                error: function (xhr) {
                    let errors = xhr.responseJSON.errors;
                    $.each(errors, function (key, error) {
                        toastr.error(error[0]);
                    });
                }
            });
        });
    });
</script>
@endsection

         
      