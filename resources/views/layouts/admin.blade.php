<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg">

<head>

<meta charset="utf-8" />
<title>Golf Course | Admin</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
<meta content="Themesbrand" name="author" />
<!-- App favicon -->
<link rel="shortcut icon" href="assets/images/favicon.ico">

<link rel="stylesheet" href="{{ asset('libs/aos/aos.css') }}" />

<script src="{{ asset('js/layout.js') }}"></script>

<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />

<link rel="stylesheet" href="{{ asset('css/icons.min.css') }}" />

<link rel="stylesheet" href="{{ asset('css/app.min.css') }}" />

<link rel="stylesheet" href="{{ asset('css/custom.min.css') }}" />


{{-- boostrap CDN --}}
{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}

{{-- @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/login.css', 'resources/sass/admin.scss']) --}}


</head>
<style>
.menu-title{
color: #fff;
}

.menu-link{
color: #fff;
}

</style>
<body>
<!-- Begin page -->
<div id="layout-wrapper">

<header id="page-topbar">
<div class="layout-width">
<div class="navbar-header">
    <div class="d-flex">
        <!-- LOGO -->
        <div class="navbar-brand-box horizontal-logo">
            <a href="index.html" class="logo logo-dark">
                <span class="logo-sm">
                    <img src="assets/images/logo-sm.png" alt="" height="22">
                </span>
                <span class="logo-lg">
                    <img src="assets/images/logo-dark.png" alt="" height="17">
                </span>
            </a>

            <a href="index.html" class="logo logo-light">
                <span class="logo-sm">
                    <img src="assets/images/logo-sm.png" alt="" height="22">
                </span>
                <span class="logo-lg">
                    <img src="assets/images/logo-light.png" alt="" height="17">
                </span>
            </a>
        </div>

        {{-- <button type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger" id="topnav-hamburger-icon">
            <span class="hamburger-icon">
                <span></span>
                <span></span>
                <span></span>
            </span>
        </button> --}}

        <!-- App Search-->

    </div>

    <div class="d-flex align-items-center">


        <div class="dropdown ms-sm-3 header-item topbar-user" >
            <button type="button" class="btn" id="page-header-user-dropdown" data-bs-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span class="d-flex align-items-center">
                    <span class="text-start ms-xl-0">
                        <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">{{ Auth::user()->name }}</span>
                    </span>
                </span>
            </button>
            <div class="dropdown-menu dropdown-menu-end">
                <!-- item-->
                <h6 class="dropdown-header">{{ Auth::user()->name }}</h6>
                <!-- <a class="dropdown-item" href="pages-profile.html"><i
                        class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span
                        class="align-middle">Profile</span></a> -->


                        <a class="dropdown-item" href="{{ route('logout-admin') }}" onclick="event.preventDefault(); if(confirm('Are you sure you want to logout?')) { document.getElementById('logout-form').submit(); }">
                            <i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i>{{ __('Logout') }}
                        </a>


                <form id="logout-form" action="{{ route('logout-admin') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    </div>

</header>
    <!-- ========== App Menu ========== -->
    <div class="app-menu navbar-menu" style="background: #197f5a;">

        <div class="card py-2 px-3 m-2">
            <div class="row">
                <div class="col-5 text-center">
                    <img loading="lazy" src="{{asset('images/logo.png')}}" alt="..." width="80" height="80" >
                </div>
                <div class="col-1 mt-3 text-center">
                        Golf Company
                </div>
            </div>

        </div>

        <div id="scrollbar">
            <div class="container-fluid">

                <div id="two-column-menu">
                </div>
                
                @if(auth()->user()->role === "admin")
                <ul class="navbar-nav" id="navbar-nav">
                    <li class="menu-title text-white"><span data-key="t-menu">Menu</span></li>
                    <li class="nav-item">
                        <a class="nav-link menu-link text-white" href="{{route('member')}}">
                            <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Members</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link menu-link text-white" href="{{route('appointments')}}" >
                            <i class="ri-apps-2-line"></i> <span data-key="t-apps">Appointments</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link menu-link text-white" href="{{route('course')}}">
                            <i class="ri-layout-3-line"></i> <span data-key="t-layouts">Golf Course</span>
                        </a>
                    </li>
<!-- 
                    <li class="nav-item" >
                        <a class="nav-link menu-link text-white" href="{{route('schedules')}}">
                            <i class="ri-layout-3-line"></i> <span data-key="t-layouts">Schedules</span>
                        </a>
                    </li> -->

                    <li class="nav-item" >
                        <a class="nav-link menu-link text-white" href="{{route('usertype')}}">
                            <i class="ri-pages-line"></i> <span data-key="t-pages">User Type</span>
                        </a>
                    </li>
                    @endif

                    @if(auth()->user()->role === "finance")
                    <li class="nav-item" >
                        <a class="nav-link menu-link text-white" href="{{route('transaction')}}">
                            <i class="ri-pages-line"></i> <span data-key="t-pages">Transactions</span>
                        </a>
                    </li>

                    <li class="nav-item" >
                        <a class="nav-link menu-link text-white" href="{{route('transaction')}}">
                            <i class="ri-pages-line"></i> <span data-key="t-pages">Invoice</span>
                        </a>
                    </li>
                    @endif

                    @if(auth()->user()->role === "kiosk")
                    <li class="nav-item" >
                        <a class="nav-link menu-link text-white" href="{{route('kiosk')}}">
                            <i class="ri-pages-line"></i> <span data-key="t-pages">kiosk</span>
                        </a>
                    </li>
                    @endif


                    @if(auth()->user()->role === "services")
                    <li class="nav-item" >
                        <a class="nav-link menu-link text-white" href="{{route('services')}}">
                            <i class="ri-pages-line"></i> <span data-key="t-pages">Services</span>
                        </a>
                    </li>
                    @endif

                    @if(auth()->user()->role === "merchandise")
                    <li class="nav-item" >
                        <a class="nav-link menu-link text-white" href="{{route('merchandise')}}">
                            <i class="ri-pages-line"></i> <span data-key="t-pages">Merchandise</span>
                        </a>
                    </li>
                    @endif


                </ul>
            </div>
            <!-- Sidebar -->
        </div>
    </div>
    <!-- Left Sidebar End -->
    <div class="vertical-overlay"></div>
    <div class="main-content overflow-hidden">

        <div class="page-content">
            <div class="container-fluid">
                <main class="py-4">
                    @yield('content')
                </main>

            </div>
        </div>
    </div>


<!-- JAVASCRIPT -->
{{-- <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/libs/simplebar/simplebar.min.js"></script>
<script src="assets/libs/node-waves/waves.min.js"></script>
<script src="assets/libs/feather-icons/feather.min.js"></script>
<script src="assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
<script src="assets/js/plugins.js"></script>


<script src="assets/libs/aos/aos.js"></script>

<script src="assets/libs/prismjs/prism.js"></script>
<script src="assets/js/pages/animation-aos.init.js"></script>


<script src="assets/js/app.js"></script> --}}

<script src="{{ asset('libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('libs/node-waves/waves.min.js') }}"></script>
<script src="{{ asset('libs/feather-icons/feather.min.js') }}"></script>
<script src="{{ asset('pages/plugins/lord-icon-2.1.0.js') }}"></script>
<script src="{{ asset('js/plugins.js') }}"></script>
<!-- aos js -->
<script src="{{ asset('libs/aos/aos.js') }}"></script>
<!-- prismjs plugin -->
<script src="{{ asset('/libs/prismjs/prism.js') }}"></script>
<script src="{{ asset('/js/pages/animation-aos.init.js') }}"></script>
    <!-- App js -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
