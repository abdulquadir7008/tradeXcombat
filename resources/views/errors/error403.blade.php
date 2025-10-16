<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="light" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>
    <meta charset="utf-8" />
    <title>403 Error | TradexCombat - Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Minimal Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

    <!-- Layout config Js -->
    <script src="{{ asset('assets/js/layout.js') }}"></script>
    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="{{ asset('assets/css/custom.min.css') }}" rel="stylesheet" type="text/css" />
    <style>
        .bg-error{
            background-color:rgb(21 21 22) !important;
        }
    </style>
</head>

<body>
    <section class="auth-page-wrapper-2 py-4 position-relative d-flex align-items-center justify-content-center min-vh-100 bg-light">
        <div class="container">
            <div class="row g-0">
                <div class="col-lg-5">
                    <div class="auth-card card bg-error h-100 rounded-0 rounded-start border-0 d-flex align-items-center justify-content-center overflow-hidden p-4">
                        <div class="auth-image">
                            <img src="{{ asset('assets/images/Logo-2.png') }}" alt="" height="42" />
                            <img src="{{ asset('assets/images/effect-pattern/auth-effect-2.png') }}" alt="" class="auth-effect-2" />
                            <img src="{{ asset('assets/images/effect-pattern/auth-effect.png') }}" alt="" class="auth-effect" />
                            <img src="{{ asset('assets/images/effect-pattern/auth-effect.png') }}" alt="" class="auth-effect-3" />
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="card mb-0 rounded-0 rounded-end border-0">
                        <div class="card-body p-4 p-sm-5 m-lg-4 text-center">
                            <div class="text-center px-5">
                                <h1 class="error-title mb-0">{{ $error_code }}</h1>
                            </div>
                            <div class="mt-2 text-center">
                                <div class="position-relative">
                                    <h4 class="fs-18 error-subtitle text-uppercase mb-0">Unauthorized Access</h4>
                                    <p class="fs-15 text-muted mt-3">
                                       You are not authorized to access this page.
                                    </p>
                                    <div class="mt-4">
                                        <a href="{{ url('/') }}" class="btn btn-primary"><i class="mdi mdi-home me-1"></i>Back to home</a>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section>

    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
    <script src="{{ asset('assets/js/plugins.js') }}"></script>
</body>

</html>
