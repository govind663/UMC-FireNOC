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
        @include('common.citizen.header.header')

        <!-- Start main content-->
        <div class="main-content">


            <div class="page-content">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-xl-4 col-sm-6">
                            <div class="card text-black" style="border: 1px solid black;">
                                <div class="card-header text-light" style="background: #08806a;">
                                    <h5 class="card-title mb-0 text-white text-center">
                                        <i class="fas fa-city"></i>&nbsp;
                                        Business NOC
                                    </h5>
                                </div>
                                <div class="card-body text-white">
                                    <div id="cardCollpase3" class="collapse p-3 show">
                                        <div class="row" style="float:left;">
                                            <div class="box widget-box-one widget-two-custom">
                                                <h3 class="mb-2">
                                                    <button type="button" class="btn btn-primary  waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg_1">New</button>
                                                </h3>
                                            </div>
                                        </div>
                                        <div class="row" style="float:right;">
                                            <div class="box widget-box-one widget-two-custom">
                                                <h3 class="mb-2">
                                                    <button type="button" class="btn btn-primary  waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg_2">Renew</button>
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-sm-6">
                            <div class="card text-black" style="border: 1px solid black;">
                                <div class="card-header" style="background: #de0707;">
                                    <h5 class="card-title mb-0 text-white text-center">
                                        <i class="fas fa-clinic-medical"></i>&nbsp;
                                        Hospital NOC
                                    </h5>
                                </div>
                                <div class="card-body text-white">
                                    <div id="cardCollpase3" class="collapse p-3 show">
                                        <div class="row" style="float:left;">
                                            <div class="box widget-box-one widget-two-custom">
                                                <h3 class="mb-2">
                                                    <button type="button" class="btn btn-primary  waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg_3">New</button>
                                                </h3>
                                            </div>
                                        </div>
                                        <div class="row" style="float:right;">
                                            <div class="box widget-box-one widget-two-custom">
                                                <h3 class="mb-2">
                                                    <button type="button" class="btn btn-primary  waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg_4">Renew</button>
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-xl-4 col-sm-6">
                            <div class="card text-black" style="border: 1px solid black;">
                                <div class="card-header" style="background: #E59F08;">
                                    <h5 class="card-title mb-0 text-white text-center">
                                        <i class="far fa-building"></i>&nbsp;
                                        Building NOC
                                    </h5>
                                </div>

                                <div class="card-body text-white">
                                    <div id="cardCollpase3" class="collapse p-3 show">
                                        <div class="row" style="float:left;">
                                            <div class="box widget-box-one widget-two-custom">
                                                <h3 class="mb-2">
                                                    <button type="button" class="btn btn-primary  waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg_5">Provisional</button>
                                                </h3>
                                            </div>
                                        </div>
                                        <div class="row" style="float:right;">
                                            <div class="box widget-box-one widget-two-custom">
                                                <h3 class="mb-2">
                                                    <button type="button" class="btn btn-primary  waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg_6">Final</button>
                                                </h3>
                                            </div>
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
                                            <p class="text-muted font-size-15 mb-2">Total Underprocess Business NOC</p>
                                            <h3 class="fs-4 flex-grow-1 mb-3">{{ $business_total_underprocess }}</h3>
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
                                            <p class="text-muted font-size-15 mb-2">Total Unpaid Business NOC</p>
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
                                            <p class="text-muted font-size-15 mb-2">Total Paid Business NOC</p>
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
                                            <p class="text-muted font-size-15 mb-2">Total Reviewed Business NOC</p>
                                            <h3 class="fs-4 flex-grow-1 mb-3">{{ $business_total_reviewed }}</h3>
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
                                            <p class="text-muted font-size-15 mb-2">Total Underprocess Hospital NOC</p>
                                            <h3 class="fs-4 flex-grow-1 mb-3">{{ $hospital_total_underprocess }}</h3>
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
                                            <p class="text-muted font-size-15 mb-2">Total Unpaid Hospital NOC</p>
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
                                            <p class="text-muted font-size-15 mb-2">Total Paid Hospital NOC</p>
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
                                            <p class="text-muted font-size-15 mb-2">Total Reviewed Hospital NOC</p>
                                            <h3 class="fs-4 flex-grow-1 mb-3">{{ $hospital_total_reviewed }}</h3>
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
                                            <p class="text-muted font-size-15 mb-2">Total Underprocess Building NOC</p>
                                            <h3 class="fs-4 flex-grow-1 mb-3">{{ $building_total_underprocess }}</h3>
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
                                            <p class="text-muted font-size-15 mb-2">Total Unpaid Building NOC</p>
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
                                            <p class="text-muted font-size-15 mb-2">Total Paid Building NOC</p>
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
                                            <p class="text-muted font-size-15 mb-2">Total Reviewed Building NOC</p>
                                            <h3 class="fs-4 flex-grow-1 mb-3">{{ $building_total_reviewed }}</h3>
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



            @include('common.citizen.footer.footer')

        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->


    {{-- Start Apply for New Bussiness Application Model --}}
    <div class="modal fade bs-example-modal-lg_1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-primary" id="myLargeModalLabel">Required Documents :</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <ol>
                                <li>Location of Place (Google Map Link)</li>
                                <li>Letter from License Holder regarding proper electric connection</li>
                                <li>Letter from connection holder and license regarding proper cooking gas connection</li>
                                <li>Shop License</li>
                                <li>Food License</li>
                                <li>Up-to-date receipt of Tax bill paid</li>
                                <li>Trade License (Kerosene/Other Petroleum Stock/ Explosive goods)</li>
                                <li>Commissioning Certificate of Gas Fitting</li>
                                <li>Commissioning Certificate of Fire extinguishers/ preventive equipments of I.S.I. Mark</li>
                                <li>Copy of Affidavit</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="{{ url('/new_business_noc/create') }}">
                        <button type="button" class="btn btn-primary  waves-effect waves-light">Apply For NOC</button>
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- Start Apply for Renew Bussiness Application Model --}}
    <div class="modal fade bs-example-modal-lg_2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-primary" id="myLargeModalLabel">Required Documents :</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <ol>
                                <li>Copy of Previous NOC</li>
                                <li>Letter from License Holder regarding proper electric connection</li>
                                <li>Letter from connection holder and license regarding proper cooking gas connection</li>
                                <li>Shop License</li>
                                <li>Food License</li>
                                <li>Up-to-date receipt of Tax bill paid</li>
                                <li>Trade License (Kerosene/Other Petroleum Stock/ Explosive goods)</li>
                                <li>Commissioning Certificate of Gas Fitting</li>
                                <li>Commissioning Certificate of Fire extinguishers/ preventive equipments of I.S.I. Mark</li>

                            </ol>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="{{ url('/renew_business_noc/create') }}">
                        <button type="button" class="btn btn-primary waves-effect waves-light">Apply For NOC</button>
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- Start Apply for New  Hospital Application Model --}}
    <div class="modal fade bs-example-modal-lg_3" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-primary" id="myLargeModalLabel">Required Documents :</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <ol>
                                <li>Location of Place (Google Map Link)</li>
                                <li>Document Of Property</li>
                                <li>Letter from License Holder regarding proper electric connection</li>
                                <li>Shop License</li>
                                <li>Up-to-date receipt of Tax bill paid</li>
                                <li>Commissioning Certificate of Fire extinguishers/ preventive equipments of I.S.I. Mark</li>
                                <li>Copy of Affidavit</li>
                                <li>Corporation Registration certificate (FOR OLD HOSPITAL)</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="{{ url('/new_hospital_noc/create') }}">
                        <button type="button" class="btn btn-primary waves-effect waves-light">Apply For NOC</button>
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- Start Apply for Renew  Hospital Application Model --}}
    <div class="modal fade bs-example-modal-lg_4" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-primary" id="myLargeModalLabel">Required Documents :</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <ol>
                                <li>Copy of Previous NOC</li>
                                <li>Letter from License Holder regarding proper electric connection</li>
                                <li>Shop License</li>
                                <li>Up-to-date receipt of Tax bill paid</li>
                                <li>Commissioning Certificate of Fire extinguishers/ preventive equipments of I.S.I. Mark</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="{{ url('/renew_hospital_noc/create') }}">
                        <button type="button" class="btn btn-primary waves-effect waves-light">Apply For NOC</button>
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- Start Apply for Provisional Building Application Model --}}
    <div class="modal fade bs-example-modal-lg_5" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-primary" id="myLargeModalLabel">Required Documents :</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <ol>
                                <li>Maps of Proposed Construction</li>
                                <li>7/12 Extract/ City Survey Extract</li>
                                <li>Sanad/ Letter from S.D.O. Ulhasnagar</li>
                                <li>Title & Search Report from competent Authority</li>
                                <li>No dues certificate of Property& Water Tax</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="{{ url('/provisional_building_noc/create') }}">
                        <button type="button" class="btn btn-primary waves-effect waves-light">Apply For NOC</button>
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- Start Apply for Final Building Application Model --}}
    <div class="modal fade bs-example-modal-lg_6" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-primary" id="myLargeModalLabel">Required Documents :</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <ol>
                                <li>Map / Plan showing Cease Fire Equipments installed and Water Supply arrangements in the building</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="{{ url('/final_building_noc/create') }}">
                        <button type="button" class="btn btn-primary waves-effect waves-light">Apply For NOC</button>
                    </a>
                </div>
            </div>
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

    <!-- App js -->
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
