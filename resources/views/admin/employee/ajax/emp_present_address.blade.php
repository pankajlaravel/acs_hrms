<script>
    $(document).ready(function()  {
  $.ajaxSetup({
  headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
// alert('employeeId');
$(document).on('click', '.editPresentInfo', function() {
  const employeeId = $(this).data('id');
  $('#empAddress').show();
  $('#empAddressDetails').hide();
//   alert(employeeId);
  $.get('/admin/employee/edit/' + employeeId, function (data) {
          $('.employeeId').val(data.id);
          $('.address').val(data.address);
          $('.city').val(data.city);
          $('.state').val(data.state);
          $('.country').val(data.country);
          $('.pin').val(data.pin);
          $('.phone1').val(data.phone1);
          $('.phone2').val(data.phone2);
          $('.extension').val(data.extension);
          $('.fax').val(data.fax);
          $('.phone').val(data.phone);
          $('.personal_email ').val(data.personal_email );
          
       

      });
});

$('#employeePresentAddressEditForm').on('submit', function (e) {
  e.preventDefault(); // Prevent the default form submission behavior
  
  const formData = new FormData(this);
  const userId = $('.employeeId').val();
//   alert(userId)
  $(".updating").text('Updating...'); // Indicate updating process
  
  $.ajax({
      url: `/admin/employee/${userId}/update`, // Ensure the correct URL is set
      type: 'POST',
      contentType: false,
      processData: false,
      data: formData, // FormData for file uploads or other form data
      
      success: function(response) {
          // Hide modal and show success alert
          $('#empAddress').hide();
          $('#empAddressDetails').show();
          Swal.fire({
              icon: 'success',
              title: 'Record updated successfully',
          });

          // Reset the form after the update
          $('#employeePresentAddressEditForm')[0].reset();
          
          // Update the search results area dynamically with the new data
          fetchUpdatedEmployeeList(); // Custom function to reload employee list
          
          // Clear the updating text
          $(".updating").text('Update');
      },
      error: function(xhr) {
          console.error(xhr.responseText); // Log any errors for debugging
      }
  });
});

// Function to dynamically fetch and update employee list
function fetchUpdatedEmployeeList() {

      $('#search-form').trigger('submit');
}

});
  </script>