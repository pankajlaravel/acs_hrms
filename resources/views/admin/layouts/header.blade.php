<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta21
* @link https://tabler.io
* Copyright 2018-2024 The Tabler Authors
* Copyright 2018-2024 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">
  
<!-- Mirrored from preview.tabler.io/layout-fluid-vertical.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 16 Oct 2024 10:16:53 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>@yield('title', 'ACS')</title>
    <script defer data-api="/stats/api/event" data-domain="preview.tabler.io" src="stats/js/script.js"></script>
    <meta name="msapplication-TileColor" content="#066fd1"/>
    <meta name="theme-color" content="#066fd1"/>
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta name="mobile-web-app-capable" content="yes"/>
    <meta name="HandheldFriendly" content="True"/>
    <meta name="MobileOptimized" content="320"/>
    <link rel="icon" href="{{asset('logo/img/'.$webDetails->favicon)}}" type="image/x-icon"/>
    <link rel="shortcut icon" href="{{asset('logo/img/'.$webDetails->favicon)}}" type="image/x-icon"/>
    <meta name="description" content="Tabler comes with tons of well-designed components and features. Start your adventure with Tabler and make your dashboard great again. For free!"/>
    <meta name="canonical" content="https://tabler.io/demo/layout-fluid-vertical.html">
    <meta name="twitter:image:src" content="https://tabler.io/demo/static/og.png">
    <meta name="twitter:site" content="@tabler_ui">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="Tabler: Premium and Open Source dashboard template with responsive and high quality UI.">
    <meta name="twitter:description" content="Tabler comes with tons of well-designed components and features. Start your adventure with Tabler and make your dashboard great again. For free!">
    <meta property="og:image" content="https://tabler.io/demo/static/og.png">
    <meta property="og:image:width" content="1280">
    <meta property="og:image:height" content="640">
    <meta property="og:site_name" content="Tabler">
    <meta property="og:type" content="object">
    <meta property="og:title" content="Tabler: Premium and Open Source dashboard template with responsive and high quality UI.">
    <meta property="og:url" content="https://tabler.io/demo/static/og.png">
    <meta property="og:description" content="Tabler comes with tons of well-designed components and features. Start your adventure with Tabler and make your dashboard great again. For free!">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- CSS files -->
    <link href="{{asset('admin/dist/css/tabler.min159a.css?1726507346')}}" rel="stylesheet"/>
    <link href="{{asset('admin/dist/css/tabler-flags.min159a.css?1726507346')}}" rel="stylesheet"/>
    <link href="{{asset('admin/dist/css/tabler-payments.min159a.css?1726507346')}}" rel="stylesheet"/>
    <link href="{{asset('admin/dist/css/tabler-vendors.min159a.css?1726507346')}}" rel="stylesheet"/>
    <link href="{{asset('admin/dist/css/demo.min159a.css?1726507346')}}" rel="stylesheet"/>
    {{-- <link rel="stylesheet" href="{{asset('admin/assets/css/bootstrap.min.css')}}"> --}}
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    {{-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY"></script> --}}
    <!-- Select2 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.4/main.min.css" rel="stylesheet">
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <style>
      @import url('../rsms.me/inter/inter.css');
      :root {
      	--tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
      }
      body {
      	font-feature-settings: "cv03", "cv04", "cv11";
      }
    </style>
    <style>
      .result-item {
          padding: 8px;
          cursor: pointer; /* Changes cursor to pointer on hover */
      }
      .result-item:hover {
          background-color: #f0f0f0; /* Optional: highlight item on hover */
      }

      #spinner {
  display: none; /* Hidden by default */
  position: fixed;
  top: 50%;
  left: 50%;
  width: 50px;
  height: 50px;
  border: 6px solid #f3f3f3;
  border-top: 6px solid #3498db;
  border-radius: 50%;
  animation: spin 1s linear infinite;
  z-index: 9999; /* Make sure it appears above other elements */
  transform: translate(-50%, -50%);
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

  </style>
  </head>
  <body  class=" layout-fluid">
    
    <div id="spinner" class="spinner-border text-primary" role="status" style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 9999;">
      <span class="sr-only">Loading...</span>
    </div>
   <script src="{{asset('admin/dist/js/demo-theme.min159a.js?1726507346')}}"></script>