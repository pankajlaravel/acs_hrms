@extends('employee.layouts.app')

@section('title', 'Dashboard - HRMS Admin')

@section('content')

<!-- Page Wrapper -->
<div class="page-wrapper">
			
    <!-- Page Content -->
    <div class="container mt-4 ">
        
        <div class="card col-12"  style="height: auto;">
              
            <div class="py-2 card-header">
                <h4 class="mb-0">{{ __('Update Profile') }}</h4>
            </div>
            <div class="p-3 card-body">
                <form method="post" id="userInfo" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$user->id}}">
    
                    <!-- Profile Picture -->
                    <div class="mb-2 form-group">
                        <label for="picture">{{ __('Profile Picture') }}</label>
                        <input id="picture" name="picture" type="file" class="form-control" autofocus autocomplete="picture" />
                        @error('picture')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                        <img src="{{ asset('employee/img/'.$user->picture) }}" alt="Profile" height="80px" width="90px" class="mt-2">
                    </div>
    
                    <!-- First Name -->
                    <div class="mb-2 form-group">
                        <label for="firstName">{{ __('First Name') }}</label>
                        <input id="firstName" name="firstName" type="text" class="form-control" value="{{ old('firstName', $user->firstName) }}" autofocus autocomplete="firstName">
                        @error('firstName')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
    
                    <!-- Last Name -->
                    <div class="mb-2 form-group">
                        <label for="lastName">{{ __('Last Name') }}</label>
                        <input id="lastName" name="lastName" type="text" class="form-control" value="{{ old('lastName', $user->lastName) }}" autofocus autocomplete="lastName">
                        @error('lastName')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
    
                    <!-- Username -->
                    <div class="mb-2 form-group">
                        <label for="username">{{ __('User Name') }}</label>
                        <input id="username" name="username" type="text" class="form-control" value="{{ old('username', $user->username) }}" autofocus autocomplete="username">
                        @error('username')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
    
                    <!-- Email -->
                    <div class="mb-2 form-group">
                        <label for="email">{{ __('Email') }}</label>
                        <input id="email" name="email" type="email" class="form-control" value="{{ old('email', $user->email) }}" required autocomplete="email">
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
    
                    <!-- Phone -->
                    <div class="mb-2 form-group">
                        <label for="phone">{{ __('Phone') }}</label>
                        <input id="phone" name="phone" type="text" class="form-control" value="{{ old('phone', $user->phone) }}" autofocus autocomplete="phone">
                        @error('phone')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
    
                    <!-- Department -->
                    <div class="mb-2 form-group">
                        <label for="department">{{ __('Department') }}</label>
                        <select id="department" name="department" class="form-control">
                            <option value="">{{ __('Select Department') }}</option>
                            @foreach ($department as $val)
                                <option value="{{ $val->id }}" {{ old('department', $user->department) == $val->id ? 'selected' : '' }}>{{ $val->name }}</option>
                            @endforeach
                        </select>
                        @error('department')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
    
                    <!-- Designation -->
                    <div class="mb-2 form-group">
                        <label for="designation">{{ __('Designation') }}</label>
                        <select id="designation" name="position" class="form-control">
                            <option value="">{{ __('Select Designation') }}</option>
                            @foreach ($designation as $val)
                                <option value="{{ $val->id }}" {{ old('position', $user->position) == $val->id ? 'selected' : '' }}>{{ $val->name }}</option>
                            @endforeach
                        </select>
                        @error('designation')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    
                    <!-- Address -->
                    <div class="mb-2 form-group">
                        <label for="address">{{ __('Address') }}</label>
                        <input id="address" name="address" type="text" class="form-control" value="{{$user->address}}" autofocus autocomplete="address">
                        @error('address')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror   
                    </div>
                    <!-- Joining Date -->
                    <div class="mb-2 form-group">
                        <label for="joining_Date">{{ __('Joining Date') }}</label>
                        <input id="joining_Date" name="joining_Date" type="date" class="form-control" value="{{ old('joining_Date', $user->joining_Date) }}" autofocus autocomplete="joining_Date">
                        @error('joining_Date')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
    
    
                    <!-- Save Button -->
                    <div class="gap-2 mt-3 d-flex align-items-center">
                        <button type="submit" class="btn btn-primary save_data">{{ __('Save') }}</button>
    
                        @if (session('status') === 'profile-updated')
                            <p
                                x-data="{ show: true }"
                                x-show="show"
                                x-transition
                                x-init="setTimeout(() => show = false, 2000)"
                                class="text-muted"
                            >{{ __('Saved.') }}</p>
                        @endif
                    </div>
                </form>
                
                
            </div>
        </div>
    </div>
    
    
<!-- /Page Wrapper -->

@endsection
@section('script')

<script>
    $(document).ready(function() {
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});
        $('#userInfo').on('submit', function(e) {
            e.preventDefault();
            
            $(".save_data").text('Saving...');
        let isValid = true;
        $('.error').text(''); // Clear existing errors

        
            $.ajax({
                url: '{{ route("userUpdate")}}',
                type: 'POST',
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function(response) {
                    // alert(response.success);
                    // alert('success');
                     Swal.fire({
                        icon: 'success',
                        title: 'Inserted Successfully',
                     })
                     // Redirect after 3 seconds
                     setTimeout(function() {
                    }, 1000);
                    window.location.href = '/admin/web/setting'; // Redirect to home page
                  
                    $('#userInfo')[0].reset();
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
    
</script>

@endsection

         
      