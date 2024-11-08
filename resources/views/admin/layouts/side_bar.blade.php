<aside class="navbar navbar-vertical navbar-expand-lg" data-bs-theme="dark">
   <div class="container-fluid">
     <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar-menu" aria-controls="sidebar-menu" aria-expanded="false" aria-label="Toggle navigation">
       <span class="navbar-toggler-icon"></span>
     </button>
     <div class="navbar-brand navbar-brand-autodark">
      <a href="{{route('admin.dashboard')}}" class="logo">
        <img src="{{asset('logo/img/'.$webDetails->logo)}}" alt="Logo" width="120" height="50" alt="">
        </a>
     </div>
     <div class="flex-row navbar-nav d-lg-none">
       <div class="nav-item d-none d-lg-flex me-3">
         <div class="btn-list">
           <a href="https://github.com/tabler/tabler" class="btn" target="_blank" rel="noreferrer">
             <!-- Download SVG icon from http://tabler-icons.io/i/brand-github -->
             <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 19c-4.3 1.4 -4.3 -2.5 -6 -3m12 5v-3.5c0 -1 .1 -1.4 -.5 -2c2.8 -.3 5.5 -1.4 5.5 -6a4.6 4.6 0 0 0 -1.3 -3.2a4.2 4.2 0 0 0 -.1 -3.2s-1.1 -.3 -3.5 1.3a12.3 12.3 0 0 0 -6.2 0c-2.4 -1.6 -3.5 -1.3 -3.5 -1.3a4.2 4.2 0 0 0 -.1 3.2a4.6 4.6 0 0 0 -1.3 3.2c0 4.6 2.7 5.7 5.5 6c-.6 .6 -.6 1.2 -.5 2v3.5" /></svg>
             Source code
           </a>
           <a href="https://github.com/sponsors/codecalm" class="btn" target="_blank" rel="noreferrer">
             <!-- Download SVG icon from http://tabler-icons.io/i/heart -->
             <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon text-pink"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" /></svg>
             Sponsor
           </a>
         </div>
       </div>
       <div class="d-none d-lg-flex">
         <a href="layout-fluid-vertical4965.html?theme=dark" class="px-0 nav-link hide-theme-dark" title="Enable dark mode" data-bs-toggle="tooltip"
    data-bs-placement="bottom">
           <!-- Download SVG icon from http://tabler-icons.io/i/moon -->
           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z" /></svg>
         </a>
         <a href="layout-fluid-vertical6a08.html?theme=light" class="px-0 nav-link hide-theme-light" title="Enable light mode" data-bs-toggle="tooltip"
    data-bs-placement="bottom">
           <!-- Download SVG icon from http://tabler-icons.io/i/sun -->
           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" /><path d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7" /></svg>
         </a>
         <div class="nav-item dropdown d-none d-md-flex me-3">
           <a href="#" class="px-0 nav-link" data-bs-toggle="dropdown" tabindex="-1" aria-label="Show notifications">
             <!-- Download SVG icon from http://tabler-icons.io/i/bell -->
             <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 5a2 2 0 1 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6" /><path d="M9 17v1a3 3 0 0 0 6 0v-1" /></svg>
             <span class="badge bg-red"></span>
           </a>
           <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-end dropdown-menu-card">
             <div class="card">
               <div class="card-header">
                 <h3 class="card-title">Last updates</h3>
               </div>
               <div class="list-group list-group-flush list-group-hoverable">
                 <div class="list-group-item">
                   <div class="row align-items-center">
                     <div class="col-auto"><span class="status-dot status-dot-animated bg-red d-block"></span></div>
                     <div class="col text-truncate">
                       <a href="#" class="text-body d-block">Example 1</a>
                       <div class="d-block text-secondary text-truncate mt-n1">
                         Change deprecated html tags to text decoration classes (#29604)
                       </div>
                     </div>
                     <div class="col-auto">
                       <a href="#" class="list-group-item-actions">
                         <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                         <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon text-muted"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" /></svg>
                       </a>
                     </div>
                   </div>
                 </div>
                 <div class="list-group-item">
                   <div class="row align-items-center">
                     <div class="col-auto"><span class="status-dot d-block"></span></div>
                     <div class="col text-truncate">
                       <a href="#" class="text-body d-block">Example 2</a>
                       <div class="d-block text-secondary text-truncate mt-n1">
                         justify-content:between ⇒ justify-content:space-between (#29734)
                       </div>
                     </div>
                     <div class="col-auto">
                       <a href="#" class="list-group-item-actions show">
                         <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                         <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon text-yellow"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" /></svg>
                       </a>
                     </div>
                   </div>
                 </div>
                 <div class="list-group-item">
                   <div class="row align-items-center">
                     <div class="col-auto"><span class="status-dot d-block"></span></div>
                     <div class="col text-truncate">
                       <a href="#" class="text-body d-block">Example 3</a>
                       <div class="d-block text-secondary text-truncate mt-n1">
                         Update change-version.js (#29736)
                       </div>
                     </div>
                     <div class="col-auto">
                       <a href="#" class="list-group-item-actions">
                         <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                         <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon text-muted"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" /></svg>
                       </a>
                     </div>
                   </div>
                 </div>
                 <div class="list-group-item">
                   <div class="row align-items-center">
                     <div class="col-auto"><span class="status-dot status-dot-animated bg-green d-block"></span></div>
                     <div class="col text-truncate">
                       <a href="#" class="text-body d-block">Example 4</a>
                       <div class="d-block text-secondary text-truncate mt-n1">
                         Regenerate package-lock.json (#29730)
                       </div>
                     </div>
                     <div class="col-auto">
                       <a href="#" class="list-group-item-actions">
                         <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                         <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon text-muted"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" /></svg>
                       </a>
                     </div>
                   </div>
                 </div>
               </div>
             </div>
           </div>
         </div>
       </div>
       <div class="nav-item dropdown">
         <a href="#" class="p-0 nav-link d-flex lh-1 text-reset" data-bs-toggle="dropdown" aria-label="Open user menu">
           <span class="avatar avatar-sm" style="background-image: url(static/avatars/000m.jpg)"></span>
           <div class="d-none d-xl-block ps-2">
             <div>Paweł Kuna</div>
             <div class="mt-1 small text-secondary">UI Designer</div>
           </div>
         </a>
         <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
           <a href="#" class="dropdown-item">Status</a>
           <a href="profile.html" class="dropdown-item">Profile</a>
           <a href="#" class="dropdown-item">Feedback</a>
           <div class="dropdown-divider"></div>
           <a href="settings.html" class="dropdown-item">Settings</a>
           <a href="sign-in.html" class="dropdown-item">Logout</a>
         </div>
       </div>
     </div>
     <div class="collapse navbar-collapse" id="sidebar-menu">
       <ul class="navbar-nav pt-lg-3">
         <li class="nav-item">
           <a class="nav-link" href="{{route('admin.dashboard')}}" >
             <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
               <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l-2 0l9 -9l9 9l-2 0" /><path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" /><path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" /></svg>
             </span>
             <span class="nav-link-title">
               Home
             </span>
           </a>
         </li>
         <li class="nav-item dropdown {{ request()->routeIs('admin.info.profile', 'admin.info.family_details', 'admin.department', 'admin.designation', 'admin.overtime','admin.employee','admin.employee.attendance') ? 'show' : '' }}">
          <a class="nav-link dropdown-toggle {{ request()->routeIs('admin.info.profile', 'admin.info.family_details', 'admin.department', 'admin.designation', 'admin.overtime','admin.employee','admin.employee.attendance') ? 'active' : '' }}" href="#navbar-base" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button" aria-expanded="{{ request()->routeIs('admin.info.profile', 'admin.info.family_details', 'admin.department', 'admin.designation', 'admin.overtime') ? 'true' : 'false' }}">
              <span class="nav-link-icon d-md-none d-lg-inline-block">
                  <!-- SVG icon -->
                  <i class="fa fa-user-circle"></i>
              </span>
              <span class="nav-link-title">Employee</span>
          </a>
          <div class="dropdown-menu {{ request()->routeIs('admin.info.profile', 'admin.info.family_details', 'admin.department', 'admin.designation', 'admin.overtime','admin.employee','admin.employee.attendance') ? 'show' : '' }}">
              <div class="dropdown-menu-columns">
                  <div class="dropdown-menu-column">
                      <a class="dropdown-item {{ request()->routeIs('admin.employee') ? 'active' : '' }}" href="{{ route('admin.employee') }}">Employee List</a>
                      <a class="dropdown-item {{ request()->routeIs('admin.info.profile') ? 'active' : '' }}" href="{{ route('admin.info.profile') }}">Employee Profile</a>
                      <a class="dropdown-item {{ request()->routeIs('admin.info.family_details') ? 'active' : '' }}" href="{{ route('admin.info.family_details') }}">Family Details</a>
                      <a class="dropdown-item {{ request()->routeIs('admin.department') ? 'active' : '' }}" href="{{ route('admin.department') }}">Departments</a>
                      <a class="dropdown-item {{ request()->routeIs('admin.designation') ? 'active' : '' }}" href="{{ route('admin.designation') }}">Designations</a>
                      <a class="dropdown-item {{ request()->routeIs('admin.overtime') ? 'active' : '' }}" href="{{ route('admin.overtime') }}">Overtime</a>
                      <a class="dropdown-item {{ request()->routeIs('admin.employee.attendance') ? 'active' : '' }}" href="{{ route('admin.employee.attendance') }}">Attendance</a>
                  </div>
              </div>
          </div>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('admin.client') ? 'active' : '' }}"  href="{{route('admin.client')}}" >
          <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
            <i class="fa fa-users"></i>
          </span>
          <span class="nav-link-title">
            Client
          </span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('admin.project') ? 'active' : '' }}"  href="{{route('admin.project')}}" >
          <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
            <i class="fa fa-rocket"></i>
          </span>
          <span class="nav-link-title">
            Projects
          </span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('admin.lead') ? 'active' : '' }}"  href="{{route('admin.lead')}}" >
          <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
            <i class="fa fa-user-secret"></i>
          </span>
          <span class="nav-link-title">
            Leads
          </span>
        </a>
      </li>

      <li class="nav-item dropdown {{ request()->routeIs('admin.employee.invoice', 'admin.provident-fund', 'admin.tax') ? 'show' : '' }}">
        <a class="nav-link dropdown-toggle {{ request()->routeIs('admin.employee.invoice', 'admin.provident-fund', 'admin.tax') ? 'active' : '' }}" href="#navbar-base" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button" aria-expanded="{{ request()->routeIs('admin.employee.invoice', 'admin.provident-fund', 'admin.tax') ? 'true' : 'false' }}">
            <span class="nav-link-icon d-md-none d-lg-inline-block">
                <!-- SVG icon -->
                <i class="fa fa-file"></i>
            </span>
            <span class="nav-link-title">Accounts</span>
        </a>
        <div class="dropdown-menu {{ request()->routeIs('admin.employee.invoice', 'admin.provident-fund', 'admin.tax') ? 'show' : '' }}">
            <div class="dropdown-menu-columns">
                <div class="dropdown-menu-column">
                    <a class="dropdown-item {{ request()->routeIs('admin.employee.invoice') ? 'active' : '' }}" href="{{ route('admin.employee.invoice') }}">Invoices</a>
                    <a class="dropdown-item {{ request()->routeIs('admin.provident-fund') ? 'active' : '' }}" href="{{ route('admin.provident-fund') }}">Provident Funds</a>
                    <a class="dropdown-item {{ request()->routeIs('admin.tax') ? 'active' : '' }}" href="{{ route('admin.tax') }}">Taxes</a>
                   
                </div>
            </div>
        </div>
    </li>

    <li class="nav-item dropdown {{ request()->routeIs('admin.employee.salary') ? 'show' : '' }}">
      <a class="nav-link dropdown-toggle {{ request()->routeIs('admin.employee.salary') ? 'active' : '' }}" href="#navbar-base" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button" aria-expanded="{{ request()->routeIs('admin.employee.salary') ? 'true' : 'false' }}">
          <span class="nav-link-icon d-md-none d-lg-inline-block">
              <!-- SVG icon -->
              <i class="fa fa-money"></i>
          </span>
          <span class="nav-link-title">Payroll</span>
      </a>
      <div class="dropdown-menu {{ request()->routeIs('admin.employee.salary') ? 'show' : '' }}">
          <div class="dropdown-menu-columns">
              <div class="dropdown-menu-column">
                  <a class="dropdown-item {{ request()->routeIs('admin.employee.salary') ? 'active' : '' }}" href="{{ route('admin.employee.salary') }}">Employee Salary</a>                
              </div>
          </div>
      </div>
  </li>

  <li class="nav-item dropdown {{ request()->routeIs('admin.goal-tracking','admin.goal-type') ? 'show' : '' }}">
    <a class="nav-link dropdown-toggle {{ request()->routeIs('admin.goal-tracking','admin.goal-type') ? 'active' : '' }}" href="#navbar-base" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button" aria-expanded="{{ request()->routeIs('admin.goal-tracking','admin.goal-type') ? 'true' : 'false' }}">
        <span class="nav-link-icon d-md-none d-lg-inline-block">
            <!-- SVG icon -->
            <i class="fa fa-crosshairs"></i>
        </span>
        <span class="nav-link-title">Goals</span>
    </a>
    <div class="dropdown-menu {{ request()->routeIs('admin.goal-tracking','admin.goal-type') ? 'show' : '' }}">
        <div class="dropdown-menu-columns">
            <div class="dropdown-menu-column">
                <a class="dropdown-item {{ request()->routeIs('admin.goal-tracking') ? 'active' : '' }}" href="{{route('admin.goal-tracking')}}">Goal List</a>                
                <a class="dropdown-item {{ request()->routeIs('admin.goal-type') ? 'active' : '' }}" href="{{route('admin.goal-type')}}">Goal Type</a>                
            </div>
        </div>
    </div>
