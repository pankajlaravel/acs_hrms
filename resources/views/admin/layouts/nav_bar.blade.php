<!-- Navbar -->
<div class="nav_bar">
   <div class="navbar-logo">
       {{-- <span class="logo-red">XTRA</span>
       <span class="logo-icon">Ⓞ</span>
       <span class="logo-blue">COVER</span> --}}
       <a href="{{route('admin.dashboard')}}" class="logo">
        <img src="{{asset('logo/img/'.$webDetails->logo)}}" alt="Logo" width="120" height="50" alt="">
        </a>
   </div>
   <div class="navbar-right">
       <div class="navbar-search">
        <div class="search-bar-container-unique">
            <input type="text"  class="form-control" placeholder="Search">
            <button>
                <i class="fa fa-search"></i> 
            </button>
        </div>
       </div>
       <button class="chat-button">
           <img src="{{asset('admin/assets/img/BellaChatIcon.png')}}" alt="Chat Avatar" class="chat-avatar" />
           Chat with Bella
       </button>
       {{-- <div class="dropdown">
           <span>Sep 2024</span>
           <span class="dropdown-arrow">▼</span>
       </div> --}}
       <div class="notification">
           <span class="bell-icon">🔔</span>
           <span class="notification-badge">0</span>
       </div>
       <button class="settings-button">⚙️</button>
       <form id="logout-form" action="{{ route('logout') }}" method="POST" >
        @csrf
       
        <button type="submit" class="logout-button"><i class="fa fa-sign-out"></i></button>
    </form>
   </div>
</div>