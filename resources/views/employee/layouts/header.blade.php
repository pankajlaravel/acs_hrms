<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
      <meta name="description" content="Smarthr - Bootstrap Admin Template">
      <meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
      <meta name="author" content="Dreamguys - Bootstrap Admin Template">
      <meta name="robots" content="noindex, nofollow">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <title>@yield('title', 'ACS')</title>
      <!-- Favicon -->
      <link rel="shortcut icon" type="image/x-icon" href="{{asset('logo/img/'.$webDetails->favicon)}}">
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="{{asset('admin/assets/css/bootstrap.min.css')}}">
      <!-- Fontawesome CSS -->
      <link rel="stylesheet" href="{{asset('admin/assets/css/font-awesome.min.css')}}">
      <!-- Lineawesome CSS -->
      <link rel="stylesheet" href="{{asset('admin/assets/css/line-awesome.min.css')}}">
      <!-- Chart CSS -->
      <link rel="stylesheet" href="{{asset('admin/assets/plugins/morris/morris.css')}}">
      <!-- Select2 CSS -->
      <link rel="stylesheet" href="{{asset('admin/assets/css/select2.min.css')}}">
      <!-- Datetimepicker CSS -->
      <link rel="stylesheet" href="{{asset('admin/assets/css/bootstrap-datetimepicker.min.css')}}">
      <!-- Main CSS -->
      <link rel="stylesheet" href="{{asset('admin/assets/css/style.css')}}">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
      <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
      <!-- Toastr CSS -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
      <!-- Flatpickr JS from CDN -->
      <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      {{-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY"></script> --}}
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   </head>
   <body>