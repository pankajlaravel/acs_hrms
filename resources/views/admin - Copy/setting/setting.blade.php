@extends('admin.layouts.app')

@section('title', 'Dashboard - HRMS Admin')

@section('content')

<div class="page-wrapper">
			
    <!-- Page Content -->
    <div class="content container-fluid">
        <div class="row">
            <div class="col-md-8 offset-md-2">
            
                <!-- Page Header -->
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">Company Settings</h3>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->
                
                <form id="settingForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$settings->id}}">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label mt-2">Company Name <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="company_name" value="{{$settings->company_name}}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label mt-2">Contact Person</label>
                                <input class="form-control" name="contact_person"value="{{$settings->contact_person}}" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label mt-2">Address</label>
                                <input class="form-control" name="address" value="{{$settings->address}}" type="text">
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-3">
                            <div class="form-group">
                                <label class="form-label mt-2">Country</label>
                                <input class="form-control" name="country" value="{{$settings->country}}" type="text">
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-3">
                            <div class="form-group">
                                <label class="form-label mt-2">City</label>
                                <input class="form-control" name="city" value="{{$settings->city}}" type="text">
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-3">
                            <div class="form-group">
                                <label class="form-label mt-2">State/Province</label>
                                <input class="form-control" name="state" value="{{$settings->state}}" type="text">
                               
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-3">
                            <div class="form-group">
                                <label class="form-label mt-2">Postal Code</label>
                                <input class="form-control" name="pin_code" value="{{$settings->pin_code}}" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label mt-2">Email</label>
                                <input class="form-control" name="email" value="{{$settings->email}}" type="email">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label mt-2">Phone Number</label>
                                <input class="form-control" name="phone" value="{{$settings->phone}}" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label mt-2">Mobile Number</label>
                                <input class="form-control" name="mobile" value="{{$settings->mobile}}" type="text">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label mt-2">Fax</label>
                                <input class="form-control" name="fax" value="{{$settings->fax}}" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label mt-2">Website Url</label>
                                <input class="form-control" name="url" value="{{$settings->url}}" type="text">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                               <label class="col-form-label">Favicon</label>
                               <input class="form-control" value="{{$settings->favicon}}" name="favicon" type="file" >
                               <span class="error text-danger" id="pictureError"></span>
                               @if (!empty($settings->favicon))
                               <img id="" src="{{asset('logo/img/'.$settings->favicon)}}" alt="User Image" class="img-fluid"  height="80px" width="100px">
                               @endif
                            </div>
                         </div>

                         <div class="col-md-6">
                            <div class="form-group">
                               <label class="col-form-label">Logo</label>
                               <input class="form-control" value="{{$settings->logo}}"  name="logo" type="file" >
                               <span class="error text-danger" id="pictureError"></span>
                               @if (!empty($settings->logo))
                               <img id="" src="{{asset('logo/img/'.$settings->logo)}}" alt="User Image" class="img-fluid"  height="80px" width="100px">
                                   
                               @endif
                            </div>
                         </div>
                    </div>
                    
                    <div class="modal-footer mt-3">
                        <button class="btn btn-primary submit-btn save_btn" type="submit">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /Page Content -->
    
</div>

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
        $('#settingForm').on('submit', function(e) {
            e.preventDefault();
            
            $(".save_btn").text('Saving...');
        let isValid = true;
        $('.error').text(''); // Clear existing errors

        
        
        
            $.ajax({
                url: '{{ route("setting.web")}}',
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
                  
                    $('#settingForm')[0].reset();
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

         
      