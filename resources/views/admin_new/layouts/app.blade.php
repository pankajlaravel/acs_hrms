@include('admin.layouts.header')
@include('admin.layouts.nav_bar')      
<!-- Main Wrapper -->
<div class="container">
@include('admin.layouts.side_bar')      
<!-- /Sidebar -->
<!-- Page Wrapper -->

@yield('content')
</div>
<!-- /Page Wrapper -->
@yield('script')
<!--  Footer -->

@include('admin.layouts.footer')
<!-- /Footer -->  