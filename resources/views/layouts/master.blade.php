<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  {{-- <title>{{ $title . $sidebar_menu }}</title> --}}
  <title>{{ $title }}</title>

  @include('layouts._links')
  @livewireStyles()

</head>

<body>
  <div id="app">
    <div id="sidebar" class="active">
      <div class="sidebar-wrapper active">
        <div class="sidebar-header position-relative">
          <div class="d-flex justify-content-between align-items-center">
            <div class="logo">
              <a href="/">
                SIF Apps
              </a>
              {{-- <a href="index.html"><img src="assets/images/logo/logo.svg" alt="Logo" srcset=""></a> --}}
            </div>
            <div class="theme-toggle d-flex gap-2  align-items-center mt-2">
              <div class="form-check form-switch fs-6">
                <input class="form-check-input  me-0" type="hidden" id="toggle-dark">
                <label class="form-check-label"></label>
              </div>
            </div>
            <div class="sidebar-toggler  x">
              <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
            </div>
          </div>
        </div>
        <div class="sidebar-menu">
          @include('layouts._sidebar')
        </div>
      </div>
    </div>
    <div id="main" class='layout-navbar'>
      @include('layouts._navbar')

      <div id="main-content">
        @yield('content')

        @include('layouts._footer')
      </div>


    </div>
  </div>
  @include('layouts._scripts')
  @livewireScripts()

</body>

</html>
