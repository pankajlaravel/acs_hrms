
 <!-- Libs JS -->
 {{-- <script>
  var employeeListRoute = "{{ route('admin.employee.list') }}";
  var ajaxSearch = '{{ route("employees.ajaxSearch") }}'
</script>
 <script src="{{asset('admin/assets/js/custom.js')}}"></script> --}}
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
 <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
 <script src=
    "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
 <script src="{{asset('admin/dist/libs/apexcharts/dist/apexcharts.min159a.js?1726507346')}}" defer></script>
 <script src="{{asset('admin/dist/libs/jsvectormap/dist/jsvectormap.min159a.js?1726507346')}}" defer></script>
 <script src="{{asset('admin/dist/libs/jsvectormap/dist/maps/world159a.js?1726507346')}}" defer></script>
 <script src="{{asset('admin/dist/libs/jsvectormap/dist/maps/world-merc159a.js?1726507346')}}" defer></script>
 <!-- Tabler Core -->
 <script src="{{asset('admin/dist/js/tabler.min159a.js?1726507346')}}" defer></script>
 <script src="{{asset('admin/dist/js/demo.min159a.js?1726507346')}}" defer></script>
 <script src="{{asset('admin/assets/js/bootstrap.min.js')}}"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/js/select2.min.js"></script>
 
 
 {{-- <script src="{{asset('admin/assets/js/custom.js')}}"></script> --}}
 
 <script>
  $(document).ready(function() {
      $('#items-table').DataTable();
  });
</script>
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
<script>
  const handleScroll = (direction) => {
    const container = document.getElementById("carousel-1");
    const scrollAmount = 175;

    if (container) {
      const newScrollPosition =
        direction === "next"
          ? container.scrollLeft + scrollAmount
          : container.scrollLeft - scrollAmount;

      container.scrollTo({
        left: newScrollPosition,
        behavior: "smooth",
      });
    }
  };
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