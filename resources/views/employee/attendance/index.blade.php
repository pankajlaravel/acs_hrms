@extends('employee.layouts.app')

@section('title', 'Dashboard - HRMS Admin')

@section('content')

<div class="page-wrapper">
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="text-center card">
                <div class="card-header">
                    {{-- Check-In --}}
                </div>
                <div class="card-body">
                    <h5 class="card-title">Office Location</h5>
                    {{-- <p class="card-text">You can check in to log your attendance once you are within the office premises.</p> --}}
                    {{-- <button id="checkInBtn" class="btn btn-primary">Check-In</button> --}}
                    @if ($attendance && !$attendance->check_out)
                <!-- If the employee is checked in, show the Check Out button -->
                <form id="checkOutForm">
                    <button class="mt-2 btn btn-danger" type="button" id="checkOutButton">Check Out</button>
                </form>
                @else
                <!-- If the employee is not checked in, show the Check In button -->
                <form id="checkInForm">
                    {{-- <button class="mt-2 btn btn-success" type="button" id="checkInButton">Check In</button> --}}
                    <button class="mt-2 btn btn-success" type="button" id="check-in-btn">Check In</button>
                </form>
                @endif
                </div>
                <div class="card-footer text-muted">
                    {{-- Last check-in: <span id="lastCheckIn">Not yet</span> --}}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')
<script>
    $(document).ready(function() {
        
        $('#check-in-btn').on('click', function() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                const latitude = position.coords.latitude;
                const longitude = position.coords.longitude;
                console.log(latitude+' '+longitude);
                $.ajax({
                    url: '/check-in',
                    method: 'POST',
                    data: {
                        latitude: latitude,
                        longitude: longitude,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        // alert(response.address);
                        if (response.message === 'Attendance updated successfully.') {
                            // Show success notification
                            toastr.success(response.message, 'Check-in Successful', {
                                timeOut: 3000, // Duration of toast (in milliseconds)
                                progressBar: true,
                                positionClass: "toast-top-right",
                            });

                            // Redirect after 3 seconds
                            setTimeout(function() {
                                window.location.href = '/attendance';
                            }, 3000); 
                        } else {
                            // Show error notification in red for being outside radius
                            toastr.error(response.message, 'Error', {
                                timeOut: 3000,
                                progressBar: true,
                                positionClass: "toast-top-right",
                            });
                            setTimeout(function() {
                                window.location.href = '/attendance';
                            }, 3000); 
                        }
                    },
                    error: function(xhr, status, error) {
                        // Display error notification
                        toastr.error('An error occurred during check-in. Please try again.', 'Error', {
                            timeOut: 3000,
                            progressBar: true,
                            positionClass: "toast-top-right",
                        });
                    }
                });
            });
        } else {
            toastr.error('Geolocation is not supported by your browser.', 'Error', {
                timeOut: 3000,
                progressBar: true,
                positionClass: "toast-top-right",
            });
        }
    });
    
        $('#checkOutButton').click(function() {
            $.ajax({
                url: '/check-out',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}' // CSRF token for Laravel
                },
                success: function(response) {
                    // alert(response.message);
                    if (response.message === 'Checked out successfully!') {
                            // Show success notification
                            toastr.success(response.message, 'Check-Out Successful', {
                                timeOut: 3000, // Duration of toast (in milliseconds)
                                progressBar: true,
                                positionClass: "toast-top-right",
                            });

                            // Redirect after 3 seconds
                            setTimeout(function() {
                                window.location.href = '/attendance';
                            }, 3000); 
                        } else {
                            // Show error notification in red for being outside radius
                            toastr.error(response.message, 'Error', {
                                timeOut: 3000,
                                progressBar: true,
                                positionClass: "toast-top-right",
                            });
                        }
                },
                error: function(xhr,status) {
                    ctoastr.error('An error occurred during check-out. Please try again.', 'Error', {
                            timeOut: 3000,
                            progressBar: true,
                            positionClass: "toast-top-right",
                        });
                }
            });
        });
    });
    </script>


@endsection

         
      