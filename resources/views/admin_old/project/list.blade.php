@extends('admin.layouts.app')

@section('title', 'Dashboard - HRMS Admin')

@section('content')

            <!-- Page Content -->
            <div class="page-wrapper">
			
				<!-- Page Content -->
     
				
					<!-- Page Header -->
					
                    <div class="page-header d-print-none">
                        <div class="container-xl">
                          <div class="row g-2 align-items-center">
                            <div class="col">
                              <h2 class="page-title">
                                Projects
                              </h2>
                              <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Projects</li>
                            </ul>
                            </div>
                            <div class="float-right col-auto ml-auto">
                                <a href="#" class="btn btn-primary d-none d-sm-inline-block add-btn" data-toggle="modal" data-target="#create_project"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg> Add Designation</a>
                               
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
											<th>Project</th>
											<th>Project Id</th>
											<th>Leader</th>
											{{-- <th>Team</th> --}}
											<th>Deadline</th>
											<th>Priority</th>
											{{-- <th>Status</th> --}}
											<th class="text-right">Action</th>
										</tr>
									</thead>
									<tbody>
                                        @foreach ($projects as $val)
                                        <tr>
											<td>
												<a href="{{route('admin.project.view',$val->id)}}">{{$val->project_name}}</a>
											</td>
											<td>{{$val->project_id}}</td>
											<td>
												<ul class="team-members">
													<li>
														<a href="#" data-toggle="tooltip" title="{{$val->lead_first_name.' '.$val->lead_last_name}}"><img alt="" src="{{asset('leads/img/'.$val->lead_picture)}}" style="height: 30px; width: 30px"></a>
													</li>
												</ul>
											</td>
											@php
                                                $date = \Carbon\Carbon::createFromFormat('Y-m-d', $val->end_date);
                                            @endphp
											<td>{{ $date->format('d M Y') }}</td>
											<td>
												<div class=" action-label">
                                                    @if ($val->priority === 'High')
                                                    <span class="badge bg-danger me-1"></span> High
													{{-- <a href="javascript::void()" class="btn btn-white btn-sm btn-rounded " data-toggle="dropdown" aria-expanded="false"><i class="fa fa-dot-circle-o text-danger"></i> High </a> --}}
                                                    @elseif($val->priority === 'Medium')    
                                                    <span class="badge bg-warning me-1"></span> Medium
													{{-- <a href="javascript::void()" class="btn btn-white btn-sm btn-rounded " data-toggle="dropdown" aria-expanded="false"><i class="fa fa-dot-circle-o text-warning"></i> Medium </a> --}}
                                                    @elseif($val->priority === 'Low') 
                                                    <span class="badge bg-success me-1"></span> Low
													{{-- <a href="javascript::void()" class="btn btn-white btn-sm btn-rounded " data-toggle="dropdown" aria-expanded="false"><i class="fa fa-dot-circle-o text-success"></i> Low </a> --}}
                                                    @endif
													
												</div>
                                               
											</td>
											{{-- <td>
												<div class=" action-label">
													<a href="javascript::void()" class="btn btn-white btn-sm btn-rounded dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-dot-circle-o text-success"></i> Active </a>
									
												</div>
											</td> --}}
											<td class="text-right">
												<div class="dropdown dropdown-action">
													<button class="align-text-top btn dropdown-toggle" data-bs-boundary="viewport" data-bs-toggle="dropdown">Actions</button>
													<div class="dropdown-menu dropdown-menu-right">
														<a class="dropdown-item projectEditForm" href="javascript::void()" data-id="{{$val->id}}" data-toggle="modal" data-target="#edit_project"><i class="fa fa-pencil m-r-5"></i> Edit</a>
														<a class="dropdown-item deleteProjectBtn" href="javascript::void()" data-toggle="modal" data-id="{{$val->id}}" data-target="#delete_project"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
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
            @include('admin.project.add_popup')
            @include('admin.project.edit_popup')

