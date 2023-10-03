<!doctype html>
<html lang="en">

    <head>

        <meta charset="utf-8">

        <title>UMC-Fire NOC | New Business NOC List</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description">
        <meta content="Themesdesign" name="author">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ url('/') }}/assets/logo/favicon.ico">

        <!-- DataTables -->
        <link href="{{ url('/') }}/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
        <link href="{{ url('/') }}/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">
        <link href="{{ url('/') }}/assets/libs/datatables.net-select-bs4/css/select.bootstrap4.min.css" rel="stylesheet" type="text/css">

        <!-- Responsive datatable examples -->
        <link href="{{ url('/') }}/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css">

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

    <body data-topbar="colored" data-layout="horizontal">

        <!-- Begin page -->
        <div id="layout-wrapper">

            @include('common.admin.header.header')

            <div class="main-content">

                <div class="page-content">

                    <div class="container-fluid">

                        <div class="row" >
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body" style="border: 1px solid rgb(3, 155, 155);">

                                        @if($all_status == 2)
                                        <h4 class="card-header text-primary">All Rejected Renew Hospital NOC List</h4>
                                        @elseif($all_status == 1)
                                        <h4 class="card-header text-primary">All Approved Renew Hospital NOC List</h4>
                                        @endif

                                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                                <tr style="color: white; background:#086070;">
                                                    <th><b>Sr. No.</b></th>
                                                    <th><b>Apply Date <br> (DD/MM/YYYY)</b></th>
                                                    <th><b>Appication Name</b></th>
                                                    <th><b>Property Types</b></th>
                                                    <th><b>Property Number</b></th>
                                                    <th><b>Town / City</b></th>
                                                    <th><b>Pin code</b></th>
                                                    <th><b>Taluka</b></th>
                                                    <th><b>Ward Committee No</b></th>
                                                    <th><b>Application Status</b></th>
                                                    <th><b>Action</b></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data as $key => $value)
                                                    <tr>
                                                        <td>{{ $key + 1 }}</td>
                                                        <td>{{ date('d-m-Y', strtotime($value->noc_a_date)) }}</td>
                                                        <td>{{ $value->f_name }} {{ $value->father_name }} {{ $value->l_name }}</td>

                                                        @if ($value->types_of_property == 1)
                                                        <td>Land</td>
                                                        @elseif ($value->types_of_property == 2)
                                                        <td>Building</td>
                                                        @endif

                                                        <td>{{ $value->property_no }}</td>
                                                        <td>{{ $value->city_name }}</td>
                                                        <td>{{ $value->pincode }}</td>
                                                        <td>{{ $value->taluka_name }}</td>
                                                        @php
                                                            $ward_name = '';

                                                            if($value->ward_no = 1){
                                                            $ward_name = 'Ward 1';
                                                            }elseif($value->ward_no = 2){
                                                            $ward_name = 'Ward 2';
                                                            }elseif($value->ward_no = 3){
                                                            $ward_name = 'Ward 3';
                                                            }elseif($value->ward_no = 4){
                                                            $ward_name = 'Ward 4';
                                                            }
                                                        @endphp

                                                        <td>{{ $ward_name }}</td>
                                                        @if ($value->status == 0)
                                                        <td><span class="bg-primary text-white p-2" style="border: 1px;">Pending</span></td>
                                                        @elseif ($value->status == 1)
                                                        <td><span class="bg-warning text-dark p-2" style="border: 1px;">Unpaid</span></td>
                                                        @elseif ($value->status == 2)
                                                        <td><span class="bg-success text-dark p-2" style="border: 1px;">Paid</span></td>
                                                        @elseif ($value->status == 3)
                                                        <td><span class="bg-success text-dark p-2" style="border: 1px;">Approved</span></td>
                                                        @elseif ($value->status == 4)
                                                        <td><span class="bg-danger text-light p-2" style="border: 1px;">Rejected</span></td>
                                                        @elseif ($value->status == 5)
                                                        <td><span class="bg-dark text-light p-2" style="border: 1px;">Underprocess</span></td>
                                                        @elseif ($value->status == 6)
                                                        <td><span class="bg-danger text-dark p-2" style="border: 1px;">Reviewed</span></td>
                                                        @endif
                                                        <td style="display:flex;">
                                                            <a href='{{ url("/all_new_business_noc/show/{$value->RH_NOC_ID}/{$all_status}") }}' class="btn btn-primary btn-sm">
                                                                <b><i class="mdi mdi-eye-circle-outline"> View</i></b>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->



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

        <!-- Required datatable js -->
        <script src="{{ url('/') }}/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="{{ url('/') }}/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>

        <!-- Buttons examples -->
        <script src="{{ url('/') }}/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
        <script src="{{ url('/') }}/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
        <script src="{{ url('/') }}/assets/libs/jszip/jszip.min.js"></script>
        <script src="{{ url('/') }}/assets/libs/pdfmake/build/pdfmake.min.js"></script>
        <script src="{{ url('/') }}/assets/libs/pdfmake/build/vfs_fonts.js"></script>
        <script src="{{ url('/') }}/assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
        <script src="{{ url('/') }}/assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
        <script src="{{ url('/') }}/assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>

        <script src="{{ url('/') }}/assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
        <script src="{{ url('/') }}/assets/libs/datatables.net-select/js/dataTables.select.min.js"></script>

        <!-- Responsive examples -->
        <script src="{{ url('/') }}/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="{{ url('/') }}/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

        <!-- Datatable init js -->
        <script src="{{ url('/') }}/assets/js/pages/datatables.init.js"></script>

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
