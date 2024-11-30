
@extends('admin.layouts.app')

@section('title', 'Dashboard - HRMS Admin')

@section('content')
<div class="content">
  <div class="main-header-unique">
    <button data-bs-toggle="modal" data-bs-target="#basic_info">Add Employee</button>
</div>
  <div class="col-auto ms-auto d-print-none">
    
  </div>
  <div class="employee-search-container">
    
      <div class="employee-search-content">
        <h4>Start searching to see specific employee details here</h4>
        <div class="employee-type-container">

        </div>
        <form id="search-form" method="post" >
          @csrf
        <div class="employee-search-bar">
          
          <div class="search-icon">
            <i class="fa fa-user"></i>
          </div>
        
          @if ($query)
          <input required type="search" id="search"  class="search-input" placeholder="Search by Emp No/ Name" value="{{$results->firstName.' '.$results->lastName}}"  />
          <input  type="hidden" id="search_id" name="query" class="search-input" placeholder="Search by Emp No/ Name" value="{{$query}}" />
          @else
          <input required type="search" id="search"  class="search-input" placeholder="Search by Emp No/ Name"  />
          <input  type="hidden" id="search_id" name="query" class="search-input" placeholder="Search by Emp No/ Name" />
          @endif
          <button class="search-button" type="submit">
          <i class="fa fa-search"></i> 
          </button>
        </div>
      </form>
      
        <!-- Suggestions List -->
        <div class="suggestions-list" id="results" ></div>
        <div class="suggestions-list" id="suggestionsList">
          <!-- Suggestions will be dynamically populated -->
        </div>
      </div>
      <div class="employee-search-image">
        <img src="{{asset('admin/assets/img/emp-search.png')}}" alt="Search Illustration" />
      </div>
    </div>
    <div id="search-results" style="display: none;">
          
    </div>
<!-- Header Section -->
<div id="empDetailInfo" style="display: none">

  @include('admin.employee.empDetails')
</div>
</div>
@include('admin.employee.ajax.emp_info')
@include('admin.employee.add_popup')
  @endsection
  @section('script')
  
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