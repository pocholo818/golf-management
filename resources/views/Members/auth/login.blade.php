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
    
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 col-xl-5">
            <div class="card mt-4">

                <div class="card-body p-4">
                    <div class="text-center mt-2">
                        <h5 class="text-primary">Welcome Back !</h5>
                        <p class="text-muted">Golf Course Membership</p>
                    </div>
                    <div class="p-2 mt-4">

@if (session('warning'))
    <div id="warning-message" class="alert alert-danger" align="center">
        {{ session('warning') }}
    </div>
@endif

                        <form  action="{{ route('authenticate') }}" method="post" enctype="multipart/form-data" class="row g-3">
                            {!! csrf_field() !!}

                            <div class="mb-3">
                                <label for="username" class="form-label">Email</label>
                                <input type="text" name="email" class="form-control" id="email"
                                    placeholder="Enter Email">
                            </div>

                            <div class="mb-3">
                                <div class="float-end">
                                    <a href="auth-pass-reset-basic.html" class="text-muted">Forgot password?</a>
                                </div>
                                <label class="form-label" for="password-input">Password</label>
                                <div class="position-relative auth-pass-inputgroup mb-3">
                                    <input type="password" class="form-control pe-5" placeholder="Enter password"
                                        name="password" id="password-input">
                                                         <button
                                        class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted" type="button" name="password" id="password-addon" onclick="togglePassword()"> <i
                                            class="ri-eye-fill align-middle"></i></button>
                                </div>
                            </div>

                            <script>
                                function togglePassword() {
                                    var passwordInput = document.getElementById("password-input");
                                    var passwordAddon = document.getElementById("password-addon");
                                    if (passwordInput.type === "password") {
                                        passwordInput.type = "text";
                                        passwordAddon.innerHTML = '<i class="ri-eye-off-fill align-middle"></i>';
                                    } else {
                                        passwordInput.type = "password";
                                        passwordAddon.innerHTML = '<i class="ri-eye-fill align-middle"></i>';
                                    }
                                }
                            </script>
                            
                            {{-- <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="auth-remember-check">
                            <label class="form-check-label" for="auth-remember-check">Remember me</label>
                        </div> --}}

                            <div class="mt-4">
                                <button class="btn btn-success w-100" type="submit">Sign In</button>
                            </div>

                            <div class="mt-4 text-center">
                                <div class="signin-other-title">
                                    <h5 class="fs-13 mb-4 title">Terms & Condition</h5>
                                </div>
                                <div>
                                    {{-- <button class="btn btn-outline-success w-100" type="submit">Request Account</button> --}}
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->

            <div class="mt-4 text-center">
                {{-- <p class="mb-0">Terms & Condition
                    <a href="auth-signup-basic.html" class="fw-semibold text-primary text-decoration-underline"> Signup </a> 
                </p> --}}
            </div>

        </div>
    </div>

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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</body>
</html>