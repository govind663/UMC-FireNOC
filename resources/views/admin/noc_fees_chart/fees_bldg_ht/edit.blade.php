<!doctype html>
<html lang="en">

    <head>

        <meta charset="utf-8">

        <title>UMC-Fire NOC | Edit Building Height / Type </title>
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
                                <div class="card" style="border: 1px solid #000000;">
                                    <div class="card-body p-0">
                                        <h4 class="card-header text-light bg-primary ">Edit Building Height / Type</h4>

                                        <form class="auth-input p-4"  method="POST" action="{{ route('fees_bldg_ht.update', $data->id) }}" enctype="multipart/form-data">
                                            @csrf

                                            @if (!empty($data->id) || 1 == 1)
                                                <input type="hidden" name="_method" value="PATCH">
                                            @endif

                                            <div class="form-group row  mb-3">
                                                <label class="col-sm-3"><strong>Type Of Construction : <span style="color:red;">*</span></strong></label>
                                                <div class="col-sm-3 col-md-3">
                                                    <select class="form-control select2 @error('fee_construction_id') is-invalid @enderror" name="fee_construction_id" id="fee_construction_id">
                                                        <option value="">Select Type Of Construction</option>
                                                        <optgroup label="">
                                                            @foreach ($mst_fee_construction as $value)
                                                            <option value="{{ $value->id }}" {{ $data->fee_construction_id == $value->id ? 'selected' : '' }}>{{ $value->construction_type }}</option>
                                                            @endforeach
                                                        </optgroup>
                                                    </select>
                                                    @error('fee_construction_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>

                                                <label class="col-sm-3"><strong>Mode of Operation : <span style="color:red;">*</span></strong></label>
                                                <div class="col-sm-3 col-md-3">
                                                    <select class="form-control select2 @error('fee_mode_operate_id') is-invalid @enderror" name="fee_mode_operate_id" id="fee_mode_operate_id">

                                                        <optgroup label="">
                                                            @foreach ($mst_fee_mode_operate as $value)
                                                            <option value="{{ $value->id }}" {{ $data->fee_mode_operate_id == $value->id ? 'selected' : '' }}>{{ $value->operation_mode }}</option>
                                                            @endforeach
                                                        </optgroup>
                                                    </select>
                                                    @error('fee_mode_operate_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row  mb-3">
                                                <label class="col-sm-3"><strong>Building Height / Type : <span style="color:red;">*</span></strong></label>
                                                <div class="col-sm-3 col-md-3">
                                                    <input type="text" name="building_ht" id="building_ht" class="form-control @error('building_ht') is-invalid @enderror" value="{{ $data->building_ht }}" placeholder="Enter Type Of Construction.">
                                                    @error('building_ht')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>


                                            <div class="form-group row mt-4" >
                                                <label class="col-md-3"></label>
                                                <div class="col-md-9" style="display: flex; justify-content: flex-end;">
                                                    <a href="{{ route('fees_bldg_ht.index') }}" class="btn btn-danger">Cancel</a>&nbsp;&nbsp;
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            </div>

                                        </form>

                                    </div>
                                </div>
                                <!-- end select2 -->

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

        <script>
            $(document).ready(function () {

                $('#fee_construction_id').on('change', function () {
                    var idOperationMode = this.value;
                    $("#fee_mode_operate_id").html('');
                    $.ajax({
                        url: "{{url('fee/mode_of_operation')}}",
                        type: "POST",
                        data: {
                            mode_of_operation: idOperationMode,
                            _token: '{{csrf_token()}}'
                        },
                        dataType: 'json',
                        success: function (result) {
                            $('#fee_mode_operate_id').html('<option value="">-- Select Mode of Operation --</option>');
                            $.each(result.mode_of_operation, function (key, value) {
                                $("#fee_mode_operate_id").append('<option value="' + value
                                    .id + '">' + value.operation_mode + '</option>');
                            });
                            // $('#city-dropdown').html('<option value="">-- Select City --</option>');
                        }
                    });
                });



            });
        </script>

    </body>
</html>
