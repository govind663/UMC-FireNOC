<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <title>UMC-Fire NOC | Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="UMC-Fire NOC" name="description">
    <meta content="Themesdesign" name="author">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ url('/') }}/assets/logo/favicon.ico">

    <!-- Layout Js -->
    <script src="{{ url('/') }}/assets/js/layout.js"></script>

    <!-- Bootstrap Css -->
    <link href="{{ url('/') }}/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css">

    <!-- Icons Css -->
    <link href="{{ url('/') }}/assets/css/icons.min.css" rel="stylesheet" type="text/css">

    <!-- App Css-->
    <link href="{{ url('/') }}/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css">

    <!-- Toaster Message -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
</head>

<style>
    .auth-maintenance {
        background-image: url("{{ url('/') }}/assets/logo/noc_bg.jpg") !important;
        background-size: cover;
        background-position: center;
    }

    .text-uppercase {
        text-transform: uppercase !important;
        font-size: 27px;
    }

</style>

<body>
    <div class="auth-maintenance d-flex align-items-center min-vh-100">
        <div class="container auth-maintenance">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="auth-full-page-content d-flex min-vh-100 ">
                        <div class="w-100">

                            <div class="d-flex flex-column h-100 py-0 py-xl-3">

                                <div class="row g-0 d-flex justify-content-center">
                                    <div class="col-lg-8 mt-2">
                                        <div class="card my-auto overflow-hidden">
                                            <div class="p-lg-5 p-4">
                                                <div class="text-center mb-4">
                                                    <a href="{{ url('/') }}" class="">
                                                        <img src="{{ url('/') }}/assets/logo/umc_logo.png" alt="UMC-firenoc" height="200" width="260" class="auth-logo logo-dark mx-auto">
                                                        <img src="{{ url('/') }}/assets/logo/umc_logo.png" alt="UMC-firenoc" height="200" width="260" class="auth-logo logo-light mx-auto">
                                                    </a>

                                                    <div class="row">
                                                        <h4 class="text-uppercase mb-1">Fire Brigade NOC Application</h4>
                                                    </div>
                                                    <div class="row">
                                                        <h3 class="text-uppercase mb-1">फायर ब्रिगेड एनओसी अर्ज</h3>
                                                    </div>
                                                </div>

                                                <div class="account-content mt-4">
                                                    <div class="row">
                                                        <div class="col-12 text-center">
                                                            <h5 class="mb-0">You can Apply NOC for below types</h5>
                                                        </div>
                                                        <div class="col-md-4 col-sm-12">
                                                            <p class="mb-2">
                                                                <ul>
                                                                    <li>New NOC for Business</li>
                                                                    <li>Renewal NOC for Business</li>
                                                                </ul>
                                                            </p>
                                                        </div>
                                                        <div class="col-md-4 col-sm-12">
                                                            <p class="mb-2">
                                                                <ul>
                                                                    <li>New NOC for Hospital</li>
                                                                    <li>Renewal NOC for Hospital</li>
                                                                </ul>
                                                            </p>
                                                        </div>
                                                        <div class="col-md-4 col-sm-12">
                                                            <p class="mb-2">
                                                                <ul>
                                                                    <li>Provisional NOC for Building</li>
                                                                    <li>Final NOC for Building</li>
                                                                </ul>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="mt-4 text-center">
                                                    <a href="{{ url('/citizen/login') }}" class="fw-medium text-primary">
                                                        <button type="button" class="btn btn-primary btn-lg waves-effect waves-light">Apply for NOC</button>
                                                    </a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <script src="{{ url('/') }}/assets/libs/jquery/jquery.min.js"></script>
    <script src="{{ url('/') }}/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ url('/') }}/assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="{{ url('/') }}/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="{{ url('/') }}/assets/libs/node-waves/waves.min.js"></script>

    <!-- Icon -->
    <script src="{{ url('/') }}/assets/release/v2.0.1/script/monochrome/bundle.js"></script>

    <script src="{{ url('/') }}/assets/js/app.js"></script>

    <script>
        @if(Session::has('message'))
        toastr.options = {
            "closeButton": true
            , "progressBar": true
        }
        toastr.success("{{ session('message') }}");
        @endif

        @if(Session::has('error'))
        toastr.options = {
            "closeButton": true
            , "progressBar": true
        }
        toastr.error("{{ session('error') }}");
        @endif

        @if(Session::has('info'))
        toastr.options = {
            "closeButton": true
            , "progressBar": true
        }
        toastr.info("{{ session('info') }}");
        @endif

        @if(Session::has('warning'))
        toastr.options = {
            "closeButton": true
            , "progressBar": true
        }
        toastr.warning("{{ session('warning') }}");
        @endif

    </script>

</body>

</html>
