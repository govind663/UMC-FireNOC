<!doctype html>
<html lang="en">

    <head>

        <meta charset="utf-8">

        <title>UMC-Fire NOC | New Business NOC</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description">
        <meta content="Themesdesign" name="author">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ url('/') }}/assets/logo/favicon.ico">

        <link href="{{ url('/') }}/assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css">
        <link href="{{ url('/') }}/assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
        <link href="{{ url('/') }}/assets/libs/spectrum-colorpicker2/spectrum.min.css" rel="stylesheet" type="text/css">
        <link href="{{ url('/') }}/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet">

        <!-- Layout Js -->
        <script src="{{ url('/') }}/assets/js/layout.js"></script>
        <!-- Bootstrap Css -->
        <link href="{{ url('/') }}/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{ url('/') }}/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{ url('/') }}/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
        <style>

        </style>
    </head>

    <style>
        .select2 {
            border: 1px solid rgb(7, 147, 165);
            border-radius: 5px;
        }

        .letter {
            margin: 0 auto;
            text-align: justify;
            line-height: 1.6;
        }
        .header {
            text-align: center;
            font-weight: bold;
            font-size: 24px;
        }
        .date {
            text-align: right;
        }
        .signature {
            text-align: right;
            margin-top: 40px;
        }
        @page {
            margin: 0;
        }
    </style>

    <body data-topbar="colored" data-layout="horizontal">

        <!-- Begin page -->
        <div id="layout-wrapper">

            @include('common.citizen.header.header')

            <div class="main-content">

                <div class="page-content">

                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-body">
                                    <div class="invoice-title">
                                        <h4 class="float-end font-size-15">Invoice #DS0204 <span class="badge bg-success font-size-12 ms-2">Paid</span></h4>
                                        <div class="mb-4">
                                            <img src="assets/images/logo-light.png" alt="logo" height="28">
                                        </div>
                                        <div class="text-muted">
                                            <p class="mb-1">3184 Spruce Drive Pittsburgh, PA 15201</p>
                                            <p class="mb-1"><i class="mdi mdi-email-outline me-1"></i> xyz@987.com</p>
                                            <p><i class="mdi mdi-phone-outline me-1"></i> 012-345-6789</p>
                                        </div>
                                    </div>

                                    <hr class="my-4">

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="text-muted">
                                                <h5 class="font-size-16 mb-3">Billed To:</h5>
                                                <h5 class="font-size-15 mb-1">Steven Deese</h5>
                                                <p class="mb-0">4068 Post Avenue Newfolden, MN 56738</p>
                                                <p class="mb-0">stevendeese@armyspy.com</p>
                                                <p class="mb-0">001-234-5678</p>
                                            </div>
                                        </div>
                                        <!-- end col -->
                                        <div class="col-sm-6">
                                            <div class="text-muted text-sm-end">
                                                <div>
                                                    <h5 class="font-size-15 mb-1">Invoice No:</h5>
                                                    <p class="mb-0">#DZ0112</p>
                                                </div>
                                                <div class="mt-3">
                                                    <h5 class="font-size-15 mb-1">Invoice Date:</h5>
                                                    <p class="mb-0">12 Feb, 2023</p>
                                                </div>
                                                <div class="mt-3">
                                                    <h5 class="font-size-15 mb-1">Order No:</h5>
                                                    <p class="mb-0">#1123456</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end col -->
                                    </div>
                                    <!-- end row -->

                                    <div>
                                        <h5 class="font-size-15 mb-3">Order Summary</h5>

                                        <div class="table-responsive">
                                            <table class="table align-middle table-nowrap table-centered mb-0">
                                                <thead class="bg-light">
                                                    <tr>
                                                        <th style="width: 70px;">No.</th>
                                                        <th>Item</th>
                                                        <th>Price</th>
                                                        <th>Quantity</th>
                                                        <th class="text-end" style="width: 120px;">Total</th>
                                                    </tr>
                                                </thead><!-- end thead -->
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">01</th>
                                                        <td>
                                                            <div>
                                                                <h5 class="text-truncate font-size-14 mb-1">Black Strap A012</h5>
                                                                <p class="text-muted mb-0">Watch, Black</p>
                                                            </div>
                                                        </td>
                                                        <td>$ 245.50</td>
                                                        <td>1</td>
                                                        <td class="text-end">$ 245.50</td>
                                                    </tr>
                                                    <!-- end tr -->
                                                    <tr>
                                                        <th scope="row">02</th>
                                                        <td>
                                                            <div>
                                                                <h5 class="text-truncate font-size-14 mb-1">Stainless Steel S010</h5>
                                                                <p class="text-muted mb-0">Watch, Gold</p>
                                                            </div>
                                                        </td>
                                                        <td>$ 245.50</td>
                                                        <td>2</td>
                                                        <td class="text-end">$491.00</td>
                                                    </tr>
                                                    <!-- end tr -->
                                                    <tr>
                                                        <th scope="row" colspan="4" class="text-end">Sub Total</th>
                                                        <td class="text-end">$732.50</td>
                                                    </tr>
                                                    <!-- end tr -->
                                                    <tr>
                                                        <th scope="row" colspan="4" class="border-0 text-end">
                                                            Discount :</th>
                                                        <td class="border-0 text-end">- $25.50</td>
                                                    </tr>
                                                    <!-- end tr -->
                                                    <tr>
                                                        <th scope="row" colspan="4" class="border-0 text-end">
                                                            Shipping Charge :</th>
                                                        <td class="border-0 text-end">$20.00</td>
                                                    </tr>
                                                    <!-- end tr -->
                                                    <tr>
                                                        <th scope="row" colspan="4" class="border-0 text-end">
                                                            Tax</th>
                                                        <td class="border-0 text-end">$12.00</td>
                                                    </tr>
                                                    <!-- end tr -->
                                                    <tr>
                                                        <th scope="row" colspan="4" class="border-0 text-end">Total</th>
                                                        <td class="border-0 text-end"><h4 class="m-0 fw-semibold">$739.00</h4></td>
                                                    </tr>
                                                    <!-- end tr -->
                                                </tbody><!-- end tbody -->
                                            </table><!-- end table -->
                                        </div><!-- end table responsive -->
                                        <div class="d-print-none mt-4">
                                            <div class="float-end">
                                                <a href="javascript:window.print()" class="btn btn-success me-1"><i class="fa fa-print"></i></a>
                                                <a href="#" class="btn btn-primary w-md">Send</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div> <!-- container-fluid -->

                </div>
                <!-- End Page-content -->

                @include('common.citizen.footer.footer')

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
        <script src="{{ url('/') }}/assets/release/v2.0.1/script/monochrome/bundle.js"></script>

        <script src="{{ url('/') }}/assets/libs/select2/js/select2.min.js"></script>
        <script src="{{ url('/') }}/assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
        <script src="{{ url('/') }}/assets/libs/spectrum-colorpicker2/spectrum.min.js"></script>
        <script src="{{ url('/') }}/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
        <script src="{{ url('/') }}/assets/libs/admin-resources/bootstrap-filestyle/bootstrap-filestyle.min.js"></script>
        <script src="{{ url('/') }}/assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>

        <script src="{{ url('/') }}/assets/js/pages/form-advanced.init.js"></script>

        <script src="{{ url('/') }}/assets/js/app.js"></script>

    </body>
</html>
