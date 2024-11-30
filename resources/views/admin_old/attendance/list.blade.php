
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
          <div class="col-auto ms-auto d-print-none">
           
          </div>
        </div>
      </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
        <div class="container mt-4">
            <h4>Filter Employee Attendance</h4>
            <div id="error-messages"></div>
            <div id="no-data-message" style="display: none;">
                <div class="alert alert-warning">No data found for the selected date range.</div>
            </div>
            <form id="filter-form" method="GET" class="row g-3">
                @csrf
              <!-- From Date -->
              <div class="col-md-3">
                <label for="fromDate" class="form-label">From Date</label>
                <input type="date" class="form-control" id="from_date" name="from_date">
              </div>
          
              <!-- To Date -->
              <div class="col-md-3">
                <label for="toDate" class="form-label">To Date</label>
                <input type="date" class="form-control" id="to_date" name="to_date">
              </div>
          
              <!-- Employee (Searchable Select) -->
              <div class="col-md-3">
                <label for="employee" class="form-label">Employee</label>
                <select class="form-select" id="employee" name="employee">
                    <option value="">All</option>
                    @foreach ($get_data as $val)
                    <option value="{{$val->id}}">{{$val->firstName.' '.$val->lastName}}</option> 
                    @endforeach
                </select>
              </div>
          
              <!-- Status -->
              <div class="col-md-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-select" id="status" name="status">
                  <option value="">All</option>
                  <option value="pending">Pending</option>
                  <option value="present">Present</option>
                  <option value="absent">Absent</option>
                  
                </select>
              </div>
          
              <!-- Submit Button -->
              <div class="col-12 text-end">
                <button type="submit" class="btn btn-primary">Apply Filter</button>
              </div>
            </form>
          </div>

          <div class="container mt-4">
            <h4>Employee Attendance Calendar</h4>
            <div id="attendanceCalendar"></div>
          </div>
          
           <!-- Table to Display Filtered Results -->
    <table class="table mt-4 table-striped" id="attendance-table" style="display: none;">
        <thead>
            <tr>
                <th>Employee Name</th>
                <th>Date</th>
                <th>Check-in Time</th>
                <th>Check-out Time</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <!-- Attendance records will be populated here -->
        </tbody>
    </table>

    
          
    </div>
</div>
{{-- @include('admin.attendance.editModal') --}}
<!-- Edit Modal for Status -->