@endsection
@section('script')
<script>
    $(document).ready(function() {
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).on('click', '.projectEditForm', function() {
        const project_id = $(this).data('id');
        // alert(project_id);
        $.get('/admin/project/edit/' + project_id, function (data) {
            $('.projectID').val(data.project.id);
            $('.project_id').val(data.project.project_id); // or another field if different
            $('.project_name').val(data.project.project_name); // Adjust field names as necessary
            $('.client_id').val(data.project.client_id);
            $('.start_date').val(data.project.start_date);
            $('.end_date').val(data.project.end_date);
            $('.rate').val(data.project.rate);
            $('.rate_type').val(data.project.rate_type);
            $('.lead_id').val(data.project.lead_id);
            $('.description').val(data.project.description);
            $('#department').text(data.project.department);
                
                let client_id = data.project.client_id; 
                let client_name = data.project.client_first_name+' '+data.project.client_last_name; 
                $('.client_name').append(`<option value="${client_id}" selected>${client_name}</option>`);

                let lead_id = data.project.lead_id; 
                let lead_name = data.project.lead_first_name+' '+data.project.lead_last_name; 
                $('.lead_name').append(`<option value="${lead_id}" selected>${lead_name}</option>`);
                let rateType = data.project.rate_type; 
                let clientData = data.selected.clientID; 
                // alert(clientData);
                if(rateType == 'Hourly'){
                    $('.rate_type_result').append(`<option value="${rateType}" selected>${rateType}</option>`);
                    $('.rate_type_result').append(`<option value="Fixed">Fixed</option>`);
                }else if(rateType == 'Fixed'){
                    $('.rate_type_result').append(`<option value="${rateType}" selected>${rateType}</option>`);
                    $('.rate_type_result').append(`<option value="Hourly">Hourly</option>`);
                }
                
                let priority = data.project.priority; 
                if(priority == 'High'){
                    $('.priority').append(`<option value="${priority}" selected>${priority}</option>`);
                    $('.priority').append(`<option value="Medium">Medium</option>`);
                    $('.priority').append(`<option value="Low">Low</option>`);
                }
                else if(priority == 'Medium'){
                    $('.priority').append(`<option value="${priority}" selected>${priority}</option>`);
                    $('.priority').append(`<option value="High">High</option>`);
                    $('.priority').append(`<option value="Low">Low</option>`);
                }

                else if(priority == 'Low'){
                    $('.priority').append(`<option value="${priority}" selected>${priority}</option>`);
                    $('.priority').append(`<option value="High">High</option>`);
                    $('.priority').append(`<option value="Medium">Medium</option>`);
                }
                
                if (data.project.picture) {
            $('#previewImage').attr('src', '{{asset("/projects/img")}}/' + data.project.picture).show(); // Set the src and show the image
                } else {
                    $('#previewImage').hide(); // Hide if no image
                }
            });
    });

    $('#projectEditForm').on('submit', function (e) {
     e.preventDefault();
     
     const formData = new FormData(this);
     const projectID = $('#projectID').val();
    //  alert(projectID);
     $(".updating").text('Updating...');
    $.ajax({
    url: '/admin/project/${userId}/update', // Adjust the URL as needed
    type: 'POST',
    contentType: false,
    processData: false,
    data: formData,// Assuming you have a form with the ID leadForm

    success: function(response) {
        $('#edit_lead').modal('hide');
        // alert(response.success);
        Swal.fire({
        icon: 'success',
        title: 'Edit Record Successfully',
        })
        // Redirect after 3 seconds
        setTimeout(function() {
        }, 2000);
        window.location.href = '/admin/projects'; // Redirect to home page
        $('#projectEditForm')[0].reset();
                    fetchEmployeeId();
    },
    error: function(xhr) {
        console.error(xhr.responseText);
        // Handle errors (display error messages, etc.)
    }
});
});
        $('#projectForm').on('submit', function(e) {
            e.preventDefault();
        let isValid = true;
        $('.error').text(''); // Clear existing errors

        // Client-side validation example
        if ($('input[name="project_name"]').val() === '') {
            $('#project_nameError').text('Project Name is required.');
            isValid = false;
        }

        if ($('select[name="client_id"]').val() === '') {
            $('#client_idError').text('Client is required.');
            isValid = false;
        }

        if ($('input[name="start_date"]').val() === '') {
            $('#start_dateError').text('Date is required.');
            isValid = false;
        }

        if ($('input[name="end_date"]').val() === '') {
            $('#end_dateError').text('Date is required.');
            isValid = false;
        }

        
        if ($('input[name="rate"]').val() === '') {
            $('#rateError').text('Rate is required.');
            isValid = false;
        }

        if ($('select[name="rate_type"]').val() === '') {
            $('#rate_typeError').text('Rate type is required.');
            isValid = false;
        }

        if ($('select[name="lead_id"]').val() === '') {
            $('#lead_idError').text('Project Leader is required.');
            isValid = false;
        }

        if ($('select[name="priority"]').val() === '') {
            $('#priorityError').text('Priority is required.');
            isValid = false;
        }

        if ($('textarea[name="description"]').val() === '') {
            $('#descriptionError').text('Description is required.');
            isValid = false;
        }


        if (!$('input[name="picture"]').val()) {
    isValid = false;
    $('input[name="picture"]').siblings('.error').text('Picture is required');
} else {
    const pictureInput = $('input[name="picture"]')[0]; // Access the input element
    const pictureFile = pictureInput.files[0]; // Get the file object

    // Check if the file is an image
    const validImageTypes = ['image/jpeg', 'image/png', 'image/jpg'];
    if (!pictureFile || !validImageTypes.includes(pictureFile.type)) {
        isValid = false;
        $('input[name="picture"]').siblings('.error').text('Invalid picture format. Only .jpg, .jpeg, or .png are allowed');
    } else if (pictureFile.size > 5 * 1024 * 1024) { // Check if the size exceeds 5MB
        isValid = false;
        $('input[name="picture"]').siblings('.error').text('File size must be less than 5MB');
    }
}

        // Add more client-side validation as needed

        // if (!isValid) {
        //     e.preventDefault(); // Prevent form submission
        //     return;
        // }
        
        var url = $(this).attr('data-action');
        $(".addData").text('Saving...')
            $.ajax({
                url: url,
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
                    window.location.href = '/admin/projects'; // Redirect to home page
                  
                    $('#projectForm')[0].reset();
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
    $(document).on('click', '.deleteProjectBtn', function() {
    const projectID = $(this).data('id');
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
                url: '/admin/project/delete/' + projectID,
                method: 'DELETE',
                success: function(response) {
                    Swal.fire(
                        'Deleted!',
                        response.success,
                        'success'
                    ).then(() => {
                        // Redirect after a successful deletion
                        window.location.href = '/admin/projects';
                    });
                    // window.location.href = '/admin/employees';
                    // Remove the employee row from the table
                    $('#employee-' + leadId).remove();
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

         
      