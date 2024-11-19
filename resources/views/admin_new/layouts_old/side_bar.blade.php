<div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
               <div id="sidebar-menu" class="sidebar-menu">
                  <ul>
                     <li class="menu-title"> 
                        <span>Main</span>
                     </li>
                     <li class="">
                        <a href="{{route('admin.dashboard')}}" class="noti-dot"><i class="la la-dashboard"></i> <span> Dashboard</span>  </a>
                        {{-- <ul style="display: none;">
                           <li><a href="{{route('admin.dashboard')}}">Admin Dashboard</a></li>
                           <li><a href="employee-dashboard.php">Employee Dashboard</a></li>
                        </ul> --}}
                     </li>
                     <li class="menu-title"> 
                        <span>Employees</span>
                     </li>
                     <li class="submenu">
                        <a href="#" class=""><i class="la la-user"></i> <span> Employees</span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                           <li><a href="{{route('admin.employee')}}">All Employees</a></li>
                           <li><a href="{{route('admin.holidays')}}">Holidays</a></li>
                           <li><a href="leaves-employee.php">Employee Leave</a></li>
                           <li><a href="{{ route('admin.department')}}">Departments</a></li>
                           <li><a href="{{route('admin.designation')}}">Designations</a></li>
                           <li><a href="timesheet.php">Timesheet</a></li>
                           <li><a href="{{route('admin.overtime')}}">Overtime</a></li>
                        </ul>
                     </li>
                     <li> 
                        <a href="{{route('admin.client')}}"><i class="la la-users"></i> <span>Clients</span></a>
                     </li>
                     <li class="submenu">
                        <a href="#"><i class="la la-rocket"></i> <span> Projects</span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                           <li><a href="{{route('admin.project')}}">Projects</a></li>
                        </ul>
                     </li>
                     <li> 
                        <a href="{{route('admin.lead')}}"><i class="la la-user-secret"></i> <span>Leads</span></a>
                     </li>
                     <li class="menu-title"> 
                        <span>HR</span>
                     </li>
                     <li class="submenu">
                        <a href="#"><i class="la la-files-o"></i> <span> Accounts </span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                           <li><a href="{{route('admin.employee.invoice')}}">Invoices</a></li>
                           {{-- <li><a href="payments.php">Payments</a></li>
                           <li><a href="expenses.php">Expenses</a></li> --}}
                           <li><a href="{{route('admin.provident-fund')}}">Provident Fund</a></li>
                           <li><a href="{{route('admin.tax')}}">Taxes</a></li>
                        </ul>
                     </li>
                     <li class="submenu">
                        <a href="#"><i class="la la-money"></i> <span> Payroll </span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                           <li><a href="{{route('admin.employee.salary')}}"> Employee Salary </a></li>
                           {{-- <li><a href="salary-view.php"> Payslip </a></li>
                           <li><a href="payroll-items.php"> Payroll Items </a></li> --}}
                        </ul>
                     </li>
                     <li class="submenu">
                        <a href="#"><i class="la la-crosshairs"></i> <span> Goals </span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                           <li><a href="{{route('admin.goal-tracking')}}"> Goal List </a></li>
                           <li><a href="{{route('admin.goal-type')}}"> Goal Type </a></li>
                        </ul>
                     </li>
                     <li class="submenu">
                        <a href="#"><i class="la la-edit"></i> <span> Training </span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                           <li><a href="{{route('admin.training')}}"> Training List </a></li>
                           <li><a href="{{route('admin.trainer')}}"> Trainers</a></li>
                           <li><a href="{{route('admin.training-type')}}"> Training Type </a></li>
                        </ul>
                     </li>
                     <li><a href="{{route('admin.promotion')}}"><i class="la la-bullhorn"></i> <span>Promotion</span></a></li>
                     <li><a href="{{route('admin.resignations')}}"><i class="la la-external-link-square"></i> <span>Resignation</span></a></li>
                     <li><a href="{{route('admin.terminations')}}"><i class="la la-times-circle"></i> <span>Termination</span></a></li>
                     {{-- <li class="menu-title"> 
                        <span>Administration</span>
                     </li> --}}
                     {{-- <li> 
                        <a href="assets.php"><i class="la la-object-ungroup"></i> <span>Assets</span></a>
                     </li>
                     <li> 
                        <a href="users.php"><i class="la la-user-plus"></i> <span>Users</span></a>
                     </li> --}}
                     <li class="menu-title"> 
                        <span>Pages</span>
                     </li>
                     <li class="submenu">
                        {{-- <a href="#"><i class="la la-user"></i> <span> Profile </span> <span class="menu-arrow"></span></a> --}}
                        <ul style="display: none;">
                           <li><a href="profile.php"> Employee Profile </a></li>
                           <li><a href="client-profile.php"> Client Profile </a></li>
                        </ul>
                     </li>
                     <li> 
                        <a href="{{route('admin.web.setting')}}"><i class="la la-cogs"></i> <span>Settings</span></a>
                     </li>
                     <li> 
                        {{-- <a href="logout.php"><i class="la la-power-off"></i> <span>Logout</span></a> --}}
                     </li>
                  </ul>
               </div>
            </div>
         </div>