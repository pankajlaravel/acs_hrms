<footer class="footer footer-transparent d-print-none">
  <div class="container-xl">
    <div class="flex-row-reverse text-center row align-items-center">
      {{-- <div class="col-lg-auto ms-lg-auto">
        <ul class="mb-0 list-inline list-inline-dots">
          <li class="list-inline-item"><a href="https://tabler.io/docs" target="_blank" class="link-secondary" rel="noopener">Documentation</a></li>
          <li class="list-inline-item"><a href="license.html" class="link-secondary">License</a></li>
          <li class="list-inline-item"><a href="https://github.com/tabler/tabler" target="_blank" class="link-secondary" rel="noopener">Source code</a></li>
          <li class="list-inline-item">
            <a href="https://github.com/sponsors/codecalm" target="_blank" class="link-secondary" rel="noopener">
              <!-- Download SVG icon from http://tabler-icons.io/i/heart -->
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon text-pink icon-filled icon-inline"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" /></svg>
              Sponsor
            </a>
          </li>
        </ul>
      </div> --}}
      <div class="mt-3 col-12 col-lg-auto mt-lg-0">
        <ul class="mb-0 list-inline list-inline-dots">
          @php
              use Carbon\Carbon;
          @endphp
          <li class="list-inline-item">
            Copyright &copy; {{ Carbon::now()->format('Y') }}
            <a href="{{route('admin.dashboard')}}" class="link-secondary">{{$webDetails->company_name}}</a>.
            All rights reserved.
          </li>
          <li class="list-inline-item">
            {{-- <a href="changelog.html" class="link-secondary" rel="noopener">
              v1.0.0-beta21
            </a> --}}
          </li>
        </ul>
      </div>
    </div>
  </div>
</footer>
</div>
</div>



 <!-- Libs JS -->
 <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
 
 <script src="{{asset('admin/dist/libs/apexcharts/dist/apexcharts.min159a.js?1726507346')}}" defer></script>
 <script src="{{asset('admin/dist/libs/jsvectormap/dist/jsvectormap.min159a.js?1726507346')}}" defer></script>
 <script src="{{asset('admin/dist/libs/jsvectormap/dist/maps/world159a.js?1726507346')}}" defer></script>
 <script src="{{asset('admin/dist/libs/jsvectormap/dist/maps/world-merc159a.js?1726507346')}}" defer></script>
 <!-- Tabler Core -->
 <script src="{{asset('admin/dist/js/tabler.min159a.js?1726507346')}}" defer></script>
 <script src="{{asset('admin/dist/js/demo.min159a.js?1726507346')}}" defer></script>
 <script src="{{asset('admin/assets/js/bootstrap.min.js')}}"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/js/select2.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.4/main.min.js"></script>
 
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