

<!-- JS code -->
<script>
    // Function to switch between menus
    // Function to switch between menus
    function setActiveMenu(menu) {
        const introMenu = document.getElementById("introMenu");
        const employeeMenu = document.getElementById("employeeMenu");

        if (menu === "intro") {
            introMenu.style.display = "block";
            employeeMenu.style.display = "none";
        } else if (menu === "employeeMenu") {
            introMenu.style.display = "none";
            employeeMenu.style.display = "block";
        }
    }

    // Function to toggle dropdown visibility
    function toggleDropdown(menu) {
        const dropdown = document.getElementById(menu + "Dropdown");
        const dropdownIcon = document.getElementById(menu + "DropdownIcon");

        // Toggle visibility of the dropdown
        if (dropdown.style.display === "none" || dropdown.style.display === "") {
            dropdown.style.display = "block";
            dropdown.classList.add("expanded");
            dropdownIcon.classList.add("open");
        } else {
            dropdown.style.display = "none";
            dropdown.classList.remove("expanded");
            dropdownIcon.classList.remove("open");
        }
    }

</script>
 
 {{-- <script src="{{asset('admin/assets/js/custom.js')}}"></script> --}}
 @include('admin.employee.ajax.emp_info')
 @include('admin.employee.ajax.emp_personal_info')
 @include('admin.employee.ajax.emp_joining_info')
 @include('admin.employee.ajax.emp_present_address')
 @include('admin.employee.ajax.emp_current_posiotion')
 <script>
  $(document).ready(function() {
      $('#items-table').DataTable();
  });
</script>

</body>

<!-- Mirrored from preview.tabler.io/layout-fluid-vertical.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 16 Oct 2024 10:17:49 GMT -->
</html>