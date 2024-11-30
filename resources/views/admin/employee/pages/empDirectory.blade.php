@extends('admin.layouts.app')

@section('title', 'Dashboard - HRMS Admin')

@section('content')
<div class="content">
    <div class="employee-details">
        <div id="error-messages"></div>
        <div id="no-data-message" style="display: none;">
            <div class="alert alert-warning">No data found for the selected date range.</div>
        </div>
        <form id="filter-form" method="GET" class="row g-3">
            @csrf
            <!-- Employee Status -->
            <div class="col-md-3">
                <label for="employee" class="form-label">Employee Status</label>
                <select class="form-control" id="employee" name="employee" onchange="filterEmployees()">
                    <option value="">All</option>
                    <option value="Probation">Probation</option>
                    <option value="Confirmed">Confirmed</option>
                    <option value="Consultant">Consultant</option>
                </select>
                
            </div>
           
        </form>
       
    </div> 
    <div class="employee-details">
        <!-- Left Container: Table -->
        <div class="table-wrapper-unique">
            <div class="main-header-unique">
                {{-- <h2>All Employee Info</h2> --}}
                {{-- <button>Add Employee</button> --}}
            </div>

           

            <!-- Table -->
            <div class="table-body-unique">
                <table id="employeeTable">
                    <thead>
                        <tr>
                            <th>Emp ID</th>
                            <th>Emp Name</th>
                            <th>Join Date</th>
                            <th>Status</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Extension Number</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div> 
</div>   

@endsection

@section('script') 
<script>
    function filterEmployees() {
        // Get the selected employee status
        let selectedStatus = $('#employee').val();

        // AJAX request to fetch filtered data based on employee status
        $.ajax({
            url: "{{ route('employee.all.info.get') }}",
            type: "GET",
            data: {
                status: selectedStatus
            },
            success: function(response) {
                let employees = response.filter_data;
                let tableBody = $('#employeeTable tbody');

                // Clear the table body
                tableBody.empty();

                if (employees.length > 0) {
                    // Loop through each employee and create a row
                    employees.forEach(employee => {
                        let row = `<tr>
                            <td>${employee.employee_id}</td>
                            <td>${employee.firstName}</td>
                            <td>${employee.joining_Date}</td>
                            <td>${employee.joining_status}</td>
                            <td>${employee.phone}</td>
                            <td>${employee.email}</td>
                            <td>${employee.extension}</td>
                        </tr>`;
                        tableBody.append(row);
                    });
                    $('#no-data-message').hide();
                } else {
                    $('#no-data-message').show();
                }
            },
            error: function() {
                console.error("Failed to fetch employee data.");
            }
        });
    }

    // Initial load of employee data
    $(document).ready(function () {
        filterEmployees();
    });
</script>

<script>
    $('#export-btn').click(function () {
        let status = $('#employee').val();  // Get the selected status
        let url = "{{ route('employees.export') }}?status=" + status;
        window.location.href = url;  // Redirect to export route with the status
    });
</script>
@endsection
