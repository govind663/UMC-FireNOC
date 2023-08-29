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



    </head>

    <body data-topbar="colored" data-layout="horizontal">

        <!-- Begin page -->
        <div id="layout-wrapper">
            @include('common.header.header')

            <!-- Start main content-->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-md flex-shrink-0">
                                                <span class="avatar-title bg-subtle-primary text-primary rounded fs-2">
                                                    <i class="uim uim-briefcase"></i>
                                                </span>
                                            </div>
                                            <div class="flex-grow-1 overflow-hidden ms-4">
                                                <p class="text-muted text-truncate font-size-15 mb-2"> Total Earnings</p>
                                                <h3 class="fs-4 flex-grow-1 mb-3">34,123.20 <span class="text-muted font-size-16">USD</span></h3>
                                                <p class="text-muted mb-0 text-truncate"><span class="badge bg-subtle-success text-success font-size-12 fw-normal me-1"><i class="mdi mdi-arrow-top-right"></i> 2.8% Increase</span> vs last month</p>
                                            </div>
                                            <div class="flex-shrink-0 align-self-start">
                                                <div class="dropdown">
                                                    <a class="dropdown-toggle btn-icon border rounded-circle" href="#"
                                                        data-bs-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <i class="ri-more-2-fill text-muted font-size-16"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item" href="#">Yearly</a>
                                                        <a class="dropdown-item" href="#">Monthly</a>
                                                        <a class="dropdown-item" href="#">Weekly</a>
                                                        <a class="dropdown-item" href="#">Today</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-md flex-shrink-0">
                                                <span class="avatar-title bg-subtle-primary text-primary rounded fs-2">
                                                    <i class="uim uim-layer-group"></i>
                                                </span>
                                            </div>
                                            <div class="flex-grow-1 overflow-hidden ms-4">
                                                <p class="text-muted text-truncate font-size-15 mb-2"> Total Orders</p>
                                                <h3 class="fs-4 flex-grow-1 mb-3">63,234 <span class="text-muted font-size-16">NOU</span></h3>
                                                <p class="text-muted mb-0 text-truncate"><span class="badge bg-subtle-danger text-danger font-size-12 fw-normal me-1"><i class="mdi mdi-arrow-bottom-left"></i> 7.8% Loss</span> vs last month</p>
                                            </div>
                                            <div class="flex-shrink-0 align-self-start">
                                                <div class="dropdown">
                                                    <a class="dropdown-toggle btn-icon border rounded-circle" href="#"
                                                        data-bs-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <i class="ri-more-2-fill text-muted font-size-16"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item" href="#">Yearly</a>
                                                        <a class="dropdown-item" href="#">Monthly</a>
                                                        <a class="dropdown-item" href="#">Weekly</a>
                                                        <a class="dropdown-item" href="#">Today</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-md flex-shrink-0">
                                                <span class="avatar-title bg-subtle-primary text-primary rounded fs-2">
                                                    <i class="uim uim-scenery"></i>
                                                </span>
                                            </div>
                                            <div class="flex-grow-1 overflow-hidden ms-4">
                                                <p class="text-muted text-truncate font-size-15 mb-2"> Today Visitor</p>
                                                <h3 class="fs-4 flex-grow-1 mb-3">425,34 <span class="text-muted font-size-16">NOU</span></h3>
                                                <p class="text-muted mb-0 text-truncate"><span class="badge bg-subtle-success text-success font-size-12 fw-normal me-1"><i class="mdi mdi-arrow-top-right"></i> 4.6% Growth</span> vs last month</p>
                                            </div>
                                            <div class="flex-shrink-0 align-self-start">
                                                <div class="dropdown">
                                                    <a class="dropdown-toggle btn-icon border rounded-circle" href="#"
                                                        data-bs-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <i class="ri-more-2-fill text-muted font-size-16"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item" href="#">Yearly</a>
                                                        <a class="dropdown-item" href="#">Monthly</a>
                                                        <a class="dropdown-item" href="#">Weekly</a>
                                                        <a class="dropdown-item" href="#">Today</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-md flex-shrink-0">
                                                <span class="avatar-title bg-subtle-primary text-primary rounded fs-2">
                                                    <i class="uim uim-airplay"></i>
                                                </span>
                                            </div>
                                            <div class="flex-grow-1 overflow-hidden ms-4">
                                                <p class="text-muted text-truncate font-size-15 mb-2"> Total Expense</p>
                                                <h3 class="fs-4 flex-grow-1 mb-3">26,482.46 <span class="text-muted font-size-16">USD</span></h3>
                                                <p class="text-muted mb-0 text-truncate"><span class="badge bg-subtle-success text-success font-size-12 fw-normal me-1"><i class="mdi mdi-arrow-top-right"></i> 23% Increase</span> vs last month</p>
                                            </div>
                                            <div class="flex-shrink-0 align-self-start">
                                                <div class="dropdown">
                                                    <a class="dropdown-toggle btn-icon border rounded-circle" href="#"
                                                        data-bs-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <i class="ri-more-2-fill text-muted font-size-16"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item" href="#">Yearly</a>
                                                        <a class="dropdown-item" href="#">Monthly</a>
                                                        <a class="dropdown-item" href="#">Weekly</a>
                                                        <a class="dropdown-item" href="#">Today</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END ROW -->


                        {{-- <div class="row">
                           <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-header border-0 align-items-center d-flex pb-0">
                                        <h4 class="card-title mb-0 flex-grow-1">Latest Transaction</h4>
                                        <div>
                                            <div class="dropdown">
                                                <a class="dropdown-toggle text-reset" href="#" data-bs-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                    <span class="fw-semibold">Sort By:</span>
                                                    <span class="text-muted">Yearly<i class="mdi mdi-chevron-down ms-1"></i></span>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="#">Yearly</a>
                                                    <a class="dropdown-item" href="#">Monthly</a>
                                                    <a class="dropdown-item" href="#">Weekly</a>
                                                    <a class="dropdown-item" href="#">Today</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body pt-2">
                                        <div class="table-responsive">
                                            <table class="table align-middle table-nowrap mb-0">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 20px;">
                                                            <div class="form-check">
                                                                <input type="checkbox" class="form-check-input" id="customCheck1">
                                                                <label class="form-check-label" for="customCheck1">&nbsp;</label>
                                                            </div>
                                                        </th>
                                                        <th>Order ID</th>
                                                        <th>Billing Name</th>
                                                        <th>IP Address</th>
                                                        <th>Order Date</th>
                                                        <th>Total</th>
                                                        <th>Payment Method</th>
                                                        <th>Payment Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="form-check">
                                                                <input type="checkbox" class="form-check-input" id="customCheck2">
                                                                <label class="form-check-label" for="customCheck2">&nbsp;</label>
                                                            </div>
                                                        </td>
                                                        <td><a href="javascript: void(0);" class="text-body">#MB2540</a> </td>
                                                        <td><img src="{{ url('/') }}/assets/images/users/avatar-2.jpg" class="avatar-xs rounded-circle me-2" alt="..."> Neal Matthews</td>
                                                        <td><p class="mb-0">cs562xf452dd</p></td>
                                                        <td>
                                                            07 Oct, 2022
                                                        </td>
                                                        <td>
                                                            $400
                                                        </td>
                                                        <td>
                                                            <i class="fab fa-cc-mastercard me-1"></i> Mastercard
                                                        </td>
                                                        <td>
                                                            <span class="badge rounded badge-soft-success font-size-12">Completed</span>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex gap-3">
                                                                <a href="javascript:void(0);" class="btn btn-success btn-sm"><i class="mdi mdi-pencil"></i></a>
                                                                <a href="javascript:void(0);" class="btn btn-danger btn-sm"><i class="mdi mdi-delete"></i></a>
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            <div class="form-check">
                                                                <input type="checkbox" class="form-check-input" id="customCheck3">
                                                                <label class="form-check-label" for="customCheck3">&nbsp;</label>
                                                            </div>
                                                        </td>
                                                        <td><a href="javascript: void(0);" class="text-body">#MB2541</a> </td>
                                                        <td><img src="{{ url('/') }}/assets/images/users/avatar-3.jpg" class="avatar-xs rounded-circle me-2" alt="..."> Jamal Burnett</td>
                                                        <td><p class="mb-0">ar252xf658dd</p></td>
                                                        <td>
                                                            07 Oct, 2022
                                                        </td>
                                                        <td>
                                                            $380
                                                        </td>

                                                        <td>
                                                            <i class="fab fa-cc-visa me-1"></i> Visa
                                                        </td>
                                                        <td>
                                                            <span class="badge rounded badge-soft-danger font-size-12">Cancel</span>
                                                        </td>
                                                        <td>
                                                           <div class="d-flex gap-3">
                                                                <a href="javascript:void(0);" class="btn btn-success btn-sm"><i class="mdi mdi-pencil"></i></a>
                                                                <a href="javascript:void(0);" class="btn btn-danger btn-sm"><i class="mdi mdi-delete"></i></a>
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            <div class="form-check">
                                                                <input type="checkbox" class="form-check-input" id="customCheck4">
                                                                <label class="form-check-label" for="customCheck4">&nbsp;</label>
                                                            </div>
                                                        </td>
                                                        <td><a href="javascript: void(0);" class="text-body">#MB2542</a> </td>
                                                        <td><img src="{{ url('/') }}/assets/images/users/avatar-4.jpg" class="avatar-xs rounded-circle me-2" alt="..."> Juan Mitchell</td>
                                                        <td><p class="mb-0">op632xf223dd</p></td>
                                                        <td>
                                                            06 Oct, 2022
                                                        </td>
                                                        <td>
                                                            $384
                                                        </td>
                                                        <td>
                                                            <i class="fab fa-cc-paypal me-1"></i> Paypal
                                                        </td>
                                                        <td>
                                                            <span class="badge rounded badge-soft-success font-size-12">Completed</span>
                                                        </td>
                                                        <td>
                                                           <div class="d-flex gap-3">
                                                                <a href="javascript:void(0);" class="btn btn-success btn-sm"><i class="mdi mdi-pencil"></i></a>
                                                                <a href="javascript:void(0);" class="btn btn-danger btn-sm"><i class="mdi mdi-delete"></i></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="form-check">
                                                                <input type="checkbox" class="form-check-input" id="customCheck5">
                                                                <label class="form-check-label" for="customCheck5">&nbsp;</label>
                                                            </div>
                                                        </td>
                                                        <td><a href="javascript: void(0);" class="text-body">#MB2543</a> </td>
                                                        <td><img src="{{ url('/') }}/assets/images/users/avatar-5.jpg" class="avatar-xs rounded-circle me-2" alt="..."> Barry Dick</td>
                                                        <td><p class="mb-0">ty756xf985dd</p></td>
                                                        <td>
                                                            05 Oct, 2022
                                                        </td>
                                                        <td>
                                                            $412
                                                        </td>
                                                        <td>
                                                            <i class="fab fa-cc-mastercard me-1"></i> Mastercard
                                                        </td>
                                                        <td>
                                                            <span class="badge rounded badge-soft-success font-size-12">Completed</span>
                                                        </td>
                                                        <td>
                                                           <div class="d-flex gap-3">
                                                                <a href="javascript:void(0);" class="btn btn-success btn-sm"><i class="mdi mdi-pencil"></i></a>
                                                                <a href="javascript:void(0);" class="btn btn-danger btn-sm"><i class="mdi mdi-delete"></i></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="form-check">
                                                                <input type="checkbox" class="form-check-input" id="customCheck6">
                                                                <label class="form-check-label" for="customCheck6">&nbsp;</label>
                                                            </div>
                                                        </td>
                                                        <td><a href="javascript: void(0);" class="text-body">#MB2544</a> </td>
                                                        <td><img src="{{ url('/') }}/assets/images/users/avatar-6.jpg" class="avatar-xs rounded-circle me-2" alt="..."> Ronald Taylor</td>
                                                        <td><p class="mb-0">jf754xf431dd</p></td>
                                                        <td>
                                                            04 Oct, 2022
                                                        </td>
                                                        <td>
                                                            $404
                                                        </td>
                                                        <td>
                                                            <i class="fab fa-cc-visa me-1"></i> Visa
                                                        </td>
                                                        <td>
                                                            <span class="badge rounded badge-soft-warning font-size-12">Shipping</span>
                                                        </td>
                                                        <td>
                                                           <div class="d-flex gap-3">
                                                                <a href="javascript:void(0);" class="btn btn-success btn-sm"><i class="mdi mdi-pencil"></i></a>
                                                                <a href="javascript:void(0);" class="btn btn-danger btn-sm"><i class="mdi mdi-delete"></i></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="form-check">
                                                                <input type="checkbox" class="form-check-input" id="customCheck7">
                                                                <label class="form-check-label" for="customCheck7">&nbsp;</label>
                                                            </div>
                                                        </td>
                                                        <td><a href="javascript: void(0);" class="text-body">#MB2545</a> </td>
                                                        <td><img src="{{ url('/') }}/assets/images/users/avatar-7.jpg" class="avatar-xs rounded-circle me-2" alt="..."> Jacob Hunter</td>
                                                        <td><p class="mb-0">fd964xf467dd</p></td>
                                                        <td>
                                                            04 Oct, 2022
                                                        </td>
                                                        <td>
                                                            $392
                                                        </td>
                                                        <td>
                                                            <i class="fab fa-cc-paypal me-1"></i> Paypal
                                                        </td>
                                                        <td>
                                                            <span class="badge rounded badge-soft-success font-size-12">Completed</span>
                                                        </td>
                                                        <td>
                                                           <div class="d-flex gap-3">
                                                                <a href="javascript:void(0);" class="btn btn-success btn-sm"><i class="mdi mdi-pencil"></i></a>
                                                                <a href="javascript:void(0);" class="btn btn-danger btn-sm"><i class="mdi mdi-delete"></i></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- end table-responsive -->
                                    </div>
                                </div>
                           </div>
                        </div> --}}

                    </div>

                </div>
                <!-- End Page-content -->

                @include('common.footer.footer')

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
    </body>
</html>
