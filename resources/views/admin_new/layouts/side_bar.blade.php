<div class="sidebar">
  <!-- Top Section -->
  <div class="top-home-bar">
      <a href="#">
          <i class="home-icon fa fa-user"></i>
      </a>
      <div class="top-text">
          <h2>Home</h2>
          <p>It's where the heart is!</p>
      </div>
  </div>

  <div class="d-flex">
      <!-- Sidebar Icons -->
      <div class="main-wrapper">
          <a href="#" onclick="setActiveMenu('intro')">
              <i class="fa fa-wifi sidebar-icon"></i>
          </a>
          <a href="#" onclick="setActiveMenu('intro')">
              <i class="fa fa-clipboard sidebar-icon"></i>
          </a>
          <a href="#" onclick="setActiveMenu('employeeMenu')">
              <i class="fa fa-user-friends sidebar-icon"></i>
          </a>
          <a href="#" onclick="setActiveMenu('intro')">
              <i class="fa fa-hands-helping sidebar-icon"></i>
          </a>
          <a href="#" onclick="setActiveMenu('intro')">
              <i class="fa fa-calendar-alt sidebar-icon"></i>
          </a>
          <a href="#" onclick="setActiveMenu('intro')">
              <i class="fa fa-sitemap sidebar-icon"></i>
          </a>
          <a href="#" onclick="setActiveMenu('intro')">
              <i class="fa fa-chart-pie sidebar-icon"></i>
          </a>
          <a href="#" onclick="setActiveMenu('intro')">
              <i class="fa fa-desktop sidebar-icon"></i>
          </a>
          <a href="#" onclick="setActiveMenu('intro')">
              <i class="fa fa-robot sidebar-icon"></i>
          </a>
          <a href="#" onclick="setActiveMenu('intro')">
              <i class="fa fa-volume-up sidebar-icon"></i>
          </a>
          <a href="#" onclick="setActiveMenu('intro')">
              <i class="fa fa-user sidebar-icon"></i>
          </a>
      </div>

      <!-- Sidebar Content -->
      <div class="sidebar-intro">
          <div class="menu-list" id="introMenu">
              <h3>Welcome</h3>
              <p>Select an icon to explore modules.</p>
          </div>

          <div class="menu-list" id="employeeMenu" style="display: none;">
              <h3>Employee Menu</h3>
              <ul>
                  <li onclick="toggleDropdown('main')">
                      <span class="menu-item">
                          Main
                          <i class="fa fa-chevron-right dropdown-icon" id="mainDropdownIcon"></i>
                      </span>
                      <ul class="submenu" id="mainDropdown">
                          <li><a class="dropdown-item {{ request()->routeIs('employee.overview') ? 'active' : '' }}" href="{{ route('employee.overview') }}">Overview</a></li>
                          <li>Analytics Hub</li>
                          <li>Employee Directory</li>
                          <li>Organization Chart</li>
                      </ul>
                  </li>
                  <li onclick="toggleDropdown('information')">
                      <span class="menu-item">
                          Information
                          <i class="fa fa-chevron-right dropdown-icon" id="informationDropdownIcon"></i>
                      </span>
                      <ul class="submenu" id="informationDropdown">
                          <li>Policies</li>
                          <li>Reports</li>
                          <li>Guidelines</li>
                          <li>Compliance</li>
                          <li>Training</li>
                          <li>Documentation</li>
                          <li>FAQs</li>
                          <li>Support</li>
                          <li>Alerts</li>
                          <li>Feedback</li>
                          <li>Resources</li>
                      </ul>
                  </li>
                  <li onclick="toggleDropdown('admin')">
                      <span class="menu-item">
                          Admin
                          <i class="fa fa-chevron-right dropdown-icon" id="adminDropdownIcon"></i>
                      </span>
                      <ul class="submenu" id="adminDropdown">
                          <li>Manage Users</li>
                          <li>System Logs</li>
                      </ul>
                  </li>
                  <li onclick="toggleDropdown('setup')">
                      <span class="menu-item">
                          Setup
                          <i class="fa fa-chevron-right dropdown-icon" id="setupDropdownIcon"></i>
                      </span>
                      <ul class="submenu" id="setupDropdown">
                          <li>System Configuration</li>
                          <li>Integrations</li>
                      </ul>
                  </li>
              </ul>
          </div>
      </div>
  </div>
</div>