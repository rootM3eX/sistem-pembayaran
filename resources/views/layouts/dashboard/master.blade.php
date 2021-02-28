<!doctype html>
<html lang="en">

@include('layouts.dashboard.head')

<body>
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white">
      <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
      <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
          Creative Tim
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item active  ">
            <a class="nav-link" href="#0">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="{{ url('biodata')}}">
              <i class="material-icons">person</i>
              <p>User Profile</p>
            </a>
          </li>
          @if(\Auth::user()->role == null)
          <li class="nav-item ">
            <a class="nav-link" href="{{ url('siswa/show/'.\Auth::user()->id)}}">
              <i class="material-icons">person</i>
              <p>SPP</p>
            </a>
          </li>
          @endif
          @if(\Auth::user()->role == 1)
          <li class="nav-item ">
            <a class="nav-link" href="{{ url('biodata/show')}}">
              <i class="material-icons">person</i>
              <p>Data siswa</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="{{ url('spp')}}">
              <i class="material-icons">person</i>
              <p>SPP</p>
            </a>
          </li>
          @endif
          <li class="nav-item ">
            <a class="nav-link" href="{{ url('keluar')}}">
              <i class="material-icons">exit_to_app</i>
              <p>Logouts</p>
            </a>
          </li>
          <!-- your sidebar here -->
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
        @include('layouts.dashboard.navbar')
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <!-- your content here -->
          @yield('content')
        </div>
      </div>
        @include('layouts.dashboard.footer')
    </div>
  </div>
</body>

</html>