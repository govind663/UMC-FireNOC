<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">

    <title>UMC-Fire NOC | Make Payment For Fire NOC</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description">
    <meta content="Themesdesign" name="author">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ url('/') }}/assets/logo/favicon.ico">

    <link href="{{ url('/') }}/assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css">
    <link href="{{ url('/') }}/assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="{{ url('/') }}/assets/libs/spectrum-colorpicker2/spectrum.min.css" rel="stylesheet"
        type="text/css">
    <link href="{{ url('/') }}/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css"
        rel="stylesheet">

    <!-- Layout Js -->
    <script src="{{ url('/') }}/assets/js/layout.js"></script>
    <!-- Bootstrap Css -->
    <link href="{{ url('/') }}/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet"
        type="text/css" />
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

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">

                                    <div class="invoice-title d-flex justify-content-between">
                                        <div class="mb-4 float-md-start">
                                            <img src="{{ url('/') }}/assets/logo/logo_dark.png" alt="logo" height="130px" width="250px" />
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

                                    @if ($noc_mode == 1)
                                        <h4 class="card-header text-light bg-primary ">Make Payment for New Business NOC</h4>

                                        <form class="auth-input p-4" method="POST" action='{{ url("/make_payment/store/{$data->NB_NOC_ID}/{$data->status}/{$data->noc_mode}") }}' enctype="multipart/form-data" autocomplete="off">
                                            @csrf

                                            <div class="form-group row mb-3">
                                                <label class="col-sm-2"><strong>Payment Date : </strong></label>
                                                <div class="col-sm-2 col-md-2">
                                                    <input type="text" readonly name="payment_dt" id="payment_dt" class="form-control" value="{{  date('d-m-Y', strtotime($data->noc_a_date))  }}">

                                                </div>

                                                <label class="col-sm-3"><strong>Application Unique Id : </strong></label>
                                                <div class="col-sm-2 col-md-2">
                                                    <input type="text" readonly name="mst_token" id="mst_token" class="form-control" value="{{  $data->mst_token }}">

                                                </div>
                                            </div>

                                            <div class="form-group row mb-3 d-none">
                                                <label class="col-sm-2"><strong>Citizen ID : </strong></label>
                                                <div class="col-sm-2 col-md-2">
                                                    <input type="text" readonly name="citizens_id" id="citizens_id" class="form-control" value="{{ $data->citizen_id }}">

                                                </div>

                                                <label class="col-sm-2"><strong>Mode of NOC : </strong></label>
                                                <div class="col-sm-2 col-md-2">
                                                    <select class="form-control select2 " name="payment_noc_mode" id="payment_noc_mode" type="hidden">
                                                        <option>Select Mode of NOC</option>
                                                        <optgroup label=" ">
                                                            <option value="1" {{ $data->noc_mode == "1" ? 'selected' : '' }}>New Bussiness NOC</option>
                                                            <option value="2" {{ $data->noc_mode == "2" ? 'selected' : '' }}>Renewal Bussiness NOC</option>
                                                        </optgroup>
                                                    </select>
                                                </div>

                                                <label class="col-sm-2"><strong>NOC Master Id : </strong></label>
                                                <div class="col-sm-2 col-md-2">
                                                    <input type="text" readonly name="noc_mst_id" id="noc_mst_id" class="form-control" value="{{ $data->mst_token }}">

                                                </div>
                                            </div>

                                            <h4 class="card-title text-primary mb-3" style="font-size: 18px;">Basic Details :</h4>
                                            <div class="form-group row  mb-3">
                                                <label class="col-sm-1"><strong>First Name : </strong></label>
                                                <div class="col-sm-2 col-md-2">
                                                    <input readonly type="text" name="f_name" id="f_name" class="form-control " value="{{ $data->f_name }}" placeholder="Enter First Name.">

                                                </div>

                                                <label class="col-sm-1"><strong>Father / Husband's Name : </strong></label>
                                                <div class="col-sm-2 col-md-2">
                                                    <input readonly type="text" name="father_name" id="father_name" class="form-control " value="{{ $data->father_name }}" placeholder="Enter Father / Husband's Name.">

                                                </div>

                                                <label class="col-sm-1"><strong>Last Name : </strong></label>
                                                <div class="col-sm-2 col-md-2">
                                                    <input readonly type="text" name="l_name" id="l_name" class="form-control " value="{{ $data->l_name }}" placeholder="Enter Last Name / Surname.">

                                                </div>
                                            </div>

                                            <div class="form-group row  mb-3">
                                                <h4 class="card-title text-primary mb-3" style="font-size: 18px;">Payment Details :</h4>

                                                <div class="table-responsive">
                                                    <table class="table align-middle table-nowrap table-centered mb-0">
                                                        <thead class="bg-primary text-light">
                                                            <tr>
                                                                <th style="width: 70px;">Sr. No.</th>
                                                                <th>Description</th>
                                                                <th>Actual Area ( Sq.Mt. )</th>
                                                                <th>Actual Charges ( Sq.Mt. )</th>
                                                                <th class="text-end" style="width: 120px;">NOC Charges</th>
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
                                                                <th scope="row" colspan="4" class="border-0 text-end"><b>Total NOC Charges : - </b></th>
                                                                <td class="border-0 text-end"><h4 class="m-0 fw-semibold">$739.00</h4></td>
                                                            </tr>
                                                            <!-- end tr -->
                                                        </tbody>
                                                        <!-- end tbody -->
                                                    </table>
                                                    <!-- end table -->
                                                </div>
                                                <!-- end table responsive -->

                                            </div>

                                            <div class="form-group row mt-4">
                                                <label class="col-md-3"></label>
                                                <div class="col-md-9" style="display: flex; justify-content: flex-end;">
                                                    <a href="{{ url('/admin_new_business_noc_list', $data->status) }}" class="btn btn-danger">Cancel</a>&nbsp;&nbsp;
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            </div>

                                        </form>
                                    @elseif ($noc_mode == 2)
                                        <h4 class="card-header text-light bg-primary ">Make Payment for Renew Business NOC</h4>

                                        <form class="auth-input p-4" method="POST" action='{{ url("/make_payment/store/{$data->RB_NOC_ID}/{$data->status}/{$data->noc_mode}") }}' enctype="multipart/form-data" autocomplete="off">
                                            @csrf

                                            <div class="form-group row mb-3">
                                                <label class="col-sm-2"><strong>Payment Date : </strong></label>
                                                <div class="col-sm-2 col-md-2">
                                                    <input type="text" readonly name="payment_dt" id="payment_dt" class="form-control" value="{{  date('d-m-Y', strtotime($data->noc_a_date))  }}">

                                                </div>

                                                <label class="col-sm-2"><strong>Application Unique Id : </strong></label>
                                                <div class="col-sm-2 col-md-2">
                                                    <input type="text" readonly name="mst_token" id="mst_token" class="form-control" value="{{ $data->mst_token }}">

                                                </div>
                                            </div>

                                            <div class="form-group row mb-3 d-none">
                                                <label class="col-sm-2"><strong>Citizen ID : </strong></label>
                                                <div class="col-sm-2 col-md-2">
                                                    <input type="text" readonly name="citizens_id" id="citizens_id" class="form-control" value="{{ $data->citizen_id }}">

                                                </div>

                                                <label class="col-sm-2"><strong>Mode of NOC : </strong></label>
                                                <div class="col-sm-2 col-md-2">
                                                    <select class="form-control select2 " name="payment_noc_mode" id="payment_noc_mode" type="hidden">
                                                        <option>Select Mode of NOC</option>
                                                        <optgroup label=" ">
                                                            <option value="1" {{ $data->noc_mode == "1" ? 'selected' : '' }}>New Bussiness NOC</option>
                                                            <option value="2" {{ $data->noc_mode == "2" ? 'selected' : '' }}>Renewal Bussiness NOC</option>
                                                        </optgroup>
                                                    </select>
                                                </div>

                                                <label class="col-sm-2"><strong>NOC Master Id : </strong></label>
                                                <div class="col-sm-2 col-md-2">
                                                    <input type="text" readonly name="noc_mst_id" id="noc_mst_id" class="form-control" value="{{  $data->mst_token }}">

                                                </div>
                                            </div>

                                            <h4 class="card-title text-primary mb-3" style="font-size: 18px;">Basic Details :</h4>
                                            <div class="form-group row  mb-3">
                                                <label class="col-sm-2"><strong>Last Name / Surname : </strong></label>
                                                <div class="col-sm-2 col-md-2">
                                                    <input readonly type="text" name="l_name" id="l_name" class="form-control " value="{{ $data->l_name }}" placeholder="Enter Last Name / Surname.">

                                                </div>
                                                <label class="col-sm-2"><strong>First Name : </strong></label>
                                                <div class="col-sm-2 col-md-2">
                                                    <input readonly type="text" name="f_name" id="f_name" class="form-control " value="{{ $data->f_name }}" placeholder="Enter First Name.">

                                                </div>
                                                <label class="col-sm-2"><strong>Father / Husband's Name : </strong></label>
                                                <div class="col-sm-2 col-md-2">
                                                    <input readonly type="text" name="father_name" id="father_name" class="form-control " value="{{ $data->father_name }}" placeholder="Enter Father / Husband's Name.">

                                                </div>
                                            </div>

                                            <h4 class="card-title text-primary mb-3" style="font-size: 18px;">Payment Details :</h4>

                                            <div class="form-group row  mb-3">
                                                <label class="col-sm-3"><strong>Type Of NOC : <span style="color:red;">*</span></strong></label>
                                                <div class="col-sm-3 col-md-3">
                                                    <select class="form-control select2 @error('fee_construction_id') is-invalid @enderror" name="fee_construction_id" id="fee_construction_id">
                                                        <option value="">Select Type Of NOC</option>
                                                        <optgroup label="">
                                                            @foreach ($mst_fee_construction as $value)
                                                            <option value="{{ $value->id }}" {{ old('fee_construction_id') == "1" ? 'selected' : '' }}>{{ $value->construction_type }}</option>
                                                            @endforeach
                                                        </optgroup>
                                                    </select>
                                                    @error('fee_construction_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>

                                                <label class="col-sm-3"><strong>Total NOC Charges : <span style="color:red;">*</span></strong></label>
                                                <div class="col-sm-3 col-md-3">
                                                    <input  type="text" name="total_charges_cost" id="total_charges_cost" class="form-control "  value="{{ old('total_charges_cost') }}" placeholder="Enter Total NOC Charges.">
                                                    @error('total_charges_cost')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row mt-4">
                                                <label class="col-md-3"></label>
                                                <div class="col-md-9" style="display: flex; justify-content: flex-end;">
                                                    <a href="{{ url('/admin_renew_business_noc_list', $data->status) }}" class="btn btn-danger">Cancel</a>&nbsp;&nbsp;
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            </div>

                                        </form>
                                    @elseif ($noc_mode == 3)
                                        <h4 class="card-header text-light bg-primary ">Make Payment for New Hospital NOC</h4>

                                        <form class="auth-input p-4" method="POST" action='{{ url("/make_payment/store/{$data->NH_NOC_ID}/{$data->status}/{$data->noc_mode}") }}' enctype="multipart/form-data" autocomplete="off">
                                            @csrf

                                            <div class="form-group row mb-3">
                                                <label class="col-sm-2"><strong>Payment Date : </strong></label>
                                                <div class="col-sm-2 col-md-2">
                                                    <input type="text" readonly name="payment_dt" id="payment_dt" class="form-control" value="{{  date('d-m-Y', strtotime($data->noc_a_date))  }}">

                                                </div>

                                                <label class="col-sm-2"><strong>Application Unique Id : </strong></label>
                                                <div class="col-sm-2 col-md-2">
                                                    <input type="text" readonly name="mst_token" id="mst_token" class="form-control" value="{{  $data->mst_token }}">

                                                </div>
                                            </div>

                                            <div class="form-group row mb-3 d-none">
                                                <label class="col-sm-2"><strong>Citizen ID : </strong></label>
                                                <div class="col-sm-2 col-md-2">
                                                    <input type="text" readonly name="citizens_id" id="citizens_id" class="form-control" value="{{ $data->citizen_id }}">

                                                </div>

                                                <label class="col-sm-2"><strong>Mode of NOC : </strong></label>
                                                <div class="col-sm-2 col-md-2">
                                                    <select class="form-control select2 " name="payment_noc_mode" id="payment_noc_mode" type="hidden">
                                                        <option>Select Mode of NOC</option>
                                                        <optgroup label=" ">
                                                            <option value="3" {{ $data->noc_mode == "3" ? 'selected' : '' }}>New Hospital NOC</option>
                                                            <option value="4" {{ $data->noc_mode == "4" ? 'selected' : '' }}>Renewal Hospital NOC</option>
                                                        </optgroup>
                                                    </select>
                                                </div>

                                                <label class="col-sm-2"><strong>NOC Master Id : </strong></label>
                                                <div class="col-sm-2 col-md-2">
                                                    <input type="text" readonly name="noc_mst_id" id="noc_mst_id" class="form-control" value="{{ $data->mst_token }}">

                                                </div>
                                            </div>

                                            <h4 class="card-title text-primary mb-3" style="font-size: 18px;">Basic Details :</h4>
                                            <div class="form-group row  mb-3">
                                                <label class="col-sm-2"><strong>Last Name / Surname : </strong></label>
                                                <div class="col-sm-2 col-md-2">
                                                    <input readonly type="text" name="l_name" id="l_name" class="form-control " value="{{ $data->l_name }}" placeholder="Enter Last Name / Surname.">

                                                </div>
                                                <label class="col-sm-2"><strong>First Name : </strong></label>
                                                <div class="col-sm-2 col-md-2">
                                                    <input readonly type="text" name="f_name" id="f_name" class="form-control " value="{{ $data->f_name }}" placeholder="Enter First Name.">

                                                </div>
                                                <label class="col-sm-2"><strong>Father / Husband's Name : </strong></label>
                                                <div class="col-sm-2 col-md-2">
                                                    <input readonly type="text" name="father_name" id="father_name" class="form-control " value="{{ $data->father_name }}" placeholder="Enter Father / Husband's Name.">

                                                </div>
                                            </div>

                                            <h4 class="card-title text-primary mb-3" style="font-size: 18px;">Payment Details :</h4>

                                            <div class="form-group row  mb-3">
                                                <label class="col-sm-3"><strong>Type Of NOC : <span style="color:red;">*</span></strong></label>
                                                <div class="col-sm-3 col-md-3">
                                                    <select class="form-control select2 @error('fee_construction_id') is-invalid @enderror" name="fee_construction_id" id="fee_construction_id">
                                                        <option value="">Select Type Of NOC</option>
                                                        <optgroup label="">
                                                            @foreach ($mst_fee_construction as $value)
                                                            <option value="{{ $value->id }}" {{ old('fee_construction_id') == "1" ? 'selected' : '' }}>{{ $value->construction_type }}</option>
                                                            @endforeach
                                                        </optgroup>
                                                    </select>
                                                    @error('fee_construction_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>

                                                <label class="col-sm-3"><strong>Total NOC Charges : <span style="color:red;">*</span></strong></label>
                                                <div class="col-sm-3 col-md-3">
                                                    <input  type="text" name="total_charges_cost" id="total_charges_cost" class="form-control "  value="{{ old('total_charges_cost') }}" placeholder="Enter Total NOC Charges.">
                                                    @error('total_charges_cost')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row mt-4">
                                                <label class="col-md-3"></label>
                                                <div class="col-md-9" style="display: flex; justify-content: flex-end;">
                                                    <a href="{{ url('/admin_new_hospital_noc_list', $data->status) }}" class="btn btn-danger">Cancel</a>&nbsp;&nbsp;
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            </div>

                                        </form>
                                    @elseif ($noc_mode == 4)
                                        <h4 class="card-header text-light bg-primary ">Make Payment for Renew Hospital NOC</h4>

                                        <form class="auth-input p-4" method="POST" action='{{ url("/make_payment/store/{$data->RH_NOC_ID}/{$data->status}/{$data->noc_mode}") }}' enctype="multipart/form-data" autocomplete="off">
                                            @csrf

                                            <div class="form-group row mb-3">
                                                <label class="col-sm-2"><strong>Payment Date : </strong></label>
                                                <div class="col-sm-2 col-md-2">
                                                    <input type="text" readonly name="payment_dt" id="payment_dt" class="form-control" value="{{  date('d-m-Y', strtotime($data->noc_a_date))  }}">

                                                </div>

                                                <label class="col-sm-2"><strong>Application Unique Id : </strong></label>
                                                <div class="col-sm-2 col-md-2">
                                                    <input type="text" readonly name="mst_token" id="mst_token" class="form-control" value="{{  $data->mst_token }}">

                                                </div>
                                            </div>

                                            <div class="form-group row mb-3 d-none">
                                                <label class="col-sm-2"><strong>Citizen ID : </strong></label>
                                                <div class="col-sm-2 col-md-2">
                                                    <input type="text" readonly name="citizens_id" id="citizens_id" class="form-control" value="{{ $data->citizen_id }}">

                                                </div>

                                                <label class="col-sm-2"><strong>Mode of NOC : </strong></label>
                                                <div class="col-sm-2 col-md-2">
                                                    <select class="form-control select2 " name="payment_noc_mode" id="payment_noc_mode" type="hidden">
                                                        <option>Select Mode of NOC</option>
                                                        <optgroup label=" ">
                                                            <option value="3" {{ $data->noc_mode == "3" ? 'selected' : '' }}>New Hospital NOC</option>
                                                            <option value="4" {{ $data->noc_mode == "4" ? 'selected' : '' }}>Renewal Hospital NOC</option>
                                                        </optgroup>
                                                    </select>
                                                </div>

                                                <label class="col-sm-2"><strong>NOC Master Id : </strong></label>
                                                <div class="col-sm-2 col-md-2">
                                                    <input type="text" readonly name="noc_mst_id" id="noc_mst_id" class="form-control" value="{{ $data->mst_token }}">

                                                </div>
                                            </div>

                                            <h4 class="card-title text-primary mb-3" style="font-size: 18px;">Basic Details :</h4>
                                            <div class="form-group row  mb-3">
                                                <label class="col-sm-2"><strong>Last Name / Surname : </strong></label>
                                                <div class="col-sm-2 col-md-2">
                                                    <input readonly type="text" name="l_name" id="l_name" class="form-control " value="{{ $data->l_name }}" placeholder="Enter Last Name / Surname.">

                                                </div>
                                                <label class="col-sm-2"><strong>First Name : </strong></label>
                                                <div class="col-sm-2 col-md-2">
                                                    <input readonly type="text" name="f_name" id="f_name" class="form-control " value="{{ $data->f_name }}" placeholder="Enter First Name.">

                                                </div>
                                                <label class="col-sm-2"><strong>Father / Husband's Name : </strong></label>
                                                <div class="col-sm-2 col-md-2">
                                                    <input readonly type="text" name="father_name" id="father_name" class="form-control " value="{{ $data->father_name }}" placeholder="Enter Father / Husband's Name.">

                                                </div>
                                            </div>

                                            <h4 class="card-title text-primary mb-3" style="font-size: 18px;">Payment Details :</h4>

                                            <div class="form-group row  mb-3">
                                                <label class="col-sm-3"><strong>Type Of NOC : <span style="color:red;">*</span></strong></label>
                                                <div class="col-sm-3 col-md-3">
                                                    <select class="form-control select2 @error('fee_construction_id') is-invalid @enderror" name="fee_construction_id" id="fee_construction_id">
                                                        <option value="">Select Type Of NOC</option>
                                                        <optgroup label="">
                                                            @foreach ($mst_fee_construction as $value)
                                                            <option value="{{ $value->id }}" {{ old('fee_construction_id') == "1" ? 'selected' : '' }}>{{ $value->construction_type }}</option>
                                                            @endforeach
                                                        </optgroup>
                                                    </select>
                                                    @error('fee_construction_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>

                                                <label class="col-sm-3"><strong>Total NOC Charges : <span style="color:red;">*</span></strong></label>
                                                <div class="col-sm-3 col-md-3">
                                                    <input  type="text" name="total_charges_cost" id="total_charges_cost" class="form-control "  value="{{ old('total_charges_cost') }}" placeholder="Enter Total NOC Charges.">
                                                    @error('total_charges_cost')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row mt-4">
                                                <label class="col-md-3"></label>
                                                <div class="col-md-9" style="display: flex; justify-content: flex-end;">
                                                    <a href="{{ url('/admin_renew_hospital_noc_list', $data->status) }}" class="btn btn-danger">Cancel</a>&nbsp;&nbsp;
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            </div>

                                        </form>
                                    @elseif ($noc_mode == 5)
                                        <h4 class="card-header text-light bg-primary ">Make Payment for Provisional Building NOC</h4>

                                        <form class="auth-input p-4" method="POST" action='{{ url("/make_payment/store/{$data->P_NOC_ID}/{$data->status}/{$data->noc_mode}") }}' enctype="multipart/form-data" autocomplete="off">
                                            @csrf

                                            <div class="form-group row mb-3">
                                                <label class="col-sm-2"><strong>Payment Date : </strong></label>
                                                <div class="col-sm-2 col-md-2">
                                                    <input type="text" readonly name="payment_dt" id="payment_dt" class="form-control" value="{{  date('d-m-Y', strtotime($data->noc_a_date))  }}">

                                                </div>

                                                <label class="col-sm-2"><strong>Application Unique Id : </strong></label>
                                                <div class="col-sm-2 col-md-2">
                                                    <input type="text" readonly name="mst_token" id="mst_token" class="form-control" value="{{  $data->mst_token }}">

                                                </div>
                                            </div>

                                            <div class="form-group row mb-3 d-none">
                                                <label class="col-sm-2"><strong>Citizen ID : </strong></label>
                                                <div class="col-sm-2 col-md-2">
                                                    <input type="text" readonly name="citizens_id" id="citizens_id" class="form-control" value="{{ $data->citizen_id }}">

                                                </div>

                                                <label class="col-sm-2"><strong>Mode of NOC : </strong></label>
                                                <div class="col-sm-2 col-md-2">
                                                    <select class="form-control select2 " name="payment_noc_mode" id="payment_noc_mode" type="hidden">
                                                        <option>Select Mode of NOC</option>
                                                        <optgroup label=" ">
                                                            <option value="5" {{ $data->noc_mode == "5" ? 'selected' : '' }}>Provisional Building NOC</option>
                                                            <option value="6" {{ $data->noc_mode == "6" ? 'selected' : '' }}>Final Building NOC</option>
                                                        </optgroup>
                                                    </select>
                                                </div>

                                                <label class="col-sm-2"><strong>NOC Master Id : </strong></label>
                                                <div class="col-sm-2 col-md-2">
                                                    <input type="text" readonly name="noc_mst_id" id="noc_mst_id" class="form-control" value="{{ $data->mst_token }}">

                                                </div>
                                            </div>

                                            <h4 class="card-title text-primary mb-3" style="font-size: 18px;">Basic Details :</h4>
                                            <div class="form-group row  mb-3">
                                                <label class="col-sm-2"><strong>Last Name / Surname : </strong></label>
                                                <div class="col-sm-2 col-md-2">
                                                    <input readonly type="text" name="l_name" id="l_name" class="form-control " value="{{ $data->l_name }}" placeholder="Enter Last Name / Surname.">

                                                </div>
                                                <label class="col-sm-2"><strong>First Name : </strong></label>
                                                <div class="col-sm-2 col-md-2">
                                                    <input readonly type="text" name="f_name" id="f_name" class="form-control " value="{{ $data->f_name }}" placeholder="Enter First Name.">

                                                </div>
                                                <label class="col-sm-2"><strong>Father / Husband's Name : </strong></label>
                                                <div class="col-sm-2 col-md-2">
                                                    <input readonly type="text" name="father_name" id="father_name" class="form-control " value="{{ $data->father_name }}" placeholder="Enter Father / Husband's Name.">

                                                </div>
                                            </div>

                                            <h4 class="card-title text-primary mb-3" style="font-size: 18px;">Payment Details :</h4>

                                            <div class="form-group row  mb-3">
                                                <label class="col-sm-3"><strong>Type Of NOC : <span style="color:red;">*</span></strong></label>
                                                <div class="col-sm-3 col-md-3">
                                                    <select class="form-control select2 @error('fee_construction_id') is-invalid @enderror" name="fee_construction_id" id="fee_construction_id">
                                                        <option value="">Select Type Of NOC</option>
                                                        <optgroup label="">
                                                            @foreach ($mst_fee_construction as $value)
                                                            <option value="{{ $value->id }}" {{ old('fee_construction_id') == "1" ? 'selected' : '' }}>{{ $value->construction_type }}</option>
                                                            @endforeach
                                                        </optgroup>
                                                    </select>
                                                    @error('fee_construction_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>

                                                <label class="col-sm-3"><strong>Total NOC Charges : <span style="color:red;">*</span></strong></label>
                                                <div class="col-sm-3 col-md-3">
                                                    <input  type="text" name="total_charges_cost" id="total_charges_cost" class="form-control "  value="{{ old('total_charges_cost') }}" placeholder="Enter Total NOC Charges.">
                                                    @error('total_charges_cost')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row mt-4">
                                                <label class="col-md-3"></label>
                                                <div class="col-md-9" style="display: flex; justify-content: flex-end;">
                                                    <a href="{{ url('/admin_provisional_building_noc_list', $data->status) }}" class="btn btn-danger">Cancel</a>&nbsp;&nbsp;
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            </div>

                                        </form>
                                    @elseif ($noc_mode == 6)
                                        <h4 class="card-header text-light bg-primary ">Make Payment for Final Building NOC</h4>

                                        <form class="auth-input p-4" method="POST" action='{{ url("/make_payment/store/{$data->F_NOC_ID}/{$data->status}/{$data->noc_mode}") }}' enctype="multipart/form-data" autocomplete="off">
                                            @csrf

                                            <div class="form-group row mb-3">
                                                <label class="col-sm-2"><strong>Payment Date : </strong></label>
                                                <div class="col-sm-2 col-md-2">
                                                    <input type="text" readonly name="payment_dt" id="payment_dt" class="form-control" value="{{  date('d-m-Y', strtotime($data->noc_a_date))  }}">

                                                </div>

                                                <label class="col-sm-2"><strong>Application Unique Id : </strong></label>
                                                <div class="col-sm-2 col-md-2">
                                                    <input type="text" readonly name="mst_token" id="mst_token" class="form-control" value="{{  $data->mst_token }}">

                                                </div>
                                            </div>

                                            <div class="form-group row mb-3 d-none">
                                                <label class="col-sm-2"><strong>Citizen ID : </strong></label>
                                                <div class="col-sm-2 col-md-2">
                                                    <input type="text" readonly name="citizens_id" id="citizens_id" class="form-control" value="{{ $data->citizen_id }}">

                                                </div>

                                                <label class="col-sm-2"><strong>Mode of NOC : </strong></label>
                                                <div class="col-sm-2 col-md-2">
                                                    <select class="form-control select2 " name="payment_noc_mode" id="payment_noc_mode" type="hidden">
                                                        <option>Select Mode of NOC</option>
                                                        <optgroup label=" ">
                                                            <option value="5" {{ $data->noc_mode == "5" ? 'selected' : '' }}>Provisional Building NOC</option>
                                                            <option value="6" {{ $data->noc_mode == "6" ? 'selected' : '' }}>Final Building NOC</option>
                                                        </optgroup>
                                                    </select>
                                                </div>

                                                <label class="col-sm-2"><strong>NOC Master Id : </strong></label>
                                                <div class="col-sm-2 col-md-2">
                                                    <input type="text" readonly name="noc_mst_id" id="noc_mst_id" class="form-control" value="{{ $data->mst_token }}">

                                                </div>
                                            </div>

                                            <h4 class="card-title text-primary mb-3" style="font-size: 18px;">Basic Details :</h4>
                                            <div class="form-group row  mb-3">
                                                <label class="col-sm-2"><strong>Last Name / Surname : </strong></label>
                                                <div class="col-sm-2 col-md-2">
                                                    <input readonly type="text" name="l_name" id="l_name" class="form-control " value="{{ $data->l_name }}" placeholder="Enter Last Name / Surname.">

                                                </div>
                                                <label class="col-sm-2"><strong>First Name : </strong></label>
                                                <div class="col-sm-2 col-md-2">
                                                    <input readonly type="text" name="f_name" id="f_name" class="form-control " value="{{ $data->f_name }}" placeholder="Enter First Name.">

                                                </div>
                                                <label class="col-sm-2"><strong>Father / Husband's Name : </strong></label>
                                                <div class="col-sm-2 col-md-2">
                                                    <input readonly type="text" name="father_name" id="father_name" class="form-control " value="{{ $data->father_name }}" placeholder="Enter Father / Husband's Name.">

                                                </div>
                                            </div>

                                            <h4 class="card-title text-primary mb-3" style="font-size: 18px;">Payment Details :</h4>

                                            <div class="form-group row  mb-3">
                                                <label class="col-sm-3"><strong>Type Of NOC : <span style="color:red;">*</span></strong></label>
                                                <div class="col-sm-3 col-md-3">
                                                    <select class="form-control select2 @error('fee_construction_id') is-invalid @enderror" name="fee_construction_id" id="fee_construction_id">
                                                        <option value="">Select Type Of NOC</option>
                                                        <optgroup label="">
                                                            @foreach ($mst_fee_construction as $value)
                                                            <option value="{{ $value->id }}" {{ old('fee_construction_id') == "1" ? 'selected' : '' }}>{{ $value->construction_type }}</option>
                                                            @endforeach
                                                        </optgroup>
                                                    </select>
                                                    @error('fee_construction_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>

                                                <label class="col-sm-3"><strong>Total NOC Charges : <span style="color:red;">*</span></strong></label>
                                                <div class="col-sm-3 col-md-3">
                                                    <input  type="text" name="total_charges_cost" id="total_charges_cost" class="form-control "  value="{{ old('total_charges_cost') }}" placeholder="Enter Total NOC Charges.">
                                                    @error('total_charges_cost')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row mt-4">
                                                <label class="col-md-3"></label>
                                                <div class="col-md-9" style="display: flex; justify-content: flex-end;">
                                                    <a href="{{ url('/admin_final_building_noc_list', $data->status) }}" class="btn btn-danger">Cancel</a>&nbsp;&nbsp;
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            </div>

                                        </form>
                                    @endif

                                </div>
                            </div>
                        </div><!-- end col -->
                    </div><!-- end row -->

                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

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
