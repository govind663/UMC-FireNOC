<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <title>UMC-Fire NOC | Login</title>
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

</style>

<body>
    <div class="auth-maintenance d-flex align-items-center min-vh-100">

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="auth-full-page-content d-flex min-vh-100 py-sm-5 py-4">
                        <div class="w-100">
                            <div class="d-flex flex-column h-100 py-0 py-xl-3">

                                <div class="row g-0 d-flex justify-content-center">
                                    <div class="col-lg-6">
                                        <div class="card my-auto overflow-hidden">
                                            <div class="p-lg-5 p-4">
                                                <div>
                                                    <div class="text-center mt-1">
                                                        <a href="{{ url('/') }}" class="">
                                                            <img src="{{ url('/') }}/assets/logo/umc_logo.png" alt="UMC-firenoc" height="160" width="250" class="auth-logo logo-dark mx-auto">
                                                            <img src="{{ url('/') }}/assets/logo/umc_logo.png" alt="UMC-firenoc" height="160" width="250" class="auth-logo logo-light mx-auto">
                                                        </a>
                                                        <h4 class="font-size-18">{{ __('Citizen Login') }}</h4>
                                                    </div>

                                                    <form class="auth-input" method="POST" action="{{ url('/citizen/login/store') }}" enctype="multipart/form">
                                                        @csrf

                                                        <div class="mb-2">
                                                            <label for="mobile_no" class="form-label">{{ __('Mobile Number') }}</label>
                                                            <input id="mobile_no" type="mobile_no" onkeypress='validate(event)' maxlength="10" class="form-control @error('mobile_no') is-invalid @enderror" name="mobile_no" value="{{ old('mobile_no') }}" autocomplete="mobile_no" autofocus placeholder="Enter Mobile Number">

                                                            @error('mobile_no')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label" for="password-input">{{ __('Password') }}</label>
                                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password" placeholder="Enter Password">

                                                            @error('password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>

                                                        <div class="mt-3">
                                                            {{-- <a  href="{{ url('/citizen/forget-password') }}" class="register-link text-primary float-end mb-1"><b>Forgot Password?</b></a> --}}
                                                            <button class="btn btn-primary w-100" type="submit">Sign In</button>
                                                        </div>

                                                    </form>
                                                </div>

                                                <div class="mt-4 text-center">
                                                    <p class="mb-0">Don't have an account ?
                                                        <a href="{{ url('/citizen/register') }}" class="fw-medium text-primary"> Register </a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end card -->


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

    <script>
        function validate(evt) {
            var theEvent = evt || window.event;

            // Handle paste
            if (theEvent.type === 'paste') {
                key = event.clipboardData.getData('text/plain');
            } else {
                // Handle key press
                var key = theEvent.keyCode || theEvent.which;
                key = String.fromCharCode(key);
            }
            var regex = /[0-9]|\./;
            if (!regex.test(key)) {
                theEvent.returnValue = false;
                if (theEvent.preventDefault) theEvent.preventDefault();
            }
        }

    </script>
</body>

</html>