<div id="editModal" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
       <div class="modal-content">
          <div class="modal-header">
             <h5 class="modal-title">Edit Status</h5>
            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
             <form id="goalEditForm" method="PUT" >
                @csrf
                <input type="hidden" id="attendance_id" name="id">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                           <label class="col-form-label">Status</label>
                           <select class="form-select attdanceStatus" id="status" name="status">
                              {{-- <option>Active</option>
                              <option>Inactive</option> --}}
                           </select>
                        </div>
                     </div>
                </div>
                <div class="mt-3 modal-footer">
                   <button class="btn btn-primary submit-btn update">Update</button>
                </div>
             </form>
          </div>
       </div>
    </div>
 </div>
{{--  --}}
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
    $(document).ready(function() {
        $('#filter-form').on('submit', function(e) {
            e.preventDefault();
            $('#error-messages').empty();
            $('#spinner').show();
            // Get form data
        //     let fromDate = $('#from_date').val();
        // let toDate = $('#to_date').val();

        // // Check if at least one date is provided
        // if (!fromDate && !toDate) {
        //     $('#error-messages').html('<div class="alert alert-danger">At least one of From Date or To Date is required.</div>');
        //     $('#spinner').hide();  // Hide spinner when validation fails
        //     return;
        // }

        // // Check if from_date is earlier than to_date
        // let fromDateObj = fromDate ? new Date(fromDate) : null;
        // let toDateObj = toDate ? new Date(toDate) : null;
        
        // if (fromDateObj && toDateObj && fromDateObj > toDateObj) {
        //     $('#error-messages').html('<div class="alert alert-danger">From Date cannot be later than To Date.</div>');
        //     $('#spinner').hide();  // Hide spinner when validation fails
        //     return;
        // }
            // AJAX request
            $.ajax({
                url: "{{ route('attendance.filter') }}",
                method: 'POST',
                data: $(this).serialize(),
                // data: { from_date: fromDate, to_date: toDate, employee: employeeName, status:status },
                success: function(data) {
                    // Clear previous data
                    $('#attendance-table tbody').empty();
    
                    if (data.length > 0) {
                        $('#attendance-table').show();
    
                        // Loop through the data and populate the table
                        $.each(data, function(index, attendance) {
                        let employeeName = attendance.employee ? `${attendance.employee.firstName} ${attendance.employee.lastName}` : 'N/A';

                        // Format the created_at date as dd-mm-yyyy
                        let createdAt = new Date(attendance.created_at);
                        let formattedDate = `${createdAt.getDate().toString().padStart(2, '0')}-${(createdAt.getMonth() + 1).toString().padStart(2, '0')}-${createdAt.getFullYear()}`;

                        // Format check-in and check-out times
                        let checkIn = attendance.check_in ? new Date(attendance.check_in).toLocaleTimeString([], {hour: '2-digit', minute: '2-digit'}) : 'Not checked in';
                        let checkOut = attendance.check_out ? new Date(attendance.check_out).toLocaleTimeString([], {hour: '2-digit', minute: '2-digit'}) : 'Not checked out';

                        // Construct table row
                        let row = `<tr>
                            <td>${employeeName}</td>
                            <td>${formattedDate}</td>
                            <td>${checkIn}</td>
                            <td>${checkOut}</td>
                            <td>${attendance.status ? attendance.status.charAt(0).toUpperCase() + attendance.status.slice(1) : ''}</td>
                            <td>
                                <button class="btn btn-primary edit-btn" data-toggle="modal" data-target="#editModal" data-id="${attendance.id}" data-employee="${employeeName}" data-date="${formattedDate}" data-checkin="${checkIn}" data-checkout="${checkOut}" data-status="${attendance.status}">Edit</button>
                            </td>
                        </tr>`;

                        // Append the row to the table body
                        $('#attendance-table tbody').append(row);
                        $('#no-data-message').hide();
                    });

                    } else {
                        $('#attendance-table').hide();
                        $('#no-data-message').show();
                        // alert('No attendance records found for the selected date range.');
                    }
                },
                error: function(xhr) {
                    $('#spinner').hide();
                    $('#error-messages').html('<div class="alert alert-danger">An error occurred while processing your request. Please try again.</div>');
                    // alert('An error occurred while processing your request. Please try again.');
                },
                complete: function() {
                // Hide the spinner after the AJAX request completes
                $('#spinner').hide();
                }
            });
        });


        $(document).on('click', '.edit-btn', function() {
        let id = $(this).data('id');
        let status = $(this).data('status');
        alert(status);
        // Fill the edit form with the current status
        $('#edit-form #attendance_id').val(id);
        // $('#edit-form #status').val(status);
        // $('#status').val(status);

        if(status === 'pending'){
                    $('.attdanceStatus').append(`<option value="${status}" selected>${status}</option>`);
                    $('.attdanceStatus').append(`<option value="present">Present</option>`);
                }else if(status == 1){
                    $('.attdanceStatus').append(`<option value="${status}" selected>${status}</option>`);
                    $('.attdanceStatus').append(`<option value="pending">Pending</option>`);
                }
        // Show the modal or form to edit status
        // $('#editModal').modal('show');
    });

         // Handle the form submission to save the edited status
    $('#edit-form').on('submit', function(e) {
        e.preventDefault();
        
        // Show the spinner while the request is being processed
        $('#spinner').show();

        // AJAX request to save the edited status
        $.ajax({
             // Assuming you have a route to handle status updates
            method: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                // Close the modal and hide the spinner
                $('#editModal').modal('hide');
                $('#spinner').hide();
                
                // Optionally, you can reload the attendance table or update it with the new data
                alert('Attendance status updated successfully');
            },
            error: function(xhr) {
                $('#spinner').hide();
                alert('An error occurred while updating the status.');
            }
        });
    });
    });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
          var calendarEl = document.getElementById('attendanceCalendar');
      
          // Initialize FullCalendar but don't pass in events yet
          var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            headerToolbar: {
              left: 'prev,next today',
              center: 'title',
              right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            eventDisplay: 'block'
          });
      
          // Fetch attendance data from an API endpoint
          $.ajax({
            url: '/admin/attendance/data', // Change this URL to your actual endpoint
            method: 'GET',
            dataType: 'json',
            success: function(data) {
              // Assuming `data` is in the format [{ title: 'Present', start: '2024-11-01', color: '#28a745' }, ...]
              calendar.addEventSource(data); // Add events dynamically
              calendar.render();
            },
            error: function() {
              alert('Failed to load attendance data');
            }
          });
        });
      </script>
  @endsection