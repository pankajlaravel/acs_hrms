@include('theme.admin.layouts.header')
<!-- Main Wrapper -->
<div class="page">
@include('theme.admin.layouts.side_bar')      
<!-- /Sidebar -->
<!-- Page Wrapper -->

@yield('content')

<!-- /Page Wrapper -->
 
<!--  Footer -->
@include('theme.admin.layouts.footer')
<!-- /Footer -->  