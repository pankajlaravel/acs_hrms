@extends('admin.layouts.app')

@section('title', 'Dashboard - HRMS Admin')

@section('content')
<div class="content">
    <div class="grid-container">
        <!-- Card 1 -->
        <div class="card">
          <div class="card-header">
            <span>Employees Head Count</span>
    
          </div>
          <canvas id="headCountChart" width="400" height="200"></canvas>
         
        </div>
    
        <!-- Card 2 -->
        <div class="card">
          <div class="card-header">
            <span>Upcoming Birthdays for a week</span>
          </div>
          @foreach ($upcomingBirthdays as $val)
          <div class="list-item">
            <div style="display: flex; align-items: center;">
              <div class="avatar">
                @if ($val['photo_url'])
                <img src="{{$val['photo_url']}}" alt="">
                @else    
                <i class="fas fa-user"></i> <!-- Font Awesome user icon -->
                @endif
              </div>
              <div>
                <small>{{$val['name']}}</small> <br>
                <small>({{$val['employee_id']}})</small>
              </div>
            </div>
            <div class="time-text">{{$val['birthday']}}</div>
          </div>
          @endforeach 
        </div>
    
   
        <!-- Card 5 -->
        <div class="card">
          <div class="card-header">
            <span>New Joiners for Last 1 Month</span>
          </div>
          @foreach ($data as $val)
          <div class="list-item">
            <div style="display: flex; align-items: center;">
              <div class="avatar">
                @if ($val['photo_url'])
                <img src="{{$val['photo_url']}}" alt="">
                @else    
                <i class="fas fa-user"></i> <!-- Font Awesome user icon -->
                @endif
              </div>
              <div>
                <small>{{$val['name']}}</small> <br>
                <small>({{$val['employee_id']}})</small>
              </div>
            </div>
            <div class="time-text">{{$val['joined_ago']}}</div>
          </div>
          @endforeach 
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
      