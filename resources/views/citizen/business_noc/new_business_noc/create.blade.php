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

            @include('common.header.header')

            <div class="main-content">

                <div class="page-content">

                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card" style="border: 1px solid #000000;">
                                    <div class="card-body p-0">
                                        <h4 class="card-header text-light bg-primary ">Add New Business NOC</h4>

                                        <form class="auth-input p-4"  method="POST" action="{{ url('/new_business_noc/store') }}" enctype="multipart/form">
                                            @csrf

                                            <div class="form-group row mb-3">
                                                <label class="col-sm-2"><strong>Appication Date : <span style="color:red;">*</span></strong></label>
                                                <div class="col-sm-2 col-md-2">
                                                    <input type="text" disabled name="application_dt" id="application_dt" class="form-control" value="{{ date('d-m-Y') }}" >

                                                </div>
                                            </div>

                                            <h4 class="card-title text-primary mb-3" style="font-size: 18px;">Appication Details :</h4>
                                            <div class="form-group row  mb-3">
                                                <label class="col-sm-2"><strong>Last Name / Surname : <span style="color:red;">*</span></strong></label>
                                                <div class="col-sm-2 col-md-2">
                                                    <input type="text" name="caste" id="caste" class="form-control @error('caste') is-invalid @enderror" value="{{ old('caste') }}" placeholder="Enter Last Name / Surname.">
                                                    @error('caste')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <label class="col-sm-2"><strong>First Name : <span style="color:red;">*</span></strong></label>
                                                <div class="col-sm-2 col-md-2">
                                                    <input type="text" name="caste" id="caste" class="form-control @error('caste') is-invalid @enderror" value="{{ old('caste') }}" placeholder="Enter First Name.">
                                                    @error('caste')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <label class="col-sm-2"><strong>Father / Husband's Name : <span style="color:red;">*</span></strong></label>
                                                <div class="col-sm-2 col-md-2">
                                                    <input type="text" name="caste" id="caste" class="form-control @error('caste') is-invalid @enderror" value="{{ old('caste') }}" placeholder="Enter Father / Husband's Name.">
                                                    @error('caste')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row  mb-3">
                                                <label class="col-sm-2"><strong>Name of Society : <span style="color:red;">*</span></strong></label>
                                                <div class="col-sm-2 col-md-2">
                                                    <input type="text" name="caste" id="caste" class="form-control @error('caste') is-invalid @enderror" value="{{ old('caste') }}" placeholder="Enter Name of Society.">
                                                    @error('caste')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <label class="col-sm-2"><strong>Designation : <span style="color:red;">*</span></strong></label>
                                                <div class="col-sm-2 col-md-2">
                                                    <input type="text" name="caste" id="caste" class="form-control @error('caste') is-invalid @enderror" value="{{ old('caste') }}" placeholder="Enter Designation.">
                                                    @error('caste')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>


                                            <h4 class="card-title text-primary mb-3" style="font-size: 18px;">Address Details :</h4>
                                            <div class="form-group row  mb-3">
                                                <label class="col-sm-2"><strong>House / Building / Society Name : <span style="color:red;">*</span></strong></label>
                                                <div class="col-sm-2 col-md-2">
                                                    <input type="text" name="caste" id="caste" class="form-control @error('caste') is-invalid @enderror" value="{{ old('caste') }}" placeholder="Enter House / Building / Society Name.">
                                                    @error('caste')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <label class="col-sm-2"><strong>Flat / Block / Barrack No. : <span style="color:red;">*</span></strong></label>
                                                <div class="col-sm-2 col-md-2">
                                                    <input type="text" name="caste" id="caste" class="form-control @error('caste') is-invalid @enderror" value="{{ old('caste') }}" placeholder="Enter Flat / Block / Barrack No.">
                                                    @error('caste')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <label class="col-sm-2"><strong>Wing / Floor : <span style="color:red;">*</span></strong></label>
                                                <div class="col-sm-2 col-md-2">
                                                    <input type="text" name="caste" id="caste" class="form-control @error('caste') is-invalid @enderror" value="{{ old('caste') }}" placeholder="Enter Wing / Floor.">
                                                    @error('caste')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row  mb-3">
                                                <label class="col-sm-2"><strong>Road / Street / Lane : <span style="color:red;">*</span></strong></label>
                                                <div class="col-sm-2 col-md-2">
                                                    <input type="text" name="caste" id="caste" class="form-control @error('caste') is-invalid @enderror" value="{{ old('caste') }}" placeholder="Enter Road / Street / Lane.">
                                                    @error('caste')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <label class="col-sm-2"><strong>Area / Locality / Town / City : <span style="color:red;">*</span></strong></label>
                                                <div class="col-sm-2 col-md-2">
                                                    <input type="text" name="caste" id="caste" class="form-control @error('caste') is-invalid @enderror" value="{{ old('caste') }}" placeholder="Enter Area / Locality / Town / City.">
                                                    @error('caste')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <label class="col-sm-2"><strong>Taluka : <span style="color:red;">*</span></strong></label>
                                                <div class="col-sm-2 col-md-2">
                                                    <input type="text" name="caste" id="caste" class="form-control @error('caste') is-invalid @enderror" value="{{ old('caste') }}" placeholder="Enter Taluka.">
                                                    @error('caste')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row  mb-3">
                                                <label class="col-sm-2"><strong>Pin code : <span style="color:red;">*</span></strong></label>
                                                <div class="col-sm-2 col-md-2">
                                                    <input type="text" name="caste" id="caste" maxlength="6" class="form-control @error('caste') is-invalid @enderror" value="{{ old('caste') }}" placeholder="Enter Pin code.">
                                                    @error('caste')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <label class="col-sm-2"><strong>Ward Committee No : <span style="color:red;">*</span></strong></label>
                                                <div class="col-sm-2 col-md-2">
                                                    <select class="form-control select2 @error('caste') is-invalid @enderror" name="caste" id="caste">
                                                        <option>Select Ward Committee No</option>
                                                        <optgroup label=" ">
                                                            <option value="1">Ward 1</option>
                                                            <option value="2">Ward 2</option>
                                                            <option value="3">Ward 3</option>
                                                            <option value="4">Ward 4</option>
                                                        </optgroup>
                                                    </select>
                                                    @error('caste')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <label class="col-sm-2"><strong>Electrol Panel No : <span style="color:red;">*</span></strong></label>
                                                <div class="col-sm-2 col-md-2">
                                                    <input type="text" name="caste" id="caste" class="form-control @error('caste') is-invalid @enderror" value="{{ old('caste') }}" placeholder="Enter Electrol Panel No.">
                                                    @error('caste')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <h4 class="card-title text-primary mb-2" style="font-size: 18px;">Information of Property :</h4>
                                            <div class="form-group row  mb-3">
                                                <label class="col-sm-2"><strong>Type of Property : <span style="color:red;">*</span></strong></label>
                                                <div class="col-sm-2 col-md-2">
                                                    <select class="form-control select2 @error('caste') is-invalid @enderror" name="caste" id="caste">
                                                        <option>Select Type of Property</option>
                                                        <optgroup label=" ">
                                                            <option value="1">Land</option>
                                                            <option value="2">Building</option>
                                                        </optgroup>
                                                    </select>
                                                    @error('caste')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <label class="col-sm-2"><strong>Property Number : <span style="color:red;">*</span></strong></label>
                                                <div class="col-sm-2 col-md-2">
                                                    <input type="text" name="caste" id="caste" class="form-control @error('caste') is-invalid @enderror" value="{{ old('caste') }}" placeholder="Enter Property Number.">
                                                    @error('caste')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <h4 class="card-title text-primary mb-3" style="font-size: 18px;">Information of Land :</h4>
                                            <div class="form-group row  mb-3">
                                                <label class="col-sm-2"><strong>Town / City : <span style="color:red;">*</span></strong></label>
                                                <div class="col-sm-2 col-md-2">
                                                    <input type="text" name="caste" id="caste" class="form-control @error('caste') is-invalid @enderror" value="{{ old('caste') }}" placeholder="Enter Town / City.">
                                                    @error('caste')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <label class="col-sm-2"><strong>Survey / Block / Barrak No. : <span style="color:red;">*</span></strong></label>
                                                <div class="col-sm-2 col-md-2">
                                                    <input type="text" name="caste" id="caste" class="form-control @error('caste') is-invalid @enderror" value="{{ old('caste') }}" placeholder="Enter Survey / Block / Barrak No.">
                                                    @error('caste')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <label class="col-sm-2"><strong>C.T.S. No. : <span style="color:red;">*</span></strong></label>
                                                <div class="col-sm-2 col-md-2">
                                                    <input type="text" name="caste" id="caste" class="form-control @error('caste') is-invalid @enderror" value="{{ old('caste') }}" placeholder="Enter C.T.S. No.">
                                                    @error('caste')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row  mb-3">
                                                <label class="col-sm-2"><strong>Part No. / Sheet No. : <span style="color:red;">*</span></strong></label>
                                                <div class="col-sm-2 col-md-2">
                                                    <input type="text" name="caste" id="caste" class="form-control @error('caste') is-invalid @enderror" value="{{ old('caste') }}" placeholder="Enter Part No. / Sheet No.">
                                                    @error('caste')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <label class="col-sm-2"><strong>Plot No. / Unit No. : <span style="color:red;">*</span></strong></label>
                                                <div class="col-sm-2 col-md-2">
                                                    <input type="text" name="caste" id="caste" class="form-control @error('caste') is-invalid @enderror" value="{{ old('caste') }}" placeholder="Enter Plot No. / Unit No.">
                                                    @error('caste')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <label class="col-sm-2"><strong>Property Number : <span style="color:red;">*</span></strong></label>
                                                <div class="col-sm-2 col-md-2">
                                                    <input type="text" name="caste" id="caste" class="form-control @error('caste') is-invalid @enderror" value="{{ old('caste') }}" placeholder="Enter Property Number.">
                                                    @error('caste')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <h4 class="card-title text-primary mb-3" style="font-size: 18px;">Necessary Particulars about above service</h4>
                                            <div class="form-group row  mb-3">
                                                <label class="col-sm-2"><strong>Pincode : <span style="color:red;">*</span></strong></label>
                                                <div class="col-sm-2 col-md-2">
                                                    <input type="text" name="caste" id="caste" maxlength="06" class="form-control @error('caste') is-invalid @enderror" value="{{ old('caste') }}" placeholder="Enter Pincode.">
                                                    @error('caste')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <label class="col-sm-2"><strong>Shop No. : <span style="color:red;">*</span></strong></label>
                                                <div class="col-sm-2 col-md-2">
                                                    <input type="text" name="caste" id="caste" class="form-control @error('caste') is-invalid @enderror" value="{{ old('caste') }}" placeholder="Enter Shop No.">
                                                    @error('caste')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <label class="col-sm-2"><strong>Height of Building : <span style="color:red;">*</span></strong></label>
                                                <div class="col-sm-2 col-md-2">
                                                    <input type="text" name="caste" id="caste" class="form-control @error('caste') is-invalid @enderror" value="{{ old('caste') }}" placeholder="Enter Height of Building">
                                                    @error('caste')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row  mb-3">
                                                <label class="col-sm-2"><strong>Rooms in Building : <span style="color:red;">*</span></strong></label>
                                                <div class="col-sm-2 col-md-2">
                                                    <input type="text" name="caste" id="caste"  class="form-control @error('caste') is-invalid @enderror" value="{{ old('caste') }}" placeholder="Enter Rooms in Building.">
                                                    @error('caste')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <label class="col-sm-2"><strong>Property on Floor Building : <span style="color:red;">*</span></strong></label>
                                                <div class="col-sm-2 col-md-2">
                                                    <input type="text" name="caste" id="caste" class="form-control @error('caste') is-invalid @enderror" value="{{ old('caste') }}" placeholder="Enter Property on Floor Building">
                                                    @error('caste')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <label class="col-sm-2"><strong>Accomodation for how many People : <span style="color:red;">*</span></strong></label>
                                                <div class="col-sm-2 col-md-2">
                                                    <input type="text" name="caste" id="caste" class="form-control @error('caste') is-invalid @enderror" value="{{ old('caste') }}" placeholder="Enter Accomodation for how many People">
                                                    @error('caste')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row  mb-3">
                                                <label class="col-sm-2"><strong>Area of Place (Sq. Mt.) : <span style="color:red;">*</span></strong></label>
                                                <div class="col-sm-2 col-md-2">
                                                    <input type="text" name="caste" id="caste"  class="form-control @error('caste') is-invalid @enderror" value="{{ old('caste') }}" placeholder="Enter Area of Place (Sq. Mt.)">
                                                    @error('caste')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <label class="col-sm-2"><strong>Numbers of Workers / Servants : <span style="color:red;">*</span></strong></label>
                                                <div class="col-sm-2 col-md-2">
                                                    <input type="text" name="caste" id="caste" class="form-control @error('caste') is-invalid @enderror" value="{{ old('caste') }}" placeholder="Enter Numbers of Workers / Servants">
                                                    @error('caste')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <label class="col-sm-2"><strong>Type of Business : <span style="color:red;">*</span></strong></label>
                                                <div class="col-sm-2 col-md-2">
                                                    <select class="form-control select2 @error('caste') is-invalid @enderror" name="caste" id="caste">
                                                        <option>Select Type of Business</option>
                                                        <optgroup label=" ">
                                                            <option value="1">Temporary</option>
                                                            <option value="2">Fixed</option>
                                                        </optgroup>
                                                    </select>
                                                    @error('caste')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row  mb-3">
                                                <label class="col-sm-2"><strong>Number of Workers / Servants sleep at night at working place : <span style="color:red;">*</span></strong></label>
                                                <div class="col-sm-2 col-md-2">
                                                    <input type="text" name="caste" id="caste"  class="form-control @error('caste') is-invalid @enderror" value="{{ old('caste') }}" placeholder="Enter Number of Workers / Servants sleep at night at working place">
                                                    @error('caste')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <label class="col-sm-2"><strong>Fire extinguishers/ preventive equipments are installed at working place : <span style="color:red;">*</span></strong></label>
                                                <div class="col-sm-2 col-md-2">
                                                    <select class="form-control select2 @error('fire_equips') is-invalid @enderror" name="fire_equips" id="fire_equips" onchange="mySelectfunction()" >
                                                        <option>Select Fire extinguishers/ preventive equipments are installed at working place</option>
                                                        <optgroup label=" ">
                                                            <option value="1" {{ old('fire_equips') == "1" ? 'selected' : '' }}>Yes</option>
                                                            <option value="2" {{ old('fire_equips') == "2" ? 'selected' : '' }}>No</option>
                                                        </optgroup>
                                                    </select>
                                                    @error('fire_equips')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <label class="col-sm-2"><strong>Address Of Business Place : <span style="color:red;">*</span></strong></label>
                                                <div class="col-sm-2 col-md-2">
                                                    <textarea type="text" name="caste" id="caste" class="form-control @error('caste') is-invalid @enderror" value="{{ old('caste') }}" placeholder="Enter Address Of Business Place"></textarea>
                                                    @error('caste')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <h4 class="card-title text-primary mb-3" style="font-size: 18px;">Necessary Enclosures related to above application (Documents to attach)</h4>
                                            <div class="row "  id="1" style="display: none;">

                                                <div class="form-group row  mb-3">
                                                    <label class="col-sm-2"><strong>Upload Location of Place (Google Map Link) : <span style="color:red;">*</span></strong></label>
                                                    <div class="col-sm-4 col-md-4">
                                                        <input type="file" name="caste" id="caste" class="form-control  @error('caste') is-invalid @enderror "   value="{{ old('caste') }}" placeholder="Upload Location of Place (Google Map Link)">
                                                        @error('caste')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>

                                                    <label class="col-sm-2"><strong>Upload Letter from License Holder regarding proper electric connection : <span style="color:red;">*</span></strong></label>
                                                    <div class="col-sm-4 col-md-4">
                                                        <input type="file" name="caste" id="caste" class="form-control @error('caste') is-invalid @enderror" value="{{ old('caste') }}" placeholder="Enter Numbers of Workers / Servants">
                                                        @error('caste')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row  mb-3">
                                                    <label class="col-sm-2"><strong>Upload Letter from connection holder and license regarding proper cooking gas connection : <span style="color:red;">*</span></strong></label>
                                                    <div class="col-sm-4 col-md-4">
                                                        <input type="file" name="caste" id="caste" class="form-control btn-primary @error('caste') is-invalid @enderror "   value="{{ old('caste') }}" placeholder="Upload Location of Place (Google Map Link)">
                                                        @error('caste')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>

                                                    <label class="col-sm-2"><strong>Upload Shop License : <span style="color:red;">*</span></strong></label>
                                                    <div class="col-sm-4 col-md-4">
                                                        <input type="file" name="caste" id="caste" class="form-control @error('caste') is-invalid @enderror" value="{{ old('caste') }}" placeholder="Enter Numbers of Workers / Servants">
                                                        @error('caste')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row  mb-3">
                                                    <label class="col-sm-2"><strong>Upload Food License : <span style="color:red;">*</span></strong></label>
                                                    <div class="col-sm-4 col-md-4">
                                                        <input type="file" name="caste" id="caste" class="form-control  @error('caste') is-invalid @enderror "   value="{{ old('caste') }}" placeholder="Upload Location of Place (Google Map Link)">
                                                        @error('caste')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>

                                                    <label class="col-sm-2"><strong>Upload Up-to-date receipt of Tax bill paid : <span style="color:red;">*</span></strong></label>
                                                    <div class="col-sm-4 col-md-4">
                                                        <input type="file" name="caste" id="caste" class="form-control @error('caste') is-invalid @enderror" value="{{ old('caste') }}" placeholder="Enter Numbers of Workers / Servants">
                                                        @error('caste')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row  mb-3">
                                                    <label class="col-sm-2"><strong>Upload Trade License (Kerosene/Other Petroleum Stock/ Explosive goods) : <span style="color:red;">*</span></strong></label>
                                                    <div class="col-sm-4 col-md-4">
                                                        <input type="file" name="caste" id="caste" class="form-control  @error('caste') is-invalid @enderror "   value="{{ old('caste') }}" placeholder="Upload Location of Place (Google Map Link)">
                                                        @error('caste')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>

                                                    <label class="col-sm-2"><strong>Commissioning Certificate of Gas Fitting : <span style="color:red;">*</span></strong></label>
                                                    <div class="col-sm-4 col-md-4">
                                                        <input type="file" name="caste" id="caste" class="form-control @error('caste') is-invalid @enderror" value="{{ old('caste') }}" placeholder="Enter Numbers of Workers / Servants">
                                                        @error('caste')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row  mb-3">
                                                    <label class="col-sm-2"><strong>Upload Commissioning Certificate of Fire extinguishers/ preventive equipments of I.S.I. Mark : <span style="color:red;">*</span></strong></label>
                                                    <div class="col-sm-4 col-md-4">
                                                        <input type="file" name="caste" id="caste" class="form-control  @error('caste') is-invalid @enderror "   value="{{ old('caste') }}" placeholder="Upload Location of Place (Google Map Link)">
                                                        @error('caste')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>

                                                    <label class="col-sm-2"><strong>Upload Copy of Affidavit : <span style="color:red;">*</span></strong></label>
                                                    <div class="col-sm-4 col-md-4">
                                                        <input type="file" name="caste" id="caste" class="form-control @error('caste') is-invalid @enderror" value="{{ old('caste') }}" placeholder="Enter Numbers of Workers / Servants">
                                                        @error('caste')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                
                                                <div class="card" style="border: 1px solid #1d1f1f;">                                                   

                                                    <div class="card-body p-4">
                                                        <h4 class="card-title text-primary mb-3" style="font-size: 18px;">Declaration</h4>

                                                        <div class="col-md-12 col-xs-12">
                                                            <p class="text-justify ">
                                                                <b> I / We..... <br><br>
                                                                <input type="text" style="width:300px" class="form-control @error('caste') is-invalid @enderror" id="declare_by" placeholder="Full Name Of Applicant(s)" name="declare_by">
                                                                <br>
                                                                @error('caste')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                                ......
                                                                State on solemn affirmation that the above information is true and correct to the best of my/our knowledge. If the information given is found wrong then 1/We shali be held iegally liable for its consequences. </b>
                                                            </p>
                                                            <b>Date : </b> <input type="text" style="width:150px" class="form-control input-style" id="declare_date" placeholder="Permit Date" name="declare_date" value="01/09/2023" readonly>
                                                        </div>

                                                        <div class="col-md-12 col-xs-12">
                                                            <h6 class="mt-3"><b>The document may please be delivered to : </b></h6>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2"><strong>Self / Nominated Person : <span style="color:red;">*</span></strong></label>
                                                                <div class="col-sm-2 col-md-2">
                                                                    <select class="form-control select2 @error('caste') is-invalid @enderror" name="caste" id="caste">
                                                                        <option>Select Self / Nominated Person</option>
                                                                        <optgroup label=" ">
                                                                            <option value="1">Self</option>
                                                                            <option value="2">Nominee</option>
                                                                            <option value="3">C.F.C.</option>
                                                                            <option value="4">Camp No.</option>
                                                                        </optgroup>
                                                                    </select>
                                                                    @error('caste')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>

                                                                <label class="col-sm-2"><strong>Name of Nominated Person : <span style="color:red;">*</span></strong></label>
                                                                <div class="col-sm-2 col-md-2">
                                                                    <input type="text" name="caste" id="caste" class="form-control @error('caste') is-invalid @enderror" value="{{ old('caste') }}" placeholder="Enter Name of Nominated Person.">
                                                                    @error('caste')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>

                                                                <label class="col-sm-2"><strong>Deliver by : <span style="color:red;">*</span></strong></label>
                                                                <div class="col-sm-2 col-md-2">
                                                                    <select class="form-control select2 @error('caste') is-invalid @enderror" name="caste" id="caste">
                                                                        <option>Select Deliver by</option>
                                                                        <optgroup label=" ">
                                                                            <option value="1">By Post U.P.C</option>
                                                                            <option value="2">By Post Register A.D.</option>
                                                                            <option value="3">Courier</option>
                                                                        </optgroup>
                                                                    </select>
                                                                    @error('caste')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>

                                                            <h6 class="mt-3 mb-3"><b>Correspondence Address (Not to be filled if address is same as above) : </b></h6>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2"><strong>Last Name / Surname : <span style="color:red;">*</span></strong></label>
                                                                <div class="col-sm-2 col-md-2">
                                                                    <input type="text" name="caste" id="caste" class="form-control @error('caste') is-invalid @enderror" value="{{ old('caste') }}" placeholder="Enter Last Name / Surname.">
                                                                    @error('caste')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>

                                                                <label class="col-sm-2"><strong>First Name : <span style="color:red;">*</span></strong></label>
                                                                <div class="col-sm-2 col-md-2">
                                                                    <input type="text" name="caste" id="caste" class="form-control @error('caste') is-invalid @enderror" value="{{ old('caste') }}" placeholder="Enter First Name.">
                                                                    @error('caste')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>

                                                                <label class="col-sm-2"><strong>Father / Husband's Name : <span style="color:red;">*</span></strong></label>
                                                                <div class="col-sm-2 col-md-2">
                                                                    <input type="text" name="caste" id="caste" class="form-control @error('caste') is-invalid @enderror" value="{{ old('caste') }}" placeholder="Enter Father / Husband's Name.">
                                                                    @error('caste')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label class="col-sm-2"><strong>House / Building / Society Name : <span style="color:red;">*</span></strong></label>
                                                                <div class="col-sm-2 col-md-2">
                                                                    <input type="text" name="caste" id="caste" class="form-control @error('caste') is-invalid @enderror" value="{{ old('caste') }}" placeholder="Enter House / Building / Society Name.">
                                                                    @error('caste')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>

                                                                <label class="col-sm-2"><strong>Flat / Block / Barrack No. : <span style="color:red;">*</span></strong></label>
                                                                <div class="col-sm-2 col-md-2">
                                                                    <input type="text" name="caste" id="caste" class="form-control @error('caste') is-invalid @enderror" value="{{ old('caste') }}" placeholder="Enter Flat / Block / Barrack No..">
                                                                    @error('caste')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>

                                                                <label class="col-sm-2"><strong>Wing / Floor : <span style="color:red;">*</span></strong></label>
                                                                <div class="col-sm-2 col-md-2">
                                                                    <input type="text" name="caste" id="caste" class="form-control @error('caste') is-invalid @enderror" value="{{ old('caste') }}" placeholder="Enter Wing / Floor.">
                                                                    @error('caste')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label class="col-sm-2"><strong>Road / Street / Lane : <span style="color:red;">*</span></strong></label>
                                                                <div class="col-sm-2 col-md-2">
                                                                    <input type="text" name="caste" id="caste" class="form-control @error('caste') is-invalid @enderror" value="{{ old('caste') }}" placeholder="Enter Road / Street / Lane.">
                                                                    @error('caste')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>

                                                                <label class="col-sm-2"><strong>Area / Locality / Town / City : <span style="color:red;">*</span></strong></label>
                                                                <div class="col-sm-2 col-md-2">
                                                                    <input type="text" name="caste" id="caste" class="form-control @error('caste') is-invalid @enderror" value="{{ old('caste') }}" placeholder="Enter Area / Locality / Town / City">
                                                                    @error('caste')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>

                                                                <label class="col-sm-2"><strong>Taluka : <span style="color:red;">*</span></strong></label>
                                                                <div class="col-sm-2 col-md-2">
                                                                    <input type="text" name="caste" id="caste" class="form-control @error('caste') is-invalid @enderror" value="{{ old('caste') }}" placeholder="Enter Taluka.">
                                                                    @error('caste')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label class="col-sm-2"><strong>Pin code : <span style="color:red;">*</span></strong></label>
                                                                <div class="col-sm-2 col-md-2">
                                                                    <input type="text" name="caste" id="caste" maxlength="06" class="form-control @error('caste') is-invalid @enderror" value="{{ old('caste') }}" placeholder="Enter Pin code.">
                                                                    @error('caste')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>

                                                                <label class="col-sm-2"><strong>Email Id (if any) : </strong></label>
                                                                <div class="col-sm-2 col-md-2">
                                                                    <input type="text" name="caste" id="caste" class="form-control r" value="{{ old('caste') }}" placeholder="Enter Email Id">
                                                                   
                                                                </div>

                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>

                                            </div>



                                            <div class="form-group row mt-4" >
                                                <label class="col-md-3"></label>
                                                <div class="col-md-9" style="display: flex; justify-content: flex-end;">
                                                    <a href="{{ url('/citizen/dashboard') }}" class="btn btn-danger">Cancel</a>&nbsp;&nbsp;
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
            function mySelectfunction(){
                getValue = document.getElementById("fire_equips").value;
                if(getValue == "1"){
                    document.getElementById("1").style.display = "flex";
                }else if(getValue == "2"){
                    alert("To proceed with NOC application, having fire safety equipments installed is mandatory!");
                }else {
                    alert("To proceed with NOC application, having fire safety equipments installed is mandatory!");
                }
            }
        </script>

    </body>
</html>
