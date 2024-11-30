@include('admin.layouts.header')
<!-- Main Wrapper -->
<div class="main-wrapper">
<!-- navbar -->
@include('admin.layouts.nav_bar')
<!-- /navbar -->
<!-- Sidebar -->
@include('admin.layouts.side_bar')      
<!-- /Sidebar -->
<!-- Page Wrapper -->
<main>
@yield('content')
</main>
<!-- /Page Wrapper -->
 @yield('script')
<!--  Footer -->
@include('admin.layouts.footer')
<!-- /Footer -->  