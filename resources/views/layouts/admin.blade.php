<!DOCTYPE html>
<html lang="id">
<head>
  <title>@yield('title', 'Dashboard') | RZF Software Admin</title>

  <!-- [Meta] -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <!-- [Favicon] -->
  <link rel="icon" href="{{ asset('mantis/images/favicon.svg') }}" type="image/x-icon">

  <!-- [Google Font] -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap" id="main-font-link">

  <!-- [Mantis Icons] -->
  <link rel="stylesheet" href="{{ asset('mantis/fonts/tabler-icons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('mantis/fonts/feather.css') }}">
  <link rel="stylesheet" href="{{ asset('mantis/fonts/fontawesome.css') }}">
  <link rel="stylesheet" href="{{ asset('mantis/fonts/material.css') }}">

  <!-- [Mantis CSS] -->
  <link rel="stylesheet" href="{{ asset('mantis/css/style.css') }}" id="main-style-link">
  <link rel="stylesheet" href="{{ asset('mantis/css/style-preset.css') }}">

  <!-- [Page specific CSS - dari child view jika perlu] -->
  @stack('styles')
</head>

<body data-pc-preset="preset-1" data-pc-direction="ltr" data-pc-theme="light">

  <!-- [ Pre-loader ] start -->
  <div class="loader-bg">
    <div class="loader-track">
      <div class="loader-fill"></div>
    </div>
  </div>
  <!-- [ Pre-loader ] end -->

  <!-- ============================================================ -->
  <!-- [ Sidebar Menu ] start                                       -->
  <!-- ============================================================ -->
  <nav class="pc-sidebar">
    <div class="navbar-wrapper">

      <!-- Logo -->
      <div class="m-header">
        <a href="{{ route('admin.dashboard') }}" class="b-brand text-primary">
          <span style="font-size: 1.3rem; font-weight: 700; letter-spacing: -0.5px;">
            <span style="color: #00A885;">RZF</span> Software
          </span>
        </a>
      </div>

      <!-- Menu -->
      <div class="navbar-content">
        <ul class="pc-navbar">

          <!-- Dashboard -->
          <li class="pc-item">
            <a href="{{ route('admin.dashboard') }}"
               class="pc-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
              <span class="pc-micon"><i class="ti ti-dashboard"></i></span>
              <span class="pc-mtext">Dashboard</span>
            </a>
          </li>

          <!-- ======= Konten ======= -->
          <li class="pc-item pc-caption">
            <label>Konten</label>
            <i class="ti ti-layout"></i>
          </li>

          <li class="pc-item">
            <a href="{{ route('admin.sliders.index') }}"
               class="pc-link {{ request()->routeIs('admin.sliders.*') ? 'active' : '' }}">
              <span class="pc-micon"><i class="ti ti-photo"></i></span>
              <span class="pc-mtext">Sliders (Home)</span>
            </a>
          </li>

          <li class="pc-item">
            <a href="{{ route('admin.services.index') }}"
               class="pc-link {{ request()->routeIs('admin.services.*') ? 'active' : '' }}">
              <span class="pc-micon"><i class="ti ti-tools"></i></span>
              <span class="pc-mtext">Services</span>
            </a>
          </li>

          <li class="pc-item">
            <a href="{{ route('admin.portfolios.index') }}"
               class="pc-link {{ request()->routeIs('admin.portfolios.*') ? 'active' : '' }}">
              <span class="pc-micon"><i class="ti ti-folder"></i></span>
              <span class="pc-mtext">Portfolio</span>
            </a>
          </li>

          <li class="pc-item">
            <a href="{{ route('admin.teams.index') }}"
               class="pc-link {{ request()->routeIs('admin.teams.*') ? 'active' : '' }}">
              <span class="pc-micon"><i class="ti ti-users"></i></span>
              <span class="pc-mtext">Team</span>
            </a>
          </li>

          <li class="pc-item">
            <a href="{{ route('admin.testimonials.index') }}"
               class="pc-link {{ request()->routeIs('admin.testimonials.*') ? 'active' : '' }}">
              <span class="pc-micon"><i class="ti ti-star"></i></span>
              <span class="pc-mtext">Testimonials</span>
            </a>
          </li>

          <li class="pc-item">
            <a href="{{ route('admin.business-images.index') }}"
               class="pc-link {{ request()->routeIs('admin.business-images.*') ? 'active' : '' }}">
              <span class="pc-micon"><i class="ti ti-photo"></i></span>
              <span class="pc-mtext">Business Images</span>
            </a>
          </li>

          <!-- ======= Data ======= -->
          <li class="pc-item pc-caption">
            <label>Data</label>
            <i class="ti ti-database"></i>
          </li>

          <li class="pc-item">
            <a href="{{ route('admin.users.index') }}"
               class="pc-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
              <span class="pc-micon"><i class="ti ti-user"></i></span>
              <span class="pc-mtext">Users</span>
            </a>
          </li>

          <li class="pc-item">
            <a href="{{ route('admin.messages.index') }}"
               class="pc-link {{ request()->routeIs('admin.messages.*') ? 'active' : '' }}">
              <span class="pc-micon"><i class="ti ti-mail"></i></span>
              <span class="pc-mtext">Messages</span>
            </a>
          </li>

          <!-- ======= Pengaturan ======= -->
          <li class="pc-item pc-caption">
            <label>Pengaturan</label>
            <i class="ti ti-settings"></i>
          </li>

          <li class="pc-item">
            <a href="{{ route('admin.profile.edit') }}"
               class="pc-link {{ request()->routeIs('admin.profile.*') ? 'active' : '' }}">
              <span class="pc-micon"><i class="ti ti-building"></i></span>
              <span class="pc-mtext">Company Profile</span>
            </a>
          </li>

          <!-- ======= Lainnya ======= -->
          <li class="pc-item pc-caption">
            <label>Lainnya</label>
          </li>

          <li class="pc-item">
            <a href="{{ url('/') }}" class="pc-link" target="_blank">
              <span class="pc-micon"><i class="ti ti-home"></i></span>
              <span class="pc-mtext">View Landing Page</span>
            </a>
          </li>

        </ul>
      </div>
      <!-- End Menu -->

    </div>
  </nav>
  <!-- [ Sidebar Menu ] end -->

  <!-- ============================================================ -->
  <!-- [ Header Topbar ] start                                      -->
  <!-- ============================================================ -->
  <header class="pc-header">
    <div class="header-wrapper">

      <!-- Mobile collapse button -->
      <div class="me-auto pc-mob-drp">
        <ul class="list-unstyled">
          <li class="pc-h-item pc-sidebar-collapse">
            <a href="#" class="pc-head-link ms-0" id="sidebar-hide">
              <i class="ti ti-menu-2"></i>
            </a>
          </li>
          <li class="pc-h-item pc-sidebar-popup">
            <a href="#" class="pc-head-link ms-0" id="mobile-collapse">
              <i class="ti ti-menu-2"></i>
            </a>
          </li>
        </ul>
      </div>

      <!-- Right side header -->
      <div class="ms-auto">
        <ul class="list-unstyled d-flex align-items-center mb-0">

          <!-- User dropdown -->
          <li class="dropdown pc-h-item header-user-profile">
            <a class="pc-head-link dropdown-toggle arrow-none me-0"
               data-bs-toggle="dropdown"
               href="#"
               role="button"
               aria-haspopup="false"
               data-bs-auto-close="outside"
               aria-expanded="false">
              <i class="ti ti-user me-1" style="font-size: 1.4rem;"></i>
              <span>{{ Auth::user()->name ?? 'Admin' }}</span>
            </a>
            <div class="dropdown-menu dropdown-user-profile dropdown-menu-end pc-h-dropdown">
              <div class="dropdown-header">
                <div class="d-flex align-items-center mb-1">
                  <div class="flex-grow-1 ms-2">
                    <h6 class="mb-0">{{ Auth::user()->name ?? 'Admin' }}</h6>
                    <small class="text-muted">{{ Auth::user()->email ?? '' }}</small>
                  </div>
                </div>
              </div>
              <a href="{{ route('admin.profile.edit') }}" class="dropdown-item">
                <i class="ti ti-building me-2"></i>
                <span>Company Profile</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="{{ route('logout') }}" class="dropdown-item text-danger"
                 onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="ti ti-power me-2"></i>
                <span>Logout</span>
              </a>
            </div>
          </li>

        </ul>
      </div>

    </div>
  </header>
  <!-- [ Header ] end -->

  <!-- Logout Form -->
  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
  </form>

  <!-- ============================================================ -->
  <!-- [ Main Content ] start                                       -->
  <!-- ============================================================ -->
  <div class="pc-container">
    <div class="pc-content">

      <!-- [ Breadcrumb / Page Header ] start -->
      <div class="page-header">
        <div class="page-block">
          <div class="row align-items-center">
            <div class="col-md-12">
              <div class="page-header-title">
                <h5 class="m-b-10">@yield('title', 'Dashboard')</h5>
              </div>
              @hasSection('breadcrumb')
                <ul class="breadcrumb">
                  <li class="breadcrumb-item">
                    <a href="{{ route('admin.dashboard') }}">Home</a>
                  </li>
                  @yield('breadcrumb')
                </ul>
              @endif
            </div>
          </div>
        </div>
      </div>
      <!-- [ Breadcrumb ] end -->

      <!-- [ Alert Session ] -->
      @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <i class="ti ti-check me-2"></i>
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif

      @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <i class="ti ti-alert-triangle me-2"></i>
          {{ session('error') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif

      @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <i class="ti ti-alert-triangle me-2"></i>
          <ul class="mb-0">
            @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif

      <!-- [ Main page content ] -->
      @yield('content')
      <!-- [ Main page content ] end -->

    </div>
  </div>
  <!-- [ Main Content ] end -->

  <!-- ============================================================ -->
  <!-- [ Footer ] start                                             -->
  <!-- ============================================================ -->
  <footer class="pc-footer">
    <div class="footer-wrapper container-fluid">
      <div class="row">
        <div class="col-sm my-1">
          <p class="m-0">
            &copy; {{ date('Y') }} <strong>RZF Software</strong>. All rights reserved.
          </p>
        </div>
        <div class="col-auto my-1">
          <ul class="list-inline footer-link mb-0">
            <li class="list-inline-item">
              <a href="{{ url('/') }}" target="_blank">Landing Page</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
  <!-- [ Footer ] end -->

  <!-- ============================================================ -->
  <!-- [ Required JS ] start                                        -->
  <!-- ============================================================ -->
  <script src="{{ asset('mantis/js/plugins/popper.min.js') }}"></script>
  <script src="{{ asset('mantis/js/plugins/simplebar.min.js') }}"></script>
  <script src="{{ asset('mantis/js/plugins/bootstrap.min.js') }}"></script>
  <script src="{{ asset('mantis/js/fonts/custom-font.js') }}"></script>
  <script src="{{ asset('mantis/js/pcoded.js') }}"></script>
  <script src="{{ asset('mantis/js/plugins/feather.min.js') }}"></script>

  <script>layout_change('light');</script>
  <script>change_box_container('false');</script>
  <script>layout_rtl_change('false');</script>
  <script>preset_change("preset-1");</script>
  <script>font_change("Public-Sans");</script>
  <!-- [ Required JS ] end -->

  <!-- [ Page specific JS dari child view ] -->
  @stack('scripts')

</body>
</html>