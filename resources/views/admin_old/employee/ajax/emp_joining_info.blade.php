<script>
    $(document).ready(function()  {
  $.ajaxSetup({
  headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
// alert('employeeId');
$(document).on('click', '.editJoiningInfo', function() {
  const employeeId = $(this).data('id');
//   alert(employeeId);
  $.get('/admin/employee/edit/' + employeeId, function (data) {
          $('.employeeId').val(data.id);
          $('#joining_Date').val(data.joining_Date);
          $('#join_confrimation_date').val(data.join_confrimation_date);
          $('#joining_status').val(data.joining_status);
          $('#probation_period').val(data.probation_period);
          $('#notice_period').val(data.notice_period);
          $('#current_company_experience').val(data.current_company_experience);
          $('#pre_company_experiecne').val(data.pre_company_experiecne);
          $('#total_experience').val(data.total_experience);
          $('#referred_by').val(data.referred_by);
          
       

      });
});

$('#employeeJoiningInfoEditForm').on('submit', function (e) {
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
          $('#editJoiningInfo').modal('hide');
          Swal.fire({
              icon: 'success',
              title: 'Record updated successfully',
          });

          // Reset the form after the update
          $('#employeeJoiningInfoEditForm')[0].reset();
          
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