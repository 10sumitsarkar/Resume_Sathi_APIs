<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>ResumeSathi | @yield('title')</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset('dashboard-assets/vendors/feather/feather.css') }}">
  <link rel="stylesheet" href="{{ asset('dashboard-assets/vendors/ti-icons/css/themify-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('dashboard-assets/vendors/css/vendor.bundle.base.css') }}">
  <link rel="stylesheet" href="{{ asset('dashboard-assets/css/style.css') }}">
  @yield('page-css')

  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="{{ asset('dashboard-assets/vendors/ti-icons/css/themify-icons.css') }}">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('dashboard-assets/css/vertical-layout-light/style.css') }}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ asset('dashboard-assets/images/favicon.png') }}" />
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

<script src="{{ asset('dashboard-assets/vendors/tinymce/tinymce.min.js') }}"></script>
  @yield('custom-css')

</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    @include('backend.layout.inc.header')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      @include('backend.layout.inc.setting-panel')

      <!-- partial -->
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


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Recipient:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send message</button>
      </div>
    </div>
  </div>
</div>
  @yield('custom-js')
  <!-- plugins:js -->
  <script src="{{ asset('dashboard-assets/vendors/js/vendor.bundle.base.js') }}"></script>
  <script src="{{ asset('dashboard-assets/js/editorDemo.js') }}"></script>

  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="{{ asset('dashboard-assets/vendors/chart.js/Chart.min.js') }}"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{ asset('dashboard-assets/js/off-canvas.js') }}"></script>
  <script src="{{ asset('dashboard-assets/js/hoverable-collapse.js') }}"></script>
  <script src="{{ asset('dashboard-assets/js/template.js') }}"></script>
  <script src="{{ asset('dashboard-assets/js/settings.js') }}"></script>
  <script src="{{ asset('dashboard-assets/js/todolist.js') }}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{ asset('dashboard-assets/js/Chart.roundedBarCharts.js') }}"></script>
  <!-- End custom js for this page-->
  @yield('page-js')

</body>

</html>

