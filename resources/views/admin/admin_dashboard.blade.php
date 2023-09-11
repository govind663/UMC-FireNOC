<!doctype html>
<html lang="en">

    <head>

        <meta charset="utf-8" />
        <title>UMC-FireNOC | Home</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ url('/') }}/assets/logo/favicon.ico">

        <!-- Layout Js -->
        <script src="{{ url('/') }}/assets/js/layout.js"></script>
        <!-- Bootstrap Css -->
        <link href="{{ url('/') }}/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{ url('/') }}/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{ url('/') }}/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

        <!-- Toaster Message -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    </head>

    <body data-topbar="colored" data-layout="horizontal">

        <!-- Begin page -->
        <div id="layout-wrapper">
            @include('common.admin.header.header')

            <!-- Start main content-->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card" style="border: 1px solid black;">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-md flex-shrink-0">
                                                <span class="avatar-title bg-subtle-primary text-primary rounded fs-2">
                                                    <i class="uim uim-briefcase"></i>
                                                </span>
                                            </div>
                                            <div class="flex-grow-1 overflow-hidden ms-4">
                                                <p class="text-muted font-size-15 mb-2"> Total Citizens</p>
                                                <h3 class="fs-4 flex-grow-1 mb-3">{{ $total_citizen }}</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <h2 class="card-header mb-3 text-primary">
                            <i class="fas fa-city"></i>&nbsp;
                            Business NOC
                        </h2>
                        <div class="row">

                            <div class="col-xl-3 col-md-6">
                                <div class="card" style="border: 1px solid black;">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-md flex-shrink-0">
                                                <span class="avatar-title bg-subtle-primary text-primary rounded fs-2">
                                                    <i class="uim uim-briefcase"></i>
                                                </span>
                                            </div>
                                            <div class="flex-grow-1 overflow-hidden ms-4">
                                                <p class="text-muted font-size-15 mb-2"> Total Pending Business NOC</p>
                                                <h3 class="fs-4 flex-grow-1 mb-3">{{ $business_total_pending }}</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="card" style="border: 1px solid black;">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-md flex-shrink-0">
                                                <span class="avatar-title bg-subtle-primary text-primary rounded fs-2">
                                                    <i class="uim uim-briefcase"></i>
                                                </span>
                                            </div>
                                            <div class="flex-grow-1 overflow-hidden ms-4">
                                                <p class="text-muted font-size-15 mb-2">Total Paid Business <br> NOC</p>
                                                <h3 class="fs-4 flex-grow-1 mb-3">{{ $business_total_paid }}</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="card" style="border: 1px solid black;">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-md flex-shrink-0">
                                                <span class="avatar-title bg-subtle-primary text-primary rounded fs-2">
                                                    <i class="uim uim-briefcase"></i>
                                                </span>
                                            </div>
                                            <div class="flex-grow-1 overflow-hidden ms-4">
                                                <p class="text-muted font-size-15 mb-2">Total Unpaid Business <br> NOC</p>
                                                <h3 class="fs-4 flex-grow-1 mb-3">{{ $business_total_unpaid }}</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6">
                                    <div class="card" style="border: 1px solid black;">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div class="avatar-md flex-shrink-0">
                                                    <span class="avatar-title bg-subtle-primary text-primary rounded fs-2">
                                                        <i class="uim uim-briefcase"></i>
                                                    </span>
                                                </div>
                                                <div class="flex-grow-1 overflow-hidden ms-4">
                                                    <p class="text-muted font-size-15 mb-2"> Total Approved Business NOC</p>
                                                    <h3 class="fs-4 flex-grow-1 mb-3">{{ $business_total_approved }}</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-3 col-md-6">
                                    <div class="card" style="border: 1px solid black;">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div class="avatar-md flex-shrink-0">
                                                    <span class="avatar-title bg-subtle-primary text-primary rounded fs-2">
                                                        <i class="uim uim-briefcase"></i>
                                                    </span>
                                                </div>
                                                <div class="flex-grow-1 overflow-hidden ms-4">
                                                    <p class="text-muted font-size-15 mb-2"> Total Rejected Business NOC</p>
                                                    <h3 class="fs-4 flex-grow-1 mb-3">{{ $business_total_rejected }}</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                        </div>

                        <h2 class="card-header mb-3 text-primary">
                            <i class="fas fa-clinic-medical"></i>&nbsp;
                            Hospital NOC
                        </h2>
                        <div class="row">

                            <div class="col-xl-3 col-md-6">
                                <div class="card" style="border: 1px solid black;">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-md flex-shrink-0">
                                                <span class="avatar-title bg-subtle-primary text-primary rounded fs-2">
                                                    <i class="uim uim-briefcase"></i>
                                                </span>
                                            </div>
                                            <div class="flex-grow-1 overflow-hidden ms-4">
                                                <p class="text-muted font-size-15 mb-2"> Total Pending Hospital NOC</p>
                                                <h3 class="fs-4 flex-grow-1 mb-3">{{ $hospital_total_pending }}</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="card" style="border: 1px solid black;">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-md flex-shrink-0">
                                                <span class="avatar-title bg-subtle-primary text-primary rounded fs-2">
                                                    <i class="uim uim-briefcase"></i>
                                                </span>
                                            </div>
                                            <div class="flex-grow-1 overflow-hidden ms-4">
                                                <p class="text-muted font-size-15 mb-2">Total Paid Hospital <br> NOC</p>
                                                <h3 class="fs-4 flex-grow-1 mb-3">{{ $hospital_total_unpaid }}</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="card" style="border: 1px solid black;">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-md flex-shrink-0">
                                                <span class="avatar-title bg-subtle-primary text-primary rounded fs-2">
                                                    <i class="uim uim-briefcase"></i>
                                                </span>
                                            </div>
                                            <div class="flex-grow-1 overflow-hidden ms-4">
                                                <p class="text-muted font-size-15 mb-2">Total Unpaid Hospital <br> NOC</p>
                                                <h3 class="fs-4 flex-grow-1 mb-3">{{ $hospital_total_paid }}</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6">
                                    <div class="card" style="border: 1px solid black;">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div class="avatar-md flex-shrink-0">
                                                    <span class="avatar-title bg-subtle-primary text-primary rounded fs-2">
                                                        <i class="uim uim-briefcase"></i>
                                                    </span>
                                                </div>
                                                <div class="flex-grow-1 overflow-hidden ms-4">
                                                    <p class="text-muted font-size-15 mb-2"> Total Approved Hospital NOC</p>
                                                    <h3 class="fs-4 flex-grow-1 mb-3">{{ $hospital_total_paid }}</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-3 col-md-6">
                                    <div class="card" style="border: 1px solid black;">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div class="avatar-md flex-shrink-0">
                                                    <span class="avatar-title bg-subtle-primary text-primary rounded fs-2">
                                                        <i class="uim uim-briefcase"></i>
                                                    </span>
                                                </div>
                                                <div class="flex-grow-1 overflow-hidden ms-4">
                                                    <p class="text-muted font-size-15 mb-2"> Total Rejected Hospital NOC</p>
                                                    <h3 class="fs-4 flex-grow-1 mb-3">{{ $hospital_total_rejected }}</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                        </div>

                        <h2 class="card-header mb-3 text-primary">
                            <i class="far fa-building"></i>&nbsp;
                            Building NOC
                        </h2>

                        <div class="row">

                            <div class="col-xl-3 col-md-6">
                                <div class="card" style="border: 1px solid black;">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-md flex-shrink-0">
                                                <span class="avatar-title bg-subtle-primary text-primary rounded fs-2">
                                                    <i class="uim uim-briefcase"></i>
                                                </span>
                                            </div>
                                            <div class="flex-grow-1 overflow-hidden ms-4">
                                                <p class="text-muted font-size-15 mb-2"> Total Pending Building NOC</p>
                                                <h3 class="fs-4 flex-grow-1 mb-3">{{ $building_total_pending }}</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="card" style="border: 1px solid black;">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-md flex-shrink-0">
                                                <span class="avatar-title bg-subtle-primary text-primary rounded fs-2">
                                                    <i class="uim uim-briefcase"></i>
                                                </span>
                                            </div>
                                            <div class="flex-grow-1 overflow-hidden ms-4">
                                                <p class="text-muted font-size-15 mb-2">Total Paid Building <br> NOC</p>
                                                <h3 class="fs-4 flex-grow-1 mb-3">{{ $building_total_paid }}</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="card" style="border: 1px solid black;">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-md flex-shrink-0">
                                                <span class="avatar-title bg-subtle-primary text-primary rounded fs-2">
                                                    <i class="uim uim-briefcase"></i>
                                                </span>
                                            </div>
                                            <div class="flex-grow-1 overflow-hidden ms-4">
                                                <p class="text-muted font-size-15 mb-2">Total Unpaid Building <br> NOC</p>
                                                <h3 class="fs-4 flex-grow-1 mb-3">{{ $building_total_unpaid }}</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6">
                                    <div class="card" style="border: 1px solid black;">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div class="avatar-md flex-shrink-0">
                                                    <span class="avatar-title bg-subtle-primary text-primary rounded fs-2">
                                                        <i class="uim uim-briefcase"></i>
                                                    </span>
                                                </div>
                                                <div class="flex-grow-1 overflow-hidden ms-4">
                                                    <p class="text-muted font-size-15 mb-2"> Total Approved Building NOC</p>
                                                    <h3 class="fs-4 flex-grow-1 mb-3">{{ $building_total_approved }}</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-3 col-md-6">
                                    <div class="card" style="border: 1px solid black;">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div class="avatar-md flex-shrink-0">
                                                    <span class="avatar-title bg-subtle-primary text-primary rounded fs-2">
                                                        <i class="uim uim-briefcase"></i>
                                                    </span>
                                                </div>
                                                <div class="flex-grow-1 overflow-hidden ms-4">
                                                    <p class="text-muted font-size-15 mb-2"> Total Rejected Building NOC</p>
                                                    <h3 class="fs-4 flex-grow-1 mb-3">{{ $building_total_rejected }}</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                        </div>

                    </div>

                </div>
                <!-- End Page-content -->

                @include('common.admin.footer.footer')

            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <!-- JAVASCRIPT -->
        <script src="{{ url('/') }}/assets/libs/jquery/jquery.min.js"></script>
        <script src="{{ url('/') }}/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="{{ url('/') }}/assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="{{ url('/') }}/assets/libs/simplebar/simplebar.min.js"></script>
        <script src="{{ url('/') }}/assets/libs/node-waves/waves.min.js"></script>

        <!-- Icon -->
        <script src="https://unicons.iconscout.com/release/v2.0.1/script/monochrome/bundle.js"></script>

        <!-- App js -->
        <script src="{{ url('/') }}/assets/js/app.js"></script>

        <script>
            @if(Session::has('message'))
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
                    toastr.success("{{ session('message') }}");
            @endif

            @if(Session::has('error'))
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
                    toastr.error("{{ session('error') }}");
            @endif

            @if(Session::has('info'))
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
                    toastr.info("{{ session('info') }}");
            @endif

            @if(Session::has('warning'))
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
                    toastr.warning("{{ session('warning') }}");
            @endif
        </script>
    </body>
</html>
