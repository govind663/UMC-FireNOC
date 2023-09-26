<!doctype html>
<html lang="en">

    <head>

        <meta charset="utf-8">

        <title>UMC-Fire NOC | Mode of Operation List</title>
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
                                        <div class="col-md-12 col-sm-12 text-left">
                                            <a class="btn btn-primary" href="{{ route('fees_mode_operate.create') }}" role="button">
                                                <b>+ &nbsp; Add Mode of Operation</b>
                                            </a>
                                        </div>
                                        <h4 class="card-header text-primary">All Mode of Operation List</h4>
                                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                                <tr style="color: white; background:#086070;">
                                                    <th><b>Sr. No.</b></th>
                                                    <th><b>Type Of Construction</b></th>
                                                    <th><b>Mode of Operation</b></th>
                                                    <th><b>View</b></th>
                                                    <th><b>Edit</b></th>
                                                    <th><b>Delete</b></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data as $key => $value)
                                                    <tr>
                                                        <td>{{ $key + 1 }}</td>
                                                        <td>{{ $value->fee_construction?->operation_mode }}</td>
                                                        <td>{{ $value->operation_mode }}</td>
                                                        <td>
                                                            <a href="{{ route('fees_mode_operate.show', $value->id) }}" class="btn btn-primary btn-sm">
                                                                <b><i class="mdi mdi-eye-circle-outline"> View</i></b>
                                                            </a>
                                                        </td>

                                                        <td>
                                                            <a href="{{ route('fees_mode_operate.edit', $value->id) }}" class="btn btn-warning btn-sm text-dark">
                                                                <b><i class="mdi mdi-account-edit"> Edit</i></b>
                                                            </a>
                                                        </td>

                                                        <td>
                                                            <form action="{{ route('fees_mode_operate.destroy', $value->id) }}" method="post">
                                                                @csrf
                                                                @method('DELETE')
                                                                <input name="_method" type="hidden" value="DELETE">
                                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?');">
                                                                    <b><i class="mdi mdi-delete-alert-outline"> Delete</i></b>
                                                                </button>
                                                            </form>
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

        <script type="text/javascript">
            function confirmation() {
                var result = confirm("Are you sure you want to delete this item?");
                if (result) {
                    // Delete logic goes here
                }
            }
        </script>
    </body>
</html>
