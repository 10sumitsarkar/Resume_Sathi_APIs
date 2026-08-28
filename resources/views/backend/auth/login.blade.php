<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>ResumeSathi Admin Login</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset('dashboard-assets/vendors/feather/feather.css') }}">
  <link rel="stylesheet" href="{{ asset('dashboard-assets/vendors/ti-icons/css/themify-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('dashboard-assets/vendors/css/vendor.bundle.base.css') }}">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <link rel="stylesheet" href="{{ asset('dashboard-assets/css/resumesathi-admin.css') }}">
  <link rel="shortcut icon" href="{{ asset('dashboard-assets/images/favicon.png') }}" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">

            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="{{ asset('front-assets/images/logo/logo.svg') }}" alt="ResumeSathi">
              </div>
              <div class="col-sm-12">
                @if(Session::get('success'))
                <div class="demo-spacing-0">
                  <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    <div class="alert-body">
                      {{ Session::get('success') }}
                    </div>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                </div>
                @endif
                @if(Session::get('fail'))
                <div class="demo-spacing-0">
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <div class="alert-body">
                      {{ Session::get('fail') }}
                    </div>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                </div>
                @endif
              </div>
              <h4>Welcome back</h4>
              <h6 class="font-weight-light">Sign in to manage ResumeSathi content.</h6>

              <form method="POST" class="pt-3">
                  @csrf
                <div class="form-group">
                  <input type="email" name="email" value="{{ old('email') }}"  class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Username">
                  @if ($errors->has('email'))
                  <div class="mb-2">
                      <span class="text-danger  float-left">{{ $errors->first('email') }}</span><br>
                  </div>
                  @endif
                </div>
                <div class="form-group">
                  <input type="password" name="password" value="{{ old('password') }}"  class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
                  @if ($errors->has('password'))
                  <div class="mb-2">
                      <span class="text-danger  float-left">{{ $errors->first('password') }}</span><br>
                  </div>
                  @endif
                </div>
                <div class="mt-3">
                  <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN IN</button>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" name="remember_me" value="remember" class="form-check-input">
                      Keep me signed in
                    </label>
                  </div>
                  <a href="#" class="auth-link text-black">Forgot password?</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <script src="{{ asset('dashboard-assets/vendors/js/vendor.bundle.base.js') }}"></script>
</body>
</html>
