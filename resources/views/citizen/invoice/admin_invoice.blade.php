<!doctype html>
<html lang="en">

    <head>

        <meta charset="utf-8">

        <title>UMC-Fire NOC | Generate Invoice For Fire NOC</title>
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


    </head>

    <style>
        .select2 {
            border: 1px solid rgb(7, 147, 165);
            border-radius: 5px;
        }
        .card-body{
            border: 1px solid black;
            border-radius: 5px;
        }

        @page {
            margin: 0;
        }

        @media print {
            .card-body {
                border: 1px solid black;
                border-radius: 5px;
                padding: 20px;
            }
        }

        .text-muted {
            color: #0a0a0a!important;
        }

        .avatar-image {
            height: 110px;
            width: 110px;
            margin-bottom: 11px;
            border-radius: 3px;
            /*height: 4.6rem;*/
            /*width: 8.6rem;*/
        }
    </style>

    <body data-topbar="colored" data-layout="horizontal">

        <!-- Begin page -->
        <div id="layout-wrapper">

            @include('common.admin.header.header')

            <div class="main-content">

                <div class="page-content">

                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div  class="card">
                                    <div class="card-body p-4" style="border: 1px solid rgb(3, 155, 155);">

                                        <div class="invoice-title d-flex justify-content-between">
                                            <div class="col-3 float-md-start">
                                                <img src="{{ url('/') }}/assets/logo/logo_dark.png" alt="logo" height="120px" width="260px" />
                                            </div>
                                            <div class="col-3 text-muted float-md-end text-justify">
                                                <p class="mb-1">
                                                    <b>
                                                        Ulhasnagar Municipal Corporation
                                                        Near Chopda Court,
                                                        Ulhasnagar - 3,<br>
                                                        Pincode - 421 003,
                                                        Maharashtra.
                                                    </b>
                                                </p>
                                                <p class="mb-1"><b><i class="mdi mdi-email-outline me-1"></i> cfcumc@gmail.com</b></p>
                                                <p><b><i class="mdi mdi-phone-outline me-1"></i> 0251 2720150</b></p>
                                            </div>
                                        </div>

                                        <div class="row d-flex justify-content-center align-items-center">
                                            <div class="col-sm-4">
                                                <div class="text-muted">
                                                    <h5 class="font-size-16 mb-3 text-primary">
                                                        <b>Billed To : </b>
                                                    </h5>
                                                    <h5 class="font-size-15 mb-1">
                                                        {{ $data->l_name }} {{ $data->father_name }} {{ $data->f_name }}
                                                    </h5>
                                                    @if ($noc_mode == 1)
                                                    <p class="mb-0">{{ $data->society_name }}, {{ $data->house_name }}, {{ $data->flat_no }}, {{ $data->wing_name }}, {{ $data->road_name }}, {{ $data->area_name }} {{ $data->taluka_name }} ,<br> <b>Pincode : </b> {{ $data->taluka_name }}</p>
                                                    @elseif ($noc_mode == 2)
                                                    <p class="mb-0">{{ $data->society_name }}, {{ $data->house_name }}, {{ $data->flat_no }}, {{ $data->wing_name }}, {{ $data->road_name }}, {{ $data->area_name }} {{ $data->taluka_name }} ,<br> <b>Pincode : </b> {{ $data->taluka_name }}</p>
                                                    @elseif ($noc_mode == 3)
                                                    <p class="mb-0">{{ $data->hospital_name }}, {{ $data->house_name }}, {{ $data->flat_no }}, {{ $data->wing_name }}, {{ $data->road_name }}, {{ $data->area_name }} {{ $data->taluka_name }} ,<br> <b>Pincode : </b> {{ $data->taluka_name }}</p>
                                                    @elseif ($noc_mode == 4)
                                                    <p class="mb-0">{{ $data->hospital_name }}, {{ $data->house_name }}, {{ $data->flat_no }}, {{ $data->wing_name }}, {{ $data->road_name }}, {{ $data->area_name }} {{ $data->taluka_name }} ,<br> <b>Pincode : </b> {{ $data->taluka_name }}</p>
                                                    @elseif ($noc_mode == 5)
                                                    <p class="mb-0">{{ $data->society_name }}, {{ $data->house_name }}, {{ $data->flat_no }}, {{ $data->wing_name }}, {{ $data->road_name }}, {{ $data->area_name }} {{ $data->taluka_name }} ,<br> <b>Pincode : </b> {{ $data->taluka_name }}</p>
                                                    @elseif ($noc_mode == 6)
                                                    <p class="mb-0">{{ $data->society_name }}, {{ $data->house_name }}, {{ $data->flat_no }}, {{ $data->wing_name }}, {{ $data->road_name }}, {{ $data->area_name }} {{ $data->taluka_name }} ,<br> <b>Pincode : </b> {{ $data->taluka_name }}</p>
                                                    @endif

                                                    <p class="mb-0"><b>Mobile No. :</b>{{ $data->tel_no }}</p>
                                                </div>
                                            </div>

                                            <!-- end col -->
                                            <div class="col-sm-8">
                                                <div class="text-muted justify-content-end float-md-end">
                                                    <h5 class="font-size-15 mb-1"><b>Invoice No :</b> {{ $data->invoice_number }}</h5>

                                                    <h5 class="font-size-15 mb-1"><b>Invoice Date :</b>   {{ date('d-m-Y', strtotime($data->payment_dt)) }} </h5>

                                                    <h5 class="font-size-15 mb-1"><b>Token Number :</b> {{ $data->mst_token }}</h5>
                                                </div>
                                            </div>
                                            <!-- end col -->
                                        </div>
                                        <!-- end row -->

                                        <!--  Invoice Item Details -->
                                        <h4 class="card-title text-primary mb-3 mt-3"><b>Payment Details :</b></h4>
                                        @if ($noc_mode == 1 || $noc_mode == 2)
                                        <table class="table table-bordered table-responsive" style="width:90%; margin:auto;">
                                            <thead style="border: 1px solid rgb(3, 155, 155);">
                                                <tr>
                                                    <th><b>Sr. No.</b></th>
                                                    <td><b>Type Of NOC</b></td>
                                                    <th><b>Total NOC Charges</b></th>
                                                </tr>
                                            </thead>
                                            <tbody style="border: 1px solid rgb(3, 155, 155);">
                                                @foreach ( $fetch_payments as $key => $value )
                                                    @if($value->mst_token == $data->mst_token )
                                                        <tr>
                                                            <td>
                                                                {{ $key+1 }}
                                                            </td>
                                                            <td>
                                                                {{ $value->construction_type }}
                                                            </td>
                                                            <td>
                                                                {{ ($value->total_charges_cost) ? $value->total_charges_cost.' Rs' : '-' }}
                                                            </td>
                                                        </tr>
                                                        <!-- end tr -->
                                                    @endif
                                                @endforeach
                                            </tbody>
                                        </table>
                                        @endif

                                        @if ($noc_mode == 3 || $noc_mode == 4 || $noc_mode == 5 || $noc_mode == 6)

                                        {{-- This Condition apply only when  Noc Mode is (3, 4, 5, 6) selected --}}
                                        <table class="table table-bordered table-responsive" style="width:90%; margin:auto;">
                                            <thead style="border: 1px solid rgb(3, 155, 155);">
                                                <tr>
                                                    <th><b>Sr. No.</b></th>
                                                    <th><b>Description</b></th>
                                                    <th><b>Actual Area ( Sq.Mt. )</b></th>
                                                    <th><b>Actual Charges ( Sq.Mt. )</b></th>
                                                    <th class="col-2"><b>NOC Charges</b></th>
                                                </tr>
                                            </thead>
                                            <tbody style="border: 1px solid rgb(3, 155, 155);">
                                                @foreach($fetch_payments as $key => $value)
                                                    @if($value->mst_token == $data->mst_token )
                                                        @php
                                                            $descriptionData = json_decode($value->description, true);
                                                            $areaData = json_decode($value->area, true);
                                                            $actualChargesData = json_decode($value->actualcharges, true);
                                                            $nocChargesData = json_decode($value->noccharges, true);
                                                        @endphp
                                                        @foreach ($descriptionData as $iteration)
                                                            <tr>
                                                                <td>{{ $loop->iteration }}</td>
                                                                <td>{{ $descriptionData[$loop->index] }}</td>
                                                                <td>{{ $areaData[$loop->index] }}</td>
                                                                <td>{{ $actualChargesData[$loop->index] }}</td>
                                                                <td>{{ $nocChargesData[$loop->index] }}</td>
                                                            </tr>
                                                        @endforeach
                                                    @endif
                                                @endforeach
                                            </tbody>
                                            <tfoot style="border: 1px solid rgb(3, 155, 155);">
                                                <tr>
                                                    <th scope="row" colspan="4" class="border-0 text-end"><b>Total NOC Charges : - </b></th>
                                                    <td class="border-text-end">
                                                        <h4 class="m-0 fw-semibold">
                                                            {{ $data->total_charges_cost }} Rs
                                                        </h4>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                        {{--  End of Table --}}
                                        @endif

                                        <div class="d-print-none mt-4">
                                            <div class="float-end">
                                                <a href="javascript:window.print()" class="btn btn-primary me-1"><i class="fa fa-print"></i></a>
                                                @if ($noc_mode == 1)
                                                <a href="{{ url('/admin_new_business_noc_list', $data->status) }}" class="btn btn-danger">Back</a>
                                                @elseif ($noc_mode == 2)
                                                <a href="{{ url('/admin_renew_business_noc_list', $data->status) }}" class="btn btn-danger">Back</a>
                                                @elseif ($noc_mode == 3)
                                                <a href="{{ url('/admin_new_hospital_noc_list', $data->status) }}" class="btn btn-danger">Back</a>
                                                @elseif ($noc_mode == 4)
                                                <a href="{{ url('/admin_renew_hospital_noc_list', $data->status) }}" class="btn btn-danger">Back</a>
                                                @elseif ($noc_mode == 5)
                                                <a href="{{ url('/admin_provisional_building_noc_list', $data->status) }}" class="btn btn-danger">Back</a>
                                                @elseif ($noc_mode == 6)
                                                <a href="{{ url('/admin_final_building_noc_list', $data->status) }}" class="btn btn-danger">Back</a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div> <!-- container-fluid -->

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
