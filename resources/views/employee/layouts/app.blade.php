@include('employee.layouts.header')
<!-- Main Wrapper -->
<div class="main-wrapper">
<!-- navbar -->
@include('employee.layouts.nav_bar')
<!-- /navbar -->
<!-- Sidebar -->
@include('employee.layouts.side_bar')      
<!-- /Sidebar -->
<!-- Page Wrapper -->
<main>
@yield('content')
</main>
<!-- /Page Wrapper -->
@yield('script')
<!--  Footer -->
@include('employee.layouts.footer')
<!-- /Footer -->  