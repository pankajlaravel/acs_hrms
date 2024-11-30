@include('admin.layouts.header')
<!-- Main Wrapper -->
<div class="page">
@include('admin.layouts.side_bar')      
<!-- /Sidebar -->
<!-- Page Wrapper -->

@yield('content')

<!-- /Page Wrapper -->
@yield('script')
<!--  Footer -->

@include('admin.layouts.footer')
<!-- /Footer -->  