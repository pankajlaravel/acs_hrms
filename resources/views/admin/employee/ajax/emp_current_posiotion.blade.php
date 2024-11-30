<script>
    $(document).ready(function()  {
  $.ajaxSetup({
  headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
// alert('employeeId');
$(document).on('click', '.editPositionInfo', function() {
  const employeeId = $(this).data('id');
  $('#empCurrentPosition').show();
  $('#empPositionDetails').hide();
//   alert(employeeId);
  $.get('/admin/employee/edit/' + employeeId, function (data) {
          $('.employeeId').val(data.id);
          $('.division').val(data.division);
          $('.grade').val(data.grade);
          $('.location').val(data.location);
          $('.reporting').val(data.reporting);
          $('.role').val(data.role);
          $('.attendance_marking_option').val(data.attendance_marking_option);
          $('.department_id').val(data.department_id);
          $('.designation_id').val(data.designation_id);
          
          

      });
});

$('#employeePositionEditForm').on('submit', function (e) {
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
          $('#empCurrentPosition').hide();
          $('#empPositionDetails').show();
          Swal.fire({
              icon: 'success',
              title: 'Record updated successfully',
          });

          // Reset the form after the update
          $('#employeePositionEditForm')[0].reset();
          
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