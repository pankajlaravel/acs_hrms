
@extends('admin.layouts.app')

@section('title', 'Dashboard - HRMS Admin')

@section('content')
<div class="page-wrapper">
    <!-- Page header -->
    <div class="page-header d-print-none">
      <div class="container-xl">
        <div class="row g-2 align-items-center">
          
   
        
          <!-- Page title actions -->
          <div class="col-auto ms-auto d-print-none">
           
          </div>
        </div>
      </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
      <div class="container-xl">
        <div class="row row-deck row-cards">

          <div class="col-auto ms-auto d-print-none">
            <div class="btn-list">
              
              <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#basic_info">
                <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
              Add Employee
              </a>
              
            </div>
          </div>

          {{-- Search --}}
          <div class="col-12">
            <div class="row row-cards">
              <div class="col-12">
                <div class="card" >
                  <div class="card-body">
                    <h3 class="card-title">Start searching to see specific employee details here</h3>
                    <div class="row row-cards">
                      <div class="col-md-5">
                        <form id="search-form" method="post" >
                          @csrf
                        <div class="mb-3">
                          <p>Search Employee</p>
                          <div class="input-group">
                            <span class="input-group-text" id="basic-addon1" style="border-radius: 50px 0px 0px 50px">
                              <i class="fa fa-user" ></i> <!-- Bootstrap user icon -->
                            </span>
                            @if ($query)
                            <input required type="search" id="search"  class="form-control custom-radius" placeholder="Search by Emp No/ Name" value="{{$results->firstName.' '.$results->lastName}}"  />
                            <input  type="hidden" id="search_id" name="query" class="form-control custom-radius" placeholder="Search by Emp No/ Name" value="{{$query}}" />
                            @else
                            <input required type="search" id="search"  class="form-control custom-radius" placeholder="Search by Emp No/ Name"  />
                            <input  type="hidden" id="search_id" name="query" class="form-control custom-radius" placeholder="Search by Emp No/ Name" />
                            @endif
                            {{-- <div id="suggestions" class="suggestions" style="position: absolute; z-index: 1000; display: none; background: white; border: 1px solid #ddd;"></div> --}}
                            <button class="btn btn-primary" type="submit" style="border-radius: 0px 50px 50px 0px">
                              <i class="fa fa-search"></i> <!-- Bootstrap search icon -->
                            </button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <ul class="list-group" style="display:block;position:relative;z-index:1" id="results" ></ul>
              </div>
            </div>
          </div>
        </div>
          
          {{--  --}}
          <div id="search-results" style="display: none;">
          
        </div>
        
        </div>
      </div>
    </div>
    
 @include('admin.employee.edit_popup')
 @include('admin.employee.add_popup')
  @endsection
  @section('script')
  {{-- <script>
    // Handle AJAX form submission and modal navigation
$(document).ready(function () {
    // Submit Basic Info Form
    let email;
    $('#employeeForm').on('submit', function (e) {
        e.preventDefault();
        submitForm($(this), 'employeePersonalInfoForm');
    });

    // Submit Personal Info Form
    $('#employeePersonalInfoForm').on('submit', function (e) {
        e.preventDefault();
        submitForm($(this), 'editJoiningInfo');
    });

    // Submit Joining Info Form
    $('#employeeJoiningInfoEditForm').on('submit', function (e) {
        e.preventDefault();
        submitForm($(this), null); // null indicates end of steps
    });

    // Function to handle form submission and show the next modal
    function submitForm(form, nextModalId) {
        let actionUrl = form.attr('data-action') || form.attr('action');
        // alert();
        $.ajax({
            type: form.attr('method'),
            url: actionUrl,
            data: form.serialize(),
            success: function (response) {
                // Hide current modal
                form.closest('.modal').modal('hide');
                
                // If there's a next modal, show it
                if (nextModalId) {
                    $('#' + nextModalId).modal('show');
                } else {
                    // End of the form process (optional success message)
                    alert("Employee added successfully!");
                }
            },
            error: function (response) {
                // Display error messages (useful for server-side validation feedback)
                let errors = response.responseJSON.errors;
                form.find('.error').text(''); // Clear previous errors
                for (let field in errors) {
                    form.find('#' + field + 'Error').text(errors[field][0]);
                }
            }
        });
    }
});

  </script> --}}
  <script>
   
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready(function () {
        let email;

        // Handle the submission of the basic info form
        $('#employeeForm').on('submit', function (e) {
            e.preventDefault();
            $('#spinner').show();
            let formData = $(this).serialize();
            email = $('#email').val(); // Get the email from the form

            $.ajax({
                url: '{{route("employee.info.profile.store")}}',
                method: 'POST',
                data: formData,
                success: function (response) {
                  $('#basicInfoModal').modal('hide');
                 
                    
                    // Change the URL after saving basic info
                    // window.history.pushState({}, '', 'admin/employee/info/personal/store/' + encodeURIComponent(email));

                    $('#employeePersonalInfo').modal('show'); // Show personal info modal
                },
                error: function (error) {
                    console.log(error);
                },
                complete: function() {
                // Hide the spinner after the AJAX request completes
                $('#spinner').hide();
            }
            });
        });

        // Handle the submission of the personal info form
        $('#employeePersonalInfoForm').on('submit', function (e) {
            e.preventDefault();
            $('#spinner').show();
            let formData = $(this).serialize();
           
            $.ajax({
              url: '{{route("employee.personal.info.store")}}', // Dynamic URL using the email
                method: 'POST',
                data: formData,
                success: function (response) {
                    $('#employeePersonalInfo').modal('hide');
                    
                    // Change the URL after saving personal info
                    // window.history.pushState({}, '', '/employee/joining/' + encodeURIComponent(email));

                    $('#employeeJoiningInfo').modal('show'); // Show joining info modal
                },
                error: function (error) {
                    console.log(error);
                },
                complete: function() {
                // Hide the spinner after the AJAX request completes
                $('#spinner').hide();
            }
            });
        });

        // Handle the submission of the joining info form
        $('#employeeJoiningInfoForm').on('submit', function (e) {
          e.preventDefault();
          $('#spinner').show();
            let formData = $(this).serialize();
           
            $.ajax({
              url: '{{route("employee.joining.info.store")}}', // Dynamic URL using the email
                method: 'POST',
                data: formData,
                success: function (response) {
                    $('#employeeJoiningInfo').modal('hide');
                    
                    // Change the URL after saving personal info
                    // window.history.pushState({}, '', '/employee/joining/' + encodeURIComponent(email));

                    $('#employeePositionInfo').modal('show'); // Show joining info modal
                },
                error: function (error) {
                    console.log(error);
                },
                complete: function() {
                // Hide the spinner after the AJAX request completes
                $('#spinner').hide();
            }
            });
        });

        // Position
        $('#employeePositoinForm').on('submit', function (e) {
          e.preventDefault();
          $('#spinner').show();
            let formData = $(this).serialize();
           
            $.ajax({
              url: '{{route("employee.position.info.store")}}', // Dynamic URL using the email
                method: 'POST',
                data: formData,
                success: function (response) {
                    $('#employeePositionInfo').modal('hide');
                    
                    // Change the URL after saving personal info
                    // window.history.pushState({}, '', '/employee/joining/' + encodeURIComponent(email));

                    $('#employeeAddressInfo').modal('show'); // Show joining info modal
                },
                error: function (error) {
                    console.log(error);
                },
                complete: function() {
                // Hide the spinner after the AJAX request completes
                $('#spinner').hide();
            }
            });
        });
        // end
        // Address
        $('#employeePresentAddressForm').on('submit', function (e) {
          e.preventDefault();
            // alert('ok');
            let formData = $(this).serialize();
           
            $.ajax({
              url: '{{route("employee.address.info.store")}}', // Dynamic URL using the email
                method: 'POST',
                data: formData,
                success: function (response) {
                    $('#employeeAddressInfo').modal('hide');
                    
                    Swal.fire({
                        icon: 'success',
                        title: 'Inserted Successfully',
                     })
                     // Redirect after 3 seconds
                     setTimeout(function() {
                            window.location.href = '/admin/employee/info/profile'; // Redirect to home page
                        }, 3000);
                },
                error: function (error) {
                    console.log(error);
                }
            });
        });
        // end
    });
</script>

  @endsection