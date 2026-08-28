<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5 rs-admin-logo" href="{{ route('dashboard') }}"><img src="{{ asset('front-assets/images/logo/logo.svg') }}" alt="ResumeSathi"></a>
        <a class="navbar-brand brand-logo-mini rs-admin-logo-mini" href="{{ route('dashboard') }}"><img src="{{ asset('front-assets/images/logo/favicon.png') }}" alt="RS"></a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                    <span class="rs-avatar">{{ strtoupper(substr(Auth::user()->first_name ?? 'A', 0, 1)) }}</span>
                    <span class="rs-profile-copy">
                        <strong>{{ trim((Auth::user()->first_name ?? 'Admin') . ' ' . (Auth::user()->last_name ?? '')) }}</strong>
                        <small>Admin</small>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}">
                        <i class="ti-power-off text-primary"></i>
                        Logout
                    </a>
                </div>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
            data-toggle="offcanvas">
            <span class="icon-menu"></span>
        </button>
    </div>
</nav>
