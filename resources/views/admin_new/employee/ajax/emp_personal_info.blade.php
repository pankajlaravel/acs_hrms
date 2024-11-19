<script>
    $(document).ready(function()  {
  $.ajaxSetup({
  headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
// alert('employeeId');
$(document).on('click', '.editPersonalInfo', function() {
  const employeeId = $(this).data('id');
  alert(employeeId);
  $.get('/admin/employee/edit/' + employeeId, function (data) {
          $('.employeeId').val(data.id);
          $('#dob').val(data.dob);
          $('#birth_day').val(data.birth_day);
          $('#blood_group').val(data.blood_group);
          $('#father_name').val(data.father_name);
          $('#marital_status').val(data.marital_status);
          $('#marital_date').val(data.marital_date);
          $('#spouse_name').val(data.spouse_name);
          $('#nationality').val(data.nationality);
          $('#residential_status').val(data.residential_status);
          $('#place_of_birth').val(data.place_of_birth);
          $('#country_of_origin').val(data.country_of_origin);
          $('#religion').val(data.religion);
          $('#physically_challened').val(data.physically_challened);
          $('#is_director').val(data.is_director);
          $('#personal_email').val(data.personal_email);
       

      });
});

$('#employeePersonalInfoEditForm').on('submit', function (e) {
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
          $('#editPersonalInfo').modal('hide');
          Swal.fire({
              icon: 'success',
              title: 'Record updated successfully',
          });

          // Reset the form after the update
          $('#employeePersonalInfoEditForm')[0].reset();
          
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