@extends('admin.layouts.app')

@section('title', 'Dashboard - HRMS Admin')

@section('content')
<div class="page-wrapper">
            <!-- Page Content -->
            <div class="content container-fluid">
               <!-- Page Header -->
               <div class="page-header">
                  <div class="row">
                     <div class="col-sm-12">
                        <h3 class="page-title">Welcome {{ auth()->user()->firstName }}</h3>
                        <ul class="breadcrumb">
                           <li class="breadcrumb-item active">Dashboard</li>
                        </ul>
                     </div>
                  </div>
               </div>
               <!-- /Page Header -->
               <div class="mt-2 row">

                  {{-- Project Graph --}}
                  <div class="mt-3 col-6">
                     <div class="card dash-widget">
                        <div class="card-body">
                           <span class="dash-widget-icon"><i class="fa fa-cubes"></i></span>
                           <div class="dash-widget-info">
                            <h2>Employees Head Count</h2>
                            <canvas id="headCountChart" width="400" height="200"></canvas>
                           </div>
                        </div>
                     </div>
                  </div>

                  <div class="mt-3 col-6">
                    <div class="card dash-widget">
                       <div class="card-body">
                          <span class="dash-widget-icon"><i class="fa fa-users"></i></span>
                          <div class="dash-widget-info">
                           <h2>New Joiners for Last 1 Month</h2>
                           @foreach ($data as $val)
                            <div class="card-body">
                                <h5 class="card-title">{{$val['name']}}</h5>
                                <p class="card-text"><strong>Employee ID:</strong>{{$val['employee_id']}}</p>
                                <p class="card-text"><strong>Joined On:</strong> {{$val['joined_ago']}}</p>
                            </div>  
                            @endforeach  
                          </div>
                       </div>
                    </div>
                 </div>    

                 <div class="mt-3 col-6">
                    <div class="card dash-widget">
                       <div class="card-body">
                          <span class="dash-widget-icon"><i class="fa fa-birthday-cake"></i></span>
                          <div class="dash-widget-info">
                           <h2>Upcoming Birthdays for a week</h2>
                           @foreach ($upcomingBirthdays as $val)
                            <div class="card-body">
                                <h5 class="card-title">{{$val['name']}}</h5>
                                <p class="card-text"><strong>Employee ID:</strong> {{$val['employee_id']}}</p>
                                <p class="card-text"><strong>DOB:</strong> {{$val['birthday']}}</p>
                            </div>  
                            @endforeach  
                          </div>
                       </div>
                    </div>
                 </div>  
            </div>
          
        
@endsection
@section('script') 
<script>
    $(document).ready(function () {
        // AJAX request to get employee headcount by month
        $.ajax({
            url: "{{ route('employee.headcount.monthly') }}",  // URL for the controller method
            type: "GET",
            success: function (response) {
                let months = response.months;  // Month names from the server (e.g., '2024-01')
                let counts = response.counts;  // Employee counts per month

                // Initialize Chart.js
                let ctx = document.getElementById('headCountChart').getContext('2d');
                let headCountChart = new Chart(ctx, {
                    type: 'bar', // Type of chart
                    data: {
                        labels: months,  // X-axis labels (month-year, e.g., 'January 2024')
                        datasets: [{
                            label: 'Employee Head Count',
                            data: counts,  // Data for the Y-axis (number of employees per month)
                            backgroundColor: 'rgba(54, 162, 235, 0.6)',  // Bar color
                            borderColor: 'rgba(54, 162, 235, 1)',  // Border color
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true,
                                title: {
                                    display: true,
                                    text: 'Number of Employees'
                                }
                            }
                        }
                    }
                });
            },
            error: function () {
                console.error("Failed to fetch employee headcount data.");
            }
        });
    });
</script>

@endsection      
      