</li>
       
<li class="nav-item dropdown {{ request()->routeIs('admin.training', 'admin.trainer', 'admin.training-type') ? 'show' : '' }}">
  <a class="nav-link dropdown-toggle {{ request()->routeIs('admin.training', 'admin.trainer', 'admin.training-type') ? 'active' : '' }}" href="#navbar-base" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button" aria-expanded="{{ request()->routeIs('admin.training', 'admin.trainer', 'admin.training-type') ? 'true' : 'false' }}">
      <span class="nav-link-icon d-md-none d-lg-inline-block">
          <!-- SVG icon -->
          <i class="fa fa-edit"></i>
      </span>
      <span class="nav-link-title">Training</span>
  </a>
  <div class="dropdown-menu {{ request()->routeIs('admin.training', 'admin.trainer', 'admin.training-type') ? 'show' : '' }}">
      <div class="dropdown-menu-columns">
          <div class="dropdown-menu-column">
              <a class="dropdown-item {{ request()->routeIs('admin.training') ? 'active' : '' }}" href="{{ route('admin.training') }}">Training List</a>
              <a class="dropdown-item {{ request()->routeIs('admin.trainer') ? 'active' : '' }}" href="{{ route('admin.trainer') }}">Trainers</a>
              <a class="dropdown-item {{ request()->routeIs('admin.training-type') ? 'active' : '' }}" href="{{ route('admin.training-type') }}">Training Type</a>
             
          </div>
      </div>
  </div>
</li>

          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.promotion') ? 'active' : '' }}"  href="{{route('admin.promotion')}}" >
              <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                <i class="fa fa-bullhorn"></i>
              </span>
              <span class="nav-link-title">
                Promotion
              </span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.resignations') ? 'active' : '' }}"  href="{{route('admin.resignations')}}" >
              <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                <i class="fa fa-external-link-square"></i>
              </span>
              <span class="nav-link-title">
                Resignation
              </span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.terminations') ? 'active' : '' }}"  href="{{route('admin.terminations')}}" >
              <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                <i class="fa fa-times-circle"></i>
              </span>
              <span class="nav-link-title">
                Termination
              </span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.web.setting') ? 'active' : '' }}"  href="{{route('admin.web.setting')}}" >
              <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                <i class="fa fa-cogs"></i>
              </span>
              <span class="nav-link-title">
                Settings
              </span>
            </a>
          </li>
         
       </ul>
     </div>
   </div>
 </aside>