<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'ACS')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://gt-cougar-tp.cdn.greytip.com/v6.3.0-prod-4883/themes/hound/font-awesome/css/font-awesome.min.css">
    
    <link href="{{asset('admin/dist/css/tabler.min159a.css?1726507346')}}" rel="stylesheet"/>
    {{-- <link rel="stylesheet" href="https://gt-cougar-tp.cdn.greytip.com/v6.3.0-prod-4883/themes/hound/bootstrap/css/bootstrap-min.css"> --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="{{asset('admin/assets/css/bootstrap.min.css')}}">
{{-- 
<link href="{{asset('admin/dist/css/tabler-payments.min159a.css?1726507346')}}" rel="stylesheet"/>
<link href="{{asset('admin/dist/css/tabler-vendors.min159a.css?1726507346')}}" rel="stylesheet"/>
<link href="{{asset('admin/dist/css/demo.min159a.css?1726507346')}}" rel="stylesheet"/> --}}

{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> --}}
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> --}}
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
{{-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY"></script> --}}
<!-- Select2 CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/css/select2.min.css" rel="stylesheet" />
<!-- FullCalendar CSS -->
<link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.7/index.global.min.css" rel="stylesheet">
<!-- FullCalendar JS -->
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.7/index.global.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/dayjs@1.11.9/dayjs.min.js"></script>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
 <link rel="stylesheet" href="{{asset('admin/assets/css/custom.css')}}">   
 <link rel="stylesheet" href="{{asset('admin/assets/css/customTable.css')}}">
</head>
  <body>
{{--     
    <div id="spinner" class="spinner-border text-primary" role="status" style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 9999;">
      <span class="sr-only">Loading...</span>
    </div>
   <script src="{{asset('admin/dist/js/demo-theme.min159a.js?1726507346')}}"></script> --}}