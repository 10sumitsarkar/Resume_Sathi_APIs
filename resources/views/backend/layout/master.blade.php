<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="robots" content="noindex, nofollow, noarchive">
  <title>ResumeSathi | @yield('title')</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset('dashboard-assets/vendors/feather/feather.css') }}">
  <link rel="stylesheet" href="{{ asset('dashboard-assets/vendors/ti-icons/css/themify-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('dashboard-assets/vendors/css/vendor.bundle.base.css') }}">
  @yield('page-css')
  <link rel="shortcut icon" href="{{ asset('dashboard-assets/images/favicon.png') }}" />
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

<script src="{{ asset('dashboard-assets/vendors/tinymce/tinymce.min.js') }}"></script>
  @yield('custom-css')
  <link rel="stylesheet" href="{{ asset('dashboard-assets/css/resumesathi-admin.css') }}">

</head>
<body class="rs-loading">
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    @include('backend.layout.inc.header')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
    @include('backend.layout.inc.sidebar')
      <!-- partial -->
      <div class="main-panel">
        @yield('content')
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->

        @include('backend.layout.inc.footer')
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  @yield('custom-js')
  <!-- plugins:js -->
  <script src="{{ asset('dashboard-assets/vendors/js/vendor.bundle.base.js') }}"></script>
  <script src="{{ asset('dashboard-assets/js/editorDemo.js') }}"></script>
  <script>
    (function () {
      var sidebar = document.getElementById('sidebar');
      var profileToggle = document.getElementById('profileDropdown');

      function syncAdminShell() {
        if (window.innerWidth < 992) {
          document.body.classList.remove('sidebar-icon-only', 'sidebar-hidden');
          if (sidebar) {
            sidebar.classList.remove('active');
          }
        }
      }

      syncAdminShell();
      window.addEventListener('resize', syncAdminShell);
      document.addEventListener('click', function (event) {
        var minimize = event.target.closest('[data-toggle="minimize"]');
        var offcanvas = event.target.closest('[data-toggle="offcanvas"]');
        var dropdown = event.target.closest('[data-toggle="dropdown"]');

        if (minimize) {
          document.body.classList.toggle('sidebar-icon-only');
        }

        if (offcanvas && sidebar) {
          sidebar.classList.toggle('active');
        }

        if (dropdown) {
          event.preventDefault();
          var menu = dropdown.parentElement.querySelector('.dropdown-menu');
          if (menu) {
            menu.classList.toggle('show');
          }
        }

        if (!event.target.closest('.dropdown') && profileToggle) {
          var openMenu = profileToggle.parentElement.querySelector('.dropdown-menu.show');
          if (openMenu) {
            openMenu.classList.remove('show');
          }
        }
      });
      window.addEventListener('load', function () {
        syncAdminShell();
        document.body.classList.remove('rs-loading');
        document.body.classList.add('rs-ready');
      });
    })();
  </script>
  @yield('page-js')

</body>

</html>
