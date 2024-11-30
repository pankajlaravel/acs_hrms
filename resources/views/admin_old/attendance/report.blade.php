@extends('admin.layouts.app')
@section('title', 'Dashboard - HRMS Admin')
@section('content')
<div class="page-wrapper">
<!-- Page header -->
<div class="content container-fluid">
   <div class="page-header">
      <div class="container-xl">
         <div class="row g-2 align-items-center">
            <!-- Page title actions -->
            {{-- Search --}}
          <div class="col-12">
            <div class="row row-cards">
              <div class="col-12">
                <div class="card" >
                  <div class="card-body">
                    <h3 class="card-title">Start searching to see specific employee details here</h3>
                    <div class="row row-cards">
                      <div class="col-md-5">
                        <form id="search-attendance-report" method="GET" >
                          @csrf
                        <div class="mb-3">
                          <p>Search Employee</p>
                          <div class="input-group">
                            <span class="input-group-text" id="basic-addon1" style="border-radius: 50px 0px 0px 50px">
                              <i class="fa fa-user" ></i> <!-- Bootstrap user icon -->
                            </span>
                            <input required type="search" id="search"  class="form-control custom-radius" placeholder="Search by Emp No/ Name"  />
                            <input  type="hidden" id="search_id" name="query" class="form-control custom-radius" placeholder="Search by Emp No/ Name"  />
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
         </div>
      </div>
   </div>
   <!-- Page body -->
   <div class="page-body" >
      <div id="calendar" style="display: none"></div>
   </div>
</div>
@endsection
@section('script')
<script>
   document.addEventListener('DOMContentLoaded', function () {
       var calendarEl = document.getElementById('calendar');
   
       var calendar = new FullCalendar.Calendar(calendarEl, {
           initialView: 'dayGridMonth',
           initialDate: '{{ $year }}-{{ str_pad(now()->month, 2, '0', STR_PAD_LEFT) }}-01',
           events: [
               @foreach($attendances as $attendance)
               {
                   title: '{{ $attendance['status'] }}',
                   start: '{{ $attendance['created_at'] }}',
                   color: '{{ $attendance['status'] === "Present" ? "#28a745" : "#dc3545" }}', // Green for Present, Red for Absent
               },
               @endforeach
           ]
       });
   
       calendar.render();
   });
</script>
<script>
  $(document).ready(function() {
      
  // search submit
  $('#search-attendance-report').on('submit', function(e) {
    // alert('ok');
    $('#spinner').show();
    $('#calendar').show();
    $('.open-form').hide();
    $('#original').show();
    $('#search-results').show();
          e.preventDefault(); // Prevent default form submission
          $.ajax({
              url: '{{ route("employee.attendance.report") }}', // Ensure this is the correct route
              method: 'GET',
              data: $(this).serialize(), // Serialize form data for submission
              success: function(data) {
                  let resultsHtml = '';

                  if (data.length > 0) {
                      $('.original').hide(); // Hide original content 
                      $.each(data, function(index, employee) {
                          resultsHtml += `<tr>
                           <td class="sort-name">${employee.name || "--"}</td>  
                           <td class="sort-name">${employee.relation || "--"}</td>  
                           <td class="sort-name">${employee.dob || "--"}</td>  
                           <td class="sort-name">${employee.age || "--"}</td>  
                           <td class="sort-name">${employee.blood_group || "--"}</td>  
                           <td class="sort-name">${employee.gender || "--"}</td>  
                           <td class="sort-name">${employee.nationality || "--"}</td>  
                           <td class="sort-name">${employee.profession || "--"}</td>  
                           <td class="sort-name">${employee.remarks || "--"}</td>  
                      </tr> `;
                      });
                  } else {
                      $('.original').hide();
                      resultsHtml += ` `;
                  }
                  
                  $('#search-results').html(resultsHtml);
              },
              error: function(xhr) {
                  console.log(xhr.responseText);
                  alert('An error occurred. Please try again.');
              },
              complete: function() {
              // Hide the spinner after the AJAX request completes
              $('#spinner').hide();
          }
          });
      });
  });
  </script>
@endsection