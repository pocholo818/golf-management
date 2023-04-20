<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg">

    <head>

        <meta charset="utf-8" />
        <title>Login | Member</title>
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



    </head>
    <body>
     
                        <div class="container-fluid">
                            <main class="py-4">
                                @yield('content')
                            </main>
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
