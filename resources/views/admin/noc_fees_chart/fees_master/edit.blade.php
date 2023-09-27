<!doctype html>
<html lang="en">

    <head>

        <meta charset="utf-8">

        <title>UMC-Fire NOC | Edit NOC Fees </title>
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
                                        <h4 class="card-header text-light bg-primary ">Edit NOC Fees</h4>

                                        <form class="auth-input p-4"  method="POST" action="{{ route('fees_master.update', $data->id) }}" enctype="multipart/form-data">
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
                                                        <option value="">Select Mode of Operation</option>
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
                                                    <select class="form-control select2 @error('fee_bldg_ht_id') is-invalid @enderror" name="fee_bldg_ht_id" id="fee_bldg_ht_id">
                                                        <option value="">Select Building Height / Type</option>
                                                        <optgroup label="">
                                                            @foreach ($mst_fee_bldg_hts as $value)
                                                            <option value="{{ $value->id }}" {{ $data->fee_bldg_ht_id == $value->id ? 'selected' : '' }}>{{ $value->building_ht }}</option>
                                                            @endforeach
                                                        </optgroup>
                                                    </select>
                                                    @error('fee_bldg_ht_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>


                                                <label class="col-sm-3"><strong>Category of Construction : <span style="color:red;">*</span></strong></label>
                                                <div class="col-sm-3 col-md-3">
                                                    <select class="form-control select2 @error('fee_category_id') is-invalid @enderror" name="fee_category_id" id="fee_category_id">
                                                        <option value="">Select Category of Construction</option>
                                                        <optgroup label="">
                                                            @foreach ($mst_fee_category as $value)
                                                            <option value="{{ $value->id }}" {{ $data->fee_category_id == $value->id ? 'selected' : '' }}>{{ $value->category_name }}</option>
                                                            @endforeach
                                                        </optgroup>
                                                    </select>
                                                    @error('fee_category_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row  mb-3">
                                                <label class="col-sm-3"><strong>Cost per Sq.Mt. : <span style="color:red;">*</span></strong></label>
                                                <div class="col-sm-3 col-md-3">
                                                    <input type="text" name="rate" id="rate" class="form-control @error('rate') is-invalid @enderror" onkeypress='validate(event)' value="{{ $data->rate }}" placeholder="Enter Cost per Sq.Mt.">
                                                    @error('rate')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>

                                                <label class="col-sm-3"><strong>Minimum Charges : <span style="color:red;">*</span></strong></label>
                                                <div class="col-sm-3 col-md-3">
                                                    <input type="text" name="charges" id="charges" class="form-control @error('charges') is-invalid @enderror" onkeypress='validate(event)' value="{{ $data->charges }}" placeholder="Enter Minimum Charges.">
                                                    @error('charges')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>


                                            <div class="form-group row mt-4" >
                                                <label class="col-md-3"></label>
                                                <div class="col-md-9" style="display: flex; justify-content: flex-end;">
                                                    <a href="{{ route('fees_master.index') }}" class="btn btn-danger">Cancel</a>&nbsp;&nbsp;
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
            $(document).ready(function() {

                // ===== Fetch Mode of Operation
                $('#fee_construction_id').on('change', function() {
                    var idOperationMode = this.value;
                    $("#fee_mode_operate_id").html('');
                    $.ajax({
                        url: "{{url('fee/mode_of_operation')}}"
                        , type: "POST"
                        , data: {
                            mode_of_operation: idOperationMode
                            , _token: '{{csrf_token()}}'
                        }
                        , dataType: 'json'
                        , success: function(result) {
                            $('#fee_mode_operate_id').html('<option value="">-- Select Mode of Operation --</option>');
                            $.each(result.mode_of_operation, function(key, value) {
                                $("#fee_mode_operate_id").append('<option value="' + value
                                    .id + '">' + value.operation_mode + '</option>');
                            });

                        }
                    });
                });

                // ===== Fetch Building Heights
                $('#fee_mode_operate_id').on('change', function() {
                    var idBuildingHight = this.value;
                    $("#fee_bldg_ht_id").html('');
                    $.ajax({
                        url: "{{url('fee/bldg_ht')}}"
                        , type: "POST"
                        , data: {
                            bldg_hts: idBuildingHight
                            , _token: '{{csrf_token()}}'
                        }
                        , dataType: 'json'
                        , success: function(result) {
                            $('#fee_bldg_ht_id').html('<option value="">-- Select Building Height / Type --</option>');
                            $.each(result.building_heights, function(key, value) {
                                $("#fee_bldg_ht_id").append('<option value="' + value
                                    .id + '">' + value.building_ht + '</option>');
                            });

                        }
                    });
                });

                // ===== Fetch Construction Category
                $('#fee_bldg_ht_id').on('change', function() {
                    var idConstruction_Category = this.value;
                    $("#fee_category_id").html('');
                    $.ajax({
                        url: "{{url('fee/construction_category')}}"
                        , type: "POST"
                        , data: {
                            Construction_Categories: idConstruction_Category
                            , _token: '{{csrf_token()}}'
                        }
                        , dataType: 'json'
                        , success: function(result) {
                            $('#fee_category_id').html('<option value="">-- Select Category of Construction --</option>');
                            $.each(result.construction_category, function(key, value) {
                                $("#fee_category_id").append('<option value="' + value
                                    .id + '">' + value.category_name + '</option>');
                            });

                        }
                    });
                });

            });

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
