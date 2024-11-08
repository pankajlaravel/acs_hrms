<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Companies</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <form id="settingForm" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{$settings->id}}">
        <input type="text" name="company_name" placeholder="Company Name" value="{{$settings->company_name}}">
        <input type="text" name="contact_person" placeholder="Contact Person" value="{{$settings->contact_person}}">
        <input type="text" name="address" placeholder="Address" value="{{$settings->address}}">
        <input type="text" name="country" placeholder="Country" value="{{$settings->country}}" >
        <input type="text" name="city" placeholder="City" value="{{$settings->city}}">
        <input type="text" name="state" placeholder="State" value="{{$settings->state}}">
        <input type="text" name="pin_code" placeholder="Pin Code" value="{{$settings->pin_code}}">
        <input type="email" name="email" placeholder="Email" value="{{$settings->email}}">
        <input type="text" name="phone" placeholder="Phone" value="{{$settings->phone}}"> 
        <input type="text" name="mobile" placeholder="Mobile" value="{{$settings->mobile}}">
        <input type="text" name="fax" placeholder="Fax" value="{{$settings->fax}}">
        <input type="text" name="url" placeholder="URL" value="{{$settings->url}}">
        <button type="submit">Add Company</button>
    </form>

    <h2>Companies List</h2>
    <ul id="companiesList"></ul>

    
</body>
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
                    alert('success');
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

</html>
