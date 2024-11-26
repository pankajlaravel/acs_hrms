@extends('employee.layouts.app')

@section('title', 'Dashboard - HRMS Admin')

@section('content')

<div class="page-wrapper">
			
    <!-- Page Content -->
    <div class="content container-fluid">
    
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Leave</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Leave</li>
                    </ul>
                </div>
                <div class="float-right col-auto ml-auto">
                    <a href="#" class="btn add-btn" data-toggle="modal" data-target="#apply_leave"><i class="fa fa-plus"></i>Apply Leave</a>
                </div>
            </div>
        </div>
        <!-- /Page Header -->
        
        <div class="row">
            <div class="col-md-12"> 
                <div>
                    <table id="items-table" class="table mb-0 display table-striped custom-table datatable">
                        <thead>
                            <tr>
                                <th style="width: 30px;">#</th>
                                <th>Leave Type</th>
                                <th>From Date</th>
                                <th>To Date</th>
                                <th>Status</th>
                                {{-- <th class="text-right">Action</th> --}}
                            </tr>
                        </thead>
                       
                        <tbody>
                            @foreach ($leaves as $num => $val )
                                
                                <tr>
                                    <td>{{ $num + 1 }}</td>
                                    <td>{{ $val->type_name  }}</td>
                                    <td>{{ $val->leave_from ? \Carbon\Carbon::parse($val->leave_from)->format('j M Y') : 'N/A' }}</td>
                                    <td>{{ $val->leave_to ? \Carbon\Carbon::parse($val->leave_to)->format('j M Y') : 'N/A' }}</td>
                                    <td>{{ $val->leave_status  }}</td>
                                    
                                    
                                </tr>
    
                                @endforeach
                            
                        </tbody>
                        
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /Page Content -->
    
    <!-- Add Holiday Modal -->
    @include('employee.leave.add_popup')

    
</div>
    <!-- /Page Content -->
    
    
    
</div>

@endsection
@section('script')
<script>
    $(document).ready(function() {
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).on('click', '.editButton', function() {
        const id = $(this).data('id');
        // alert(id);
        $.get('/admin/leave-type/edit/' + id, function (data) {
                $('#id').val(data.id);
                $('#type_name').val(data.type_name);
                $('#code').val(data.code);
                    
            });
    });

    $('#editForm').on('submit', function (e) {
     e.preventDefault();
     
     const formData = new FormData(this);
     $("#update").text('Updating...');
    $.ajax({
    url: '/admin/leave-type/${userId}/update', // Adjust the URL as needed
    type: 'POST',
    contentType: false,
    processData: false,
    data: formData,// Assuming you have a form with the ID employeeForm

    success: function(response) {
        $('#edit_leave_type').modal('hide');
        // alert(response.success);
        Swal.fire({
        icon: 'success',
        title: 'Edit Record Successfully',
        })
        // Redirect after 3 seconds
        setTimeout(function() {
            window.location.href = '/admin/leave-types'; // Redirect to home page
        }, 3000);
        $('#editForm')[0].reset();
                    fetchEmployeeId();
    },
    error: function(xhr) {
        console.error(xhr.responseText);
        // Handle errors (display error messages, etc.)
    }
});
});
        $('#addForm').on('submit', function(e) {
            e.preventDefault();
          
        
        $(".add_leave").text('Submiting...')
        $('#add_leave_type').modal('hide');
            $.ajax({
                url: '{{ route("apply.leave.store")}}',
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
                            window.location.href = '/my-leave-record'; // Redirect to home page
                        }, 3000);
                  
                    $('#addForm')[0].reset();
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
    document.addEventListener('DOMContentLoaded', function () {
    const radioButtons = document.querySelectorAll('input[name="leave_duration"]');
    const toDateGroup = document.querySelector('.to-date-group');

    radioButtons.forEach((radio) => {
        radio.addEventListener('change', function () {
            if (this.value === 'one_day') {
                toDateGroup.classList.add('d-none'); // Hide "To" date
            } else {
                toDateGroup.classList.remove('d-none'); // Show "To" date
            }
        });
    });

    // Handle form submission with AJAX
    document.querySelector('.add_leave').addEventListener('click', function () {
        const formData = new FormData(document.getElementById('addForm'));

        fetch('{{ route("apply.leave.store")}}', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
            },
            body: formData,
        })
            .then((response) => response.json())
            .then((data) => {
                if (data.status === 'success') {
                    alert(data.message);
                    location.reload();
                } else if (data.status === 'error') {
                    for (const [key, value] of Object.entries(data.errors)) {
                        document.getElementById(`${key}Error`).textContent = value[0];
                    }
                }
            })
            .catch((error) => console.error('Error:', error));
    });
});
</script>

@endsection

         
      